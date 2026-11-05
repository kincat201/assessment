<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Deposito;
use App\Pinjaman;
use App\Mstadmin;
use App\MasterAnggota;
use App\User;
use App\Pekerjaan;
use App\Dataanggota;
use App\Tbl_Pos;
use App\Tbl_Group;
use App\Sandi_Bi;
use App\Infobeasiswa;
use App\Hisbeasiswa;
use App\Mstbeasiswa;
use App\Statusbea; 
use App\DokumenAnggota; 
use App\Databeasiswa; 
use Response; 
use Ajax;
use Render;
use Input;
use DB;
use Validator;
use Mail;
use File;
use PDF;


class Ctrl_Pendaftaran_Beasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function tester(){
    //      $takekeaktifan = Pinjaman::where('CNO','=', '0000228281')->whereBetween('TGINP', ['2013-01-01', '2018-12-30'])->count();
    //      print_r($takekeaktifan);
    // }

    public function index()
    {
                //mengambil no_anggota
        $user = Auth::user()->NO_ANGGOTA;
        //mengambil data dari table MasterAnggota berdasarkan no_anggota
        $take = MasterAnggota::where('NO_ANGGOTA', $user)->first();
        //mengambil no_anggota ditable Mstbeasiswa
        $check = Mstbeasiswa::where('NO_ANGGOTA',$user)->first();
        //mengambil  data dari table infobeasiswa -> digunakan jika anggota belum melengkapi dokumen
        $infodokumen = Infobeasiswa::where('NO_ANGGOTA', $user)->first();
        //megambil status penutupan pendaftaran beasiswa
        $status = Statusbea::where('JUDUL', 'Penutupan')->first();
        $flagstatus = $status->status;
        //mengambil tgl jadi aggota
        $joinanggota = strtotime($take->TGLJD_ANGGOTA);
        $pengumuman = Statusbea::where('ID', 2)->first();
        $join       = Statusbea::where('ID', 5)->first();
        
        $tglakhirjoin = strtotime($join->AKHIR);
        $start_date = strtotime($pengumuman->MULAI);
        $end_date = strtotime($pengumuman->AKHIR);
        $todays_date = strtotime(date("Y-m-d H:m:s"));

        $criteria = json_decode(Statusbea::where('id',16)->first()->KETERANGAN);

        if($joinanggota >= $tglakhirjoin ){
              $flagjoin = '1';
              return view('app.pages.pendaftaran_beasiswa.error_penutupan')->with($flagjoin);
        }

        //JIKA TANGGAL BEASISWA BUKA 
        if ($todays_date >= $start_date && $todays_date <= $end_date)
        {

  
            //JIKA BELUM DAFTAR BEASISWA
          if(is_null($check)){
            //---------CEK GOLONGAN BERAPA ?----------------------//
           // $cno = sprintf('%010d', $take->CNO);
            $ambilgolongan = Pekerjaan::where('NO_ANGGOTA', $user)->first();
            if(!$ambilgolongan){
                return redirect('/home')->with('message', 'Mohon maaf data pekerjaan anda tidak ada dalam sistem beasiswa, harap hubungi KAI');
                die();
            }
            $konvert = $ambilgolongan->GOLONGAN_JABATAN;
            $potong = substr($konvert ,0,1);
            $konvert = (int)$potong;
          //  $bukangolongan = $ambilgolongan->golongan_jabatan;


                if($konvert < 1 || $konvert > 3){ //JIKA GOLONGAN DIATAS 4
                    return view('app.pages.pendaftaran_beasiswa.error_golongan');
                }else{

                    //MENGAMBIL DATA ANGGOTA
                    $databeasiswa = Databeasiswa::where('NO_ANGGOTA', $user)->first();
                    $dataanggota = Dataanggota::where('NO_ANGGOTA', $user)->first();
                    
                    if(is_null($dataanggota)){
                         return redirect('/step_1');
                    }else{

                    //MENGAMBIL DATA ANGGOTA

                    //MENGAMBIL INFORMASI BEASISWA
                    $fullinfo = Statusbea::where('id', 4)->first();
                    $judul = $fullinfo->JUDUL;
                    $isi = $fullinfo->KETERANGAN;
                    //END INFORMASI

                    //mendaptkan nomor CNO
                    $cno = sprintf('%010d', $take->CNO);
                    //mengambil tanggal buka(untuk menghitung masa keanggotaan)
                    $tglbuka = $take->TGLJD_ANGGOTA;

                    //----------------MENGHITUNG JUMLAH BULAN--------------------//
                    $date = date("Y-m-d");
                    $timeStart = strtotime($tglbuka);
                    $timeEnd = strtotime("$date");
                    // Menambah bulan ini + semua bulan pada tahun sebelumnya
                    $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
                    // menghitung selisih bulan
                    $numBulan += date("m",$timeEnd)-date("m",$timeStart);

                    //----Mengambil berapa kali dia aktif simpan pinjam---------------//
                    $takedeposito = Deposito::where('NO_ANGGOTA', '=', $user)
                        ->whereBetween('TGL_DEPOSITO', [$criteria->periode_start.'-01-01', $criteria->periode_end.'-12-31'])
                        ->count();
                    $takekeaktifan = Pinjaman::where('NO_ANGGOTA','=', $user)
                        ->whereBetween('TGL_PINJAMAN', [$criteria->periode_start.'-01-01', $criteria->periode_end.'-12-31'])
                        ->count();
                    $simpanpinjam = $takekeaktifan;

                    //---Mengambil Golongan anggota------//
                    $takegolongan = Pekerjaan::where('NO_ANGGOTA', $user)->first();
                    $gol = $takegolongan->GOLONGAN_JABATAN;
                    $golongan = substr($gol ,0,1);
                    $gol = (int)$golongan;


                    //mengambil berapa kali sudah mendapatkan beasiswa//
                    $takebeasiswa = Hisbeasiswa::where('NO_ANGGOTA','=', $user)
                        ->where('PERIODE','>=',$criteria->periode_start )
                        ->where('PERIODE','<=',$criteria->periode_end )
                        ->count();
                    
                  
                    $jum = $numBulan;
                    $aktif = $simpanpinjam;
                    $golpek = $gol;
                    $beasiswa = $takebeasiswa;
                    $judul = $judul;
                    $isi = $isi;


                    $criteria = json_decode(Statusbea::where('id',16)->first()->KETERANGAN);

                    return view('app.pages.pendaftaran_beasiswa.formulir_pendaftaran_1',compact('jum', 'aktif','golpek', 'beasiswa', 'judul','isi','databeasiswa', 'dataanggota','take','criteria'));
                 }

                }
            

            }else{ //jika tidak didapatkan kekurangan dokumen maka lanjut kedalam data beasiswa
                if(!is_null($check)){
                if($check->flagsubmit == '0'){
                     $data2 = array(
                            'beasiswa' => $check,
                            'bukti' => 'bukti',
                            'criteria' => $criteria
                            );
                    return view('app.pages.pendaftaran_beasiswa.formulir_pendaftaran_2')->with($data2);
                }
                }
                $ambil = Mstbeasiswa::where('NO_ANGGOTA',$user)->first();
                $kelengkapan_sertifikat = $ambil->flagsertifikat;
                $kelengkapan_akademik = $ambil->flagakademik;
              //  $optionalfile = DokumenAnggota::where('NO_ANGGOTA',Auth::user()->NO_ANGGOTA);
                $prestasi_anggota = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'PRESTASI ANGGOTA']])
                                                            ->first();
                $prestasi_anak = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'SERTIFIKAT AKADEMIK/NON AKADEMIK']])
                                                            ->first();
      
                $fileprestasianggota = 0;
                $fileprestasianak = 0;
                $kelengkapan = 0;
                $flagtanggaledit = 0;

                if($kelengkapan_sertifikat != '0'){
                   if(is_null($prestasi_anggota)){
                        $fileprestasianggota = 1;
                   } 
                }

                if($kelengkapan_akademik != '0'){
                     if(is_null($prestasi_anak)){
                        $fileprestasianak = 1;

                   } 
                }

                if($fileprestasianggota == 1 || $fileprestasianak == 1){
                    $kelengkapan = 1;
                }


               // $batasedit = Statusbea::where('ID', 6)->first();
                
                $tanggaledit = strtotime($ambil->TGL_BATAS_EDIT);

                if($todays_date <= $tanggaledit && $ambil->STATUS == 0){
                    $flagtanggaledit = 1;
                }

                return view('app.pages.pendaftaran_beasiswa.pendaftaran_status', compact('ambil','flagtanggaledit','batasedit','kelengkapan'));
             }


        }else{
        
        if($todays_date < $start_date){
                $flagjoin = '2';
                $tgl = Statusbea::where('JUDUL', 'Penutupan')->first();
                return view('app.pages.pendaftaran_beasiswa.error_penutupan', compact('status','tgl','flagjoin'));
        }else if($todays_date > $end_date){
                $flagjoin = '3';
                $tgl = Statusbea::where('JUDUL', 'Penutupan')->first();
                return view('app.pages.pendaftaran_beasiswa.error_penutupan', compact('status','tgl','flagjoin'));
            }
        }

    

    }


    public function uploadlampiran(){
        $user = Auth::user()->NO_ANGGOTA;
        $cekdatabeasiswa = Mstbeasiswa::where('NO_ANGGOTA', $user)->first();

        $criteria = json_decode(Statusbea::where('id',16)->first()->KETERANGAN);
        
        if(is_null($cekdatabeasiswa)){
            return redirect('/home');
        }
            if($cekdatabeasiswa->flagsubmit == '0'){
             $data2 = array(
                    'beasiswa' => $cekdatabeasiswa,
                    'bukti' => 'bukti',
                    'criteria' => $criteria
                    );
            return view('app.pages.pendaftaran_beasiswa.formulir_pendaftaran_2')->with($data2);
            }else
             {
                return redirect('/pendaftaran_beasiswa');  
             }
         
    }

    public function pendaftaran_beasiswa_step_1(){
        $user = Auth::user()->NO_ANGGOTA;
        $databeasiswa = Mstbeasiswa::where('NO_ANGGOTA', $user)->first();
        $criteria = json_decode(Statusbea::where('id',16)->first()->KETERANGAN);
        $fullinfo = Statusbea::where('id', 4)->first();
      //  $judul = $fullinfo->JUDUL;
        $isi = $fullinfo->KETERANGAN;
        if(!is_null($databeasiswa)){
            if($databeasiswa->flagsubmit == '0'){
                return view('app.pages.pendaftaran_beasiswa.formulir_beasiswa_back_step_1',compact('databeasiswa', 'isi','criteria'));
            }else{
                return redirect('/pendaftaran_beasiswa');
            }
        }else{
            return redirect('/home');
        }
    }

    public function storebackstep(Request $request){
        
        $user = Auth::user()->NO_ANGGOTA;
        //BATAS
        $thisyear = date("Y");             //1. cek tahun saat ini
        $no_kk = Input::get('nomor_kk');    //2. mengambil parameter nomor kk
        $check = Mstbeasiswa::where([ ['NO_KK', '=', $no_kk], ['PERIODE', '=', $thisyear],['NO_ANGGOTA', '<>', $user]  ])->first();
        
        if(!is_null($check)){ //4. jika tidak ada maka cek tabel TBPERTANYAAN
            return redirect('/pendaftaran_beasiswa_step_1')
                                ->withInput()
                                ->with('pesangagal', 'Gagal dikirim, Note : No. KK anda telah terdaftar diperiode beasiswa tahun ini');
        }else{     

          $validator = Validator::make($request->all(), [
                  'nama_anak' => 'required|string|max:50',
                    'kota_lahir' => 'required|string|max:35',
                    'tgl_lahir' => 'required',
                    'nomor_kk' => 'required|numeric|digits_between:1,16',
                    'jenis_kelamin' => 'required|string',
                    'nama_sekolah' => 'required|string|max:150',
                    'nomor_rekening' => 'required|string|max:25',
                    'atas_nama' => 'required|max:35',
                    'nama_bank' => 'required|max:50'
          ]);   
    


          if($validator->fails()) {
                    return redirect('/pendaftaran_beasiswa')
                                ->withInput()
                                ->withErrors($validator, 'insert')
                                ->with('pesangagal', 'Data anda tidak berhasil disimpan');
                             
                }

                $criteria = json_decode(Statusbea::where('id',16)->first()->KETERANGAN);

                //DATA ANGGOTA//
                $dataanggota = Dataanggota::where('NO_ANGGOTA',$user)->first();
                if(is_null($dataanggota)){
                    $npwp = 'Null';
                    $no_telp = 'Null';
                    $no_rek = 'Null';
                }else{
                    $npwp = $dataanggota->NPWP;
                    $no_telp = $dataanggota->PHN;
                    $no_hp = $dataanggota->NOHP;   
                }
                       
                $no_rek = Input::get('nomor_rekening');
                $an = Input::get('atas_nama');
                $atasnama = strtoupper($an);
                $nm_bank = Input::get('nama_bank');
                $namabank = strtoupper($nm_bank);

                    $noregistrasi = Statusbea::where('id',7)->first();
                    $nomor = $noregistrasi->KETERANGAN + 1;
                    $take = MasterAnggota::where('NO_ANGGOTA', $user)->first();  
                    $tglbuka = $take->TGLJD_ANGGOTA;
                    //MENCARI KRITERIA DATA UMUM
                    //-----------------------------MENGHITUNG JUMLAH BULAN--------------------//
                    $date = date("Y-m-d");
                    $timeStart = strtotime($tglbuka);
                    $timeEnd = strtotime("$date");
                    // Menambah bulan ini + semua bulan pada tahun sebelumnya
                    $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
                    // menghitung selisih bulan
                    $numBulan += date("m",$timeEnd)-date("m",$timeStart);
                    $numMonth = (int)$numBulan;
                    //----Mengambil berapa kali dia aktif simpan pinjam---------------//
                    $takedeposito = Deposito::where('NO_ANGGOTA', '=', $user)
                        ->whereBetween('TGL_DEPOSITO', [$criteria->periode_start.'-01-01', $criteria->periode_end.'-12-31'])
                        ->count();
                    $takekeaktifan = Pinjaman::where('NO_ANGGOTA','=', $user)
                        ->whereBetween('TGL_PINJAMAN', [$criteria->periode_start.'-01-01', $criteria->periode_end.'-12-31'])
                        ->count();
                    $simpanpinjam = $takekeaktifan;
                
                    //mengambil berapa kali sudah mendapatkan beasiswa//
                    $takebeasiswa = Hisbeasiswa::where('NO_ANGGOTA','=', $user)
                                    ->where('PERIODE','>=',$criteria->periode_start )
                                    ->where('PERIODE','<=',$criteria->periode_end )
                                    ->count();
                    //END DATA UMUM
                    //VARIABLE KRITERIA UMUM
                    $lamaanggota = 0;
                    $aktifsp = 0;
                    $beasiswaditerima = 0;
                    //MeNCARI LAMA JADI ANGGOTA
                    if($numMonth >= 12 && $numMonth < 24 ){
                        $lamaanggota = $criteria->umum_1_value_1;
                    }else if($numMonth >= 24 && $numMonth < 36){
                        $lamaanggota = $criteria->umum_1_value_2;
                    } else if($numMonth >= 36 && $numMonth < 48){
                        $lamaanggota = $criteria->umum_1_value_3;
                    } else if($numMonth >= 48){
                        $lamaanggota = $criteria->umum_1_value_4;
                    }
                    //MENCARI AKTIF SIMPAN PINJAM
                    if($simpanpinjam == 0){
                        $aktifsp = $criteria->umum_2_value_1;
                    }else if($simpanpinjam > 0 && $simpanpinjam < 2){
                        $aktifsp = $criteria->umum_2_value_2;
                    }else if($simpanpinjam > 1 && $simpanpinjam < 3){
                        $aktifsp = $criteria->umum_2_value_3;
                    }else if($simpanpinjam > 2){
                        $aktifsp = $criteria->umum_2_value_4;
                    }
         
                    //BEASISWA DITERIMA
                    if($takebeasiswa > 2){
                        $beasiswaditerima = $criteria->umum_3_value_1;
                    }else if($takebeasiswa > 1 && $takebeasiswa < 3){
                        $beasiswaditerima = $criteria->umum_3_value_2;
                    }else if($takebeasiswa > 0 && $takebeasiswa < 2){
                        $beasiswaditerima = $criteria->umum_3_value_3;
                    }else if($takebeasiswa == 0){
                        $beasiswaditerima = $criteria->umum_3_value_4;
                    }
                    
                    $flagrekomendasi = Input::get('umum_5');
                    if($flagrekomendasi != 0){
                        $flagrekomendasi = 1;
                    }else{
                        $flagrekomendasi = 0;
                    }

                    $flagakademik = Input::get('khusus_2');
                    if($flagakademik != 0){
                        $flagakademik = 1;
                    }else{
                        $flagakademik = 0;
                    }

                    $U4=Input::get('umum_4');
                    if($U4 == $criteria->umum_4_value_1){
                        $golongan = '3';
                    }elseif($U4 == $criteria->umum_4_value_2){
                        $golongan = '2';
                    }elseif($U4 == $criteria->umum_4_value_3){
                        $golongan = '1';
                    }
                    $U5=Input::get('umum_5');
                  
                    $K1=Input::get('khusus_1');
                    $K2=Input::get('khusus_2');
                    
                    $hitungumum = $lamaanggota + $aktifsp + $beasiswaditerima + $U4 + $U5;
                    $hitugkhusus = $K1 + $K2;
                    $total = $hitungumum + $hitugkhusus;
                    
                    $takepekerjaan = Pekerjaan::where('NO_ANGGOTA', $user)->first(); 
                    $kdpek = $takepekerjaan->KDPEK; 
                    $npk = $takepekerjaan->NIK;
                    $taketblgroup = Tbl_Group::where('KDPEK', $kdpek)->first();
                    // $takecabang = Sandi_Bi::where('KD_BI', 'CG')
                    //                      ->where('KD_SANDI', $taketblgroup->CABANG_ID)->first();

                    $namaanggota = $take->NAMA_LENGKAP;
                    $tglmasuk = $take->TGLJD_ANGGOTA;
                    $namaperusahaan = $takepekerjaan->NMPRS;
                    $cabangperusahaan = $taketblgroup->CABANG;
                    $alamatperusahaan = $taketblgroup->ALAMAT;
                    //$bagianpekerjaan = $takebagian->KETERANGAN;
             
                    $alamatrumah = $dataanggota->ALAMAT_LENGKAP;
                    $kota = $dataanggota->CTY;
                    
//                    $datapendaftaran = new Mstbeasiswa;
                    
                    
                    $uppernakak = Input::get('nama_anak');
                    $NM_ANAK= strtoupper($uppernakak);
                    $upperlahir = Input::get('kota_lahir');
                    $KT_LAHIR = strtoupper($upperlahir);
                    $tgllahirori = Input::get('tgl_lahir');
                    $konversitgl = date("Y-m-d", strtotime($tgllahirori));
                    $TTL = $konversitgl;

                    $uppersekolah = Input::get('nama_sekolah');
                    $NM_SKL = strtoupper($uppersekolah);

                    $statuspendidikan = Input::get('st_pendidikan');
                    $tingkatanpedidikan = Input::get('kelas');
           
                    if($statuspendidikan == 'SD' AND $tingkatanpedidikan == '6'){
                        $ST_PEND = 'SMP';
                        $ST_TINGKATAN = '1';                        
                    }else if($statuspendidikan == 'SMP' AND $tingkatanpedidikan == '3'){
                        $ST_PEND = 'SMA';
                        $ST_TINGKATAN = '1'; 
                    }else{
                        $ST_PEND = Input::get('st_pendidikan'); //
                        $ST_TINGKATAN = Input::get('kelas'); //
                    }

                    $ST_PEND_LM = $statuspendidikan;
                    $ST_TINGKATAN_LM = $tingkatanpedidikan;
                    $LBG_PEND = Input::get('lemb_pendidikan');
                    $PROV_SKL = Input::get('prov_sekolah');  
                    $JENKEL = Input::get('jenis_kelamin');
                    $K_UMUM = $hitungumum;
                    $K_KHUSUS = $hitugkhusus;      
                    $SCORE= $total;
                    $STATUS = 0;
                    $KET = 'UNCHECK';
                    $flag_terima = 0;
                    $KDPEK= $kdpek;
                    $KDHO = $taketblgroup->KDPRS_PENAGIHAN;
                    $PERIODE = $thisyear;
                    $NO_KK = $no_kk;
                    $NM_ANGGOTA = $namaanggota;
                    $TGLMSK_KAI = $tglmasuk;
                    $NM_PERUSAHAAN = $namaperusahaan;
                    $CABANG = $cabangperusahaan;
                    $ALAMAT_PERUSAHAAN = $alamatperusahaan;
                    //$datapendaftaran->BAGIAN = $bagianpekerjaan;
                    $GOLONGAN = $golongan;
                    $ALAMAT_RUMAH = $alamatrumah;
                    $KOTA = $kota;
                    $NPWP = $npwp;
                    $TELP = $no_telp;
                    $NOHP = $no_hp;
                    $NO_REKENING = $no_rek;
                    $ATAS_NAMA = $atasnama;
                    $NAMA_BANK = $namabank;
                    $U1 = $lamaanggota;
                    $U2 = $aktifsp;
                    $U3 = $beasiswaditerima;
                    
                
                    try {
                              Mstbeasiswa::where('no_anggota', $user)->update(['NM_ANAK' => $NM_ANAK, 'KT_LAHIR' => $KT_LAHIR, 'TTL' => $TTL, 'NM_SKL' => $NM_SKL, 'ST_PEND' => $ST_PEND, 'ST_TINGKATAN' => $ST_TINGKATAN, 'ST_PEND_LM' => $statuspendidikan, 'ST_TINGKATAN_LM' => $tingkatanpedidikan, 'LBG_PEND' => $LBG_PEND, 'PROV_SKL' => $PROV_SKL, 'JENKEL' => $JENKEL, 'K_UMUM' => $K_UMUM, 'K_KHUSUS' => $K_KHUSUS, 'SCORE' => $SCORE, 'STATUS' => $STATUS, 'KET' => $KET, 'flag_terima' => $flag_terima,  'NPK' => $npk, 'PERIODE' => $PERIODE, 'NO_KK' => $NO_KK, 'GOLONGAN' => $GOLONGAN, 'ALAMAT_RUMAH' => $ALAMAT_RUMAH, 'KOTA' => $KOTA, 'NPWP' => $NPWP, 'TELP' => $TELP, 'NOHP' => $NOHP, 'NO_REKENING' => $NO_REKENING, 'ATAS_NAMA' => $ATAS_NAMA, 'NAMA_BANK' => $NAMA_BANK, 'U1' => $U1, 'U2' => $U2, 'U3' => $U3, 'U4' => $U4, 'U5' => $U5, 'K1' => $K1, 'K2' => $K2, 'flagsertifikat' => $flagrekomendasi, 'flagakademik' => $flagakademik]);
                            
                             
                        
                             $ambil = Mstbeasiswa::where('NO_ANGGOTA',$user)->first();
                             return redirect('/pendaftaran_beasiswa');


                        } catch (Exception $e) {
                             $ambil = Mstbeasiswa::where('NO_ANGGOTA',$user)->first();
                             return redirect('/pendaftaran_beasiswa');
                        }
                    //END UPDATE DATA BEASISWA

        
            }

         
         
    }

    public function store(Request $request){

        $user = Auth::user()->NO_ANGGOTA;
        //BATAS
        $thisyear = date("Y");             //1. cek tahun saat ini
        $no_kk = Input::get('nomor_kk');    //2. mengambil parameter nomor kk
        $check = Mstbeasiswa::where([ ['NO_KK', '=', $no_kk], ['PERIODE', '=', $thisyear] ])->first();
        
        if(!is_null($check)){ //4. jika tidak ada maka cek tabel TBPERTANYAAN
            return redirect('/pendaftaran_beasiswa')
                                ->withInput()
                                ->with('pesangagal', 'Gagal dikirim, Note : No. KK anda telah terdaftar diperiode beasiswa tahun ini');
        }else{     

          $validator = Validator::make($request->all(), [
                    'nama_anak' => 'required|string|max:50',
                    'kota_lahir' => 'required|string|max:35',
                    'tgl_lahir' => 'required',
                    'nomor_kk' => 'required|numeric|digits_between:1,16',
                    'jenis_kelamin' => 'required|string',
                    'nama_sekolah' => 'required|string|max:150',
                    'nomor_rekening' => 'required|string|max:25',
                    'atas_nama' => 'required|max:35',
                    'nama_bank' => 'required|max:50'
          ]);   
    


          if($validator->fails()) {
                    return redirect('/pendaftaran_beasiswa')
                                ->withInput()
                                ->withErrors($validator, 'insert')
                                ->with('pesangagal', 'Data anda tidak berhasil disimpan');
                             
                }

                $criteria = json_decode(Statusbea::where('id',16)->first()->KETERANGAN);

                //DATA ANGGOTA//
                $dataanggota = Dataanggota::where('NO_ANGGOTA',$user)->first();
                if(is_null($dataanggota)){
                    $npwp = 'Null';
                    $no_telp = 'Null';
                    $no_rek = 'Null';
                }else{
                    $npwp = $dataanggota->NPWP;
                    $no_telp = $dataanggota->PHN;
                    $no_hp = $dataanggota->NOHP;   
                }
                       
                $no_rek = Input::get('nomor_rekening');
                $an = Input::get('atas_nama');
                $atasnama = strtoupper($an);
                $nm_bank = Input::get('nama_bank');
                $namabank = strtoupper($nm_bank);

                    $noregistrasi = Statusbea::where('id',7)->first();
                    $nomor = $noregistrasi->KETERANGAN + 1;
                    $take = MasterAnggota::where('NO_ANGGOTA', $user)->first();  
                    $tglbuka = $take->TGLJD_ANGGOTA;
                    //MENCARI KRITERIA DATA UMUM
                    //-----------------------------MENGHITUNG JUMLAH BULAN--------------------//
                    $date = date("Y-m-d");
                    $timeStart = strtotime($tglbuka);
                    $timeEnd = strtotime("$date");
                    // Menambah bulan ini + semua bulan pada tahun sebelumnya
                    $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
                    // menghitung selisih bulan
                    $numBulan += date("m",$timeEnd)-date("m",$timeStart);
                    $numMonth = (int)$numBulan;
                    //----Mengambil berapa kali dia aktif simpan pinjam---------------//
                    $takedeposito = Deposito::where('NO_ANGGOTA', '=', $user)
                        ->whereBetween('TGL_DEPOSITO', [$criteria->periode_start.'-01-01', $criteria->periode_end.'-12-31'])
                        ->count();
                    $takekeaktifan = Pinjaman::where('NO_ANGGOTA','=', $user)
                        ->whereBetween('TGL_PINJAMAN', [$criteria->periode_start.'-01-01', $criteria->periode_end.'-12-31'])
                        ->count();
                    $simpanpinjam = $takekeaktifan;

                    //mengambil berapa kali sudah mendapatkan beasiswa//
                    $takebeasiswa = Hisbeasiswa::where('NO_ANGGOTA','=', $user)
                        ->where('PERIODE','>=',$criteria->periode_start )
                        ->where('PERIODE','<=',$criteria->periode_end )
                        ->count();
                    //END DATA UMUM
                    //VARIABLE KRITERIA UMUM
                    $lamaanggota = 0;
                    $aktifsp = 0;
                    $beasiswaditerima = 0;
                    //MeNCARI LAMA JADI ANGGOTA
                    if($numMonth >= 12 && $numMonth < 24 ){
                        $lamaanggota = $criteria->umum_1_value_1;
                    }else if($numMonth >= 24 && $numMonth < 36){
                        $lamaanggota = $criteria->umum_1_value_2;
                    } else if($numMonth >= 36 && $numMonth < 48){
                        $lamaanggota = $criteria->umum_1_value_3;
                    } else if($numMonth >= 48){
                        $lamaanggota = $criteria->umum_1_value_4;
                    }
                    //MENCARI AKTIF SIMPAN PINJAM
                    if($simpanpinjam == 0){
                        $aktifsp = $criteria->umum_2_value_1;
                    }else if($simpanpinjam > 0 && $simpanpinjam < 2){
                        $aktifsp = $criteria->umum_2_value_2;
                    }else if($simpanpinjam > 1 && $simpanpinjam < 3){
                        $aktifsp = $criteria->umum_2_value_3;
                    }else if($simpanpinjam > 2){
                        $aktifsp = $criteria->umum_2_value_4;
                    }

                    //BEASISWA DITERIMA
                    if($takebeasiswa > 2){
                        $beasiswaditerima = $criteria->umum_3_value_1;
                    }else if($takebeasiswa > 1 && $takebeasiswa < 3){
                        $beasiswaditerima = $criteria->umum_3_value_2;
                    }else if($takebeasiswa > 0 && $takebeasiswa < 2){
                        $beasiswaditerima = $criteria->umum_3_value_3;
                    }else if($takebeasiswa == 0){
                        $beasiswaditerima = $criteria->umum_3_value_4;
                    }

                    $flagrekomendasi = Input::get('umum_5');
                    if($flagrekomendasi != 0){
                        $flagrekomendasi = 1;
                    }else{
                        $flagrekomendasi = 0;
                    }

                    $flagakademik = Input::get('khusus_2');
                    if($flagakademik != 0){
                        $flagakademik = 1;
                    }else{
                        $flagakademik = 0;
                    }

                    $U4=Input::get('umum_4');
                    if($U4 == $criteria->umum_4_value_1){
                        $golongan = '3';
                    }elseif($U4 == $criteria->umum_4_value_2){
                        $golongan = '2';
                    }elseif($U4 == $criteria->umum_4_value_3){
                        $golongan = '1';
                    }

                    $U5=Input::get('umum_5');
                  
                    $K1=Input::get('khusus_1');
                    $K2=Input::get('khusus_2');
                    
                    $hitungumum = $lamaanggota + $aktifsp + $beasiswaditerima + $U4 + $U5;
                    $hitugkhusus = $K1 + $K2;
                    $total = $hitungumum + $hitugkhusus;
                    
                    $takepekerjaan = Pekerjaan::where('NO_ANGGOTA', $user)->first(); 
                    $kdpek = $takepekerjaan->KDPEK; 
                    $npk  = $takepekerjaan->NIK;
                    $taketblgroup = Tbl_Group::where('KDPEK', $kdpek)->first();
                    // $takecabang = Sandi_Bi::where('KD_BI', 'CG')
                    //                      ->where('KD_SANDI', $taketblgroup->CABANG_ID)->first();
            

                    $namaanggota = $take->NAMA_LENGKAP;
                    $tglmasuk = $take->TGLJD_ANGGOTA;
                    $namaperusahaan = $takepekerjaan->NMPRS;
                    $cabangperusahaan = $taketblgroup->CABANG;
                    $alamatperusahaan = $taketblgroup->ALAMAT;
                    //$bagianpekerjaan = $takebagian->KETERANGAN;
             
                    $alamatrumah = $dataanggota->ALAMAT_LENGKAP;
                    $kota = $dataanggota->CTY;
                    
                    $datapendaftaran = new Mstbeasiswa;
                    
                    $datapendaftaran->NO_REG = $nomor;
                    $datapendaftaran->NO_ANGGOTA= $user;
                    
                    $uppernakak = Input::get('nama_anak');
                    $datapendaftaran->NM_ANAK= strtoupper($uppernakak);

                    $upperlahir = Input::get('kota_lahir');
                    $datapendaftaran->KT_LAHIR = strtoupper($upperlahir);
                    $tgllahirori = Input::get('tgl_lahir');
                    $konversitgl = date("Y-m-d", strtotime($tgllahirori));
                    $datapendaftaran->TTL = $konversitgl;

                    $uppersekolah = Input::get('nama_sekolah');
                    $datapendaftaran->NM_SKL = strtoupper($uppersekolah);

                    $statuspendidikan = Input::get('st_pendidikan');
                    $tingkatanpedidikan = Input::get('kelas');

                    if($statuspendidikan == 'SD' AND $tingkatanpedidikan == '6'){
                        $datapendaftaran->ST_PEND = 'SMP';
                        $datapendaftaran->ST_TINGKATAN = '1';                        
                    }else if($statuspendidikan == 'SMP' AND $tingkatanpedidikan == '3'){
                        $datapendaftaran->ST_PEND = 'SMA';
                        $datapendaftaran->ST_TINGKATAN = '1'; 
                    }else{
                        $datapendaftaran->ST_PEND = Input::get('st_pendidikan'); //
                        $datapendaftaran->ST_TINGKATAN = Input::get('kelas'); //
                    }

                    $datapendaftaran->ST_PEND_LM = Input::get('st_pendidikan');
                    $datapendaftaran->ST_TINGKATAN_LM = Input::get('kelas');
                    $datapendaftaran->LBG_PEND = Input::get('lemb_pendidikan');
                    $datapendaftaran->PROV_SKL = Input::get('prov_sekolah');  
                    $datapendaftaran->JENKEL = Input::get('jenis_kelamin');
                    $datapendaftaran->K_UMUM = $hitungumum;
                    $datapendaftaran->K_KHUSUS = $hitugkhusus;      
                    $datapendaftaran->SCORE= $total;
                    $datapendaftaran->STATUS = 0;
                    $datapendaftaran->KET = 'UNCHECK';
                    $datapendaftaran->flag_terima = 0;
                    $datapendaftaran->KDPEK= $kdpek;
                    $datapendaftaran->KDHO = $taketblgroup->KDPRS_PENAGIHAN;
                    $datapendaftaran->PERIODE = $thisyear;
                    $datapendaftaran->NO_KK = $no_kk;
                    $datapendaftaran->NM_ANGGOTA = $namaanggota;
                    $datapendaftaran->TGLMSK_KAI = $tglmasuk;
                    $datapendaftaran->NM_PERUSAHAAN = $namaperusahaan;
                    $datapendaftaran->CABANG = $cabangperusahaan;
                    $datapendaftaran->ALAMAT_PERUSAHAAN = $alamatperusahaan;
                    //$datapendaftaran->BAGIAN = $bagianpekerjaan;
                    $datapendaftaran->GOLONGAN = $golongan;
                    $datapendaftaran->ALAMAT_RUMAH = $alamatrumah;
                    $datapendaftaran->KOTA = $kota;
                    $datapendaftaran->NPWP = $npwp;
                    $datapendaftaran->TELP = $no_telp;
                    $datapendaftaran->NOHP = $no_hp;
                    $datapendaftaran->NO_REKENING = $no_rek;
                    $datapendaftaran->ATAS_NAMA = $atasnama;
                    $datapendaftaran->NAMA_BANK = $namabank;
                    $datapendaftaran->NPK = $npk;
                    $datapendaftaran->U1 = $lamaanggota;
                    $datapendaftaran->U2 = $aktifsp;
                    $datapendaftaran->U3 = $beasiswaditerima;
                    $datapendaftaran->U4 = $U4;
                    $datapendaftaran->U5 = $U5;
                    $datapendaftaran->K1 = $K1;
                    $datapendaftaran->K2 = $K2;
                    $datapendaftaran->flagsertifikat = $flagrekomendasi;
                    $datapendaftaran->flagakademik = $flagakademik;
                
                    //status dan keterangan saya tidak isi
                    // print_r($datapendaftaran);
                    // die();
                    //UPDATE DATA BEASISWA
                    $cekdatabeasiswa = Databeasiswa::where('NO_ANGGOTA', $user)->first();

                    if(is_null($cekdatabeasiswa)){
                        $databeasiswa = new Databeasiswa;
                        $databeasiswa->NO_ANGGOTA = $user;
                        $databeasiswa->TELP = $no_telp;
                        $databeasiswa->NOHP = $no_hp;
                        $databeasiswa->NO_REKENING = $no_rek;
                        $databeasiswa->ATAS_NAMA = $atasnama;
                        $databeasiswa->NAMA_BANK = $namabank;
                        $databeasiswa->NPWP = $npwp;
                    
                        try {
                          $databeasiswa->save();

                        } catch (Exception $e) {
                            return $e;
                        }

                    }else{
                       
                        try {
                            Databeasiswa::where('no_anggota', $user)->update(['TELP' => $no_telp, 'NOHP' => $no_hp, 'NO_REKENING' => $no_rek, 'ATAS_NAMA' => $atasnama, 'NAMA_BANK' => $namabank, 'NPWP' => $npwp ]);     

                        } catch (Exception $e) {
                            return $e;
                        }
                         
                    }
                    //END UPDATE DATA BEASISWA
                    
              // returns false        
              try {
                $datapendaftaran->save();
                $nomorstring = (string)$nomor;
                Statusbea::where('ID',7)->update(['KETERANGAN' => $nomorstring]);
                return redirect('/uploadlampiran'); 
              } catch (\Illuminate\Database\QueryException $e) {
                 return redirect()->to('/pendaftaran_beasiswa')->withInput()->with('pesangagal', 'Pendaftaran gagal, silahkan isi ulang formulir');
              }    
              
         }
    }

