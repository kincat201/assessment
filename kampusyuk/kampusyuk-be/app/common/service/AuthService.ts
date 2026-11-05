import { Env } from '@wavecore/core-node';
import { EmailService } from "./EmailService";
import { User } from '../model/User';

export class AuthService {
    static async sendVerificationEmail(email:string) {
        const user = await User.findOne({
            where:{
                email: email
            }
        });

        const verificationUrl = Env().publicUrl + "login?id=" + user.id + "&token=" + user.verificationToken;

        EmailService.sendEmail({
            to: user.email,
            subject: "KampusYuk: Saatnya Verifikasi Email Kamu!",
            html: "Hi "+user.name+", <br> <br>" +
                  "Terima kasih telah mendaftar di <a href='https://kampusyuk.com/'>Kampusyuk</a> , portal pencarian kampus terlengkap di Indonesia! " +
                  "Silahkan klik link dibawah ini untuk verifikasi email kamu: <br><br>" +
                  "<a href='"+verificationUrl+"'>"+verificationUrl+"</a>" + " <br><br>" +
                  "Jika kamu telah menyelesaikan proses verifikasi di atas, " +
                  "silakan kembali login akun KampusYuk kamu & temukan pilihan terbaik untuk masa depanmu! <br><br>" +
                  "Kamu punya pertanyaan lebih lanjut? Langsung gunakan fitur chat di website kami atau kirimkan " +
                  "pertanyaan kamu melalui email ke hello@kampusyuk.com. <br><br>" +
                  "Get ready to explore endless possibilities of the future with KampusYuk! <br><br>" +
                  "Salam hangat, <br><br>"+
                  "Tim Kampusyuk"
        });
    }

    static async sendResetEmail(userId: number, resetToken: string) {
        const user = await User.findOne({
            where:{id: userId}
        });

        const resetUrl = Env().publicUrl + "reset-sandi/?id=" + user.id + "&token=" + resetToken;

        EmailService.sendEmail({
            to: user.email,
            subject: "Kampusyuk - Reset Sandi",
            html: "Hi " + user.name + ", <br><br>" +
                  "Silahkan klik tautan di bawah ini untuk memasukkan ulang kata sandi. <br>" +
                  "<a href='"+resetUrl+"'>"+resetUrl+"</a>" + "<br><br>" +
                  "Demikian informasinya, atas perhatiannya kami ucapkan terima kasih."
        });
    }

    static async sendSuccessRegister(email:string) {
        const user = await User.findOne({
            where:{
                email: email
            }
        });

        const verificationUrl = Env().publicUrl + "login?id=" + user.id + "&token=" + user.verificationToken;

        EmailService.sendEmail({
            to: user.email,
            subject: "Kampusyuk - Berhasil Mendaftar",
            html: "Hi "+user.name+", <br> <br>" +
              "Selamat datang di Kampusyuk, platform pencarian Universitas terlengkap di Indonesia. <br>" +
              "Kampusyuk akan membantumu dalam mempersiapkan jenjang pendidikan lanjutanmu sehingga kamu tak perlu galau lagi menentukan masa depanmu. <br>" +
              "<ul>" +
              "<li>Temukan informasi ribuan kampus serta beasiswa yang lengkap dan komprehensif</li>" +
              "<li>Bandingkan berbagai kampus dan temukan kampus impianmu</li>" +
              "<li>Daftarkan diri ke kampus pilihanmu. Psst, proses ini bisa kamu lakukan dimana saja dan kapan saja, langsung dari ponselmu!</li>" +
              "<li>Tim admisi kami akan segera menghubungi dan membantumu melanjutkan proses pendaftaran. Jadi, pastikan nomor telepon kamu selalu aktif, ya!</li>" +
              "</ul>" +
              "Sekarang, daftar kampus impianmu jadi lebih mudah bersama Kampusyuk. Yuk kenali potensi dirimu, pilih kampus favoritmu, dan raih masa depan gemilang bersama Kampusyuk! <br><br>" +
              "Salam hangat,<br><br>Tim Kampusyuk"
        });
    }
}
