import fs = require('fs');
import { now } from 'moment';
import uniqueFilename = require('unique-filename');
import * as envData from '../../../config/Env.json';
import {urlJoin} from "url-join-ts";
import { Env, ImageStorageService, LogService } from '@wavecore/core-node';

export class FileService {

	static store(fileBuffer, extension) {
		const fileName = this.getUniqueFileName()+'.'+extension;
		const destination = envData.directorySettings.temp + '/' +fileName;
		fs.writeFile(destination, fileBuffer,(err)=>{
			if (err) {
				LogService.log("write file error log");
				LogService.log(err);
			}
			//console.log('Store: '+fileName +' - '+ destination);
		});
		return fileName;
	}

	static move(fileName, destinationPath){
		const source = envData.directorySettings.temp + '/' +fileName;
		const destination = envData.directorySettings.storagePath + '/' +destinationPath + '/' + fileName;

		fs.copyFile(source, destination,(err) => {
				if (err) {
					LogService.log("copy file error log");
					LogService.log(err);
				}
				//console.log('Move: '+fileName +' - '+ destination);
				this.delete(source);
		});
		return destinationPath + '/' + fileName;
	}

	static delete(filePath){
		const source = filePath;

		fs.unlink(source, (err)=>{
			if (err) {
				LogService.log("delete file error log");
				LogService.log(err);
			}
			//console.log('Delete: ' + filePath );
		});
	}

	static isExist(filePath){
		fs.access(filePath, (err)=>{
			if (err) return false;
			//console.log('File Exist: ' + filePath );
		});
		return true;
	}

	static getUniqueFileName(){
		return uniqueFilename('',now());
	}

	static getFileUrl(fileName:string,destinationPath?:string){
		if(!fileName){
			return "";
		}
		if(fileName.indexOf("https://")>-1 || fileName.indexOf("http://")>-1){
			return fileName;
		}
		if(!destinationPath){
			return urlJoin(Env().domainUrl,fileName);
		}
		return urlJoin(Env().domainUrl,destinationPath,fileName);
	}
}
