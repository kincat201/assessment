import { error, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Get, JsonController, Param, Post, Req } from '@wavecore/routing-controllers';
import { City } from '../common/model/City';
import { Province } from '../common/model/Province';
import { University } from '../common/model/University';
import { UniversityGallery } from '../common/model/UniversityGallery';
import { UniversityView } from '../common/model/UniversityView';
import { Faculty } from '../common/model/Faculty';
import { FacultyCategory } from '../common/model/FacultyCategory';
import { ProgramStudy } from '../common/model/ProgramStudy';
import { ProgramStudyCategory } from '../common/model/ProgramStudyCategory';
import { Admission } from '../common/model/Admission';
import { AdmissionSchedule } from '../common/model/AdmissionSchedule';
import { Scholarship } from '../common/model/Scholarship';
import { ScholarshipUniversity } from '../common/model/ScholarshipUniversity';
import { Article } from '../common/model/Article';
import { checkPayload } from '../common/util/Validation';
import { defaultValue } from '../common/util/CommonUtil';
import { System } from '../common/util/System';
import Sequelize, * as sequelize from 'sequelize';
import { FindOptions, Op } from 'sequelize';
import { filter } from 'bluebird';
import { ValidatorService } from '../common/service/ValidatorService';
import { Constant } from '../common/constant/Constant';
import { FileService } from '../common/service/FileService';
import { ManipulatorService } from '../common/service/ManipulatorService';
import { ScholarshipStudyLevel } from '../common/model/ScholarshipStudyLevel';

@JsonController()
export class UniversityController {
	@Post('/university/list')
	async getUniversityList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = [
			'search', 'faculty', 'provinceId', 'accreditation','countryId','studyLevel','types','registrationFee',
			'classType','programStudyId','programStudyCategoryId','countryId'
		];
		const allowedOrder = ['id', 'popularity'];
		const searchField = ['name'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);

		option['attributes'] = [
			'id',
			'name',
			'abbrevation',
			'description',
			'accreditation',
			'types',
			'email',
			'website',
			'phone',
			'address',
			'studentAmount',
			'map',
			'cityId',
			'provinceId',
			'status',
			'partner',
			'popularity',
			'logo',
			'banner',
			'galleryBanner',
			'companyPartnerDescription',
			'companyPartnerLogo',
			[
				Sequelize.literal(
					'(SELECT registrationFee FROM programStudy WHERE universityId = `University`.`id` ORDER BY registrationFee ASC LIMIT 1)'
				),
				'feeStartFrom'
			]
		];
		option['as'] = 'University';
		option['distinct'] = true;

		option['include'] = [
			{
				model: City,
				attributes: ['name']
			},
			{
				model: Province,
				attributes: ['name']
			},
			{
				model: Faculty,
				attributes: ['id', 'universityId', 'facultyCategoryId', 'name'],
				include: [
					{
						model: FacultyCategory,
						attributes: ['id', 'name','nameEn']
					}
				]
			},
			{
				model: ProgramStudy,
				required: false,
				where: {
					deletedAt: null
				},
				attributes: [
					'id',
					'name',
					'accreditation',
					'description',
					'studyLevel',
					'website',
					'registrationFee',
					'registrationFormFee',
					'regulerClass',
					'staffClass',
					'onlineClass'
				]
			},
			{
				model: AdmissionSchedule,
				attributes: ['id'],
				include: [
					{
						model: Admission,
						attributes: ['id']
					}
				]
			},
			{
				model: ScholarshipUniversity,
				attributes: ['id', 'universityId', 'scholarshipId'],
				include: [
					{
						model: Scholarship,
						attributes: ['id', 'name', 'types']
					}
				]
			}
		];

