import { MongoDBService } from '@wavecore/core-node';
import { EspayConstant } from '../constant/EspayConstant';
import { Espay } from '../model/mongo/Espay';

export function EspayLog(type) {
	return  (target: any, propertyKey: string, descriptor: PropertyDescriptor) => {
		const original = descriptor.value;

		descriptor.value = async function(...args: any[]) {
			const originalApply = await original.apply(this, args);
			const originalInput = args.find(x => x.order_id !== undefined);
			const input = Object.assign({}, originalInput);

			if (type === EspayConstant.LOG_TYPE_CHECK_PAYMENT_STATUS) {
				const reqParams = ['uuid', 'rq_datetime', 'order_id', 'comm_code', 'signature'];
				setValidReqParam(input, reqParams);
			} else if (type === EspayConstant.LOG_TYPE_SEND_INVOICE) {
				const reqParams = ['rq_uuid', 'rq_datetime', 'order_id', 'ccy', 'amount', 'comm_code', 'remark2', 'update', 'bank_code', 'va_expired', 'signature'];
				setValidReqParam(input, reqParams);
			}

			new MongoDBService(Espay).getModel().create({
				type,
				transactionNumber: input.order_id,
				logs: {
					request: input,
					response: originalApply
				}
			});

			return originalApply;
		};

		return descriptor;
	}
}

function setValidReqParam(input, reqParams) {
	Object.keys(input).map((property) => {
		if (!reqParams.includes(property)) {
			delete input[property];
		}
	});
}