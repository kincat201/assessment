import { error, generateDefaultMapping, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Get, JsonController, Param, Patch, Post, Req } from '@wavecore/routing-controllers';
import { Page } from '../common/model/Page';
import { FileService } from '../common/service/FileService';
import { generateDefaultMappingRow } from '../common/util/ListUtil';
import { checkPayload, validate } from '../common/util/Validation';
import * as envData from '../../config/Env.json';
import * as _ from 'lodash';
import { Op } from 'sequelize';
import { Constant } from '../common/constant/Constant';

@JsonController()
export class PageController {
	@Post('/page/list')
	async getCountryList(@Body() input: any, @Req() req: any) {
        let datas;

        const allowedFilter = ['search'];
		const allowedOrder = ['id', 'page','createdAt'];
		const searchField = ['page'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

        const option = generateDefaultOption(input, {}, searchField);
        
        option['attributes'] = ['id','page','metaTitle','metaDescription','createdAt'];
        option['where']['deletedAt'] = null;
        
        datas = await Page.findAndCountAll(option);
		const results = generateDefaultMapping(datas.rows);

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Get('/page/details/:id')
	async getCountryDetails( @Param('id') id: number, @Req() req: any ) {
		let data;
		const result = {};
		const option = {};
		option['where'] = { 'id' : id };
		data = await Page.findOne(option);

		if(!data) return error('country not found');

		result['id'] = data.id;
        result['page'] = data.page;
        result['metaTitle'] = data.metaTitle;
        result['metaDescription'] = data.metaDescription;
		result['content'] = JSON.parse(data.content);
		
		if (result['content']) {
			await result['content'].forEach(async function(data, index) {
				if (data.type == 'image') {
					if (result['content'][index].value) {
						result['content'][index].value = {
							fullPath: FileService.getFileUrl(result['content'][index].value),
							image: result['content'][index].value.replace("page/","")
						};
					}
				}
			});
		}
        
        result['createdAt'] = data.createdAt;

		return success(result);
	}

	@Patch('/page/update/:id')
	async countryUpdate(@Param('id') id: number, @Body() input: any, @Req() req: any) {
		const check = await validate(input,['page','metaTitle','metaDescription','content']);

		if(!check.status) return error(check.message);

		const page = await Page.findOne({
			where:{'id' : id, 'deletedAt' : null }
		});
		if(!page) return error('page not found');

		page.page = input.page;
		page.metaTitle = input.metaTitle;
		page.metaDescription = input.metaDescription;

		const content = input.content;

		if(content && (content.length > 0)){
			await content.forEach(async function(data, index) {
				if (data.type == 'image') {
					if	(input.content[index].value && data.value.replace('page/', '') !== input.content[index].value) {
						const oldPath = envData.directorySettings.storagePath + '/' + data.value;
						if(FileService.isExist(oldPath) && data.value) FileService.delete(oldPath);
						input.content[index].value = await FileService.move(input.content[index].value, 'page');
					} else {
						input.content[index].value = data.value;
					}
				}
			});
		}

		page.content = JSON.stringify(input.content);

		await page.save();

		return success('success update page');
	}
}
