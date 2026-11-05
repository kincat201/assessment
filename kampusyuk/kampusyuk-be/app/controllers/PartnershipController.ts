import { error, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success} from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import fileType = require('file-type');
import { Constant } from '../common/constant/Constant';
import { Partnership } from '../common/model/Partnership';
import { FileService } from '../common/service/FileService';
import { PartnershipService } from '../common/service/PartnershipService';
import { checkPayload } from '../common/util/Validation';

@JsonController()
export class FaqController {
	@Post('/partnership/list')
	async getPartnershipList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = ['search','dateFrom','dateTo'];
		const allowedOrder = ['id','name','university','role','email','phone','message'];
		const searchField = ['id','name','university','role','email','phone','message'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {
			"dateFrom":"createdAt",
			"dateTo":"createdAt"
		}, searchField);
		option['where']['deletedAt'] = null;

		const exportTransaction: boolean = input.exportTo && input.exportTo.length > 0;

		if (exportTransaction) {
			delete option.limit;
			delete option.offset;
			option.order = [['id', 'ASC']];
		}

		datas = await Partnership.findAndCountAll(option);

		if (exportTransaction) {
			const validExport = [Constant.EXPORT_TYPE_CSV, Constant.EXPORT_TYPE_EXCEL];
			if (!validExport.includes(input.exportTo)) {
				return error(
					`Invalid export type. It should ${validExport.join(' or ')}`
				);
			}

			const file: any = await PartnershipService.exportData(datas.rows, input.exportTo, req);
			const extension = fileType(file.buffer);
			const filepath = await FileService.store(file.buffer, extension.ext);

			return success(FileService.getFileUrl(filepath,'temp'));
		}

		const results = [];
		datas.rows.map((data) => {
			results.push({
				id: data.id,
				name: data.name,
				university: data.university,
				role: data.role,
				email: data.email,
				phone: data.phone,
				createdAt: data.createdAt,
			});
		});

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Get('/partnership/details/:id')
	async getPartnershipDetails(@Param('id') id: number, @Req() req: any) {
		let data;
		let result;
		data = await Partnership.findOne({where:{ 'id' : id, 'deletedAt' : null }});
		if(!data) return error('data not found');
		result = await generateDefaultMappingRow(data);
		result['createdAt'] = data.createdAt;
		return success(result);
	}

	@Delete('/partnership/delete/:id')
	async partnershipDelete(@Param('id') id: number, @Req() req: any) {
		const	data = await Partnership.findOne({where:{ 'id' : id, 'deletedAt' : null }});
		if(!data) return error('data not found');
		data.deletedAt = new Date();
		data.deletedBy = req.user.id;
		data.save();

		return success('success delete partnership');
	}
}
