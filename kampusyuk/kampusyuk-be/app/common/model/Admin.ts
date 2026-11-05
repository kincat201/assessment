import { BaseSequelizeModel } from '@wavecore/core-node';
import { Column, HasMany, HasOne, Table } from 'sequelize-typescript';
import { FindOptions } from 'sequelize';
import * as bcrypt from 'bcrypt';
import { safeNestedObject } from '../util/CommonUtil';
import { AdminAcl } from './AdminAcl';

@Table({ tableName: 'admin' })
export class Admin extends BaseSequelizeModel {
	@Column
	name : string

	@Column
	email : string

	@Column
	password : string

	@Column
	phone : string

	@Column
	role : string

	@Column
	resetToken : string

	@Column
	lastLogin : Date

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

	@HasMany(() => AdminAcl)
	acl: AdminAcl[];

	getAcl(){
		const result=[];
		this.acl.forEach(value=>{
			result.push(value.name);
		});
		return result;
	}

	static async isEmailUsed(email:string){
		const checkEmail = await Admin.findByEmail(email);
		return checkEmail !== null;
	}

	static async findByEmail(email:string,options: FindOptions={}){
		options=safeNestedObject(options,['where','email'],email);
		return this.findOne(options);
	}

	static async isUserValid(emailOrUser:string|Admin, password:string,options: FindOptions={}):Promise<boolean> {
		let admin:Admin=(emailOrUser instanceof Admin)?emailOrUser:await this.findByEmail(emailOrUser,options);
		if (!admin) {
			return Promise.resolve(false);
		}
		return await bcrypt.compare(password, admin.password);
	}

	static async getValidUser(email:string, password:string,options: FindOptions={}):Promise<Admin> {
		const admin=await this.findByEmail(email,options);
		if(!(await this.isUserValid(admin,password))){
			return Promise.resolve(null);
		}
		return admin;
	}
}
