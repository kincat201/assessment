import {BaseSequelizeModel} from '@wavecore/core-node';
import {Column} from 'sequelize-typescript';
import {DatabaseTable} from '../decorator/DatabaseTable';

@DatabaseTable()
export class ContactUs extends BaseSequelizeModel {
	@Column
    name: string;
    
    @Column
    email: string;
    
    @Column
    content: string;

	@Column
	createdAt: Date;
}
