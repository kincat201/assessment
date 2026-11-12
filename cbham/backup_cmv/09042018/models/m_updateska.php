<?php
class M_updateska extends MY_Model{

    function getdataska(){
        $data = null;
        $query = $this->db->query("select * from masterska order by kodeska");
        foreach ($query->result() as $key => $row) {
            $data[] = $row;
        }
        return $data;
    }
    
    function getnompp(){
        $tahun = date('Y');
        $bulan = date('m');

        $no = "MPP-".$tahun."-%";
        $data = null;
        $query = $this->db->query("select max(nompp) as nomax from mpp where nompp like ? order by nompp",array($no));
        foreach ($query->result() as $key => $row) {
            $data = $row->nomax;
        }
        if ($data!=null) {
            $nomax = explode('-', $data);
            $nomor = $nomax[2] + 1;
            if ($nomor < 10) {
                $nomor = '00'.$nomor;
            } else if ($nomor < 100) {
                $nomor = '0'.$nomor;
            } else {
                $nomor = $nomor;
            }
        } else {
            $nomor = '001';
        }
        return $nomor;
    } 

    function getska($nama){
        $this->db->delete('tampungupdateska', array('user'=>getSession('user')));  
        $value = null;
        $query = $this->db->query("SELECT * FROM updateska WHERE nik=?",array($nama));
        foreach ($query->result() as $row){
            $data = array(
                'kodeska'     => $row->kodeska,
                'asosiasi'    => $row->asosiasi,
                'nirska'      => $row->nirska,
                'mulai'       => $row->mulai,
                'selesai'     => $row->selesai,
                'user'        => getSession('user')
            );
            $this->db->insert('tampungupdateska', $data);  
        }

        $query = $this->db->query("SELECT * FROM tampungupdateska WHERE USER=?",array(getSession('user')));
        foreach ($query->result() as $key => $row) {
            $value[] = $row;
            $query = $this->db->query("SELECT namaska FROM masterska WHERE kodeska=?",array($row->kodeska));
            foreach ($query->result() as $rowp) {
                $value[$key]->namaska = $rowp->namaska;  
            }
        }

        return $value;
    } 

    function simpandetailska($kodeska,$asosiasi,$nirska,$mulai,$selesai){
        $query = $this->db->query("SELECT count(kodeska) as jum FROM tampungupdateska WHERE kodeska=? and user=?",array($kodeska,getSession('user')));
        foreach ($query->result() as $row1) {
            $jum = $row1->jum;  
        }       
        if($jum==0){ 
            $data = array(
                'kodeska'     => $kodeska,
                'asosiasi'    => $asosiasi,
                'nirska'      => $nirska,
                'mulai'       => $mulai,
                'selesai'     => $selesai,
                'user'        => getSession('user')
            );
            $this->db->insert('tampungupdateska', $data);  
        }else{
            $data = array(
                'kodeska'     => $kodeska,
                'asosiasi'    => $asosiasi,
                'nirska'      => $nirska,
                'mulai'       => $mulai,
                'selesai'     => $selesai,
                'user'        => getSession('user')
            );
            $this->db->update('tampungupdateska', $data, array('kodeska' => $kodeska, 'user' => getSession('user'))); 
        }

        $value = null;
        $query = $this->db->query("SELECT * FROM tampungupdateska WHERE USER=?",array(getSession('user')));
        foreach ($query->result() as $key => $row) {
            $value[] = $row;
            $query = $this->db->query("SELECT namaska FROM masterska WHERE kodeska=?",array($row->kodeska));
            foreach ($query->result() as $rowp) {
                $value[$key]->namaska = $rowp->namaska;  
            }
        }
        return $value;  
    } 

    function hapusdetailska($kodeska){
        $this->db->delete('tampungupdateska', array('kodeska' => $kodeska, 'user'=>getSession('user')));  
        $value = null;
        $query = $this->db->query("SELECT * FROM tampungupdateska WHERE user=?",array(getSession('user')));
        foreach ($query->result() as $key => $row) {
            $value[] = $row;
            $query = $this->db->query("SELECT namaska FROM masterska WHERE kodeska=?",array($row->kodeska));
            foreach ($query->result() as $rowp) {
                $value[$key]->namaska = $rowp->namaska;  
            }
        }
        return $value;
    } 

