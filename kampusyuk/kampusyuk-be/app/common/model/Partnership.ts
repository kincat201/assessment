import { BaseSequelizeModel } from '@wavecore/core-node';
import { Column, Table } from 'sequelize-typescript';

@Table({ tableName: 'partnership' })
export class Partnership extends BaseSequelizeModel {
	@Column
	name : string

	@Column
	university : string

	@Column
	role : string

	@Column
	phone : string

	@Column
	email : string

	@Column
	message : string

	@Column
	deletedBy : number

	@Column
	deletedAt : Date
}
