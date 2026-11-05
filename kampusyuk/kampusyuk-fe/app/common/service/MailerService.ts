import * as moment from 'moment';
import { Admission } from '../model/Admission';
import { ProgramStudy } from '../model/ProgramStudy';
import { Transaction } from '../model/Transaction';
import { University } from '../model/University';
import { EmailService } from './EmailService';

export class MailerService {
	static sendTransactionExpired(transaction: Transaction) {
		Admission.findByPk(transaction.admissionId, {
			include: [{
				model: ProgramStudy,
				attributes: ['id', 'name'],
				include: [{
					model: University,
					attributes: ['id', 'name']
				}]
			}]
		})
			.then(admission => {
				if (admission) {
					EmailService.sendEmail({
						to: admission.email,
						subject: `Pembayaran untuk ${admission.programStudy?.university?.name} Dibatalkan`,
						html: `
							<p> Dear ${admission.name} </p>, <br/>
							Pendaftaran untuk ${admission.programStudy?.university?.name} di website Kampusyuk telah dibatalkan karena kami belum menerima pembayaran Anda. Detail pembelian formulir Anda adalah sebagai berikut:
							
							<ul> 
								<li>No. Transaksi: ${transaction.transactionNumber}</li>
								<li>Tanggal Transaksi: ${moment(transaction.createdAt).locale('id').format('DD MMMM YYYY')}</li>
								<li>Nama: ${admission.name}</li>
								<li>Email: ${admission.email}</li>
								<li>Product: Pembayaran Formulir ${admission.programStudy?.university?.name}</li>
								<li>Jurusan: ${admission.programStudy?.name}</li>
								<li>Nominal Pembayaran: ${transaction.totalPrice}</li>
							</ul>
							
							<p>Silahkan mendaftar kembali di universitas favorit Anda dan jangan lupa untuk menyelesaikan pembayaran dalam waktu 24 jam setelah pembelian formulir dilakukan. Terima kasih.</p>
							
							<p>Jika ada pertanyaan, Anda dapat menghubungi kami dengan mengirimkan email ke hello@kampusyuk.com atau melalui telepon/whatsapp ke nomor +62 813-8630-4313.</p>
						`
					})
				}
			})
	}

	static sendTransactionPaid(transaction: Transaction) {
		Admission.findByPk(transaction.admissionId, {
			include: [{
				model: ProgramStudy,
				attributes: ['id', 'name'],
				include: [{
					model: University,
					attributes: ['id', 'name']
				}]
			}]
		})
			.then(admission => {
				if (admission) {
					EmailService.sendEmail({
						to: admission.email,
						subject: `Pembayaran Formulir Pendaftaran untuk ${admission.programStudy?.university?.name} Berhasil`,
						html: `
							<p> Dear ${admission.name} </p>, <br/>
							Terima kasih, kami telah menerima pembayaran untuk pembelian formulir pendaftaran ${admission.programStudy?.university?.name} di website Kampusyuk dengan detail sebagai berikut:
							
							<ul> 
								<li>No. Transaksi: ${transaction.transactionNumber}</li>
								<li>Tanggal Transaksi: ${moment(transaction.paymentDate).locale('id').format('DD MMMM YYYY')}</li>
								<li>Nama: ${admission.name}</li>
								<li>Email: ${admission.email}</li>
								<li>Product: Pembayaran Formulir ${admission.programStudy?.university?.name}</li>
								<li>Jurusan: ${admission.programStudy?.name}</li>
								<li>Nominal Pembayaran: ${transaction.totalPrice}</li>
							</ul>
							
							<p>Simpan detail pembayaran ini sebagai bukti pembayaran berhasil Anda. Tim kami akan segera menghubungi Anda.</p>
							
							<p>Jika ada pertanyaan, Anda dapat menghubungi kami dengan mengirimkan email ke hello@kampusyuk.com atau melalui telepon/whatsapp ke nomor +62 813-8630-4313.</p>
						`
					})
				}
			})
	}
}