    function simpanupdateska($nama){
        $today=date('Y-m-d h:i:sa');
        // $query = $this->db->query("SELECT namaunit FROM unit WHERE kunit=?",array($unit));
        // foreach ($query->result() as $rowj) {
        //     $namaunit = $rowj->namaunit;  
        // }

        $value = 0;
        // $data = array(
        //     'nompp'     => $nompp,
        //     'tglentry'  => $tgl,
        //     'unit'      => $unit,
        //     'namaunit'  => $namaunit,
        //     'statusmpp' => '0',
        //     'user'      => getSession('user')
        // );
        // $this->db->insert('mpp', $data);
        // $value = $value + $this->db->affected_rows();

        $query = $this->db->query("SELECT * FROM tampungupdateska WHERE USER=?",array(getSession('user')));
        foreach ($query->result() as $rowdet) {

            $query = $this->db->query("SELECT count(kodeska) as jum FROM updateska WHERE nik=? and kodeska=?",array($nama,$rowdet->kodeska));
            foreach ($query->result() as $rowj) {
                $jum = $rowj->jum;  
            }

            $datadet = null;
            if($jum==0){
                $datadet = array(
                    'nik'       => $nama,
                    'kodeska'   => $rowdet->kodeska,
                    'asosiasi'  => $rowdet->asosiasi,
                    'nirska'    => $rowdet->nirska,
                    'mulai'     => $rowdet->mulai,
                    'selesai'   => $rowdet->selesai,
                    'tgl'       => $today,
                    'user'      => getSession('user')
                );
                $this->db->insert('updateska', $datadet); 
            }else{
                $datadet = array(
                    'nik'       => $nama,
                    'kodeska'   => $rowdet->kodeska,
                    'asosiasi'  => $rowdet->asosiasi,
                    'nirska'    => $rowdet->nirska,
                    'mulai'     => $rowdet->mulai,
                    'selesai'   => $rowdet->selesai,
                    'tgl'       => $today,
                    'user'      => getSession('user')
                );                
                $this->db->update('updateska', $datadet, array('kodeska' => $rowdet->kodeska, 'nik' => $nama)); 
            }
        }
        $this->db->delete('tampungupdateska', array('user'=>getSession('user'))); 
        $value = $value + $this->db->affected_rows();
        return $value;
    }

    function batalupdateska(){
        $this->db->delete('tampungupdateska', array('user'=>getSession('user'))); 
        $value = $this->db->affected_rows();
        return $value;
    }

    // function carireportska($nama){        
    //     $value = null;
    //     $this->db->delete('tampung', array('urut'=>getSession('urut'))); 
    //     $query = $this->db->query("SELECT * FROM updateska WHERE nik=?",array($nama));
    //     foreach ($query->result() as $row) {            
    //         $query = $this->db->query("SELECT * FROM pegawai WHERE nik=?",array($nama));
    //         foreach ($query->result() as $row1){
    //             $namapeg=$row1->nama;
    //         }
    //         $query = $this->db->query("SELECT * FROM masterska WHERE kodeska=?",array($row->kodeska));
    //         foreach ($query->result() as $row2){
    //             $namaska=$row2->namaska;
    //         }            

    //         $data = array(
    //             'ket1'   => $nama,
    //             'ket2'   => $namapeg,
    //             'ket3'   => $row->kodeska,
    //             'ket4'   => $namaska,
    //             'ket5'   => $row->asosiasi,
    //             'ket6'   => $row->nirska,
    //             'ket7'   => $row->mulai,
    //             'ket8'   => $row->selesai,                
    //             'urut'   => getSession('urut')
    //         );
    //         $this->db->insert('tampung', $data); 
    //     }

    //     $query = $this->db->query("SELECT * FROM tampung WHERE urut=?",array(getSession('urut')));
    //     foreach ($query->result() as $key => $row) {
    //         $value[] = $row;
    //     }

    //     return $value;
    // } 

    function carireportska($nama){        
        $value = null;
        $query = $this->db->query("SELECT * FROM updateska WHERE nik=?",array($nama));
        foreach ($query->result() as $key => $row) {
            $value[] = $row;
            // print_r($row->kodeska);exit();
            $query = $this->db->query("SELECT namaska FROM masterska WHERE kodeska=?",array($row->kodeska));
            foreach ($query->result() as $rowp) {
                $value[$key]->namaska = $rowp->namaska;  
            }
        }
        return $value;
    } 

  function cetakreportska(){
    $data = null;
    $query = $this->db->query("SELECT * FROM updateska order by kodeska");
    foreach ($query->result() as $key => $row) {
      $data[] = $row;
    }
    return $data;
  }

