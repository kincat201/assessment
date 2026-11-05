import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { Article } from './Article';

@Table({ tableName: 'articleTag' })
export class ArticleTag extends BaseSequelizeModel {
	@ForeignKey(() => Article)
	@Column
	articleId : number

	@Column
	tag : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@BelongsTo(() => Article)
	articles: Article;
}
