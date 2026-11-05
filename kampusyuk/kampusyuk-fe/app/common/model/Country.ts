import { BaseSequelizeModel } from '@wavecore/core-node';
import { Column, HasMany, HasOne, Table } from 'sequelize-typescript';
import { CountryDetail } from './CountryDetail';
import { Province } from './Province';

@Table({ tableName: 'country' })
export class Country extends BaseSequelizeModel {
	@Column
	name : string

	@Column
	currency : string

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

	/*@HasMany(() => Province)
	provinces: Province[];*/

	@HasOne(() => CountryDetail)
	countryDetail: CountryDetail;
}
