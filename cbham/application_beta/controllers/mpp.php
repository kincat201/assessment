<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mpp extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('profilkompetensi_model');
        $this->load->model('jabatan_model');
        $this->load->model('unit_model');
        $this->load->model('pegawai_model');
        $this->load->model('mpp_model');
    }

    function index() {
        $data['title'] = 'Rencana dan Pemenuhan SDM';
        // $this->xajax->register(XAJAX_FUNCTION, array('simpanknowhow',&$this,'simpanknowhow'));    
        // $this->xajax->register(XAJAX_FUNCTION, array('simpanmanagerialskill',&$this,'simpanmanagerialskill'));    
        // $this->xajax->register(XAJAX_FUNCTION, array('cariknowhow',&$this,'cariknowhow'));
        // $this->xajax->register(XAJAX_FUNCTION, array('carimanagerialskill',&$this,'carimanagerialskill'));    
        // $this->xajax->register(XAJAX_FUNCTION, array('cariprofilkompetensi',&$this,'cariprofilkompetensi'));
        // $this->xajax->register(XAJAX_FUNCTION, array('carirekapprofilkompetensi',&$this,'carirekapprofilkompetensi'));    
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['dataunit'] = $this->unit_model->getdataunit(''); 
        $data['datajabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['datagrade'] = $this->mpp_model->getdatagrade(); 
        $this->template->display('mpp/v_mpp', $data);
    }

    function simpanknowhow($nik,$periode,$tahun,$fe,$ie,$ex,$bs,$tsmkt,$tsest,$tsengmech,$tsengelec,$tsengciv,$tsprocpurch,$tsprocexpd,$tsproctrfc,$tsprocexim,$tscon,$tsppc,$tsmis,$tsfin,$tsqa,$tslgl,$tsia,$tsred,$tsmc,$tshse,$tshrd,$tsrt,$tsmd,$tsmr,$tssub,$tstop,$kekuatan,$kelemahan,$rencana){
        $objResponse = new xajaxResponse();
        $data = $this->profilkompetensi_model->simpanknowhow($nik,$periode,$tahun,$fe,$ie,$ex,$bs,$tsmkt,$tsest,$tsengmech,$tsengelec,$tsengciv,$tsprocpurch,$tsprocexpd,$tsproctrfc,$tsprocexim,$tscon,$tsppc,$tsmis,$tsfin,$tsqa,$tslgl,$tsia,$tsred,$tsmc,$tshse,$tshrd,$tsrt,$tsmd,$tsmr,$tssub,$tstop,$kekuatan,$kelemahan,$rencana);
        if ($data>0) {
            $objResponse->Assign("nik","value","");
            $objResponse->Assign("periode","value","1");
            $objResponse->Assign("alert","innerHTML", succ_msg("Data KnowHow Berhasil Disimpan"));
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("Data KnowHow Gagal Disimpan ! Ulangi Klik Tombol Simpan"));
            // $objResponse->script("alert('Data Gagal Disimpan')");
        }
        return $objResponse;
    }

    function simpanmanagerialskill($nik,$periode,$tahun,$dev,$dir,$tw,$tl,$ps,$po,$at,$ct,$int,$iu,$rb,$imp,$ach,$co,$inf,$cso,$penanggung,$jadwal,$komentar){
        $objResponse = new xajaxResponse();
        $data = $this->profilkompetensi_model->simpanmanagerialskill($nik,$periode,$tahun,$dev,$dir,$tw,$tl,$ps,$po,$at,$ct,$int,$iu,$rb,$imp,$ach,$co,$inf,$cso,$penanggung,$jadwal,$komentar);
        if ($data>0) {
            $objResponse->Assign("nik","value","");
            $objResponse->Assign("periode","value","1");
            $objResponse->Assign("alert","innerHTML", succ_msg("Data Managerial Skill Berhasil Disimpan"));
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("Data Managerial Skill Gagal Disimpan ! Ulangi Klik Tombol Simpan"));
            // $objResponse->script("alert('Data Gagal Disimpan')");
        }
        return $objResponse;
    }


    function rotasi(){
        $data['title'] = 'Rotasi / Promosi SDM';
        $this->xajax->register(XAJAX_FUNCTION, array('getpegawaiawal',&$this,'getpegawaiawal'));    
        $this->xajax->register(XAJAX_FUNCTION, array('simpanrotasi',&$this,'simpanrotasi'));    
        $this->xajax->register(XAJAX_FUNCTION, array('updaterotasi',&$this,'updaterotasi'));
        $this->xajax->register(XAJAX_FUNCTION, array('editrotasi',&$this,'editrotasi'));    
        $this->xajax->register(XAJAX_FUNCTION, array('detailrotasi',&$this,'detailrotasi')); 
        $this->xajax->register(XAJAX_FUNCTION, array('cariotorotasi',&$this,'cariotorotasi'));
        $this->xajax->register(XAJAX_FUNCTION, array('carireportrotasi',&$this,'carireportrotasi'));    
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['dataunit'] = $this->unit_model->getdataunit(''); 
        $data['datajabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['datagrade'] = $this->mpp_model->getdatagrade(); 
        $this->template->display('mpp/v_rotasi', $data);
    }

    function getpegawaiawal($nik){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->getpegawaiawal($nik); 
        foreach ($data as $row) {
            $status = $row->status;
            $unit = $row->unit;
            $grade = $row->grade;
            $struktural = $row->jenisjabatan;
            $jabatan = $row->jabatan;
        }
        $objResponse->Assign("status","value",$status);
        $objResponse->Assign("unit","value",$unit);
        $objResponse->Assign("grade","value",$grade);
        $objResponse->Assign("struktural","value",$struktural);
        $objResponse->Assign("jabatan","value",$jabatan);
        return $objResponse;
    }

    function simpanrotasi($jenis,$tanggal,$nama,$status,$unit,$grade,$struktural,$jabatan,$statusbaru,$unitbaru,$gradebaru,$strukturbaru,$jabatanbaru){
        $objResponse = new xajaxResponse();
        if ($jenis==null) {
            $objResponse->script("alert('Rotasi / Promosi Belum Dipilih')");
        } else if ($tanggal==''){
            $objResponse->script("alert('Tanggal Belum Di Isi')");
        } else if ($nama==''){
            $objResponse->script("alert('Pegawai Belum Di Pilih')");
        } else if ($statusbaru==''){
            $objResponse->script("alert('Status Kepegawaian Baru Belum Di Pilih')");
        } else if ($unitbaru==''){
            $objResponse->script("alert('Unit / Satmingkal Baru Belum Di Pilih')");
        } else if ($gradebaru==''){
            $objResponse->script("alert('Grade Baru Belum Di Pilih')");    
        } else if ($strukturbaru==''){
            $objResponse->script("alert('Grade Baru Belum Di Pilih')");
        } else if ($jabatanbaru==''){
            $objResponse->script("alert('Jabatan Baru Belum Di Pilih')");
        } else {
            $cek = $this->mpp_model->cekrotasi($tanggal,$nama);
            if ($cek>0) {
                $objResponse->script("alert('Data Rotasi / Promosi Pegawai tersebut Tanggal ".$tanggal." Sudah Ada')");
            } else {
                $data = $this->mpp_model->simpanrotasi($jenis,$tanggal,$nama,$status,$unit,$grade,$struktural,$jabatan,$statusbaru,$unitbaru,$gradebaru,$strukturbaru,$jabatanbaru);
                if ($data>0) {
                    $objResponse->script("alert('Data Berhasil Di Simpan')");
                    $objResponse->script("kosong()");
                } else {
                    $objResponse->script("alert('Data Gagal Di Simpan')");
                }
            }
        }
        return $objResponse;
    }

    function updaterotasi($jenis,$tanggal,$nama,$status,$unit,$grade,$struktural,$jabatan,$statusbaru,$unitbaru,$gradebaru,$strukturbaru,$jabatanbaru){
        $objResponse = new xajaxResponse();
        if ($jenis==null) {
            $objResponse->script("alert('Rotasi / Promosi Belum Dipilih')");
        } else if ($tanggal==''){
            $objResponse->script("alert('Tanggal Belum Di Isi')");
        } else if ($nama==''){
            $objResponse->script("alert('Pegawai Belum Di Pilih')");
        } else if ($statusbaru==''){
            $objResponse->script("alert('Status Kepegawaian Baru Belum Di Pilih')");
        } else if ($unitbaru==''){
            $objResponse->script("alert('Unit / Satmingkal Baru Belum Di Pilih')");
        } else if ($gradebaru==''){
            $objResponse->script("alert('Grade Baru Belum Di Pilih')");    
        } else if ($strukturbaru==''){
            $objResponse->script("alert('Grade Baru Belum Di Pilih')");
        } else if ($jabatanbaru==''){
            $objResponse->script("alert('Jabatan Baru Belum Di Pilih')");
        } else {
            // $cek = $this->mpp_model->cekrotasi($tanggal,$nama);
            // if ($cek>0) {
            //     $objResponse->script("alert(Data Rotasi / Promosi Pegawai tersebut Tanggal ".$tanggal." Sudah Ada)");
            // } else {
            $data = $this->mpp_model->updaterotasi($jenis,$tanggal,$nama,$status,$unit,$grade,$struktural,$jabatan,$statusbaru,$unitbaru,$gradebaru,$strukturalbaru,$jabatanbaru);
            if ($data>0) {
                $objResponse->script("alert('Data Berhasil Di Update')");
            } else {
                $objResponse->script("alert('Data Gagal Di Update')");
            }
            // }
        }
        return $objResponse;
    }

    function cariotorotasi($nik,$jenis,$tgl1,$tgl2){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->cariotorotasi($nik,$jenis,$tgl1,$tgl2);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->jenis."</td>
                                <td>".$row->nama."</td>
                                <td>".date('d F Y',strtotime($row->tanggal))."</td>
                                <td>".$row->unitbaru."</td>
                                <td>".$row->jabatanbaru."</td>
                                <td align='center'>
                                    <a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick='detailrotasi('".$row->nik."','".$row->tanggal."')'><i class='icon-eye-open'></i> Detail </a>
                                </td>
                                <td>
                                    <a class='btn mini green sbold' href='#' onClick=accrotasi('acc',".$row->nik."','".$row->tanggal."')><i class='icon-ok'></i> Acc </a>
                                    <a class='btn mini red sbold' href='#' onClick=accrotasi('notacc',".$row->nik."','".$row->tanggal."')><i class='icon-remove'></i> Not Acc </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan=7>Data Rotasi / Promosi Tidak Ada</td></tr>";
        }
        $objResponse->Assign("dataotorotasi","innerHTML",$html);
        return $objResponse;
    }

    function carireportrotasi($nik,$jenis,$tgl1,$tgl2){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->carireportrotasi($nik,$jenis,$tgl1,$tgl2);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->jenis."</td>
                                <td>".$row->nama."</td>
                                <td>".date('d F Y',strtotime($row->tanggal))."</td>
                                <td>".$row->unitbaru."</td>
                                <td>".$row->jabatanbaru."</td>
                                <td align='center'>
                                    <a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick='detailrotasi('".$row->nik."','".$row->tanggal."')'><i class='icon-eye-open'></i> Detail </a>
                                    <a class='btn mini yellow sbold' target='_blank' href='".base_url()."mpp/cetakrotasi/".$row->nik."/".$row->tanggal."' ><i class='icon-print'></i> Cetak </a>
                                </td>
                                <td>".$row->acc."</td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan=7>Data Rotasi / Promosi Tidak Ada</td></tr>";
        }
        $objResponse->Assign("datacarirotasi","innerHTML",$html);
        return $objResponse;
    }
  

}
?>