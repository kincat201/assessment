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
        $data['title'] = 'Profil Kompetensi';
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
        $this->template->display('profilkompetensi/entryprofilkompetensi', $data);
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
            $objResponse->Assign("alert","innerHTML", succ_msg("Data KnowHow Berhasil Disimpan"));
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("Data KnowHow Gagal Disimpan ! Ulangi Klik Tombol Simpan"));
            // $objResponse->script("alert('Data Gagal Disimpan')");
        }
        return $objResponse;
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
            $objResponse->Assign("alert","innerHTML", succ_msg("Data Managerial Skill Berhasil Disimpan"));
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("Data Managerial Skill Gagal Disimpan ! Ulangi Klik Tombol Simpan"));
            // $objResponse->script("alert('Data Gagal Disimpan')");
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

    function getdatapegawai($nik,$nama,$tglmasuk1,$tglmasuk2,$pendidikan,$status,$unit,$jabatan){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->getdatapegawai($nik,$nama,$tglmasuk1,$tglmasuk2,$pendidikan,$status,$unit,$jabatan);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."pegawai/editpegawai/".$row->nik."'>Edit</a>";
                $html = $html."<tr>
                                <td>".$row->nik."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->tgllahir."</td>
                                <td>".$row->tglmasuk."</td>
                                <td>".$row->pendidikan."</td>
                                <td>".$row->status."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("pegawai","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editpegawai($nik){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->getpegawaibynik($nik);
        foreach ($data as $row) {
            $objResponse->Assign("nik","disabled",true);
            $objResponse->script("$('#update').show()");
            $objResponse->script("$('#simpan').hide()");
            $objResponse->Assign("nik","value",$row->nik);
            $objResponse->Assign("nama","value",$row->nama);
            $objResponse->Assign("tgllahir","value",$row->tgllahir);
            $objResponse->Assign("tglmasuk","value",$row->tglmasuk);
            $objResponse->Assign("pendidikan","value",$row->pendidikan);
            $objResponse->Assign("status","value",$row->status);
            $objResponse->Assign("unit","value",$row->unit);
            $objResponse->Assign("jabatan","value",$row->jabatan);
            $objResponse->Assign("username","value",$row->username);
            $objResponse->Assign("password","value",$row->password);
        }
        $objResponse->Assign("judul","innerHTML","Update Pegawai");
        return $objResponse;
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

}
?>