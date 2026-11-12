<?php
class Pegawai_model extends MY_Model{

  function tambahkeluarga($nik,$nama,$hubungan,$pekerjaan,$tgllahirkeluarga,$jkkeluarga,$kondisi){
    $data = array(
        'nik'         => $nik,
        'nama'        => $nama,
        'tgllahir'    => $tgllahirkeluarga,
        'hubungan'    => $hubungan,
        'pekerjaan'   => $pekerjaan,
        'kelamin'     => $jkkeluarga,
        'kondisi'     => $kondisi,
        'user'        => getSession('user')
    );
    $this->db->insert('tampungkeluarga', $data);  

    $value = null;
    $query = $this->db->query("SELECT * FROM TAMPUNGKELUARGA WHERE NIK=? AND USER=?",array($nik,getSession('user')));
    foreach ($query->result() as $row) {
      $value[] = $row;
    }
    return $value;
  }

  function hapuskeluarga($nik,$nama){
    $this->db->delete('tampungkeluarga', array('nik' => $nik, 'nama' => $nama));  
    $value = null;
    $query = $this->db->query("SELECT * FROM TAMPUNGKELUARGA WHERE NIK=? AND USER=?",array($nik,getSession('user')));
    foreach ($query->result() as $row) {
      $value[] = $row;
    }
    return $value;
  }

  function simpanpegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password){
    $today=date('Y-m-d h:i:sa');

    $data = array(
        'nik'           => $nik, //TAB1
        'ktp'           => $ktp,
        'kk'            => $kk,
        'nama'          => $nama,
        'gelardepan'    => $gelardepan,
        'gelarbelakang' => $gelarbelakang,
        'tempatlahir'   => $tempatlahir,
        'tgllahir'      => $tgllahir,
        'tglmasuk'      => $tglmasuk,
        'status'        => $status,
        'unit'          => $unit,
        'jabatan'       => $jabatan, 
        'kelamin'       => $jk, //TAB2
        'darah'         => $darah, 
        'statuskeluarga'=> $statuskeluarga, 
        'agama'         => $agama, 
        'alamat'        => $alamat, 
        'kota'          => $kota, 
        'kodepos'       => $kodepos, 
        'telepon'       => $telepon, 
        'hp'            => $hp, 
        'pendidikan'    => $pendidikan, //TAB3
        'namauniv'      => $namauniv, 
        'prodi'         => $prodi, 
        'lulus'         => $lulus, 
        'tempatbelajar' => $tempatbelajar, 
        'ijazah'        => $ijazah, 
        'rekening'      => $rekening, //TAB4
        'npwp'          => $npwp, 
        'statusbpjskt'  => $statusbpjskt, 
        'bpjskt'        => $bpjskt,
        'statusbpjskes'  => $statusbpjskes, 
        'bpjskes'        => $bpjskes,
        'statusppip'     => $statusppip, 
        'ppip'           => $ppip,
        'statusppukp'    => $statusppukp, 
        'ppukp'          => $ppukp,
        'statusjiwasraya'=> $statusjiwasraya, 
        'jiwasraya'      => $jiwasraya,
        'statusjkdk'    => $statusjkdk, 
        'jkdk'          => $jkdk,
        'role'          => $role, //TAB6
        'username'      => $username,
        'password'      => $password,
        'userentry'     => getSession('user'),
        'tglentry'      => $today
    );
    $this->db->insert('pegawai', $data);  
    $value = $this->db->affected_rows();

    $query = $this->db->query("SELECT * FROM TAMPUNGKELUARGA WHERE NIK=? AND USER=?",array($nik,getSession('user')));
    foreach ($query->result() as $row) {
      $datakel = array(
        'nik'         => $nik,
        'nama'        => $row->nama,
        'tgllahir'    => $row->tgllahir,
        'hubungan'    => $row->hubungan,
        'pekerjaan'   => $row->pekerjaan,
        'kelamin'     => $row->kelamin,
        'kondisi'     => $row->kondisi,
        'user'        => getSession('user'),
        'tgl'         => $today
      );
      $this->db->insert('keluarga', $datakel); 
    }
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

  function updatepegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password){
    $today=date('Y-m-d h:i:sa');

   $data = array(
        'ktp'           => $ktp,
        'kk'            => $kk,
        'nama'          => $nama,
        'gelardepan'    => $gelardepan,
        'gelarbelakang' => $gelarbelakang,
        'tempatlahir'   => $tempatlahir,
        'tgllahir'      => $tgllahir,
        'tglmasuk'      => $tglmasuk,
        'status'        => $status,
        'unit'          => $unit,
        'jabatan'       => $jabatan, 
        'kelamin'       => $jk, //TAB2
        'darah'         => $darah, 
        'statuskeluarga'=> $statuskeluarga, 
        'agama'         => $agama, 
        'alamat'        => $alamat, 
        'kota'          => $kota, 
        'kodepos'       => $kodepos, 
        'telepon'       => $telepon, 
        'hp'            => $hp, 
        'pendidikan'    => $pendidikan, //TAB3
        'namauniv'      => $namauniv, 
        'prodi'         => $prodi, 
        'lulus'         => $lulus, 
        'tempatbelajar' => $tempatbelajar, 
        'ijazah'        => $ijazah, 
        'rekening'      => $rekening, //TAB4
        'npwp'          => $npwp, 
        'statusbpjskt'  => $statusbpjskt, 
        'bpjskt'        => $bpjskt,
        'statusbpjskes'  => $statusbpjskes, 
        'bpjskes'        => $bpjskes,
        'statusppip'     => $statusppip, 
        'ppip'           => $ppip,
        'statusppukp'    => $statusppukp, 
        'ppukp'          => $ppukp,
        'statusjiwasraya'=> $statusjiwasraya, 
        'jiwasraya'      => $jiwasraya,
        'statusjkdk'    => $statusjkdk, 
        'jkdk'          => $jkdk,
        'role'          => $role, //TAB6
        'username'      => $username,
        'password'      => $password,
        'userentry'     => getSession('user'),
        'tglentry'      => $today
    );
    $this->db->update('pegawai', $data, array('nik' => $nik));  
    $value = $this->db->affected_rows();

    $this->db->delete('keluarga', array('nik' => $nik, 'nama' => $nama)); 
    $query = $this->db->query("SELECT * FROM TAMPUNGKELUARGA WHERE NIK=? AND USER=?",array($nik,getSession('user')));
    foreach ($query->result() as $row) {
      $datakel = array(
        'nik'         => $nik,
        'nama'        => $row->nama,
        'tgllahir'    => $row->tgllahir,
        'hubungan'    => $row->hubungan,
        'pekerjaan'   => $row->pekerjaan,
        'kelamin'     => $row->kelamin,
        'kondisi'     => $row->kondisi,
        'user'        => getSession('user'),
        'tgl'         => $today
      );
      $this->db->insert('keluarga', $datakel); 
    }
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