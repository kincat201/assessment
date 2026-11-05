import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { Scholarship } from './Scholarship';

@Table({ tableName: 'scholarshipProvider' })
export class ScholarshipProvider extends BaseSequelizeModel {
	@Column
	name : string

	@Column
	banner : string

	@Column
	logo : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@HasMany(() => Scholarship)
	scholarships: Scholarship[];
}
