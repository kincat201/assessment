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
import { FacultyCategory } from '../common/model/FacultyCategory';
import { ProgramStudy } from '../common/model/ProgramStudy';
import { ProgramStudyCategory } from '../common/model/ProgramStudyCategory';
import { University } from '../common/model/University';
import { checkPayload, validateInput } from '../common/util/Validation';
import { FileService } from '../common/service/FileService';
import * as _ from 'lodash';
import * as envData from '../../config/Env.json';

@JsonController()
export class ProgramStudyCategoryController {
	@Post('/program_study_category/list')
	async getFacultyCategoryList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = ['search','id'];
		const allowedOrder = ['id', 'name', 'nameEn'];
		const searchField = ['id', 'name', 'nameEn'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['where']['deletedAt'] = null;
		option['attributes'] = ['id', 'name','nameEn','facultyCategoryId'];
		option['include'] = [
			{
				model: FacultyCategory,
				attributes: ['id', 'name','nameEn']
			},
			{
				model:ProgramStudy,
				required:false,
				where:{
					deletedAt:null
				}
			}
		];
		option['distinct'] = true;
		option['where']['deletedAt'] = null;

		datas = await ProgramStudyCategory.findAndCountAll(option);
		const results = [];
		datas.rows.map(data => {
			results.push({
				id: data.id,
				name: data.name,
				nameEn: data.nameEn,
				facultyCategory: data.facultyCategory.name,
				facultyCategoryEn: data.facultyCategory.nameEn,
				programStudyAmount: (data.programStudies)?data.programStudies.length:0
			});
		});

		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Get('/program_study_category/details/:id')
	async getProgramStudyCategoryDetails(@Param('id') id: number, @Req() req: any) {
		let data;
		let result;
		const option = {};
		option['where'] = { id: id };
		option['include'] = [
			{
				model: FacultyCategory,
				attributes: ['id', 'name','nameEn']
			}
		];
		data = await ProgramStudyCategory.findOne(option);
		if (!data) return error('Program Study Category not found');
		result = await generateDefaultMappingRow(data);
		if (result.thumbnail) {
			result.thumbnail = {
				fullPath: FileService.getFileUrl(result.thumbnail),
				image: result.thumbnail.replace('program_study_category/thumbnail/', '')
			};
		} else {
			result.thumbnail = null;
		}
		return success(result);
	}

	@Put('/program_study_category/create')
	async programStudyCategoryCreate(@Body() input: any, @Req() req: any) {
		const check = await validateInput(input, {
			name: 'string',
			nameEn: 'string',
			facultyCategoryId: 'number'
		});
		if (!check.status) return error(check.message);
		input.thumbnail = FileService.move(input.thumbnail, 'program_study_category/thumbnail');
		ProgramStudyCategory.create(input);
		return success('success create program study category');
	}

	@Patch('/program_study_category/update/:id')
	async programStudyCategoryUpdate(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		const check = await validateInput(input, {
			name: 'string',
			nameEn: 'string',
			facultyCategoryId: 'number'
		});
		if (!check.status) return error(check.message);
		const programStudyCategory = await ProgramStudyCategory.findOne({ where: { id: id } });
		if (!programStudyCategory) return error('Program Study Category not found!');
		if(!programStudyCategory.thumbnail){
			programStudyCategory.thumbnail='';
		}
		if (
			input.thumbnail &&
			programStudyCategory.thumbnail.replace('program_study_category/thumbnail/', '') !== input.thumbnail
		) {
			const oldPath = envData.directorySettings.storagePath + '/' + programStudyCategory.thumbnail;
			if (FileService.isExist(oldPath) && programStudyCategory.thumbnail) FileService.delete(oldPath);
			input.thumbnail = FileService.move(input.thumbnail, 'program_study_category/thumbnail');
		} else {
			if (input.thumbnail) {
				input = _.omit(input, ['thumbnail']);
			}
		}
		programStudyCategory.update(input, { where: { id: id } });
		return success('success update program study category');
	}

	@Delete('/program_study_category/delete/:id')
	async programStudyCategoryDelete(@Param('id') id: number, @Req() req: any) {
		const programStudyCategory = await ProgramStudyCategory.findOne({ where: { id: id } });
		if (!programStudyCategory) return error('program study category not found');
		programStudyCategory.deletedAt = new Date();
		programStudyCategory.deletedBy = req.user.id;
		programStudyCategory.save();
		return success('success delete program study category');
	}

	@Get('/program_study_category/selection/:name')
	async getProgramStudyCategorySelection(@Param('name') name: string, @Req() req: any) {
		const option = {};
		option['attributes'] = ['id', 'name'];
		option['limit'] = 10;
		option['order'] = [['name', 'asc']];
		option['where'] = {
			[Op.or]: {
				name: { [Op.like]: '%' + name + '%' },
				nameEn: { [Op.like]: '%' + name + '%' }
			},
			deletedAt: null
		};

		const programStudyCategory = await ProgramStudyCategory.findAll(option);
		return success(generateDefaultMapping(programStudyCategory));
	}
}
