import { error,success } from '@wavecore/core-node';
import { Body, Get, JsonController, Param, Patch, Put, Req } from '@wavecore/routing-controllers';
import * as envData from '../../config/Env.json';
import { Setting } from '../common/model/Setting';
import { FileService } from '../common/service/FileService';
import { generateDefaultMappingRow } from '../common/util/ListUtil';
import { validateInput } from '../common/util/Validation';

@JsonController()
export class SettingController {
	@Get('/setting/details')
	async getSettingDetails() {
        let data = await Setting.findOne();
		if(!data) return error('Setting not found');

		let result = await generateDefaultMappingRow(data);
		if(result['footerLogo'] !== null && result['footerLogo'] !== '') result['footerLogo'] = envData.directorySettings.frontendDirectory + '/' + result['footerLogo'];
		return success(result);
	}

	@Put('/setting/create')
	async settingCreate(@Body() input: any, @Req() req: any) {
        const isSettingExist = await Setting.findOne();
        if(isSettingExist) return error('Setting already created');
        const check = await validateInput(input, {
            footerLogo: 'string',
            callCenterNumber: 'string',
            callCenterTime: 'string',
            newsletterDescription: 'string',
            footerDescription: 'string',
            facebookLink: 'string',
            instagramLink: 'string',
            linkedInLink: 'string'
        });
		if(!check.status) return error(check.message);

		if(input.footerLogo) input.footerLogo = await FileService.move(input.footerLogo,'setting/footerLogo');
		Setting.create(input);

		return success('success create setting');
	}

	@Patch('/setting/update')
	async settingUpdate(@Body() input: any, @Req() req: any) {
		const setting = await Setting.findOne();
        if(!setting) return error('Setting not found');
        const check = await validateInput(input, {
            footerLogo: 'string',
            callCenterNumber: 'string',
            callCenterTime: 'string',
            newsletterDescription: 'string',
            footerDescription: 'string',
            facebookLink: 'string',
            instagramLink: 'string',
            linkedInLink: 'string'
        });
		if(!check.status) return error(check.message);

		if(input.footerLogo) input.footerLogo = await FileService.move(input.footerLogo,'setting/footerLogo');
		Setting.create(input);

		if(input.footerLogo && setting.footerLogo.replace('setting/footerLogo/','') !== input.footerLogo){
			const oldLogoPath = envData.directorySettings.storagePath+'/'+setting.footerLogo;
			if(FileService.isExist(oldLogoPath) && setting.footerLogo) FileService.delete(oldLogoPath);
			input.footerLogo = await FileService.move(input.footerLogo,'setting/footerLogo');
        }
        
		setting.update(input);
		return success('success update setting');
    }
}
