import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { StudentProgramStudyCategory } from './StudentProgramStudyCategory';
import { User } from './User';

@Table({ tableName: 'student' })
export class Student extends BaseSequelizeModel {
	@ForeignKey(() => User)
	@Column
	userId : number

	@Column
	birthDate : Date

	@Column
	birthPlace : string

	@Column
	gender : string

	@Column
	religion : string

	@Column
	address : string

	@Column
	nationality : string

	@Column
	graduateYear : string

	@Column
	graduateField : string

	@Column
	schoolFrom : string

	@Column
	universityFrom : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@BelongsTo(() => User)
	user: User;

	@HasMany(() => StudentProgramStudyCategory)
	StudentProgramStudyCategories: StudentProgramStudyCategory[];
}
