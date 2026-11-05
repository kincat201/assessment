import {
	error,
	generateDefaultMappingRow,
	generateDefaultOption,
	generateResponseList,
	success
} from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import * as envData from '../../config/Env.json';
import { Article } from '../common/model/Article';
import { FileService } from '../common/service/FileService';
import { checkPayload, validateInput } from '../common/util/Validation';
import * as _ from 'lodash';

@JsonController()
export class ArticleController {
	@Post('/article/list')
	async getArticleList(@Body() input: any, @Req() req: any) {
		let datas;
		const allowedFilter = ['search', 'status'];
		const allowedOrder = ['id', 'metaTitle', 'title', 'tags', 'author', 'createdBy', 'createdAt'];
		const searchField = ['id', 'metaTitle', 'title', 'tags', 'author', 'createdBy', 'createdAt'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['where']['deletedAt'] = null;
		option['attributes'] = ['id', 'metaTitle', 'title', 'tags', 'author', 'isFeatured', 'createdBy', 'createdAt'];

		datas = await Article.findAndCountAll(option);
		const results = [];
		datas.rows.map(data => {
			results.push({
				id: data.id,
				title: data.title,
				author: data.author,
				isFeatured: data.isFeatured,
				tags: data.tags.split(','),
				createdBy: data.createdBy,
				createdAt: data.createdAt
			});
		});

		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Get('/article/details/:id')
	async getArticleDetails(@Param('id') id: number, @Req() req: any) {
		let data;
		let result;
		const option = {};
		option['where'] = { id: id };
		data = await Article.findOne(option);
		if (!data) return error('Article not found');
		result = await generateDefaultMappingRow(data);
		result.tags = data.tags.split(',');
		if (result.thumbnail) {
			result.thumbnail = {
				fullPath: FileService.getFileUrl(result.thumbnail),
				image: result.thumbnail.replace('article/thumbnail/', '')
			};
		}
		return success(result);
	}

	@Put('/article/create')
	async articleCreate(@Body() input: any, @Req() req: any) {
		const check = await validateInput(input, {
			title: 'string',
			metaTitle: 'string',
			metaDescription: 'string',
			tags: ['string'],
			author: 'string',
			content: 'string',
			isFeatured: 'boolean'
		});
		if (!check.status) return error(check.message);
		if (input.thumbnail) input.thumbnail = await FileService.move(input.thumbnail, 'article/thumbnail');
		if (input.tags) input.tags = input.tags.join(',');
		await Article.create(input);
		return success('success create article');
	}

	@Patch('/article/update/:id')
	async articleUpdate(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		const check = await validateInput(input, {
			title: 'string',
			metaTitle: 'string',
			metaDescription: 'string',
			tags: ['string'],
			author: 'string',
			content: 'string',
			isFeatured: 'boolean'
		});
		if (!check.status) return error(check.message);
		const article = await Article.findOne({ where: { id: id } });
		if (!article) return error('Article not found!');
		if (input.thumbnail && article.thumbnail.replace('article/thumbnail/', '') !== input.thumbnail) {
			const oldArticlePath = envData.directorySettings.storagePath + '/' + article.thumbnail;
			if (FileService.isExist(oldArticlePath) && article.thumbnail) FileService.delete(oldArticlePath);
			input.thumbnail = await FileService.move(input.thumbnail, 'article/thumbnail');
		} else {
			if (input.thumbnail) {
				input = _.omit(input, ['thumbnail']);
			}
		}
		if (input.tags) input.tags = input.tags.join(',');
		await article.update(input, { where: { id: id } });
		return success('success update article');
	}

	@Delete('/article/delete/:id')
	async articleDelete(@Param('id') id: number, @Req() req: any) {
		const article = await Article.findOne({ where: { id: id } });
		if (!article) return error('article not found');
		article.deletedAt = new Date();
		article.deletedBy = req.user.id;
		await article.save();

		return success('success delete article');
	}
}
