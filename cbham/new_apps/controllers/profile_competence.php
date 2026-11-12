<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile_Competence extends MY_Controller {

    var $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->model('jabatan_model');
        $this->load->model('standart_competence_model');
        $this->load->model('profile_competence_model');
        $this->load->model('pegawai_model');
        $this->load->model('m_auth');
        $this->load->model('unit_model');
    }

    function index() {
        $data['title'] = 'Profile Kompetensi';
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getbawahan();
        $this->template->display('profile_competence/index', $data);
    }

    public function get_data($nik,$periode,$tahun)
    {
        $result = [
            'status'=>false,
            'message'=>'Internal Server Error',
            'data'=> [],
        ];

        $pegawai = $this->profile_competence_model->get_pegawai($nik);

        if(empty($pegawai->id)){
            $result['message'] = 'Data Pegawai tidak ditemukan!';
            echo json_encode($result);
            return;
        }

        $competence_standart = $this->standart_competence_model->search_competence($pegawai->jabatan);

        $competence_data = [];

        if(count($competence_standart) == 0 ){
            $result['message'] = 'Data Standart Kompetensi tidak ditemukan, mohon lakukan pengisian standart kompetensi dahulu!';
            echo json_encode($result);
            return;
        }

        foreach ($competence_standart as $item){
            $item->real_value = 0;
            $item->gap = 0;
            $item->value = (int) $item->value;
            $competence_data[] = $item;
        }

        $competence_pegawai = $this->profile_competence_model->search_profile($nik,$periode,$tahun);

        $result['data']['competence_pegawai'] = null;

        if(!empty($competence_pegawai)){
            $result['data']['competence_pegawai'] = $competence_pegawai;
            foreach ($competence_pegawai->detail as $item){
                foreach ($competence_data as $key => $competence_item){
                    if($item->competence_code == $competence_item->competence_code){
                        $competence_standart[$key]->real_value = $item->value;
                        $gap = $competence_item->value - $item->value;
                        $competence_standart[$key]->gap = $gap < 0 ? '+'.($gap*-1) : $gap;
                    }
                }
            }
        }

        $result['data']['competence'] = $competence_data;

        $result['status'] = true;
        $result['message'] = null;

        echo json_encode($result);
        return;
    }

    public function save()
    {
        $result = [
            'status'=>false,
            'message'=>'Internal Server Error',
            'data'=> [],
        ];

        $month = date('m');
        // periode evaluasi january & juli

        $CI =& get_instance();
        if(!in_array((int) $month,[1,7]) && !in_array(getSession('user_id'),$CI->config->item('super_admin'))){
            $result['message'] = 'Periode Penilian hanya terbuka pada bulan January dan Juli!';
            echo json_encode($result);
            return;
        }

        $data_competence_pegawai = [
            'nik'=>$this->input->post('nik'),
            'periode'=>$this->input->post('periode'),
            'tahun'=>$this->input->post('tahun'),
            'kekuatan'=>$this->input->post('kekuatan'),
            'kelemahan'=>$this->input->post('kelemahan'),
            'rencana'=>$this->input->post('rencana'),
            'notes'=>$this->input->post('notes'),
            'penanggung_jawab'=>$this->input->post('penanggung_jawab'),
            'jadwal'=>$this->input->post('jadwal'),
            'komentar'=>$this->input->post('komentar'),
            'updated_by'=>getSession('user'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];

        $competence = $this->standart_competence_model->get_competence();

        $data = [];

        foreach ($competence as $item){
            $input_competence = $this->input->post($item->code);
            if(!empty($input_competence) || $input_competence === '0'){
                $data[]=[
                    'competence_pegawai_id'=>null,
                    'competence_code'=> $item->code,
                    'value'=> $input_competence,
                    'created_by'=>getSession('user'),
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ];
            }
        }

        if(count($data) > 0){

            $competence_pegawai = $this->profile_competence_model->search_profile(
                $data_competence_pegawai['nik'],
                $data_competence_pegawai['periode'],
                $data_competence_pegawai['tahun']
            );

            $competence_pegawai_id = null;

            if(!empty($competence_pegawai)){
                $update_data = $this->profile_competence_model->update($competence_pegawai->id,$data_competence_pegawai);
                if(!$update_data){
                    $result['message'] = 'Failed Update Profile Competence';
                    echo json_encode($result);
                    return;
                }
                $competence_pegawai_id = $competence_pegawai->id;
            }else{
                $data_competence_pegawai['created_at'] = date('Y-m-d H:i:s');
                $data_competence_pegawai['created_by'] = getSession('user');

                $insert_data = $this->profile_competence_model->insert($data_competence_pegawai);
                if(!$insert_data){
                    $result['message'] = 'Failed Insert Profile Competence';
                    echo json_encode($result);
                    return;
                }
                $competence_pegawai_id = $insert_data;
            }

            $result['status'] =$this->profile_competence_model->delete_competence_pegawai_detail($competence_pegawai_id);
            if(!$result['status'] || empty($competence_pegawai_id)){
                $result['message'] = 'Failed clean competence pegawai detail';
                echo json_encode($result);
                return;
            }

            foreach ($data as $key => $item){
                $data[$key]['competence_pegawai_id'] = $competence_pegawai_id;
            }

            $result['status'] = $this->profile_competence_model->insert_batch($data);

            if(!$result['status']){
                $result['message'] = 'Failed insert competence pegawai detail';
                echo json_encode($result);
                return;
            }

            $result['message'] = 'Data Berhasil disimpan!';
        }else{
            if(!$result['status']){
                $result['message'] = 'Daftar Profile Kompetensi Harus Diisi!';
                echo json_encode($result);
                return;
            }
        }

        $result['data'] = $data;

        echo json_encode($result);
        return;
    }

    function get_report($nik,$tahun){
        $data = $this->profile_competence_model->get_profile_evaluation($nik,$tahun);
        echo json_encode($data);
        return;
    }

    function download($nik,$tahun) {
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));

        $data = $this->profile_competence_model->get_profile_evaluation($nik,$tahun);
        if(!$data['status']){
            echo json_encode($data);
            return;
        }
        $this->load->view('profile_competence\download',$data['data']);
    }

    function evaluation() {
        $data['title'] = 'Evaluasi Profile Kompetensi';
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['pegawai'] = $this->pegawai_model->getbawahan();
        $this->template->display('profile_competence/evaluation', $data);
    }

    public function get_data_evaluation($nik,$tahun)
    {
        echo json_encode($this->profile_competence_model->get_profile_evaluation($nik,$tahun));
        return;
    }

    function report() {
        $data['title'] = 'Rekapitulasi Profile Kompetensi';
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['unit'] = $this->unit_model->getdataunit('');
        $data['jabatan'] = $this->jabatan_model->getdatajabatan('');
        $this->template->display('profile_competence/report', $data);
    }

    public function report_list()
    {

        $list = $this->profile_competence_model->get_datatables();
        $data = array();
        foreach ($list as $item) {
            $row = array();
            $row[] = $item->nik;
            $row[] = $item->nama;
            $row[] = $item->namajabatan;
            $row[] = $item->namaunit;
            $row[] = $item->periode;
            $row[] = $item->tahun;
            $row[] = $item->created_at;
            $row[] = $item->created_by;
            $row[] = $item->updated_at;
            $row[] = $item->updated_by;

            //add html for action

            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_cost('."'".$item->nik."'".')"><i class="fa fa-pencil"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_cost('."'".$item->nik."'".')"><i class="fa fa-trash-o"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_GET['draw'],
            "recordsTotal" => $this->profile_competence_model->count_all(),
            "recordsFiltered" => $this->profile_competence_model->count_filtered(),
            "data" => $data,
        );

        //output to json format
        echo json_encode($output);
    }

}
?>