<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stdmanagerial extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('stdknowhow_model');
        $this->load->model('stdmanagerial_model');
        $this->load->model('jabatan_model');
        // $this->load->model('unit_model');
    }

    function index() {
        $data['title'] = 'Standar Managerial';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanstdmanagerial',&$this,'simpanstdmanagerial'));                
        $this->xajax->register(XAJAX_FUNCTION, array('caristdmanagerial',&$this,'caristdmanagerial'));                
        $this->xajax->register(XAJAX_FUNCTION, array('carireportstdmanagerial',&$this,'carireportstdmanagerial'));                
        $this->xajax->processRequest();
        // $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        // $data['unit'] = $this->unit_model->getdataunit(''); 
        $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('stdkompetensi/stdmanagerial', $data);
    }

    function caristdmanagerial($kojab){
          $style = "odd";
          $html = '';
          $print = '';
          $c=1;
          $data1 = $this->stdmanagerial_model->caristdmanagerial($kojab);
          if($data1<>0)
          {
            foreach($data1 as $row)
            {

              $objResponse = new xajaxResponse();
                $objResponse->Assign("kojab","value", $row->kojab);
                $objResponse->Assign("dev","value", $row->dev);
                $objResponse->Assign("dir","value", $row->dir);
                $objResponse->Assign("tw","value", $row->tw);
                $objResponse->Assign("tl","value", $row->tl);
                $objResponse->Assign("ps","value", $row->ps);
                $objResponse->Assign("po","value", $row->po);
                $objResponse->Assign("so","value", $row->so);
                $objResponse->Assign("at","value", $row->at);
                $objResponse->Assign("ct","value", $row->ct);
                $objResponse->Assign("int","value", $row->int);
                $objResponse->Assign("iu","value", $row->iu);
                $objResponse->Assign("rb","value", $row->rb);
                $objResponse->Assign("imp","value", $row->imp);
                $objResponse->Assign("ing","value", $row->ing);
                $objResponse->Assign("trp","value", $row->trp);
                $objResponse->Assign("tew","value", $row->tew);
                $objResponse->Assign("crt","value", $row->crt);
                $objResponse->Assign("wis","value", $row->wis);
                $objResponse->Assign("exc","value", $row->exc);
                $objResponse->Assign("ach","value", $row->ach);
                $objResponse->Assign("co","value", $row->co);
                $objResponse->Assign("is","value", $row->is);
                $objResponse->Assign("cso","value", $row->cso);
              return $objResponse;                 
            }
          }
    }

    function carireportstdmanagerial($kojab1){
          $style = "odd";
          $html = '';
          $print = '';
          $c=1;
          $data1 = $this->stdmanagerial_model->carireportstdmanagerial($kojab1);
          if($data1<>0)
          {
            foreach($data1 as $row)
            {
              if ($c==0){
                $c=1;
                $html = $html."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket1."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket6."</td></tr>";
              }else{
                $c=0;
                $html = $html."<tr class='".$style."'><td class='left' align='center'>".$row->ket1."</td><td class='left' align='center'>".$row->ket2."</td><td class='left' align='left'>".$row->ket3."</td><td class='left' align='left'>".$row->ket4."</td><td class='left' align='left'>".$row->ket5."</td><td class='left' align='left'>".$row->ket6."</td></tr>";
              }              
            }
          }
          else{
            $html = $html."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          } 
          $objResponse = new xajaxResponse();
          $objResponse->Assign("stdmanagerial","innerHTML", $html);
          return $objResponse; 
    }

function cetakstdmanagerial() {
  $this->load->library('fpdf');
  define('FPDF_FONTPATH',$this->config->item('fonts_path'));
  $data['dataku'] = $this->stdmanagerial_model->cetakstdmanagerial();
  $this->load->view('stdkompetensi\cetakstdmanagerial',$data);
}

function cetakstdmanagerialpdf() {
  $this->load->library('fpdf');
  define('FPDF_FONTPATH',$this->config->item('fonts_path'));
  $data['dataku'] = $this->stdmanagerial_model->cetakstdmanagerial();
  $this->load->view('stdkompetensi\cetakstdmanagerialpdf',$data);
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

    function simpanstdmanagerial($kojab,$jabatan,$dev,$dir,$tw,$tl,$ps,$po,$so,$at,$ct,$int,$iu,$rb,$imp,$ing,$trp,$tew,$crt,$wis,$exc,$ach,$co,$is,$cso){
        $objResponse = new xajaxResponse();
        $data = $this->stdmanagerial_model->simpanstdmanagerial($kojab,$jabatan,$dev,$dir,$tw,$tl,$ps,$po,$so,$at,$ct,$int,$iu,$rb,$imp,$ing,$trp,$tew,$crt,$wis,$exc,$ach,$co,$is,$cso);
        if ($data>0) {
            // $objResponse->script("$('#tambah').modal('hide')");
            // $objResponse->Assign("nik","value","");
            // $objResponse->Assign("nama","value","");
            // $objResponse->Assign("tgllahir","value","");
            // $objResponse->Assign("tglmasuk","value","");
            // $objResponse->Assign("pendidikan","value","");
            // $objResponse->Assign("status","value","");
            // $objResponse->Assign("unit","value","");
            // $objResponse->Assign("jabatan","value","");
            // $objResponse->Assign("role","value","");
            // $objResponse->Assign("username","value","");
            // $objResponse->Assign("password","value","");
            // $objResponse->Assign("alert","innerHTML", succ_msg("Data Pegawai ".$nama." Berhasil Disimpan"));
            $objResponse->Assign("alert","innerHTML", succ_msg("Berhasil Disimpan"));
            // $html = '';
            // $data = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
            // foreach ($data as $row) {
            //     $html = $html."<tr>
            //                     <td>".$row->nik."</td>
            //                     <td>".$row->nama."</td>
            //                     <td>".$row->namaunit."</td>
            //                     <td>".$row->namajabatan."</td>
            //                     <td><a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick='detailpegawai(".$row->nik.")'><i class='icon-eye-open'></i> Detail </a>
            //                         <a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editpegawai(".$row->nik.")'><i class='icon-edit'></i> Edit </a>
            //                     </td>
            //                 </tr>";
            // }
            // $objResponse->Assign("pegawai","innerHTML",$html);
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("Gagal Disimpan !"));
            // $objResponse->Assign("alert","innerHTML", err_msg("Data Pegawai ".$nama." Gagal Disimpan !"));            
            // $objResponse->script("alert('Data Gagal Disimpan')");
        }
        return $objResponse;
    }

    // function datapegawai(){
    //     $this->xajax->register(XAJAX_FUNCTION, array('getdatapegawai',&$this,'getdatapegawai'));                
    //     $this->xajax->processRequest();
    //     $data['xajax_js'] = $this->xajax->getJavascript(); 
    //     $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
    //     $this->load->view('datapegawai',$data);
    // }

    // function getdatapegawai($nik,$nama,$tglmasuk1,$tglmasuk2,$pendidikan,$status,$unit,$jabatan){
    //     $html='';
    //     $objResponse = new xajaxResponse();
    //     $data = $this->pegawai_model->getdatapegawai($nik,$nama,$tglmasuk1,$tglmasuk2,$pendidikan,$status,$unit,$jabatan);
    //     if (count($data)>0) {
    //         foreach ($data as $row) {
    //             $edit = "<a href='".base_url()."pegawai/editpegawai/".$row->nik."'>Edit</a>";
    //             $html = $html."<tr>
    //                             <td>".$row->nik."</td>
    //                             <td>".$row->nama."</td>
    //                             <td>".$row->tgllahir."</td>
    //                             <td>".$row->tglmasuk."</td>
    //                             <td>".$row->pendidikan."</td>
    //                             <td>".$row->status."</td>
    //                             <td>".$row->namaunit."</td>
    //                             <td>".$row->namajabatan."</td>
    //                             <td>".$edit."</td>
    //                            </tr>";
    //         }
    //         $objResponse->Assign("pegawai","innerHTML",$html);
    //     } else {
    //         $objResponse->script("alert('Data Tidak Ada')");
    //     }
    //     return $objResponse;
    // }

    // function editpegawai($nik){
    //     $this->xajax->register(XAJAX_FUNCTION, array('updatepegawai',&$this,'updatepegawai'));                
    //     $this->xajax->processRequest();
    //     $data['xajax_js'] = $this->xajax->getJavascript(); 
    //     $data['pegawai'] = $this->pegawai_model->getpegawaibynik($nik); 
    //     $this->load->view('entrynews',$data);
    // }

    // function updatepegawai($nik,$nama,$tgllahir,$tglmasuk,$pendidikan,$status,$unit,$jabatan){
    //     $objResponse = new xajaxResponse();
    //     $data = $this->pegawai_model->simpanpegawai($nik,$nama,$tgllahir,$tglmasuk,$pendidikan,$status,$unit,$jabatan);
    //     if ($data>0) {
    //         $objResponse->script("alert('Edit Berhasil')");
    //         $objResponse->Assign("nik","value","");
    //         $objResponse->Assign("nama","value","");
    //         $objResponse->Assign("tgllahir","value","");
    //         $objResponse->Assign("tglmasuk","value","");
    //         $objResponse->Assign("pendidikan","value","");
    //         $objResponse->Assign("status","value","");
    //         $objResponse->Assign("unit","value","");
    //         $objResponse->Assign("jabatan","value","");
    //     } else {
    //         $objResponse->script("alert('Data Pegawai ".$nik." - ".$nama." Gagal Di Update')");
    //     }
    //     return $objResponse;
    // }
  

}
?>