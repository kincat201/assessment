<?php
class M_masterska extends MY_Model{

  function simpanmasterska($kodeska,$namaska,$ijasah){
    $today=date('Y-m-d h:i:s');

    $data = array(
        'kodeska' => $kodeska,
        'namaska' => $namaska,
        'ijasah'  => $ijasah,
        'user'    => getSession('user'),
        'tgl'     => $today
    );
    $this->db->insert('masterska', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT SKA',
        'note'    => $namaska,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatamasterska($namaska){
    $carinama = "";
    if ($namaska!='' or $namaska!=null) {
      $carinama = " AND namaska like '%".$nama."%'";
    }

    $data = null;
    $sql = "SELECT * FROM masterska WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY kodeska");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  // function getkelommasterska(){
  //   $data = null;    
  //   $query = $this->db->query("SELECT * FROM kelompok order by kodekelom");
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

  function getmasterskabykodeska($kodeska){
    $data = null;
    $query = $this->db->query("SELECT * FROM masterska WHERE kodeska=?",array($kodeska));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function carimasterska($namaska){
    $data = null;
    $carimasterska='';
    if ($namaska!='') {
      $carimasterska=" and namaska like '%".$namaska."%'";
    }
    $sql = "SELECT * FROM masterska WHERE 1=1";
    $query = $this->db->query($sql.$carimasterska);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updatemasterska($kodeska,$namaska,$ijasah1){
    $today=date('Y-m-d h:i:s');

    $data = array(
        'namaska'     => $namaska,
        'ijasah'      => $ijasah1,
        'user'        => getSession('user'),
        'tgl'         => $today
    );
    $this->db->update('masterska', $data, array('kodeska' => $kodeska));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT SKA',
        'note'    => $namaska,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function deletemasterska($kodeska2){
    $today=date('Y-m-d');

    $data = array(
        'kodeska' => $kodeska2
    );
    $this->db->delete('masterska', $data);  
    
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS SKA',
        'note'    => $kodeska2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }    

  function cetakmasterska(){
    $data = null;
    $query = $this->db->query("SELECT * FROM masterska order by kodeska");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  // function getstruktur($kojab){
  //   $data = null;
  //   $query = $this->db->query("SELECT * FROM strukturjab a, masterska b WHERE a.kojab1=? and a.kojab2=b.kojab",array($kojab));
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

  // function tambahstruktur($kojab1,$kojab2){
  //   $today=date('Y-m-d h:i:sa');

  //   $data = array(
  //       'kojab1'    => $kojab1,
  //       'kojab2'    => $kojab2,
  //       'user'      => getSession('user'),
  //       'tgl'       => $today
  //   );
  //   $this->db->insert('strukturjab', $data);  
  //   $value = $this->db->affected_rows();
  //   if ($value>0) {
  //     $data = array(
  //       'proses'  => 'INPUT STRUKTUR',
  //       'note'    => $kojab1.' - '.$kojab2,
  //       'user'    => getSession('user'),
  //       'tgl'     => $today
  //     );
  //     $this->db->insert('log', $data);  
  //   }
  //   return $value;
  // }  

  // function getmasterskaList($strData){
  //   $data=null;
  //   $str = '%'.$strData.'%';
  //   $query  = $this->db->query("select * from masterska where namamasterska like ?",$str);
  //   foreach ($query->result() as $row)
  //   { 
  //     $data[] = $row;
  //   }
  //   return $data;    
  // } 

}
?>