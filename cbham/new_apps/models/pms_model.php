<?php
class Pms_model extends MY_Model{

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

  // function getbawahan(){
  //   $data = null;
  //   $query = $this->db->query("select c.nik,c.nama,c.jabatan from pegawai a,strukturjab b,pegawai c where a.jabatan=b.kojab1 and a.jabatan=? and b.kojab2=c.jabatan",getSession('kojab'));
  //   foreach ($query->result() as $key => $row) {
  //     $data[] = $row;
  //   }
  //   return $data;
  // }

  /*function caripegawai($nama){
    $data=null;
// print_r($nama);exit();
    $query  = $this->db->query("select count(c.kra) as jum from pegawai a,jabatan b,kelompok c where a.jabatan=b.kojab and b.kelompok=c.kodekelom and a.nik=?",$nama);
    foreach ($query->result() as $row)
    {    
        $jum=$row->jum;
    }
    if($jum>0){
        $query  = $this->db->query("select c.kra kra,c.kba kba from pegawai a,jabatan b,kelompok c where a.jabatan=b.kojab and b.kelompok=c.kodekelom and a.nik=?",$nama);
        foreach ($query->result() as $row)
        {
          $data[] = $row;
        }    
    }else{
        $data=0;
    }

    return $data;    
  } */

  function caripegawai($id_pegawai){
    return $this->db->select('kra,kba')
            ->where('id',$id_pegawai)
            ->join('jabatan','jabatan.kojab = pegawai.jabatan')
            ->join('kelompok','jabatan.kelompok = kelompok.kodekelom')
            ->get('pegawai');    
  } 

/*function simpanpms(
                      $nama,    
                      $periode,   
                      $tahun,   
                      $maintening,  
                      $bobsubmain,  
                      $nilsubmain,  
                      $totalnilkra, 
                      $improvment,  
                      $bobsubimprov,
                      $nilsubimprov,
                      $nilbobotkra,
                      $bobotinti,
                      $nilbobotinti,
                      $totnilkba,
                      $integritas,  
                      $subint,
                      $transparansi,  
                      $subtrans,
                      $kerjasama, 
                      $subkerja,
                      $kreativitas, 
                      $subkreativ,
                      $semangat,  
                      $subsemangat,
                      $sempurna,  
                      $subsempurna,
                      $disiplin,  
                      $bobotdisiplin,
                      $nilbobotdisiplin,
                      $pdca,    
                      $bobotpdca,
                      $nilbobotpdca,
                      $manage,    
                      $bobotmanagement,
                      $nilbobotmanagement,
                      $nilbobotkba,
                      $hasil,
                      $totkrakba,
                      $kra,
                      $kba,
                      $kekuatan,
                      $kelemahan,
                      $tindaklanjut,
                      $jadwal){           
        
    $value="NOK";
    $dbb = $this->load->database('fb1',true);        

    $query = $dbb->query("select count(kopeg) as jum from krakba where periode=? and tahun=? and kopeg=?",array($periode,$tahun,$nama));
    foreach ($query->result() as $row)
    { 
       $jum=$row->jum;
    }

    if ($jum==0){       
       // $query  = $dbb->query("select * from pegawai where nik=?",$nama);
        $query  = $dbb->query("select a.nama,a.jabatan,b.namajabatan from pegawai a,jabatan b where a.jabatan=b.kojab and a.nik=?",$nama);
       foreach ($query->result() as $row)
       { 
            $namapeg = $row->nama;
            $jabatan = $row->jabatan;
            $namajabatan = $row->namajabatan;
       }       
       $query  = $dbb->query("select kojab1 from strukturjab where kojab2=?",$jabatan);
       foreach ($query->result() as $row1)
       {             
            $kojabpenilai = $row1->kojab1;
       }       
       $penilai='';
       $query  = $dbb->query("select nama from pegawai where jabatan=?",$kojabpenilai);
       foreach ($query->result() as $row2)
       {             
            $penilai = $row2->nama;
       }              

        $data = array(
                'kopeg'             =>$nama,    
                'nama'              =>$namapeg,    
                'jabatan'           =>$namajabatan,    
                'penilai'           =>$penilai,    
                'periode'           =>$periode,   
                'tahun'             =>$tahun,   
                'maintening'        =>$maintening,  
                'bobsubmain'        =>$bobsubmain,  
                'nilsubmain'        =>$nilsubmain,  
                'totalnilkra'       =>$totalnilkra, 
                'improvment'        =>$improvment,  
                'bobsubimprov'      =>$bobsubimprov,
                'nilsubimprov'      =>$nilsubimprov,
                'nilbobotkra'       =>$nilbobotkra,
                'bobotinti'         =>$bobotinti,
                'nilbobotinti'      =>$nilbobotinti,
                'totnilkba'         =>$totnilkba,
                'integritas'        =>$integritas,  
                'subint'            =>$subint,
                'transparansi'      =>$transparansi,  
                'subtrans'          =>$subtrans,
                'kerjasama'         =>$kerjasama, 
                'subkerja'          =>$subkerja,
                'kreativitas'       =>$kreativitas, 
                'subkreativ'        =>$subkreativ,
                'semangat'          =>$semangat,  
                'subsemangat'       =>$subsemangat,
                'sempurna'          =>$sempurna,  
                'subsempurna'       =>$subsempurna,
                'disiplin'          =>$disiplin,  
                'bobotdisiplin'     =>$bobotdisiplin,
                'nilbobotdisiplin'  =>$nilbobotdisiplin,
                'pdca'              =>$pdca,    
                'bobotpdca'         =>$bobotpdca,
                'nilbobotpdca'      =>$nilbobotpdca,
                'manage'            =>$manage,    
                'bobotmanagement'   =>$bobotmanagement,
                'nilbobotmanagement'=>$nilbobotmanagement,
                'nilbobotkba'       =>$nilbobotkba,
                'hasil'             =>$hasil,
                'totkrakba'         =>$totkrakba,
                'kra'               =>$kra,
                'kba'               =>$kba,
                'kekuatan'          =>$kekuatan,
                'kelemahan'         =>$kelemahan,
                'tindaklanjut'      =>$tindaklanjut,
                'jadwal'            =>$jadwal,
                'tglentry'          => date("Y-m-d"),
                'user'              => getSession('user')
        );
        $dbb->insert('krakba', $data);  
        $value="OK"; 
    }else{
        $value="NOK";
    }
    return $value;
}*/

