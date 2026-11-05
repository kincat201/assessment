import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { AdmissionSchedule } from './AdmissionSchedule';
import { City } from './City';
import { Country } from './Country';
import { Faculty } from './Faculty';
import { ProgramStudy } from './ProgramStudy';
import { Province } from './Province';
import { ScholarshipUniversity } from './ScholarshipUniversity';
import { UniversityGallery } from './UniversityGallery';
import { UniversityView } from './UniversityView';
import { UserUniversity } from './UserUniversity';

@Table({ tableName: 'university' })
export class University extends BaseSequelizeModel {
	@ForeignKey(() => Country)
	@Column
	countryId : number

	@ForeignKey(() => City)
	@Column
	cityId : number

	@ForeignKey(() => Province)
	@Column
	provinceId : number

	@Column
	name : string

	@Column
	metaTitle : string

	@Column
	metaDescription : string

	@Column
	abbrevation : string

	@Column
	accreditation : string

	@Column
	description : string

	@Column
	types : string

	@Column
	area : string

	@Column
	email : string

	@Column
	website : string

	@Column
	phone : string

	@Column
	address : string

	@Column
	studentAmount : number

	@Column
	map : number

	@Column
	status: string

	@Column
	partner: string

	@Column
	featured: string

	@Column
	logo: string

	@Column
	banner: string

	@Column
	admissionBanner: string

	@Column
	galleryBanner: string

	// @Column
	// companyPartnerDescription: string
	//
	// @Column
	// companyPartnerLogo: string

	@Column
	addressOthers: string

	@Column
	registerLink: string

	@Column
	popularity: number

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@Column
	viewed: number;

	@BelongsTo(() => City)
	city: City;

	@BelongsTo(() => Province)
	province: Province;

	@BelongsTo(() => Country)
	country: Country;

	@HasMany(() => UniversityGallery)
	universityGalleries: UniversityGallery[];

	@HasMany(() => UniversityView)
	universityViews: UniversityView[];

	@HasMany(() => Faculty)
	faculties: Faculty[];

	@HasMany(() => ProgramStudy)
	programStudies: ProgramStudy[];

	@HasMany(() => ScholarshipUniversity)
	scholarshipUnivercities: ScholarshipUniversity[];

	@HasMany(() => AdmissionSchedule)
	admissionSchedules: AdmissionSchedule[];

	@HasMany(() => UserUniversity)
	userUnivercities: UserUniversity[];
}
