import { BaseSequelizeModel } from '@wavecore/core-node';
import { Column, HasMany, Table } from 'sequelize-typescript';
import { Faq } from './Faq';

@Table({ tableName: 'faqCategory' })
export class FaqCategory extends BaseSequelizeModel {
	@Column
	name : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@HasMany(() => Faq)
	faqs: Faq[];
}
