<?php
class Stdmanagerial_model extends MY_Model{

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

  function caristdmanagerial($kojab){
    $query = $this->db->query("select * from stdmanagerial where kojab=?",array($kojab)); 
    $result = $query->result();

    if (count($result) > 0) {
      return $result[count($result)-1];
    } else {
      return false;
    }
  }

  function carireportstdmanagerial($kojab){
    $value = "NOK";
  
    $dbb = $this->load->database('fb1',true);

    $data = array(
      'urut' => getSession('user')
    );
    $dbb->delete('tampung', $data);  
    $dbb->delete('tampung2', $data);
  
    $query = $dbb->query("select * from stdmanagerial where kojab=?",array($kojab));
    foreach ($query->result() as $row)
    {               
        $data = array(
            'ket1'   => 'DEV',
            'ket2'   => $row->dev,
            'ket3'   => 'Developing Others',
            'jum1'   => 1,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);          
        $data = array(
            'ket1'   => 'DIR',
            'ket2'   => $row->dir,
            'ket3'   => 'Directiveness, Assertiveness and Use of Position Power',
            'jum1'   => 2,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TW',
            'ket2'   => $row->tw,
            'ket3'   => 'Teamwork & Cooperation',
            'jum1'   => 3,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TL',
            'ket2'   => $row->tl,
            'ket3'   => 'Teamleadership',
            'jum1'   => 4,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'PS',
            'ket2'   => $row->ps,
            'ket3'   => 'Problem Solving/Decision Making',
            'jum1'   => 5,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'PO',
            'ket2'   => $row->po,
            'ket3'   => 'Planning and Organizing',
            'jum1'   => 6,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'SO',
            'ket2'   => $row->so,
            'ket3'   => 'Strategic Orientation',
            'jum1'   => 7,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'AT',
            'ket2'   => $row->at,
            'ket3'   => 'Analytical Thinking',
            'jum1'   => 8,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'CT',
            'ket2'   => $row->ct,
            'ket3'   => 'Conceptual Thinking',
            'jum1'   => 9,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'INT',
            'ket2'   => $row->int,
            'ket3'   => 'Initiative',
            'jum1'   => 10,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'IU',
            'ket2'   => $row->iu,
            'ket3'   => 'Interpersonal Understanding',
            'jum1'   => 11,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'RB',
            'ket2'   => $row->rb,
            'ket3'   => 'Relation Building',
            'jum1'   => 12,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'IMP',
            'ket2'   => $row->imp,
            'ket3'   => 'Impact & Influence',
            'jum1'   => 13,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'ING',
            'ket2'   => $row->ing,
            'ket3'   => 'Integrity',
            'jum1'   => 14,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TRP',
            'ket2'   => $row->trp,
            'ket3'   => 'Transparancy',
            'jum1'   => 15,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TEW',
            'ket2'   => $row->tew,
            'ket3'   => 'Teamwork',
            'jum1'   => 16,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'CRT',
            'ket2'   => $row->crt,
            'ket3'   => 'Creativity',
            'jum1'   => 17,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'WIS',
            'ket2'   => $row->wis,
            'ket3'   => 'Wining Spirit',
            'jum1'   => 18,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'EXC',
            'ket2'   => $row->exc,
            'ket3'   => 'Excellence',
            'jum1'   => 19,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'ACH',
            'ket2'   => $row->ach,
            'ket3'   => 'Achievement Orientation',
            'jum1'   => 20,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'CO',
            'ket2'   => $row->co,
            'ket3'   => 'Concern for Order, Quality and Accuracy',
            'jum1'   => 21,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'IS',
            'ket2'   => $row->is,
            'ket3'   => 'Information Seeking',
            'jum1'   => 22,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'CSO',
            'ket2'   => $row->cso,
            'ket3'   => 'Customer Service Orientation',
            'jum1'   => 23,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
    }   

    
    $query = $dbb->query("select * from tampung where urut='" .getSession('user')."' order by jum1");  
    foreach ($query->result() as $row)
    {               
      $cek1='';$cek2='';$cek3='';$cek4='';$cek5='';
      if($row->ket2==1){
        $cek1='X';
      }elseif($row->ket2==2){
        $cek2='X';
      }elseif($row->ket2==3){
        $cek3='X';
      }elseif($row->ket2==4){
        $cek4='X';
      }elseif($row->ket2==5){
        $cek5='X';
      }
        $data = array(
            'ket1'   => $row->ket1,
            'ket2'   => $cek1,
            'ket3'   => $cek2,
            'ket4'   => $cek3,
            'ket5'   => $cek4,
            'ket6'   => $cek5,
            'ket7'   => $row->ket3,
            'jum1'   => $row->jum1,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung2', $data);                                        
    }    

  $cek=0;
  $query = $dbb->query("select * from tampung2 where urut='" .getSession('user')."' order by jum1");  
  foreach ($query->result() as $row)
  { 
      $data1[] = $row;
      $cek=1;
  }
    
  if ($cek==1) {
      return $data1;      
  }else{ 
      $data1=0;
      return $data1;      
  }
}

function cetakstdmanagerial(){
  $data=null;
  $dbb = $this->load->database('fb1',true);
  $query = $dbb->query("select * from tampung2 where urut=? order by jum1",getSession('user'));
  foreach ($query->result() as $row)
  { 
    $data[] = $row;
    $cek=1;
  }
  if ($cek==1) {
     return $data;      
  }
  else 
  { 
     $data1=0;
     return $data;      
  }
}

  function simpanstdmanagerial($kojab,$jabatan,$dev,$dir,$tw,$tl,$ps,$po,$so,$at,$ct,$int,$iu,$rb,$imp,$ing,$trp,$tew,$crt,$wis,$exc,$ach,$co,$is,$cso){
    $today=date('Y-m-d H:i:s');

    $data = array(
        'kojab'     =>  $kojab,
        'namajab'   =>  $jabatan,
        'dev' =>  $dev,
        'dir' =>  $dir,
        'tw' =>  $tw,
        'tl'  =>  $tl,
        'ps'  =>  $ps,
        'po'  =>  $po,
        'so'  =>  $so,
        'at'  =>  $at,
        'ct'  =>  $ct,
        'int' =>  $int,
        'iu'  =>  $iu,
        'rb'  =>  $rb,
        'imp' =>  $imp,
        'ing' =>  $ing,
        'trp' =>  $trp,
        'tew' =>  $tew,
        'crt' =>  $crt,
        'wis' =>  $wis,
        'exc' =>  $exc,
        'ach' =>  $ach,
        'co'  =>  $co,
        'is'  =>  $is,
        'cso' =>  $cso
    );

    $query = $this->db->query("select * from stdmanagerial where kojab=?",array($kojab)); 
    $result = $query->result();

    $data['updated_at'] = $today;
    $data['updated_by'] = getSession('user_id');
    if(count($result) > 0) {
      $this->db->update('stdmanagerial', $data, array('kojab' => $kojab));
    } else {
      $data['user'] = getSession('user');
      $data['tglentry'] = $today;
      $this->db->insert('stdmanagerial', $data);
    }

    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT STANDAR MANAGERIAL',
        'note'    => $kojab.' - '.$jabatan,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function simpanjabatan($nama){
    $today=date('Y-m-d h:i:s');

    $data = array(
        'namajabatan' => $nama,
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

  function getdatajabatan($nama){
    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND namajabatan like '%".$nama."%'";
    }

    $data = null;
    $sql = "SELECT * FROM jabatan WHERE 1=1";
    $query = $this->db->query($sql.$carinama." ORDER BY KOJAB");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getjabatanbykojab($kojab){
    $data = null;
    $query = $this->db->query("SELECT * FROM jabatan WHERE kojab =?",array($kojab));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updatejabatan($kojab,$nama){
    $today=date('Y-m-d h:i:s');

    $data = array(
        'namajabatan' => $nama,
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

}
?>