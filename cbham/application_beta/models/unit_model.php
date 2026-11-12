<?php
class Unit_model extends MY_Model{

  function simpanunit($nama){
    $today=date('Y-m-d h:i:sa');

    $data = array(
        'namaunit' => $nama,
        'user'        => getSession('user'),
        'tgl'         => $today
    );
    $this->db->insert('unit', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT UNIT',
        'note'    => $nama,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdataunit($nama){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND namaunit like '%".$nama."%'";
    }

    $data = null;
    $sql = "SELECT * FROM unit WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY KUNIT");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getunitbykunit($kunit){
    $data = null;
    $query = $this->db->query("SELECT * FROM unit WHERE kunit =?",array($kunit));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function cariunit($unit){
    $data = null;
    $cariunit='';
    if ($unit!='') {
      $cariunit=" and namaunit like '%".$unit."%'";
    }
    $sql = "SELECT * FROM unit WHERE 1=1";
    $query = $this->db->query($sql.$cariunit);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updateunit($kunit,$nama){
    $today=date('Y-m-d h:i:sa');

    $data = array(
        'namaunit'    => $nama,
        'user'        => getSession('user'),
        'tgl'         => $today
    );
    $this->db->update('unit', $data, array('kunit' => $kunit));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT UNIT',
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