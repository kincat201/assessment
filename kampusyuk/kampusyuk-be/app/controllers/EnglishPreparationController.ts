import { error, generateDefaultMapping, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Get, JsonController, Param, Post, Req, Delete } from '@wavecore/routing-controllers';
import { EnglishPreparation } from '../common/model/EnglishPreparation';
import { FileService } from '../common/service/FileService';
import { EnglishPrepService } from '../common/service/EnglishPrepService';
import { checkPayload } from '../common/util/Validation';
import { ManipulatorService } from "../common/service/ManipulatorService";
import { EmailService } from "../common/service/EmailService";
import { Op } from 'sequelize';
import { Constant } from '../common/constant/Constant';
import fileType = require('file-type');

@JsonController()
export class EnglishPreparationController {
    @Post('/english_preparation/list')
	async getEnglishPreparationList(@Body() input: any, @Req() req: any) {
		let datas;

		const allowedFilter = ['search', 'provider'];
		const allowedOrder = ['id', 'name'];
		const searchField = ['name', 'email', 'phone', 'program'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id', 'name', 'email', 'phone', 'program', 'provider', 'note', 'createdAt'];
		option['where']['deletedAt'] = null;

		const exportEnglishPrep: boolean = input.exportTo && input.exportTo.length > 0;

		if (exportEnglishPrep) {
			delete option.limit;
			delete option.offset;
			option.order = [['id', 'ASC']];
		}

		datas = await EnglishPreparation.findAndCountAll(option);

		if (exportEnglishPrep) {
			const validExport = [Constant.EXPORT_TYPE_CSV, Constant.EXPORT_TYPE_EXCEL];
			if (!validExport.includes(input.exportTo)) {
				return error(
					`Invalid export type. It should ${validExport.join(' or ')}`
				);
			}

			const file: any = await EnglishPrepService.export(datas.rows, input.exportTo, req);
			const extension = fileType(file.buffer);
			const filepath = await FileService.store(file.buffer, extension.ext);

			return success(FileService.getFileUrl(filepath,'temp'));
		}

		const results = generateDefaultMapping(datas.rows);

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Get('/english_preparation/details/:id')
	async getEnglishPreparationDetails( @Param('id') id: number, @Req() req: any ) {
		let data;
		let result;
		const option = {};
		option['where'] = { 'id' : id };
		option['attributes'] = ['id', 'name', 'email', 'phone', 'program', 'provider', 'note', 'createdAt'];
		data = await EnglishPreparation.findOne(option);
		if(!data) return error('Article not found');

		// result = await generateDefaultMappingRow(data);
		result = data.dataValues;
		
		return success(result);
	}

	@Delete('/english_preparation/delete/:id')
	async articleDelete(@Param('id') id: number, @Req() req: any) {
		const data = await EnglishPreparation.findOne({where:{ 'id' : id }});
		if(!data) return error('data not found');
		data.deletedAt = new Date();
		data.deletedBy = req.user.id;
		data.save();

		return success('success delete article');
	}
}
