import * as envData from '../../../config/Env.json';
import { FileService } from './FileService';
import { error } from '@wavecore/core-node';
import { Constant } from '../constant/Constant';
import { UniversityGallery } from '../model/UniversityGallery';

export class UniversityService{
	static async insertGallery(universityGalleries:any[],universityId:number){
		for (const universityGallery of universityGalleries) {
			const fileName=universityGallery.image;
			const oldGalleryBannerPath = envData.directorySettings.storagePath+'/'+fileName;
			// if(!FileService.isExist(envData.directorySettings.temp+ '/' + fileName)){
			// 	return false;
			// }
			// if(FileService.isExist(oldGalleryBannerPath)){
			// 	return false;
			// }
			const imageName = await FileService.move(fileName, 'university/gallery');
			const universityGalleriesObject= new UniversityGallery();
			universityGalleriesObject.universityId=universityId;
			universityGalleriesObject.image=imageName;
			universityGalleriesObject.types=universityGallery.types;
			universityGalleriesObject.altText=universityGallery.altText;
			universityGalleriesObject.save();
		}
		return true;
	}
}
