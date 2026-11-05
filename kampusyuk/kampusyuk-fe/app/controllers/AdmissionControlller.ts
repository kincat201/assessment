import { error, errorCode, success } from '@wavecore/core-node';
import {Body, JsonController, Post, Patch, Req, Delete} from "@wavecore/routing-controllers";
import {Constant} from "../common/constant/Constant";
import {Admission} from "../common/model/Admission";
import { ProgramStudy } from '../common/model/ProgramStudy';
import { Scholarship } from '../common/model/Scholarship';
import { ScholarshipProvider } from '../common/model/ScholarshipProvider';
import { Transaction } from '../common/model/Transaction';
import { University } from '../common/model/University';
import {AdmissionService} from "../common/service/AdmissionService";
import {RedisService} from "../common/service/RedisService";
import { TransactionService } from '../common/service/TransactionService';
import {ValidatorService} from "../common/service/ValidatorService";
import {pad} from "../common/util/CommonUtil";
import {inputFormatError} from "../common/util/Error";
import {System} from "../common/util/System";
import * as envData from '../../config/Env.json';
import { FileService } from '../common/service/FileService';

@JsonController("/admission")
export class AdmissionControlller{
    @Post("/submission")
    async submission(@Body() input:any, @Req() req: any){
        const admissionSchedule = (input.admissionScheduleId === '')?null:input.admissionScheduleId;
        const faculty=input.facultyId;
        if(!ValidatorService.isId(faculty)){
            return inputFormatError(faculty);
        }
        const scholarshipId=input.scholarshipId;
        const programStudy=input.programStudyId;
        if(!ValidatorService.isId(programStudy)){
            return inputFormatError(programStudy);
        }
        const classType=input.classType;
        const registrationType=input.registrationType;
        const name=input.name;
        if(!ValidatorService.isName(name)){
            return error('Maaf! Format input nama yang anda masukan salah (berupa huruf A - z)');
        }
        const phoneNumber=input.phoneNumber;
        if(!ValidatorService.isPhoneNumber(phoneNumber)){
            return error('Maaf! Format input nomor HP yang anda masukkan salah (9 - 13 angka dimulai dari 8)');
        }
        const email=input.email;
        if(!ValidatorService.isEmail(email)){
            return inputFormatError(email);
        }

        const getProgramStudy = await ProgramStudy.findByPk(input.programStudyId, {
            attributes: [
                'id', 'registrationFormFee', 'registrationFormFeeDiscount', 
                'progressRegistration', 'progressTest', 'progressAcceptance', 
                'progressRemark'
            ],
            include: [{
                model: University,
                attributes: ['id', 'partner']
            }]
        });
        if (!getProgramStudy) return error('Program study not found');

        const isPartner: boolean = getProgramStudy.university.partner === 'Y';
        const transaction: boolean = input.transaction === true;
        const remark=(input.remark)?input.remark:"";
        const todayDate=System.getTime().format("DDMMYY");
        const expireAt=System.getStartOfToday().add(1,"day").toDate();
        const todayCounter=pad(await RedisService.incrBy(Constant.ADMISSION_COUNTER,1,true,expireAt),4);
        const registrationId=todayDate+todayCounter;
        const schoolFrom=input.schoolFrom ? input.schoolFrom :null;
        const englishProficiency=input.englishProficiency ? input.englishProficiency :null;
        const jobTitle=input.jobTitle ? input.jobTitle :null;
        const graduateUniversity=input.graduateUniversity ? input.graduateUniversity :null;
        const isUpdate: boolean = input.id && input.id > 0;
        const status = Constant.ADMISSION_STATUS_REGISTRATION;

        const progressRegistration = JSON.parse(getProgramStudy.progressRegistration);

        for (let prop in progressRegistration) {
            if (progressRegistration[prop] == Constant.LABEL_YESNO_TRUE) {
                progressRegistration[prop] = Constant.LABEL_YESNO_FALSE;
                if (prop == 'completeDocument') {
                    progressRegistration.attachment = [];
                }
            } else {
                delete progressRegistration[prop];
            }
        }

        const progressTest = JSON.parse(getProgramStudy.progressTest);

        for (let prop in progressTest) {
            if (progressTest[prop] == Constant.LABEL_YESNO_TRUE) {
                progressTest[prop] = Constant.LABEL_YESNO_FALSE;
            } else {
                delete progressTest[prop];
            }
        }

        const progressAcceptance = JSON.parse(getProgramStudy.progressAcceptance);

        for (let prop in progressAcceptance) {
            if (progressAcceptance[prop] == Constant.LABEL_YESNO_TRUE) {
                progressAcceptance[prop] = Constant.LABEL_YESNO_FALSE;
            } else {
                delete progressAcceptance[prop];
            }
        }

        const progressRemark = getProgramStudy.progressRemark;

        const admissionValue = {
            registrationId,
            programStudyId:programStudy,
            admissionScheduleId:admissionSchedule,
            scholarshipId: scholarshipId ? scholarshipId : null,
            userId:req.user.id,
            classType,
            registrationType,
            name,
            email,
            remark,
            schoolFrom,
            englishProficiency,
            jobTitle,
            graduateUniversity,
            registrationFee:Constant.PAYMENT_UNPAID,
            registrationFeeDate:System.getTime().toDate(),
            tuitionFee:Constant.PAYMENT_UNPAID,
            tuitionFeeDate:System.getTime().toDate(),
            phone:phoneNumber,
            progressRegistration:JSON.stringify(progressRegistration),
            progressTest:JSON.stringify(progressTest),
            progressAcceptance:JSON.stringify(progressAcceptance),
            progressRemark,
            status
        };

        const admission = isUpdate ? await Admission.findByPk(input.id, {
            include: [{
                model: Transaction,
                attributes: ['id']
            }]
        }) : await Admission.create(admissionValue);

        if (isUpdate) {
            if (!admission) {
                return error('Admission not found');
            }
        }
        let scholarShip = '';

        if(scholarshipId && !isUpdate) {
            const scholarshipData = await Scholarship.findByPk(scholarshipId,{include:[ScholarshipProvider]});
            if(scholarshipData){
                scholarShip = "Jalur Daftar : Beasiswa <br><br>"+
                  "Nama Beasiswa : " + scholarshipData.name + "<br><br>"+
                  "Penyedia : " + scholarshipData.scholarshipProvider.name + "<br><br>";
            }
        }

        if (!isUpdate) {
            AdmissionService.sendEmailNotification(email, programStudy, name, scholarShip);
            AdmissionService.sendAdminEmailNotification(name, phoneNumber, email, programStudy, schoolFrom, scholarShip);
        }

        if (transaction && isPartner && !admission.transaction) {
            const createAdmissionTrx: any = await TransactionService.createAdmissionTrx(admission, getProgramStudy, input, req);
            if (createAdmissionTrx.code) {
                return errorCode(createAdmissionTrx)
            }

            return success(createAdmissionTrx);
        }

        return success(Constant.RETURN_MESSAGE.SUCCESS.OPERATION_SUCCESS);
    }

