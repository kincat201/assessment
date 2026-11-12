<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model{
    
    public function member_login(){
        $param = $this->input->post();
		$this->db->where('username',$param['userid']);
		// $this->db->where('password',md5($param['password']));
        $this->db->where('password',$param['password']);
		$this->db->from('pegawai');
		// $this->db->join('m_level l','u.level = l.idlevel','inner');
        $exec = $this->db->get();
        // print_r($exec);
        
        $panjangacak = 5;
        $base="ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789";
        $max=strlen($base)-1;
        $acak="";
        mt_srand((double)microtime()*1000000);
        while (strlen($acak)<$panjangacak)
        $acak.=$base{mt_rand(0,$max)};
        // $_SESSION['nama'] = $this->input->post('nama');
        // $_SESSION['username'] = $this->input->post('nama').$acak; 

        if($exec->num_rows() == 1 ){
            $datau = $exec->result();
            // print_r($datau);
            foreach ($datau as $row) {
                $nik = $row->nik;
                $kojab = $row->jabatan;
                $unit = $row->unit;
                $pendidikan = $row->pendidikan;
                $user = $row->username;
                $pass = $row->password;
                $role = $row->role;
                $urut = $row->username.$acak;
            }            

            $bultah1=date('Y').'-01%';
            $bultah2=date('Y').'-07%';
            $bultahx1=date('Y').'-01';
            $bultahx2=date('Y').'-07';            
            //=========realisasi skk
            // $query = $this->db->query("SELECT count(user) as jum FROM realisasi WHERE user=? and tahun=?",array($user,date('Y')));
            if((date('Y-m')==$bultahx1)||(date('Y-m')==$bultahx2)){
                if(date('Y-m')==$bultahx1){
                    $query = $this->db->query("SELECT count(user) as jum FROM realisasi WHERE user=? and tglupdate like ?",array($user,$bultah1));
                }elseif(date('Y-m')==$bultahx2){
                    $query = $this->db->query("SELECT count(user) as jum FROM realisasi WHERE user=? and tglupdate like ?",array($user,$bultah2));
                }
                foreach ($query->result() as $row){
                    $realisasi=$row->jum;
                } 
                if($realisasi==0){
                    $ketrealisasi='Entry Realisasi SKK';
                }else{
                    $ketrealisasi='';
                }            
            }else{
                $ketrealisasi='';
            }
            //=========hitung skk
            if((date('Y-m')==$bultahx1)||(date('Y-m')==$bultahx2)){
                if(date('Y-m')==$bultahx1){
                    $query = $this->db->query("SELECT count(user) as jum FROM rekapskk WHERE user=? and tglentry like ?",array($user,$bultah1));
                }elseif(date('Y-m')==$bultahx2){
                    $query = $this->db->query("SELECT count(user) as jum FROM rekapskk WHERE user=? and tglentry like ?",array($user,$bultah2));
                }
                foreach ($query->result() as $row){
                    $rekapskk=$row->jum;
                } 
                if($rekapskk==0){
                    $ketrekapskk='Hitung SKK';
                }else{
                    $ketrekapskk='';
                }            
            }else{
                $ketrekapskk='';
            }
            //=========profil kompt knowhow
            if((date('Y-m')==$bultahx1)||(date('Y-m')==$bultahx2)){
                if(date('Y-m')==$bultahx1){
                    $query = $this->db->query("SELECT count(user) as jum FROM knowhow WHERE user=? and tglentry like ?",array($user,$bultah1));
                }elseif(date('Y-m')==$bultahx2){
                    $query = $this->db->query("SELECT count(user) as jum FROM knowhow WHERE user=? and tglentry like ?",array($user,$bultah2));
                }
                foreach ($query->result() as $row){
                    $knowhow=$row->jum;
                } 
                if($knowhow==0){
                    $ketknowhow='Penilaian Profil Kompetensi Knowhow';
                }else{
                    $ketknowhow='';
                }
            }else{
                $ketknowhow='';
            }
            //=========profil kompt managerial
            if((date('Y-m')==$bultahx1)||(date('Y-m')==$bultahx2)){            
                if(date('Y-m')==$bultahx1){
                    $query = $this->db->query("SELECT count(user) as jum FROM managerialskill WHERE user=? and tglentry like ?",array($user,$bultah1));
                }elseif(date('Y-m')==$bultahx2){
                    $query = $this->db->query("SELECT count(user) as jum FROM managerialskill WHERE user=? and tglentry like ?",array($user,$bultah2));
                }
                foreach ($query->result() as $row){
                    $managerial=$row->jum;
                } 
                if($managerial==0){
                    $ketmanagerial='Penilaian Profil Kompetensi Managerial Skill';
                }else{
                    $ketmanagerial='';
                }
            }else{
                $ketmanagerial='';
            }
            //=========pms
            if((date('Y-m')==$bultahx1)||(date('Y-m')==$bultahx2)){            
                if(date('Y-m')==$bultahx1){
                    $query = $this->db->query("SELECT count(user) as jum FROM krakba WHERE user=? and tglentry like ?",array($user,$bultah1));
                }elseif(date('Y-m')==$bultahx2){
                    $query = $this->db->query("SELECT count(user) as jum FROM krakba WHERE user=? and tglentry like ?",array($user,$bultah2));
                }
                foreach ($query->result() as $row){
                    $pms=$row->jum;
                } 
                if($pms==0){
                    $ketpms='Penilaian Kinerja';
                }else{
                    $ketpms='';
                }            
            }else{
                $ketpms='';
            }

            $reminder='Periode Penilaian Januari-Juni diinput pada bulan Juli. Periode Penilaian Juli-Desember diinput pada bulan Januari. Yang belum anda lakukan adalah : '.$ketrealisasi.' # '.$ketrekapskk.' # '.$ketknowhow.' # '.$ketmanagerial.' # '.$ketpms.' # '; 

        // if($param['userid']=='admin'&&$param['password']=='admin'){
            $datalogin= array('urut'=>$urut, 'user'=>$user, 'password'=>$pass, 'role'=>$role, 'nik'=>$nik, 'kojab'=>$kojab, 'unit'=>$unit, 'pendidikan'=>$pendidikan, 'reminder'=>$reminder );
            // unset($datalogin->pass);
            // $datalogin->denied_url = json_decode($datalogin->denied_url);
            if($datalogin){
                $this->session->set_userdata('sess_cbham', $datalogin);
                if($this->session->userdata('sess_cbham')){
                    //$this->session->set_flashdata('flash_msg',succ_msg('Anda telah berhasil login di Aplikasi HRMS PT. YODYA KARYA'));
                    redirect('dashboard');
                }    
            }else{
                redirect('login');
            }     
        } else {
            $this->session->set_flashdata('flash_msg', err_msg('<strong>Login gagal, </strong>Silahkan masukkan username dan password dengan benar'));
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
    
    public function is_login(){
        if(!$this->session->userdata('sess_cbham') && $this->uri->segment(1)!='login'){
            $this->session->set_flashdata('flash_msg', warn_msg('<strong>Silahkan login terlebih dahulu'));
            redirect('login');
        }
           
    }   

    public function is_admin($menu=NULL){
        
        $sess = $this->session->userdata('sess_cbham');
        if($sess->role!='admin'){
            if($menu)
            {
                return FALSE;
                die();
            }
            $this->session->set_flashdata('flash_msg', err_msg('Anda tidak berhak mengakses halaman tersebut'));
            redirect('/');
        }
        if($menu)
        {
            return TRUE;
            die();
        }
    }

    public function member_logout(){
        $this->db->delete('tampungkeluarga', array('user' => getSession('user')));
        $this->db->delete('tampungpendidikan', array('user' => getSession('user')));  
        // $this->db->delete('tampungdetmpp', array('user' => getSession('user')));  
        $this->db->delete('tampungtraining', array('user' => getSession('user')));    
        // $this->db->delete('tampung', array('user' => getSession('user')));    
        // $this->db->delete('tampung2', array('user' => getSession('user')));    
        // $this->db->delete('tampung3', array('user' => getSession('user')));    
    }
    
    
}