import { BaseSequelizeModel } from '@wavecore/core-node';
import { AfterFind, HasOne, BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { User } from './User';
import { Transaction } from './Transaction';

@Table({ tableName: 'assessment' })
export class Assessment extends BaseSequelizeModel {
	@ForeignKey(() => User)
	userId : number

	@Column
	hash : string

	@Column
	assessmentNo : string

	@Column
	name : string

	@Column
	gender : string

	@Column
	dateOfBirth : string

	@Column
	schoolName : string

	@Column
	schoolClass : string

	@Column
	field : string

	@Column
	hopes : string

	@Column
	photo : string

	@Column
	status : string

	@Column
	paymentStatus : string

	@Column
	testDate : Date

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

	@HasOne(() => Transaction)
	transaction: Transaction;
}
