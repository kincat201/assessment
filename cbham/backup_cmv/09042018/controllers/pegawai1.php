<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pegawai_model');
        $this->load->model('jabatan_model');
        $this->load->model('unit_model');
    }

    function index() {
        $data['title'] = 'Pegawai';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanpegawai',&$this,'simpanpegawai'));    
        $this->xajax->register(XAJAX_FUNCTION, array('editpegawai',&$this,'editpegawai'));  
        $this->xajax->register(XAJAX_FUNCTION, array('updatepegawai',&$this,'updatepegawai'));
        $this->xajax->register(XAJAX_FUNCTION, array('lihatpegawai',&$this,'lihatpegawai'));
        $this->xajax->register(XAJAX_FUNCTION, array('caripegawai',&$this,'caripegawai'));
        $this->xajax->processRequest();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['unit'] = $this->unit_model->getdataunit(''); 
        $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/pegawai', $data);
    }

    function simpanpegawai($nik,$nama,$tgllahir,$tglmasuk,$pendidikan,$status,$unit,$jabatan,$role,$username,$password){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->simpanpegawai($nik,$nama,$tgllahir,$tglmasuk,$pendidikan,$status,$unit,$jabatan,$role,$username,$password);
        if ($data>0) {
            // $objResponse->script("alert('Simpan Berhasil')");
            $objResponse->script("$('#tambah').modal('hide')");
            $objResponse->Assign("nik","value","");
            $objResponse->Assign("nama","value","");
            $objResponse->Assign("tgllahir","value","");
            $objResponse->Assign("tglmasuk","value","");
            $objResponse->Assign("pendidikan","value","");
            $objResponse->Assign("status","value","");
            $objResponse->Assign("unit","value","");
            $objResponse->Assign("jabatan","value","");
            $objResponse->Assign("role","value","");
            $objResponse->Assign("username","value","");
            $objResponse->Assign("password","value","");
            $objResponse->Assign("alert","innerHTML", succ_msg("Data Pegawai ".$nama." Berhasil Disimpan"));
            $html = '';
            $data = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->nik."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$row->namajabatan."</td>
                                <td><a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick='detailpegawai(".$row->nik.")'><i class='icon-eye-open'></i> Detail </a>
                                    <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick='editpegawai(".$row->nik.")'><i class='icon-edit'></i> Edit </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("pegawai","innerHTML",$html);
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("Data Pegawai ".$nama." Gagal Disimpan !"));
            // $objResponse->script("alert('Data Gagal Disimpan')");
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
                                <td><a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick='detailpegawai(".$row->nik.")'><i class='icon-eye-open'></i> Detail </a>
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
        return $objResponse;
    }

    function updatepegawai($nik,$nama,$tgllahir,$tglmasuk,$pendidikan,$status,$unit,$jabatan,$role,$username,$password){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->updatepegawai($nik,$nama,$tgllahir,$tglmasuk,$pendidikan,$status,$unit,$jabatan,$role,$username,$password);
        if ($data>0) {
            // $objResponse->script("alert('Simpan Berhasil')");
            $objResponse->script("$('#tambah').modal('hide')");
            $objResponse->Assign("nik","value","");
            $objResponse->Assign("nama","value","");
            $objResponse->Assign("tgllahir","value","");
            $objResponse->Assign("tglmasuk","value","");
            $objResponse->Assign("pendidikan","value","");
            $objResponse->Assign("status","value","");
            $objResponse->Assign("unit","value","");
            $objResponse->Assign("jabatan","value","");
            $objResponse->Assign("role","value","");
            $objResponse->Assign("username","value","");
            $objResponse->Assign("password","value","");
            $objResponse->Assign("alert","innerHTML", succ_msg("Data Pegawai ".$nama." Berhasil Di Update"));
            $html = '';
            $data = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->nik."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$row->namajabatan."</td>
                                <td><a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick='detailpegawai(".$row->nik.")'><i class='icon-eye-open'></i> Detail </a>
                                    <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick='editpegawai(".$row->nik.")'><i class='icon-edit'></i> Edit </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("pegawai","innerHTML",$html);
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("Data Pegawai ".$nama." Gagal Di Update !"));
            // $objResponse->script("alert('Data Pegawai ".$nik." - ".$nama." Gagal Di Update')");
        }
        return $objResponse;
    }
  

}
?>