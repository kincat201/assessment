import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, HasMany, Table } from 'sequelize-typescript';
import { Faculty } from './Faculty';
import { Province } from './Province';
import { University } from './University';

@Table({ tableName: 'city' })
export class City extends BaseSequelizeModel {
	@ForeignKey(() => Province)
	@Column
	provinceId : number

	@Column
	name : string

	@Column
	types : string

	@Column
	postalCode : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@BelongsTo(() => Province)
	province: Province;

	@HasMany(() => University)
	univercities: University[];
}
