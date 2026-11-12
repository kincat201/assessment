<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelompok extends MY_Controller {

    var $limit = 10;

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
        $this->xajax->register(XAJAX_FUNCTION, array('hapuskelompok',&$this,'hapuskelompok'));
        $this->xajax->register(XAJAX_FUNCTION, array('deletekelompok',&$this,'deletekelompok'));            
        $this->xajax->processRequest();
        $dataKelompok = $this->kelompok_model->getdatakelompok('',$this->limit,0);
        $data['kelompok'] = $dataKelompok['result'];
        $item['currentpage'] = 1;
        $item['totalpage'] = ceil($dataKelompok['total']/$this->limit);
        $data['pagination'] = $this->load->view('template_backend/pagination', $item, TRUE);
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/kelompok', $data);
    }

    function hapuskelompok($kode){
        $objResponse = new xajaxResponse();
        $data = $this->kelompok_model->getkelompokbykode($kode);
        foreach ($data as $row) {
            $objResponse->Assign("kodekelom2","value",$row->kodekelom);            
        }
        return $objResponse;
    }

    function deletekelompok($kodekelom2){
        $objResponse = new xajaxResponse();
        $data = $this->kelompok_model->deletekelompok($kodekelom2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");            
            $html='';
            $data = $this->kelompok_model->getdatakelompok(''); 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodekelom."</td>
                                <td>".$row->namakelompok."</td>
                                <td>".$row->kra."</td>
                                <td>".$row->kba."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editkelompok(".$row->kodekelom.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuskelompok(".$row->kodekelom.")'><i class='icon-trash'></i> Hapus </a>                                        
                                </td>
                            </tr>";
            }
            $objResponse->Assign("kelompok","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Gagal Dihapus')");
        }
        return $objResponse;
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
                                        <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuskelompok(".$row->kodekelom.")'><i class='icon-trash'></i> Hapus </a>                                        
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

    function carikelompok($nama,$page =1){
        $objResponse = new xajaxResponse();
        $dataKelompok = $this->kelompok_model->carikelompok($nama,$this->limit,($this->limit * ($page - 1)));
        $data = $dataKelompok['result'];  
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodekelom."</td>
                                <td>".$row->namakelompok."</td>
                                <td>".$row->kra."</td>
                                <td>".$row->kba."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editkelompok(".$row->kodekelom.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuskelompok(".$row->kodekelom.")'><i class='icon-trash'></i> Hapus </a>                                        
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $item['currentpage'] = $page;
        $item['totalpage'] = ceil($dataKelompok['total']/$this->limit);
        $pagination = $this->load->view('template_backend/pagination', $item, TRUE);

        $objResponse->Assign("pagination","innerHTML",$pagination);
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
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuskelompok(".$row->kodekelom.")'><i class='icon-trash'></i> Hapus </a>                                        
                                </td>
                            </tr>";
            }
            $objResponse->Assign("kelompok","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data kelompok ".$kode." - ".$nama." Gagal Di Update')");
        }
        return $objResponse;
    }

    function cetakkelompok() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->kelompok_model->cetakkelompok();
         $this->load->view('master\cetakkelompok', $data);
    }
    
}
?>