import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { University } from './University';

@Table({ tableName: 'universityView' })
export class UniversityView extends BaseSequelizeModel {
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

	@BelongsTo(() => University)
	university: University;
}
