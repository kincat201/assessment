import {sendEmail, error} from "@wavecore/core-node";
import {University} from "../model/University";
import {ProgramStudy} from "../model/ProgramStudy";
import {EmailService} from "./EmailService";
import { Admission } from '../model/Admission';
import moment = require('moment');
import { Constant } from '../constant/Constant';
import { defaultValue } from '../util/CommonUtil';
import { ExportService } from './ExportService';
import { Faculty } from '../model/Faculty';
import { Scholarship } from '../model/Scholarship';
import { ScholarshipProvider } from '../model/ScholarshipProvider';

export class AdmissionService{
    static async sendEmailNotification(email:string,programStudyId:string,applicantName:string, scholarShip:string){
        const university=await ProgramStudy.findOne({
            where:{
                id:programStudyId
            },
            include:[University, Faculty]
        });

        EmailService.sendEmail({
            to:email,
            subject:"Terima kasih atas registrasi Anda di "+university.university.name,
            html:"Selamat "+applicantName+" ! " +
              "Kamu berhasil mendaftar di "+university.university.name+" melalui Kampusyuk, dengan rincian data sebagai berikut: <br> <br>"+
              "Pendaftaran "+university.university.name+" <br><br>"+
              "Fakultas : "+university.faculty.name+" <br><br>"+
              "Jenjang Pendidikan :  "+university.studyLevel+" <br><br>"+
              "Program Studi :  "+university.name+" <br><br>"+
              scholarShip +
              "Tim admisi kami akan segera menghubungimu melalui nomor telepon yang telah didaftarkan sebelumnya. " +
              "Jika kamu memiliki pertanyaan lebih lanjut, silakan kirim email ke hello@kampusyuk.com " +
              "atau gunakan fitur chat yang ada di website kami. <br><br>"+
              "Salam hangat, <br><br>"+
              "Tim Kampusyuk"
        });
    }

    static async sendAdminEmailNotification(name, phoneNumber, email, programStudyId,schoolFrom="", scholarShip:string) {
        const ccList = [
            'melinda@wave.co.id',
            'sherwin@wave.co.id',
            'andrew@wave.co.id'
        ];

        const programStudy = await ProgramStudy.findOne({
            where:{
                id:programStudyId
            },
            include:[University]
        });

        const school = schoolFrom ? "Asal Sekolah : "+ schoolFrom + "<br><br>": "";

        EmailService.sendEmailWithCc({
            to: "hello@kampusyuk.com",
            cc: ccList,
            subject:"Registrasi Baru",
            html:"Dears Kampusyuk, <br> <br>"+
                "Berikut adalah data registrant baru : <br><br>"+
                "Nama : " + name + " <br><br>" +
                "HP : " + phoneNumber + " <br><br>" +
                "Universitas : " + programStudy.university.name + " <br><br>" +
                "Jurusan : " + programStudy.name + " <br><br>" +
                "Email : "  + email + " <br><br>" +
                scholarShip+
                school
        });
    }

    static async exportAdmissions(admissions: Admission[], exportTo, req) {
        const exportHeaders = ['Index', 'Registration Id', 'Name', 'Email', 'Phone',
            'Class Type', 'Registration Type', 'Program Study', 'University', 'Country',
            'City', 'Registration Fee', 'Tuition Fee', 'Submit Document', 'Taking Exam', 'Status', 'Created At'
        ];
        const exportData = [];
        const exportExtensions = {
            [Constant.EXPORT_TYPE_CSV]: 'csv',
            [Constant.EXPORT_TYPE_EXCEL]: 'xlsx'
        };

        const date = moment().format('DD-MM-YYYY-hh-mm-ss');
        const filename = ['Student', date, req.user.schoolId].join('-');
        let file;

        for (const admission of admissions) {
            let registrationFee = 'N/A';
            if (admission.transaction) {
                registrationFee = (admission.transaction.status) ? Constant.TRANSACTION_STATUS[ admission.transaction.status] : 'N/A';
            }

            exportData.push({
                id: admission.id,
                registrationId: (admission.registrationId)?admission.registrationId:"",
                name: admission.name,
                email: admission.email,
                phone: admission.phone,
                classType: admission.classType,
                registrationType: admission.registrationType,
                programStudyName: admission.programStudy ? admission.programStudy.name : 'N/A',
                universityName: admission.programStudy && admission.programStudy.university ? admission.programStudy.university.name : 'N/A',
                country: admission.programStudy && admission.programStudy.university ? admission.programStudy.university.country.name : 'N/A',
                city: admission.programStudy && admission.programStudy.university ? admission.programStudy.university.city.name : 'N/A',
                registrationFee: registrationFee,
                tuitionFee: (admission.tuitionFee) ? Constant.PAYMENT_STATUS_LIST[admission.tuitionFee] : "N/A",
                submitDocument: (admission.submitDocument) ? Constant.LABEL_YESNO_LIST[admission.submitDocument] : "",
                takingExam: (admission.takingExam) ? Constant.LABEL_YESNO_LIST[admission.takingExam] : "",
				status: (admission.status) ? Constant.ADMISSION_STATUS_LABELS[admission.status] : "",
                createdAt: admission.createdAt
            })
        }

        if (exportTo === Constant.EXPORT_TYPE_CSV) {
            file = await ExportService.toCsv(filename, exportData, exportHeaders, 'Admission', true);
        } else if (exportTo === Constant.EXPORT_TYPE_EXCEL) {
            file = await ExportService.toExcel(filename, exportData, exportHeaders, 'Admission', true);
        }

        return file;
    }