    function carireportmpp($unit,$tgl1,$tgl2,$status){
        $data=null;
        $cariunit = '';
        if ($unit!='') {
            $cariunit = " and unit='".$unit."'";
        }

        $caristatus='';
        if ($status!='') {
            $caristatus = " and statusmpp='".$status."'";
        }

        $caritgl='';
        if ($tgl1!='' and $tgl2!='') {
            $caritgl = " and tglentry between '".$tgl1."' and '".$tgl2."'";
        }        

        $sql = "SELECT * FROM mpp where 1=1";
        $query = $this->db->query($sql.$cariunit.$caristatus.$caritgl." order by tglentry");
        foreach ($query->result() as $key => $row) {
            $data[] = $row;
        }
        return $data;
    }

    function detailmpp($nompp){
        $data = null;
        $query = $this->db->query("SELECT * FROM mpp where nompp=?",array($nompp));
        foreach ($query->result() as $key => $row) {
            $data[] = $row;
            $query = $this->db->query("SELECT a.*, b.namajabatan, c.nama as namakandidat FROM det_mpp a, jabatan b, pegawai c where a.nompp=? and a.jabatan=b.kojab and a.kandidat=c.nik order by a.jabatan",array($nompp));
            foreach ($query->result() as $rowdet) {
                $data[$key]->detail[] = $rowdet; 
            }
        }
        return $data;
    }

    function carimppopen($unit){
        $data = null;
        $query = $this->db->query("SELECT nompp FROM mpp where statusmpp=0 and unit=?",array($unit));
        foreach ($query->result() as $key => $row) {
            $data[] = $row;
        }
        return $data;
    }

    function accdetmpp($nompp,$jabatan,$kandidat){
        $today=date('Y-m-d h:i:sa');

        $data = array(
            'acc'       =>  '1',
            'useracc'   =>  getSession('user'),
            'tglacc'    =>  $today
        );
        $this->db->update('det_mpp', $data, array('nompp' => $nompp, 'jabatan' => $jabatan, 'kandidat' => $kandidat)); 
        $value = $this->db->affected_rows();
        return $value;
    }

    function closempp($nompp){
        $today=date('Y-m-d h:i:sa');

        $data = array(
            'statusmpp' =>  '1',
            'useracc'   =>  getSession('user'),
            'tglacc'    =>  $today
        );
        $this->db->update('mpp', $data, array('nompp' => $nompp)); 
        $value = $this->db->affected_rows();
        return $value;
    }

    function batalmpp(){
        $this->db->delete('tampungdetmpp', array('user'=>getSession('user'))); 
        $value = $this->db->affected_rows();
        return $value;
    }

    function getnoproyek(){
        $tahun = date('Y');
        $bulan = date('m');

        $no = "PROYEK-".$tahun."-%";
        $data = null;
        $query = $this->db->query("select max(nompp) as nomax from mppproyek where nompp like ? order by nompp",array($no));
        foreach ($query->result() as $key => $row) {
            $data = $row->nomax;
        }
        if ($data!=null) {
            $nomax = explode('-', $data);
            $nomor = $nomax[2] + 1;
            if ($nomor < 10) {
                $nomor = '00'.$nomor;
            } else if ($nomor < 100) {
                $nomor = '0'.$nomor;
            } else {
                $nomor = $nomor;
            }
        } else {
            $nomor = '001';
        }
        return $nomor;
    } 

    function tambahdetailmppproyek($nompp,$jabatan,$mulai,$selesai,$kebutuhan,$kandidat,$kualifikasi,$pic,$catatan){
        $data = array(
            'nompp'       => $nompp,
            'jabatan'     => $jabatan,
            'mulai'       => $mulai,
            'selesai'     => $selesai,
            'kebutuhan'   => $kebutuhan,
            'kandidat'    => $kandidat,
            'kualifikasi' => $kualifikasi,
            'pic'         => $pic,
            'catatan'     => $catatan,
            'user'        => getSession('user')
        );
        $this->db->insert('tampungdetmppproyek', $data);  

        $value = null;
        $query = $this->db->query("SELECT * FROM tampungdetmppproyek WHERE nompp=? AND USER=?",array($nompp,getSession('user')));
        foreach ($query->result() as $key => $row) {
            $value[] = $row;
            if ($row->kebutuhan=='Rotasi' and $row->kandidat!='') {
                $query = $this->db->query("SELECT nama FROM pegawai WHERE nik=?",array($row->kandidat));
                foreach ($query->result() as $rowp) {
                    $value[$key]->namakandidat = $rowp->nama;  
                }
            }
            $query = $this->db->query("SELECT namajabatan FROM jabatan WHERE kojab=?",array($row->jabatan));
            foreach ($query->result() as $rowj) {
                $value[$key]->namajabatan = $rowj->namajabatan;  
            }
        }
        return $value;  
    } 

