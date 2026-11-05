import {
	CoreSequelize,
	error, filterOverrideEmailDomain,
	generateDefaultMapping,
	generateDefaultOption,
	generateResponseList,
	success
} from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import { Op } from 'sequelize';
import * as envData from '../../config/Env.json';
import { Constant } from '../common/constant/Constant';
import { AdmissionSchedule } from '../common/model/AdmissionSchedule';
import { City } from '../common/model/City';
import { Province } from '../common/model/Province';
import { University } from '../common/model/University';
import { UniversityGallery } from '../common/model/UniversityGallery';
import { FileService } from '../common/service/FileService';
import { UniversityService } from '../common/service/UniversityService';
import { generateDefaultMappingRow, manualGenerateFilter, manualGenerateOrder } from '../common/util/ListUtil';
import { checkPayload, validate } from '../common/util/Validation';
import { ValidatorService } from '../common/service/ValidatorService';
import * as _ from 'lodash';
import { ManipulatorService } from '../common/service/ManipulatorService';
import { Country } from '../common/model/Country';

@JsonController()
export class UniversityController {
	@Post('/university/list')
	async getUniversityList(@Body() input: any, @Req() req: any) {
		const option = generateDefaultOption(input, {});
		const results = [];

		const allowedFilter = ['search', 'id' , 'status', 'types', 'area','featured','partner','registerLink','cityId','countryId'];
		const allowedOrder = ['id', 'name', 'abbrevation', 'types', 'partner', 'status'];
		const searchField = ['id','name','description','abbrevation', 'types', 'partner', 'status'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		let registerLink;
		if(input.filter.registerLink){
			registerLink = input.filter.registerLink;
			delete input.filter.registerLink;
		}

		const filterArray = manualGenerateFilter(input, 'university', allowedFilter, searchField);
		if(registerLink){
			if(registerLink === Constant.LABEL_YESNO_TRUE){
				filterArray.push('university.registerLink IS NOT NULL');
			}else{
				filterArray.push('university.registerLink IS NULL');
			}
		}
		const filterCondition = filterArray.length > 0 ? ` WHERE ` + filterArray.join(' AND ') : '';
		const orderCondition = manualGenerateOrder(input, 'university', allowedOrder);

		if(orderCondition === '' || !orderCondition){
			return error(Constant.RETURN_MESSAGE.ORDER_NOT_ALLOWED);
		}

		const query =
			`SELECT university.id, university.name AS universityName, university.status AS universityStatus, `+
			`university.types AS universityTypes, university.area, city.types as cityTypes, city.name as cityName, university.countryId, country.name as countryName,`+
			`university.partner, university.featured,  university.popularity, university.registerLink, ` +
			`university.viewed as viewed, COUNT(admission.id) as applicants ` +
			`FROM university LEFT JOIN city ON university.cityId = city.id ` +
			`LEFT JOIN country ON university.countryId = country.id `+
			`LEFT JOIN admissionSchedule ON admissionSchedule.universityId = university.id ` +
			`LEFT JOIN admission ON admission.admissionScheduleId = admissionSchedule.id ` +
			`LEFT JOIN universityView ON universityView.universityId = university.id ` +
			filterCondition +
			` GROUP BY university.id ORDER BY ` +
			orderCondition +
			` LIMIT ` +
			option['limit'] +
			` OFFSET ` +
			option['offset'];

		const countQuery = `SELECT COUNT(*) AS count ` +
			`FROM university LEFT JOIN city ON university.cityId = city.id ` +
			`LEFT JOIN admissionSchedule ON admissionSchedule.universityId = university.id ` +
			`LEFT JOIN admission ON admission.admissionScheduleId = admissionSchedule.id ` +
			`LEFT JOIN universityView ON universityView.universityId = university.id ` +
			filterCondition+
			` GROUP BY university.id`;

		const dataCount=await CoreSequelize().query(countQuery,{
			type: CoreSequelize().QueryTypes.SELECT
		});

		await CoreSequelize()
			.query(query)
			.then(([queryResult, metadata]) => {
				if (queryResult.length > 0) {
					queryResult.map(result => {
						const data = {
							id: result.id,
							name: result.universityName,
							types: Constant.UNIVERSITY_TYPE_LIST[result.universityTypes],
							area: result.area,
							city: (Constant.CITY_TYPE_LIST[result.cityTypes] ? Constant.CITY_TYPE_LIST[result.cityTypes] + ' ' : '' )+ result.cityName,
							countryId: result.countryId,
							country: result.countryName,
							partner: Constant.LABEL_YESNO_LIST[result.partner],
							featured: Constant.LABEL_YESNO_LIST[result.featured],
							registerLink: result.registerLink,
							viewed: result.viewed,
							applicants: result.applicants,
							popularity: result.popularity == null ? '' : result.popularity,
							status: Constant.LABEL_STATUS_LIST[result.universityStatus]
						};
						results.push(data);
					});
				}
			});

		return success(await generateResponseList(input, option, results, dataCount.length));
	}

	@Get('/university/details/:id')
	async getUniversityDetails(@Param('id') id: number, @Req() req: any) {
		if(!ValidatorService.isId(id)){
			return error(Constant.RETURN_MESSAGE.WRONG_ID_FORMAT);
		}
		let data;
		let result;
		const option = {};
		option['where'] = {
			id: id,
			deletedAt : {[Op.eq] : null}
		};

		option['attributes']={
			exclude:["admissionBanner","galleryBanner"]
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
				model: Country,
				attributes: ['id', 'name', 'currency']
			},
			{
				model: UniversityGallery,
				attributes: ['id','image', 'types', 'altText']
			},
			{
				model: AdmissionSchedule,
				attributes: ['id','name','deadline','remark','status']
			}
		];
		data = await University.findOne(option);

		if (!data) return error('University not found');

		result = await generateDefaultMappingRow(data);
		result['cityName'] = data.city ? ((Constant.CITY_TYPE_LIST[data.city.types] ? Constant.CITY_TYPE_LIST[data.city.types] + ' ' : '' ) + data.city.name) : '';
		result['provinceName'] = data.province ? data.province.name : '';
		result['countryName'] = data.country ? data.country.name : '';
		result['countryCurrency'] = data.country ? data.country.currency : '';

		if (result['logo'] !== null && result['logo'] !== '') {
			result['logo'] = {
				fullPath:FileService.getFileUrl(result['logo']),
				image: result['logo'] ? result['logo'].replace("university/logo/","") : ''
			};
		}
		if (result['banner'] !== null && result['banner'] !== '') {
			result['banner'] = {
				fullPath:FileService.getFileUrl(result['banner']),
				image: result['banner'] ? result['banner'].replace("university/banner/","") : ''
			};
		}
		// if(result['companyPartnerLogo'] === null){
		// 	result['companyPartnerLogo'] = [];
		// } else{
		// 	result['companyPartnerLogo'] = JSON.parse(result['companyPartnerLogo']);
		// }
		result['universityGalleries']={};
		result['universityGalleries']['activity'] = [];
		result['universityGalleries']['facility'] = [];
		for (const universityGallery of data.universityGalleries) {
			if(universityGallery.types === Constant.UNIVERSITY_GALLERY_TYPE_FACILITY) {
				result['universityGalleries']['facility'].push({
					fullPath: FileService.getFileUrl(universityGallery.image),
					image: universityGallery.image ? universityGallery.image.replace("university/gallery/",'') : '',
					altText: universityGallery.altText,
				});
			} else if(universityGallery.types === Constant.UNIVERSITY_GALLERY_TYPE_ACTIVITY){
				result['universityGalleries']['activity'].push({
					fullPath: FileService.getFileUrl(universityGallery.image),
					image: universityGallery.image ? universityGallery.image.replace("university/gallery/",'') : '',
					altText: universityGallery.altText,
				});
			}
		}
		if(data.admissionSchedules) {
			result['admissionSchedules']=[];
			for (const admissionSchedule of data.admissionSchedules) {
				result['admissionSchedules'].push({
					id:admissionSchedule.id,
					name:admissionSchedule.name,
					deadline:admissionSchedule.deadline,
					remark:admissionSchedule.remark,
					status:admissionSchedule.status
				});
			}
		}

		result['addressOthers'] = result['addressOthers'] !== null ? JSON.parse(result['addressOthers']) : [];

		return success(result);
	}

