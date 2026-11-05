import { 
    error,
    errorCode,
	generateDefaultMapping,
	generateDefaultMappingRow,
	generateDefaultOption,
	generateResponseList,
    success,
    unauthorized
 } from '@wavecore/core-node';
import { Get, JsonController, Req, Patch, Post, Body, Param } from "@wavecore/routing-controllers";
import { Student } from '../common/model/Student';
import { User } from '../common/model/User';
import { Admission } from '../common/model/Admission';
import { Assessment } from '../common/model/Assessment';
import { Transaction } from '../common/model/Transaction';
import { ProgramStudy } from '../common/model/ProgramStudy';
import { Scholarship } from '../common/model/Scholarship';
import { ScholarshipProvider } from '../common/model/ScholarshipProvider';
import { University } from '../common/model/University';
import { City } from '../common/model/City';
import { Province } from '../common/model/Province';
import { defaultValue } from '../common/util/CommonUtil';
import { validateInput, checkPayload } from '../common/util/Validation';
import * as bcrypt from 'bcrypt';
import { FileService } from '../common/service/FileService';
import { AdmissionService } from '../common/service/AdmissionService';
import { ErrorCode } from '../common/util/Error';
import { Faculty } from '../common/model/Faculty';
import { ValidatorService } from '../common/service/ValidatorService';
import { Constant } from '../common/constant/Constant';
import { EspayConstant } from '../common/constant/EspayConstant';

@JsonController('/student')
export class StudentController {

    @Get('/details')
    async getStudentDetails(@Req() req) {
        const student = await Student.findOne({
            attributes: [
                'birthDate',
                'birthPlace',
                'gender',
                'address',
                'schoolFrom',
                'universityFrom',
            ],
            where: {
                userId: req.user.id
            },
            include: [{
                model: User,
                attributes: ['name', 'email','phone']
            }]
        });

        if (!student) {
            return error('Student not found')
        }

        const data = {
            name: defaultValue(student.user.name),
            email: defaultValue(student.user.email),
            phone: defaultValue(student.user.phone),
            address: defaultValue(student.address),
            birthDate: defaultValue(student.birthDate),
            birthPlace: defaultValue(student.birthPlace),
            gender: defaultValue(student.gender),
            schoolFrom: defaultValue(student.schoolFrom),
            universityFrom: defaultValue(student.universityFrom),
        };

        return success(data)
    }

    @Patch('/update')
    async updateStudent(@Body() input, @Req() req) {
        const check = await validateInput(input, {
            name: 'string',
            phone: 'string',
            address: 'string',
            birthDate: 'date',
            birthPlace: 'string',
            gender: 'string',
            schoolFrom: 'string',
            universityFrom: 'string'
        });

        if (!check.status) return error(check.message);

        const student = await Student.findOne({ where: { userId: req.user.id } });
        if (!student) return error('Student not found!');

        User.update(input, { where: { id: req.user.id } });
        student.update(input, { where: { userId: req.user.id } });

        return success('profile updated successfully')
    }

    @Patch('/update/password')
    async updatePassword(@Body() input, @Req() req) {
        const check = await validateInput(input, {
            oldPassword: 'string',
            newPassword: 'string',
            confirmPassword: 'string',
        });

        if (!check.status) return error(check.message);
        const user = await User.findByPk(req.user.id, { attributes: ['id', 'password'] });
        if (!user) return error('User not found');

        const validPassword: boolean = await bcrypt.compare(input.oldPassword, user.password);
        if (!validPassword) return errorCode(ErrorCode.INVALID_OLD_PASSWORD);
        if (input.newPassword !== input.confirmPassword) return errorCode(ErrorCode.INVALID_CONFIRM_PASSWORD);
        if (input.newPassword.length < 6) return error('New password should more than 6 characters');

        user.password = await bcrypt.hash(input.newPassword, 10);
        user.save();

        return success('password changed successfully')
    }

