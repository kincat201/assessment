<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upr extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pms_model');
        $this->load->model('jabatan_model');        
        $this->load->model('stdknowhow_model');                
        $this->load->model('pegawai_model');                
        $this->load->model('m_upr');
    }

    function index() {
        $data['title'] = 'Updating Personal Record';
        $this->xajax->register(XAJAX_FUNCTION, array('cariupr',&$this,'cariupr'));                
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','','');         
        $this->template->display('upr/v_upr', $data);
    }

    // function cariupr($nama){
    //       $style = "odd";
    //       $html = '';
    //       $print = '';
    //       $c=1;
    //       $data1 = $this->m_upr->cariupr($nama);
    //       if($data1<>0)
    //       {
    //         foreach($data1 as $row)
    //         {
    //           if ($c==0){
    //             $c=1;
    //             $html = $html."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->nik."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->nama."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->tgllahir."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->pendidikan."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->status."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->namaunit."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->namajab."</td></tr>";
    //           }else{
    //             $c=0;
    //             $html = $html."<tr class='".$style."'><td class='left' align='center'>".$row->nik."</td><td class='left' align='center'>".$row->nama."</td><td class='left' align='left'>".$row->tgllahir."</td><td class='left' align='left'>".$row->pendidikan."</td><td class='left' align='left'>".$row->status."</td><td class='left' align='left'>".$row->namaunit."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->namajab."</td></tr>";
    //           }              
    //         }
    //       }
    //       else{
    //         $html = $html."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
    //       } 
    //       $objResponse = new xajaxResponse();
    //       $objResponse->Assign("upr","innerHTML", $html);
    //       return $objResponse; 
    // }

    // function cariupr($nama){
    //       $style = "odd";
    //       $html1 = '';
    //       $html2 = '';
    //       $html3 = '';
    //       $html4 = '';          
    //       // $data0 = $this->m_upr->hapustampung();
    //       // $data1 = $this->m_upr->caricv($nama);
    //       // $data2 = $this->m_upr->caripms($nama);
    //       // $data3 = $this->m_upr->cariknowhow($nama);
    //       $data4 = $this->m_upr->carimanagerial($nama);

    //       // if($data1<>0)
    //       // {
    //       //   foreach($data1 as $row)
    //       //   {
    //       //     if ($row->ket1=='A'){
    //       //       $html1 = $html1."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket6."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket8."</td></tr>";
    //       //     }
    //       //   }
    //       // }
    //       // else{
    //       //   $html1 = $html1."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
    //       // }

    //       // if($data2<>0)
    //       // {
    //       //   foreach($data2 as $row)
    //       //   {
    //       //     if ($row->ket1=='B'){
    //       //       $html2 = $html2."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket6."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket8."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket9."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket10."</td></tr>";
    //       //     }              
    //       //   }
    //       // }
    //       // else{
    //       //   $html2 = $html2."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
    //       // }           

    //       // $no=0;
    //       // if($data3<>0)
    //       // {
    //       //   foreach($data3 as $row)
    //       //   { 
    //       //     $no++;
    //       //     if ($row->ket1=='C'){
    //       //       $html3 = $html3."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$no."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket8."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket9."</td></tr>";
    //       //     }              
    //       //   }
    //       // }
    //       // else{
    //       //   $html3 = $html3."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
    //       // }

    //       $nom=0;
    //       if($data4<>0)
    //       {
    //         foreach($data4 as $row)
    //         {
    //           $nom++;
    //           // if ($row->ket1=='D'){
    //             $html4 = $html4."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$nom."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->dev."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->dev1."</td></tr>";
    //           // }              
    //         }
    //       }
    //       else{
    //         $html4 = $html4."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
    //       }

    //       $objResponse = new xajaxResponse();
    //       // $objResponse->Assign("upr","innerHTML", $html1);
    //       // $objResponse->Assign("pms","innerHTML", $html2);
    //       // $objResponse->Assign("profil","innerHTML", $html3);
    //       $objResponse->Assign("profil2","innerHTML", $html4);
    //       return $objResponse; 
    // }

    function cariupr($nama){
          $style = "odd";
          $html1 = '';
          $html2 = '';
          $html3 = '';
          $html4 = '';          
          $html5 = '';
          $html6 = '';
          $html7 = '';
          $html8 = '';
          $html9 = '';
          $data0 = $this->m_upr->hapustampung();
          $data1 = $this->m_upr->caricv($nama);
          $data2 = $this->m_upr->caripms($nama);
          $data3 = $this->m_upr->cariknowhow($nama);
          $data4 = $this->m_upr->carimanagerial($nama);
          $data5 = $this->m_upr->caripmstahunan($nama);
          $data6 = $this->m_upr->cariknowhowtahunan($nama);
          // $data6 = $this->m_upr->cariprofiltahunan($nama);
          $data7 = $this->m_upr->carihistorijabatan($nama);
          $data8 = $this->m_upr->carihistoritraining($nama);          
          $data9 = $this->m_upr->carimanagerialtahunan($nama);

//=====================================cv
          if($data1<>0)
          {
            foreach($data1 as $row)
            {
              if ($row->ket1=='A'){
                $html1 = $html1."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket6."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket8."</td></tr>";
              }
            }
          }
          else{
            $html1 = $html1."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          }
//=====================================histori jabatan
          if($data7<>0)
          {
            foreach($data7 as $row)
            {
              if ($row->ket1=='G'){
                $html7 = $html7."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket6."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket8."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket9."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket10."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket11."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket12."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket13."</td></tr>";
              }
            }
          }
          else{
            $html7 = $html7."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          }          
//=====================================histori training
          if($data8<>0)
          {
            foreach($data8 as $row)
            {
              if ($row->ket1=='H'){
                $html8 = $html8."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket6."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket8."</td></tr>";
              }
            }
          }
          else{
            $html8 = $html8."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          }                    
//=====================================pms
          if($data2<>0)
          {
            foreach($data2 as $row)
            {
              if ($row->ket1=='B'){
                $html2 = $html2."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket6."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket8."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket9."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket10."</td></tr>";
              }              
            }
          }
          else{
            $html2 = $html2."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          }           
//=====================================knowhow
          $no=0;
          if($data3<>0)
          {
            foreach($data3 as $row)
            { 
              $no++;
              if ($row->ket1=='C'){
                $html3 = $html3."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$no."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket6."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket7."</td></tr>";
                // $html3 = $html3."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$no."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket8."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket9."</td></tr>";
              }              
            }
          }
          else{
            $html3 = $html3."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          }
//=====================================managerial
          $nom=0;
          if($data4<>0)
          {
            foreach($data4 as $row)
            {
              $nom++;
              if ($row->ket1=='D'){
                $html4 = $html4."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$nom."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket6."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket7."</td></tr>";
              }              
            }
          }
          else{
            $html4 = $html4."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          }
//=====================================pms tahunan
          if($data5<>0)
          {
            foreach($data5 as $row)
            {
              if ($row->ket1=='E'){
                $html5 = $html5."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket8."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket9."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket10."</td></tr>";
              }              
            }
          }
          else{
            $html5 = $html5."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          }                     
//=====================================knowhow tahunan
          if($data6<>0)
          {
            foreach($data6 as $row)
            {
              if ($row->ket1=='F'){
                $html6 = $html6."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td>
                                                        <td bgcolor=#CCCCCC class='left' align='center'>".$row->ket6."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket8."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket9."</td>
                                                        <td bgcolor=#CCCCCC class='left' align='center'>".$row->ket10."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket11."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket12."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket13."</td>
                                                        <td bgcolor=#CCCCCC class='left' align='center'>".$row->ket14."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket15."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket16."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket17."</td>
                                                        <td bgcolor=#CCCCCC class='left' align='center'>".$row->ket18."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket19."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket20."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket21."</td>
                                                        <td bgcolor=#CCCCCC class='left' align='center'>".$row->ket22."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket23."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket24."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket25."</td>
                                                        <td bgcolor=#CCCCCC class='left' align='center'>".$row->ket26."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket27."</td></tr>";
              }              
            }
          }
          else{
            $html6 = $html6."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          }                     
//=====================================managerial tahunan
          if($data9<>0)
          {
            foreach($data9 as $row)
            {
              if ($row->ket1=='I'){
                $html9 = $html9."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='center'>".$row->ket2."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket3."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket4."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket5."</td>
                                                        <td bgcolor=#CCCCCC class='left' align='center'>".$row->ket6."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket7."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket8."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket9."</td>
                                                        <td bgcolor=#CCCCCC class='left' align='center'>".$row->ket10."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket11."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket12."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket13."</td>
                                                        <td bgcolor=#CCCCCC class='left' align='center'>".$row->ket14."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket15."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket16."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket17."</td>
                                                        <td bgcolor=#CCCCCC class='left' align='center'>".$row->ket18."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket19."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket20."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket21."</td>
                                                        <td bgcolor=#CCCCCC class='left' align='center'>".$row->ket22."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket23."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket24."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->ket25."</td></tr>";
              }              
            }
          }
          else{
            $html9 = $html9."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
          }                     

          $objResponse = new xajaxResponse();
          $objResponse->Assign("upr","innerHTML", $html1);
          $objResponse->Assign("pms","innerHTML", $html2);
          $objResponse->Assign("profil","innerHTML", $html3);
          $objResponse->Assign("profil2","innerHTML", $html4);
          $objResponse->Assign("pmstahunan","innerHTML", $html5);
          // $objResponse->Assign("profiltahunan","innerHTML", $html6);
          $objResponse->Assign("knowhowtahunan","innerHTML", $html6);          
          $objResponse->Assign("historijabatan","innerHTML", $html7);
          $objResponse->Assign("historitraining","innerHTML", $html8);
          $objResponse->Assign("managerialtahunan","innerHTML", $html9);
          return $objResponse; 
    }

    function cetakupr($nama) {
        $data0 = $this->m_upr->hapustampung();
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));        
        $data['datacv'] = $this->m_upr->caricv($nama);
        $data['datapms'] = $this->m_upr->caripms($nama);
        $data['dataknowhow'] = $this->m_upr->cariknowhow($nama);
        $data['datamanagerial'] = $this->m_upr->carimanagerial($nama);
        $data['datapmstahunan'] = $this->m_upr->caripmstahunan($nama);
        $data['dataknowhowtahunan'] = $this->m_upr->cariknowhowtahunan($nama);
        $data['datamanagerialtahunan'] = $this->m_upr->carimanagerialtahunan($nama);
        $data['datahistorijabatan'] = $this->m_upr->carihistorijabatan($nama);
        $data['datahistoritraining'] = $this->m_upr->carihistoritraining($nama);
        $this->load->view('upr\cetakupr',$data);
    }

    // function resumepms() {
    //     $data['title'] = 'Resume Penilaian Kinerja';
    //     $this->xajax->register(XAJAX_FUNCTION, array('cariresumepms',&$this,'cariresumepms'));                
    //     $this->xajax->processRequest();
    //     $data['xajax_js'] = $this->xajax->getJavascript();
    //     $data['pegawai'] = $this->pegawai_model->getdatapegawai('','','','','','','','');         
    //     $data['level'] = $this->pms_model->getlevel();         
    //     $this->template->display('pms/resumepms', $data);
    // }

    // function cariresumepms($leveljabatan,$tahun){
    //       $style = "odd";
    //       $html = '';
    //       $print = '';
    //       $c=1;
    //       $data1 = $this->pms_model->cariresumepms($leveljabatan,$tahun);
    //       if($data1<>0)
    //       {
    //         foreach($data1 as $row)
    //         {
    //           if ($c==0){
    //             $c=1;
    //             $html = $html."<tr class='".$style."'><td bgcolor=#CCCCCC class='left' align='left'>".$row->nama."</td><td bgcolor=#CCCCCC class='left' align='left'>".$row->namajabatan."</td><td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totalnilkra1, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totnilkba1, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totkrakba1, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".@$row->hasil1."</td><td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totalnilkra2, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totnilkba2, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totkrakba2, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".@$row->hasil2."</td><td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totalnilkra3, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totnilkba3, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totkrakba3, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".@$row->hasil3."</td>
    //                 <td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totalnilkra4, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totnilkba4, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".number_format(@$row->totkrakba4, 2, ',', '.')."</td><td bgcolor=#CCCCCC class='left' align='center'>".@$row->hasil4."</td></tr>";                   
    //           }else{
    //             $c=0;
    //             $html = $html."<tr class='".$style."'><td  class='left' align='left'>".$row->nama."</td><td  class='left' align='left'>".$row->namajabatan."</td><td  class='left' align='center'>".number_format(@$row->totalnilkra1, 2, ',', '.')."</td><td  class='left' align='center'>".number_format(@$row->totnilkba1, 2, ',', '.')."</td><td  class='left' align='center'>".number_format(@$row->totkrakba1, 2, ',', '.')."</td><td  class='left' align='center'>".@$row->hasil1."</td><td  class='left' align='center'>".number_format(@$row->totalnilkra2, 2, ',', '.')."</td><td  class='left' align='center'>".number_format(@$row->totnilkba2, 2, ',', '.')."</td><td  class='left' align='center'>".number_format(@$row->totkrakba2, 2, ',', '.')."</td><td  class='left' align='center'>".@$row->hasil2."</td><td  class='left' align='center'>".number_format(@$row->totalnilkra3, 2, ',', '.')."</td><td  class='left' align='center'>".number_format(@$row->totnilkba3, 2, ',', '.')."</td><td  class='left' align='center'>".number_format(@$row->totkrakba3, 2, ',', '.')."</td><td  class='left' align='center'>".@$row->hasil3."</td>
    //                 <td  class='left' align='center'>".number_format(@$row->totalnilkra4, 2, ',', '.')."</td><td  class='left' align='center'>".number_format(@$row->totnilkba4, 2, ',', '.')."</td><td  class='left' align='center'>".number_format(@$row->totkrakba4, 2, ',', '.')."</td><td class='left' align='center'>".@$row->hasil4."</td></tr>";                   
    //           }              
    //         }
    //       }
    //       else{
    //         $html = $html."<tr class='".$style."'><td align='center' style='font-size:15px' class='center' bgcolor='#FF66FF' colspan=8><blink>Data Tidak Ditemukan</blink></td></tr>";
    //       } 
    //       $objResponse = new xajaxResponse();
    //       $objResponse->Assign("resumepms","innerHTML", $html);
    //       return $objResponse; 
    // }

    // function cetakresumepms($leveljabatan,$tahun) {
    //   $this->load->library('fpdf');
    //   define('FPDF_FONTPATH',$this->config->item('fonts_path'));
    //   $data['dataku'] = $this->pms_model->cariresumepms($leveljabatan,$tahun);
    //   $this->load->view('pms\cetakresumepms',$data);
    // }

}
?>