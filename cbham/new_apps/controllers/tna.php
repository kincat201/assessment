<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tna extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('jabatan_model');
        $this->load->model('tna_model');        
        $this->load->model('unit_model');
        $this->load->model('pegawai_model');
    }

    function index() {
        $data['title'] = 'Training Need Analysis';
        $this->xajax->register(XAJAX_FUNCTION, array('simpantna',&$this,'simpantna'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editjabatan',&$this,'editjabatan')); 
        $this->xajax->register(XAJAX_FUNCTION, array('updatejabatan',&$this,'updatejabatan'));    
        $this->xajax->register(XAJAX_FUNCTION, array('carijabatan',&$this,'carijabatan'));            
        $this->xajax->register(XAJAX_FUNCTION, array('caripegawai',&$this,'caripegawai'));            
        $this->xajax->register(XAJAX_FUNCTION, array('caripms',&$this,'caripms'));            
        $this->xajax->register(XAJAX_FUNCTION, array('caritna',&$this,'caritna'));            
        $this->xajax->processRequest();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','',''); 
        $data['dataunit'] = $this->unit_model->getdataunit(''); 
        $data['datajabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('tna/v_tna', $data);
    }

    function pegawaiList($unit){
        $id     =   $this->input->post('id');          // The id of the input that submitted the request.
        $data   =   $this->input->post('data');        // The value of the textbox.        
        if ($id && $data)
        {
            $empRec = $this->tna_model->getpegawaiList($unit);
            $dataList = array();
            if(sizeof($empRec)>0)
            {
                foreach($empRec as $row)
                {
                   $dataList[] = '<li id="' .$row->nik. '"><a href="#">'.htmlentities($row->nama).'</a></li>';              
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

    function caripegawai($unit){
        $objResponse = new xajaxResponse();
        $html2 = '';
        $data1= $this->tna_model->caripegawai($unit);
        if($data1<>0){
            if(sizeof($data1)>0){
                foreach($data1 as $row)
                {
                    $html2 = $html2."<option value=".$row->nik.">".$row->nama."</option>";
                }
                $objResponse->Assign("nama","innerHTML", $html2);
            }
        }  
        return $objResponse;
    }

    function caripms($nama){
        $objResponse = new xajaxResponse();
        $html2 = '';
        $data1= $this->tna_model->caripms($nama);
        if($data1<>0){
            if(sizeof($data1)>0){
                foreach($data1 as $row)
                {
                    $kom='Kekuatan : '.$row->kekuatan.', Kelemahan : '.$row->kelemahan;
                    $kin='Kekuatan : '.$row->kekuatanpms.', Kelemahan : '.$row->kelemahanpms;
                }                
               $objResponse->Assign("kom","value",$kom);
               $objResponse->Assign("kin","value",$kin);                
            }
        }  
        return $objResponse;
    }

    function simpantna($unit,$nama,$kom,$kin,$aud,$bip,$dir,$tahun,$periode){
        $objResponse = new xajaxResponse();
        if (($nama=='')||($unit=='')){
            $objResponse->script("alert('Unit atau nama mohon dilengkapi !')");
        } else {
            $data = $this->tna_model->simpantna($unit,$nama,$kom,$kin,$aud,$bip,$dir,$tahun,$periode);
            if ($data>0) {                
                $objResponse->Assign("alert","innerHTML", succ_msg("Training Need Analysis ".$nama." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("unit","value","");
                $objResponse->Assign("nama","value","");
                $objResponse->Assign("kom","value","");
                $objResponse->Assign("kin","value","");
                $objResponse->Assign("aud","value","");
                $objResponse->Assign("bip","value","");
                $objResponse->Assign("dir","value","");
                $objResponse->Assign("tahun","value","");
                $objResponse->Assign("periode","value","");
                $html = '';
                // $data = $this->jabatan_model->getdatajabatan(''); 
                // foreach ($data as $row) {
                //     $html = $html."<tr>
                //                     <td>".$row->kojab."</td>
                //                     <td>".$row->namajabatan."</td>
                //                     <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editjabatan(".$row->kojab.")'><i class='icon-edit'></i> Edit </a>
                //                         <a data-toggle='modal' href='#delete".$row->kojab."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> 
                //                     </td>
                //                 </tr>";
                // }
                // $objResponse->Assign("jabatan","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function caritna($tahun,$periode,$unit){
        $objResponse = new xajaxResponse();
        $data = $this->tna_model->caritna($tahun,$periode,$unit); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->namaunit."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->nik."</td>
                                <td>".$row->namajab."</td>
                                <td>".$row->kom."</td>
                                <td>".$row->kin."</td>
                                <td>".$row->aud."</td>
                                <td>".$row->bip."</td>
                                <td>".$row->dir."</td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("tna","innerHTML",$html);
        return $objResponse;
    }

    function cetaktna($tahun,$periode,$unit) {
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        // $unitx=str_replace(' ', '_', $unit);
        $data['dataku'] = $this->tna_model->caritna($tahun,$periode,$unit);
        $this->load->view('tna\cetaktna',$data);
    }

    function carijabatan($nama){
        $objResponse = new xajaxResponse();
        $data = $this->jabatan_model->carijabatan($nama); 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kojab."</td>
                                <td>".$row->namajabatan."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editjabatan(".$row->kojab.")'><i class='icon-edit'></i> Edit </a>
                                        <a data-toggle='modal' href='#delete".$row->kojab."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> 
                                    </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("jabatan","innerHTML",$html);
        return $objResponse;
    }

    function getdatajabatan($nama){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->jabatan_model->getdatajabatan($nama);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."jabatan/editjabatan/".$row->kojab."'>Edit</a>";
                $delete = "<a href='".base_url()."jabatan/deletejabatan/".$row->kojab."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->kojab."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$edit."</td>
                               </tr>";
            }
            $objResponse->Assign("jabatan","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editjabatan($kojab){
        $objResponse = new xajaxResponse();
        $data = $this->jabatan_model->getjabatanbykojab($kojab);
        foreach ($data as $row) {
            $objResponse->Assign("kojab","value",$row->kojab);
            $objResponse->Assign("namajabatan","value",$row->namajabatan);
        }
        return $objResponse;
    }

    function updatejabatan($kojab,$nama){
        $objResponse = new xajaxResponse();
        $data = $this->jabatan_model->updatejabatan($kojab,$nama);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("kojab","value","");
            $objResponse->Assign("nama","value","");
            $html='';
            $data = $this->jabatan_model->getdatajabatan('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kojab."</td>
                                <td>".$row->namajabatan."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editjabatan(".$row->kojab.")'><i class='icon-edit'></i> Edit </a>
                                    <a data-toggle='modal' href='#delete".$row->kojab."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> 
                                </td>
                            </tr>";
            }
            $objResponse->Assign("jabatan","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data jabatan ".$kojab." - ".$nama." Gagal Di Update')");
        }
        return $objResponse;
    }

    function strukturjabatan() {
        $data['title'] = 'Struktur Jabatan';
        $this->xajax->register(XAJAX_FUNCTION, array('tambahstruktur',&$this,'tambahstruktur'));   
        $this->xajax->register(XAJAX_FUNCTION, array('getstruktur',&$this,'getstruktur'));          
        $this->xajax->processRequest();
        $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/strukturjabatan', $data);
    }

    function getstruktur($jabatan){
        $objResponse = new xajaxResponse();
        $html = '';
        $data = $this->jabatan_model->getstruktur($jabatan); 
        if(count($data)>0){
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kojab."</td>
                                <td>".$row->namajabatan."</td>
                                <td>
                                    <a data-toggle='modal' href='#delete".$row->kojab."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> 
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Underline Belum Ada</td></tr>";
        }
        $objResponse->Assign("jabatan","innerHTML",$html);
        return $objResponse;
    }
  
    function tambahstruktur($jabatan1,$jabatan2){
        $objResponse = new xajaxResponse();
        if ($jabatan1=='' || $jabatan2=='') {
            $objResponse->script("alert('Jabatan/Underline Belum Di Pilih !')");
        } else {
            $data = $this->jabatan_model->tambahstruktur($jabatan1,$jabatan2);
            if ($data>0) {
                $objResponse->Assign("alert","innerHTML", succ_msg("Underline Berhasil Ditambahkan"));
                $objResponse->Assign("jabatan2","value","");
                $html = '';
                $data = $this->jabatan_model->getstruktur($jabatan1); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->kojab."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td>
                                        <a data-toggle='modal' href='#delete".$row->kojab."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> 
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("jabatan","innerHTML",$html);
            } else {
                $objResponse->script("alert('Underline Gagal Ditambahkan')");
            }
        }
        return $objResponse;
    }

    function training() {
        $data['title'] = 'Program Training';
        $this->xajax->register(XAJAX_FUNCTION, array('simpantraining',&$this,'simpantraining'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editjabatan',&$this,'editjabatan')); 
        $this->xajax->register(XAJAX_FUNCTION, array('edittraining',&$this,'edittraining'));    
        $this->xajax->register(XAJAX_FUNCTION, array('carijabatan',&$this,'carijabatan'));            
        $this->xajax->register(XAJAX_FUNCTION, array('caripegawai',&$this,'caripegawai'));            
        $this->xajax->register(XAJAX_FUNCTION, array('updatetraining',&$this,'updatetraining'));            
        $this->xajax->register(XAJAX_FUNCTION, array('caritraining',&$this,'caritraining'));   
        $this->xajax->register(XAJAX_FUNCTION, array('getpeserta',&$this,'getpeserta')); 
        $this->xajax->register(XAJAX_FUNCTION, array('tambahpeserta',&$this,'tambahpeserta'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapuspeserta',&$this,'hapuspeserta')); 
        $this->xajax->register(XAJAX_FUNCTION, array('hapustraining',&$this,'hapustraining'));          
        $this->xajax->processRequest();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','','');         
        $data['dataunit'] = $this->unit_model->getdataunit(''); 
        $data['datajabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('tna/training', $data);
    }

    function getpeserta($kodetna,$tahun,$periode){
        $objResponse = new xajaxResponse();
        $data1 = $this->tna_model->getpeserta($kodetna,$tahun,$periode);
        if(count($data1)>0){
            $html = '';
            foreach($data1 as $row)
            {
                $html = $html."<option value='".$row->nik."'>".$row->nama."</option>";
            }
            $objResponse->Assign("peserta","innerHTML", $html);
        }
        $data2 = $this->tna_model->getnotraining($kodetna);
        $objResponse->Assign("notraining","value", $data2);
        return $objResponse;
    }

     function tambahpeserta($notraining,$nik){
        $objResponse = new xajaxResponse();
        if ($nik=='' or $nik==0 ) {
            if ($nik=='' or $nik==0) {
                $objResponse->script("alert('Peserta belum dipilih !')");
            } 
        } else {
            $data = $this->tna_model->tambahpeserta($notraining,$nik);
            $html = '';
            if (count($data)>0 and $data!='Sudah Ada') {
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->nik."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->namaunit."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td><a class='btn mini red sbold' href='#' onClick=hapuspeserta('".$row->notraining."','".trim($row->nik)."')><i class='icon-trash'></i> Hapus </a></td>
                                </tr>";
                }
                $objResponse->Assign("datapeserta","innerHTML",$html);
            } else {
                $objResponse->script("alert('Peserta Sudah Dipilih !')");
            }
        }
        return $objResponse;
    }

    function hapuspeserta($notraining,$nik){
        $objResponse = new xajaxResponse();
        $data = $this->tna_model->hapuspeserta($notraining,$nik);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->nik."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$row->namajabatan."</td>
                                <td><a class='btn mini red sbold' href='#' onClick=hapuspeserta('".$row->notraining."','".trim($row->nik)."')><i class='icon-trash'></i> Hapus </a></td>
                            </tr>";
            }
            $objResponse->Assign("datapeserta","innerHTML",$html);
        } else {
            $objResponse->Assign("datapeserta","innerHTML",'');
        }
        return $objResponse;
    }

    function simpantraining($notraining,$namatraining,$kodetna,$tutor,$jadwal,$akhir,$biaya){
        $objResponse = new xajaxResponse();
        $cektampung = $this->tna_model->cektampungtraining($notraining);
        if ($cektampung<1) {
            $objResponse->script("alert('Peserta Training Belum DItambahkan')");
        } else {
            $data = $this->tna_model->simpantraining($notraining,$namatraining,$kodetna,$tutor,$jadwal,$akhir,$biaya);
            if ($data!=null) {
                $objResponse->script("alert('".$data." Gagal Di Simpan. Entry Kembali')");
            } else {
                $objResponse->script("alert('Training Berhasil Di Simpan')");
                $objResponse->script("kosong()");
            }
        }
        return $objResponse;
    }

    function caritraining($kode,$tgl1,$tgl2){
        $objResponse = new xajaxResponse();
        $data = $this->tna_model->caritraining($kode,$tgl1,$tgl2);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->notraining."</td>
                                <td>".$row->training."</td>
                                <td>".$row->kodetna."</td>
                                <td>".$row->tutor."</td>
                                <td>".date('d F Y',strtotime($row->mulai))." s/d ".date('d F Y',strtotime($row->akhir))."</td>
                                <td>".number_format($row->biaya,0,',','.')."</td>
                                <td align='center'>
                                    <a class='btn mini blue sbold' target='_blank' href='".base_url()."index.php/tna/cetaktraining/".$row->notraining."' ><i class='icon-print'></i> Cetak </a>
                                    <a class='btn mini yellow sbold' href='#' onClick=edittraining('".$row->notraining."')><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red sbold' href='#' onClick=hapustraining('".$row->notraining."')><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan=7>Data Training Tidak Ada</td></tr>";
        }
        $objResponse->Assign("tna","innerHTML",$html);
        return $objResponse;
    }

    function hapustraining($notraining,$kode,$tgl1,$tgl2){
        $objResponse = new xajaxResponse();
        $hapus = $this->tna_model->hapustraining($notraining);
        if ($hapus>0) {
            $objResponse->script("alert('Training Nomor ".$notraining." Berhasil Di Hapus')");
            $data = $this->tna_model->caritraining($kode,$tgl1,$tgl2);
            $html = '';
            if (count($data)>0) {
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->notraining."</td>
                                    <td>".$row->training."</td>
                                    <td>".$row->kodetna."</td>
                                    <td>".$row->tutor."</td>
                                    <td>".date('d F Y',strtotime($row->mulai))." s/d ".date('d F Y',strtotime($row->akhir))."</td>
                                    <td>".number_format($row->biaya,0,',','.')."</td>
                                    <td align='center'>
                                        <a class='btn mini blue sbold' target='_blank' href='".base_url()."index.php/tna/cetaktraining/".$row->notraining."' ><i class='icon-print'></i> Cetak </a>
                                        <a class='btn mini yellow sbold' href='#' onClick=edittraining('".$row->notraining."')><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red sbold' href='#' onClick=hapustraining('".$row->notraining."')><i class='icon-trash'></i> Hapus </a>
                                    </td>
                                </tr>";
                }
            } else {
                $html = $html."<tr><td colspan=7>Data Training Tidak Ada</td></tr>";
            }
        } else {
            $objResponse->script("alert('Hapus Gagal ! Coba Hapus Lagi !')");
        }
        $objResponse->Assign("tna","innerHTML",$html);
        return $objResponse;
    }

    function edittraining($notraining){
        $objResponse = new xajaxResponse();
        $value = $this->tna_model->caritrainingbynomor($notraining);
        $header = $value[0];
        foreach ($header as $row) {
            $notraining = $row->notraining;
            $kodetna = $row->kodetna;
            $objResponse->Assign("namatraining","value",strtoupper($row->training));
            $objResponse->Assign("notraining","value",$row->notraining);
            $objResponse->Assign("kodetna","value",$row->kodetna);
            $objResponse->Assign("biaya","value",$row->biaya);
            $objResponse->Assign("awal","value",$row->mulai);
            $objResponse->Assign("akhir","value",$row->akhir);
            $objResponse->Assign("tutor","value",strtoupper($row->tutor));
        }
        $detail = $value[1];
        foreach ($detail as $row1) {
            $data = $this->tna_model->tambahpeserta($notraining,$row1->nik);
            $html = '';
            foreach ($data as $row2) {
                $html = $html."<tr>
                                <td>".$row2->nik."</td>
                                <td>".$row2->nama."</td>
                                <td>".$row2->namaunit."</td>
                                <td>".$row2->namajabatan."</td>
                                <td><a class='btn mini red sbold' href='#' onClick=hapuspeserta('".$row2->notraining."','".trim($row2->nik)."')><i class='icon-trash'></i> Hapus </a></td>
                            </tr>";
            }
            $objResponse->Assign("datapeserta","innerHTML",$html);
        }
        $data1 = $this->tna_model->getpeserta($kodetna);
        if(count($data1)>0){
            $html = '';
            foreach($data1 as $row)
            {
                $html = $html."<option value='".$row->nik."'>".$row->nama."</option>";
            }
            $objResponse->Assign("peserta","innerHTML", $html);
        }
        $objResponse->script("$('#tab_1').addClass('active')");
        $objResponse->script("$('#tab_2').removeClass('active')");
        $objResponse->script("$('#li1').addClass('active')");
        $objResponse->script("$('#li2').removeClass('active')");
        $objResponse->Assign("kodetna","disabled",true);
        $objResponse->script("$('#update').show();");
        $objResponse->script("$('#simpan').hide();");
        return $objResponse;
    }

    function updatetraining($notraining,$namatraining,$kodetna,$tutor,$jadwal,$akhir,$biaya){
        $objResponse = new xajaxResponse();
        $cektampung = $this->tna_model->cektampungtraining($notraining);
        if ($cektampung<1) {
            $objResponse->script("alert('Peserta Training Belum DItambahkan')");
        } else {
            $data = $this->tna_model->updatetraining($notraining,$namatraining,$kodetna,$tutor,$jadwal,$akhir,$biaya);
            if ($data!=null) {
                $objResponse->script("alert('".$data." Gagal Di Update. Edit Kembali')");
            } else {
                $objResponse->script("alert('Training Berhasil Di Update')");
                $objResponse->script("kosong()");
            }
        }
        return $objResponse;
    }

    function cetaktraining($notraining){
      $this->load->library('fpdf');
      define('FPDF_FONTPATH',$this->config->item('fonts_path'));    
      $value = $this->tna_model->caritrainingbynomor($notraining);
      $data['header'] = $value[0];
      $data['detail'] = $value[1];
      $this->load->view('tna\cetaktraining',$data);
    }

    function evaluasitraining() {
        $data['title'] = 'Evaluasi Hasil Pelatihan';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanjabatan',&$this,'simpanjabatan'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editjabatan',&$this,'editjabatan')); 
        $this->xajax->register(XAJAX_FUNCTION, array('updatejabatan',&$this,'updatejabatan'));    
        $this->xajax->register(XAJAX_FUNCTION, array('carijabatan',&$this,'carijabatan'));            
        $this->xajax->register(XAJAX_FUNCTION, array('carinamapegawai',&$this,'carinamapegawai'));            
        $this->xajax->register(XAJAX_FUNCTION, array('simpankeefektifan',&$this,'simpankeefektifan'));                    
        $this->xajax->register(XAJAX_FUNCTION, array('caridettraining',&$this,'caridettraining'));                    
        $this->xajax->processRequest();
        $data['pegawai'] = $this->pegawai_model->getbawahan();         
        // $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        // $data['kelomjab'] = $this->jabatan_model->getkelomjabatan(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('tna/evaluasitraining', $data);
    }

    function carinamapegawai($nama){
        $objResponse = new xajaxResponse();
        $html2 = '';
        $data1= $this->tna_model->carinamapegawai($nama);
        if($data1<>0){
            if(sizeof($data1)>0){
                foreach($data1 as $row)
                {
                    $objResponse->Assign("nik","value", $row->nik);
                    $objResponse->Assign("jabatan","value", $row->namajabatan);
                    $objResponse->Assign("unit","value", $row->namaunit);                    
                }
                // $objResponse->Assign("nama","innerHTML", $html2);
            }
        }  
        return $objResponse;
    }

    function caridettraining($nama){
        $objResponse = new xajaxResponse();
        $html2 = '';
        $data1= $this->tna_model->caridettraining($nama);
        if($data1<>0){
            if(sizeof($data1)>0){
                foreach($data1 as $row)
                {
                    $objResponse->Assign("namapelatihan","value", $row->training);
                    $objResponse->Assign("tglpelatihan","value", $row->mulai);
                    $objResponse->Assign("instruktur","value", $row->tutor);                    
                    $objResponse->Assign("penyelenggara","value", $row->tutor);                    
                }
                // $objResponse->Assign("nama","innerHTML", $html2);
            }
        }  
        return $objResponse;
    }

function simpankeefektifan(
                    $nama,
                    $nik,
                    $jabatan,
                    $unit,
                    $namapelatihan,
                    $tglpelatihan,
                    $instruktur,
                    $penyelenggara,
                    $sikap,
                    $perilaku,
                    $totalperilaku,
                    $menghargai,
                    $totalmenghargai,
                    $semangat,
                    $totalsemangat,
                    $menerima,
                    $totalmenerima,
                    $tanggung,
                    $totaltanggung,
                    $pengetahuan,
                    $penambahan,
                    $totalpenambahan,
                    $polapikir,
                    $totalpolapikir,
                    $pengambilan,
                    $totalpengambilan,
                    $keaktifan,
                    $totalkeaktifan,
                    $percaya,
                    $totalpercaya,
                    $keterampilan,
                    $penguasaan,
                    $totalpenguasaan,
                    $peningkatan,
                    $totalpeningkatan,
                    $kualitas,
                    $totalkualitas,
                    $kecepatan,
                    $totalkecepatan,
                    $kreatifitas,
                    $totalkreatifitas,
                    $saransikap,
                    $saranpengetahuan,
                    $saranketerampilan
                    ){ 

         $html = '';
         $style = "odd";
         $value="NOK";

         $data = $this->tna_model->simpankeefektifan(
                                                $nama,
                                                $nik,
                                                $jabatan,
                                                $unit,
                                                $namapelatihan,
                                                $tglpelatihan,
                                                $instruktur,
                                                $penyelenggara,
                                                $sikap,
                                                $perilaku,
                                                $totalperilaku,
                                                $menghargai,
                                                $totalmenghargai,
                                                $semangat,
                                                $totalsemangat,
                                                $menerima,
                                                $totalmenerima,
                                                $tanggung,
                                                $totaltanggung,
                                                $pengetahuan,
                                                $penambahan,
                                                $totalpenambahan,
                                                $polapikir,
                                                $totalpolapikir,
                                                $pengambilan,
                                                $totalpengambilan,
                                                $keaktifan,
                                                $totalkeaktifan,
                                                $percaya,
                                                $totalpercaya,
                                                $keterampilan,
                                                $penguasaan,
                                                $totalpenguasaan,
                                                $peningkatan,
                                                $totalpeningkatan,
                                                $kualitas,
                                                $totalkualitas,
                                                $kecepatan,
                                                $totalkecepatan,
                                                $kreatifitas,
                                                $totalkreatifitas,
                                                $saransikap,
                                                $saranpengetahuan,
                                                $saranketerampilan
                                            );     
  if ($data=="OK"){
     $objResponse = new xajaxResponse();
     $objResponse->script("alert('Simpan Berhasil')"); 
    return $objResponse;  
  }else{
     $objResponse = new xajaxResponse();
     $objResponse->script("alert('Data sudah ada di database,tidak bisa disimpan ulang')");      
     return $objResponse;  
  } 

}

    function reportevaluasitraining() {
        $data['title'] = 'Report Evaluasi Hasil Pelatihan';
        $this->xajax->register(XAJAX_FUNCTION, array('carireportevaluasitraining',&$this,'carireportevaluasitraining'));   
        $this->xajax->register(XAJAX_FUNCTION, array('cetakreportevaluasitraining',&$this,'cetakreportevaluasitraining')); 
        // $this->xajax->register(XAJAX_FUNCTION, array('updatejabatan',&$this,'updatejabatan'));    
        // $this->xajax->register(XAJAX_FUNCTION, array('carijabatan',&$this,'carijabatan'));            
        // $this->xajax->register(XAJAX_FUNCTION, array('carinamapegawai',&$this,'carinamapegawai'));            
        // $this->xajax->register(XAJAX_FUNCTION, array('simpankeefektifan',&$this,'simpankeefektifan'));                    
        $this->xajax->processRequest();
        $data['pegawai'] = $this->pegawai_model->getbawahan();         
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('tna/reportevaluasitraining', $data);
    }

    function carireportevaluasitraining($tgl1,$tgl2){
        $objResponse = new xajaxResponse();
        $data = $this->tna_model->carireportevaluasitraining($tgl1,$tgl2); 
        $html='';        
        if (count($data)>0) {             
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->nama."</td>
                                <td>".$row->nik."</td>
                                <td>".$row->jabatan."</td>
                                <td>".$row->unit."</td>
                                <td>".$row->namapelatihan."</td>
                                <td>".$row->instruktur."</td>
                                <td>".$row->penyelenggara."</td>                                
                                <td><a class='btn mini yellow sbold' target='_blank' href='cetakreportevaluasitraining/".$row->noindex."'><i class='icon-print'></i> Cetak </a> 
<!--                                <td><a class='btn mini yellow sbold' onClick='cetakreportevaluasitraining(".$row->noindex.")'><i class='icon-print'></i> Cetak </a>  -->
<!--                                    <a data-toggle='modal' href='#hapusskk".$row->noindex."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> -->
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $objResponse->Assign("reportevaluasitraining","innerHTML",$html);
        return $objResponse;
    }

    function cetakreportevaluasitraining($noindex){
      $this->load->library('fpdf');
      define('FPDF_FONTPATH',$this->config->item('fonts_path'));     
      $data['dataku'] = $this->tna_model->cetakreportevaluasitraining($noindex);
      $this->load->view('tna\cetakreportevaluasitraining',$data);
    }

    // function cetakreportevaluasitraining($noindex){
    //   $this->load->library('fpdf');
    //   define('FPDF_FONTPATH',$this->config->item('fonts_path'));
    //   $data['dataku'] = $this->tna_model->cetakreportevaluasitraining($noindex);
    //   // print_r($data);exit();
    //   $this->load->view('tna\cetakreportevaluasitraining',$data);
    // }

    function realtraining() {
        $data['title'] = 'Realisasi Program Training';
        // $this->xajax->register(XAJAX_FUNCTION, array('simpantraining',&$this,'simpantraining'));   
        // $this->xajax->register(XAJAX_FUNCTION, array('editjabatan',&$this,'editjabatan')); 
        // $this->xajax->register(XAJAX_FUNCTION, array('edittraining',&$this,'edittraining'));    
        // $this->xajax->register(XAJAX_FUNCTION, array('carijabatan',&$this,'carijabatan'));            
        // $this->xajax->register(XAJAX_FUNCTION, array('caripegawai',&$this,'caripegawai'));            
        // $this->xajax->register(XAJAX_FUNCTION, array('updatetraining',&$this,'updatetraining'));            
        // $this->xajax->register(XAJAX_FUNCTION, array('caritraining',&$this,'caritraining'));   
        $this->xajax->register(XAJAX_FUNCTION, array('carireporttraining',&$this,'carireporttraining')); 
        $this->xajax->register(XAJAX_FUNCTION, array('updaterealtraining',&$this,'updaterealtraining'));   
        $this->xajax->register(XAJAX_FUNCTION, array('hapusototraining',&$this,'hapusototraining')); 
        $this->xajax->register(XAJAX_FUNCTION, array('ototraining',&$this,'ototraining'));          
        $this->xajax->register(XAJAX_FUNCTION, array('carirealtraining',&$this,'carirealtraining'));                  
        $this->xajax->processRequest();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','','');         
        $data['dataunit'] = $this->unit_model->getdataunit(''); 
        $data['datajabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('tna/v_realtraining', $data);
    }

    function carirealtraining($tgl1,$tgl2){
        $objResponse = new xajaxResponse();
        $data = $this->tna_model->carirealtraining($tgl1,$tgl2);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->notraining."</td>
                                <td>".$row->training."</td>
                                <td>".$row->kodetna."</td>
                                <td>".$row->tutor."</td>
                                <td>".date('d F Y',strtotime($row->mulai))." s/d ".date('d F Y',strtotime($row->akhir))."</td>
                                <td>".number_format($row->biaya,0,',','.')."</td>
                                <td align='center'>
                                    <a class='btn mini yellow sbold' data-toggle='modal' href='#otorisasi' onClick='ototraining(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan=7>Data Training Tidak Ada</td></tr>";
        }
        $objResponse->Assign("tna","innerHTML",$html);
        return $objResponse;
    }

    function ototraining($noindex){
        $objResponse = new xajaxResponse();
        $data = $this->tna_model->cariototraining($noindex);
        foreach ($data as $row) {
            $notraining=$row->notraining;
            $objResponse->Assign("kodetraining","value",$row->notraining);
            $objResponse->Assign("namatraining","value",$row->training);
            $objResponse->Assign("kodetna","value",$row->kodetna);
            $objResponse->Assign("tutor","value",$row->tutor);
            $objResponse->Assign("jadwal1","value",$row->mulai);
            $objResponse->Assign("jadwal2","value",$row->akhir);
            $objResponse->Assign("biaya","value",$row->biaya);
        }
        $data1 = $this->tna_model->caridetototraining($notraining);
        $html = '';
        $nom=0;
        if (count($data1)>0) {
            foreach ($data1 as $row) {
                $nom++;
                $html = $html."<tr>
                                <td>".$nom."</td>
                                <td>".$row->nik."</td>
                                <td>".$row->namapegawai."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$row->namaunit."</td>
                                <td align='center'>
                                    <a class='btn mini red' onClick='hapusototraining(".$row->noindex.','.$noindex.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan=7>Data Training Tidak Ada</td></tr>";
        }
        $objResponse->Assign("peserta","innerHTML",$html);

        return $objResponse;
    }    

    function hapusototraining($noindex,$noindex2){
        $objResponse = new xajaxResponse();

        $datax = $this->tna_model->hapusototraining($noindex);
        $data = $this->tna_model->cariototraining($noindex2);
        foreach ($data as $row) {
            $notraining=$row->notraining;
        }        

        $data1 = $this->tna_model->caridetototraining($notraining);
        $html = '';
        $nom=0;
        if (count($data1)>0) {
            foreach ($data1 as $row) {
                $nom++;
                $html = $html."<tr>
                                <td>".$nom."</td>
                                <td>".$row->nik."</td>
                                <td>".$row->namapegawai."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$row->namaunit."</td>
                                <td align='center'>
                                    <a class='btn mini red' onClick='hapusototraining(".$row->noindex.','.$noindex2.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan=7>Data Training Tidak Ada</td></tr>";
        }
        $objResponse->Assign("peserta","innerHTML",$html);

        return $objResponse;
    }    

    function updaterealtraining($tgl1,$tgl2,$kodetraining,$namatraining,$kodetna,$tutor,$jadwal1,$jadwal2,$biaya){
        $objResponse = new xajaxResponse();

        $data = $this->tna_model->updaterealtraining($kodetraining,$namatraining,$kodetna,$tutor,$jadwal1,$jadwal2,$biaya);
        // $objResponse->Assign("peserta","innerHTML",'');
        $objResponse->script("$('#otorisasi').modal('hide')");

        $data = $this->tna_model->carirealtraining($tgl1,$tgl2);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->notraining."</td>
                                <td>".$row->training."</td>
                                <td>".$row->kodetna."</td>
                                <td>".$row->tutor."</td>
                                <td>".date('d F Y',strtotime($row->mulai))." s/d ".date('d F Y',strtotime($row->akhir))."</td>
                                <td>".number_format($row->biaya,0,',','.')."</td>
                                <td align='center'>
                                    <a class='btn mini yellow sbold' data-toggle='modal' href='#otorisasi' onClick='ototraining(".$row->noindex.")'><i class='icon-edit'></i> Edit </a>
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan=7>Data Training Tidak Ada</td></tr>";
        }
        $objResponse->Assign("tna","innerHTML",$html);

        return $objResponse;
    }   

    function carireporttraining($tgl1,$tgl2){
        $objResponse = new xajaxResponse();
        $data = $this->tna_model->carirealtraining($tgl1,$tgl2);
        $html = '';
        if (count($data)>0) {
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->notraining."</td>
                                <td>".$row->training."</td>
                                <td>".$row->kodetna."</td>
                                <td>".$row->tutor."</td>
                                <td>".date('d F Y',strtotime($row->mulai))." s/d ".date('d F Y',strtotime($row->akhir))."</td>
                                <td>".number_format($row->biaya,0,',','.')."</td>
                                <td align='center'>
                                    <a class='btn mini blue sbold' target='_blank' href='".base_url()."index.php/tna/cetaktraining/".$row->notraining."' ><i class='icon-print'></i> Cetak </a>                                                                    
                                </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan=7>Data Training Tidak Ada</td></tr>";
        }
        $objResponse->Assign("tna2","innerHTML",$html);
        return $objResponse;
    }

}
?>