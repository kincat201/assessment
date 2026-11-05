import { error, errorCode, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import {Body, Get, JsonController, Param, Post, Put, Req} from '@wavecore/routing-controllers';
import {Constant} from "../common/constant/Constant";
import { AssessmentConstant } from '../common/constant/AssessmentConstant';
import { Comparator } from '../common/util/Comparator';
import { validateInput } from '../common/util/Validation';
import { AssessmentAnswer } from '../common/model/AssessmentAnswer';
import { AssessmentService } from '../common/service/AssessmentService';
import { TransactionService } from '../common/service/TransactionService';
import { Assessment } from '../common/model/Assessment';
import { generateDefaultMappingRow } from '../common/util/ListUtil';
import { SHA256 } from 'crypto-js';

@JsonController()
export class AssessmentController {
	@Post('/assessment/question/:types/:assessmentId')
	async getAssessmentQuestion(@Body() input: any, @Req() req: any, @Param("types") types:string, @Param("assessmentId") assessmentId:string) {

		if(!Comparator.isEqualEitherTo(types,
			AssessmentConstant.ASSESSMENT_QUESTION_STUDY, AssessmentConstant.ASSESSMENT_QUESTION_ACTIVITY,
			AssessmentConstant.ASSESSMENT_QUESTION_COMPETENCY, AssessmentConstant.ASSESSMENT_QUESTION_OCCUPATION,
			AssessmentConstant.ASSESSMENT_QUESTION_ORIENTATION, AssessmentConstant.ASSESSMENT_QUESTION_CAREER
		)){
			const allowedStatus = [];
			Object.keys(AssessmentConstant.ASSESSMENT_QUESTION_LIST).forEach(function eachKey(key) {
				allowedStatus.push(key);
			});
			return error("type question must be " + allowedStatus.join(", "));
		}

		const assessment = await Assessment.findByPk(assessmentId,{attributes:['id','assessmentNo','name','status','paymentStatus']});
		if(!assessment) return error('assessment not found!');

		if	(types == AssessmentConstant.ASSESSMENT_QUESTION_STUDY) {
			await AssessmentService.setTestDate(assessmentId);	
		}
		
		const option = generateDefaultOption(input, {}, []);

		const results = [];
		let total = 0;
		types = 'ASSESSMENT_'+types+'_LIST';
		const currentAnswer = await AssessmentService.getAssessmentAnswer(assessment.id, AssessmentConstant['ASSESSMENT_QUESTION_'+types.toUpperCase()], assessment.status === Constant.ASSESSMENT_STATUS_COMPLETE);
		Object.keys(AssessmentConstant[types])
			.forEach(function eachKey(value,index) {
				total++;
				if( ( index >= (input.pageCurrent - 1)*input.dataPerPage) && index < (input.pageCurrent * input.dataPerPage)){
					const dataQuestion = AssessmentConstant[types][value];
					dataQuestion['answer'] = null;
					currentAnswer.map(answer=>{
						if(answer.question === value){
							dataQuestion['answer'] = answer.answer;
						}
					})
					results.push(dataQuestion);
				}
			});
		return success(await generateResponseList(input, option, results, total, false));
	}

	@Put('/assessment/answer/:assessmentId')
	async setAssessmentAnswer(@Body() input: any, @Req() req: any, @Param('assessmentId') assessmentId:number ) {
		if(!input.answers || input.answers.length === 0) return error('answers is required!');

		for(const key in input.answers){
			const check = await validateInput(input.answers[key], {
				question: 'string',
				types: 'string',
				answer: 'number',
			});
			if(!check.status) return error(check.message);
		}

		await AssessmentService.setAssessmentAnswer(assessmentId, input.answers);

		return success('success input answer!');
	}

	@Get('/assessment/details/:assessmentId')
	async getAssessmentDetail(@Body() input: any, @Req() req: any, @Param('assessmentId') assessmentId:number ) {
		let result;
		const assessment = await Assessment.findByPk(assessmentId,{attributes:['id','hash','assessmentNo','name','status','paymentStatus']});
		if(!assessment) return error('assessment not found!');
		result = generateDefaultMappingRow(assessment);
		const progress = await AssessmentService.getPercentageQuestion(assessment);
		result['study_progress'] = progress.study_progress === 100 ? true: false;
		result['interest_progress'] = progress.interest_progress === 100 ? true: false;
		result['career_progress'] = progress.career_progress === 100 ? true: false;
		result['study_progress_percent'] = Math.floor(progress.study_progress);
		result['interest_progress_percent'] = Math.floor(progress.interest_progress);
		result['career_progress_percent'] = Math.floor(progress.career_progress);
		return success(result);
	}

	@Get('/assessment/generate/:assessmentId')
	async generateAssessmentAnswer(@Body() input: any, @Req() req: any, @Param('assessmentId') assessmentId:number ) {
		const answers = [];

		Object.keys(AssessmentConstant.ASSESSMENT_STUDY_LIST)
			.forEach(function eachKey(value,index) {
				answers.push({
					question:value,
					types: AssessmentConstant.ASSESSMENT_QUESTION_STUDY,
					answer: Math.floor(Math.random() * (Math.floor(3) - Math.ceil(1) + 1)) + Math.ceil(1)
				})
			});

		Object.keys(AssessmentConstant.ASSESSMENT_ACTIVITY_LIST)
			.forEach(function eachKey(value,index) {
				answers.push({
					question:value,
					types: AssessmentConstant.ASSESSMENT_QUESTION_ACTIVITY,
					answer: Math.floor(Math.random() * (Math.floor(1) - Math.ceil(0) + 1)) + Math.ceil(0)
				})
			});

		Object.keys(AssessmentConstant.ASSESSMENT_COMPETENCY_LIST)
			.forEach(function eachKey(value,index) {
				answers.push({
					question:value,
					types: AssessmentConstant.ASSESSMENT_QUESTION_COMPETENCY,
					answer: Math.floor(Math.random() * (Math.floor(1) - Math.ceil(0) + 1)) + Math.ceil(0)
				})
			});

		Object.keys(AssessmentConstant.ASSESSMENT_OCCUPATION_LIST)
			.forEach(function eachKey(value,index) {
				answers.push({
					question:value,
					types: AssessmentConstant.ASSESSMENT_QUESTION_OCCUPATION,
					answer: Math.floor(Math.random() * (Math.floor(1) - Math.ceil(0) + 1)) + Math.ceil(0)
				})
			});

		Object.keys(AssessmentConstant.ASSESSMENT_ORIENTATION_LIST)
			.forEach(function eachKey(value,index) {
				answers.push({
					question:value,
					types: AssessmentConstant.ASSESSMENT_QUESTION_ORIENTATION,
					answer: Math.floor(Math.random() * (Math.floor(7) - Math.ceil(1) + 1)) + Math.ceil(1)
				})
			});

		Object.keys(AssessmentConstant.ASSESSMENT_CAREER_LIST)
			.forEach(function eachKey(value,index) {
				answers.push({
					question:value,
					types: AssessmentConstant.ASSESSMENT_QUESTION_CAREER,
					answer: Math.floor(Math.random() * (Math.floor(7) - Math.ceil(1) + 1)) + Math.ceil(1)
				})
			});

		await AssessmentService.setAssessmentAnswer(assessmentId, answers);

		return success(answers);
	}

	@Get('/assessment/calculate/:hashId')
	async getAssessmentCalculate(@Body() input: any, @Req() req: any, @Param('hashId') hashId:string ) {

		const assessmentId = await AssessmentService.getIdFromHash(hashId);
		if(!assessmentId) return error('assessment not found!');

		const assessment = await Assessment.findByPk(assessmentId);
		if(!assessment) return error('assessment not found!');

		const result = {};
		result['name'] = assessment.name;

		result['interestScore'] = await AssessmentService.calculateInterest(assessment);

		result['consistencyScore'] = await AssessmentService.calculateConsistency(assessment);

		result['orientationScore'] = await AssessmentService.calculateOrientation(assessment);

		result['careerScore'] = await AssessmentService.calculateCareer(assessment);

		const getRecommendedStudy = await AssessmentService.getRecommendedStudy(result['interestScore']['interestArea']);

		result['improvementStudy'] = await AssessmentService.getImprovementStudy(assessment, getRecommendedStudy['studyFieldId']);

		result['recommendedStudy'] = getRecommendedStudy['programStudyList'];

		AssessmentService.saveAnswerToDb(assessmentId);

		return success(result);
	}

	@Post('/assessment/create')
	async createAssessment(@Body() input: any, @Req() req: any) {
		const check = await validateInput(input, {
			name: 'string',
			gender: 'string',
			dateOfBirth: 'string',
			schoolName: 'string',
			schoolClass: 'string',
			field: 'string'
		});

		const assessmentNubmer = await AssessmentService.generateAssessmentNumber();

		const assessment = await Assessment.create({
			userId: req.user.id,
			hash: SHA256(assessmentNubmer).toString(),
			assessmentNo: assessmentNubmer,
			name: input.name,
			gender: input.gender,
			dateOfBirth: input.dateOfBirth,
			schoolName: input.schoolName,
			schoolClass: input.schoolClass,
			field: input.field,
			hopes: input.hopes ? input.hopes : '',
			status: Constant.ASSESSMENT_STATUS_PENDING,
			paymentStatus: Constant.PAYMENT_UNPAID
		});

		const createAssessmentTrx: any = await TransactionService.createAssessmentTrx(assessment, input, req);
		if (createAssessmentTrx.code) {
			return errorCode(createAssessmentTrx)
		}

		await AssessmentService.sendPaymentNotification(req.user.email, input.name, createAssessmentTrx);

		return success(createAssessmentTrx);
	}
}
