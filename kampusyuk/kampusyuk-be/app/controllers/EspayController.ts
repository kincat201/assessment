import { success } from '@wavecore/core-node';
import { Body, ContentType, Get, JsonController, Param, Post } from '@wavecore/routing-controllers';
import * as moment from 'moment';
import { Constant } from '../common/constant/Constant';
import { EspayConstant } from '../common/constant/EspayConstant';
import { EspayLog } from '../common/decorator/EspayLog';
import { Transaction } from '../common/model/Transaction';
import { EspayService } from '../common/service/EspayService';

@JsonController('/espay')
export class EspayController {
	requestConfig = EspayService.requestConfig;

	@Get('/channel/list')
	async getChannels() {
		const channels = await EspayService.getChannels();
		return success(channels);
	}

	@Get('/channel/detail/:bankProduct')
	async getChannelDetail(@Param('bankProduct') bankProduct: string) {
		const channelDetail = await EspayService.getChannelDetailByBankProduct(bankProduct);
		return success(channelDetail);
	}
}
