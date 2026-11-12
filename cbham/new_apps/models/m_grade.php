<?php
class M_grade extends MY_Model{

  function simpangrade($namagrade,$struktural,$fungsional,$kelas){
    $today=date('Y-m-d');

    $data = array(
        'grade'       => $namagrade,
        'struktural'  => $struktural,
        'fungsional'  => $fungsional,
        'kelas'       => $kelas,
        'user'        => getSession('user'),
        'tglentry'    => $today
    );
    $this->db->insert('grade', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT grade',
        'note'    => $namagrade,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function getdatagrade($nama ,$limit=NULL,$offset=NULL){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND grade like '%".$nama."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $data = null;
    $sql = "SELECT * FROM grade WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY noindex".$limitQuery);
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

  function getgradebykgrade($noindex){
    $data = null;
    $query = $this->db->query("SELECT * FROM grade WHERE noindex=?",array($noindex));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function carigrade($grade ,$limit=NULL,$offset=NULL){
    $data = null;
    $carigrade='';
    if ($grade!='') {
      $carigrade=" and grade like '%".$grade."%'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $sql = "SELECT * FROM grade WHERE 1=1";
    $query = $this->db->query($sql.$carigrade.$limitQuery);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    
    $total = $this->db->query($sql.$carigrade)->num_rows();
    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total);
    }
  }

  function updategrade($noindex,$namagrade1,$struktural1,$fungsional1,$kelas1){
    $today=date('Y-m-d');

    $data = array(
        'grade'      => $namagrade1,
        'struktural'  => $struktural1,
        'fungsional'  => $fungsional1,
        'kelas'       => $kelas1,        
        'user'        => getSession('user'),
        'tglentry'         => $today
    );
    $this->db->update('grade', $data, array('noindex' => $noindex));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'EDIT grade',
        'note'    => $namagrade1,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function deletegrade($kodegrade2,$namagrade2){
    $today=date('Y-m-d');

    $data = array(
        'noindex' => $kodegrade2
    );
    $this->db->delete('grade', $data);  
    // $this->db->update('grade', $data, array('noindex' => $noindex));  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'HAPUS grade',
        'note'    => $namagrade2,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }    

  function cetakgrade(){
    $data = null;
    $query = $this->db->query("SELECT * FROM grade order by noindex");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

}
?>