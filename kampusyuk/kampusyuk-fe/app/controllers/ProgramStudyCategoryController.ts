import {Body, Get, JsonController, Post, Req} from "@wavecore/routing-controllers";
import {ProgramStudyCategory} from "../common/model/ProgramStudyCategory";
import {ProgramStudy} from "../common/model/ProgramStudy";
import {checkPayload} from "../common/util/Validation";
import {error, generateDefaultOption, generateResponseList, success} from "@wavecore/core-node";
import {defaultValue} from "../common/util/CommonUtil";
import { FacultyCategory } from '../common/model/FacultyCategory';
import { Sequelize } from 'sequelize-typescript';
import { University } from '../common/model/University';

@JsonController("/program_study/category")
export class ProgramStudyCategoryController{
    @Get("/selection")
    async list(@Req() request: any){
        let datas;
        const filterCountry = request.query.countryId ? {countryId: request.query.countryId} : {};

        datas = await FacultyCategory.findAll({
            include:[{
                model:ProgramStudyCategory,
                where:{
                    deletedAt:null
                },
                include:[{
                    model:ProgramStudy,
                    where:{
                        deletedAt:null
                    },
                    include:[
                        {
                            attributes : ['id','countryId'],
                            model:University,
                            where: filterCountry
                        }
                    ]
                }]
            }],
            where:{
                deletedAt:null
            }
        });
        const results = [];
        datas.map((facultyCategory:FacultyCategory) => {
            const result={
                data:facultyCategory.id,
                label:defaultValue(facultyCategory.name),
                labelEn:defaultValue(facultyCategory.nameEn),
                universityCount:0
            };
            if(facultyCategory.programStudyCategories) {
                if(facultyCategory.programStudyCategories.length >0) {
                    result['children'] = [];
                    facultyCategory.programStudyCategories.map((programStudyCategory) => {
                        const universityList = [];
                        programStudyCategory.programStudies.map(programStudy=>{
                            if(universityList.indexOf(programStudy.universityId) === -1) universityList.push(programStudy.universityId);
                        });
                        result['children'].push({
                            data: programStudyCategory.id,
                            label: defaultValue(programStudyCategory.name),
                            labelEn: defaultValue(programStudyCategory.nameEn),
                            universityCount: universityList.length
                        });
                        result['universityCount'] += universityList.length;
                    });
                }
            }
            results.push(result);
        });

        return success(results);
    }
}
