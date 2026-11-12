<?php
class Outstdkompetensi_model extends MY_Model{

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
        // $data = array(
        //     'ket1'   => 'FE',
        //     'ket2'   => $row->fe,
        //     'jum1'   => 1,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);          
        // $data = array(
        //     'ket1'   => 'IE',
        //     'ket2'   => $row->ie,
        //     'jum1'   => 2,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'EX',
        //     'ket2'   => $row->ex,
        //     'jum1'   => 3,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'BS',
        //     'ket2'   => $row->bs,
        //     'jum1'   => 4,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-MKT',
        //     'ket2'   => $row->tsmkt,
        //     'jum1'   => 5,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-EST',
        //     'ket2'   => $row->tsest,
        //     'jum1'   => 6,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-PPC',
        //     'ket2'   => $row->tsppc,
        //     'jum1'   => 7,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-CON',
        //     'ket2'   => $row->tscon,
        //     'jum1'   => 8,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-QAC',
        //     'ket2'   => $row->tsqac,
        //     'jum1'   => 9,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-MAN',
        //     'ket2'   => $row->tsman,
        //     'jum1'   => 10,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-SAR',
        //     'ket2'   => $row->tssar,
        //     'jum1'   => 11,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-CS',
        //     'ket2'   => $row->tscs,
        //     'jum1'   => 12,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-PENG',
        //     'ket2'   => $row->tspeng,
        //     'jum1'   => 13,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                          
        // $data = array(
        //     'ket1'   => 'TS-FAT',
        //     'ket2'   => $row->tsfat,
        //     'jum1'   => 14,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-HSE',
        //     'ket2'   => $row->tshse,
        //     'jum1'   => 15,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-HRD',
        //     'ket2'   => $row->tshrd,
        //     'jum1'   => 16,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-GA',
        //     'ket2'   => $row->tsga,
        //     'jum1'   => 17,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-MD',
        //     'ket2'   => $row->tsmd,
        //     'jum1'   => 18,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TS-MR',
        //     'ket2'   => $row->tsmr,
        //     'jum1'   => 19,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                          
        // $data = array(
        //     'ket1'   => 'TS-ENG-MECH',
        //     'ket2'   => $row->tsengmech,
        //     'jum1'   => 20,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                          
        // $data = array(
        //     'ket1'   => 'TS-ENG-ELEC',
        //     'ket2'   => $row->tsengelec,
        //     'jum1'   => 21,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                          
        // $data = array(
        //     'ket1'   => 'TS-ENG-INST',
        //     'ket2'   => $row->tsenginst,
        //     'jum1'   => 22,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                          
        // $data = array(
        //     'ket1'   => 'TS-ENG-CIV',
        //     'ket2'   => $row->tsengciv,
        //     'jum1'   => 23,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                                  
        // $data = array(
        //     'ket1'   => 'TS-SD',
        //     'ket2'   => $row->tssd,
        //     'jum1'   => 24,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                                  
        // $data = array(
        //     'ket1'   => 'TS-IA',
        //     'ket2'   => $row->tsia,
        //     'jum1'   => 25,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                                  
        // $data = array(
        //     'ket1'   => 'TS-TOP',
        //     'ket2'   => $row->tstop,
        //     'jum1'   => 26,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);   

