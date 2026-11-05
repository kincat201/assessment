import { error, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import * as _ from 'lodash';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import * as envData from '../../config/Env.json';
import { Scholarship } from '../common/model/Scholarship';
import { ScholarshipProvider } from '../common/model/ScholarshipProvider';
import { FileService } from '../common/service/FileService';
import { checkPayload, validateInput } from '../common/util/Validation';

@JsonController()
export class ScholarshipProviderController{
	@Post("/scholarship_provider/list")
	async getScholarshipProviderList(@Body() input:any){
		let datas;
		const allowedFilter = ['search'];
		const allowedOrder = ['id', 'name'];
		const searchField = ['name'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);
		const option = generateDefaultOption(input, {}, searchField);
		option['attributes']=[
			"id",
			"name",
		];
		option['include'] = [
			{
				model: Scholarship,
				attributes: ['id','name']
			}
		];
		option['distinct'] = true;
		option['where']['deletedAt'] = null;
		datas = await ScholarshipProvider.findAndCountAll(option);
		const results = [];
		datas.rows.map(data=>{
			results.push({
				id:data.id,
				name: data.name,
				scholarship: data.scholarships.length
			});
		});
		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Get('/scholarship_provider/details/:id')
	async getScholarshipProviderDetails( @Param('id') id: number, @Req() req: any ) {
		let data;
		let result;
		const option = {};
		option['where'] = { 'id' : id };
		data = await ScholarshipProvider.findOne(option);
		if(!data) return error('Scholarship Provider not found');
		result = await generateDefaultMappingRow(data);
		if(result.banner){
			result.banner={
				fullPath:FileService.getFileUrl(result.banner),
				image:result.banner.replace("provider/banner/","")
			};
		}

		if(result.logo){
			result.logo={
				fullPath:FileService.getFileUrl(result.logo),
				image:result.logo.replace("provider/logo/","")
			};
		}
		return success(result);
	}

	@Put('/scholarship_provider/create')
	async scholarshipProviderCreate(@Body() input: any, @Req() req: any) {
		const check = await validateInput(input, {
			name: 'string',
		});
		if(!check.status) return error(check.message);
		if(input.banner) input.banner = await FileService.move(input.banner, 'provider/banner');
		if(input.logo) input.logo = await FileService.move(input.logo, 'provider/logo');
		ScholarshipProvider.create(input);

		return success('success create scholarship provider');
	}

	@Patch('/scholarship_provider/update/:id')
	async scholarshipProviderUpdate(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		const check = await validateInput(input, {
			name: 'string',
		});
		if(!check.status) return error(check.message);
		const scholarshipProvider = await ScholarshipProvider.findOne({where:{'id':id}});
		if(!scholarshipProvider) return error('Scholarship Provider not found!');
		if(input.banner && scholarshipProvider.banner.replace('provider/banner/', '') !== input.banner){
			const oldBannerPath = envData.directorySettings.storagePath+'/'+scholarshipProvider.banner;
			if(FileService.isExist(oldBannerPath) && scholarshipProvider.banner) FileService.delete(oldBannerPath);
			input.banner = await FileService.move(input.banner, 'provider/banner');
		} else {
			if(input.banner){
				input = _.omit(input,['banner']);
			}else{
				input.banner = scholarshipProvider.banner;
			}
		}
		if(input.logo && scholarshipProvider.logo.replace('provider/logo/', '') !== input.logo){
			const oldBannerPath = envData.directorySettings.storagePath+'/'+scholarshipProvider.logo;
			if(FileService.isExist(oldBannerPath) && scholarshipProvider.logo) FileService.delete(oldBannerPath);
			input.logo = await FileService.move(input.logo, 'provider/logo');
		} else {
			if(input.logo){
				input = _.omit(input,['logo']);
			}else{
				input.logo = scholarshipProvider.logo;
			}
		}
		scholarshipProvider.update(input,{where:{'id':id}});
		return success('success update scholarship provider');
	}

	@Delete('/scholarship_provider/delete/:id')
	async scholarshipProviderDelete(@Param('id') id: number, @Req() req: any) {
		const scholarshipProvider = await ScholarshipProvider.findOne({where:{ 'id' : id }});
		if(!scholarshipProvider) return error('Scholarship Provider not found');
		scholarshipProvider.deletedAt = new Date();
		scholarshipProvider.deletedBy = req.user.id;
		scholarshipProvider.save();

		return success('success delete scholarship provider');
	}
}
