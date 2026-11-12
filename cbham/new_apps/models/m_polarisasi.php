<?php
class M_polarisasi extends MY_Model{

  function simpanpolarisasi($namapolarisasi,$deskripsipolarisasi,$formula,$konstanta){
    $today=date('Y-m-d');

    $data = array(
        'polarisasi'=> $namapolarisasi,
        'deskripsi' => $deskripsipolarisasi,
        'formula'   => $formula,
        'konstanta' => $konstanta,        
        'user'      => getSession('user'),
        'tglupdate' => $today
    );
    $this->db->insert('polarisasi', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT POLARISASI',
        'note'    => $namapolarisasi,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatapolarisasi($nama ,$limit=NULL,$offset=NULL){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND polarisasi like '%".$nama."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $data = null;
    $sql = "SELECT * FROM polarisasi WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY noindex".$limitQuery);
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

  function getpolarisasibykpolarisasi($noindex){
    $data = null;
    $query = $this->db->query("SELECT * FROM polarisasi WHERE noindex=?",array($noindex));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function caripolarisasi($polarisasi ,$limit=NULL,$offset=NULL){
    $data = null;
    $caripolarisasi='';
    if ($polarisasi!='') {
      $caripolarisasi=" and polarisasi like '%".$polarisasi."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $sql = "SELECT * FROM polarisasi WHERE 1=1";
    $query = $this->db->query($sql.$caripolarisasi.$limitQuery);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    $total = $this->db->query($sql.$caripolarisasi)->num_rows();
    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total);
    }
  }

  function updatepolarisasi($noindex,$namapolarisasi1,$deskripsipolarisasi1,$formula1,$konstanta1){
    $today=date('Y-m-d');

    $data = array(
        'polarisasi'  => $namapolarisasi1,
        'deskripsi'   => $deskripsipolarisasi1,
        'formula'     => $formula1,
        'konstanta'   => $konstanta1,        
        'user'        => getSession('user'),
        'tglupdate'   => $today
    );
    $this->db->update('polarisasi', $data, array('noindex' => $noindex));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT POLARISASI',
        'note'    => $namapolarisasi1,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function deletepolarisasi($kodepolarisasi2,$namapolarisasi2,$deskripsipolarisasi2,$formula2,$konstanta2){
    $today=date('Y-m-d');

    $data = array(
        'noindex' => $kodepolarisasi2
    );
    $this->db->delete('polarisasi', $data);      
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS POLARISASI',
        'note'    => $namapolarisasi2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }    

  function cetakpolarisasi(){
    $data = null;
    $query = $this->db->query("SELECT * FROM polarisasi order by noindex");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

}
?>