import { error, generateDefaultMapping, success } from '@wavecore/core-node';
import fileType = require('file-type');
import { Body, Get, JsonController, Param, Patch, Post, Req, UploadedFile, UploadedFiles } from '@wavecore/routing-controllers';
import * as envData from '../../config/Env.json';
import { City } from '../common/model/City';
import { Province } from '../common/model/Province';
import { FaqCategory } from '../common/model/FaqCategory';
import { ProgramStudyCategory } from '../common/model/ProgramStudyCategory';
import { FacultyCategory } from '../common/model/FacultyCategory';
import { FileService } from '../common/service/FileService';
import { validExtension } from '../common/util/Validation';
import { Constant } from '../common/constant/Constant';

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
		const programStudyCategory = await ProgramStudyCategory.findAll({attributes:['id','name']});
		return success(generateDefaultMapping(programStudyCategory));
	}

	@Get('/public/faculty-category/list')
	async getFacultyCategory(@Body() input: any) {
		const facultyCategory = await FacultyCategory.findAll({attributes:['id','name']});
		return success(generateDefaultMapping(facultyCategory));
	}

	@Patch("/public/file/upload")
	async fileUpload(@UploadedFiles("files") files:Express.Multer.File[]){
		// check for filesize above 5mb
		if(!files){
			return error(Constant.RETURN_MESSAGE.FILE_CANNOT_EMPTY);
		}
		if(files.length === 0){
			return error(Constant.RETURN_MESSAGE.FILE_CANNOT_EMPTY);
		}
		const fileNameArray=[];
		for(const file of files){
			const extension = fileType(file.buffer);
			if(!validExtension(extension)) return error('Invalid extension for file');
			if(file.size>5*1e+6){
				return error('Max File Size is 5mb');
			}
		}
		for(const file of files){
			const extension = fileType(file.buffer);
			const result = await FileService.store(file.buffer,extension.ext);
			fileNameArray.push(result);
		}
		return success(fileNameArray);
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
