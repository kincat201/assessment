import { AclConstant } from '../constant/AclConstant';
import { Constant } from '../constant/Constant';

export function getRouteAcl( acl, role ) {
	const routeAcl = [];
	routeAcl.push(...AclConstant.default);

	acl.map( aclItem =>{
		if (role === Constant.USER_ROLE_ADMIN){
			if (AclConstant.admin.structured[aclItem]) routeAcl.push(...AclConstant.admin.structured[aclItem]);
		} else if(role === Constant.USER_ROLE_UNIVERSITY){
			if (AclConstant.university.structured[aclItem]) routeAcl.push(...AclConstant.university.structured[aclItem]);
		} else if(role === Constant.USER_ROLE_STUDENT){
			if (AclConstant.student.structured[aclItem]) routeAcl.push(...AclConstant.student.structured[aclItem]);
		}
	});

	return routeAcl;
}
