<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bobot extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_bobot');
        $this->load->model('jabatan_model');
        $this->load->model('tna_model');        
        $this->load->model('unit_model');
        $this->load->model('pegawai_model');        
    }

    function index() {
        $data['title'] = 'Indeks KPI';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanbobot',&$this,'simpanbobot'));   
        $this->xajax->register(XAJAX_FUNCTION, array('simpandetbobot',&$this,'simpandetbobot'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editbobot',&$this,'editbobot'));   
        $this->xajax->register(XAJAX_FUNCTION, array('updatebobot',&$this,'updatebobot'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapusbobot',&$this,'hapusbobot'));   
        $this->xajax->register(XAJAX_FUNCTION, array('deletebobot',&$this,'deletebobot'));   
        $this->xajax->register(XAJAX_FUNCTION, array('caribobot',&$this,'caribobot'));                
        $this->xajax->register(XAJAX_FUNCTION, array('cariotokodebobot',&$this,'cariotokodebobot'));                
        $this->xajax->register(XAJAX_FUNCTION, array('batal',&$this,'batal'));                
        $this->xajax->register(XAJAX_FUNCTION, array('editbobotreport',&$this,'editbobotreport'));                
        $this->xajax->register(XAJAX_FUNCTION, array('hapusbobotreport',&$this,'hapusbobotreport'));                
        $this->xajax->register(XAJAX_FUNCTION, array('updatebobotreport',&$this,'updatebobotreport'));                
        $this->xajax->processRequest();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['dataunit'] = $this->unit_model->getdataunit(''); 
        $data['datajabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['datakpi'] = $this->m_bobot->getdatakpi(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/v_bobot', $data);
    }

    function simpandetbobot($noindex,$tahun,$unit,$jabatan,$kpi,$bobotbln,$bobotsmt,$bobotthn){
        $objResponse = new xajaxResponse();
        if (($tahun=='') or ($unit=='')){
            $objResponse->script("alert('Semua data harus di isi !')");
        } else {
            $data = $this->m_bobot->simpandetbobot($noindex,$tahun,$unit,$jabatan,$kpi,$bobotbln,$bobotsmt,$bobotthn);
            if ($data>0) {
                // $objResponse->Assign("alert","innerHTML", succ_msg("Bobot ".$kpi." Berhasil Disimpan"));
                // $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("tahun","value","");
                // $objResponse->Assign("unit","value","");
                // $objResponse->Assign("jabatan","value","");
                $objResponse->Assign("kpi","value","");
                $objResponse->Assign("bobotbln","value","");
                $objResponse->Assign("bobotsmt","value","");
                $objResponse->Assign("bobotthn","value","");
                $html = '';
                $total=0;
                // $data = $this->m_bobot->getdatabobot(''); 
                    $totalbln=0;
                    $totalsmt=0;
                    $totalthn=0;                
                foreach ($data as $row) {
                    $totalbln=$totalbln+$row->ket8;
                    $totalsmt=$totalsmt+$row->ket9;
                    $totalthn=$totalthn+$row->ket10;
                    $html = $html."<tr>
                                    <td>".$row->ket1."</td>
                                    <td>".$row->ket3."</td>
                                    <td>".$row->ket5."</td>
                                    <td>".$row->ket7."</td>
                                    <td>".$row->ket8."</td>
                                    <td>".$row->ket9."</td>
                                    <td>".$row->ket10."</td>
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editbobot(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusbobot(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                    </td>
                                </tr>";
                }
                    $html = $html."<tr>
                                    <td colspan='4' align='center'>".'Total'."</td>
                                    <td>".$totalbln."</td>
                                    <td>".$totalsmt."</td>
                                    <td>".$totalthn."</td>
                                    <td></td>
                                </tr>";                
                $objResponse->Assign("bobot","innerHTML",$html);

            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function simpanbobot(){
        $objResponse = new xajaxResponse();
        // if ($namabobot=='') {
        //     $objResponse->script("alert('Nama bobot Belum Di Isi !')");
        // } else {
            $data = $this->m_bobot->simpanbobot();
// print_r($data);exit();            
            if ($data>0) {
                $objResponse->Assign("alert","innerHTML", succ_msg("Master Indeks Berhasil Disimpan"));
                // $objResponse->script("$('#tambah').modal('hide')");
                // $objResponse->Assign("nama","value","");
                $html = '';
                // $data = $this->m_bobot->getdatabobot(''); 
                // foreach ($data as $row) {
                //     $html = $html."<tr>
                //                     <td>".$row->ket1."</td>
                //                     <td>".$row->ket3."</td>
                //                     <td>".$row->ket5."</td>
                //                     <td>".$row->ket7."</td>
                //                     <td>".$row->ket8."</td>
                //                     <td>".$row->ket9."</td>
                //                     <td>".$row->ket10."</td>
                //                     <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editbobot(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                //                         <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusbobot(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>                                        
                //                     </td>
                //                 </tr>";
                // }
                $objResponse->Assign("bobot","innerHTML",$html);
            } elseif($data==-1) {
                $objResponse->script("alert('Nilai Indeks Harus 100%')");
            } elseif($data==0) {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        
        return $objResponse;
    }

    function batal(){
        $objResponse = new xajaxResponse();
        $data = $this->m_bobot->batal();
        $html = '';
        $objResponse->Assign("bobot","innerHTML",$html);        
        return $objResponse;
    }

    function caribobot($tahun,$unit,$jabatan){
        $objResponse = new xajaxResponse();
        $data = $this->m_bobot->caribobot($tahun,$unit,$jabatan); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->tahun."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$row->kpi."</td>
                                <td>".$row->namakpi."</td>
                                <td>".$row->bobotbln."</td>
                                <td>".$row->bobotsmt."</td>
                                <td>".$row->bobotthn."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit2' onClick='editbobotreport(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusbobotreport(".$row->noindex.",".$tahun.",".$unit.",".$jabatan.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("reportbobot","innerHTML",$html);
        return $objResponse;
    }

    function editbobotreport($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_bobot->carikodebobot($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("noindexreport","value",$row->noindex);   
            $objResponse->Assign("tahunreport","value",$row->tahun);            
            $objResponse->Assign("unitreport","value",$row->unit);
            $objResponse->Assign("jabatanreport","value",$row->jabatan);
            $objResponse->Assign("kodekpireport","value",$row->kpi);
            // $objResponse->Assign("namakpireport","value",$row->namakpi);
            $objResponse->Assign("indeksblnreport","value",$row->bobotbln);
            $objResponse->Assign("indekssmtreport","value",$row->bobotsmt);            
            $objResponse->Assign("indeksthnreport","value",$row->bobotthn);            
        }
        return $objResponse;
    }

    function hapusbobotreport($noindex,$tahun,$unit,$jabatan){
        $objResponse = new xajaxResponse();
        $data = $this->m_bobot->hapusbobotreport($noindex,$tahun,$unit,$jabatan); 
        $html='';
        // print_r($data);exit();
        if ($data>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->tahun."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$row->kpi."</td>
                                <td>".$row->namakpi."</td>
                                <td>".$row->bobotbln."</td>
                                <td>".$row->bobotsmt."</td>
                                <td>".$row->bobotthn."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editbobotreport(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusbobotreport(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("reportbobot","innerHTML",$html);
        return $objResponse;
    }
   
    function updatebobotreport($noindexreport,$tahunreport,$unitreport,$jabatanreport,$kodekpireport,$indeksblnreport,$indekssmtreport,$indeksthnreport){
        $objResponse = new xajaxResponse();
        $data = $this->m_bobot->updatebobotreport($noindexreport,$tahunreport,$unitreport,$jabatanreport,$kodekpireport,$indeksblnreport,$indekssmtreport,$indeksthnreport); 
        $html='';
        // print_r($data);exit();
        if ($data>0) { 
            $objResponse->script("$('#edit2').modal('hide')");
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->tahun."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$row->kpi."</td>
                                <td>".$row->namakpi."</td>
                                <td>".$row->bobotbln."</td>
                                <td>".$row->bobotsmt."</td>
                                <td>".$row->bobotthn."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editbobotreport(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusbobotreport(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("reportbobot","innerHTML",$html);
        return $objResponse;
    }

    function getdatabobot($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->m_bobot->getdatabobot($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."bobot/editbobot/".$row->noindex."'>Edit</a>";
                $delete = "<a href='".base_url()."bobot/hapusbobot/".$row->noindex."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->kodebobot."</td>
                                <td>".$row->bobot."</td>
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
            $objResponse->Assign("bobot","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editbobot($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_bobot->getbobotbykbobot($noindex);
        foreach ($data as $row) {
            $objResponse->Assign("tahun","value",$row->ket1);            
            $objResponse->Assign("unit","value",$row->ket2);
            $objResponse->Assign("jabatan","value",$row->ket4);
            $objResponse->Assign("kpi","value",$row->ket6);
            $objResponse->Assign("bobotbln","value",$row->ket8);
            $objResponse->Assign("bobotsmt","value",$row->ket9);            
            $objResponse->Assign("bobotthn","value",$row->ket10);
            $objResponse->Assign("noindex","value",$row->noindex);
        }
        return $objResponse;
    }

    function hapusbobot($noindex){
        $objResponse = new xajaxResponse();
        // if (($tahun=='') or ($unit=='')){
        //     $objResponse->script("alert('Semua data harus di isi !')");
        // } else {
            // $data=null;
            $data = $this->m_bobot->hapusbobot($noindex);
            // print_r($data);exit();
            if ($data!=0) {
                $objResponse->Assign("tahun","value","");
                $objResponse->Assign("unit","value","");
                $objResponse->Assign("jabatan","value","");
                $objResponse->Assign("kpi","value","");
                $objResponse->Assign("bobotbln","value","");
                $objResponse->Assign("bobotsmt","value","");
                $objResponse->Assign("bobotthn","value","");
                $html = '';
                $totalbln=0;
                $totalsmt=0;
                $totalthn=0;                                
                foreach ($data as $row) {
                    $totalbln=$totalbln+$row->ket8;
                    $totalsmt=$totalsmt+$row->ket9;
                    $totalthn=$totalthn+$row->ket10;                    
                    $html = $html."<tr>
                                    <td>".$row->ket1."</td>
                                    <td>".$row->ket3."</td>
                                    <td>".$row->ket5."</td>
                                    <td>".$row->ket7."</td>
                                    <td>".$row->ket8."</td>
                                    <td>".$row->ket9."</td>
                                    <td>".$row->ket10."</td>
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editbobot(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusbobot(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>                                        
                                    </td>
                                </tr>";
                }
                    $html = $html."<tr>
                                    <td colspan='4' align='center'>".'Total'."</td>
                                    <td>".$totalbln."</td>
                                    <td>".$totalsmt."</td>
                                    <td>".$totalthn."</td>
                                    <td></td>
                                </tr>";                 
                $objResponse->Assign("bobot","innerHTML",$html);
            } else {
                $html = '';
                $objResponse->script("alert('Data tidak ditemukan')");
                $objResponse->Assign("bobot","innerHTML",$html);
            }
        // }
        return $objResponse;
    }

    // function hapusbobot($noindex){
    //     $objResponse = new xajaxResponse();
    //     $data = $this->m_bobot->getbobotbykbobot($noindex);
    //     foreach ($data as $row) {
    //         $objResponse->Assign("tahun","value",$row->ket1);            
    //         $objResponse->Assign("unit","value",$row->ket2);
    //         $objResponse->Assign("jabatan","value",$row->ket4);
    //         $objResponse->Assign("kpi","value",$row->ket6);
    //         $objResponse->Assign("bobotbln","value",$row->ket8);
    //         $objResponse->Assign("bobotsmt","value",$row->ket9);            
    //         $objResponse->Assign("bobotthn","value",$row->ket10);
    //         $objResponse->Assign("noindex","value",$row->noindex);
    //     }
    //     return $objResponse;
    // }

    function updatebobot($noindex1,$kelompok1,$kodebobot1,$namabobot1,$deskripsi1,$target1,$satuan1,$rollup1,$polarisasi1,$periode1,$formula1){
        $objResponse = new xajaxResponse();
        $data = $this->m_bobot->updatebobot($noindex1,$kelompok1,$kodebobot1,$namabobot1,$deskripsi1,$target1,$satuan1,$rollup1,$polarisasi1,$periode1,$formula1);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("kelompok1","value","");
            $objResponse->Assign("kodebobot1","value","");
            $objResponse->Assign("namabobot1","value","");
            $objResponse->Assign("deskripsi1","value","");
            $objResponse->Assign("target1","value","");            
            $objResponse->Assign("satuan1","value","");
            $objResponse->Assign("rollup1","value","");
            $objResponse->Assign("polarisasi1","value","");
            $objResponse->Assign("periode1","value","");
            $objResponse->Assign("formula1","value","");                        
            $html='';
            $data = $this->m_bobot->getdatabobot('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodebobot."</td>
                                <td>".$row->bobot."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->polarisasi."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->formula."</td>
                                <td>".$row->tglupdate."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editbobot(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusbobot(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>                                    
                                </td>
                            </tr>";
            }
            $objResponse->Assign("bobot","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data bobot ".$noindex." - ".$namabobot1." Gagal Di Update')");
        }
        return $objResponse;
    }

    function deletebobot($noindex2,$kelompok2,$kodebobot2,$namabobot2,$deskripsi2,$target2,$satuan2,$rollup2,$polarisasi2,$periode2,$formula2){
        $objResponse = new xajaxResponse();
        $data = $this->m_bobot->deletebobot($noindex2,$kelompok2,$kodebobot2,$namabobot2,$deskripsi2,$target2,$satuan2,$rollup2,$polarisasi2,$periode2,$formula2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");
            $objResponse->Assign("kelompok2","value","");
            $objResponse->Assign("kodebobot2","value","");
            $objResponse->Assign("namabobot2","value","");
            $objResponse->Assign("deskripsi2","value","");
            $objResponse->Assign("target2","value","");            
            $objResponse->Assign("satuan2","value","");
            $objResponse->Assign("rollup2","value","");
            $objResponse->Assign("polarisasi2","value","");
            $objResponse->Assign("periode2","value","");
            $objResponse->Assign("formula2","value","");                        
            $html='';
            $data = $this->m_bobot->getdatabobot('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodebobot."</td>
                                <td>".$row->bobot."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->polarisasi."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->formula."</td>
                                <td>".$row->tglupdate."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editbobot(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusbobot(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>                                    
                                </td>
                            </tr>";
            }
            $objResponse->Assign("bobot","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data bobot ".$kodebobot2." - ".$namabobot2." Gagal Di Hapus')");
        }
        return $objResponse;
    }  

    function cariotokodebobot($kelompok){
        $objResponse = new xajaxResponse();
        $data = $this->m_bobot->cariotokodebobot($kelompok);
        foreach ($data as $row) {
            $objResponse->Assign("kodebobot","value",$row->kode);
        }
        return $objResponse;
    }

    function cetakbobot($tahun,$unit,$jabatan) {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_bobot->cetakbobot($tahun,$unit,$jabatan);
         $this->load->view('master\cetakbobot', $data);
    }

}
?>