import { BaseSequelizeModel } from '@wavecore/core-node';
import { Column, Table } from 'sequelize-typescript';
import { User } from './User';

@Table({ tableName: 'setting' })
export class Setting extends BaseSequelizeModel {
	@Column
	footerLogo : string

	@Column
	callCenterNumber : string

	@Column
	callCenterTime : string

	@Column
	newsletterDescription : string

	@Column
	footerDescription : string

	@Column
	facebookLink : string

	@Column
	instagramLink : string

	@Column
	linkedInLink : string

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date
}
