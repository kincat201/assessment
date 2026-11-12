<?php
class Jabatan_model extends MY_Model{

  function simpanjabatan($nama,$kelompok){
    $today=date('Y-m-d h:i:sa');

    $data = array(
        'namajabatan' => $nama,
        'kelompok' => $kelompok,
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

  function getkelomjabatan(){
    $data = null;
    // $sql = "SELECT * FROM jabatan WHERE 1=1";
    $query = $this->db->query("SELECT * FROM kelompok order by kodekelom");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getjabatanbykojab($kojab){
    $data = null;
    $query = $this->db->query("SELECT * FROM jabatan WHERE kojab=?",array($kojab));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function carijabatan($jabatan){
    $data = null;
    $carijabatan='';
    if ($jabatan!='') {
      $carijabatan=" and namajabatan like '%".$jabatan."%'";
    }
    $sql = "SELECT * FROM jabatan WHERE 1=1";
    $query = $this->db->query($sql.$carijabatan);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updatejabatan($kojab,$nama){
    $today=date('Y-m-d h:i:sa');

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

  function getstruktur($kojab){
    $data = null;
    $query = $this->db->query("SELECT * FROM strukturjab a, jabatan b WHERE a.kojab1=? and a.kojab2=b.kojab",array($kojab));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function tambahstruktur($kojab1,$kojab2){
    $today=date('Y-m-d h:i:sa');

    $data = array(
        'kojab1'    => $kojab1,
        'kojab2'    => $kojab2,
        'user'      => getSession('user'),
        'tgl'       => $today
    );
    $this->db->insert('strukturjab', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT STRUKTUR',
        'note'    => $kojab1.' - '.$kojab2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

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

}
?>