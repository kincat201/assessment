<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Unit extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('unit_model');
        // $this->load->helper('rumus');
    }

    function index() {
        $data['title'] = 'Unit';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanunit',&$this,'simpanunit'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editunit',&$this,'editunit'));   
        $this->xajax->register(XAJAX_FUNCTION, array('updateunit',&$this,'updateunit'));   
        $this->xajax->register(XAJAX_FUNCTION, array('cariunit',&$this,'cariunit'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapusunit',&$this,'hapusunit'));
        $this->xajax->register(XAJAX_FUNCTION, array('deleteunit',&$this,'deleteunit'));                
        $this->xajax->processRequest();
        $data['unit'] = $this->unit_model->getdataunit(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/unit', $data);
    }

    function simpanunit($nama){
        $objResponse = new xajaxResponse();
        if ($nama=='') {
            $objResponse->script("alert('Nama Unit Belum Di Isi !')");
        } else {
            $data = $this->unit_model->simpanunit($nama);
            if ($data>0) {
                // $objResponse->script("alert('Simpan Berhasil')");
                $objResponse->Assign("alert","innerHTML", succ_msg("Unit ".$nama." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("nama","value","");
                $html = '';
                $data = $this->unit_model->getdataunit(''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->kunit."</td>
                                    <td>".$row->namaunit."</td>
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editunit(".$row->kunit.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete' onClick='hapusunit(".$row->kunit.")' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                </td>
                                </tr>";
                }
                $objResponse->Assign("unit","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function cariunit($nama){
        $objResponse = new xajaxResponse();
        $data = $this->unit_model->cariunit($nama); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kunit."</td>
                                <td>".$row->namaunit."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editunit(".$row->kunit.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete' onClick='hapusunit(".$row->kunit.")' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("unit","innerHTML",$html);
        return $objResponse;
    }
   
    function getdataunit($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->unit_model->getdataunit($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."unit/editunit/".$row->kunit."'>Edit</a>";
                $delete = "<a href='".base_url()."unit/deleteunit/".$row->kunit."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->kunit."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("unit","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editunit($kunit){
        $objResponse = new xajaxResponse();
        $data = $this->unit_model->getunitbykunit($kunit);
        foreach ($data as $row) {
            $objResponse->Assign("kunit","value",$row->kunit);
            $objResponse->Assign("namaunit","value",$row->namaunit);
        }
        return $objResponse;
    }

    function updateunit($kunit,$nama){
        $objResponse = new xajaxResponse();
        $data = $this->unit_model->updateunit($kunit,$nama);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("kunit","value","");
            $objResponse->Assign("namaunit","value","");
            $html='';
            $data = $this->unit_model->getdataunit('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kunit."</td>
                                <td>".$row->namaunit."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editunit(".$row->kunit.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete' onClick='hapusunit(".$row->kunit.")' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("unit","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data unit ".$kunit." - ".$nama." Gagal Di Update')");
        }
        return $objResponse;
    }

    function hapusunit($kunit){
        $objResponse = new xajaxResponse();
        $data = $this->unit_model->getunitbykunit($kunit);
        foreach ($data as $row) {
            $objResponse->Assign("kunit2","value",$row->kunit);
        }
        return $objResponse;
    }

    function deleteunit($kunit){
        $objResponse = new xajaxResponse();
        $data = $this->unit_model->deleteunit($kunit);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");
            $objResponse->Assign("kunit","value","");
            $objResponse->Assign("namaunit","value","");
            $html='';
            $data = $this->unit_model->getdataunit('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kunit."</td>
                                <td>".$row->namaunit."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editunit(".$row->kunit.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete' onClick='hapusunit(".$row->kunit.")' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("unit","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data unit ".$kunit." - ".$nama." Gagal Di Update')");
        }
        return $objResponse;
    }
  

}
?>