import {ExpressMiddlewareInterface, Middleware} from '@wavecore/routing-controllers';
import { Constant } from '../common/constant/Constant';
import { AdminAcl } from '../common/model/AdminAcl';
import { getRouteAcl } from '../common/service/ACL';

@Middleware({type: 'before'})
export class AppendAcl implements ExpressMiddlewareInterface {
	async use(req: any, res: any, next: (err?: any) => any): Promise<void> {
		if (req.user) {
			const aclListResult = await getAclList(req.user.id, Constant.USER_ROLE_ADMIN);
			req.user.permissions = aclListResult;
		}

		return next();
	}
}

export async function getAclList(id, role){

	const aclListParent = await getAclListParent(id);

	return getRouteAcl(aclListParent, role);
}

export async function getAclListParent(id){
	const aclList = [];
	const userAclList = await AdminAcl.findAll({'where' : { 'adminId' : id } });
	userAclList.map((acl) => {
		aclList.push(acl.name);
	});
	return aclList;
}
