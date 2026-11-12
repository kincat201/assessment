<?php
class M_kpi extends MY_Model{

  function getsatuan(){
    $data = null;
    $query = $this->db->query("SELECT satuan FROM satuan order by satuan");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getrollup(){
    $data = null;
    $query = $this->db->query("select rollup from rollup order by rollup");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getpolarisasi(){
    $data = null;
    $query = $this->db->query("select kode,polarisasi from polarisasi order by polarisasi");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getperiode(){
    $data = null;
    $query = $this->db->query("select periode from periode order by periode");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function simpankpi($kelompok,$kodekpi,$namakpi,$deskripsi,$target,$satuan,$rollup,$polarisasi,$periode,$formula){
    $today=date('Y-m-d');

    $data = array(
        'kodekpi'   => $kodekpi
    );
    $this->db->delete('kpi', $data);  

    $query = $this->db->query("select * from polarisasi where kode=?",array($polarisasi));   
    foreach ($query->result() as $row){
        $namapolarisasi=$row->polarisasi;
    }
 
    if ($kelompok=='F'){$kelompokx=1;}
    if ($kelompok=='C'){$kelompokx=2;}
    if ($kelompok=='I'){$kelompokx=3;}
    if ($kelompok=='L'){$kelompokx=4;}

    $data = array(
        'kodekpi'       => $kodekpi,
        'kpi'           => $namakpi,
        'deskripsi'     => $deskripsi,
        'target'        => $target,
        'satuan'        => $satuan,
        'rollup'        => $rollup,
        'kodepolarisasi'=> $polarisasi,
        'polarisasi'    => $namapolarisasi,            
        'periode'       => $periode,
        'formula'       => $formula,
        'kelompok'      => $kelompokx,
        'urutkel'       => substr($kodekpi,1,5),
        'tglupdate'     => $today,
        'user'          => getSession('user')
    );
    $this->db->insert('kpi', $data);   

    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT KPI',
        'note'    => $namakpi,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatakpi($nama){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND (kpi like '%".$nama."%' or kodekpi like '%".$nama."%' or deskripsi like '%".$nama."%')";
    }

    $data = null;
    $sql = "SELECT * FROM kpi WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY noindex");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getkpibykkpi($noindex){
    $data = null;
    $query = $this->db->query("SELECT * FROM kpi WHERE noindex=?",array($noindex));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function cariotokodekpi($kelompok){
    $data = null;
    $kelompokx=$kelompok.'%';
    $query = $this->db->query("select count(urutkel) as urut from kpi where kodekpi like ?",array($kelompokx));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $urut=$row->urut+1;
      $kode=$kelompok.$urut;
      $data[$key]->kode = $kode;      
    }
    return $data;
  }

  function carikpi($kpi){
    $data = null;
    $carikpi='';
    if ($kpi!='') {
      $carikpi = " AND (kpi like '%".$kpi."%' or kodekpi like '%".$kpi."%' or deskripsi like '%".$kpi."%')";      
    }
    $sql = "SELECT * FROM kpi WHERE 1=1";
    $query = $this->db->query($sql.$carikpi);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updatekpi($noindex1,$kelompok1,$kodekpi1,$namakpi1,$deskripsi1,$target1,$satuan1,$rollup1,$polarisasi1,$periode1,$formula1){
    $today=date('Y-m-d');

    $query = $this->db->query("select * from polarisasi where kode=?",array($polarisasi1));   
    foreach ($query->result() as $row){
        $namapolarisasi=$row->polarisasi;
    }
 
    if ($kelompok1=='F'){$kelompokx=1;}
    if ($kelompok1=='C'){$kelompokx=2;}
    if ($kelompok1=='I'){$kelompokx=3;}
    if ($kelompok1=='L'){$kelompokx=4;}

    $data = array(
        'kodekpi'       => $kodekpi1,
        'kpi'           => $namakpi1,
        'deskripsi'     => $deskripsi1,
        'target'        => $target1,
        'satuan'        => $satuan1,
        'rollup'        => $rollup1,
        'kodepolarisasi'=> $polarisasi1,
        'polarisasi'    => $namapolarisasi,            
        'periode'       => $periode1,
        'formula'       => $formula1,
        'kelompok'      => $kelompokx,
        'urutkel'       => substr($kodekpi1,1,5),
        'tglupdate'     => $today,
        'user'          => getSession('user')
    );
    $this->db->update('kpi', $data, array('noindex' => $noindex1));  

    // $data = array(
    //     'kpi'  => $namakpi1,
    //     'deskripsi'   => $deskripsikpi1,
    //     'formula'     => $formula1,
    //     'konstanta'   => $konstanta1,        
    //     'user'        => getSession('user'),
    //     'tglupdate'   => $today
    // );
    // $this->db->update('kpi', $data, array('noindex' => $noindex));  

    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT kpi',
        'note'    => $namakpi1,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function deletekpi($noindex2,$kelompok2,$kodekpi2,$namakpi2,$deskripsi2,$target2,$satuan2,$rollup2,$polarisasi2,$periode2,$formula2){
    $today=date('Y-m-d');

    $data = array(
        'noindex' => $noindex2
    );
    $this->db->delete('kpi', $data);      
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS KPI',
        'note'    => $namakpi2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }    

  function cetakkpi(){
    $data = null;
    $query = $this->db->query("SELECT * FROM kpi order by noindex");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

}
?>