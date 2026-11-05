import { BaseSequelizeModel } from '@wavecore/core-node';
import { Column, HasMany, Table } from 'sequelize-typescript';
import { Faculty } from './Faculty';
import { ProgramStudyCategory } from './ProgramStudyCategory';

@Table({ tableName: 'facultyCategory' })
export class FacultyCategory extends BaseSequelizeModel {
	@Column
	name : string

	@Column
	nameEn : string

	@Column
	code : string

	@Column
	color : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@HasMany(() => Faculty)
	faculties: Faculty[];

	@HasMany(() => ProgramStudyCategory)
	programStudyCategories: ProgramStudyCategory[];
}
