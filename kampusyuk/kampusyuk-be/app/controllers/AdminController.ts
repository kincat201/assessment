import { error, generateDefaultMapping, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import * as bcrypt from 'bcrypt';
import { Op } from 'sequelize';
import { AclConstant } from '../common/constant/AclConstant';
import { Constant } from '../common/constant/Constant';
import { Admin } from '../common/model/Admin';
import { AdminAcl } from '../common/model/AdminAcl';
import { checkPayload, validate, validEmail } from '../common/util/Validation';

@JsonController()
export class AdminController {
	@Post('/admin/list')
	async getAdminList(@Body() input: any, @Req() req: any) {

		let users;

		const allowedFilter = ['search','role','status'];
		const allowedOrder = ['id','name','status','role','email','phone','createdAt'];
		const searchField = ['name','phone','role','status','email'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = ['id','name','email','phone','role','status','createdAt'];
		option['where']['deletedAt'] = null;

		users = await Admin.findAndCountAll(option);
		const results = generateDefaultMapping(users.rows);
		results.map( (user,index) =>{
			results[index]['role'] = Constant.USER_ROLE_LIST[user.role];
			results[index]['status'] = Constant.USER_STATUS_LIST[user.status];
		});

		return success(await generateResponseList(input , option, results, users.count, false));
	}

	@Get('/admin/details/:id')
	async getAdminDetails( @Param('id') id: number, @Req() req: any ) {
		let user;
		let result;
		const option = {};
		option['attributes'] = ['id','name','email','phone','role','status','createdAt'];
		option['where'] = { 'id' : id };
		option['where']['deletedAt'] = null;

		option['include'] = [AdminAcl];
		user = await Admin.findOne(option);

		if(!user) return error('admin not found');

		result = {
			id : user.id,
			name : user.name,
			email : user.email,
			phone : user.phone,
			role : Constant.USER_ROLE_LIST[user.role],
			status : Constant.USER_STATUS_LIST[user.status],
			createdAt : user.createdAt,
			acl : [],
		}

		user.acl.map( acl => {
			result.acl.push(acl.name);
		});

		return success(result);
	}

	@Post('/admin/password/reset')
	async adminPasswordReset(@Body() input: any, @Req() req: any) {
		if(!req.user.id) return error('admin not found');
		if(input.newPassword !== input.confirmNewPassword) return error('password confirmation not match');

		const	user = await Admin.findOne({where:{id:req.user.id}});
		const validPassword = await bcrypt.compare(input.currentPassword, user.password);
		if(!validPassword) return error('wrong current password');

		user.password = await bcrypt.hash(input.newPassword,10);
		user.createdBy = req.user.id;
		user.updatedBy = req.user.id;
		user.save();

		return success('success reset password');
	}

	@Get('/acl/list')
	async getAclList() {
		return success(Object.keys(AclConstant.admin.structured));
	}

	@Put('/admin/create')
	async adminCreate(@Body() input: any, @Req() req: any) {
		const check = await validate(input,['name','email','password','status','role']);

		if(!check.status) return error(check.message);
		if(!validEmail(input.email)) return error('invalid email format');
		if(input.password !== input.confirmPassword) return error('password confirmation not match');
		if(!input.acl || input.acl.length === 0) return error('Minimum insert one action list');

		const checkEmail = await Admin.count({where:{email:input.email,deletedAt:null}});

		if(checkEmail > 0) return error('Email already taken, please use other email');

		const user = new Admin();
		user.name = input.name;
		user.email = input.email;
		user.password = await bcrypt.hash(input.password,10);
		user.phone = input.phone;
		user.role = input.role;
		user.status = input.status;
		user.createdBy = req.user.id;
		user.updatedBy = req.user.id;
		await user.save();

		input.acl.map(acl =>{
			let userAcl;
			userAcl = new AdminAcl();
			userAcl.adminId = user.id;
			userAcl.name = acl;
			userAcl.createdBy = req.user.id;
			userAcl.updatedBy = req.user.id;
			userAcl.save();
		});

		return success('success create admin');
	}

	@Patch('/admin/update/:id')
	async adminUpdate(@Param('id') id: number, @Body() input: any, @Req() req: any) {
		const check = await validate(input,['name','email','status','role']);

		if(!check.status) return error(check.message);
		if(!validEmail(input.email)) return error('invalid email format');
		if(!input.acl || input.acl.length === 0) return error('Minimum insert one action list');

		const checkEmail = await Admin.count({where:{
				email:input.email,
				deletedAt: null,
				id: {
					[Op.ne] : id
				}
			}});

		if(checkEmail > 0) return error('Email already taken, please use other email');

		const	user = await Admin.findOne({where:{ 'id' : id, 'deletedAt' : null }});
		if(!user) return error('admin not found');
		user.name = input.name;
		user.email = input.email;
		user.phone = input.phone;
		user.role = input.role;
		user.status = input.status;
		user.updatedBy = req.user.id;
		await user.save();

		await AdminAcl.destroy({where:{ adminId: id}});

		input.acl.map(acl =>{
			const userAcl = new AdminAcl();
			userAcl.adminId = user.id;
			userAcl.name = acl;
			userAcl.createdBy = req.user.id;
			userAcl.updatedBy = req.user.id;
			userAcl.save();
		});

		return success('success update admin');
	}

	@Delete('/admin/delete/:id')
	async adminDelete(@Param('id') id: number, @Req() req: any) {
		if(req.user.id === id) return error('can\'t delete your self');

		const	user = await Admin.findOne({where:{ 'id' : id, 'deletedAt' : null }});
		if(!user) return error('admin not found');
		user.deletedAt = new Date();
		user.deletedBy = id;
		user.save();

		return success('success delete admin');
	}
}
