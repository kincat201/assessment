import { CoreRedis, Env, error } from '@wavecore/core-node';
import { AssessmentConstant } from '../constant/AssessmentConstant';
import Sequelize from 'sequelize';
import { default as sequelize, Op } from 'sequelize';
import * as moment from 'moment';
import { City } from '../model/City';
import { Province } from '../model/Province';
import { Faculty } from '../model/Faculty';
import { FacultyCategory } from '../model/FacultyCategory';
import { ProgramStudy } from '../model/ProgramStudy';
import { AdmissionSchedule } from '../model/AdmissionSchedule';
import { Admission } from '../model/Admission';
import { Assessment } from '../model/Assessment';
import { User } from '../model/User';
import { ScholarshipUniversity } from '../model/ScholarshipUniversity';
import { Scholarship } from '../model/Scholarship';
import { Transaction } from '../model/Transaction';
import { Constant } from '../constant/Constant';
import { University } from '../model/University';
import { defaultValue } from '../util/CommonUtil';
import { FileService } from './FileService';
import { ManipulatorService } from './ManipulatorService';
import { EmailService } from "./EmailService";
import { EspayService } from './EspayService';
import { ExportService } from './ExportService';
import { pad } from '../util/CommonUtil';
import { generateDefaultMappingRow } from '../util/ListUtil';
import { ProgramStudyCategory } from '../model/ProgramStudyCategory';
import { AssessmentAnswer } from '../model/AssessmentAnswer';
const asessmentKey = Env().projectName + "-" + Env().appEnv + "-assessment";

export class AssessmentService{

	static async getPercentageQuestion(assessment){
		const result ={study_progress:0,interest_progress:0,career_progress:0};

		const study = await AssessmentService.getAssessmentAnswer(assessment.id, AssessmentConstant.ASSESSMENT_QUESTION_STUDY, assessment.status === Constant.ASSESSMENT_STATUS_COMPLETE);
		const totalStudy = Object.keys(AssessmentConstant.ASSESSMENT_STUDY_LIST).length;

		let interestTalent = 0;
		let totalInterestTalent=0;
		const interests = ['activity','competency','occupation'];

		for(const interest of interests) {
			const interestType = 'ASSESSMENT_QUESTION_'+interest.toUpperCase();
			const datas = await AssessmentService.getAssessmentAnswer(assessment.id, AssessmentConstant[interestType], assessment.status === Constant.ASSESSMENT_STATUS_COMPLETE);
			interestTalent += datas.length;
		}

		totalInterestTalent += Object.keys(AssessmentConstant.ASSESSMENT_ACTIVITY_LIST).length;
		totalInterestTalent += Object.keys(AssessmentConstant.ASSESSMENT_COMPETENCY_LIST).length;
		totalInterestTalent += Object.keys(AssessmentConstant.ASSESSMENT_OCCUPATION_LIST).length;

		let orientationCareer = 0;
		let totalOrientationCareer = 0;
		const careers = ['orientation','career',];

		for(const career of careers) {
			const careerType = 'ASSESSMENT_QUESTION_'+career.toUpperCase();
			const datas = await AssessmentService.getAssessmentAnswer(assessment.id, AssessmentConstant[careerType], assessment.status === Constant.ASSESSMENT_STATUS_COMPLETE);
			orientationCareer += datas.length;
		}

		totalOrientationCareer += Object.keys(AssessmentConstant.ASSESSMENT_ORIENTATION_LIST).length;
		totalOrientationCareer += Object.keys(AssessmentConstant.ASSESSMENT_CAREER_LIST).length;

		result.study_progress = (study.length/totalStudy)*100;
		result.interest_progress = (interestTalent/totalInterestTalent)*100;
		result.career_progress = (orientationCareer/totalOrientationCareer)*100;

		return result;
	}

