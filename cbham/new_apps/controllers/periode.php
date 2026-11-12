<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Periode extends MY_Controller {

    var $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->model('m_periode');
    }

    function index() {
        $data['title'] = 'Periode';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanperiode',&$this,'simpanperiode'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editperiode',&$this,'editperiode'));   
        $this->xajax->register(XAJAX_FUNCTION, array('updateperiode',&$this,'updateperiode'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapusperiode',&$this,'hapusperiode'));   
        $this->xajax->register(XAJAX_FUNCTION, array('deleteperiode',&$this,'deleteperiode'));   
        $this->xajax->register(XAJAX_FUNCTION, array('cariperiode',&$this,'cariperiode'));                
        $this->xajax->processRequest();

        $dataPeriode = $this->m_periode->getdataperiode('',$this->limit,0);
        $data['periode'] = $dataPeriode['result'];
        $item['currentpage'] = 1;
        $item['totalpage'] = ceil($dataPeriode['total']/$this->limit);
        $data['pagination'] = $this->load->view('template_backend/pagination', $item, TRUE);
 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/v_periode', $data);
    }

    function simpanperiode($namaperiode,$deskripsiperiode){
        $objResponse = new xajaxResponse();
        if ($namaperiode=='') {
            $objResponse->script("alert('Nama Periode Belum Di Isi !')");
        } else {
            $data = $this->m_periode->simpanperiode($namaperiode,$deskripsiperiode);
            if ($data>0) {
                $objResponse->Assign("alert","innerHTML", succ_msg("periode ".$namaperiode." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("nama","value","");
                $html = '';
                $data = $this->m_periode->getdataperiode(''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->noindex."</td>
                                    <td>".$row->periode."</td>
                                    <td>".$row->deskripsi."</td>
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editperiode(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusperiode(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>                                        
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("periode","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function cariperiode($periode,$page=1){
        $objResponse = new xajaxResponse();
        $dataPeriode = $this->m_periode->cariperiode($periode,$this->limit,($this->limit * ($page - 1)));
        $data = $dataPeriode['result'];   
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->deskripsi."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editperiode(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusperiode(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $item['currentpage'] = $page;
        $item['totalpage'] = ceil($dataPeriode['total']/$this->limit);
        $pagination = $this->load->view('template_backend/pagination', $item, TRUE);

        $objResponse->Assign("pagination","innerHTML",$pagination);
        $objResponse->Assign("periode","innerHTML",$html);
        return $objResponse;
    }
   
    function getdataperiode($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->m_periode->getdataperiode($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."periode/editperiode/".$row->noindex."'>Edit</a>";
                $delete = "<a href='".base_url()."periode/deleteperiode/".$row->noindex."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("periode","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editperiode($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_periode->getperiodebykperiode($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("kodeperiode","value",$row->noindex);
            $objResponse->Assign("namaperiode1","value",$row->periode);
            $objResponse->Assign("deskripsiperiode1","value",$row->deskripsi);
        }
        return $objResponse;
    }

    function hapusperiode($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_periode->getperiodebykperiode($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("kodeperiode2","value",$row->noindex);
            $objResponse->Assign("namaperiode2","value",$row->periode);
            $objResponse->Assign("deskripsiperiode2","value",$row->deskripsi);
        }
        return $objResponse;
    }

    function updateperiode($noindex,$namaperiode1,$deskripsiperiode1){
        $objResponse = new xajaxResponse();
        $data = $this->m_periode->updateperiode($noindex,$namaperiode1,$deskripsiperiode1);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("kodeperiode","value","");
            $objResponse->Assign("namaperiode1","value","");
            $objResponse->Assign("deskripsiperiode1","value","");
            $html='';
            $data = $this->m_periode->getdataperiode('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->deskripsi."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editperiode(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusperiode(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("periode","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data periode ".$noindex." - ".$namaperiode1." Gagal Di Update')");
        }
        return $objResponse;
    }

    function deleteperiode($kodeperiode2,$namaperiode2,$deskripsiperiode2){
        $objResponse = new xajaxResponse();
        $data = $this->m_periode->deleteperiode($kodeperiode2,$namaperiode2,$deskripsiperiode2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");
            $objResponse->Assign("kodeperiode2","value","");
            $objResponse->Assign("namaperiode2","value","");
            $objResponse->Assign("deskripsiperiode2","value","");
            $html='';
            $data = $this->m_periode->getdataperiode('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->deskripsi."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editperiode(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusperiode(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("periode","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data periode ".$kodeperiode2." - ".$namaperiode2." Gagal Di Hapus')");
        }
        return $objResponse;
    }  

    function cetakperiode() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_periode->cetakperiode();
         $this->load->view('master\cetakperiode', $data);
    }

}
?>