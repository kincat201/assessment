import { error, generateDefaultMapping, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success} from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import { Op } from 'sequelize';
import { AdmissionSchedule } from '../common/model/AdmissionSchedule';
import { University } from '../common/model/University';
import { checkPayload, validateInput } from '../common/util/Validation';

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
                university: data.university.name
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

	@Put('/admission_schedule/create')
	async admissionScheduleCreate(@Body() input: any, @Req() req: any) {
		const check = await validateInput(input, {
			name: 'string',
			deadline: 'date',
			remark: 'string',
			availability: 'string',
			status: 'string',
			universityId: 'number'
		});
		if(!check.status) return error(check.message);
		AdmissionSchedule.create(input);
		return success('success create admission schedule');
	}

	@Patch('/admission_schedule/update/:id')
	async admissionScheduleUpdate(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		const check = await validateInput(input, {
			name: 'string',
			deadline: 'date',
			remark: 'string',
			availability: 'string',
			status: 'string',
			universityId: 'number'
		});
		if(!check.status) return error(check.message);
		const admissionSchedule = await AdmissionSchedule.findOne({where:{'id':id}});
		if(!admissionSchedule) return error('Admission Schedule not found!');
		admissionSchedule.update(input,{where:{'id':id}});
		return success('success update admission schedule');
	}

	@Delete('/admission_Schedule/delete/:id')
	async admissionScheduleDelete(@Param('id') id: number, @Req() req: any) {
		const admissionSchedule = await AdmissionSchedule.findOne({where:{ 'id' : id }});
		if(!admissionSchedule) return error('admission schedule not found');
		admissionSchedule.deletedAt = new Date();
		admissionSchedule.deletedBy = req.user.id;
		admissionSchedule.save();
		return success('success delete admission schedule');
	}
}
