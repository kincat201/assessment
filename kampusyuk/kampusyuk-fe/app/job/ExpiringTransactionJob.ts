import * as moment from 'moment';
import * as schedule from "node-schedule";
import { default as sequelize, Op } from 'sequelize';
import { Constant } from '../common/constant/Constant';
import { Transaction } from '../common/model/Transaction';
import { MailerService } from '../common/service/MailerService';

export class ExpiringTransactionJob {
	static async init() {
		schedule.scheduleJob('0 12 * * *', () => {
			this.execute();
		});
		this.execute();
	}

	static async execute() {
		const expiredToday = sequelize.where(sequelize.fn('datediff', sequelize.col('expiredAt'), moment().format("YYYY-MM-DD")), {
			[Op.and]: [
				{ [Op.eq]: 0 },
			]
		});

		const transactions = await Transaction.findAll({
			where: {
				status: Constant.TRANSACTION_STATUS_UNPAID,
				expiredAt: expiredToday
			}
		});

		for (const transaction of transactions) {
			if (moment(transaction.expiredAt).isBefore(moment())) {
				await this.expiringTransaction(transaction);
			} else {
				schedule.scheduleJob(transaction.expiredAt, async () => await this.expiringTransaction(transaction));
			}
		}
	}

	static async expiringTransaction(transaction: Transaction) {
		const transactionItem = await Transaction.findByPk(transaction.id);
		if (transactionItem && transactionItem.status === Constant.TRANSACTION_STATUS_UNPAID) {
			await transactionItem.update({
				status: Constant.TRANSACTION_STATUS_EXPIRED
			});

			MailerService.sendTransactionExpired(transaction);
		}
	}
}