	static async setAssessmentAnswer(assessmentId, answers){

		const currentAnswers = await this.getAssessmentAnswer(assessmentId);

		answers.map(answer => {
			if(currentAnswers){
				let isAnswerExist = false;
				currentAnswers.map( (currentAnswer,key) =>{
					if(currentAnswer.question === answer.question){
						isAnswerExist = true;
						currentAnswers[key].answer = answer.answer;
					}
				});
				if(!isAnswerExist){
					currentAnswers.push(answer);
				}
			}else{
				currentAnswers.push(answer);
			}
		});

		await CoreRedis().hset(asessmentKey, assessmentId, JSON.stringify(currentAnswers));
		return currentAnswers;
	}

	static async getAssessmentAnswer(assessmentId, types='',completed = false){
			let results = [];
			let answers = [];
			if(completed){
				const getAnswerFromDb = await AssessmentAnswer.findAll({where:{'assessmentId':assessmentId}});
				getAnswerFromDb.map(getAnswer=>{
					answers.push({
						question:getAnswer.question,
						types:getAnswer.types,
						answer:getAnswer.answer,
					});
				})
			}else{
				const getAnswerFromRedis = await CoreRedis().hget(asessmentKey,assessmentId);
				answers = getAnswerFromRedis ? JSON.parse(getAnswerFromRedis): [];
			}

			if(types && answers.length > 0){
				answers.map( answer =>{
					if(answer.types === types){
						results.push(answer);
					}
				})
			}else{
				results = answers;
			}

			return results;
	}

	static async calculateInterest(assessment){

		const result = {
			activity:{R:0,I:0,A:0,S:0,E:0,C:0},
			competency:{R:0,I:0,A:0,S:0,E:0,C:0},
			occupation:{R:0,I:0,A:0,S:0,E:0,C:0},
			total:{R:0,I:0,A:0,S:0,E:0,C:0},
		};

		const matchCode = ['R','I','A','S','E','C'];

		const interests = ['activity','competency','occupation'];

		for(const interest of interests) {
			const interestType = 'ASSESSMENT_QUESTION_'+interest.toUpperCase();
			const datas = await AssessmentService.getAssessmentAnswer(assessment.id, AssessmentConstant[interestType],assessment.status === Constant.ASSESSMENT_STATUS_COMPLETE);

			datas.map(data => {
				if(data.answer > 0) {
					const questionType = 'ASSESSMENT_'+interest.toUpperCase()+'_LIST';
					const code = AssessmentConstant[questionType][data.question]['code'];
					if(matchCode.indexOf(code) !== -1) {
						result[interest][code] += parseInt(data.answer,0);
						result.total[code] += parseInt(data.answer,0);
					}
				}
			});
		}

		const resultInterest = [];
		for (const interest in result.total) {
			resultInterest.push([interest, result.total[interest]]);
		}

		resultInterest.sort(function(a, b) {
			return b[1] - a[1];
		});

		const finalInterest = [];
		resultInterest.map((interest,key)=>{
			if(key<4){
				const data = {
					code: interest[0],
					score: Math.round((((interest[1]/36)*100) + Number.EPSILON) * 100) / 100,
					remark: AssessmentConstant.ASSESSMENT_ACTIVITY_RESULT[interest[0]]
				};
				if(key !== 3){
					finalInterest.push(data);
				}else{
					if(interest[1] === resultInterest[key-1][1]){
						finalInterest.push(data);
					}
				}
			}
		});

		return {totalResult:result, interestArea: finalInterest};
	}

	static async calculateConsistency(assessment){

		const consistencyList = { KONS1 : [], KONS2 : [], KONS3: [], KONS4: [], KONS5 : [], KONS6: [] };

		const interests = ['activity','competency','occupation'];

		for(const interest of interests) {
			const interestType = 'ASSESSMENT_QUESTION_'+interest.toUpperCase();
			const datas = await AssessmentService.getAssessmentAnswer(assessment.id, AssessmentConstant[interestType],assessment.status === Constant.ASSESSMENT_STATUS_COMPLETE);

			datas.map(data => {
				const questionType = 'ASSESSMENT_'+interest.toUpperCase()+'_LIST';
				const question = AssessmentConstant[questionType][data.question];
				if(question.ext){
					consistencyList[question.ext].push(data.answer);
				}
			});
		}

		let totalConsistent = 0;

		Object.keys(consistencyList)
			.forEach(function eachKey(value) {
				if(consistencyList[value][0] === consistencyList[value][1]) totalConsistent++;
		});

		return Math.round(((((2+totalConsistent)/8)*100) + Number.EPSILON) * 100) / 100;
	}