    @Post('/history/applications')
    async applicationHistory(@Body() input, @Req() req) {
        let datas;
		const allowedFilter = [];
		const allowedOrder = ['id'];
		const searchField = [];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		const option = generateDefaultOption(input, {}, searchField);
		option['attributes'] = [
            'id', 'registrationId', 'name', 'email', 'phone', 'schoolFrom', 'registrationType', 
            'classType', 'registrationFee', 'tuitionFee', 'status', 'progressRegistration',
            'progressTest', 'progressAcceptance', 'progressRemark', 'createdAt'
        ];
		option['include'] = [
            {
                model: ProgramStudy,
				required: false,
				where: {
					deletedAt: null
				},
				attributes: [
					'id',
					'name',
                    'studyLevel',
                    'paymentRequired'
                ],
                include: [
                    {
                        model: University,
                        required: false,
                        where: {
                            deletedAt: null
                        },
                        attributes: [
                            'id',
                            'name',
                            'logo',
                            'partner',
                            'types',
                            'area'
                        ],
                        include: [
                            {
                                model: City,
                                attributes: ['id', 'name', 'types']
                            },
                            {
                                model: Province,
                                attributes: ['id', 'name']
                            }
                        ]
                    }, {
                        model: Faculty,
                        attributes: ['id']
                    }
                ]
            }, {
		        model: Transaction,
                    attributes: ['id', 'status']
                }
		];

		option['distinct'] = true;
        option['where']['deletedAt'] = null;
        option['where']['userId'] = req.user.id;

        datas = await Admission.findAndCountAll(option);

		const results = [];
        
        for (const data of datas.rows) {
            let transaction = {};

            if (data.transaction) {
                if (data.transaction.id) {
                    transaction = {
                        id: data.transaction.id,
                        status: data.transaction.status
                    }
                }
            }

            let programStudy = {};
            let university = {};

            if (data.programStudy) {
                programStudy = {
                    id: data.programStudy.id,
                    name: data.programStudy.name,
                    studyLevel: data.programStudy.studyLevel,
                    paymentRequired: data.programStudy.paymentRequired
                };

                university = {
                    id: data.programStudy.university.id,
                    name: data.programStudy.university.name,
                    logo: FileService.getFileUrl(data.programStudy.university.logo),
                    partner: data.programStudy.university.partner,
                    area: data.programStudy.university.area,
                    types: data.programStudy.university.types,
                    city: data.programStudy.university.city.name,
                    province: data.programStudy.university.province.name
                }
            }

            const progressRegistration = data.progressRegistration ? JSON.parse(data.progressRegistration): {};

            if (progressRegistration) {
                if (progressRegistration.attachment && progressRegistration.attachment.length > 0) {
                    progressRegistration.attachment.forEach(function(data, index) {
                        progressRegistration.attachment[index] = {
                            fullPath: FileService.getFileUrl(progressRegistration.attachment[index].file),
                            file: progressRegistration.attachment[index].file.replace("programstudy/attachment/","")
                        }
                    });
                }
            }
            
            let progress = await AdmissionService.getProgressScore(data.id);

			results.push({
                id: data.id,
                registrationId: data.registrationId,
                name: data.name,
                email: data.email,
                phone: data.phone,
                registrationType: data.registrationType,
                classType: data.classType,
                registrationFee: data.registrationFee,
                tuitionFee: data.tuitionFee,
                status: data.status,
                schoolFrom: data.schoolFrom,
                createdAt: data.createdAt,
                transaction: transaction, 
                programStudy: programStudy,
                facultyId: data.programStudy ? data.programStudy.faculty.id : '',
                university: university,
                progressRegistration: progressRegistration,
                progressTest: data.progressTest ? JSON.parse(data.progressTest) : '',
                progressAcceptance: data.progressAcceptance ? JSON.parse(data.progressAcceptance) : '',
                progressRemark: data.progressRemark ? data.progressRemark : '',
                progress: progress
            });
        }

		return success(await generateResponseList(input, option, results, datas.count, false));
    }

