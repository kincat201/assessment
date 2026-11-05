import voca = require('voca');
import { ValidatorService } from './ValidatorService';

export class ManipulatorService{
	static toAlphaNumericOnly(input:string){
		const regex=/([^a-zA-Z0-9\s])/gm;
		return input.replace(regex,'');
	}

	static toSlugFormat(...input:string[]){
		const concatInput=input.join(" ");
		const result=this.toAlphaNumericOnly(concatInput);
		return voca.kebabCase(voca.lowerCase(result));
	}

	static slugToId(input:string){
		if(!ValidatorService.hasValue(input)){
			return null;
		}
		const slug=input.split("-");
		const universityId=slug[slug.length-1];
		if(!universityId){
			return null;
		}
		if(!ValidatorService.isId(parseInt(universityId))){
			return null;
		}
		return universityId;
	}
}
