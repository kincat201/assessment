<?php
class M_bobot extends MY_Model{

  function getdatakpi($kpi){
    $carikpi = "";
    if ($kpi!='' or $kpi!=null) {
      $carikpi = " AND kpi like '%".$kpi."%'";
    }

    $data = null;
    $sql = "SELECT * FROM kpi WHERE 1=1";
    $query = $this->db->query($sql.$carikpi." ORDER BY kodekpi");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

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

  function simpanbobot(){
    $today=date('Y-m-d');

    // $data = array(
    //     'kodebobot'   => $kodebobot
    // );
    // $this->db->delete('bobot', $data);  

    // $query = $this->db->query("select * from polarisasi where kode=?",array($polarisasi));   
    // foreach ($query->result() as $row){
    //     $namapolarisasi=$row->polarisasi;
    // }
 
    // if ($kelompok=='F'){$kelompokx=1;}
    // if ($kelompok=='C'){$kelompokx=2;}
    // if ($kelompok=='I'){$kelompokx=3;}
    // if ($kelompok=='L'){$kelompokx=4;}

    $query = $this->db->query("select sum(ket8) as jum1,sum(ket9) as jum2,sum(ket10) as jum3 from tampung where urut=?",array(getSession('urut')));   
    foreach ($query->result() as $row){
      $jum1=$row->jum1;
      $jum2=$row->jum2;
      $jum3=$row->jum3;
    }

    if(($jum1==100) and ($jum2==100) and ($jum3==100)){
      $query = $this->db->query("select * from tampung where urut=?",array(getSession('urut')));   
      foreach ($query->result() as $row){

        $query = $this->db->query("select count(kpi) as jum from bobot where tahun=? and unit=? and jabatan=? and kpi=?",array($row->ket1,$row->ket2,$row->ket4,$row->ket6));   
        foreach ($query->result() as $row1){
          $jum=$row1->jum;
        }

        if($jum<>0){
          $data = array(
              'tahun'       => $row->ket1,
              'unit'        => $row->ket2,
              'jabatan'     => $row->ket4,
              'kpi'         => $row->ket6,
          );
          $this->db->delete('bobot', $data);                  
        }

        $data = array(
            'tahun'       => $row->ket1,
            'unit'        => $row->ket2,
            'namaunit'    => $row->ket3,
            'jabatan'     => $row->ket4,
            'namajabatan' => $row->ket5,
            'kpi'         => $row->ket6,
            'namakpi'     => $row->ket7,
            'bobotbln'    => $row->ket8,            
            'bobotsmt'   => $row->ket9,
            'bobotthn'   => $row->ket10,
            'tglupdate'   => $today,
            'user'        => getSession('user')
        );
        $this->db->insert('bobot', $data);   
      }

      $value = $this->db->affected_rows();
      if ($value>0) {
        $data = array(
          'proses'  => 'INPUT BOBOT',
          'note'    => 'bobot',
          'user'    => getSession('user'),
          'tgl'     => $today
        );
        $this->db->insert('log', $data);  

        $data = array(
          'urut'    => getSession('urut'),
        );
        $this->db->delete('tampung', $data);          
      }

    }else{
      $value=-1;
    }


    return $value;
  }  

  function batal(){
    $data = array(
      'urut'    => getSession('urut'),
    );
    $this->db->delete('tampung', $data);          
  }

  function getdatabobot($nama){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND (bobot like '%".$nama."%' or kodebobot like '%".$nama."%' or deskripsi like '%".$nama."%')";
    }

    $data = null;
    $sql = "SELECT * FROM bobot WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY noindex");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function simpandetbobot($noindex,$tahun,$unit,$jabatan,$kpi,$bobotbln,$bobotsmt,$bobotthn){
    $query = $this->db->query("select namaunit from unit where kunit=?",array($unit));   
    foreach ($query->result() as $row){
        $namaunit=$row->namaunit;
    }
    $query = $this->db->query("select namajabatan from jabatan where kojab=?",array($jabatan));   
    foreach ($query->result() as $row){
        $namajabatan=$row->namajabatan;
    }    
    $query = $this->db->query("select kpi from kpi where kodekpi=?",array($kpi));   
    foreach ($query->result() as $row){
        $namakpi=$row->kpi;
    }        

    if($noindex==''){
      $data = array(
          'ket1'     => $tahun,
          'ket2'     => $unit,
          'ket3'     => $namaunit,
          'ket4'     => $jabatan,
          'ket5'     => $namajabatan,
          'ket6'     => $kpi,
          'ket7'     => $namakpi,
          'ket8'     => $bobotbln,
          'ket9'     => $bobotsmt,
          'ket10'    => $bobotthn,
          'urut'     => getSession('urut')
      );
      $this->db->insert('tampung', $data);   
    }else{
      $data = array(
          'ket1'     => $tahun,
          'ket2'     => $unit,
          'ket3'     => $namaunit,
          'ket4'     => $jabatan,
          'ket5'     => $namajabatan,
          'ket6'     => $kpi,
          'ket7'     => $namakpi,
          'ket8'     => $bobotbln,
          'ket9'     => $bobotsmt,
          'ket10'    => $bobotthn,
          'urut'     => getSession('urut')
      );
      $this->db->where('noindex', $noindex);         
      $this->db->update('tampung', $data);         
    }

    $data = null;
    $query = $this->db->query("SELECT * FROM tampung where urut=? ORDER BY noindex",array(getSession('urut')));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function hapusbobot($noindex){    
      $data = array(
          'noindex'     => $noindex,
      );
      $this->db->delete('tampung', $data);     

    $data = null;
    $query = $this->db->query("SELECT * FROM tampung where urut=? ORDER BY noindex",array(getSession('urut')));    
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getbobotbykbobot($noindex){
    $data = null;
    $query = $this->db->query("SELECT * FROM tampung WHERE noindex=?",array($noindex));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function cariotokodebobot($kelompok){
    $data = null;
    $kelompokx=$kelompok.'%';
    $query = $this->db->query("select count(urutkel) as urut from bobot where kodebobot like ?",array($kelompokx));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $urut=$row->urut+1;
      $kode=$kelompok.$urut;
      $data[$key]->kode = $kode;      
    }
    return $data;
  }

  function caribobot($tahun,$unit,$jabatan){
    $data = null;
    $caribobot='';
    // if ($bobot!='') {
      $caribobot = " AND (tahun = '".$tahun."' and unit = '".$unit."' and jabatan = '".$jabatan."')";      
    // }
    $sql = "SELECT * FROM bobot WHERE 1=1";
    $query = $this->db->query($sql.$caribobot);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updatebobot($noindex1,$kelompok1,$kodebobot1,$namabobot1,$deskripsi1,$target1,$satuan1,$rollup1,$polarisasi1,$periode1,$formula1){
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
        'kodebobot'       => $kodebobot1,
        'bobot'           => $namabobot1,
        'deskripsi'     => $deskripsi1,
        'target'        => $target1,
        'satuan'        => $satuan1,
        'rollup'        => $rollup1,
        'kodepolarisasi'=> $polarisasi1,
        'polarisasi'    => $namapolarisasi,            
        'periode'       => $periode1,
        'formula'       => $formula1,
        'kelompok'      => $kelompokx,
        'urutkel'       => substr($kodebobot1,1,5),
        'tglupdate'     => $today,
        'user'          => getSession('user')
    );
    $this->db->update('bobot', $data, array('noindex' => $noindex1));  

    // $data = array(
    //     'bobot'  => $namabobot1,
    //     'deskripsi'   => $deskripsibobot1,
    //     'formula'     => $formula1,
    //     'konstanta'   => $konstanta1,        
    //     'user'        => getSession('user'),
    //     'tglupdate'   => $today
    // );
    // $this->db->update('bobot', $data, array('noindex' => $noindex));  

    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT bobot',
        'note'    => $namabobot1,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function deletebobot($noindex2,$kelompok2,$kodebobot2,$namabobot2,$deskripsi2,$target2,$satuan2,$rollup2,$polarisasi2,$periode2,$formula2){
    $today=date('Y-m-d');

    $data = array(
        'noindex' => $noindex2
    );
    $this->db->delete('bobot', $data);      
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS bobot',
        'note'    => $namabobot2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }    

  function cetakbobot(){
    $data = null;
    $query = $this->db->query("SELECT * FROM bobot order by tahun,unit,jabatan");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

}
?>