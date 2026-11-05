import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { FaqCategory } from './FaqCategory';

@Table({ tableName: 'faq' })
export class Faq extends BaseSequelizeModel {
	@ForeignKey(() => FaqCategory)
	@Column
	faqCategoryId : number

	@Column
	question : string

	@Column
	answer : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@BelongsTo(() => FaqCategory)
	faqCategory: FaqCategory;
}
