import { BaseSequelizeModel } from '@wavecore/core-node';
import { Column, HasMany, Table } from 'sequelize-typescript';
import { City } from './City';
import { Faculty } from './Faculty';
import { University } from './University';

@Table({ tableName: 'province' })
export class Province extends BaseSequelizeModel {
	@Column
	name : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@HasMany(() => City)
	cities: City[];

	@HasMany(() => University)
	univercities: University[];
}
