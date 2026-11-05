import { BaseSequelizeModel } from '@wavecore/core-node';
import { BelongsTo, Column, ForeignKey, Table } from 'sequelize-typescript';
import { Admission } from './Admission';
import { Assessment } from './Assessment';
import { User } from './User';

@Table({ tableName: 'transaction' })
export class Transaction extends BaseSequelizeModel {

	@ForeignKey(() => User)
	@Column
	userId: number;

	@ForeignKey(() => Admission)
	@Column
	admissionId: number;

	@ForeignKey(() => Assessment)
	@Column
	assessmentId: number;

	@Column
	type: string;

	@Column
	totalPrice: number;

	@Column
	transactionNumber: string;

	@Column
	bankProduct: string;

	@Column
	vaNumber: string;

	@Column
	paymentAmount: number;

	@Column
	paymentDate: string;

	@Column
	paymentRef: string;

	@Column
	status: string;

	@Column
	expiredAt: string;

	@Column
	espayStatus: string;

	@Column
	espayReason: string;

	@BelongsTo(() => User)
	user: User;

	@BelongsTo(() => Admission)
	admission: Admission;

	@BelongsTo(() => Assessment)
	assessment: Assessment;

	static async findByTransactionNumber(transactionNumber) {
		return Transaction.findOne({
			where: {
				transactionNumber
			}
		})
	}
}
