<?php
class M_uploaddok extends MY_Model{

  function simpandata($namafile,$txtFolder){  

    $value=0;
    $today=date("Y-m-d");
      
    $dbb = $this->load->database('fb1',true);  

    $namafile=str_replace(' ', '_', $namafile);
      $data = array(
          'namafile'    => $namafile,
          'url'         => $txtFolder,
          'tglentry'    => $today,
          'user'        => getSession('user')
        );
      $this->db->insert('dokumen', $data);        
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT uploaddok',
        'note'    => $namafile,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;

  } 

  function getdatauploaddok($namafile){
    $carinama = "";
    if ($namafile!='' or $namafile!=null) {
      $carinama = " AND namafile like '%".$namafile."%'";
    }

    $data = null;
    $sql = "SELECT * FROM dokumen WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY namafile");
    // $query = $this->db->query("SELECT * FROM dokumen ORDER BY namafile");    
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getuploaddokbykuploaddok($noindex){
    $data = null;
    $query = $this->db->query("SELECT * FROM dokumen WHERE noindex=?",array($noindex));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function cariuploaddok($uploaddok){
    $data = null;
    $cariuploaddok='';
    if ($uploaddok!='') {
      $cariuploaddok=" and namafile like '%".$uploaddok."%'";
    }
    $sql = "SELECT * FROM dokumen WHERE 1=1";
    $query = $this->db->query($sql.$cariuploaddok);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function deleteuploaddok($kodeuploaddok2){
  // function deleteuploaddok($kodeuploaddok2,$namauploaddok2,$deskripsiuploaddok2){
    $today=date('Y-m-d');
    $query = $this->db->query("SELECT namafile FROM dokumen WHERE noindex=?",array($kodeuploaddok2));
    foreach ($query->result() as $row) {
      $nama = $row->namafile;
    }

    $path = $_SERVER['DOCUMENT_ROOT']; 
    $file = $path."\CBHAM\pdf\\".$nama; 
    $data = array(
        'noindex' => $kodeuploaddok2
    );
    $this->db->delete('dokumen', $data);      
    $value = $this->db->affected_rows();
    if ($value>0) {
      unlink($file);
      $data = array(
        'proses'  => 'HAPUS uploaddok',
        'note'    => $kodeuploaddok2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }    

  function cetakuploaddok($noindex){
    $data = null;
    $query = $this->db->query("SELECT namafile FROM dokumen WHERE noindex=?",array($noindex));
    foreach ($query->result() as $row) {
      $namafile = $row->namafile;
    }
    return $data;
  }

  // function updateuploaddok($noindex,$namauploaddok1,$deskripsiuploaddok1){
  //   $today=date('Y-m-d');

  //   $data = array(
  //       'uploaddok'      => $namauploaddok1,
  //       'deskripsi'   => $deskripsiuploaddok1,
  //       'user'        => getSession('user'),
  //       'tglupdate'         => $today
  //   );
  //   $this->db->update('dokumen', $data, array('noindex' => $noindex));  
  //   $value = $this->db->affected_rows();
  //   if ($value>0) {
  //     $data = array(
  //       'proses'  => 'EDIT uploaddok',
  //       'note'    => $namauploaddok1,
  //       'user'    => getSession('user'),
  //       'tgl'     => $today
  //     );
  //     $this->db->insert('log', $data);  
  //   }
  //   return $value;
  // }  

  // function cetakuploaddok(){
  //   $data = null;
  //   $query = $this->db->query("SELECT * FROM dokumen order by noindex");
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

}
?>