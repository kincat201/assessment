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

        $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('stdkompetensi/stdmanagerial', $data);
    }

    function caristdmanagerial($kojab){
        $data = $this->stdmanagerial_model->caristdmanagerial($kojab);
        $objResponse = new xajaxResponse();
            
        if($data) { 
            $objResponse->Assign("alert","innerHTML", succ_msg("Data jabatan ditemukan"));

            $objResponse->Assign("kojab","value", $data->kojab);
            $objResponse->Assign("dev","value", $data->dev);
            $objResponse->Assign("dir","value", $data->dir);
            $objResponse->Assign("tw","value", $data->tw);
            $objResponse->Assign("tl","value", $data->tl);
            $objResponse->Assign("ps","value", $data->ps);
            $objResponse->Assign("po","value", $data->po);
            $objResponse->Assign("so","value", $data->so);
            $objResponse->Assign("at","value", $data->at);
            $objResponse->Assign("ct","value", $data->ct);
            $objResponse->Assign("int","value", $data->int);
            $objResponse->Assign("iu","value", $data->iu);
            $objResponse->Assign("rb","value", $data->rb);
            $objResponse->Assign("imp","value", $data->imp);
            $objResponse->Assign("ing","value", $data->ing);
            $objResponse->Assign("trp","value", $data->trp);
            $objResponse->Assign("tew","value", $data->tew);
            $objResponse->Assign("crt","value", $data->crt);
            $objResponse->Assign("wis","value", $data->wis);
            $objResponse->Assign("exc","value", $data->exc);
            $objResponse->Assign("ach","value", $data->ach);
            $objResponse->Assign("co","value", $data->co);
            $objResponse->Assign("is","value", $data->is);
            $objResponse->Assign("cso","value", $data->cso);

        }else{
            $objResponse->Assign("alert","innerHTML", err_msg("Data jabatan tidak ditemukan"));
            $objResponse->Assign("kojab","value", $kojab);
            $objResponse->Assign("dev","value", 0);
            $objResponse->Assign("dir","value", 0);
            $objResponse->Assign("tw","value", 0);
            $objResponse->Assign("tl","value", 0);
            $objResponse->Assign("ps","value", 0);
            $objResponse->Assign("po","value", 0);
            $objResponse->Assign("so","value", 0);
            $objResponse->Assign("at","value", 0);
            $objResponse->Assign("ct","value", 0);
            $objResponse->Assign("int","value", 0);
            $objResponse->Assign("iu","value", 0);
            $objResponse->Assign("rb","value", 0);
            $objResponse->Assign("imp","value", 0);
            $objResponse->Assign("ing","value", 0); 
            $objResponse->Assign("trp","value", 0);
            $objResponse->Assign("tew","value", 0);
            $objResponse->Assign("crt","value", 0);
            $objResponse->Assign("wis","value", 0);
            $objResponse->Assign("exc","value", 0);
            $objResponse->Assign("ach","value", 0);
            $objResponse->Assign("co","value", 0);
            $objResponse->Assign("is","value", 0);
            $objResponse->Assign("cso","value", 0);
        }

        return $objResponse;    
    }

    function carireportstdmanagerial($kojab){
        $style = "odd";
        $html = '';
        $data = $this->stdmanagerial_model->carireportstdmanagerial($kojab);
        if($data<>0) {
            foreach($data as $row) { 
                $html = $html."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket1."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket6."</td></tr>";           
            }
        } else { 
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
            $objResponse->Assign("alert","innerHTML", succ_msg("Berhasil Disimpan"));
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("Gagal Disimpan !"));
        }

        return $objResponse;
    }
}
?>