    @Get('/history/application/detail/:id')
    async applicationHistoryDetail(@Param('id') id: number, @Req() req: any) {
        if(!ValidatorService.isId(id)){
			return error("id format incorrect!");
        }
        
        let data;
		const result={};
		const option = {};
		option['where'] = { id };
		option['include'] = [
			{
				model: ProgramStudy,
				attributes: ['id', 'name','studyLevel','paymentRequired'],
				include: [
					{
						model: University,
						attributes: ['id', 'name', 'logo', 'area']
					},
					{
						model:Faculty,
						attributes: ['id','name']
					}
				]
			}, {
				model: Scholarship,
				required: false,
				attributes: ['id', 'name'],
				include: [{
					model: ScholarshipProvider,
					attributes: ['name']
				}]
			}, {
				model: Transaction,
				attributes: ['id', 'paymentAmount', 'espayStatus', 'espayReason', 'createdAt']
			}
		];
		data = await Admission.findOne(option);
        if (!data || !data.programStudy) return error('Admission not found');

        if (data.userId !== req.user.id) return unauthorized('Unauthorized.');
        
        let progress = (await AdmissionService.getProgressScore(data.id)).split("/");

		result['id']=data.id;
		result['registrationId']=(data.registrationId)?data.registrationId:"";
		result['name']=data.name;
		result['email']=data.email;
		result['phone']=data.phone;
		result['universityId']=data.programStudy.university.id;
        result['universityName']=data.programStudy.university.name;
        result['universityArea']=data.programStudy.university.area;
        result['universityLogo']= FileService.getFileUrl(data.programStudy.university.logo);
		result['facultyId']=data.programStudy.faculty.id;
		result['facultyName']=data.programStudy.faculty.name;
		result['programStudyId']=data.programStudy.id;
		result['programStudyName']=data.programStudy.name;
		result['classType']=data.classType;
		result['schoolFrom']=data.schoolFrom;
		result['englishProficiency']=data.englishProficiency;
		result['jobTitle']=data.jobTitle;
		result['graduateUniversity']=data.graduateUniversity;
		result['registrationType']=data.registrationType;
		result['studyLevel']=data.programStudy.studyLevel;
		result['paymentRequired']=data.programStudy.paymentRequired;
		result['registrationFee']=data.registrationFee;
		result['registrationFeeDate']=data.registrationFeeDate;
		result['registrationFeeMethod']=(data.registrationFeeMethod)?data.registrationFeeMethod:"";
		if(data.registrationAttachment) {
			result['registrationAttachment'] = {
				image: (data.registrationAttachment) ? data.registrationAttachment : "",
				fullPath: FileService.getFileUrl(data.registrationAttachment, Constant.IMAGE_PATH.ADMISSION_REGISTRATION)
			};
		} else {
			result['registrationAttachment'] = null;
		}
		result['tuitionFee']=data.tuitionFee;
		result['tuitionFeeDate']=data.tuitionFeeDate;
		result['tuitionFeeMethod']=(data.tuitionFeeMethod)?data.tuitionFeeMethod:"";
		if(data.tuitionAttachment) {
			result['tuitionAttachment'] = {
				image: (data.tuitionAttachment) ? data.tuitionAttachment : "",
				fullPath: FileService.getFileUrl(data.tuitionAttachment, Constant.IMAGE_PATH.ADMISSION_TUITION)
			};
		} else {
			result['tuitionAttachment']=null
		}
		result['submitDocument']=data.submitDocument;
		result['takingExam']=data.takingExam;
		result['status']=data.status;
		result['date']=data.createdAt;
		result['scholarshipName'] = (data.scholarship) ? data.scholarship.name : '';
		result['scholarshipProvider'] = (data.scholarship) ? data.scholarship.scholarshipProvider.name : '';

		result['transaction'] = {};
		if (data.transaction) {
			result['transaction'] = {
				id: data.transaction.id,
				amount: (data.transaction.paymentAmount) ? data.transaction.paymentAmount : 0,
				espayStatus: (data.transaction.espayStatus) ? EspayConstant.TX_STATUS_LABELS[data.transaction.espayStatus] : '',
				espayReason: (data.transaction.espayReason) ? data.transaction.espayReason : '',
				createdAt: data.createdAt
			}
		}

		const progressRegistration = data.progressRegistration ? JSON.parse(data.progressRegistration): {};

		if (progressRegistration) {
			if (progressRegistration.attachment && progressRegistration.attachment.length > 0) {
				progressRegistration.attachment.forEach(function(data, index) {
					progressRegistration.attachment[index] = {
						fullPath: FileService.getFileUrl(progressRegistration.attachment[index].file),
						file: progressRegistration.attachment[index].file.replace("program_study/attachment/","")
					}
				});
			}
		}

		result['progressRegistration'] = progressRegistration ? progressRegistration : '';
		result['progressTest'] = data.progressTest ? JSON.parse(data.progressTest): '';
		result['progressAcceptance'] = data.progressAcceptance ? JSON.parse(data.progressAcceptance) : '';
        result['progressRemark'] = data.progressRemark ? data.progressRemark : '';
        
        result['progressCheck'] = {
            completed: progress[0],
            total: progress[1]
        }

		return success(result);
    }