	@Put('/university/create')
	async universityCreate(@Body() input: any, @Req() req: any) {
		const check = await validate(input, [
			'name',
			'metaTitle',
			'metaDescription',
			'abbrevation',
			'description',
			'types',
			'countryId',
			'cityId',
			'provinceId',
			'status'
		]);

		if (!check.status) return error(check.message);

		if (input.logo) input.logo = await FileService.move(input.logo, 'university/logo');

		if (input.banner) input.banner = await FileService.move(input.banner, 'university/banner');

		// if (input.admissionBanner)
		// 	input.admissionBanner = await FileService.move(input.admissionBanner, 'university/admissionBanner');
		//
		// if (input.galleryBanner) input.galleryBanner = await FileService.move(input.banner, 'university/galleryBanner');

		// if(input.companyPartnerLogo){
		// 	const companyPartnerLogo = input.companyPartnerLogo;
		// 	const newCompanyPartnerLogo = [];
		//
		// 	await companyPartnerLogo.map( async companyLogo =>{
		// 		const movedCompanyPartnerLogo = await FileService.move(companyLogo,'university/company');
		// 		newCompanyPartnerLogo.push(movedCompanyPartnerLogo);
		// 	});
		//
		// 	input.companyPartnerLogo = JSON.stringify(newCompanyPartnerLogo);
		// }

		if (input.addressOthers) {
			input.addressOthers = JSON.stringify(input.addressOthers);
		}
		if(typeof input.popularity === 'string'){
			if(input.popularity.length === 0){
				input.popularity=null;
			}
		}

		if (input.universityGalleries) {
			const mergedArray=[];
			if(input.universityGalleries.facility) {
				for (let i = 0; i < input.universityGalleries.facility.length; i++) {
					input.universityGalleries.facility[i]['types'] = Constant.UNIVERSITY_GALLERY_TYPE_FACILITY;
				}
				mergedArray.push(...input.universityGalleries.facility);
			}
			if(input.universityGalleries.activity) {
				for (let i = 0; i < input.universityGalleries.activity.length; i++) {
					input.universityGalleries.activity[i]['types'] = Constant.UNIVERSITY_GALLERY_TYPE_ACTIVITY;
				}
				mergedArray.push(...input.universityGalleries.activity);
			}
			input.universityGalleries=mergedArray;
			for (const universityGallery of input.universityGalleries) {
				const fileName = universityGallery.image;
				const oldGalleryBannerPath = envData.directorySettings.storagePath + '/university/gallery/' + fileName;
				// if(!FileService.isExist(envData.directorySettings.temp+ '/' + fileName)){
				// 	return error(Constant.RETURN_MESSAGE.FILE_DOES_NOT_EXIST);
				// }
				// if(FileService.isExist(oldGalleryBannerPath)){
				// 	return error(Constant.RETURN_MESSAGE.FILE_DOES_NOT_EXIST);
				// }
			}
		}

		if(input.studentAmount == '') input.studentAmount = null;

		const university = await University.create(input);

		if (input.universityGalleries && Array.isArray(input.universityGalleries)) {
			await UniversityService.insertGallery(input.universityGalleries, university.id);
		}

		if(input.admissions && Array.isArray(input.admissions)){
			for (const admission of input.admissions){
				AdmissionSchedule.create({
					universityId:university.id,
					name:admission.name,
					deadline:admission.deadline,
					remark:admission.remark,
					status:admission.status
				});
			}
		}

		return success('success create university');
	}

