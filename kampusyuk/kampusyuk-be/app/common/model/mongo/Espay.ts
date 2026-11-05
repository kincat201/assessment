import { MongoDBService } from '@wavecore/core-node';
import { Type, typedModel } from 'ts-mongoose';

export const Espay = MongoDBService.makeSchema({
	type: Type.string,
	transactionNumber: Type.string({ required: true }),
	logs: Type.mixed({ required: false, default: null }),
},'Espay');
typedModel('espay', Espay.schema);
