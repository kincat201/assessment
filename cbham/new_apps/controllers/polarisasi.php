<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Polarisasi extends MY_Controller {

    var $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->model('m_polarisasi');
    }

    function index() {
        $data['title'] = 'Polarisasi';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanpolarisasi',&$this,'simpanpolarisasi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editpolarisasi',&$this,'editpolarisasi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('updatepolarisasi',&$this,'updatepolarisasi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapuspolarisasi',&$this,'hapuspolarisasi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('deletepolarisasi',&$this,'deletepolarisasi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('caripolarisasi',&$this,'caripolarisasi'));                
        $this->xajax->processRequest();

        $dataPolarisasi = $this->m_polarisasi->getdatapolarisasi('',$this->limit,0);
        $data['polarisasi'] = $dataPolarisasi['result'];
        $item['currentpage'] = 1;
        $item['totalpage'] = ceil($dataPolarisasi['total']/$this->limit);
        $data['pagination'] = $this->load->view('template_backend/pagination', $item, TRUE);

        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/v_polarisasi', $data);
    }

    function simpanpolarisasi($namapolarisasi,$deskripsipolarisasi,$formula,$konstanta){
        $objResponse = new xajaxResponse();
        if ($namapolarisasi=='') {
            $objResponse->script("alert('Nama Polarisasi Belum Di Isi !')");
        } else {
            $data = $this->m_polarisasi->simpanpolarisasi($namapolarisasi,$deskripsipolarisasi,$formula,$konstanta);
            if ($data>0) {
                $objResponse->Assign("alert","innerHTML", succ_msg("Polarisasi ".$namapolarisasi." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("nama","value","");
                $html = '';
                $data = $this->m_polarisasi->getdatapolarisasi(''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->noindex."</td>
                                    <td>".$row->polarisasi."</td>
                                    <td>".$row->deskripsi."</td>
                                    <td>".$row->formula."</td>
                                    <td>".$row->konstanta."</td>
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editpolarisasi(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuspolarisasi(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>                                        
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("polarisasi","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function caripolarisasi($polarisasi,$page=1){
        $objResponse = new xajaxResponse();
        $dataPolarisasi = $this->m_polarisasi->caripolarisasi($polarisasi,$this->limit,($this->limit * ($page - 1)));
        $data = $dataPolarisasi['result'];   
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->polarisasi."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->formula."</td>
                                <td>".$row->konstanta."</td>                                
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editpolarisasi(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuspolarisasi(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $item['currentpage'] = $page;
        $item['totalpage'] = ceil($dataPolarisasi['total']/$this->limit);
        $pagination = $this->load->view('template_backend/pagination', $item, TRUE);

        $objResponse->Assign("pagination","innerHTML",$pagination);
        $objResponse->Assign("polarisasi","innerHTML",$html);
        return $objResponse;
    }
   
    function getdatapolarisasi($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->m_polarisasi->getdatapolarisasi($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."polarisasi/editpolarisasi/".$row->noindex."'>Edit</a>";
                $delete = "<a href='".base_url()."polarisasi/deletepolarisasi/".$row->noindex."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->polarisasi."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->formula."</td>
                                <td>".$row->konstanta."</td>
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("polarisasi","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editpolarisasi($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_polarisasi->getpolarisasibykpolarisasi($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("kodepolarisasi","value",$row->noindex);
            $objResponse->Assign("namapolarisasi1","value",$row->polarisasi);
            $objResponse->Assign("deskripsipolarisasi1","value",$row->deskripsi);
            $objResponse->Assign("formula1","value",$row->formula);
            $objResponse->Assign("konstanta1","value",$row->konstanta);            
        }
        return $objResponse;
    }

    function hapuspolarisasi($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_polarisasi->getpolarisasibykpolarisasi($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("kodepolarisasi2","value",$row->noindex);
            $objResponse->Assign("namapolarisasi2","value",$row->polarisasi);
            $objResponse->Assign("deskripsipolarisasi2","value",$row->deskripsi);
            $objResponse->Assign("formula2","value",$row->formula);
            $objResponse->Assign("konstanta2","value",$row->konstanta);                        
        }
        return $objResponse;
    }

    function updatepolarisasi($noindex,$namapolarisasi1,$deskripsipolarisasi1,$formula1,$konstanta1){
        $objResponse = new xajaxResponse();
        $data = $this->m_polarisasi->updatepolarisasi($noindex,$namapolarisasi1,$deskripsipolarisasi1,$formula1,$konstanta1);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("kodepolarisasi","value","");
            $objResponse->Assign("namapolarisasi1","value","");
            $objResponse->Assign("deskripsipolarisasi1","value","");
            $objResponse->Assign("formula1","value","");
            $objResponse->Assign("konstanta1","value","");            
            $html='';
            $data = $this->m_polarisasi->getdatapolarisasi('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->polarisasi."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->formula."</td>
                                <td>".$row->konstanta."</td>                                
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editpolarisasi(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuspolarisasi(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("polarisasi","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Polarisasi ".$noindex." - ".$namapolarisasi1." Gagal Di Update')");
        }
        return $objResponse;
    }

    function deletepolarisasi($kodepolarisasi2,$namapolarisasi2,$deskripsipolarisasi2,$formula2,$konstanta2){
        $objResponse = new xajaxResponse();
        $data = $this->m_polarisasi->deletepolarisasi($kodepolarisasi2,$namapolarisasi2,$deskripsipolarisasi2,$formula2,$konstanta2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");
            $objResponse->Assign("kodepolarisasi2","value","");
            $objResponse->Assign("namapolarisasi2","value","");
            $objResponse->Assign("deskripsipolarisasi2","value","");
            $objResponse->Assign("formula2","value","");
            $objResponse->Assign("konstanta2","value","");            
            $html='';
            $data = $this->m_polarisasi->getdatapolarisasi('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->polarisasi."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->formula."</td>
                                <td>".$row->konstanta."</td>                                
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editpolarisasi(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuspolarisasi(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("polarisasi","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Polarisasi ".$kodepolarisasi2." - ".$namapolarisasi2." Gagal Di Hapus')");
        }
        return $objResponse;
    }  

    function cetakpolarisasi() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_polarisasi->cetakpolarisasi();
         $this->load->view('master\cetakpolarisasi', $data);
    }

}
?>