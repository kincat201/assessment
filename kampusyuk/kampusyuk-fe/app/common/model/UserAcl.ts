import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { User } from './User';

@Table({ tableName: 'userAcl' })
export class UserAcl extends BaseSequelizeModel {
	@ForeignKey(() => User)
	@Column
	userId : number

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

	@BelongsTo(() => User)
	user: User;
}
