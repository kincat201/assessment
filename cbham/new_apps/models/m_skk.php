<?php
class M_skk extends MY_Model{

  function getdatakpi($kpi){
    $carikpi = "";
    if ($kpi!='' or $kpi!=null) {
      $carikpi = " AND kpi like '%".$kpi."%'";
    }

    $data = null;
    $sql = "SELECT * FROM kpi WHERE 1=1";
    $query = $this->db->query($sql.$carikpi." ORDER BY kpi");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function simpanskk($noindex,$tahun,$unit,$jabatan,$kpi,$jan,$feb,$mar,$apr,$mei,$jun,$jul,$agt,$sep,$okt,$nov,$des){
    $today=date('Y-m-d');
    /*$query = $this->db->query("select count(kpi) as jum from target where tahun=? and jabatan=? and kpi=?",array($tahun,$jabatan,$kpi));   
    foreach ($query->result() as $row){
      $jum=$row->jum;
    }*/
    $jum = 0;

    if($jum==0){
      $query = $this->db->query("select namaunit from unit where kunit=?",array($unit));   
      foreach ($query->result() as $row){
        $namaunit=$row->namaunit;
      }
      $query = $this->db->query("select namajabatan from jabatan where kojab=?",array($jabatan));   
      foreach ($query->result() as $row){
        $namajabatan=$row->namajabatan;
      }        
      $query = $this->db->query("select namajabatan from jabatan where kojab=?",array($jabatan));   
      foreach ($query->result() as $row){
        $namajabatan=$row->namajabatan;
      }                
      $query = $this->db->query("select * from kpi where kodekpi=?",array($kpi));   
      foreach ($query->result() as $row){
        $namakpi=$row->kpi;
        $deskripsi=$row->deskripsi;          
        $satuan=$row->satuan;
        $rollup=$row->rollup;
        $periode=$row->periode;
      }                        

      $data = array(
          'tahun'       => $tahun,
          'unit'        => $unit,
          'namaunit'    => $namaunit,
          'jabatan'     => $jabatan,
          'namajabatan' => $namajabatan,
          'kpi'         => $kpi,
          'namakpi'     => $namakpi,
          'deskripsi'   => $deskripsi,
          'satuan'      => $satuan,
          'rollup'      => $rollup,
          'periode'     => $periode,
          'jan'         => $jan,            
          'feb'         => $feb,
          'mar'         => $mar,
          'apr'         => $apr,            
          'mei'         => $mei,
          'jun'         => $jun,
          'jul'         => $jul,            
          'agt'         => $agt,
          'sep'         => $sep,
          'okt'         => $okt,            
          'nov'         => $nov,
          'des'         => $des,                                    
          'tglupdate'   => $today,
          'user'        => getSession('user')
      );

      if($noindex == ''){
        $this->db->insert('target', $data);         
      }else{
        $this->db->where('noindex',$noindex)->update('target',$data);
      }

      $value = $this->db->affected_rows();
      if ($value>0) {
        $data = array(
          'proses'  => 'INPUT SKK',
          'note'    => 'SKK',
          'user'    => getSession('user'),
          'tgl'     => $today
        );
        $this->db->insert('log', $data);  
      }
    }else{
      $value=-1;
    }
    return $value;
  }  

  function cariskk($tahun,$unit,$jabatan){
    $data = null;
    $cariskk='';   
    $cariskk = " AND (tahun = '".$tahun."' and unit = '".$unit."' and jabatan = '".$jabatan."')";      
    
    $sql = "SELECT * FROM target WHERE 1=1";
    $query = $this->db->query($sql.$cariskk);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function cetakskk($tahun,$unit,$jabatan){
    $data = null;
    $query = $this->db->query("SELECT * FROM target where tahun=? and unit=? and jabatan=? order by kpi",array($tahun,$unit,$jabatan));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

 function hapusskk($noindex){    
    $data = array(
        'noindex' => $noindex
    );
    return $this->db->delete('target', $data);  
  } 

  function hapusrealisasi($noindex){    
    $data = array(
        'noindex' => $noindex
    );
    return $this->db->delete('realisasi', $data);  
  }

  function editskk($noindex,$data){    
    $this->db->where('noindex',$noindex);
    return $this->db->update('target', $data);  
  }

  function getSkkByIndex($noindex){    
    $this->db->where('noindex',$noindex);
    return $this->db->get('target', $data)->result();  
  }

  function caritargetskk($tahun,$unit,$jabatan){
    $data = null;
    $cariskk='';   
    $cariskk = " AND (tahun = '".$tahun."' and unit = '".$unit."' and jabatan = '".$jabatan."')";      
    
    $sql = "SELECT * FROM target WHERE 1=1";
    $query = $this->db->query($sql.$cariskk);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function gettargetskk($noindex){
    $data = null;
    $query = $this->db->query("SELECT * FROM target where noindex=?",array($noindex));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getrealisasiskk($unit,$tahun,$jabatan,$kpi){
    $data = null;
    $query = $this->db->query("SELECT * FROM realisasi where unit=? and tahun=? and jabatan=? and kpi=?",array($unit,$tahun,$jabatan,$kpi));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function simpanrealisasi($tahun,$unit,$jabatan,$kpi,$noindex,$jan,$feb,$mar,$apr,$mei,$jun,$jul,$agt,$sep,$okt,$nov,$des){
    $today=date('Y-m-d');
    /*$query = $this->db->query("select count(kpi) as jum from realisasi where tahun=? and jabatan=? and kpi=?",array($tahun,$jabatan,$kpi));   
    foreach ($query->result() as $row){
      $jum=$row->jum;
    }*/
    $jum = 0;

    if($jum==0){
      $query = $this->db->query("select namaunit from unit where kunit=?",array($unit));   
      foreach ($query->result() as $row){
        $namaunit=$row->namaunit;
      }
      $query = $this->db->query("select namajabatan from jabatan where kojab=?",array($jabatan));   
      foreach ($query->result() as $row){
        $namajabatan=$row->namajabatan;
      }        
      $query = $this->db->query("select namajabatan from jabatan where kojab=?",array($jabatan));   
      foreach ($query->result() as $row){
        $namajabatan=$row->namajabatan;
      }                
      $query = $this->db->query("select * from kpi where kodekpi=?",array($kpi));   
      foreach ($query->result() as $row){
        $namakpi=$row->kpi;
        $deskripsi=$row->deskripsi;          
        $satuan=$row->satuan;
        $rollup=$row->rollup;
        $periode=$row->periode;
      }                        

      $data = array(
          'tahun'       => $tahun,
          'unit'        => $unit,
          'namaunit'    => $namaunit,
          'jabatan'     => $jabatan,
          'namajabatan' => $namajabatan,
          'kpi'         => $kpi,
          'namakpi'     => $namakpi,
          'deskripsi'   => $deskripsi,
          'satuan'      => $satuan,
          'rollup'      => $rollup,
          'periode'     => $periode,
          'jan'         => $jan,            
          'feb'         => $feb,
          'mar'         => $mar,
          'apr'         => $apr,            
          'mei'         => $mei,
          'jun'         => $jun,
          'jul'         => $jul,            
          'agt'         => $agt,
          'sep'         => $sep,
          'okt'         => $okt,            
          'nov'         => $nov,
          'des'         => $des,                                    
          'tglupdate'   => $today,
          'user'        => getSession('user')
      );
      if($noindex == ''){
        $this->db->insert('realisasi', $data);         
      }else{
        $this->db->where('noindex',$noindex);
        $this->db->update('realisasi', $data);  
      }

      $value = $this->db->affected_rows();
      if ($value>0) {
        $data = array(
          'proses'  => 'INPUT REALISASI SKK',
          'note'    => 'REALISASI SKK',
          'user'    => getSession('user'),
          'tgl'     => $today
        );
        $this->db->insert('log', $data);  
      }
    }else{
      $value=-1;
    }
    return $value;
  }  

  /*function carirealisasi($tahun,$unit,$jabatan){

    $data = array(
        'urut'        => getSession('urut')
    );

    $this->db->delete('tampung', $data);             

    $query = $this->db->query("select * from target where tahun=? and jabatan=? and unit=?",array($tahun,$jabatan,$unit));   
    foreach ($query->result() as $row){
      $data = array(
          'ket1'          => $row->tahun,
          'ket2'          => $row->unit,
          'ket3'          => $row->namaunit,
          'ket4'          => $row->jabatan,
          'ket5'          => $row->namajabatan,
          'ket6'          => $row->kpi,
          'ket7'          => $row->namakpi,
          'ket8'          => $row->deskripsi,
          'ket9'          => $row->satuan,
          'ket10'         => $row->rollup,
          'ket11'         => $row->periode,
          'ket12'         => $row->jan,            
          'ket13'         => $row->feb,
          'ket14'         => $row->mar,
          'ket15'         => $row->apr,            
          'ket16'         => $row->mei,
          'ket17'         => $row->jun,
          'ket18'         => $row->jul,            
          'ket19'         => $row->agt,
          'ket20'         => $row->sep,
          'ket21'         => $row->okt,            
          'ket22'         => $row->nov,
          'ket23'         => $row->des,
          'ket24'         => 'a',
          'ket25'         => 'T',
          'urut'        => getSession('urut')
      );
      $this->db->insert('tampung', $data);         
    }

    $query = $this->db->query("select * from realisasi where tahun=? and jabatan=? and unit=?",array($tahun,$jabatan,$unit));   
    foreach ($query->result() as $row){
      $data = array(
          'ket1'          => $row->tahun,
          'ket2'          => $row->unit,
          'ket3'          => $row->namaunit,
          'ket4'          => $row->jabatan,
          'ket5'          => $row->namajabatan,
          'ket6'          => $row->kpi,
          'ket7'          => $row->namakpi,
          'ket8'          => $row->deskripsi,
          'ket9'          => $row->satuan,
          'ket10'         => $row->rollup,
          'ket11'         => $row->periode,
          'ket12'         => $row->jan,            
          'ket13'         => $row->feb,
          'ket14'         => $row->mar,
          'ket15'         => $row->apr,            
          'ket16'         => $row->mei,
          'ket17'         => $row->jun,
          'ket18'         => $row->jul,            
          'ket19'         => $row->agt,
          'ket20'         => $row->sep,
          'ket21'         => $row->okt,            
          'ket22'         => $row->nov,
          'ket23'         => $row->des,
          'ket24'         => 'b',
          'ket25'         => 'R',
          'urut'          => getSession('urut')
      );
      $this->db->insert('tampung', $data);         
    }    

    $data1 = null;
    $query = $this->db->query("SELECT * FROM tampung where urut=? order by ket6,ket24",array(getSession('urut')));    
    foreach ($query->result() as $key => $row) {
      $data1[] = $row;
    }
    return $data1;
  }*/

  function carirealisasi($tahun,$unit,$jabatan){

    $query1 = $this->db->query("select * from target where tahun=? and jabatan=? and unit=?",array($tahun,$jabatan,$unit));

    $query2 = $this->db->query("select * from realisasi where tahun=? and jabatan=? and unit=?",array($tahun,$jabatan,$unit));

    $data1 = null;
    $query = $this->db->query("select * from target where tahun=? and jabatan=? and unit=? UNION select * from realisasi where tahun=? and jabatan=? and unit=? ORDER BY kpi,type",array($tahun,$jabatan,$unit,$tahun,$jabatan,$unit));    
    foreach ($query->result() as $key => $row) {
      $data1[] = $row;
    }
    return $data1;
  }  

  function cetakrealisasi(){
    $data = null;
    $query = $this->db->query("SELECT * FROM tampung where urut=? order by ket6,ket24",array(getSession('urut')));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  /*function hitung($tahun,$bulan,$unit,$jabatan){

    $flag=0;
    $query = $this->db->query("select distinct(jabatan),flag from hasilskk where unit=? and tahun=? and bulan=? and jabatan=?",array($unit,$tahun,$bulan,$jabatan));               
    foreach ($query->result() as $row)
    {
        $flag=$row->flag;
    }
    if ($flag==0){
      $data = array(
        'unit'    => $unit,
        'jabatan' => $jabatan,
        'tahun'   => $tahun,
        'bulan'   => $bulan
      );
      $this->db->delete('hasilskk', $data);

      $totalnkp=0;
      if(($bulan<>6) and ($bulan<>12)){
        $query = $this->db->query("select b.kodepolarisasi,b.polarisasi,b.satuan,a.unit,a.namaunit,a.tahun,a.jabatan,a.kpi,a.namakpi,a.deskripsi,a.satuan,a.rollup,a.periode,a.jan,a.feb,a.mar,a.apr,a.mei,a.jun,a.jul,a.agt,a.sep,a.okt,a.nov,a.des from target a,kpi b where a.kpi=b.kodekpi and a.unit=? and a.tahun=? and a.jabatan=? and b.periode='Bulanan'",array($unit,$tahun,$jabatan));               
      }elseif($bulan==6){
        $query = $this->db->query("select b.kodepolarisasi,b.polarisasi,a.unit,a.namaunit,a.tahun,a.jabatan,a.kpi,a.namakpi,a.deskripsi,a.satuan,a.rollup,a.periode,a.jan,a.feb,a.mar,a.apr,a.mei,a.jun,a.jul,a.agt,a.sep,a.okt,a.nov,a.des from target a,kpi b where a.kpi=b.kodekpi and a.unit=? and a.tahun=? and a.jabatan=? and (b.periode like 'Semester%' or b.periode='Bulanan')",array($unit,$tahun,$jabatan));                   
      }elseif($bulan==12){
        $query = $this->db->query("select b.kodepolarisasi,b.polarisasi,a.unit,a.namaunit,a.tahun,a.jabatan,a.kpi,a.namakpi,a.deskripsi,a.satuan,a.rollup,a.periode,a.jan,a.feb,a.mar,a.apr,a.mei,a.jun,a.jul,a.agt,a.sep,a.okt,a.nov,a.des from target a,kpi b where a.kpi=b.kodekpi and a.unit=? and a.tahun=? and a.jabatan=?",array($unit,$tahun,$jabatan));                   
      }
      foreach ($query->result() as $row)
      {
        $nilaitarget=0;$nilaireal=0;$nilaidetbobot=0;

        if($bulan==1) $nilaitarget = $row->jan;
        if($bulan==2) $nilaitarget = $row->feb;
        if($bulan==3) $nilaitarget = $row->mar;
        if($bulan==4) $nilaitarget = $row->apr;
        if($bulan==5) $nilaitarget = $row->mei;
        if($bulan==6) $nilaitarget = $row->jun;
        if($bulan==7) $nilaitarget = $row->jul;
        if($bulan==8) $nilaitarget = $row->agt;
        if($bulan==9) $nilaitarget = $row->sep;
        if($bulan==10) $nilaitarget = $row->okt;
        if($bulan==11) $nilaitarget = $row->nov;
        if($bulan==12) $nilaitarget = $row->des;      

        $kpi=$row->kpi;
        $kodepolarisasi=$row->kodepolarisasi;
        $polarisasi=$row->polarisasi;
        $satuan=$row->satuan;

        $query = $this->db->query("select * from polarisasi where kode=?",array($kodepolarisasi));               
        foreach ($query->result() as $row1)
        {
            $formula=$row1->formula;
            $konstanta=$row1->konstanta;
        }                                         

        //$nilaidetbobot=0;        
        $query = $this->db->query("select * from bobot where unit=? and jabatan=? and tahun=? and kpi=?",array($unit,$jabatan,$tahun,$kpi));
        foreach ($query->result() as $row2)
        {
          if(($bulan<>6) and ($bulan<>12)){
            $nilaidetbobot=$row2->bobotbln;
          }elseif($bulan==6){
            $nilaidetbobot=$row2->bobotsmt;
          }elseif($bulan==12){
            $nilaidetbobot=$row2->bobotthn;
          }
        }                                         

        // $tglupdate ='';
        $query = $this->db->query("select * from realisasi where kpi=? and unit=? and jabatan=? and tahun=?",array($row->kpi,$unit,$jabatan,$tahun));
        $cekreal=0;
        foreach ($query->result() as $row3)
        {
            // $tglupdate = $row1->tglupdate;
            if($bulan==1) $nilaireal = $row3->jan;
            if($bulan==2) $nilaireal = $row3->feb;
            if($bulan==3) $nilaireal = $row3->mar;
            if($bulan==4) $nilaireal = $row3->apr;
            if($bulan==5) $nilaireal = $row3->mei;
            if($bulan==6) $nilaireal = $row3->jun;
            if($bulan==7) $nilaireal = $row3->jul;
            if($bulan==8) $nilaireal = $row3->agt;
            if($bulan==9) $nilaireal = $row3->sep;
            if($bulan==10) $nilaireal = $row3->okt;
            if($bulan==11) $nilaireal = $row3->nov;
            if($bulan==12) $nilaireal = $row3->des;            
        }   
        if ($nilaireal<>''){
          $nilaireal=$nilaireal;
          $cekreal=1;
        }else{
          $nilaireal=0;
          $cekreal=0;
        }

        $result=0;
        $absnilaitarget=abs($nilaitarget);
        if ($kodepolarisasi==9){
          if ($nilaireal==0){
            $result=100;
          }else{
            $result=0;
          }
        }else{              
          $var = array('A','T','K');
          $nil = array($nilaireal,$absnilaitarget,$konstanta);
          $rumus2 = str_replace($var, $nil, $formula);
          //echo $nilaireal.'-'.$absnilaitarget.'|'.$rumus2;  
          eval( '$result = (' . $rumus2 . ');' );
        }

        $nkp=($nilaidetbobot*$result)/100;
        $totalnkp=$totalnkp+$nkp;

        $data = array(
             'unit'             => $unit,
             'jabatan'          => $jabatan,
             'tahun'            => $tahun,
             'bulan'            => $bulan,
             'kodekpi'          => $row->kpi,
             'kpi'              => $row->namakpi,
             'kodepolarisasi'   => $kodepolarisasi,
             'polarisasi'       => $polarisasi,
             'satuan'           => $satuan,
             'target'           => $nilaitarget,
             'realisasi'        => $nilaireal,
             'indekcapaiankpi'  => $result,
             'indekkpi'         => $nilaidetbobot,
             'nkp'              => $nkp,
             'tglentry'         => date('Y-m-d'),                                
             'user'             => getSession('user')
        );   
        $this->db->insert('hasilskk', $data);          
      }
      $data = array(
           'unit'             => $unit,
           'jabatan'          => $jabatan,
           'tahun'            => $tahun,
           'bulan'            => $bulan,
           'totalnkp'         => $totalnkp,
           'tglentry'         => date('Y-m-d'),                                
           'user'             => getSession('user')
      );   
      $this->db->insert('rekapskk', $data);                
    }

    $data1 = null;
    $query = $this->db->query("SELECT * FROM hasilskk where unit=? and jabatan=? and tahun=? and bulan=? order by kodekpi",array($unit,$jabatan,$tahun,$bulan));    
    foreach ($query->result() as $key => $row) {
      $data1[] = $row;
    }
    return $data1;
  } */ 

  function hitung($tahun,$bulan,$unit,$jabatan){
    
    $data = array(
      'unit'    => $unit,
      'jabatan' => $jabatan,
      'tahun'   => $tahun,
      'bulan'   => $bulan
    );
    $check_hasil = $this->db->where($data)->get('hasilskk')->num_rows();
    //$this->db->delete('hasilskk', $data);

    $totalnkp=0;
    if(($bulan<>6) and ($bulan<>12)){
      $query = $this->db->query("select b.kodepolarisasi,b.polarisasi,b.satuan,a.unit,a.namaunit,a.tahun,a.jabatan,a.kpi,a.namakpi,a.deskripsi,a.satuan,a.rollup,a.periode,a.jan,a.feb,a.mar,a.apr,a.mei,a.jun,a.jul,a.agt,a.sep,a.okt,a.nov,a.des from target a,kpi b where a.kpi=b.kodekpi and a.unit=? and a.tahun=? and a.jabatan=? and b.periode='Bulanan'",array($unit,$tahun,$jabatan));               
    }elseif($bulan==6){
      $query = $this->db->query("select b.kodepolarisasi,b.polarisasi,a.unit,a.namaunit,a.tahun,a.jabatan,a.kpi,a.namakpi,a.deskripsi,a.satuan,a.rollup,a.periode,a.jan,a.feb,a.mar,a.apr,a.mei,a.jun,a.jul,a.agt,a.sep,a.okt,a.nov,a.des from target a,kpi b where a.kpi=b.kodekpi and a.unit=? and a.tahun=? and a.jabatan=? and (b.periode like 'Semester%' or b.periode='Bulanan')",array($unit,$tahun,$jabatan));                   
    }elseif($bulan==12){
      $query = $this->db->query("select b.kodepolarisasi,b.polarisasi,a.unit,a.namaunit,a.tahun,a.jabatan,a.kpi,a.namakpi,a.deskripsi,a.satuan,a.rollup,a.periode,a.jan,a.feb,a.mar,a.apr,a.mei,a.jun,a.jul,a.agt,a.sep,a.okt,a.nov,a.des from target a,kpi b where a.kpi=b.kodekpi and a.unit=? and a.tahun=? and a.jabatan=?",array($unit,$tahun,$jabatan));                   
    }
    // print_r($query->result());
    foreach ($query->result() as $row)
    {
      $nilaitarget=0;$nilaireal=0;$nilaidetbobot=0;

      if($bulan==1) $nilaitarget = $row->jan;
      if($bulan==2) $nilaitarget = $row->feb;
      if($bulan==3) $nilaitarget = $row->mar;
      if($bulan==4) $nilaitarget = $row->apr;
      if($bulan==5) $nilaitarget = $row->mei;
      if($bulan==6) $nilaitarget = $row->jun;
      if($bulan==7) $nilaitarget = $row->jul;
      if($bulan==8) $nilaitarget = $row->agt;
      if($bulan==9) $nilaitarget = $row->sep;
      if($bulan==10) $nilaitarget = $row->okt;
      if($bulan==11) $nilaitarget = $row->nov;
      if($bulan==12) $nilaitarget = $row->des;      

      $kpi=$row->kpi;
      $kodepolarisasi=$row->kodepolarisasi;
      $polarisasi=$row->polarisasi;
      $satuan=$row->satuan;

      $query = $this->db->query("select * from polarisasi where kode=?",array($kodepolarisasi));               
      foreach ($query->result() as $row1)
      {
          $formula=$row1->formula;
          $konstanta=$row1->konstanta;
      }                                         

      //$nilaidetbobot=0;        
      $query = $this->db->query("select * from bobot where unit=? and jabatan=? and tahun=? and kpi=?",array($unit,$jabatan,$tahun,$kpi));
      foreach ($query->result() as $row2)
      {
        if(($bulan<>6) and ($bulan<>12)){
          $nilaidetbobot=$row2->bobotbln;
        }elseif($bulan==6){
          $nilaidetbobot=$row2->bobotsmt;
        }elseif($bulan==12){
          $nilaidetbobot=$row2->bobotthn;
        }
      }                                         

      // $tglupdate ='';
      $query = $this->db->query("select * from realisasi where kpi=? and unit=? and jabatan=? and tahun=?",array($row->kpi,$unit,$jabatan,$tahun));
      $cekreal=0;
      foreach ($query->result() as $row3)
      {
          // $tglupdate = $row1->tglupdate;
          if($bulan==1) $nilaireal = $row3->jan;
          if($bulan==2) $nilaireal = $row3->feb;
          if($bulan==3) $nilaireal = $row3->mar;
          if($bulan==4) $nilaireal = $row3->apr;
          if($bulan==5) $nilaireal = $row3->mei;
          if($bulan==6) $nilaireal = $row3->jun;
          if($bulan==7) $nilaireal = $row3->jul;
          if($bulan==8) $nilaireal = $row3->agt;
          if($bulan==9) $nilaireal = $row3->sep;
          if($bulan==10) $nilaireal = $row3->okt;
          if($bulan==11) $nilaireal = $row3->nov;
          if($bulan==12) $nilaireal = $row3->des;            
      }   
      if ($nilaireal<>''){
        $nilaireal=$nilaireal;
        $cekreal=1;
      }else{
        $nilaireal=0;
        $cekreal=0;
      }

      $result=0;
      $absnilaitarget=abs($nilaitarget);
      if ($kodepolarisasi==9){
        if ($nilaireal==0){
          $result=100;
        }else{
          $result=0;
        }
      }else{              
        $var = array('A','T','K');
        $nil = array($nilaireal,$absnilaitarget,$konstanta);
        $rumus2 = str_replace($var, $nil, $formula);
        //echo $nilaireal.'-'.$absnilaitarget.'|'.$rumus2;  
        eval( '$result = (' . $rumus2 . ');' );
      }

      $nkp=($nilaidetbobot*$result)/100;
      $totalnkp=$totalnkp+$nkp;

      $data = array(
           'unit'             => $unit,
           'jabatan'          => $jabatan,
           'tahun'            => $tahun,
           'bulan'            => $bulan,
           'kodekpi'          => $row->kpi,
           'kpi'              => $row->namakpi,
           'kodepolarisasi'   => $kodepolarisasi,
           'polarisasi'       => $polarisasi,
           'satuan'           => $satuan,
           'target'           => $nilaitarget,
           'realisasi'        => $nilaireal,
           'indekcapaiankpi'  => $result,
           'indekkpi'         => $nilaidetbobot,
           'nkp'              => $nkp,
           'tglentry'         => date('Y-m-d'),                                
           'user'             => getSession('user')
      );

      if($check_hasil>0){
        $this->db->where('unit',$unit)
                  ->where('jabatan',$jabatan)
                  ->where('tahun',$tahun)
                  ->where('bulan',$bulan)
                  ->where('kodekpi',$row->kpi)
                  ->update('hasilskk',$data);
      }else{
        $this->db->insert('hasilskk', $data);
      }         
    }

    $data = array(
         'unit'             => $unit,
         'jabatan'          => $jabatan,
         'tahun'            => $tahun,
         'bulan'            => $bulan,
         'totalnkp'         => $totalnkp,
         'tglentry'         => date('Y-m-d'),                                
         'user'             => getSession('user')
    ); 

    if($check_hasil>0){
      $this->db->where('unit',$unit)
      ->where('jabatan',$jabatan)
      ->where('tahun',$tahun)
      ->where('bulan',$bulan)
      ->update('rekapskk',$data);
    }else{
      $this->db->insert('rekapskk', $data); 
    }               

    $data1 = null;
    $query = $this->db->query("SELECT * FROM hasilskk where unit=? and jabatan=? and tahun=? and bulan=? order by kodekpi",array($unit,$jabatan,$tahun,$bulan));    
    foreach ($query->result() as $key => $row) {
      $data1[] = $row;
    }
    return $data1;
  }  

  function carireporthasilskk($tahun,$bulan,$unit,$jabatan){

    $data = array(
        'urut'        => getSession('urut')
    );
    $this->db->delete('tampung', $data);             

    // $query = $this->db->query("select * from hasilskk where tahun=? and bulan=? and jabatan=? and unit=?",array($tahun,$bulan,$jabatan,$unit));   
    $query = $this->db->query("select b.namaunit,c.namajabatan,a.tahun,a.bulan,a.kodekpi,a.kpi,a.polarisasi,a.satuan,a.target,a.realisasi,a.indekcapaiankpi,a.indekkpi,a.nkp from hasilskk a,unit b,jabatan c where a.unit=b.kunit and a.jabatan=c.kojab and a.tahun=? and a.bulan=? and a.jabatan=? and a.unit=?",array($tahun,$bulan,$jabatan,$unit));       
    foreach ($query->result() as $row){
      if($row->bulan=='1') $bulan = 'Januari';
      if($row->bulan=='2') $bulan = 'Februari';
      if($row->bulan=='3') $bulan = 'Maret';
      if($row->bulan=='4') $bulan = 'April';
      if($row->bulan=='5') $bulan = 'Mei';
      if($row->bulan=='6') $bulan = 'Juni';
      if($row->bulan=='7') $bulan = 'Juli';
      if($row->bulan=='8') $bulan = 'Agustus';
      if($row->bulan=='9') $bulan = 'September';
      if($row->bulan=='10') $bulan = 'Oktober';
      if($row->bulan=='11') $bulan = 'November';
      if($row->bulan=='12') $bulan = 'Desember';
      $data = array(
          'ket1'          => $row->namaunit,
          'ket2'          => $row->namajabatan,
          'ket3'          => $row->tahun,
          'ket4'          => $bulan,
          'ket5'          => $row->kodekpi,
          'ket6'          => $row->kpi,
          'ket7'          => $row->polarisasi,
          'ket8'          => $row->satuan,
          'ket9'          => $row->target,
          'ket10'         => $row->realisasi,
          'ket11'         => $row->indekcapaiankpi,
          'ket12'         => $row->indekkpi,            
          'ket13'         => $row->nkp,
          'urut'          => getSession('urut')
      );
      $this->db->insert('tampung', $data);         
    }    

    $data1 = null;
    $query = $this->db->query("SELECT * FROM tampung where urut=? order by ket5",array(getSession('urut')));    
    foreach ($query->result() as $key => $row) {
      $data1[] = $row;
    }
    return $data1;
  }  

  // function cetakhasilskk($tahun,$bulan,$unit,$jabatan){
  function cetakhasilskk(){
    $data = null;
    // $query = $this->db->query("SELECT * FROM hasilskk where tahun=? and bulan=? and unit=? and jabatan=? order by kodekpi",array($tahun,$bulan,$unit,$jabatan));
    $query = $this->db->query("SELECT * FROM tampung where urut=? order by ket5",array(getSession('urut')));    
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  // function getsatuan(){
  //   $data = null;
  //   $query = $this->db->query("SELECT satuan FROM satuan order by satuan");
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

  // function getrollup(){
  //   $data = null;
  //   $query = $this->db->query("select rollup from rollup order by rollup");
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

  // function getpolarisasi(){
  //   $data = null;
  //   $query = $this->db->query("select kode,polarisasi from polarisasi order by polarisasi");
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

  // function getperiode(){
  //   $data = null;
  //   $query = $this->db->query("select periode from periode order by periode");
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

  // function getdataskk($nama){
  //   $carinama = "";
  //   if ($nama!='' or $nama!=null) {
  //     $carinama = " AND (skk like '%".$nama."%' or kodeskk like '%".$nama."%' or deskripsi like '%".$nama."%')";
  //   }

  //   $data = null;
  //   $sql = "SELECT * FROM skk WHERE 1=1";
  //   $query = $this->db->query($sql.$carinama." ORDER BY noindex");
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

  // function simpandetskk($noindex,$tahun,$unit,$jabatan,$kpi,$skkbln,$skksmt,$skkthn){
  //   $query = $this->db->query("select namaunit from unit where kunit=?",array($unit));   
  //   foreach ($query->result() as $row){
  //       $namaunit=$row->namaunit;
  //   }
  //   $query = $this->db->query("select namajabatan from jabatan where kojab=?",array($jabatan));   
  //   foreach ($query->result() as $row){
  //       $namajabatan=$row->namajabatan;
  //   }    
  //   $query = $this->db->query("select kpi from kpi where kodekpi=?",array($kpi));   
  //   foreach ($query->result() as $row){
  //       $namakpi=$row->kpi;
  //   }        

  //   if($noindex==''){
  //     $data = array(
  //         'ket1'     => $tahun,
  //         'ket2'     => $unit,
  //         'ket3'     => $namaunit,
  //         'ket4'     => $jabatan,
  //         'ket5'     => $namajabatan,
  //         'ket6'     => $kpi,
  //         'ket7'     => $namakpi,
  //         'ket8'     => $skkbln,
  //         'ket9'     => $skksmt,
  //         'ket10'    => $skkthn,
  //         'urut'     => getSession('urut')
  //     );
  //     $this->db->insert('tampung', $data);   
  //   }else{
  //     $data = array(
  //         'ket1'     => $tahun,
  //         'ket2'     => $unit,
  //         'ket3'     => $namaunit,
  //         'ket4'     => $jabatan,
  //         'ket5'     => $namajabatan,
  //         'ket6'     => $kpi,
  //         'ket7'     => $namakpi,
  //         'ket8'     => $skkbln,
  //         'ket9'     => $skksmt,
  //         'ket10'    => $skkthn,
  //         'urut'     => getSession('urut')
  //     );
  //     $this->db->where('noindex', $noindex);         
  //     $this->db->update('tampung', $data);         
  //   }

  //   $data = null;
  //   $query = $this->db->query("SELECT * FROM tampung where urut=? ORDER BY noindex",array(getSession('urut')));
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

  // function hapusskk($noindex){    
  //     $data = array(
  //         'noindex'     => $noindex,
  //     );
  //     $this->db->delete('tampung', $data);     

  //   $data = null;
  //   $query = $this->db->query("SELECT * FROM tampung where urut=? ORDER BY noindex",array(getSession('urut')));    
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

  /*function getEditSkk($noindex){
    $data = null;
    $query = $this->db->query("SELECT * FROM tampung WHERE noindex=?",array($noindex));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }*/

  // function cariotokodeskk($kelompok){
  //   $data = null;
  //   $kelompokx=$kelompok.'%';
  //   $query = $this->db->query("select count(urutkel) as urut from skk where kodeskk like ?",array($kelompokx));
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //     $urut=$row->urut+1;
  //     $kode=$kelompok.$urut;
  //     $data[$key]->kode = $kode;      
  //   }
  //   return $data;
  // }

  // function updateskk($noindex1,$kelompok1,$kodeskk1,$namaskk1,$deskripsi1,$target1,$satuan1,$rollup1,$polarisasi1,$periode1,$formula1){
  //   $today=date('Y-m-d');

  //   $query = $this->db->query("select * from polarisasi where kode=?",array($polarisasi1));   
  //   foreach ($query->result() as $row){
  //       $namapolarisasi=$row->polarisasi;
  //   }
 
  //   if ($kelompok1=='F'){$kelompokx=1;}
  //   if ($kelompok1=='C'){$kelompokx=2;}
  //   if ($kelompok1=='I'){$kelompokx=3;}
  //   if ($kelompok1=='L'){$kelompokx=4;}

  //   $data = array(
  //       'kodeskk'       => $kodeskk1,
  //       'skk'           => $namaskk1,
  //       'deskripsi'     => $deskripsi1,
  //       'target'        => $target1,
  //       'satuan'        => $satuan1,
  //       'rollup'        => $rollup1,
  //       'kodepolarisasi'=> $polarisasi1,
  //       'polarisasi'    => $namapolarisasi,            
  //       'periode'       => $periode1,
  //       'formula'       => $formula1,
  //       'kelompok'      => $kelompokx,
  //       'urutkel'       => substr($kodeskk1,1,5),
  //       'tglupdate'     => $today,
  //       'user'          => getSession('user')
  //   );
  //   $this->db->update('skk', $data, array('noindex' => $noindex1));  

  //   // $data = array(
  //   //     'skk'  => $namaskk1,
  //   //     'deskripsi'   => $deskripsiskk1,
  //   //     'formula'     => $formula1,
  //   //     'konstanta'   => $konstanta1,        
  //   //     'user'        => getSession('user'),
  //   //     'tglupdate'   => $today
  //   // );
  //   // $this->db->update('skk', $data, array('noindex' => $noindex));  

  //   $value = $this->db->affected_rows();
  //   if ($value>0) {
  //     $data = array(
  //       'proses'  => 'EDIT skk',
  //       'note'    => $namaskk1,
  //       'user'    => getSession('user'),
  //       'tgl'     => $today
  //     );
  //     $this->db->insert('log', $data);  
  //   }
  //   return $value;
  // }  

  // function deleteskk($noindex2,$kelompok2,$kodeskk2,$namaskk2,$deskripsi2,$target2,$satuan2,$rollup2,$polarisasi2,$periode2,$formula2){
  //   $today=date('Y-m-d');

  //   $data = array(
  //       'noindex' => $noindex2
  //   );
  //   $this->db->delete('skk', $data);      
  //   $value = $this->db->affected_rows();
  //   if ($value>0) {
  //     $data = array(
  //       'proses'  => 'HAPUS skk',
  //       'note'    => $namaskk2,
  //       'user'    => getSession('user'),
  //       'tgl'     => $today
  //     );
  //     $this->db->insert('log', $data);  
  //   }
  //   return $value;
  // }

  public function getKPI($tahun,$unit,$jabatan)
  {
      $data = $this->db->where('tahun',$tahun)
              ->where('jabatan',$jabatan)
              ->where('unit',$unit)
              ->get('bobot')
              ->result();
      return $data; 
  }

  public function checkKPI($tahun,$unit,$jabatan,$kpi)
  {
      $data = $this->db->where('tahun',$tahun)
              ->where('jabatan',$jabatan)
              ->where('unit',$unit)
              ->where('kpi',$kpi)
              ->get('target')
              ->result();
      return $data; 
  }

  function getJabatan($unit){
    $data = null;

    if(getSession('role')=='HCMM' || getSession('role')=='Admin'){
      $query = $this->db->where('kojab',getSession('kojab'))
               ->get('jabatan');
      // $query = $this->db->where('kojab1',getSession('kojab'))
              // ->join('jabatan','jabatan.kojab = strukturjab.kojab2')
              // ->get('strukturjab');
    }else{
      $query = $this->db->where('unit_id',$unit)
        ->where('kojab',getSession('kojab'))
        ->join('unit','unit.kunit = jabatan_unit.unit_id')
        ->join('jabatan','jabatan.kojab = jabatan_unit.jabatan_id')
        ->get('jabatan_unit');
    }
    
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }  

  function getJabatanRealisasi($unit){
    $data = null;

    // if(getSession('role')=='HCMM' || getSession('role')=='Admin'){
      $query = $this->db->where('kojab',getSession('kojab'))
               ->get('jabatan');
      // $query = $this->db->where('kojab1',getSession('kojab'))
              // ->join('jabatan','jabatan.kojab = strukturjab.kojab2')
              // ->get('strukturjab');
    // }else{
    //   $query = $this->db->where('unit_id',$unit)
    //     ->where('kojab',getSession('kojab'))
    //     ->join('unit','unit.kunit = jabatan_unit.unit_id')
    //     ->join('jabatan','jabatan.kojab = jabatan_unit.jabatan_id')
    //     ->get('jabatan_unit');
    // }
    
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }    

}
?>