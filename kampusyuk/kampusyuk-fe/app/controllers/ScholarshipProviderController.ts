import {Get, JsonController} from "@wavecore/routing-controllers";
import {ScholarshipProvider} from "../common/model/ScholarshipProvider";
import {success} from "@wavecore/core-node";

@JsonController("/scholarship/provider")
export class ScholarshipProviderController{
    @Get("/selection")
    async selection(){
        const scholarshipProviders=await ScholarshipProvider.findAll({
            where:{
                deletedAt:null
            }
        });
        const result=[];
        scholarshipProviders.map(scholarshipProvider=>{
            result.push({
                data:scholarshipProvider.id,
                label:scholarshipProvider.name
            })
        });
        return success(result);
    }
}
