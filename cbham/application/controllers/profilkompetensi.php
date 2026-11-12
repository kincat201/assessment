<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profilkompetensi extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('profilkompetensi_model');
        $this->load->model('jabatan_model');
        $this->load->model('unit_model');
        $this->load->model('pegawai_model');
        $this->load->model('m_auth');
    }

    function index() {
        $data['title'] = 'Profil Kompetensi KnowHow & Managerial Skill';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanknowhow',&$this,'simpanknowhow'));    
        $this->xajax->register(XAJAX_FUNCTION, array('simpanmanagerialskill',&$this,'simpanmanagerialskill'));    
        $this->xajax->register(XAJAX_FUNCTION, array('cariknowhow',&$this,'cariknowhow'));
        $this->xajax->register(XAJAX_FUNCTION, array('caridatamanagerial',&$this,'caridatamanagerial'));  
        $this->xajax->register(XAJAX_FUNCTION, array('caristdknowhow',&$this,'caristdknowhow'));
        $this->xajax->register(XAJAX_FUNCTION, array('caristdmanagerial',&$this,'caristdmanagerial'));    
        $this->xajax->register(XAJAX_FUNCTION, array('cariprofilkompetensi',&$this,'cariprofilkompetensi'));
        $this->xajax->register(XAJAX_FUNCTION, array('carirekapprofilkompetensi',&$this,'carirekapprofilkompetensi'));  
        $this->xajax->register(XAJAX_FUNCTION, array('carimanagerial',&$this,'carimanagerial'));
        $this->xajax->register(XAJAX_FUNCTION, array('carirekapmanagerial',&$this,'carirekapmanagerial'));    
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getbawahan(); 
        // $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $this->template->display('profilkompetensi/entryprofilkompetensi', $data);
    }

    function caristdknowhow($nik){
        $objResponse = new xajaxResponse();
        $data = $this->profilkompetensi_model->caristdknowhow($nik);
        foreach ($data[0] as $row) {
            $jabatan = $row->namajabatan;
        }
        if (count($data[1])>0) {
            foreach ($data[1] as $rows) {
                $objResponse->Assign("sfe","innerHTML",$rows->fe);
                $objResponse->Assign("sie","innerHTML",$rows->ie);
                $objResponse->Assign("sex","innerHTML",$rows->ex);
                $objResponse->Assign("sbs","innerHTML",$rows->bs);
                $objResponse->Assign("stsmkt","innerHTML",$rows->tsmkt);
                $objResponse->Assign("stsest","innerHTML",$rows->tsest);
                $objResponse->Assign("stsppc","innerHTML",$rows->tsppc);
                $objResponse->Assign("stscon","innerHTML",$rows->tscon);
                $objResponse->Assign("stsqac","innerHTML",$rows->tsqac);
                $objResponse->Assign("stsman","innerHTML",$rows->tsman);
                $objResponse->Assign("stssar","innerHTML",$rows->tssar);
                $objResponse->Assign("stscs","innerHTML",$rows->tscs);
                $objResponse->Assign("stspeng","innerHTML",$rows->tspeng);
                $objResponse->Assign("stsfat","innerHTML",$rows->tsfat);
                $objResponse->Assign("stshse","innerHTML",$rows->tshse);
                $objResponse->Assign("stshrd","innerHTML",$rows->tshrd);
                $objResponse->Assign("stsga","innerHTML",$rows->tsga);
                $objResponse->Assign("stsmd","innerHTML",$rows->tsmd);
                $objResponse->Assign("stsmr","innerHTML",$rows->tsmr);
                $objResponse->Assign("stsengmech","innerHTML",$rows->tsengmech);
                $objResponse->Assign("stsengelec","innerHTML",$rows->tsengelec);
                $objResponse->Assign("stsenginst","innerHTML",$rows->tsenginst);
                $objResponse->Assign("stsengciv","innerHTML",$rows->tsengciv);
                $objResponse->Assign("stssd","innerHTML",$rows->tssd);
                $objResponse->Assign("stsia","innerHTML",$rows->tsia);
                $objResponse->Assign("ststop","innerHTML",$rows->tstop);
            }
        } else {
            $objResponse->script("alert('Standart KnowHow untuk ".$jabatan." Belum Di Entry')");
        }
        $objResponse->Assign("fe","value",'0');
        $objResponse->Assign("ie","value",'0');
        $objResponse->Assign("ex","value",'0');
        $objResponse->Assign("bs","value",'0');
        $objResponse->Assign("tsmkt","value",'0');
        $objResponse->Assign("tsest","value",'0');
        $objResponse->Assign("tsppc","value",'0');
        $objResponse->Assign("tscon","value",'0');
        $objResponse->Assign("tsqac","value",'0');
        $objResponse->Assign("tsman","value",'0');
        $objResponse->Assign("tssar","value",'0');
        $objResponse->Assign("tscs","value",'0');
        $objResponse->Assign("tspeng","value",'0');
        $objResponse->Assign("tsfat","value",'0');
        $objResponse->Assign("tshse","value",'0');
        $objResponse->Assign("tshrd","value",'0');
        $objResponse->Assign("tsga","value",'0');
        $objResponse->Assign("tsmd","value",'0');
        $objResponse->Assign("tsmr","value",'0');
        $objResponse->Assign("tsengmech","value",'0');
        $objResponse->Assign("tsengelec","value",'0');
        $objResponse->Assign("tsenginst","value",'0');
        $objResponse->Assign("tsengciv","value",'0');
        $objResponse->Assign("tssd","value",'0');
        $objResponse->Assign("tsia","value",'0');
        $objResponse->Assign("tstop","value",'0');
        $objResponse->Assign("kekuatan","value",'');
        $objResponse->Assign("kelemahan","value",'');
        $objResponse->Assign("rencana","value",'');
        return $objResponse;
    }

    function simpanknowhow($nama,
                        $periode,
                        $tahun,
                        $fe,
                        $ie,
                        $ex,
                        $bs,
                        $tsmkt,
                        $tsest,
                        $tsppc,
                        $tscon,
                        $tsqac,
                        $tsman,
                        $tssar,
                        $tscs,
                        $tspeng,
                        $tsfat,
                        $tshse,
                        $tshrd,
                        $tsga,
                        $tsmd,
                        $tsmr,
                        $tsengmech,
                        $tsengelec,
                        $tsenginst,
                        $tsengciv,
                        $tssd,
                        $tsia,
                        $tstop,
                        $kekuatan,
                        $kelemahan,
                        $rencana){
        $objResponse = new xajaxResponse();
        $data = $this->profilkompetensi_model->simpanknowhow($nama,
                        $periode,
                        $tahun,
                        $fe,
                        $ie,
                        $ex,
                        $bs,
                        $tsmkt,
                        $tsest,
                        $tsppc,
                        $tscon,
                        $tsqac,
                        $tsman,
                        $tssar,
                        $tscs,
                        $tspeng,
                        $tsfat,
                        $tshse,
                        $tshrd,
                        $tsga,
                        $tsmd,
                        $tsmr,
                        $tsengmech,
                        $tsengelec,
                        $tsenginst,
                        $tsengciv,
                        $tssd,
                        $tsia,
                        $tstop,
                        $kekuatan,
                        $kelemahan,
                        $rencana);
        if ($data>0) {
            $objResponse->Assign("nama","value","");
            $objResponse->Assign("periode","value","1");
            // $objResponse->Assign("alert","innerHTML", succ_msg("Data KnowHow Berhasil Disimpan"));
            $objResponse->script("alert('Data KnowHow Berhasil Disimpan')");
            $objResponse->Assign("fe","value",'0');
            $objResponse->Assign("ie","value",'0');
            $objResponse->Assign("ex","value",'0');
            $objResponse->Assign("bs","value",'0');
            $objResponse->Assign("tsmkt","value",'0');
            $objResponse->Assign("tsest","value",'0');
            $objResponse->Assign("tsppc","value",'0');
            $objResponse->Assign("tscon","value",'0');
            $objResponse->Assign("tsqac","value",'0');
            $objResponse->Assign("tsman","value",'0');
            $objResponse->Assign("tssar","value",'0');
            $objResponse->Assign("tscs","value",'0');
            $objResponse->Assign("tspeng","value",'0');
            $objResponse->Assign("tsfat","value",'0');
            $objResponse->Assign("tshse","value",'0');
            $objResponse->Assign("tshrd","value",'0');
            $objResponse->Assign("tsga","value",'0');
            $objResponse->Assign("tsmd","value",'0');
            $objResponse->Assign("tsmr","value",'0');
            $objResponse->Assign("tsengmech","value",'0');
            $objResponse->Assign("tsengelec","value",'0');
            $objResponse->Assign("tsenginst","value",'0');
            $objResponse->Assign("tsengciv","value",'0');
            $objResponse->Assign("tssd","value",'0');
            $objResponse->Assign("tsia","value",'0');
            $objResponse->Assign("tstop","value",'0');
            $objResponse->Assign("kekuatan","value",'');
            $objResponse->Assign("kelemahan","value",'');
            $objResponse->Assign("rencana","value",'');
            //standart
            $objResponse->Assign("sfe","innerHTML",'0');
            $objResponse->Assign("sie","innerHTML",'0');
            $objResponse->Assign("sex","innerHTML",'0');
            $objResponse->Assign("sbs","innerHTML",'0');
            $objResponse->Assign("stsmkt","innerHTML",'0');
            $objResponse->Assign("stsest","innerHTML",'0');
            $objResponse->Assign("stsppc","innerHTML",'0');
            $objResponse->Assign("stscon","innerHTML",'0');
            $objResponse->Assign("stsqac","innerHTML",'0');
            $objResponse->Assign("stsman","innerHTML",'0');
            $objResponse->Assign("stssar","innerHTML",'0');
            $objResponse->Assign("stscs","innerHTML",'0');
            $objResponse->Assign("stspeng","innerHTML",'0');
            $objResponse->Assign("stsfat","innerHTML",'0');
            $objResponse->Assign("stshse","innerHTML",'0');
            $objResponse->Assign("stshrd","innerHTML",'0');
            $objResponse->Assign("stsga","innerHTML",'0');
            $objResponse->Assign("stsmd","innerHTML",'0');
            $objResponse->Assign("stsmr","innerHTML",'0');
            $objResponse->Assign("stsengmech","innerHTML",'0');
            $objResponse->Assign("stsengelec","innerHTML",'0');
            $objResponse->Assign("stsenginst","innerHTML",'0');
            $objResponse->Assign("stsengciv","innerHTML",'0');
            $objResponse->Assign("stssd","innerHTML",'0');
            $objResponse->Assign("stsia","innerHTML",'0');
            $objResponse->Assign("ststop","innerHTML",'0');

        } else {
            // $objResponse->Assign("alert","innerHTML", err_msg("Data KnowHow Gagal Disimpan ! Ulangi Klik Tombol Simpan"));
            $objResponse->script("alert('Data KnowHow Gagal Disimpan ! Ulangi Klik Tombol Simpan')");
            // $objResponse->script("alert('Data Gagal Disimpan')");
        }
        return $objResponse;
    }

    function cariknowhow($nik,$nama,$periode,$tahun){
        $objResponse = new xajaxResponse();
        $data = $this->profilkompetensi_model->cariknowhow($nik,$periode,$tahun);
        if (count($data)>0) {
            foreach ($data as $rows) {
                $objResponse->Assign("fe","value",$rows->fe);
                $objResponse->Assign("ie","value",$rows->ie);
                $objResponse->Assign("ex","value",$rows->ex);
                $objResponse->Assign("bs","value",$rows->bs);
                $objResponse->Assign("tsmkt","value",$rows->tsmkt);
                $objResponse->Assign("tsest","value",$rows->tsest);
                $objResponse->Assign("tsppc","value",$rows->tsppc);
                $objResponse->Assign("tscon","value",$rows->tscon);
                $objResponse->Assign("tsqac","value",$rows->tsqac);
                $objResponse->Assign("tsman","value",$rows->tsman);
                $objResponse->Assign("tssar","value",$rows->tssar);
                $objResponse->Assign("tscs","value",$rows->tscs);
                $objResponse->Assign("tspeng","value",$rows->tspeng);
                $objResponse->Assign("tsfat","value",$rows->tsfat);
                $objResponse->Assign("tshse","value",$rows->tshse);
                $objResponse->Assign("tshrd","value",$rows->tshrd);
                $objResponse->Assign("tsga","value",$rows->tsga);
                $objResponse->Assign("tsmd","value",$rows->tsmd);
                $objResponse->Assign("tsmr","value",$rows->tsmr);
                $objResponse->Assign("tsengmech","value",$rows->tsengmech);
                $objResponse->Assign("tsengelec","value",$rows->tsengelec);
                $objResponse->Assign("tsenginst","value",$rows->tsenginst);
                $objResponse->Assign("tsengciv","value",$rows->tsengciv);
                $objResponse->Assign("tssd","value",$rows->tssd);
                $objResponse->Assign("tsia","value",$rows->tsia);
                $objResponse->Assign("tstop","value",$rows->tstop);
                $objResponse->Assign("kekuatan","value",$rows->kekuatan);
                $objResponse->Assign("kelemahan","value",$rows->kelemahan);
                $objResponse->Assign("rencana","value",$rows->rencana);
            }
        } else {
            $objResponse->script("alert('Data KnowHow ".$nama." Periode ".$periode." Tahun ".$tahun." Belum Di Entry')");
        }
        return $objResponse;
    }

    function caristdmanagerial($nik){
        $objResponse = new xajaxResponse();
        $data = $this->profilkompetensi_model->caristdmanagerial($nik);
        foreach ($data[0] as $row) {
            $jabatan = $row->namajabatan;
        }
        if (count($data[1])>0) {
            foreach ($data[1] as $rows) {
                $objResponse->Assign("sdev","innerHTML",$rows->dev);
                $objResponse->Assign("sdir","innerHTML",$rows->dir);
                $objResponse->Assign("stw","innerHTML",$rows->tw);
                $objResponse->Assign("stl","innerHTML",$rows->tl);
                $objResponse->Assign("sps","innerHTML",$rows->ps);
                $objResponse->Assign("spo","innerHTML",$rows->po);
                $objResponse->Assign("sso","innerHTML",$rows->so);
                $objResponse->Assign("sat","innerHTML",$rows->at);
                $objResponse->Assign("sct","innerHTML",$rows->ct);
                $objResponse->Assign("sint","innerHTML",$rows->int);
                $objResponse->Assign("siu","innerHTML",$rows->iu);
                $objResponse->Assign("srb","innerHTML",$rows->rb);
                $objResponse->Assign("simp","innerHTML",$rows->imp);
                $objResponse->Assign("sing","innerHTML",$rows->ing);
                $objResponse->Assign("strp","innerHTML",$rows->trp);
                $objResponse->Assign("stew","innerHTML",$rows->tew);
                $objResponse->Assign("scrt","innerHTML",$rows->crt);
                $objResponse->Assign("swis","innerHTML",$rows->wis);
                $objResponse->Assign("sexc","innerHTML",$rows->exc);
                $objResponse->Assign("sach","innerHTML",$rows->ach);
                $objResponse->Assign("sco","innerHTML",$rows->co);
                $objResponse->Assign("sis","innerHTML",$rows->is);
                $objResponse->Assign("scso","innerHTML",$rows->cso);
            }
        } else {
            $objResponse->script("alert('Standart Managerial untuk ".$jabatan." Belum Di Entry')");
        }
        $objResponse->Assign("dev","value",'0');
        $objResponse->Assign("dir","value",'0');
        $objResponse->Assign("tw","value",'0');
        $objResponse->Assign("tl","value",'0');
        $objResponse->Assign("ps","value",'0');
        $objResponse->Assign("po","value",'0');
        $objResponse->Assign("so","value",'0');
        $objResponse->Assign("at","value",'0');
        $objResponse->Assign("ct","value",'0');
        $objResponse->Assign("int","value",'0');
        $objResponse->Assign("iu","value",'0');
        $objResponse->Assign("rb","value",'0');
        $objResponse->Assign("imp","value",'0');
        $objResponse->Assign("ing","value",'0');
        $objResponse->Assign("trp","value",'0');
        $objResponse->Assign("tew","value",'0');
        $objResponse->Assign("crt","value",'0');
        $objResponse->Assign("wis","value",'0');
        $objResponse->Assign("exc","value",'0');
        $objResponse->Assign("ach","value",'0');
        $objResponse->Assign("co","value",'0');
        $objResponse->Assign("is","value",'0');
        $objResponse->Assign("cso","value",'0');
        $objResponse->Assign("penanggungjawab","value",'');
        $objResponse->Assign("komentar","value",'');
        $objResponse->Assign("jadwal","value",'');
        return $objResponse;
    }

    function managerialskill() {
        $data['title'] = 'Profil Kompetensi Managerial Skill';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanknowhow',&$this,'simpanknowhow'));    
        $this->xajax->register(XAJAX_FUNCTION, array('simpanmanagerialskill',&$this,'simpanmanagerialskill'));    
        $this->xajax->register(XAJAX_FUNCTION, array('cariknowhow',&$this,'cariknowhow'));
        $this->xajax->register(XAJAX_FUNCTION, array('carimanagerialskill',&$this,'carimanagerialskill'));    
        $this->xajax->register(XAJAX_FUNCTION, array('cariprofilkompetensi',&$this,'cariprofilkompetensi'));
        $this->xajax->register(XAJAX_FUNCTION, array('carirekapprofilkompetensi',&$this,'carirekapprofilkompetensi'));  
        $this->xajax->register(XAJAX_FUNCTION, array('carimanagerial',&$this,'carimanagerial'));
        $this->xajax->register(XAJAX_FUNCTION, array('carirekapmanagerial',&$this,'carirekapmanagerial'));    
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getbawahan(); 
        // $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $this->template->display('profilkompetensi/entrymanagerialskill', $data);
    }

    function simpanmanagerialskill($nama,
                        $periode,
                        $tahun,
                        $dev,
                        $dir,
                        $tw,
                        $tl,
                        $ps,
                        $po,
                        $so,
                        $at,
                        $ct,
                        $int,
                        $iu,
                        $rb,
                        $imp,
                        $ing,
                        $trp,
                        $tew,
                        $crt,
                        $wis,
                        $exc,
                        $ach,
                        $co,
                        $is,
                        $cso,
                        $penanggungjawab,
                        $jadwal,
                        $komentar){
        $objResponse = new xajaxResponse();
        $data = $this->profilkompetensi_model->simpanmanagerialskill($nama,
                        $periode,
                        $tahun,
                        $dev,
                        $dir,
                        $tw,
                        $tl,
                        $ps,
                        $po,
                        $so,
                        $at,
                        $ct,
                        $int,
                        $iu,
                        $rb,
                        $imp,
                        $ing,
                        $trp,
                        $tew,
                        $crt,
                        $wis,
                        $exc,
                        $ach,
                        $co,
                        $is,
                        $cso,
                        $penanggungjawab,
                        $jadwal,
                        $komentar);
        if ($data>0) {
            $objResponse->Assign("nama","value","");
            $objResponse->Assign("periode","value","1");
            $objResponse->script("kosong()");
            // $objResponse->Assign("alert","innerHTML", succ_msg("Data Managerial Skill Berhasil Disimpan"));
            $objResponse->script("alert('Data Managerial Skill Berhasil Disimpan')");
            $objResponse->Assign("dev","value",'0');
            $objResponse->Assign("dir","value",'0');
            $objResponse->Assign("tw","value",'0');
            $objResponse->Assign("tl","value",'0');
            $objResponse->Assign("ps","value",'0');
            $objResponse->Assign("po","value",'0');
            $objResponse->Assign("so","value",'0');
            $objResponse->Assign("at","value",'0');
            $objResponse->Assign("ct","value",'0');
            $objResponse->Assign("int","value",'0');
            $objResponse->Assign("iu","value",'0');
            $objResponse->Assign("rb","value",'0');
            $objResponse->Assign("imp","value",'0');
            $objResponse->Assign("ing","value",'0');
            $objResponse->Assign("trp","value",'0');
            $objResponse->Assign("tew","value",'0');
            $objResponse->Assign("crt","value",'0');
            $objResponse->Assign("wis","value",'0');
            $objResponse->Assign("exc","value",'0');
            $objResponse->Assign("ach","value",'0');
            $objResponse->Assign("co","value",'0');
            $objResponse->Assign("is","value",'0');
            $objResponse->Assign("cso","value",'0');
            $objResponse->Assign("penanggungjawab","value",'');
            $objResponse->Assign("komentar","value",'');
            $objResponse->Assign("jadwal","value",'');
            //standart
            $objResponse->Assign("sdev","innerHTML",'0');
            $objResponse->Assign("sdir","innerHTML",'0');
            $objResponse->Assign("stw","innerHTML",'0');
            $objResponse->Assign("stl","innerHTML",'0');
            $objResponse->Assign("sps","innerHTML",'0');
            $objResponse->Assign("spo","innerHTML",'0');
            $objResponse->Assign("sso","innerHTML",'0');
            $objResponse->Assign("sat","innerHTML",'0');
            $objResponse->Assign("sct","innerHTML",'0');
            $objResponse->Assign("sint","innerHTML",'0');
            $objResponse->Assign("siu","innerHTML",'0');
            $objResponse->Assign("srb","innerHTML",'0');
            $objResponse->Assign("simp","innerHTML",'0');
            $objResponse->Assign("sing","innerHTML",'0');
            $objResponse->Assign("strp","innerHTML",'0');
            $objResponse->Assign("stew","innerHTML",'0');
            $objResponse->Assign("scrt","innerHTML",'0');
            $objResponse->Assign("swis","innerHTML",'0');
            $objResponse->Assign("sexc","innerHTML",'0');
            $objResponse->Assign("sach","innerHTML",'0');
            $objResponse->Assign("sco","innerHTML",'0');
            $objResponse->Assign("sis","innerHTML",'0');
            $objResponse->Assign("scso","innerHTML",'0');
        } else {
            // $objResponse->Assign("alert","innerHTML", err_msg("Data Managerial Skill Gagal Disimpan ! Ulangi Klik Tombol Simpan"));
            $objResponse->script("alert('Data Managerial Skill Gagal Disimpan ! Ulangi Klik Tombol Simpan')");
            // $objResponse->script("alert('Data Gagal Disimpan')");
        }
        return $objResponse;
    }

    function caridatamanagerial($nik,$nama,$periode,$tahun){
        $objResponse = new xajaxResponse();
        $data = $this->profilkompetensi_model->caridatamanagerial($nik,$periode,$tahun);
        if (count($data)>0) {
            foreach ($data as $rows) {
                $objResponse->Assign("dev","value",$rows->dev);
                $objResponse->Assign("dir","value",$rows->dir);
                $objResponse->Assign("tw","value",$rows->tw);
                $objResponse->Assign("tl","value",$rows->tl);
                $objResponse->Assign("ps","value",$rows->ps);
                $objResponse->Assign("po","value",$rows->po);
                $objResponse->Assign("so","value",$rows->so);
                $objResponse->Assign("at","value",$rows->at);
                $objResponse->Assign("ct","value",$rows->ct);
                $objResponse->Assign("int","value",$rows->int);
                $objResponse->Assign("iu","value",$rows->iu);
                $objResponse->Assign("rb","value",$rows->rb);
                $objResponse->Assign("imp","value",$rows->imp);
                $objResponse->Assign("ing","value",$rows->ing);
                $objResponse->Assign("trp","value",$rows->trp);
                $objResponse->Assign("tew","value",$rows->tew);
                $objResponse->Assign("crt","value",$rows->crt);
                $objResponse->Assign("wis","value",$rows->wis);
                $objResponse->Assign("exc","value",$rows->exc);
                $objResponse->Assign("ach","value",$rows->ach);
                $objResponse->Assign("co","value",$rows->co);
                $objResponse->Assign("is","value",$rows->is);
                $objResponse->Assign("cso","value",$rows->cso);
                $objResponse->Assign("penanggungjawab","value",$rows->penanggungjawab);
                $objResponse->Assign("jadwal","value",$rows->jadwal);
                $objResponse->Assign("komentar","value",$rows->komentar);
            }
        } else {
            $objResponse->script("alert('Data Managerial Skill ".$nama." Periode ".$periode." Tahun ".$tahun." Belum Di Entry')");
        }
        return $objResponse;
    }

    function caripegawai($pegawai){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->caripegawai($pegawai); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->nik."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$row->namajabatan."</td>
                                <td><a class='btn mini blue sbold' data-toggle='modal' href='#detail' onClick='detailpegawai(".$row->nik.")'><i class='icon-eye-open'></i> Detail </a>
                                    <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick='editpegawai(".$row->nik.")'><i class='icon-edit'></i> Edit </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("pegawai","innerHTML",$html);
        return $objResponse;
    }

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
    //     $objResponse = new xajaxResponse();
    //     $data = $this->pegawai_model->getpegawaibynik($nik);
    //     foreach ($data as $row) {
    //         $objResponse->Assign("nik","disabled",true);
    //         $objResponse->script("$('#update').show()");
    //         $objResponse->script("$('#simpan').hide()");
    //         $objResponse->Assign("nik","value",$row->nik);
    //         $objResponse->Assign("nama","value",$row->nama);
    //         $objResponse->Assign("tgllahir","value",$row->tgllahir);
    //         $objResponse->Assign("tglmasuk","value",$row->tglmasuk);
    //         $objResponse->Assign("pendidikan","value",$row->pendidikan);
    //         $objResponse->Assign("status","value",$row->status);
    //         $objResponse->Assign("unit","value",$row->unit);
    //         $objResponse->Assign("jabatan","value",$row->jabatan);
    //         $objResponse->Assign("username","value",$row->username);
    //         $objResponse->Assign("password","value",$row->password);
    //     }
    //     $objResponse->Assign("judul","innerHTML","Update Pegawai");
    //     return $objResponse;
    // }

    function evaluasiprofilkompetensi() {
        $data['title'] = 'Evaluasi & Rekap Profil Kompetensi';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanknowhow',&$this,'simpanknowhow'));    
        $this->xajax->register(XAJAX_FUNCTION, array('simpanmanagerialskill',&$this,'simpanmanagerialskill'));    
        $this->xajax->register(XAJAX_FUNCTION, array('cariknowhow',&$this,'cariknowhow'));
        $this->xajax->register(XAJAX_FUNCTION, array('carimanagerialskill',&$this,'carimanagerialskill'));    
        $this->xajax->register(XAJAX_FUNCTION, array('cariprofilkompetensi',&$this,'cariprofilkompetensi'));
        $this->xajax->register(XAJAX_FUNCTION, array('carirekapprofilkompetensi',&$this,'carirekapprofilkompetensi'));  
        $this->xajax->register(XAJAX_FUNCTION, array('carimanagerial',&$this,'carimanagerial'));
        $this->xajax->register(XAJAX_FUNCTION, array('carirekapmanagerial',&$this,'carirekapmanagerial'));    
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getbawahan(); 
        // $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $this->template->display('profilkompetensi/evaluasiprofilkompetensi', $data);
    }
  
    function cariprofilkompetensi($nik,$tahun,$periode){
        $objResponse = new xajaxResponse();
        if ($nik=='') {
            $objResponse->script("alert('Pegawai Belum Di Pilih')");
        } else {
            $cekstd = $this->profilkompetensi_model->cekstdknowhow($nik);
            $cekprofil = $this->profilkompetensi_model->cekknowhow($nik,$tahun,$periode);
            if ($cekstd>0 && $cekprofil>0) {
                $html = '';
                $data = $this->profilkompetensi_model->cariprofilkompetensi($nik,$tahun,$periode);
                if ($data!=null) {
                    foreach ($data as $row) {
                        $html = $html."<tr>
                                        <td>".$row->jenis."</td>
                                        <td>".strtoupper($row->nama)."</td>
                                        <td>".$row->standart."</td>
                                        <td>".$row->val."</td>
                                        <td>".$row->gap."</td>
                                       </tr>";
                    }
                } else {
                    $html = $html."<tr><td colspan=4>Data Tidak Ada</td></tr>";
                }
                $objResponse->Assign("evaluasipk","innerHTML",$html);
            } else {
                if ($cekstd==0 && $cekprofil==0) {
                    $objResponse->script("alert('Standart KnowHow dan KnowHow Belum Di Input')");
                } else {
                    if ($cekstd==0) {
                        $objResponse->script("alert('Standart KnowHow Belum Di Input')");
                    } else {
                        $objResponse->script("alert('KnowHow Pegawai Ini Belum Di Input')");
                    }
                }
            }
        }
        return $objResponse;
    }

    function cetakprofilkompetensi($nik,$tahun,$periode){
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        $nik = urldecode($nik);
        $pegawai = $this->pegawai_model->getpegawaibynik($nik);
        // print_r($pegawai);
        foreach ($pegawai as $row) {
            $nama = $row->nama;
        }
        $arrper = array('1'=>'Semester 1', '2'=>'Semester 2');
        $data['header'] = array('nik'=>$nik, 'nama'=>$nama, 'tahun'=>$tahun, 'periode'=>$arrper[$periode]);
        $data['dataku'] = $this->profilkompetensi_model->cariprofilkompetensi($nik,$tahun,$periode);
        $data['catatan'] = $this->profilkompetensi_model->cariketeranganprofil($nik,$tahun,$periode);
        // print_r($data); exit();
        $this->load->view('profilkompetensi\cetakprofilkompetensi',$data);
    }

    function carirekapprofilkompetensi($nik,$tahun){
        $objResponse = new xajaxResponse();
        if ($nik=='') {
            $objResponse->script("alert('Pegawai Belum Di Pilih')");
        } else {
            $html = '';
            $data = $this->profilkompetensi_model->carirekapprofilkompetensi($nik,$tahun);
            if ($data!=null) {
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->jenis."</td>
                                    <td>".strtoupper($row->nama)."</td>
                                    <td>".$row->standart."</td>
                                    <td>".$row->val1."</td>
                                    <td>".$row->gap1."</td>
                                    <td>".$row->val2."</td>
                                    <td>".$row->gap2."</td>
                                   </tr>";
                }
            } else {
                $html = $html."<tr><td colspan=4>Data Tidak Ada</td></tr>";
            }
            $objResponse->Assign("rekappk","innerHTML",$html);
        }
        return $objResponse;
    }

    function cetakrekapprofilkompetensi($nik,$tahun){
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        $nik = urldecode($nik);
        $pegawai = $this->pegawai_model->getpegawaibynik($nik);
        foreach ($pegawai as $row) {
            $nama = $row->nama;
        }
        $data['header'] = array('nik'=>$nik, 'nama'=>$nama, 'tahun'=>$tahun);
        $data['dataku'] = $this->profilkompetensi_model->carirekapprofilkompetensi($nik,$tahun);
        $this->load->view('profilkompetensi\cetakrekapprofilkompetensi',$data);
    }

    function carimanagerial($nik,$tahun,$periode){
        $objResponse = new xajaxResponse();
        if ($nik=='') {
            $objResponse->script("alert('Pegawai Belum Di Pilih')");
        } else {
            $cekstd = $this->profilkompetensi_model->cekstdmanagerial($nik);
            $cekprofil = $this->profilkompetensi_model->cekmanagerial($nik,$tahun,$periode);
            if ($cekstd>0 && $cekprofil>0) {
                $html = '';
                $data = $this->profilkompetensi_model->carimanagerial($nik,$tahun,$periode);
                if ($data!=null) {
                    foreach ($data as $row) {
                        $html = $html."<tr>
                                        <td>".$row->jenis."</td>
                                        <td>".strtoupper($row->nama)."</td>
                                        <td>".$row->standart."</td>
                                        <td>".$row->val."</td>
                                        <td>".$row->gap."</td>
                                       </tr>";
                    }
                } else {
                    $html = $html."<tr><td colspan=4>Data Tidak Ada</td></tr>";
                }
                $objResponse->Assign("evaluasims","innerHTML",$html);
            } else {
                if ($cekstd==0 && $cekprofil==0) {
                    $objResponse->script("alert('Standart Managerial dan Managerial Belum Di Input')");
                } else {
                    if ($cekstd==0) {
                        $objResponse->script("alert('Standart Managerial Belum Di Input')");
                    } else {
                        $objResponse->script("alert('Managerial Pegawai Ini Belum Di Input')");
                    }
                }
            }
        }
        return $objResponse;
    }

    function cetakmanagerialskill($nik,$tahun,$periode){
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        $nik = urldecode($nik);
        $pegawai = $this->pegawai_model->getpegawaibynik($nik);
        foreach ($pegawai as $row) {
            $nama = $row->nama;
        }
        $arrper = array('1'=>'Semester 1', '2'=>'Semester 2');
        $data['header'] = array('nik'=>$nik, 'nama'=>$nama, 'tahun'=>$tahun, 'periode'=>$arrper[$periode]);
        $data['dataku'] = $this->profilkompetensi_model->carimanagerial($nik,$tahun,$periode);
        $data['catatan'] = $this->profilkompetensi_model->cariketeranganmanagerial($nik,$tahun,$periode);
        $this->load->view('profilkompetensi\cetakmanagerialskill',$data);
    }

    function carirekapmanagerial($nik,$tahun){
        $objResponse = new xajaxResponse();
        if ($nik=='') {
            $objResponse->script("alert('Pegawai Belum Di Pilih')");
        } else {
            $html = '';
            $data = $this->profilkompetensi_model->carirekapmanagerial($nik,$tahun);
            if ($data!=null) {
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->jenis."</td>
                                    <td>".strtoupper($row->nama)."</td>
                                    <td>".$row->standart."</td>
                                    <td>".$row->val1."</td>
                                    <td>".$row->gap1."</td>
                                    <td>".$row->val2."</td>
                                    <td>".$row->gap2."</td>
                                   </tr>";
                }
            } else {
                $html = $html."<tr><td colspan=4>Data Tidak Ada</td></tr>";
            }
            $objResponse->Assign("rekapms","innerHTML",$html);
        }
        return $objResponse;
    }

    function cetakrekapmanagerialskill($nik,$tahun){
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        $nik = urldecode($nik);
        $pegawai = $this->pegawai_model->getpegawaibynik($nik);
        foreach ($pegawai as $row) {
            $nama = $row->nama;
        }
        $data['header'] = array('nik'=>$nik, 'nama'=>$nama, 'tahun'=>$tahun);
        $data['dataku'] = $this->profilkompetensi_model->carirekapmanagerial($nik,$tahun);
        $this->load->view('profilkompetensi\cetakrekapmanagerialskill',$data);
    }

}
?>