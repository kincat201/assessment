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

 function deletejabatan($kojab2){
    $today=date('Y-m-d');

    $data = array(
        'kojab' => $kojab2
    );
    $this->db->delete('jabatan', $data);  
    
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS JABATAN',
        'note'    => $kojab2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  } 

  function cetakjabatan(){
    $data = null;
    $query = $this->db->query("SELECT * FROM jabatan order by kojab");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $query = $this->db->query("select namakelompok from kelompok where kodekelom =?",array($row->kelompok));       
      foreach ($query->result() as $row1)
       {               
          $data[$key]->namakelompok = $row1->namakelompok;
       }
    }
    return $data;
  }

  function getstruktur($kojab){
    $data = null;
    $query = $this->db->query("SELECT * FROM strukturjab a, jabatan b WHERE a.kojab1=? and a.kojab2=b.kojab",array($kojab));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function caristruktur($kojab){
    $data = null;    
    $query = $this->db->query("SELECT count(a.kojab1) as jum FROM strukturjab a, jabatan b WHERE a.kojab1=? and a.kojab2=b.kojab",array($kojab));
    foreach ($query->result() as $row){
      $jum=$row->jum;
    }

    if($jum>0){
      $query = $this->db->query("SELECT * FROM strukturjab a, jabatan b WHERE a.kojab1=? and a.kojab2=b.kojab",array($kojab));
      foreach ($query->result() as $key => $row) {
        $data[] = $row;
      }
    }else{
      $data=0;
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

 function hapusstruktur($kojab){
    $today=date('Y-m-d');

    $data = array(
        'kojab2' => $kojab
    );
    $this->db->delete('strukturjab', $data);  
    
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS STRUKTUR JABATAN',
        'note'    => $kojab,
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