import * as bcrypt from 'bcrypt';
import {error, success} from '@wavecore/core-node';
import {Body, JsonController, Post, Req} from '@wavecore/routing-controllers';
import {Constant} from '../common/constant/Constant';
import {User} from '../common/model/User';
import {validate, validEmail} from '../common/util/Validation';
import {AclGet, AclPatch} from "../common/decorator/RegisterAcl";
import {InjectUser, InjectUserWithAcl} from "../common/decorator/InjectUser";
import {ValidatorService} from "../common/service/ValidatorService";
import {generatePasswordHash} from "../common/util/CommonUtil";

@JsonController()
export class UserController {
	// @AclGet('/user/profile/details',[Constant.USER_ROLE_STUDENT])
	// async getUserProfile(@InjectUserWithAcl() user:User) {
	// 	const result = {
	// 		id : user.id,
	// 		name : user.name,
	// 		email : user.email,
	// 		phone : user.phone,
	// 		role : Constant.USER_ROLE_LIST[user.role],
	// 		status : Constant.USER_STATUS_LIST[user.status],
	// 		createdAt : user.createdAt,
	// 		acl : user.getAcl(),
	// 	};
	//
	// 	return success(result);
	// }

	// @Post('/user/profile/password/reset')
	// async userPasswordReset(@Body() input: any, @Req() req: any) {
	// 	if(!req.user.id) return error('User not found');
	// 	if(input.newPassword !== input.confirmNewPassword) return error('password confirmation not match');
	//
	// 	const	user = await User.findOne({where:{id:req.user.id}});
	// 	const validPassword = await bcrypt.compare(input.currentPassword, user.password);
	// 	if(!validPassword) return error('wrong current password');
	//
	// 	user.password = await bcrypt.hash(input.newPassword,10);
	// 	user.createdBy = req.user.id;
	// 	user.updatedBy = req.user.id;
	// 	user.save();
	//
	// 	return success('success reset password');
	// }

	// @AclPatch('/user/profile/update',[Constant.USER_ROLE_STUDENT])
	// async userUpdate(@InjectUser() user:User, @Body() input: any, @Req() req: any) {
	// 	if(!user) return error('user not found');
	// 	const check = await validate(input,['name','email','phone']);
	// 	if(!check.status) return error(check.message);
	// 	if(!validEmail(input.email)) return error('invalid email format');
	// 	if(!ValidatorService.isName(input.name)) return error("invalid name format!");
	// 	if(!ValidatorService.isPhoneNumber(input.phone)) return error("invalid phone format!");
	//
	// 	if(user.email !== input.email) {
	// 		if (await User.isEmailUsed(input.email)) return error('Email already taken, please use other email');
	// 	}
	//
	// 	user.name = input.name;
	// 	user.email = input.email;
	// 	if(input.password){
	// 		user.password=generatePasswordHash(input.password);
	// 	}
	// 	user.phone = input.phone;
	// 	user.updatedBy = req.user.id;
	// 	await user.save();
	//
	// 	return success('success update user');
	// }
}
