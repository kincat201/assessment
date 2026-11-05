import { error, generateDefaultMapping, success } from '@wavecore/core-node';
import fileType = require('file-type');
import { Body, Get, JsonController, Param, Patch, Post, Req, UploadedFile } from '@wavecore/routing-controllers';
import * as envData from '../../config/Env.json';
import { City } from '../common/model/City';
import { Province } from '../common/model/Province';
import { FaqCategory } from '../common/model/FaqCategory';
import { ProgramStudyCategory } from '../common/model/ProgramStudyCategory';
import { FacultyCategory } from '../common/model/FacultyCategory';
import { ContactUs } from '../common/model/ContactUs';
import { FileService } from '../common/service/FileService';
import { validExtension, validateInput } from '../common/util/Validation';
import {EmailService} from "../common/service/EmailService";

@JsonController()
export class PublicController {
	@Get('/public/province/list')
	async getProvinceList(@Body() input: any, @Req() request: any) {
		const filterCountry = request.query.countryId ? {countryId: request.query.countryId} : {};
		const province = await Province.findAll({
			attributes:['id','name'],
			where:filterCountry,
			order:[['name','asc']]
		});
		return success(generateDefaultMapping(province));
	}

	@Get('/public/city/list/:provinceId')
	async getCityList(@Body() input: any, @Param('provinceId') provinceId: number) {
		const city = await City.findAll({
			attributes:['id','name','types'],
			where:{'provinceId':provinceId},
			order:[['name','asc']]
		});
		const result = [];
		city.map(ct=>{
			const types = ct.types ? ct.types.toLowerCase().replace(/\b[a-z]/g, function(letter) {
				return letter.toUpperCase();
			}) + ' ': '';
			result.push({
				id: ct.id,
				name: types + ct.name
			});
		})
		return success(result);
	}

	@Get('/public/faq-category/list')
	async getFaqCategoryList(@Body() input: any) {
		const faqCategory = await FaqCategory.findAll({attributes:['id','name']});
		return success(generateDefaultMapping(faqCategory));
	}

	@Get('/public/program-study-category/list')
	async getProgramStudyCategory(@Body() input: any) {
		const programStudyCategory = await ProgramStudyCategory.findAll({attributes:['id','name','nameEn']});
		return success(generateDefaultMapping(programStudyCategory));
	}

	@Get('/public/faculty-category/list')
	async getFacultyCategory(@Body() input: any) {
		const facultyCategory = await FacultyCategory.findAll({attributes:['id','name','nameEn']});
		return success(generateDefaultMapping(facultyCategory));
	}

	@Patch("/public/file/upload")
	async fileUpload(@UploadedFile('file') file: Express.Multer.File){
		// check for filesize above 5mb
		const extension = fileType(file.buffer);
		if(!validExtension(extension)) return error('Invalid extension for file');
		if(file.size>5*1e+6){
			return error('Max File Size is 5mb');
		}
		const result = await FileService.store(file.buffer,extension.ext);
		return success(result);
	}

	@Post("/public/contact")
	async contact(@Body() input: any){
		const data = new ContactUs();
		data.name = input.name;
		data.email = input.email;
		data.content = input.content;
		await data.save();

		EmailService.sendEmail({
            to: "hello@kampusyuk.com",
            subject:"New Message",
            html:"Dears Kampusyuk, <br> <br>"+
                "Berikut adalah pesan terbaru : <br><br>"+
                "Nama : " + input.name + " <br><br>" +
                "Email : " + input.email + " <br><br>" +
                "Pesan : " + input.content + " <br><br>"
		});
		
		return success('Message has been semt.')
	}

	// @Patch("/public/file/copy/:fileName")
	// async fileCopy(@Param('fileName') file: string){
	// 	const result = await FileService.move(file,'university/company');
	// 	return success(result);
	// }
	//
	// @Patch("/public/file/delete/:fileName")
	// async fileDelete(@Param('fileName') file: string){
	// 	const filePath = envData.directorySettings.storagePath + '/university/company/' + file;
	// 	const result = await FileService.delete(filePath);
	// 	return success(result);
	// }
}
