import { error, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success} from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import { Faq } from '../common/model/Faq';
import { FaqCategory } from '../common/model/FaqCategory';
import { checkPayload, validateInput } from '../common/util/Validation';

@JsonController()
export class FaqController {
    @Post('/faq/list')
    async getFaqList(@Body() input: any, @Req() req: any) {
        let datas;
		const allowedFilter = ['search'];
		const allowedOrder = ['id', 'question', 'answer'];
		const searchField = ['id', 'question', 'answer'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id', 'question', 'answer']
		option['include'] = [
			{
				model: FaqCategory,
				attributes: ['id', 'name']
			}
		];
		option['distinct'] = true;
		option['where']['deletedAt'] = null;

		datas = await Faq.findAndCountAll(option);
		const results = [];
		datas.rows.map((data) => {
            results.push({
                id: data.id,
                question: data.question,
                answer: data.answer,
                faqCategoryName: data.faqCategory.name
            });
		});

		return success(await generateResponseList(input , option, results, datas.count, false));
    }

    @Get('/faq/details/:id')
    async getFaqDetails(@Param('id') id: number, @Req() req: any) {
        let data;
		let result;
		const option = {};
        option['where'] = { 'id' : id };
        option['include'] = [
            {
                model: FaqCategory,
                attributes: ['id', 'name']
            }
        ]
		data = await Faq.findOne(option);
		if(!data) return error('faq not found');
        result = await generateDefaultMappingRow(data);
        if(result.faqCategory) result.faqCategoryName = result.faqCategory.name;
		return success(result);
    }

    @Put('/faq/create')
	async faqCreate(@Body() input: any, @Req() req: any) {
		const check = await validateInput(input, {
            question: 'string',
            answer: 'string',
            faqCategoryId: 'number'
		});
		if(!check.status) return error(check.message);
		Faq.create(input);
		return success('success create faq');
    }
    
    @Patch('/faq/update/:id')
	async faqUpdate(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		const check = await validateInput(input, {
			question: 'string',
            answer: 'string',
            faqCategoryId: 'number'
		});
		if(!check.status) return error(check.message);
		const faq = await Faq.findOne({where:{'id':id}});
		if(!faq) return error('faq not found!');
		faq.update(input,{where:{'id':id}});
		return success('success update faq');
    }
    
    @Delete('/faq/delete/:id')
	async faqDelete(@Param('id') id: number, @Req() req: any) {
		const faq = await Faq.findOne({where:{ 'id' : id }});
		if(!faq) return error('faq not found');
		faq.deletedAt = new Date();
		faq.deletedBy = req.user.id;
		faq.save();
		return success('success delete faq');
	}
}
