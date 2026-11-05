import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { Country } from './Country';

@Table({ tableName: 'countryInquiry' })
export class CountryInquiry extends BaseSequelizeModel {
	@ForeignKey(() => Country)
	@Column
	countryId : number

	@Column
	name : string

	@Column
	email : string

	@Column
	phone : string

	@Column
	studyLevel : string

	@Column
	latestEducation : string

	@BelongsTo(() => Country)
	country: Country;
}
