import { error, errorCode, MongoDBService, success } from '@wavecore/core-node';
import { Get, JsonController, Param } from '@wavecore/routing-controllers';
import { Constant } from '../common/constant/Constant';
import { EspayConstant } from '../common/constant/EspayConstant';
import { Espay } from '../common/model/mongo/Espay';
import { Transaction } from '../common/model/Transaction';
import { EspayService } from '../common/service/EspayService';
import { ErrorCode } from '../common/util/Error';

@JsonController('/transaction')
export class TransactionController {

  @Get('/check/:id')
  async checkTransaction(@Param('id') id) {
    const transaction = await Transaction.findByPk(id);
    if (!transaction) {
      return error('Transaction not found');
    }

    if (transaction.status === Constant.TRANSACTION_STATUS_PAID) {
      return errorCode(ErrorCode.TRANSACTION_PAID);
    }

    try {
      const paymentStatus = await EspayService.checkPaymentStatus({
        order_id: transaction.transactionNumber,
        is_paymentnotif: 'N'
      });

      if (paymentStatus.error_code !== '0000') {
        return errorCode(ErrorCode.ESPAY_ERROR)
      }

      if (paymentStatus.tx_status === 'SP' && Number(paymentStatus.amount) >= Number(transaction.totalPrice)) {
        await transaction.update({
          status: Constant.TRANSACTION_STATUS_PAID,
          espayStatus: EspayConstant.TX_STATUS[paymentStatus.tx_status],
          espayReason: paymentStatus.tx_reason,
          paymentRef: paymentStatus.payment_ref
        });

        return errorCode(ErrorCode.TRANSACTION_PAID);
      }

      return success(true)
    } catch (e) {

      new MongoDBService(Espay).getModel().create({
        type: EspayConstant.LOG_TYPE_ESPAY_EXCEPTION_ERROR,
        transactionNumber: transaction.transactionNumber,
        logs: {
          on: 'TransactionController:checkTransaction',
          exceptions: JSON.stringify(e)
        }
      });

      await transaction.update({
        status: Constant.TRANSACTION_STATUS_FAILED
      });
    }
  }
}

