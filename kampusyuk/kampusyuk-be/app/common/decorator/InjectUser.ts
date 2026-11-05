import {createParamDecorator} from '@wavecore/routing-controllers';
import {User} from '../model/User';
import {FindOptions} from "sequelize";
import {safeNestedObject} from "../util/CommonUtil";
import {UserAcl} from "../model/UserAcl";

export function InjectUser(options:FindOptions={}){
	return createParamDecorator({
		required:false,
		value:async (action,value)=>{
			options=safeNestedObject(options,["where","deletedAt"],null);
			return User.findByPk(action.request.user.id, options);
		}
	});
}

export function InjectUserWithAcl(options:FindOptions={}){
	options=safeNestedObject(options,['include'],[{
		model:UserAcl
	}]);
	return InjectUser(options);
}
