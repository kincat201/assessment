import { error, generateDefaultMapping, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Get, JsonController, Param, Patch, Post, Req } from '@wavecore/routing-controllers';
import { Country } from '../common/model/Country';
import { CountryDetail } from '../common/model/CountryDetail';
import { CountryInquiry } from '../common/model/CountryInquiry';
import { FileService } from '../common/service/FileService';
import { generateDefaultMappingRow } from '../common/util/ListUtil';
import { checkPayload, validate } from '../common/util/Validation';
import * as envData from '../../config/Env.json';
import * as _ from 'lodash';
import { Op } from 'sequelize';
import { Constant } from '../common/constant/Constant';

@JsonController()
export class CountryController {
	@Post('/country/list')
	async getCountryList(@Body() input: any, @Req() req: any) {

		let datas;

		const allowedFilter = ['search'];
		const allowedOrder = ['name','currency','createdAt'];
		const searchField = ['name'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id','name','currency','status','createdAt'];
		option['where']['deletedAt'] = null;
		option['where']['id'] = {[Op.ne]:1};

		datas = await Country.findAndCountAll(option);
		const results = generateDefaultMapping(datas.rows);

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Get('/country/details/:id')
	async getCountryDetails( @Param('id') id: number, @Req() req: any ) {
		let data;
		const result = {};
		const option = {};
		option['where'] = { 'countryId' : id };
		option['include']=[Country];
		data = await CountryDetail.findOne(option);

		if(!data) return error('country not found');

		result['id'] = data.country.id;
		result['name'] = data.country.name;
		result['status'] = data.country.status;
		result['meta'] = JSON.parse(data['meta']);
		result['header'] = JSON.parse(data['header']);
		if(result['header'] && result['header']['image']){
			result['header']['image'] = {
				fullPath:FileService.getFileUrl(result['header']['image']),
				image:result['header']['image'].replace("country/banner/","")
			};
		}
		result['studying'] = JSON.parse(data['studying']);
		if (result['studying']) {
			if(result['studying'].list){
				console.log(result['studying'].list);
				await result['studying'].list.forEach(async function(data, index) {
					if(result['studying'].list[index].image){
						result['studying'].list[index].image = {
							fullPath:FileService.getFileUrl(result['studying'].list[index].image),
							image:result['studying'].list[index].image.replace("country/studying/","")
						};
					}
				});
			}
		}

		result['whyChoose'] = JSON.parse(data['whyChoose']);
		result['help'] = JSON.parse(data['help']);
		result['known'] = JSON.parse(data['known']);
		result['otherThing'] = JSON.parse(data['otherThing']);
		result['livingCost'] = JSON.parse(data['livingCost']);

		return success(result);
	}

	@Patch('/country/update/:id')
	async countryUpdate(@Param('id') id: number, @Body() input: any, @Req() req: any) {
		const check = await validate(input,['meta','header','studying','whyChoose','help','known','otherThing','livingCost','status']);

		if(!check.status) return error(check.message);

		const	content = await CountryDetail.findOne({
			where:{'countryId' : id, 'deletedAt' : null },
			include:[Country]
		});
		if(!content) return error('country not found');

		const header = JSON.parse(content.header);
		if(header){
			if(input.header.image && header.image.replace('country/banner/', '') !== input.header.image){
				const oldPath = envData.directorySettings.storagePath+'/'+header.image;
				if(FileService.isExist(oldPath) && header.image) FileService.delete(oldPath);
				input.header.image = await FileService.move(input.header.image, 'country/banner');
			}else{
				input.header.image = header.image;
			}
		}

		const studying = JSON.parse(content.studying);
		if(studying && studying.list){
			await studying.list.forEach(async function(data, index) {
				if(input.studying.list[index].image && data.image.replace('country/studying/', '') !== input.studying.list[index].image){
					const oldPath = envData.directorySettings.storagePath+'/'+data.image;
					if(FileService.isExist(oldPath) && data.image) FileService.delete(oldPath);
					input.studying.list[index].image = await FileService.move(input.studying.list[index].image, 'country/studying');
				}else{
					input.studying.list[index].image = data.image;
				}
			});
		}

		content.meta = JSON.stringify(input.meta);
		content.header = JSON.stringify(input.header);
		content.studying = JSON.stringify(input.studying);
		content.whyChoose = JSON.stringify(input.whyChoose);
		content.help = JSON.stringify(input.help);
		content.known = JSON.stringify(input.known);
		content.otherThing = JSON.stringify(input.otherThing);
		content.livingCost = JSON.stringify(input.livingCost);

		await content.save();

		content.country.status = input.status;
		await content.country.save();

		return success('success update country');
	}

	@Post('/country/inquiry/list')
	async getCountryInquiryList(@Body() input: any, @Req() req: any) {
		let datas;

		const allowedFilter = ['search'];
		const allowedOrder = ['name','createdAt'];
		const searchField = ['name'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = [
			'id', 'countryId', 'name', 'email', 'phone', 'studyLevel', 'latestEducation', 'createdAt'
		];
		option['where']['id'] = {[Op.ne]:1};
		option['include']=[Country];
		datas = await CountryInquiry.findAndCountAll(option);

		const results = [];
		datas.rows.map(data => {
			results.push({
				id: data.id,
				country: data.country.name,
				name: data.name,
				email: data.email,
				phone: data.phone,
				studyLevel: Constant.STUDY_LEVEL_LABEL[data.studyLevel],
				latestEducation: data.latestEducation,
				createdAt: data.createdAt
			});
		});

		return success(await generateResponseList(input , option, results, datas.count, false));
	}
}
