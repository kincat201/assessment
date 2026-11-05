import { error, generateDefaultMapping, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Get, JsonController, Param, Post, Req } from '@wavecore/routing-controllers';
import { EnglishPreparation } from '../common/model/EnglishPreparation';
import { FileService } from '../common/service/FileService';
import { checkPayload } from '../common/util/Validation';
import { ManipulatorService } from "../common/service/ManipulatorService";
import { EmailService } from "../common/service/EmailService";
import { Op } from 'sequelize';
import { Constant } from '../common/constant/Constant';

@JsonController()
export class EnglishPreparationController {
	@Post('/english-preparation')
	async postEnglishPreparation(@Body() input: any) {
		const data = new EnglishPreparation();
		data.name = input.name;
		data.email = input.email;
		data.phone = input.phone;
		data.program = input.program;
		data.provider = input.provider;
		data.note = input.note;
		await data.save();

		await EmailService.sendEmail({
            to: [
				"hello@kampusyuk.com"
			],
            subject:"Inquiry Baru untuk English Preparation",
            html:"Dears Kampusyuk, <br> <br>"+
                "Berikut adalah data English Preparation : <br><br>"+
                "Nama : " + input.name + " <br><br>" +
                "Email : " + input.email + " <br><br>" +
				"Phone Number : " + input.phone + " <br><br>" +
				"Program : " +  input.program + " <br><br>" +
				"Provider : " +  input.provider + " <br><br>" +
				"Note : " + input.note + " <br><br>"
		});
		
		return success('English Preparation Inquiry has been semt.')
	}
}
