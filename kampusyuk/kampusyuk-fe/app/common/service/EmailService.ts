import * as nodemailer from 'nodemailer';
import { Env } from '@wavecore/core-node';

export class EmailService {
	private static transporter() {
		return nodemailer.createTransport({
			host: Env().mail.host,
			port: Env().mail.port,
			secure: Env().mail.secure,
			auth: {
				user: Env().mail.auth.user,
				pass: Env().mail.auth.pass
			}
		});
	}

	static sendEmail(options: nodemailer.SendMailOptions) {
		this.transporter().sendMail({
			from: Env().fromEmailAddress,
			to: options.to,
			subject: options.subject,
			html: options.html
		});
	}

	static sendEmailWithCc(options) {
		this.transporter().sendMail({
			from: Env().fromEmailAddress,
			to: options.to,
			cc: options.cc,
			subject: options.subject,
			html: options.html
		});
	}
}

