import {Env, error, errorCode, success} from '@wavecore/core-node';
import {Body, JsonController, Post, Req} from '@wavecore/routing-controllers';
import axios from 'axios';
import * as bcrypt from 'bcrypt';
import {OAuth2Client} from 'google-auth-library';
import * as jwt from 'jsonwebtoken';
import {Constant} from "../common/constant/Constant";
import {User} from '../common/model/User';
import {AuthService} from "../common/service/AuthService";
import {TokenService} from "../common/service/TokenService";
import {ValidatorService} from "../common/service/ValidatorService";
import { defaultValue, generatePasswordHash } from '../common/util/CommonUtil';
import {ErrorCode} from '../common/util/Error';
import {System} from "../common/util/System";
import {validateInput} from '../common/util/Validation';

@JsonController("/auth")
export class AuthController {

	@Post("/login")
	async login(@Body() data: any, @Req() request: any) {
		const email=data.email;
		const password=data.password;

		if(!ValidatorService.isEmailAndPassword(email,password)){
			return errorCode(ErrorCode.INVALID_USER_PASSWORD)
		}

		const user = await User.getValidStudentAndAcl(email,password);

		if(!user){
			return errorCode(ErrorCode.INVALID_USER_PASSWORD);
		}

		if (user.status === Constant.USER_STATUS_INACTIVE) {
			if(user.lastLogin){
				return error("Maaf akun Anda telah di-nonaktifkan, silahkan hubungi admin@contrib.id");
			}else{
				return error("Akun belum diverifikasi. Silahkan check email anda.");
			}
		}
		const token = jwt.sign( { id:user.id, role:user.role, email: user.email, user}, Env().jwtSecret);

		user.lastLogin = System.getTime().toDate();
		await user.save();

		const responseData = {
			token,
			id:user.id,
			name:user.name,
			email: user.email,
			phone: user.phone,
			schoolFrom: defaultValue(user.student.schoolFrom),
			role:user.role,
			acl: user.getAcl()
		};

		return success(responseData);
	}

	@Post("/register")
	async register(@Body() input:any){
		const email = input.email;
		const name = input.name;
		const password = input.password;
		const password_confirmation = input.password_confirmation;

		const checkEmail = await User.findOne({
			where: {
				email: email
			}
		});

		if (checkEmail !== null) return error('Email sudah terdaftar.');

		if (!ValidatorService.isEmailAndPassword(email,password)){
			return errorCode(ErrorCode.INVALID_USER_PASSWORD);
		}
		
		if (!ValidatorService.isName(name)) {
			return errorCode(ErrorCode.INVALID_NAME);
		}

		if (password === null) return error('Password tidak boleh kosong.');
		if (password !== password_confirmation) return error('Konfirmasi password salah.');

		const verificationToken = TokenService.generateToken(120);

		const user = await User.createStudent({
			email,
			password: generatePasswordHash(password),
			name,
			verificationToken,
			status: Constant.USER_STATUS_INACTIVE
		});

		await AuthService.sendVerificationEmail(email);
		
		return success(Constant.RETURN_MESSAGE.SUCCESS.REGISTRATION_SUCCESS);
	}

	@Post("/verification")
	async activation(@Body() input:any) { 
		const check = await validateInput(input, {
			userId: 'number',
			verificationToken: 'string'
		});

		if(!check.status) return error(check.message);

		const user = await User.findOne({
			where: {
				id: input.userId,
				verificationToken: input.verificationToken
			}
		});

		if (user === null) return error('Maaf, verifikasi belum berhasil. Mohon hubungi support@kampusyuk.com.');
		if (user.status && user.status === Constant.STATUS_ACTIVE) return error('Akun sudah aktif sebelumnya.');

		user.verificationAt = System.getTime().toDate();
		user.status = Constant.USER_STATUS_ACTIVE;
		user.save();

		await AuthService.sendSuccessRegister(user.email);

		return success('Selamat, Verifikasi anda telah berhasil, silahkan masukkan kembali username dan password anda yang telah terdaftar.');
	}

	@Post("/reset-request")
	async resetRequest(@Body() input:any){
		if(!input){
			return error("body is required!");
		}
		if(!ValidatorService.isEmail(input.email)){
			return error("Format email salah!");
		}

		let user;
		user  = await User.findOne({where: {'email': input.email}});

		if (user === null) return error("Email tidak ditemukan.");
		if (user.status === Constant.USER_STATUS_INACTIVE) return error("Akun belum aktif.")

		const resetToken = TokenService.generateToken(120);

		user.resetToken = resetToken;
		user.save();

		AuthService.sendResetEmail(user.id, resetToken);
		return success("Silahkan periksa email anda untuk link reset password!");
	}

