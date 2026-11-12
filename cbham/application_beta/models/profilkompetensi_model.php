<?php
class Profilkompetensi_model extends MY_Model{

  // function getdatapegawai(){
  //   $data = null;
  //   $query = $this->db->query("select c.nik,c.nama,c.jabatan from pegawai a,strukturjab b,pegawai c where a.jabatan=b.kojab1 and a.jabatan=? and b.kojab2=c.jabatan",getSession('kojab'));
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

  function simpanknowhow($nama,
                        $periode,
                        $tahun,
                        $fe,
                        $ie,
                        $ex,
                        $bs,
                        $tsmkt,
                        $tsest,
                        $tsppc,
                        $tscon,
                        $tsqac,
                        $tsman,
                        $tssar,
                        $tscs,
                        $tspeng,
                        $tsfat,
                        $tshse,
                        $tshrd,
                        $tsga,
                        $tsmd,
                        $tsmr,
                        $tsengmech,
                        $tsengelec,
                        $tsenginst,
                        $tsengciv,
                        $tssd,
                        $tsia,
                        $tstop,
                        $kekuatan,
                        $kelemahan,
                        $rencana){
    $today=date('Y-m-d h:i:sa');

    $query = $this->db->query("select jabatan from pegawai where nik=?",array($nama));
    foreach ($query->result() as $rowj) {
        $kojab = $rowj->jabatan;
    }

    $data = array(
        'nik'         =>  $nama,
        'periode'     =>  $periode,
        'tahun'       =>  $tahun,
        'kojab'       =>  $kojab,
        'fe'          =>  $fe,
        'ie'          =>  $ie,
        'ex'          =>  $ex,
        'bs'          =>  $bs,
        'tsmkt'       =>  $tsmkt,
        'tsest'       =>  $tsest,
        'tsppc'       =>  $tsppc,
        'tscon'       =>  $tscon,
        'tsqac'       =>  $tsqac,
        'tsman'       =>  $tsman,
        'tssar'       =>  $tssar,
        'tscs'        =>  $tscs,
        'tspeng'      =>  $tspeng,
        'tsfat'       =>  $tsfat,
        'tshse'       =>  $tshse,
        'tshrd'       =>  $tshrd,
        'tsga'        =>  $tsga,
        'tsmd'        =>  $tsmd,
        'tsmr'        =>  $tsmr,
        'tsengmech'   =>  $tsengmech,
        'tsengelec'   =>  $tsengelec,
        'tsenginst'   =>  $tsenginst,
        'tsengciv'    =>  $tsengciv,
        'tssd'        =>  $tssd,
        'tsia'        =>  $tsia,
        'tstop'       =>  $tstop,
        'kekuatan'    =>  $kekuatan,
        'kelemahan'   =>  $kelemahan,
        'rencana'     =>  $rencana,
        'user'        =>  getSession('user'),
        'tglentry'    =>  $today
    );
    $this->db->insert('knowhow', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT DATA KNOWHOW',
        'note'    => $nama.' - '.$periode.' - '.$tahun,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  } 

  function simpanmanagerialskill($nama,
                        $periode,
                        $tahun,
                        $dev,
                        $dir,
                        $tw,
                        $tl,
                        $ps,
                        $po,
                        $so,
                        $at,
                        $ct,
                        $int,
                        $iu,
                        $rb,
                        $imp,
                        $ing,
                        $trp,
                        $tew,
                        $crt,
                        $wis,
                        $exc,
                        $ach,
                        $co,
                        $is,
                        $cso,
                        $penanggungjawab,
                        $jadwal,
                        $komentar){
    $today=date('Y-m-d h:i:sa');

    $query = $this->db->query("select jabatan from pegawai where nik=?",array($nama));
    foreach ($query->result() as $rowj) {
        $kojab = $rowj->jabatan;
    }

    $data = array(
        'nik'       =>  $nama,
        'periode'   =>  $periode,
        'tahun'     =>  $tahun,
        'kojab'     =>  $kojab,
        'dev'       =>  $dev,
        'dir'       =>  $dir,
        'tw'        =>  $tw,
        'tl'        =>  $tl,
        'ps'        =>  $ps,
        'po'        =>  $po,
        'so'        =>  $so,
        'at'        =>  $at,
        'ct'        =>  $ct,
        'int'       =>  $int,
        'iu'        =>  $iu,
        'rb'        =>  $rb,
        'imp'       =>  $imp,
        'ing'       =>  $ing,
        'trp'       =>  $trp,
        'tew'       =>  $tew,
        'crt'       =>  $crt,
        'wis'       =>  $wis,
        'exc'       =>  $exc,
        'ach'       =>  $ach,
        'co'        =>  $co,
        'is'        =>  $is,
        'cso'       =>  $cso,
        'penanggungjawab'     =>  $penanggungjawab,
        'jadwal'    =>  $jadwal,
        'komentar'  =>  $komentar,
        'user'      =>  getSession('user'),
        'tglentry'       =>  $today
    );
    $this->db->insert('managerialskill', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT DATA MANAGERIALSKILL',
        'note'    => $nama.' - '.$periode.' - '.$tahun,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function cariprofilkompetensi($nik,$tahun,$periode){
    $query = $this->db->query("select jabatan from pegawai where nik=?",array($nik));
    foreach ($query->result() as $rowj) {
        $kojab = $rowj->jabatan;
    }

    $data = null;

    $datak = null;
    $knowhow = $this->db->query("select column_name as nama from information_schema.columns where table_schema='datacbham' and table_name='stdknowhow' and column_name<>'kojab' and column_name<>'namajab' and column_name<>'tglentry' and column_name<>'user' and column_name<>'noindex'");
    foreach ($knowhow->result() as $key => $row) {
        $datak[] = $row;
        $datak[$key]->jenis = 'KNOWHOW';
        $query = $this->db->query("select ".$row->nama." as std from stdknowhow where kojab=?",array($kojab));
        foreach ($query->result() as $rows) {
            $datak[$key]->standart = $rows->std;
        }

        $query = $this->db->query("select ".$row->nama." as val from knowhow where nik=? and tahun=? and periode=?",array($nik,$tahun,$periode));
        foreach ($query->result() as $rowv) {
            $datak[$key]->val = $rowv->val;
        }

        $gap = $datak[$key]->standart - $datak[$key]->val;
        $datak[$key]->gap = $gap;
    } 

    $datam = null;
    $managerial = $this->db->query("select column_name as nama from information_schema.columns where table_schema='datacbham' and table_name='stdmanagerial' and column_name<>'kojab' and column_name<>'namajab' and column_name<>'tglentry' and column_name<>'user' and column_name<>'noindex'");
    foreach ($managerial->result() as $key => $row) {
        $datam[] = $row;
        $datam[$key]->jenis = 'MANAGERIAL';
        $query = $this->db->query("select stdmanagerial.".$row->nama." as std from stdmanagerial where kojab=?",array($kojab));
        foreach ($query->result() as $rows) {
            $datam[$key]->standart = $rows->std;
        }

        $query = $this->db->query("select managerialskill.".$row->nama." as val from managerialskill where nik=? and tahun=? and periode=?",array($nik,$tahun,$periode));
        foreach ($query->result() as $rowv) {
            $datam[$key]->val = $rowv->val;
        }

        $gap = $datam[$key]->standart - $datam[$key]->val;
        $datam[$key]->gap = $gap;
    } 

    if (count($datam)>0 && count($datak)>0) {
        $data = array($datak, $datam);
    }
    
    return $data;
  }

  function carirekapprofilkompetensi($nik,$tahun){
    $query = $this->db->query("select jabatan from pegawai where nik=?",array($nik));
    foreach ($query->result() as $rowj) {
        $kojab = $rowj->jabatan;
    }

    $data = null;

    $datak = null;
    $knowhow = $this->db->query("select column_name as nama from information_schema.columns where table_schema='datacbham' and table_name='stdknowhow' and column_name<>'kojab' and column_name<>'namajab' and column_name<>'tglentry' and column_name<>'user' and column_name<>'noindex'");
    foreach ($knowhow->result() as $key => $row) {
        $datak[] = $row;
        $datak[$key]->jenis = 'KNOWHOW';
        $query = $this->db->query("select ".$row->nama." as std from stdknowhow where kojab=?",array($kojab));
        foreach ($query->result() as $rows) {
            $datak[$key]->standart = $rows->std;
        }

        for ($i=1; $i <=2 ; $i++) { 
            $query = $this->db->query("select ".$row->nama." as val from knowhow where nik=? and tahun=? and periode=?",array($nik,$tahun,$i));
            if (count($query->result())>0) {
                foreach ($query->result() as $rowv) {
                    $datak[$key]->{'val'.$i} = $rowv->val;
                }
            } else {
                $datak[$key]->{'val'.$i} = 0;
            }

            $gap = $datak[$key]->standart - $datak[$key]->{'val'.$i};
            $datak[$key]->{'gap'.$i} = $gap;
        }
    } 

    $datam = null;
    $managerial = $this->db->query("select column_name as nama from information_schema.columns where table_schema='datacbham' and table_name='stdmanagerial' and column_name<>'kojab' and column_name<>'namajab' and column_name<>'tglentry' and column_name<>'user' and column_name<>'noindex'");
    foreach ($managerial->result() as $key => $row) {
        $datam[] = $row;
        $datam[$key]->jenis = 'MANAGERIAL';
        $query = $this->db->query("select stdmanagerial.".$row->nama." as std from stdmanagerial where kojab=?",array($kojab));
        foreach ($query->result() as $rows) {
            $datam[$key]->standart = $rows->std;
        }

        for ($i=1; $i <=2 ; $i++) { 
            $query = $this->db->query("select managerialskill.".$row->nama." as val from managerialskill where nik=? and tahun=? and periode=?",array($nik,$tahun,$i));
            if (count($query->result())>0) {
                foreach ($query->result() as $rowv) {
                    $datam[$key]->{'val'.$i} = $rowv->val;
                }
            } else {
                $datam[$key]->{'val'.$i} = 0;
            }

            $gap = $datam[$key]->standart - $datam[$key]->{'val'.$i};
            $datam[$key]->{'gap'.$i} = $gap;
        }
    } 

    if (count($datam)>0 && count($datak)>0) {
        $data = array($datak, $datam);
    }
    return $data;
  }

}
?>