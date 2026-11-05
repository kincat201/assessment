import { error, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Get, JsonController, Param, Post, Req } from '@wavecore/routing-controllers';
import { ProgramStudy } from '../common/model/ProgramStudy';
import { ProgramStudyCategory } from '../common/model/ProgramStudyCategory';
import { University } from '../common/model/University';
import { FileService } from '../common/service/FileService';
import { checkPayload } from '../common/util/Validation';
import { Faculty } from '../common/model/Faculty';
import { ManipulatorService } from '../common/service/ManipulatorService';
import { ValidatorService } from '../common/service/ValidatorService';
import { Constant } from '../common/constant/Constant';
import { Op } from 'sequelize';
import { Province } from '../common/model/Province';
import { City } from '../common/model/City';

@JsonController()
export class ProgramStudyController {
	@Post('/program_study/list')
	async getProgramStudyList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = [
			'search',
			'listFormat',
			'provinceId',
			'countryId',
			'regulerClass',
			'staffClass',
			'class',
			'onlineClass',
			'studyLevel',
			'accreditation',
			'registrationFee',
			'universityTypes',
			'universityId',
			'programStudyCategoryId',
			'facultyId',
			'facultyCategoryId'
		];
		const allowedOrder = ['id', 'name', 'registrationFee', 'registrationFormFee'];
		const searchField = ['id', 'name', 'registrationFee', 'registrationFormFee'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);
		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = [
			'id',
			'name',
			'accreditation',
			'studyLevel',
			'registrationFee',
			'registrationFormFee',
			'universityId',
			'facultyId',
			'banner',
			'programStudyCategoryId'
		];

		if(input.filter.listFormat && input.filter.listFormat === 'STUDY_LEVEL'){
			datas = await ProgramStudy.findAndCountAll({
				where:{
					deletedBy: null,
					facultyId:input.filter.facultyId
				},
				attributes:['studyLevel'],
				group:['studyLevel']
			});
			const studyLevel = [];
			datas.rows.map((data:ProgramStudy) => {
				studyLevel.push({
					id: data.studyLevel,
					name: data.studyLevel,
				});
			});

			return success(studyLevel);
		}

		option['include'] = [
			{
				model: Faculty,
				as: 'faculty',
				attributes: ['id', 'name']
			},
			{
				model: ProgramStudyCategory,
				attributes: ['id', 'name', 'nameEn', 'thumbnail']
			},
			{
				model: University,
				as: 'university',
				attributes: ['id', 'name', 'types', 'provinceId', 'countryId', 'partner', 'logo', 'map', 'registerLink'],
				include: [City, Province]
			}
		];

		option['distinct'] = true;
		option['where']['deletedAt'] = null;
		if (input.facultyId) option['where']['facultyId'] = input.facultyId;
		if (input.filter.programStudyCategoryId && input.filter.programStudyCategoryId.length > 0){
			option['where']['programStudyCategoryId'] = input.filter.programStudyCategoryId;
		} else{
			delete option['where']['programStudyCategoryId'];
		}
		if (input.filter) {
			if (input.filter.search) {
				if (input.filter.search.length <= 0) {
					delete option['where'][Op.or];
				}
			}
		}
		if (option['where']) {
			if (option['where']['universityTypes']) {
				if (option['where']['universityTypes'].length > 0) {
					option['where']['$university.types$'] = option['where']['universityTypes'];
				}
				delete option['where']['universityTypes'];
			}
			if (option['where']['registrationFee']) {
				if (option['where']['registrationFee'] !== 0) {
					option['where']['registrationFee'] = {
						[Op.lte]: option['where']['registrationFee']
					};
				} else {
					delete option['where']['registrationFee'];
				}
			}
			if (option['where']['provinceId']) {
				if (option['where']['provinceId'].length > 0) {
					option['where']['$university.provinceId$'] = option['where']['provinceId'];
				}
				delete option['where']['provinceId'];
			}
			if (option['where']['countryId']) {
				option['where']['$university.countryId$'] = option['where']['countryId'];
				delete option['where']['countryId'];
			}
			if (option['where']['class']) {
				if (!Array.isArray(option['where']['class'])) {
					return error('class must be array!');
				}
				if (option['where']['class'].length > 0) {
					for (const classConst of option['where']['class']) {
						option['where'][classConst.toLowerCase() + 'Class'] = 'Y';
					}
				}
				delete option['where']['class'];
			}

			if (option['where']['studyLevel']) {
				if (option['where']['studyLevel'].length <= 0) {
					delete option['where']['studyLevel'];
				}
			}
			if (option['where']['accreditation']) {
				if (option['where']['accreditation'].length <= 0) {
					delete option['where']['accreditation'];
				}
			}

			if (option['where']['facultyCategoryId']) {
				if (option['where']['facultyCategoryId'].length > 0) {
					option['where']['$faculty.facultyCategoryId$'] = option['where']['facultyCategoryId'];
				}
				delete option['where']['facultyCategoryId'];
			}

			if(option['where']['facultyId']){
				if(option['where']['facultyId'].length <= 0){
					delete option['where']['facultyId'];
				}
			}
		}

