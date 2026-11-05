import { BaseSequelizeModel } from '@wavecore/core-node';
import { Column, HasMany, Table, BelongsTo, ForeignKey } from 'sequelize-typescript';
import { ProgramStudy } from './ProgramStudy';
import { ProgramStudyCategoryProspect } from './ProgramStudyCategoryProspect';
import { FacultyCategory } from './FacultyCategory';

@Table({ tableName: 'programStudyCategory' })
export class ProgramStudyCategory extends BaseSequelizeModel {
	@ForeignKey(() => FacultyCategory)
	@Column
	facultyCategoryId : number

	@Column
	name : string

	@Column
	nameEn : string

	@Column
	thumbnail : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@HasMany(() => ProgramStudy)
	programStudies: ProgramStudy[];

	@HasMany(() => ProgramStudyCategoryProspect)
	programStudyCategoryProspects: ProgramStudyCategoryProspect[];

	@BelongsTo(() => FacultyCategory)
	facultyCategory: FacultyCategory;
}
