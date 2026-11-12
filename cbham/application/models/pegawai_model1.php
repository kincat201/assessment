<?php
class Pegawai_model extends MY_Model{

  function simpanpegawai($nik,$nama,$tgllahir,$tglmasuk,$pendidikan,$status,$unit,$jabatan,$role,$username,$password){
    $today=date('Y-m-d h:i:sa');

    $data = array(
        'nik'         => $nik,
        'nama'        => $nama,
        'tgllahir'    => $tgllahir,
        'tglmasuk'    => $tglmasuk,
        'pendidikan'  => $pendidikan,
        'status'      => $status,
        'unit'        => $unit,
        'jabatan'     => $jabatan,
        'role'        => $role,
        'username'    => $username,
        'password'    => $password,
        'userentry'   => getSession('user'),
        'tglentry'    => $today
    );
    $this->db->insert('pegawai', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT PEGAWAI',
        'note'    => $nik.' - '.$nama,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatapegawai($nik,$nama,$tglmasuk1,$tglmasuk2,$pendidikan,$status,$unit,$jabatan){
    $carinik = "";
    if ($nik!='' or $nik!=null) {
      $carinik = " AND NIK=".$NIK;
    }

    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND NAMA LIKE '%".$NIK."'";
    }

    $caritgl = "";
    if ($tglmasuk1!='' and $tglmasuk22!='') {
      $caritgl = " AND TGLMASUK BETWEEN '".$tglmasuk1."' AND '".$tglmasuk2."'";
    }
    
    $caripend = "";
    if ($pendidikan!='' or $pendidikan!=0) {
      $caripend = " AND PENDIDIKAN=".$pendidikan;
    }

    $caristatus = "";
    if ($status!='' or $status!=0) {
      $caristatus = " AND STATUS=".$status;
    }

    $cariunit = "";
    if ($unit!='' or $unit!=0) {
      $cariunit = " AND UNIT=".$unit;
    }

    $carijabatan = "";
    if ($jabatan!='' or $jabatan!=0) {
      $carijabatan = " AND JABATAN=".$jabatan;
    }

    $data = null;
    $sql = "SELECT * FROM PEGAWAI WHERE NIK IS NOT NULL";
    $query = $this->db->query($sql.$carinik.$carinama.$caritgl.$caripend.$caristatus.$cariunit.$carijabatan." ORDER BY NAMA");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $query = $this->db->query("SELECT * from unit where kunit=?",array($row->unit));
      foreach ($query->result() as $row1) {
        $data[$key]->namaunit = $row1->namaunit;
      }
      $query = $this->db->query("SELECT * from jabatan where kojab=?",array($row->jabatan));
      foreach ($query->result() as $row2) {
        $data[$key]->namajabatan = $row2->namajabatan;
      }
    }
    return $data;
  }

  function getpegawaibynik($nik){
    $data = null;
    $query = $this->db->query("SELECT * FROM PEGAWAI WHERE NIK =?",array($nik));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $query = $this->db->query("SELECT * from unit where kunit=?",array($row->unit));
      foreach ($query->result() as $row1) {
        $data[$key]->namaunit = $row1->namaunit;
      }
      $query = $this->db->query("SELECT * from jabatan where kojab=?",array($row->jabatan));
      foreach ($query->result() as $row2) {
        $data[$key]->namajabatan = $row2->namajabatan;
      }
    }
    return $data;
  }

  function getbawahan(){
    $data = null;
    $query = $this->db->query("select c.nik,c.nama,c.jabatan from pegawai a,strukturjab b,pegawai c where a.jabatan=b.kojab1 and a.jabatan=? and b.kojab2=c.jabatan",getSession('kojab'));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updatepegawai($nik,$nama,$tgllahir,$tglmasuk,$pendidikan,$status,$unit,$jabatan,$role,$username,$password){
    $today=date('Y-m-d h:i:sa');

    $data = array(
        'nama'        => $nama,
        'tgllahir'    => $tgllahir,
        'tglmasuk'    => $tglmasuk,
        'pendidikan'  => $pendidikan,
        'status'      => $status,
        'unit'        => $unit,
        'jabatan'     => $jabatan,
        'role'        => $role,
        'username'    => $username,
        'password'    => $password,
        'userentry'   => getSession('user'),
        'tglentry'    => $today
    );
    $this->db->update('pegawai', $data, array('nik' => $nik));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT PEGAWAI',
        'note'    => $nik.' - '.$nama,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function caripegawai($pegawai){
    $data = null;
    $cari='';
    if ($pegawai!='') {
      $cari=" and (nik like '%".$pegawai."%' or nama like '%".$pegawai."%')";
    }
    $sql = "SELECT * FROM pegawai WHERE 1=1";
    $query = $this->db->query($sql.$cari);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $query = $this->db->query("SELECT * from unit where kunit=?",array($row->unit));
      foreach ($query->result() as $row1) {
        $data[$key]->namaunit = $row1->namaunit;
      }
      $query = $this->db->query("SELECT * from jabatan where kojab=?",array($row->jabatan));
      foreach ($query->result() as $row2) {
        $data[$key]->namajabatan = $row2->namajabatan;
      }
    }
    return $data;
  }


}
?>