<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_master','mm');
    }

    function index() {
        $data['title'] = 'Komposisi Kebutuhan Petugas Darat';
        if (isset($_GET['tahun'])) echo $_GET['tahun'];
        if (isset($_GET['stat'])) echo $_GET['stat'];
        if (isset($_GET['phase'])) echo $_GET['phase'];
        if (isset($_GET['lokasi'])) echo $_GET['lokasi'];
        if (isset($_GET['stat']) || isset($_GET['phase']) || isset($_GET['lokasi'])) exit();
        $data['lokasi'] = $this->mk->getLokasi();
        $data['station'] = $this->mk->getStation();
        $data['pekerjaan'] = $this->mk->getPekerjaan();
        $data['all'] = $this->mk->getAll();
        $this->template->display('komposisi/v_komposisi', $data);
    }

    function station(){
        $data['title'] = 'Master Station';
        $data['station'] = $this->mm->getStation();
        $this->template->display('master/v_station', $data);
    }

    function lokasi(){
        $data['title'] = 'Master Lokasi';
        $data['lokasi'] = $this->mm->getLokasi();
        $this->template->display('master/v_lokasi', $data);
    }

    function pekerjaan(){
        $data['title'] = 'Master Pekerjaan';
        $data['pekerjaan'] = $this->mm->getPekerjaan();
        $this->template->display('master/v_pekerjaan', $data);
    }

	function add($type) {
        switch ($type) {
            case 'station':
                $data['type'] = 'station';
                $data['title'] = 'Tambah Station';
                break;
            case 'pekerjaan':
                $data['type'] = 'pekerjaan';
                $data['title'] = 'Tambah Station';
                break;
            case 'lokasi':
                $data['type'] = 'lokasi';
                $data['title'] = 'Tambah Station';
                break;
        }
        $this->template->display('master/v_add', $data);

        // if(!$this->input->post()){
        //     $data['lokasi'] = $this->mk->getLokasi();
        //     $data['station'] = $this->mk->getStation();
        //     $data['pekerjaan'] = $this->mk->getPekerjaan();
        // 	$this->template->display('komposisi/v_add_komposisi', $data);
        // }
        // else {
        // 	$input = $this->input->post();
        // 	$status = $this->mk->insert_komposisi($input);
        //     if($status==TRUE){
        //         $this->session->set_flashdata('flash_msg',succ_msg('Komposisi berhasil disimpan'));
        //     } else {
        //         $this->session->set_flashdata('flash_msg',err_msg('Komposisi gagal disimpan'));
        //     }
        //     redirect('komposisi');
        // }
    }

    function insert($type) {
        $input = $this->input->post();
        switch ($type) {
            case 'station':
                $status = $this->mm->insert($type,$input);  
                break;
            case 'pekerjaan':
                $status = $this->mm->insert($type,$input);  
                break;
            case 'lokasi':
                $status = $this->mm->insert($type,$input);  
                break;
        }
        if($status==TRUE){
            $this->session->set_flashdata('flash_msg',succ_msg($type.' berhasil disimpan'));
        } else {
            $this->session->set_flashdata('flash_msg',err_msg($type.' gagal disimpan'));
        }
        redirect('master/'.$type);
    }

    function delete_station($id=""){
        $action = $this->mm->delete_station($id);
        if($action == TRUE) $this->session->set_flashdata('flash_msg', succ_msg('Data berhasil dihapus.'));
        else $this->session->set_flashdata('flash_msg', err_msg('Terjadi kesalahan, coba beberapa saat lagi'));     
        redirect($_SERVER['HTTP_REFERER']);
    }

    function delete_lokasi($id=""){
        $action = $this->mm->delete_lokasi($id);
        if($action == TRUE) $this->session->set_flashdata('flash_msg', succ_msg('Data berhasil dihapus.'));
        else $this->session->set_flashdata('flash_msg', err_msg('Terjadi kesalahan, coba beberapa saat lagi'));     
        redirect($_SERVER['HTTP_REFERER']);
    }

    function delete_pekerjaan($id=""){
        $action = $this->mm->delete_pekerjaan($id);
        if($action == TRUE) $this->session->set_flashdata('flash_msg', succ_msg('Data berhasil dihapus.'));
        else $this->session->set_flashdata('flash_msg', err_msg('Terjadi kesalahan, coba beberapa saat lagi'));     
        redirect($_SERVER['HTTP_REFERER']);
    }

    function delete($type,$id) {
        // $input = $this->input->post();
        switch ($type) {
            case 'station':
                $status = $this->mm->delete($type,$id);  
                break;
            case 'pekerjaan':
                $status = $this->mm->delete($type,$id);  
                break;
            case 'lokasi':
                $status = $this->mm->delete($type,$id);  
                break;
        }
        if($status>0){
            $this->session->set_flashdata('flash_msg',succ_msg($type.' berhasil dihapus'));
        } else {
            $this->session->set_flashdata('flash_msg',err_msg($type.' gagal dihapus'));
        }
        // redirect('master/'.$type);
        redirect($_SERVER['HTTP_REFERER']); 
    }

    function update($type,$id) {
        if(!$this->input->post()){
            switch ($type) {
            case 'station':
                $data['type'] = 'station';
                $data['title'] = 'Update Station';  
                $data['row'] = $this->mm->getStationbyId($id);  
                break;
            case 'pekerjaan':
                $data['type'] = 'pekerjaan';
                $data['title'] = 'Update Pekerjaan';
                $data['row'] = $this->mm->getPekerjaanbyId($id);   
                break;
            case 'lokasi':
                $data['type'] = 'lokasi';
                $data['title'] = 'Update Lokasi'; 
                $data['row'] = $this->mm->getLokasibyId($id);   
                break;
            }
            $this->template->display('master/v_edit', $data);
        } else {
            $input = $this->input->post();
            switch ($type) {
                case 'station':
                    $status = $this->mm->update($type,$input);  
                    break;
                case 'pekerjaan':
                    $status = $this->mm->update($type,$input);  
                    break;
                case 'lokasi':
                    $status = $this->mm->update($type,$input);  
                    break;
            }
            if($status>0){
                $this->session->set_flashdata('flash_msg',succ_msg($type.' berhasil diupdate'));
            } else {
                $this->session->set_flashdata('flash_msg',err_msg($type.' gagal diupdate'));
            }
            redirect('master/'.$type);
        }
    }
    
}