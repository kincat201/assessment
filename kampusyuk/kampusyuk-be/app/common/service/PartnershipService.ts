import * as moment from 'moment';
import { Constant } from '../constant/Constant';
import { Partnership } from '../model/Partnership';
import { Transaction } from '../model/Transaction';
import { ExportService } from './ExportService';

export class PartnershipService {

	static async exportData(datas: Partnership[], exportTo, req) {
		const exportHeaders = ['Id', 'Name', 'University', 'Role', 'Email', 'Phone',
			'Message','createdAt'
		];
		const exportData = [];
		const exportExtensions = {
			[Constant.EXPORT_TYPE_CSV]: 'csv',
			[Constant.EXPORT_TYPE_EXCEL]: 'xlsx'
		};

		const date = moment().format('DD-MM-YYYY-hh-mm-ss');
		const filename = ['Transaction', date, req.user.id].join('-');
		let file;

		for (const data of datas) {
			exportData.push({
				id: data.id,
				name: data.name,
				university: data.university,
				role: data.role,
				email: data.email,
				phone: data.phone,
				message: data.message,
				createdAt: data.createdAt,
			});
		}

		if (exportTo === Constant.EXPORT_TYPE_CSV) {
			file = await ExportService.toCsv(filename, exportData, exportHeaders, 'Partnership', true);
		} else if (exportTo === Constant.EXPORT_TYPE_EXCEL) {
			file = await ExportService.toExcel(filename, exportData, exportHeaders, 'Partnership', true);
		}

		return file;
	}
}
