import {
	CoreSequelize,
	error,
	generateDefaultMappingRow,
	generateDefaultOption,
	generateResponseList,
	success
} from '@wavecore/core-node';
import {Body, Get, JsonController, Param, Post, Req} from '@wavecore/routing-controllers';
import * as envData from '../../config/Env.json';
import {Constant} from '../common/constant/Constant';
import {Article} from '../common/model/Article';
import {ValidatorService} from "../common/service/ValidatorService";
import {defaultValue} from '../common/util/CommonUtil';
import { manualGenerateFilter, manualGenerateOrder } from '../common/util/ListUtil';
import {checkPayload} from '../common/util/Validation';
import { Scholarship } from '../common/model/Scholarship';
import { ScholarshipProvider } from '../common/model/ScholarshipProvider';
import { ScholarshipStudyLevel } from '../common/model/ScholarshipStudyLevel';
import {FindOptions, Op, QueryTypes} from "sequelize";
import {ManipulatorService} from "../common/service/ManipulatorService";
import {FileService} from "../common/service/FileService";
import {ScholarshipUniversity} from "../common/model/ScholarshipUniversity";
import {University} from "../common/model/University";
import {System} from "../common/util/System";

@JsonController()
export class ScholarShipController {
	@Post('/scholarship/list')
	async getArticleList(@Body() input: any, @Req() req: any) {
		const option = generateDefaultOption(input, {});
		const results = [];

		const allowedFilter = ['search','studyLevel','amount','amountText','area','types','scholarshipProviderId','universityId'];
		const allowedOrder = ['createdAt', 'id', 'name'];
		const multipleFilter = ['types','scholarshipProviderId'];
		const searchField = ["name","amount"];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);

		if(input.filter.universityId){
			input.filter['scholarshipUniversity.universityId']=input.filter.universityId;
			allowedFilter.push("scholarshipUniversity.universityId");
			multipleFilter.push('scholarshipUniversity.universityId');
			delete input.filter.universityId;
		}

		if(input.filter.studyLevel){
			input.filter['scholarshipStudyLevel.level']=input.filter.studyLevel;
			allowedFilter.push("scholarshipStudyLevel.level");
			multipleFilter.push("scholarshipStudyLevel.level");
			delete input.filter.studyLevel;
		}

		const filterArray = manualGenerateFilter(input, 'scholarship', allowedFilter, searchField
			, multipleFilter, {amount:"<="});
		filterArray.push("scholarship.status = '"+Constant.SCHOLARSHIP_STATUS_ACTIVE+"'");
		if(input.filter.studyLevel && input.filter.studyLevel.length > 0){
			filterArray.push("scholarshipStudyLevel.level IN ('"+input.filter.studyLevel.join(',')+"')");
		}
		const filterCondition = filterArray.length > 0 ? ` WHERE ` + filterArray.join(' AND ') : '';
		const orderCondition = manualGenerateOrder(input, 'scholarship', allowedOrder);

		const baseQuery=`FROM scholarship LEFT JOIN scholarshipProvider ON scholarship.scholarshipProviderId = scholarshipProvider.id ` +
			`LEFT JOIN scholarshipStudyLevel ON scholarshipStudyLevel.scholarshipId = scholarship.id ` +
			`LEFT JOIN scholarshipUniversity ON scholarshipUniversity.scholarshipId = scholarship.id`+
			filterCondition +
			` GROUP BY scholarship.id ORDER BY ` +
			orderCondition;

		const limitOffset=
			` LIMIT ` +
			option['limit'] +
			` OFFSET ` +
			option['offset'];

		const query =
			`SELECT scholarship.id, scholarship.scholarshipProviderId, scholarship.name, scholarship.types, 
			 scholarship.amount, scholarship.amountText, scholarship.amountTypes, scholarship.deadline,  scholarship.banner,
			 scholarshipProvider.name as providerName, scholarshipProvider.logo as providerLogo ` +
			baseQuery+limitOffset;

