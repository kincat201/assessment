<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pegawai_model');
        $this->load->model('jabatan_model');
        $this->load->model('unit_model');
        $this->load->model('mpp_model');
    }

    function index() {
        $data['title'] = 'Pegawai';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanpegawai',&$this,'simpanpegawai'));    
        $this->xajax->register(XAJAX_FUNCTION, array('editpegawai',&$this,'editpegawai'));  
        $this->xajax->register(XAJAX_FUNCTION, array('updatepegawai',&$this,'updatepegawai'));
        $this->xajax->register(XAJAX_FUNCTION, array('detailpegawai',&$this,'detailpegawai'));
        $this->xajax->register(XAJAX_FUNCTION, array('caripegawai',&$this,'caripegawai'));
        $this->xajax->register(XAJAX_FUNCTION, array('tambahkeluarga',&$this,'tambahkeluarga'));
        $this->xajax->register(XAJAX_FUNCTION, array('hapuskeluarga',&$this,'hapuskeluarga'));
        $this->xajax->processRequest();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['unit'] = $this->unit_model->getdataunit(''); 
        $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['grade'] = $this->mpp_model->getdatagrade(); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/pegawai', $data);
    }

    function tambahkeluarga($nik,$nama,$hubungan,$pekerjaan,$tgllahirkeluarga,$jkkeluarga,$kondisi){
        $objResponse = new xajaxResponse();
        if ($nik=='' or $nik==0 or $nama=='' or $pekerjaan=='' or $tgllahirkeluarga=='') {
            if ($nik=='' or $nik==0) {
                $message = "NIK di Tab Data Pegawai belum diisi !";
            } 
            if ($nama=='') {
                $message = "Nama Keluarga belum diisi !";
            }
            if ($pekerjaan=='') {
                $message = "Pekerjaan Keluarga belum diisi !";
            }
            if ($tgllahirkeluarga=='') {
                $message = "Tanggal Lahir Keluarga belum diisi !";
            }
        } else {
            // $no = $this->pegawai_model->getnokeluarga($nik);
            $data = $this->pegawai_model->tambahkeluarga($nik,$nama,$hubungan,$pekerjaan,$tgllahirkeluarga,$jkkeluarga,$kondisi);
            $html = '';
            if (count($data)>0) {
                $no=0;
                foreach ($data as $row) {
                    $no = $no+1;
                    $html = $html."<tr>
                                    <td>".$no."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->hubungan."</td>
                                    <td>".$row->pekerjaan."</td>
                                    <td>".$row->tgllahir."</td>
                                    <td>".$row->kelamin."</td>
                                    <td>".$row->kondisi."</td>
                                    <td><a class='btn mini red sbold' href='#' onClick=hapuskeluarga('".$row->nik."','".$row->nama."')><i class='icon-trash'></i> Hapus </a></td>
                                </tr>";
                }
                $objResponse->Assign("keluarga","innerHTML",$html);
            } 
        }
        return $objResponse;
    }

    function hapuskeluarga($nik,$nama){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->hapuskeluarga($nik,$nama);
        $html = '';
        if (count($data)>0) {
            $no = 0;
            foreach ($data as $row) {
                $no = $no+1;
                $html = $html."<tr>
                                <td>".$no."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->hubungan."</td>
                                <td>".$row->pekerjaan."</td>
                                <td>".$row->tgllahir."</td>
                                <td>".$row->kelamin."</td>
                                <td>".$row->kondisi."</td>
                                <td><a class='btn mini red sbold' href='#' onClick=hapuskeluarga('".$row->nik."','".$row->nama."')><i class='icon-trash'></i> Hapus </a></td>
                            </tr>";
            }
            $objResponse->Assign("keluarga","innerHTML",$html);
        } else {
            $objResponse->Assign("keluarga","innerHTML",$html);
        }
        return $objResponse;
    }

    function simpanpegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,
        $jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,
        $pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,
        $rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$struktural){
        $objResponse = new xajaxResponse();
        if ($nik=='' or $nik==0 or $nama=='' or $tglmasuk=='' or $status=='' or $unit=='' or $jabatan=='' or $grade=='' or $struktural=='' or $role=='' or $username=='' or $password=='') {
            if ($nik=='' or $nik==0) {
                $objResponse->script("alert('NIK belum diisi !')");
            } 
            if ($nama=='') {
                $objResponse->script("alert('Nama belum diisi !')");
            }
            if ($tglmasuk=='') {
                $objResponse->script("alert('Tangal Masuk belum diisi !')");
            }
            if ($status=='') {
                $objResponse->script("alert('Status Pegawai belum diisi !')");
            }
            if ($unit=='') {
                $objResponse->script("alert('Unit/Satmingkal Pegawai belum diisi !')");
            }
            if ($jabatan=='') {
                $objResponse->script("alert('Jabatan Pegawai belum diisi !')");
            }
            if ($grade=='' || $struktural=='') {
                $objResponse->script("alert('Grade Pegawai belum diisi !')");
            }
            if ($role=='') {
                $objResponse->script("alert('Role User CBHAM belum diisi !')");
            }
            if ($username=='') {
                $objResponse->script("alert('Username User CBHAM belum diisi !')");
            }
            if ($password=='') {
                $objResponse->script("alert('Password User CBHAM belum diisi !')");
            }
        } else {
            $data = $this->pegawai_model->simpanpegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$struktural);
            if ($data>0) {
                $objResponse->script("kosong()");
                $objResponse->script("$('#tambah').modal('hide')");
                // $objResponse->Assign("nik","value","");
                // $objResponse->Assign("nama","value","");
                // $objResponse->Assign("tgllahir","value","");
                // $objResponse->Assign("tglmasuk","value","");
                // $objResponse->Assign("pendidikan","value","");
                // $objResponse->Assign("status","value","");
                // $objResponse->Assign("unit","value","");
                // $objResponse->Assign("jabatan","value","");
                // $objResponse->Assign("role","value","");
                // $objResponse->Assign("username","value","");
                // $objResponse->Assign("password","value","");
                $objResponse->Assign("alert","innerHTML", succ_msg("Data Pegawai ".$nama." Berhasil Disimpan"));
                $html = '';
                $data = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->nik."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->namaunit."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick='detailpegawai(".$row->nik.")'><i class='icon-eye-open'></i> Detail </a>
                                        <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick='editpegawai(".$row->nik.")'><i class='icon-edit'></i> Edit </a>
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("pegawai","innerHTML",$html);
            } else {
                $objResponse->Assign("alert","innerHTML", err_msg("Data Pegawai ".$nama." Gagal Disimpan !"));
                // $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function caripegawai($pegawai){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->caripegawai($pegawai); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->nik."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$row->namajabatan."</td>
                                <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick='detailpegawai(".$row->nik.")'><i class='icon-eye-open'></i> Detail </a>
                                    <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick='editpegawai(".$row->nik.")'><i class='icon-edit'></i> Edit </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("pegawai","innerHTML",$html);
        return $objResponse;
    }

    function getdatapegawai($nik,$nama,$tglmasuk1,$tglmasuk2,$pendidikan,$status,$unit,$jabatan){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->getdatapegawai($nik,$nama,$tglmasuk1,$tglmasuk2,$pendidikan,$status,$unit,$jabatan);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."pegawai/editpegawai/".$row->nik."'>Edit</a>";
                $html = $html."<tr>
                                <td>".$row->nik."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->tgllahir."</td>
                                <td>".$row->tglmasuk."</td>
                                <td>".$row->pendidikan."</td>
                                <td>".$row->status."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("pegawai","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editpegawai($nik){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->getpegawaibynik($nik);
        foreach ($data as $row) {
            $objResponse->Assign("nik","disabled",true);
            $objResponse->script("$('#update').show()");
            $objResponse->script("$('#simpan').hide()");
            $objResponse->Assign("nik","value",$row->nik);
            $objResponse->Assign("nama","value",$row->nama);
            $objResponse->Assign("tgllahir","value",$row->tgllahir);
            $objResponse->Assign("tglmasuk","value",$row->tglmasuk);
            $objResponse->Assign("pendidikan","value",$row->pendidikan);
            $objResponse->Assign("status","value",$row->status);
            $objResponse->Assign("unit","value",$row->unit);
            $objResponse->Assign("jabatan","value",$row->jabatan);
            $objResponse->Assign("username","value",$row->username);
            $objResponse->Assign("password","value",$row->password);
        }
        $objResponse->Assign("judul","innerHTML","Update Pegawai");
        // $objResponse->script("kosong()");
        return $objResponse;
    }

    function updatepegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$struktural){
        $objResponse = new xajaxResponse();
        if ($nik=='' or $nik==0 or $nama=='' or $tglmasuk=='' or $status=='' or $unit=='' or $jabatan=='' or $grade=='' or $struktural=='' or $role=='' or $username=='' or $password=='') {
            if ($nik=='' or $nik==0) {
                $objResponse->script("alert('NIK belum diisi !')");
            } 
            if ($nama=='') {
                $objResponse->script("alert('Nama belum diisi !')");
            }
            if ($tglmasuk=='') {
                $objResponse->script("alert('Tangal Masuk belum diisi !')");
            }
            if ($status=='') {
                $objResponse->script("alert('Status Pegawai belum diisi !')");
            }
            if ($unit=='') {
                $objResponse->script("alert('Unit/Satmingkal Pegawai belum diisi !')");
            }
            if ($jabatan=='') {
                $objResponse->script("alert('Jabatan Pegawai belum diisi !')");
            }
            if ($grade=='' || $struktural=='') {
                $objResponse->script("alert('Grade Pegawai belum diisi !')");
            }
            if ($role=='') {
                $objResponse->script("alert('Role User CBHAM belum diisi !')");
            }
            if ($username=='') {
                $objResponse->script("alert('Username User CBHAM belum diisi !')");
            }
            if ($password=='') {
                $objResponse->script("alert('Password User CBHAM belum diisi !')");
            }
        } else {
            $data = $this->pegawai_model->updatepegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$struktural);
            if ($data>0) {
                // $objResponse->script("alert('Simpan Berhasil')");
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->script("kosong()");
                // $objResponse->Assign("nik","value","");
                // $objResponse->Assign("nama","value","");
                // $objResponse->Assign("tgllahir","value","");
                // $objResponse->Assign("tglmasuk","value","");
                // $objResponse->Assign("pendidikan","value","");
                // $objResponse->Assign("status","value","");
                // $objResponse->Assign("unit","value","");
                // $objResponse->Assign("jabatan","value","");
                // $objResponse->Assign("role","value","");
                // $objResponse->Assign("username","value","");
                // $objResponse->Assign("password","value","");
                $objResponse->Assign("alert","innerHTML", succ_msg("Data Pegawai ".$nama." Berhasil Di Update"));
                $html = '';
                $data = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->nik."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->namaunit."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick='detailpegawai(".$row->nik.")'><i class='icon-eye-open'></i> Detail </a>
                                        <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick='editpegawai(".$row->nik.")'><i class='icon-edit'></i> Edit </a>
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("pegawai","innerHTML",$html);
            } else {
                $objResponse->Assign("alert","innerHTML", err_msg("Data Pegawai ".$nama." Gagal Di Update !"));
                // $objResponse->script("alert('Data Pegawai ".$nik." - ".$nama." Gagal Di Update')");
            }
        }
        return $objResponse;
    }

    function detailpegawai($nik){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->getpegawaibynik($nik);
        foreach ($data as $row) {
            // $objResponse->Assign("nik","disabled",true);
            $objResponse->script("$('#update').hide()");
            $objResponse->script("$('#simpan').hide()");
            $objResponse->script("$('#tambahkeluarga').hide()");
            $objResponse->Assign("nik","value",$row->nik);
            $objResponse->Assign("nama","value",$row->nama);
            $objResponse->Assign("tgllahir","value",$row->tgllahir);
            $objResponse->Assign("tglmasuk","value",$row->tglmasuk);
            $objResponse->Assign("pendidikan","value",$row->pendidikan);
            $objResponse->Assign("status","value",$row->status);
            $objResponse->Assign("unit","value",$row->unit);
            $objResponse->Assign("jabatan","value",$row->jabatan);
            $objResponse->Assign("username","value",$row->username);
            $objResponse->Assign("password","value",$row->password);
        }
        $objResponse->Assign("judul","innerHTML","Detail Pegawai");
        $objResponse->script("inaktif()");
        return $objResponse;
    }
  

}
?>