import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { Country } from './Country';

@Table({ tableName: 'englishPreparation' })
export class EnglishPreparation extends BaseSequelizeModel {
	@Column
	name : string

	@Column
	email : string

	@Column
	phone : string

	@Column
	program : string

	@Column
	provider : string

	@Column
	note : string

	@Column
	createdAt : Date

	@Column
	createdBy : number

	@Column
	updatedAt : Date

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date
}