        $data = array(
            'ket1'   => 'FE',
            'ket2'   => $row->fe,
            'ket3'   => 'Formal Education',
            'ket4'   => 'KNOWHOW',
            'jum1'   => 1,            
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);          
        $data = array(
            'ket1'   => 'IE',
            'ket2'   => $row->ie,
            'ket3'   => 'Informal Education',
            'ket4'   => '(Merupakan kelompok',
            'jum1'   => 2,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'EX',
            'ket2'   => $row->ex,
            'ket3'   => 'Experience',
            'ket4'   => 'kompetensi yang',
            'jum1'   => 3,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'BS',
            'ket2'   => $row->bs,
            'ket3'   => 'Business Skill',
            'ket4'   => 'mendukung kemampuan',
            'jum1'   => 4,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MKT',            
            'ket2'   => $row->tsmkt,
            'ket3'   => 'Technical Skill Marketing',
            'ket4'   => 'untuk menunjukkan',
            'jum1'   => 5,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-EST',
            'ket2'   => $row->tsest,
            'ket3'   => 'Technical Skill Estimation',
            'ket4'   => 'nilai diri',
            'jum1'   => 6,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-PPC',
            'ket2'   => $row->tsppc,
            'ket3'   => 'Technical Skill Planning & Control',
            'ket4'   => 'kepada Organisasi',
            'jum1'   => 7,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-CON',
            'ket2'   => $row->tscon,
            'ket3'   => 'Technical Skill Construction',
            'ket4'   => 'melalui aplikasi',
            'jum1'   => 8,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-QAC',
            'ket2'   => $row->tsqac,
            'ket3'   => 'Technical Skill QA/QC',
            'ket4'   => 'dan pengembangan',
            'jum1'   => 9,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MAN',
            'ket2'   => $row->tsman,
            'ket3'   => 'Technical Skill Maintenance Elektrikal,Instrument,IT,Mekanikal,Utility',
            'ket4'   => 'dalam praktek',
            'jum1'   => 10,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-SAR',
            'ket2'   => $row->tssar,
            'ket3'   => 'Technical Skill Sarana Angkutan',
            'ket4'   => 'pekerjaan,kemampuan',
            'jum1'   => 11,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-CS',
            'ket2'   => $row->tscs,
            'ket3'   => 'Technical Skill Coorporate Secretary',
            'ket4'   => 'teknis dan pengalaman)',
            'jum1'   => 12,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-PENG',
            'ket2'   => $row->tspeng,
            'ket3'   => 'Technical Skill Pengadaan',
            'jum1'   => 13,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-FAT',
            'ket2'   => $row->tsfat,
            'ket3'   => 'Technical Skill Finance,Accounting and Tax',
            'jum1'   => 14,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-HSE',
            'ket2'   => $row->tshse,
            'ket3'   => 'Technical Skill HEALTH SAFETY & ENVIRONMENT/OHSAS/K3',
            'jum1'   => 15,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-HRD',
            'ket2'   => $row->tshrd,
            'ket3'   => 'Technical Skill HRD',
            'jum1'   => 16,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-GA',
            'ket2'   => $row->tsga,
            'ket3'   => 'Technical Skill GENERAL AFFAIRS',
            'jum1'   => 17,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MD',
            'ket2'   => $row->tsmd,
            'ket3'   => 'Technical Skill Manajement Development',
            'jum1'   => 18,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TS-MR',
            'ket2'   => $row->tsmr,
            'ket3'   => 'Technical Skill Manajemen Representative',
            'jum1'   => 19,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-MECH',
            'ket2'   => $row->tsengmech,
            'ket3'   => 'Technical Skill Engineering Mechanical',
            'jum1'   => 20,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-ELEC',
            'ket2'   => $row->tsengelec,
            'ket3'   => 'Technical Skill Engineering Electrical',
            'jum1'   => 21,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-INST',
            'ket2'   => $row->tsenginst,
            'ket3'   => 'Technical Skill Engineering Instrumentation',
            'jum1'   => 22,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'TS-ENG-CIV',
            'ket2'   => $row->tsengciv,
            'ket3'   => 'Technical Skill Engineering Civil Structure',
            'jum1'   => 23,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
        $data = array(
            'ket1'   => 'TS-SD',
            'ket2'   => $row->tssd,
            'ket3'   => 'Technical Skill System Development',
            'jum1'   => 24,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
        $data = array(
            'ket1'   => 'TS-IA',
            'ket2'   => $row->tsia,
            'ket3'   => 'Technical Skill Internal Audit',
            'jum1'   => 25,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                                  
        $data = array(
            'ket1'   => 'TS-TOP',
            'ket2'   => $row->tstop,
            'ket3'   => 'Technical Skill Top Management',
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
            'ket3'   => 'Developing Others',
            'ket4'   => 'MANAGERIAL SKILL',
            'jum1'   => 27,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);          
        $data = array(
            'ket1'   => 'DIR',
            'ket2'   => $row->dir,
            'ket3'   => 'Directiveness, Assertiveness and Use of Position Power',
            'ket4'   => '(Merupakan kelompok',
            'jum1'   => 28,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TW',
            'ket2'   => $row->tw,
            'ket3'   => 'Teamwork & Cooperation',
            'ket4'   => 'kompetensi yang',
            'jum1'   => 29,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TL',
            'ket2'   => $row->tl,
            'ket3'   => 'Teamleadership',
            'ket4'   => 'mendukung kemampuan',
            'jum1'   => 30,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'PS',
            'ket2'   => $row->ps,
            'ket3'   => 'Problem Solving/Decision Making',
            'ket4'   => 'mengelola atau mengatur',
            'jum1'   => 31,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'PO',
            'ket2'   => $row->po,
            'ket3'   => 'Planning and Organizing',
            'ket4'   => 'sehingga lebih',
            'jum1'   => 32,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'SO',
            'ket2'   => $row->so,
            'ket3'   => 'Strategic Orientation',
            'ket4'   => 'berdaya guna)',
            'jum1'   => 33,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'AT',
            'ket2'   => $row->at,
            'ket3'   => 'Analytical Thinking',
            'ket4'   => 'INDIVIDUAL & PEOPLE',
            'jum1'   => 34,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'CT',
            'ket2'   => $row->ct,
            'ket3'   => 'Conceptual Thinking',
            'ket4'   => '(Merupakan kelompok',
            'jum1'   => 35,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'INT',
            'ket2'   => $row->int,
            'ket3'   => 'Initiative',
            'ket4'   => 'kompetensi yang mendukung',
            'jum1'   => 36,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'IU',
            'ket2'   => $row->iu,
            'ket3'   => 'Interpersonal Understanding',
            'ket4'   => '-Kemampuan berpikir',
            'jum1'   => 37,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'RB',
            'ket2'   => $row->rb,
            'ket3'   => 'Relation Building',
            'ket4'   => 'dalam menghadapi',
            'jum1'   => 38,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'RB',
            'ket2'   => $row->imp,
            'ket3'   => 'Impact & Influence',
            'ket4'   => 'situasi/masalah',
            'jum1'   => 39,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'ING',
            'ket2'   => $row->ing,
            'ket3'   => 'Integrity',
            'ket4'   => '-Efektifitas bila',
            'jum1'   => 40,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TRP',
            'ket2'   => $row->trp,
            'ket3'   => 'Transparancy',
            'ket4'   => 'berhubungan dengan',
            'jum1'   => 41,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'TEW',
            'ket2'   => $row->tew,
            'ket3'   => 'Teamwork',
            'ket4'   => 'orang lain/tim',
            'jum1'   => 42,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'CRT',
            'ket2'   => $row->crt,
            'ket3'   => 'Creativity',
            'ket4'   => 'termasuk kemampuan',
            'jum1'   => 43,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'WIS',
            'ket2'   => $row->wis,
            'ket3'   => 'Wining Spirit',
            'ket4'   => 'memperhatikan dan',
            'jum1'   => 44,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                  
        $data = array(
            'ket1'   => 'EXC',
            'ket2'   => $row->exc,
            'ket3'   => 'Excellence',
            'ket4'   => 'memahami orang lain)',
            'jum1'   => 45,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'ACH',
            'ket2'   => $row->ach,
            'ket3'   => 'Achievement Orientation',
            'ket4'   => 'QUALITY',
            'jum1'   => 46,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'CO',
            'ket2'   => $row->co,
            'ket3'   => 'Concern for Order, Quality and Accuracy',
            'ket4'   => '(Kelompok kompetensi yg',
            'jum1'   => 47,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'IS',
            'ket2'   => $row->is,
            'ket3'   => 'Information Seeking',
            'ket4'   => 'mendukung terselenggaranya',
            'jum1'   => 48,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data);                          
        $data = array(
            'ket1'   => 'CSO',
            'ket2'   => $row->cso,
            'ket3'   => 'Customer Service Orientation',
            'ket4'   => 'Continual Improvment)',
            'jum1'   => 49,
            'urut'   => getSession('user')
        );   
        $dbb->insert('tampung', $data); 

        // $data = array(
        //     'ket1'   => 'DEV',
        //     'ket2'   => $row->dev,
        //     'jum1'   => 27,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);          
        // $data = array(
        //     'ket1'   => 'DIR',
        //     'ket2'   => $row->dir,
        //     'jum1'   => 28,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TW',
        //     'ket2'   => $row->tw,
        //     'jum1'   => 29,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TL',
        //     'ket2'   => $row->tl,
        //     'jum1'   => 30,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'PS',
        //     'ket2'   => $row->ps,
        //     'jum1'   => 31,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'PO',
        //     'ket2'   => $row->po,
        //     'jum1'   => 32,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'SO',
        //     'ket2'   => $row->so,
        //     'jum1'   => 33,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'AT',
        //     'ket2'   => $row->at,
        //     'jum1'   => 34,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'CT',
        //     'ket2'   => $row->ct,
        //     'jum1'   => 35,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'INT',
        //     'ket2'   => $row->int,
        //     'jum1'   => 36,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'IU',
        //     'ket2'   => $row->iu,
        //     'jum1'   => 37,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'RB',
        //     'ket2'   => $row->rb,
        //     'jum1'   => 38,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'RB',
        //     'ket2'   => $row->imp,
        //     'jum1'   => 39,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                          
        // $data = array(
        //     'ket1'   => 'ING',
        //     'ket2'   => $row->ing,
        //     'jum1'   => 40,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TRP',
        //     'ket2'   => $row->trp,
        //     'jum1'   => 41,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'TEW',
        //     'ket2'   => $row->tew,
        //     'jum1'   => 42,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'CRT',
        //     'ket2'   => $row->crt,
        //     'jum1'   => 43,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'WIS',
        //     'ket2'   => $row->wis,
        //     'jum1'   => 44,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                  
        // $data = array(
        //     'ket1'   => 'EXC',
        //     'ket2'   => $row->exc,
        //     'jum1'   => 45,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                          
        // $data = array(
        //     'ket1'   => 'ACH',
        //     'ket2'   => $row->ach,
        //     'jum1'   => 46,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                          
        // $data = array(
        //     'ket1'   => 'CO',
        //     'ket2'   => $row->co,
        //     'jum1'   => 47,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                          
        // $data = array(
        //     'ket1'   => 'IS',
        //     'ket2'   => $row->is,
        //     'jum1'   => 48,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                          
        // $data = array(
        //     'ket1'   => 'CSO',
        //     'ket2'   => $row->cso,
        //     'jum1'   => 49,
        //     'urut'   => getSession('user')
        // );   
        // $dbb->insert('tampung', $data);                                  
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
            'ket8'   => $row->ket3,
            'ket9'   => $row->ket4,
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

function cetakoutstdkompetensi(){
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

}
?>