		if (input.filter) {
			option['where'] = {};

			option['where'] = {
				[Op.and]: []
			};

			if (ValidatorService.hasValue(input.filter.search)) {
				option['where'][Op.and].push({
					[Op.or]: [
						{
							abbrevation: {
								[Op.like]: `%${input.filter.search}%`
							}
						},
						{
							name: {
								[Op.like]: `%${input.filter.search}%`
							}
						},
						{
							description: {
								[Op.like]: `%${input.filter.search}%`
							}
						}
					]
				});
			}

			if (ValidatorService.isAlphanumericAndHasValue(input.filter.types)) {
				option['where'][Op.and].push({
					types: input.filter.types
				});
			}

			if (ValidatorService.hasValue(input.filter.accreditation)) {
				option['where'][Op.and].push({
					accreditation: {
						[Op.in]: input.filter.accreditation
					}
				});
			}

			if (ValidatorService.hasValue(input.filter.provinceId)) {
				option['where'][Op.and].push({
					provinceId: {
						[Op.in]: input.filter.provinceId
					}
				});
			}

			if (ValidatorService.isAlphanumericAndHasValue(input.filter.cityId)) {
				option['where'][Op.and].push({
					[Op.and]: [
						sequelize.fn(
							'EXISTS',
							Sequelize.literal(
								'SELECT uni.id FROM university AS uni JOIN city ON city.id = uni.cityId WHERE city.id = ' +
									input.filter.cityId +
									' AND uni.id = University.id'
							)
						)
					]
				});
			}

			if (ValidatorService.isAlphanumericAndHasValue(input.filter.facultyCategoryId)) {
				option['where'][Op.and].push({
					[Op.and]: [
						sequelize.fn(
							'EXISTS',
							Sequelize.literal(
								'SELECT uni.id FROM university AS uni ' +
									'JOIN faculty ON faculty.universityId = uni.id ' +
									'JOIN facultyCategory ON facultyCategory.id = faculty.id ' +
									'WHERE uni.id = University.id ' +
									'AND faculty.universityId = uni.id ' +
									'AND faculty.facultyCategoryId = facultyCategory.id ' +
									'AND facultyCategory.id = ' +
									input.filter.facultyCategoryId
							)
						)
					]
				});
			}

			if (ValidatorService.isAlphanumericAndHasValue(input.filter.status)) {
				option['where'][Op.and].push({
					status: input.filter.status
				});
			}

			if(input.filter.countryId){
				option['where'][Op.and].push({
					countryId: input.filter.countryId
				});
			}else{
				option['where'][Op.and].push({
					countryId: 1
				});
			}

			// let selectQuery = 'SELECT universityId';
			// let fromQuery = ' FROM programStudy ';
			// let joinQuery = '';
			// let whereQuery = ' WHERE `University`.`id`=`programStudy`.`universityId`';
			// let customFilterCounter = 0;
			//
			// if (ValidatorService.isAlphanumericAndHasValue(input.filter.programStudy)) {
			//     // selectQuery += ',name';
			//     whereQuery += " AND programStudy.name = '" + input.filter.programStudy + "'";
			//     customFilterCounter++;
			// }
			//
			// if (input.filter.studyLevel) {
			//     // selectQuery += ',studyLevel';
			//     whereQuery += " AND programStudy.studyLevel = '" + input.filter.studyLevel + "' AND programStudy.deletedAt = null";
			//     customFilterCounter++;
			// }
			//
			// if (ValidatorService.isAlphanumericAndHasValue(input.filter.registrationFee)) {
			//     // selectQuery += ',registrationFee';
			//     whereQuery += " AND programStudy.registrationFee <= '" + input.filter.registrationFee + "'";
			//     customFilterCounter++;
			// }
			//
			// if (ValidatorService.isAlphanumericAndHasValue(input.filter.programStudyCategoryId)) {
			//     joinQuery += ' JOIN programStudyCategory AS psCategory ON psCategory.id =  programStudy.programStudyCategoryId ';
			//     whereQuery += ' AND psCategory.id = ' + input.filter.programStudyCategoryId;
			//     customFilterCounter++;
			// }
			//
			// if (customFilterCounter > 0) {
			//     option['where'][Op.and].push({
			//         id:sequelize.fn(
			//             'EXISTS',
			//             Sequelize.literal(selectQuery + fromQuery + joinQuery + whereQuery)
			//         )
			//
			//     });
			// }

			if (ValidatorService.hasValue(input.filter.studyLevel)) {
				option['include'][3]['required'] = true;
				option['include'][3]['where']['studyLevel'] = input.filter.studyLevel;
			}

			if (ValidatorService.hasValue(input.filter.programStudy)) {
				option['include'][3]['required'] = true;
				option['include'][3]['where']['name'] = {
					[Op.like]: '%' + input.filter.programStudy + '%'
				};
			}

			if (ValidatorService.hasValue(input.filter.registrationFee)) {
				option['include'][3]['required'] = true;
				option['include'][3]['where']['registrationFee'] = {
					[Op.lte]: input.filter.registrationFee
				};
			}

			if (ValidatorService.hasValue(input.filter.programStudyCategoryId)) {
				option['include'][3]['required'] = true;
				option['include'][3]['where']['programStudyCategoryId'] = input.filter.programStudyCategoryId;
			}

			if (ValidatorService.hasValue(input.filter.programStudyId)) {
				option['include'][3]['required'] = true;
				option['include'][3]['where']['id'] = input.filter.programStudyId;
			}

			if (ValidatorService.hasValue(input.filter.classType)) {
				option['include'][3]['required'] = true;
				option['include'][3]['where'][Op.or] = [];
				for (const classConst of input.filter.classType) {
					option['include'][3]['where'][Op.or].push({
						[classConst.toLowerCase() + 'Class']: 'Y'
					});
				}
			}

			// if (ValidatorService.isAlphanumericAndHasValue(input.filter.scholarshipId)) {
			// 	option['where'][Op.and].push({
			// 		[Op.and]: [
			// 			sequelize.fn(
			// 				'EXISTS',
			// 				Sequelize.literal(
			// 					'SELECT uni.id FROM '+University.getTableName()+' AS uni ' +
			// 						'JOIN '+ScholarshipUniversity.getTableName()+' AS scholarshipUniversity ON scholarshipUniversity.universityId = uni.id ' +
			// 						'WHERE uni.id = University.id ' +
			// 						'AND scholarshipUniversity.universityId = uni.id ' +
			// 						'AND scholarshipUniversity.scholarshipId = ' +
			// 						input.filter.scholarshipId
			// 				)
			// 			)
			// 		]
			// 	});
			// }
			//
			// if (ValidatorService.isAlphanumericAndHasValue(input.filter.scholarshipType)) {
			// 	option['where'][Op.and].push({
			// 		[Op.and]: [
			// 			sequelize.fn(
			// 				'EXISTS',
			// 				Sequelize.literal(
			// 					'SELECT uni.id FROM '+University.getTableName()+' AS uni ' +
			// 						'JOIN '+ScholarshipUniversity.getTableName()+' ON '+ScholarshipUniversity.getTableName()+'.universityId = uni.id ' +
			// 						'JOIN '+Scholarship.getTableName()+' ON '+ScholarshipUniversity.getTableName()+'.scholarshipId = scholarship.id ' +
			// 						'WHERE uni.id = '+University.getTableName()+'.id ' +
			// 						'AND '+ScholarshipUniversity.getTableName()+'.universityId = uni.id ' +
			// 						'AND '+Scholarship.getTableName()+'.types = ' +
			// 						input.filter.scholarshipType
			// 				)
			// 			)
			// 		]
			// 	});
			// }
		}
		if (!option['where']) {
			option['where'] = {};
		}
		option['where']['status'] = Constant.UNIVERSITY_STATUS_PUBLISHED;

