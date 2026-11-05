<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\MasterAnggota;
use App\User;
use App\Statusbea;
use App\Pekerjaan;
use App\Dataanggota;
use App\Mstbeasiswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        //mengambil no_anggota
        $user = Auth::user()->NO_ANGGOTA;
        //mengambil data dari table MSTCST berdasarkan no_anggota
        $take = MasterAnggota::where('NO_ANGGOTA', $user)->first();
        if(is_null($take)){
            $message = 'Mohon Maaf, data anda tidak ada dalam sistem kami. Harap hubungi';
            return redirect('/logout')->with('message', $message);
           // die();
        }
        $pekerjaan = Pekerjaan::where('NO_ANGGOTA', $user)->first();
        $pengumuman = Statusbea::where('judul', 'Pengumuman Beranda')->first();
        $Dataanggota = Dataanggota::where('NO_ANGGOTA', $user)->first();
        $flag_pengumuman = Statusbea::where('id', '1')->first();

        $beasiswa = Mstbeasiswa::where('NO_ANGGOTA', $user)->first();
        if($beasiswa == null){
            $beasiswa = '';
        }

        return view('app.pages.home.home', compact('take', 'pengumuman', 'pekerjaan','jumlahfasilitas','Dataanggota', 'beasiswa', 'flag_pengumuman'));
    }

    public function login(Request $request){
        if(\Auth::attempt([
            'NO_ANGGOTA' => $request->no_anggota,
            'password' => $request->password
        ])){
            $user = User::with('member')->where('NO_ANGGOTA',$request->no_anggota)->first();
            if(!empty($user->member)){
                $tglbuka = $user->member->TGLJD_ANGGOTA;
                //-----------------------------MENGHITUNG JUMLAH BULAN--------------------//
                $date = Statusbea::where('ID', 5)->first()->AKHIR;
                $timeStart = strtotime($tglbuka);
                $timeEnd = strtotime("$date");
                // Menambah bulan ini + semua bulan pada tahun sebelumnya
                $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
                // menghitung selisih bulan
                $numBulan += date("m",$timeEnd)-date("m",$timeStart);
                $numMonth = (int)$numBulan;
                if( $numMonth > 12 ){
                    \Auth::login($user, false);
                    return redirect()->route('home');
                } else {
                    \Auth::logout();
                    return redirect()->route('login')->with('error','Ketentuan yang bisa mengajuan beasiswa minimal satu tahun bekerja terhitung dari tanggal '.Statusbea::where('ID', 5)->first()->AKHIR);
                }
            } else {
                \Auth::logout();
                return redirect()->route('login')->with('error','Data anggota tidak ditemukan silahkan hubungi admin!');
            }
        }else{
            $member = MasterAnggota::where('NO_ANGGOTA',$request->no_anggota)->first();
            if(!empty($member)){
                $tglJd = date('Ymd',strtotime($member->TGLLHR));
                $password = $request->no_anggota.$tglJd;
                if($password == $request->password){
                    $user = User::with('member')->where('NO_ANGGOTA',$request->no_anggota)->first();
                    if(empty($user->member)){
                        $user = new User();
                        $user->NO_ANGGOTA = $member->NO_ANGGOTA;
                        $user->name = $member->NAMA_LENGKAP;
                        $user->email = $member->EMAIL;
                        $user->password = bcrypt($password);
                        $user->FLAG_ANGGOTA = 1;
                        $user->TELP = $member->NOHP;
                        $user->CREATEDAT = Carbon::now();
                        $user->save();

                        $tglbuka = $member->TGLJD_ANGGOTA;
                        //-----------------------------MENGHITUNG JUMLAH BULAN--------------------//
                        $date = Statusbea::where('ID', 5)->first()->AKHIR;
                        $timeStart = strtotime($tglbuka);
                        $timeEnd = strtotime("$date");
                        // Menambah bulan ini + semua bulan pada tahun sebelumnya
                        $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
                        // menghitung selisih bulan
                        $numBulan += date("m",$timeEnd)-date("m",$timeStart);
                        $numMonth = (int)$numBulan;
                        if( $numMonth > 12 ){
                            \Auth::login($user, false);
                            return redirect()->route('home');
                        } else {
                            \Auth::logout();
                            return redirect()->route('login')->with('error','Ketentuan yang bisa mengajuan beasiswa minimal satu tahun bekerja terhitung dari tanggal '.Statusbea::where('ID', 5)->first()->AKHIR);
                        }
                    }
                }
            }
            return redirect()->route('login')->with('error','Login Gagal Mohon Periksa No Anggota dan Password Kembali!');

        }
    }
}