	@Patch('/university/update/:id')
	async universityUpdate(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		if(!ValidatorService.isId(id)){
			return error(Constant.RETURN_MESSAGE.WRONG_ID_FORMAT);
		}
		const check = await validate(input, [
			'name',
			'metaTitle',
			'metaDescription',
			'abbrevation',
			'description',
			'types',
			'cityId',
			'provinceId',
			'countryId',
			'status'
		]);

		if (!check.status) return error(check.message);

		const university = await University.findOne({
			where: { id: id },
			include: [UniversityGallery,AdmissionSchedule]
		});
		if (!university) return error('University not found!');

		if (input.logo && university.logo && university.logo.replace('university/logo/', '') !== input.logo) {
			const oldLogoPath = envData.directorySettings.storagePath + '/' + university.logo;
			if (FileService.isExist(oldLogoPath) && university.logo) FileService.delete(oldLogoPath);
			input.logo = await FileService.move(input.logo, 'university/logo');
		} else {
			if(input.logo) {
				input.logo = await FileService.move(input.logo, 'university/logo');
			}
		}

		if (input.banner && university.banner && university.banner.replace('university/banner/', '') !== input.banner) {
			const oldBannerPath = envData.directorySettings.storagePath + '/' + university.banner;
			if (FileService.isExist(oldBannerPath) && university.banner) FileService.delete(oldBannerPath);
			input.banner = await FileService.move(input.banner, 'university/banner');
		} else {
			if(input.banner){
				input.banner = await FileService.move(input.banner, 'university/banner');
			}
		}

		if(typeof input.popularity === 'string'){
			if(input.popularity.length === 0){
				input.popularity=null;
			}
		}

		// if (
		// 	input.admissionBanner &&
		// 	university.admissionBanner.replace('university/admissionBanner/', '') !== input.admissionBanner
		// ) {
		// 	const oldAdmissionBannerPath = envData.directorySettings.storagePath + '/' + university.admissionBanner;
		// 	if (FileService.isExist(oldAdmissionBannerPath) && university.admissionBanner)
		// 		FileService.delete(oldAdmissionBannerPath);
		// 	input.admissionBanner = await FileService.move(input.admissionBanner, 'university/admissionBanner');
		// }
		//
		// if (
		// 	input.galleryBanner &&
		// 	university.galleryBanner.replace('university/galleryBanner/', '') !== input.galleryBanner
		// ) {
		// 	const oldGalleryBannerPath = envData.directorySettings.storagePath + '/' + university.galleryBanner;
		// 	if (FileService.isExist(oldGalleryBannerPath) && university.galleryBanner)
		// 		FileService.delete(oldGalleryBannerPath);
		// 	input.galleryBanner = await FileService.move(input.galleryBanner, 'university/galleryBanner');
		// }

		if(input.admissions && Array.isArray(input.admissions)){
			for(const admissionSchedule of university.admissionSchedules){
				const foundAdmissionSchedule=input.admissions.filter(value=>{
					return value.name !== admissionSchedule.name;
				});
				if(foundAdmissionSchedule.length === input.admissions.length){
					admissionSchedule.destroy();
				}
			}
			for(const admission of input.admissions) {
				AdmissionSchedule.upsert({
					id: admission.id,
					universityId: university.id,
					name: admission.name,
					deadline: admission.deadline,
					remark: admission.remark,
					status: admission.status
				});
			}
		}

		if (input.universityGalleries) {
			const mergedArray=[];
			if(input.universityGalleries.facility) {
				for (let i = 0; i < input.universityGalleries.facility.length; i++) {
					input.universityGalleries.facility[i]['types'] = Constant.UNIVERSITY_GALLERY_TYPE_FACILITY;
				}
				mergedArray.push(...input.universityGalleries.facility);
			}
			if(input.universityGalleries.activity) {
				for (let i = 0; i < input.universityGalleries.activity.length; i++) {
					input.universityGalleries.activity[i]['types'] = Constant.UNIVERSITY_GALLERY_TYPE_ACTIVITY;
				}
				mergedArray.push(...input.universityGalleries.activity);
			}
			input.universityGalleries=mergedArray;
			for (const universityGallery of university.universityGalleries) {
				const oldGalleryBannerPath = universityGallery.image.replace('university/gallery/', '');
				const foundImages = input.universityGalleries.filter(value => {
					return (oldGalleryBannerPath !== value.image) || (universityGallery.altText !== value.altText);
				});
				if (foundImages.length === input.universityGalleries.length) {
					universityGallery.destroy();
				}
				input.universityGalleries = foundImages;
			}
			const insertGalleryResult = await UniversityService.insertGallery(input.universityGalleries, id);
			if (!insertGalleryResult) {
				return error(Constant.RETURN_MESSAGE.FILE_DOES_NOT_EXIST);
			}
		}

		// if(input.companyPartnerLogo){
		// 	const currentCompanyPartnerLogo = JSON.parse(university.companyPartnerLogo);
		// 	const companyPartnerLogo = input.companyPartnerLogo;
		// 	const newCompanyPartnerLogo = [];
		//
		// 	currentCompanyPartnerLogo.map( currentCompanyLogo => {
		// 		if(companyPartnerLogo.indexOf(currentCompanyLogo.replace('university/company/','')) === -1){
		// 			const oldCompanyPath = envData.directorySettings.storagePath+'/'+currentCompanyLogo;
		// 			if(FileService.isExist(oldCompanyPath) && currentCompanyLogo) FileService.delete(oldCompanyPath);
		// 		}
		// 	})
		//
		// 	await companyPartnerLogo.map( async companyLogo =>{
		// 		if(currentCompanyPartnerLogo.indexOf('university/company/'+companyLogo) === -1){
		// 			const movedCompanyPartnerLogo = await FileService.move(companyLogo,'university/company');
		// 			newCompanyPartnerLogo.push(movedCompanyPartnerLogo);
		// 		}else{
		// 			newCompanyPartnerLogo.push('university/company/'+companyLogo);
		// 		}
		// 	});
		//
		// 	input.companyPartnerLogo = JSON.stringify(newCompanyPartnerLogo);
		// }

		if (input.addressOthers) {
			input.addressOthers = JSON.stringify(input.addressOthers);
		}

		if(input.studentAmount == '') input.studentAmount = null;

		University.update(input, { where: { id: id } });

		return success('success update university');
	}

