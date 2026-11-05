import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { University } from './University';
import { User } from './User';

@Table({ tableName: 'userUniversity' })
export class UserUniversity extends BaseSequelizeModel {
	@ForeignKey(() => User)
	@Column
	userId : number

	@ForeignKey(() => University)
	@Column
	universityId : number

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

	@BelongsTo(() => University)
	university: University;
}
