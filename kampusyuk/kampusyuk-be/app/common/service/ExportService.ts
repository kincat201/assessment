import { BaseSequelizeModel } from '@wavecore/core-node/dist/model/mysql/BaseSequelizeModel';
import * as excel from 'exceljs';
import { Worksheet } from 'exceljs';
import * as jszip from 'jszip'
import * as flatten from 'safe-flat';
import { Constant } from '../constant/Constant';

export class ExportService {
	static async toExcel(filename, data, headers: string[], worksheetName?: string, storeToAsset?: boolean, zipFile?: boolean) {
		return ExportService.export(filename, data, headers, Constant.EXPORT_TYPE_EXCEL, worksheetName, storeToAsset, zipFile);
	}

	static async toCsv(filename, data, headers: string[], worksheetName?: string, storeToAsset?: boolean, zipFile?: boolean) {
		return ExportService.export(filename, data, headers, Constant.EXPORT_TYPE_CSV, worksheetName, storeToAsset, zipFile);
	}

	static async export(filename, data, headers: string[], extension, workSheetName?: string, storeToAsset?: boolean, zipFile?: boolean) {
		if (headers.length <= 1) return false;
		const workbook = new excel.Workbook();
		const worksheet: Worksheet = workbook.addWorksheet(workSheetName ? workSheetName : 'Admission List');
		const result = [];

		workbook.creator = 'Kampusyuk';
		worksheet.columns = headers.map(header => {
			return {
				header,
				width: /index|id/i.test(header) ? 8 : 20
			}
		});
		worksheet.getRow(1).font = {
			bold: true
		};

		if (!(data instanceof BaseSequelizeModel)) {
			for (const dataI of data) {
				const convertedValues = Object.values(dataI);
				result.push(convertedValues);
			}
		} else {
			const json = data.toJSON();
			flatten(json);
			const convertedValues = Object.values(json);
			result.push(convertedValues);
		}
		worksheet.addRows(result);
		let buffer;
		let mimeType = 'text/csv';
		if (extension === Constant.EXPORT_TYPE_CSV) {
			buffer = await workbook.csv.writeBuffer();
		} else if (extension === Constant.EXPORT_TYPE_EXCEL) {
			buffer = await workbook.xlsx.writeBuffer();
		}
		if (extension === Constant.EXPORT_TYPE_EXCEL) {
			mimeType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
		}

		if (storeToAsset) {
			return {
				buffer,
				filename,
				mimeType
			}
		}
	}

}