		option['where']['deletedAt'] = null;

		datas = await University.findAndCountAll(option);

		const results = [];
		datas.rows.map(data => {
			results.push({
				id: data.id,
				name: defaultValue(data.name),
				abbrevation: defaultValue(data.abbrevation),
				description: defaultValue(data.description),
				accreditation: defaultValue(data.accreditation),
				types: defaultValue(data.types),
				email: defaultValue(data.email),
				website: defaultValue(data.website),
				phone: defaultValue(data.phone),
				address: defaultValue(data.address),
				partner: defaultValue(data.partner),
				location: data.city && data.province ? defaultValue(data.city.name + ', ' + data.province.name) : '',
				logo: data.logo ? FileService.getFileUrl(data.logo) : '',
				banner: data.banner ? FileService.getFileUrl(data.banner) : '',
				map: defaultValue(data.map),
				slug: ManipulatorService.toSlugFormat(data.name, data.id),
				popularity: defaultValue(data.popularity),
				registrationFee: data.toJSON().feeStartFrom ? parseInt(defaultValue(data.toJSON().feeStartFrom, 0)) : 0
			});
		});
		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Get('/university/detail/profile/:id')
	async getUniversityProfile(@Param('id') id: string) {
		const validationDetail: any = this.validationDetail(id);
		if (!validationDetail.universityId) {
			return validationDetail;
		}

		const universityId = validationDetail.universityId;
		const option = {};
		option['attributes'] = [
			'id',
			'abbrevation',
			'name',
			'accreditation',
			'description',
			'types',
			'email',
			'website',
			'registerLink',
			'phone',
			'address',
			'addressOthers',
			'studentAmount',
			'map',
			'status',
			'partner',
			'logo',
			'banner',
			'popularity',
			'companyPartnerDescription',
			'companyPartnerLogo',
			[
				Sequelize.literal(
					'(SELECT registrationFee FROM programStudy WHERE universityId = `University`.`id` ORDER BY registrationFee ASC LIMIT 1)'
				),
				'minFee'
			],
			[
				Sequelize.literal(
					'(SELECT registrationFee FROM programStudy WHERE universityId = `University`.`id` ORDER BY registrationFee DESC LIMIT 1)'
				),
				'maxFee'
			]
		];
		option['as'] = 'University';
		option['where'] = {
			id: universityId,
			status: Constant.UNIVERSITY_STATUS_PUBLISHED
		};

		option['include'] = [
			{
				model: City,
				attributes: ['id', 'name', 'types']
			},
			{
				model: Province,
				attributes: ['id', 'name']
			},
			{
				model: Faculty,
				attributes: ['id', 'name', 'description', 'status'],
				required: false,
				where: {
					deletedAt: null
				},
				include: [
					{
						model: ProgramStudy,
						attributes: ['id', 'name', 'accreditation', 'description', 'studyLevel', 'registrationFee', 'banner'],
						required: false,
						where: {
							deletedAt: null
						},
						include:[ProgramStudyCategory]
					}
				]
			},
			{
				model: ScholarshipUniversity,
				attributes: ['id', 'universityId', 'scholarshipId'],
				required: false,
				where: {
					deletedAt: null
				},
				include: [
					{
						model: Scholarship,
						attributes: ['id', 'name', 'types', 'deadline', 'amount'],
						required: false,
						where: {
							deletedAt: null
						}
					}
				]
			}
		];

		const data = await University.findOne(option);
		if (!data) return error('University not found');

		const result = await generateDefaultMappingRow(data);
		if (ValidatorService.hasValue(result['logo'])) {
			result['logo'] = FileService.getFileUrl(result['logo']);
		}

		return success(result);
	}

