<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komposisi extends MY_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->model('M_komposisi','mk');
    }

    function index() {
        $data['title'] = 'Komposisi Kebutuhan Petugas Darat';
        // $data['lokasi'] = $this->mk->getLokasi();
        // $data['station'] = $this->mk->getStation();
        // $data['pekerjaan'] = $this->mk->getPekerjaan();
        // $data['all'] = $this->mk->getAll();
        $this->template->display('komposisi/v_komposisi', $data);
    }

	function add() {
        $data['title'] = 'Tambah Komposisi Kebutuhan Petugas Darat';
        if(!$this->input->post()){
            $data['lokasi'] = $this->mk->getLokasi();
            $data['station'] = $this->mk->getStation();
            $data['pekerjaan'] = $this->mk->getPekerjaan();
        	$this->template->display('komposisi/v_add_komposisi', $data);
        }
        else {            
        	$input = $this->input->post();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('tahun', 'Tahun', 'required');
            $this->form_validation->set_rules('stat', 'Station', 'required');
            $this->form_validation->set_rules('phase', 'Phase', 'required');
            $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
            if ($this->form_validation->run() == FALSE) {
                //tidak memenuhi validasi
                $this->session->set_flashdata('flash_msg', warn_msg(validation_errors("<label class='error'>", "</label>")));
                redirect('komposisi/add');
            } else {
            	$status = $this->mk->insert_komposisi($input);
                if($status==TRUE){
                    $this->session->set_flashdata('flash_msg',succ_msg('Komposisi berhasil disimpan'));
                } else {
                    $this->session->set_flashdata('flash_msg',err_msg('Komposisi gagal disimpan'));
                }
                redirect('komposisi');
            }
        }
    }

    function edit($id){

        $data['title'] = "Edit Komposisi Kebutuhan Petugas Darat";
        if(!$this->input->post()){
            $data['lokasi'] = $this->mk->getLokasi();
            $data['station'] = $this->mk->getStation();
            $data['pekerjaan'] = $this->mk->getPekerjaan();
            $data['data'] = $this->mk->get_data_komposisi_by_id($id);
            $this->template->display('komposisi/v_edit', $data);
        }
        else {
            $input = $this->input->post();
            $status = $this->mk->insert_komposisi($input);
            if($status==TRUE){
                $this->session->set_flashdata('flash_msg',succ_msg('Komposisi berhasil disimpan'));
            } else {
                $this->session->set_flashdata('flash_msg',err_msg('Komposisi gagal disimpan'));
            }
            redirect('komposisi');
        }        
    }

    public function update_data(){
        $data['data'] = $this->input->post();
        // $this->form_validation->set_rules('k_pekerjaan', 'Kode Pekerjaan', 'required');
        // if ($this->form_validation->run() == TRUE) {
                $update_data = $this->mk->update_data($this->input->post());
                if ($update_data == TRUE) {
                    $this->session->set_flashdata('flash_msg', succ_msg('Data Komposisi succesfully updated'));
                } else {
                    // $data['err'] = err_msg($this->db->error_message());
                    $this->session->set_flashdata('flash_msg', err_msg('<strong>Update unsuccesful !</strong><br />'.validation_errors()));
                }
            // } else {
            //     // $data['err'] = war_msg(validation_errors("<label class='error'>", "</label>"));
            //     $this->session->set_flashdata('flash_msg', err_msg('<strong>error form validation !</strong><br />'.validation_errors()));
            // }
        // }
        redirect('komposisi');
    }

    public function delete($k_pekerjaan="")
    {
        // $k_pekerjaan = $this->uri->segment(4);
        // echo $k_pekerjaan; exit();
        $action = $this->mk->delete($k_pekerjaan);
        if($action == TRUE) $this->session->set_flashdata('flash_msg', succ_msg('Data berhasil dihapus.'));
        else $this->session->set_flashdata('flash_msg', err_msg('Terjadi kesalahan, coba beberapa saat lagi'));     
        redirect($_SERVER['HTTP_REFERER']);             
    }


    function add_petugas($param=''){
        $data['title'] = 'Tambah Petugas Komposisi';
        
        if(!$this->input->post()){
            $detail = $this->mk->get_data_komposisi_by_id($param);
            // $data['mapping'] = $this->mk->get_map_komposisi($param);
            if($detail[0]->shift!=0 || $detail[0]->jumlah_petugas!=0){
                $mod = $detail[0]->jumlah_petugas%$detail[0]->shift;
            }
            $data['map'] = array();
            for ($i=1; $i <= $detail[0]->shift; $i++) { 
                if($i <= $mod ){
                    $data['map'][$i] = floor($detail[0]->jumlah_petugas/$detail[0]->shift) + 1;
                } else {
                    $data['map'][$i] = floor($detail[0]->jumlah_petugas/$detail[0]->shift);
                }
            }
            $data['input'] = $detail;
            $this->template->display('komposisi/v_tambah_petugas', $data);
        }
        else{
            $input = $this->input->post();
            $mod = $input['jumlah_petugas']%$input['shift'];
            $data['map'] = array();
            for ($i=1; $i <= $input['shift']; $i++) { 
                if($i <= $mod ){
                    $data['map'][$i] = floor($input['jumlah_petugas']/$input['shift']) + 1;
                } else {
                    $data['map'][$i] = floor($input['jumlah_petugas']/$input['shift']);
                }
            }
            $data['input'] = $input;
            $this->template->display('komposisi/v_add_petugas', $data);
        }
        
    }

    function add_petugas_act(){
        $input = $this->input->post();
        $cekKom = $this->mk->cekKomposisi($input['k_pekerjaan']);
        $input['cek'] = $cekKom;
        $status = $this->mk->insert_map_komposisi($input);
        if (!$status) {
              // if query returns null
          $msg = $this->db->_error_message();
          $num = $this->db->_error_number();
          if ($num==1062) {
                $this->session->set_flashdata('flash_msg',err_msg('Terjadi duplikat data'));
            }
            else{
                $this->session->set_flashdata('flash_msg',err_msg('Petugas gagal ditambahkan'));
            }
        }else {
            $this->session->set_flashdata('flash_msg',succ_msg('Petugas berhasil ditambahkan'));
        }
        redirect('komposisi');
    }

    function update_petugas(){
        $input = $this->input->post();
        // echo "<pre>";print_r($input); exit();
        $cekKom = $this->mk->cekKomposisi($input['id_komposisi']);
        $input['cek'] = count($cekKom);
        $del = $this->mk->delete_map($input['id_komposisi']);
        if($del==TRUE){
            // print_r($input); exit();
            $status = $this->mk->insert_map_komposisi($input);
            if (!$status) {
                  // if query returns null
              $msg = $this->db->_error_message();
              $num = $this->db->_error_number();
              if ($num==1062) {
                    $this->session->set_flashdata('flash_msg',err_msg('Terjadi duplikat data'));
                }
                else{
                    $this->session->set_flashdata('flash_msg',err_msg('Petugas gagal ditambahkan'));
                }
            }else {
                $this->session->set_flashdata('flash_msg',succ_msg('Petugas berhasil ditambahkan'));
            }
        }
        redirect('komposisi');
    }

     function get_auto_name()
    {
        $this->mk->get_auto_name();
    }



    function download(){
        $this->load->library('PHPExcel');
        $objPHPExcel = new PHPExcel();
        // $objConvert = new PHPExcel_Shared_PDF_tcpdf();
        $data = $this->mk->get_rekap_download();
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => '0000'),
                ),
            ),
        );
       
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Hajj Darat")
                                     ->setLastModifiedBy("Hajj Darat")
                                     ->setTitle("Summary Komposisi Hajj Darat")
                                     ->setSubject("Office 2007 XLSX Test Document")
                                     ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Test result file");

        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Station')
                    ->setCellValue('C1', 'Fungsi / Job Desc')
                    ->setCellValue('D1', 'Phase I')
                    ->setCellValue('E1', 'Phase II')
                    ->setCellValue('F1', 'Keterangan');

        $r = 1;
        $s = 1;
        for ($i=0; $i < count($data) ; $i++) {
            $r++;
            if($data[$i]->station!=@$data[$i-1]->station){
                $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$r, $s)
                        ->setCellValue('B'.$r, $data[$i]->station)
                        ->setCellValue('C'.$r, $data[$i]->pekerjaan)
                        ->setCellValue('D'.$r, $data[$i]->phase1)
                        ->setCellValue('E'.$r, $data[$i]->phase2)
                        ->setCellValue('F'.$r, @$data[$i]->keterangan);
                $s++;
            } else {
                $objPHPExcel->setActiveSheetIndex(0)
                        //->setCellValue('A'.$r, $i+1)
                        //->setCellValue('B'.$r, $data[$i]->station)
                        ->setCellValue('C'.$r, $data[$i]->pekerjaan)
                        ->setCellValue('D'.$r, $data[$i]->phase1)
                        ->setCellValue('E'.$r, $data[$i]->phase2)
                        ->setCellValue('F'.$r, @$data[$i]->keterangan);
            }
        }

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');
        $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:F'.$r)->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFill()
                                                        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                                                        ->getStartColor()->setARGB('FFFF');
        // $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(30);

        for ($col = 'A'; $col != 'G'; $col++) {
                $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
        }

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Summary_Komposisi_'.date('d').'_'.date('M').'_'.date('Y') );
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
        // print_r($data); 
    }
    
}