	static async calculateOrientation(assessment){

		const orientationResult = {
			RELATIONSHIP : {
				value:0,
				remark:AssessmentConstant.ASSESSMENT_ORIENTATION_RELATIONSHIP
			},
			VISION: {
				value:0,
				remark: AssessmentConstant.ASSESSMENT_ORIENTATION_VISION
			}
		};

		const datas = await AssessmentService.getAssessmentAnswer(assessment.id, AssessmentConstant.ASSESSMENT_QUESTION_ORIENTATION,assessment.status === Constant.ASSESSMENT_STATUS_COMPLETE);

		datas.map(data => {
			const question = AssessmentConstant.ASSESSMENT_ORIENTATION_LIST[data.question];
			if(question.code === 'R'){
				orientationResult.RELATIONSHIP.value+= parseInt(data.answer,0);
			} else {
				orientationResult.VISION.value+= parseInt(data.answer,0);
			}
		});

		orientationResult.RELATIONSHIP.value = Math.round((((orientationResult.RELATIONSHIP.value/84)*100) + Number.EPSILON) * 100) / 100;
		orientationResult.VISION.value = Math.round((((orientationResult.VISION.value/84)*100) + Number.EPSILON) * 100) / 100;

		return orientationResult;
	}

	static async calculateCareer(assessment){

		const careerList = [
			["DISCOVERER",0],
			["CAREGIVER",0],
			["SUPPORTER",0],
			["STRATEGIST/PLANNER",0],
			["EDUCATOR",0],
			["COACH",0],
			["MANAGER",0],
			["COMMUNICATOR",0],
			["ANALYST",0],
			["DEFENDER",0],
		];

		for(const career of careerList) {
			const datas = await AssessmentService.getAssessmentAnswer(assessment.id, AssessmentConstant.ASSESSMENT_QUESTION_CAREER,assessment.status === Constant.ASSESSMENT_STATUS_COMPLETE);

			datas.map(data => {
				const question = AssessmentConstant.ASSESSMENT_CAREER_LIST[data.question];
				if(question.code === career[0]){
					career[1] = parseInt(career[1].toString(),0) + parseInt(data.answer,0);
				}
			});
		}

		careerList.sort(function(a, b) {
			return parseInt(b[1].toString(),0) - parseInt(a[1].toString(),0);
		});

		const finalCareer = [];
		careerList.map((career,key)=>{
			if(key<3){
				const data = {
					code: career[0],
					score: career[1],
					remark: AssessmentConstant.ASSESSMENT_CAREER_RESULT[career[0]]
				};
				if(key !== 2){
					finalCareer.push(data);
				}else{
					if(career[1] === career[key-1][1]){
						finalCareer.push(data);
					}
				}
			}
		});

		return finalCareer;
	}

	static async saveAnswerToDb(assessmentId){
		const assessment = await Assessment.findByPk(assessmentId);

		if(assessment.status !== Constant.ASSESSMENT_STATUS_COMPLETE){
			assessment.status = Constant.ASSESSMENT_STATUS_COMPLETE;
			assessment.save();

			const allAnswerFromRedis = await AssessmentService.getAssessmentAnswer(assessmentId);
			allAnswerFromRedis.map(getAnswer=>{
				const assessmentAnswer = new AssessmentAnswer();
				assessmentAnswer.assessmentId = assessment.id;
				assessmentAnswer.question = getAnswer.question;
				assessmentAnswer.answer = getAnswer.answer;
				assessmentAnswer.types = getAnswer.types;
				assessmentAnswer.save();
			});

			await CoreRedis().hdel(asessmentKey,assessmentId);
		}
	}

