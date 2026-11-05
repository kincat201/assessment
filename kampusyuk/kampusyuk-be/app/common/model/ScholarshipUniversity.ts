import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { Scholarship } from './Scholarship';
import { University } from './University';

@Table({ tableName: 'scholarshipUniversity' })
export class ScholarshipUniversity extends BaseSequelizeModel {
	@ForeignKey(() => University)
	@Column
	universityId : number

	@ForeignKey(() => Scholarship)
	@Column
	scholarshipId : number

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

	@BelongsTo(() => Scholarship)
	scholarship: Scholarship;
}
