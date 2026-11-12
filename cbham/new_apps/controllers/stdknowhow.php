<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stdknowhow extends MY_Controller {

  function __construct() {
      parent::__construct();
      $this->load->model('stdknowhow_model');
      $this->load->model('jabatan_model');
      // $this->load->model('unit_model');
  }

  function index() {
      $data['title'] = 'Standar Knowhow';
      $this->xajax->register(XAJAX_FUNCTION, array('simpanstdknowhow',&$this,'simpanstdknowhow'));                
      $this->xajax->register(XAJAX_FUNCTION, array('caristdknowhow',&$this,'caristdknowhow'));                        
      $this->xajax->register(XAJAX_FUNCTION, array('carireportstdknowhow',&$this,'carireportstdknowhow'));                        
      $this->xajax->processRequest();

      $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
      $data['xajax_js'] = $this->xajax->getJavascript();
      $this->template->display('stdkompetensi/stdknowhow', $data);
  }

  function caristdknowhow($kojab){
    $data = $this->stdknowhow_model->caristdknowhow($kojab);
    $objResponse = new xajaxResponse();

    if($data) {
      $objResponse->Assign("alert","innerHTML", succ_msg("Data jabatan ditemukan"));

      $objResponse->Assign("kojab","value", $data->kojab);
      $objResponse->Assign("fe","value", $data->fe);
      $objResponse->Assign("ie","value", $data->ie);
      $objResponse->Assign("ex","value", $data->ex);
      $objResponse->Assign("bs","value", $data->bs);
      $objResponse->Assign("tsmkt","value", $data->tsmkt);
      $objResponse->Assign("tsest","value", $data->tsest);
      $objResponse->Assign("tsppc","value", $data->tsppc);
      $objResponse->Assign("tscon","value", $data->tscon);
      $objResponse->Assign("tsqac","value", $data->tsqac);
      $objResponse->Assign("tsman","value", $data->tsman);
      $objResponse->Assign("tssar","value", $data->tssar);
      $objResponse->Assign("tscs","value", $data->tscs);
      $objResponse->Assign("tspeng","value", $data->tspeng);
      $objResponse->Assign("tsfat","value", $data->tsfat);
      $objResponse->Assign("tshse","value", $data->tshse);
      $objResponse->Assign("tshrd","value", $data->tshrd);
      $objResponse->Assign("tsga","value", $data->tsga);
      $objResponse->Assign("tsmd","value", $data->tsmd);
      $objResponse->Assign("tsmr","value", $data->tsmr);
      $objResponse->Assign("tsengmech","value", $data->tsengmech);
      $objResponse->Assign("tsengelec","value", $data->tsengelec);
      $objResponse->Assign("tsenginst","value", $data->tsenginst);
      $objResponse->Assign("tsengciv","value", $data->tsengciv);
      $objResponse->Assign("tssd","value", $data->tssd);
      $objResponse->Assign("tsia","value", $data->tsia);
      $objResponse->Assign("tstop","value", $data->tstop);
    }else{
      $objResponse->Assign("alert","innerHTML", err_msg("Data jabatan tidak ditemukan"));
      $objResponse->Assign("kojab","value", $kojab);
      $objResponse->Assign("fe","value", 0);
      $objResponse->Assign("ie","value", 0);
      $objResponse->Assign("ex","value", 0);
      $objResponse->Assign("bs","value", 0);
      $objResponse->Assign("tsmkt","value", 0);
      $objResponse->Assign("tsest","value", 0);
      $objResponse->Assign("tsppc","value", 0);
      $objResponse->Assign("tscon","value", 0);
      $objResponse->Assign("tsqac","value", 0);
      $objResponse->Assign("tsman","value", 0);
      $objResponse->Assign("tssar","value", 0);
      $objResponse->Assign("tscs","value", 0);
      $objResponse->Assign("tspeng","value", 0);
      $objResponse->Assign("tsfat","value", 0);
      $objResponse->Assign("tshse","value", 0);
      $objResponse->Assign("tshrd","value", 0);
      $objResponse->Assign("tsga","value", 0);
      $objResponse->Assign("tsmd","value", 0);
      $objResponse->Assign("tsmr","value", 0);
      $objResponse->Assign("tsengmech","value", 0);
      $objResponse->Assign("tsengelec","value", 0);
      $objResponse->Assign("tsenginst","value", 0);
      $objResponse->Assign("tsengciv","value", 0);
      $objResponse->Assign("tssd","value", 0);
      $objResponse->Assign("tsia","value", 0);
      $objResponse->Assign("tstop","value", 0);
    }

    return $objResponse;
  }

  function carireportstdknowhow($kojab){
    $style = "odd";
    $html = '';
    $print = '';
    $data = $this->stdknowhow_model->carireportstdknowhow($kojab);
    if($data<>0)
    {
      foreach($data as $row) {
        $html = $html."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket1."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket8."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket6."</td></tr>";
      }              
    } 
    else{
      $html = $html."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
    } 

    $objResponse = new xajaxResponse();
    $objResponse->Assign("stdknowhow","innerHTML", $html);
    return $objResponse; 
  }

function cetakstdknowhow() {
  $this->load->library('fpdf');
  define('FPDF_FONTPATH',$this->config->item('fonts_path'));
  $data['dataku'] = $this->stdknowhow_model->cetakstdknowhow();
  $this->load->view('stdkompetensi\cetakstdknowhow',$data);
}

function cetakstdknowhowpdf() {
  $this->load->library('fpdf');
  define('FPDF_FONTPATH',$this->config->item('fonts_path'));
  $data['dataku'] = $this->stdknowhow_model->cetakstdknowhow();
  $this->load->view('stdkompetensi\cetakstdknowhowpdf',$data);
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

  function simpanstdknowhow($kojab,$jabatan,$fe,$ie,$ex,$bs,$tsmkt,$tsest,$tsppc,$tscon,$tsqac,$tsman,$tssar,$tscs,$tspeng,$tsfat,$tshse,$tshrd,$tsga,$tsmd,$tsmr,$tsengmech,$tsengelec,$tsenginst,$tsengciv,$tssd,$tsia,$tstop){
      $objResponse = new xajaxResponse();
      $data = $this->stdknowhow_model->simpanstdknowhow($kojab,$jabatan,$fe,$ie,$ex,$bs,$tsmkt,$tsest,$tsppc,$tscon,$tsqac,$tsman,$tssar,$tscs,$tspeng,$tsfat,$tshse,$tshrd,$tsga,$tsmd,$tsmr,$tsengmech,$tsengelec,$tsenginst,$tsengciv,$tssd,$tsia,$tstop);
      if ($data>0) {
          $objResponse->Assign("alert","innerHTML", succ_msg("Berhasil Disimpan"));
      } else {
          $objResponse->Assign("alert","innerHTML", err_msg("Gagal Disimpan !"));
      }
      return $objResponse;
  }

}
?>