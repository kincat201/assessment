import { BaseSequelizeModel } from '@wavecore/core-node';
import { Column, HasMany, HasOne, Table } from 'sequelize-typescript';
import { Student } from './Student';
import { UserAcl } from './UserAcl';
import { UserUniversity } from './UserUniversity';
import { FindOptions } from 'sequelize';
import * as bcrypt from 'bcrypt';
import { safeNestedObject } from '../util/CommonUtil';
import { Constant } from '../constant/Constant';
import { AclConstant } from '../constant/AclConstant';

@Table({ tableName: 'user' })
export class User extends BaseSequelizeModel {
	@Column
	socialiteId : number

	@Column
	socialiteType : string
	
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
	verificationToken : string

	@Column
	verificationAt : Date

	@Column
	resetToken : string

	@Column
	lastResetAt : Date

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

	@HasMany(() => UserAcl)
	acl: UserAcl[];

	@HasMany(() => UserUniversity)
	UserUnivercities: UserUniversity[];

	@HasOne(() => Student)
	student: Student;

	getAcl(){
		const result=[];
		this.acl.forEach(value=>{
			result.push(value.name);
		});
		return result;
	}

	static async isEmailUsed(email:string){
		const checkEmail = await User.findByEmail(email);
		return checkEmail !== null;
	}

	static async findByEmail(email:string,options: FindOptions={}){
		options=safeNestedObject(options,['where','email'],email);
		return this.findOne(options);
	}

	

	static async isUserValid(emailOrUser:string|User, password:string,options: FindOptions={}):Promise<boolean> {
		let user:User=(emailOrUser instanceof User)?emailOrUser:await this.findByEmail(emailOrUser,options);
		if (!user) {
			return Promise.resolve(false);
		}
		return await bcrypt.compare(password, user.password);
	}

	static async getValidUser(email:string, password:string,options: FindOptions={}):Promise<User> {
		const user=await this.findByEmail(email,options);
		if(!(await this.isUserValid(user,password))){
			return Promise.resolve(null);
		}
		return user;
	}

	static async getValidUserByRole(email:string, password:string, role:string|string[], options:FindOptions={}){
		options=safeNestedObject(options,['where','role'],role);
		return this.getValidUser(email,password,options);
	}

	static async getValidStudent(email:string, password:string, options:FindOptions={}){
		return this.getValidUserByRole(email,password,Constant.USER_ROLE_STUDENT,options);
	}

	static async getValidStudentAndAcl(email:string, password:string, options:FindOptions={}){
		options=safeNestedObject(options,["include"],[{
			model:UserAcl
		}, {
			model: Student,
			attributes: ['id', 'schoolFrom']
		}]);
		return this.getValidUserByRole(email,password,Constant.USER_ROLE_STUDENT,options);
	}

	static async getValidUniversity(email:string,password:string, options:FindOptions={}){
		return this.getValidUserByRole(email,password,Constant.USER_ROLE_UNIVERSITY,options);
	}

	static async getValidStudentAndUniversity(email:string,password:string, options:FindOptions={}){
		return this.getValidUserByRole(email,password,[Constant.USER_ROLE_UNIVERSITY,Constant.USER_ROLE_STUDENT],options);
	}

	static async getValidAdmin(email:string,password:string, options:FindOptions={}){
		return this.getValidUserByRole(email,password,Constant.USER_ROLE_ADMIN,options);
	}

	static async createStudent(input:{}){
		input=safeNestedObject(input,['role'],Constant.USER_ROLE_STUDENT);
		return this.create(input).then(user => {
			Student.create({ userId: user.id });

			const studentACLs = [];
			for (const acl of Object.keys(AclConstant.student.structured)) {
				studentACLs.push({
					userId: user.id,
					name: acl
				})
			}

			UserAcl.bulkCreate(studentACLs)
		});
	}

	static async getValidSocialiteStudentAndAcl(email:string,  options:FindOptions={}){
		const user = this.findOne({
			where : {
				email: email,
				role: Constant.USER_ROLE_STUDENT
			},
			include: [{
				model: UserAcl
			}, {
				model: Student,
				attributes: ['id', 'schoolFrom']
			}]
		});

		return user;
	}
}