	@Post("/reset-password")
	async resetPassword(@Body() input:any) {
		const check = await validateInput(input, {
			userId: 'number',
			resetToken: 'string',
			password: "string",
			passwordConfirmation: "string"
		});

		if(!check.status) return error(check.message);

		const user = await User.findOne({
			where: {
				id: input.userId,
				resetToken: input.resetToken
			}
		});

		if (user === null) return error('Token Salah.');
		if (user.status === Constant.USER_STATUS_INACTIVE) return error("Akun perlu di aktifasi sebelumnya.");
		if (input.password !== input.passwordConfirmation) return error('Password konfirmasi tidak cocok.');

		user.password = await bcrypt.hash(input.password, 10);
		user.lastResetAt = System.getTime().toDate();
		user.resetToken = null;
		user.save();

		return success('Password berhasil diubah.');
	}

	@Post("/google")
	async googleAuth(@Body() input:any) {
		const client_id = Env().googleClientId;
		
		const result = await this.googleVerify(input.token, client_id);
		const user_id = result.sub;
		const user_email = result.email;
		const user_name = result.name;
		
		const user = await User.getValidSocialiteStudentAndAcl(user_email);

		if (!user) {

			const checkEmail = await User.findOne({
				where: {
					email: user_email
				}
			});
	
			if (checkEmail !== null) return error('Email sudah terdaftar.');

			await User.createStudent({
				socialiteId : user_id,
				email: user_email,
				password: generatePasswordHash(''),
				name: user_name,
				socialiteType: Constant.SOCIALITE_TYPE_GOOGLE,
			});
		}

		const loginUser =  await User.getValidSocialiteStudentAndAcl(user_email);

		const token = jwt.sign( { id:loginUser.id, role:loginUser.role, email: loginUser.email}, Env().jwtSecret);

		loginUser.lastLogin = System.getTime().toDate();
		await loginUser.save();

		const responseData = {
			token,
			id: loginUser.id,
			name: loginUser.name,
			email: loginUser.email,
			phone: loginUser.phone,
			schoolFrom: loginUser.student ? defaultValue(loginUser.student.schoolFrom) : "",
			role: loginUser.role,
			acl: loginUser.getAcl()
		};

		return success(responseData);
	}

	async googleVerify(token: string, client_id: string) {
		const client = new OAuth2Client(client_id);

		const ticket = await client.verifyIdToken({
			idToken: token,
			audience: client_id,
		});

		const payload = ticket.getPayload();

		return payload;
	}

	@Post("/facebook")
	async facebookAuth(@Body() input:any) {
		const accessToken = input.accessToken;

		const result = await this.facebookVerifiy(accessToken);
		const user_id = result.id;
		const user_email = result.email;
		const user_name = result.name;
		
		const user = await User.getValidSocialiteStudentAndAcl(user_email);

		if (!user) {
			const checkEmail = await User.findOne({
				where: {
					email: user_email
				}
			});

			if (checkEmail !== null) return error('Email sudah terdaftar.');

			await User.createStudent({
				socialiteId : user_id,
				email: user_email,
				password: generatePasswordHash(''),
				name: user_name,
				socialiteType: Constant.SOCIALITE_TYPE_FACEBOOK,
			});
		}

		const loginUser =  await User.getValidSocialiteStudentAndAcl(user_email);

		const token = jwt.sign( { id:loginUser.id, role:loginUser.role, email: loginUser.email}, Env().jwtSecret);

		loginUser.lastLogin = System.getTime().toDate();
		await loginUser.save();

		const responseData = {
			token,
			id: loginUser.id,
			name: loginUser.name,
			email: loginUser.email,
			phone: loginUser.phone,
			schoolFrom: loginUser.student ? defaultValue(loginUser.student.schoolFrom) : "",
			role: loginUser.role,
			acl: loginUser.getAcl()
		};

		return success(responseData);
	}

	async facebookVerifiy(accessToken: string) {
		const data = await axios({
			url: 'https://graph.facebook.com/me',
			method: 'get',
			params: {
			fields: ['id', 'email', 'name'].join(','),
				access_token: accessToken,
			}
		});

		return data.data;
	}
}


