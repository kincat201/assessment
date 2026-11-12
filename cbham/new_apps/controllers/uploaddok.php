<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class uploaddok extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_uploaddok');
    }

    function index() {
        $data['title'] = 'Upload Dokumen';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanuploaddok',&$this,'simpanuploaddok'));   
        $this->xajax->register(XAJAX_FUNCTION, array('simpandata',&$this,'simpandata'));   
        $this->xajax->register(XAJAX_FUNCTION, array('edituploaddok',&$this,'edituploaddok'));   
        $this->xajax->register(XAJAX_FUNCTION, array('updateuploaddok',&$this,'updateuploaddok'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapusuploaddok',&$this,'hapusuploaddok'));   
        $this->xajax->register(XAJAX_FUNCTION, array('deleteuploaddok',&$this,'deleteuploaddok'));   
        $this->xajax->register(XAJAX_FUNCTION, array('cariuploaddok',&$this,'cariuploaddok'));                
        $this->xajax->processRequest();
        $data['uploaddok'] = $this->m_uploaddok->getdatauploaddok(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('uploaddok/v_uploaddok', $data);
    }

    function simpanuploaddok(){
        $name = $_FILES['upfile']['name']; 
        $name = str_replace(" ","_",$name);
        $this->load->library('upload');
        echo $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/cbham/pdf';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '20000000';
        $config['overwrite'] = TRUE;
        $config['filename'] = $name;
        $this->upload->initialize($config);
        if($_FILES['upfile']['size']>$config['max_size']){
            $error = array('error' => $this->upload->display_errors()); 
            echo $error['error'];        
        }
        else{
            if ( !$this->upload->do_upload('upfile'))
            {
              $error = array('error' => $this->upload->display_errors());     
              echo $error['error'];
            }
            else
            {
              $data = array('upload_data' => $this->upload->data());      
              echo "Sukses";
            }
        }
      
    }

    function simpandata($namafile,$txtFolder){  
        $objResponse = new xajaxResponse();
        $html2 = '';
        $style = "odd";
        $c=0;
        $value = $this->m_uploaddok->simpandata($namafile,$txtFolder);
        if ($value>0) {
            $objResponse->script("alert('Simpan Berhasil')");
            $objResponse->script("$('#tambah').modal('hide')");
            $data = $this->m_uploaddok->getdatauploaddok('');            
            foreach ($data as $row) {
                $html2 = $html2."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->namafile."</td>
                                <td>".$row->url."</td>
                                <td>                                    
                                    <a data-toggle='modal' href='#delete' onClick='deleteuploaddok(".$row->noindex.")' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                    <a class='btn mini purple sbold' target='_blank' href='".base_url()."pdf/".$row->namafile."'><i class='icon-download'></i> Download</a>
                                </td>
                            </tr>";
            }            
            $objResponse->Assign("uploaddok","innerHTML",$html2);
        } else {
            $objResponse->script("alert('Data uploaddok ".$namafile." Gagal Disimpan')");
        }
        return $objResponse;
    }

    function hapusuploaddok($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_uploaddok->getuploaddokbykuploaddok($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("kodedok2","value",$row->noindex);
            $objResponse->Assign("namafile2","value",$row->namafile);
            $objResponse->Assign("alamatfile2","value",$row->url);
        }
        return $objResponse;
    }

    function deleteuploaddok($kodedok2){
        $objResponse = new xajaxResponse();
        $data = $this->m_uploaddok->deleteuploaddok($kodedok2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->Assign("kodedok2","value","");
            $objResponse->Assign("namafile2","value","");
            $objResponse->Assign("alamatfile2","value","");
            $html='';
            $data = $this->m_uploaddok->getdatauploaddok('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->namafile."</td>
                                <td>".$row->url."</td>
                                <td>                                    
                                    <a data-toggle='modal' href='#delete' onClick='deleteuploaddok(".$row->noindex.")' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                    <a class='btn mini purple sbold' target='_blank' href='".base_url()."pdf/".$row->namafile."'><i class='icon-download'></i> Download</a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("uploaddok","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data uploaddok ".$kodedok2." Gagal Di Hapus')");
        }
        return $objResponse;
    }  

    function getdatauploaddok($namafile){
        $html='';        
        $objResponse = new xajaxResponse();
        $data = $this->m_uploaddok->getdatauploaddok($namafile);
        if (count($data)>0) {
            foreach ($data as $row) {                
                $download = "<a href='".base_url()."pdf/".$row->namafile."'>Download</a>";
                $delete = "<a href='".base_url()."uploaddok/deleteuploaddok/".$row->noindex."'>Hapus</a>";
                $html = $html."<tr>                                
                                <td>".$row->noindex."</td>
                                <td>".$row->namafile."</td>
                                <td>".$row->url."</td>
                                <td>".$delete."</td>
                                <td>".$download."</td>
                               </tr>";
            }
            $objResponse->Assign("uploaddok","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function cariuploaddok($uploaddok){
        $objResponse = new xajaxResponse();
        $data = $this->m_uploaddok->cariuploaddok($uploaddok); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->namafile."</td>
                                <td>".$row->url."</td>
                                <td>
                                    <a data-toggle='modal' href='#delete' onClick='deleteuploaddok(".$row->noindex.")' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                    <a class='btn mini purple sbold' target='_blank' href='".base_url()."pdf/".$row->namafile."'><i class='icon-download'></i> Download</a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("uploaddok","innerHTML",$html);
        return $objResponse;
    }

    function cetakuploaddok($namafile){
        $data= $this->m_uploaddok->cetakuploaddok($namafile);
        $this->load->view('uploaddok/cetakuploaddok',$data); 
    }
   
    function downloaddok() {
        $data['title'] = 'Download Dokumen';
        $this->xajax->register(XAJAX_FUNCTION, array('caridownloaddok',&$this,'caridownloaddok'));                
        $this->xajax->processRequest();
        $data['uploaddok'] = $this->m_uploaddok->getdatauploaddok(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('uploaddok/v_downloaddok', $data);
    }

    function caridownloaddok($uploaddok){
        $objResponse = new xajaxResponse();
        $data = $this->m_uploaddok->cariuploaddok($uploaddok); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->namafile."</td>
                                <td>".$row->url."</td>
                                <td>                                    
                                    <a class='btn mini purple sbold' target='_blank' href='".base_url()."pdf/".$row->namafile."'><i class='icon-download'></i> Download</a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("uploaddok","innerHTML",$html);
        return $objResponse;
    }

}
?>