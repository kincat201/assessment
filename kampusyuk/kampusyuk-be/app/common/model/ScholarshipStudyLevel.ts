import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { Scholarship } from './Scholarship';

@Table({ tableName: 'scholarshipStudyLevel' })
export class ScholarshipStudyLevel extends BaseSequelizeModel {

	@ForeignKey(() => Scholarship)
	@Column
	scholarshipId : number

	@Column
	level : string

	@BelongsTo(() => Scholarship)
	scholarship: Scholarship;
}
