import { BaseSequelizeModel } from '@wavecore/core-node';
import { AfterFind, BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { Assessment } from './Assessment';

@Table({ tableName: 'assessmentAnswer' })
export class AssessmentAnswer extends BaseSequelizeModel {
	@ForeignKey(() => Assessment)
	assessmentId : number

	@Column
	question : string

	@Column
	types : number

	@Column
	answer : number

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@BelongsTo(() => Assessment)
	assessment: Assessment;
}