	static async getRecommendedStudy(interestScore){
		const result = { primary : [], alternative : []}
		let primaryHollandCode = [];
		let baseCode = '';
		let primaryCode = '';
		let alternativeCode = '';
		interestScore.map( (interest,key) =>{
			baseCode += interest.code;
			if(key<3){
				primaryCode += interest.code;
			}
			if(interestScore.length === 4){
				if(alternativeCode.length < 4){
					if(interestScore[key+1] && interest.score === interestScore[key+1].score){
						alternativeCode += interestScore[key+1].code;
					} else if(interestScore[key-1] && interest.score === interestScore[key-1].score){
						alternativeCode += interestScore[key-1].code;
					} else {
						alternativeCode += interest.code;
					}
				}
			}else{
				if(key === 0){
					alternativeCode += interestScore[key+1].code;
				}else if(key === 1){
					alternativeCode += interestScore[key-1].code;
				}else{
					alternativeCode += interest.code;
				}
			}
		});

		let searchPrimaryHollandCode = '';

		Object.keys(AssessmentConstant.PRIORITY_HOLLAND_CODE)
			.forEach(function eachKey(hollandKey) {
				if(hollandKey === primaryCode){
					searchPrimaryHollandCode = hollandKey;
				}else{
					AssessmentConstant.PRIORITY_HOLLAND_CODE[hollandKey].map( holland =>{
						if(holland === primaryCode) searchPrimaryHollandCode = hollandKey;
					});
				}
		});

		if(searchPrimaryHollandCode){
			primaryHollandCode = AssessmentConstant.PRIORITY_HOLLAND_CODE[searchPrimaryHollandCode];
			if(primaryHollandCode.indexOf(searchPrimaryHollandCode) === -1) primaryHollandCode.push(searchPrimaryHollandCode);
		}

		if(primaryHollandCode.length === 0) primaryHollandCode.push(primaryCode);

		Object.keys(AssessmentConstant.HOLLAND_CODE_LIST)
			.forEach(function eachKey(hollandKey) {
				AssessmentConstant.HOLLAND_CODE_LIST[hollandKey].list.map(holland =>{
					if(primaryHollandCode.indexOf(holland) !== -1){
						if(result.primary.indexOf(hollandKey) === -1) result.primary.push(hollandKey);
					}
					if(holland === alternativeCode){
						if(result.alternative.indexOf(hollandKey) === -1) result.alternative.push(hollandKey)
					}
				});
		});

		const finalResult = { primary : [], alternative: [] ,studyFieldId:[], programStudyList:[]};

		result.primary.map((primary)=>{
			const indexAlternative = result.alternative.indexOf(primary);
			if(indexAlternative > -1) result.alternative.splice(indexAlternative,1);
			const data = AssessmentConstant.HOLLAND_CODE_LIST[primary];
			data.study.map(study => {
				if(finalResult.studyFieldId.indexOf(study) === -1) finalResult.studyFieldId.push(study);
			});
			// delete data.study;
			// delete data.list;
			// finalResult.primary.push(data);
			finalResult.primary.push(data.programStudyCategoryId);
		});

		result.alternative.map((alternative)=>{
			const data = AssessmentConstant.HOLLAND_CODE_LIST[alternative];
			data.study.map(study => {
				if(finalResult.studyFieldId.indexOf(study) === -1) finalResult.studyFieldId.push(study);
			});
			// delete data.list;
			// delete data.study;
			// finalResult.alternative.push(AssessmentConstant.HOLLAND_CODE_LIST[alternative]);
			finalResult.alternative.push(data.programStudyCategoryId);
		});

		finalResult.programStudyList = await this.getProgramStudyList(finalResult.primary, finalResult.alternative);

		return finalResult;

	}

