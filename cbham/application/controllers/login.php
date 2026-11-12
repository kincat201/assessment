<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if(!$this->session->userdata('sess_cbham')){
            $this->load->view('login/login');
        } else {
            redirect('/');
        }
    }

    function do_login() {
        if ($this->input->post()) {
            $this->load->model('M_auth', 'auth');
            $this->auth->member_login();
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->load->model('M_auth', 'auth');
        $this->auth->member_logout();
        redirect('login');
    }

}