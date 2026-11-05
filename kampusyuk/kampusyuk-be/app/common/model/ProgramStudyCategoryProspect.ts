import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { ProgramStudyCategory } from './ProgramStudyCategory';
import { Prospect } from './Prospect';

@Table({ tableName: 'programStudyCategoryProspect' })
export class ProgramStudyCategoryProspect extends BaseSequelizeModel {
	@ForeignKey(() => ProgramStudyCategory)
	@Column
	programStudyCategoryId : number

	@ForeignKey(() => Prospect)
	@Column
	prospectId : number

	@Column
	createdBy : number

	@Column
	updatedBy : number

	@Column
	deletedBy : number

	@Column
	deletedAt : Date

	@BelongsTo(() => ProgramStudyCategory)
	programStudyCategory: ProgramStudyCategory;

	@BelongsTo(() => Prospect)
	prospect: Prospect;
}