	static async getImprovementStudy(assessment, studyField){

		const result = [];
		const improvementStudyId = [];
		const datas = await AssessmentService.getAssessmentAnswer(assessment.id, AssessmentConstant['ASSESSMENT_QUESTION_STUDY'],assessment.status === Constant.ASSESSMENT_STATUS_COMPLETE);

		datas.map(data=>{
			if(studyField.indexOf(data.question) !== -1 && data.answer < 3) improvementStudyId.push(data.question);
		});

		improvementStudyId.map(study=>{
			result.push(AssessmentConstant.ASSESSMENT_STUDY_LIST[study]);
		});

		return result;

	}

	static async getProgramStudyList(primaryId, alternativeId){
		const option = {};

		option['where'] = {};
		option['attributes'] = ['id','name','nameEn'];

		option['include'] = [
			{
				model: FacultyCategory,
				attributes: ['id', 'name','nameEn']
			}
		];

		option['where']['id'] = {[Op.in]:[...primaryId , ...alternativeId]};

		option['where']['deletedAt'] = null;

		const datas = await ProgramStudyCategory.findAndCountAll(option);

		const results = [];
		datas.rows.map((data,key) => {
			let label = '';
			if(primaryId.indexOf(data.id.toString()) !== -1) label = 'Priority';
			if(alternativeId.indexOf(data.id.toString()) !== -1) label = 'Alternative';
			results.push({
				id: data.id,
				name: defaultValue(data.name),
				flagAssessment: label,
				nameEn: defaultValue(data.nameEn),
				faculty:{
					id: data.facultyCategory.id,
					name: defaultValue(data.facultyCategory.name),
					nameEn: defaultValue(data.facultyCategory.nameEn),
				}
			});
		});

		return results;

	}

	static async generateAssessmentNumber() {
		const prefix = 'ASSESMENT-';

		const today = sequelize.where(sequelize.fn('datediff', sequelize.col('createdAt'), moment().format("YYYY-MM-DD")), {
			[Op.and]: [
				{ [Op.eq]: 0 },
			]
		});

		const total = await Assessment.count({
			where: {
				createdAt: today
			}
		});

		return prefix + moment().format('YYYYMMDD') + '-' + pad((total + 1).toString(), 4);
	}

	static async sendPaymentNotification(email:string, name:string, transactionNumber:string) {
		const transaction = await Transaction.findOne({
            where:{
                transactionNumber: transactionNumber
            },
            include:[Assessment]
		});

		const paymentMethod = await EspayService.getChannelDetailByBankProduct(transaction.bankProduct);

        EmailService.sendEmail({
            to: email,
            subject: "Menunggu Pembayaran Tes Minat",
            html: "Dear " + name + ", <br> <br>" +
              "Terima kasih atas ketertarikanmu untuk mengikuti Tes Minat di website Kampusyuk. Mohon menyelesaikan pembayaranmu dalam waktu 24 jam untuk dapat mengikuti tes ini. <br> <br>"+
			  "Detail transaksi sebagai berikut : <br><br>" +
			  
              "No. Transaksi : " + transaction.transactionNumber + " <br>" +
			  "Tanggal Transaksi : " + moment(transaction.createdAt).format('DD/MM/YYYY') + " <br>"+
			  "Nama : " + name + " <br>" +
			  "Email : " + email + " <br>" +
			  "Produk : Tes Minat <br>" +
			  "Metode Pembayaran : " + paymentMethod.productName + " <br>" +
			  "Nominal Pembayaran : " + Number(transaction.totalPrice) + " <br><br>" +

			  "Mohon melakukan pembayaran sesuai dengan metode yang telah kamu pilih sebelumnya. <br><br>" +
			  
              "Jika ada pertanyaan, hubungi kami dengan mengirimkan email ke hello@kampusyuk.com atau melalui telepon/whatsapp ke nomor +62 813-8630-4313. <br><br>" +
			  
			  "Salam hangat, <br><br>"+
              "Tim Kampusyuk"
		});
	}

