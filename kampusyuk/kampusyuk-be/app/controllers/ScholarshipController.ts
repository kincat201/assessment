import { error, generateDefaultMappingRow, generateDefaultOption, generateResponseList, success } from '@wavecore/core-node';
import { Body, Delete, Get, JsonController, Param, Patch, Post, Put, Req } from '@wavecore/routing-controllers';
import { Constant } from '../common/constant/Constant';
import { Scholarship } from '../common/model/Scholarship';
import { ScholarshipProvider } from '../common/model/ScholarshipProvider';
import { ScholarshipStudyLevel } from '../common/model/ScholarshipStudyLevel';
import { ScholarshipUniversity } from '../common/model/ScholarshipUniversity';
import { checkPayload, validateInput } from '../common/util/Validation';
import { University } from '../common/model/University';
import { FileService } from '../common/service/FileService';
import { Op } from 'sequelize';

@JsonController()
export class ScholarshipController{
	@Post("/scholarship/list")
	async getScholarshipList(@Body() input:any){
		let datas;
		const allowedFilter = ['search','scholarshipProviderId','types','area','status'];
		const allowedOrder = ['id', 'name','provider','types','area','deadline'];
		const searchField = ['name','amount'];
		const payloadValidation = await checkPayload(input, allowedFilter, allowedOrder);
		if (!payloadValidation.status) return error(payloadValidation.message);
		const option = generateDefaultOption(input, {}, searchField);
		option['attributes']=[
			"id",
			"name",
			"types",
			"area",
			"deadline",
			"amount",
			"amountTypes",
			"amountText"
		];
		option['include'] = [
			{
				model: ScholarshipProvider,
				attributes: ['id','name','logo']
			}
		];
		option['distinct'] = true;
		option['where']['deletedAt'] = null;
		datas = await Scholarship.findAndCountAll(option);
		const results = [];
		datas.rows.map(data=>{
			results.push({
				id:data.id,
				name: data.name,
				providerName: data.scholarshipProvider.name,
				types:Constant.SCHOLARSHIP_TYPES[data.types],
				area:Constant.AREA_LIST[data.area],
				deadline:data.deadline,
				amount:data.amount,
				amountTypes:data.amountTypes,
				amountText:data.amountText,
			});
		});
		return success(await generateResponseList(input, option, results, datas.count, false));
	}

	@Get('/scholarship/details/:id')
	async getScholarshipDetails( @Param('id') id: number, @Req() req: any ) {
		let data;
		let result;
		const option = {};
		option['where'] = {
			'id' : id,
			deletedAt : { [Op.eq] : null }
		};
		option['include'] = [
			{
				model: ScholarshipStudyLevel,
				attributes: ['id','level']
			},
			{
				model: ScholarshipUniversity,
				attributes: ['id','universityId'],
				include:[University]
			}
		];
		data = await Scholarship.findOne(option);
		if(!data) return error('Scholarship not found');
		if(!data.content){
			data.content="";
		}
		result = await generateDefaultMappingRow(data);
		let banner=null;
		if(data.banner){
			banner=data.banner.split("/");
			banner=banner[banner.length-1];
		}
		result.banner=(data.banner)?{
			image:banner,
			fullPath:FileService.getFileUrl(data.banner)
		}:null;
		result['scholarshipUniversities']=[];
		for (const scholarshipUniversity of data.scholarshipUnivercities) {
			result['scholarshipUniversities'].push({
				id:scholarshipUniversity.id,
				name:scholarshipUniversity.university.name,
				univercityId:scholarshipUniversity.universityId,
			});
		}

		result['scholarshipStudyLevels']=[];
		for (const scholarshipStudyLevel of data.scholarshipStudyLevels) {
			result['scholarshipStudyLevels'].push({
				id:scholarshipStudyLevel.id,
				level:scholarshipStudyLevel.level,
			});
		}
		return success(result);
	}

	@Put('/scholarship/create')
	async scholarshipCreate(@Body() input: any, @Req() req: any) {
		const check = await validateInput(input, {
			metaTitle: 'string',
			metaDescription: 'string',
			scholarshipProviderId: 'number',
			name: 'string',
			area: 'string',
			types: 'string',
			banner: 'string',
			amountText: 'string',
			deadline: 'string',
			status: 'string',
			studyLevel: ['string'],
			universities: ['number'],
			content: 'string'
		});
		if(!check.status) return error(check.message);
		if(input.banner){
			input.banner=FileService.move(input.banner,Constant.IMAGE_PATH.SCHOLARSHIP_BANNER);
		}
		const scholarship = await Scholarship.create(input);
		if(input.studyLevel){
			input.studyLevel.map(level=>{
				ScholarshipStudyLevel.create({
					'level' : level,
					'scholarshipId' : scholarship.id
				})
			});
		}

		if(input.universities){
			input.universities.map(university=>{
				ScholarshipUniversity.create({
					'universityId' : university,
					'scholarshipId' : scholarship.id
				})
			});
		}

		return success('success create scholarship');
	}

	@Patch('/scholarship/update/:id')
	async scholarshipUpdate(@Body() input: any, @Req() req: any, @Param('id') id: number) {
		const check = await validateInput(input, {
			scholarshipProviderId: 'number',
			metaTitle: 'string',
			metaDescription: 'string',
			name: 'string',
			area: 'string',
			types: 'string',
			amountText: 'string',
			deadline: 'string',
			status: 'string',
			studyLevel: ['string'],
			universities: ['number'],
			content: 'string'
		});
		if(!check.status) return error(check.message);
		const scholarship = await Scholarship.findOne({where:{'id':id}});
		if(!scholarship) return error('scholarship not found!');

		if(input.banner && input.banner !== scholarship.banner.replace(Constant.IMAGE_PATH.SCHOLARSHIP_BANNER+'/','')){
			input.banner=FileService.move(input.banner,Constant.IMAGE_PATH.SCHOLARSHIP_BANNER);
		} else {
			delete input.banner;
		}

		scholarship.update(input,{where:{'id':id}});

		if(input.studyLevel){
			await ScholarshipStudyLevel.destroy({where:{'scholarshipId':id}});
			input.studyLevel.map(level=>{
				ScholarshipStudyLevel.create({
					'level' : level,
					'scholarshipId' : scholarship.id
				})
			});
		}

		if(input.universities){
			await ScholarshipUniversity.destroy({where:{'scholarshipId':id}});
			input.universities.map(university=>{
				ScholarshipUniversity.create({
					'universityId' : university,
					'scholarshipId' : scholarship.id
				})
			});
		}
		return success('success update scholarship');
	}

	@Delete('/scholarship/delete/:id')
	async scholarshipDelete(@Param('id') id: number, @Req() req: any) {
		const scholarship = await Scholarship.findOne({where:{ 'id' : id }});
		if(!scholarship) return error('scholarship not found');
		scholarship.deletedAt = new Date();
		scholarship.deletedBy = req.user.id;
		scholarship.save();

		return success('success delete scholarship');
	}
}
