<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rollup extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_rollup');
    }

    function index() {
        $data['title'] = 'Rollup';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanrollup',&$this,'simpanrollup'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editrollup',&$this,'editrollup'));   
        $this->xajax->register(XAJAX_FUNCTION, array('updaterollup',&$this,'updaterollup'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapusrollup',&$this,'hapusrollup'));   
        $this->xajax->register(XAJAX_FUNCTION, array('deleterollup',&$this,'deleterollup'));   
        $this->xajax->register(XAJAX_FUNCTION, array('carirollup',&$this,'carirollup'));                
        $this->xajax->processRequest();
        $data['rollup'] = $this->m_rollup->getdatarollup(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/v_rollup', $data);
    }

    function simpanrollup($namarollup,$deskripsirollup){
        $objResponse = new xajaxResponse();
        if ($namarollup=='') {
            $objResponse->script("alert('Nama Rollup Belum Di Isi !')");
        } else {
            $data = $this->m_rollup->simpanrollup($namarollup,$deskripsirollup);
            if ($data>0) {
                $objResponse->Assign("alert","innerHTML", succ_msg("rollup ".$namarollup." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("nama","value","");
                $html = '';
                $data = $this->m_rollup->getdatarollup(''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->noindex."</td>
                                    <td>".$row->rollup."</td>
                                    <td>".$row->deskripsi."</td>
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editrollup(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                        <a data-toggle='modal' href='#delete".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("rollup","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function carirollup($rollup){
        $objResponse = new xajaxResponse();
        $data = $this->m_rollup->carirollup($rollup); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->deskripsi."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editrollup(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("rollup","innerHTML",$html);
        return $objResponse;
    }
   
    function getdatarollup($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->m_rollup->getdatarollup($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."rollup/editrollup/".$row->noindex."'>Edit</a>";
                $delete = "<a href='".base_url()."rollup/deleterollup/".$row->noindex."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("rollup","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editrollup($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_rollup->getrollupbykrollup($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("koderollup","value",$row->noindex);
            $objResponse->Assign("namarollup1","value",$row->rollup);
            $objResponse->Assign("deskripsirollup1","value",$row->deskripsi);
        }
        return $objResponse;
    }

    function hapusrollup($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_rollup->getrollupbykrollup($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("koderollup2","value",$row->noindex);
            $objResponse->Assign("namarollup2","value",$row->rollup);
            $objResponse->Assign("deskripsirollup2","value",$row->deskripsi);
        }
        return $objResponse;
    }

    function updaterollup($noindex,$namarollup1,$deskripsirollup1){
        $objResponse = new xajaxResponse();
        $data = $this->m_rollup->updaterollup($noindex,$namarollup1,$deskripsirollup1);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("koderollup","value","");
            $objResponse->Assign("namarollup1","value","");
            $objResponse->Assign("deskripsirollup1","value","");
            $html='';
            $data = $this->m_rollup->getdatarollup('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->deskripsi."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editrollup(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("rollup","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data rollup ".$noindex." - ".$namarollup1." Gagal Di Update')");
        }
        return $objResponse;
    }

    function deleterollup($koderollup2,$namarollup2,$deskripsirollup2){
        $objResponse = new xajaxResponse();
        $data = $this->m_rollup->deleterollup($koderollup2,$namarollup2,$deskripsirollup2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");
            $objResponse->Assign("koderollup2","value","");
            $objResponse->Assign("namarollup2","value","");
            $objResponse->Assign("deskripsirollup2","value","");
            $html='';
            $data = $this->m_rollup->getdatarollup('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->deskripsi."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editrollup(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("rollup","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data rollup ".$koderollup2." - ".$namarollup2." Gagal Di Hapus')");
        }
        return $objResponse;
    }  

    function cetakrollup() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_rollup->cetakrollup();
         $this->load->view('master\cetakrollup', $data);
    }

}
?>