		const countQuery=
			`SELECT COUNT(scholarship.id) `+
			baseQuery;

		const totalData=await CoreSequelize().query(countQuery,{ type: QueryTypes.SELECT });

		await CoreSequelize()
			.query(query)
			.then(([queryResult, metadata]) => {
				if (queryResult.length > 0) {
					queryResult.map(result => {
						const data = {
							id: result.id,
							slug: ManipulatorService.toSlugFormat(result.name,result.id),
							name: defaultValue(result.name),
							types: Constant.SCHOLARSHIP_TYPES[result.types],
							amountTypes: result.amountTypes,
							amount: result.amount,
							amountText: result.amountText,
							banner: (result.banner)?FileService.getFileUrl(result.banner):null,
							deadline: defaultValue(result.deadline),
							providerName: defaultValue(result.providerName),
							providerLogo: result.providerLogo ? FileService.getFileUrl(result.providerLogo,''):null,
						};
						results.push(data);
					});
				}
			});

		return success(await generateResponseList(input, option, results, totalData.length));
	}

	@Get('/scholarShip/details/:id')
	async getArticleDetails(@Param('id') id: string, @Req() req: any) {
		const scholarshipId=ManipulatorService.slugToId(id);
		if(!scholarshipId){
			return error("wrong id format");
		}
		let data;
		let result;
		const option = {};
		option['where'] = {
			id:scholarshipId,
			status:Constant.SCHOLARSHIP_STATUS_ACTIVE
		};
		option['include'] = [
			{
				model: ScholarshipProvider,
				attributes: ['name','logo']
			},
			{
				model: ScholarshipStudyLevel,
				attributes: ['id','level']
			},
			{
				model: ScholarshipUniversity,
				include:[University]
			}
		];
		data = await Scholarship.findOne(option);

		if (!data) return error('Scholarship not found');

		result = await generateDefaultMappingRow(data);

		result['university']=[];

		result['banner']=(data.banner)?FileService.getFileUrl(data.banner):null;

		if(data.scholarshipUnivercities) {
			data.scholarshipUnivercities.map(scholarshipUniversity => {
				if (scholarshipUniversity.university) {
					result['university'].push({
						id: scholarshipUniversity.university.id,
						name: scholarshipUniversity.university.name,
						registerLink: scholarshipUniversity.university.registerLink,
					});
				}
			});
		}

		result['slug'] = ManipulatorService.toSlugFormat(data.name,data.id);
		result['types'] =  Constant.SCHOLARSHIP_TYPES[data.types];
		result['providerName'] = defaultValue(data.scholarshipProvider.name);
		result['providerLogo'] = data.scholarshipProvider.logo ? FileService.getFileUrl(data.scholarshipProvider.logo) : null;
		
		return success(result);
	}

	@Post("/scholarship/newest/list")
	async popularityList(@Body() input:any){
		const options:FindOptions={
			include:[ScholarshipProvider],
			where:{
				deadline:{
					[Op.gt]:System.getDate()
				},
				status: Constant.STATUS_PUBLISH,
				deletedAt:null
			},
			order:[["createdAt","DESC"]]
		};
		if(input) {
			if (input.limit) {
				options.limit=input.limit;
			}
		}
		const instance=await Scholarship.findAll(options);
		const result=[];
		instance.map(value=>{
			result.push({
				id: value.id,
				slug: ManipulatorService.toSlugFormat(value.name,value.id.toString()),
				name: defaultValue(value.name),
				types: Constant.SCHOLARSHIP_TYPES[value.types],
				amountTypes: value.amountTypes,
				amount: value.amount,
				amountText: value.amountText,
				banner: (value.banner)?FileService.getFileUrl(value.banner):null,
				deadline: defaultValue(value.deadline),
				providerName: (value.scholarshipProvider)?defaultValue(value.scholarshipProvider.name):"",
				providerLogo: value.scholarshipProvider ? FileService.getFileUrl(value.scholarshipProvider.logo,''):null,
			});
		});
		return success(result);
	}
}
