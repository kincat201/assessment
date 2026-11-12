<?php
class M_satuan extends MY_Model{

  function simpansatuan($namasatuan,$deskripsisatuan){
    $today=date('Y-m-d');

    $data = array(
        'satuan'    => $namasatuan,
        'deskripsi' => $deskripsisatuan,
        'user'      => getSession('user'),
        'tglupdate' => $today
    );
    $this->db->insert('satuan', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT SATUAN',
        'note'    => $namasatuan,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatasatuan($nama ,$limit=NULL,$offset=NULL){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND satuan like '%".$nama."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $data = null;
    $sql = "SELECT * FROM satuan WHERE 1=1";
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

  function getsatuanbyksatuan($noindex){
    $data = null;
    $query = $this->db->query("SELECT * FROM satuan WHERE noindex=?",array($noindex));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function carisatuan($satuan ,$limit=NULL,$offset=NULL){
    $data = null;
    $carisatuan='';
    if ($satuan!='') {
      $carisatuan=" and satuan like '%".$satuan."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $sql = "SELECT * FROM satuan WHERE 1=1";
    $query = $this->db->query($sql.$carisatuan.$limitQuery);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }

    $total = $this->db->query($sql.$carisatuan)->num_rows();
    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total);
    }
  }

  function updatesatuan($noindex,$namasatuan1,$deskripsisatuan1){
    $today=date('Y-m-d');

    $data = array(
        'satuan'      => $namasatuan1,
        'deskripsi'   => $deskripsisatuan1,
        'user'        => getSession('user'),
        'tglupdate'         => $today
    );
    $this->db->update('satuan', $data, array('noindex' => $noindex));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT SATUAN',
        'note'    => $namasatuan1,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function deletesatuan($kodesatuan2,$namasatuan2,$deskripsisatuan2){
    $today=date('Y-m-d');

    $data = array(
        'noindex' => $kodesatuan2
    );
    $this->db->delete('satuan', $data);  
    // $this->db->update('satuan', $data, array('noindex' => $noindex));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS SATUAN',
        'note'    => $namasatuan2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }    

  function cetaksatuan(){
    $data = null;
    $query = $this->db->query("SELECT * FROM satuan order by noindex");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

}
?>