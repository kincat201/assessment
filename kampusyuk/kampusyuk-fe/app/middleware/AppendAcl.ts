import { ExpressMiddlewareInterface, Middleware } from '@wavecore/routing-controllers';
import { UserAcl } from '../common/model/UserAcl';
import { getRouteAcl } from '../common/service/ACL';
import { Constant } from '../common/constant/Constant';

@Middleware({type: 'before'})
export class AppendAcl implements ExpressMiddlewareInterface {
	async use(req: any, res: any, next: (err?: any) => any): Promise<void> {
		if(req.user) {
			if (req.user.id && req.user.role) {
				req.user.permissions = await getAclList(req.user.id, Constant.USER_ROLE_STUDENT);
			}
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
	const userAclList = await UserAcl.findAll({'where' : { 'userId' : id } });
	userAclList.map((acl) => {
		aclList.push(acl.name);
	});
	return aclList;
}
