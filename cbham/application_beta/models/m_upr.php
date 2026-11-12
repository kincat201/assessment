<?php
class m_upr extends MY_Model{

    // function cariupr($nama){
    //     $dbb = $this->load->database('fb1',true);
        
    //     $cek=0;
    //     $query = $dbb->query("select * from pegawai where nik=?",array($nama));
    //     foreach ($query->result() as $row)
    //     { 
    //         $data1[] = $row;
    //         $cek=1;
    //     }
        
    //     if ($cek==1) {
    //         return $data1;      
    //     }else{ 
    //         $data1=0;
    //         return $data1;      
    //     }
    // }

    function hapustampung(){
        $dbb = $this->load->database('fb1',true);        
        $data = array(
            'urut'  => getSession('urut')
        );
        $this->db->delete('tampung3', $data);
    }

    function caricv($nama){
        $dbb = $this->load->database('fb1',true);    

        $query = $dbb->query("select * from pegawai where nik=?",array($nama));
        foreach ($query->result() as $row)
        { 
            $jabatan=$row->jabatan;
            $data = array(
                'ket1'  => 'A',
                'ket2'  => $row->nik,
                'ket3'  => $row->nama,
                'ket4'  => $row->tgllahir,
                'ket5'  => $row->pendidikan,
                'ket6'  => $row->status,
                'ket7'  => $row->namaunit,
                'ket8'  => $row->namajab,                
                'urut'  => getSession('urut')
            );
            $this->db->insert('tampung3', $data);            
        }

        $cek=0;
        $query = $dbb->query("select * from tampung3 where urut=? and ket1='A'",array(getSession('urut')));
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

    function caripms($nama){
        $dbb = $this->load->database('fb1',true);    

        $query = $dbb->query("select * from krakba where kopeg=? and tahun=2017",array($nama));
        foreach ($query->result() as $row)
        { 
            $data = array(
                'ket1'  => 'B',
                'ket2'  => $row->kopeg,
                'ket3'  => $row->nama,
                'ket4'  => $row->jabatan,
                'ket5'  => $row->penilai,
                'ket6'  => $row->periode,
                'ket7'  => $row->tahun,
                'ket8'  => $row->totalnilkra,
                'ket9'  => $row->totnilkba,
                'ket10'  => $row->totkrakba,                
                'urut'  => getSession('urut')
            );
            $this->db->insert('tampung3', $data);            
        }        
        $cek=0;
        $query = $dbb->query("select * from tampung3 where urut=? and ket1='B' order by ket6",array(getSession('urut')));
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

    function caripmstahunan($nama){
        $dbb = $this->load->database('fb1',true);    

        $query = $dbb->query("select kopeg,nama,jabatan,penilai,periode,tahun,sum(totalnilkra)/2 as kra,sum(totnilkba)/2 as kba,sum(totkrakba)/2 as total from krakba where kopeg=? group by tahun",array($nama));
        // $query = $dbb->query("select * from krakba where kopeg=?",array($nama));
        foreach ($query->result() as $row)
        { 
            $data = array(
                'ket1'  => 'E',
                'ket2'  => $row->kopeg,
                'ket3'  => $row->nama,
                'ket4'  => $row->jabatan,
                'ket5'  => $row->penilai,
                'ket6'  => $row->periode,
                'ket7'  => $row->tahun,
                'ket8'  => $row->kra,
                'ket9'  => $row->kba,
                'ket10'  => $row->total,                
                'urut'  => getSession('urut')
            );
            $this->db->insert('tampung3', $data);            
        }        
        $cek=0;
        $query = $dbb->query("select * from tampung3 where urut=? and ket1='E' order by ket7",array(getSession('urut')));
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


    // function cariknowhow($nama){
    //     $dbb = $this->load->database('fb1',true);
        
    //     $query = $dbb->query("select * from pegawai where nik=?",array($nama));
    //     foreach ($query->result() as $row)
    //     { 
    //         $jabatan=$row->jabatan;
    //     }

    //     $query = $dbb->query("select * from stdknowhow where kojab=?",array($jabatan));
    //     foreach ($query->result() as $row)
    //     { 
    //         // $query = $dbb->query("select * from knowhow where kojab=?",array($jabatan));
    //         // foreach ($query->result() as $row1)
    //         // {             
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'FE',
    //                 'ket3'   => $row->fe,
    //                 'ket4'   => 'Formal Education',
    //                 'jum1'   => 1,            
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);          
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'IE',
    //                 'ket3'   => $row->ie,
    //                 'ket4'   => 'Informal Education',
    //                 'jum1'   => 2,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'EX',
    //                 'ket3'   => $row->ex,
    //                 'ket4'   => 'Experience',
    //                 'jum1'   => 3,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'BS',
    //                 'ket3'   => $row->bs,
    //                 'ket4'   => 'Business Skill',
    //                 'jum1'   => 4,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-MKT',            
    //                 'ket3'   => $row->tsmkt,
    //                 'ket4'   => 'Technical Skill Marketing',
    //                 'jum1'   => 5,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-EST',
    //                 'ket3'   => $row->tsest,
    //                 'ket4'   => 'Technical Skill Estimation',
    //                 'jum1'   => 6,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-PPC',
    //                 'ket3'   => $row->tsppc,
    //                 'ket4'   => 'Technical Skill Planning & Control',
    //                 'jum1'   => 7,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-CON',
    //                 'ket3'   => $row->tscon,
    //                 'ket4'   => 'Technical Skill Construction',
    //                 'jum1'   => 8,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-QAC',
    //                 'ket3'   => $row->tsqac,
    //                 'ket4'   => 'Technical Skill QA/QC',
    //                 'jum1'   => 9,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-MAN',
    //                 'ket3'   => $row->tsman,
    //                 'ket4'   => 'Technical Skill Maintenance Elektrikal,Instrument,IT,Mekanikal,Utility',
    //                 'jum1'   => 10,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-SAR',
    //                 'ket3'   => $row->tssar,
    //                 'ket4'   => 'Technical Skill Sarana Angkutan',
    //                 'jum1'   => 11,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-CS',
    //                 'ket3'   => $row->tscs,
    //                 'ket4'   => 'Technical Skill Coorporate Secretary',
    //                 'jum1'   => 12,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-PENG',
    //                 'ket3'   => $row->tspeng,
    //                 'ket4'   => 'Technical Skill Pengadaan',
    //                 'jum1'   => 13,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                          
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-FAT',
    //                 'ket3'   => $row->tsfat,
    //                 'ket4'   => 'Technical Skill Finance,Accounting and Tax',
    //                 'jum1'   => 14,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-HSE',
    //                 'ket3'   => $row->tshse,
    //                 'ket4'   => 'Technical Skill HEALTH SAFETY & ENVIRONMENT/OHSAS/K3',
    //                 'jum1'   => 15,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-HRD',
    //                 'ket3'   => $row->tshrd,
    //                 'ket4'   => 'Technical Skill HRD',
    //                 'jum1'   => 16,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-GA',
    //                 'ket3'   => $row->tsga,
    //                 'ket4'   => 'Technical Skill GENERAL AFFAIRS',
    //                 'jum1'   => 17,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-MD',
    //                 'ket3'   => $row->tsmd,
    //                 'ket4'   => 'Technical Skill Manajement Development',
    //                 'jum1'   => 18,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-MR',
    //                 'ket3'   => $row->tsmr,
    //                 'ket4'   => 'Technical Skill Manajemen Representative',
    //                 'jum1'   => 19,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                          
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-ENG-MECH',
    //                 'ket3'   => $row->tsengmech,
    //                 'ket4'   => 'Technical Skill Engineering Mechanical',
    //                 'jum1'   => 20,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                          
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-ENG-ELEC',
    //                 'ket3'   => $row->tsengelec,
    //                 'ket4'   => 'Technical Skill Engineering Electrical',
    //                 'jum1'   => 21,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                          
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-ENG-INST',
    //                 'ket3'   => $row->tsenginst,
    //                 'ket4'   => 'Technical Skill Engineering Instrumentation',
    //                 'jum1'   => 22,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                          
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-ENG-CIV',
    //                 'ket3'   => $row->tsengciv,
    //                 'ket4'   => 'Technical Skill Engineering Civil Structure',
    //                 'jum1'   => 23,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-SD',
    //                 'ket3'   => $row->tssd,
    //                 'ket4'   => 'Technical Skill System Development',
    //                 'jum1'   => 24,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-IA',
    //                 'ket3'   => $row->tsia,
    //                 'ket4'   => 'Technical Skill Internal Audit',
    //                 'jum1'   => 25,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                                  
    //             $data = array(
    //                 'ket1'   => 'C',
    //                 'ket2'   => 'TS-TOP',
    //                 'ket3'   => $row->tstop,
    //                 'ket4'   => 'Technical Skill Top Management',
    //                 'jum1'   => 26,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                                  
    //     }

    //     $cek=0;
    //     $query = $dbb->query("select * from tampung3 where urut=? and ket1='C' order by jum1",array(getSession('urut')));
    //     foreach ($query->result() as $row)
    //     { 
    //         $data1[] = $row;
    //         $cek=1;
    //     }
        
    //     if ($cek==1) {
    //         return $data1;      
    //     }else{ 
    //         $data1=0;
    //         return $data1;      
    //     }        

    // }

    function cariknowhow($nama){
        $dbb = $this->load->database('fb1',true);

        $query = $dbb->query("select * from pegawai where nik=?",array($nama));
        foreach ($query->result() as $row)
        { 
            $jabatan=$row->jabatan;
        }                

        $fe  =0; $fe1  =0; $fe2  =0; $rfe  =0;
        $ie  =0; $ie1  =0; $ie2  =0; $rie  =0;
        $ex  =0; $ex1  =0; $ex2  =0; $rex  =0;
        $bs  =0; $bs1  =0; $bs2  =0; $rbs  =0;
        $tsmkt   =0; $tsmkt1   =0; $tsmkt2   =0; $rtsmkt   =0;
        $tsest   =0; $tsest1   =0; $tsest2   =0; $rtsest   =0;
        $tsppc   =0; $tsppc1   =0; $tsppc2   =0; $rtsppc   =0;
        $tscon   =0; $tscon1   =0; $tscon2   =0; $rtscon   =0;
        $tsqac   =0; $tsqac1   =0; $tsqac2   =0; $rtsqac   =0;
        $tsman   =0; $tsman1   =0; $tsman2   =0; $rtsman   =0;
        $tssar   =0; $tssar1   =0; $tssar2   =0; $rtssar   =0;
        $tscs    =0; $tscs1  =0; $tscs2    =0; $rtscs    =0;
        $tspeng  =0; $tspeng1  =0; $tspeng2  =0; $rtspeng  =0;
        $tsfat   =0; $tsfat1   =0; $tsfat2   =0; $rtsfat   =0;
        $tshse   =0; $tshse1   =0; $tshse2   =0; $rtshse   =0;
        $tshrd   =0; $tshrd1   =0; $tshrd2   =0; $rtshrd   =0;
        $tsga    =0; $tsga1   =0; $tsga2    =0; $rtsga    =0;
        $tsmd    =0; $tsmd1    =0; $tsmd2    =0; $rtsmd    =0;
        $tsmr    =0; $tsmr1    =0; $tsmr2    =0; $rtsmr    =0;
        $tsengmech   =0; $tsengmech1   =0; $tsengmech2   =0; $rtsengmech   =0;
        $tsengelec   =0; $tsengelec1   =0; $tsengelec2   =0; $rtsengelec   =0;
        $tsenginst   =0; $tsenginst1   =0; $tsenginst2   =0; $rtsenginst   =0;
        $tsengciv    =0; $tsengciv1    =0; $tsengciv2    =0; $rtsengciv    =0;
        $tssd    =0; $tssd1    =0; $tssd2    =0; $rtssd    =0;
        $tsia    =0; $tsia1    =0; $tsia2    =0; $rtsia    =0;
        $tstop   =0; $tstop1   =0; $tstop2   =0; $rtstop   =0;

        $query = $dbb->query("select * from stdknowhow where kojab=?",array($jabatan));
        foreach ($query->result() as $row)
        { 
            $fe  =$row->fe;
            $ie  =$row->ie;
            $ex  =$row->ex;
            $bs  =$row->bs;
            $tsmkt   =$row->tsmkt;
            $tsest   =$row->tsest;
            $tsppc   =$row->tsppc;
            $tscon   =$row->tscon;
            $tsqac   =$row->tsqac;
            $tsman   =$row->tsman;
            $tssar   =$row->tssar;
            $tscs    =$row->tscs;
            $tspeng  =$row->tspeng;
            $tsfat   =$row->tsfat;
            $tshse   =$row->tshse;
            $tshrd   =$row->tshrd;
            $tsga    =$row->tsga;
            $tsmd    =$row->tsmd;
            $tsmr    =$row->tsmr;
            $tsengmech   =$row->tsengmech;
            $tsengelec   =$row->tsengelec;
            $tsenginst   =$row->tsenginst;
            $tsengciv    =$row->tsengciv;
            $tssd    =$row->tssd;
            $tsia    =$row->tsia;
            $tstop   =$row->tstop;
        }

        $query = $dbb->query("select * from knowhow where nik=? and periode=1",array($nama));
        foreach ($query->result() as $row)
        { 
            $fe1  =$row->fe;
            $ie1  =$row->ie;
            $ex1  =$row->ex;
            $bs1  =$row->bs;
            $tsmkt1   =$row->tsmkt;
            $tsest1   =$row->tsest;
            $tsppc1   =$row->tsppc;
            $tscon1   =$row->tscon;
            $tsqac1   =$row->tsqac;
            $tsman1   =$row->tsman;
            $tssar1   =$row->tssar;
            $tscs1    =$row->tscs;
            $tspeng1  =$row->tspeng;
            $tsfat1   =$row->tsfat;
            $tshse1   =$row->tshse;
            $tshrd1   =$row->tshrd;
            $tsga1    =$row->tsga;
            $tsmd1    =$row->tsmd;
            $tsmr1    =$row->tsmr;
            $tsengmech1   =$row->tsengmech;
            $tsengelec1   =$row->tsengelec;
            $tsenginst1   =$row->tsenginst;
            $tsengciv1    =$row->tsengciv;
            $tssd1    =$row->tssd;
            $tsia1    =$row->tsia;
            $tstop1   =$row->tstop;
        }

        $query = $dbb->query("select * from knowhow where nik=? and periode=2",array($nama));
        foreach ($query->result() as $row)
        { 
            $fe2  =$row->fe;
            $ie2  =$row->ie;
            $ex2  =$row->ex;
            $bs2  =$row->bs;
            $tsmkt2   =$row->tsmkt;
            $tsest2   =$row->tsest;
            $tsppc2   =$row->tsppc;
            $tscon2   =$row->tscon;
            $tsqac2   =$row->tsqac;
            $tsman2   =$row->tsman;
            $tssar2   =$row->tssar;
            $tscs2    =$row->tscs;
            $tspeng2  =$row->tspeng;
            $tsfat2   =$row->tsfat;
            $tshse2   =$row->tshse;
            $tshrd2   =$row->tshrd;
            $tsga2    =$row->tsga;
            $tsmd2    =$row->tsmd;
            $tsmr2    =$row->tsmr;
            $tsengmech2   =$row->tsengmech;
            $tsengelec2   =$row->tsengelec;
            $tsenginst2   =$row->tsenginst;
            $tsengciv2    =$row->tsengciv;
            $tssd2    =$row->tssd;
            $tsia2    =$row->tsia;
            $tstop2   =$row->tstop; 
        }

        $rfe  =(  $fe1  +   $fe2  )/2;
        $rie  =(  $ie1  +   $ie2  )/2;
        $rex  =(  $ex1  +   $ex2  )/2;
        $rbs  =(  $bs1  +   $bs2  )/2;
        $rtsmkt   =(  $tsmkt1   +   $tsmkt2   )/2;
        $rtsest   =(  $tsest1   +   $tsest2   )/2;
        $rtsppc   =(  $tsppc1   +   $tsppc2   )/2;
        $rtscon   =(  $tscon1   +   $tscon2   )/2;
        $rtsqac   =(  $tsqac1   +   $tsqac2   )/2;
        $rtsman   =(  $tsman1   +   $tsman2   )/2;
        $rtssar   =(  $tssar1   +   $tssar2   )/2;
        $rtscs    =(  $tscs1   +   $tscs2    )/2;
        $rtspeng  =(  $tspeng1  +   $tspeng2  )/2;
        $rtsfat   =(  $tsfat1   +   $tsfat2   )/2;
        $rtshse   =(  $tshse1   +   $tshse2   )/2;
        $rtshrd   =(  $tshrd1   +   $tshrd2   )/2;
        $rtsga    =(  $tsga1    +   $tsga2    )/2;
        $rtsmd    =(  $tsmd1    +   $tsmd2    )/2;
        $rtsmr    =(  $tsmr1    +   $tsmr2    )/2;
        $rtsengmech   =(  $tsengmech1   +   $tsengmech2   )/2;
        $rtsengelec   =(  $tsengelec1   +   $tsengelec2   )/2;
        $rtsenginst   =(  $tsenginst1   +   $tsenginst2   )/2;
        $rtsengciv    =(  $tsengciv1    +   $tsengciv2    )/2;
        $rtssd    =(  $tssd1    +   $tssd2    )/2;
        $rtsia    =(  $tsia1    +   $tsia2    )/2;
        $rtstop   =(  $tstop1   +   $tstop2   )/2;

        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'FE',
            'ket3'   => 'Formal Education',
            'ket4'   => $fe,
            'ket5'   => $fe1,
            'ket6'   => $fe2,
            'ket7'   => $rfe,            
            'jum1'   => 1,            
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);          
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'IE',
            'ket3'   => 'Informal Education',
            'ket4'   => $ie,
            'ket5'   => $ie1,
            'ket6'   => $ie2,
            'ket7'   => $rie,            
            'jum1'   => 2,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'EX',
            'ket3'   => 'Experience',
            'ket4'   => $ex,
            'ket5'   => $ex1,
            'ket6'   => $ex2,
            'ket7'   => $rex,            
            'jum1'   => 3,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'BS',
            'ket3'   => 'Business Skill',
            'ket4'   => $bs,
            'ket5'   => $bs1,
            'ket6'   => $bs2,
            'ket7'   => $rbs,            
            'jum1'   => 4,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-MKT',
            'ket3'   => 'Technical Skill Marketing',
            'ket4'   => $tsmkt,
            'ket5'   => $tsmkt1,
            'ket6'   => $tsmkt2,
            'ket7'   => $rtsmkt,            
            'jum1'   => 5,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-EST',
            'ket3'   => 'Technical Skill Estimation',
            'ket4'   => $tsest,
            'ket5'   => $tsest1,
            'ket6'   => $tsest2,
            'ket7'   => $rtsest,            
            'jum1'   => 6,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-PPC',
            'ket3'   => 'Technical Skill Planning & Control',
            'ket4'   => $tsppc,
            'ket5'   => $tsppc1,
            'ket6'   => $tsppc2,
            'ket7'   => $rtsppc,            
            'jum1'   => 7,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-CON',
            'ket3'   => 'Technical Skill Construction',
            'ket4'   => $tscon,
            'ket5'   => $tscon1,
            'ket6'   => $tscon2,
            'ket7'   => $rtscon,            
            'jum1'   => 8,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-QAC',
            'ket3'   => 'Technical Skill QA/QC',
            'ket4'   => $tsqac,
            'ket5'   => $tsqac1,
            'ket6'   => $tsqac2,
            'ket7'   => $rtsqac,            
            'jum1'   => 9,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-MAN',
            'ket3'   => 'Technical Skill Maintenance Elektrikal,Instrument,IT,Mekanikal,Utility',
            'ket4'   => $tsman,
            'ket5'   => $tsman1,
            'ket6'   => $tsman2,
            'ket7'   => $rtsman,            
            'jum1'   => 10,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-SAR',
            'ket3'   => 'Technical Skill Sarana Angkutan',
            'ket4'   => $tssar,
            'ket5'   => $tssar1,
            'ket6'   => $tssar2,
            'ket7'   => $rtssar,            
            'jum1'   => 11,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-CS',
            'ket3'   => 'Technical Skill Coorporate Secretary',
            'ket4'   => $tscs,
            'ket5'   => $tssar1,
            'ket6'   => $tssar2,
            'ket7'   => $rtssar,            
            'jum1'   => 12,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-PENG',
            'ket3'   => 'Technical Skill Pengadaan',
            'ket4'   => $tspeng,
            'ket5'   => $tspeng1,
            'ket6'   => $tspeng2,
            'ket7'   => $rtspeng,            
            'jum1'   => 13,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                          
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-FAT',
            'ket3'   => 'Technical Skill Finance,Accounting and Tax',
            'ket4'   => $tsfat,
            'ket5'   => $tsfat1,
            'ket6'   => $tsfat2,
            'ket7'   => $rtsfat,            
            'jum1'   => 14,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-HSE',
            'ket3'   => 'Technical Skill HEALTH SAFETY & ENVIRONMENT/OHSAS/K3',
            'ket4'   => $tshse,
            'ket5'   => $tshse1,
            'ket6'   => $tshse2,
            'ket7'   => $rtshse,            
            'jum1'   => 15,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-HRD',
            'ket3'   => 'Technical Skill HRD',
            'ket4'   => $tshrd,
            'ket5'   => $tshrd1,
            'ket6'   => $tshrd2,
            'ket7'   => $rtshrd,            
            'jum1'   => 16,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-GA',
            'ket3'   => 'Technical Skill GENERAL AFFAIRS',
            'ket4'   => $tsga,
            'ket5'   => $tsga1,
            'ket6'   => $tsga2,
            'ket7'   => $rtsga,            
            'jum1'   => 17,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-MD',
            'ket3'   => 'Technical Skill Manajement Development',
            'ket4'   => $tsmd,
            'ket5'   => $tsmd1,
            'ket6'   => $tsmd2,
            'ket7'   => $rtsmd,            
            'jum1'   => 18,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-MR',
            'ket3'   => 'Technical Skill Manajemen Representative',
            'ket4'   => $tsmr,
            'ket5'   => $tsmr1,
            'ket6'   => $tsmr2,
            'ket7'   => $rtsmr,            
            'jum1'   => 19,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                          
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-ENG-MECH',
            'ket3'   => 'Technical Skill Engineering Mechanical',
            'ket4'   => $tsengmech,
            'ket5'   => $tsengmech1,
            'ket6'   => $tsengmech2,
            'ket7'   => $rtsengmech,            
            'jum1'   => 20,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                          
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-ENG-ELEC',
            'ket3'   => 'Technical Skill Engineering Electrical',
            'ket4'   => $tsengelec,
            'ket5'   => $tsengelec1,
            'ket6'   => $tsengelec2,
            'ket7'   => $rtsengelec,            
            'jum1'   => 21,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                          
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-ENG-INST',
            'ket3'   => 'Technical Skill Engineering Instrumentation',
            'ket4'   => $tsenginst,
            'ket5'   => $tsenginst1,
            'ket6'   => $tsenginst2,
            'ket7'   => $rtsenginst,            
            'jum1'   => 22,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                          
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-ENG-CIV',
            'ket3'   => 'Technical Skill Engineering Civil Structure',
            'ket4'   => $tsengciv,
            'ket5'   => $tsengciv1,
            'ket6'   => $tsengciv2,
            'ket7'   => $rtsengciv,            
            'jum1'   => 23,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-SD',
            'ket3'   => 'Technical Skill System Development',
            'ket4'   => $tssd,
            'ket5'   => $tssd1,
            'ket6'   => $tssd2,
            'ket7'   => $rtssd,            
            'jum1'   => 24,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-IA',
            'ket3'   => 'Technical Skill Internal Audit',
            'ket4'   => $tsia,
            'ket5'   => $tsia1,
            'ket6'   => $tsia2,
            'ket7'   => $rtsia,            
            'jum1'   => 25,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                                  
        $data = array(
            'ket1'   => 'C',
            'ket2'   => 'TS-TOP',
            'ket3'   => 'Technical Skill Top Management',
            'ket4'   => $tstop,
            'ket5'   => $tstop1,
            'ket6'   => $tstop2,
            'ket7'   => $rtstop,            
            'jum1'   => 26,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                                  

        $cek=0;
        $query = $dbb->query("select * from tampung3 where urut=? and ket1='C' order by jum1",array(getSession('urut')));
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

    function carimanagerial($nama){
        $dbb = $this->load->database('fb1',true);

        $query = $dbb->query("select * from pegawai where nik=?",array($nama));
        foreach ($query->result() as $row)
        { 
            $jabatan=$row->jabatan;
        }                

        $dev=0; $dev1=0; $dev2=0; $rdev=0;
        $dir=0; $dir1=0; $dir2=0; $rdir=0;
        $tw=0; $tw1=0; $tw2=0; $rtw=0;
        $tl=0; $tl1=0; $tl2=0; $rtl=0;
        $ps=0; $ps1=0; $ps2=0; $rps=0;            
        $po=0; $po1=0; $po2=0; $rpo=0;                        
        $so=0; $so1=0; $so2=0; $rso=0;
        $at=0; $at1=0; $at2=0; $rat=0;            
        $ct=0; $ct1=0; $ct2=0; $rct=0;            
        $int=0; $int1=0; $int2=0; $rint=0;            
        $iu=0; $iu1=0; $iu2=0; $riu=0;            
        $rb=0; $rb1=0; $rb2=0; $rrb=0;            
        $imp=0; $imp1=0; $imp2=0; $rimp=0;            
        $ing=0; $ing1=0; $ing2=0; $ring=0;            
        $trp=0; $trp1=0; $trp2=0; $rtrp=0;            
        $tew=0; $tew1=0; $tew2=0; $rtew=0;                         
        $crt=0; $crt1=0; $crt2=0; $rcrt=0;                        
        $wis=0; $wis1=0; $wis2=0; $rwis=0;                        
        $exc=0; $exc1=0; $exc2=0; $rexc=0;                        
        $ach=0; $ach1=0; $ach2=0; $rach=0;
        $co=0; $co1=0; $co2=0; $rco=0;            
        $is=0; $is1=0; $is2=0; $ris=0;                        
        $cso=0; $cso1=0; $cso2=0; $rcso=0;                                         

        $query = $dbb->query("select * from stdmanagerial where kojab=?",array($jabatan));
        foreach ($query->result() as $row)
        { 
            $dev=$row->dev;
            $dir=$row->dir;
            $tw=$row->tw;
            $tl=$row->tl;            
            $ps=$row->ps;            
            $po=$row->po;                        
            $so=$row->so;
            $at=$row->at;            
            $ct=$row->ct;            
            $int=$row->int;            
            $iu=$row->iu;            
            $rb=$row->rb;            
            $imp=$row->imp;            
            $ing=$row->ing;            
            $trp=$row->trp;            
            $tew=$row->tew;                        
            $crt=$row->crt;                        
            $wis=$row->wis;                        
            $exc=$row->exc;                        
            $ach=$row->ach;
            $co=$row->co;            
            $is=$row->is;                        
            $cso=$row->cso;                                         
        }

        $query = $dbb->query("select * from managerialskill where nik=? and periode=1",array($nama));
        foreach ($query->result() as $row)
        { 
            $dev1=$row->dev;
            $dir1=$row->dir;
            $tw1=$row->tw;
            $tl1=$row->tl;            
            $ps1=$row->ps;            
            $po1=$row->po;                        
            $so1=$row->so;
            $at1=$row->at;            
            $ct1=$row->ct;            
            $int1=$row->intx;            
            $iu1=$row->iu;            
            $rb1=$row->rb;            
            $imp1=$row->imp;            
            $ing1=$row->ing;            
            $trp1=$row->trp;            
            $tew1=$row->tew;                        
            $crt1=$row->crt;                        
            $wis1=$row->wis;                        
            $exc1=$row->exc;                        
            $ach1=$row->ach;
            $co1=$row->co;            
            $is1=$row->isx;                        
            $cso1=$row->cso;                                         
        }

        $query = $dbb->query("select * from managerialskill where nik=? and periode=2",array($nama));
        foreach ($query->result() as $row)
        { 
            $dev2=$row->dev;
            $dir2=$row->dir;
            $tw2=$row->tw;
            $tl2=$row->tl;            
            $ps2=$row->ps;            
            $po2=$row->po;                        
            $so2=$row->so;
            $at2=$row->at;            
            $ct2=$row->ct;            
            $int2=$row->intx;            
            $iu2=$row->iu;            
            $rb2=$row->rb;            
            $imp2=$row->imp;            
            $ing2=$row->ing;            
            $trp2=$row->trp;            
            $tew2=$row->tew;                        
            $crt2=$row->crt;                        
            $wis2=$row->wis;                        
            $exc2=$row->exc;                        
            $ach2=$row->ach;
            $co2=$row->co;            
            $is2=$row->isx;                        
            $cso2=$row->cso;                                         
        }

        $rdev=($dev1+$dev2)/2;
        $rdir=($dir1+$dir2)/2;
        $rtw=($tw1+$tw2)/2;
        $rtl=($tl1+$tl2)/2;            
        $rps=($ps1+$ps2)/2;            
        $rpo=($po1+$po2)/2;                        
        $rso=($so1+$so2)/2;
        $rat=($at1+$at2)/2;            
        $rct=($ct1+$ct2)/2;            
        $rint=($int1+$int2)/2;            
        $riu=($iu1+$iu2)/2;            
        $rrb=($rb1+$rb2)/2;            
        $rimp=($imp1+$imp2)/2;            
        $ring=($ing1+$ing2)/2;            
        $rtrp=($trp1+$trp2)/2;            
        $rtew=($tew1+$tew2)/2;                        
        $rcrt=($crt1+$crt2)/2;                        
        $rwis=($wis1+$wis2)/2;                        
        $rexc=($exc1+$exc2)/2;                        
        $rach=($ach1+$ach2)/2;
        $rco=($co1+$co2)/2;            
        $ris=($is1+$is2)/2;                        
        $rcso=($cso1+$cso2)/2;                                                 

        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'DEV',
            'ket3'   => 'Developing Others',
            'ket4'   => $dev,            
            'ket5'   => $dev1,
            'ket6'   => $dev2,
            'ket7'   => $rdev,
            'jum1'   => 27,
            'urut'   => getSession('urut')
        );                           
        $dbb->insert('tampung3', $data);          
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'DIR',
            'ket3'   => 'Directiveness, Assertiveness and Use of Position Power',
            'ket4'   => $dir,            
            'ket5'   => $dir1,
            'ket6'   => $dir2,
            'ket7'   => $rdir,
            'jum1'   => 28,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'TW',
            'ket3'   => 'Teamwork & Cooperation',
            'ket4'   => $tw,            
            'ket5'   => $tw1,
            'ket6'   => $tw2,
            'ket7'   => $rtw,
            'jum1'   => 29,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'TL',
            'ket3'   => 'Teamleadership',
            'ket4'   => $tl,            
            'ket5'   => $tl1,
            'ket6'   => $tl2,
            'ket7'   => $rtl,
            'jum1'   => 30,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'PS',
            'ket3'   => 'Problem Solving/Decision Making',
            'ket4'   => $ps,            
            'ket5'   => $ps1,
            'ket6'   => $ps2,
            'ket7'   => $rps,
            'jum1'   => 31,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'PO',
            'ket3'   => 'Planning and Organizing',
            'ket4'   => $po,            
            'ket5'   => $po1,
            'ket6'   => $po2,
            'ket7'   => $rpo,
            'jum1'   => 32,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'SO',
            'ket3'   => 'Strategic Orientation',
            'ket4'   => $so,            
            'ket5'   => $so1,
            'ket6'   => $so2,
            'ket7'   => $rso,
            'jum1'   => 33,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'AT',
            'ket3'   => 'Analytical Thinking',
            'ket4'   => $at,            
            'ket5'   => $at1,
            'ket6'   => $at2,
            'ket7'   => $rat,
            'jum1'   => 34,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'CT',
            'ket3'   => 'Conceptual Thinking',
            'ket4'   => $ct,            
            'ket5'   => $ct1,
            'ket6'   => $ct2,
            'ket7'   => $rct,
            'jum1'   => 35,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'INT',
            'ket3'   => 'Initiative',
            'ket4'   => $int,            
            'ket5'   => $int1,
            'ket6'   => $int2,
            'ket7'   => $rint,
            'jum1'   => 36,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'IU',
            'ket3'   => 'Interpersonal Understanding',
            'ket4'   => $iu,            
            'ket5'   => $iu1,
            'ket6'   => $iu2,
            'ket7'   => $riu,
            'jum1'   => 37,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'RB',
            'ket3'   => 'Relation Building',
            'ket4'   => $rb,            
            'ket5'   => $rb1,
            'ket6'   => $rb2,
            'ket7'   => $rrb,
            'jum1'   => 38,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'IMP',
            'ket3'   => 'Impact & Influence',
            'ket4'   => $imp,            
            'ket5'   => $imp1,
            'ket6'   => $imp2,
            'ket7'   => $rimp,
            'jum1'   => 39,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                          
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'ING',
            'ket3'   => 'Integrity',
            'ket4'   => $ing,            
            'ket5'   => $ing1,
            'ket6'   => $ing2,
            'ket7'   => $ring,
            'jum1'   => 40,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'TRP',
            'ket3'   => 'Transparancy',
            'ket4'   => $trp,            
            'ket5'   => $trp1,
            'ket6'   => $trp2,
            'ket7'   => $rtrp,
            'jum1'   => 41,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'TEW',
            'ket3'   => 'Teamwork',
            'ket4'   => $tew,            
            'ket5'   => $tew1,
            'ket6'   => $tew2,
            'ket7'   => $rtew,
            'jum1'   => 42,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'CRT',
            'ket3'   => 'Creativity',
            'ket4'   => $crt,            
            'ket5'   => $crt1,
            'ket6'   => $crt2,
            'ket7'   => $rcrt,
            'jum1'   => 43,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'WIS',
            'ket3'   => 'Wining Spirit',
            'ket4'   => $wis,            
            'ket5'   => $wis1,
            'ket6'   => $wis2,
            'ket7'   => $rwis,
            'jum1'   => 44,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                  
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'EXC',
            'ket3'   => 'Excellence',
            'ket4'   => $exc,            
            'ket5'   => $exc1,
            'ket6'   => $exc2,
            'ket7'   => $rexc,
            'jum1'   => 45,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                          
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'ACH',
            'ket3'   => 'Achievement Orientation',
            'ket4'   => $ach,            
            'ket5'   => $ach1,
            'ket6'   => $ach2,
            'ket7'   => $rach,
            'jum1'   => 46,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                          
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'CO',
            'ket3'   => 'Concern for Order, Quality and Accuracy',
            'ket4'   => $co,            
            'ket5'   => $co1,
            'ket6'   => $co2,
            'ket7'   => $rco,
            'jum1'   => 47,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                          
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'IS',
            'ket3'   => 'Information Seeking',
            'ket4'   => $is,            
            'ket5'   => $is1,
            'ket6'   => $is2,
            'ket7'   => $ris,
            'jum1'   => 48,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                          
        $data = array(
            'ket1'   => 'D',
            'ket2'   => 'CSO',
            'ket3'   => 'Customer Service Orientation',
            'ket4'   => $cso,            
            'ket5'   => $cso1,
            'ket6'   => $cso2,
            'ket7'   => $rcso,
            'jum1'   => 49,
            'urut'   => getSession('urut')
        );   
        $dbb->insert('tampung3', $data);                                          

        $cek=0;
        $query = $dbb->query("select * from tampung3 where urut=? and ket1='D' order by jum1",array(getSession('urut')));
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

    function cariprofiltahunan($nama){
        $dbb = $this->load->database('fb1',true);

        $query = $dbb->query("select * from pegawai where nik=?",array($nama));
        foreach ($query->result() as $row)
        { 
            $jabatan=$row->jabatan;
        }                

        // $dev=0; $dev1=0; $dev2=0; $rdev=0;
        // $dir=0; $dir1=0; $dir2=0; $rdir=0;
        // $tw=0; $tw1=0; $tw2=0; $rtw=0;
        // $tl=0; $tl1=0; $tl2=0; $rtl=0;
        // $ps=0; $ps1=0; $ps2=0; $rps=0;            
        // $po=0; $po1=0; $po2=0; $rpo=0;                        
        // $so=0; $so1=0; $so2=0; $rso=0;
        // $at=0; $at1=0; $at2=0; $rat=0;            
        // $ct=0; $ct1=0; $ct2=0; $rct=0;            
        // $int=0; $int1=0; $int2=0; $rint=0;            
        // $iu=0; $iu1=0; $iu2=0; $riu=0;            
        // $rb=0; $rb1=0; $rb2=0; $rrb=0;            
        // $imp=0; $imp1=0; $imp2=0; $rimp=0;            
        // $ing=0; $ing1=0; $ing2=0; $ring=0;            
        // $trp=0; $trp1=0; $trp2=0; $rtrp=0;            
        // $tew=0; $tew1=0; $tew2=0; $rtew=0;                         
        // $crt=0; $crt1=0; $crt2=0; $rcrt=0;                        
        // $wis=0; $wis1=0; $wis2=0; $rwis=0;                        
        // $exc=0; $exc1=0; $exc2=0; $rexc=0;                        
        // $ach=0; $ach1=0; $ach2=0; $rach=0;
        // $co=0; $co1=0; $co2=0; $rco=0;            
        // $is=0; $is1=0; $is2=0; $ris=0;                        
        // $cso=0; $cso1=0; $cso2=0; $rcso=0;                                         

        $query = $dbb->query("select * from stdknowhow where kojab=?",array($jabatan));
        foreach ($query->result() as $row)
        { 
            $query = $dbb->query("select * from stdmanagerial where kojab=?",array($jabatan));
            foreach ($query->result() as $row1)
            {             
                $data = array(
                    'ket1' =>'F',
                    'ket2' =>'Standar Kompetensi',
                    'ket3' =>$row->fe,
                    'ket4' =>$row->ie,
                    'ket5' =>$row->ex,
                    'ket6' =>$row->bs,
                    'ket7' =>$row->tsmkt,
                    'ket8' =>$row->tsest,
                    'ket9' =>$row->tsppc,
                    'ket10' =>$row->tscon,
                    'ket11' =>$row->tsqac,
                    'ket12' =>$row->tsman,
                    'ket13' =>$row->tssar,
                    'ket14' =>$row->tscs,
                    'ket15' =>$row->tspeng,
                    'ket16' =>$row->tsfat,
                    'ket17' =>$row->tshse,
                    'ket18' =>$row->tshrd,
                    'ket19' =>$row->tsga,
                    'ket20' =>$row->tsmd,
                    'ket21' =>$row->tsmr,
                    'ket22' =>$row->tsengmech,
                    'ket23' =>$row->tsengelec,
                    'ket24' =>$row->tsenginst,
                    'ket25' =>$row->tsengciv,
                    'ket26' =>$row->tssd,
                    'ket27' =>$row->tsia,
                    'ket28' =>$row->tstop,
                    
                    'ket29' =>$row1->dev,
                    'ket30' =>$row1->dir,
                    'ket31' =>$row1->tw,
                    'ket32' =>$row1->tl,            
                    'ket33' =>$row1->ps,            
                    'ket34' =>$row1->po,                        
                    'ket35' =>$row1->so,
                    'ket36' =>$row1->at,            
                    'ket37'=>$row1->ct,            
                    'ket38'=>$row1->int,            
                    'ket39'=>$row1->iu,           
                    'ket40'=>$row1->rb,            
                    'ket41'=>$row1->imp,            
                    'ket42'=>$row1->ing,            
                    'ket43'=>$row1->trp,            
                    'ket44'=>$row1->tew,                        
                    'ket45'=>$row1->crt,                        
                    'ket46'=>$row1->wis,                        
                    'ket47'=>$row1->exc,                        
                    'ket48'=>$row1->ach,
                    'ket49'=>$row1->co,           
                    'ket50'=>$row1->is,                        
                    'ket51'=>$row1->cso,                                         
                    'urut' => getSession('urut')
                );   
                $dbb->insert('tampung3', $data);                                              
            }
        }

        $query = $dbb->query("select nik,tahun,sum(fe),sum(ie),sum(ex),sum(bs),sum(tsmkt),sum(tsest),sum(tsppc),sum(tscon),sum(tsqac),sum(tsman),sum(tssar),sum(tscs),sum(tspeng),sum(tsfat),sum(tshse),sum(tshrd),sum(tsga),sum(tsmd),sum(tsmr),sum(tsengmech),sum(tsengelec),sum(tsenginst),sum(tsengciv),sum(tssd),sum(tsia),sum(tstop) from knowhow where nik=? group by tahun",array($nama));
        foreach ($query->result() as $row)
        { 
            $query = $dbb->query("select nik,tahun,sum(dev),sum(dir),sum(tw),sum(tl),sum(ps),sum(po),sum(so),sum(at),sum(ct),sum(managerialskill.int),sum(iu),sum(rb),sum(imp),sum(ing),sum(trp),sum(tew),sum(crt),sum(wis),sum(exc),sum(ach),sum(co),sum(managerialskill.is),sum(cso) from managerialskill where nik=? group by tahun",array($nama));
            foreach ($query->result() as $row1)
            {             
                $data = array(
                    'ket1' =>'F',
                    'ket2' =>$row->tahun,
                    'ket3' =>$row->fe,
                    'ket4' =>$row->ie,
                    'ket5' =>$row->ex,
                    'ket6' =>$row->bs,
                    'ket7' =>$row->tsmkt,
                    'ket8' =>$row->tsest,
                    'ket9' =>$row->tsppc,
                    'ket10' =>$row->tscon,
                    'ket11' =>$row->tsqac,
                    'ket12' =>$row->tsman,
                    'ket13' =>$row->tssar,
                    'ket14' =>$row->tscs,
                    'ket15' =>$row->tspeng,
                    'ket16' =>$row->tsfat,
                    'ket17' =>$row->tshse,
                    'ket18' =>$row->tshrd,
                    'ket19' =>$row->tsga,
                    'ket20' =>$row->tsmd,
                    'ket21' =>$row->tsmr,
                    'ket22' =>$row->tsengmech,
                    'ket23' =>$row->tsengelec,
                    'ket24' =>$row->tsenginst,
                    'ket25' =>$row->tsengciv,
                    'ket26' =>$row->tssd,
                    'ket27' =>$row->tsia,
                    'ket28' =>$row->tstop,
                    
                    'ket29' =>$row1->dev,
                    'ket30' =>$row1->dir,
                    'ket31' =>$row1->tw,
                    'ket32' =>$row1->tl,            
                    'ket33' =>$row1->ps,            
                    'ket34' =>$row1->po,                        
                    'ket35' =>$row1->so,
                    'ket36' =>$row1->at,            
                    'ket37'=>$row1->ct,            
                    'ket38'=>$row1->int,            
                    'ket39'=>$row1->iu,           
                    'ket40'=>$row1->rb,            
                    'ket41'=>$row1->imp,            
                    'ket42'=>$row1->ing,            
                    'ket43'=>$row1->trp,            
                    'ket44'=>$row1->tew,                        
                    'ket45'=>$row1->crt,                        
                    'ket46'=>$row1->wis,                        
                    'ket47'=>$row1->exc,                        
                    'ket48'=>$row1->ach,
                    'ket49'=>$row1->co,           
                    'ket50'=>$row1->is,                        
                    'ket51'=>$row1->cso,                                         
                    'urut' => getSession('urut')
                );   
                $dbb->insert('tampung3', $data);                                              
            }
        }        

        // $query = $dbb->query("select nik,tahun,sum(fe),sum(ie),sum(ex),sum(bs),sum(tsmkt),sum(tsest),sum(tsppc),sum(tscon),sum(tsqac),sum(tsman),sum(tssar),sum(tscs),sum(tspeng),sum(tsfat),sum(tshse),sum(tshrd),sum(tsga),sum(tsmd),sum(tsmr),sum(tsengmech),sum(tsengelec),sum(tsenginst),sum(tsengciv),sum(tssd),sum(tsia),sum(tstop) from knowhow where nik='99.07.26' group by tahun",array($nama));
        // foreach ($query->result() as $row)
        // { 
        //     $dev1=$row->dev;
        //     $dir1=$row->dir;
        //     $tw1=$row->tw;
        //     $tl1=$row->tl;            
        //     $ps1=$row->ps;            
        //     $po1=$row->po;                        
        //     $so1=$row->so;
        //     $at1=$row->at;            
        //     $ct1=$row->ct;            
        //     $int1=$row->int;            
        //     $iu1=$row->iu;            
        //     $rb1=$row->rb;            
        //     $imp1=$row->imp;            
        //     $ing1=$row->ing;            
        //     $trp1=$row->trp;            
        //     $tew1=$row->tew;                        
        //     $crt1=$row->crt;                        
        //     $wis1=$row->wis;                        
        //     $exc1=$row->exc;                        
        //     $ach1=$row->ach;
        //     $co1=$row->co;            
        //     $is1=$row->is;                        
        //     $cso1=$row->cso;                                         
        // }

        // $query = $dbb->query("select * from managerialskill where nik=? and periode=2",array($nama));
        // foreach ($query->result() as $row)
        // { 
        //     $dev2=$row->dev;
        //     $dir2=$row->dir;
        //     $tw2=$row->tw;
        //     $tl2=$row->tl;            
        //     $ps2=$row->ps;            
        //     $po2=$row->po;                        
        //     $so2=$row->so;
        //     $at2=$row->at;            
        //     $ct2=$row->ct;            
        //     $int2=$row->int;            
        //     $iu2=$row->iu;            
        //     $rb2=$row->rb;            
        //     $imp2=$row->imp;            
        //     $ing2=$row->ing;            
        //     $trp2=$row->trp;            
        //     $tew2=$row->tew;                        
        //     $crt2=$row->crt;                        
        //     $wis2=$row->wis;                        
        //     $exc2=$row->exc;                        
        //     $ach2=$row->ach;
        //     $co2=$row->co;            
        //     $is2=$row->is;                        
        //     $cso2=$row->cso;                                         
        // }

        // $rdev=($dev1+$dev2)/2;
        // $rdir=($dir1+$dir2)/2;
        // $rtw=($tw1+$tw2)/2;
        // $rtl=($tl1+$tl2)/2;            
        // $rps=($ps1+$ps2)/2;            
        // $rpo=($po1+$po2)/2;                        
        // $rso=($so1+$so2)/2;
        // $rat=($at1+$at2)/2;            
        // $rct=($ct1+$ct2)/2;            
        // $rint=($int1+$int2)/2;            
        // $riu=($iu1+$iu2)/2;            
        // $rrb=($rb1+$rb2)/2;            
        // $rimp=($imp1+$imp2)/2;            
        // $ring=($ing1+$ing2)/2;            
        // $rtrp=($trp1+$trp2)/2;            
        // $rtew=($tew1+$tew2)/2;                        
        // $rcrt=($crt1+$crt2)/2;                        
        // $rwis=($wis1+$wis2)/2;                        
        // $rexc=($exc1+$exc2)/2;                        
        // $rach=($ach1+$ach2)/2;
        // $rco=($co1+$co2)/2;            
        // $ris=($is1+$is2)/2;                        
        // $rcso=($cso1+$cso2)/2;                                                 

        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'DEV',
        //     'ket3'   => 'Developing Others',
        //     'ket4'   => $dev,            
        //     'ket5'   => $dev1,
        //     'ket6'   => $dev2,
        //     'ket7'   => $rdev,
        //     'jum1'   => 27,
        //     'urut'   => getSession('urut')
        // );                           
        // $dbb->insert('tampung3', $data);          
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'DIR',
        //     'ket3'   => 'Directiveness, Assertiveness and Use of Position Power',
        //     'ket4'   => $dir,            
        //     'ket5'   => $dir1,
        //     'ket6'   => $dir2,
        //     'ket7'   => $rdir,
        //     'jum1'   => 28,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'TW',
        //     'ket3'   => 'Teamwork & Cooperation',
        //     'ket4'   => $tw,            
        //     'ket5'   => $tw1,
        //     'ket6'   => $tw2,
        //     'ket7'   => $rtw,
        //     'jum1'   => 29,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'TL',
        //     'ket3'   => 'Teamleadership',
        //     'ket4'   => $tl,            
        //     'ket5'   => $tl1,
        //     'ket6'   => $tl2,
        //     'ket7'   => $rtl,
        //     'jum1'   => 30,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'PS',
        //     'ket3'   => 'Problem Solving/Decision Making',
        //     'ket4'   => $ps,            
        //     'ket5'   => $ps1,
        //     'ket6'   => $ps2,
        //     'ket7'   => $rps,
        //     'jum1'   => 31,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'PO',
        //     'ket3'   => 'Planning and Organizing',
        //     'ket4'   => $po,            
        //     'ket5'   => $po1,
        //     'ket6'   => $po2,
        //     'ket7'   => $rpo,
        //     'jum1'   => 32,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'SO',
        //     'ket3'   => 'Strategic Orientation',
        //     'ket4'   => $so,            
        //     'ket5'   => $so1,
        //     'ket6'   => $so2,
        //     'ket7'   => $rso,
        //     'jum1'   => 33,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'AT',
        //     'ket3'   => 'Analytical Thinking',
        //     'ket4'   => $at,            
        //     'ket5'   => $at1,
        //     'ket6'   => $at2,
        //     'ket7'   => $rat,
        //     'jum1'   => 34,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'CT',
        //     'ket3'   => 'Conceptual Thinking',
        //     'ket4'   => $ct,            
        //     'ket5'   => $ct1,
        //     'ket6'   => $ct2,
        //     'ket7'   => $rct,
        //     'jum1'   => 35,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'INT',
        //     'ket3'   => 'Initiative',
        //     'ket4'   => $int,            
        //     'ket5'   => $int1,
        //     'ket6'   => $int2,
        //     'ket7'   => $rint,
        //     'jum1'   => 36,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'IU',
        //     'ket3'   => 'Interpersonal Understanding',
        //     'ket4'   => $iu,            
        //     'ket5'   => $iu1,
        //     'ket6'   => $iu2,
        //     'ket7'   => $riu,
        //     'jum1'   => 37,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'RB',
        //     'ket3'   => 'Relation Building',
        //     'ket4'   => $rb,            
        //     'ket5'   => $rb1,
        //     'ket6'   => $rb2,
        //     'ket7'   => $rrb,
        //     'jum1'   => 38,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'IMP',
        //     'ket3'   => 'Impact & Influence',
        //     'ket4'   => $imp,            
        //     'ket5'   => $imp1,
        //     'ket6'   => $imp2,
        //     'ket7'   => $rimp,
        //     'jum1'   => 39,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                          
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'ING',
        //     'ket3'   => 'Integrity',
        //     'ket4'   => $ing,            
        //     'ket5'   => $ing1,
        //     'ket6'   => $ing2,
        //     'ket7'   => $ring,
        //     'jum1'   => 40,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'TRP',
        //     'ket3'   => 'Transparancy',
        //     'ket4'   => $trp,            
        //     'ket5'   => $trp1,
        //     'ket6'   => $trp2,
        //     'ket7'   => $rtrp,
        //     'jum1'   => 41,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'TEW',
        //     'ket3'   => 'Teamwork',
        //     'ket4'   => $tew,            
        //     'ket5'   => $tew1,
        //     'ket6'   => $tew2,
        //     'ket7'   => $rtew,
        //     'jum1'   => 42,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'CRT',
        //     'ket3'   => 'Creativity',
        //     'ket4'   => $crt,            
        //     'ket5'   => $crt1,
        //     'ket6'   => $crt2,
        //     'ket7'   => $rcrt,
        //     'jum1'   => 43,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'WIS',
        //     'ket3'   => 'Wining Spirit',
        //     'ket4'   => $wis,            
        //     'ket5'   => $wis1,
        //     'ket6'   => $wis2,
        //     'ket7'   => $rwis,
        //     'jum1'   => 44,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                  
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'EXC',
        //     'ket3'   => 'Excellence',
        //     'ket4'   => $exc,            
        //     'ket5'   => $exc1,
        //     'ket6'   => $exc2,
        //     'ket7'   => $rexc,
        //     'jum1'   => 45,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                          
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'ACH',
        //     'ket3'   => 'Achievement Orientation',
        //     'ket4'   => $ach,            
        //     'ket5'   => $ach1,
        //     'ket6'   => $ach2,
        //     'ket7'   => $rach,
        //     'jum1'   => 46,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                          
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'CO',
        //     'ket3'   => 'Concern for Order, Quality and Accuracy',
        //     'ket4'   => $co,            
        //     'ket5'   => $co1,
        //     'ket6'   => $co2,
        //     'ket7'   => $rco,
        //     'jum1'   => 47,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                          
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'IS',
        //     'ket3'   => 'Information Seeking',
        //     'ket4'   => $is,            
        //     'ket5'   => $is1,
        //     'ket6'   => $is2,
        //     'ket7'   => $ris,
        //     'jum1'   => 48,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                          
        // $data = array(
        //     'ket1'   => 'D',
        //     'ket2'   => 'CSO',
        //     'ket3'   => 'Customer Service Orientation',
        //     'ket4'   => $cso,            
        //     'ket5'   => $cso1,
        //     'ket6'   => $cso2,
        //     'ket7'   => $rcso,
        //     'jum1'   => 49,
        //     'urut'   => getSession('urut')
        // );   
        // $dbb->insert('tampung3', $data);                                          

        $cek=0;
        $query = $dbb->query("select * from tampung3 where urut=? and ket1='F'",array(getSession('urut')));
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


    // function carimanagerial($nama){
    //     $dbb = $this->load->database('fb1',true);

    //     $query = $dbb->query("select * from pegawai where nik=?",array($nama));
    //     foreach ($query->result() as $row)
    //     { 
    //         $jabatan=$row->jabatan;
    //     }        

    //     $query = $dbb->query("select * from stdmanagerial where kojab=?",array($jabatan));
    //     foreach ($query->result() as $row)
    //     { 
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'DEV',
    //                 'ket3'   => $row->dev,
    //                 'ket4'   => 'Developing Others',
    //                 'ket5'   => $row1->dev,
    //                 'jum1'   => 27,
    //                 'urut'   => getSession('urut')
    //             );                           
    //             $dbb->insert('tampung3', $data);          
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'DIR',
    //                 'ket3'   => $row->dir,
    //                 'ket4'   => 'Directiveness, Assertiveness and Use of Position Power',
    //                 'ket5'   => $row1->dir,
    //                 'jum1'   => 28,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'TW',
    //                 'ket3'   => $row->tw,
    //                 'ket4'   => 'Teamwork & Cooperation',
    //                 'ket5'   => $row1->tw,
    //                 'jum1'   => 29,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'TL',
    //                 'ket3'   => $row->tl,
    //                 'ket4'   => 'Teamleadership',
    //                 'ket5'   => $row1->tl,
    //                 'jum1'   => 30,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'PS',
    //                 'ket3'   => $row->ps,
    //                 'ket4'   => 'Problem Solving/Decision Making',
    //                 'ket5'   => $row1->ps,
    //                 'jum1'   => 31,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'PO',
    //                 'ket3'   => $row->po,
    //                 'ket4'   => 'Planning and Organizing',
    //                 'ket5'   => $row1->po,
    //                 'jum1'   => 32,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'SO',
    //                 'ket3'   => $row->so,
    //                 'ket4'   => 'Strategic Orientation',
    //                 'ket5'   => $row1->so,
    //                 'jum1'   => 33,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'AT',
    //                 'ket3'   => $row->at,
    //                 'ket4'   => 'Analytical Thinking',
    //                 'ket5'   => $row1->at,
    //                 'jum1'   => 34,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'CT',
    //                 'ket3'   => $row->ct,
    //                 'ket4'   => 'Conceptual Thinking',
    //                 'ket5'   => $row1->ct,
    //                 'jum1'   => 35,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'INT',
    //                 'ket3'   => $row->int,
    //                 'ket4'   => 'Initiative',
    //                 'ket5'   => $row1->int,
    //                 'jum1'   => 36,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'IU',
    //                 'ket3'   => $row->iu,
    //                 'ket4'   => 'Interpersonal Understanding',
    //                 'ket5'   => $row1->iu,
    //                 'jum1'   => 37,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'RB',
    //                 'ket3'   => $row->rb,
    //                 'ket4'   => 'Relation Building',
    //                 'ket5'   => $row1->rb,
    //                 'jum1'   => 38,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'RB',
    //                 'ket3'   => $row->imp,
    //                 'ket4'   => 'Impact & Influence',
    //                 'ket5'   => $row1->imp,
    //                 'jum1'   => 39,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                          
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'ING',
    //                 'ket3'   => $row->ing,
    //                 'ket4'   => 'Integrity',
    //                 'ket5'   => $row1->ing,
    //                 'jum1'   => 40,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'TRP',
    //                 'ket3'   => $row->trp,
    //                 'ket4'   => 'Transparancy',
    //                 'ket5'   => $row1->trp,
    //                 'jum1'   => 41,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'TEW',
    //                 'ket3'   => $row->tew,
    //                 'ket4'   => 'Teamwork',
    //                 'ket5'   => $row1->tew,
    //                 'jum1'   => 42,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'CRT',
    //                 'ket3'   => $row->crt,
    //                 'ket4'   => 'Creativity',
    //                 'ket5'   => $row1->crt,
    //                 'jum1'   => 43,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'WIS',
    //                 'ket3'   => $row->wis,
    //                 'ket4'   => 'Wining Spirit',
    //                 'ket5'   => $row1->wis,
    //                 'jum1'   => 44,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                  
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'EXC',
    //                 'ket3'   => $row->exc,
    //                 'ket4'   => 'Excellence',
    //                 'ket5'   => $row1->exc,
    //                 'jum1'   => 45,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                          
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'ACH',
    //                 'ket3'   => $row->ach,
    //                 'ket4'   => 'Achievement Orientation',
    //                 'ket5'   => $row1->ach,
    //                 'jum1'   => 46,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                          
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'CO',
    //                 'ket3'   => $row->co,
    //                 'ket4'   => 'Concern for Order, Quality and Accuracy',
    //                 'ket5'   => $row1->co,
    //                 'jum1'   => 47,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                          
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'IS',
    //                 'ket3'   => $row->is,
    //                 'ket4'   => 'Information Seeking',
    //                 'ket5'   => $row1->is,
    //                 'jum1'   => 48,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                          
    //             $data = array(
    //                 'ket1'   => 'D',
    //                 'ket2'   => 'CSO',
    //                 'ket3'   => $row->cso,
    //                 'ket4'   => 'Customer Service Orientation',
    //                 'ket5'   => $row1->cso,
    //                 'jum1'   => 49,
    //                 'urut'   => getSession('urut')
    //             );   
    //             $dbb->insert('tampung3', $data);                                  
    //         // }
    //     }

    //     $cek=0;
    //     $query = $dbb->query("select * from tampung3 where urut=? and ket1='D' order by jum1",array(getSession('urut')));
    //     foreach ($query->result() as $row)
    //     { 
    //         $data1[] = $row;
    //         $cek=1;
    //     }
        
    //     if ($cek==1) {
    //         return $data1;      
    //     }else{ 
    //         $data1=0;
    //         return $data1;      
    //     }
    // }



    // function carimanagerial($nama){
    //     $dbb = $this->load->database('fb1',true);

    //     $query = $dbb->query("select * from pegawai where nik=?",array($nama));
    //     foreach ($query->result() as $row)
    //     { 
    //         $jabatan=$row->jabatan;
    //     }        

    //     $query = $dbb->query("select * from stdmanagerial where kojab=?",array($jabatan));
    //     foreach ($query->result() as $key=>$row)
    //     {
    //         $data[] = $row;

    //         $query = $dbb->query("select * from managerialskill where nik=?",array($nama));
    //         foreach ($query->result() as $row1)                
    //         {            
    //             $data[$key]->{'dev1'} = $row1->dev;
    //             $data[$key]->{'dev1'} = $row1->dev;
    //         }

    //         // print_r($data);exit();
    //     }

    //     return $data;      

    //     // $cek=0;
    //     // $query = $dbb->query("select * from tampung3 where urut=? and ket1='D' order by jum1",array(getSession('urut')));
    //     // foreach ($query->result() as $row)
    //     // { 
    //     //     $data1[] = $row;
    //     //     $cek=1;
    //     // }
        
    //     // if ($cek==1) {
    //     //     return $data1;      
    //     // }else{ 
    //     //     $data1=0;
    //     //     return $data1;      
    //     // }
    // }



//   function getjabatanList($strData){
//     $data=null;
//     $str = '%'.$strData.'%';
//     $query  = $this->db->query("select * from jabatan where namajabatan like ?",$str);
//     foreach ($query->result() as $row)
//     { 
//       $data[] = $row;
//     }
//     return $data;    
//   } 

//   // function getbawahan(){
//   //   $data = null;
//   //   $query = $this->db->query("select c.nik,c.nama,c.jabatan from pegawai a,strukturjab b,pegawai c where a.jabatan=b.kojab1 and a.jabatan=? and b.kojab2=c.jabatan",getSession('kojab'));
//   //   foreach ($query->result() as $key => $row) {
//   //     $data[] = $row;
//   //   }
//   //   return $data;
//   // }

//   function caripegawai($nama){
//     $data=null;
// // print_r($nama);exit();
//     $query  = $this->db->query("select count(c.kra) as jum from pegawai a,jabatan b,kelompok c where a.jabatan=b.kojab and b.kelompok=c.kodekelom and a.nik=?",$nama);
//     foreach ($query->result() as $row)
//     {    
//         $jum=$row->jum;
//     }
//     if($jum>0){
//         $query  = $this->db->query("select c.kra kra,c.kba kba from pegawai a,jabatan b,kelompok c where a.jabatan=b.kojab and b.kelompok=c.kodekelom and a.nik=?",$nama);
//         foreach ($query->result() as $row)
//         {
//           $data[] = $row;
//         }    
//     }else{
//         $data=0;
//     }

//     return $data;    
//   } 

// function simpanpms(
//                       $nama,    
//                       $periode,   
//                       $tahun,   
//                       $maintening,  
//                       $bobsubmain,  
//                       $nilsubmain,  
//                       $totalnilkra, 
//                       $improvment,  
//                       $bobsubimprov,
//                       $nilsubimprov,
//                       $nilbobotkra,
//                       $bobotinti,
//                       $nilbobotinti,
//                       $totnilkba,
//                       $integritas,  
//                       $subint,
//                       $transparansi,  
//                       $subtrans,
//                       $kerjasama, 
//                       $subkerja,
//                       $kreativitas, 
//                       $subkreativ,
//                       $semangat,  
//                       $subsemangat,
//                       $sempurna,  
//                       $subsempurna,
//                       $disiplin,  
//                       $bobotdisiplin,
//                       $nilbobotdisiplin,
//                       $pdca,    
//                       $bobotpdca,
//                       $nilbobotpdca,
//                       $manage,    
//                       $bobotmanagement,
//                       $nilbobotmanagement,
//                       $nilbobotkba,
//                       $hasil,
//                       $totkrakba,
//                       $kra,
//                       $kba,
//                       $kekuatan,
//                       $kelemahan,
//                       $tindaklanjut,
//                       $jadwal){           
        
//     $value="NOK";
//     $dbb = $this->load->database('fb1',true);        

//     $query = $dbb->query("select count(kopeg) as jum from krakba where periode=? and tahun=? and kopeg=?",array($periode,$tahun,$nama));
//     foreach ($query->result() as $row)
//     { 
//        $jum=$row->jum;
//     }

//     if ($jum==0){       
//        // $query  = $dbb->query("select * from pegawai where nik=?",$nama);
//         $query  = $dbb->query("select a.nama,a.jabatan,b.namajabatan from pegawai a,jabatan b where a.jabatan=b.kojab and a.nik=?",$nama);
//        foreach ($query->result() as $row)
//        { 
//             $namapeg = $row->nama;
//             $jabatan = $row->jabatan;
//             $namajabatan = $row->namajabatan;
//        }       
//        $query  = $dbb->query("select kojab1 from strukturjab where kojab2=?",$jabatan);
//        foreach ($query->result() as $row1)
//        {             
//             $kojabpenilai = $row1->kojab1;
//        }       
//        $penilai='';
//        $query  = $dbb->query("select nama from pegawai where jabatan=?",$kojabpenilai);
//        foreach ($query->result() as $row2)
//        {             
//             $penilai = $row2->nama;
//        }              

//         $data = array(
//                 'kopeg'             =>$nama,    
//                 'nama'              =>$namapeg,    
//                 'jabatan'           =>$namajabatan,    
//                 'penilai'           =>$penilai,    
//                 'periode'           =>$periode,   
//                 'tahun'             =>$tahun,   
//                 'maintening'        =>$maintening,  
//                 'bobsubmain'        =>$bobsubmain,  
//                 'nilsubmain'        =>$nilsubmain,  
//                 'totalnilkra'       =>$totalnilkra, 
//                 'improvment'        =>$improvment,  
//                 'bobsubimprov'      =>$bobsubimprov,
//                 'nilsubimprov'      =>$nilsubimprov,
//                 'nilbobotkra'       =>$nilbobotkra,
//                 'bobotinti'         =>$bobotinti,
//                 'nilbobotinti'      =>$nilbobotinti,
//                 'totnilkba'         =>$totnilkba,
//                 'integritas'        =>$integritas,  
//                 'subint'            =>$subint,
//                 'transparansi'      =>$transparansi,  
//                 'subtrans'          =>$subtrans,
//                 'kerjasama'         =>$kerjasama, 
//                 'subkerja'          =>$subkerja,
//                 'kreativitas'       =>$kreativitas, 
//                 'subkreativ'        =>$subkreativ,
//                 'semangat'          =>$semangat,  
//                 'subsemangat'       =>$subsemangat,
//                 'sempurna'          =>$sempurna,  
//                 'subsempurna'       =>$subsempurna,
//                 'disiplin'          =>$disiplin,  
//                 'bobotdisiplin'     =>$bobotdisiplin,
//                 'nilbobotdisiplin'  =>$nilbobotdisiplin,
//                 'pdca'              =>$pdca,    
//                 'bobotpdca'         =>$bobotpdca,
//                 'nilbobotpdca'      =>$nilbobotpdca,
//                 'manage'            =>$manage,    
//                 'bobotmanagement'   =>$bobotmanagement,
//                 'nilbobotmanagement'=>$nilbobotmanagement,
//                 'nilbobotkba'       =>$nilbobotkba,
//                 'hasil'             =>$hasil,
//                 'totkrakba'         =>$totkrakba,
//                 'kra'               =>$kra,
//                 'kba'               =>$kba,
//                 'kekuatan'          =>$kekuatan,
//                 'kelemahan'         =>$kelemahan,
//                 'tindaklanjut'      =>$tindaklanjut,
//                 'jadwal'            =>$jadwal,
//                 'tglentry'          => date("Y-m-d")
//         );
//         $dbb->insert('krakba', $data);  
//         $value="OK"; 
//     }else{
//         $value="NOK";
//     }
//     return $value;
// }

// function carikra($nama,$periode,$tahun){

//     $data1 = array(
//         'urut'  => getSession('urut')
//     );
//     $this->db->delete('tampung', $data1);
  
//     $query = $this->db->query("select * from pegawai where nik=?",array($nama));
//     foreach ($query->result() as $row)
//     { 
//         $jabatan=$row->jabatan;
//     }  
// // print_r($nama);exit();
//     if($periode=='1'){
//       $query = $this->db->query("select sum(totalnkp) as totalnkp from rekapskk where (bulan=1 or bulan=2 or bulan=3 or bulan=4 or bulan=5 or bulan=6) and tahun=? and jabatan=?",array($tahun,$jabatan));  
//     }else{
//       $query = $this->db->query("select sum(totalnkp) as totalnkp from rekapskk where (bulan=7 or bulan=8 or bulan=9 or bulan=10 or bulan=11 or bulan=12) and tahun=? and jabatan=?",array($tahun,$jabatan));    
//     }
//     foreach ($query->result() as $row)
//     { 
//         // print_r($row->totalnkp);exit();
//         // echo $row->totalnkp;
//         $nilaikra=$row->totalnkp/2;
//         if ($nilaikra<75){
//             $skorkra=4;
//         }elseif(($nilaikra>=75) and ($nilaikra<81)){
//             $skorkra=5;
//         }elseif(($nilaikra>=81) and ($nilaikra<86)){
//             $skorkra=6;
//         }elseif(($nilaikra>=86) and ($nilaikra<91)){
//             $skorkra=7;         
//         }elseif(($nilaikra>=91) and ($nilaikra<96)){
//             $skorkra=8;         
//         }elseif(($nilaikra>=96) and ($nilaikra<101)){
//             $skorkra=9;         
//         }elseif(($nilaikra>=101) and ($nilaikra<106)){
//             $skorkra=10;                
//         }elseif(($nilaikra>=106) and ($nilaikra<111)){
//             $skorkra=11;
//         }elseif(($nilaikra>=111) and ($nilaikra<116)){
//             $skorkra=12;        
//         }elseif(($nilaikra>=116) and ($nilaikra<121)){
//             $skorkra=13;        
//         }elseif(($nilaikra>=121) and ($nilaikra<126)){
//             $skorkra=14;        
//         }elseif($nilaikra>=126){
//             $skorkra=15;
//         }       

//         $data2 = array(
//             'ket1'   => $skorkra, 
//             'ket2'   => 'nilaikra',
//             'urut'   => getSession('urut')
//         );   
//         $this->db->insert('tampung', $data2);
//     }

//     // $data=null;
//     // $query = $this->db->query("select * from tampung where ket2='nilaikra' and urut=?",array(getSession('urut')));  
//     // foreach ($query->result() as $row)
//     // { 
//     //     $data[] = $row;
//     //     $cek=1;
//     // }
//     // return $data;       

//     $datax = null;
//     $query = $this->db->query("SELECT * FROM tampung where urut=?",array(getSession('urut')));    
//     foreach ($query->result() as $key => $row) {
//       $datax[] = $row;
//     }
//     return $datax;    

// }


//   function carioutstdkompetensi($kojab){
//     $value = "NOK";
  
//     $dbb = $this->load->database('fb1',true);

//     $data = array(
//       'urut' => getSession('user')
//     );
//     $dbb->delete('tampung', $data);  
//     $dbb->delete('tampung2', $data);

//     $query = $dbb->query("select * from stdknowhow where kojab=?",array($kojab));
//     foreach ($query->result() as $row)
//     {               
//         $data = array(
//             'ket1'   => 'FE',
//             'ket2'   => $row->fe,
//             'jum1'   => 1,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);          
//         $data = array(
//             'ket1'   => 'IE',
//             'ket2'   => $row->ie,
//             'jum1'   => 2,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'EX',
//             'ket2'   => $row->ex,
//             'jum1'   => 3,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'BS',
//             'ket2'   => $row->bs,
//             'jum1'   => 4,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-MKT',
//             'ket2'   => $row->tsmkt,
//             'jum1'   => 5,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-EST',
//             'ket2'   => $row->tsest,
//             'jum1'   => 6,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-PPC',
//             'ket2'   => $row->tsppc,
//             'jum1'   => 7,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-CON',
//             'ket2'   => $row->tscon,
//             'jum1'   => 8,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-QAC',
//             'ket2'   => $row->tsqac,
//             'jum1'   => 9,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-MAN',
//             'ket2'   => $row->tsman,
//             'jum1'   => 10,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-SAR',
//             'ket2'   => $row->tssar,
//             'jum1'   => 11,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-CS',
//             'ket2'   => $row->tscs,
//             'jum1'   => 12,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-PENG',
//             'ket2'   => $row->tspeng,
//             'jum1'   => 13,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                          
//         $data = array(
//             'ket1'   => 'TS-FAT',
//             'ket2'   => $row->tsfat,
//             'jum1'   => 14,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-HSE',
//             'ket2'   => $row->tshse,
//             'jum1'   => 15,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-HRD',
//             'ket2'   => $row->tshrd,
//             'jum1'   => 16,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-GA',
//             'ket2'   => $row->tsga,
//             'jum1'   => 17,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-MD',
//             'ket2'   => $row->tsmd,
//             'jum1'   => 18,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TS-MR',
//             'ket2'   => $row->tsmr,
//             'jum1'   => 19,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                          
//         $data = array(
//             'ket1'   => 'TS-ENG-MECH',
//             'ket2'   => $row->tsengmech,
//             'jum1'   => 20,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                          
//         $data = array(
//             'ket1'   => 'TS-ENG-ELEC',
//             'ket2'   => $row->tsengelec,
//             'jum1'   => 21,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                          
//         $data = array(
//             'ket1'   => 'TS-ENG-INST',
//             'ket2'   => $row->tsenginst,
//             'jum1'   => 22,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                          
//         $data = array(
//             'ket1'   => 'TS-ENG-CIV',
//             'ket2'   => $row->tsengciv,
//             'jum1'   => 23,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                                  
//         $data = array(
//             'ket1'   => 'TS-SD',
//             'ket2'   => $row->tssd,
//             'jum1'   => 24,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                                  
//         $data = array(
//             'ket1'   => 'TS-IA',
//             'ket2'   => $row->tsia,
//             'jum1'   => 25,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                                  
//         $data = array(
//             'ket1'   => 'TS-TOP',
//             'ket2'   => $row->tstop,
//             'jum1'   => 26,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                                  
//     }   
  
//     $query = $dbb->query("select * from stdmanagerial where kojab=?",array($kojab));
//     foreach ($query->result() as $row)
//     {               
//         $data = array(
//             'ket1'   => 'DEV',
//             'ket2'   => $row->dev,
//             'jum1'   => 27,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);          
//         $data = array(
//             'ket1'   => 'DIR',
//             'ket2'   => $row->dir,
//             'jum1'   => 28,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TW',
//             'ket2'   => $row->tw,
//             'jum1'   => 29,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TL',
//             'ket2'   => $row->tl,
//             'jum1'   => 30,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'PS',
//             'ket2'   => $row->ps,
//             'jum1'   => 31,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'PO',
//             'ket2'   => $row->po,
//             'jum1'   => 32,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'SO',
//             'ket2'   => $row->so,
//             'jum1'   => 33,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'AT',
//             'ket2'   => $row->at,
//             'jum1'   => 34,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'CT',
//             'ket2'   => $row->ct,
//             'jum1'   => 35,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'INT',
//             'ket2'   => $row->int,
//             'jum1'   => 36,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'IU',
//             'ket2'   => $row->iu,
//             'jum1'   => 37,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'RB',
//             'ket2'   => $row->rb,
//             'jum1'   => 38,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'RB',
//             'ket2'   => $row->imp,
//             'jum1'   => 39,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                          
//         $data = array(
//             'ket1'   => 'ING',
//             'ket2'   => $row->ing,
//             'jum1'   => 40,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TRP',
//             'ket2'   => $row->trp,
//             'jum1'   => 41,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'TEW',
//             'ket2'   => $row->tew,
//             'jum1'   => 42,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'CRT',
//             'ket2'   => $row->crt,
//             'jum1'   => 43,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'WIS',
//             'ket2'   => $row->wis,
//             'jum1'   => 44,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                  
//         $data = array(
//             'ket1'   => 'EXC',
//             'ket2'   => $row->exc,
//             'jum1'   => 45,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                          
//         $data = array(
//             'ket1'   => 'ACH',
//             'ket2'   => $row->ach,
//             'jum1'   => 46,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                          
//         $data = array(
//             'ket1'   => 'CO',
//             'ket2'   => $row->co,
//             'jum1'   => 47,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                          
//         $data = array(
//             'ket1'   => 'IS',
//             'ket2'   => $row->is,
//             'jum1'   => 48,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                          
//         $data = array(
//             'ket1'   => 'CSO',
//             'ket2'   => $row->cso,
//             'jum1'   => 49,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung', $data);                                  
//     }   

    
//     $query = $dbb->query("select * from tampung where urut='" .getSession('user')."' order by jum1");  
//     foreach ($query->result() as $row)
//     {               
//       $cek1='';$cek2='';$cek3='';$cek4='';$cek5='';
//       if($row->ket2==1){
//         $cek1='X';
//         $warna='#996633';
//       }elseif($row->ket2==2){
//         $cek2='X';
//         $warna='#996633';
//       }elseif($row->ket2==3){
//         $cek3='X';
//         $warna='#996633';
//       }elseif($row->ket2==4){
//         $cek4='X';
//         $warna='#996633';
//       }elseif($row->ket2==5){
//         $cek5='X';
//         $warna='#996633';
//       }
//         $data = array(
//             'ket1'   => $row->ket1,
//             'ket2'   => $cek1,
//             'ket3'   => $cek2,
//             'ket4'   => $cek3,
//             'ket5'   => $cek4,
//             'ket6'   => $cek5,
//             'ket7'   => $warna,
//             'jum1'   => $row->jum1,
//             'urut'   => getSession('urut')
//         );   
//         $dbb->insert('tampung2', $data);                                        
//     }    

//   $cek=0;
//   $query = $dbb->query("select * from tampung2 where urut='" .getSession('user')."' order by jum1");  
//   foreach ($query->result() as $row)
//   { 
//       $data1[] = $row;
//       $cek=1;
//   }
    
//   if ($cek==1) {
//       return $data1;      
//   }else{ 
//       $data1=0;
//       return $data1;      
//   }
// }

//     function carievaluasipms($nama,$periode,$tahun){
//         $dbb = $this->load->database('fb1',true);
        
//         $cek=0;
//         $query = $dbb->query("select * from krakba where kopeg=? and periode=? and tahun=?",array($nama,$periode,$tahun));
//         foreach ($query->result() as $row)
//         { 
//             $data1[] = $row;
//             $cek=1;
//         }
        
//         if ($cek==1) {
//             return $data1;      
//         }else{ 
//             $data1=0;
//             return $data1;      
//         }
//     }

//     function carirekappms($nama,$tahun){
//         $dbb = $this->load->database('fb1',true);
        
//         $cek=0;
//         $query = $dbb->query("select * from krakba where kopeg=? and tahun=?",array($nama,$tahun));
//         foreach ($query->result() as $row)
//         { 
//             $data1[] = $row;
//             $cek=1;
//         }
        
//         if ($cek==1) {
//             return $data1;      
//         }else{ 
//             $data1=0;
//             return $data1;      
//         }
//     }

//     function getlevel(){
//         $data = null;
//         $query = $this->db->query("SELECT * FROM kelompok");
//         foreach ($query->result() as $key => $row) {
//             $data[] = $row;
//         }
//         return $data;
//     }

// function cariresumepms($leveljabatan,$tahun){
//     $value = "NOK";
//     $dbb = $this->load->database('fb1',true);
    
//     if ($leveljabatan==1){     
//         $query = $dbb->query("select a.nik,a.nama,a.jabatan from pegawai a,jabatan b where a.jabatan=b.kojab and b.kelompok=1");
//     }       
//     if ($leveljabatan==2){     
//         $query = $dbb->query("select a.nik,a.nama,a.jabatan from pegawai a,jabatan b where a.jabatan=b.kojab and b.kelompok=2");
//     }       
//     if ($leveljabatan==3){     
//         $query = $dbb->query("select a.nik,a.nama,a.jabatan from pegawai a,jabatan b where a.jabatan=b.kojab and b.kelompok=3");
//     }       
//     if ($leveljabatan==4){     
//         $query = $dbb->query("select a.nik,a.nama,a.jabatan from pegawai a,jabatan b where a.jabatan=b.kojab and b.kelompok=4");
//     }                   

//     foreach ($query->result() as $key=>$row)
//     {
//         $datadet[] = $row;
//         $query = $dbb->query("select namajabatan from jabatan where kojab =?",array($row->jabatan));       
//         foreach ($query->result() as $row2)
//         {               
//             $datadet[$key]->namajabatan = $row2->namajabatan;
//         }
//         $datadet[$key]->tahun = $tahun;

//         $periode=array('1' => 'Periode I',
//                         '2' => 'Periode II',
//                         '3' => 'Periode III',
//                         '4' => 'Periode IV'
//                 );
        
//         for ($i=1; $i < 5; $i++) { 
//             $query = $dbb->query("select * from krakba where kopeg=? and tahun=? and periode=?",array($row->nik,$tahun,$i));                   
//             foreach ($query->result() as $row1)
//             {           
//                 $datadet[$key]->{'periode'.$i} = $periode[$i];
//                 $datadet[$key]->{'totalnilkra'.$i} = $row1->totalnilkra;
//                 $datadet[$key]->{'totnilkba'.$i} = $row1->totnilkba;
//                 $datadet[$key]->{'totkrakba'.$i} = $row1->totkrakba;
//                 $datadet[$key]->{'hasil'.$i} = $row1->hasil;
//             }           
//         }
//     }
//     return $datadet;
// }

}
?>