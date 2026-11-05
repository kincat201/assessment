import { BaseSequelizeModel } from '@wavecore/core-node';
import { Column, HasMany, Table } from 'sequelize-typescript';
import { ProgramStudyCategoryProspect } from './ProgramStudyCategoryProspect';

@Table({ tableName: 'prospect' })
export class Prospect extends BaseSequelizeModel {
	@Column
	name : string

	@Column
	banner : string

	@Column
	types : string

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@HasMany(() => ProgramStudyCategoryProspect)
	programStudyCategoryProspects: ProgramStudyCategoryProspect[];
}
