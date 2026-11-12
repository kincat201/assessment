<?php
class Stdknowhow_model extends MY_Model{

  function getjabatanList($strData){
    $data=null;
    $str = '%'.$strData.'%';
    $query  = $this->db->query("select * from jabatan where namajabatan like ?",$str);
    foreach ($query->result() as $row)
    { 
      $data[] = $row;
    }
    return $data;    
  } 

  function caristdknowhow($kojab){
    $value = "NOK";
  
    $dbb = $this->load->database('fb1',true);

    // $data = array(
    //   'urut' => getSession('user')
    // );
    // $dbb->delete('tampung', $data);  
  
    // $query = $dbb->query("select * from stdknowhow where kojab=?",array($kojab));
    // foreach ($query->result() as $row)
    // {               
    //      $data = array(
    //         'ket1'   => $row->kojab,
    //         'ket2'   => $row->fe,
    //         'ket3'   => $row->ie,
    //         'ket4'   => $row->ex,
    //         'ket5'   => $row->bs,
    //         'ket6'   => $row->tsmkt,
    //         'ket7'   => $row->tsest,
    //         'ket8'   => $row->tsppc,
    //         'ket9'   => $row->tscon,
    //         'ket10'   => $row->tsqac,
    //         'ket11'   => $row->tsman,
    //         'ket12'   => $row->tssar,
    //         'ket13'   => $row->tscs,
    //         'ket14'   => $row->tspeng,
    //         'ket15'   => $row->tsfat,
    //         'ket16'   => $row->tshse,
    //         'ket17'   => $row->tshrd,
    //         'ket18'   => $row->tsga,
    //         'ket19'   => $row->tsmd,
    //         'ket20'   => $row->tsmr,
    //         'ket21'   => $row->tsengmech,
    //         'ket22'   => $row->tsengelec,
    //         'ket23'   => $row->tsenginst,
    //         'ket24'   => $row->tsengciv,
    //         'ket25'   => $row->tssd,
    //         'ket26'   => $row->tsia,
    //         'ket27'   => $row->tstop,
    //        'urut' => getSession('user')
    //     );   
    //     $dbb->insert('tampung', $data);          
    // }   

  $cek=0;
  // $query = $dbb->query("select * from tampung where urut='" .$_SESSION['username']."'");
  $query = $dbb->query("select * from stdknowhow where kojab=?",array($kojab));  
  foreach ($query->result() as $row)
  { 
      $data1[] = $row;
      $cek=1;
  }
    
  if ($cek==1) {
      return $data1;      
  }else{ 
      $data1=0;
      return $data1;      
  }
}

  // function carireportstdknowhow($kojab){
  //   $value = "NOK";
  
  //   $dbb = $this->load->database('fb1',true);

  //     $query = $dbb->query("select * from pegawai");  
  //     foreach ($query->result() as $row)
  //     {
  //         $query = $dbb->query("select * from jabatan where namajabatan=?",array($row->namajab));  
  //         foreach ($query->result() as $row1)
  //         {        
  //           $kodejab=$row1->kojab;
  //         } 
  //         $query = $dbb->query("select * from unit where namaunit=?",array($row->namaunit));  
  //         foreach ($query->result() as $row2)
  //         {        
  //           $kodeunit=$row2->kunit;
  //         }           

  //         $data = array(
  //           'unit'      => $kodeunit,
  //           'jabatan'   => $kodejab
  //         );          
  //         $dbb->update('pegawai',$data, array('nik' => $row->nik));                    
  //     }

  //     $cek=0;
  //     $query = $dbb->query("select * from pegawai");  
  //     foreach ($query->result() as $row)
  //     { 
  //         $data1[] = $row;
  //         $cek=1;
  //     }
        
  //     if ($cek==1) {
  //         return $data1;      
  //     }else{ 
  //         $data1=0;
  //         return $data1;      
  //     }
  // }

