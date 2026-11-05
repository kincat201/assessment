import {
	error,
	generateDefaultMapping,
	generateDefaultMappingRow,
	generateDefaultOption,
	generateResponseList,
	success
} from '@wavecore/core-node';
import {Body, Get, JsonController, Param, Post, Req} from '@wavecore/routing-controllers';
import {Op} from 'sequelize';
import {University} from '../common/model/University';
import {Faculty} from '../common/model/Faculty';
import {ProgramStudy} from '../common/model/ProgramStudy';
import {FacultyCategory} from '../common/model/FacultyCategory';
import {checkPayload} from '../common/util/Validation';
import {Province} from "../common/model/Province";
import {City} from "../common/model/City";

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
			}
		];

		option['distinct'] = true;
		option['where']['deletedAt'] = null;

		datas = await Faculty.findAndCountAll(option);
		const results = [];
		datas.rows.map(data => {
			results.push({
				id: data.id,
				name: data.name
			});
		});

		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Get('/faculty/details/:id')
	async getFacultyDetails(@Param('id') id: number, @Req() req: any) {
		let data;
		let result;
		const option = {};
		option['where'] = {
			id,
			deletedAt:null
		};

		option['include'] = [
			{
				model: University,
				attributes: ['id', 'name'],
				include:[City,Province]
			},	
			{
				model: FacultyCategory,
				attributes: ['id', 'name','nameEn']
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
		result['universityCity']= data.university.city.name;
		result['universityProvince'] = data.university.province.name;
		result['facultyCategoryName'] = data.facultyCategory.name;
		result['facultyCategoryNameEn'] = data.facultyCategory.nameEn;

		return success(result);
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