	@Get('/university/detail/location/:id')
	async getUniversityLocation(@Param('id') id: string) {
		const validationDetail: any = this.validationDetail(id);
		if (!validationDetail.universityId) {
			return validationDetail;
		}

		const universityId = validationDetail.universityId;
		const option = {};
		option['attributes'] = [
			'id',
			'phone',
			'address',
		];

		option['as'] = 'University';
		option['where'] = {
			id: universityId,
			status: Constant.UNIVERSITY_STATUS_PUBLISHED
		};

		const data = await University.findOne(option);
		if (!data) return error('University not found');

		const result = await generateDefaultMappingRow(data);
		return success(result);
	}

	@Get('/university/detail/admission/:id')
	async getUniversityAdmission(@Param('id') id: string) {
		const validationDetail: any = this.validationDetail(id);
		if (!validationDetail.universityId) {
			return validationDetail;
		}

		const universityId = validationDetail.universityId;
		const option = {};
		option['attributes'] = [
			'id',
			'partner',
			[
				Sequelize.literal(
					'(SELECT registrationFee FROM programStudy WHERE universityId = `University`.`id` ORDER BY registrationFee ASC LIMIT 1)'
				),
				'minFee'
			],
			[
				Sequelize.literal(
					'(SELECT registrationFee FROM programStudy WHERE universityId = `University`.`id` ORDER BY registrationFee DESC LIMIT 1)'
				),
				'maxFee'
			]
		];

		option['as'] = 'University';
		option['where'] = {
			id: universityId,
			status: Constant.UNIVERSITY_STATUS_PUBLISHED
		};

		option['include'] = [
			{
				model: AdmissionSchedule,
				required: false,
				where: {
					deletedAt: null
				},
				attributes: ['id', 'name', 'deadline', 'status', 'remark', 'availability']
			},
		];

		const data = await University.findOne(option);
		if (!data) return error('University not found');

		const result = await generateDefaultMappingRow(data);
		result['admissionSchedules'] = Object.keys(data.admissionSchedules).map(i => {
			const result = data.admissionSchedules[i].toJSON();
			result['isExpired'] = data.admissionSchedules[i].isExpired();
			return result;
		});
		if (result[	'admissionSchedules']) {
			result['admissionSchedules'] = result['admissionSchedules'].filter(value => {
				return value.status === Constant.ADMISION_STATUS_ENABLED;
			});
		}

		return success(result);
	}

