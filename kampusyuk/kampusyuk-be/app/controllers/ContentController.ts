import { error, generateDefaultMapping, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Get, JsonController, Param, Patch, Post, Req } from '@wavecore/routing-controllers';
import { Cms } from '../common/model/Cms';
import { FileService } from '../common/service/FileService';
import { generateDefaultMappingRow } from '../common/util/ListUtil';
import { checkPayload, validate } from '../common/util/Validation';

@JsonController()
export class ContentController {
	@Post('/content/list')
	async getContentList(@Body() input: any, @Req() req: any) {

		let contents;

		const allowedFilter = ['search'];
		const allowedOrder = ['title'];
		const searchField = ['title','key'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id','title','key'];
		option['where']['deletedAt'] = null;

		contents = await Cms.findAndCountAll(option);
		const results = generateDefaultMapping(contents.rows);

		return success(await generateResponseList(input , option, results, contents.count, false));
	}

	@Get('/content/details/:id')
	async getContentDetails( @Param('id') id: number, @Req() req: any ) {
		let data;
		let result;
		const option = {};
		option['attributes'] = ['id','title','key','value'];
		option['where'] = { 'id' : id };
		data = await Cms.findOne(option);

		if(!data) return error('content not found');

		result = await generateDefaultMappingRow(data);
		result['value'] = JSON.parse(data['value']);

		return success(result);
	}

	@Patch('/content/update/:id')
	async contentUpdate(@Param('id') id: number, @Body() input: any, @Req() req: any) {
		const check = await validate(input,['title','key','value']);

		if(!check.status) return error(check.message);

		const	content = await Cms.findOne({where:{ 'id' : id, 'deletedAt' : null }});
		if(!content) return error('content not found');

		content['title'] = input.title;
		content['key'] = input.key;
		content['value'] = JSON.stringify(input.value);
		content.save();

		if(input.attachments){
			await input.attachments.map( async attachment =>{
				await FileService.move(attachment,'content');
			});
		}

		return success('success update content');
	}
}
