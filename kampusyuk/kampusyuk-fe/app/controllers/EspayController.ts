import { success } from '@wavecore/core-node';
import { Body, ContentType, Get, JsonController, Param, Post } from '@wavecore/routing-controllers';
import * as moment from 'moment';
import { Constant } from '../common/constant/Constant';
import { EspayConstant } from '../common/constant/EspayConstant';
import { EspayLog } from '../common/decorator/EspayLog';
import { Admission } from '../common/model/Admission';
import { Assessment } from '../common/model/Assessment';
import { Transaction } from '../common/model/Transaction';
import { EspayService } from '../common/service/EspayService';
import { AssessmentService } from '../common/service/AssessmentService';
import { MailerService } from '../common/service/MailerService';

@JsonController('/espay')
export class EspayController {

	@Get('/channel/list')
	async getChannels() {
		const channels = await EspayService.getChannels();
		return success(channels);
	}

	@Get('/channel/detail/:bankProduct')
	async getChannelDetail(@Param('bankProduct') bankProduct: string) {
		const channelDetail = await EspayService.getChannelDetailByBankProduct(bankProduct);
		return success(channelDetail);
	}

	@Post('/check-status')
	async checkPaymentStatus(@Body() input) {
		const paymentStatus = await EspayService.checkPaymentStatus(input);
		return success(paymentStatus);
	}

	@Post('/callback/inquiry')
	@ContentType('text/plain')
	@EspayLog(EspayConstant.LOG_TYPE_INQUIRY_CALLBACK)
	async inquiryCallback(@Body() input) {
		const signature = EspayService.generateSignature(EspayConstant.SIGNATURE_INQUIRY, input);

		if (signature !== input.signature) {
			return EspayService.getPaymentResponse(1, 'Invalid signature');
		}

		const transaction = await Transaction.findByTransactionNumber(input.order_id);
		if (!transaction) {
			return EspayService.getInquiryResponse(1, 'Transaction not found');
		}

		if (transaction.status === Constant.PAYMENT_PAID) {
			return EspayService.getInquiryResponse(1, 'Transaction already paid');
		}

		if (moment(transaction.expiredAt).isBefore(moment()) || transaction.status === Constant.TRANSACTION_STATUS_EXPIRED) {
			return EspayService.getInquiryResponse(1, 'Transaction expired');
		}

		return EspayService.getInquiryResponse(0, 'Success', transaction);
	}

	@Post('/callback/payment')
	@ContentType('text/plain')
	@EspayLog(EspayConstant.LOG_TYPE_PAYMENT_CALLBACK)
	async paymentNotificationCallback(@Body() input) {
		const signature = EspayService.generateSignature(EspayConstant.SIGNATURE_PAYMENT_REPORT, input);

		if (signature !== input.signature) {
			return EspayService.getPaymentResponse(1, 'Invalid signature');
		}

		const transaction = await Transaction.findByTransactionNumber(input.order_id);
		if (!transaction) {
			return EspayService.getPaymentResponse(1, 'Transaction not found');
		}

		if (transaction.status === Constant.PAYMENT_PAID) {
			return EspayService.getPaymentResponse(1, 'Transaction already paid');
		}

		if (Number(input.amount) < Number(transaction.totalPrice)) {
			return EspayService.getPaymentResponse(1, 'Payment amount are less than the way it supposed to be');
		}

		const reconcileId = moment().format('YYYY-MM-DD HH:mm:ss');
		await transaction.update({
			paymentAmount: input.amount,
			paymentDate: input.payment_datetime,
			expiredAt: null,
			status: Constant.TRANSACTION_STATUS_PAID,
			bankProduct: input.product_code,
			espayStatus: EspayConstant.TX_STATUS_IN_PROCESS
		});
		MailerService.sendTransactionPaid(transaction);

		if (transaction.type === Constant.TRANSACTION_TYPE_ADMISSION) {
			await Admission.update({
				registrationFee: Constant.PAYMENT_PAID,
				registrationFeeDate: transaction.paymentDate,
				status: Constant.ADMISSION_STATUS_PAID_REGISTRATION
			}, {
				where: {
					id: transaction.admissionId
				}
			})
		} else if (transaction.type === Constant.TRANSACTION_TYPE_ASSESSMENT) {
			const updateAssessment = await Assessment.update({
				paymentStatus: Constant.PAYMENT_PAID,
				status: Constant.ASSESSMENT_STATUS_PROGRESS
			}, {
				where: {
					id: transaction.assessmentId
				}
			})

			await AssessmentService.sendPaymentCompleteNotification(transaction.id);
		}

		setTimeout(() => {
			EspayService.checkPaymentStatus(input).then(paymentStatus => {
				transaction.update({
					espayStatus: EspayConstant.TX_STATUS[paymentStatus.tx_status],
					espayReason: paymentStatus.tx_reason,
					paymentRef: paymentStatus.payment_ref
				})
			});
		}, 5000);

		return EspayService.getPaymentResponse(0, 'Success', transaction, reconcileId)
	}
}
