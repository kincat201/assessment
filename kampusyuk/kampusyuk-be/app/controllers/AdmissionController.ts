import { Env, error, generateDefaultOption, generateResponseList, generateDefaultMapping, success } from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Req } from '@wavecore/routing-controllers';
import { Constant } from '../common/constant/Constant';
import { EspayConstant } from '../common/constant/EspayConstant';
import { User } from '../common/model/User';
import { Admission } from '../common/model/Admission';
import { Faculty } from '../common/model/Faculty';
import { ProgramStudy } from '../common/model/ProgramStudy';
import { University } from '../common/model/University';
import { Scholarship } from '../common/model/Scholarship';
import { Transaction } from '../common/model/Transaction';
import { ScholarshipProvider } from '../common/model/ScholarshipProvider';
import { FileService } from '../common/service/FileService';
import { ValidatorService } from '../common/service/ValidatorService';
import { checkPayload } from '../common/util/Validation';
import { Comparator } from '../common/util/Comparator';
import { Country } from '../common/model/Country';
import { City } from '../common/model/City';
import { AdmissionService } from '../common/service/AdmissionService';
import fileType = require('file-type');
import * as envData from '../../config/Env.json';
import moment = require('moment');
import { default as sequelize, Op } from 'sequelize';
import { getWhatChanged } from '../common/util/CommonUtil';

@JsonController()
export class AdmissionController {
	@Post('/admission/list')
	async getAdmissionList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = ['search','userId','universityId','registrationId','programStudyId','registrationFee','tuitionFee',
			'dateFrom','dateTo','area','countryId','status','paymentStatus'];
		const allowedOrder = ['id', 'name', 'email', 'phone', 'classType', 'registrationType', 'createdBy', 'createdAt'];
		const searchField = ['name', 'email','registrationId', 'phone','status'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {
			"dateFrom":"createdAt",
			"dateTo":"createdAt"
		}, searchField);
		option['where']['deletedAt'] = null;
		option['attributes'] = [
			'id', 'registrationId', 'name', 'email', 'phone', 'classType', 'registrationType',
			'registrationFee', 'tuitionFee','submitDocument', 'takingExam', 'status', 'createdBy', 
			'progressRegistration', 'progressTest', 'progressAcceptance', 'progressRemark', 'createdAt'
		];

		option['include'] = [
			{
				model: ProgramStudy,
				as:"programStudy",
				attributes: ['id', 'name', 'studyLevel', 'paymentRequired'],
				include: [
					{
						model: University,
						as:"university",
						attributes: ['id', 'name','countryId', 'area'],
						include: [
							{
								model : Country,
								attributes : ['id','name','currency']
							},
							{
								model : City,
								attributes : ['id','name','types']
							}
						]
					}
				]
			}, {
				model: Transaction,
				attributes: ['id', 'paymentAmount', 'espayStatus', 'espayReason','status', 'createdAt']
			}
		];

		if(option['where']['universityId']){
			option['where']['$programStudy.universityId$']=option['where']['universityId'];
			delete option['where']['universityId'];
		}

		if(option['where']['area']){
			option['where']['$programStudy.university.area$']=option['where']['area'];
			delete option['where']['area'];
		}

		if(option['where']['countryId']){
			option['where']['$programStudy.university.countryId$']=option['where']['countryId'];
			delete option['where']['countryId'];
		}

		if(option['where']['paymentStatus']){
			option['where']['$transaction.status$']=option['where']['paymentStatus'];
			delete option['where']['paymentStatus'];
		}

		const exportAdmission: boolean = input.exportTo && input.exportTo.length > 0;

		if (exportAdmission) {
			delete option.limit;
			delete option.offset;
			option.order = [['id', 'ASC']];
		}

		datas = await Admission.findAndCountAll(option);

