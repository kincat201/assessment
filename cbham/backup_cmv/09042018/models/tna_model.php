<?php
class Tna_model extends MY_Model{

  function caripegawai($unit){
    $data = null;
    $query = $this->db->query("SELECT * FROM pegawai WHERE unit=?",array($unit));
    // print_r($query->result());exit();
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function getpegawaiList($unit){
      $data=null;
      // $str = '%'.$strData.'%';
      $query  = $this->db->query("select * from pegawai where unit=?",$unit);
      foreach ($query->result() as $row)
      { 
        $data[] = $row;
      }
      return $data;    
  } 

  function caripms($nama){
    $data = null;
    $query = $this->db->query("select kekuatan,kelemahan from knowhow where nik=?",$nama);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      // $data[$key]->kekuatankom = $row1->kekuatan;
      // $data[$key]->kelemahankom = $row1->kelemahan;
      // $data[$key]->kom = $row1->kelemahan;
      $query = $this->db->query("select kekuatan,kelemahan from krakba where kopeg=?",array($nama));
      foreach ($query->result() as $row1) {
        $data[$key]->kekuatanpms = $row1->kekuatan;
        $data[$key]->kelemahanpms = $row1->kelemahan;
      }
    }
    return $data;
  }

  function simpantna($unit,$nama,$kom,$kin,$aud,$bip,$dir,$tahun,$periode){
    $today=date('Y-m-d h:i:sa');

    $query = $this->db->query("select * from unit where kunit=?",array($unit));  
    foreach ($query->result() as $row)
    {        
      $namaunit=$row->namaunit;
    } 
    $query = $this->db->query("select * from pegawai where nik=?",array($nama));  
    foreach ($query->result() as $row)
    {        
      $namapeg=$row->nama;
      $jabatan=$row->jabatan;
    } 
    $query = $this->db->query("select * from jabatan where kojab=?",array($jabatan));  
    foreach ($query->result() as $row)
    {        
      $namajab=$row->namajabatan;
    }     
    $data = array(
        'unit' => $unit,
        'namaunit' => $namaunit,
        'nama' => $namapeg,
        'nik' => $nama,
        'jabatan' => $jabatan,
        'namajab' => $namajab,
        'kom' => $kom,
        'kin' => $kin,                        
        'aud' => $aud,
        'bip' => $bip,                                
        'dir' => $dir,
        'tahun' => $tahun,
        'periode' => $periode,
        'user'        => getSession('user'),
        'tglentry'         => $today
    );
    $this->db->insert('tna', $data);  
    $value = $this->db->affected_rows();
    if ($value>0) {
      $data = array(
        'proses'  => 'INPUT TNA',
        'note'    => $namapeg.$nama,
        'user'    => getSession('user'),
        'tgl'     => $today
      );
      $this->db->insert('log', $data);  
    }
    return $value;
  }  

  function caritna($tahun,$periode,$unit){
    $data = null;
    // $unitx=str_replace('_', ' ', $unit);
    if($unit==''){
      $query = $this->db->query("select * from tna where tahun=? and periode=?",array($tahun,$periode));
    }else{
      $query = $this->db->query("select * from tna where tahun=? and periode=? and unit=?",array($tahun,$periode,$unit));
    }
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      // $data[$key]->kekuatanpms = $row1->kekuatan;
      // $query = $this->db->query("select kekuatan,kelemahan from krakba where kopeg=?",array($nama));
      // foreach ($query->result() as $row1) {
      //   $data[$key]->kekuatanpms = $row1->kekuatan;
      //   $data[$key]->kelemahanpms = $row1->kelemahan;
      // }
    }
    return $data;
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

