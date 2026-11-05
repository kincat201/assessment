import { CoreRedis } from '@wavecore/core-node';

interface Option {
	json?: boolean,
	expiredIn: number
}
export function RedisSet(key, option?: Option) {
	return  (target: any, propertyKey: string, descriptor: PropertyDescriptor) => {
		const original = descriptor.value;

		descriptor.value = async function(...args: any[]) {
			const cache = await CoreRedis().get(key);
			if (cache) {
				return option.json ? JSON.parse(cache) : cache;
			}

			const originalApply = await original.apply(this, args);
			await CoreRedis().set(key, option.json ? JSON.stringify(originalApply) : originalApply, 'EX', option.expiredIn);
			return originalApply;
		};

		return descriptor;
	}
}