import { CoreRedis, error, errorCode, MongoDBService, success, generateDefaultMapping, generateDefaultOption, generateResponseList } from '@wavecore/core-node';
import { Body, JsonController, Post, Delete, Param, Req } from '@wavecore/routing-controllers';
import { Constant } from '../common/constant/Constant';
import { Transaction } from '../common/model/Transaction';
import { User } from '../common/model/User';
import { Admission } from '../common/model/Admission';
import { Assessment } from '../common/model/Assessment';
import { University } from '../common/model/University';
import { ProgramStudy } from '../common/model/ProgramStudy';
import { EspayService } from '../common/service/EspayService';
import { checkPayload, validate, validEmail } from '../common/util/Validation';
import { ValidatorService } from '../common/service/ValidatorService';
import { FileService } from '../common/service/FileService';
import { TransactionService } from '../common/service/TransactionService';
import fileType = require('file-type');

@JsonController()
export class TransactionController {

  @Post('/transaction/list')
  async create(@Body() input, @Req() req) {
        let datas;

		const allowedFilter = ['search', 'dateFrom', 'dateTo', 'status'];
		const allowedOrder = ['id', 'transactionNumber', 'createdAt'];
		const searchField = ['transactionNumber', '$admission.email$', 'id', '$admission.programStudy.university.name$', 'status'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {
			"dateFrom":"createdAt",
			"dateTo":"createdAt"
		}, searchField);

		option['attributes'] = ['id', 'type', 'admissionId', 'assessmentId', 'transactionNumber', 'bankProduct', 'totalPrice', 'status', 'createdAt', 'createdBy'];

		option['include'] = [
            {
                model: Admission,
				required: false,
				where: {
					deletedAt: null
				},
				include: [
                    {
                        model: ProgramStudy,
                        required: false,
                        where: {
                            deletedAt: null
                        },
                        attributes: ['id', 'studyLevel'],
                        include: [
                            {
                                model: University,
                                required: false,
                                where: {
                                    deletedAt: null
                                },
                                attributes: ['id', 'name', 'area']
                            }
                        ]
                    }
                ]
			},
			{
				model: Assessment,
				required: false,
				include: [
					{
						model: User,
						required: false,
					}
				]
			}
        ];

		option['where']['deletedAt'] = null;

		const exportTransaction: boolean = input.exportTo && input.exportTo.length > 0;

		if (exportTransaction) {
			delete option.limit;
			delete option.offset;
			option.order = [['id', 'ASC']];
		}

		datas = await Transaction.findAndCountAll(option);

		if (exportTransaction) {
			const validExport = [Constant.EXPORT_TYPE_CSV, Constant.EXPORT_TYPE_EXCEL];
			if (!validExport.includes(input.exportTo)) {
				return error(
					`Invalid export type. It should ${validExport.join(' or ')}`
				);
			}

			const file: any = await TransactionService.exportTransactions(datas.rows, input.exportTo, req);
			const extension = fileType(file.buffer);
			const filepath = await FileService.store(file.buffer, extension.ext);

			return success(FileService.getFileUrl(filepath,'temp'));
		}

		const results = [];
		for (const data of datas.rows) {  
            let paymentMethod = await EspayService.getChannelDetailByBankProduct(data.bankProduct);
			let productName = '';
			let email = '';

			if (data.admission && data.admission.programStudy) {
				productName = Constant.TRANSACTION_PRODUCT_NAME[data.type] + ' - ' + data.admission.programStudy.studyLevel + ' ' + data.admission.programStudy.university.name;
				email = data.admission.email;
			} 
			
			if (data.assessment) {
				productName = Constant.TRANSACTION_PRODUCT_NAME[data.type];
				email = data.assessment.user.email;
			}

			results.push({
                id: data.id,
                email: email,
				transactionNumber: (data.transactionNumber) ? data.transactionNumber : "",
				type: data.type,
				admissionId: (data.admissionId) ? data.admissionId : '',
				assessmentId: (data.assessmentId) ? data.assessmentId : '',
				bankProduct: paymentMethod ? paymentMethod.productName : '',
				productName: productName ? productName : '',
				totalPrice: (data.totalPrice) ? data.totalPrice : 0,
				status: Constant.TRANSACTION_STATUS[data.status],
				area: (data.admission) ? data.admission.programStudy.university.area : '',
				createdBy: data.createdBy,
				createdAt: data.createdAt
			});
		};

		return success(await generateResponseList(input , option, results, datas.count, false));
  }

  @Delete("/transaction/delete/:id")
	async delete(@Param('id') id: number){
		if(!ValidatorService.isId(id)){
			return error("id format incorrect!");
		}

		const transaction = await Transaction.findOne({
			where:{id}
		});

		if(!transaction){return error("instance not found!");}

		transaction.destroy();
		
		return success("success delete!");
	}
}

