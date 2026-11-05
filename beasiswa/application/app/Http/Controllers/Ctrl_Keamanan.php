<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Input;
use Crypt;
use Validator;

class Ctrl_Keamanan extends Controller
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
        $email = User::where('NO_ANGGOTA', $user)->first();
        $cek = $email->email;
        if($cek == null){
            return redirect('/data_anggota')->with('message','Harap perbaharui dan masukan e-mail anda sebelum merubah password');  
        }else{
            return view('app.pages.keamanan.keamanan');
        }
    }

   
    public function Update_Password(Request $request){
        
        $user = Auth::user()->NO_ANGGOTA;
        $passwordlama = Input::get('password_lama');
        $passwordaru = Input::get('password_baru');
        $ulangipassword = Input::get('ulangi_password');

        $cyphetext = bcrypt($passwordlama);
        //echo $cyphetext;
        $passwordtersimpan = User::where('NO_ANGGOTA', $user)->first();

        $hash = $passwordtersimpan->password;
    

        if (password_verify($passwordlama, $hash)) {
            $validator = Validator::make($request->all(), [
            //data anak
            'password_baru' => 'required|string|min:8',
            'ulangi_password' => 'required|string|min:8',
                ]);

                if ($validator->fails()) {
                    return redirect('/keamanan')
                                ->withInput()
                                ->withErrors($validator, 'insert');
                                      
                }  

             $chiper = bcrypt($passwordaru);
             User::where('no_anggota', $user)->update(['password' => $chiper]);
             return redirect('/keamanan')->with('berhasil','password anda berhasil diperbaharui');  

        }else{
             
             $validator = Validator::make($request->all(), [
            //data anak
            'password_baru' => 'required|string|min:8',
            'ulangi_password' => 'required|string|min:8',
    
                ]);

            if ($validator->fails()) {
                    return redirect('/keamanan')
                                ->withInput()
                                ->withErrors($validator, 'insert')
                                ->with('message','Gagal, password lama yang anda masukan salah');          
               }else{
                    return redirect('/keamanan')
                                ->withInput()
                                ->with('message','Gagal, password lama yang anda masukan salah'); 
                 }

              
             
        }   
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