    @Patch("/attachment/upload")
    async attachmentUpload(@Body() input:any, @Req() req: any){
        if(!ValidatorService.isId(input.admissionId)){
			return error("id format incorrect!");
        }
        
        const admission = await Admission.findOne({
			where:{id: input.admissionId}
        });

        const progressRegistration = JSON.parse(admission.progressRegistration);
        
        const uploadFile = await FileService.move(input.attachment, 'program_study/attachment');

        progressRegistration.attachment.push({
            file: uploadFile
        });

        admission.progressRegistration = JSON.stringify(progressRegistration);

        await admission.save();
        
        return success({
            file: uploadFile.replace("program_study/attachment/",""),
            fullPath: FileService.getFileUrl(uploadFile)
        });
    }
    
    @Patch("/attachment/delete")
    async attachmentDelete(@Body() input:any, @Req() req: any){
        if(!ValidatorService.isId(input.admissionId)){
			return error("id format incorrect!");
        }
        
        const admission = await Admission.findOne({
			where:{id: input.admissionId}
        });

        const progressRegistration = JSON.parse(admission.progressRegistration);

        await progressRegistration.attachment.forEach(async function(data, index) {
            if(input.file == data.file.replace('program_study/attachment/', '')) {
                progressRegistration.attachment.splice(index, 1);
            }
        });

        admission.progressRegistration = JSON.stringify(progressRegistration);
        await admission.save();

        return success(Constant.RETURN_MESSAGE.SUCCESS.OPERATION_SUCCESS);
    }
}
