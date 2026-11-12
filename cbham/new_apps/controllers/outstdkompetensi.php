<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Outstdkompetensi extends MY_Controller {

  function __construct() {
      parent::__construct();
      $this->load->model('stdknowhow_model');
      $this->load->model('stdmanagerial_model');
      $this->load->model('outstdkompetensi_model');
      $this->load->model('jabatan_model');        
  }

  function index() {
      $data['title'] = 'Output Standar Kompetensi';
      $this->xajax->register(XAJAX_FUNCTION, array('carioutstdkompetensi',&$this,'carioutstdkompetensi'));                
      $this->xajax->processRequest();

      $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
      $data['xajax_js'] = $this->xajax->getJavascript();
      $this->template->display('stdkompetensi/outstdkompetensi', $data);
  }

  function carioutstdkompetensi($kojab){
    $style = "odd";
    $html = '';
    $data = $this->outstdkompetensi_model->carioutstdkompetensi($kojab);
    if($data<>0) {
      foreach($data as $row) {
        $html = $html."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket1."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket8."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket6."</td></tr>";         
      }
    } else{
      $html = $html."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
    } 
    $objResponse = new xajaxResponse();
    $objResponse->Assign("outstdkompetensi","innerHTML", $html);
    return $objResponse; 
  }

  function cetakoutstdkompetensipdf() {
    $this->load->library('fpdf');
    define('FPDF_FONTPATH',$this->config->item('fonts_path'));
    $data['dataku'] = $this->outstdkompetensi_model->cetakoutstdkompetensi();
    $this->load->view('stdkompetensi\cetakoutstdkompetensipdf',$data);
  }

    function jabatanList(){

            $id     =   $this->input->post('id');          // The id of the input that submitted the request.
            $data   =   $this->input->post('data');        // The value of the textbox.
            
            if ($id && $data)
            {
                $empRec = $this->stdknowhow_model->getjabatanList($data);
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