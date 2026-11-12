<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Petugas extends MY_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->model('M_petugas','mp');
        // $this->load->model('M_penilaian','mpn');
        $this->limit= 10;
    }

    function index() {
        $data['title'] = 'Data Petugas Darat';
        // $data['all'] = $this->mp->getAll();
        $this->template->display('petugas/v_petugas', $data);
    }

    function all(){
        $data['title'] = 'Data Petugas Darat';
        // $data['all'] = $this->mp->getAll();
        $this->template->display('petugas/v_petugas', $data);
    }

    function add() {
        $data['title'] = 'Tambah Petugas Darat';
        if(!$this->input->post()){
            $this->template->display('petugas/v_add_data', $data);
        }
        else {
            $input = $this->input->post();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nopeg', 'Nopeg', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('unit', 'Unit', 'required');
            if ($this->form_validation->run() == FALSE) {
                //tidak memenuhi validasi
                $this->session->set_flashdata('flash_msg', warn_msg(validation_errors("<label class='error'>", "</label>")));
                redirect('petugas/add');
            } else {
                $status = $this->mp->insert_petugas($input);
                if($status==TRUE){
                    $this->session->set_flashdata('flash_msg',succ_msg('Data Petugas berhasil disimpan'));
                } else {
                    $this->session->set_flashdata('flash_msg',err_msg('Data Petugas gagal disimpan'));
                }
                redirect('petugas');
            }
        }
    }

    function edit($nopeg='') {
        $data['title'] = 'Edit Petugas Darat';
        if(!$this->input->post()){
            // $data['lokasi'] = $this->mk->getLokasi();
            // $data['station'] = $this->mk->getStation();
            $data['petugas'] = $this->mp->getDetail($nopeg);
            $this->template->display('petugas/v_edit', $data);
        }
        else {

            $input = $this->input->post();
            $status = $this->mp->update_petugas($input);
            if($status==TRUE){
                $this->session->set_flashdata('flash_msg',succ_msg('Data Petugas berhasil diupdate'));
            } else {
                $this->session->set_flashdata('flash_msg',err_msg('Data Petugas gagal diupdate'));
            }
            redirect('petugas');
        }
    }

    function detail($nopeg='') {
        $data['title'] = 'Detail Petugas Darat';
        $data['petugas'] = $this->mp->getDetail($nopeg);
        $this->template->display('petugas/v_detail', $data);
    }

    public function delete($nopeg="") {
        // $status = $this->mp->deletePetugas($nopeg);
        // if($status>0){
        //     $this->session->set_flashdata('flash_msg',succ_msg('Data Petugas berhasil dihapus'));
        // } else {
        //     $this->session->set_flashdata('flash_msg',err_msg('Data Petugas gagal dihapus'));
        // }
        // echo $nopeg; exit();
        $action = $this->mp->deletePetugas($nopeg);
        if($action == TRUE) $this->session->set_flashdata('flash_msg', succ_msg('Data berhasil dihapus.'));
        else $this->session->set_flashdata('flash_msg', err_msg('Terjadi kesalahan, coba beberapa saat lagi'));     
        redirect($_SERVER['HTTP_REFERER']);  
    }

    function operasional(){
        $data['title'] = 'Petugas Operasional';
        if (!$this->input->post()) {
            $this->template->display('petugas/v_operasional', $data);
        } else {
            $search = $this->input->post();
            $data['petugas'] = $this->mp->getDetail($search['allnopeg']);
            $data['detail'] = $this->mp->get_operasional($search['allnopeg']);
            $this->template->display('petugas/v_operasional', $data);
        }
    }

    function penilaian(){
        $data['title'] = 'Penilaian Petugas Operasional';
        if (!$this->input->post()) {
            $this->template->display('petugas/v_penilaian_operasional', $data);
        } else {
            $search = $this->input->post();
            $data['petugas'] = $this->mp->getDetail($search['allnopeg']);
            $data['detail'] = $this->mp->get_operasional($search['allnopeg']);
            $this->template->display('petugas/v_penilaian_operasional', $data);
        }
        
    }

    function get_auto_name()
    {
        $this->mp->get_auto_name();
    }

    function report(){
        $data['title'] = 'Daftar Petugas Hajj'; 
        $data['lokasi'] = $this->mpn->getLokasi();
        $data['station'] = $this->mpn->getStation();
        $data['pekerjaan'] = $this->mpn->getPekerjaan();
        if (!$this->input->post()) {
            $this->template->display('petugas/v_report', $data);
        } else {
            $search = $this->input->post();
            $data['search'] = $search;
            $data['jum_shift'] = $this->mp->max_shift($search);
            $detail = $this->mp->detail_komposisi($search);
            for ($i=0; $i < count($detail); $i++) { 
                if($detail[$i]->shift!=0 || $detail[$i]->jumlah_petugas!=0){
                    $mod = $detail[$i]->jumlah_petugas%$detail[$i]->shift;
                }
                $map = array();
                for ($j=1; $j <= $detail[$i]->shift; $j++) { 
                    if($j <= $mod ){
                        $map[$j] = floor($detail[$i]->jumlah_petugas/$detail[$i]->shift) + 1;
                    } else {
                        $map[$j] = floor($detail[$i]->jumlah_petugas/$detail[$i]->shift);
                    }
                }
                $detail[$i]->max = max($map);
            }
            $data['detail'] = $detail;
            
            $this->template->display('petugas/v_report', $data);
        }
    }

    function download(){
        $search = $this->input->post();
        $jum_shift = $this->mp->max_shift($search);
        $detail = $this->mp->detail_komposisi($search);
        for ($i=0; $i < count($detail); $i++) { 
            if($detail[$i]->shift!=0 || $detail[$i]->jumlah_petugas!=0){
                $mod = $detail[$i]->jumlah_petugas%$detail[$i]->shift;
            }
            $map = array();
            for ($j=1; $j <= $detail[$i]->shift; $j++) { 
                if($j <= $mod ){
                    $map[$j] = floor($detail[$i]->jumlah_petugas/$detail[$i]->shift) + 1;
                } else {
                    $map[$j] = floor($detail[$i]->jumlah_petugas/$detail[$i]->shift);
                }
            }
            $detail[$i]->max = max($map);
        }
        // print_r($detail); exit();
        $arr = array('Nama','Nopeg','Unit');
        // print_r($arr); exit();

        $this->load->library('PHPExcel');
        $objPHPExcel = new PHPExcel();
    
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
                    ->setCellValue('A1', 'Tahun')
                    ->setCellValue('A2', 'Station')
                    ->setCellValue('A3', 'Phase')
                    ->setCellValue('A4', 'Lokasi')
                    ->setCellValue('B1', $search['tahun'])
                    ->setCellValue('B2', getDesc($search['stat'], 'station'))
                    ->setCellValue('B3', $search['phase'])
                    ->setCellValue('B4', getDesc($search['lokasi'], 'lokasi'));

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A6', 'No')
                    ->setCellValue('B6', 'Pekerjaan');
        
        $s =1;
        for ($col=3; $col <= 6; $col=$col+3) {
            $col2 = $col+2;
            $objPHPExcel->getActiveSheet()->mergeCells(agk2hrf($col).'6'.':'.agk2hrf($col2).'6'); 
            $t=0;
            for ($row=$col; $row < $col+3; $row++) { 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue(agk2hrf($col).'6', 'Shift-'.$s);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue(agk2hrf($row).'7', $arr[$t]);  
                $t++;
            }
            $s++;
        }

        $c = 8;
        for ($i=0; $i < count($detail); $i++) { 
            for ($j=1; $j <= $detail[$i]->max; $j++) { 
                if($j==1){ 
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$c, $i+1);//$i+1
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$c, getDesc($detail[$i]->id_pekerjaan, 'pekerjaan'));//getDesc($detail[$i]->id_pekerjaan, 'pekerjaan')
                } else {
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$c, '');//$i+1
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$c, '');//getDesc($detail[$i]->id_pekerjaan, 'pekerjaan')
                } 
                $petugas =$this->mp->get_detail($detail[$i]->id_komposisi,$j);
                $k = 0;
                for ($l=3; $l < (3*$jum_shift->jum_shift)+2; $l=$l+3) {
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue(agk2hrf($l).$c,  @$petugas[$k]->nama);//$i+1
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue(agk2hrf($l+1).$c,  @$petugas[$k]->nopeg);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue(agk2hrf($l+2).$c,  @$petugas[$k]->unit);
                    $k++;
                }
                $c++;
            }
        }

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Daftar Petugas');
        $objPHPExcel->getActiveSheet()->getStyle('A1:B4')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A6:'.agk2hrf($row-1).'7')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A6:'.agk2hrf($l-1).($c-1))->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->getStyle('A6:'.agk2hrf($row-1).'7')->getFill()
                                                        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                                                        ->getStartColor()->setARGB('FFFF');
        // $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(30);

        for ($col = 'A'; $col != agk2hrf($row-1); $col++) {
                $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
        }
        $objPHPExcel->getActiveSheet()->mergeCells('A6:A7');
        $objPHPExcel->getActiveSheet()->mergeCells('B6:B7');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Daftar_Petugas_Hajj_'.$search['tahun']);
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