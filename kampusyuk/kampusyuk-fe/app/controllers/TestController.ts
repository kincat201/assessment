import {GetForTesting} from "../common/decorator/TesterDecorator";
import {Article} from "../common/model/Article";
import {ArticleTag} from "../common/model/ArticleTag";
import {success} from "@wavecore/core-node";
import {JsonController} from "@wavecore/routing-controllers";
import {ValidatorService} from "../common/service/ValidatorService";

@JsonController()
export class TestController{
    @GetForTesting("/test/validator/tags")
    async tagsValidator(){
        console.log(ValidatorService.verifyTags("a,b,c,d,e,f"));
        console.log(ValidatorService.verifyTags("a,$,C,@,&"));
    }

    @GetForTesting("/test/sequelize/manyToMany/search")
    async sequelizeManyToManySearch(){
        const article=await Article.findAll({
            include:[{
                model:ArticleTag,
                where:{
                    tag:"wkkwkw"
                }
            }]
        });
        return success(article);
    }
}