	static async sendPaymentCompleteNotification(transactionId:number) {
		const transaction = await Transaction.findOne({
            where:{
                id: transactionId
            },
            include:[Assessment, User]
		});

		const paymentMethod = await EspayService.getChannelDetailByBankProduct(transaction.bankProduct);
		const testUrl = "https://google.com";

        EmailService.sendEmail({
            to: transaction.user.email,
            subject: "Pembayaran Tes Minat Berhasil",
            html: "Dear " + transaction.assessment.name + ", <br> <br>" +
              "Terima kasih, kami telah menerima pembayaran untuk pengerjaan Tes Minat di website Kampusyuk dengan detail sebagai berikut : <br> <br>" +
			  
              "No. Transaksi : " + transaction.transactionNumber + " <br>" +
			  "Tanggal Transaksi : " + moment(transaction.createdAt).format('DD/MM/YYYY') + " <br>"+
			  "Nama : " + transaction.assessment.name + " <br>" +
			  "Email : " + transaction.user.email + " <br>" +
			  "Produk : Tes Minat <br>" +
			  "Metode Pembayaran : " + paymentMethod.productName + " <br>" +
			  "Nominal Pembayaran : " + Number(transaction.totalPrice) + " <br><br>" +

			  "Sudah siap untuk mengetahui jurusan yang sesuai dengan minat dan bakatmu? Ayo kerjakan tesnya sekarang. <br><br>" +

			  "<a href='"+ testUrl +"' target='_blank'>Mulai Test</a> <br><br>" +
			  
              "Jika ada pertanyaan, hubungi kami dengan mengirimkan email ke hello@kampusyuk.com atau melalui telepon/whatsapp ke nomor +62 813-8630-4313. <br><br>" +
			  
			  "Salam hangat, <br><br>"+
              "Tim Kampusyuk"
		});
	}

	static async exportAssessment(assessments: Assessment[], exportTo, req) {
		const exportHeaders = ['Index', 'Assessment No.', 'Name', 'Email', 'Gender',
            'Date Of Birth', 'School Name', 'School Class', 'Field', 'Hopes', 'Status', 'Payment Status', 'Created At'
        ];
        const exportData = [];
        const exportExtensions = {
            [Constant.EXPORT_TYPE_CSV]: 'csv',
            [Constant.EXPORT_TYPE_EXCEL]: 'xlsx'
        };

        const date = moment().format('DD-MM-YYYY-hh-mm-ss');
        const filename = ['Student', date, req.user.id].join('-');
        let file;

        for (const assessment of assessments) {
            exportData.push({
				id: assessment.id,
				assessmentNo: assessment.assessmentNo,
                name: assessment.name,
                email: assessment.user.email,
                gender: assessment.gender,
                dateOfBirth: assessment.dateOfBirth,
				schoolName: assessment.schoolName,
				schoolClass: assessment.schoolClass,
				field: assessment.field,
				hopes: assessment.hopes,
				status: (assessment.status) ? Constant.ASSESSMENT_STATUS_LABEL[assessment.status] : "",
				paymentStatus: (assessment.paymentStatus) ? Constant.PAYMENT_STATUS_LIST[assessment.paymentStatus] : "",
                createdAt: assessment.createdAt
            })
        }

        if (exportTo === Constant.EXPORT_TYPE_CSV) {
            file = await ExportService.toCsv(filename, exportData, exportHeaders, 'Assessment', true);
        } else if (exportTo === Constant.EXPORT_TYPE_EXCEL) {
            file = await ExportService.toExcel(filename, exportData, exportHeaders, 'Assessment', true);
        }

        return file;
	}

	static async setTestDate(assessmentId: string) {
		const assessment = await Assessment.findOne({ where: { id: assessmentId } });

		await assessment.update({
			testDate:  moment().format('YYYY-MM-DD H:mm:ss')
		})
	}

	static async getIdFromHash(hashId: string) {
		const assessment = await Assessment.findOne({ where: { hash: hashId } });
		return assessment.id;
	}
}
