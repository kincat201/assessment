import { Env } from '@wavecore/core-node';
import axios, { AxiosRequestConfig } from 'axios';
import { SHA256 } from 'crypto-js';
import * as moment from 'moment';
import { EspayConstant } from '../constant/EspayConstant';
import { RedisConstant } from '../constant/RedisConstant';
import { EspayLog } from '../decorator/EspayLog';
import { RedisSet } from '../decorator/RedisSet';
import { Transaction } from '../model/Transaction';

export class EspayService {
	static requestConfig: AxiosRequestConfig = {
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded'
		}
	};

	static generateUUID() {
		return ['uuid', Math.random().toString(36).substring(7)].join('-').toUpperCase();
	}

	static getInquiryResponse(status, message = 'Success', transaction?: Transaction) {
		let response = '';
		if (status === 0) {
			response = [0, message, transaction.transactionNumber, transaction.totalPrice, 'IDR', 'Kampusyuk Transaction', moment(transaction.createdAt).format('DD/MM/YYYY HH:mm:ss')].join(';');
		} else {
			response = `1;${message};;;;;`;
		}
		return response;
	}

	static getPaymentResponse(status, message, transaction?: Transaction, reconcileId?: string) {
		let response = '';
		if (status === 0) {
			response = [0, message, reconcileId, transaction.transactionNumber, moment(transaction.createdAt).format('YYYY-MM-DD HH:mm:ss')].join(',');
		} else {
			response = `1,${message},,,`;
		}
		return response;
	}

	static generateSignature(mode, input) {
		const signatureKey = Env().espay.signatureKey;
		const uuid = input.rq_uuid;
		const datetime = input.rq_datetime;
		const orderId = input.order_id;
		const commCode = input.comm_code;
		const amount = input.amount;
		const currency = input.ccy;
		let result = '';

		if (mode === EspayConstant.SIGNATURE_SEND_INVOICE) {
			result = `##${signatureKey}##${uuid}##${datetime}##${orderId}##${amount}##${currency}##${commCode}##${EspayConstant.SIGNATURE_SEND_INVOICE}##`;

		} else if (mode === EspayConstant.SIGNATURE_CLOSED_INVOICE) {
			result = `##${signatureKey}##${uuid}##${datetime}##${orderId}##${commCode}##${EspayConstant.SIGNATURE_CLOSED_INVOICE}##`;

		} else if ([
			EspayConstant.SIGNATURE_INQUIRY,
			EspayConstant.SIGNATURE_PAYMENT_REPORT,
			EspayConstant.SIGNATURE_CHECK_STATUS,
			EspayConstant.SIGNATURE_EXPIRE_TRANSACTION,
		].includes(mode)) {
			result = `##${signatureKey}##${datetime}##${orderId}##${mode}##`;
		}

		return SHA256(result.toUpperCase()).toString();
	}

	@EspayLog(EspayConstant.LOG_TYPE_SEND_INVOICE)
	static async sendInvoice(input, transaction: Transaction, update?: boolean) {
		const body = new URLSearchParams();
		const datetime = moment().format('YYYY-MM-DD HH:mm:ss');

		input.rq_uuid = EspayService.generateUUID();
		input.rq_datetime = datetime;
		input.order_id = transaction.transactionNumber;
		input.ccy = 'IDR';
		input.amount = transaction.totalPrice.toString();
		input.comm_code = Env().espay.commCode;
		input.remark2 = 'Kampusyuk Transaction';
		input.update = update ? 'Y' : 'N';
		input.bank_code = input.bankCode;
		input.va_expired = EspayConstant.VA_EXPIRED_IN.toString();
		input.signature = EspayService.generateSignature(EspayConstant.SIGNATURE_SEND_INVOICE, input);

		body.append('rq_uuid', input.rq_uuid);
		body.append('rq_datetime', input.rq_datetime);
		body.append('order_id', input.order_id);
		body.append('ccy', input.ccy);
		body.append('amount', input.amount);
		body.append('comm_code', input.comm_code);
		body.append('remark2', input.remark2);
		body.append('update', input.update);
		body.append('bank_code', input.bank_code);
		body.append('va_expired', input.va_expired);
		body.append('signature', input.signature);

		const response = await axios.post(
			`${Env().espay.baseAPIUrl}/rest/merchantpg/sendinvoice`,
			body,
			this.requestConfig
		);

		return response?.data;
	}

	@EspayLog(EspayConstant.LOG_TYPE_CHECK_PAYMENT_STATUS)
	static async checkPaymentStatus(input) {
		const body = new URLSearchParams();
		const datetime = moment().format('YYYY-MM-DD HH:mm:ss');

		input.uuid = EspayService.generateUUID();
		input.rq_datetime = datetime;
		input.comm_code = Env().espay.commCode;
		input.is_paymentnotif = input.is_paymentnotif ? input.is_paymentnotif : 'Y';
		input.signature = EspayService.generateSignature(EspayConstant.SIGNATURE_CHECK_STATUS, input);

		body.append('uuid', input.uuid);
		body.append('rq_datetime', input.rq_datetime);
		body.append('order_id', input.order_id);
		body.append('is_paymentnotif', input.is_paymentnotif);
		body.append('comm_code', input.comm_code);
		body.append('signature', input.signature);

		 const response = await axios.post(
			`${Env().espay.baseAPIUrl}/rest/merchant/status`,
			body,
			this.requestConfig
		);

		return response?.data;
	}

	@RedisSet(RedisConstant.ESPAY_CHANNEL_LIST, {
		json: true,
		expiredIn: 86400 // in second
	})
	static async getChannels() {
		const body = new URLSearchParams();
		body.append('key', Env().espay.apiKey);

		const response = await axios.post(
			`${Env().espay.baseAPIUrl}/rest/merchant/merchantinfo`,
			body,
			this.requestConfig
		);

		return response.data.data;
	}

	static async getChannelDetailByBankProduct(bankProduct) {
		const channels = await this.getChannels();
		return channels.find(x => x.productCode === bankProduct);
	}
}
