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

  function simpanpegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,$namabank,$struktural){
    $today=date('Y-m-d h:i:s');

    $query = $this->db->query("SELECT * FROM jabatan WHERE kojab=?",array($jabatan));
    foreach ($query->result() as $rowj) {
      $namajab = $rowj->namajabatan;
    }

    $query = $this->db->query("SELECT * FROM unit WHERE kunit=?",array($unit));
    foreach ($query->result() as $rowu) {
      $namaunit = $rowu->namaunit;
    }

    if ($tglmulaikontrak=='') {
      $tglmulaikontrak = null;
    }
    if ($tglselesaikontrak=='') {
      $tglselesaikontrak = null;
    }
    if ($tglpengangkatan=='') {
      $tglpengangkatan = null;
    }  

    $data = array(
        'nik'           => $nik, //TAB1
        'noktp'           => $ktp,
        'nokk'            => $kk,
        'nama'          => $nama,
        'gelardepan'    => $gelardepan,
        'gelarbelakang' => $gelarbelakang,
        'tempatlahir'   => $tempatlahir,
        'tgllahir'      => $tgllahir,
        'tglmasuk'      => $tglmasuk,
        'status'        => $status,
        'unit'          => $unit,
        'jabatan'       => $jabatan, 
        'namaunit'      => $namaunit,
        'namajab'       => $namajab,
        'kelamin'       => $jk, //TAB2
        'darah'         => $darah, 
        'statuskeluarga'=> $statuskeluarga, 
        'agama'         => $agama, 
        'alamat'        => $alamat, 
        'kota'          => $kota, 
        'kodepos'       => $kodepos, 
        'telp'          => $telepon, 
        'hp'            => $hp, 
        'pendidikan'    => $pendidikan, //TAB3
        'namauniv'      => $namauniv, 
        'jurusan'         => $prodi, 
        'lulus'         => $lulus, 
        'tempatbelajar' => $tempat, 
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
        'tglentry'      => $today,
        'grade'         => $grade,
        'tglmulaikontrak'   => $tglmulaikontrak,
        'tglselesaikontrak' => $tglselesaikontrak,
        'tglpengangkatan'   => $tglpengangkatan,
        'namabank'         => $namabank,
        'jenisjabatan'  => $struktural,
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

    $this->db->delete('tampungkeluarga', array('nik' => $nik, 'user' => getSession('user'))); 
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

  function getkeluarga($nik){
    $data = null;
    $this->db->delete('tampungkeluarga', array('nik' => $nik, 'user' => getSession('user')));
    $query = $this->db->query("SELECT * FROM KELUARGA WHERE NIK=?",array($nik));
    foreach ($query->result() as $row) {
      $datakel = array(
        'nik'         => $nik,
        'nama'        => $row->nama,
        'tgllahir'    => $row->tgllahir,
        'hubungan'    => $row->hubungan,
        'pekerjaan'   => $row->pekerjaan,
        'kelamin'     => $row->kelamin,
        'kondisi'     => $row->kondisi,
        'user'        => getSession('user')
      );
      $this->db->insert('TAMPUNGKELUARGA', $datakel); 
    }
    $query = $this->db->query("SELECT * FROM TAMPUNGKELUARGA WHERE NIK=? and USER=?",array($nik,getSession('user')));
    foreach ($query->result() as $rowk) {
      $data[] = $rowk;
    }
    return $data;
  }

  function getbawahan(){
    $data = null;
    $query = $this->db->query("select c.nik,c.nama,c.jabatan from pegawai a,strukturjab b,pegawai c where a.jabatan=b.kojab1 and a.jabatan=? and b.kojab2=c.jabatan",getSession('kojab'));
     // $query = $this->db->query("SELECT * FROM PEGAWAI order by nama");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updatepegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,$namabank,$struktural){
    $today=date('Y-m-d h:i:s');

    $query = $this->db->query("SELECT * FROM jabatan WHERE kojab=?",array($jabatan));
    foreach ($query->result() as $rowj) {
      $namajab = $rowj->namajabatan;
    }

    $query = $this->db->query("SELECT * FROM unit WHERE kunit=?",array($unit));
    foreach ($query->result() as $rowu) {
      $namaunit = $rowu->namaunit;
    }

    if ($kodepos=='') {
      $kodepos = null;
    } 

    if ($lulus=='') {
      $lulus = null;
    }

    if ($statusbpjskt=='') {
      $statusbpjskt = null;
    }

    if ($statusbpjskes=='') {
      $statusbpjskes = null;
    }

    if ($statusppip=='') {
      $statusppip = null;
    }

    if ($statusppukp=='') {
      $statusppukp = null;
    }

    if ($statusjiwasraya=='') {
      $statusjiwasraya = null;
    }

    if ($statusjkdk=='') {
      $statusjkdk = null;
    }
    if ($tglmulaikontrak=='') {
      $tglmulaikontrak = null;
    }
    if ($tglselesaikontrak=='') {
      $tglselesaikontrak = null;
    }
    if ($tglpengangkatan=='') {
      $tglpengangkatan = null;
    }            

    $data = array(
        'noktp'           => $ktp,
        'nokk'            => $kk,
        'nama'          => $nama,
        'gelardepan'    => $gelardepan,
        'gelarbelakang' => $gelarbelakang,
        'tempatlahir'   => $tempatlahir,
        'tgllahir'      => $tgllahir,
        'tglmasuk'      => $tglmasuk,
        'status'        => $status,
        'unit'          => $unit,
        'jabatan'       => $jabatan,
        'namaunit'      => $namaunit,
        'namajab'       => $namajab, 
        'kelamin'       => $jk, //TAB2
        'darah'         => $darah, 
        'statuskeluarga'=> $statuskeluarga, 
        'agama'         => $agama, 
        'alamat'        => $alamat, 
        'kota'          => $kota, 
        'kodepos'       => $kodepos, 
        'telp'        => $telepon, 
        'hp'            => $hp, 
        'pendidikan'    => $pendidikan, //TAB3
        'namauniv'      => $namauniv, 
        'jurusan'         => $prodi, 
        'lulus'         => $lulus, 
        'tempatbelajar' => $tempat, 
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
        'tglentry'      => $today,
        'grade'         => $grade,
        'tglmulaikontrak'   => $tglmulaikontrak,
        'tglselesaikontrak' => $tglselesaikontrak,
        'tglpengangkatan'   => $tglpengangkatan,
        'namabank'         => $namabank,        
        'jenisjabatan'  => $struktural,
    );
    $this->db->update('pegawai', $data, array('nik' => $nik));  
    $value = $this->db->affected_rows();

    $this->db->delete('keluarga', array('nik' => $nik)); 
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

    $this->db->delete('tampungkeluarga', array('nik' => $nik, 'user' => getSession('user'))); 
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
    $query = $this->db->query($sql.$cari." ORDER BY NAMA");
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

  function cetakpegawai(){
    $data = null;
    $query = $this->db->query("SELECT * FROM pegawai order by nik");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function cekpegawai($nik){
    $data = null;
    $query = $this->db->query("SELECT count(*) as jum FROM pegawai WHERE NIK=?",array($nik));
    foreach ($query->result() as $row) {
      $data = $row->jum;
    }
    return $data;
  }

  function tambahpendidikan($nik,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah){
    $data = array(
        'nik'           => $nik,
        'pendidikan'    => $pendidikan,
        'namauniv'      => $namauniv,
        'jurusan'       => $prodi,
        'lulus'         => $lulus,
        'tempatbelajar' => $tempat,
        'ijazah'        => $ijazah,
        'user'          => getSession('user')
    );
    $this->db->insert('tampungpendidikan', $data);  

    $value = null;
    $query = $this->db->query("SELECT * FROM tampungpendidikan WHERE NIK=? AND USER=? order by noindex",array($nik,getSession('user')));
    foreach ($query->result() as $row) {
      $value[] = $row;
    }
    return $value;
  }

  function hapuspendidikan($nik,$no){
    $this->db->delete('tampungpendidikan', array('nik' => $nik, 'NOINDEX' => $no));  
    $value = null;
    $query = $this->db->query("SELECT * FROM TAMPUNGPENDIDIKAN WHERE NIK=? AND USER=? order by noindex",array($nik,getSession('user')));
    foreach ($query->result() as $row) {
      $value[] = $row;
    }
    return $value;
  }

  function getpendidikan($nik){
    $data = null;
    $this->db->delete('tampungpendidikan', array('nik' => $nik, 'user' => getSession('user')));
    $query = $this->db->query("SELECT * FROM pendidikan WHERE NIK=?",array($nik));
    foreach ($query->result() as $row) {
      $datakel = array(
        'nik'           => $nik,
        'pendidikan'    => $row->pendidikan,
        'namauniv'      => $row->namauniv,
        'jurusan'       => $row->jurusan,
        'lulus'         => $row->lulus,
        'tempatbelajar' => $row->tempatbelajar,
        'ijazah'        => $row->ijazah,
        'user'          => getSession('user'),
        'noindex'       => $row->noindex
      );
      $this->db->insert('tampungpendidikan', $datakel); 
    }
    $query = $this->db->query("SELECT * FROM tampungpendidikan WHERE NIK=? and USER=? order by noindex",array($nik,getSession('user')));
    foreach ($query->result() as $rowk) {
      $data[] = $rowk;
    }
    return $data;
  }

}
?>