    function simpanpms(
                          $id_pegawai,    
                          $periode,   
                          $tahun,   
                          $maintening,  
                          $bobsubmain,  
                          $nilsubmain,  
                          $totalnilkra, 
                          $improvment,  
                          $bobsubimprov,
                          $nilsubimprov,
                          $nilbobotkra,
                          $bobotinti,
                          $nilbobotinti,
                          $totnilkba,
                          $integritas,  
                          $subint,
                          $transparansi,  
                          $subtrans,
                          $kerjasama, 
                          $subkerja,
                          $kreativitas, 
                          $subkreativ,
                          $semangat,  
                          $subsemangat,
                          $sempurna,  
                          $subsempurna,
                          $disiplin,  
                          $bobotdisiplin,
                          $nilbobotdisiplin,
                          $pdca,    
                          $bobotpdca,
                          $nilbobotpdca,
                          $manage,    
                          $bobotmanagement,
                          $nilbobotmanagement,
                          $nilbobotkba,
                          $hasil,
                          $totkrakba,
                          $kra,
                          $kba,
                          $kekuatan,
                          $kelemahan,
                          $tindaklanjut,
                          $jadwal){           
            
        $status = false;

        $check = $this->db->where('periode',$periode)
                    ->where('tahun',$tahun)
                    ->where('id_pegawai',$id_pegawai)
                    ->get('krakba')
                    ->num_rows();

        $data_pegawai = $this->db->select('nik,namajabatan,nama')
                            ->where('id',$id_pegawai)
                            ->join('jabatan','pegawai.jabatan = jabatan.kojab')
                            ->get('pegawai')
                            ->row();

        $penilai = $this->db->select('nama')->where('id',getSession('user_id'))->get('pegawai')->row()->nama;

        $data = array(
                'id_pegawai'        =>$id_pegawai,
                'kopeg'             =>$data_pegawai->nik,    
                'nama'              =>$data_pegawai->nama,    
                'jabatan'           =>$data_pegawai->namajabatan,    
                'penilai'           =>$penilai,    
                'periode'           =>$periode,   
                'tahun'             =>$tahun,   
                'maintening'        =>$maintening,  
                'bobsubmain'        =>$bobsubmain,  
                'nilsubmain'        =>$nilsubmain,  
                'totalnilkra'       =>$totalnilkra, 
                'improvment'        =>$improvment,  
                'bobsubimprov'      =>$bobsubimprov,
                'nilsubimprov'      =>$nilsubimprov,
                'nilbobotkra'       =>$nilbobotkra,
                'bobotinti'         =>$bobotinti,
                'nilbobotinti'      =>$nilbobotinti,
                'totnilkba'         =>$totnilkba,
                'integritas'        =>$integritas,  
                'subint'            =>$subint,
                'transparansi'      =>$transparansi,  
                'subtrans'          =>$subtrans,
                'kerjasama'         =>$kerjasama, 
                'subkerja'          =>$subkerja,
                'kreativitas'       =>$kreativitas, 
                'subkreativ'        =>$subkreativ,
                'semangat'          =>$semangat,  
                'subsemangat'       =>$subsemangat,
                'sempurna'          =>$sempurna,  
                'subsempurna'       =>$subsempurna,
                'disiplin'          =>$disiplin,  
                'bobotdisiplin'     =>$bobotdisiplin,
                'nilbobotdisiplin'  =>$nilbobotdisiplin,
                'pdca'              =>$pdca,    
                'bobotpdca'         =>$bobotpdca,
                'nilbobotpdca'      =>$nilbobotpdca,
                'manage'            =>$manage,    
                'bobotmanagement'   =>$bobotmanagement,
                'nilbobotmanagement'=>$nilbobotmanagement,
                'nilbobotkba'       =>$nilbobotkba,
                'hasil'             =>$hasil,
                'totkrakba'         =>$totkrakba,
                'kra'               =>$kra,
                'kba'               =>$kba,
                'kekuatan'          =>$kekuatan,
                'kelemahan'         =>$kelemahan,
                'tindaklanjut'      =>$tindaklanjut,
                'jadwal'            =>$jadwal,
                'tglentry'          => date("Y-m-d"),
                'user'              => getSession('user')
        );

        if ($check>0){       
            $update = $this->db->where('id_pegawai',$id_pegawai)
                     ->where('periode',$periode)
                     ->where('tahun',$tahun)
                     ->update('krakba',$data);
            if($update){
                $status = true;
            }
        }else{
            if($this->db->insert('krakba', $data)){
                $status = true;
            }
        }
        return $status;
    }

/*function carikra($nama,$periode,$tahun){

    $data1 = array(
        'urut'  => getSession('urut')
    );
    $this->db->delete('tampung', $data1);
  
    $query = $this->db->query("select * from pegawai where nik=?",array($nama));
    foreach ($query->result() as $row)
    { 
        $jabatan=$row->jabatan;
    }  
// print_r($jabatan);exit();
    if($periode=='1'){
      $query = $this->db->query("select sum(totalnkp) as totalnkp from rekapskk where (bulan=1 or bulan=2 or bulan=3 or bulan=4 or bulan=5 or bulan=6) and tahun=? and jabatan=?",array($tahun,$jabatan));  
    }else{
      $query = $this->db->query("select sum(totalnkp) as totalnkp from rekapskk where (bulan=7 or bulan=8 or bulan=9 or bulan=10 or bulan=11 or bulan=12) and tahun=? and jabatan=?",array($tahun,$jabatan));    
    }
    foreach ($query->result() as $row)
    { 
        // print_r($row->totalnkp);exit();
        // echo $row->totalnkp;
        $nilaikra=$row->totalnkp/2;
        if ($nilaikra<75){
            $skorkra=4;
        }elseif(($nilaikra>=75) and ($nilaikra<81)){
            $skorkra=5;
        }elseif(($nilaikra>=81) and ($nilaikra<86)){
            $skorkra=6;
        }elseif(($nilaikra>=86) and ($nilaikra<91)){
            $skorkra=7;         
        }elseif(($nilaikra>=91) and ($nilaikra<96)){
            $skorkra=8;         
        }elseif(($nilaikra>=96) and ($nilaikra<101)){
            $skorkra=9;         
        }elseif(($nilaikra>=101) and ($nilaikra<106)){
            $skorkra=10;                
        }elseif(($nilaikra>=106) and ($nilaikra<111)){
            $skorkra=11;
        }elseif(($nilaikra>=111) and ($nilaikra<116)){
            $skorkra=12;        
        }elseif(($nilaikra>=116) and ($nilaikra<121)){
            $skorkra=13;        
        }elseif(($nilaikra>=121) and ($nilaikra<126)){
            $skorkra=14;        
        }elseif($nilaikra>=126){
            $skorkra=15;
        }       

        $data2 = array(
            'ket1'   => $skorkra, 
            'ket2'   => 'nilaikra',
            'urut'   => getSession('urut')
        );   
        $this->db->insert('tampung', $data2);
    }

    // $data=null;
    // $query = $this->db->query("select * from tampung where ket2='nilaikra' and urut=?",array(getSession('urut')));  
    // foreach ($query->result() as $row)
    // { 
    //     $data[] = $row;
    //     $cek=1;
    // }
    // return $data;       

    $datax = null;
    $query = $this->db->query("SELECT * FROM tampung where urut=?",array(getSession('urut')));    
    foreach ($query->result() as $key => $row) {
      $datax[] = $row;
    }
    return $datax;    

}*/

