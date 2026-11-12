<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_setting');
    }

    function index() {
        $data['title'] = 'Setting';
        $this->xajax->register(XAJAX_FUNCTION, array('simpansetting',&$this,'simpansetting'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editsetting',&$this,'editsetting'));   
        $this->xajax->register(XAJAX_FUNCTION, array('updatesetting',&$this,'updatesetting'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapussetting',&$this,'hapussetting'));   
        $this->xajax->register(XAJAX_FUNCTION, array('deletesetting',&$this,'deletesetting'));   
        $this->xajax->register(XAJAX_FUNCTION, array('carisetting',&$this,'carisetting'));                
        $this->xajax->processRequest();
        $data['setting'] = $this->m_setting->getdatasetting(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/v_setting', $data);
    }

    function simpansetting($namasetting,$deskripsisetting){
        $objResponse = new xajaxResponse();
        if ($namasetting=='') {
            $objResponse->script("alert('Nama Setting Belum Di Isi !')");
        } else {
            $data = $this->m_setting->simpansetting($namasetting,$deskripsisetting);
            if ($data>0) {
                // $objResponse->script("alert('Simpan Berhasil')");
                $objResponse->Assign("alert","innerHTML", succ_msg("setting ".$namasetting." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("nama","value","");
                $html = '';
                $data = $this->m_setting->getdatasetting(''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->noindex."</td>
                                    <td>".$row->setting."</td>
                                    <td>".$row->deskripsi."</td>
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editsetting(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                        <a data-toggle='modal' href='#delete".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("setting","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function carisetting($setting){
        $objResponse = new xajaxResponse();
        $data = $this->m_setting->carisetting($setting); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->setting."</td>
                                <td>".$row->deskripsi."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editsetting(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("setting","innerHTML",$html);
        return $objResponse;
    }
   
    function getdatasetting($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->m_setting->getdatasetting($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."setting/editsetting/".$row->nik."'>Edit</a>";
                // $delete = "<a href='".base_url()."setting/deletesetting/".$row->nik."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->nik."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->username."</td>
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("setting","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editsetting($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_setting->getsettingbyksetting($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("nik","value",$row->nik);
            $objResponse->Assign("nama","value",$row->nama);
            $objResponse->Assign("username","value",$row->username);
        }
        return $objResponse;
    }

    function hapussetting($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_setting->getsettingbyksetting($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("kodesetting2","value",$row->noindex);
            $objResponse->Assign("namasetting2","value",$row->setting);
            $objResponse->Assign("deskripsisetting2","value",$row->deskripsi);
        }
        return $objResponse;
    }

    // function editsetting($noindex){
    //     $objResponse = new xajaxResponse();
    //     $data = $this->m_setting->getsettingbyksetting($noindex);
    //     foreach ($data as $row) {
    //         $objResponse->Assign("kodesetting","value",$row->noindex);
    //         $objResponse->Assign("namasetting1","value",$row->setting);
    //         $objResponse->Assign("deskripsisetting1","value",$row->deskripsi);
    //     }
    //     return $objResponse;
    // }

    function updatesetting($nik,$passwordbaru){
        $objResponse = new xajaxResponse();
        $data = $this->m_setting->updatesetting($nik,$passwordbaru);
        if ($data>0) {
            //$objResponse->script("swal('Success', 'Edit Berhasil', 'success')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("alert","innerHTML", succ_msg("Berhasil update setting"));
            // $objResponse->Assign("kodesetting","value","");
            // $objResponse->Assign("namasetting1","value","");
            // $objResponse->Assign("deskripsisetting1","value","");
            $html='';
            $data = $this->m_setting->getdatasetting('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->nik."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->username."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editsetting(".$row->nik.")'><i class='icon-edit'></i> Edit </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("setting","innerHTML",$html);
        } else {
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("alert","innerHTML", err_msg("Gagal update setting"));
            //$objResponse->script("swal('Failed', 'Data setting gagal Di Update', 'error')");
        }
        return $objResponse;
    }

    function deletesetting($kodesetting2,$namasetting2,$deskripsisetting2){
        $objResponse = new xajaxResponse();
        $data = $this->m_setting->deletesetting($kodesetting2,$namasetting2,$deskripsisetting2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");
            $objResponse->Assign("kodesetting2","value","");
            $objResponse->Assign("namasetting2","value","");
            $objResponse->Assign("deskripsisetting2","value","");
            $html='';
            $data = $this->m_setting->getdatasetting('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->noindex."</td>
                                <td>".$row->setting."</td>
                                <td>".$row->deskripsi."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editsetting(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("setting","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data setting ".$kodesetting2." - ".$namasetting2." Gagal Di Hapus')");
        }
        return $objResponse;
    }  

    function cetaksetting() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_setting->cetaksetting();
         $this->load->view('master\cetaksetting', $data);
    }

}
?>