  function carijabatan($jabatan){
    $data = null;
    $carijabatan='';
    if ($jabatan!='') {
      $carijabatan=" and namajabatan like '%".$jabatan."%'";
    }
    $sql = "SELECT * FROM jabatan WHERE 1=1";
    $query = $this->db->query($sql.$carijabatan);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function updatejabatan($kojab,$nama){
    $today=date('Y-m-d h:i:sa');

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

  function getstruktur($kojab){
    $data = null;
    $query = $this->db->query("SELECT * FROM strukturjab a, jabatan b WHERE a.kojab1=? and a.kojab2=b.kojab",array($kojab));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function tambahstruktur($kojab1,$kojab2){
    $today=date('Y-m-d h:i:sa');

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

  function carinamapegawai($nama){
    $data = null;
    // $query = $this->db->query("SELECT * FROM pegawai WHERE nik=?",array($nama));
    $query = $this->db->query("SELECT a.nik,b.namaunit,c.namajabatan FROM pegawai a,unit b,jabatan c WHERE a.unit=b.kunit and a.jabatan=c.kojab and a.nik=?",array($nama));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function caridettraining($nama){
    $data = null;
    $query = $this->db->query("select * from training a,det_training b where a.notraining=b.notraining and b.nik=?",array($nama));
    // $query = $this->db->query("SELECT a.nik,b.namaunit,c.namajabatan FROM pegawai a,unit b,jabatan c WHERE a.unit=b.kunit and a.jabatan=c.kojab and a.nik=?",array($nama));
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }  

  function getpeserta($kode){
    $data = null;
    $cari = '';
    switch ($kode) {
      case 'KOM':
        $cari = "WHERE kom is not null";
        break;
      case 'KIN':
        $cari = "WHERE kin is not null";
        break;
      case 'AUD':
        $cari = "WHERE aud is not null";
        break;
      case 'BIP':
        $cari = "WHERE bip is not null";
        break;
      case 'DIR':
        $cari = "WHERE dir is not null";
        break;
    }
    $query = $this->db->query("SELECT * FROM tna ".$cari);
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;

  }

  function getnotraining($kode){
    $notraining = null;
    $nomor = "TNA-".$kode."-".date('Y-m')."-%";
    $query = $this->db->query("SELECT notraining FROM training WHERE notraining like ?",$nomor);
    if (count($query->result())>0) {
      foreach ($query->result() as $key => $row) {
        $no = explode("-", $row->notraining);
        $no = $no[4]+1;
        if ($no<10) {
          $no = '0'.$no;
        }
      }
      $notraining = "TNA-".$kode."-".date('Y-m')."-".$no;
    } else {
      $notraining = "TNA-".$kode."-".date('Y-m')."-01";
    }
    return $notraining;
  }

  function tambahpeserta($notraining,$nik){
    $query = $this->db->query("SELECT count(*) as jum FROM tampungtraining WHERE nik=? and USER=? and notraining=?",array($nik,getSession('user'),$notraining));
    foreach ($query->result() as $row) {
      $jum = $row->jum;
    }
    if ($jum==0) {  
      $query = $this->db->query("SELECT nik, nama, unit, jabatan FROM pegawai WHERE nik=?",array($nik));
      foreach ($query->result() as $row) {
        $data = array(
            'notraining'  => $notraining,
            'nik'         => $row->nik,
            'nama'        => $row->nama,
            'unit'        => $row->unit,
            'jabatan'     => $row->jabatan,
            'user'        => getSession('user')
        );
        $this->db->insert('tampungtraining', $data);  
      }

      $value = null;
      $query = $this->db->query("SELECT a.nik, a.nama, b.namaunit, c.namajabatan, a.notraining FROM tampungtraining a, unit b, jabatan c WHERE a.unit=b.kunit and a.jabatan=c.kojab and a.USER=? and a.notraining=?",array(getSession('user'),$notraining));
      foreach ($query->result() as $row) {
        $value[] = $row;
      }
    } else {
      $value = 'Sudah Ada';
    }
    return $value;
  }

  function hapuspeserta($notraining,$nik){
    $this->db->delete('tampungtraining', array('nik' => $nik, 'notraining' => $notraining, 'user' => getSession('user')));  
    $value = null;
    $query = $this->db->query("SELECT a.nik, a.nama, b.namaunit, c.namajabatan, a.notraining FROM tampungtraining a, unit b, jabatan c WHERE a.unit=b.kunit and a.jabatan=c.kojab and a.USER=? and a.notraining=?",array(getSession('user'),$notraining));
    foreach ($query->result() as $row) {
      $value[] = $row;
    }
    return $value;
  }

  function cektampungtraining($notraining){
    $query = $this->db->query("SELECT count(*) as jumlah from tampungtraining where user=? and notraining=?",array(getSession('user'),$notraining));
    $data = $query->result_array();
    return $data[0]['jumlah'];
  }

  function simpantraining($notraining,$namatraining,$kodetna,$tutor,$mulai,$akhir,$biaya){
    $value = null;
    $today=date('Y-m-d h:i:sa');
    $data = array(
        'notraining' => $notraining,
        'training'   => $namatraining,
        'kodetna'    => $kodetna,
        'tutor'      => $tutor,
        'mulai'      => $mulai,
        'akhir'      => $akhir,
        'biaya'      => $biaya,
        'user'       => getSession('user'),
        'tglentry'   => $today
    );
    $this->db->insert('training', $data);
    $value = $this->db->affected_rows();
    $gagal = null;
    if ($value==1) {
      $query = $this->db->query("SELECT * FROM tampungtraining WHERE USER=? AND notraining=?",array(getSession('user'),$notraining));
      $no = 0;
      foreach ($query->result() as $row) {
        $no = $no+1;
        $datadet = array(
          'notraining'  => $row->notraining,
          'nik'         => $row->nik,
          // 'nama'        => $row->nama,
          'unit'        => $row->unit,
          'jabatan'     => $row->jabatan
        );
        $this->db->insert('det_training', $datadet);
        if ($this->db->affected_rows()<1) {
          $gagal = $gagal.$row->nama.',';
        } 
        $this->db->delete('tampungtraining', array('nik' => $row->nik, 'notraining' => $notraining, 'user' => getSession('user')));
      }
    } else {
      $gagal = 'Data Training';
    }
    return $gagal;
  }

   function updatetraining($notraining,$namatraining,$kodetna,$tutor,$mulai,$akhir,$biaya){
    $value = null;
    $today=date('Y-m-d h:i:sa');
    $data = array(
        'training'   => $namatraining,
        'kodetna'    => $kodetna,
        'tutor'      => $tutor,
        'mulai'      => $mulai,
        'akhir'      => $akhir,
        'biaya'      => $biaya,
        'user'       => getSession('user'),
        'tglentry'   => $today
    );
    $this->db->update('training', $data, array('notraining' => $notraining));  
    $value = $this->db->affected_rows();
    $gagal = null;
    if ($value==1) {
      $this->db->delete('det_training', array('notraining' => $notraining));
      $query = $this->db->query("SELECT * FROM tampungtraining WHERE USER=? AND notraining=?",array(getSession('user'),$notraining));
      $no = 0;
      foreach ($query->result() as $row) {
        $no = $no+1;
        $datadet = array(
          'notraining'  => $row->notraining,
          'nik'         => $row->nik,
          // 'nama'        => $row->nama,
          'unit'        => $row->unit,
          'jabatan'     => $row->jabatan
        );
        $this->db->insert('det_training', $datadet);
        if ($this->db->affected_rows()<1) {
          $gagal = $gagal.$row->nama.',';
        } 
        $this->db->delete('tampungtraining', array('nik' => $row->nik, 'notraining' => $notraining, 'user' => getSession('user')));
      }
    } else {
      $gagal = 'Data Training';
    }
    return $gagal;
  }

  function caritraining($kode,$tgl1,$tgl2){
    $data = null;
    $carikode = '';
    if ($kode!='') {
      $carikode = " AND kodetna='".$kode."'";
    }
    $query = $this->db->query("SELECT * FROM training WHERE mulai between ? and ?".$carikode." order by mulai",array($tgl1,$tgl2));
    foreach ($query->result() as $row) {
      $data[] = $row;
    }
    return $data;
  }

  function caritrainingbynomor($notraining){
    $data = null;
    $datadet = null;
    $query = $this->db->query("SELECT * FROM training WHERE notraining=?",array($notraining));
    foreach ($query->result() as $row) {
      $data[] = $row;
    }

    $query = $this->db->query("SELECT a.*, b.nama, c.namajabatan, d.namaunit FROM det_training a, pegawai b, jabatan c, unit d WHERE a.notraining=? and a.nik=b.nik and a.jabatan=c.kojab and a.unit=d.kunit order by a.unit, a.jabatan",array($notraining));
    foreach ($query->result() as $rowdet) {
      $datadet[] = $rowdet;
    }
    return array($data,$datadet);
  }

  function hapustraining($notraining){
    $data = null;
    $this->db->delete('det_training', array('notraining' => $notraining));
    $this->db->delete('training', array('notraining' => $notraining));
    $data = $this->db->affected_rows();
    return $data;
  }

function simpankeefektifan(
                          $nama,
                          $nik,
                          $jabatan,
                          $unit,
                          $namapelatihan,
                          $tglpelatihan,
                          $instruktur,
                          $penyelenggara,
                          $sikap,
                          $perilaku,
                          $totalperilaku,
                          $menghargai,
                          $totalmenghargai,
                          $semangat,
                          $totalsemangat,
                          $menerima,
                          $totalmenerima,
                          $tanggung,
                          $totaltanggung,
                          $pengetahuan,
                          $penambahan,
                          $totalpenambahan,
                          $polapikir,
                          $totalpolapikir,
                          $pengambilan,
                          $totalpengambilan,
                          $keaktifan,
                          $totalkeaktifan,
                          $percaya,
                          $totalpercaya,
                          $keterampilan,
                          $penguasaan,
                          $totalpenguasaan,
                          $peningkatan,
                          $totalpeningkatan,
                          $kualitas,
                          $totalkualitas,
                          $kecepatan,
                          $totalkecepatan,
                          $kreatifitas,
                          $totalkreatifitas,
                          $saransikap,
                          $saranpengetahuan,
                          $saranketerampilan
                        ){           
        
    $value="NOK";
    $dbb = $this->load->database('fb1',true);        

    $query = $dbb->query("select count(nik) as jum from efektiftna where nik=? and tglpelatihan=?",array($nama,$tglpelatihan));
    foreach ($query->result() as $row)
    { 
       $jum=$row->jum;
    }

    if ($jum==0){       

       // $query  = $dbb->query("select a.nama,a.jabatan,b.namajabatan from pegawai a,jabatan b where a.jabatan=b.kojab and a.nik=?",$nama);
       // foreach ($query->result() as $row)
       // { 
       //      $namapeg = $row->nama;
       //      $jabatan = $row->jabatan;
       //      $namajabatan = $row->namajabatan;
       // }       
       // $query  = $dbb->query("select kojab1 from strukturjab where kojab2=?",$jabatan);
       // foreach ($query->result() as $row1)
       // {             
       //      $kojabpenilai = $row1->kojab1;
       // }       
       // $penilai='';
       $query  = $dbb->query("select nama from pegawai where nik=?",$nik);
       foreach ($query->result() as $row1)
       {             
            $namax = $row1->nama;
       }              

        $data = array(
            'nama'                          =>$namax,
            'nik'                           =>$nik,
            'jabatan'                       =>$jabatan,
            'unit'                          =>$unit,
            'namapelatihan'                 =>$namapelatihan,
            'tglpelatihan'                  =>$tglpelatihan,
            'instruktur'                    =>$instruktur,
            'penyelenggara'                 =>$penyelenggara,
            'sikap'                         =>$sikap,
            'perilaku'                      =>$perilaku,
            'totalperilaku'                 =>$totalperilaku,
            'menghargai'                    =>$menghargai,
            'totalmenghargai'               =>$totalmenghargai,
            'semangat'                      =>$semangat,
            'totalsemangat'                 =>$totalsemangat,
            'menerima'                      =>$menerima,
            'totalmenerima'                 =>$totalmenerima,
            'tanggung'                      =>$tanggung,
            'totaltanggung'                 =>$totaltanggung,
            'pengetahuan'                   =>$pengetahuan,
            'penambahan'                    =>$penambahan,
            'totalpenambahan'               =>$totalpenambahan,
            'polapikir'                     =>$polapikir,
            'totalpolapikir'                =>$totalpolapikir,
            'pengambilan'                   =>$pengambilan,
            'totalpengambilan'              =>$totalpengambilan,
            'keaktifan'                     =>$keaktifan,
            'totalkeaktifan'                =>$totalkeaktifan,
            'percaya'                       =>$percaya,
            'totalpercaya'                  =>$totalpercaya,
            'keterampilan'                  =>$keterampilan,
            'penguasaan'                    =>$penguasaan,
            'totalpenguasaan'               =>$totalpenguasaan,
            'peningkatan'                   =>$peningkatan,
            'totalpeningkatan'              =>$totalpeningkatan,
            'kualitas'                      =>$kualitas,
            'totalkualitas'                 =>$totalkualitas,
            'kecepatan'                     =>$kecepatan,
            'totalkecepatan'                =>$totalkecepatan,
            'kreatifitas'                   =>$kreatifitas,
            'totalkreatifitas'              =>$totalkreatifitas,
            'saransikap'                    =>$saransikap,
            'saranpengetahuan'              =>$saranpengetahuan,
            'saranketerampilan'             =>$saranketerampilan,
            'user'                          =>getSession('user'),
            'tglentry'                      =>date('Y-m-d')
        );
        $dbb->insert('efektiftna', $data);  
        $value="OK"; 
    }else{
        $value="NOK";
    }
    return $value;
}

  function carireportevaluasitraining($tgl1,$tgl2){

    // $data = array(
    //     'urut'        => getSession('urut')
    // );
    // $this->db->delete('tampung', $data);             

    // // $query = $this->db->query("select * from hasilskk where tahun=? and bulan=? and jabatan=? and unit=?",array($tahun,$bulan,$jabatan,$unit));   
    // $query = $this->db->query("select b.namaunit,c.namajabatan,a.tahun,a.bulan,a.kodekpi,a.kpi,a.polarisasi,a.satuan,a.target,a.realisasi,a.indekcapaiankpi,a.indekkpi,a.nkp from hasilskk a,unit b,jabatan c where a.unit=b.kunit and a.jabatan=c.kojab and a.tahun=? and a.bulan=? and a.jabatan=? and a.unit=?",array($tahun,$bulan,$jabatan,$unit));       
    // foreach ($query->result() as $row){
    //   if($row->bulan=='1') $bulan = 'Januari';
    //   if($row->bulan=='2') $bulan = 'Februari';
    //   if($row->bulan=='3') $bulan = 'Maret';
    //   if($row->bulan=='4') $bulan = 'April';
    //   if($row->bulan=='5') $bulan = 'Mei';
    //   if($row->bulan=='6') $bulan = 'Juni';
    //   if($row->bulan=='7') $bulan = 'Juli';
    //   if($row->bulan=='8') $bulan = 'Agustus';
    //   if($row->bulan=='9') $bulan = 'September';
    //   if($row->bulan=='10') $bulan = 'Oktober';
    //   if($row->bulan=='11') $bulan = 'November';
    //   if($row->bulan=='12') $bulan = 'Desember';
    //   $data = array(
    //       'ket1'          => $row->namaunit,
    //       'ket2'          => $row->namajabatan,
    //       'ket3'          => $row->tahun,
    //       'ket4'          => $bulan,
    //       'ket5'          => $row->kodekpi,
    //       'ket6'          => $row->kpi,
    //       'ket7'          => $row->polarisasi,
    //       'ket8'          => $row->satuan,
    //       'ket9'          => $row->target,
    //       'ket10'         => $row->realisasi,
    //       'ket11'         => $row->indekcapaiankpi,
    //       'ket12'         => $row->indekkpi,            
    //       'ket13'         => $row->nkp,
    //       'urut'          => getSession('urut')
    //   );
    //   $this->db->insert('tampung', $data);         
    // }    

    $data1 = null;
    $query = $this->db->query("SELECT * FROM efektiftna where tglpelatihan between ? and ? order by nama",array($tgl1,$tgl2));    
    foreach ($query->result() as $key => $row) {
      $data1[] = $row;
    }
    return $data1;
  }  

  // function cetakhasilskk($tahun,$bulan,$unit,$jabatan){
  function cetakreportevaluasitraining($noindex){
    $data = null;
    // $query = $this->db->query("SELECT * FROM hasilskk where tahun=? and bulan=? and unit=? and jabatan=? order by kodekpi",array($tahun,$bulan,$unit,$jabatan));
    $query = $this->db->query("SELECT * FROM efektiftna where noindex=? order by nama",array($noindex));    
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

  function carirealtraining($tgl1,$tgl2){
    $data = null;
    $query = $this->db->query("SELECT * FROM training WHERE mulai between ? and ? order by mulai",array($tgl1,$tgl2));
    foreach ($query->result() as $row) {
      $data[] = $row;
    }
    return $data;
  }

  function cariototraining($noindex){
    $data = null;
    $query = $this->db->query("SELECT * FROM training WHERE noindex=? order by mulai",array($noindex));
    foreach ($query->result() as $row) {
      $data[] = $row;
    }
    return $data;
  }  

  function caridetototraining($notraining){
    $data = null;
    $query = $this->db->query("SELECT * FROM det_training WHERE notraining=?",array($notraining));
    // foreach ($query->result() as $row) {
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
      $query = $this->db->query("select nama from pegawai where nik =?",array($row->nik));   
      foreach ($query->result() as $row1)
      {         
        $data[$key]->namapegawai = $row1->nama;
      }
      $query = $this->db->query("select namajabatan from jabatan where kojab =?",array($row->jabatan));   
      foreach ($query->result() as $row2)
      {         
        $data[$key]->namajabatan = $row2->namajabatan;
      }      
      $query = $this->db->query("select namaunit from unit where kunit =?",array($row->unit));   
      foreach ($query->result() as $row3)
      {         
        $data[$key]->namaunit = $row3->namaunit;
      }            

    }
    return $data;
  }    

  function hapusototraining($noindex){
    $data = array(
        'noindex' => $noindex
    );
    $this->db->delete('det_training', $data);      
  } 

  function updaterealtraining($kodetraining,$namatraining,$kodetna,$tutor,$jadwal1,$jadwal2,$biaya){        
    $data = array(
        'notraining'     => $kodetraining,
        'training'       => $namatraining,
        'kodetna'        => $kodetna,
        'tutor'          => $tutor,
        'mulai'          => $jadwal1,
        'akhir'          => $jadwal2,
        'biaya'          => $biaya,
        'otorisasi'      => '1',
        'tgloto'         => date('Y-m-d'),
        'useroto'        => getSession('user')
    );
    $this->db->update('training', $data, array('notraining' => $kodetraining));  
  } 

}
?>