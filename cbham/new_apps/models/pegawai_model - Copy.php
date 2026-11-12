<?php
class Pegawai_model extends MY_Model{

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

  function hapuspegawai($nik){
    $data = array(
        'nik'    => $nik
    );
    $this->db->delete('pegawai', $data);  
    $this->db->delete('keluarga', $data);  
    $this->db->delete('pendidikan', $data);
  }

  function hapuspegawaibyid($id){
    $data = array(
        'id'    => $id
    );

    $data_pegawai = array(
        'pegawai_id'    => $id
    );
    $this->db->delete('pegawai', $data);  
    $this->db->delete('keluarga', $data_pegawai);  
    $this->db->delete('pendidikan', $data_pegawai);
  }

  function tambahkeluarga($nik,$nama,$hubungan,$pekerjaan,$tgllahirkeluarga,$jkkeluarga,$kondisi){
    $nik=trim($nik);
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
    $namajab = '';
    foreach ($query->result() as $rowj) {
      $namajab = $rowj->namajabatan;
    }

    $query = $this->db->query("SELECT * FROM unit WHERE kunit=?",array($unit));
    $namaunit = '';
    foreach ($query->result() as $rowu) {
      $namaunit = $rowu->namaunit;
    }

    if ($lulus=='') {
      $lulus = '0';
    } 
    if ($statusbpjskt=='') {
      $statusbpjskt = '0';
    } 
    if ($statusbpjskes=='') {
      $statusbpjskes = '0';
    } 
    if ($statusppip=='') {
      $statusppip = '0';
    } 
    if ($statusppukp=='') {
      $statusppukp = '0';
    } 
    if ($statusjiwasraya=='') {
      $statusjiwasraya = '0';
    } 
    if ($statusjkdk=='') {
      $statusjkdk = '0';
    } 
    if ($tgllahir=='') {
      $tgllahir = null;
    } 
    if ($kodepos=='') {
      $kodepos = null;
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
    if (empty($tgllahir)) {
      $tgllahir = null;
    }
    $nik=trim($nik);
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
        'userentry'     => getSession('user'),
        'tglentry'      => $today,
        'grade'         => $grade,
        'tglmulaikontrak'   => $tglmulaikontrak,
        'tglselesaikontrak' => $tglselesaikontrak,
        'tglpengangkatan'   => $tglpengangkatan,
        'namabank'         => $namabank,
        'jenisjabatan'  => $struktural,
        'created_by' => getSession('user_id')
    );

    if (!empty($password)) {
      $data['password'] = md5($password);
    }
    $this->db->insert('pegawai', $data);
    $pegawai_id = $this->db->insert_id();  
    $value = $this->db->affected_rows();

    $query = $this->db->query("SELECT * FROM TAMPUNGKELUARGA WHERE NIK=? AND USER=?",array($nik,getSession('user')));
    foreach ($query->result() as $row) {
      $datakel = array(
        'pegawai_id'  => $pegawai_id,
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

    $query = $this->db->query("SELECT * FROM tampungpendidikan WHERE NIK=? AND USER=?",array($nik,getSession('user')));
    foreach ($query->result() as $row) {
      $datapen = array(
        'pegawai_id'    => $pegawai_id,
        'nik'           => $row->nik,
        'pendidikan'    => $row->pendidikan,
        'namauniv'      => $row->namauniv,
        'jurusan'       => $row->jurusan,
        'lulus'         => $row->lulus,
        'tempatbelajar' => $row->tempatbelajar,
        'ijazah'        => $row->ijazah,
        'user'          => getSession('user'),
        //'noindex'       => $row->noindex,
        'tgl'           => $today
      );
      $this->db->insert('pendidikan', $datapen); 
    }
    $this->db->delete('tampungpendidikan', array('nik' => $nik, 'user' => getSession('user'))); 

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

  function getdatapegawai($nik,$nama,$tglmasuk1,$tglmasuk2,$pendidikan,$status,$unit,$jabatan,$limit = NULL, $offset = NULL,$personal=0){
    $carinik = "";
    if ($nik!='' or $nik!=null) {
      $carinik = " AND NIK=".$NIK;
    }

    $carinama = "";
    if ($nama!='' or $nama!=null) {
      $carinama = " AND NAMA LIKE '%".$NIK."'";
    }

    $get_personal = "";
    if($personal != 0){
      if(getSession('role') == 'User'){
        $get_personal = " AND id = ".getSession('user_id');
      }
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

    $caribyuser = "";
    if (getSession('role')=='Admin Unit' or getSession('role')=='') {
      $caribyuser = " and unit=".getSession('unit');
    } else {
      $caribyuser = " and nik='".getSession('nik')."'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $qcek = $this->db->query("select nik from pegawai where
                                  nik='0' or nama is null or tgllahir is null or tglmasuk is null or pendidikan is null or
                                  status is null or unit is null or jabatan is null or username is null or password is null or role is null or
                                  noktp is null or nokk is null or tempatlahir is null or darah is null or statuskeluarga is null or
                                  agama is null or rekening is null or alamat is null or kota is null or telp is null or grade is null or jenisjabatan is null 
                                  or nama='' or tgllahir='' or tglmasuk ='' or pendidikan='' or
                                  status='' or unit='' or jabatan='' or username='' or password='' or role='' or
                                  noktp='' or nokk='' or tempatlahir='' or darah='' or statuskeluarga='' or
                                  agama='' or rekening='' or alamat='' or kota='' or telp='' or grade='' or jenisjabatan='' or namabank='' or (status='Kontrak' and (tglmulaikontrak is null or tglselesaikontrak is null))
                                  order by nama");
    $datacek = $qcek->result_array();
    $data = null;
    $sql = "SELECT * FROM PEGAWAI WHERE NIK IS NOT NULL";
    $sqlResult = "SELECT COUNT(*) AS `count` FROM PEGAWAI WHERE NIK IS NOT NULL";
    // echo getSession('unit');
    if(getSession('role')=='HCMM' or (getSession('role')=='Admin' and getSession('unit')=='1')){
      $query = $this->db->query($sql.$carinik.$carinama.$get_personal.$caritgl.$caripend.$caristatus.$cariunit.$carijabatan." ORDER BY NAMA".$limitQuery);
      $totalResult = $this->db->query($sqlResult.$carinik.$carinama.$caritgl.$caripend.$caristatus.$cariunit.$carijabatan);
    }else{
      $query = $this->db->query($sql.$carinik.$carinama.$get_personal.$caritgl.$caripend.$caristatus.$cariunit.$carijabatan.$caribyuser." ORDER BY NAMA".$limitQuery);
      // echo $sql.$carinik.$carinama.$get_personal.$caritgl.$caripend.$caristatus.$cariunit.$carijabatan.$caribyuser." ORDER BY NAMA".$limitQuery;
      $totalResult = $this->db->query($sqlResult.$carinik.$carinama.$caritgl.$caripend.$caristatus.$cariunit.$carijabatan.$caribyuser);
    }
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $query = $this->db->query("SELECT * from unit where kunit=?",array($row->unit));
      $data[$key]->namaunit = '';
      foreach ($query->result() as $row1) {
        $data[$key]->namaunit = $row1->namaunit;
      }
      $query = $this->db->query("SELECT * from jabatan where kojab=?",array($row->jabatan));
      $data[$key]->namajabatan = '';
      foreach ($query->result() as $row2) {
        $data[$key]->namajabatan = $row2->namajabatan;
      }

      $id = searchForId($row->nik, $datacek);
      if (!isset($id)) {
        $data[$key]->complete = 1;
      } else {
        $data[$key]->complete = 0;
      }
    }

    $total = $totalResult->result();

    if (empty($limitQuery)) {
      return $data;
    } else  {
      // echo '<pre>';print_r($data);
      return array('result' => $data, 'total' => $total[0]->count);
    }
  }

  function getpegawaibynik($nik){
    $data = null;
    $query = $this->db->query("SELECT * FROM PEGAWAI WHERE NIK =?",array($nik));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $query = $this->db->query("SELECT * from unit where kunit=?",array($row->unit));
      $data[$key]->namaunit = '';
      foreach ($query->result() as $row1) {
        $data[$key]->namaunit = $row1->namaunit;
      }
      $query = $this->db->query("SELECT * from jabatan where kojab=?",array($row->jabatan));
      $data[$key]->namajabatan = '';
      foreach ($query->result() as $row2) {
        $data[$key]->namajabatan = $row2->namajabatan;
      }
    }
    return $data;
  }

  function getpegawaibyid($id) {
    $query = $this->db->select('pegawai.*, unit.namaunit, jabatan.namajabatan')
              ->where('pegawai.id', $id)
              ->join('unit','unit.kunit = pegawai.unit', 'left')
              ->join('jabatan','jabatan.kojab = pegawai.jabatan', 'left')
              ->get('pegawai');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else{
      return null;
    }
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
    //$query = $this->db->query("select c.nik,c.nama,c.unit,c.jabatan from pegawai a,strukturjab b,pegawai c where a.jabatan=b.kojab1 and a.jabatan=? and b.kojab2=c.jabatan and a.unit=c.unit",getSession('kojab'));
    $query = $this->db->select('pegawai.id,nik,nama,pegawai.unit,pegawai.jabatan')
            ->join('pegawai','pegawai.jabatan = strukturjab.kojab2')
            ->where('kojab1',getSession('kojab'))
            ->where('pegawai.unit',getSession('unit'))
            ->get('strukturjab');
     // $query = $this->db->query("SELECT * FROM PEGAWAI order by nama");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  /*function updatepegawai($nik,$nik2,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,$namabank,$struktural){
    $today=date('Y-m-d h:i:s');

    $this->db->trans_begin();
    $status = 0;

    $query = $this->db->query("SELECT * FROM jabatan WHERE kojab=?",array($jabatan));
    $namajab = '';
    foreach ($query->result() as $rowj) {
      $namajab = $rowj->namajabatan;
    }

    $query = $this->db->query("SELECT * FROM unit WHERE kunit=?",array($unit));
    $namaunit = '';
    foreach ($query->result() as $rowu) {
      $namaunit = $rowu->namaunit;
    }

    if ($kodepos=='') {
      $kodepos = null;
    } 

    if ($lulus=='') {
      $lulus = '0';
    } 
    if ($statusbpjskt=='') {
      $statusbpjskt = '0';
    } 
    if ($statusbpjskes=='') {
      $statusbpjskes = '0';
    } 
    if ($statusppip=='') {
      $statusppip = '0';
    } 
    if ($statusppukp=='') {
      $statusppukp = '0';
    } 
    if ($statusjiwasraya=='') {
      $statusjiwasraya = '0';
    } 
    if ($statusjkdk=='') {
      $statusjkdk = '0';
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
    if (empty($tgllahir)) {
      $tgllahir = null;
    }          
    $nik=trim($nik);
    $data = array(
        'nik'           => $nik,
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
        'userentry'     => getSession('user'),
        'tglentry'      => $today,
        'grade'         => $grade,
        'tglmulaikontrak'   => $tglmulaikontrak,
        'tglselesaikontrak' => $tglselesaikontrak,
        'tglpengangkatan'   => $tglpengangkatan,
        'namabank'         => $namabank,        
        'jenisjabatan'  => $struktural,
        'updated_at'  => date('Y-m-d H:i:s'),
        'updated_by' => getSession('user_id')
    );
    if (!empty($password)) {
      $data['password'] = md5($password);
    }
    $update_pegawai = $this->db->update('pegawai', $data, array('nik' => $nik2)); 
    if($update_pegawai){
      //$value = $this->db->affected_rows();
      $delete_keluarga = $this->db->delete('keluarga', array('nik' => $nik2));
      if($delete_keluarga){
        $query = $this->db->query("SELECT * FROM TAMPUNGKELUARGA WHERE NIK=? AND USER=?",array($nik2,getSession('user')));
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
          $insert_keluarga = $this->db->insert('keluarga', $datakel);
          if($insert_keluarga){
            continue;
          }else{
            $this->db->trans_rollback();break;
          }
        }

        $delete_tampung_keluarga = $this->db->delete('tampungkeluarga', array('nik' => $nik2, 'user' => getSession('user')));
        if($delete_tampung_keluarga){
          $delete_pendidikan = $this->db->delete('pendidikan', array('nik' => $nik2)); 
          if($delete_pendidikan){
            $query = $this->db->query("SELECT * FROM tampungpendidikan WHERE NIK=? AND USER=?",array($nik2,getSession('user')));
            foreach ($query->result() as $row) {
              $datapen = array(
                'nik'           => $nik,
                'pendidikan'    => $row->pendidikan,
                'namauniv'      => $row->namauniv,
                'jurusan'       => $row->jurusan,
                'lulus'         => $row->lulus,
                'tempatbelajar' => $row->tempatbelajar,
                'ijazah'        => $row->ijazah,
                'user'          => getSession('user'),
                'noindex'       => $row->noindex,
                'tgl'           => $today
              );
              $insert_pendidikan = $this->db->insert('pendidikan', $datapen);
              if($insert_pendidikan){
                continue;
              }else{
                $this->db->trans_rollback();break;
              }
            }
            $delete_tampung_pendidikan = $this->db->delete('tampungpendidikan', array('nik' => $nik2, 'user' => getSession('user')));
            if($delete_tampung_pendidikan){
              //if ($value>0) {
                $data = array(
                  'proses'  => 'EDIT PEGAWAI',
                  'note'    => $nik.' - '.$nama,
                  'user'    => getSession('user'),
                  'tgl'     => $today
                );
                $insert_log = $this->db->insert('log', $data);
                if($insert_log){
                  $status = 1;
                  $this->db->trans_commit();
                }else{
                  $this->db->trans_rollback();
                }  
              //}
            }else{
              $this->db->trans_rollback();
            }
          }else{
            $this->db->trans_rollback();
          }
        }else{
          $this->db->trans_rollback();
        }
      }else{
        $this->db->trans_rollback();
      }
    }else{
      $this->db->trans_rollback();
    } 

// print_r($value);exit();
    return $status;
  }*/

  function updatepegawai($nik,$nik2,$pegawai_id,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,$namabank,$struktural){
    $today=date('Y-m-d h:i:s');

    $query = $this->db->query("SELECT * FROM jabatan WHERE kojab=?",array($jabatan));
    $namajab = '';
    foreach ($query->result() as $rowj) {
      $namajab = $rowj->namajabatan;
    }

    $query = $this->db->query("SELECT * FROM unit WHERE kunit=?",array($unit));
    $namaunit = '';
    foreach ($query->result() as $rowu) {
      $namaunit = $rowu->namaunit;
    }

    if ($kodepos=='') {
      $kodepos = null;
    } 

    if ($lulus=='') {
      $lulus = '0';
    } 
    if ($statusbpjskt=='') {
      $statusbpjskt = '0';
    } 
    if ($statusbpjskes=='') {
      $statusbpjskes = '0';
    } 
    if ($statusppip=='') {
      $statusppip = '0';
    } 
    if ($statusppukp=='') {
      $statusppukp = '0';
    } 
    if ($statusjiwasraya=='') {
      $statusjiwasraya = '0';
    } 
    if ($statusjkdk=='') {
      $statusjkdk = '0';
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
    if (empty($tgllahir)) {
      $tgllahir = null;
    }          
    $nik=trim($nik);
    $data = array(
        'nik'           => $nik,
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
        'userentry'     => getSession('user'),
        'tglentry'      => $today,
        'grade'         => $grade,
        'tglmulaikontrak'   => $tglmulaikontrak,
        'tglselesaikontrak' => $tglselesaikontrak,
        'tglpengangkatan'   => $tglpengangkatan,
        'namabank'         => $namabank,        
        'jenisjabatan'  => $struktural,
        'updated_at'  => date('Y-m-d H:i:s'),
        'updated_by' => getSession('user_id')
    );
    if (!empty($password)) {
      $data['password'] = md5($password);
    }
    $this->db->update('pegawai', $data, array('id' => $pegawai_id));  
    $value = $this->db->affected_rows();

    $this->db->delete('keluarga', array('nik' => $nik2)); 
    $query = $this->db->query("SELECT * FROM TAMPUNGKELUARGA WHERE NIK=? AND USER=?",array($nik2,getSession('user')));
    foreach ($query->result() as $row) {
      $datakel = array(
        'pegawai_id'  => $pegawai_id,
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
    $this->db->delete('tampungkeluarga', array('nik' => $nik2, 'user' => getSession('user'))); 

    $this->db->delete('pendidikan', array('nik' => $nik2)); 
    $query = $this->db->query("SELECT * FROM tampungpendidikan WHERE NIK=? AND USER=?",array($nik2,getSession('user')));
    foreach ($query->result() as $row) {
      $datapen = array(
        'pegawai_id'    => $pegawai_id,
        'nik'           => $nik,
        'pendidikan'    => $row->pendidikan,
        'namauniv'      => $row->namauniv,
        'jurusan'       => $row->jurusan,
        'lulus'         => $row->lulus,
        'tempatbelajar' => $row->tempatbelajar,
        'ijazah'        => $row->ijazah,
        'user'          => getSession('user'),
        'noindex'       => $row->noindex,
        'tgl'           => $today
      );
      $this->db->insert('pendidikan', $datapen); 
    }
    $this->db->delete('tampungpendidikan', array('nik' => $nik2, 'user' => getSession('user')));

// print_r($value);exit();

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

  function caripegawai($pegawai, $limit = NULL, $offset = NULL){
    $data = null;
    $cari='';
    if ($pegawai!='') {
      $cari=" and (nik like '%".$pegawai."%' or nama like '%".$pegawai."%')";
    }

    $caribyuser = "";
    if (getSession('role')=='Admin Unit' or getSession('role')=='') {
      $caribyuser = " and unit=".getSession('unit');
    } else {
      $caribyuser = " and nik='".getSession('nik')."'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $qcek = $this->db->query("select nik from pegawai where
                                  nik='0' or nama is null or tgllahir is null or tglmasuk is null or pendidikan is null or
                                  status is null or unit is null or jabatan is null or username is null or password is null or role is null or
                                  noktp is null or nokk is null or tempatlahir is null or darah is null or statuskeluarga is null or
                                  agama is null or rekening is null or alamat is null or kota is null or telp is null or grade is null or jenisjabatan is null 
                                  or nama='' or tgllahir='' or tglmasuk ='' or pendidikan='' or
                                  status='' or unit='' or jabatan='' or username='' or password='' or role='' or
                                  noktp='' or nokk='' or tempatlahir='' or darah='' or statuskeluarga='' or
                                  agama='' or rekening='' or alamat='' or kota='' or telp='' or grade='' or jenisjabatan='' or namabank='' or (status='Kontrak' and (tglmulaikontrak is null or tglselesaikontrak is null))
                                  order by nama");
    $datacek = $qcek->result_array();

    $sql = "SELECT * FROM pegawai WHERE 1=1";
    $sqlResult = "SELECT COUNT(*) AS `count` FROM pegawai WHERE 1=1";
    if(getSession('role')=='HCMM' or (getSession('role')=='Admin' and getSession('unit')=='1')){
      $query = $this->db->query($sql.$cari." ORDER BY NAMA".$limitQuery);
      $totalResult = $this->db->query($sqlResult.$cari);
    }else{
      $query = $this->db->query($sql.$cari.$caribyuser." ORDER BY NAMA".$limitQuery);
      $totalResult = $this->db->query($sqlResult.$cari." and unit=".getSession('unit'));
    }
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $query = $this->db->query("SELECT * from unit where kunit=?",array($row->unit));
      $data[$key]->namaunit = '';
      foreach ($query->result() as $row1) {
        $data[$key]->namaunit = $row1->namaunit;
      }
      $query = $this->db->query("SELECT * from jabatan where kojab=?",array($row->jabatan));
      $data[$key]->namajabatan = '';
      foreach ($query->result() as $row2) {
        $data[$key]->namajabatan = $row2->namajabatan;
      }

      $id = searchForId($row->nik, $datacek);
      if (!isset($id)) {
        $data[$key]->complete = 1;
      } else {
        $data[$key]->complete = 0;
      }
    }

    $total = $totalResult->result();

    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total[0]->count);
    }
  }

  function cariunit($unit, $limit = NULL, $offset = NULL){
    $data = null;
    $cari='';
    if ($unit!='') {
      $cari=" and b.namaunit like '%".$unit."%'";
    }

    $caribyuser = "";
    if ((getSession('role')=='Admin Unit' or getSession('role')=='')) {
      $caribyuser = " and a.unit=".getSession('unit');
    } else {
      $caribyuser = " and a.nik='".getSession('nik')."'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $qcek = $this->db->query("select nik from pegawai where
                                  nik='0' or nama is null or tgllahir is null or tglmasuk is null or pendidikan is null or
                                  status is null or unit is null or jabatan is null or username is null or password is null or role is null or
                                  noktp is null or nokk is null or tempatlahir is null or darah is null or statuskeluarga is null or
                                  agama is null or rekening is null or alamat is null or kota is null or telp is null or grade is null or jenisjabatan is null 
                                  or nama='' or tgllahir='' or tglmasuk ='' or pendidikan='' or
                                  status='' or unit='' or jabatan='' or username='' or password='' or role='' or
                                  noktp='' or nokk='' or tempatlahir='' or darah='' or statuskeluarga='' or
                                  agama='' or rekening='' or alamat='' or kota='' or telp='' or grade='' or jenisjabatan='' or namabank='' or (status='Kontrak' and (tglmulaikontrak is null or tglselesaikontrak is null))
                                  order by nama");
    $datacek = $qcek->result_array();

    $sql = "SELECT a.* FROM pegawai a,unit b WHERE a.unit=b.kunit";
    $tes=($sql.$cari." ORDER BY NAMA".$limitQuery);
    // print_r($tes);exit();
    $sqlResult = "SELECT COUNT(*) AS `count` FROM pegawai a,unit b WHERE a.unit=b.kunit";
    if(getSession('role')=='HCMM' or (getSession('role')=='Admin' and getSession('unit')=='1')){
      $query = $this->db->query($sql.$cari." ORDER BY NAMA".$limitQuery);
      $totalResult = $this->db->query($sqlResult.$cari);
    }else{
      // $query = $this->db->query($sql.$cari." and unit=".getSession('unit')." ORDER BY NAMA".$limitQuery);      
      $query = $this->db->query($sql.$cari.$caribyuser." ORDER BY NAMA".$limitQuery);
      $totalResult = $this->db->query($sqlResult.$cari.$caribyuser);
    }
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $query = $this->db->query("SELECT * from unit where kunit=?",array($row->unit));
      $data[$key]->namaunit = '';
      foreach ($query->result() as $row1) {
        $data[$key]->namaunit = $row1->namaunit;
      }
      $query = $this->db->query("SELECT * from jabatan where kojab=?",array($row->jabatan));
      $data[$key]->namajabatan = '';
      foreach ($query->result() as $row2) {
        $data[$key]->namajabatan = $row2->namajabatan;
      }

      $id = searchForId($row->nik, $datacek);
      if (!isset($id)) {
        $data[$key]->complete = 1;
      } else {
        $data[$key]->complete = 0;
      }
    }

    $total = $totalResult->result();

    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total[0]->count);
    }
  }

  function carijabatan($jabatan, $limit = NULL, $offset = NULL){
    $data = null;
    $cari='';
    if ($jabatan!='') {
      $cari=" and b.namajabatan like '%".$jabatan."%'";
    }

    $caribyuser = "";
    if ((getSession('role')=='Admin Unit' or getSession('role')=='')) {
      $caribyuser = " and a.unit=".getSession('unit');
    } else {
      $caribyuser = " and a.nik='".getSession('nik')."'";
    }

    $limitQuery = "";
    if($limit) {
      $limitQuery .= " LIMIT " . $limit;
    }
    if($offset) {
      $limitQuery .= " OFFSET " . $offset;
    }

    $qcek = $this->db->query("select nik from pegawai where
                                  nik='0' or nama is null or tgllahir is null or tglmasuk is null or pendidikan is null or
                                  status is null or unit is null or jabatan is null or username is null or password is null or role is null or
                                  noktp is null or nokk is null or tempatlahir is null or darah is null or statuskeluarga is null or
                                  agama is null or rekening is null or alamat is null or kota is null or telp is null or grade is null or jenisjabatan is null 
                                  or nama='' or tgllahir='' or tglmasuk ='' or pendidikan='' or
                                  status='' or unit='' or jabatan='' or username='' or password='' or role='' or
                                  noktp='' or nokk='' or tempatlahir='' or darah='' or statuskeluarga='' or
                                  agama='' or rekening='' or alamat='' or kota='' or telp='' or grade='' or jenisjabatan='' or namabank='' or (status='Kontrak' and (tglmulaikontrak is null or tglselesaikontrak is null))
                                  order by nama");
    $datacek = $qcek->result_array();

    $sql = "SELECT a.* FROM pegawai a,jabatan b WHERE a.jabatan=b.kojab";
    $tes=($sql.$cari." ORDER BY NAMA".$limitQuery);
    // print_r($tes);exit();
    $sqlResult = "SELECT COUNT(*) AS `count` FROM pegawai a,jabatan b WHERE a.jabatan=b.kojab";
    if(getSession('role')=='HCMM' or (getSession('role')=='Admin' and getSession('unit')=='1')){
      $query = $this->db->query($sql.$cari." ORDER BY NAMA".$limitQuery);
      $totalResult = $this->db->query($sqlResult.$cari);
    }else{
      // $query = $this->db->query($sql.$cari." and unit=".getSession('unit')." ORDER BY NAMA".$limitQuery);      
      $query = $this->db->query($sql.$cari.$caribyuser." ORDER BY NAMA".$limitQuery);
      $totalResult = $this->db->query($sqlResult.$cari.$caribyuser);
    }
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $query = $this->db->query("SELECT * from unit where kunit=?",array($row->unit));
      $data[$key]->namaunit = '';
      foreach ($query->result() as $row1) {
        $data[$key]->namaunit = $row1->namaunit;
      }
      $query = $this->db->query("SELECT * from jabatan where kojab=?",array($row->jabatan));
      $data[$key]->namajabatan = '';
      foreach ($query->result() as $row2) {
        $data[$key]->namajabatan = $row2->namajabatan;
      }

      $id = searchForId($row->nik, $datacek);
      if (!isset($id)) {
        $data[$key]->complete = 1;
      } else {
        $data[$key]->complete = 0;
      }
    }

    $total = $totalResult->result();

    if (empty($limitQuery)) {
      return $data;
    } else  {
      return array('result' => $data, 'total' => $total[0]->count);
    }
  }  

  function cetakpegawai($nama,$unit,$jabatan){
    $data = null;
    $carinama = '';
    if ($nama!='') {
      $carinama = " and (a.nama like '%".$nama."%' or a.nik like '%".$nama."%')";
    }

    $cariunit = '';
    if ($unit!='') {
      if (getSession('role')=='Admin Unit') {
        $cariunit = " and (a.unit='".$unit."')";
      } else {
        $cariunit = " and (b.namaunit like '%".$unit."%')";
      }
      
    }

    $carijabatan = '';
    if ($jabatan!='') {
      $carijabatan = " and (c.namajabatan like '%".$jabatan."%')";
    }

    $carirole = '';
    if ((getSession('role')=='Admin Unit' or getSession('role')=='') and getSession('unit')!='1') {
      $carirole = " and a.unit=".getSession('unit');
    }
    // echo "SELECT * FROM pegawai a, unit b, jabatan c where a.unit=b.kunit and a.jabatan=c.kojab and a.nik is not null ".$carinama.$cariunit.$carijabatan.$carirole." order by a.nama";
    $query = $this->db->query("SELECT * FROM pegawai a, unit b, jabatan c where a.unit=b.kunit and a.jabatan=c.kojab and a.nik is not null ".$carinama.$cariunit.$carijabatan.$carirole." order by a.nama");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    // $data = $this->db->select('pegawai.*,unit.namaunit,jabatan.namajabatan')
    //         ->join('unit','unit.kunit = pegawai.unit')
    //         ->join('jabatan','jabatan.kojab = pegawai.jabatan')
    //         ->order_by('pegawai.nama','asc')
    //         ->get('pegawai')
    //         ->result();
    return $data;
  }

  function cekpegawai($nik){
    $nik = trim($nik);
    $data = null;
    $query = $this->db->query("SELECT count(*) as jum FROM pegawai WHERE NIK=?",array($nik));
    foreach ($query->result() as $row) {
      $data = $row->jum;
    }
    return $data;
  }

  function tambahpendidikan($nik,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah){
    $nik=trim($nik);
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
    $this->db->delete('tampungpendidikan', array('nik' => $nik));
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

  function getJabatan($unit){
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

}
?>