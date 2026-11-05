import { error, generateDefaultMapping, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import Sequelize, { Op } from 'sequelize';
import { Constant } from '../common/constant/Constant';
import { User } from '../common/model/User';
import { UserAcl } from '../common/model/UserAcl';
import { checkPayload, validate, validEmail } from '../common/util/Validation';
import { Student } from '../common/model/Student';
import { defaultValue } from '../common/util/CommonUtil';

@JsonController()
export class UserController {
	@Post('/user/list')
	async getApplicantList(@Body() input: any, @Req() req: any) {

		let datas;

		const allowedFilter = ['search','applyDateFrom','applyDateTo'];
		const allowedOrder = ['id','name','email','createdAt'];
		const searchField = ['name','email','id'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if(!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {
			"applyDateFrom":"createdAt",
			"applyDateTo":"createdAt"
		}, searchField);
		option['attributes'] = [
			'id',
			'name',
			'email',
			['createdAt','applyDate'],
			[
				Sequelize.literal(
					'(SELECT COUNT(admission.id) FROM admission WHERE userId = `User`.`id`)'
				),
				'application'
			]
		];
		option['where']['deletedAt'] = null;
		option['where']['role'] = Constant.USER_ROLE_STUDENT;

		datas = await User.findAndCountAll(option);
		const results = generateDefaultMapping(datas.rows);
		results.map( (user,index) =>{
			results[index]['paymentOverdue'] = 0;
		});

		return success(await generateResponseList(input , option, results, datas.count, false));
	}

	@Get('/user/details/:id')
	async getApplicantDetails( @Param('id') id: number, @Req() req: any ) {
		let user;
		let result;
		const option = {};
		option['attributes'] = ['id','name','email','phone','createdAt'];
		option['where'] = { 'id' : id };
		option['where']['deletedAt'] = null;

		option['include'] = [Student];
		user = await User.findOne(option);

		if(!user) return error('user not found');

		result = {
			id : user.id,
			name : user.name,
			email : user.email,
			phone : user.phone,
			address: defaultValue(user.student.address),
			birthDate: defaultValue(user.student.birthDate),
			birthPlace: defaultValue(user.student.birthPlace),
			gender: defaultValue(user.student.gender),
			schoolFrom: defaultValue(user.student.schoolFrom),
			universityFrom: defaultValue(user.student.universityFrom),
			createdAt : user.createdAt,
		}

		return success(result);
	}

	@Patch('/user/update/:id')
	async userUpdate(@Param('id') id: number, @Body() input: any, @Req() req: any) {
		const check = await validate(input,['name','email','phone','address','birthDate',
			'birthPlace','gender','schoolFrom','universityFrom']);

		if(!check.status) return error(check.message);

		const	user = await User.findOne({
			where:{ 'id' : id, 'deletedAt' : null },
			include:[Student]
		});
		if(!user) return error('user not found');

		if(!validEmail(input.email)) return error('invalid email format');

		const checkEmail = await User.count({where:{
				email:input.email,
				deletedAt: null,
				id: {
					[Op.ne] : id
				}
			}});

		if(checkEmail > 0) return error('Email already taken, please use other email');

		user.name = input.name;
		user.email = input.email;
		user.phone = input.phone;

		user.updatedBy = req.user.id;
		await user.save();

		user.student.address = input.address;
		user.student.birthDate = input.birthDate;
		user.student.birthPlace = input.birthPlace;
		user.student.gender = input.gender;
		user.student.schoolFrom = input.schoolFrom;
		user.student.universityFrom = input.universityFrom;
		await user.student.save();

		return success('success update user');
	}

	@Delete('/user/delete/:id')
	async userDelete(@Param('id') id: number, @Req() req: any) {
		if(req.user.id === id) return error('can\'t delete your self');

		const	user = await User.findOne({where:{ 'id' : id }});
		if(!user) return error('user not found');
		user.deletedAt = new Date();
		user.deletedBy = id;
		user.save();

		return success('success delete user');
	}
}
