<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Updateska extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('profilkompetensi_model');
        $this->load->model('jabatan_model');
        $this->load->model('unit_model');
        $this->load->model('pegawai_model');
        $this->load->model('mpp_model');
        $this->load->model('m_updateska');
    }

    function index() {
        $data['title'] = 'Update SKA';
        $this->xajax->register(XAJAX_FUNCTION, array('simpandetailska',&$this,'simpandetailska'));    
        $this->xajax->register(XAJAX_FUNCTION, array('hapusdetailska',&$this,'hapusdetailska'));    
        $this->xajax->register(XAJAX_FUNCTION, array('simpanupdateska',&$this,'simpanupdateska'));
        $this->xajax->register(XAJAX_FUNCTION, array('getska',&$this,'getska'));    
        $this->xajax->register(XAJAX_FUNCTION, array('batalupdateska',&$this,'batalupdateska'));  
        $this->xajax->register(XAJAX_FUNCTION, array('carireportska',&$this,'carireportska'));         
        // $this->xajax->register(XAJAX_FUNCTION, array('detailmpp',&$this,'detailmpp'));
        // $this->xajax->register(XAJAX_FUNCTION, array('carimppopen',&$this,'carimppopen')); 
        // $this->xajax->register(XAJAX_FUNCTION, array('carimppapp',&$this,'carimppapp')); 
        // $this->xajax->register(XAJAX_FUNCTION, array('accdetmpp',&$this,'accdetmpp'));  
        // $this->xajax->register(XAJAX_FUNCTION, array('closempp',&$this,'closempp'));          
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['unit'] = $this->unit_model->getdataunit(''); 
        $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['grade'] = $this->mpp_model->getdatagrade(); 
        $data['dataska'] = $this->m_updateska->getdataska(); 
        $nourut = $this->mpp_model->getnompp();
        // $data['nompp'] = "MPP-".date('Y')."-".$nourut;
        $this->template->display('ska/v_updateska', $data);
    }

    function getska($nama){
        $objResponse = new xajaxResponse();
        $data = $this->m_updateska->getska($nama);
        $html = '';
        if (count($data)>0) {            
            foreach ($data as $row) {            
                $html = $html."<tr>
                                <td>".$row->namaska."</td>
                                <td>".$row->kodeska."</td>
                                <td>".$row->asosiasi."</td>
                                <td>".$row->nirska."</td>
                                <td>".$row->mulai."</td>
                                <td>".$row->selesai."</td>
                                <td><a class='btn mini red sbold' href='#' onClick=\"hapusdetailska('".$row->kodeska."')\"><i class='icon-trash'></i> Hapus </a></td>
                            </tr>";
            }
            // $objResponse->script("kosongdetail()");
        } 
        $objResponse->Assign("detailska","innerHTML",$html);
        return $objResponse;
    }

    function simpandetailska($kodeska,$asosiasi,$nirska,$mulai,$selesai){
        $objResponse = new xajaxResponse();
        if ($kodeska=='' or $asosiasi=='' or $nirska=='' or $mulai=='' or $selesai=='') {
            if ($kodeska=='') {
                $message = "Klasifikasi SKA Belum Di Pilih !";
            } 
            if ($asosiasi=='') {
                $message = "Asosiasi Belum Di Isi !";
            }
            if ($nirska=='') {
                $message = "NIR SKA Belum Di Isi !";
            }
            if ($mulai=='') {
                $message = "Tanggal Mulai Belum Di Pilih !";
            }
            if ($selesai=='') {
                $message = "Tanggal Selesai Belum Di Pilih !";
            }            
            $objResponse->script("alert('".$message."'')");
        } else {
            $data = $this->m_updateska->simpandetailska($kodeska,$asosiasi,$nirska,$mulai,$selesai);
            $html = '';
            if (count($data)>0) {
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->namaska."</td>
                                    <td>".$row->kodeska."</td>
                                    <td>".$row->asosiasi."</td>
                                    <td>".$row->nirska."</td>
                                    <td>".$row->mulai."</td>
                                    <td>".$row->selesai."</td>
                                    <td><a class='btn mini red sbold' href='#' onClick=\"hapusdetailska('".$row->kodeska."')\"><i class='icon-trash'></i> Hapus </a></td>
                                </tr>";
                }
                $objResponse->Assign("detailska","innerHTML",$html);
                $objResponse->script("kosongdetail()");
            } 
        }
        return $objResponse;
    }

    function hapusdetailska($kodeska){
        $objResponse = new xajaxResponse();
        $data = $this->m_updateska->hapusdetailska($kodeska);
        $html = '';
        if (count($data)>0) {            
            foreach ($data as $row) {            
                $html = $html."<tr>
                                <td>".$row->namaska."</td>
                                <td>".$row->kodeska."</td>
                                <td>".$row->asosiasi."</td>
                                <td>".$row->nirska."</td>
                                <td>".$row->mulai."</td>
                                <td>".$row->selesai."</td>
                                <td><a class='btn mini red sbold' href='#' onClick=\"hapusdetailska('".$row->kodeska."')\"><i class='icon-trash'></i> Hapus </a></td>
                            </tr>";
            }
            $objResponse->script("kosongdetail()");
        } 
        $objResponse->Assign("detailska","innerHTML",$html);
        return $objResponse;
    }

    function simpanupdateska($nama){
        $objResponse = new xajaxResponse();
        $html = '';
        $data = $this->m_updateska->simpanupdateska($nama);
        if ($data>0) {
            $objResponse->Assign("alert","innerHTML", succ_msg("MPP ".$nama." Berhasil Disimpan"));   
            // $nourut = $this->mpp_model->getnompp();
            // $nompplanjut = "MPP-".date('Y')."-".$nourut; 
            // $objResponse->Assign("nompp","value", $nompplanjut);
            // $objResponse->Assign("unit","value", '');
            $objResponse->Assign("detailska","innerHTML", '');
            $objResponse->script("kosong()");
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("SKA ".$nama." Tidak Berhasil Disimpan. Coba Ulangi !"));
        }
        return $objResponse;
    }

    function batalupdateska(){
        $objResponse = new xajaxResponse();
        $data = $this->m_updateska->batalupdateska();
        $objResponse->script("kosong()");
        $objResponse->Assign("detailska","innerHTML", '');
        return $objResponse;
    }

    function carireportska($nama){
        $objResponse = new xajaxResponse();
        $data = $this->m_updateska->carireportska($nama);
        $html = '';
        if (count($data)>0) {            
            foreach ($data as $row) {            
                $html = $html."<tr>
                                <td>".$row->namaska."</td>
                                <td>".$row->kodeska."</td>
                                <td>".$row->asosiasi."</td>
                                <td>".$row->nirska."</td>
                                <td>".$row->mulai."</td>
                                <td>".$row->selesai."</td>
                            </tr>";
            }
        } 
        $objResponse->Assign("reportska","innerHTML",$html);
        return $objResponse;
    }

    function cetakreportska($nama) {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_updateska->carireportska($nama);
         // $data['dataku'] = $this->m_updateska->cetakreportska($nama);         
         $this->load->view('ska\cetakreportska', $data);
    }

    function carireportmpp($unit,$tgl1,$tgl2,$status){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->carireportmpp($unit,$tgl1,$tgl2,$status);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                switch ($row->statusmpp) {
                    case '0':
                        $label = "<span class='label label-warning'><i class='icon-unlock'></i> Open</span>";
                        break;
                    case '1':
                         $label = "<span class='label label-success'><i class='icon-lock'></i> Closed</span>";
                        break;
                }
                $html = $html."<tr>
                                <td>".$row->nompp."</td>
                                <td>".$row->namaunit."</td>
                                <td>".date('d F Y',strtotime($row->tglentry))."</td>
                                <td>
                                    <a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick=\"detailmpp('".$row->nompp."')\"><i class='icon-eye-open'></i> Detail </a>
                                    <a class='btn mini purple sbold' href='".base_url()."mpp/cetakmpp/".$row->nompp."' target='_blank' ><i class='icon-print'></i> Cetak </a>
                                </td>
                                <td>".$label."</td>                              
                            </tr>";
            }
            $objResponse->Assign("reportmpp","innerHTML",$html);
        } else {
            $html = $html."<tr><td colspan='5'>Data Tidak Ada</td></tr>";
            $objResponse->Assign("reportmpp","innerHTML",$html);
        }
        return $objResponse;
    }

    function detailmpp($nompp){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->detailmpp($nompp);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                $statusmpp = $row->statusmpp;
                foreach ($row->detail as $rowdet) {
                    switch ($rowdet->acc) {
                        case '0':
                            if ($statusmpp==0){
                                $label = "<span class='label label-warning'>Waiting Approval</span>";
                            } else {
                                $label = "<span class='label label-important'>Rejected</span>";
                            }
                            break;
                        case '1':
                            $label = "<span class='label label-success'>Approved</span>";
                            break;
                    }
                    $html = $html."<tr>
                                <td>".$rowdet->namajabatan."</td>
                                <td>".$rowdet->tahun."</td>
                                <td>".date('F', mktime(0,0,0,$rowdet->bulan,10))."</td>
                                <td>".$rowdet->stdgrade."</td>
                                <td>".$rowdet->actgrade."</td>
                                <td>".$rowdet->namakandidat."</td>
                                <td>".$rowdet->tindakan."</td>
                                <td>".$rowdet->jadwal."</td>
                                <td>".$rowdet->pic."</td>
                                <td>".$label."</td>
                            </tr>";
                }
                $objResponse->Assign("detailreportmpp","innerHTML",$html);
                $objResponse->Assign("detnompp","innerHTML",$row->nompp);
                $objResponse->Assign("dettanggal","innerHTML",date('d F Y',strtotime($row->tglentry)));
                $objResponse->Assign("detunit","innerHTML",$row->namaunit);
            }
        } else {
            $html = $html."<tr><td colspan='5'>Data Tidak Ada</td></tr>";
            $objResponse->Assign("reportmpp","innerHTML",$html);
        }
        return $objResponse;
    }

    function carimppopen($unit){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->carimppopen($unit);
        $html = "<option value=''>Pilih MPP</option>";
        if(count($data)>0){
            foreach($data as $row)
            {
                $html = $html."<option value='".$row->nompp."'>".$row->nompp."</option>";
            }
            $objResponse->Assign("appnompp","innerHTML", $html);
        } else {
            $objResponse->Assign("appnompp","innerHTML", $html);
            $objResponse->Assign("detailappmpp","innerHTML", $html);
        }
        return $objResponse;
    }

    function carimppapp($nompp){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->detailmpp($nompp);
        $html = null;
        if(count($data)>0){
            foreach ($data as $row) {
                foreach ($row->detail as $rowdet) {
                    if ($rowdet->acc=='0') {
                        $button = "<a class='btn mini green sbold' href='#' onClick=\"accdetmpp('".$rowdet->nompp."','".$rowdet->jabatan."','".$rowdet->kandidat."')\"><i class='icon-ok'></i> Approve </a>";
                    } else {
                        $button = "<span class='label label-info'>Approved</span>";
                    }
                    $html = $html."<tr>
                                <td>".$rowdet->namajabatan."</td>
                                <td>".$rowdet->tahun."</td>
                                <td>".date('F', mktime(0,0,0,$rowdet->bulan,10))."</td>
                                <td>".$rowdet->stdgrade."</td>
                                <td>".$rowdet->actgrade."</td>
                                <td>".$rowdet->namakandidat."</td>
                                <td>".$rowdet->tindakan."</td>
                                <td>".$rowdet->jadwal."</td>
                                <td>".$rowdet->pic."</td>
                                <td>".$button."</td>
                            </tr>";
                }
            }
            $objResponse->Assign("detailappmpp","innerHTML", $html);
            $objResponse->script("$('#closempp').show();");
        } else {
            $objResponse->Assign("detailappmpp","innerHTML", $html);
        }
        return $objResponse;
    }

    function accdetmpp($nompp,$jabatan,$kandidat){
        $objResponse = new xajaxResponse();
        $dataacc = $this->mpp_model->accdetmpp($nompp,$jabatan,$kandidat);
        $data = $this->mpp_model->detailmpp($nompp);
        $html = null;
        if(count($data)>0){
            foreach ($data as $row) {
                foreach ($row->detail as $rowdet) {
                    if ($rowdet->acc=='0') {
                        $button = "<a class='btn mini green sbold' href='#' onClick=\"accdetmpp('".$rowdet->nompp."','".$rowdet->jabatan."','".$rowdet->kandidat."')\"><i class='icon-ok'></i> Approve </a>";
                    } else {
                        $button = "<span class='label label-info'>Approved</span>";
                    }
                    $html = $html."<tr>
                                <td>".$rowdet->namajabatan."</td>
                                <td>".$rowdet->tahun."</td>
                                <td>".date('F', mktime(0,0,0,$rowdet->bulan,10))."</td>
                                <td>".$rowdet->stdgrade."</td>
                                <td>".$rowdet->actgrade."</td>
                                <td>".$rowdet->namakandidat."</td>
                                <td>".$rowdet->tindakan."</td>
                                <td>".$rowdet->jadwal."</td>
                                <td>".$rowdet->pic."</td>
                                <td>".$button."</td>
                            </tr>";
                }
            }
            $objResponse->Assign("detailappmpp","innerHTML", $html);
            $objResponse->script("$('#closempp').show();");
        } else {
            $objResponse->Assign("detailappmpp","innerHTML", $html);
        }
        return $objResponse;
    }

    function closempp($nompp){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->closempp($nompp);
        if ($data>0) {
            $objResponse->Assign("alert","innerHTML", succ_msg("MPP ".$nompp." Sudah di Close")); 
            $objResponse->script("done()");
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("Close MPP Gagal. Coba Lagi !")); 
        }
        return $objResponse;
    }

    function batalmpp(){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->batalmpp();
        $objResponse->Assign("unit","value", '');
        $objResponse->Assign("detailmpp","innerHTML", '');
        return $objResponse;
    }

    function cetakmpp($nompp){
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));    
        $value = $this->mpp_model->detailmpp($nompp);
        $data['mpp'] = $value;
        $this->load->view('mpp\cetakmpp',$data);
    }

    function mppproyek() {
        $data['title'] = 'MPP Team Proyek';
        $this->xajax->register(XAJAX_FUNCTION, array('tambahdetailmppproyek',&$this,'tambahdetailmppproyek'));    
        $this->xajax->register(XAJAX_FUNCTION, array('hapusdetailmppproyek',&$this,'hapusdetailmppproyek'));    
        $this->xajax->register(XAJAX_FUNCTION, array('simpanmppproyek',&$this,'simpanmppproyek'));
        $this->xajax->register(XAJAX_FUNCTION, array('carireportmppproyek',&$this,'carireportmppproyek'));    
        $this->xajax->register(XAJAX_FUNCTION, array('detailmppproyek',&$this,'detailmppproyek'));
        $this->xajax->register(XAJAX_FUNCTION, array('carimppproyekopen',&$this,'carimppproyekopen')); 
        $this->xajax->register(XAJAX_FUNCTION, array('carimppproyekapp',&$this,'carimppproyekapp')); 
        $this->xajax->register(XAJAX_FUNCTION, array('accdetmppproyek',&$this,'accdetmppproyek'));  
        $this->xajax->register(XAJAX_FUNCTION, array('closemppproyek',&$this,'closemppproyek'));
        $this->xajax->register(XAJAX_FUNCTION, array('batalmppproyek',&$this,'batalmppproyek'));    
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['unit'] = $this->unit_model->getdataunit(''); 
        $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['grade'] = $this->mpp_model->getdatagrade(); 
        $data['divisi'] = $this->unit_model->getdivisi(); 
        $nourut = $this->mpp_model->getnoproyek();
        $data['nompp'] = "PROYEK-".date('Y')."-".$nourut;
        $this->template->display('mpp/v_mppproyek', $data);
    }

    function tambahdetailmppproyek($nompp,$jabatan,$mulai,$selesai,$kebutuhan,$kandidat,$kualifikasi,$pic,$catatan){
        $objResponse = new xajaxResponse();
        if ($jabatan=='' or $mulai=='' or $selesai=='' or ($kebutuhan=='Rotasi' and $kandidat=='')) {
            if ($jabatan=='') {
                $message = "Jabatan Belum Di Pilih !";
            } 
            if ($mulai=='') {
                $message = "Tanggal Mulai Belum Di Pilih !";
            }
            if ($selesai=='') {
                $message = "Tanggal Selesai Belum Di Pilih !";
            }
            if ($kebutuhan=='Rotasi' and $kandidat=='') {
                $message = "Kandidat Belum Di Pilih !";
            }
            $objResponse->script("alert('".$message."')");
        } else {
            // $no = $this->pegawai_model->getnokeluarga($nik);
            $data = $this->mpp_model->tambahdetailmppproyek($nompp,$jabatan,$mulai,$selesai,$kebutuhan,$kandidat,$kualifikasi,$pic,$catatan);
            $html = '';
            if (count($data)>0) {
                // $no=0;
                foreach ($data as $row) {
                    // $no = $no+1;
                    $html = $html."<tr>
                                    <td>".$row->namajabatan."</td>
                                    <td>".$row->mulai."</td>
                                    <td>".$row->selesai."</td>
                                    <td>".$row->kebutuhan."</td>
                                    <td>".@$row->namakandidat."</td>
                                    <td>".$row->kualifikasi."</td>
                                    <td>".$row->pic."</td>
                                    <td>".$row->catatan."</td>
                                    <td><a class='btn mini red sbold' href='#' onClick=\"hapusdetailmppproyek('".$row->nompp."','".$row->noindex."')\"><i class='icon-trash'></i> Hapus </a></td>
                                </tr>";
                }
                $objResponse->Assign("detailmpp","innerHTML",$html);
                $objResponse->script("kosongdetail()");
            } 
        }
        return $objResponse;
    }

    function hapusdetailmppproyek($nompp,$noindex){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->hapusdetailmppproyek($nompp,$noindex);
        $html = '';
        if (count($data)>0) {
            // $no=0;
            foreach ($data as $row) {
                // $no = $no+1;
                $html = $html."<tr>
                                    <td>".$row->namajabatan."</td>
                                    <td>".$row->mulai."</td>
                                    <td>".$row->selesai."</td>
                                    <td>".$row->kebutuhan."</td>
                                    <td>".@$row->namakandidat."</td>
                                    <td>".$row->kualifikasi."</td>
                                    <td>".$row->pic."</td>
                                    <td>".$row->catatan."</td>
                                    <td><a class='btn mini red sbold' href='#' onClick=\"hapusdetailmppproyek('".$row->nompp."','".$row->noindex."')\"><i class='icon-trash'></i> Hapus </a></td>
                                </tr>";
            }
            $objResponse->script("kosongdetail()");
        } 
        $objResponse->Assign("detailmpp","innerHTML",$html);
        return $objResponse;
    }

    function simpanmppproyek($nompp,$tglentry,$divisi,$tahun,$proyek){
        $objResponse = new xajaxResponse();
        $html = '';
        $data = $this->mpp_model->simpanmppproyek($nompp,$tglentry,$divisi,$tahun,$proyek);
        if ($data>0) {
            $objResponse->Assign("alert","innerHTML", succ_msg("MPP ".$nompp." Berhasil Disimpan"));   
            $nourut = $this->mpp_model->getnoproyek();
            $nompplanjut = "PROYEK-".date('Y')."-".$nourut; 
            $objResponse->Assign("nompp","value", $nompplanjut);
            $objResponse->Assign("divisi","value", '');
            $objResponse->Assign("proyek","value", '');
            $objResponse->Assign("detailmpp","innerHTML", '');
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("MPP ".$nompp." Tidak Berhasil Disimpan. Coba Ulangi !"));
        }
        return $objResponse;
    }

    function carimppproyekopen($divisi){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->carimppproyekopen($divisi);
        $html = "<option value=''>Pilih MPP</option>";
        if(count($data)>0){
            foreach($data as $row)
            {
                $html = $html."<option value='".$row->nompp."'>".$row->nompp."</option>";
            }
            $objResponse->Assign("appnompp","innerHTML", $html);
        } else {
            $objResponse->Assign("appnompp","innerHTML", $html);
            $objResponse->Assign("detailappmpp","innerHTML", '');
        }
        return $objResponse;
    }

    function carimppproyekapp($nompp){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->detailmppproyek($nompp);
        $html = null;
        if(count($data)>0){
            foreach ($data as $row) {
                $proyek = $row->proyek;
                $tahun = $row->tahun;
                foreach ($row->detail as $rowdet) {
                    if ($rowdet->acc=='0') {
                        $button = "<a class='btn mini green sbold' href='#' onClick=\"accdetmppproyek('".$rowdet->nompp."','".$rowdet->noindex."')\"><i class='icon-ok'></i> Approve </a>";
                    } else {
                        $button = "<span class='label label-info'>Approved</span>";
                    }
                    $html = $html."<tr>
                                <td>".$rowdet->namajabatan."</td>
                                <td>".$rowdet->mulai."</td>
                                <td>".$rowdet->selesai."</td>
                                <td>".$rowdet->kebutuhan."</td>
                                <td>".@$rowdet->namakandidat."</td>
                                <td>".$rowdet->kualifikasi."</td>
                                <td>".$rowdet->pic."</td>
                                <td>".$rowdet->catatan."</td>
                                <td>".$button."</td>
                            </tr>";
                }
            }
            $objResponse->Assign("detailappmpp","innerHTML", $html);
            $objResponse->Assign("appproyek","value", $proyek);
            $objResponse->Assign("apptahun","value", $tahun);
            $objResponse->script("$('#closempp').show();");
        } else {
            $objResponse->Assign("detailappmpp","innerHTML", $html);
        }
        return $objResponse;
    }

    function carireportmppproyek($divisi,$tahun,$status){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->carireportmppproyek($divisi,$tahun,$status);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                switch ($row->statusmpp) {
                    case '0':
                        $label = "<span class='label label-warning'><i class='icon-unlock'></i> Open</span>";
                        break;
                    case '1':
                         $label = "<span class='label label-success'><i class='icon-lock'></i> Closed</span>";
                        break;
                }
                $html = $html."<tr>
                                <td>".$row->nompp."</td>
                                <td>".$row->namadivisi."</td>
                                <td>".$row->proyek."</td>
                                <td>".$row->tahun."</td>
                                <td>".date('d F Y',strtotime($row->tglentry))."</td>
                                <td>
                                    <a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick=\"detailmppproyek('".$row->nompp."')\"><i class='icon-eye-open'></i> Detail </a>
                                    <a class='btn mini purple sbold' href='".base_url()."mpp/cetakmppproyek/".$row->nompp."' target='_blank' ><i class='icon-print'></i> Cetak </a>
                                </td>
                                <td>".$label."</td>                              
                            </tr>";
            }
            $objResponse->Assign("reportmpp","innerHTML",$html);
        } else {
            $html = $html."<tr><td colspan='5'>Data Tidak Ada</td></tr>";
            $objResponse->Assign("reportmpp","innerHTML",$html);
        }
        return $objResponse;
    }

    function detailmppproyek($nompp){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->detailmppproyek($nompp);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                $statusmpp = $row->statusmpp;
                foreach ($row->detail as $rowdet) {
                    switch ($rowdet->acc) {
                        case '0':
                            if ($statusmpp==0){
                                $label = "<span class='label label-warning'>Waiting Approval</span>";
                            } else {
                                $label = "<span class='label label-important'>Rejected</span>";
                            }
                            break;
                        case '1':
                            $label = "<span class='label label-success'>Approved</span>";
                            break;
                    }
                    $html = $html."<tr>
                                <td>".$rowdet->namajabatan."</td>
                                <td>".$rowdet->mulai."</td>
                                <td>".$rowdet->selesai."</td>
                                <td>".$rowdet->kebutuhan."</td>
                                <td>".@$rowdet->namakandidat."</td>
                                <td>".$rowdet->kualifikasi."</td>
                                <td>".$rowdet->pic."</td>
                                <td>".$rowdet->catatan."</td>
                                <td>".$label."</td>
                            </tr>";
                }
                $objResponse->Assign("detailreportmpp","innerHTML",$html);
                $objResponse->Assign("detnompp","innerHTML",$row->nompp);
                $objResponse->Assign("dettanggal","innerHTML",date('d F Y',strtotime($row->tglentry)));
                $objResponse->Assign("detdivisi","innerHTML",$row->namadivisi);
                $objResponse->Assign("dettahun","innerHTML",$row->tahun);
                $objResponse->Assign("detproyek","innerHTML",$row->proyek);
            }
        } else {
            $html = $html."<tr><td colspan='5'>Data Tidak Ada</td></tr>";
            $objResponse->Assign("reportmpp","innerHTML",$html);
        }
        return $objResponse;
    }

    function accdetmppproyek($nompp,$noindex){
        $objResponse = new xajaxResponse();
        $dataacc = $this->mpp_model->accdetmppproyek($nompp,$noindex);
        $data = $this->mpp_model->detailmppproyek($nompp);
        $html = null;
        if(count($data)>0){
            foreach ($data as $row) {
                $proyek = $row->proyek;
                $tahun = $row->tahun;
                foreach ($row->detail as $rowdet) {
                    if ($rowdet->acc=='0') {
                        $button = "<a class='btn mini green sbold' href='#' onClick=\"accdetmppproyek('".$rowdet->nompp."','".$rowdet->noindex."')\"><i class='icon-ok'></i> Approve </a>";
                    } else {
                        $button = "<span class='label label-info'>Approved</span>";
                    }
                    $html = $html."<tr>
                                <td>".$rowdet->namajabatan."</td>
                                <td>".$rowdet->mulai."</td>
                                <td>".$rowdet->selesai."</td>
                                <td>".$rowdet->kebutuhan."</td>
                                <td>".@$rowdet->namakandidat."</td>
                                <td>".$rowdet->kualifikasi."</td>
                                <td>".$rowdet->pic."</td>
                                <td>".$rowdet->catatan."</td>
                                <td>".$button."</td>
                            </tr>";
                }
            }
            $objResponse->Assign("detailappmpp","innerHTML", $html);
            $objResponse->Assign("appproyek","value", $proyek);
            $objResponse->Assign("apptahun","value", $tahun);
            $objResponse->script("$('#closempp').show();");
        } else {
            $objResponse->Assign("detailappmpp","innerHTML", $html);
        }
        return $objResponse;
    }

    function closemppproyek($nompp){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->closemppproyek($nompp);
        if ($data>0) {
            $objResponse->Assign("alert","innerHTML", succ_msg("MPP ".$nompp." Sudah di Close")); 
            $objResponse->script("done()");
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("Close MPP Gagal. Coba Lagi !")); 
        }
        return $objResponse;
    }

    function batalmppproyek(){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->batalmppproyek();
        $objResponse->Assign("divisi","value", '');
        $objResponse->Assign("proyek","value", '');
        $objResponse->Assign("detailmpp","innerHTML", '');
        return $objResponse;
    }

    function cetakmppproyek($nompp){
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));    
        $value = $this->mpp_model->detailmppproyek($nompp);
        $data['mpp'] = $value;
        $this->load->view('mpp\cetakmppproyek',$data);
    }

    function rotasi(){
        $data['title'] = 'Mutasi Pegawai';
        $this->xajax->register(XAJAX_FUNCTION, array('getpegawaiawal',&$this,'getpegawaiawal'));    
        $this->xajax->register(XAJAX_FUNCTION, array('simpanrotasi',&$this,'simpanrotasi'));    
        $this->xajax->register(XAJAX_FUNCTION, array('updaterotasi',&$this,'updaterotasi'));
        $this->xajax->register(XAJAX_FUNCTION, array('editrotasi',&$this,'editrotasi'));    
        $this->xajax->register(XAJAX_FUNCTION, array('detailrotasi',&$this,'detailrotasi')); 
        $this->xajax->register(XAJAX_FUNCTION, array('cariotorotasi',&$this,'cariotorotasi'));
        $this->xajax->register(XAJAX_FUNCTION, array('carireportrotasi',&$this,'carireportrotasi')); 
        $this->xajax->register(XAJAX_FUNCTION, array('accrotasi',&$this,'accrotasi'));    
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['dataunit'] = $this->unit_model->getdataunit(''); 
        $data['datajabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['datagrade'] = $this->mpp_model->getdatagrade(); 
        $this->template->display('mpp/v_rotasi', $data);
    }

    function getpegawaiawal($nik){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->getpegawaiawal($nik); 
        foreach ($data as $row) {
            $status = $row->status;
            $unit = $row->unit;
            $grade = $row->grade;
            $struktural = $row->jenisjabatan;
            $jabatan = $row->jabatan;
        }
        $objResponse->Assign("status","value",$status);
        $objResponse->Assign("unit","value",$unit);
        $objResponse->Assign("grade","value",$grade);
        $objResponse->Assign("struktural","value",$struktural);
        $objResponse->Assign("jabatan","value",$jabatan);
        return $objResponse;
    }

    function simpanrotasi($jenis,$tanggal,$nama,$status,$unit,$grade,$struktural,$jabatan,$statusbaru,$unitbaru,$gradebaru,$strukturbaru,$jabatanbaru){
        $objResponse = new xajaxResponse();
        if ($jenis==null) {
            $objResponse->script("alert('Rotasi / Promosi Belum Dipilih')");
        } else if ($tanggal==''){
            $objResponse->script("alert('Tanggal Belum Di Isi')");
        } else if ($nama==''){
            $objResponse->script("alert('Pegawai Belum Di Pilih')");
        } else if ($statusbaru==''){
            $objResponse->script("alert('Status Kepegawaian Baru Belum Di Pilih')");
        } else if ($unitbaru==''){
            $objResponse->script("alert('Unit / Satmingkal Baru Belum Di Pilih')");
        } else if ($gradebaru==''){
            $objResponse->script("alert('Grade Baru Belum Di Pilih')");    
        } else if ($strukturbaru==''){
            $objResponse->script("alert('Grade Baru Belum Di Pilih')");
        } else if ($jabatanbaru==''){
            $objResponse->script("alert('Jabatan Baru Belum Di Pilih')");
        } else {
            $cek = $this->mpp_model->cekrotasi($tanggal,$nama);
            if ($cek>0) {
                $objResponse->script("alert('Data Rotasi / Promosi Pegawai tersebut Tanggal ".$tanggal." Sudah Ada')");
            } else {
                $data = $this->mpp_model->simpanrotasi($jenis,$tanggal,$nama,$status,$unit,$grade,$struktural,$jabatan,$statusbaru,$unitbaru,$gradebaru,$strukturbaru,$jabatanbaru);
                if ($data>0) {
                    $objResponse->script("alert('Data Berhasil Di Simpan')");
                    $objResponse->script("kosong()");
                } else {
                    $objResponse->script("alert('Data Gagal Di Simpan')");
                }
            }
        }
        return $objResponse;
    }

    function updaterotasi($jenis,$tanggal,$nama,$status,$unit,$grade,$struktural,$jabatan,$statusbaru,$unitbaru,$gradebaru,$strukturbaru,$jabatanbaru){
        $objResponse = new xajaxResponse();
        if ($jenis==null) {
            $objResponse->script("alert('Rotasi / Promosi Belum Dipilih')");
        } else if ($tanggal==''){
            $objResponse->script("alert('Tanggal Belum Di Isi')");
        } else if ($nama==''){
            $objResponse->script("alert('Pegawai Belum Di Pilih')");
        } else if ($statusbaru==''){
            $objResponse->script("alert('Status Kepegawaian Baru Belum Di Pilih')");
        } else if ($unitbaru==''){
            $objResponse->script("alert('Unit / Satmingkal Baru Belum Di Pilih')");
        } else if ($gradebaru==''){
            $objResponse->script("alert('Grade Baru Belum Di Pilih')");    
        } else if ($strukturbaru==''){
            $objResponse->script("alert('Grade Baru Belum Di Pilih')");
        } else if ($jabatanbaru==''){
            $objResponse->script("alert('Jabatan Baru Belum Di Pilih')");
        } else {
            // $cek = $this->mpp_model->cekrotasi($tanggal,$nama);
            // if ($cek>0) {
            //     $objResponse->script("alert(Data Rotasi / Promosi Pegawai tersebut Tanggal ".$tanggal." Sudah Ada)");
            // } else {
            $data = $this->mpp_model->updaterotasi($jenis,$tanggal,$nama,$status,$unit,$grade,$struktural,$jabatan,$statusbaru,$unitbaru,$gradebaru,$strukturalbaru,$jabatanbaru);
            if ($data>0) {
                $objResponse->script("alert('Data Berhasil Di Update')");
            } else {
                $objResponse->script("alert('Data Gagal Di Update')");
            }
            // }
        }
        return $objResponse;
    }

    function cariotorotasi($nik,$jenis,$tgl1,$tgl2){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->cariotorotasi($nik,$jenis,$tgl1,$tgl2);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->jenis."</td>
                                <td>".$row->nama."</td>
                                <td>".date('d F Y',strtotime($row->tanggal))."</td>
                                <td>".$row->unitbaru."</td>
                                <td>".$row->jabatanbaru."</td>
                                <td align='center'>
                                    <a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick=\"detailrotasi('".$row->nik."','".$row->tanggal."')\"><i class='icon-eye-open'></i> Detail </a>
                                </td>
                                <td>
                                    <a class='btn mini green sbold' href='#' onClick=\"accrotasi('acc','".$row->nik."','".$row->tanggal."')\"><i class='icon-ok'></i> Approve </a>
                                    <a class='btn mini red sbold' href='#' onClick=\"accrotasi('notacc','".$row->nik."','".$row->tanggal."')\"><i class='icon-remove'></i> Reject </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan=7>Data Rotasi / Promosi Tidak Ada</td></tr>";
        }
        $objResponse->Assign("dataotorotasi","innerHTML",$html);
        return $objResponse;
    }

    function accrotasi($status,$nik,$tanggal){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->accrotasi($status,$nik,$tanggal);
        if ($data>0) {
            switch ($status) {
                case 'acc':
                    $objResponse->script("alert('ACC Data Rotasi / Promosi Berhasil')");
                    break;
                case 'notacc':
                    $objResponse->script("alert('REJECT Data Rotasi / Promosi Berhasil')");
                    break;
            }
            $data = $this->mpp_model->cariotorotasi('','','','');
            $html = '';
            if (count($data)>0) {
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->jenis."</td>
                                    <td>".$row->nama."</td>
                                    <td>".date('d F Y',strtotime($row->tanggal))."</td>
                                    <td>".$row->unitbaru."</td>
                                    <td>".$row->jabatanbaru."</td>
                                    <td align='center'>
                                        <a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick=\"detailrotasi('".$row->nik."','".$row->tanggal."')\"><i class='icon-eye-open'></i> Detail </a>
                                    </td>
                                    <td>
                                        <a class='btn mini green sbold' href='#' onClick=\"accrotasi('acc','".$row->nik."','".$row->tanggal."')\"><i class='icon-ok'></i> Approve </a>
                                        <a class='btn mini red sbold' href='#' onClick=\"accrotasi('notacc','".$row->nik."','".$row->tanggal."')\"><i class='icon-remove'></i> Reject </a>
                                    </td>
                                </tr>";
                }
            } else {
                $html = $html."<tr><td colspan=7>Data Rotasi / Promosi Tidak Ada</td></tr>";
            }
            $objResponse->Assign("dataotorotasi","innerHTML",$html);
        }
        return $objResponse;
    }

    function carireportrotasi($nik,$jenis,$tgl1,$tgl2){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->carireportrotasi($nik,$jenis,$tgl1,$tgl2);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                switch ($row->acc) {
                    case '0':
                        $label = "<span class='label label-important'>Rejected</span>";
                        break;
                    case '1':
                         $label = "<span class='label label-warning'>Waiting for Approval</span>";
                        break;
                    case '2':
                         $label = "<span class='label label-success'>Approved</span>";
                        break;
                }
                $html = $html."<tr>
                                <td>".$row->jenis."</td>
                                <td>".$row->nama."</td>
                                <td>".date('d F Y',strtotime($row->tanggal))."</td>
                                <td>".$row->unitbaru."</td>
                                <td>".$row->jabatanbaru."</td>
                                <td>
                                    <a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick=\"detailrotasi('".$row->nik."','".$row->tanggal."')\"><i class='icon-eye-open'></i> Detail </a>
                                </td>
                                <td>".$label."</td>
                            </tr>";
                            // <a class='btn mini purple sbold' target='_blank' href='".base_url()."mpp/cetakrotasi/".$row->nik."/".$row->tanggal."' ><i class='icon-print'></i> Cetak </a>
            }
        } else {
            $html = $html."<tr><td colspan=7>Data Rotasi / Promosi Tidak Ada</td></tr>";
        }
        $objResponse->Assign("datacarirotasi","innerHTML",$html);
        return $objResponse;
    }
  
    function detailrotasi($nik,$tanggal){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->getdetailrotasi($nik,$tanggal);
        foreach ($data as $row) {
            switch ($row->acc) {
                case '0':
                    $label = "<span class='label label-important'>Rejected</span>";
                    break;
                case '1':
                     $label = "<span class='label label-warning'>Waiting for Approval</span>";
                    break;
                case '2':
                     $label = "<span class='label label-success'>Approved</span>";
                    break;
            }
            $objResponse->Assign("detjenis","innerHTML",$row->jenis.' '.$label);
            $objResponse->Assign("dettanggal","innerHTML",date('d F Y',strtotime($row->tanggal)));
            $objResponse->Assign("detnama","innerHTML",$row->nik.' - '.$row->nama);
            $objResponse->Assign("detstatuslama","innerHTML",$row->statuslama);
            $objResponse->Assign("detstatusbaru","innerHTML",$row->statusbaru);
            $objResponse->Assign("detunitlama","innerHTML",$row->unitlama);
            $objResponse->Assign("detunitbaru","innerHTML",$row->unitbaru);
            $objResponse->Assign("detgradelama","innerHTML",$row->gradelama.' - '.$row->strukturlama);
            $objResponse->Assign("detgradebaru","innerHTML",$row->gradebaru.' - '.$row->strukturbaru);
            $objResponse->Assign("detjabatanlama","innerHTML",$row->jabatanlama);
            $objResponse->Assign("detjabatanbaru","innerHTML",$row->jabatanbaru);
        }
        return $objResponse;
    }


}
?>