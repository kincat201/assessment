<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grade extends MY_Controller {

    var $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->model('m_grade');
    }

    function index() {
        $data['title'] = 'Grade';
        $this->xajax->register(XAJAX_FUNCTION, array('simpangrade',&$this,'simpangrade'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editgrade',&$this,'editgrade'));   
        $this->xajax->register(XAJAX_FUNCTION, array('updategrade',&$this,'updategrade'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapusgrade',&$this,'hapusgrade'));   
        $this->xajax->register(XAJAX_FUNCTION, array('deletegrade',&$this,'deletegrade'));   
        $this->xajax->register(XAJAX_FUNCTION, array('carigrade',&$this,'carigrade'));                
        $this->xajax->processRequest();

        $dataGrade = $this->m_grade->getdatagrade('',$this->limit,0);
        $data['grade'] = $dataGrade['result'];
        $item['currentpage'] = 1;
        $item['totalpage'] = ceil($dataGrade['total']/$this->limit);
        $data['pagination'] = $this->load->view('template_backend/pagination', $item, TRUE);

        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/v_grade', $data);
    }

    function simpangrade($namagrade,$struktural,$fungsional,$kelas){
        $objResponse = new xajaxResponse();
        if ($namagrade=='') {
            $objResponse->script("alert('Nama Grade Belum Di Isi !')");
        } else {
            $data = $this->m_grade->simpangrade($namagrade,$struktural,$fungsional,$kelas);
            if ($data>0) {
                // $objResponse->script("alert('Simpan Berhasil')");
                $objResponse->Assign("alert","innerHTML", succ_msg("grade ".$namagrade." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("nama","value","");
                $html = '';
                $data = $this->m_grade->getdatagrade(''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->noindex."</td>
                                    <td>".$row->grade."</td>
                                    <td>".$row->struktural."</td>
                                    <td>".$row->fungsional."</td>
                                    <td>".$row->kelas."</td>                                    
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editgrade(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusgrade(".$row->noindex.")'><i class='icon-edit'></i> Hapus </a>                                    
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("grade","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function carigrade($grade,$page=1){
        $objResponse = new xajaxResponse();
        $dataGrade = $this->m_grade->carigrade($grade,$this->limit,($this->limit * ($page - 1)));
        $data = $dataGrade['result'];   
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->grade."</td>
                                <td>".$row->struktural."</td>
                                <td>".$row->fungsional."</td>
                                <td>".$row->kelas."</td>                                    
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editgrade(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusgrade(".$row->noindex.")'><i class='icon-edit'></i> Hapus </a>                                
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $item['currentpage'] = $page;
        $item['totalpage'] = ceil($dataGrade['total']/$this->limit);
        $pagination = $this->load->view('template_backend/pagination', $item, TRUE);

        $objResponse->Assign("pagination","innerHTML",$pagination);
        $objResponse->Assign("grade","innerHTML",$html);
        return $objResponse;
    }
   
    function getdatagrade($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->m_grade->getdatagrade($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."grade/editgrade/".$row->noindex."'>Edit</a>";
                $delete = "<a href='".base_url()."grade/deletegrade/".$row->noindex."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->grade."</td>
                                <td>".$row->struktural."</td>
                                <td>".$row->fungsional."</td>
                                <td>".$row->kelas."</td>                                    
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("grade","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editgrade($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_grade->getgradebykgrade($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("kodegrade","value",$row->noindex);
            $objResponse->Assign("namagrade1","value",$row->grade);
            $objResponse->Assign("struktural1","value",$row->struktural);
            $objResponse->Assign("fungsional1","value",$row->fungsional);
            $objResponse->Assign("kelas1","value",$row->kelas);
        }
        return $objResponse;
    }

    function hapusgrade($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_grade->getgradebykgrade($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("kodegrade2","value",$row->noindex);
            $objResponse->Assign("namagrade2","value",$row->grade);            
            $objResponse->Assign("struktural2","value",$row->struktural);
            $objResponse->Assign("fungsional2","value",$row->fungsional);
            $objResponse->Assign("kelas2","value",$row->kelas);            
        }
        return $objResponse;
    }

    // function editgrade($noindex){
    //     $objResponse = new xajaxResponse();
    //     $data = $this->m_grade->getgradebykgrade($noindex);
    //     foreach ($data as $row) {
    //         $objResponse->Assign("kodegrade","value",$row->noindex);
    //         $objResponse->Assign("namagrade1","value",$row->grade);
    //         $objResponse->Assign("deskripsigrade1","value",$row->deskripsi);
    //     }
    //     return $objResponse;
    // }

    function updategrade($noindex,$namagrade1,$struktural1,$fungsional1,$kelas1){
        $objResponse = new xajaxResponse();
        $data = $this->m_grade->updategrade($noindex,$namagrade1,$struktural1,$fungsional1,$kelas1);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("kodegrade","value","");
            $objResponse->Assign("namagrade1","value","");            
            $objResponse->Assign("struktural1","value","");            
            $objResponse->Assign("fungsional1","value","");            
            $objResponse->Assign("kelas1","value","");            
            $html='';
            $data = $this->m_grade->getdatagrade('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->grade."</td>       
                                <td>".$row->struktural."</td>
                                <td>".$row->fungsional."</td>
                                <td>".$row->kelas."</td>                                                                                             
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editgrade(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusgrade(".$row->noindex.")'><i class='icon-edit'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("grade","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data grade ".$noindex." - ".$namagrade1." Gagal Di Update')");
        }
        return $objResponse;
    }

    function deletegrade($kodegrade2,$namagrade2){
        $objResponse = new xajaxResponse();
        $data = $this->m_grade->deletegrade($kodegrade2,$namagrade2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");
            $objResponse->Assign("kodegrade2","value","");
            $objResponse->Assign("namagrade2","value","");   
            $objResponse->Assign("struktural2","value","");            
            $objResponse->Assign("fungsional2","value","");            
            $objResponse->Assign("kelas2","value","");                                 
            $html='';
            $data = $this->m_grade->getdatagrade('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->grade."</td>        
                                <td>".$row->struktural."</td>
                                <td>".$row->fungsional."</td>
                                <td>".$row->kelas."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editgrade(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusgrade(".$row->noindex.")'><i class='icon-edit'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("grade","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data grade ".$kodegrade2." - ".$namagrade2." Gagal Di Hapus')");
        }
        return $objResponse;
    }  

    function cetakgrade() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_grade->cetakgrade();
         $this->load->view('master\cetakgrade', $data);
    }

}
?>