<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Standart_Competence extends MY_Controller {

    var $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->model('jabatan_model');
        $this->load->model('standart_competence_model');
    }

    function index() {
        $data['title'] = 'Standart Kompetensi';
        $data['jabatan'] = $this->jabatan_model->getdatajabatan('');
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['competence'] = $this->standart_competence_model->get_competence();
        $data['competence_section'] = $this->standart_competence_model->get_competence_section();
        $this->template->display('standart_competence/index', $data);
    }

    public function get_data($kojab)
    {
        $data = $this->standart_competence_model->search_competence($kojab);
        echo json_encode($data);
    }

    public function save($kojab)
    {
        $result = [
            'status'=>false,
            'message'=>'Internal Server Error',
            'data'=> [],
        ];

        $competence = $this->standart_competence_model->get_competence();

        $data = [];

        foreach ($competence as $item){
            $input_competence = $this->input->post($item->code);
            if(!empty($input_competence) || $input_competence === '0'){
                $data[]=[
                    'category'=>$item->category,
                    'kojab'=>$kojab,
                    'competence_code'=> $item->code,
                    'value'=> $input_competence,
                    'created_by'=>getSession('user'),
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ];
            }
        }

        if(count($data) > 0){
            $result['status'] =$this->standart_competence_model->delete_competence($kojab);
            if(!$result['status']){
                $result['message'] = 'Failed clean competence std';
                echo json_encode($result);
                return;
            }
            $result['status'] = $this->standart_competence_model->insert_batch($data);
            if(!$result['status']){
                $result['message'] = 'Failed insert competence std';
                echo json_encode($result);
                return;
            }
            $result['message'] = 'Data Berhasil disimpan!';
        }else{
            if(!$result['status']){
                $result['message'] = 'Daftar Kompetensi Harus Diisi!';
                echo json_encode($result);
                return;
            }
        }

        $result['data'] = $data;

        echo json_encode($result);
        return;
    }

    function download($kojab) {
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        $data['competence'] = $this->standart_competence_model->search_competence($kojab);
        $data['jabatan'] = $this->jabatan_model->get_data($kojab);
        $this->load->view('standart_competence\download',$data);
    }

}
?>