    static async getDateRange(range, startDate = null, endDate = null) {
        const result = {
            startDate: null,
            endDate: null,
            prevStartDate: null,
            prevEndDate: null,
        };

        if (range == 'TODAY') {         
            result.startDate = moment().startOf('day').format("YYYY-MM-DD HH:mm:ss");
			result.endDate = moment().endOf('day').format("YYYY-MM-DD HH:mm:ss");
			
			result.prevStartDate = moment().subtract(1, 'days').startOf('day').format("YYYY-MM-DD HH:mm:ss");
			result.prevEndDate = moment().subtract(1, 'days').endOf('day').format("YYYY-MM-DD HH:mm:ss");
        } else if (range == 'WEEK') {
			result.startDate = moment().startOf('week').format("YYYY-MM-DD HH:mm:ss");
			result.endDate = moment().endOf('week').format("YYYY-MM-DD HH:mm:ss");

			result.prevStartDate = moment().subtract(1, 'weeks').startOf('week').format("YYYY-MM-DD HH:mm:ss");
			result.prevEndDate = moment().subtract(1, 'weeks').endOf('week').format("YYYY-MM-DD HH:mm:ss");
        } else if (range == 'MONTH') {
			result.startDate = moment().startOf('month').format("YYYY-MM-DD HH:mm:ss");
			result.endDate = moment().endOf('month').format("YYYY-MM-DD HH:mm:ss");

			result.prevStartDate = moment().subtract(1, 'months').startOf('month').format("YYYY-MM-DD HH:mm:ss");
			result.prevEndDate = moment().subtract(1, 'months').endOf('month').format("YYYY-MM-DD HH:mm:ss");
        } else if (range == 'CUSTOM') {
			result.startDate = moment(startDate).startOf('day').format("YYYY-MM-DD HH:mm:ss");
			result.endDate = moment(endDate).endOf('day').format("YYYY-MM-DD HH:mm:ss");
        }
        
        return result;
    }

