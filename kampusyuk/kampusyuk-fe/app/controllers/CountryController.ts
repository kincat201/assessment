import { error, generateDefaultMapping, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Get, JsonController, Param, Post, Req } from '@wavecore/routing-controllers';
import { Country } from '../common/model/Country';
import { CountryDetail } from '../common/model/CountryDetail';
import { CountryInquiry } from '../common/model/CountryInquiry';
import { FileService } from '../common/service/FileService';
import { checkPayload } from '../common/util/Validation';
import { ManipulatorService } from "../common/service/ManipulatorService";
import { EmailService } from "../common/service/EmailService";
import { Op } from 'sequelize';
import { Constant } from '../common/constant/Constant';

@JsonController()
export class CountryController {
	@Post('/country/list')
	async getCountryList(@Body() input: any, @Req() req: any) {
		let datas;

		const allowedFilter = ['search'];
		const allowedOrder = ['id', 'name', 'currency', 'createdAt'];
		const searchField = ['name'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id','name','currency','status','createdAt'];
		option['where']['deletedAt'] = null;
		option['where']['id'] = {[Op.ne]:1};

		datas = await Country.findAndCountAll(option);

		const results = [];
		
		datas.rows = datas.rows.map(data => {
			const row = data.toJSON();

			if(data) {
				results.push({
					id: row.id,
					slug: ManipulatorService.toSlugFormat(row.name, row.id),
					name: row.name,
					currency: row.currency,
					status: row.status,
					createdAt: row.createdAt
				});
			}
		});

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Get('/country/details/:id')
	async getCountryDetails( @Param('id') id: string, @Req() req: any ) {
		let data;
		const result = {};
		const option = {};

		const slug = id.split("-");
		const countryId = slug[slug.length-1];

		option['where'] = { 'countryId' : countryId };
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

		result['currency'] = data.country.currency;

		return success(result);
	}

	@Post('/country/inquiry')
	async postCountryInquiry(@Body() input: any) {

		const country = await Country.findOne({where: {id: input.countryId}});
		if(!country) return error("Country not found");

		const data = new CountryInquiry();
		data.countryId = input.countryId;
		data.name = input.name;
		data.email = input.email;
		data.phone = input.phone;
		data.studyLevel = input.studyLevel;
		data.latestEducation = input.latestEducation;
		await data.save();

		EmailService.sendEmail({
            to: [
				"hello@kampusyuk.com",
				"william@wave.co.id"
			],
            subject:"Inquiry Baru untuk " + country.name,
            html:"Dears Kampusyuk, <br> <br>"+
                "Berikut adalah data inquiry baru untuk negara "+ country.name +" : <br><br>"+
                "Nama : " + input.name + " <br><br>" +
                "Email : " + input.email + " <br><br>" +
				"Phone Number : " + input.phone + " <br><br>" +
				"Study Level : " +  Constant.STUDY_LEVEL_LABEL[input.studyLevel] + " <br><br>" +
				"Latest Education : " + input.latestEducation + " <br><br>"
		});
		
		return success('Country Inquiry has been semt.')
	}

	@Post('/country/uk/inquiry')
	async postUkInquiry(@Body() input: any) {
		EmailService.sendEmail({
            to: [
				"hello@kampusyuk.com",
				"william@wave.co.id"
			],
            subject:"Inquiry Baru untuk Session/Webinar di UK",
            html:"Dears Kampusyuk, <br> <br>"+
                "Berikut adalah data inquiry baru untuk Session/Webinar di UK : <br><br>"+
                "Nama : " + input.name + " <br><br>" +
                "Email : " + input.email + " <br><br>" +
				"Phone Number : " + input.phone + " <br><br>" +
				"English Proficiendy : " + input.studyLevel + " <br><br>" +
				"Education Background : " + input.latestEducation + " <br><br>"
		});
		
		return success('Inquiry has been semt.')
	}

    //buat sp jain sekarang pake yang ini
	@Post('/country/canada/inquiry')
	async postCanadaInquiry(@Body() input: any) {
		EmailService.sendEmail({
            to: [
				"hello@kampusyuk.com",
				"william@wave.co.id",
                "sherwin@wave.co.id", 
                "melinda@wave.co.id",
			],
            subject:"Inquiry Baru untuk Session/Webinar SP Jain",
            html:"Dears Kampusyuk, <br> <br>"+
                "Berikut adalah data inquiry baru untuk Session/Webinar SP Jain : <br><br>"+
                "Nama : " + input.name + " <br><br>" +
                "Email : " + input.email + " <br><br>" +
				"Phone Number : " + input.phone + " <br><br>" +
				"English Proficiendy : " + input.studyLevel + " <br><br>" +
				"Education Background : " + input.latestEducation + " <br><br>"
		});
		
		return success('Inquiry has been sent.')
	}
}
