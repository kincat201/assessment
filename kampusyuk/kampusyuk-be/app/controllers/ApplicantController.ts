import { error, generateDefaultMapping, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import Sequelize, { Op } from 'sequelize';
import { Constant } from '../common/constant/Constant';
import { User } from '../common/model/User';
import { Admission } from '../common/model/Admission';
import { University } from '../common/model/University';
import { ProgramStudy } from '../common/model/ProgramStudy';
import { Country } from '../common/model/Country';
import { Transaction } from '../common/model/Transaction';
import { checkPayload, validate, validEmail } from '../common/util/Validation';
import { Student } from '../common/model/Student';
import { defaultValue } from '../common/util/CommonUtil';
import { EspayService } from '../common/service/EspayService';
import moment = require('moment');

@JsonController()
export class ApplicantController {
	@Post('/applicant/list')
	async getApplicantList(@Body() input: any, @Req() req: any) {

		let datas;

		const allowedFilter = ['search','applyDateFrom','applyDateTo'];
		const allowedOrder = ['id','name','email','createdAt'];
		const searchField = ['name','email','id'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {
			"applyDateFrom":"createdAt",
			"applyDateTo":"createdAt"
		}, searchField);
		option['attributes'] = [
			'id',
			'name',
			'email',
			['createdAt','applyDate'],
			[
				Sequelize.literal(
					'(SELECT COUNT(admission.id) FROM admission WHERE userId = `User`.`id`)'
				),
				'application'
			]
		];
		option['where']['deletedAt'] = null;
		option['where']['role'] = Constant.USER_ROLE_STUDENT;

		datas = await User.findAndCountAll(option);
		const results = generateDefaultMapping(datas.rows);
		results.map( (user,index) =>{
			results[index]['paymentOverdue'] = 0;
		});

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Get('/applicant/details/:id')
	async getApplicantDetails( @Param('id') id: number, @Req() req: any ) {
		let user;
		let result;
		const option = {};
		option['attributes'] = ['id','name','email','phone','createdAt'];
		option['where'] = { 'id' : id };

		option['include'] = [Student];
		user = await User.findOne(option);

		if(!user) return error('applicant not found');

		result = {
			id : user.id,
			name : user.name,
			email : user.email,
			phone : user.phone,
			address: defaultValue(user.student.address),
			birthDate: defaultValue(user.student.birthDate),
			birthPlace: defaultValue(user.student.birthPlace),
			gender: defaultValue(user.student.gender),
			schoolFrom: defaultValue(user.student.schoolFrom),
			universityFrom: defaultValue(user.student.universityFrom),
			createdAt : user.createdAt,
			updatedAt : user.updatedAt,
		}

		return success(result);
	}

	@Patch('/applicant/update/:id')
	async userUpdate(@Param('id') id: number, @Body() input: any, @Req() req: any) {
		const check = await validate(input,['name','phone','address','birthDate',
			'birthPlace','gender','schoolFrom','universityFrom']);

		if(!check.status) return error(check.message);

		const	user = await User.findOne({
			where:{ 'id' : id, 'deletedAt' : null },
			include:[Student]
		});
		if(!user) return error('applicant not found');

		user.name = input.name;
		user.email = input.email;
		user.phone = input.phone;

		user.updatedBy = req.user.id;
		user.updatedAt = moment().toDate();
		await user.save();

		user.student.address = input.address;
		user.student.birthDate = input.birthDate;
		user.student.birthPlace = input.birthPlace;
		user.student.gender = input.gender;
		user.student.schoolFrom = input.schoolFrom;
		user.student.universityFrom = input.universityFrom;
		await user.student.save();

		return success('success update applicant');
	}

	@Delete('/applicant/delete/:id')
	async userDelete(@Param('id') id: number, @Req() req: any) {
		if(req.user.id === id) return error('can\'t delete your self');

		const	user = await User.findOne({where:{ 'id' : id }});
		if(!user) return error('applicant not found');
		user.deletedAt = new Date();
		user.deletedBy = id;
		user.save();

		return success('success delete applicant');
	}

	@Post('/applicant/application/history')
	async applicationHistory(@Body() input: any, @Req() req: any) {
		let datas;

		const allowedFilter = ['search', 'userId', 'universityId', 'programStudyId', 'registrationFee', 'tuitionFee'];
		const allowedOrder = ['id', 'registrationId', 'createdAt'];
		const searchField = ['registrationId', 'name', 'email', 'id'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);

		option['attributes'] = ['id', 'registrationId', 'name', 'phone', 'registrationFee', 'tuitionFee', 'status', 'createdAt'];

		option['include'] = [
			{
				model: ProgramStudy,
				required: false,
				where: {
					deletedAt: null
				},
				attributes: ['id', 'name', 'studyLevel'],
                include: [
                    {
                        model: University,
                        required: false,
                        where: {
                            deletedAt: null
                        },
                        attributes: ['id', 'name'],
						include: [
							{
								model: Country,
								required: false,
								where: {
									deletedAt: null
								},
								attributes: ['id', 'name'],
							}
						]
                    }
                ]
			}
		]

		if(option['where']['universityId']){
			option['where']['$programStudy.universityId$']=option['where']['universityId'];
			delete option['where']['universityId'];
		}

		option['where']['deletedAt'] = null;

		datas = await Admission.findAndCountAll(option);

		const results = [];
		datas.rows.map(data => {
			results.push({
				id: data.id,
				registrationId: (data.registrationId)?data.registrationId:"",
				name: data.name,
				phone: data.phone,
				programStudyName: data.programStudy ? data.programStudy.name : 'N/A',
				studyLevel: data.programStudy ? data.programStudy.studyLevel : 'N/A',
				universityName: data.programStudy && data.programStudy.university ? data.programStudy.university.name : 'N/A',
				country: data.programStudy && data.programStudy.university ? data.programStudy.university.country.name : 'N/A',
				registrationFee: (data.registrationFee)?data.registrationFee:Constant.PAYMENT_UNPAID,
				tuitionFee: (data.tuitionFee)?data.tuitionFee:Constant.PAYMENT_UNPAID,
				status: (data.status)?data.status:Constant.ADMISSION_STATUS_NONE,
				createdBy: data.createdBy,
				createdAt: data.createdAt
			});
		});

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Post('/applicant/transaction/history')
	async transactionHistory(@Body() input: any, @Req() req: any) {
		let datas;

		const allowedFilter = ['search', 'userId', 'bankProduct', 'status'];
		const allowedOrder = ['id', 'transactionNumber', 'createdAt'];
		const searchField = ['transactionNumber', 'id'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);

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
            }
        ];

		option['where']['deletedAt'] = null;

		datas = await Transaction.findAndCountAll(option);

		const results = [];
		for (const data of datas.rows) {  
			let paymentMethod = await EspayService.getChannelDetailByBankProduct(data.bankProduct);
			let productName = '';

			if (data.type == Constant.TRANSACTION_TYPE_ADMISSION) {
				productName = Constant.TRANSACTION_PRODUCT_NAME[data.type] + ' - ' + data.admission.programStudy.studyLevel + ' ' + data.admission.programStudy.university.name;
			}

			results.push({
				id: data.id,
				transactionNumber: (data.transactionNumber) ? data.transactionNumber : "",
				type: data.type,
				admissionId: (data.admissionId) ? data.admissionId : '',
				assessmentId: (data.assessmentId) ? data.assessmentId : '',
				bankProduct: paymentMethod.productName,
				productName: productName,
				totalPrice: (data.totalPrice) ? data.totalPrice : 0,
				status: Constant.TRANSACTION_STATUS[data.status],
				area: (data.admission) ? data.admission.programStudy.university.area : '',
				createdBy: data.createdBy,
				createdAt: data.createdAt
			});
		};

		return success(await generateResponseList(input , option, results, datas.count, false));
	}
}