		if (exportAdmission) {
			const validExport = [Constant.EXPORT_TYPE_CSV, Constant.EXPORT_TYPE_EXCEL];
			if (!validExport.includes(input.exportTo)) {
				return error(
					`Invalid export type. It should ${validExport.join(' or ')}`
				);
			}

			const file: any = await AdmissionService.exportAdmissions(datas.rows, input.exportTo, req);
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

			const progressRegistration = data.progressRegistration ? JSON.parse(data.progressRegistration): {};

            if (progressRegistration) {
                if (progressRegistration.attachment && progressRegistration.attachment.length > 0) {
                    progressRegistration.attachment.forEach(function(data, index) {
                        progressRegistration.attachment[index] = {
                            fullPath: FileService.getFileUrl(progressRegistration.attachment[index].file),
                            file: progressRegistration.attachment[index].file.replace("program_study/attachment/","")
                        }
                    });
                }
			}
			
			let registrationFeeStatus = 'N/A';

			if(data.programStudy && data.programStudy.paymentRequired == Constant.LABEL_YESNO_TRUE) {
				if (data.transaction) {
					registrationFeeStatus = (data.transaction.status) ? Constant.TRANSACTION_STATUS[ data.transaction.status] : '';
				}
			}

			results.push({
				id: data.id,
				registrationId: (data.registrationId)?data.registrationId:"",
				name: data.name,
				email: data.email,
				phone: data.phone,
				classType: data.classType,
				registrationType: data.registrationType,
				programStudyName: data.programStudy ? data.programStudy.name : 'N/A',
				studyLevel: data.programStudy ? data.programStudy.studyLevel : 'N/A',
				universityName: data.programStudy && data.programStudy.university ? data.programStudy.university.name : 'N/A',
				universityArea: data.programStudy && data.programStudy.university ? data.programStudy.university.area : 'N/A',
				country: data.programStudy && data.programStudy.university ? data.programStudy.university.country.name : 'N/A',
				city: data.programStudy && data.programStudy.university ? data.programStudy.university.city.name : 'N/A',
				registrationFee: registrationFeeStatus,
				tuitionFee: (data.tuitionFee) ? Constant.PAYMENT_STATUS_LIST[data.tuitionFee] : "N/A",
				submitDocument: data.submitDocument,
				takingExam: data.takingExam,
				status: data.status,
				createdBy: data.createdBy,
				createdAt: data.createdAt,
				transaction: transaction,
				progressRegistration: progressRegistration,
				progressTest: data.progressTest ? JSON.parse(data.progressTest) : '',
                progressAcceptance: data.progressAcceptance ? JSON.parse(data.progressAcceptance) : '',
                progressRemark: data.progressRemark ? data.progressRemark : ''
			});
		});

		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Get('/admission/details/:id')
	async getAdmissionDetails(@Param('id') id: number, @Req() req: any) {
		if(!ValidatorService.isId(id)){
			return error("id format incorrect!");
		}
		let data;
		const result={};
		const option = {};
		option['where'] = { id };
		option['include'] = [
			{
				model: ProgramStudy,
				attributes: ['id', 'name','studyLevel','paymentRequired'],
				include: [
					{
						model: University,
						attributes: ['id', 'name']
					},
					{
						model:Faculty,
						attributes: ['id','name']
					}
				]
			}, {
				model: Scholarship,
				required: false,
				attributes: ['id', 'name'],
				include: [{
					model: ScholarshipProvider,
					attributes: ['name']
				}]
			}, {
				model: Transaction,
				attributes: ['id', 'paymentAmount', 'espayStatus', 'espayReason', 'createdAt']
			}
		];
		data = await Admission.findOne(option);
		if (!data || !data.programStudy) return error('Admission not found');

		result['id']=data.id;
		result['registrationId']=(data.registrationId)?data.registrationId:"";
		result['name']=data.name;
		result['email']=data.email;
		result['phone']=data.phone;
		result['universityId']=data.programStudy.university.id;
		result['universityName']=data.programStudy.university.name;
		result['facultyId']=data.programStudy.faculty.id;
		result['facultyName']=data.programStudy.faculty.name;
		result['programStudyId']=data.programStudy.id;
		result['programStudyName']=data.programStudy.name;
		result['classType']=data.classType;
		result['schoolFrom']=data.schoolFrom;
		result['englishProficiency']=data.englishProficiency;
		result['jobTitle']=data.jobTitle;
		result['graduateUniversity']=data.graduateUniversity;
		result['registrationType']=data.registrationType;
		result['studyLevel']=data.programStudy.studyLevel;
		result['paymentRequired']=data.programStudy.paymentRequired;
		result['registrationFee']=data.registrationFee;
		result['registrationFeeDate']=data.registrationFeeDate;
		result['registrationFeeMethod']=(data.registrationFeeMethod)?data.registrationFeeMethod:"";
		if(data.registrationAttachment) {
			result['registrationAttachment'] = {
				image: (data.registrationAttachment) ? data.registrationAttachment : "",
				fullPath: FileService.getFileUrl(data.registrationAttachment, Constant.IMAGE_PATH.ADMISSION_REGISTRATION)
			};
		} else {
			result['registrationAttachment'] = null;
		}
		result['tuitionFee']=data.tuitionFee;
		result['tuitionFeeDate']=data.tuitionFeeDate;
		result['tuitionFeeMethod']=(data.tuitionFeeMethod)?data.tuitionFeeMethod:"";
		if(data.tuitionAttachment) {
			result['tuitionAttachment'] = {
				image: (data.tuitionAttachment) ? data.tuitionAttachment : "",
				fullPath: FileService.getFileUrl(data.tuitionAttachment, Constant.IMAGE_PATH.ADMISSION_TUITION)
			};
		} else {
			result['tuitionAttachment']=null
		}
		result['submitDocument']=data.submitDocument;
		result['takingExam']=data.takingExam;
		result['status']=data.status;
		result['date']=data.createdAt;
		result['scholarshipName'] = (data.scholarship) ? data.scholarship.name : '';
		result['scholarshipProvider'] = (data.scholarship) ? data.scholarship.scholarshipProvider.name : '';

		result['transaction'] = {};
		if (data.transaction) {
			result['transaction'] = {
				id: data.transaction.id,
				amount: (data.transaction.paymentAmount) ? data.transaction.paymentAmount : 0,
				espayStatus: (data.transaction.espayStatus) ? EspayConstant.TX_STATUS_LABELS[data.transaction.espayStatus] : '',
				espayReason: (data.transaction.espayReason) ? data.transaction.espayReason : '',
				createdAt: data.createdAt
			}
		}

		const progressRegistration = data.progressRegistration ? JSON.parse(data.progressRegistration): {};

		if (progressRegistration) {
			if (progressRegistration.attachment && progressRegistration.attachment.length > 0) {
				progressRegistration.attachment.forEach(function(data, index) {
					progressRegistration.attachment[index] = {
						fullPath: FileService.getFileUrl(progressRegistration.attachment[index].file),
						file: progressRegistration.attachment[index].file.replace("program_study/attachment/","")
					}
				});
			}
		}

		result['progressRegistration'] = progressRegistration ? progressRegistration : '';
		result['progressTest'] = data.progressTest ? JSON.parse(data.progressTest): '';
		result['progressAcceptance'] = data.progressAcceptance ? JSON.parse(data.progressAcceptance) : '';
		result['progressRemark'] = data.progressRemark ? data.progressRemark : '';

		// result = await generateDefaultMappingRow(data);
		return success(result);
	}

	@Patch("/admission/update/:id")
	async update(@Body() input: any, @Req() req: any, @Param('id') id: number){
		if(!ValidatorService.isId(id)){
			return error("id format incorrect!");
		}
		const admission = await Admission.findOne({
			where:{id}
		});
		if(!admission){return error("instance not found!");}
		if(input.registrationAttachment){
			await FileService.move(input.registrationAttachment,Constant.IMAGE_PATH.ADMISSION_REGISTRATION);
		}
		if(input.tuitionAttachment){
			await FileService.move(input.tuitionAttachment,Constant.IMAGE_PATH.ADMISSION_TUITION);
		}

		const progressRegistration = JSON.parse(admission.progressRegistration);

		if (input.progressRegistration.attachment && input.progressRegistration.attachment.length > 0) {
			const filesFromDB = progressRegistration.attachment.map(attachment => attachment.file);
			const files = input.progressRegistration.attachment.map(attachment => `program_study/attachment/${attachment.file}`);

			const getChangedFile = getWhatChanged(filesFromDB, files);
			getChangedFile.shouldRemove.map(file => {
				const oldPath = envData.directorySettings.storagePath + '/' + file;
				if (FileService.isExist(oldPath)) {
					FileService.delete(oldPath);
				}
			})

			getChangedFile.shouldAdd.map(file => {
				const filename = file.replace('program_study/attachment/', '');
				FileService.move(filename, 'program_study/attachment');
			});

			input.progressRegistration.attachment = input.progressRegistration.attachment.map(attachment => {
				return {
					file: "program_study/attachment/" + attachment.file
				}
			});
		}

		await admission.update({
			name:input.name,
			email:input.email,
			phone:input.phone,
			programStudyId:input.programStudyId,
			schoolFrom: input.schoolFrom ? input.schoolFrom : null,
			englishProficiency: input.englishProficiency ? input.englishProficiency : null,
			jobTitle: input.jobTitle ? input.jobTitle : null,
			graduateUniversity: input.graduateUniversity ? input.graduateUniversity : null,
			status: input.status ? input.status : Constant.ADMISSION_STATUS_NONE,
			registrationFee:input.registrationFee,
			registrationFeeDate:input.registrationFeeDate,
			registrationFeeMethod:input.registrationFeeMethod,
			registrationAttachment:input.registrationAttachment,
			tuitionFee:input.tuitionFee,
			tuitionFeeDate:input.tuitionFeeDate,
			tuitionFeeMethod:input.tuitionFeeMethod,
			tuitionAttachment:input.tuitionAttachment,
			registrationType:input.registrationType,
			classType:input.classType,
			submitDocument:input.submitDocument,
			takingExam:input.takingExam,
			progressRegistration: JSON.stringify(input.progressRegistration),
			progressTest: JSON.stringify(input.progressTest),
			progressAcceptance: JSON.stringify(input.progressAcceptance),
			progressRemark: input.progressRemark
		});

		return success("success update!");
	}

	@Delete("/admission/delete/:id")
	async delete(@Param('id`') id: number){
		if(!ValidatorService.isId(id)){
			return error("id format incorrect!");
		}
		const admission=await Admission.findOne({
			where:{id}
		});
		if(!admission){return error("instance not found!");}
		admission.destroy();
		return success("success delete!");
	}

	@Get("/admission/set/:id/:component/:status")
	async setIndividually(@Param("id") id:number,@Param("component") component:string,@Param("status") status:string){
		if(!ValidatorService.isId(id)){
			return error("id format wrong!");
		}
		if(!ValidatorService.isAlphabetical(component)){
			return error("wrong input format!");
		}
		if(!Comparator.isEqualEitherTo(component,"status")){
			return error("component input must be status!");
		}
		if(!Comparator.isEqualEitherTo(status,
			Constant.ADMISSION_STATUS_NONE,Constant.ADMISSION_STATUS_PAID_REGISTRATION,
			Constant.ADMISSION_STATUS_UNPAID_REGISTRATION,Constant.ADMISSION_STATUS_UNPAID_TUITION,
			Constant.ADMISSION_STATUS_PAID_TUITION,Constant.ADMISSION_STATUS_SUBMIT_DOCUMENT,
			Constant.ADMISSION_STATUS_TAKING_EXAM,
		)){
			const allowedStatus = [];
			Object.keys(Constant.ADMISSION_STATUS_LIST).forEach(function eachKey(key) {
				allowedStatus.push(Constant.ADMISSION_STATUS_LIST[key]);
			});
			return error("status input must be " + allowedStatus.join(", "));
		}

		const admission=await Admission.findByPk(id);
		if(!admission) {return error("instance not found!");}
		if(Constant.ADMISSION_STATUS_NONE === status){
			admission.registrationFee = Constant.PAYMENT_UNPAID;
			admission.tuitionFee = Constant.PAYMENT_UNPAID;
		}else if(Constant.ADMISSION_STATUS_PAID_REGISTRATION === status){
			admission.registrationFee = Constant.PAYMENT_PAID;
		}else if(Constant.ADMISSION_STATUS_UNPAID_REGISTRATION === status){
			admission.registrationFee = Constant.PAYMENT_UNPAID;
		}else if(Constant.ADMISSION_STATUS_PAID_TUITION === status){
			admission.tuitionFee = Constant.PAYMENT_PAID;
		}else if(Constant.ADMISSION_STATUS_UNPAID_TUITION === status){
			admission.tuitionFee = Constant.PAYMENT_UNPAID;
		}
		admission.status = status;
		admission.save();
		return success("success update!");
	}

	@Get("/admission/updatestatus/:id/:status")
	async updateStatus(@Param("id") id:number, @Param("status") status:string) {
		if(!ValidatorService.isId(id)){
			return error("id format wrong!");
		}
		if(!Comparator.isEqualEitherTo(status,
			Constant.ADMISSION_STATUS_REGISTRATION,Constant.ADMISSION_STATUS_IN_PROGRESS,
			Constant.ADMISSION_STATUS_COMPLETED,Constant.ADMISSION_STATUS_NOT_QUALIFIED,
			Constant.ADMISSION_STATUS_FAILED
		)){
			const allowedStatus = [];
			Object.keys(Constant.ADMISSION_STATUS_LABELS).forEach(function eachKey(key) {
				allowedStatus.push(Constant.ADMISSION_STATUS_LABELS[key]);
			});
			return error("status input must be " + allowedStatus.join(", "));
		}

		const admission = await Admission.findByPk(id);

		if(!admission) {
			return error("admission not found!");
		}

		admission.status = status;
		await admission.save();
		return success("success update!");
	}

	@Post("/admission/report/snapshot")
    async reportSnapshot(@Body() input:any, @Req() req: any) {
        if (!input.range) return error('Range required.');
		if (!input.area) return error('Area required.');
		
		if ((input.range == 'CUSTOM') && (!input.startDate || !input.endDate)) return error('Start/End Date required.');

		const getDateRange = await AdmissionService.getDateRange(input.range, input.startDate, input.endDate);

		const whereOptions = [];

		if (input.range !== 'ALL') {
			whereOptions.push({
				createdAt: {
					[Op.between]: [getDateRange.startDate, getDateRange.endDate]
				}
			});
		}

		if (input.area !== 'ALL') {
			whereOptions.push({
				'$programStudy.university.area$': input.area
			});
		}

		const admission = await Admission.findAll({
			attributes: ['id', 'status', 'createdAt'],
			where: {
				[Op.and]: whereOptions
			},
			include: [
				{
					model: ProgramStudy,
					as:"programStudy",
					attributes: ['id', 'paymentRequired'],
					include: [
						{
							model: University,
							as:"university",
							attributes: ['id', 'area']
						}
					]
				}
			]
		});
		

		var prevAdmission = [];

		const needPrev = ['TODAY', 'WEEK', 'MONTH'];

		if (needPrev.includes(input.range)) {
			const prevWhereOptions = [];

			if (input.range !== 'ALL') {
				prevWhereOptions.push({
					createdAt: {
						[Op.between]: [getDateRange.prevStartDate, getDateRange.prevEndDate]
					}
				});
			}

			if (input.area !== 'ALL') {
				prevWhereOptions.push({
					'$programStudy.university.area$': input.area
				});
			}

			prevAdmission = await Admission.findAll({
				attributes: ['id', 'status', 'createdAt'],
				where: {
					[Op.and]: prevWhereOptions
				},
				include: [
					{
						model: ProgramStudy,
						as:"programStudy",
						attributes: ['id', 'paymentRequired'],
						include: [
							{
								model: University,
								as:"university",
								attributes: ['id', 'area']
							}
						]
					}
				]
			});
		}
		
		const result = await AdmissionService.getSnapshotDate(admission, prevAdmission);

        return success(result);
	}
	
	@Post("/admission/report/list")
	async reportList(@Body() input:any, @Req() req: any) {
		let datas;
		const allowedFilter = ['search', 'area', 'range', 'startDate', 'endDate', 'status', 'paymentRequired'];
		const allowedOrder = ['id', 'createdAt'];
		const searchField = ['name', 'email', 'registrationId', 'phone', 'status'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		if ((input.filter.range == 'CUSTOM') && (!input.filter.startDate || !input.filter.endDate)) return error('Start/End Date required.');
		const getDateRange = await AdmissionService.getDateRange(input.filter.range, input.filter.startDate, input.filter.endDate);

		const option = generateDefaultOption(input, {}, searchField);
		option['where']['deletedAt'] = null;
		option['attributes'] = [
			'id', 'registrationId', 'name', 'email', 'phone', 'tuitionFee', 'createdAt'
		];

		option['include'] = [
			{
				model: ProgramStudy,
				as:"programStudy",
				attributes: ['id', 'name', 'studyLevel', 'paymentRequired'],
				include: [
					{
						model: University,
						as:"university",
						attributes: ['id', 'name', 'countryId', 'area']
					}
				]
			}, {
				model: Transaction,
				attributes: ['id', 'paymentAmount', 'espayStatus', 'espayReason', 'status', 'createdAt']
			}, {
				model: User,
				attributes: ['id', 'name']
			}
		];

		if(option['where']['area']){
			if (input.filter.area !== 'ALL') {
				option['where']['$programStudy.university.area$'] = option['where']['area'];
			}
			delete option['where']['area'];
		}

		if(option['where']['paymentRequired']){
			option['where']['$programStudy.paymentRequired$'] = option['where']['paymentRequired'];
			delete option['where']['paymentRequired'];
		}

		if(option['where']['status']){
			if (input.filter.status == 'INTAKE') {
				option['where']['status'] = Constant.ADMISSION_STATUS_COMPLETED;
			} else if (input.filter.status == 'FAILED') {
				option['where']['status'] = {
					[Op.in]: [
						Constant.ADMISSION_STATUS_FAILED,
						Constant.ADMISSION_STATUS_CANCELLED
					]
				}
			} else if (input.filter.status == 'NOT_QUALIFIED') {
				option['where']['status'] = Constant.ADMISSION_STATUS_NOT_QUALIFIED;
			} else if (input.filter.status == 'PENDING') {
				option['where']['status'] = {
					[Op.in]: [
						Constant.ADMISSION_STATUS_NONE,
						Constant.ADMISSION_STATUS_REGISTRATION,
						Constant.ADMISSION_STATUS_IN_PROGRESS
					]
				}
			} else {
				delete option['where']['status'];
			}
		}

		if (option['where']['range']) {
			if (input.filter.range != 'ALL') {
				option['where']['createdAt'] = {
					[Op.between]: [getDateRange.startDate, getDateRange.endDate]
				}
			}
			
			delete option['where']['range'];
			delete option['where']['startDate'];
			delete option['where']['endDate'];
		}

		datas = await Admission.findAndCountAll(option);

		const results = [];
		for (const data of datas.rows) {
			let registrationFeeStatus = 'N/A';

			if(data.programStudy && data.programStudy.paymentRequired == Constant.LABEL_YESNO_TRUE) {
				if (data.transaction) {
					registrationFeeStatus = (data.transaction.status) ? Constant.TRANSACTION_STATUS[ data.transaction.status] : '';
				}
			}

			let progress = await AdmissionService.getProgressScore(data.id);

			results.push({
				id: data.id,
				registrationId: (data.registrationId)?data.registrationId:"",
				name: data.name,
				email: data.email,
				phone: data.phone,
				programStudyName: data.programStudy ? data.programStudy.name : 'N/A',
				universityName: data.programStudy && data.programStudy.university ? data.programStudy.university.name : 'N/A',
				universityArea: data.programStudy && data.programStudy.university ? data.programStudy.university.area : 'N/A',
				registrationFee: registrationFeeStatus,
				tuitionFee: (data.tuitionFee) ? Constant.PAYMENT_STATUS_LIST[data.tuitionFee] : "N/A",
				owner: (data.user) ? data.user.name : "N/A",
				requirement: progress,
				createdAt: data.createdAt
			});
		}

		return success(await generateResponseList(input, option, results, datas.count, false));
	}
}
