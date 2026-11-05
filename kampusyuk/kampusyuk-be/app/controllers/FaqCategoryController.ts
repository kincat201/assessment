import { error, generateDefaultMapping, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success} from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import { Op } from 'sequelize';
import { Faq } from '../common/model/Faq';
import { FaqCategory } from '../common/model/FaqCategory';
import { checkPayload, validateInput } from '../common/util/Validation';

@JsonController()
export class FaqCategoryController {
	@Post('/faq_category/list')
	async getFaqCategoryList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = ['search'];
		const allowedOrder = ['id', 'name'];
		const searchField = ['id', 'name'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id', 'name']
		option['include'] = [
			{
				model: Faq,
				attributes: ['id']
			}
		];
		option['distinct'] = true;
		option['where']['deletedAt'] = null;

		datas = await FaqCategory.findAndCountAll(option);
		const results = [];
		datas.rows.map((data) => {
            results.push({
                id: data.id,
				name: data.name,
                faqCount: data.faqs.length
            });
		});

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Get('/faq_category/details/:id')
	async getFaqCategoryDetails( @Param('id') id: number, @Req() req: any ) {
		let data;
		let result;
		const option = {};
		option['where'] = { 'id' : id };
		data = await FaqCategory.findOne(option);
		if(!data) return error('FAQ Category not found');
		result = await generateDefaultMappingRow(data);
		return success(result);
	}

	@Put('/faq_category/create')
	async faqCategoryCreate(@Body() input: any, @Req() req: any) {
		const check = await validateInput(input, {
			name: 'string'
		});
		if(!check.status) return error(check.message);
		FaqCategory.create(input);
		return success('success create faq category');
	}

	@Patch('/faq_category/update/:id')
	async faqCategoryUpdate(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		const check = await validateInput(input, {
			name: 'string'
		});
		if(!check.status) return error(check.message);
		const faqCategory = await FaqCategory.findOne({where:{'id':id}});
		if(!faqCategory) return error('Faculty not found!');
		faqCategory.update(input,{where:{'id':id}});
		return success('success update faq category');
	}

	@Delete('/faq_category/delete/:id')
	async faqCategoryDelete(@Param('id') id: number, @Req() req: any) {
		const faqCategory = await FaqCategory.findOne({where:{ 'id' : id }});
		if(!faqCategory) return error('faq category not found');
		faqCategory.deletedAt = new Date();
		faqCategory.deletedBy = req.user.id;
		faqCategory.save();
		return success('success delete faq category');
	}

	@Get('/faq_category/selection/:name')
	async getFaqCategorySelection(@Param('name') name: string, @Req() req: any) {
		const option = {};
		option['attributes'] = ['id', 'name'];
		option['limit'] = 10;
		option['order'] = [['name', 'asc']];
		option['where'] = {name : { [Op.like]:'%'+name+'%' }, deletedAt:null};

		const faqCategory = await FaqCategory.findAll(option);
		return success(generateDefaultMapping(faqCategory));
	}
}
