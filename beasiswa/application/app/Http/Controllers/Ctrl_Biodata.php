<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\MasterAnggota;
use App\User;
use App\Pekerjaan;
use App\Dataanggota;
use App\Tbl_Pos;
use App\Tbl_Group;
use App\Sandi_Bi;
use App\Mstbeasiswa;

use Response;
use Ajax;
use Render;
use Input;
use DB;
use Validator;


class Ctrl_Biodata extends Controller
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

    public function index()
    {   


        $user = Auth::user()->NO_ANGGOTA;
        //mengambil CNO data dari table MSTCST berdasarkan no_anggota
        $ambil = MasterAnggota::where('NO_ANGGOTA', $user)->first();
        $cnm = $ambil->NAMA_LENGKAP;
        $flag = '0';
        $datapekerjaan = Pekerjaan::where('no_anggota', $user)->first();
        $dataanggota = Dataanggota::where('no_anggota', $user)->first();
       // return view('app.pages.biodata.biodata',compact('dataanggota','datapekerjaan','cnm','ambil','flag'));
        return view('app.pages.keanggotaan.biodata',compact('dataanggota','datapekerjaan','cnm','ambil','flag')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user()->NO_ANGGOTA;
        //mengambil data dari table MSTCST berdasarkan no_anggota
        $ambil = MasterAnggota::where('NO_ANGGOTA', $user)->first();

        $datapekerjaan = Pekerjaan::where('NO_ANGGOTA', $user)->first();
        $perusahaan = Tbl_Group::where('kdpek', $datapekerjaan->KDPEK)->first();
 
        $propinsi = Sandi_Bi::where('KD_BI','PR')->OrderBy('KD_SANDI','desc')->get();
        $dataanggota = Dataanggota::where('NO_ANGGOTA', $user)->first();
        $flagproses = '0';

        if(!is_null($dataanggota)){
          //  $kota = Sandi_Bi::where([ ['KD_BI','02'],['KD_SANDI',$dataanggota->LOKUSH] ])->first();
            $kota = Sandi_Bi::where([ ['KD_BI','02'],['GOL_SANDI',$dataanggota->PROPINSI], ['KD_SANDI','<>',$dataanggota->PROPINSI] ])->orderBy('KETERANGAN','asc')->get();
            $kecamatan = Tbl_Pos::select('LOKUSH','KECAMATAN')->where('LOKUSH',$dataanggota->LOKUSH)->orderBy('KECAMATAN','asc')->distinct()->get();
            $kelurahan = Tbl_Pos::select('LOKUSH','KELURAHAN')->where('KECAMATAN', $dataanggota->KECAMATAN)->orderBy('KELURAHAN','asc')->get(); 
            return view('app.pages.keanggotaan.edit_biodata')->with(['propinsi' => $propinsi, 'kota'=> $kota ,'kecamatan'=> $kecamatan, 'kelurahan' => $kelurahan, 'dataanggota' => $dataanggota,'mst' => $ambil ,'datapek' => $datapekerjaan,'dataper' => $perusahaan, 'flagproses' => $flagproses]);

          // print_r($kota);
        }else{
            return view('app.pages.keanggotaan.edit_biodata')->with(['propinsi' => $propinsi,'dataanggota' => $dataanggota,'mst' => $ambil ,'datapek' => $datapekerjaan,'dataper' => $perusahaan, 'flagproses' => $flagproses]);
        }
    }

    public function step_1(){
        $user = Auth::user()->NO_ANGGOTA;
        //mengambil data dari table MSTCST berdasarkan no_anggota
        $ambil = MasterAnggota::where('NO_ANGGOTA', $user)->first();

        $datapekerjaan = Pekerjaan::where('NO_ANGGOTA', $user)->first();
        $perusahaan = Tbl_Group::where('kdpek', $datapekerjaan->KDPEK)->first();
 
        $propinsi = Sandi_Bi::where('KD_BI','PR')->OrderBy('KD_SANDI','desc')->get();
        $dataanggota = Dataanggota::where('NO_ANGGOTA', $user)->first();
        $flagproses = '1';

        if(!is_null($dataanggota)){
          //  $kota = Sandi_Bi::where([ ['KD_BI','02'],['KD_SANDI',$dataanggota->LOKUSH] ])->first();
            $kota = Sandi_Bi::where([ ['KD_BI','02'],['GOL_SANDI',$dataanggota->PROPINSI], ['KD_SANDI','<>',$dataanggota->PROPINSI] ])->orderBy('KETERANGAN','asc')->get();
            $kecamatan = Tbl_Pos::select('LOKUSH','KECAMATAN')->where('LOKUSH',$dataanggota->LOKUSH)->orderBy('KECAMATAN','asc')->distinct()->get();
            $kelurahan = Tbl_Pos::select('LOKUSH','KELURAHAN')->where('KECAMATAN', $dataanggota->KECAMATAN)->orderBy('KELURAHAN','asc')->get(); 
            return view('app.pages.keanggotaan.edit_biodata')->with(['propinsi' => $propinsi, 'kota'=> $kota ,'kecamatan'=> $kecamatan, 'kelurahan' => $kelurahan, 'dataanggota' => $dataanggota,'mst' => $ambil ,'datapek' => $datapekerjaan,'dataper' => $perusahaan]);

          // print_r($kota);
        }else{
            return view('app.pages.keanggotaan.edit_biodata')->with(['propinsi' => $propinsi,'dataanggota' => $dataanggota,'mst' => $ambil ,'datapek' => $datapekerjaan,'dataper' => $perusahaan, 'flagproses' => $flagproses]);
        }
    }

    public function populatekota($kdsandi){

        $data['kota'] = Sandi_Bi::where([ ['KD_BI','02'],['GOL_SANDI',$kdsandi], ['KD_SANDI','<>',$kdsandi] ])->orderBy('KETERANGAN','asc')->get();
        return response($data, 200)
                  ->header('Content-Type', 'text/plain');
    
     }

    public function populatekecamatan($kdsandi){
    
        $data['kecamatan'] = Tbl_Pos::select('LOKUSH','KECAMATAN')->where('LOKUSH',$kdsandi)->orderBy('KECAMATAN','asc')->distinct()->get(); 
        return response($data, 200)
                  ->header('Content-Type', 'text/plain');
     }

     public function populatekelurahan($kdsandi){
    
        $data['kelurahan'] = Tbl_Pos::select('LOKUSH','KELURAHAN')->where('KECAMATAN',$kdsandi)->orderBy('KELURAHAN','asc')->get(); 
        return response($data, 200)
                  ->header('Content-Type', 'text/plain');
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


    public function Update_Biodata(Request $request)
    {
        

        $user = Auth::user()->NO_ANGGOTA;
        $al = $request->input('alamat');
        $alamat = strtoupper($al);
        $propinsi = $request->input('propinsi');
        $kota = $request->input('kota');
        $kecamatan = $request->input('kecamatan');
        $kelurahan = $request->input('kelurahan');
        $kodepos = $request->input('kodepos');
        $rt = $request->input('rt');
        $rw = $request->input('rw');
        $no_hp = $request->input('nomor_hp');
        $tlp = $request->input('nomor_telepon'); 
        $el = $request->input('email');
        $email = strtoupper($el);
        $no_npwp = Input::get('npwp');
        $npwp = str_replace(['-', '.'], '', $no_npwp);
        $flagproses = $request->input('flagproses');


        $validator = Validator::make($request->all(), [
            //data anak
            'nomor_hp' => 'required|string|max:15|min:5',
           // 'nomor_telepon' => 'string|max:15|min:5',
            // 'email' => 'required|string|max:50|unique:MST_ANGGOTA,', 
            'email' => 'required|string|email|max:255|unique:MST_ANGGOTA,email,'.Auth::user()->id,
            'alamat' => 'required|string|max:100|min:10',
            'propinsi' => 'required|string|max:4',
            'kota' => 'required|string|max:40',
            'kecamatan' => 'required|string|max:30',
            'kelurahan' => 'required|string|max:30',
            'kodepos' => 'required|string|max:6|min:5',
            'rt' => 'string|max:3|min:1',
            'rw' => 'string|max:3|min:1',
            'npwp' => 'required|string|min:16'
            
        ]);
        

        

        if ($validator->fails()) { 
                
            $kota =  Sandi_Bi::where([ ['KD_BI','02'],['GOL_SANDI',$propinsi], ['KD_SANDI','<>',$propinsi] ])->orderBy('KETERANGAN','asc')->get();
             
            
            return redirect()->route('data_anggota.show',$user)
                            ->withInput()
                            ->withErrors($validator, 'insert')
                            ->with('pesangagal', 'Data anda tidak berhasil diperbaharui')
                            ->with('kota', $kota);              
           }

          $cekdataanggota = Dataanggota::where('no_anggota', $user)->first();
          $cty = Sandi_Bi::where([ ['KD_BI','02'], ['KD_SANDI',$kota] ])->first();
          
          $kotaX = "";
          if(is_null($cty)){
            $kotaX = "LAINNYA";
          }

          if(is_null($cekdataanggota)){
             

              $Dataanggota = new Dataanggota;
              $Dataanggota->NO_ANGGOTA = $user;
              $Dataanggota->NPWP = $npwp;
              $Dataanggota->ALAMAT_LENGKAP = $alamat;
              $Dataanggota->PROPINSI = $propinsi;
              if($kotaX != ""){
                $Dataanggota->CTY = $kotaX;
                $Dataanggota->LOKUSH = '0000';
              }else{
                $kotaX = $cty->KETERANGAN;
                $Dataanggota->CTY = $kotaX;
                $Dataanggota->LOKUSH = $kota;
              }
              
              $Dataanggota->KECAMATAN = $kecamatan;
              $Dataanggota->KELURAHAN = $kelurahan;
              $Dataanggota->ZCD = $kodepos;
              $Dataanggota->RT = $rt;
              $Dataanggota->RW = $rw;
              $Dataanggota->NOHP = $no_hp;
              $Dataanggota->PHN = $tlp;
              $Dataanggota->EMAIL = $email;
              $Dataanggota->save();        
              User::where('no_anggota', $user)->update(['EMAIL' => $email]);

              if($flagproses == 1){
                    return redirect('/pendaftaran_beasiswa');
              }else{
                    return redirect('/data_anggota')->with('berhasil', 'data anda berhasil diperbaharui');  
              }

          }else{

              if($kotaX != ""){
               //$kotaX = $kotaX;
                $lokush = '0000';
              }else{
                $kotaX = $cty->KETERANGAN;
                $lokush = $kota;
              }
        
             Dataanggota::where('no_anggota', $user)->update(['NPWP' => $npwp, 'ALAMAT_LENGKAP' => $alamat, 'PROPINSI' => $propinsi, 'ZCD' => $kodepos,'CTY' => $kotaX, 'LOKUSH' => $lokush, 'PHN' => $tlp, 'NOHP' => $no_hp, 'EMAIL' => $email,'KELURAHAN' => $kelurahan, 'KECAMATAN' => $kecamatan,'RT' => $rt, 'RW' => $rw ]);

             User::where('no_anggota', $user)->update(['EMAIL' => $email]);

              if($flagproses == 1){
                    return redirect('/pendaftaran_beasiswa');
              }else{
                    return redirect('/data_anggota')->with('berhasil', 'data anda berhasil diperbaharui');  
              }
         }
          

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
