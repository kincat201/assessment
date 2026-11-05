import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { Admin } from './Admin';

@Table({ tableName: 'adminAcl' })
export class AdminAcl extends BaseSequelizeModel {
	@ForeignKey(() => Admin)
	@Column
	adminId : number

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

	@BelongsTo(() => Admin)
	admin: Admin;
}
