import { getMetadataArgsStorage } from '@wavecore/routing-controllers';
import { AclConstant } from '../constant/AclConstant';
import { StringUtils } from '../util/StringUtils';
import {safeLength, safeNestedArrayPush} from '../util/CommonUtil';

export function getCleanRoute(route:string){
	return route.replace(new RegExp("\\/:[a-zA-Z]*"),"");
}

export function registerAcl(route: string, roleAllowed: string[], method: string, additionalAcl:string[]=[]) {
	const routeSnakeCase = StringUtils.toSnakeCase(getCleanRoute(route)).toUpperCase();
	const routeWithMethod= routeSnakeCase + '_' + method.toUpperCase();
	const aclStructuredKey="structured";
	if (!roleAllowed || safeLength(roleAllowed) <= 0) {
		AclConstant.default.push(routeWithMethod);
	}
	if (roleAllowed) {
		for (const role of roleAllowed) {
			const roleValue = role.toLowerCase();

			if(safeLength(additionalAcl)>0) {
				additionalAcl.forEach(value => {
					safeNestedArrayPush(AclConstant
						, [roleValue, aclStructuredKey, StringUtils.toSnakeCase(value).toUpperCase()]
						, routeWithMethod);
				});
			}
			safeNestedArrayPush(AclConstant,[
				roleValue,aclStructuredKey,routeSnakeCase],
				routeWithMethod);
		}
	}
}

export function AclPost(route?: string, roleAllowed?: string[], additionalAcl:string[]=[]):Function{
	return function (object: Object, methodName: string) {
		registerAcl(route,roleAllowed,"post",additionalAcl);
		getMetadataArgsStorage().actions.push({
			type: "post",
			target: object.constructor,
			method: methodName,
			route: route
		});
	};
}

export function AclPatch(route?: string, roleAllowed?: string[], additionalAcl:string[]=[]): Function {
	return function (object: Object, methodName: string) {
		registerAcl(route,roleAllowed,"patch",additionalAcl);
		getMetadataArgsStorage().actions.push({
			type: "patch",
			target: object.constructor,
			method: methodName,
			route: route
		});
	};
}

export function AclGet(route?: string, roleAllowed?: string[], additionalAcl:string[]=[]): Function {
	return (object: Object, methodName: string) => {
	    registerAcl(route,roleAllowed,"get",additionalAcl);
		getMetadataArgsStorage().actions.push({
			type: 'get',
			target: object.constructor,
			method: methodName,
			route
		});
	};
}
