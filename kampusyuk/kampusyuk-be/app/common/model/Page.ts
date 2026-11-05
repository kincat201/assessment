import {BaseSequelizeModel, Env} from '@wavecore/core-node';
import { Column, Table, HasMany } from 'sequelize-typescript';

@Table({ tableName: 'page' })
export class Page extends BaseSequelizeModel {
	@Column
	page: string;

	@Column
	metaTitle: string;

	@Column
	metaDescription: string;

	@Column
	content: string;

	@Column
	createdBy: number;

	@Column
	updatedBy: number;
}
