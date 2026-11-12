<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kpi extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_kpi');
    }

    function index() {
        $data['title'] = 'KPI (Key Performance Indicator)';
        $this->xajax->register(XAJAX_FUNCTION, array('simpankpi',&$this,'simpankpi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editkpi',&$this,'editkpi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('updatekpi',&$this,'updatekpi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapuskpi',&$this,'hapuskpi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('deletekpi',&$this,'deletekpi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('carikpi',&$this,'carikpi'));                
        $this->xajax->register(XAJAX_FUNCTION, array('cariotokodekpi',&$this,'cariotokodekpi'));                
        $this->xajax->processRequest();
        $data['kpi'] = $this->m_kpi->getdatakpi(''); 
        $data['satuan'] = $this->m_kpi->getsatuan();       
        $data['rollup'] = $this->m_kpi->getrollup();
        $data['polarisasi'] = $this->m_kpi->getpolarisasi();
        $data['periode'] = $this->m_kpi->getperiode();        
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/v_kpi', $data);
    }

    function simpankpi($kelompok,$kodekpi,$namakpi,$deskripsi,$target,$satuan,$rollup,$polarisasi,$periode,$formula){
        $objResponse = new xajaxResponse();
        if ($namakpi=='') {
            $objResponse->script("alert('Nama KPI Belum Di Isi !')");
        } else {
            $data = $this->m_kpi->simpankpi($kelompok,$kodekpi,$namakpi,$deskripsi,$target,$satuan,$rollup,$polarisasi,$periode,$formula);
            if ($data>0) {
                $objResponse->Assign("alert","innerHTML", succ_msg("kpi ".$namakpi." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("nama","value","");
                $html = '';
                $data = $this->m_kpi->getdatakpi(''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->kodekpi."</td>
                                    <td>".$row->kpi."</td>
                                    <td>".$row->deskripsi."</td>
                                    <td>".$row->satuan."</td>
                                    <td>".$row->rollup."</td>
                                    <td>".$row->polarisasi."</td>
                                    <td>".$row->periode."</td>
                                    <td>".$row->formula."</td>
                                    <td>".$row->tglupdate."</td> 
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editkpi(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuskpi(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("kpi","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function carikpi($kpi){
        $objResponse = new xajaxResponse();
        $data = $this->m_kpi->carikpi($kpi); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodekpi."</td>
                                <td>".$row->kpi."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->polarisasi."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->formula."</td>
                                <td>".$row->tglupdate."</td> 
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editkpi(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuskpi(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("kpi","innerHTML",$html);
        return $objResponse;
    }
   
    function getdatakpi($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->m_kpi->getdatakpi($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."kpi/editkpi/".$row->noindex."'>Edit</a>";
                $delete = "<a href='".base_url()."kpi/hapuskpi/".$row->noindex."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->kodekpi."</td>
                                <td>".$row->kpi."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->polarisasi."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->formula."</td>
                                <td>".$row->tglupdate."</td>
                                <td>".$edit."</td>
                                <td>".$delete."</td>
                               </tr>";
            }
            $objResponse->Assign("kpi","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editkpi($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_kpi->getkpibykkpi($noindex);
        foreach ($data as $row) {
            if($row->kelompok==1){$kodekelom='F';}
            if($row->kelompok==2){$kodekelom='C';}
            if($row->kelompok==3){$kodekelom='I';}
            if($row->kelompok==4){$kodekelom='L';}
            $objResponse->Assign("noindex1","value",$noindex);            
            $objResponse->Assign("kelompok1","value",$kodekelom);
            $objResponse->Assign("kodekpi1","value",$row->kodekpi);
            $objResponse->Assign("namakpi1","value",$row->kpi);
            $objResponse->Assign("deskripsi1","value",$row->deskripsi);
            $objResponse->Assign("target1","value",$row->target);            
            $objResponse->Assign("satuan1","value",$row->satuan);
            $objResponse->Assign("rollup1","value",$row->rollup);
            $objResponse->Assign("polarisasi1","value",$row->kodepolarisasi);
            $objResponse->Assign("periode1","value",$row->periode);
            $objResponse->Assign("formula1","value",$row->formula);                        
        }
        return $objResponse;
    }

    function hapuskpi($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_kpi->getkpibykkpi($noindex);
        foreach ($data as $row) {
            if($row->kelompok==1){$kodekelom='F';}
            if($row->kelompok==2){$kodekelom='C';}
            if($row->kelompok==3){$kodekelom='I';}
            if($row->kelompok==4){$kodekelom='L';}            
            $objResponse->Assign("noindex2","value",$noindex);            
            $objResponse->Assign("kelompok2","value",$kodekelom);
            $objResponse->Assign("kodekpi2","value",$row->kodekpi);
            $objResponse->Assign("namakpi2","value",$row->kpi);
            $objResponse->Assign("deskripsi2","value",$row->deskripsi);
            $objResponse->Assign("target2","value",$row->target);            
            $objResponse->Assign("satuan2","value",$row->satuan);
            $objResponse->Assign("rollup2","value",$row->rollup);
            $objResponse->Assign("polarisasi2","value",$row->kodepolarisasi);
            $objResponse->Assign("periode2","value",$row->periode);
            $objResponse->Assign("formula2","value",$row->formula);                        
        }
        return $objResponse;
    }

    function updatekpi($noindex1,$kelompok1,$kodekpi1,$namakpi1,$deskripsi1,$target1,$satuan1,$rollup1,$polarisasi1,$periode1,$formula1){
        $objResponse = new xajaxResponse();
        $data = $this->m_kpi->updatekpi($noindex1,$kelompok1,$kodekpi1,$namakpi1,$deskripsi1,$target1,$satuan1,$rollup1,$polarisasi1,$periode1,$formula1);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("kelompok1","value","");
            $objResponse->Assign("kodekpi1","value","");
            $objResponse->Assign("namakpi1","value","");
            $objResponse->Assign("deskripsi1","value","");
            $objResponse->Assign("target1","value","");            
            $objResponse->Assign("satuan1","value","");
            $objResponse->Assign("rollup1","value","");
            $objResponse->Assign("polarisasi1","value","");
            $objResponse->Assign("periode1","value","");
            $objResponse->Assign("formula1","value","");                        
            $html='';
            $data = $this->m_kpi->getdatakpi('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodekpi."</td>
                                <td>".$row->kpi."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->polarisasi."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->formula."</td>
                                <td>".$row->tglupdate."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editkpi(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuskpi(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("kpi","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data kpi ".$noindex." - ".$namakpi1." Gagal Di Update')");
        }
        return $objResponse;
    }

    function deletekpi($noindex2,$kelompok2,$kodekpi2,$namakpi2,$deskripsi2,$target2,$satuan2,$rollup2,$polarisasi2,$periode2,$formula2){
        $objResponse = new xajaxResponse();
        $data = $this->m_kpi->deletekpi($noindex2,$kelompok2,$kodekpi2,$namakpi2,$deskripsi2,$target2,$satuan2,$rollup2,$polarisasi2,$periode2,$formula2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");
            $objResponse->Assign("kelompok2","value","");
            $objResponse->Assign("kodekpi2","value","");
            $objResponse->Assign("namakpi2","value","");
            $objResponse->Assign("deskripsi2","value","");
            $objResponse->Assign("target2","value","");            
            $objResponse->Assign("satuan2","value","");
            $objResponse->Assign("rollup2","value","");
            $objResponse->Assign("polarisasi2","value","");
            $objResponse->Assign("periode2","value","");
            $objResponse->Assign("formula2","value","");                        
            $html='';
            $data = $this->m_kpi->getdatakpi('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodekpi."</td>
                                <td>".$row->kpi."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->polarisasi."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->formula."</td>
                                <td>".$row->tglupdate."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editkpi(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapuskpi(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("kpi","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data kpi ".$kodekpi2." - ".$namakpi2." Gagal Di Hapus')");
        }
        return $objResponse;
    }  

    function cariotokodekpi($kelompok){
        $objResponse = new xajaxResponse();
        $data = $this->m_kpi->cariotokodekpi($kelompok);
        foreach ($data as $row) {
            $objResponse->Assign("kodekpi","value",$row->kode);
        }
        return $objResponse;
    }

    function cetakkpi() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_kpi->cetakkpi();
         $this->load->view('master\cetakkpi', $data);
    }

}
?>