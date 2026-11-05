import {Get, JsonController} from '@wavecore/routing-controllers';
import {success} from '@wavecore/core-node';
import {FacultyCategory} from "../common/model/FacultyCategory";
import {Faculty} from "../common/model/Faculty";
import {defaultValue} from "../common/util/CommonUtil";
import { ProgramStudyCategory } from '../common/model/ProgramStudyCategory';
import { ProgramStudy } from '../common/model/ProgramStudy';

@JsonController('/faculty/category')
export class FacultyCategoryController {
	@Get('/selection')
	async selection() {
		let datas;

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
					}
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
				programStudyCount:0
			};
			if(facultyCategory.programStudyCategories) {
				if(facultyCategory.programStudyCategories.length >0) {
					result['children'] = [];
					facultyCategory.programStudyCategories.map((programStudyCategory) => {
						result['children'].push({
							data: programStudyCategory.id,
							label: defaultValue(programStudyCategory.name),
							labelEn: defaultValue(programStudyCategory.nameEn),
							programStudyCount: programStudyCategory.programStudies.length
						});
						result['programStudyCount'] += programStudyCategory.programStudies.length;
					});
				}
			}
			results.push(result);
		});

		return success(results);
	}
}
