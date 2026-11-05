import { error, generateDefaultMapping, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success} from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import { Op } from 'sequelize';
import { Faculty } from '../common/model/Faculty';
import { FacultyCategory } from '../common/model/FacultyCategory';
import { ProgramStudyCategory } from '../common/model/ProgramStudyCategory';
import { checkPayload, validateInput } from '../common/util/Validation';

@JsonController()
export class FacultyCategoryController {
	@Post('/faculty_category/list')
	async getFacultyCategoryList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = ['search'];
		const allowedOrder = ['id', 'code', 'name', 'nameEn', 'color'];
		const searchField = ['id', 'code', 'name', 'nameEn', 'color'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id', 'code', 'name', 'nameEn', 'color']
		option['include'] = [
			{
				model: Faculty,
				attributes: ['id', 'name'],
				required:false,
				where:{
					deletedAt:null
				}
			},
			{
				model: ProgramStudyCategory,
				attributes: ['id', 'name', 'nameEn'],
				required:false,
				where:{
					deletedAt:null
				}
			}
		];
		option['distinct'] = true;
		option['where']['deletedAt'] = null;

		datas = await FacultyCategory.findAndCountAll(option);
		const results = [];
		datas.rows.map((data) => {
            results.push({
                id: data.id,
								name: data.name,
								nameEn: data.nameEn,
								code: data.code,
                color: data.color,
                programStudyCategoryCount: data.programStudyCategories.length,
                facultyCount: data.faculties.length
            });
		});

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Get('/faculty_category/details/:id')
	async getFacultyCategoryDetails( @Param('id') id: number, @Req() req: any ) {
		let data;
		let result;
		const option = {};
		option['where'] = { 'id' : id };
		data = await FacultyCategory.findOne(option);
		if(!data) return error('Faculty Category not found');
		result = await generateDefaultMappingRow(data);
		return success(result);
	}

	@Put('/faculty_category/create')
	async facultyCategoryCreate(@Body() input: any, @Req() req: any) {
		const check = await validateInput(input, {
			name: 'string',
			nameEn: 'string',
			code: 'string',
			color: 'string'
		});
		if(!check.status) return error(check.message);
		FacultyCategory.create(input);
		return success('success create faculty category');
	}

	@Patch('/faculty_category/update/:id')
	async facultyCategoryUpdate(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		const check = await validateInput(input, {
			name: 'string',
			nameEn: 'string',
			code: 'string',
			color: 'string'
		});
		if(!check.status) return error(check.message);
		const facultyCategory = await FacultyCategory.findOne({where:{'id':id}});
		if(!facultyCategory) return error('Faculty not found!');
		facultyCategory.update(input,{where:{'id':id}});
		return success('success update faculty category');
	}

	@Delete('/faculty_category/delete/:id')
	async facultyCategoryDelete(@Param('id') id: number, @Req() req: any) {
		const facultyCategory = await FacultyCategory.findOne({where:{ 'id' : id }});
		if(!facultyCategory) return error('faculty category not found');
		facultyCategory.deletedAt = new Date();
		facultyCategory.deletedBy = req.user.id;
		facultyCategory.save();
		return success('success delete faculty category');
	}

	@Get('/faculty_category/selection/:name')
	async getFacultyCategorySelection(@Param('name') name: string, @Req() req: any) {
		const option = {};
		option['attributes'] = ['id', 'name', 'nameEn'];
		option['limit'] = 10;
		option['order'] = [['name', 'asc']];
		option['where'] = {
			[Op.or]:{
				name : { [Op.like]:'%'+name+'%' },
				nameEn : { [Op.like]:'%'+name+'%' }
			},
			deletedAt:null
		};

		const facultyCategory = await FacultyCategory.findAll(option);
		return success(generateDefaultMapping(facultyCategory));
	}
}
