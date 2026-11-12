<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mpp extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('profilkompetensi_model');
        $this->load->model('jabatan_model');
        $this->load->model('unit_model');
        $this->load->model('pegawai_model');
        $this->load->model('mpp_model');
    }

    function index() {
        $data['title'] = 'Rencana dan Pemenuhan SDM';
        $this->xajax->register(XAJAX_FUNCTION, array('tambahdetailmpp',&$this,'tambahdetailmpp'));    
        $this->xajax->register(XAJAX_FUNCTION, array('hapusdetailmpp',&$this,'hapusdetailmpp'));    
        $this->xajax->register(XAJAX_FUNCTION, array('simpanmpp',&$this,'simpanmpp'));
        $this->xajax->register(XAJAX_FUNCTION, array('carireportmpp',&$this,'carireportmpp'));    
        $this->xajax->register(XAJAX_FUNCTION, array('detailmpp',&$this,'detailmpp'));
        $this->xajax->register(XAJAX_FUNCTION, array('carimppopen',&$this,'carimppopen')); 
        $this->xajax->register(XAJAX_FUNCTION, array('carimppapp',&$this,'carimppapp')); 
        $this->xajax->register(XAJAX_FUNCTION, array('accdetmpp',&$this,'accdetmpp'));  
        $this->xajax->register(XAJAX_FUNCTION, array('closempp',&$this,'closempp'));  
        $this->xajax->register(XAJAX_FUNCTION, array('batalmpp',&$this,'batalmpp'));  
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['unit'] = $this->unit_model->getdataunit(''); 
        $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['grade'] = $this->mpp_model->getdatagrade(); 
        $nourut = $this->mpp_model->getnompp();
        $data['nompp'] = "MPP-".date('Y')."-".$nourut;
        $this->template->display('mpp/v_mpp', $data);
    }

    function tambahdetailmpp($nompp,$jabatan,$tahun,$bulan,$stdgrade,$actgrade,$kandidat,$tindakan,$jadwal,$pic){
        $objResponse = new xajaxResponse();
        if ($jabatan=='' or $stdgrade=='' or $actgrade=='' or $kandidat=='') {
            if ($jabatan=='') {
                $message = "Jabatan Belum Di Pilih !";
            } 
            if ($stdgrade=='') {
                $message = "Standart Grade Belum Di Pilih !";
            }
            if ($actgrade=='') {
                $message = "Actual Grade Belum Di Pilih !";
            }
            if ($kandidat=='') {
                $message = "Kandidat Belum Di Pilih !";
            }
            $objResponse->script("alert('".$message."'')");
        } else {
            // $no = $this->pegawai_model->getnokeluarga($nik);
            $data = $this->mpp_model->tambahdetailmpp($nompp,$jabatan,$tahun,$bulan,$stdgrade,$actgrade,$kandidat,$tindakan,$jadwal,$pic);
            $html = '';
            if (count($data)>0) {
                // $no=0;
                foreach ($data as $row) {
                    // $no = $no+1;
                    $html = $html."<tr>
                                    <td>".$row->namajabatan."</td>
                                    <td>".$row->tahun."</td>
                                    <td>".$row->bulan."</td>
                                    <td>".$row->stdgrade."</td>
                                    <td>".$row->actgrade."</td>
                                    <td>".$row->namakandidat."</td>
                                    <td>".$row->tindakan."</td>
                                    <td>".$row->jadwal."</td>
                                    <td>".$row->pic."</td>
                                    <td><a class='btn mini red sbold' href='#' onClick=\"hapusdetailmpp('".$row->nompp."','".$row->kandidat."')\"><i class='icon-trash'></i> Hapus </a></td>
                                </tr>";
                }
                $objResponse->Assign("detailmpp","innerHTML",$html);
                $objResponse->script("kosongdetail()");
            } 
        }
        return $objResponse;
    }

    function hapusdetailmpp($nompp,$kandidat){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->hapusdetailmpp($nompp,$kandidat);
        $html = '';
        if (count($data)>0) {
            // $no=0;
            foreach ($data as $row) {
                // $no = $no+1;
                $html = $html."<tr>
                                <td>".$row->namajabatan."</td>
                                <td>".$row->tahun."</td>
                                <td>".date('F', mktime(0,0,0,$rowdet->bulan,10))."</td>
                                <td>".$row->stdgrade."</td>
                                <td>".$row->actgrade."</td>
                                <td>".$row->namakandidat."</td>
                                <td>".$row->tindakan."</td>
                                <td>".$row->jadwal."</td>
                                <td>".$row->pic."</td>
                                <td><a class='btn mini red sbold' href='#' onClick=\"hapusdetailmpp('".$row->nompp."','".$row->kandidat."')\"><i class='icon-trash'></i> Hapus </a></td>
                            </tr>";
            }
            $objResponse->script("kosongdetail()");
        } 
        $objResponse->Assign("detailmpp","innerHTML",$html);
        return $objResponse;
    }

    function simpanmpp($nompp,$tgl,$unit){
        $objResponse = new xajaxResponse();
        $html = '';
        $data = $this->mpp_model->simpanmpp($nompp,$tgl,$unit);
        if ($data>0) {
            $objResponse->Assign("alert","innerHTML", succ_msg("MPP ".$nompp." Berhasil Disimpan"));   
            $nourut = $this->mpp_model->getnompp();
            $nompplanjut = "MPP-".date('Y')."-".$nourut; 
            $objResponse->Assign("nompp","value", $nompplanjut);
            $objResponse->Assign("unit","value", '');
            $objResponse->Assign("detailmpp","innerHTML", '');
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("MPP ".$nompp." Tidak Berhasil Disimpan. Coba Ulangi !"));
        }
        return $objResponse;
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
        $data['title'] = 'Mutasi';
        $this->xajax->register(XAJAX_FUNCTION, array('getnomutasi',&$this,'getnomutasi')); 
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
        $data['nomutasi'] = $this->mpp_model->getnomutasi(); 
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

    function simpanrotasi($jenis,$nomutasi,$tanggal,$nama,$status,$unit,$namaunit,$grade,$struktural,$jabatan,$namajabatan,$statusbaru,$unitbaru,$namaunitbaru,$gradebaru,$strukturbaru,$jabatanbaru,$namajabatanbaru,$punishment,$keterangan){
        $objResponse = new xajaxResponse();
        if ($jenis=='') {
            $objResponse->script("alert('Jenis Belum Dipilih')");
        } else if ($nomutasi==''){
            $objResponse->script("alert('No Surat Belum Di Isi')");
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
                $data = $this->mpp_model->simpanrotasi($jenis,$nomutasi,$tanggal,$nama,$status,$unit,$namaunit,$grade,$struktural,$jabatan,$namajabatan,$statusbaru,$unitbaru,$namaunitbaru,$gradebaru,$strukturbaru,$jabatanbaru,$namajabatanbaru,$punishment,$keterangan);
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

    function updaterotasi($jenis,$nomutasi,$tanggal,$nama,$status,$unit,$namaunit,$grade,$struktural,$jabatan,$namajabatan,$statusbaru,$unitbaru,$namaunitbaru,$gradebaru,$strukturbaru,$jabatanbaru,$namajabatanbaru,$punishment,$keterangan){
        $objResponse = new xajaxResponse();
        if ($jenis=='') {
            $objResponse->script("alert('Jenis Belum Dipilih')");
        } else if ($nomutasi==''){
            $objResponse->script("alert('No Surat Belum Di Isi')");
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
            $data = $this->mpp_model->updaterotasi($jenis,$nomutasi,$tanggal,$nama,$status,$unit,$namaunit,$grade,$struktural,$jabatan,$namajabatan,$statusbaru,$unitbaru,$namaunitbaru,$gradebaru,$strukturbaru,$jabatanbaru,$namajabatanbaru,$punishment,$keterangan);
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
                                <td>".$row->nomutasi."</td>
                                <td>".$row->nama."</td>
                                <td>".date('d F Y',strtotime($row->tanggal))."</td>
                                <td>".$row->unitbaru."</td>
                                <td>".$row->jabatanbaru."</td>
                                <td align='center'>
                                    <a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick=\"detailrotasi('".$row->nomutasi."')\"><i class='icon-eye-open'></i> Detail </a>
                                </td>
                                <td>
                                    <a class='btn mini green sbold' href='#' onClick=\"accrotasi('acc','".$row->nomutasi."')\"><i class='icon-ok'></i> Approve </a>
                                    <a class='btn mini red sbold' href='#' onClick=\"accrotasi('notacc','".$row->nomutasi."')\"><i class='icon-remove'></i> Reject </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan=7>Data Rotasi / Promosi Tidak Ada</td></tr>";
        }
        $objResponse->Assign("dataotorotasi","innerHTML",$html);
        return $objResponse;
    }

    function accrotasi($status,$nomutasi){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->accrotasi($status,$nomutasi);
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
                                    <td>".$row->nomutasi."</td>
                                    <td>".$row->nama."</td>
                                    <td>".date('d F Y',strtotime($row->tanggal))."</td>
                                    <td>".$row->unitbaru."</td>
                                    <td>".$row->jabatanbaru."</td>
                                    <td align='center'>
                                        <a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick=\"detailrotasi('".$row->nomutasi."')\"><i class='icon-eye-open'></i> Detail </a>
                                    </td>
                                    <td>
                                        <a class='btn mini green sbold' href='#' onClick=\"accrotasi('acc','".$row->nomutasi."')\"><i class='icon-ok'></i> Approve </a>
                                        <a class='btn mini red sbold' href='#' onClick=\"accrotasi('notacc','".$row->nomutasi."')\"><i class='icon-remove'></i> Reject </a>
                                    </td>
                                </tr>";
                }
            } else {
                $html = $html."<tr><td colspan=8>Data Rotasi / Promosi Tidak Ada</td></tr>";
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
                                <td>".$row->nomutasi."</td>
                                <td>".$row->nama."</td>
                                <td>".date('d F Y',strtotime($row->tanggal))."</td>
                                <td>".$row->namaunitbaru."</td>
                                <td>".$row->namajabatanbaru."</td>
                                <td>
                                    <a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick=\"detailrotasi('".$row->nomutasi."')\"><i class='icon-eye-open'></i> Detail </a>
                                </td>
                                <td>".$label."</td>
                            </tr>";
                            // <a class='btn mini purple sbold' target='_blank' href='".base_url()."mpp/cetakrotasi/".$row->nik."/".$row->tanggal."' ><i class='icon-print'></i> Cetak </a>
            }
        } else {
            $html = $html."<tr><td colspan=8>Data Rotasi / Promosi Tidak Ada</td></tr>";
        }
        $objResponse->Assign("datacarirotasi","innerHTML",$html);
        return $objResponse;
    }
  
    function detailrotasi($nomutasi){
        $objResponse = new xajaxResponse();
        $data = $this->mpp_model->getdetailrotasi($nomutasi);
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
            $objResponse->Assign("detnomutasi","innerHTML",$row->nomutasi);
            $objResponse->Assign("dettanggal","innerHTML",date('d F Y',strtotime($row->tanggal)));
            $objResponse->Assign("detnama","innerHTML",$row->nik.' - '.$row->nama);
            $objResponse->Assign("detstatuslama","innerHTML",$row->statuslama);
            $objResponse->Assign("detstatusbaru","innerHTML",$row->statusbaru);
            $objResponse->Assign("detunitlama","innerHTML",$row->namaunitlama);
            $objResponse->Assign("detunitbaru","innerHTML",$row->namaunitbaru);
            $objResponse->Assign("detgradelama","innerHTML",$row->gradelama.' - '.$row->strukturlama);
            $objResponse->Assign("detgradebaru","innerHTML",$row->gradebaru.' - '.$row->strukturbaru);
            $objResponse->Assign("detjabatanlama","innerHTML",$row->namajabatanlama);
            $objResponse->Assign("detjabatanbaru","innerHTML",$row->namajabatanbaru);
            $objResponse->Assign("detpunishment","innerHTML",$row->punishment);
            $objResponse->Assign("detketerangan","innerHTML",$row->keterangan);
        }
        return $objResponse;
    }


}
?>