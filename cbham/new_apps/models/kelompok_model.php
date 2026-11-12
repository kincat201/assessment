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

  function getdatakelompok($nama ,$limit=NULL,$offset=NULL){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND namakelompok like '%".$nama."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $data = null;
    $sql = "SELECT * FROM kelompok WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY kodekelom".$limitQuery);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }

    $total = $this->db->query($sql.$carinama)->num_rows();
    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total);
    }
  }

  function getkelompokbykode($kode){
    $data = null;
    $query = $this->db->query("SELECT * FROM kelompok WHERE kodekelom=?",array($kode));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function carikelompok($kelompok, $limit = NULL, $offset = NULL){
    $data = null;
    $carikelompok='';
    if ($kelompok!='') {
      $carikelompok=" and namakelompok like '%".$kelompok."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $sql = "SELECT * FROM kelompok WHERE 1=1";
    $query = $this->db->query($sql.$carikelompok.$limitQuery);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    
    $total = $this->db->query($sql.$carikelompok)->num_rows();
    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total);
    }
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

  function deletekelompok($kodekelom2){
    $today=date('Y-m-d');

    $data = array(
        'kodekelom' => $kodekelom2
    );
    $this->db->delete('kelompok', $data);  
    
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS KELOMPOK',
        'note'    => $kodekelom2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  } 

  function cetakkelompok(){
    $data = null;
    $query = $this->db->query("SELECT * FROM kelompok order by kodekelom");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

}
?>