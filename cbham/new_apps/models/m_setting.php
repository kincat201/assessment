<?php
class M_setting extends MY_Model{

  function simpansetting($namasetting,$deskripsisetting){
    $today=date('Y-m-d');

    $data = array(
        'setting'    => $namasetting,
        'deskripsi' => $deskripsisetting,
        'user'      => getSession('user'),
        'tglupdate' => $today
    );
    $this->db->insert('setting', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT setting',
        'note'    => $namasetting,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatasetting($nama){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND setting like '%".$nama."%'";
    }

    $data = null;
    // $sql = "SELECT * FROM pegawai WHERE 1=1";
    // $sql = "SELECT * FROM pegawai WHERE user =".getSession('user');    
    // $query = $this->db->query($sql.$carinama." ORDER BY noindex");
    $query = $this->db->query("SELECT * FROM pegawai WHERE username=?",array(getSession('user')));    
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getsettingbyksetting($noindex){
    $data = null;
    // $query = $this->db->query("SELECT * FROM setting WHERE noindex=?",array($noindex));
    $query = $this->db->query("SELECT * FROM pegawai WHERE nik=?",array($noindex));    
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function carisetting($setting){
    $data = null;
    $carisetting='';
    if ($setting!='') {
      $carisetting=" and setting like '%".$setting."%'";
    }
    $sql = "SELECT * FROM setting WHERE 1=1";
    $query = $this->db->query($sql.$carisetting);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updatesetting($nik,$passwordbaru){
    $today=date('Y-m-d');

    $data = array(
        'password' => md5($passwordbaru), 
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => getSession('user_id')
    );
    $update = $this->db->update('pegawai', $data, array('nik' => $nik));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT SETTING',
        'note'    => $nik,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }

    if($update) {
      $value = 1;
    }
    
    return $value;
  }  

  function deletesetting($kodesetting2,$namasetting2,$deskripsisetting2){
    $today=date('Y-m-d');

    $data = array(
        'noindex' => $kodesetting2
    );
    $this->db->delete('setting', $data);  
    // $this->db->update('setting', $data, array('noindex' => $noindex));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS setting',
        'note'    => $namasetting2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }    

  function cetaksetting(){
    $data = null;
    $query = $this->db->query("SELECT * FROM setting order by noindex");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

}
?>