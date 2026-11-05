import { BaseSequelizeModel } from '@wavecore/core-node';
import { Column, Table } from 'sequelize-typescript';

@Table({ tableName: 'cms' })
export class Cms extends BaseSequelizeModel {
	@Column
	title : string

	@Column
	key : string

	@Column
	value : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date
}
