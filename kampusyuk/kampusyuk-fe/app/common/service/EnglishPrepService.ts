import {sendEmail} from "@wavecore/core-node";
import {University} from "../model/University";
import {ProgramStudy} from "../model/ProgramStudy";
import {EmailService} from "./EmailService";
import { EnglishPreparation } from '../model/EnglishPreparation';
import moment = require('moment');
import { Constant } from '../constant/Constant';
import { defaultValue } from '../util/CommonUtil';
import { ExportService } from './ExportService';
import { Faculty } from '../model/Faculty';

export class EnglishPrepService{
    static async export(englishPreparations: EnglishPreparation[], exportTo, req) {
        const exportHeaders = ['Id', 'Name', 'Email', 'Phone', 'Program', 'Provider', 'Note', 'Created At'];
        const exportData = [];
        const exportExtensions = {
            [Constant.EXPORT_TYPE_CSV]: 'csv',
            [Constant.EXPORT_TYPE_EXCEL]: 'xlsx'
        };

        const date = moment().format('DD-MM-YYYY-hh-mm-ss');
        const filename = ['StudEnglishPreparationent', date, req.user.id].join('-');
        let file;

        for (const englishPrep of englishPreparations) {
            exportData.push({
                id: englishPrep.id,
                name: englishPrep.name,
                email: englishPrep.email,
                phone: englishPrep.phone,
                program: englishPrep.program,
                provider: englishPrep.provider,
                note: englishPrep.note,
                createdAt: englishPrep.createdAt
            })
        }

        if (exportTo === Constant.EXPORT_TYPE_CSV) {
            file = await ExportService.toCsv(filename, exportData, exportHeaders, 'EnglishPreparation', true);
        } else if (exportTo === Constant.EXPORT_TYPE_EXCEL) {
            file = await ExportService.toExcel(filename, exportData, exportHeaders, 'EnglishPreparation', true);
        }

        return file;
    }
}
