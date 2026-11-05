import { error, generateDefaultMapping, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success} from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import { Op } from 'sequelize';
import * as envData from '../../config/Env.json';
import { Faculty } from '../common/model/Faculty';
import { ProgramStudy } from '../common/model/ProgramStudy';
import { ProgramStudyCategory } from '../common/model/ProgramStudyCategory';
import { University } from '../common/model/University';
import { FileService } from '../common/service/FileService';
import * as _ from 'lodash';
import { checkPayload, validateInput } from '../common/util/Validation';
import { Constant } from '../common/constant/Constant';

@JsonController()
export class ProgramStudyController {
	@Post('/program_study/list')
	async getProgramStudyList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = ['search','id', 'universityId','facultyId','programStudyCategoryId'];
		const allowedOrder = ['id', 'name', 'registrationFee', 'universityId', 'facultyId' , 'registrationFormFee'];
		const searchField = ['id', 'name', 'registrationFee', 'registrationFormFee'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);
		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id', 'name', 'registrationFee', 'registrationFormFee', 'universityId', 'facultyId', 'programStudyCategoryId']
		option['include'] = [
			{
				model: Faculty,
				attributes: ['id', 'name']
			},
			{
				model: ProgramStudyCategory,
				attributes: ['id', 'name']
			},
			{
				model: University,
				attributes: ['id', 'name']
			}
		];

		option['distinct'] = true;
		option['where']['deletedAt'] = null;
		if(input.facultyId) option['where']['facultyId'] = input.facultyId;
		if(input.programStudyCategoryId) option['where']['programStudyCategoryId'] = input.programStudyCategoryId;

		datas = await ProgramStudy.findAndCountAll(option);
		const results = [];
		datas.rows.map((data) => {
            results.push({
                id: data.id,
                name: data.name,
                registrationFee: data.registrationFee,
                registrationFormFee: data.registrationFormFee,
                university: data.university.name,
                faculty: data.faculty.name,
                programStudyCategory: data.programStudyCategory.name
            });
		});

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Get('/program_study/details/:id')
	async getProgramStudyDetails( @Param('id') id: number, @Req() req: any ) {
		let data;
		let result;
		const option = {};
		option['where'] = {
			'id' : id,
			deletedAt : { [Op.eq] : null }
		};

		option['include'] = [
            {
				model: Faculty,
				attributes: ['id', 'name']
			},
			{
					model: ProgramStudyCategory,
					attributes: ['id', 'name']
			},
			{
				model: University,
				attributes: ['id', 'name','area']
			}
		];
		data = await ProgramStudy.findOne(option);
		if(!data) return error('Program Study not found');
		result = await generateDefaultMappingRow(data);
		result['facultyName'] = data.faculty.name;
		result['programStudyCategoryName'] = data.programStudyCategory.name;
		result['universityName'] = data.university.name;
		result['progressRegistration'] = JSON.parse(data.progressRegistration);
		result['progressTest'] = JSON.parse(data.progressTest);
		result['progressAcceptance'] = JSON.parse(data.progressAcceptance);
		result['progressRemark'] = data.progressRemark;
		
		['icon', 'thumbnail', 'banner'].forEach((imgName) => {
			if(result[imgName]) {
				result[imgName] = {
					fullPath:FileService.getFileUrl(result[imgName]),
					image:result[imgName].replace("program_study/" + imgName + "/","")
				};
			} else {
				result[imgName] = null;
			}
		});
		return success(result);
	}

