<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skk extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_skk');
        $this->load->model('m_bobot');
        $this->load->model('jabatan_model');
        $this->load->model('tna_model');        
        $this->load->model('unit_model');
        $this->load->model('pegawai_model');        
    }

    function index() {
        $data['title'] = 'Target SKK';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanskk',&$this,'simpanskk'));   
        $this->xajax->register(XAJAX_FUNCTION, array('simpandetskk',&$this,'simpandetskk'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editskk',&$this,'editskk'));   
        $this->xajax->register(XAJAX_FUNCTION, array('updateskk',&$this,'updateskk'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapusskk',&$this,'hapusskk'));   
        $this->xajax->register(XAJAX_FUNCTION, array('deleteskk',&$this,'deleteskk'));   
        $this->xajax->register(XAJAX_FUNCTION, array('cariskk',&$this,'cariskk'));                
        $this->xajax->register(XAJAX_FUNCTION, array('cariotokodeskk',&$this,'cariotokodeskk'));                
        $this->xajax->processRequest();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['dataunit'] = $this->unit_model->getdataunit(''); 
        $data['datajabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['datakpi'] = $this->m_skk->getdatakpi(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('skk/v_skk', $data);
    }

    function simpanskk($tahun,$unit,$jabatan,$kpi,$jan,$feb,$mar,$apr,$mei,$jun,$jul,$agt,$sep,$okt,$nov,$des){
        $objResponse = new xajaxResponse();
        if (($tahun=='') or ($unit=='') or ($jabatan=='') or ($kpi=='') or ($jan=='') or ($feb=='') or ($mar=='') or ($apr=='') or ($mei=='') or ($jun=='') or ($jul=='') or ($agt=='') or ($sep=='') or ($okt=='') or ($nov=='') or ($des=='')){
            $objResponse->script("alert('Mohon Cek Kembali, Ada Data Yang Masih Kosong !')");
        } else {
            $data = $this->m_skk->simpanskk($tahun,$unit,$jabatan,$kpi,$jan,$feb,$mar,$apr,$mei,$jun,$jul,$agt,$sep,$okt,$nov,$des);
            if ($data>0) {
                $objResponse->Assign("alert","innerHTML", succ_msg("Target SKK Berhasil Disimpan"));
            } elseif($data==-1) {
                $objResponse->script("alert('Data Sudah Ada Di Database, Silahkan Cek Di Report!')");
            } elseif($data==0) {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function cariskk($tahun,$unit,$jabatan){
        $objResponse = new xajaxResponse();
        $data = $this->m_skk->cariskk($tahun,$unit,$jabatan); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kpi."</td>
                                <td>".$row->namakpi."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->jan."</td>
                                <td>".$row->feb."</td>
                                <td>".$row->mar."</td>
                                <td>".$row->apr."</td>
                                <td>".$row->mei."</td>
                                <td>".$row->jun."</td>
                                <td>".$row->jul."</td>
                                <td>".$row->agt."</td>
                                <td>".$row->sep."</td>
                                <td>".$row->okt."</td>
                                <td>".$row->nov."</td>
                                <td>".$row->des."</td>                                                                
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editskk(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#hapusskk".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("reportskk","innerHTML",$html);
        return $objResponse;
    }

    function cetakskk($tahun,$unit,$jabatan) {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_skk->cetakskk($tahun,$unit,$jabatan);
         $this->load->view('skk\cetakskk', $data);
    }

// =================================================================realisasi SKK
    function realisasi() {
        $data['title'] = 'Realisasi SKK';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanrealisasi',&$this,'simpanrealisasi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('caritargetskk',&$this,'caritargetskk'));                
        $this->xajax->register(XAJAX_FUNCTION, array('carirealisasi',&$this,'carirealisasi'));                
        $this->xajax->register(XAJAX_FUNCTION, array('entryrealisasi',&$this,'entryrealisasi'));                
        $this->xajax->processRequest();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['dataunit'] = $this->unit_model->getdataunit(''); 
        $data['datajabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['datakpi1'] = $this->m_skk->getdatakpi(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('skk/v_realisasi', $data);
    }

    function caritargetskk($tahun,$unit,$jabatan){
        $objResponse = new xajaxResponse();
        $data = $this->m_skk->caritargetskk($tahun,$unit,$jabatan); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kpi."</td>
                                <td>".$row->namakpi."</td>
                                <td>".$row->deskripsi."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->rollup."</td>
                                <td>".$row->periode."</td>
                                <td>".$row->jan."</td>
                                <td>".$row->feb."</td>
                                <td>".$row->mar."</td>
                                <td>".$row->apr."</td>
                                <td>".$row->mei."</td>
                                <td>".$row->jun."</td>
                                <td>".$row->jul."</td>
                                <td>".$row->agt."</td>
                                <td>".$row->sep."</td>
                                <td>".$row->okt."</td>
                                <td>".$row->nov."</td>
                                <td>".$row->des."</td>                                                                
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick='entryrealisasi(".$row->noindex.")'><i class='icon-edit'></i> Entry </a>
<!--                                    <a data-toggle='modal' href='#hapusskk".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> -->
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("targetskk","innerHTML",$html);
        return $objResponse;
    }

    function entryrealisasi($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->m_skk->gettargetskk($noindex);
        if($data<>null){
            foreach ($data as $row) {
                $unit=$row->unit;
                $tahun=$row->tahun;
                $jabatan=$row->jabatan;
                $kpi=$row->kpi;
                $objResponse->Assign("kodekpi","value",$row->kpi);            
                $objResponse->Assign("namakpi","value",$row->namakpi);
                $objResponse->Assign("deskripsi","value",$row->deskripsi);
                $objResponse->Assign("satuan","value",$row->satuan);
                $objResponse->Assign("rollup","value",$row->rollup);
                $objResponse->Assign("periode","value",$row->periode);           

                $objResponse->Assign("jan1","value",$row->jan);            
                $objResponse->Assign("feb1","value",$row->feb);
                $objResponse->Assign("mar1","value",$row->mar);
                $objResponse->Assign("apr1","value",$row->apr);
                $objResponse->Assign("mei1","value",$row->mei);
                $objResponse->Assign("jun1","value",$row->jun);                        
                $objResponse->Assign("jul1","value",$row->jul);            
                $objResponse->Assign("agt1","value",$row->agt);
                $objResponse->Assign("sep1","value",$row->sep);
                $objResponse->Assign("okt1","value",$row->okt);
                $objResponse->Assign("nov1","value",$row->nov);
                $objResponse->Assign("des1","value",$row->des);                                    
            }
        }else{
                $objResponse->Assign("kodekpi","value",'');            
                $objResponse->Assign("namakpi","value",'');
                $objResponse->Assign("deskripsi","value",'');
                $objResponse->Assign("satuan","value",'');
                $objResponse->Assign("rollup","value",'');
                $objResponse->Assign("periode","value",'');                       

                $objResponse->Assign("jan1","value",'');            
                $objResponse->Assign("feb1","value",'');
                $objResponse->Assign("mar1","value",'');
                $objResponse->Assign("apr1","value",'');
                $objResponse->Assign("mei1","value",'');
                $objResponse->Assign("jun1","value",'');                        
                $objResponse->Assign("jul1","value",'');            
                $objResponse->Assign("agt1","value",'');
                $objResponse->Assign("sep1","value",'');
                $objResponse->Assign("okt1","value",'');
                $objResponse->Assign("nov1","value",'');
                $objResponse->Assign("des1","value",'');                                                                           
        }

        $data1 = $this->m_skk->getrealisasiskk($unit,$tahun,$jabatan,$kpi);
        if ($data1<>null){
            foreach ($data1 as $row) {
                $objResponse->Assign("jan2","value",$row->jan);            
                $objResponse->Assign("feb2","value",$row->feb);
                $objResponse->Assign("mar2","value",$row->mar);
                $objResponse->Assign("apr2","value",$row->apr);
                $objResponse->Assign("mei2","value",$row->mei);
                $objResponse->Assign("jun2","value",$row->jun);                        
                $objResponse->Assign("jul2","value",$row->jul);            
                $objResponse->Assign("agt2","value",$row->agt);
                $objResponse->Assign("sep2","value",$row->sep);
                $objResponse->Assign("okt2","value",$row->okt);
                $objResponse->Assign("nov2","value",$row->nov);
                $objResponse->Assign("des2","value",$row->des);                                               
            }
        }else{
                $objResponse->Assign("jan2","value",'');            
                $objResponse->Assign("feb2","value",'');
                $objResponse->Assign("mar2","value",'');
                $objResponse->Assign("apr2","value",'');
                $objResponse->Assign("mei2","value",'');
                $objResponse->Assign("jun2","value",'');                        
                $objResponse->Assign("jul2","value",'');            
                $objResponse->Assign("agt2","value",'');
                $objResponse->Assign("sep2","value",'');
                $objResponse->Assign("okt2","value",'');
                $objResponse->Assign("nov2","value",'');
                $objResponse->Assign("des2","value",'');                                                           
        }

        return $objResponse;
    }

    function simpanrealisasi($tahun,$unit,$jabatan,$kpi,$jan,$feb,$mar,$apr,$mei,$jun,$jul,$agt,$sep,$okt,$nov,$des){
        $objResponse = new xajaxResponse();
        if (($tahun=='') or ($unit=='') or ($jabatan=='') or ($kpi=='') or ($jan=='') or ($feb=='') or ($mar=='') or ($apr=='') or ($mei=='') or ($jun=='') or ($jul=='') or ($agt=='') or ($sep=='') or ($okt=='') or ($nov=='') or ($des=='')){
            $objResponse->script("alert('Mohon Cek Kembali, Ada Data Yang Masih Kosong !')");
        } else {
            $data = $this->m_skk->simpanrealisasi($tahun,$unit,$jabatan,$kpi,$jan,$feb,$mar,$apr,$mei,$jun,$jul,$agt,$sep,$okt,$nov,$des);
            if ($data>0) {
                $objResponse->Assign("alert","innerHTML", succ_msg("Realisasi SKK Berhasil Disimpan"));
            } elseif($data==-1) {
                $objResponse->script("alert('Data Sudah Ada Di Database, Silahkan Cek Di Report!')");
            } elseif($data==0) {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function carirealisasi($tahun,$unit,$jabatan){
        $objResponse = new xajaxResponse();
        $data = $this->m_skk->carirealisasi($tahun,$unit,$jabatan); 
        $html='';        
        if (count($data)>0) {             
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->ket6."</td>
                                <td>".$row->ket7."</td>                                
                                <td>".$row->ket8."</td>
                                <td>".$row->ket25."</td>
                                <td>".$row->ket9."</td>
                                <td>".$row->ket10."</td>
                                <td>".$row->ket11."</td>
                                <td>".$row->ket12."</td>
                                <td>".$row->ket13."</td>
                                <td>".$row->ket14."</td>
                                <td>".$row->ket15."</td>
                                <td>".$row->ket16."</td>
                                <td>".$row->ket17."</td>
                                <td>".$row->ket18."</td>
                                <td>".$row->ket19."</td>
                                <td>".$row->ket20."</td>
                                <td>".$row->ket21."</td>
                                <td>".$row->ket22."</td>
                                <td>".$row->ket23."</td>                                                                
<!--                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editskk(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#hapusskk".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
                                </td> -->
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("reportrealisasi","innerHTML",$html);
        return $objResponse;
    }

    function cetakrealisasi() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_skk->cetakrealisasi();
         $this->load->view('skk\cetakrealisasi', $data);
    }

// =================================================================hitung SKK
    function hitungskk() {
        $data['title'] = 'Hitung SKK';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanrealisasi',&$this,'simpanrealisasi'));   
        $this->xajax->register(XAJAX_FUNCTION, array('caritargetskk',&$this,'caritargetskk'));                
        $this->xajax->register(XAJAX_FUNCTION, array('carirealisasi',&$this,'carirealisasi'));                
        $this->xajax->register(XAJAX_FUNCTION, array('hitung',&$this,'hitung'));                
        $this->xajax->register(XAJAX_FUNCTION, array('carireporthasilskk',&$this,'carireporthasilskk'));                
        $this->xajax->processRequest();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['dataunit'] = $this->unit_model->getdataunit(''); 
        $data['datajabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['datakpi1'] = $this->m_skk->getdatakpi(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('skk/v_hitungskk', $data);
    }

    function hitung($tahun,$bulan,$unit,$jabatan){
        $objResponse = new xajaxResponse();
        $data = $this->m_skk->hitung($tahun,$bulan,$unit,$jabatan); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodekpi."</td>
                                <td>".$row->kpi."</td>
                                <td>".$row->polarisasi."</td>
                                <td>".$row->satuan."</td>
                                <td>".$row->target."</td>
                                <td>".$row->realisasi."</td>
                                <td>".number_format($row->indekcapaiankpi, 2, ',', '.')."</td>
                                <td>".$row->indekkpi."</td>
                                <td>".number_format($row->nkp, 2, ',', '.')."</td>                                
<!--                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick='entryrealisasi(".$row->noindex.")'><i class='icon-edit'></i> Entry </a> -->
<!--                                    <a data-toggle='modal' href='#hapusskk".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> -->
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("hitungskk","innerHTML",$html);
        return $objResponse;
    }

    function carireporthasilskk($tahun,$bulan,$unit,$jabatan){
        $objResponse = new xajaxResponse();
        $data = $this->m_skk->carireporthasilskk($tahun,$bulan,$unit,$jabatan); 
        $html='';        
        if (count($data)>0) {             
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->ket5."</td>
                                <td>".$row->ket6."</td>
                                <td>".$row->ket7."</td>
                                <td>".$row->ket8."</td>
                                <td>".$row->ket9."</td>
                                <td>".$row->ket10."</td>
                                <td>".number_format($row->ket11, 2, ',', '.')."</td>
                                <td>".$row->ket12."</td>
                                <td>".number_format($row->ket13, 2, ',', '.')."</td>                                
<!--                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick='entryrealisasi(".$row->noindex.")'><i class='icon-edit'></i> Entry </a> -->
<!--                                    <a data-toggle='modal' href='#hapusskk".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> -->
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("reporthitungskk","innerHTML",$html);
        return $objResponse;
    }

    // function cetakhasilskk($tahun,$bulan,$unit,$jabatan){
    function cetakhasilskk(){
      $this->load->library('fpdf');
      define('FPDF_FONTPATH',$this->config->item('fonts_path'));
      // $data['dataku'] = $this->m_skk->cetakhasilskk($tahun,$bulan,$unit,$jabatan);
      $data['dataku'] = $this->m_skk->cetakhasilskk();
      $this->load->view('skk\cetakhasilskk',$data);
    }

    // function simpandetskk($noindex,$tahun,$unit,$jabatan,$kpi,$skkbln,$skksmt,$skkthn){
    //     $objResponse = new xajaxResponse();
    //     if (($tahun=='') or ($unit=='')){
    //         $objResponse->script("alert('Semua data harus di isi !')");
    //     } else {
    //         $data = $this->m_skk->simpandetskk($noindex,$tahun,$unit,$jabatan,$kpi,$skkbln,$skksmt,$skkthn);
    //         if ($data>0) {
    //             // $objResponse->Assign("alert","innerHTML", succ_msg("skk ".$kpi." Berhasil Disimpan"));
    //             // $objResponse->script("$('#tambah').modal('hide')");
    //             $objResponse->Assign("tahun","value","");
    //             $objResponse->Assign("unit","value","");
    //             $objResponse->Assign("jabatan","value","");
    //             $objResponse->Assign("kpi","value","");
    //             $objResponse->Assign("skkbln","value","");
    //             $objResponse->Assign("skksmt","value","");
    //             $objResponse->Assign("skkthn","value","");
    //             $html = '';
    //             $total=0;
    //             // $data = $this->m_skk->getdataskk(''); 
    //                 $totalbln=0;
    //                 $totalsmt=0;
    //                 $totalthn=0;                
    //             foreach ($data as $row) {
    //                 $totalbln=$totalbln+$row->ket8;
    //                 $totalsmt=$totalsmt+$row->ket9;
    //                 $totalthn=$totalthn+$row->ket10;
    //                 $html = $html."<tr>
    //                                 <td>".$row->ket1."</td>
    //                                 <td>".$row->ket3."</td>
    //                                 <td>".$row->ket5."</td>
    //                                 <td>".$row->ket7."</td>
    //                                 <td>".$row->ket8."</td>
    //                                 <td>".$row->ket9."</td>
    //                                 <td>".$row->ket10."</td>
    //                                 <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editskk(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
    //                                     <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusskk(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>                                        
    //                                 </td>
    //                             </tr>";
    //             }
    //                 $html = $html."<tr>
    //                                 <td colspan='4' align='center'>".'Total'."</td>
    //                                 <td>".$totalbln."</td>
    //                                 <td>".$totalsmt."</td>
    //                                 <td>".$totalthn."</td>
    //                                 <td></td>
    //                             </tr>";                
    //             $objResponse->Assign("skk","innerHTML",$html);

    //         } else {
    //             $objResponse->script("alert('Data Gagal Disimpan')");
    //         }
    //     }
    //     return $objResponse;
    // }
   
    // function getdataskk($nama){
    //     $html='';
    //     $objResponse = new xajaxResponse();
    //     $data = $this->m_skk->getdataskk($nama);
    //     if (count($data)>0) {
    //         foreach ($data as $row) {
    //             $edit = "<a href='".base_url()."skk/editskk/".$row->noindex."'>Edit</a>";
    //             $delete = "<a href='".base_url()."skk/hapusskk/".$row->noindex."'>Hapus</a>";
    //             $html = $html."<tr>
    //                             <td>".$row->kodeskk."</td>
    //                             <td>".$row->skk."</td>
    //                             <td>".$row->deskripsi."</td>
    //                             <td>".$row->satuan."</td>
    //                             <td>".$row->rollup."</td>
    //                             <td>".$row->polarisasi."</td>
    //                             <td>".$row->periode."</td>
    //                             <td>".$row->formula."</td>
    //                             <td>".$row->tglupdate."</td>
    //                             <td>".$edit."</td>
    //                             <td>".$delete."</td>
    //                            </tr>";
    //         }
    //         $objResponse->Assign("skk","innerHTML",$html);
    //     } else {
    //         $objResponse->script("alert('Data Tidak Ada')");
    //     }
    //     return $objResponse;
    // }

    // function editskk($noindex){
    //     $objResponse = new xajaxResponse();
    //     $data = $this->m_skk->getskkbykskk($noindex);
    //     foreach ($data as $row) {
    //         $objResponse->Assign("tahun","value",$row->ket1);            
    //         $objResponse->Assign("unit","value",$row->ket2);
    //         $objResponse->Assign("jabatan","value",$row->ket4);
    //         $objResponse->Assign("kpi","value",$row->ket6);
    //         $objResponse->Assign("skkbln","value",$row->ket8);
    //         $objResponse->Assign("skksmt","value",$row->ket9);            
    //         $objResponse->Assign("skkthn","value",$row->ket10);
    //         $objResponse->Assign("noindex","value",$row->noindex);
    //     }
    //     return $objResponse;
    // }

    // function hapusskk($noindex){
    //     $objResponse = new xajaxResponse();
    //     // if (($tahun=='') or ($unit=='')){
    //     //     $objResponse->script("alert('Semua data harus di isi !')");
    //     // } else {
    //         $data = $this->m_skk->hapusskk($noindex);
    //         if ($data>0) {
    //             $objResponse->Assign("tahun","value","");
    //             $objResponse->Assign("unit","value","");
    //             $objResponse->Assign("jabatan","value","");
    //             $objResponse->Assign("kpi","value","");
    //             $objResponse->Assign("skkbln","value","");
    //             $objResponse->Assign("skksmt","value","");
    //             $objResponse->Assign("skkthn","value","");
    //             $html = '';
    //             $totalbln=0;
    //             $totalsmt=0;
    //             $totalthn=0;                                
    //             foreach ($data as $row) {
    //                 $totalbln=$totalbln+$row->ket8;
    //                 $totalsmt=$totalsmt+$row->ket9;
    //                 $totalthn=$totalthn+$row->ket10;                    
    //                 $html = $html."<tr>
    //                                 <td>".$row->ket1."</td>
    //                                 <td>".$row->ket3."</td>
    //                                 <td>".$row->ket5."</td>
    //                                 <td>".$row->ket7."</td>
    //                                 <td>".$row->ket8."</td>
    //                                 <td>".$row->ket9."</td>
    //                                 <td>".$row->ket10."</td>
    //                                 <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editskk(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
    //                                     <a class='btn mini red sbold' data-toggle='modal' href='#delete' onClick='hapusskk(".$row->noindex.")'><i class='icon-trash'></i> Hapus </a>                                        
    //                                 </td>
    //                             </tr>";
    //             }
    //                 $html = $html."<tr>
    //                                 <td colspan='4' align='center'>".'Total'."</td>
    //                                 <td>".$totalbln."</td>
    //                                 <td>".$totalsmt."</td>
    //                                 <td>".$totalthn."</td>
    //                                 <td></td>
    //                             </tr>";                 
    //             $objResponse->Assign("skk","innerHTML",$html);
    //         } else {
    //             $objResponse->script("alert('Data Gagal Disimpan')");
    //         }
    //     // }
    //     return $objResponse;
    // }

    // function updateskk($noindex1,$kelompok1,$kodeskk1,$namaskk1,$deskripsi1,$target1,$satuan1,$rollup1,$polarisasi1,$periode1,$formula1){
    //     $objResponse = new xajaxResponse();
    //     $data = $this->m_skk->updateskk($noindex1,$kelompok1,$kodeskk1,$namaskk1,$deskripsi1,$target1,$satuan1,$rollup1,$polarisasi1,$periode1,$formula1);
    //     if ($data>0) {
    //         $objResponse->script("alert('Edit Berhasil')");
    //         $objResponse->script("$('#edit').modal('hide')");
    //         $objResponse->Assign("kelompok1","value","");
    //         $objResponse->Assign("kodeskk1","value","");
    //         $objResponse->Assign("namaskk1","value","");
    //         $objResponse->Assign("deskripsi1","value","");
    //         $objResponse->Assign("target1","value","");            
    //         $objResponse->Assign("satuan1","value","");
    //         $objResponse->Assign("rollup1","value","");
    //         $objResponse->Assign("polarisasi1","value","");
    //         $objResponse->Assign("periode1","value","");
    //         $objResponse->Assign("formula1","value","");                        
    //         $html='';
    //         $data = $this->m_skk->getdataskk('');
    //         foreach ($data as $row) {
    //             $html = $html."<tr>
    //                             <td>".$row->kodeskk."</td>
    //                             <td>".$row->skk."</td>
    //                             <td>".$row->deskripsi."</td>
    //                             <td>".$row->satuan."</td>
    //                             <td>".$row->rollup."</td>
    //                             <td>".$row->polarisasi."</td>
    //                             <td>".$row->periode."</td>
    //                             <td>".$row->formula."</td>
    //                             <td>".$row->tglupdate."</td>
    //                             <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editskk(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
    //                                 <a data-toggle='modal' href='#hapusskk".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
    //                             </td>
    //                         </tr>";
    //         }
    //         $objResponse->Assign("skk","innerHTML",$html);
    //     } else {
    //         $objResponse->script("alert('Data skk ".$noindex." - ".$namaskk1." Gagal Di Update')");
    //     }
    //     return $objResponse;
    // }

    // function deleteskk($noindex2,$kelompok2,$kodeskk2,$namaskk2,$deskripsi2,$target2,$satuan2,$rollup2,$polarisasi2,$periode2,$formula2){
    //     $objResponse = new xajaxResponse();
    //     $data = $this->m_skk->deleteskk($noindex2,$kelompok2,$kodeskk2,$namaskk2,$deskripsi2,$target2,$satuan2,$rollup2,$polarisasi2,$periode2,$formula2);
    //     if ($data>0) {
    //         $objResponse->script("alert('Hapus Berhasil')");
    //         $objResponse->script("$('#delete').modal('hide')");
    //         $objResponse->Assign("kelompok2","value","");
    //         $objResponse->Assign("kodeskk2","value","");
    //         $objResponse->Assign("namaskk2","value","");
    //         $objResponse->Assign("deskripsi2","value","");
    //         $objResponse->Assign("target2","value","");            
    //         $objResponse->Assign("satuan2","value","");
    //         $objResponse->Assign("rollup2","value","");
    //         $objResponse->Assign("polarisasi2","value","");
    //         $objResponse->Assign("periode2","value","");
    //         $objResponse->Assign("formula2","value","");                        
    //         $html='';
    //         $data = $this->m_skk->getdataskk('');
    //         foreach ($data as $row) {
    //             $html = $html."<tr>
    //                             <td>".$row->kodeskk."</td>
    //                             <td>".$row->skk."</td>
    //                             <td>".$row->deskripsi."</td>
    //                             <td>".$row->satuan."</td>
    //                             <td>".$row->rollup."</td>
    //                             <td>".$row->polarisasi."</td>
    //                             <td>".$row->periode."</td>
    //                             <td>".$row->formula."</td>
    //                             <td>".$row->tglupdate."</td>
    //                             <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editskk(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
    //                                 <a data-toggle='modal' href='#hapusskk".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a>
    //                             </td>
    //                         </tr>";
    //         }
    //         $objResponse->Assign("skk","innerHTML",$html);
    //     } else {
    //         $objResponse->script("alert('Data skk ".$kodeskk2." - ".$namaskk2." Gagal Di Hapus')");
    //     }
    //     return $objResponse;
    // }  

    // function cariotokodeskk($kelompok){
    //     $objResponse = new xajaxResponse();
    //     $data = $this->m_skk->cariotokodeskk($kelompok);
    //     foreach ($data as $row) {
    //         $objResponse->Assign("kodeskk","value",$row->kode);
    //     }
    //     return $objResponse;
    // }


}
?>