public function storelampiranbeasiswa(Request $request){
         $user = Auth::user()->NO_ANGGOTA;
         $today = date("Y"); 
         $Date = date('Y-m-d');
         $get_hari_batas_edit = Statusbea::where('id', 6)->first();
         $get_hari_batas_approve = Statusbea::where('id', 8)->first();
         $tgl_batas_edit = date('Y-m-d', strtotime($Date. ' + '.$get_hari_batas_edit->STATUS.' days'));
         $tgl_batas_approve = date('Y-m-d', strtotime($Date. ' + '.$get_hari_batas_approve->STATUS.' days'));

          $validator = Validator::make($request->all(), [
                    'surat_tabungan' => 'required|max:1024', //DATA ANGGOTA mimes:jpeg,pdf,png|
                    'kartu_keluarga' => 'required|max:1024', //mimes:jpeg,pdf,png
                    'prestasi_anggota' => 'max:1024',
                    '1_nilai_a' => 'required|max:1024', //DATA ANAK
                    // '1_nilai_b' => 'max:1024',
                    // '1_nilai_c' => 'max:1024',
                    // '1_nilai_d' => 'max:1024',
                    // '1_nilai_e' => 'max:1024',
                    'surat_akademik' => 'max:1024',
                    'keterangan_prestasi' => 'string|max:255',
                    'keterangan_akademik' => 'string|max:255',
 
                ]);

               if($validator->fails()) {
                    return redirect('/pendaftaran_beasiswa')
                                ->withInput()
                                ->withErrors($validator, 'insert')
                                ->with('message', 'Data anda tidak berhasil disimpan');
                             
                }
                    //--------GET KETARANGAN --//
                    $keterangan_prestasi = $request->input('keterangan_prestasi');
                    $keterangan_akademik = $request->input('keterangan_akademik');
              
                    try {
                        Mstbeasiswa::where('no_anggota', $user)->update(['keterangan_prestasi' => $keterangan_prestasi, 'keterangan_akademik' => $keterangan_akademik]);   
                    } catch (Exception $e) {
                        return redirect('/pendaftaran_beasiswa')
                                ->withInput()
                                ->with('message', 'Data anda tidak berhasil disimpan');
                    }
                    
                    //---------PROSES UPLOAD FILE DAN INPUT KE DATABSE-----------//
                    $path = 'assets/app/images/anggota/'.$user;
                    File::makeDirectory($path, $mode = 0777, true, true);
                    $destinationPath = 'assets/app/images/anggota/'.$user;
                    $nama = $user;
                    $filekosong = "Tidak dilampirkan";
        
      
                if(Input::hasFile('surat_tabungan')){
                    $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                    foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];

                    $file=Input::file('surat_tabungan');
                    $extension = Input::file('surat_tabungan')->getClientOriginalExtension(); // getting image extension
                    $filename = $name.'.'.$extension;
                    $file->move($destinationPath, $filename);
                    $DokumenAnggota = new DokumenAnggota;
                    $DokumenAnggota->NO_ANGGOTA = $user;
                    $DokumenAnggota->NAMA_FILE = $filename;
                    $DokumenAnggota->JENIS = 'KARTU TABUNGAN';
                    $DokumenAnggota->LAMPIRAN = 'O';
                    $DokumenAnggota->PERIODE = $today;
                    $DokumenAnggota->save();
                    
                }

                if(Input::hasFile('kartu_keluarga')){
                    $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                    foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];

                    $file=Input::file('kartu_keluarga');
                    $extension = Input::file('kartu_keluarga')->getClientOriginalExtension(); // getting image extension
                    $filename = $name.'.'.$extension;
                    $file->move($destinationPath, $filename);
                    $DokumenAnggota = new DokumenAnggota;
                    $DokumenAnggota->NO_ANGGOTA = $user;
                    $DokumenAnggota->NAMA_FILE = $filename;
                    $DokumenAnggota->JENIS = 'KARTU KELUARGA';
                    $DokumenAnggota->LAMPIRAN = 'O';
                    $DokumenAnggota->PERIODE = $today;
                    $DokumenAnggota->save();
                    
                }

        

                if(Input::hasFile('prestasi_anggota')){
                    $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                    foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                    $file=Input::file('prestasi_anggota');
                    $extension = Input::file('prestasi_anggota')->getClientOriginalExtension(); // getting image extension
                    $filename = $name.'.'.$extension;
                    $file->move($destinationPath, $filename);
                    $DokumenAnggota = new DokumenAnggota;
                    $DokumenAnggota->NO_ANGGOTA = $user;
                    $DokumenAnggota->NAMA_FILE = $filename;
                    $DokumenAnggota->JENIS = 'PRESTASI ANGGOTA';
                    $DokumenAnggota->LAMPIRAN = 'O';
                    $DokumenAnggota->PERIODE = $today;
                    $DokumenAnggota->save();
                }

                //   if(Input::hasFile('prestasi_anggota2')){
                //     $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                //          .'0123456789'); // and any other characters
                //         shuffle($seed); // probably optional since array_is randomized; this may be redundant
                //         $name = '';
                //     foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                //     $file=Input::file('prestasi_anggota2');
                //     $extension = Input::file('prestasi_anggota2')->getClientOriginalExtension(); // getting image extension
                //     $filename = $name.'.'.$extension;
                //     $file->move($destinationPath, $filename);
                //     $DokumenAnggota = new DokumenAnggota;
                //     $DokumenAnggota->NO_ANGGOTA = $user;
                //     $DokumenAnggota->NAMA_FILE = $filename;
                //     $DokumenAnggota->JENIS = 'PRESTASI ANGGOTA 2';
                //     $DokumenAnggota->LAMPIRAN = 'O';
                //     $DokumenAnggota->PERIODE = $today;
                //     $DokumenAnggota->save();
                // }

           
                // if(Input::hasFile('prestasi_anggota3')){
                //     $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                //          .'0123456789'); // and any other characters
                //         shuffle($seed); // probably optional since array_is randomized; this may be redundant
                //         $name = '';
                //     foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                //     $file=Input::file('prestasi_anggota3');
                //     $extension = Input::file('prestasi_anggota3')->getClientOriginalExtension(); // getting image extension
                //     $filename = $name.'.'.$extension;
                //     $file->move($destinationPath, $filename);
                //     $DokumenAnggota = new DokumenAnggota;
                //     $DokumenAnggota->NO_ANGGOTA = $user;
                //     $DokumenAnggota->NAMA_FILE = $filename;
                //     $DokumenAnggota->JENIS = 'PRESTASI ANGGOTA 3';
                //     $DokumenAnggota->LAMPIRAN = 'O';
                //     $DokumenAnggota->PERIODE = $today;
                //     $DokumenAnggota->save();
                // }

                if(Input::hasFile('1_nilai_a')){
                     $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                    foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                    $file=Input::file('1_nilai_a');
                    $extension = Input::file('1_nilai_a')->getClientOriginalExtension(); // getting image extension
                    $filename = $name.'.'.$extension;
                    $file->move($destinationPath, $filename);
                    $DokumenAnggota = new DokumenAnggota;
                    $DokumenAnggota->NO_ANGGOTA = $user;
                    $DokumenAnggota->NAMA_FILE = $filename;
                    $DokumenAnggota->JENIS = 'SURAT KETERANGAN NILAI';
                    $DokumenAnggota->LAMPIRAN = 'A';
                    $DokumenAnggota->PERIODE = $today;
                    $DokumenAnggota->save();
                    
                }


                // if(Input::hasFile('1_nilai_b')){
                //     $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                //          .'0123456789'); // and any other characters
                //         shuffle($seed); // probably optional since array_is randomized; this may be redundant
                //         $name = '';
                //     foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                //     $file=Input::file('1_nilai_b');
                //     $extension = Input::file('1_nilai_b')->getClientOriginalExtension(); // getting image extension
                //     $filename = $name.'.'.$extension;
                //     $file->move($destinationPath, $filename);
                //     $DokumenAnggota = new DokumenAnggota;
                //     $DokumenAnggota->NO_ANGGOTA = $user;
                //     $DokumenAnggota->NAMA_FILE = $filename;
                //     $DokumenAnggota->JENIS = 'NILAI 1.B';
                //     $DokumenAnggota->LAMPIRAN = 'A';
                //     $DokumenAnggota->PERIODE = $today;
                //     $DokumenAnggota->save();
                    
                // }

                // if(Input::hasFile('1_nilai_c')){
                //      $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                //          .'0123456789'); // and any other characters
                //         shuffle($seed); // probably optional since array_is randomized; this may be redundant
                //         $name = '';
                //     foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                //     $file=Input::file('1_nilai_c');
                //     $extension = Input::file('1_nilai_c')->getClientOriginalExtension(); // getting image extension
                //     $filename = $name.'.'.$extension;
                //     $file->move($destinationPath, $filename);
                //     $DokumenAnggota = new DokumenAnggota;
                //     $DokumenAnggota->NO_ANGGOTA = $user;
                //     $DokumenAnggota->NAMA_FILE = $filename;
                //     $DokumenAnggota->JENIS = 'NILAI 1.C';
                //     $DokumenAnggota->LAMPIRAN = 'A';
                //     $DokumenAnggota->PERIODE = $today;
                //     $DokumenAnggota->save();
                    
                // }


                // if(Input::hasFile('1_nilai_d')){
                //     $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                //          .'0123456789'); // and any other characters
                //         shuffle($seed); // probably optional since array_is randomized; this may be redundant
                //         $name = '';
                //     foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                //     $file=Input::file('1_nilai_d');
                //     $extension = Input::file('1_nilai_d')->getClientOriginalExtension(); // getting image extension
                //     $filename = $name.'.'.$extension;
                //     $file->move($destinationPath, $filename);
                //     $DokumenAnggota = new DokumenAnggota;
                //     $DokumenAnggota->NO_ANGGOTA = $user;
                //     $DokumenAnggota->NAMA_FILE = $filename;
                //     $DokumenAnggota->JENIS = 'NILAI 1.D';
                //     $DokumenAnggota->LAMPIRAN = 'A';
                //     $DokumenAnggota->PERIODE = $today;
                //     $DokumenAnggota->save();
                    
                // }


                if(Input::hasFile('surat_akademik')){
                    $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                    foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                    $file=Input::file('surat_akademik');
                    $extension = Input::file('surat_akademik')->getClientOriginalExtension(); // getting image extension
                    $filename = $name.'.'.$extension;
                    $file->move($destinationPath, $filename);
                    $DokumenAnggota = new DokumenAnggota;
                    $DokumenAnggota->NO_ANGGOTA = $user;
                    $DokumenAnggota->NAMA_FILE = $filename;
                    $DokumenAnggota->JENIS = 'SERTIFIKAT AKADEMIK/NON AKADEMIK';
                    $DokumenAnggota->LAMPIRAN = 'A';
                    $DokumenAnggota->PERIODE = $today;
                    $DokumenAnggota->save();
                }


              
                // Mstbeasiswa::where('no_anggota', $user)->update(['flagsubmit' => '1', 'TGL_BATAS_EDIT' => $tgl_batas_edit, 'TGL_BATAS_APPROVE' => $tgl_batas_approve]);   //---------------TUTUP EMAIL ------------------//
                  try{

                      Mstbeasiswa::where('no_anggota', $user)->update(['flagsubmit' => '1', 'TGL_BATAS_EDIT' => $tgl_batas_edit, 'TGL_BATAS_APPROVE' => $tgl_batas_approve]);  
                      $datapendaftar = Mstbeasiswa::where('no_anggota', $user)->first();
                      Mail::send('app.pages.pendaftaran_beasiswa.notifikasi_pendaftaran', array('datapendaftar' => $datapendaftar), function($message)
                      {    
                          $user = Auth::user()->NO_ANGGOTA;
                          $tahun = date("Y");
                          $datapendaftar = Mstbeasiswa::where('no_anggota', $user)->first();  
                          $mstadmin = Mstadmin::where('kdpek', $datapendaftar->KDHO)->get();
                          $emails = array();

                          if($mstadmin){
                                    
                                  foreach ($mstadmin as $tujuan) {
                                      $emails[] = $tujuan->email;
                                  }
                                 // $tujuan =  $mstadmin->email;
                                  try {
                                      $message->to($emails)->subject('Pendaftaran Beasiswa Tahun '.$tahun);
                                  } catch (\Exception $e) {
                                      return redirect('/uploadlampiran'); 
                                  }
                                  
                            
                          }else{

                                  $singleuser = Mstadmin::where('kdpek', $datapendaftar->KDHO)->first();
                                  $tujuan =  $singleuser->email;
                                  try {
                                      $message->to($tujuan)->subject('Pendaftar Beasiswa Tahun '.$tahun);
                                  } catch (\Exception $e) {
                                       return redirect('/uploadlampiran'); 
                                  }
                           
                          }
                        
                      });
                  
              }catch(\Exception $e){
                    return redirect('/pendaftaran_beasiswa');  
              }
               
            return redirect('/uploadlampiran');    

    }
 
    public function editformulirbeasiswa(){
       
        $user = Auth::user()->NO_ANGGOTA;
        $databeasiswa = Mstbeasiswa::where('NO_ANGGOTA', $user)->first();
        $fullinfo = Statusbea::where('id', 4)->first();
      //  $judul = $fullinfo->JUDUL;
        $isi = $fullinfo->KETERANGAN;
        $todays_date = strtotime(date("Y-m-d H:m:s"));
        $tanggaledit = strtotime($databeasiswa->TGL_BATAS_EDIT);

     //   $ambil = Mstbeasiswa::where('NO_ANGGOTA',$user)->first();
        $kelengkapan_sertifikat = $databeasiswa->flagsertifikat;
        $kelengkapan_akademik = $databeasiswa->flagakademik;

        $prestasi_anggota = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'PRESTASI ANGGOTA']])
                                                            ->first();
        $prestasi_anak = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'SERTIFIKAT AKADEMIK/NON AKADEMIK']])
                                                            ->first();
      
        $fileprestasianggota = 0;
        $fileprestasianak = 0;


        $kelengkapan = 0;

        if($kelengkapan_sertifikat != '0'){
             if(!is_null($prestasi_anggota)){
                $fileprestasianggota = 1;
            } 
        }

        if($kelengkapan_akademik != '0'){
            if(!is_null($prestasi_anak)){
                $fileprestasianak = 1;
            } 
        }

