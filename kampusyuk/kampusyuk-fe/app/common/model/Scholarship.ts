import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { ScholarshipProvider } from './ScholarshipProvider';
import { ScholarshipUniversity } from './ScholarshipUniversity';
import { ScholarshipStudyLevel } from './ScholarshipStudyLevel';

@Table({ tableName: 'scholarship' })
export class Scholarship extends BaseSequelizeModel {

	@ForeignKey(() => ScholarshipProvider)
	@Column
	scholarshipProviderId : number

	@Column
	metaTitle : string

	@Column
	metaDescription : string

	@Column
	name : string

	@Column
	types : string

	@Column
	area : string

	@Column
	banner : string

	@Column
	deadline : Date

	@Column
	amount : number

	@Column
	amountTypes: string;

	@Column
	amountText: string;

	@Column
	content : string

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

	@BelongsTo(() => ScholarshipProvider)
	scholarshipProvider: ScholarshipProvider;

	@HasMany(() => ScholarshipUniversity)
	scholarshipUnivercities: ScholarshipUniversity[];

	@HasMany(() => ScholarshipStudyLevel)
	scholarshipStudyLevels: ScholarshipStudyLevel[];
}