    function hapusdetailmppproyek($nompp,$noindex){
        $this->db->delete('tampungdetmppproyek', array('nompp' => $nompp, 'noindex' => $noindex));  
        $value = null;
        $query = $this->db->query("SELECT * FROM tampungdetmppproyek WHERE nompp=? AND user=?",array($nompp,getSession('user')));
        foreach ($query->result() as $key => $row) {
            $value[] = $row;
            if ($row->kebutuhan=='Rotasi' and $row->kandidat!='') {
                $query = $this->db->query("SELECT nama FROM pegawai WHERE nik=?",array($row->kandidat));
                foreach ($query->result() as $rowp) {
                    $value[$key]->namakandidat = $rowp->nama;  
                }
            }
            $query = $this->db->query("SELECT namajabatan FROM jabatan WHERE kojab=?",array($row->jabatan));
            foreach ($query->result() as $rowj) {
                $value[$key]->namajabatan = $rowj->namajabatan;  
            }
        }
        return $value;
    } 

    function simpanmppproyek($nompp,$tglentry,$divisi,$tahun,$proyek){
        $value = 0;
        $data = array(
            'nompp'     => $nompp,
            'tglentry'  => $tglentry,
            'divisi'    => $divisi,
            'tahun'     => $tahun,
            'proyek'    => $proyek,
            'statusmpp' => '0',
            'user'      => getSession('user')
        );
        $this->db->insert('mppproyek', $data);
        $value = $value + $this->db->affected_rows();

        $query = $this->db->query("SELECT * FROM tampungdetmppproyek WHERE nompp=? AND USER=?",array($nompp,getSession('user')));
        foreach ($query->result() as $rowdet) {
            $datadet = null;
            $datadet = array(
                'nompp'       => $rowdet->nompp,
                'jabatan'     => $rowdet->jabatan,
                'mulai'       => $rowdet->mulai,
                'selesai'     => $rowdet->selesai,
                'kebutuhan'   => $rowdet->kebutuhan,
                'kandidat'    => $rowdet->kandidat,
                'kualifikasi' => $rowdet->kualifikasi,
                'pic'         => $rowdet->pic,
                'catatan'     => $rowdet->catatan,
                'acc'         => '0'
            );
            $this->db->insert('det_mppproyek', $datadet); 
        }
        $this->db->delete('tampungdetmppproyek', array('nompp' => $nompp, 'user'=>getSession('user'))); 
        $value = $value + $this->db->affected_rows();
        return $value;
    }

    function carimppproyekopen($divisi){
        $data = null;
        $query = $this->db->query("SELECT nompp FROM mppproyek where statusmpp=0 and divisi=?",array($divisi));
        foreach ($query->result() as $key => $row) {
            $data[] = $row;
        }
        return $data;
    }

    function accdetmppproyek($nompp,$noindex){
        $today=date('Y-m-d h:i:sa');

        $data = array(
            'acc'       =>  '1',
            'useracc'   =>  getSession('user'),
            'tglacc'    =>  $today
        );
        $this->db->update('det_mppproyek', $data, array('nompp' => $nompp, 'noindex' => $noindex)); 
        $value = $this->db->affected_rows();
        return $value;
    }

    function closemppproyek($nompp){
        $today=date('Y-m-d h:i:sa');

        $data = array(
            'statusmpp' =>  '1',
            'useracc'   =>  getSession('user'),
            'tglacc'    =>  $today
        );
        $this->db->update('mppproyek', $data, array('nompp' => $nompp)); 
        $value = $this->db->affected_rows();
        return $value;
    }

