import { error } from '@wavecore/core-node';
import { Constant } from '../constant/Constant';

export const ErrorCode = {
	"INVALID_USER_PASSWORD":{code: '1001', label: 'Email atau password salah'},
	"INVALID_PHONE_NUMBER":{code: '1004', label: 'Nomor Telepon salah'},
	"INVALID_NAME":{code: '1005', label: 'Nama Salah'},
	"INVALID_OLD_PASSWORD":{code: '1006', label: 'Password Lama Salah'},
	"INVALID_CONFIRM_PASSWORD":{code: '1007', label: 'Konfirmasi Password Salah'},

	"TRANSACTION_EXPIRED": {code: '1008', label: 'Transaction Expired'},
	"TRANSACTION_PAID": {code: '1009', label: 'Transaction Already Paid'},

	"ESPAY_ERROR": {code: '1010', label: 'Error komunikasi dengan mitra'},
}
export function inputFormatError(input:string){
	return error(Constant.RETURN_MESSAGE.ERROR.WRONG_FORMAT_GENERAL+input);
}