	@Put('/program_study/create')
	async programStudyCreate(@Body() input: any, @Req() req: any) {
		const check = await validateInput(input, {
			name: 'string',
			metaTitle: 'string',
			metaDescription: 'string',
			description: 'string',
			studyLevel: 'string',
			website: 'string',
			registrationFee: 'number',
			registrationFormFee: 'number',
			regulerClass: 'string',
			staffClass: 'string',
			onlineClass: 'string',
			universityId: 'number',
			facultyId: 'number',
			programStudyCategoryId: 'number',
			paymentRequired: 'string',

			progressRegistration: 'string',
			progressTest: 'string',
			progressAcceptance: 'string',
			progressRemark: 'string'
		});
		
		if(!check.status) return error(check.message);
		['icon', 'thumbnail', 'banner'].forEach((imgName) => {
			if(input[imgName]){
				input[imgName] = FileService.move(input[imgName], 'program_study/' + imgName);
			}
		});

		if(typeof input.registrationFeeDiscount === 'string'){
			if(input.registrationFeeDiscount.length===0) {
				input.registrationFeeDiscount = 0;
			}
		}

		if(typeof input.registrationFormFeeDiscount === 'string'){
			if(input.registrationFormFeeDiscount.length===0) {
				input.registrationFormFeeDiscount = 0;
			}
		}

		// const progressRegistration = input.progressRegistration;

		// if (progressRegistration.completeDocument == Constant.LABEL_YESNO_TRUE && progressRegistration.attachment.length > 0) {
		// 	await progressRegistration.attachment.forEach(async function(data, index) {
		// 		input.progressRegistration.attachment[index].file = await FileService.move(input.progressRegistration.attachment[index].file, 'programstudy/attachment');
		// 	});
		// }

		input.progressRegistration = JSON.stringify(input.progressRegistration);
		input.progressTest = JSON.stringify(input.progressTest);
		input.progressAcceptance = JSON.stringify(input.progressAcceptance);

		const programStudy = await ProgramStudy.create(input);
		
		return success('success create program study');
	}

	@Patch('/program_study/update/:id')
	async programStudyUpdate(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		const check = await validateInput(input, {
			name: 'string',
			metaTitle: 'string',
			metaDescription: 'string',
			description: 'string',
			studyLevel: 'string',
			website: 'string',
			registrationFee: 'number',
			registrationFormFee: 'number',
			regulerClass: 'string',
			staffClass: 'string',
			onlineClass: 'string',
			universityId: 'number',
			facultyId: 'number',
			programStudyCategoryId: 'number',
			paymentRequired: 'string'
		});
		if(!check.status) return error(check.message);
		const programStudy = await ProgramStudy.findOne({where:{'id':id}});
		if(!programStudy) return error('Program Study not found!');
		['icon', 'thumbnail', 'banner'].forEach((imgName) => {
			if(!programStudy[imgName]){
				programStudy[imgName]='';
			}
			if(input[imgName] && programStudy[imgName].replace('program_study/' + imgName + '/', '') !== input[imgName]){
				const oldPath = envData.directorySettings.storagePath+'/'+programStudy[imgName];
				if(FileService.isExist(oldPath) && programStudy[imgName]) FileService.delete(oldPath);
				input[imgName] = FileService.move(input[imgName], 'program_study/' + imgName);
			} else {
				if(input[imgName]){
					input = _.omit(input,[imgName]);
				}
			}
		});

		input.progressRegistration = JSON.stringify(input.progressRegistration);
		input.progressTest = JSON.stringify(input.progressTest);
		input.progressAcceptance = JSON.stringify(input.progressAcceptance);

		input.registrationFormFeeDiscount = input.registrationFormFeeDiscount === '' ? 0 : input.registrationFormFeeDiscount;
		input.registrationFeeDiscount = input.registrationFeeDiscount === '' ? 0 : input.registrationFeeDiscount;
		programStudy.update(input,{where:{'id':id}});
		return success('success update program study');
	}

	@Delete('/program_study/delete/:id')
	async programStudyDelete(@Param('id') id: number, @Req() req: any) {
		const	programStudy = await ProgramStudy.findOne({where:{ 'id' : id }});
		if(!programStudy) return error('programStudy not found');
		programStudy.deletedAt = new Date();
		programStudy.deletedBy = req.user.id;
		programStudy.save();
		return success('success delete program study');
	}

	@Get('/program_study/selection/:name')
	async getProgramStudySelection(@Param('name') name: string, @Req() req: any) {
		const option = {};
		option['attributes'] = ['id', 'name'];
		option['limit'] = 10;
		option['order'] = [['name', 'asc']];
		option['where'] = {name : { [Op.like]:'%'+name+'%' }, deletedAt:null};
		const programStudy = await ProgramStudy.findAll(option);
		return success(generateDefaultMapping(programStudy));
	}
}
