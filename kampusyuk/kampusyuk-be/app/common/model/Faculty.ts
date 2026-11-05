import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { FacultyCategory } from './FacultyCategory';
import { ProgramStudy } from './ProgramStudy';
import { University } from './University';

@Table({ tableName: 'faculty' })
export class Faculty extends BaseSequelizeModel {
	@ForeignKey(() => University)
	@Column
	universityId : number

	@ForeignKey(() => FacultyCategory)
	@Column
	facultyCategoryId : number

	@Column
	name : string

	@Column
	description : string

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

	@BelongsTo(() => FacultyCategory)
	facultyCategory: FacultyCategory;

	@HasMany(() => ProgramStudy)
	programStudies: ProgramStudy[];
}
