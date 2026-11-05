import { MongoDBService } from '@wavecore/core-node';
import * as moment from 'moment';
import { default as sequelize, Op } from 'sequelize';
import { Constant } from '../constant/Constant';
import { EspayConstant } from '../constant/EspayConstant';
import { AssessmentConstant } from '../constant/AssessmentConstant';
import { Admission } from '../model/Admission';
import { Assessment } from '../model/Assessment';
import { Espay } from '../model/mongo/Espay';
import { ProgramStudy } from '../model/ProgramStudy';
import { Transaction } from '../model/Transaction';
import { pad } from '../util/CommonUtil';
import { ErrorCode } from '../util/Error';
import { EspayService } from './EspayService';
import { ExportService } from './ExportService';

export class TransactionService {

	static async generateTransactionNumber() {
		const today = sequelize.where(sequelize.fn('datediff', sequelize.col('createdAt'), moment().format("YYYY-MM-DD")), {
			[Op.and]: [
				{ [Op.eq]: 0 },
			]
		});
		const totalTransaction = await Transaction.count({
			where: {
				createdAt: today
			}
		});

		return moment().format('YYYYMMDD') + pad((totalTransaction + 1).toString(), 4);
	}

	static async createAdmissionTrx(admission: Admission, programStudy: ProgramStudy, input, req) {
		const totalPrice = Number(programStudy.registrationFormFee) - Number(programStudy.registrationFormFeeDiscount);
		const transaction = await Transaction.create({
			userId: req.user.id,
			type: Constant.TRANSACTION_TYPE_ADMISSION,
			admissionId: admission.id,
			totalPrice,
			transactionNumber: await this.generateTransactionNumber(),
			bankProduct: input.bankProduct,
			status: Constant.TRANSACTION_STATUS_UNPAID,
			expiredAt: moment().add(EspayConstant.VA_EXPIRED_IN, 'minutes').format('YYYY-MM-DD HH:mm:ss'),
			createdBy: req.user.id
		});

		new MongoDBService(Espay).getModel().create({
			type: EspayConstant.LOG_TYPE_CREATE_TRANSACTION,
			transactionNumber: transaction.transactionNumber,
			logs: {
				bankProduct: input.bankProduct
			}
		});

		try {
			if (!EspayConstant.BANK_PRODUCT_NON_VA.includes(input.bankProduct)) {
				const sendInvoice = await EspayService.sendInvoice(input, transaction);
				if (sendInvoice.error_code !== '0000') {
					await transaction.update({
						status: Constant.TRANSACTION_STATUS_FAILED
					});

					return ErrorCode.ESPAY_ERROR;
				}

				await transaction.update({
					vaNumber: sendInvoice.va_number
				});
			}
		} catch (e) {
			
			new MongoDBService(Espay).getModel().create({
				type: EspayConstant.LOG_TYPE_ESPAY_EXCEPTION_ERROR,
				transactionNumber: transaction.transactionNumber,
				logs: {
					on: 'TransactionService:createAdmissionTrx',
					exceptions: JSON.stringify(e)
				}
			});
			
			await transaction.update({
				status: Constant.TRANSACTION_STATUS_FAILED
			});

			return ErrorCode.ESPAY_ERROR;
		}

		return transaction.transactionNumber;
	}

	static async createAssessmentTrx(assessment: Assessment, input, req) {
		const totalPrice = Number(AssessmentConstant.PRICE);
		const transaction = await Transaction.create({
			userId: req.user.id,
			type: Constant.TRANSACTION_TYPE_ASSESSMENT,
			assessmentId: assessment.id,
			totalPrice,
			transactionNumber: await this.generateTransactionNumber(),
			bankProduct: input.bankProduct,
			status: Constant.TRANSACTION_STATUS_UNPAID,
			expiredAt: moment().add(EspayConstant.VA_EXPIRED_IN, 'minutes').format('YYYY-MM-DD HH:mm:ss'),
			createdBy: req.user.id
		});

		new MongoDBService(Espay).getModel().create({
			type: EspayConstant.LOG_TYPE_CREATE_TRANSACTION,
			transactionNumber: transaction.transactionNumber,
			logs: {
				bankProduct: input.bankProduct
			}
		});

		try {
			if (!EspayConstant.BANK_PRODUCT_NON_VA.includes(input.bankProduct)) {
				const sendInvoice = await EspayService.sendInvoice(input, transaction);
				if (sendInvoice.error_code !== '0000') {
					await transaction.update({
						status: Constant.TRANSACTION_STATUS_FAILED
					});

					return ErrorCode.ESPAY_ERROR;
				}

				await transaction.update({
					vaNumber: sendInvoice.va_number
				});
			}
		} catch (e) {
			
			new MongoDBService(Espay).getModel().create({
				type: EspayConstant.LOG_TYPE_ESPAY_EXCEPTION_ERROR,
				transactionNumber: transaction.transactionNumber,
				logs: {
					on: 'TransactionService:createAdmissionTrx',
					exceptions: JSON.stringify(e)
				}
			});
			
			await transaction.update({
				status: Constant.TRANSACTION_STATUS_FAILED
			});

			return ErrorCode.ESPAY_ERROR;
		}

		return transaction.transactionNumber;
	}

	static async exportTransactions(transactions: Transaction[], exportTo, req) {
		const exportHeaders = [
			'Transaction ID', 'Email', 'Name', 'Type', 'Payment Method', 
			'Product Name', 'Total Price', 'status', 'area', 'createdAt'
        ];
        const exportData = [];
        const exportExtensions = {
            [Constant.EXPORT_TYPE_CSV]: 'csv',
            [Constant.EXPORT_TYPE_EXCEL]: 'xlsx'
        };

        const date = moment().format('DD-MM-YYYY-hh-mm-ss');
        const filename = ['Transaction', date, req.user.id].join('-');
		let file;

		for (const transaction of transactions) {
			let paymentMethod = await EspayService.getChannelDetailByBankProduct(transaction.bankProduct);
			let productName = '';
			let area = '';

			if (transaction.admission && transaction.admission.programStudy) {
				productName = Constant.TRANSACTION_PRODUCT_NAME[transaction.type] + ' - ' + transaction.admission.programStudy.studyLevel + ' ' + transaction.admission.programStudy.university.name;
				area = transaction.admission.programStudy.university.area;
			}

			exportData.push({
                transactionNumber: (transaction.transactionNumber) ? transaction.transactionNumber : "",
				email: (transaction.admission) ? transaction.admission.email : '',
				name: (transaction.admission) ? transaction.admission.name : '',
				
				type: transaction.type,
				bankProduct: paymentMethod ? paymentMethod.productName : '',
				productName: productName ? productName : '',
				totalPrice: (transaction.totalPrice) ? transaction.totalPrice : 0,
				status: Constant.TRANSACTION_STATUS[transaction.status],
				area: area,
				createdAt: transaction.createdAt
			});
		}
		
		if (exportTo === Constant.EXPORT_TYPE_CSV) {
            file = await ExportService.toCsv(filename, exportData, exportHeaders, 'Admission', true);
        } else if (exportTo === Constant.EXPORT_TYPE_EXCEL) {
            file = await ExportService.toExcel(filename, exportData, exportHeaders, 'Admission', true);
        }

        return file;
    }
}