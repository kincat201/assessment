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
        $this->xajax->register(XAJAX_FUNCTION, array('tambahpendidikan',&$this,'tambahpendidikan'));
        $this->xajax->register(XAJAX_FUNCTION, array('hapuspendidikan',&$this,'hapuspendidikan'));
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
                                    <td><a class='btn mini red sbold' href='#' onClick=\"hapuskeluarga('".$row->nik."','".$row->nama."')\"><i class='icon-trash'></i> Hapus </a></td>
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
                                <td><a class='btn mini red sbold' href='#' onClick=\"hapuskeluarga('".$row->nik."','".$row->nama."')\"><i class='icon-trash'></i> Hapus </a></td>
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
        $rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,$namabank,$struktural){
        $objResponse = new xajaxResponse();
        if ($nik=='' or $nik=='0' or $nama=='' or $tglmasuk=='' or $status=='' or $unit=='' or $jabatan=='' or $grade=='' or $struktural=='') {
            if ($nik=='' or $nik=='0') {
                $objResponse->script("alert('NIK belum diisi !')");
            } 
            if ($nama=='') {
                $objResponse->script("alert('Nama belum diisi !')");
            }
            if ($tglmasuk=='') {
                $objResponse->script("alert('Tanggal Masuk belum diisi !')");
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
//            if ($role=='') {
//                $objResponse->script("alert('Role User CBHAM belum diisi !')");
//            }
//            if ($username=='') {
//                $objResponse->script("alert('Username User CBHAM belum diisi !')");
//            }
//            if ($password=='') {
//                $objResponse->script("alert('Password User CBHAM belum diisi !')");
//            }
        } else {
            $cek = $this->pegawai_model->cekpegawai($nik);
            if ($cek==0) {
                $data = $this->pegawai_model->simpanpegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,$namabank,$struktural);
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
                        if(getSession('role')!='HCMM'){
                            $html = $html."<tr>
                                            <td>".$row->nik."</td>
                                            <td>".$row->nama."</td>
                                            <td>".$row->namaunit."</td>
                                            <td>".$row->namajabatan."</td>
                                            <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick=\"detailpegawai('".$row->nik."')\"><i class='icon-eye-open'></i> Detail </a>
                                                <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick=\"editpegawai('".$row->nik."')\"><i class='icon-edit'></i> Edit </a>
                                                <a class='btn mini purple sbold' target='_blank'  href='".base_url()."index.php/pegawai/cetakcv/".urlencode($row->nik)."'><i class='icon-print'></i> Cetak CV </a>
                                            </td>
                                        </tr>";
                        } else {
                            $html = $html."<tr>
                                            <td>".$row->nik."</td>
                                            <td>".$row->nama."</td>
                                            <td>".$row->namaunit."</td>
                                            <td>".$row->namajabatan."</td>
                                            <td></td>
                                        </tr>";
                        }
                    }
                    $objResponse->Assign("pegawai","innerHTML",$html);
                } else {
                    $objResponse->Assign("alert","innerHTML", err_msg("Data Pegawai ".$nama." Gagal Disimpan !"));
                    // $objResponse->script("alert('Data Gagal Disimpan')");
                }
            } else {
                $objResponse->script("alert('NIK ".$nik." SUDAH DIGUNAKAN!')");
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
                if(getSession('role')!='HCMM'){
                    $html = $html."<tr>
                                    <td>".$row->nik."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->namaunit."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick=\"detailpegawai('".$row->nik."')\"><i class='icon-eye-open'></i> Detail </a>
                                        <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick=\"editpegawai('".$row->nik."')\"><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini purple sbold' target='_blank'  href='".base_url()."index.php/pegawai/cetakcv/".urlencode($row->nik)."'><i class='icon-print'></i> Cetak CV </a>
                                    </td>
                                </tr>";
                } else {
                     $html = $html."<tr>
                                    <td>".$row->nik."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->namaunit."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td></td>
                                </tr>";
                }
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
            $objResponse->script("$('#tambahkeluarga').show()");
            $objResponse->Assign("nik","value",$row->nik);
            $objResponse->Assign("ktp","value",$row->noktp);
            $objResponse->Assign("kk","value",$row->nokk);
            $objResponse->Assign("nama","value",$row->nama);
            $objResponse->Assign("gelardepan","value",$row->gelardepan);
            $objResponse->Assign("gelarbelakang","value",$row->gelarbelakang);
            $objResponse->Assign("tempatlahir","value",$row->tempatlahir);
            $objResponse->Assign("tgllahir","value",$row->tgllahir);
            $objResponse->Assign("tglmasuk","value",$row->tglmasuk);
            $objResponse->Assign("pendidikan","value",$row->pendidikan);
            $objResponse->Assign("status","value",$row->status);
            $objResponse->Assign("unit","value",$row->unit);
            $objResponse->Assign("grade","value",$row->grade);
            $objResponse->Assign("struktural","value",$row->jenisjabatan);
            $objResponse->Assign("jabatan","value",$row->jabatan); // tab1
            $objResponse->Assign("jk","value",$row->kelamin);
            $objResponse->Assign("darah","value",$row->darah);
            $objResponse->Assign("statuskeluarga","value",$row->statuskeluarga);
            $objResponse->Assign("agama","value",$row->agama);
            $objResponse->Assign("alamat","value",$row->alamat);
            $objResponse->Assign("kota","value",$row->kota);
            $objResponse->Assign("kodepos","value",$row->kodepos);
            $objResponse->Assign("telepon","value",$row->telp);
            $objResponse->Assign("hp","value",$row->hp); //tab2
            $objResponse->Assign("pendidikan","value",$row->pendidikan);
            $objResponse->Assign("namauniv","value",$row->namauniv);
            $objResponse->Assign("prodi","value",$row->jurusan);
            $objResponse->Assign("lulus","value",$row->lulus);
            // $objResponse->script("$('input[name=tempat][value='".$row->tempatbelajar."']').prop('checked','checked');");
            $objResponse->Assign("ijazah","value",$row->ijazah); //tab3
            $objResponse->Assign("rekening","value",$row->rekening);
            $objResponse->Assign("npwp","value",$row->npwp);
            $objResponse->Assign("statusbpjskt","value",$row->statusbpjskt);
            $objResponse->Assign("bpjskt","value",$row->bpjskt);
            $objResponse->Assign("statusbpjskes","value",$row->statusbpjskes);
            $objResponse->Assign("bpjskes","value",$row->bpjskes);
            $objResponse->Assign("statusppip","value",$row->statusppip);
            $objResponse->Assign("ppip","value",$row->ppip);
            $objResponse->Assign("statusppukp","value",$row->statusppukp);
            $objResponse->Assign("ppukp","value",$row->ppukp);
            $objResponse->Assign("statusjiwasraya","value",$row->statusjiwasraya);
            $objResponse->Assign("jiwasraya","value",$row->jiwasraya);
            $objResponse->Assign("statusjkdk","value",$row->statusjkdk);
            $objResponse->Assign("jkdk","value",$row->jkdk); //tab4
            $objResponse->Assign("role","value",$row->role);
            $objResponse->Assign("username","value",$row->username);
            $objResponse->Assign("password","value",$row->password);
            $objResponse->Assign("tglmulaikontrak","value",$row->tglmulaikontrak);
            $objResponse->Assign("tglselesaikontrak","value",$row->tglselesaikontrak);
            $objResponse->Assign("tglpengangkatan","value",$row->tglpengangkatan);
            $objResponse->Assign("namabank","value",$row->namabank);

        }

        $datakel = $this->pegawai_model->getkeluarga($nik);
        $html = '';
        if (count($datakel)>0) {
            $no=0;
            foreach ($datakel as $rowk) {
                $no = $no+1;
                $html = $html."<tr>
                                <td>".$no."</td>
                                <td>".$rowk->nama."</td>
                                <td>".$rowk->hubungan."</td>
                                <td>".$rowk->pekerjaan."</td>
                                <td>".$rowk->tgllahir."</td>
                                <td>".$rowk->kelamin."</td>
                                <td>".$rowk->kondisi."</td>
                                <td><a class='btn mini red sbold' href='#' onClick=\"hapuskeluarga('".$rowk->nik."','".$rowk->nama."')\"><i class='icon-trash'></i> Hapus </a></td>
                            </tr>";
            }
            $objResponse->Assign("keluarga","innerHTML",$html);
        } 
        $objResponse->Assign("judul","innerHTML","Update Pegawai");
        // $objResponse->script("kosong()");
        return $objResponse;
    }

    function updatepegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,$namabank,$struktural){
        $objResponse = new xajaxResponse();
        if ($nik=='' or $nik=='0' or $nama=='' or $tglmasuk=='' or $status=='' or $unit=='' or $jabatan=='' or $grade=='' or $struktural=='') {
            if ($nik=='' or $nik=='0') {
                $objResponse->script("alert('NIK belum diisi !')");
            } 
            if ($nama=='') {
                $objResponse->script("alert('Nama belum diisi !')");
            }
            if ($tglmasuk=='') {
                $objResponse->script("alert('Tanggal Masuk belum diisi !')");
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
            // if ($role=='') {
            //     $objResponse->script("alert('Role User CBHAM belum diisi !')");
            // }
            // if ($username=='') {
            //     $objResponse->script("alert('Username User CBHAM belum diisi !')");
            // }
            // if ($password=='') {
            //     $objResponse->script("alert('Password User CBHAM belum diisi !')");
            // }
        } else {
            $data = $this->pegawai_model->updatepegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,$namabank,$struktural);
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
                                    <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick=\"detailpegawai('".$row->nik."')\"><i class='icon-eye-open'></i> Detail </a>
                                        <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick=\"editpegawai('".$row->nik."')\"><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini purple sbold' target='_blank'  href='".base_url()."index.php/pegawai/cetakcv/".urlencode($row->nik)."'><i class='icon-print'></i> Cetak CV </a>
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
            $objResponse->Assign("ktp","value",$row->noktp);
            $objResponse->Assign("kk","value",$row->nokk);
            $objResponse->Assign("nama","value",$row->nama);
            $objResponse->Assign("gelardepan","value",$row->gelardepan);
            $objResponse->Assign("gelarbelakang","value",$row->gelarbelakang);
            $objResponse->Assign("tempatlahir","value",$row->tempatlahir);
            $objResponse->Assign("tgllahir","value",$row->tgllahir);
            $objResponse->Assign("tglmasuk","value",$row->tglmasuk);
            $objResponse->Assign("pendidikan","value",$row->pendidikan);
            $objResponse->Assign("status","value",$row->status);
            $objResponse->Assign("unit","value",$row->unit);
            $objResponse->Assign("grade","value",$row->grade);
            $objResponse->Assign("struktural","value",$row->jenisjabatan);
            $objResponse->Assign("jabatan","value",$row->jabatan); // tab1
            $objResponse->Assign("jk","value",$row->kelamin);
            $objResponse->Assign("darah","value",$row->darah);
            $objResponse->Assign("statuskeluarga","value",$row->statuskeluarga);
            $objResponse->Assign("agama","value",$row->agama);
            $objResponse->Assign("alamat","value",$row->alamat);
            $objResponse->Assign("kota","value",$row->kota);
            $objResponse->Assign("kodepos","value",$row->kodepos);
            $objResponse->Assign("telepon","value",$row->telp);
            $objResponse->Assign("hp","value",$row->hp); //tab2
            $objResponse->Assign("pendidikan","value",$row->pendidikan);
            $objResponse->Assign("namauniv","value",$row->namauniv);
            $objResponse->Assign("prodi","value",$row->jurusan);
            $objResponse->Assign("lulus","value",$row->lulus);
            // $objResponse->script("$('input[name=tempat][value='".$row->tempatbelajar."']').prop('checked','checked');");
            $objResponse->Assign("ijazah","value",$row->ijazah); //tab3
            $objResponse->Assign("rekening","value",$row->rekening);
            $objResponse->Assign("npwp","value",$row->npwp);
            $objResponse->Assign("statusbpjskt","value",$row->statusbpjskt);
            $objResponse->Assign("bpjskt","value",$row->bpjskt);
            $objResponse->Assign("statusbpjskes","value",$row->statusbpjskes);
            $objResponse->Assign("bpjskes","value",$row->bpjskes);
            $objResponse->Assign("statusppip","value",$row->statusppip);
            $objResponse->Assign("ppip","value",$row->ppip);
            $objResponse->Assign("statusppukp","value",$row->statusppukp);
            $objResponse->Assign("ppukp","value",$row->ppukp);
            $objResponse->Assign("statusjiwasraya","value",$row->statusjiwasraya);
            $objResponse->Assign("jiwasraya","value",$row->jiwasraya);
            $objResponse->Assign("statusjkdk","value",$row->statusjkdk);
            $objResponse->Assign("jkdk","value",$row->jkdk); //tab4
            $objResponse->Assign("role","value",$row->role);
            $objResponse->Assign("username","value",$row->username);
            $objResponse->Assign("password","value",$row->password);
            $objResponse->script("$('#luarnegeri').prop('checked','checked');");
            $objResponse->Assign("tglmulaikontrak","value",$row->tglmulaikontrak);
            $objResponse->Assign("tglselesaikontrak","value",$row->tglselesaikontrak);
            $objResponse->Assign("tglpengangkatan","value",$row->tglpengangkatan);
            $objResponse->Assign("namabank","value",$row->namabank);            
        }

        $datakel = $this->pegawai_model->getkeluarga($nik);
        $html = '';
        if (count($datakel)>0) {
            $no=0;
            foreach ($datakel as $rowk) {
                $no = $no+1;
                $html = $html."<tr>
                                <td>".$no."</td>
                                <td>".$rowk->nama."</td>
                                <td>".$rowk->hubungan."</td>
                                <td>".$rowk->pekerjaan."</td>
                                <td>".$rowk->tgllahir."</td>
                                <td>".$rowk->kelamin."</td>
                                <td>".$rowk->kondisi."</td>
                                <td></td>
                            </tr>";
            }
            $objResponse->Assign("keluarga","innerHTML",$html);
        } 
        $objResponse->Assign("judul","innerHTML","Detail Pegawai");
        $objResponse->script("inaktif()");
        return $objResponse;
    }

    function cetakcv($nik){
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));  
        $data['datapeg'] = $this->pegawai_model->getpegawaibynik($nik);
        $data['keluarga'] = $this->pegawai_model->getkeluarga($nik);
        $this->load->view('master\cetakcv',$data);
    }

    function cetakpegawai() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->pegawai_model->cetakpegawai();
         $this->load->view('master\cetakpegawai', $data);
    }  

    function tambahpendidikan($nik,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah){
        $objResponse = new xajaxResponse();
        if ($nik=='' or $nik==0 or $pendidikan=='' or $namauniv=='' or $prodi=='' or $lulus=='' or $tempat=='' or $ijazah=='') {
            if ($nik=='' or $nik==0) {
                $message = "NIK di Tab Data Pegawai belum diisi !";
            } 
            if ($pendidikan=='') {
                $message = "Pendidikan belum dipilih !";
            }
            if ($namauniv=='') {
                $message = "Nama Sekolah belum diisi !";
            }
            if ($prodi=='') {
                $message = "Jurusan belum diisi !";
            }
            if ($lulus=='') {
                $message = "Tahun Lulus belum diisi !";
            }
            if ($tempat=='') {
                $message = "Tempat Belajar belum dipilih !";
            }
            if ($ijazah=='') {
                $message = "Nomor Ijazah belum diisi !";
            }
            $objResponse->script("alert('".$message."')");
        } else {
            // $no = $this->pegawai_model->getnokeluarga($nik);
            $data = $this->pegawai_model->tambahpendidikan($nik,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah);
            $html = '';
            if (count($data)>0) {
                $no=0;
                foreach ($data as $row) {
                    $no = $no+1;
                    $html = $html."<tr>
                                    <td>".$no."</td>
                                    <td>".$row->pendidikan."</td>
                                    <td>".$row->namauniv."</td>
                                    <td>".$row->jurusan."</td>
                                    <td>".$row->lulus."</td>
                                    <td>".$row->tempatbelajar."</td>
                                    <td>".$row->ijazah."</td>
                                    <td><a class='btn mini red sbold' href='#' onClick=\"hapuspendidikan('".$row->nik."','".$row->noindex."')\"><i class='icon-trash'></i> Hapus </a></td>
                                </tr>";
                }
                $objResponse->Assign("datapendidikan","innerHTML",$html);
            } 
        }
        return $objResponse;
    }

    function hapuspendidikan($nik,$nama){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->hapuspendidikan($nik,$nama);
        $html = '';
        if (count($data)>0) {
            $no = 0;
            foreach ($data as $row) {
                $no = $no+1;
                $html = $html."<tr>
                                    <td>".$no."</td>
                                    <td>".$row->pendidikan."</td>
                                    <td>".$row->namauniv."</td>
                                    <td>".$row->jurusan."</td>
                                    <td>".$row->lulus."</td>
                                    <td>".$row->tempatbelajar."</td>
                                    <td>".$row->ijazah."</td>
                                    <td><a class='btn mini red sbold' href='#' onClick=\"hapuspendidikan('".$row->nik."','".$row->noindex."')\"><i class='icon-trash'></i> Hapus </a></td>
                                </tr>";
            }
            $objResponse->Assign("datapendidikan","innerHTML",$html);
        } else {
            $objResponse->Assign("datapendidikan","innerHTML",$html);
        }
        return $objResponse;
    }

}
?>