    static async getSnapshotDate(currentData, prevData = null) {
        const result = {
            paid : {
                currentData: {
                    aggregat: 0,
                    intake: 0,
                    failed: 0,
                    notQualified: 0,
                    pending: 0
                },
                prevData: {
                    aggregat: 0,
                    intake: 0,
                    failed: 0,
                    notQualified: 0,
                    pending: 0
                },
                diff: {
                    aggregat: 0,
                    intake: 0,
                    failed: 0,
                    notQualified: 0,
                    pending: 0
                }
            },
            free: {
                currentData: {
                    aggregat: 0,
                    intake: 0,
                    failed: 0,
                    notQualified: 0,
                    pending: 0
                },
                prevData: {
                    aggregat: 0,
                    intake: 0,
                    failed: 0,
                    notQualified: 0,
                    pending: 0
                },
                diff: {
                    aggregat: 0,
                    intake: 0,
                    failed: 0,
                    notQualified: 0,
                    pending: 0
                }
            }
            
        }

        if (currentData && currentData.length > 0) {
            currentData.forEach(data => {
                if (data.programStudy.paymentRequired == Constant.LABEL_YESNO_TRUE) {
                    result.paid.currentData.aggregat ++;

                    if (data.status == Constant.ADMISSION_STATUS_COMPLETED) {
                        result.paid.currentData.intake ++;
                    } else if (data.status == Constant.ADMISSION_STATUS_FAILED || data.status == Constant.ADMISSION_STATUS_CANCELLED) {
                        result.paid.currentData.failed ++;
                    } else if (data.status == Constant.ADMISSION_STATUS_NOT_QUALIFIED) {
                        result.paid.currentData.notQualified ++;
                    } else if (
                      [Constant.ADMISSION_STATUS_NONE, Constant.ADMISSION_STATUS_REGISTRATION, Constant.ADMISSION_STATUS_IN_PROGRESS].includes(data.status)
                    ) {
                        result.paid.currentData.pending ++;
                    }
                } else {
                    result.free.currentData.aggregat ++;

                    if (data.status == Constant.ADMISSION_STATUS_COMPLETED) {
                        result.free.currentData.intake ++;
                    } else if (data.status == Constant.ADMISSION_STATUS_FAILED || data.status == Constant.ADMISSION_STATUS_CANCELLED) {
                        result.free.currentData.failed ++;
                    } else if (data.status == Constant.ADMISSION_STATUS_NOT_QUALIFIED) {
                        result.free.currentData.notQualified ++;
                    } else {
                        result.free.currentData.pending ++;
                    }
                }
            });
        }

        if (prevData && prevData.length > 0) {
            prevData.forEach(data => {
                if (data.programStudy.paymentRequired == Constant.LABEL_YESNO_TRUE) {
                    result.paid.prevData.aggregat ++;

                    if (data.status == Constant.ADMISSION_STATUS_COMPLETED) {
                        result.paid.prevData.intake ++;
                    } else if (data.status == Constant.ADMISSION_STATUS_FAILED || data.status == Constant.ADMISSION_STATUS_CANCELLED) {
                        result.paid.prevData.failed ++;
                    } else if (data.status == Constant.ADMISSION_STATUS_NOT_QUALIFIED) {
                        result.paid.prevData.notQualified ++;
                    } else {
                        result.paid.prevData.pending ++;
                    }
                } else {
                    result.free.prevData.aggregat ++;

                    if (data.status == Constant.ADMISSION_STATUS_COMPLETED) {
                        result.free.prevData.intake ++;
                    } else if (data.status == Constant.ADMISSION_STATUS_FAILED || data.status == Constant.ADMISSION_STATUS_CANCELLED) {
                        result.free.prevData.failed ++;
                    } else if (data.status == Constant.ADMISSION_STATUS_NOT_QUALIFIED) {
                        result.free.prevData.notQualified ++;
                    } else {
                        result.free.prevData.pending ++;
                    }


                }
            });

            result.free.diff.aggregat = result.free.currentData.aggregat - result.free.prevData.aggregat;
            result.free.diff.intake = result.free.currentData.intake - result.free.prevData.intake;
            result.free.diff.failed = result.free.currentData.failed - result.free.prevData.failed;
            result.free.diff.notQualified = result.free.currentData.notQualified - result.free.prevData.notQualified;
            result.free.diff.pending = result.free.currentData.pending - result.free.prevData.pending;

            result.paid.diff.aggregat = result.paid.currentData.aggregat - result.paid.prevData.aggregat;
            result.paid.diff.intake = result.paid.currentData.intake - result.paid.prevData.intake;
            result.paid.diff.failed = result.paid.currentData.failed - result.paid.prevData.failed;
            result.paid.diff.notQualified = result.paid.currentData.notQualified - result.paid.prevData.notQualified;
            result.paid.diff.pending = result.paid.currentData.pending - result.paid.prevData.pending;
        }

        return result;
    }

    static async getProgressScore(admissionId) {
        var checked = 0;
        var aggregate = 0;

        const admission = await Admission.findOne({
            where: {
                id: admissionId
            }
        });

        var yesNoLabel = ['Y', 'N'];

        if (admission.progressRegistration) {
            let progressRegistration = JSON.parse(admission.progressRegistration);

            for (var registration in progressRegistration) {
                if (yesNoLabel.includes(progressRegistration[registration])){
                    if (progressRegistration[registration] == Constant.LABEL_YESNO_TRUE) {
                        checked++;
                    }

                    aggregate++;
                }
            }
        }
        
        if (admission.progressTest) {
            let progessTest = JSON.parse(admission.progressTest);

            for (var test in progessTest) {
                if (yesNoLabel.includes(progessTest[test])){
                    if (progessTest[test] == Constant.LABEL_YESNO_TRUE) {
                        checked++;
                    }

                    aggregate++;
                }
            }
        }   
        
        if (admission.progressAcceptance) {
            let progressAcceptance = JSON.parse(admission.progressAcceptance);

            for (var acceptance in progressAcceptance) {
                if (yesNoLabel.includes(progressAcceptance[acceptance])){
                    if (progressAcceptance[acceptance] == Constant.LABEL_YESNO_TRUE) {
                        checked++;
                    }

                    aggregate++;
                }
            }
        }  

        return checked+'/'+aggregate;
    }
}
