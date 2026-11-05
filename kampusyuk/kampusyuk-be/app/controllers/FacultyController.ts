import {
	error,
	generateDefaultMapping,
	generateDefaultMappingRow,
	generateDefaultOption,
	generateResponseList,
	success
} from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import { Op } from 'sequelize';
import * as envData from '../../config/Env.json';
import { University } from '../common/model/University';
import { Faculty } from '../common/model/Faculty';
import { ProgramStudy } from '../common/model/ProgramStudy';
import { FacultyCategory } from '../common/model/FacultyCategory';
import { FileService } from '../common/service/FileService';
import { checkPayload, validateInput } from '../common/util/Validation';

@JsonController()
export class FacultyController {
	@Post('/faculty/list')
	async getFacultyList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = ['search', 'universityId', 'facultyCategoryId'];
		const allowedOrder = ['id', 'name'];
		const searchField = ['id', 'name'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id', 'name', 'universityId', 'facultyCategoryId'];
		option['include'] = [
			{
				model: University,
				attributes: ['id', 'name']
			},
			{
				model: FacultyCategory,
				attributes: ['id', 'name']
			},
			{
				model: ProgramStudy,
				attributes: ['id'],
				required:false,
				where: {
					deletedAt: null
				}
			}
		];

		option['distinct'] = true;
		option['where']['deletedAt'] = null;

		datas = await Faculty.findAndCountAll(option);
		const results = [];
		datas.rows.map(data => {
			results.push({
				id: data.id,
				name: data.name,
				universityId: data.universityId,
				university: data.university.name,
				facultyCategory: data.facultyCategory.name,
				programStudyCount: data.programStudies.length
			});
		});

		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Get('/faculty/details/:id')
	async getFacultyDetails(@Param('id') id: number, @Req() req: any) {
		let data;
		let result;
		const option = {};
		option['where'] = { id: id };

		option['include'] = [
			{
				model: University,
				attributes: ['id', 'name']
			},
			{
				model: FacultyCategory,
				attributes: ['id', 'name']
			},
			{
				model: ProgramStudy,
				attributes: ['id']
			}
		];
		data = await Faculty.findOne(option);

		if (!data) return error('Faculty not found');

		result = await generateDefaultMappingRow(data);
		result['universityName'] = data.university.name;
		result['facultyCategoryName'] = data.facultyCategory.name;

		return success(result);
	}

	@Put('/faculty/create')
	async facultyCreate(@Body() input: any, @Req() req: any) {
		const check = await validateInput(input, {
			name: 'string',
			description: 'string',
			universityId: 'number',
			facultyCategoryId: 'number'
		});
		if (!check.status) return error(check.message);
		Faculty.create(input);
		return success('success create faculty');
	}

	@Patch('/faculty/update/:id')
	async facultyUpdate(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		const check = await validateInput(input, {
			name: 'string',
			description: 'string',
			universityId: 'number',
			facultyCategoryId: 'number'
		});
		if (!check.status) return error(check.message);
		const faculty = await Faculty.findOne({ where: { id: id } });
		if (!faculty) return error('Faculty not found!');
		faculty.update(input, { where: { id: id } });
		return success('success update faculty');
	}

	@Delete('/faculty/delete/:id')
	async facultyDelete(@Param('id') id: number, @Req() req: any) {
		const faculty = await Faculty.findOne({ where: { id: id } });
		if (!faculty) return error('faculty not found');
		faculty.deletedAt = new Date();
		faculty.deletedBy = req.user.id;
		faculty.save();
		return success('success delete faculty');
	}

	@Get('/faculty/selection/:name')
	async getFacultySelection(@Param('name') name: string, @Req() req: any) {
		const option = {};
		option['attributes'] = ['id', 'name'];
		option['limit'] = 10;
		option['order'] = [['name', 'asc']];
		option['where'] = { name: { [Op.like]: '%' + name + '%' }, deletedAt: null };

		const faculty = await Faculty.findAll(option);
		return success(generateDefaultMapping(faculty));
	}
}