		datas = await ProgramStudy.findAndCountAll(option);
		const results = [];
		datas.rows.map((data:ProgramStudy) => {
			results.push({
				id: data.id,
				name: data.name,
				accreditation: data.accreditation,
				registrationFee: data.registrationFee,
				registrationFormFee: data.registrationFormFee,
				university: data.university.name,
				isPartner: data.university.partner === 'Y',
				universityTypes: data.university.types,
				studyLevel: data.studyLevel,
				faculty: data.faculty.name,
				universityLogo: FileService.getFileUrl(data.university.logo),
				banner: (ValidatorService.hasValue(data.banner))?FileService.getFileUrl(data.banner):FileService.getFileUrl(data.programStudyCategory.thumbnail),
				programStudyCategory: data.programStudyCategory.name,
				programStudyCategoryEn: data.programStudyCategory.nameEn,
				map: data.university.map,
				location:
					data.university.city && data.university.province
						? data.university.city.name + ', ' + data.university.province.name
						: '',
				slug: ManipulatorService.toSlugFormat(data.name, data.id.toString())
			});
		});

		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Get('/program_study/details/:id')
	async getProgramStudyDetails(@Param('id') id: string, @Req() req: any) {
		let data;
		let result;
		const option = {};

		if (!ValidatorService.hasValue(id)) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_FORMAT_GENERAL);
		}
		const slug = id.split('-');
		const programStudyId = slug[slug.length - 1];
		if (!programStudyId) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_FORMAT_GENERAL);
		}
		if (!ValidatorService.isId(parseInt(programStudyId))) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_READ_ID_FORMAT);
		}

		option['where'] = {
			id: programStudyId,
			status: Constant.STATUS_ACTIVE
		};

		option['include'] = [
			{
				model: Faculty,
				attributes: ['id', 'name']
			},
			{
				model: ProgramStudyCategory,
				attributes: ['id', 'name', 'nameEn', 'thumbnail']
			},
			{
				model: University,
				include: [City, Province]
			}
		];
		data = await ProgramStudy.findOne(option);
		if (!data) return error('Program Study not found');
		result = await generateDefaultMappingRow(data);
		result['isPartner'] = data.university.partner === 'Y';
		result['location'] =
			data.university.city && data.university.province
				? data.university.city.name + ', ' + data.university.province.name
				: '';
		result['address'] = data.university.address;
		result['website'] = data.university.website;
		result['registerLink'] = data.university.registerLink;
		result['universityTypes'] = data.university.types;
		result['universityPhone'] = data.university.phone;
		result['universityLogo'] = FileService.getFileUrl(data.university.logo);
		result['facultyName'] = data.faculty.name;
		result['programStudyCategoryName'] = data.programStudyCategory.name;
		result['programStudyCategoryNameEn'] = data.programStudyCategory.nameEn;
		result['universityName'] = data.university.name;
		result['universitySlug'] = ManipulatorService.toSlugFormat(data.university.name, data.university.id);
		['icon', 'thumbnail', 'banner'].forEach(imgName => {
			if(imgName === "banner"){
				if(!ValidatorService.hasValue(result[imgName])){
					result[imgName]=FileService.getFileUrl(data.programStudyCategory.thumbnail);
					return;
				}
			}
			if (result[imgName]) {
				result[imgName] = FileService.getFileUrl(result[imgName]);
			} else {
				result[imgName] = null;
			}
		});
		return success(result);
	}
}
