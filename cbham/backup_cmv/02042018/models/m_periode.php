<?php
class M_periode extends MY_Model{

  function simpanperiode($namaperiode,$deskripsiperiode){
    $today=date('Y-m-d');

    $data = array(
        'periode'    => $namaperiode,
        'deskripsi' => $deskripsiperiode,
        'user'      => getSession('user'),
        'tglupdate' => $today
    );
    $this->db->insert('periode', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT PERIODE',
        'note'    => $namaperiode,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdataperiode($nama){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND periode like '%".$nama."%'";
    }

    $data = null;
    $sql = "SELECT * FROM periode WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY noindex");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getperiodebykperiode($noindex){
    $data = null;
    $query = $this->db->query("SELECT * FROM periode WHERE noindex=?",array($noindex));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function cariperiode($periode){
    $data = null;
    $cariperiode='';
    if ($periode!='') {
      $cariperiode=" and periode like '%".$periode."%'";
    }
    $sql = "SELECT * FROM periode WHERE 1=1";
    $query = $this->db->query($sql.$cariperiode);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updateperiode($noindex,$namaperiode1,$deskripsiperiode1){
    $today=date('Y-m-d');

    $data = array(
        'periode'      => $namaperiode1,
        'deskripsi'   => $deskripsiperiode1,
        'user'        => getSession('user'),
        'tglupdate'         => $today
    );
    $this->db->update('periode', $data, array('noindex' => $noindex));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT PERIODE',
        'note'    => $namaperiode1,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function deleteperiode($kodeperiode2,$namaperiode2,$deskripsiperiode2){
    $today=date('Y-m-d');

    $data = array(
        'noindex' => $kodeperiode2
    );
    $this->db->delete('periode', $data);      
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS PERIODE',
        'note'    => $namaperiode2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }    

  function cetakperiode(){
    $data = null;
    $query = $this->db->query("SELECT * FROM periode order by noindex");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

}
?>