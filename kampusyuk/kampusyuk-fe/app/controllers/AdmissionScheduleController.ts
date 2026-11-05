import {error, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success} from '@wavecore/core-node';
import {Body, Get, JsonController, Param, Post, Req} from '@wavecore/routing-controllers';
import {AdmissionSchedule} from '../common/model/AdmissionSchedule';
import {University} from '../common/model/University';
import {checkPayload} from '../common/util/Validation';

@JsonController()
export class AdmissionScheduleController {
	@Post('/admission_schedule/list')
	async getAdmissionScheduleList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = ['search'];
		const allowedOrder = ['id', 'name', 'deadline', 'remark', 'availability', 'status'];
		const searchField = ['id', 'name', 'deadline', 'remark', 'availability', 'status'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);
		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id', 'name', 'deadline', 'remark', 'availability', 'status', 'universityId']
		option['include'] = [
			{
				model: University,
				attributes: ['id', 'name']
			}
		];
		option['distinct'] = true;
		option['where']['deletedAt'] = null;

		datas = await AdmissionSchedule.findAndCountAll(option);
		const results = [];
		datas.rows.map((data) => {
            results.push({
                id: data.id,
                name: data.name,
                deadline: data.deadline,
                remark: data.remark,
                availability: data.availability,
                status: data.status,
                university: data.university.name,
				isExpired: data.isExpired()
            });
		});

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Get('/admission_schedule/details/:id')
	async getAdmissionScheduleDetails( @Param('id') id: number, @Req() req: any ) {
		let data;
		let result;
		const option = {};
		option['where'] = { 'id' : id };
		data = await AdmissionSchedule.findOne(option);

		if(!data) return error('Admission Schedule not found');

		result = await generateDefaultMappingRow(data);

		return success(result);
	}
}
