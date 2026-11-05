import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { Admission } from './Admission';
import { University } from './University';
import { System } from '../util/System';

@Table({ tableName: 'admissionSchedule' })
export class AdmissionSchedule extends BaseSequelizeModel {
	@ForeignKey(() => University)
	universityId : number

	@Column
	name : string

	@Column
	deadline : Date

	@Column
	remark : string

	@Column
	availability : string

	@Column
	status : string

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

	@HasMany(() => Admission)
	admissions: Admission[];

	isExpired(){
		return System.getStartOfToday().isAfter(this.deadline);
	}
}
