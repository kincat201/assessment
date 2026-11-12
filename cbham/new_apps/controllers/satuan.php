<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Satuan extends MY_Controller {

    var $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->model('m_satuan');
    }

    function index() {
        $data['title'] = 'Satuan';
        $this->xajax->register(XAJAX_FUNCTION, array('simpansatuan',&$this,'simpansatuan'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editsatuan',&$this,'editsatuan'));   
        $this->xajax->register(XAJAX_FUNCTION, array('updatesatuan',&$this,'updatesatuan'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapussatuan',&$this,'hapussatuan'));   
        $this->xajax->register(XAJAX_FUNCTION, array('deletesatuan',&$this,'deletesatuan'));   
        $this->xajax->register(XAJAX_FUNCTION, array('carisatuan',&$this,'carisatuan'));                
        $this->xajax->processRequest();

        $dataSatuan = $this->m_satuan->getdatasatuan('',$this->limit,0);
        $data['satuan'] = $dataSatuan['result'];
        $item['currentpage'] = 1;
        $item['totalpage'] = ceil($dataSatuan['total']/$this->limit);
        $data['pagination'] = $this->load->view('template_backend/pagination', $item, TRUE);
 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/v_satuan', $data);
    }

    function simpansatuan($namasatuan,$deskripsisatuan){
        $objResponse = new xajaxResponse();
        if ($namasatuan=='') {
            $objResponse->script("alert('Nama Satuan Belum Di Isi !')");
        } else {
            $data = $this->m_satuan->simpansatuan($namasatuan,$deskripsisatuan);
            if ($data>0) {
                // $objResponse->script("alert('Simpan Berhasil')");
                $objResponse->Assign("alert","innerHTML", succ_msg("Satuan ".$namasatuan." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("nama","value","");
                $html = '';
                $data = $this->m_satuan->getdatasatuan(''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->noindex."</td>
                                    <td>".$row->satuan."</td>
                                    <td>".$row->deskripsi."</td>
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editsatuan(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapussatuan(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("satuan","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function carisatuan($satuan,$page=1){
        $objResponse = new xajaxResponse();
        $dataSatuan = $this->m_satuan->carisatuan($satuan,$this->limit,($this->limit * ($page - 1)));
        $data = $dataSatuan['result'];  
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->deskripsi."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editsatuan(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapussatuan(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $item['currentpage'] = $page;
        $item['totalpage'] = ceil($dataSatuan['total']/$this->limit);
        $pagination = $this->load->view('template_backend/pagination', $item, TRUE);

        $objResponse->Assign("pagination","innerHTML",$pagination);
        $objResponse->Assign("satuan","innerHTML",$html);
        return $objResponse;
    }
   
    function getdatasatuan($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->m_satuan->getdatasatuan($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."satuan/editsatuan/".$row->noindex."'>Edit</a>";
                $delete = "<a href='".base_url()."satuan/deletesatuan/".$row->noindex."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("satuan","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editsatuan($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_satuan->getsatuanbyksatuan($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("kodesatuan","value",$row->noindex);
            $objResponse->Assign("namasatuan1","value",$row->satuan);
            $objResponse->Assign("deskripsisatuan1","value",$row->deskripsi);
        }
        return $objResponse;
    }

    function hapussatuan($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_satuan->getsatuanbyksatuan($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("kodesatuan2","value",$row->noindex);
            $objResponse->Assign("namasatuan2","value",$row->satuan);
            $objResponse->Assign("deskripsisatuan2","value",$row->deskripsi);
        }
        return $objResponse;
    }

    // function editsatuan($noindex){
    //     $objResponse = new xajaxResponse();
    //     $data = $this->m_satuan->getsatuanbyksatuan($noindex);
    //     foreach ($data as $row) {
    //         $objResponse->Assign("kodesatuan","value",$row->noindex);
    //         $objResponse->Assign("namasatuan1","value",$row->satuan);
    //         $objResponse->Assign("deskripsisatuan1","value",$row->deskripsi);
    //     }
    //     return $objResponse;
    // }

    function updatesatuan($noindex,$namasatuan1,$deskripsisatuan1){
        $objResponse = new xajaxResponse();
        $data = $this->m_satuan->updatesatuan($noindex,$namasatuan1,$deskripsisatuan1);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("kodesatuan","value","");
            $objResponse->Assign("namasatuan1","value","");
            $objResponse->Assign("deskripsisatuan1","value","");
            $html='';
            $data = $this->m_satuan->getdatasatuan('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->deskripsi."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editsatuan(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapussatuan(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("satuan","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data satuan ".$noindex." - ".$namasatuan1." Gagal Di Update')");
        }
        return $objResponse;
    }

    function deletesatuan($kodesatuan2,$namasatuan2,$deskripsisatuan2){
        $objResponse = new xajaxResponse();
        $data = $this->m_satuan->deletesatuan($kodesatuan2,$namasatuan2,$deskripsisatuan2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");
            $objResponse->Assign("kodesatuan2","value","");
            $objResponse->Assign("namasatuan2","value","");
            $objResponse->Assign("deskripsisatuan2","value","");
            $html='';
            $data = $this->m_satuan->getdatasatuan('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->deskripsi."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editsatuan(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapussatuan(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("satuan","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data satuan ".$kodesatuan2." - ".$namasatuan2." Gagal Di Hapus')");
        }
        return $objResponse;
    }  

    function cetaksatuan() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_satuan->cetaksatuan();
         $this->load->view('master\cetaksatuan', $data);
    }

}
?>