//        if($todays_date <= $tanggaledit ){
            if(!is_null($databeasiswa)){
                if($databeasiswa->flagsubmit == '1' && $databeasiswa->STATUS == '0'){

                    $criteria = json_decode(Statusbea::where('id',16)->first()->KETERANGAN);
                    return view('app.pages.pendaftaran_beasiswa.edit_formulir_pendaftaran_1',compact('databeasiswa', 'isi', 'fileprestasianggota', 'fileprestasianak','criteria'));
                     
                }else{
                      return redirect('/pendaftaran_beasiswa');  
                }
            }else{
                return redirect('/home');
            }                
//        }else{
//             return redirect('/home');
//        }


      
    }

    public function updateformbeasiswa(Request $request){
        $user = Auth::user()->NO_ANGGOTA;
        //BATAS
        $thisyear = date("Y");             //1. cek tahun saat ini
        $no_kk = Input::get('nomor_kk');    //2. mengambil parameter nomor kk
        $check = Mstbeasiswa::where([ ['NO_KK', '=', $no_kk], ['PERIODE', '=', $thisyear],['NO_ANGGOTA', '<>', $user]  ])->first();
        
        $cekdatabeasiswa = Mstbeasiswa::where('NO_ANGGOTA', $user)->first();
        if($cekdatabeasiswa->flagsubmit == '1'){
        
        if(!is_null($check)){ //4. jika tidak ada maka cek tabel TBPERTANYAAN
            return redirect('/pendaftaran_beasiswa_step_1')
                                ->withInput()
                                ->with('pesangagal', 'Gagal dikirim, Note : No. KK anda telah terdaftar diperiode beasiswa tahun ini');
        }else{     

          $validator = Validator::make($request->all(), [
                  'nama_anak' => 'required|string|max:50',
                    'kota_lahir' => 'required|string|max:35',
                    'tgl_lahir' => 'required',
                    'nomor_kk' => 'required|numeric|digits_between:1,16',
                    'jenis_kelamin' => 'required|string',
                    'nama_sekolah' => 'required|string|max:150',
                    'nomor_rekening' => 'required|string|max:25',
                    'atas_nama' => 'required|max:35',
                    'nama_bank' => 'required|max:50'
          ]);   
    


          if($validator->fails()) {
                    return redirect('/pendaftaran_beasiswa')
                                ->withInput()
                                ->withErrors($validator, 'insert')
                                ->with('pesangagal', 'Data anda tidak berhasil disimpan');
                             
                }

                //DATA ANGGOTA//
                $dataanggota = Dataanggota::where('NO_ANGGOTA',$user)->first();
                if(is_null($dataanggota)){
                    $npwp = 'Null';
                    $no_telp = 'Null';
                    $no_rek = 'Null';
                }else{
                    $npwp = $dataanggota->NPWP;
                    $no_telp = $dataanggota->PHN;
                    $no_hp = $dataanggota->NOHP;   
                }

                $criteria = json_decode(Statusbea::where('id',16)->first()->KETERANGAN);
                       
                $no_rek = Input::get('nomor_rekening');
                $an = Input::get('atas_nama');
                $atasnama = strtoupper($an);
                $nm_bank = Input::get('nama_bank');
                $namabank = strtoupper($nm_bank);

                    $noregistrasi = Statusbea::where('id',7)->first();
                    $nomor = $noregistrasi->KETERANGAN + 1;
                    $take = MasterAnggota::where('NO_ANGGOTA', $user)->first();  
                    $tglbuka = $take->TGLJD_ANGGOTA;
                    //MENCARI KRITERIA DATA UMUM
                    //-----------------------------MENGHITUNG JUMLAH BULAN--------------------//
                    $date = date("Y-m-d");
                    $timeStart = strtotime($tglbuka);
                    $timeEnd = strtotime("$date");
                    // Menambah bulan ini + semua bulan pada tahun sebelumnya
                    $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
                    // menghitung selisih bulan
                    $numBulan += date("m",$timeEnd)-date("m",$timeStart);
                    $numMonth = (int)$numBulan;
                    //----Mengambil berapa kali dia aktif simpan pinjam---------------//
                    $takedeposito = Deposito::where('NO_ANGGOTA', '=', $user)
                        ->whereBetween('TGL_DEPOSITO', [$criteria->periode_start.'-01-01', $criteria->periode_end.'-12-31'])->count();
                    $takekeaktifan = Pinjaman::where('NO_ANGGOTA','=', $user)
                        ->whereBetween('TGL_PINJAMAN', [$criteria->periode_start.'-01-01', $criteria->periode_end.'-12-31'])->count();
                    $simpanpinjam = $takekeaktifan;
                
                    //mengambil berapa kali sudah mendapatkan beasiswa//
                    $takebeasiswa = Hisbeasiswa::where('NO_ANGGOTA','=', $user)
                        ->where('PERIODE','>=',$criteria->periode_start )
                        ->where('PERIODE','<=',$criteria->periode_end )
                        ->count();
                    //END DATA UMUM
                    //VARIABLE KRITERIA UMUM
                    $lamaanggota = 0;
                    $aktifsp = 0;
                    $beasiswaditerima = 0;
                    //MeNCARI LAMA JADI ANGGOTA
                    if($numMonth >= 12 && $numMonth < 24 ){
                        $lamaanggota = $criteria->umum_1_value_1;
                    }else if($numMonth >= 24 && $numMonth < 36){
                        $lamaanggota = $criteria->umum_1_value_2;
                    } else if($numMonth >= 36 && $numMonth < 48){
                        $lamaanggota = $criteria->umum_1_value_3;
                    } else if($numMonth >= 48){
                        $lamaanggota = $criteria->umum_1_value_4;
                    }
                    //MENCARI AKTIF SIMPAN PINJAM
                    if($simpanpinjam == 0){
                        $aktifsp = $criteria->umum_2_value_1;
                    }else if($simpanpinjam > 0 && $simpanpinjam < 2){
                        $aktifsp = $criteria->umum_2_value_2;
                    }else if($simpanpinjam > 1 && $simpanpinjam < 3){
                        $aktifsp = $criteria->umum_2_value_3;
                    }else if($simpanpinjam > 2){
                        $aktifsp = $criteria->umum_2_value_4;
                    }

                    //BEASISWA DITERIMA
                    if($takebeasiswa > 2){
                        $beasiswaditerima = $criteria->umum_3_value_1;
                    }else if($takebeasiswa > 1 && $takebeasiswa < 3){
                        $beasiswaditerima = $criteria->umum_3_value_2;
                    }else if($takebeasiswa > 0 && $takebeasiswa < 2){
                        $beasiswaditerima = $criteria->umum_3_value_3;
                    }else if($takebeasiswa == 0){
                        $beasiswaditerima = $criteria->umum_3_value_4;
                    }

                    $flagrekomendasi = Input::get('umum_5');
                    if($flagrekomendasi != 0){
                        $flagrekomendasi = 1;
                    }else{
                        $flagrekomendasi = 0;
                    }

                    $flagakademik = Input::get('khusus_2');
                    if($flagakademik != 0){
                        $flagakademik = 1;
                    }else{
                        $flagakademik = 0;
                    }

                    $U4=Input::get('umum_4');
                    if($U4 == $criteria->umum_4_value_1){
                        $golongan = '3';
                    }elseif($U4 == $criteria->umum_4_value_2){
                        $golongan = '2';
                    }elseif($U4 == $criteria->umum_4_value_3){
                        $golongan = '1';
                    }
                    $U5=Input::get('umum_5');
                  
                    $K1=Input::get('khusus_1');
                    $K2=Input::get('khusus_2');
                    
                    $hitungumum = $lamaanggota + $aktifsp + $beasiswaditerima + $U4 + $U5;
                    $hitugkhusus = $K1 + $K2;
                    $total = $hitungumum + $hitugkhusus;
                    
                    $takepekerjaan = Pekerjaan::where('NO_ANGGOTA', $user)->first(); 
                    $kdpek = $takepekerjaan->KDPEK; 
                
                    $taketblgroup = Tbl_Group::where('KDPEK', $kdpek)->first();
                    // $takecabang = Sandi_Bi::where('KD_BI', 'CG')
                    //                      ->where('KD_SANDI', $taketblgroup->CABANG_ID)->first();
            

                    $namaanggota = $take->NAMA_LENGKAP;
                    $tglmasuk = $take->TGLJD_ANGGOTA;
                    $namaperusahaan = $takepekerjaan->NMPRS;
                    $cabangperusahaan = $taketblgroup->CABANG;
                    $alamatperusahaan = $taketblgroup->ALAMAT;
                    //$bagianpekerjaan = $takebagian->KETERANGAN;
             
                    $alamatrumah = $dataanggota->ALAMAT_LENGKAP;
                    $kota = $dataanggota->CTY;
                    
//                    $datapendaftaran = new Mstbeasiswa;
                    
                    
                    $uppernakak = Input::get('nama_anak');
                    $NM_ANAK= strtoupper($uppernakak);
                    $upperlahir = Input::get('kota_lahir');
                    $KT_LAHIR = strtoupper($upperlahir);
                    $tgllahirori = Input::get('tgl_lahir');
                    $konversitgl = date("Y-m-d", strtotime($tgllahirori));
                    $TTL = $konversitgl;

                    $uppersekolah = Input::get('nama_sekolah');
                    $NM_SKL = strtoupper($uppersekolah);

                    $statuspendidikan = Input::get('st_pendidikan');
                    $tingkatanpedidikan = Input::get('kelas');
           
                    if($statuspendidikan == 'SD' AND $tingkatanpedidikan == '6'){
                        $ST_PEND = 'SMP';
                        $ST_TINGKATAN = '1';                        
                    }else if($statuspendidikan == 'SMP' AND $tingkatanpedidikan == '3'){
                        $ST_PEND = 'SMA';
                        $ST_TINGKATAN = '1'; 
                    }else{
                        $ST_PEND = Input::get('st_pendidikan'); //
                        $ST_TINGKATAN = Input::get('kelas'); //
                    }

                    $ST_PEND_LM = $statuspendidikan;
                    $ST_TINGKATAN_LM = $tingkatanpedidikan;
                    $LBG_PEND = Input::get('lemb_pendidikan');
                    $PROV_SKL = Input::get('prov_sekolah');  
                    $JENKEL = Input::get('jenis_kelamin');
                    $K_UMUM = $hitungumum;
                    $K_KHUSUS = $hitugkhusus;      
                    $SCORE= $total;
                    $STATUS = 0;
                    $KET = 'UNCHECK';
                    $flag_terima = 0;
                    $KDPEK= $kdpek;
                    $KDHO = $taketblgroup->KDPRS_PENAGIHAN;
                    $PERIODE = $thisyear;
                    $NO_KK = $no_kk;
                    $NM_ANGGOTA = $namaanggota;
                    $TGLMSK_KAI = $tglmasuk;
                    $NM_PERUSAHAAN = $namaperusahaan;
                    $CABANG = $cabangperusahaan;
                    $ALAMAT_PERUSAHAAN = $alamatperusahaan;
                    //$datapendaftaran->BAGIAN = $bagianpekerjaan;
                    $GOLONGAN = $golongan;
                    $ALAMAT_RUMAH = $alamatrumah;
                    $KOTA = $kota;
                    $NPWP = $npwp;
                    $TELP = $no_telp;
                    $NOHP = $no_hp;
                    $NO_REKENING = $no_rek;
                    $ATAS_NAMA = $atasnama;
                    $NAMA_BANK = $namabank;
                    $U1 = $lamaanggota;
                    $U2 = $aktifsp;
                    $U3 = $beasiswaditerima;
                  
                    //HAPUS FILE JIKA ADA
                    $prestasi_anggota = DokumenAnggota::where([['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'PRESTASI ANGGOTA']])
                                                            ->first();
                    $prestasi_anak = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'SERTIFIKAT AKADEMIK/NON AKADEMIK']])
                                                            ->first();
               
                  
                    $destinationPath = 'assets/app/images/anggota/'.$user;
                    if($flagrekomendasi == 0 && !is_null($prestasi_anggota)){
                            File::delete($destinationPath.'\\'.$prestasi_anggota->NAMA_FILE);
                            DokumenAnggota::where([ ['JENIS','LIKE','%PRESTASI ANGGOTA%'],['NO_ANGGOTA', '=', $user] ])->delete();
            
                    } 

                    if($flagakademik == 0 && !is_null($prestasi_anak)){
                            File::delete($destinationPath.'\\'.$prestasi_anak->NAMA_FILE);
                            DokumenAnggota::where([ ['JENIS','LIKE','%SERTIFIKAT AKADEMIK/NON AKADEMIK%'],['NO_ANGGOTA', '=', $user] ])->delete();
                      
                    }
                    // if($flagakademik == 1 && !is_null($prestasi_anak)){
                    //     foreach ($prestasi_anak as $file) {
                    //         File::delete($destinationPath.'\\'.$file->NAMA_FILE);
                    //         DokumenAnggota::where([ ['JENIS','LIKE','%SURAT AKADEMIK%'],['NO_ANGGOTA', '=', $user] ])->delete();
                    //   }
                    // }
                    //END HAPUS FILE
                    try {
                             Mstbeasiswa::where('no_anggota', $user)->update(['NM_ANAK' => $NM_ANAK, 'KT_LAHIR' => $KT_LAHIR, 'TTL' => $TTL, 'NM_SKL' => $NM_SKL, 'ST_PEND' => $ST_PEND, 'ST_TINGKATAN' => $ST_TINGKATAN, 'ST_PEND_LM' => $statuspendidikan, 'ST_TINGKATAN_LM' => $tingkatanpedidikan, 'LBG_PEND' => $LBG_PEND, 'PROV_SKL' => $PROV_SKL, 'JENKEL' => $JENKEL, 'K_UMUM' => $K_UMUM, 'K_KHUSUS' => $K_KHUSUS, 'SCORE' => $SCORE, 'STATUS' => $STATUS, 'KET' => $KET, 'flag_terima' => $flag_terima, 'PERIODE' => $PERIODE, 'NO_KK' => $NO_KK, 'GOLONGAN' => $GOLONGAN, 'ALAMAT_RUMAH' => $ALAMAT_RUMAH, 'KOTA' => $KOTA, 'NPWP' => $NPWP, 'TELP' => $TELP, 'NOHP' => $NOHP, 'NO_REKENING' => $NO_REKENING, 'ATAS_NAMA' => $ATAS_NAMA, 'NAMA_BANK' => $NAMA_BANK, 'U1' => $U1, 'U2' => $U2, 'U3' => $U3, 'U4' => $U4, 'U5' => $U5, 'K1' => $K1, 'K2' => $K2, 'flagsertifikat' => $flagrekomendasi, 'flagakademik' => $flagakademik]);



                             $ambil = Mstbeasiswa::where('NO_ANGGOTA',$user)->first();
                             if(!empty($ambil->id)){
                                 if($ambil->flagrevisi == '1') {
                                     $ambil->flagrevisi = 2;
                                     $ambil->save();
                                 }
                             }
                             return redirect('/pendaftaran_beasiswa')->with('berhasil','formulir beasiswa anda berhasil diperbaharui')
                                                             ->with('ambil', $ambil);


                        } catch (Exception $e) {
                             $ambil = Mstbeasiswa::where('NO_ANGGOTA',$user)->first();
                             return redirect('/pendaftaran_beasiswa')->with('gagal','formulir beasiswa tidak berhasil diperbaharui')
                                                             ->with('ambil', $ambil);
                        }
                    //END UPDATE DATA BEASISWA

        
            }

         }else{
                return redirect('/home');  
         }
         
    }


    public function updatelampiranbeasiswa(Request $request){
         $user = Auth::user()->NO_ANGGOTA;
         $today = date("Y"); 
         
 
         $validator = Validator::make($request->all(), [
                    'surat_tabungan' => 'max:1024', //DATA ANGGOTA mimes:jpeg,pdf,png|
                    'kartu_keluarga' => 'max:1024',
                    'prestasi_anggota' => 'max:1024',
                    '1_nilai_a' => 'max:2000', //DATA ANAK
                    'surat_akademik' => 'max:1024',
                    'keterangan_prestasi' => 'string|max:255',
                    'keterangan_akademik' => 'string|max:255',

                ]);

               if($validator->fails()) {
                    return redirect('/editlampiranbeasiswa')
                                ->withInput()
                                ->withErrors($validator, 'insert')
                                ->with('message', 'Data anda tidak berhasil disimpan');
                             
                }

                $keterangan_prestasi = $request->input('keterangan_prestasi');
                $keterangan_akademik = $request->input('keterangan_akademik');
          
                try {
                    Mstbeasiswa::where('no_anggota', $user)->update(['keterangan_prestasi' => $keterangan_prestasi, 'keterangan_akademik' => $keterangan_akademik]);   
                } catch (Exception $e) {
                     return redirect('/editlampiranbeasiswa')
                                ->withInput()
                                ->with('message', 'Data anda tidak berhasil disimpan');
                }

                $surat_tabungan = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'KARTU TABUNGAN'] ])->first();   

                $surat_kk = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'KARTU KELUARGA'] ])->first();  

                $prestasi_anggota = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'PRESTASI ANGGOTA'] ])->first();
                
                $nilai_a = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'SURAT KETERANGAN NILAI'] ])->first();
                
                $prestasi_anak = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'SERTIFIKAT AKADEMIK/NON AKADEMIK'] ])->first();
                

                $destinationPath = 'assets/app/images/anggota/'.$user;

                  if(is_null($surat_tabungan)){
                      if(Input::hasFile('surat_tabungan')){
                        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                        foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                        $file=Input::file('surat_tabungan');
                        $extension = Input::file('surat_tabungan')->getClientOriginalExtension(); // getting image extension
                        $filename = $name.'.'.$extension;
                        $file->move($destinationPath, $filename);
                        $DokumenAnggota = new DokumenAnggota;
                        $DokumenAnggota->NO_ANGGOTA = $user;
                        $DokumenAnggota->NAMA_FILE = $filename;
                        $DokumenAnggota->JENIS = 'KARTU TABUNGAN';
                        $DokumenAnggota->LAMPIRAN = 'O';
                        $DokumenAnggota->PERIODE = $today;
                        $DokumenAnggota->save();
                        
                    }
                }else{
                    if(Input::hasFile('surat_tabungan')){
                        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                        foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                        $file=Input::file('surat_tabungan');
                        $extension = Input::file('surat_tabungan')->getClientOriginalExtension(); // getting image extension
                        $filename = $name.'.'.$extension;
                        $filelama = $surat_tabungan->NAMA_FILE;
                        File::delete($destinationPath.'\\'.$filelama);
                        $file->move($destinationPath, $filename);
                        DokumenAnggota::where([['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],['JENIS', '=', 'KARTU TABUNGAN']])
                                        ->update(['NAMA_FILE' => $filename]); 
                    }
                }


                if(is_null($surat_kk)){             
                    if(Input::hasFile('kartu_keluarga')){
                         $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                        foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                        $file=Input::file('kartu_keluarga');
                        $extension = Input::file('kartu_keluarga')->getClientOriginalExtension(); // getting image extension
                        $filename = $name.'.'.$extension;
                        $file->move($destinationPath, $filename);
                        $DokumenAnggota = new DokumenAnggota;
                        $DokumenAnggota->NO_ANGGOTA = $user;
                        $DokumenAnggota->NAMA_FILE = $filename;
                        $DokumenAnggota->JENIS = 'KARTU KELUARGA';
                        $DokumenAnggota->LAMPIRAN = 'O';
                        $DokumenAnggota->PERIODE = $today;
                        $DokumenAnggota->save();
                        
                    }
                }else{
                      if(Input::hasFile('kartu_keluarga')){
                         $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                        foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                        $file=Input::file('kartu_keluarga');
                        $extension = Input::file('kartu_keluarga')->getClientOriginalExtension(); // getting image extension
                        $filename = $name.'.'.$extension;
                        $filelama = $surat_kk->NAMA_FILE;
                        File::delete($destinationPath.'\\'.$filelama);
                        $file->move($destinationPath, $filename);
                        DokumenAnggota::where([['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],['JENIS', '=', 'KARTU KELUARGA']])
                                        ->update(['NAMA_FILE' => $filename]); 
                        
                    }
                }

                if(is_null($prestasi_anggota)){
                     if(Input::hasFile('prestasi_anggota')){
                        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                        foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];

                        $file=Input::file('prestasi_anggota');
                        $extension = Input::file('prestasi_anggota')->getClientOriginalExtension(); // getting image extension
                        $filename = $name.'.'.$extension;
                        $file->move($destinationPath, $filename);
                        $DokumenAnggota = new DokumenAnggota;
                        $DokumenAnggota->NO_ANGGOTA = $user;
                        $DokumenAnggota->NAMA_FILE = $filename;
                        $DokumenAnggota->JENIS = 'PRESTASI ANGGOTA';
                        $DokumenAnggota->LAMPIRAN = 'O';
                        $DokumenAnggota->PERIODE = $today;
                        $DokumenAnggota->save();
                    } 
                }else{
                     if(Input::hasFile('prestasi_anggota')){
                        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                        foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                        $file=Input::file('prestasi_anggota');
                        $extension = Input::file('prestasi_anggota')->getClientOriginalExtension(); // getting image extension
                        $filename = $name.'.'.$extension;
                        $filelama = $prestasi_anggota->NAMA_FILE;
                        File::delete($destinationPath.'\\'.$filelama);
                        $file->move($destinationPath, $filename);
                        DokumenAnggota::where([['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],['JENIS', '=', 'PRESTASI ANGGOTA']])
                                        ->update(['NAMA_FILE' => $filename]); 
                    }
                }       
              


                if(is_null($nilai_a)){             
                    if(Input::hasFile('1_nilai_a')){
                         $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                        foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                        $file=Input::file('1_nilai_a');
                        $extension = Input::file('1_nilai_a')->getClientOriginalExtension(); // getting image extension
                        $filename = $name.'.'.$extension;
                        $file->move($destinationPath, $filename);
                        $DokumenAnggota = new DokumenAnggota;
                        $DokumenAnggota->NO_ANGGOTA = $user;
                        $DokumenAnggota->NAMA_FILE = $filename;
                        $DokumenAnggota->JENIS = 'SURAT KETERANGAN NILAI';
                        $DokumenAnggota->LAMPIRAN = 'O';
                        $DokumenAnggota->PERIODE = $today;
                        $DokumenAnggota->save();
                        
                    }
                }else{
                      if(Input::hasFile('1_nilai_a')){
                         $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                        foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                        $file=Input::file('1_nilai_a');
                        $extension = Input::file('1_nilai_a')->getClientOriginalExtension(); // getting image extension
                        $filename = $name.'.'.$extension;
                        $filelama = $nilai_a->NAMA_FILE;
                        File::delete($destinationPath.'\\'.$filelama);
                        $file->move($destinationPath, $filename);
                        DokumenAnggota::where([['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],['JENIS', '=', 'SURAT KETERANGAN NILAI']])
                                        ->update(['NAMA_FILE' => $filename]); 
                        
                    }
                }

            if(is_null($prestasi_anak)){
                if(Input::hasFile('surat_akademik')){
                    $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                    foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                    $file=Input::file('surat_akademik');
                    $extension = Input::file('surat_akademik')->getClientOriginalExtension(); // getting image extension
                    $filename = $name.'.'.$extension;
                    $file->move($destinationPath, $filename);
                    $DokumenAnggota = new DokumenAnggota;
                    $DokumenAnggota->NO_ANGGOTA = $user;
                    $DokumenAnggota->NAMA_FILE = $filename;
                    $DokumenAnggota->JENIS = 'SERTIFIKAT AKADEMIK/NON AKADEMIK';
                    $DokumenAnggota->LAMPIRAN = 'A';
                    $DokumenAnggota->PERIODE = $today;
                    $DokumenAnggota->save();
                }
            }else{
                if(Input::hasFile('surat_akademik')){
                    $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                    foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                    $file=Input::file('surat_akademik');
                    $extension = Input::file('surat_akademik')->getClientOriginalExtension(); // getting image extension
                    $filename = $name.'.'.$extension;
                    $filelama = $prestasi_anak->NAMA_FILE;
                    File::delete($destinationPath.'\\'.$filelama);
                    $file->move($destinationPath, $filename);
                    DokumenAnggota::where([['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],['JENIS', '=', 'SERTIFIKAT AKADEMIK/NON AKADEMIK']])
                                        ->update(['NAMA_FILE' => $filename]); 
                   
                }
            }

            $ambil = Mstbeasiswa::where('NO_ANGGOTA',$user)->first();


            if(!empty($ambil->id)){
                if($ambil->flagrevisi == '1'){
                    $ambil->flagrevisi = 2;
                    $ambil->save();
                }
            }

        return redirect('/pendaftaran_beasiswa')->with('berhasil','Berkas anda berhasil diperbaharui');
    }


    public function kelengkapandokumen(){

       $user = Auth::user()->NO_ANGGOTA;
       $beasiswa = Mstbeasiswa::where('NO_ANGGOTA', $user)->first();
       $flagsertifikat = $beasiswa->flagsertifikat;
       $flagakademik = $beasiswa->flagakademik;

        $prestasi_anggota = DokumenAnggota::where([['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'PRESTASI ANGGOTA']])
                                                            ->first();

        $prestasi_anak = DokumenAnggota::where([['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'SERTIFIKAT AKADEMIK/NON AKADEMIK']])
                                                            ->first();

        $fileprestasianggota = 0;
        $fileprestasianak = 0;
    
            if($flagsertifikat == 1){
               if(is_null($prestasi_anggota)){
                    $fileprestasianggota = 1;
               } 
            }

            if($flagakademik == 1){
                 if(is_null($prestasi_anak)){
                    $fileprestasianak = 1;

               } 
            }

       $fullinfo = Statusbea::where('id', 4)->first();
      // $judul = $fullinfo->JUDUL;
       $isi = $fullinfo->KETERANGAN;
        if(!is_null($beasiswa)){
                if($beasiswa->flagsubmit == '1'){
                     return view('app.pages.pendaftaran_beasiswa.kelengkapan_dokumen',compact('beasiswa','fileprestasianggota','fileprestasianak'));  
                }else{
                     return redirect('/pendaftaran_beasiswa');  
                }
        }else{
            return redirect('/home');
        }
    }

    
    public function storekelengkapandokumen(Request $request){

         $user = Auth::user()->NO_ANGGOTA;
         $today = date("Y"); 
         

          $validator = Validator::make($request->all(), [
                    'prestasi_anggota' => 'max:1024',
                    'surat_akademik' => 'max:1024',
                    'keterangan_prestasi' => 'string|max:255',
                    'keterangan_akademik' => 'string|max:255',
                    
                ]);

               if($validator->fails()) {
                    return redirect('/kelengkapandokumen')
                                ->withInput()
                                ->withErrors($validator, 'insert')
                                ->with('message', 'Data anda tidak berhasil disimpan');
                             
                }

                $keterangan_prestasi = $request->input('keterangan_prestasi');
                $keterangan_akademik = $request->input('keterangan_akademik');
          
                try {
                    Mstbeasiswa::where('no_anggota', $user)->update(['keterangan_prestasi' => $keterangan_prestasi, 'keterangan_akademik' => $keterangan_akademik]);   
                } catch (Exception $e) {
                     return redirect('/editlampiranbeasiswa')
                                ->withInput()
                                ->with('message', 'Data anda tidak berhasil disimpan');
                }

                    //---------PROSES UPLOAD FILE DAN INPUT KE DATABSE-----------//
           
                 
                $destinationPath = 'assets/app/images/anggota/'.$user;
                
        
                    //DOKUMEN ANAK//-----------------------------------------------------//

                $prestasi_anggota = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'PRESTASI ANGGOTA'] ])->first();
              
                $prestasi_anak = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'SERTIFIKAT AKADEMIK/NON AKADEMIK'] ])->first();
                
                if(is_null($prestasi_anggota)){
                     if(Input::hasFile('prestasi_anggota')){
                        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                        foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];

                        $file=Input::file('prestasi_anggota');
                        $extension = Input::file('prestasi_anggota')->getClientOriginalExtension(); // getting image extension
                        $filename = $name.'.'.$extension;
                        $file->move($destinationPath, $filename);
                        $DokumenAnggota = new DokumenAnggota;
                        $DokumenAnggota->NO_ANGGOTA = $user;
                        $DokumenAnggota->NAMA_FILE = $filename;
                        $DokumenAnggota->JENIS = 'PRESTASI ANGGOTA';
                        $DokumenAnggota->LAMPIRAN = 'O';
                        $DokumenAnggota->PERIODE = $today;
                        $DokumenAnggota->save();
                    } 
                }else{
                     if(Input::hasFile('prestasi_anggota')){
                        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                        foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                        $file=Input::file('prestasi_anggota');
                        $extension = Input::file('prestasi_anggota')->getClientOriginalExtension(); // getting image extension
                        $filename = $name.'.'.$extension;
                        $filelama = $prestasi_anggota->NAMA_FILE;
                        File::delete($destinationPath.'\\'.$filelama);
                        $file->move($destinationPath, $filename);
                        DokumenAnggota::where([['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],['JENIS', '=', 'PRESTASI ANGGOTA']])
                                        ->update(['NAMA_FILE' => $filename]); 
                    }
                }       
              


            if(is_null($prestasi_anak)){
                if(Input::hasFile('surat_akademik')){
                    $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                    foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                    $file=Input::file('surat_akademik');
                    $extension = Input::file('surat_akademik')->getClientOriginalExtension(); // getting image extension
                    $filename = $name.'.'.$extension;
                    $file->move($destinationPath, $filename);
                    $DokumenAnggota = new DokumenAnggota;
                    $DokumenAnggota->NO_ANGGOTA = $user;
                    $DokumenAnggota->NAMA_FILE = $filename;
                    $DokumenAnggota->JENIS = 'SERTIFIKAT AKADEMIK/NON AKADEMIK';
                    $DokumenAnggota->LAMPIRAN = 'A';
                    $DokumenAnggota->PERIODE = $today;
                    $DokumenAnggota->save();
                }
            }else{
                if(Input::hasFile('surat_akademik')){
                    $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                         .'0123456789'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $name = '';
                    foreach (array_rand($seed, 10) as $k) $name .= $seed[$k];
                    $file=Input::file('surat_akademik');
                    $extension = Input::file('surat_akademik')->getClientOriginalExtension(); // getting image extension
                    $filename = $name.'.'.$extension;
                    $filelama = $prestasi_anak->NAMA_FILE;
                    File::delete($destinationPath.'\\'.$filelama);
                    $file->move($destinationPath, $filename);
                    DokumenAnggota::where([['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],['JENIS', '=', 'SERTIFIKAT AKADEMIK/NON AKADEMIK']])
                                        ->update(['NAMA_FILE' => $filename]); 
                   
                }
            }


               // $datapendaftaran = new Mstbeasiswa;
               // Mstbeasiswa::where('no_anggota', $user)->update(['flagsubmit' => '1']);   
                return redirect('/pendaftaran_beasiswa')->with('berhasil','Berkas anda berhasil diperbaharui');  
                
    }

    public function editlampiranbeasiswa(){
        $user = Auth::user()->NO_ANGGOTA;
        $beasiswa = Mstbeasiswa::where('NO_ANGGOTA', $user)->first();
        $fullinfo = Statusbea::where('id', 4)->first();
      // $judul = $fullinfo->JUDUL;
        $isi = $fullinfo->KETERANGAN;
        $todays_date = strtotime(date("Y-m-d H:m:s"));
        $tanggaledit = strtotime($beasiswa->TGL_BATAS_EDIT);

        $criteria = json_decode(Statusbea::where('id',16)->first()->KETERANGAN);

        $surat_tabungan = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'KARTU TABUNGAN'] ])->first();   

        if(is_null($surat_tabungan)){
            $surat_tabungan['NAMA_FILE'] = '#';
        }     

        $surat_kk = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'KARTU KELUARGA'] ])->first(); 

        if(is_null($surat_kk)){
            $surat_kk['NAMA_FILE'] = '#';
        }     
        

        $prestasi_anggota = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'PRESTASI ANGGOTA'] ])->first();
    
        if(is_null($prestasi_anggota)){
            $prestasi_anggota['NAMA_FILE'] = '#';
        }  
                
        $nilai_a = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'SURAT KETERANGAN NILAI'] ])->first();
        
        if(is_null($nilai_a)){
            $nilai_a['NAMA_FILE'] = '#';
        } 

        $prestasi_anak = DokumenAnggota::where([ ['NO_ANGGOTA',Auth::user()->NO_ANGGOTA],
                                                             ['JENIS', '=', 'SERTIFIKAT AKADEMIK/NON AKADEMIK'] ])->first();
    
        if(is_null($prestasi_anak)){
            $prestasi_anak['NAMA_FILE'] = '#';
        } 

//        if($todays_date <= $tanggaledit ){
            if(!is_null($beasiswa)){
                    if($beasiswa->flagsubmit == '1' && $beasiswa->STATUS == '0'){
                         return view('app.pages.pendaftaran_beasiswa.edit_lampiran_beasiswa',compact('beasiswa','surat_tabungan','surat_kk','prestasi_anggota','nilai_a','prestasi_anak','criteria'));
                    }else{
                         return redirect('/pendaftaran_beasiswa');  
                    }
            }else{
                return redirect('/home');
            }
//         }else{
//            return redirect('/home');
//         }
    }


  public function sertifikat(){
        $user = Auth::user()->NO_ANGGOTA;
        $datas = Mstbeasiswa::where('NO_ANGGOTA', $user)->first();
        if(!is_null($datas)){
            if($datas->FLAG_TERIMA == '1'){
                $pdf = PDF::loadView('app.pages.pendaftaran_beasiswa.sertifikat', compact('datas'))->setPaper('a4','landscape');
                return $pdf->stream($user.'.pdf');
            }else{
                return redirect('/home');
            }
        }else{

            return redirect('/home');
        }
   }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
