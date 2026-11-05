import { Env, errorCode, success } from '@wavecore/core-node';
import { Body, JsonController, Post, Req } from '@wavecore/routing-controllers';
import * as bcrypt from 'bcrypt';
import * as jwt from 'jsonwebtoken';
import { Admin } from '../common/model/Admin';
import { ErrorCode } from '../common/util/Error';
import { getAclListParent } from '../middleware/AppendAcl';

@JsonController()
export class AuthController {

	@Post("/auth/login")
	async function(@Body() data: any, @Req() request: any) {
		let user;
		user  = await Admin.findOne({where: { 'email': data.email, 'deletedAt': null }});

		const validPassword = user ? await bcrypt.compare(data.password, user.password) : false;
		if (!user || !validPassword) {
			return errorCode(ErrorCode.INVALID_USER_PASSWORD);
		}
		const token = jwt.sign( { id:user.id, role:user.role, user}, Env().jwtSecret);

		const aclListResult = await getAclListParent(user.id);

		const responseData = {
			token,
			id:user.id,
			name:user.name,
			role:user.role,
			acl: aclListResult
		}

		return success(responseData);
	}

}


