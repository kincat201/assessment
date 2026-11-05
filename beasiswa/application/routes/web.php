<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Panduan Beasiswa//
Route::resource('panduan_beasiswa', 'Ctrl_Panduan_Beasiswa');
//End Panduan Beasiswa//

//Biodata Anggota//
Route::resource('data_anggota', 'Ctrl_Biodata'); 
Route::post('updatebiodata','Ctrl_Biodata@Update_Biodata');
Route::get('step_1','Ctrl_Biodata@step_1');
Route::get('populatekota/{kdsandi}','Ctrl_Biodata@populatekota');
Route::get('populatekecamatan/{kdsandi}','Ctrl_Biodata@populatekecamatan');
Route::get('populatekelurahan/{kdsandi}','Ctrl_Biodata@populatekelurahan');
//End Biodata Anggota//

//Keamanan//
Route::resource('keamanan', 'Ctrl_Keamanan'); 
Route::post('updatepassword','Ctrl_Keamanan@Update_Password');
//End Keamanan//

//Pengumuman//
Route::resource('pengumuman_beasiswa', 'Ctrl_Pengumuman_Beasiswa');
Route::get('informasi_beasiswa', 'Ctrl_Pengumuman_Beasiswa@informasi_beasiswa');
//End Pengumuman//

//Pendaftaran Formulir Beasiswa//
Route::resource('pendaftaran_beasiswa', 'Ctrl_Pendaftaran_Beasiswa');  
Route::post('storeformbeasiswa', 'Ctrl_Pendaftaran_Beasiswa@store');
Route::post('storelampiranbeasiswa', 'Ctrl_Pendaftaran_Beasiswa@storelampiranbeasiswa');
Route::get('pendaftaran_beasiswa_step_1','Ctrl_Pendaftaran_Beasiswa@pendaftaran_beasiswa_step_1');
Route::post('updateformbeasiswa', 'Ctrl_Pendaftaran_Beasiswa@updateformbeasiswa');
Route::post('updatelampiranbeasiswa', 'Ctrl_Pendaftaran_Beasiswa@updatelampiranbeasiswa');
Route::post('storekelengkapandokumen', 'Ctrl_Pendaftaran_Beasiswa@storekelengkapandokumen');
Route::post('storebackstep','Ctrl_Pendaftaran_Beasiswa@storebackstep');
Route::get('uploadlampiran','Ctrl_Pendaftaran_Beasiswa@uploadlampiran');
Route::get('editformulirbeasiswa','Ctrl_Pendaftaran_Beasiswa@editformulirbeasiswa');
Route::get('editlampiranbeasiswa','Ctrl_Pendaftaran_Beasiswa@editlampiranbeasiswa');
Route::get('kelengkapandokumen','Ctrl_Pendaftaran_Beasiswa@kelengkapandokumen');
Route::get('sertifikat','Ctrl_Pendaftaran_Beasiswa@sertifikat');

//End Pengumuman//

//HUBUNGI KAMI/
Route::get('hubungikami','Ctrl_General@hubungi_kami');
//END HUBUNGI KAMI

//NOTIFIKASI/
Route::get('notifikasi','Ctrl_General@notifikasi');
Route::get('notificationRead/{id}','Ctrl_General@notificationRead');
Route::get('notificationReadAll','Ctrl_General@notificationReadAll');
//NOTIFIKASI

//ERROR//
// Route::get('404', function () {
    // return "Halaman Tidak Ditemukan";
// })->name('404');
//END ERROR
// //UNTUK ROUTE SEBELUM LOGIN
// Route::get('populatekotapendaftar&{kdsandi}','pendaftaran@populatekotapendaftar');
// Route::get('populateperusahaanpendaftar&{kdsandi}','pendaftaran@populateperusahaanpendaftar');
// Route::get('populatekecamatanpendaftar&{kdsandi}','pendaftaran@populatekecamatanpendaftar');
// Route::get('populatekelurahanpendaftar&{kdsandi}','pendaftaran@populatekelurahanpendaftar');