	@Get('/university/detail/faculty/:id')
	async getUniversityFaculty(@Param('id') id: string) {
		const validationDetail: any = this.validationDetail(id);
		if (!validationDetail.universityId) {
			return validationDetail;
		}

		const universityId = validationDetail.universityId;
		const option = {};
		option['attributes'] = [
			'id',
			'name',
			'logo',
			'map',
			'partner',
		];

		option['as'] = 'University';
		option['where'] = {
			id: universityId,
			status: Constant.UNIVERSITY_STATUS_PUBLISHED
		};

		option['include'] = [
			{
				model: Faculty,
				attributes: ['id', 'name', 'description', 'status'],
				required: false,
				where: {
					deletedAt: null
				},
				include: [
					{
						model: ProgramStudy,
						attributes: ['id', 'name', 'accreditation', 'description', 'studyLevel', 'registrationFee', 'banner'],
						required: false,
						where: {
							deletedAt: null
						},
						include:[ProgramStudyCategory]
					}
				]
			},
		];

		const data = await University.findOne(option);
		if (!data) return error('University not found');

		const result = await generateDefaultMappingRow(data);
		if (ValidatorService.hasValue(result['logo'])) {
			result['logo'] = FileService.getFileUrl(result['logo']);
		}

		result['faculties'] = Object.keys(data.faculties).map(i => data.faculties[i].toJSON());
		result['faculties'].map(faculty => {
			if (ValidatorService.isAlphanumericAndHasValue(faculty.banner)) {
				faculty.banner = FileService.getFileUrl(faculty.banner);
			}
			faculty['programStudies'].map((programStudy) => {
				if (ValidatorService.hasValue(programStudy.banner)) {
					programStudy.banner = FileService.getFileUrl(programStudy.banner);
				} else {
					programStudy.banner = FileService.getFileUrl(programStudy.programStudyCategory.thumbnail);
				}
				programStudy.isPartner = data.partner === 'Y';
				programStudy.slug = ManipulatorService.toSlugFormat(programStudy.name, programStudy.id);
			});
			// faculty.city = (data.city)?data.city.name:"";
			// faculty.province = (data.province)?data.province.name:"";
			faculty.slug = ManipulatorService.toSlugFormat(faculty.name, faculty.id);
		});

		return success(result);
	}

