import {CoreRedis, Env} from '@wavecore/core-node';
import {System} from '../util/System';

export class RedisService {
	static getHashName(key: string, useDate: boolean = false) {
		if (key.indexOf(Env().projectName) > -1) {
			if (useDate === true) {
				const todayDate = System.getTime().format('YYYY-MM-DD');
				key = key + '-' + todayDate;
			}
			return key;
		}
		const resultKey = Env().projectName + '-' + Env().appEnv + '-' + key;
		if (useDate === true) {
			const todayDate = System.getTime().format('YYYY-MM-DD');
			return resultKey + '-' + todayDate;
		}
		return resultKey;
	}

	static async incrBy(key:string, value :number = 1, useDateOnHashKey: boolean = false, expireDate:Date){
		const convertedKey = this.getHashName(key, useDateOnHashKey);
		const result=await CoreRedis().incrby(convertedKey, value);
		await CoreRedis().pexpireat(convertedKey,expireDate.valueOf());
		return result;
	}
}
