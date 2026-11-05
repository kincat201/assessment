import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { University } from './University';
import { User } from './User';

@Table({ tableName: 'article' })
export class Article extends BaseSequelizeModel {
	@Column
	metaTitle: string;

	@Column
	metaDescription: string;

	@Column
	title: string;

	@Column
	description: string;

	@Column
	tags: string;

	@Column
	author: string;

	@Column
	content: string;

	@Column
	thumbnail: string;

	@Column
	isFeatured: boolean;

	@Column
	status: string;

	@ForeignKey(() => User)
	@Column
	createdBy: number;

	@Column
	updatedBy: number;

	@Column
	deletedAt: Date;

	@Column
	deletedBy: number;

	@BelongsTo(() => User)
	creator: User;
}
