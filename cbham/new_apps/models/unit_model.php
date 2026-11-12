<?php
class Unit_model extends MY_Model{

  function simpanunit($nama){
    $today=date('Y-m-d h:i:s');

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

  function getdataunit($nama ,$limit=NULL,$offset=NULL){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND namaunit like '%".$nama."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $data = null;
    $sql = "SELECT * FROM unit ";
    $unit_filter = '';

    if(getSession('role')=='HCMM' || getSession('role')=='User'){
      $unit_filter .= 'WHERE kunit='.getSession('unit');
    }

    $query = $this->db->query($sql.$carinama.$unit_filter." ORDER BY KUNIT".$limitQuery);
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

  function getunitbykunit($kunit){
    $data = null;
    $query = $this->db->query("SELECT * FROM unit WHERE kunit =?",array($kunit));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function cariunit($unit, $limit = NULL, $offset = NULL){
    $data = null;
    $cariunit='';
    if ($unit!='') {
      $cariunit=" and namaunit like '%".$unit."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $sql = "SELECT * FROM unit WHERE 1=1";
    $query = $this->db->query($sql.$cariunit.$limitQuery);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }

    $total = $this->db->query($sql.$cariunit)->num_rows();
    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total);
    }
  }

  function updateunit($kunit,$nama){
    $today=date('Y-m-d h:i:s');

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

  function deleteunit($kunit){
    $today=date('Y-m-d');

    $namaunit = null;
    $query = $this->db->query("SELECT namaunit FROM unit WHERE kunit =?",array($kunit));
    foreach ($query->result() as $key => $row) {
      $namaunit = $row->namaunit;
    }

    $data = array(
        'kunit' => $kunit
    );
    $this->db->delete('unit', $data);  
    
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS UNIT',
        'note'    => $namaunit,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  } 

  function getdivisi(){
    $data = null;
    $query = $this->db->query("SELECT * FROM unit WHERE namaunit like 'Divisi%' ORDER BY KUNIT");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }  

}
?>