<?php
class Mpp_model extends MY_Model{

  function simpanknowhow($nik,$periode,$tahun,$fe,$ie,$ex,$bs,$tsmkt,$tsest,$tsengmech,$tsengelec,$tsengciv,$tsprocpurch,$tsprocexpd,$tsproctrfc,$tsprocexim,$tscon,$tsppc,$tsmis,$tsfin,$tsqa,$tslgl,$tsia,$tsred,$tsmc,$tshse,$tshrd,$tsrt,$tsmd,$tsmr,$tssub,$tstop,$kekuatan,$kelemahan,$rencana){
    $today=date('Y-m-d h:i:sa');

    $data = array(
        'nik'         =>  $nik,
        'periode'     =>  $periode,
        'tahun'       =>  $tahun,
        'fe'          =>  $fe,
        'ie'          =>  $ie,
        'ex'          =>  $ex,
        'bs'          =>  $bs,
        'tsmkt'       =>  $tsmkt,
        'tsest'       =>  $tsest,
        'tsengmech'   =>  $tsengmech,
        'tsengelec'   =>  $tsengelec,
        'tsengciv'    =>  $tsengciv,
        'tsprocpurch' =>  $tsprocpurch,
        'tsprocexpd'  =>  $tsprocexpd,
        'tsproctrfc'  =>  $tsproctrfc,
        'tsprocexim'  =>  $tsprocexim,
        'tscon'       =>  $tscon,
        'tsppc'       =>  $tsppc,
        'tsmis'       =>  $tsmis,
        'tsfin'       =>  $tsfin,
        'tsqa'        =>  $tsqa,
        'tslgl'       =>  $tslgl,
        'tsia'        =>  $tsia,
        'tsred'       =>  $tsred,
        'tsmc'        =>  $tsmc,
        'tshse'       =>  $tshse,
        'tshrd'       =>  $tshrd,
        'tsrt'        =>  $tsrt,
        'tsmd'        =>  $tsmd,
        'tsmr'        =>  $tsmr,
        'tssub'       =>  $tssub,
        'tstop'       =>  $tstop,
        'kekuatan'    =>  $kekuatan,
        'kelemahan'   =>  $kelemahan,
        'rencana'     =>  $rencana,
        'user'        =>  getSession('user'),
        'tgl'         =>  $today
    );
    $this->db->insert('knowhow', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT DATA KNOWHOW',
        'note'    => $nik.' - '.$periode.' - '.$tahun,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  } 

  function simpanmanagerialskill($nik,$periode,$tahun,$dev,$dir,$tw,$tl,$ps,$po,$at,$ct,$int,$iu,$rb,$imp,$ach,$co,$inf,$cso,$penanggung,$jadwal,$komentar){
    $today=date('Y-m-d h:i:sa');

    $data = array(
        'nik'       =>  $nik,
        'periode'   =>  $periode,
        'tahun'     =>  $tahun,
        'dev'       =>  $dev,
        'dir'       =>  $dir,
        'tw'        =>  $tw,
        'tl'        =>  $tl,
        'ps'        =>  $ps,
        'po'        =>  $po,
        'at'        =>  $at,
        'ct'        =>  $ct,
        'int'       =>  $int,
        'iu'        =>  $iu,
        'rb'        =>  $rb,
        'imp'       =>  $imp,
        'ach'       =>  $ach,
        'co'        =>  $co,
        'inf'       =>  $inf,
        'cso'       =>  $cso,
        'jawab'     =>  $penanggung,
        'jadwal'    =>  $jadwal,
        'komentar'  =>  $komentar,
        'user'      =>  getSession('user'),
        'tgl'       =>  $today
    );
    $this->db->insert('managerialskill', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT DATA MANAGERIALSKILL',
        'note'    => $nik.' - '.$periode.' - '.$tahun,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatagrade(){
    $data = null;
    $query = $this->db->query("select * from grade order by CAST(grade as unsigned), grade");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }
  
  function getpegawaiawal($nik){
    $data = null;
    $query = $this->db->query("select * from pegawai where nik=?",array($nik));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function cekrotasi($tanggal,$nik){
    $data = null;
    $query = $this->db->query("select count(*) as jum from rotasi where nik=? and tanggal=?",array($nik,$tanggal));
    foreach ($query->result() as $key => $row) {
      $data = $row->jum;
    }
    return $data;
  }

  function simpanrotasi($jenis,$tanggal,$nama,$status,$unit,$grade,$struktural,$jabatan,$statusbaru,$unitbaru,$gradebaru,$strukturalbaru,$jabatanbaru){
    $today=date('Y-m-d h:i:sa');

    $data = array(
        'jenis'         =>  $jenis,
        'tanggal'       =>  $tanggal,
        'nik'           =>  $nama,
        'statuslama'    =>  $status,
        'unitlama'      =>  $unit,
        'gradelama'     =>  $grade,
        'strukturlama'  =>  $struktural,
        'jabatanlama'   =>  $jabatan,
        'statusbaru'    =>  $statusbaru,
        'unitbaru'      =>  $unitbaru,
        'gradebaru'     =>  $gradebaru,
        'strukturbaru'  =>  $strukturalbaru,
        'jabatanbaru'   =>  $jabatanbaru,
        'acc'           =>  '1',
        'user'          =>  getSession('user'),
        'tglentry'      =>  $today
    );
    $this->db->insert('rotasi', $data); 
    $value = $this->db->affected_rows();
    return $value; 
  }

  function updaterotasi($jenis,$tanggal,$nama,$status,$unit,$grade,$struktural,$jabatan,$statusbaru,$unitbaru,$gradebaru,$strukturalbaru,$jabatanbaru){
    $today=date('Y-m-d h:i:sa');

    $data = array(
        'jenis'         =>  $jenis,
        'statuslama'    =>  $status,
        'unitlama'      =>  $unit,
        'gradelama'     =>  $grade,
        'strukturlama'  =>  $struktural,
        'jabatanlama'   =>  $jabatan,
        'statusbaru'    =>  $statusbaru,
        'unitbaru'      =>  $unitbaru,
        'gradebaru'     =>  $gradebaru,
        'strukturbaru'  =>  $strukturalbaru,
        'jabatanbaru'   =>  $jabatanbaru,
        'acc'           =>  '1',
        'user'          =>  getSession('user'),
        'tglentry'      =>  $today
    );
    $this->db->update('rotasi', $data, array('nik' => $nama, 'tanggal' => $tanggal)); 
    $value = $this->db->affected_rows();
    return $value; 
  }

  function cariotorotasi($nik,$jenis,$tgl1,$tgl2){
    $data=null;
    $carinik = '';
    if ($nik!='') {
        $carinik = " and r.nik='".$nik."'";
    }

    $carijenis='';
    if ($jenis!='') {
        $carijenis = " and r.jenis='".$jenis."'";
    }

    $caritgl='';
    if ($tgl1!='' and $tgl2!='') {
        $caritgl = " and r.tanggal between ".$tgl1." and ".$tgl2;
    }        

    $sql = "SELECT r.*, p.nama FROM rotasi r, pegawai p where r.nik=p.nik and r.acc=1 ";
    $query = $this->db->query($sql.$carinik.$carijenis.$caritgl." order by r.tanggal");
    foreach ($query->result() as $key => $row) {
        $data[] = $row;
        $query = $this->db->query("select namaunit from unit where kunit=?",array($row->unitbaru));
        foreach ($query->result() as $rowu) {
            $data[$key]->unitbaru = $rowu->namaunit;
        }
        $query = $this->db->query("select namajabatan from jabatan where kojab=?",array($row->jabatanbaru));
        foreach ($query->result() as $rowj) {
            $data[$key]->jabatanbaru = $rowj->namajabatan;
        }
    }
    return $data;
  }

  function carireportrotasi($nik,$jenis,$tgl1,$tgl2){
    $data=null;
    $carinik = '';
    if ($nik!='') {
        $carinik = " and r.nik='".$nik."'";
    }

    $carijenis='';
    if ($jenis!='') {
        $carijenis = " and r.jenis='".$jenis."'";
    }

    $caritgl='';
    if ($tgl1!='' and $tgl2!='') {
        $caritgl = " and r.tanggal between ".$tgl1." and ".$tgl2;
    }        

    $sql = "SELECT r.*, p.nama FROM rotasi r, pegawai p where r.nik=p.nik ";
    $query = $this->db->query($sql.$carinik.$carijenis.$caritgl." order by r.tanggal");
    foreach ($query->result() as $key => $row) {
        $data[] = $row;
        $query = $this->db->query("select namaunit from unit where kunit=?",array($row->unitbaru));
        foreach ($query->result() as $rowu) {
            $data[$key]->unitbaru = $rowu->namaunit;
        }
        $query = $this->db->query("select namajabatan from jabatan where kojab=?",array($row->jabatanbaru));
        foreach ($query->result() as $rowj) {
            $data[$key]->jabatanbaru = $rowj->namajabatan;
        }
    }
    return $data;
  }

}
?>