  function carireportstdknowhow($kojab){
    $value = "NOK";
  
    $dbb = $this->load->database('fb1',true);

    $data = array(
      'urut' => getSession('user')
    );
    $dbb->delete('tampung', $data);  
    $dbb->delete('tampung2', $data);
  
    $query = $dbb->query("select * from stdknowhow where kojab=?",array($kojab));
    foreach ($query->result() as $row)
    {               
        $data = array(
            'ket1'   => 'FE',
            'ket2'   => $row->fe,
            'ket3'   => 'Formal Education',
            'jum1'   => 1,            
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);          
        $data = array(
            'ket1'   => 'IE',
            'ket2'   => $row->ie,
            'ket3'   => 'Informal Education',
            'jum1'   => 2,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'EX',
            'ket2'   => $row->ex,
            'ket3'   => 'Experience',
            'jum1'   => 3,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'BS',
            'ket2'   => $row->bs,
            'ket3'   => 'Business Skill',
            'jum1'   => 4,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MKT',            
            'ket2'   => $row->tsmkt,
            'ket3'   => 'Technical Skill Marketing',
            'jum1'   => 5,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-EST',
            'ket2'   => $row->tsest,
            'ket3'   => 'Technical Skill Estimation',
            'jum1'   => 6,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-PPC',
            'ket2'   => $row->tsppc,
            'ket3'   => 'Technical Skill Planning & Control',
            'jum1'   => 7,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-CON',
            'ket2'   => $row->tscon,
            'ket3'   => 'Technical Skill Construction',
            'jum1'   => 8,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-QAC',
            'ket2'   => $row->tsqac,
            'ket3'   => 'Technical Skill QA/QC',
            'jum1'   => 9,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MAN',
            'ket2'   => $row->tsman,
            'ket3'   => 'Technical Skill Maintenance Elektrikal,Instrument,IT,Mekanikal,Utility',
            'jum1'   => 10,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-SAR',
            'ket2'   => $row->tssar,
            'ket3'   => 'Technical Skill Sarana Angkutan',
            'jum1'   => 11,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-CS',
            'ket2'   => $row->tscs,
            'ket3'   => 'Technical Skill Coorporate Secretary',
            'jum1'   => 12,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-PENG',
            'ket2'   => $row->tspeng,
            'ket3'   => 'Technical Skill Pengadaan',
            'jum1'   => 13,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-FAT',
            'ket2'   => $row->tsfat,
            'ket3'   => 'Technical Skill Finance,Accounting and Tax',
            'jum1'   => 14,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-HSE',
            'ket2'   => $row->tshse,
            'ket3'   => 'Technical Skill HEALTH SAFETY & ENVIRONMENT/OHSAS/K3',
            'jum1'   => 15,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-HRD',
            'ket2'   => $row->tshrd,
            'ket3'   => 'Technical Skill HRD',
            'jum1'   => 16,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-GA',
            'ket2'   => $row->tsga,
            'ket3'   => 'Technical Skill GENERAL AFFAIRS',
            'jum1'   => 17,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MD',
            'ket2'   => $row->tsmd,
            'ket3'   => 'Technical Skill Manajement Development',
            'jum1'   => 18,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MR',
            'ket2'   => $row->tsmr,
            'ket3'   => 'Technical Skill Manajemen Representative',
            'jum1'   => 19,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-MECH',
            'ket2'   => $row->tsengmech,
            'ket3'   => 'Technical Skill Engineering Mechanical',
            'jum1'   => 20,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-ELEC',
            'ket2'   => $row->tsengelec,
            'ket3'   => 'Technical Skill Engineering Electrical',
            'jum1'   => 21,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-INST',
            'ket2'   => $row->tsenginst,
            'ket3'   => 'Technical Skill Engineering Instrumentation',
            'jum1'   => 22,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-CIV',
            'ket2'   => $row->tsengciv,
            'ket3'   => 'Technical Skill Engineering Civil Structure',
            'jum1'   => 23,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
        $data = array(
            'ket1'   => 'TS-SD',
            'ket2'   => $row->tssd,
            'ket3'   => 'Technical Skill System Development',
            'jum1'   => 24,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
        $data = array(
            'ket1'   => 'TS-IA',
            'ket2'   => $row->tsia,
            'ket3'   => 'Technical Skill Internal Audit',
            'jum1'   => 25,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
        $data = array(
            'ket1'   => 'TS-TOP',
            'ket2'   => $row->tstop,
            'ket3'   => 'Technical Skill Top Management',
            'jum1'   => 26,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
    }   

    $warna='';
    // $cek1='';
    // $cek2='';
    // $cek3='';
    // $cek4='';
    // $cek5='';
    $query = $dbb->query("select * from tampung where urut='" .getSession('user')."' order by jum1");  
    foreach ($query->result() as $row)
    {               
      $cek1='';$cek2='';$cek3='';$cek4='';$cek5='';

      if($row->ket2==1){
        $cek1='X';
        $warna='yellow';
      }elseif($row->ket2==2){
        $cek2='X';
        $warna='yellow';
      }elseif($row->ket2==3){
        $cek3='X';
        $warna='yellow';
      }elseif($row->ket2==4){
        $cek4='X';
        $warna='yellow';
      }elseif($row->ket2==5){
        $cek5='X';
        $warna='yellow';
      }
        $data = array(
            'ket1'   => $row->ket1,
            'ket2'   => $cek1,
            'ket3'   => $cek2,
            'ket4'   => $cek3,
            'ket5'   => $cek4,
            'ket6'   => $cek5,
            'jum1'   => $row->jum1,
            'ket7'   => $warna,
            'ket8'   => $row->ket3,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung2', $data);                                        
    }    

  $cek=0;
  $query = $dbb->query("select * from tampung2 where urut='" .getSession('user')."' order by jum1");  
  foreach ($query->result() as $row)
  { 
      $data1[] = $row;
      $cek=1;
  }
    
  if ($cek==1) {
      return $data1;      
  }else{ 
      $data1=0;
      return $data1;      
  }
}

function cetakstdknowhow(){
  $data=null;
  $dbb = $this->load->database('fb1',true);
  $query = $dbb->query("select * from tampung2 where urut=? order by jum1",getSession('user'));
  foreach ($query->result() as $row)
  { 
    $data[] = $row;
    $cek=1;
  }
  if ($cek==1) {
     return $data;      
  }
  else 
  { 
     $data1=0;
     return $data;      
  }
}

  function simpanstdknowhow($kojab,$jabatan,$fe,$ie,$ex,$bs,$tsmkt,$tsest,$tsppc,$tscon,$tsqac,$tsman,$tssar,$tscs,$tspeng,$tsfat,$tshse,$tshrd,$tsga,$tsmd,$tsmr,$tsengmech,$tsengelec,$tsenginst,$tsengciv,$tssd,$tsia,$tstop){
    $today=date('Y-m-d h:i:s');

    $data = array(
        'kojab'     =>  $kojab,
        'namajab'   =>  $jabatan,
        'fe'        =>  $fe,
        'ie'        =>  $ie,
        'ex'        =>  $ex,
        'bs'        =>  $bs,
        'tsmkt'     =>  $tsmkt,
        'tsest'     =>  $tsest,
        'tsppc'     =>  $tsppc,
        'tscon'     =>  $tscon,
        'tsqac'     =>  $tsqac,
        'tsman'     =>  $tsman,
        'tssar'     =>  $tssar,
        'tscs'      =>  $tscs,
        'tspeng'    =>  $tspeng,
        'tsfat'     =>  $tsfat,
        'tshse'     =>  $tshse,
        'tshrd'     =>  $tshrd,
        'tsga'      =>  $tsga,
        'tsmd'      =>  $tsmd,
        'tsmr'      =>  $tsmr,
        'tsengmech' =>  $tsengmech,
        'tsengelec' =>  $tsengelec,
        'tsenginst' =>  $tsenginst,
        'tsengciv'  =>  $tsengciv,
        'tssd'      =>  $tssd,
        'tsia'      =>  $tsia,
        'tstop'     =>  $tstop,
        'user'      =>  getSession('user'),
        'tglentry'  =>  $today
    );
    $this->db->insert('stdknowhow', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT STANDAR KNOWHOW',
        'note'    => $kojab.' - '.$jabatan,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  


  function simpanjabatan($nama){
    $today=date('Y-m-d h:i:s');

    $data = array(
        'namajabatan' => $nama,
        'user'        => getSession('user'),
        'tgl'         => $today
    );
    $this->db->insert('jabatan', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT JABATAN',
        'note'    => $nama,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatajabatan($nama){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND namajabatan like '%".$nama."%'";
    }

    $data = null;
    $sql = "SELECT * FROM jabatan WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY KOJAB");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getjabatanbykojab($kojab){
    $data = null;
    $query = $this->db->query("SELECT * FROM jabatan WHERE kojab =?",array($kojab));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updatejabatan($kojab,$nama){
    $today=date('Y-m-d h:i:s');

    $data = array(
        'namajabatan' => $nama,
        'user'        => getSession('user'),
        'tgl'         => $today
    );
    $this->db->update('jabatan', $data, array('kojab' => $kojab));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT JABATAN',
        'note'    => $nama,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

}
?>