    @Post('/history/transactions')
    async transactionHistory(@Body() input, @Req() req) {
        let datas;
		const allowedFilter = [];
		const allowedOrder = ['id'];
		const searchField = [];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
        if (!payloadValidation.status) return error(payloadValidation.message);
        
        const option = generateDefaultOption(input, {}, searchField);
        option['attributes'] = ['id', 'type', 'transactionNumber', 'bankProduct', 'vaNumber', 'paymentAmount', 'totalPrice', 'status', 'createdAt', 'paymentDate'];
        option['include'] = [
            {
                model: Admission,
				required: false,
				where: {
					deletedAt: null
				},
				include: [
                    {
                        model: ProgramStudy,
                        required: false,
                        where: {
                            deletedAt: null
                        },
                        attributes: ['id', 'registrationFee', 'registrationFeeDiscount', 'registrationFormFee', 'registrationFormFeeDiscount'],
                        include: [
                            {
                                model: University,
                                required: false,
                                where: {
                                    deletedAt: null
                                },
                                attributes: [
                                    'id',
                                    'name',
                                    'logo',
                                    'partner',
                                    'types',
                                    'area'
                                ]
                            }
                        ]
                    }
                ]
            },
            {
                model: Assessment,
                required: false,
				where: {
					deletedAt: null
				}
            }
        ];

        option['distinct'] = true;
        option['where']['userId'] = req.user.id;

        datas = await Transaction.findAndCountAll(option);

        const results = [];
		datas.rows.map(data => {
            let university = {};
            let studyProgram = {};
            let assessment = {};

            if (data.admission) {
                if  (data.admission.programStudy) {
                    studyProgram = {
                        id: data.admission.programStudy.id,
                        registrationFee: data.admission.programStudy.registrationFee,
                        registrationFeeDiscount: data.admission.programStudy.registrationFeeDiscount,
                        registrationFormFee: data.admission.programStudy.registrationFormFee,
                        registrationFormFeeDiscount: data.admission.programStudy.registrationFormFeeDiscount
                    }   
                    
                    if (data.admission.programStudy.university) {
                        university = {
                            id: data.admission.programStudy.university.id,
                            name: data.admission.programStudy.university.name,
                            logo: FileService.getFileUrl(data.admission.programStudy.university.logo),
                            partner: data.admission.programStudy.university.partner,
                            types: data.admission.programStudy.university.types,
                            area: data.admission.programStudy.university.area
                        } 
                    }
                }
            }

            if (data.assessment) {
                assessment = {
                    id: data.assessment.id,
                    hash: data.assessment.hash,
                    assessmentNo: data.assessment.assessmentNo,
                    name: data.assessment.name,
                    gender: data.assessment.gender,
                    dateOfBirth: data.assessment.dateOfBirth,
                    schoolName: data.assessment.schoolName,
                    schoolClass: data.assessment.schoolClass,
                    field: data.assessment.field,
                    hopes: data.assessment.hopes ? data.assessment.hopes : '',
                    status: data.assessment.status,
                    paymentStatus: data.assessment.paymentStatus,
                    createdAt: data.assessment.createdAt
                }
            }

			results.push({
                id: data.id,
                totalPrice: data.totalPrice,
                type: data.type,
                transactionNumber: data.transactionNumber,
                bankProduct: data.bankProduct,
                vaNumber: data.vaNumber,
                paymentDate: data.paymentDate,
                status: data.status,
                createdAt: data.createdAt,
                university: university,
                studyProgram: studyProgram,
                assessment: assessment
            });
        });
        
        return success(await generateResponseList(input, option, results, datas.count, false));
    }

}
