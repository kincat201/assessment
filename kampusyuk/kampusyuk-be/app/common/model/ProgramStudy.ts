import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, HasOne, Table } from 'sequelize-typescript';
import { Admission } from './Admission';
import { Faculty } from './Faculty';
import { ProgramStudyCategory } from './ProgramStudyCategory';
import { University } from './University';

@Table({ tableName: 'programStudy' })
export class ProgramStudy extends BaseSequelizeModel {
	@ForeignKey(() => University)
	@Column
	universityId : number

	@ForeignKey(() => Faculty)
	@Column
	facultyId : number

	@ForeignKey(() => ProgramStudyCategory)
	@Column
	programStudyCategoryId : number

	@Column
	name : string

	@Column
	metaTitle : string

	@Column
	metaDescription : string

	@Column
	accreditation : string

	@Column
	description : string

	@Column
	studyLevel : string

	@Column
	registrationFee : number

	@Column
	registrationFeeDiscount : number

	@Column
	registrationFormFee : number

	@Column
	registrationFormFeeDiscount : number

	@Column
	website : string

	@Column
	regulerClass : string

	@Column
	staffClass : string

	@Column
	onlineClass : string

	@Column
	icon : string

	@Column
	thumbnail : string

	@Column
	banner : string

	@Column
	paymentRequired : string

	@Column
	progressRegistration : string

	@Column
	progressTest : string

	@Column
	progressAcceptance : string

	@Column
	progressRemark : string

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

	@BelongsTo(() => Faculty)
	faculty: Faculty;

	@BelongsTo(() => ProgramStudyCategory)
	programStudyCategory: ProgramStudyCategory;

	@HasMany(() => Admission)
	Admissions: Admission[];
}