    function carikra($id_pegawai,$periode,$tahun){
        $pegawai = $this->db->where('id',$id_pegawai)->get('pegawai')->row();
        
        $this->db->select('sum(totalnkp) as totalnkp')
                ->where('tahun',$tahun)
                ->where('jabatan',$pegawai->jabatan);

        if($periode=='1'){
            $this->db->where('(bulan>=1 and bulan <=6)');
        }else{
            $this->db->where('(bulan>=7 and bulan <=12)');
        }

        $rekap_skk = $this->db->get('rekapskk');

        $skorkra = 0;
        foreach ($rekap_skk->result() as $row)
        { 
            $nilaikra=$row->totalnkp/6;
            //echo $nilaikra;
            //echo $row->totalnkp;
            if ($nilaikra==0){
                $skorkra = 0;
            }elseif($nilaikra<75){
                $skorkra=4;
            }elseif(($nilaikra>=75) and ($nilaikra<81)){
                $skorkra=5;
            }elseif(($nilaikra>=81) and ($nilaikra<86)){
                $skorkra=6;
            }elseif(($nilaikra>=86) and ($nilaikra<91)){
                $skorkra=7;         
            }elseif(($nilaikra>=91) and ($nilaikra<96)){
                $skorkra=8;         
            }elseif(($nilaikra>=96) and ($nilaikra<101)){
                $skorkra=9;         
            }elseif(($nilaikra>=101) and ($nilaikra<106)){
                $skorkra=10;                
            }elseif(($nilaikra>=106) and ($nilaikra<111)){
                $skorkra=11;
            }elseif(($nilaikra>=111) and ($nilaikra<116)){
                $skorkra=12;        
            }elseif(($nilaikra>=116) and ($nilaikra<121)){
                $skorkra=13;        
            }elseif(($nilaikra>=121) and ($nilaikra<126)){
                $skorkra=14;        
            }elseif($nilaikra>=126){
                $skorkra=15;
            }       
        }

        return $skorkra;   

    }


