import { Env } from '@wavecore/core-node';
import * as _ from 'lodash';
import { getMetadataArgsStorage } from '@wavecore/routing-controllers';

export function GetForTesting(route){
	return (object, methodName: string) => {
		if(_.isEqual(Env().testController,"ENABLED")) {
			getMetadataArgsStorage().actions.push({
				type: "get",
				target: object.constructor,
				method: methodName,
				route
			});
		}
	};
}

export function PostForTesting(route){
	return (object, methodName: string) => {
		if(_.isEqual(Env().testController,"ENABLED")) {
			getMetadataArgsStorage().actions.push({
				type: "post",
				target: object.constructor,
				method: methodName,
				route
			});
		}
	};
}