// //---------Route Beasiswa---------------// 
// Route::get('DownloadTemplate','pendaftaran@DownloadTemplate');
// Route::get('/daftarbeasiswaback','BeasiswaAstraController@daftarbeasiswaback');
// Route::get('/hubungikami','InfoAnggotaController@hubungikami');

// Route::post('/updateprivasi','InfoAnggotaController@updateprivasi');
// Route::post('/updateprivasistep1','InfoAnggotaController@updateprivasistep1');
// Route::post('/storeformbeasiswa', 'BeasiswaAstraController@store'); 
// Route::post('/updatestore', 'BeasiswaAstraController2@updatestore'); //updatestore
// Route::post('/storelampiranbeasiswa', 'BeasiswaAstraController@storelampiranbeasiswa');
// Route::get('/editdataanggota','InfoAnggotaController@editdataanggota');
// Route::get('/editdataanggotabeasiswa','InfoAnggotaController@editdataanggotabeasiswa');
// Route::get('/editformulir','BeasiswaAstraController@editformulir');
// Route::get('/editlampiran','BeasiswaAstraController@editlampiran');
// Route::get('/kelengkapandokumen','BeasiswaAstraController@kelengkapandokumen');
// Route::post('/kelengkapandokumenbeasiswa','BeasiswaAstraController2@kelengkapandokumenbeasiswa');
// Route::post('/editformulirbeasiswa','BeasiswaAstraController2@editformulirbeasiswa');
// Route::post('/editlampiranbeasiswa','BeasiswaAstraController2@editlampiranbeasiswa');


// Route::post('/updatedokumen', 'BeasiswaAstraController@updatedokumenbeasiswa');
// Route::post('/storedatapenerima','BeasiswaAstraController@storedatapenerima');
// Route::get('/daftarbeasiswa','BeasiswaAstraController@pendaftaran');
// Route::get('/uploadlampiran','BeasiswaAstraController@uploadlampiran');
// Route::get('/p_beasiswa','BeasiswaAstraController@panduanbeasiswa');
// Route::get('/pengumumanbeasiswa','BeasiswaAstraController@PengumumanBeasiswa');
// Route::get('/buktiterima&{no_anggota}','BeasiswaAstraController@buktiterima');
// Route::get('/sertifikat','BeasiswaAstraController@sertifikat');
// //Route::get('/datapenerima','BeasiswaAstraController@datapenerima');
// /*Route::get('/tes','BeasiswaAstraController@index');*/
// Route::get('/tracking','InfoAnggotaController@trakingAnggota');
// Route::get('/detailtracking&{fasilitas}','InfoAnggotaController@show');


// Route::get('/pinjaman','InfoAnggotaController@pinjaman');
// Route::get('/detailpinjaman&{nofas}','InfoAnggotaController@detailpinjaman');
// Route::get('/databaruanggota','InfoAnggotaController@databaruanggota');
// Route::post('/storedatabaruanggota','InfoAnggotaController@storedatabaruanggota'); 
// Route::get('/privasianggota','InfoAnggotaController@privasianggota');
// Route::post('/updatedataanggota','InfoAnggotaController@updatedataanggota');
// Route::post('/ubahpassword','InfoAnggotaController@ubahpassword');


// // Route::get('/keamanan','InfoAnggotaController@keamanan');
// Route::get('/pendaftaran','pendaftaran@pendaftaran');
// Route::get('/suksesdaftar','pendaftaran@suksesdaftar');
// Route::post('/daftaranggota','pendaftaran@daftaranggota');

//Route::post('/storedatapenerima','InfoAnggotaController@daftaranggota');
//---------end route--------------------//




Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/invalid', function () {
    return redirect()->away('http://localhost/beasiswa/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login', 'HomeController@login')->name('login');