  function carioutstdkompetensi($kojab){
    $value = "NOK";
  
    $dbb = $this->load->database('fb1',true);

    $data = array(
      'urut' => getSession('user')
    );
    $dbb->delete('tampung', $data);  
    $dbb->delete('tampung2', $data);

    $query = $dbb->query("select * from stdknowhow where kojab=?",array($kojab));
    foreach ($query->result() as $row)
    {               
        $data = array(
            'ket1'   => 'FE',
            'ket2'   => $row->fe,
            'jum1'   => 1,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);          
        $data = array(
            'ket1'   => 'IE',
            'ket2'   => $row->ie,
            'jum1'   => 2,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'EX',
            'ket2'   => $row->ex,
            'jum1'   => 3,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'BS',
            'ket2'   => $row->bs,
            'jum1'   => 4,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MKT',
            'ket2'   => $row->tsmkt,
            'jum1'   => 5,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-EST',
            'ket2'   => $row->tsest,
            'jum1'   => 6,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-PPC',
            'ket2'   => $row->tsppc,
            'jum1'   => 7,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-CON',
            'ket2'   => $row->tscon,
            'jum1'   => 8,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-QAC',
            'ket2'   => $row->tsqac,
            'jum1'   => 9,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MAN',
            'ket2'   => $row->tsman,
            'jum1'   => 10,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-SAR',
            'ket2'   => $row->tssar,
            'jum1'   => 11,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-CS',
            'ket2'   => $row->tscs,
            'jum1'   => 12,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-PENG',
            'ket2'   => $row->tspeng,
            'jum1'   => 13,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-FAT',
            'ket2'   => $row->tsfat,
            'jum1'   => 14,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-HSE',
            'ket2'   => $row->tshse,
            'jum1'   => 15,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-HRD',
            'ket2'   => $row->tshrd,
            'jum1'   => 16,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-GA',
            'ket2'   => $row->tsga,
            'jum1'   => 17,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MD',
            'ket2'   => $row->tsmd,
            'jum1'   => 18,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MR',
            'ket2'   => $row->tsmr,
            'jum1'   => 19,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-MECH',
            'ket2'   => $row->tsengmech,
            'jum1'   => 20,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-ELEC',
            'ket2'   => $row->tsengelec,
            'jum1'   => 21,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-INST',
            'ket2'   => $row->tsenginst,
            'jum1'   => 22,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-CIV',
            'ket2'   => $row->tsengciv,
            'jum1'   => 23,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
        $data = array(
            'ket1'   => 'TS-SD',
            'ket2'   => $row->tssd,
            'jum1'   => 24,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
        $data = array(
            'ket1'   => 'TS-IA',
            'ket2'   => $row->tsia,
            'jum1'   => 25,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
        $data = array(
            'ket1'   => 'TS-TOP',
            'ket2'   => $row->tstop,
            'jum1'   => 26,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
    }   
  
    $query = $dbb->query("select * from stdmanagerial where kojab=?",array($kojab));
    foreach ($query->result() as $row)
    {               
        $data = array(
            'ket1'   => 'DEV',
            'ket2'   => $row->dev,
            'jum1'   => 27,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);          
        $data = array(
            'ket1'   => 'DIR',
            'ket2'   => $row->dir,
            'jum1'   => 28,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TW',
            'ket2'   => $row->tw,
            'jum1'   => 29,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TL',
            'ket2'   => $row->tl,
            'jum1'   => 30,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'PS',
            'ket2'   => $row->ps,
            'jum1'   => 31,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'PO',
            'ket2'   => $row->po,
            'jum1'   => 32,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'SO',
            'ket2'   => $row->so,
            'jum1'   => 33,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'AT',
            'ket2'   => $row->at,
            'jum1'   => 34,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'CT',
            'ket2'   => $row->ct,
            'jum1'   => 35,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'INT',
            'ket2'   => $row->int,
            'jum1'   => 36,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'IU',
            'ket2'   => $row->iu,
            'jum1'   => 37,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'RB',
            'ket2'   => $row->rb,
            'jum1'   => 38,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'RB',
            'ket2'   => $row->imp,
            'jum1'   => 39,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'ING',
            'ket2'   => $row->ing,
            'jum1'   => 40,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TRP',
            'ket2'   => $row->trp,
            'jum1'   => 41,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TEW',
            'ket2'   => $row->tew,
            'jum1'   => 42,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'CRT',
            'ket2'   => $row->crt,
            'jum1'   => 43,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'WIS',
            'ket2'   => $row->wis,
            'jum1'   => 44,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'EXC',
            'ket2'   => $row->exc,
            'jum1'   => 45,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'ACH',
            'ket2'   => $row->ach,
            'jum1'   => 46,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'CO',
            'ket2'   => $row->co,
            'jum1'   => 47,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'IS',
            'ket2'   => $row->is,
            'jum1'   => 48,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'CSO',
            'ket2'   => $row->cso,
            'jum1'   => 49,
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
        $warna='#996633';
      }elseif($row->ket2==2){
        $cek2='X';
        $warna='#996633';
      }elseif($row->ket2==3){
        $cek3='X';
        $warna='#996633';
      }elseif($row->ket2==4){
        $cek4='X';
        $warna='#996633';
      }elseif($row->ket2==5){
        $cek5='X';
        $warna='#996633';
      }
        $data = array(
            'ket1'   => $row->ket1,
            'ket2'   => $cek1,
            'ket3'   => $cek2,
            'ket4'   => $cek3,
            'ket5'   => $cek4,
            'ket6'   => $cek5,
            'ket7'   => $warna,
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

    function carievaluasipms($id_pegawai,$periode,$tahun){
        $cek=0;
        $query = $this->db->query("select * from krakba where id_pegawai=? and periode=? and tahun=?",array($id_pegawai,$periode,$tahun));
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

    function carirekappms($id_pegawai,$tahun){
        
        $cek=0;
        $query = $this->db->query("select * from krakba where id_pegawai=? and tahun=?",array($id_pegawai,$tahun));
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

    function getlevel(){
        $data = null;
        $query = $this->db->query("SELECT * FROM kelompok");
        foreach ($query->result() as $key => $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function cariHasil($id_pegawai,$periode,$tahun)
    {
        return $this->db->where('id_pegawai',$id_pegawai)
            ->where('periode',$periode)
            ->where('tahun',$tahun)
            ->get('krakba');
    }

    /*function cariresumepms($leveljabatan,$tahun){
        $value = "NOK";
        $dbb = $this->load->database('fb1',true);
        
        if ($leveljabatan==1){     
            $query = $dbb->query("select a.unit,a.nik,a.nama,a.jabatan from pegawai a,jabatan b where a.jabatan=b.kojab and b.kelompok=1 order by a.unit,a.nama");
        }       
        if ($leveljabatan==2){     
            $query = $dbb->query("select a.unit,a.nik,a.nama,a.jabatan from pegawai a,jabatan b where a.jabatan=b.kojab and b.kelompok=2 order by a.unit,a.nama");
        }       
        if ($leveljabatan==3){     
            $query = $dbb->query("select a.unit,a.nik,a.nama,a.jabatan from pegawai a,jabatan b where a.jabatan=b.kojab and b.kelompok=3 order by a.unit,a.nama");
        }       
        if ($leveljabatan==4){     
            $query = $dbb->query("select a.unit,a.nik,a.nama,a.jabatan from pegawai a,jabatan b where a.jabatan=b.kojab and b.kelompok=4 order by a.unit,a.nama");
        }                   

        foreach ($query->result() as $key=>$row)
        {
            $datadet[] = $row;
            $query = $dbb->query("select namajabatan from jabatan where kojab =?",array($row->jabatan));       
            foreach ($query->result() as $row2)
            {               
                $datadet[$key]->namajabatan = $row2->namajabatan;
            }
            $query = $dbb->query("select namaunit from unit where kunit =?",array($row->unit));       
            foreach ($query->result() as $row3)
            {               
                $datadet[$key]->namaunit = $row3->namaunit;
            }        
            $datadet[$key]->tahun = $tahun;

            $periode=array('1' => 'Periode I',
                            '2' => 'Periode II',
                            '3' => 'Periode III',
                            '4' => 'Periode IV'
                    );
            
            for ($i=1; $i < 5; $i++) { 
                $query = $dbb->query("select * from krakba where kopeg=? and tahun=? and periode=?",array($row->nik,$tahun,$i));                   
                foreach ($query->result() as $row1)
                {           
                    $datadet[$key]->{'periode'.$i} = $periode[$i];
                    $datadet[$key]->{'totalnilkra'.$i} = $row1->totalnilkra;
                    $datadet[$key]->{'totnilkba'.$i} = $row1->totnilkba;
                    $datadet[$key]->{'totkrakba'.$i} = $row1->totkrakba;
                    $datadet[$key]->{'hasil'.$i} = $row1->hasil;
                }           
            }
        }
        return $datadet;
    }*/

    function cariresumepms($leveljabatan,$tahun){
        $value = "NOK";

        $resume = $this->db->select('unit.namaunit,krakba.id_pegawai,pegawai.nama,pegawai.nik,krakba.periode,krakba.hasil,totalnilkra,totnilkba,totkrakba,hasil,namajabatan')
                ->join('pegawai','pegawai.id = krakba.id_pegawai')
                ->join('unit','unit.kunit = pegawai.unit')
                ->join('jabatan','jabatan.kojab = pegawai.jabatan')
                ->where('jabatan.kelompok',$leveljabatan)
                ->where('krakba.tahun',$tahun)
                ->group_by('krakba.noindex')
                ->order_by('krakba.id_pegawai')
                ->get('krakba');
        return $resume;
    }

    public function getNamaKelompok($id)
    {
        return $this->db->where('kodekelom',$id)->get('kelompok')->row()->namakelompok;
    }

}
?>