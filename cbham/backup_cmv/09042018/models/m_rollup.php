<?php
class M_rollup extends MY_Model{

  function simpanrollup($namarollup,$deskripsirollup){
    $today=date('Y-m-d');

    $data = array(
        'rollup'    => $namarollup,
        'deskripsi' => $deskripsirollup,
        'user'      => getSession('user'),
        'tglupdate' => $today
    );
    $this->db->insert('rollup', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT ROLLUP',
        'note'    => $namarollup,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatarollup($nama){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND rollup like '%".$nama."%'";
    }

    $data = null;
    $sql = "SELECT * FROM rollup WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY noindex");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getrollupbykrollup($noindex){
    $data = null;
    $query = $this->db->query("SELECT * FROM rollup WHERE noindex=?",array($noindex));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function carirollup($rollup){
    $data = null;
    $carirollup='';
    if ($rollup!='') {
      $carirollup=" and rollup like '%".$rollup."%'";
    }
    $sql = "SELECT * FROM rollup WHERE 1=1";
    $query = $this->db->query($sql.$carirollup);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updaterollup($noindex,$namarollup1,$deskripsirollup1){
    $today=date('Y-m-d');

    $data = array(
        'rollup'      => $namarollup1,
        'deskripsi'   => $deskripsirollup1,
        'user'        => getSession('user'),
        'tglupdate'         => $today
    );
    $this->db->update('rollup', $data, array('noindex' => $noindex));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT ROLLUP',
        'note'    => $namarollup1,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function deleterollup($koderollup2,$namarollup2,$deskripsirollup2){
    $today=date('Y-m-d');

    $data = array(
        'noindex' => $koderollup2
    );
    $this->db->delete('rollup', $data);      
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS ROLLUP',
        'note'    => $namarollup2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }    

  function cetakrollup(){
    $data = null;
    $query = $this->db->query("SELECT * FROM rollup order by noindex");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

}
?>