<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penilaian extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_penilaian','mp');
    }

    function index(){
        redirect('penilaian/add_penilaian');
    }

    function add_penilaian() {
        // $data['title'] = 'Penilaian Petugas Darat';
        // $data['lokasi'] = $this->mp->getLokasi();
        // $data['station'] = $this->mp->getStation();
        // $data['pekerjaan'] = $this->mp->getPekerjaan();
        $data['title'] = 'Penilaian Petugas Darat';
        if (!$this->input->post()) {
            $this->template->display('penilaian/v_add_penilaian', $data);
        } else {
            $search = $this->input->post();
            // print_r($search); exit();
            $data['search'] = $search;
            // $data['detail'] = $this->mp->get_detail_kerja($search);
            $this->template->display('penilaian/v_add_penilaian', $data);
        }
    }

	function add_act() {
    	$input = $this->input->post();
    	$status = $this->mp->add_penilaian($input);
        if($status==TRUE){
            $this->session->set_flashdata('flash_msg',succ_msg('Penilaian berhasil disimpan'));
        } else {
            $this->session->set_flashdata('flash_msg',err_msg('Penilaian gagal disimpan'));
        }
        redirect('penilaian/hasil_penilaian');
    }

    function hasil_penilaian(){
        $data['title'] = 'Hasil Penilaian All Petugas Darat';
        $data['lokasi'] = $this->mp->getLokasi();
        $data['station'] = $this->mp->getStation();
        $data['pekerjaan'] = $this->mp->getPekerjaan();
        $data['all'] = $this->mp->getPenilaianAll();
        $this->template->display('penilaian/v_hasil_penilaian', $data);
    }

    function hasil_penilaian_individu(){
        $data['title'] = 'Hasil Penilaian Petugas Darat per Individu';
        if (!$this->input->post()) {
            $this->template->display('penilaian/v_hasil_penilaian_individu', $data);
        } else {
            $search = $this->input->post();
            $data['petugas'] = $this->mp->getDetail($search['allnopeg']);
            $data['detail'] = $this->mp->getPenilaianIndividu($search['allnopeg']);
            $this->template->display('penilaian/v_hasil_penilaian_individu', $data);
        }
    }

     function add_penilaian_by_id($id) {
        $data['title'] = 'Penilaian Petugas Darat';
        $data['detail'] = $this->mp->get_detail_kerja_by_id($id);
        $this->template->display('penilaian/v_add_penilaian_by_id', $data);
    }
    
}