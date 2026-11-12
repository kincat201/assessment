<?php
class Kelompok_model extends MY_Model{

  function simpankelompok($nama,$kra,$kba){
    $today=date('Y-m-d h:i:s');

    $data = array(
        'namakelompok' => $nama,
        'kra'          => $kra,
        'kba'          => $kba,
        'user'         => getSession('user'),
        'tgl'          => $today
    );
    $this->db->insert('kelompok', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT KELOMPOK',
        'note'    => $nama,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatakelompok($nama){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND namakelompok like '%".$nama."%'";
    }

    $data = null;
    $sql = "SELECT * FROM kelompok WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY kodekelom");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getkelompokbykode($kode){
    $data = null;
    $query = $this->db->query("SELECT * FROM kelompok WHERE kodekelom=?",array($kode));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function carikelompok($kelompok){
    $data = null;
    $carikelompok='';
    if ($kelompok!='') {
      $carikelompok=" and namakelompok like '%".$kelompok."%'";
    }
    $sql = "SELECT * FROM kelompok WHERE 1=1";
    $query = $this->db->query($sql.$carikelompok);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updatekelompok($kode,$nama,$kra,$kba){
    $today=date('Y-m-d h:i:s');

    $data = array(
        'namakelompok' => $nama,
        'kra'          => $kra,
        'kba'          => $kba,
        'user'        => getSession('user'),
        'tgl'         => $today
    );
    $this->db->update('kelompok', $data, array('kodekelom' => $kode));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT KELOMPOK',
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