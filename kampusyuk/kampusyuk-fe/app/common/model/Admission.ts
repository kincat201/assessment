import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasOne, Table } from 'sequelize-typescript';
import { AdmissionSchedule } from './AdmissionSchedule';
import { ProgramStudy } from './ProgramStudy';
import { Scholarship } from './Scholarship';
import { Transaction } from './Transaction';
import { User } from './User';

@Table({ tableName: 'admission' })
export class Admission extends BaseSequelizeModel {
	@ForeignKey(() => ProgramStudy)
	programStudyId : number

	@ForeignKey(() => AdmissionSchedule)
	admissionScheduleId : number

	@Column
	registrationId : string

	@ForeignKey(() => Scholarship)
	scholarshipId : number

	@ForeignKey(() => User)
	userId : number

	@Column
	name : string

	@Column
	email : string

	@Column
	phone : string

	@Column
	registrationType : string

	@Column
	classType : string

	@Column
	remark : string

	@Column
	schoolFrom : string

	@Column
	englishProficiency : string

	@Column
	jobTitle : string

	@Column
	graduateUniversity : string

	@Column
	registrationFee: string

	@Column
	registrationFeeDate:Date;

	@Column
	registrationFeeMethod: string;

	@Column
	registrationAttachment:string;

	@Column
	tuitionFee:string;

	@Column
	tuitionFeeDate:Date;

	@Column
	tuitionFeeMethod:string;

	@Column
	tuitionAttachment:string;

	@Column
	submitDocument:string;

	@Column
	takingExam:string;

	@Column
	progressRegistration : string

	@Column
	progressTest : string

	@Column
	progressAcceptance : string

	@Column
	progressRemark : string

	@Column
	status:string;

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@BelongsTo(() => ProgramStudy)
	programStudy: ProgramStudy;

	@BelongsTo(() => AdmissionSchedule)
	admissionSchedule: AdmissionSchedule;

	@BelongsTo(() => Scholarship)
	scholarship: Scholarship;

	@BelongsTo(() => User)
	user: User;
	
	@HasOne(() => Transaction)
	transaction: Transaction;

}