    function detailmppproyek($nompp){
        $data = null;
        $query = $this->db->query("SELECT a.*, b.namaunit as namadivisi FROM mppproyek a, unit b where a.divisi=b.kunit and a.nompp=?",array($nompp));
        foreach ($query->result() as $key => $row) {
            $data[] = $row;
            $query = $this->db->query("select a.*, b.namajabatan, c.nama as namakandidat
                                        from det_mppproyek a
                                        left join jabatan b on a.jabatan=b.kojab
                                        left join pegawai c on a.kandidat=c.nik
                                        where a.nompp=? order by a.noindex",array($nompp));
            foreach ($query->result() as $rowdet) {
                $data[$key]->detail[] = $rowdet; 
            }
        }
        return $data;
    }

    function carireportmppproyek($divisi,$tahun,$status){
        $data=null;
        $caridivisi = '';
        if ($divisi!='') {
            $caridivisi = " and divisi='".$divisi."'";
        }

        $caristatus='';
        if ($status!='') {
            $caristatus = " and statusmpp='".$status."'";
        }

        $caritahun='';
        if ($tahun!='') {
            $caritahun = " and tahun='".$tahun."'";
        }        

        $sql = "SELECT * FROM mppproyek where 1=1";
        $query = $this->db->query($sql.$caridivisi.$caristatus.$caritahun." order by nompp");
        foreach ($query->result() as $key => $row) {
            $data[] = $row;
            $query = $this->db->query("SELECT namaunit FROM unit WHERE kunit=?",array($row->divisi));
            foreach ($query->result() as $rowj) {
                $data[$key]->namadivisi = $rowj->namaunit;  
            }
        }
        return $data;
    }

    function batalmppproyek(){
        $this->db->delete('tampungdetmppproyek', array('user'=>getSession('user'))); 
        $value = $this->db->affected_rows();
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

    function accrotasi($status,$nik,$tanggal){
        $today=date('Y-m-d h:i:sa');
        switch ($status) {
            case 'acc':
                $data = array(
                    'acc'       =>  '2',
                    'useracc'   =>  getSession('user'),
                    'tglacc'    =>  $today
                );
                $this->db->update('rotasi', $data, array('nik' => $nik, 'tanggal' => $tanggal)); 
                $query = $this->db->query("SELECT statusbaru, unitbaru, gradebaru, strukturbaru, jabatanbaru FROM rotasi where nik=? and tanggal=?",array($nik,$tanggal));
                foreach ($query->result() as $row) {
                    $query = $this->db->query("select namaunit from unit where kunit=?",array($row->unitbaru));
                    foreach ($query->result() as $rowu) {
                        $namaunit = $rowu->namaunit;
                    }
                    $query = $this->db->query("select namajabatan from jabatan where kojab=?",array($row->jabatanbaru));
                    foreach ($query->result() as $rowj) {
                        $namajab = $rowj->namajabatan;
                    }
                    $dataupdate = array(
                        'status'        => $row->statusbaru,
                        'unit'          => $row->unitbaru,
                        'namaunit'      => $namaunit,
                        'jabatan'       => $row->jabatanbaru,
                        'namajab'       => $namajab,
                        'grade'         => $row->gradebaru,
                        'jenisjabatan'  => $row->strukturbaru,
                    );
                }
                $this->db->update('pegawai', $dataupdate, array('nik' => $nik)); 
                $value = $this->db->affected_rows();
                if ($value>0) {
                    $data = array(
                        'proses'  => 'ACC ROTASI/PROMOSI & UPDATE PEGAWAI',
                        'note'    => $nik.' - '.$tanggal,
                        'user'    => getSession('user'),
                        'tgl'     => $today
                    );
                    $this->db->insert('log', $data);  
                }
                break;
            case 'notacc':
                $data = array(
                    'acc'       =>  '0',
                    'useracc'   =>  getSession('user'),
                    'tglacc'    =>  $today
                );
                $this->db->update('rotasi', $data, array('nik' => $nik, 'tanggal' => $tanggal)); 
                break;
        }
        
        $valueret = $this->db->affected_rows();
        return $valueret; 
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

    function getdetailrotasi($nik,$tanggal){
        $data=null;

        $sql = "SELECT r.*, p.nama FROM rotasi r, pegawai p where r.nik=p.nik and r.nik=? and r.tanggal=?";
        $query = $this->db->query($sql,array($nik,$tanggal));
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
            $query = $this->db->query("select namaunit from unit where kunit=?",array($row->unitlama));
            foreach ($query->result() as $rowu) {
                $data[$key]->unitlama = $rowu->namaunit;
            }
            $query = $this->db->query("select namajabatan from jabatan where kojab=?",array($row->jabatanlama));
            foreach ($query->result() as $rowj) {
                $data[$key]->jabatanlama = $rowj->namajabatan;
            }
        }
        return $data;
    }

}
?>