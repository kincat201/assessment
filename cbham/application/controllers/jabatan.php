<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jabatan extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('jabatan_model');
        // $this->load->helper('rumus');
    }

    function index() {
        $data['title'] = 'Jabatan';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanjabatan',&$this,'simpanjabatan'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editjabatan',&$this,'editjabatan')); 
        $this->xajax->register(XAJAX_FUNCTION, array('updatejabatan',&$this,'updatejabatan'));    
        $this->xajax->register(XAJAX_FUNCTION, array('carijabatan',&$this,'carijabatan'));            
        $this->xajax->register(XAJAX_FUNCTION, array('hapusjabatan',&$this,'hapusjabatan'));            
        $this->xajax->register(XAJAX_FUNCTION, array('deletejabatan',&$this,'deletejabatan'));            
        $this->xajax->processRequest();
        $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['kelomjab'] = $this->jabatan_model->getkelomjabatan(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/jabatan', $data);
    }

    function simpanjabatan($nama,$kelompok){
        $objResponse = new xajaxResponse();
        if ($nama=='') {
            $objResponse->script("alert('Nama Jabatan Belum Di Isi !')");
        } else {
            $data = $this->jabatan_model->simpanjabatan($nama,$kelompok);
            if ($data>0) {
                // $objResponse->script("alert('Simpan Berhasil')");
                $objResponse->Assign("alert","innerHTML", succ_msg("Jabatan ".$nama." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("nama","value","");
                $html = '';
                $data = $this->jabatan_model->getdatajabatan(''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->kojab."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td>".$row->namakelompok."</td>
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editjabatan(".$row->kojab.")'><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusjabatan(".$row->kojab.")'><i class='icon-trash'></i> Hapus </a>
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("jabatan","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function carijabatan($nama){
        $objResponse = new xajaxResponse();
        $data = $this->jabatan_model->carijabatan($nama); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kojab."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$row->namakelompok."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editjabatan(".$row->kojab.")'><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusjabatan(".$row->kojab.")'><i class='icon-trash'></i> Hapus </a>
                                    </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("jabatan","innerHTML",$html);
        return $objResponse;
    }

    function getdatajabatan($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->jabatan_model->getdatajabatan($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."jabatan/editjabatan/".$row->kojab."'>Edit</a>";
                $delete = "<a href='".base_url()."jabatan/deletejabatan/".$row->kojab."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->kojab."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$row->namakelompok."</td>
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("jabatan","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editjabatan($kojab){
        $objResponse = new xajaxResponse();
        $data = $this->jabatan_model->getjabatanbykojab($kojab);
        foreach ($data as $row) {
            $objResponse->Assign("kojab","value",$row->kojab);
            $objResponse->Assign("namajabatan","value",$row->namajabatan);
            $objResponse->Assign("kelompok2","value",$row->kelompok);
        }
        return $objResponse;
    }

    function updatejabatan($kojab,$nama,$kelompok2){
        $objResponse = new xajaxResponse();
        $data = $this->jabatan_model->updatejabatan($kojab,$nama,$kelompok2);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("kojab","value","");
            $objResponse->Assign("nama","value","");
            $html='';
            $data = $this->jabatan_model->getdatajabatan('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kojab."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$row->namakelompok."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editjabatan(".$row->kojab.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusjabatan(".$row->kojab.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("jabatan","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data jabatan ".$kojab." - ".$nama." Gagal Di Update')");
        }
        return $objResponse;
    }

    function hapusjabatan($kode){
        $objResponse = new xajaxResponse();
        $data = $this->jabatan_model->getjabatanbykojab($kode);
        foreach ($data as $row) {
            $objResponse->Assign("kojab2","value",$row->kojab);            
        }
        return $objResponse;
    }

    function deletejabatan($kojab2){
        $objResponse = new xajaxResponse();
        $data = $this->jabatan_model->deletejabatan($kojab2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");            
            $html='';
            $data = $this->jabatan_model->getdatajabatan(''); 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kojab."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$row->namakelompok."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editjabatan(".$row->kojab.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusjabatan(".$row->kojab.")'><i class='icon-trash'></i> Hapus </a>                                        
                                </td>
                            </tr>";
            }
            $objResponse->Assign("jabatan","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Gagal Dihapus')");
        }
        return $objResponse;
    } 

    function cetakjabatan() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->jabatan_model->cetakjabatan();
         $this->load->view('master\cetakjabatan', $data);
    }

    function strukturjabatan() {
        $data['title'] = 'Struktur Jabatan';
        $this->xajax->register(XAJAX_FUNCTION, array('tambahstruktur',&$this,'tambahstruktur'));   
        $this->xajax->register(XAJAX_FUNCTION, array('getstruktur',&$this,'getstruktur'));
        $this->xajax->register(XAJAX_FUNCTION, array('hapusstruktur',&$this,'hapusstruktur'));          
        $this->xajax->processRequest();
        $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/strukturjabatan', $data);
    }

    function getstruktur($jabatan){
        $objResponse = new xajaxResponse();
        $html = '';
        $data = $this->jabatan_model->getstruktur($jabatan); 
        if(count($data)>0){
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kojab."</td>
                                <td>".$row->namajabatan."</td>
                                <td>                                    
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusstruktur(".$row->kojab1.",".$row->kojab2.")'><i class='icon-trash'></i> Hapus </a>                                        
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Underline Belum Ada</td></tr>";
        }
        $objResponse->Assign("jabatan","innerHTML",$html);
        return $objResponse;
    }

    function hapusstruktur($kojab1,$kojab2){
        $objResponse = new xajaxResponse();
        $data = $this->jabatan_model->hapusstruktur($kojab2);
        $html ='';
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");                                
            $data1 = $this->jabatan_model->caristruktur($kojab1); 
            // print_r($data1);exit();
            if ($data1>0) {
                foreach ($data1 as $row) {
                    $html = $html."<tr>
                                    <td>".$row->kojab."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td>
                                        <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusstruktur(".$row->kojab1.",".$row->kojab2.")'><i class='icon-trash'></i> Hapus </a>                                        
                                    </td>
                                </tr>";
                }            
            }else{
                $html = $html."<tr><td colspan='3'>Underline Belum Ada</td></tr>";
            }
        } else {
            $objResponse->script("alert('Data Gagal Dihapus')");
            // $html = $html."<tr><td colspan='3'>Underline Belum Ada</td></tr>";
        }
        $objResponse->Assign("jabatan","innerHTML",$html);
        return $objResponse;
    } 
  
    function tambahstruktur($jabatan1,$jabatan2){
        $objResponse = new xajaxResponse();
        if ($jabatan1=='' || $jabatan2=='') {
            $objResponse->script("alert('Jabatan/Underline Belum Di Pilih !')");
        } else {
            $data = $this->jabatan_model->tambahstruktur($jabatan1,$jabatan2);
            if ($data>0) {
                $objResponse->Assign("alert","innerHTML", succ_msg("Underline Berhasil Ditambahkan"));
                $objResponse->Assign("jabatan2","value","");
                $html = '';
                $data = $this->jabatan_model->getstruktur($jabatan1); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->kojab."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td>
                                        <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusstruktur(".$row->kojab1.",".$row->kojab2.")'><i class='icon-trash'></i> Hapus </a>                                        
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("jabatan","innerHTML",$html);
            } else {
                $objResponse->script("alert('Underline Gagal Ditambahkan')");
            }
        }
        return $objResponse;
    }

    function jabatanList(){
        $id     =   $this->input->post('id');
        $data   =   $this->input->post('data');        
        if ($id && $data)
        {
            $empRec = $this->jabatan_model->getjabatanList($data);
            $dataList = array();
            if(sizeof($empRec)>0)
            {
                foreach($empRec as $row)
                {
                   $dataList[] = '<li id="' .$row->kojab. '"><a href="#">'.htmlentities($row->namajabatan).'</a></li>';              
                }
            }
            if (count($dataList)>=1)
            {
                $dataOutput = join("\r\n", $dataList);
                echo $dataOutput;
            }
            else
            {
                echo '<li><a href="#">No Results</a></li>';
            }       
        }
        else
        {
            echo 'Request Error';
        }
    }

}
?>