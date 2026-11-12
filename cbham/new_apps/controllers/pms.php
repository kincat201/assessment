<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pms extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pms_model');
        $this->load->model('jabatan_model');        
        $this->load->model('stdknowhow_model');                
        $this->load->model('pegawai_model');                
    }

    function index() {
        $data['title'] = 'Penilaian Kinerja';
        $this->xajax->register(XAJAX_FUNCTION, array('carioutstdkompetensi',&$this,'carioutstdkompetensi'));                
        $this->xajax->register(XAJAX_FUNCTION, array('simpanpms',&$this,'simpanpms'));                
        $this->xajax->register(XAJAX_FUNCTION, array('caripegawai',&$this,'caripegawai'));                        
        $this->xajax->register(XAJAX_FUNCTION, array('cariHasil',&$this,'cariHasil'));                                
        $this->xajax->register(XAJAX_FUNCTION, array('carites',&$this,'carites'));                                
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getbawahan();         
        // $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','','');         
        $this->template->display('pms/pms', $data); //===========
        //$this->load->view('pms/pms', $data);
        // $this->load->view('pms/krakba',$data);    
        //$this->template->display('pms/krakba', $data);        
    }

    /*function caripegawai($nama){
          $style = "odd";                    
          $kra=0;
          $kba=0;          
          $objResponse = new xajaxResponse();
          $data1 = $this->pms_model->caripegawai($nama);
          if($data1<>0)
          {
            foreach($data1 as $row)
            {
              $kra=$row->kra;
              $kba=$row->kba;
            }
          }
          else{
            $objResponse->script("alert('Cek data pegawai,KRA dan KBA belum terseting untuk jabatan ini')");
          } 
          
          $objResponse->Assign("kra","innerHTML", $kra);
          $objResponse->Assign("kba","innerHTML", $kba);
          return $objResponse; 
    }*/

    function caripegawai($id_pegawai,$periode,$tahun,$bobsubmain){
          $kra=0;
          $kba=0;          
          $objResponse = new xajaxResponse();
          $data_kelompok = $this->pms_model->caripegawai($id_pegawai);
          if($data_kelompok->num_rows() > 0)
          {
            $kra = $data_kelompok->row()->kra;
            $kba = $data_kelompok->row()->kba;

            $data = $this->pms_model->carikra($id_pegawai,$periode,$tahun);
            
            for ($i=4; $i <= 15 ; $i++) { 
              if($i == $data){
                $objResponse->script("$('#radiomain".$i."').attr('checked',true)");
                $objResponse->script("$('#uniform-radiomain".$i." span').addClass('checked')");
                $objResponse->script("$('#radiomain".$i."').attr('disabled',false)");
              }else{
                $objResponse->script("$('#radiomain".$i."').attr('checked',false)");
                $objResponse->script("$('#uniform-radiomain".$i." span').removeClass('checked')");
                $objResponse->script("$('#radiomain".$i."').attr('disabled',true)");
              }
            }  

            if($data>0){
                $nilsubmain=($data*$bobsubmain)/100;
                $totalnilkra=($nilsubmain*$kra)/100;
                
                $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
                $objResponse->Assign("nilbobotkra","innerHTML",$nilsubmain);
                $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
                $objResponse->Assign("nilbobotkra","innerHTML",$nilsubmain);
                $objResponse->script("
                    swal({
                        title: 'Berhasil Set Nilai KRA dan Bobot KBA',

                        text: 'Selanjutnya silahkan isi data KBA',

                        icon: 'info',
                      })");          
            }else{
              $objResponse->script("
                    swal({
                        title: 'Gagal Get Rekap SKK',

                        text: 'Cek data hitung SKK,Total Nilai Stategis Tidak Ditemukan',

                        icon: 'error',
                      })");
            } 
          }else{
            $objResponse->script("swal({
                    title: 'Gagal Get Data Bobot',

                    text: 'Cek data pegawai,KRA dan KBA belum terseting untuk jabatan ini',

                    icon: 'error',
                  })");
            $objResponse->script('kosong()');
          }

          $objResponse->Assign("kra","innerHTML", $kra);
          $objResponse->Assign("kba","innerHTML", $kba);

          return $objResponse; 
    }

function simpanpms(
// function simpanpms(){
                    $nama,    
                    $periode,   
                    $tahun,   
                    $maintening,  
                    $bobsubmain,  
                    $nilsubmain,  
                    $totalnilkra, 
                    $improvment,  
                    $bobsubimprov,
                    $nilsubimprov,
                    $nilbobotkra,
                    $bobotinti,
                    $nilbobotinti,
                    $totnilkba,
                    $integritas,  
                    $subint,
                    $transparansi,  
                    $subtrans,
                    $kerjasama, 
                    $subkerja,
                    $kreativitas, 
                    $subkreativ,
                    $semangat,  
                    $subsemangat,
                    $sempurna,  
                    $subsempurna,
                    $disiplin,  
                    $bobotdisiplin,
                    $nilbobotdisiplin,
                    $pdca,    
                    $bobotpdca,
                    $nilbobotpdca,
                    $manage,    
                    $bobotmanagement,
                    $nilbobotmanagement,
                    $nilbobotkba,
                    $hasil,
                    $totkrakba,
                    $kra,
                    $kba,
                    $kekuatan,
                    $kelemahan,
                    $tindaklanjut,
                    $jadwal
                    ){ 

         $html = '';

         // $periode=trim($periode);
         // $dinilai=trim($dinilai);
         // $tahun=trim($tahun); 
  //if((date('m')==7) or (date('m')==1)){
          $data = false;
              if($totkrakba != 0 && $hasil != ''){

               $data = $this->pms_model->simpanpms(
                                                        $nama,    
                                                        $periode,   
                                                        $tahun,   
                                                        $maintening,  
                                                        $bobsubmain,  
                                                        $nilsubmain,  
                                                        $totalnilkra, 
                                                        $improvment,  
                                                        $bobsubimprov,
                                                        $nilsubimprov,
                                                        $nilbobotkra,
                                                        $bobotinti,
                                                        $nilbobotinti,
                                                        $totnilkba,
                                                        $integritas,  
                                                        $subint,
                                                        $transparansi,  
                                                        $subtrans,
                                                        $kerjasama, 
                                                        $subkerja,
                                                        $kreativitas, 
                                                        $subkreativ,
                                                        $semangat,  
                                                        $subsemangat,
                                                        $sempurna,  
                                                        $subsempurna,
                                                        $disiplin,  
                                                        $bobotdisiplin,
                                                        $nilbobotdisiplin,
                                                        $pdca,    
                                                        $bobotpdca,
                                                        $nilbobotpdca,
                                                        $manage,    
                                                        $bobotmanagement,
                                                        $nilbobotmanagement,
                                                        $nilbobotkba,
                                                        $hasil,
                                                        $totkrakba,
                                                        $kra,
                                                        $kba,
                                                        $kekuatan,
                                                        $kelemahan,
                                                        $tindaklanjut,
                                                        $jadwal);     
              }
        if ($data){
           $objResponse = new xajaxResponse();
           $objResponse->script("swal({
                    title: 'Simpan Berhasil',

                    text: 'Berhasil menyimpan data penilaian Kinerja',

                    icon: 'info',
                  })");
           $objResponse->script('kosong()');
           // $objResponse->Assign("btncetak","disabled",false);         
           // return $objResponse;  
        }else{
           $objResponse = new xajaxResponse();
           $objResponse->script("swal({
                    title: 'Gagal Simpan',

                    text: 'Gagal menyimpan data penilaian Kinerja',

                    icon: 'error',
                  })");
           //$objResponse->script("alert('Data sudah ada di database,tidak bisa disimpan ulang')");      
           // $objResponse->Assign("btnsimpan","disabled",true);         
           // return $objResponse;  
        } 
    /*}else{
       $objResponse->script("alert('Maaf, periode penilaian adalah bulan Juli dan Januari')");
    }*/
  return $objResponse; 
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

    /*function carikra($nama,$periode,$tahun,$kra,$kba,$bobsubmain,$nilbobotkba){    

      // $data=null;
      // if((date("m")=='04') or (date("m")=='07') or (date("m")=='10') or (date("m")=='01')){
      //   if((date("d")>13) and (date("d")<22)){
      //     $ok=1;
      //   }else{
      //     $ok=1;  //buat buka tutup periode penilaian,nol kan untuk aktifkan blokir
      //   }
      // }else{
      //   $ok=1; //buat buka tutup periode penilaian,nol kan untuk aktifkan blokir
      // } 
         
      $data = $this->pms_model->carikra($nama,$periode,$tahun);
      $objResponse = new xajaxResponse();
    // print_r($data);exit();
      // $objResponse->Assign("radiomain4","checked","T");
      // return $objResponse;
        
      if(sizeof($data)>0){
        foreach($data as $row)
        {                 
          if ($row->ket1==4){
            $nilsubmain=(4*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain4","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'F');        
            $objResponse->Assign("radiomain5","disabled",'T');          
            $objResponse->Assign("radiomain6","disabled",'T');
            $objResponse->Assign("radiomain7","disabled",'T');
            $objResponse->Assign("radiomain8","disabled",'T');
            $objResponse->Assign("radiomain9","disabled",'T');
            $objResponse->Assign("radiomain10","disabled",'T');
            $objResponse->Assign("radiomain11","disabled",'T');
            $objResponse->Assign("radiomain12","disabled",'T');
            $objResponse->Assign("radiomain13","disabled",'T');
            $objResponse->Assign("radiomain14","disabled",'T');
            $objResponse->Assign("radiomain15","disabled",'T');               
          }         
          if ($row->ket1==5){
            $nilsubmain=(5*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain5","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'T');        
            $objResponse->Assign("radiomain5","disabled",'F');          
            $objResponse->Assign("radiomain6","disabled",'T');
            $objResponse->Assign("radiomain7","disabled",'T');
            $objResponse->Assign("radiomain8","disabled",'T');
            $objResponse->Assign("radiomain9","disabled",'T');
            $objResponse->Assign("radiomain10","disabled",'T');
            $objResponse->Assign("radiomain11","disabled",'T');
            $objResponse->Assign("radiomain12","disabled",'T');
            $objResponse->Assign("radiomain13","disabled",'T');
            $objResponse->Assign("radiomain14","disabled",'T');
            $objResponse->Assign("radiomain15","disabled",'T');               
          }               
          if ($row->ket1==6){
            $nilsubmain=(6*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain6","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'T');        
            $objResponse->Assign("radiomain5","disabled",'T');          
            $objResponse->Assign("radiomain6","disabled",'F');
            $objResponse->Assign("radiomain7","disabled",'T');
            $objResponse->Assign("radiomain8","disabled",'T');
            $objResponse->Assign("radiomain9","disabled",'T');
            $objResponse->Assign("radiomain10","disabled",'T');
            $objResponse->Assign("radiomain11","disabled",'T');
            $objResponse->Assign("radiomain12","disabled",'T');
            $objResponse->Assign("radiomain13","disabled",'T');
            $objResponse->Assign("radiomain14","disabled",'T');
            $objResponse->Assign("radiomain15","disabled",'T');               
          }               
          if ($row->ket1==7){
            $nilsubmain=(7*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain7","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'T');        
            $objResponse->Assign("radiomain5","disabled",'T');          
            $objResponse->Assign("radiomain6","disabled",'T');
            $objResponse->Assign("radiomain7","disabled",'F');
            $objResponse->Assign("radiomain8","disabled",'T');
            $objResponse->Assign("radiomain9","disabled",'T');
            $objResponse->Assign("radiomain10","disabled",'T');
            $objResponse->Assign("radiomain11","disabled",'T');
            $objResponse->Assign("radiomain12","disabled",'T');
            $objResponse->Assign("radiomain13","disabled",'T');
            $objResponse->Assign("radiomain14","disabled",'T');
            $objResponse->Assign("radiomain15","disabled",'T');               
          }               
          if ($row->ket1==8){
            $nilsubmain=(8*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain8","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'T');        
            $objResponse->Assign("radiomain5","disabled",'T');          
            $objResponse->Assign("radiomain6","disabled",'T');
            $objResponse->Assign("radiomain7","disabled",'T');
            $objResponse->Assign("radiomain8","disabled",'F');
            $objResponse->Assign("radiomain9","disabled",'T');
            $objResponse->Assign("radiomain10","disabled",'T');
            $objResponse->Assign("radiomain11","disabled",'T');
            $objResponse->Assign("radiomain12","disabled",'T');
            $objResponse->Assign("radiomain13","disabled",'T');
            $objResponse->Assign("radiomain14","disabled",'T');
            $objResponse->Assign("radiomain15","disabled",'T');               
          }               
          if ($row->ket1==9){
            $nilsubmain=(9*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain9","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'T');        
            $objResponse->Assign("radiomain5","disabled",'T');          
            $objResponse->Assign("radiomain6","disabled",'T');
            $objResponse->Assign("radiomain7","disabled",'T');
            $objResponse->Assign("radiomain8","disabled",'T');
            $objResponse->Assign("radiomain9","disabled",'F');
            $objResponse->Assign("radiomain10","disabled",'T');
            $objResponse->Assign("radiomain11","disabled",'T');
            $objResponse->Assign("radiomain12","disabled",'T');
            $objResponse->Assign("radiomain13","disabled",'T');
            $objResponse->Assign("radiomain14","disabled",'T');
            $objResponse->Assign("radiomain15","disabled",'T');               
          }               
          if ($row->ket1==10){
            $nilsubmain=(10*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain10","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'T');        
            $objResponse->Assign("radiomain5","disabled",'T');          
            $objResponse->Assign("radiomain6","disabled",'T');
            $objResponse->Assign("radiomain7","disabled",'T');
            $objResponse->Assign("radiomain8","disabled",'T');
            $objResponse->Assign("radiomain9","disabled",'T');
            $objResponse->Assign("radiomain10","disabled",'F');
            $objResponse->Assign("radiomain11","disabled",'T');
            $objResponse->Assign("radiomain12","disabled",'T');
            $objResponse->Assign("radiomain13","disabled",'T');
            $objResponse->Assign("radiomain14","disabled",'T');
            $objResponse->Assign("radiomain15","disabled",'T');               
          }               
          if ($row->ket1==11){
            $nilsubmain=(11*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain11","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'T');        
            $objResponse->Assign("radiomain5","disabled",'T');          
            $objResponse->Assign("radiomain6","disabled",'T');
            $objResponse->Assign("radiomain7","disabled",'T');
            $objResponse->Assign("radiomain8","disabled",'T');
            $objResponse->Assign("radiomain9","disabled",'T');
            $objResponse->Assign("radiomain10","disabled",'T');
            $objResponse->Assign("radiomain11","disabled",'F');
            $objResponse->Assign("radiomain12","disabled",'T');
            $objResponse->Assign("radiomain13","disabled",'T');
            $objResponse->Assign("radiomain14","disabled",'T');
            $objResponse->Assign("radiomain15","disabled",'T');               
          }               
          if ($row->ket1==12){
            $nilsubmain=(12*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain12","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'T');        
            $objResponse->Assign("radiomain5","disabled",'T');          
            $objResponse->Assign("radiomain6","disabled",'T');
            $objResponse->Assign("radiomain7","disabled",'T');
            $objResponse->Assign("radiomain8","disabled",'T');
            $objResponse->Assign("radiomain9","disabled",'T');
            $objResponse->Assign("radiomain10","disabled",'T');
            $objResponse->Assign("radiomain11","disabled",'T');
            $objResponse->Assign("radiomain12","disabled",'F');
            $objResponse->Assign("radiomain13","disabled",'T');
            $objResponse->Assign("radiomain14","disabled",'T');
            $objResponse->Assign("radiomain15","disabled",'T');               
          }               
          if ($row->ket1==13){
            $nilsubmain=(13*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain13","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'T');        
            $objResponse->Assign("radiomain5","disabled",'T');          
            $objResponse->Assign("radiomain6","disabled",'T');
            $objResponse->Assign("radiomain7","disabled",'T');
            $objResponse->Assign("radiomain8","disabled",'T');
            $objResponse->Assign("radiomain9","disabled",'T');
            $objResponse->Assign("radiomain10","disabled",'T');
            $objResponse->Assign("radiomain11","disabled",'T');
            $objResponse->Assign("radiomain12","disabled",'T');
            $objResponse->Assign("radiomain13","disabled",'F');
            $objResponse->Assign("radiomain14","disabled",'T');
            $objResponse->Assign("radiomain15","disabled",'T');               
          }                     
          if ($row->ket1==14){
            $nilsubmain=(14*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain14","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'T');        
            $objResponse->Assign("radiomain5","disabled",'T');          
            $objResponse->Assign("radiomain6","disabled",'T');
            $objResponse->Assign("radiomain7","disabled",'T');
            $objResponse->Assign("radiomain8","disabled",'T');
            $objResponse->Assign("radiomain9","disabled",'T');
            $objResponse->Assign("radiomain10","disabled",'T');
            $objResponse->Assign("radiomain11","disabled",'T');
            $objResponse->Assign("radiomain12","disabled",'T');
            $objResponse->Assign("radiomain13","disabled",'T');
            $objResponse->Assign("radiomain14","disabled",'F');
            $objResponse->Assign("radiomain15","disabled",'T');               
          }                    
          if ($row->ket1==15){
            $nilsubmain=(15*$bobsubmain)/100;
            $nilbobotkra=$nilsubmain;
            $totalnilkra=($nilbobotkra*$kra)/100;
            $totkrakba=(($nilbobotkba*$kba)/100)+(($nilbobotkra*$kra)/100);

            if ($totkrakba<=6.99){
              $hasil='BUTUH PENGEMBANGAN';
            }elseif (($totkrakba>6.99) and ($totkrakba<=9.99)){
              $hasil='KOMPETEN';
            }elseif (($totkrakba>9.99) and ($totkrakba<=12.99)){
              $hasil='SANGAT EFEKTIF';
            }elseif (($totkrakba>12.99) and ($totkrakba<=15)){          
              $hasil='SEMPURNA';          
            }
                        
            $objResponse->Assign("nilsubmain","innerHTML",$nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$nilbobotkra);
            $objResponse->Assign("totalnilkra","innerHTML",$totalnilkra);
            $objResponse->Assign("totkrakba","innerHTML",$totkrakba);
            $objResponse->Assign("hasil","value",$hasil);

            $objResponse->Assign("radiomain15","checked",'T');
            $objResponse->Assign("radiomain4","disabled",'T');        
            $objResponse->Assign("radiomain5","disabled",'T');          
            $objResponse->Assign("radiomain6","disabled",'T');
            $objResponse->Assign("radiomain7","disabled",'T');
            $objResponse->Assign("radiomain8","disabled",'T');
            $objResponse->Assign("radiomain9","disabled",'T');
            $objResponse->Assign("radiomain10","disabled",'T');
            $objResponse->Assign("radiomain11","disabled",'T');
            $objResponse->Assign("radiomain12","disabled",'T');
            $objResponse->Assign("radiomain13","disabled",'T');
            $objResponse->Assign("radiomain14","disabled",'T');
            $objResponse->Assign("radiomain15","disabled",'F');               
          }                    
        }
      }
      return $objResponse;
    }*/

    function cariHasil($id_pegawai,$periode,$tahun){    

      $data = $this->pms_model->cariHasil($id_pegawai,$periode,$tahun);
      $objResponse = new xajaxResponse();
      
      if($id_pegawai != '' && $periode !='' && $tahun != ''){
        if($data->num_rows()>0){
            $hasil = $data->row();
            $objResponse->Assign("nilsubmain","innerHTML",$hasil->nilsubmain);
            $objResponse->Assign("nilbobotkra","innerHTML",$hasil->nilsubmain);
            $objResponse->Assign("totalnilkra","innerHTML",$hasil->totalnilkra);
            $objResponse->Assign("nilbobotkra","innerHTML",$hasil->nilsubmain);
            
            for ($i=4; $i <= 15 ; $i++) { 
              if($i == $hasil->maintening){
                $objResponse->script("$('#radiomain".$i."').attr('checked',true)");
                $objResponse->script("$('#uniform-radiomain".$i." span').addClass('checked')");
                $objResponse->script("$('#radiomain".$i."').attr('disabled',false)");
              }else{
                $objResponse->script("$('#radiomain".$i."').attr('checked',false)");
                $objResponse->script("$('#uniform-radiomain".$i." span').removeClass('checked')");
                $objResponse->script("$('#radiomain".$i."').attr('disabled',true)");
              }
            }

            $skala_kba = array('int','trans','kerja','kreativ','semangat','disiplin','pdca','manage');
            $nil_kba = array($hasil->integritas,$hasil->transparansi,$hasil->kerjasama,$hasil->kreativitas,$hasil->semangat,$hasil->disiplin,$hasil->pdca,$hasil->manage);

            foreach ($skala_kba as $key => $skl) {
              for ($i=4; $i <= 15 ; $i++) {
                if($i == $nil_kba[$key]){
                  $objResponse->script("$('#radio".$skl.$i."').attr('checked',true)");
                  $objResponse->script("$('#uniform-radio".$skl.$i." span').addClass('checked')");
                  //$objResponse->script("$('#radio".$skl.$i."').attr('disabled',false)");
                }else{
                  $objResponse->script("$('#radio".$skl.$i."').attr('checked',false)");
                  $objResponse->script("$('#uniform-radio".$skl.$i." span').removeClass('checked')");
                  //$objResponse->script("$('#radio".$skl.$i."').attr('disabled',true)");
                }
              }
            }

            $objResponse->Assign("kra","innerHTML",$hasil->kra);
            $objResponse->Assign("kba","innerHTML",$hasil->kba);

            $objResponse->Assign("subint","innerHTML",$hasil->subint);
            $objResponse->Assign("subtrans","innerHTML",$hasil->subtrans);
            $objResponse->Assign("subkerja","innerHTML",$hasil->subkerja);
            $objResponse->Assign("subkreativ","innerHTML",$hasil->subkreativ);
            $objResponse->Assign("subsemangat","innerHTML",$hasil->subsemangat);

            $objResponse->Assign("nilbobotinti","innerHTML",$hasil->nilbobotinti);
            $objResponse->Assign("nilbobotdisiplin","innerHTML",$hasil->nilbobotdisiplin);
            $objResponse->Assign("nilbobotpdca","innerHTML",$hasil->nilbobotpdca);
            $objResponse->Assign("nilbobotmanagement","innerHTML",$hasil->nilbobotmanagement);
            $objResponse->Assign("nilbobotkba","innerHTML",$hasil->nilbobotkba);

            $objResponse->Assign("totnilkba","innerHTML",$hasil->totnilkba);
            $objResponse->Assign("totkrakba","innerHTML",$hasil->totkrakba);
            $objResponse->script("$('#hasil').val('".$hasil->hasil."')");

            $objResponse->script("$('#kekuatan').val('".$hasil->kekuatan."')");
            $objResponse->script("$('#kelemahan').val('".$hasil->kelemahan."')");
            $objResponse->script("$('#tindaklanjut').val('".$hasil->tindaklanjut."')");
            $objResponse->script("$('#jadwal').val('".$hasil->jadwal."')");

            $objResponse->script("swal({
                title: 'Berhasil Get Hasil Penilaian',

                text: 'Data Penilian Ditemukan',

                icon: 'info',
              })");            
        }else{
          $objResponse->script("swal({
              title: 'Gagal Get Hasil',

              text: 'Data Hasil Penilaian tidak ditemukan',

              icon: 'error',
            })");
          $objResponse->script("kosong()");
        }
      }else{
        $objResponse->script("swal({
          title: 'Gagal Get Hasil',

          text: 'Pegawai, Periode, dan Tahun tidak boleh kosong!',

          icon: 'error',
        })");
      }
      return $objResponse;
    }


    function evaluasipms() {
        $data['title'] = 'Evaluasi Penilaian Kinerja';
        $this->xajax->register(XAJAX_FUNCTION, array('carievaluasipms',&$this,'carievaluasipms'));                
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        // $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','','');   
        $data['pegawai'] = $this->pegawai_model->getbawahan();               
        $this->template->display('pms/evaluasipms', $data);
    }

    function carievaluasipms($id_pegawai,$periode,$tahun){
          $style = "odd";
          $html = '';
          $print = '';
          $c=1;
          $data1 = $this->pms_model->carievaluasipms($id_pegawai,$periode,$tahun);
          if($data1<>0)
          {
            foreach($data1 as $row)
            {
              if ($c==0){
                $c=1;
                $html = $html."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->nama."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->kopeg."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->totalnilkra."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->totnilkba."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->totkrakba."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->hasil."</td></tr>";
              }else{
                $c=0;
                $html = $html."<tr class='".$style."'><td  class='left' align='center'>".$row->nama."</td><td  class='left' align='center'>".$row->kopeg."</td><td  class='left' align='left'>".$row->totalnilkra."</td><td  class='left' align='left'>".$row->totnilkba."</td><td  class='left' align='left'>".$row->totkrakba."</td><td  class='left' align='left'>".$row->hasil."</td></tr>";
              }              
            }
          }
          else{
            $html = $html."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          } 
          $objResponse = new xajaxResponse();
          $objResponse->Assign("evaluasipms","innerHTML", $html);
          return $objResponse; 
    }

    function cetakevaluasipms($id_pegawai,$periode,$tahun) {
      $this->load->library('fpdf');
      define('FPDF_FONTPATH',$this->config->item('fonts_path'));
      $data['dataku'] = $this->pms_model->carievaluasipms($id_pegawai,$periode,$tahun);
      $this->load->view('pms\cetakevaluasipms',$data);
    }

    function rekappms() {
        $data['title'] = 'Rekap Penilaian Kinerja';
        $this->xajax->register(XAJAX_FUNCTION, array('carirekappms',&$this,'carirekappms'));                
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        // $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','','');         
        $data['pegawai'] = $this->pegawai_model->getbawahan();            
        $this->template->display('pms/rekappms', $data);
    }

    function carirekappms($id_pegawai,$tahun){
          $style = "odd";
          $html = '';
          $print = '';
          $c=1;
          $data1 = $this->pms_model->carirekappms($id_pegawai,$tahun);
          if($data1<>0)
          {
            foreach($data1 as $row)
            {
              if ($c==0){
                $c=1;
                $html = $html."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->nama."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->kopeg."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->periode."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->totalnilkra."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->totnilkba."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->totkrakba."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->hasil."</td></tr>";
              }else{
                $c=0;
                $html = $html."<tr class='".$style."'><td  class='left' align='center'>".$row->nama."</td><td  class='left' align='center'>".$row->kopeg."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->periode."</td><td  class='left' align='left'>".$row->totalnilkra."</td><td  class='left' align='left'>".$row->totnilkba."</td><td  class='left' align='left'>".$row->totkrakba."</td><td  class='left' align='left'>".$row->hasil."</td></tr>";
              }              
            }
          }
          else{
            $html = $html."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          } 
          $objResponse = new xajaxResponse();
          $objResponse->Assign("rekappms","innerHTML", $html);
          return $objResponse; 
    }

    function cetakrekappms($id_pegawai,$tahun) {
      $this->load->library('fpdf');
      define('FPDF_FONTPATH',$this->config->item('fonts_path'));
      $data['dataku'] = $this->pms_model->carirekappms($id_pegawai,$tahun);
      $this->load->view('pms\cetakrekappms',$data);
    }

    function resumepms() {
        $data['title'] = 'Resume Penilaian Kinerja';
        $this->xajax->register(XAJAX_FUNCTION, array('cariresumepms',&$this,'cariresumepms'));                
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','','');         
        $data['level'] = $this->pms_model->getlevel();         
        $this->template->display('pms/resumepms', $data);
    }

    function cariresumepms($leveljabatan,$tahun){
          $style = "odd";
          $html = '';
          $print = '';
          $c=1;
          $data = $this->pms_model->cariresumepms($leveljabatan,$tahun);
          if($data->num_rows()>0)
          {
            $id_pegawai_before = 0;
            foreach($data->result() as $key => $row)
            {
              if($id_pegawai_before == $row->id_pegawai){
                $html .= "<td bgcolor=#CCCCCC class='left' align='center'>".$row->totalnilkra."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->totnilkba."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->totkrakba."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->hasil."</td>";
              }else{
                if($id_pegawai_before != 0){
                  $html .="</tr>";
                }
                $html .= "<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='left'>".$row->nama."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->nik."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->namajabatan."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->totalnilkra."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->totnilkba."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->totkrakba."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->hasil."</td>";
              }

              $id_pegawai_before = $row->id_pegawai;
            }
          }else{
            $html .= "<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan='11'><blink>Data Tidak Ditemukan</blink></td></tr>";
          }

          $objResponse = new xajaxResponse();
          $objResponse->Assign("resumepms","innerHTML", $html);
          return $objResponse; 
    }

    function cetakresumepms($leveljabatan,$tahun) {
      $this->load->library('fpdf');
      define('FPDF_FONTPATH',$this->config->item('fonts_path'));
      $data['dataku'] = $this->pms_model->cariresumepms($leveljabatan,$tahun);
      $data['tahun'] = $tahun;
      $data['leveljabatan'] = $this->pms_model->getNamaKelompok($leveljabatan);
      $this->load->view('pms\cetakresumepms',$data);
    }

}
?>