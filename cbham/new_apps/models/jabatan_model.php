<?php
class Jabatan_model extends MY_Model{

  function simpanjabatan($nama,$kelompok){
    $today=date('Y-m-d h:i:s');

    $data = array(
        'namajabatan' => $nama,
        'kelompok' => $kelompok,
        'user'        => getSession('user'),
        'tgl'         => $today
    );
    $this->db->insert('jabatan', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT JABATAN',
        'note'    => $nama,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatajabatan($nama ,$limit=NULL,$offset=NULL){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND namajabatan like '%".$nama."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $data = null;
    $sql = "SELECT * FROM jabatan left join kelompok on jabatan.kelompok = kelompok.kodekelom ";

    $jabatan_filter = '';

    if(getSession('role')=='HCMM' || getSession('role')=='User'){
      $sql = "SELECT * FROM strukturjab JOIN jabatan ON strukturjab.kojab2 = jabatan.kojab ";
      $sql .= 'WHERE kojab1='.getSession('kojab');
    }

    $query = $this->db->query($sql.$carinama." ORDER BY KOJAB".$limitQuery);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    $total = $this->db->query($sql.$carinama)->num_rows();
    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total);
    }
  }

  function getkelomjabatan(){
    $data = null;
    // $sql = "SELECT * FROM jabatan WHERE 1=1";
    $query = $this->db->query("SELECT * FROM kelompok order by kodekelom");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getjabatanbykojab($kojab){
    $data = null;
    $query = $this->db->query("SELECT * FROM jabatan WHERE kojab=?",array($kojab));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function carijabatan($jabatan, $limit = NULL, $offset = NULL){
    $data = [];
    $carijabatan='';
    if ($jabatan!='') {
      $carijabatan=" and namajabatan like '%".$jabatan."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $sql = "SELECT * FROM jabatan left join kelompok on jabatan.kelompok = kelompok.kodekelom WHERE 1=1";
    $query = $this->db->query($sql.$carijabatan.$limitQuery);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    $total = $this->db->query($sql.$carijabatan)->num_rows();
    return array('result' => $data, 'total' => $total);
    /*if (empty($limitQuery)) {
      return array('result' => $data, 'total' => $total);return $data;
    } else  {
      return array('result' => $data, 'total' => $total);
    }*/
  }

  function updatejabatan($kojab,$nama,$kelompok2){
    $today=date('Y-m-d h:i:s');

    $data = array(
        'namajabatan' => $nama,
        'kelompok' => $kelompok2,
        'user'        => getSession('user'),
        'tgl'         => $today
    );
    $this->db->update('jabatan', $data, array('kojab' => $kojab));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT JABATAN',
        'note'    => $nama,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

 function deletejabatan($kojab2){
    $today=date('Y-m-d');

    $data = array(
        'kojab' => $kojab2
    );
    $this->db->delete('jabatan', $data);  
    
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS JABATAN',
        'note'    => $kojab2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  } 

  function cetakjabatan(){
    $data = null;
    $query = $this->db->query("SELECT * FROM jabatan order by kojab");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $query = $this->db->query("select namakelompok from kelompok where kodekelom =?",array($row->kelompok));       
      foreach ($query->result() as $row1)
       {               
          $data[$key]->namakelompok = $row1->namakelompok;
       }
    }
    return $data;
  }

  function getstruktur($kojab){
    $data = null;
    $query = $this->db->query("SELECT * FROM strukturjab a, jabatan b WHERE a.kojab1=? and a.kojab2=b.kojab",array($kojab));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getjabatanunit($unit){
    $data = null;
    $query = $this->db->where('unit_id',$unit)
              ->join('unit','unit.kunit = jabatan_unit.unit_id')
              ->join('jabatan','jabatan.kojab = jabatan_unit.jabatan_id')
              ->get('jabatan_unit');
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function caristruktur($kojab){
    $data = null;    
    $query = $this->db->query("SELECT count(a.kojab1) as jum FROM strukturjab a, jabatan b WHERE a.kojab1=? and a.kojab2=b.kojab",array($kojab));
    foreach ($query->result() as $row){
      $jum=$row->jum;
    }

    if($jum>0){
      $query = $this->db->query("SELECT * FROM strukturjab a, jabatan b WHERE a.kojab1=? and a.kojab2=b.kojab",array($kojab));
      foreach ($query->result() as $key => $row) {
        $data[] = $row;
      }
    }else{
      $data=0;
    }
    return $data;
  }

  function tambahstruktur($kojab1,$kojab2){
    $check = $this->db->where('kojab1',$kojab1)->where('kojab2',$kojab2)->get('strukturjab')->num_rows();

    if($check>0){
      return false;
    }

    $today=date('Y-m-d h:i:s');

    $data = array(
        'kojab1'    => $kojab1,
        'kojab2'    => $kojab2,
        'user'      => getSession('user'),
        'tgl'       => $today
    );
    $this->db->insert('strukturjab', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT STRUKTUR',
        'note'    => $kojab1.' - '.$kojab2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

 function hapusstruktur($kojab){
    $today=date('Y-m-d');

    $data = array(
        'kojab2' => $kojab
    );
    $this->db->delete('strukturjab', $data);  
    
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS STRUKTUR JABATAN',
        'note'    => $kojab,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  } 

  function getjabatanList($strData){
    $data=null;
    $str = '%'.$strData.'%';
    $query  = $this->db->query("select * from jabatan where namajabatan like ?",$str);
    foreach ($query->result() as $row)
    { 
      $data[] = $row;
    }
    return $data;    
  } 

  public function tambahJabatanUnit($unit,$jabatan)
  {
    $check = $this->db->where('unit_id',$unit)->where('jabatan_id',$jabatan)->get('jabatan_unit')->num_rows();
    if($check>0){
      return false;
    }
    $data['unit_id'] = $unit;
    $data['jabatan_id'] = $jabatan;
    return $this->db->insert('jabatan_unit',$data);
  }

  public function hapusJabatanUnit($unit,$jabatan)
  {
    $this->db->where('unit_id',$unit)->where('jabatan_id',$jabatan);
    return $this->db->delete('jabatan_unit');
  }

  public function get_data($kojab){
      return $this->db->where('kojab',$kojab)->get('jabatan')->row();
  }

}
?>