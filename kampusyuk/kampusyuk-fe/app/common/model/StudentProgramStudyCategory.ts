import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { ProgramStudyCategory } from './ProgramStudyCategory';
import { Student } from './Student';

@Table({ tableName: 'studentProgramStudyCategory' })
export class StudentProgramStudyCategory extends BaseSequelizeModel {
	@ForeignKey(() => ProgramStudyCategory)
	@Column
	programStudyCategoryId : number

	@ForeignKey(() => Student)
	@Column
	studentId : number

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@BelongsTo(() => ProgramStudyCategory)
	programStudyCategory: ProgramStudyCategory;

	@BelongsTo(() => Student)
	student: Student;
}
