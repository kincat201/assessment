<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelompok extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('kelompok_model');
        // $this->load->helper('rumus');
    }

    function index() {
        $data['title'] = 'Kelompok';
        $this->xajax->register(XAJAX_FUNCTION, array('simpankelompok',&$this,'simpankelompok'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editkelompok',&$this,'editkelompok')); 
        $this->xajax->register(XAJAX_FUNCTION, array('updatekelompok',&$this,'updatekelompok'));    
        $this->xajax->register(XAJAX_FUNCTION, array('carikelompok',&$this,'carikelompok'));            
        $this->xajax->processRequest();
        $data['kelompok'] = $this->kelompok_model->getdatakelompok(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/kelompok', $data);
    }

    function simpankelompok($nama,$kra,$kba){
        $objResponse = new xajaxResponse();
        if ($nama=='') {
            $objResponse->script("alert('Nama Kelompok Belum Di Isi !')");
        } else {
            $data = $this->kelompok_model->simpankelompok($nama,$kra,$kba);
            if ($data>0) {
                // $objResponse->script("alert('Simpan Berhasil')");
                $objResponse->Assign("alert","innerHTML", succ_msg("Kelompok ".$nama." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("nama","value","");
                $html = '';
                $data = $this->kelompok_model->getdatakelompok(''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->kodekelom."</td>
                                    <td>".$row->namakelompok."</td>
                                    <td>".$row->kra."</td>
                                    <td>".$row->kba."</td>
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editkelompok(".$row->kodekelom.")'><i class='icon-edit'></i> Edit </a>
                                        <a data-toggle='modal' href='#delete".$row->kodekelom."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> 
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("kelompok","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function carikelompok($nama){
        $objResponse = new xajaxResponse();
        $data = $this->kelompok_model->carikelompok($nama); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodekelom."</td>
                                <td>".$row->namakelompok."</td>
                                <td>".$row->kra."</td>
                                <td>".$row->kba."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editkelompok(".$row->kodekelom.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete".$row->kodekelom."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> 
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("kelompok","innerHTML",$html);
        return $objResponse;
    }

    function getdatakelompok($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->kelompok_model->getdatakelompok($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."kelompok/editkelompok/".$row->kodekelom."'>Edit</a>";
                $delete = "<a href='".base_url()."kelompok/deletekelompok/".$row->kodekelom."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->kojab."</td>
                                <td>".$row->namakelompok."</td>
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("kelompok","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editkelompok($kode){
        $objResponse = new xajaxResponse();
        $data = $this->kelompok_model->getkelompokbykode($kode);
        foreach ($data as $row) {
            $objResponse->Assign("kodekelom","value",$row->kodekelom);
            $objResponse->Assign("namakelompok","value",$row->namakelompok);
            $objResponse->Assign("krakel","value",$row->kra);
            $objResponse->Assign("kbakel","value",$row->kba);
        }
        return $objResponse;
    }

    function updatekelompok($kode,$nama,$kra,$kba){
        $objResponse = new xajaxResponse();
        $data = $this->kelompok_model->updatekelompok($kode,$nama,$kra,$kba);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("kojab","value","");
            $objResponse->Assign("nama","value","");
            $html='';
            $data = $this->kelompok_model->getdatakelompok('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodekelom."</td>
                                <td>".$row->namakelompok."</td>
                                <td>".$row->kra."</td>
                                <td>".$row->kba."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editkelompok(".$row->kodekelom.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete".$row->kodekelom."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> 
                                </td>
                            </tr>";
            }
            $objResponse->Assign("kelompok","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data kelompok ".$kode." - ".$nama." Gagal Di Update')");
        }
        return $objResponse;
    }

    
}
?>