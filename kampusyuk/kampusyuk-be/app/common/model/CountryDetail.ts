import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { Country } from './Country';
import { Province } from './Province';
import { University } from './University';

@Table({ tableName: 'countryDetail' })
export class CountryDetail extends BaseSequelizeModel {
	@ForeignKey(() => Country)
	@Column
	countryId : number

	@Column
	meta : string

	@Column
	header : string

	@Column
	studying : string

	@Column
	whyChoose : string

	@Column
	help : string

	@Column
	known : string

	@Column
	otherThing : string

	@Column
	livingCost : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@BelongsTo(() => Country)
	country: Country;
}
