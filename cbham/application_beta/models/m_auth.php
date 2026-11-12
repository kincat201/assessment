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
        // if($param['userid']=='admin'&&$param['password']=='admin'){
            $datalogin= array('urut'=>$urut, 'user'=>$user, 'password'=>$pass, 'role'=>$role, 'nik'=>$nik, 'kojab'=>$kojab, 'unit'=>$unit, 'pendidikan'=>$pendidikan );
            // unset($datalogin->pass);
            // $datalogin->denied_url = json_decode($datalogin->denied_url);
            if($datalogin){
                $this->session->set_userdata('sess_cbham', $datalogin);
                if($this->session->userdata('sess_cbham')){
                    $this->session->set_flashdata('flash_msg',succ_msg('Anda telah berhasil login di Aplikasi HRMS PT. YODYA KARYA'));
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
    
    
}