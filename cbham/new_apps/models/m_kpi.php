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

  function simpankpi($kelompok,$unit,$jabatan,$kodekpi,$namakpi,$deskripsi,$target,$satuan,$rollup,$polarisasi,$periode,$formula){
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
        'unit'          => $unit,
        'jabatan'       => $jabatan,
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

  function getdatakpi($nama, $limit = NULL, $offset = NULL){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND (kpi like '%".$nama."%' or kodekpi like '%".$nama."%' or deskripsi like '%".$nama."%')";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $data = null;
    $sql = "SELECT kpi.*, unit.namaunit, jabatan.namajabatan FROM kpi LEFT JOIN unit ON kpi.unit = unit.kunit LEFT JOIN jabatan ON kpi.jabatan = jabatan.kojab WHERE 1=1";
    $sqlResult = "SELECT COUNT(*) AS `count` FROM kpi WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY noindex".$limitQuery);
    $totalResult = $this->db->query($sqlResult.$carinama);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }

    $total = $totalResult->result();

    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total[0]->count);
    }
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
    $query = $this->db->query("select max(urutkel) as urut from kpi where kodekpi like ?",array($kelompokx));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $urut=$row->urut+1;
      $kode=$kelompok.$urut;
      $data[$key]->kode = $kode;      
    }
    return $data;
  }

  function carikpi($kpi, $limit = NULL, $offset = NULL){
    $data = null;
    $carikpi='';
    if ($kpi!='') {
      $carikpi = " AND (kpi like '%".$kpi."%' or kodekpi like '%".$kpi."%' or deskripsi like '%".$kpi."%')";      
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $sql = "SELECT kpi.*, unit.namaunit, jabatan.namajabatan FROM kpi LEFT JOIN unit ON kpi.unit = unit.kunit LEFT JOIN jabatan ON kpi.jabatan = jabatan.kojab WHERE 1=1";
    $sqlResult = "SELECT COUNT(*) AS `count` FROM kpi WHERE 1=1";
    $query = $this->db->query($sql.$carikpi.$limitQuery);
    $totalResult = $this->db->query($sqlResult.$carikpi);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }

    $total = $totalResult->result();

    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total[0]->count);
    }
  }

  function updatekpi($noindex1,$kelompok1,$unit1,$jabatan1,$kodekpi1,$namakpi1,$deskripsi1,$target1,$satuan1,$rollup1,$polarisasi1,$periode1,$formula1){
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
        'unit'          => $unit1,
        'jabatan'       => $jabatan1,
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