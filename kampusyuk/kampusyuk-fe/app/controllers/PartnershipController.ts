import {Env, error, errorCode, success} from '@wavecore/core-node';
import {Body, JsonController, Post, Put, Req} from '@wavecore/routing-controllers';
import { Partnership } from '../common/model/Partnership';
import { validate } from '../common/util/Validation';

@JsonController("/partnership")
export class PartnershipController {
	@Put('/register')
	async registerPartnership(@Body() input) {
		const check = await validate(input,['name','email','phone','university','role', 'message']);

		if(!check.status) return error(check.message);

		await Partnership.create(input);

		return success('register partnership successfully')
	}
}
