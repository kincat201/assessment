import {
	error,
	generateDefaultMappingRow,
	generateDefaultOption,
	generateResponseList,
	success
} from '@wavecore/core-node';
import { Body, Get, JsonController, Param, Post, Req } from '@wavecore/routing-controllers';
import { Article } from '../common/model/Article';
import { checkPayload } from '../common/util/Validation';
import { defaultValue } from '../common/util/CommonUtil';
import { Constant } from '../common/constant/Constant';
import { System } from '../common/util/System';
import { ValidatorService } from '../common/service/ValidatorService';
import { FileService } from '../common/service/FileService';
import { Op } from 'sequelize';
import { ManipulatorService } from '../common/service/ManipulatorService';

@JsonController()
export class ArticleController {
	@Post('/article/list')
	async getArticleList(@Body() input: any, @Req() req: any) {
		if (!input.orderBy) {
			input.orderBy = {};
		}
		if (!input.orderBy.isFeatured) {
			input.orderBy.isFeatured = "DESC";
		}
		if (!input.orderBy.createdAt) {
			input.orderBy.createdAt = 'DESC';
		}
		let datas;
		const allowedFilter = ['search', 'isFeatured'];
		const allowedOrder = ['title', 'isFeatured', 'createdAt'] ;
		const searchField = ['title', 'tags'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		if (input.filter?.isFeatured !== undefined) {
			option['where']['isFeatured'] = input.filter.isFeatured;
		}
		option['where']['status'] = Constant.ARTICLE_ACTIVE;
		option['attributes'] = [
			'id',
			'title',
			'tags',
			'content',
			'description',
			'metaTitle',
			'metaDescription',
			'thumbnail',
			'isFeatured',
			'author',
			'createdAt'
		];
		option['where']['deletedAt'] = null;
		datas = await Article.findAndCountAll(option);

		const results = [];
		datas.rows.map(data => {
			results.push({
				id: data.id,
				title: defaultValue(data.title),
				description: defaultValue(data.description),
				content: defaultValue(data.content),
				metaTitle: defaultValue(data.metaTitle),
				metaDescription: defaultValue(data.metaDescription),
				thumbnail: data.thumbnail ? FileService.getFileUrl(data.thumbnail) : '',
				createdAt: defaultValue(data.createdAt, System.getTime().toDate()),
				isFeatured: data.isFeatured,
				author: defaultValue(data.author),
				tags: data.tags ? data.tags.split(',') : [],
				slug: ManipulatorService.toSlugFormat(data.title, data.id)
			});
		});

		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Get('/article/details/:id')
	async getArticleDetails(@Param('id') id: string, @Req() req: any) {
		let data;
		let result;
		const option = {};
		if (!ValidatorService.hasValue(id)) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_FORMAT_GENERAL);
		}
		const slug = id.split('-');
		const universityId = slug[slug.length - 1];
		if (!universityId) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_FORMAT_GENERAL);
		}
		if (!ValidatorService.isId(parseInt(universityId))) {
			return error(Constant.RETURN_MESSAGE.ERROR.WRONG_READ_ID_FORMAT);
		}
		option['where'] = {
			id: universityId,
			status: Constant.ARTICLE_ACTIVE
		};
		data = await Article.findOne(option);

		if (!data) return error('Article not found');

		result = await generateDefaultMappingRow(data);
		result['tags'] = result.tags ? result.tags.split(',') : [];
		if (result.thumbnail) {
			result.thumbnail = FileService.getFileUrl(result.thumbnail);
		}
		result['otherArticles'] = await Article.findAll({
			where: {
				id: {
					[Op.ne]: universityId
				}
			},
			order: [['createdAt', 'DESC']],
			limit: 10,
			raw: true,
			attributes: ['id', 'title', 'createdAt']
		});
		for (let i = 0; i < result['otherArticles'].length; i++) {
			result['otherArticles'][i]['slug'] = ManipulatorService.toSlugFormat(
				result['otherArticles'][i]['title'],
				result['otherArticles'][i]['id']
			);
		}
		return success(result);
	}
}