	@Delete('/university/delete/:id')
	async universityDelete(@Param('id') id: number, @Req() req: any) {
		if(!ValidatorService.isId(id)){
			return error(Constant.RETURN_MESSAGE.WRONG_ID_FORMAT);
		}
		const university = await University.findOne({ where: { id: id } });
		if (!university) return error('university not found');
		university.deletedAt = new Date();
		university.deletedBy = req.user.id;
		university.save();

		return success('success delete university');
	}

	@Get('/university/selection/:name')
	async getUniversitySelection(@Param('name') name: string, @Req() req: any) {
		const option = {};
		option['attributes'] = ['id', 'name'];
		option['limit'] = 10;
		option['order'] = [['name', 'asc']];
		option['where'] = { name: { [Op.like]: '%' + name + '%' }, deletedAt: null };

		const university = await University.findAll(option);
		return success(generateDefaultMapping(university));
	}

	@Post('/university/admission/:id')
	async getUniversityAdmissionList(@Body() input: any, @Param('id') id: number) {
		if(!ValidatorService.isId(id)){
			return error(Constant.RETURN_MESSAGE.WRONG_ID_FORMAT);
		}
		let datas;

		const allowedFilter = ['search', 'deadline'];
		const allowedOrder = ['id', 'name', 'deadline', 'remark', 'availability'];
		const searchField = ['name', 'availability', 'remark', 'deadline'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id', 'name', 'deadline', 'remark', 'availability'];
		option['where']['deletedAt'] = null;
		option['universityId'] = id;

		datas = await AdmissionSchedule.findAndCountAll(option);
		const results = generateDefaultMapping(datas.rows);
		results.map((data, index) => {
			results[index]['availability'] = Constant.ADMISSION_AVAILABILITY_LIST[data.availability];
		});

		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Patch('/university/featured/:id')
	async universityFeatured(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		if(!ValidatorService.isId(id)){
			return error(Constant.RETURN_MESSAGE.WRONG_ID_FORMAT);
		}
		const check = await validate(input, ['featured']);

		if (!check.status) return error(check.message);

		const university = await University.findOne({ where: { id: id } });
		if (!university) return error('university not found');
		university.updatedAt = new Date();
		university.updatedBy = req.user.id;
		university.featured = input.featured;
		university.save();

		return success('success change status featured university');
	}
}