	@Get('/university/detail/gallery/:id')
	async getUniversityGallery(@Param('id') id: string) {
		const validationDetail: any = this.validationDetail(id);
		if (!validationDetail.universityId) {
			return validationDetail;
		}

		const universityId = validationDetail.universityId;
		const option = {};
		option['attributes'] = [
			'id',
			'name'
		];

		option['as'] = 'University';
		option['where'] = {
			id: universityId,
			status: Constant.UNIVERSITY_STATUS_PUBLISHED
		};

		option['include'] = [
			{
				model: UniversityGallery,
				attributes: ['id', 'image', 'types', 'altText']
			}
		];

		const data = await University.findOne(option);
		if (!data) return error('University not found');

		const result = await generateDefaultMappingRow(data);
		result['gallery'] = Object.keys(data.universityGalleries).map(i => data.universityGalleries[i].dataValues);
		result['gallery'].map(gallery => {
			if (ValidatorService.hasValue(gallery.image)) {
				gallery.image = FileService.getFileUrl(gallery.image);
			}
		});

		return success(result);
	}

	@Post('/university/detail/:id')
	async getUniversityDetail(@Param('id') id: string, @Body() input: any, @Req() req: any) {
		if (!ValidatorService.isAlphanumericAndHasValue(input.pageName)) {
			return error(Constant.RETURN_MESSAGE.ERROR.UNKNOWN_PAGE_NAME);
		}
		if (!ValidatorService.hasValue(id)) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_FORMAT_GENERAL);
		}
		const slug = id.split('-');
		const universityId = slug[slug.length - 1];
		if (!universityId) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_FORMAT_GENERAL);
		}
		if (!ValidatorService.isId(parseInt(universityId))) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_READ_ID_FORMAT);
		}
		let data;
		let result;
		const option = {};
		option['attributes'] = [
			'id',
			'abbrevation',
			'name',
			'metaTitle',
			'metaDescription',
			'accreditation',
			'description',
			'types',
			'email',
			'website',
			'registerLink',
			'phone',
			'address',
			'addressOthers',
			'studentAmount',
			'map',
			'status',
			'partner',
			'logo',
			'banner',
			'popularity',
			'companyPartnerDescription',
			'companyPartnerLogo',
			[
				Sequelize.literal(
					'(SELECT registrationFee FROM programStudy WHERE universityId = `University`.`id` ORDER BY registrationFee ASC LIMIT 1)'
				),
				'minFee'
			],
			[
				Sequelize.literal(
					'(SELECT registrationFee FROM programStudy WHERE universityId = `University`.`id` ORDER BY registrationFee DESC LIMIT 1)'
				),
				'maxFee'
			]
		];
		option['as'] = 'University';
		option['where'] = {
			id: universityId,
			status: Constant.UNIVERSITY_STATUS_PUBLISHED
		};

		option['include'] = [
			{
				model: City,
				attributes: ['id', 'name', 'types']
			},
			{
				model: Province,
				attributes: ['id', 'name']
			},
			{
				model: UniversityGallery,
				attributes: ['id', 'image', 'types', 'altText']
			},
			{
				model: UniversityView,
				attributes: ['id', 'universityId']
			},
			{
				model: Faculty,
				attributes: ['id', 'name', 'description', 'status'],
				required: false,
				where: {
					deletedAt: null
				},
				include: [
					{
						model: ProgramStudy,
						attributes: ['id', 'name', 'paymentRequired', 'accreditation', 'description', 'studyLevel', 'registrationFee', 'registrationFormFee', 'registrationFormFeeDiscount', 'banner'],
						required: false,
						where: {
							deletedAt: null
						},
						include:[ProgramStudyCategory]
					}
				]
			},
			{
				model: AdmissionSchedule,
				required: false,
				where: {
					deletedAt: null
				},
				attributes: ['id', 'name', 'deadline', 'status', 'remark', 'availability']
			},
			{
				model: ScholarshipUniversity,
				attributes: ['id', 'universityId', 'scholarshipId'],
				required: false,
				where: {
					deletedAt: null
				},
				include: [
					{
						model: Scholarship,
						attributes: ['id', 'name', 'types', 'deadline', 'amount'],
						required: false,
						where: {
							deletedAt: null
						}
					}
				]
			}
		];

		data = await University.findOne(option);
		data.increment('viewed', {by: 1});

		if (!data) return error('University not found');

		result = await generateDefaultMappingRow(data);

		// result['city']=(data.city)?data.city.name:"";
		// result['province']=(data.province)?data.province.name:"";

		result['location'] = '';

		if (data.city && data.province) {
			result['location'] = data.city.name + ', ' + data.province.name;
		}

		if (ValidatorService.hasValue(result['logo'])) {
			result['logo'] = FileService.getFileUrl(result['logo']);
		}

		if (ValidatorService.hasValue(result['banner'])) {
			result['banner'] = FileService.getFileUrl(result['banner']);
		}

		if (input.pageName == Constant.UNIVERSITY_PAGE_PROFILE) {
			result['city'] = data.city.dataValues;
			result['province'] = data.province.dataValues;
			result['faculties'] = Object.keys(data.faculties).map(i => data.faculties[i].toJSON());
			result['scholarships'] = Object.keys(data.scholarshipUnivercities).map(
				i => data.scholarshipUnivercities[i].toJSON().scholarship
			);

			result['faculties'].map(faculty => {
				if (ValidatorService.isAlphanumericAndHasValue(faculty.banner)) {
					faculty.banner = FileService.getFileUrl(faculty.banner);
				}
			});

			let filterScholarships = [];
			result['scholarships'].map(scholarship => {
				if(scholarship) {
					if (ValidatorService.isAlphanumericAndHasValue(scholarship.banner)) {
						scholarship.banner = FileService.getFileUrl(scholarship.banner);
					}
					filterScholarships.push(scholarship);
				}
			});
			result['scholarships'] = filterScholarships;

			result['articles'] = await this.ArticleListByUniversityName(data.name);

			result['maxFee'] = parseFloat(data.toJSON().maxFee) | 0;
			result['minFee'] = parseFloat(data.toJSON().minFee) | 0;
		} else if (input.pageName == Constant.UNIVERSITY_PAGE_LOCATION) {
			if (ValidatorService.isAlphanumericAndHasValue(result['addressOthers'])) {
				result['addressOthers'] = result['tags'] ? result['tags'].split(',') : [];
			}
		} else if (input.pageName == Constant.UNIVERSITY_PAGE_ADMISSION) {
			result['admissionSchedules'] = Object.keys(data.admissionSchedules).map(i => {
				const result = data.admissionSchedules[i].toJSON();
				result['isExpired'] = data.admissionSchedules[i].isExpired();
				return result;
			});
			if (result['admissionSchedules']) {
				result['admissionSchedules'] = result['admissionSchedules'].filter(value => {
					return value.status === Constant.ADMISION_STATUS_ENABLED;
				});
			}
		} else if (input.pageName == Constant.UNIVERSITY_PAGE_FACULTY) {
			result['faculties'] = Object.keys(data.faculties).map(i => data.faculties[i].toJSON());

			result['faculties'].map(faculty => {
				if (ValidatorService.isAlphanumericAndHasValue(faculty.banner)) {
					faculty.banner = FileService.getFileUrl(faculty.banner);
				}
				faculty['programStudies'].map((programStudy) => {
					if (ValidatorService.hasValue(programStudy.banner)) {
						programStudy.banner = FileService.getFileUrl(programStudy.banner);
					} else {
						programStudy.banner = FileService.getFileUrl(programStudy.programStudyCategory.thumbnail);
					}
					programStudy.isPartner = data.partner === 'Y';
					programStudy.slug = ManipulatorService.toSlugFormat(programStudy.name, programStudy.id);
				});
				// faculty.city = (data.city)?data.city.name:"";
				// faculty.province = (data.province)?data.province.name:"";
				faculty.slug = ManipulatorService.toSlugFormat(faculty.name, faculty.id);
			});
		} else if (input.pageName == Constant.UNIVERSITY_PAGE_GALLERY) {
			result['gallery'] = Object.keys(data.universityGalleries).map(i => data.universityGalleries[i].dataValues);

			result['gallery'].map(gallery => {
				if (ValidatorService.hasValue(gallery.image)) {
					gallery.image = FileService.getFileUrl(gallery.image);
				}
			});
		}

		return success(result);
	}

	private validationDetail (id) {
		if (!ValidatorService.hasValue(id)) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_FORMAT_GENERAL);
		}
		const slug = id.split('-');
		const universityId = slug[slug.length - 1];
		if (!universityId) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_FORMAT_GENERAL);
		}
		if (!ValidatorService.isId(parseInt(universityId))) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_READ_ID_FORMAT);
		}

		return { universityId };
	}

	private async ArticleListByUniversityName(universityName: string) {
		let articelList = await Article.findAll({
			where: {
				tags: {
					[Op.like]: `%${universityName}%`
				}
			}
		});

		const results = [];

		if (articelList.length > 0) {
			articelList.map(data => {
				results.push({
					id: data.id,
					title: defaultValue(data.title),
					content: defaultValue(data.content),
					metaTitle: defaultValue(data.metaTitle),
					metaDescription: defaultValue(data.metaDescription),
					thumbnail: data.thumbnail ? FileService.getFileUrl(data.thumbnail) : '',
					createdAt: defaultValue(data.createdAt, System.getTime().toDate()),
					author: defaultValue(data.author),
					tags: data.tags ? data.tags.split(',') : []
				});
			});
		}

		return results;
	}

	@Post('/university/popularity/list')
	async popularityList(@Body() input: any) {
		const options: FindOptions = {
			where: {
				deletedAt: null,
				status: Constant.STATUS_PUBLISH,
				[Op.and]: [
					{
						popularity: {
							[Op.ne]: null
						}
					},
					{
						popularity: {
							[Op.gte]:1
						}
					}
				]
			},
			order: [['popularity', 'ASC']],
			include:[
				City,
				Province,
				{
					model: ProgramStudy,
					attributes: ['id', 'registrationFormFee', 'registrationFormFeeDiscount'],
					required: false,
					limit: 1,
					order: [['registrationFormFee', 'ASC']],
					where: {
						deletedAt: null
					}
				}
			]
		};
		if (input) {
			if (ValidatorService.isPositiveNumber(input.limit)) {
				options.limit = input.limit;
			}
		}

		options.attributes = [
			'id',
			'name',
			'partner',
			'popularity',
			'status',
			'accreditation',
			'types',
			'logo',
			'banner',
			'galleryBanner',
			'companyPartnerDescription',
			'companyPartnerLogo',
			[
				Sequelize.literal(
					'(SELECT registrationFee FROM programStudy WHERE universityId = `University`.`id` ORDER BY registrationFee ASC LIMIT 1)'
				),
				'feeStartFrom'
			]
		];

		options.where['countryId'] = input.filter.countryId ? input.filter.countryId : 1;

		const instance = await University.findAll(options);
		const result = [];
		instance.map(university => {
			let registrationFormFee = 0;
			let registrationFormFeeDiscount = 0;

			if	(university.programStudies[0]) {
				registrationFormFee = parseInt(defaultValue(university.programStudies[0].registrationFormFee, 0));
				registrationFormFeeDiscount = parseInt(defaultValue(university.programStudies[0].registrationFormFeeDiscount, 0));
			}

			result.push({
				id: university.id,
				name: defaultValue(university.name),
				logo: university.logo ? FileService.getFileUrl(university.logo) : null,
				banner: university.banner ? FileService.getFileUrl(university.banner) : null,
				partner: defaultValue(university.partner),
				location:
					university.city && university.province
						? defaultValue(university.city.name + ', ' + university.province.name)
						: '',
				status: defaultValue(university.types),
				popularity: defaultValue(university.popularity),
				accreditation: defaultValue(university.accreditation),
				types: defaultValue(university.types),
				slug: ManipulatorService.toSlugFormat(university.name, university.id.toString()),
				registrationFee: university.toJSON()['feeStartFrom'] ? parseInt(defaultValue(university.toJSON()['feeStartFrom'], 0)) : 0,
				registrationFormFee: registrationFormFee,
				registrationFormFeeDiscount: registrationFormFeeDiscount
			});
		});
		return success(result);
	}
}
