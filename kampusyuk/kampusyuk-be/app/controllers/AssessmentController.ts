import { Env, error, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Req } from '@wavecore/routing-controllers';
import { Constant } from '../common/constant/Constant';
import { EspayConstant } from '../common/constant/EspayConstant';
import { Assessment } from '../common/model/Assessment';
import { Transaction } from '../common/model/Transaction';
import { User } from '../common/model/User';
import { FileService } from '../common/service/FileService';
import { ValidatorService } from '../common/service/ValidatorService';
import { EspayService } from '../common/service/EspayService';
import { checkPayload } from '../common/util/Validation';
import { Comparator } from '../common/util/Comparator';
import { AssessmentService } from '../common/service/AssessmentService';
import fileType = require('file-type');

@JsonController()
export class AssessmentController {
	@Post('/assessment/list')
	async getAssessmentList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = ['search', 'dateFrom','dateTo','status','paymentStatus'];
		const allowedOrder = ['id', 'name', 'email', 'phone', 'classType', 'registrationType', 'createdBy', 'createdAt'];
		const searchField = ['name','assessmentNo','$user.email$','status'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {
			"dateFrom":"createdAt",
			"dateTo":"createdAt"
		}, searchField);
		option['where']['deletedAt'] = null;
		option['attributes'] = [
			'id', 'hash', 'assessmentNo', 'name', 'gender', 'dateOfBirth', 'schoolName', 'schoolClass', 'field', 'hopes', 'status', 'paymentStatus','testDate', 'createdBy', 'createdAt'
		];

		option['include'] = [
			{
				model: Transaction,
				attributes: ['id', 'paymentAmount', 'espayStatus', 'espayReason', 'createdAt']
			},
			{
				model: User,
				attributes: ['id', 'email']
			}
		];

		const exportAssessment: boolean = input.exportTo && input.exportTo.length > 0;

		if (exportAssessment) {
			delete option.limit;
			delete option.offset;
			option.order = [['id', 'ASC']];
		}

		datas = await Assessment.findAndCountAll(option);

		if (exportAssessment) {
			const validExport = [Constant.EXPORT_TYPE_CSV, Constant.EXPORT_TYPE_EXCEL];
			if (!validExport.includes(input.exportTo)) {
				return error(
					`Invalid export type. It should ${validExport.join(' or ')}`
				);
			}

			const file: any = await AssessmentService.exportAssessment(datas.rows, input.exportTo, req);
			const extension = fileType(file.buffer);
			const filepath = await FileService.store(file.buffer, extension.ext);

			return success(FileService.getFileUrl(filepath,'temp'));
		}

		const results = [];
		datas.rows.map(data => {
			let transaction = {};

			if (data.transaction) {
				transaction = {
					id: data.transaction.id,
					amount: (data.transaction.paymentAmount) ? data.transaction.paymentAmount : 0,
					status: (data.transaction.status) ? Constant.TRANSACTION_STATUS[ data.transaction.status] : '',
					espayStatus: (data.transaction.espayStatus) ? EspayConstant.TX_STATUS_LABELS[data.transaction.espayStatus] : '',
					espayReason: (data.transaction.espayReason) ? data.transaction.espayReason : '',
					createdAt: data.createdAt
				}
			}

			results.push({
				id: data.id,
				hash: data.hash,
				assessmentNo: data.assessmentNo,
				email: data.user.email,
				name: data.name,
				status: data.status,
				paymentStatus: data.paymentStatus,
				testDate: data.testDate,
				createdBy: data.createdBy,
				createdAt: data.createdAt,
				transaction: transaction
			});
		});

		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Get('/assessment/details/:id')
	async getAssessmentDetails(@Param('id') id: number, @Req() req: any) {
		if(!ValidatorService.isId(id)){
			return error("id format incorrect!");
		}

		let data;
		const result={};

		const option = {};
		option['where'] = { id };
		option['include'] = [
			{
				model: User,
				attributes: ['id', 'email']
			}, {
				model: Transaction,
				attributes: ['id', 'paymentAmount', 'paymentDate', 'bankProduct', 'espayStatus', 'espayReason', 'createdAt']
			}
		];

		data = await Assessment.findOne(option);

		if (!data) return error('Assessment not found');

		result['id' ] = data.id;
		result['hash' ] = data.hash;
		result['assessmentNo' ] = data.assessmentNo;
		result['name' ] = data.name;
		result['email' ] = data.user.email;
		result['gender' ] = data.gender;
		result['dateOfBirth' ] = data.dateOfBirth;
		result['schoolName' ] = data.schoolName;
		result['schoolClass' ] = data.schoolClass;
		result['field' ] = data.field;
		result['hopes' ] = data.hopes;
		result['status' ] = data.status;
		result['paymentStatus' ] = data.paymentStatus;
		result['testDate' ] = data.testDate;
		result['createdAt' ] = data.createdAt;

		result['transaction'] = {};
		if (data.transaction) {
			let paymentMethod = await EspayService.getChannelDetailByBankProduct(data.transaction.bankProduct);

			result['transaction'] = {
				id: data.transaction.id,
				amount: (data.transaction.paymentAmount) ? data.transaction.paymentAmount : 0,
				espayStatus: (data.transaction.espayStatus) ? EspayConstant.TX_STATUS_LABELS[data.transaction.espayStatus] : '',
				espayReason: (data.transaction.espayReason) ? data.transaction.espayReason : '',
				paymentDate: data.transaction.paymentDate,
				paymentMethod: paymentMethod.productName,
				createdAt: data.createdAt
			}
		}

		return success(result);
	}
}
