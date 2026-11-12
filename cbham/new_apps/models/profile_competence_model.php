<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_competence_model extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->model('standart_competence_model');
    }

    public function search_profile($nik,$periode,$tahun)
    {
        if(empty($nik)) return null;
        $competence_pegawai = $this->db->from('competence_pegawai')
            ->where('nik',$nik)
            ->where('tahun',$tahun)
            ->where('periode',$periode)
            ->get()
            ->row();
        if(!empty($competence_pegawai->id)){
            $competence_pegawai_detail = $this->db->from('competence_pegawai_detail');
            $competence_pegawai_detail->where('competence_pegawai_id',$competence_pegawai->id);
            $competence_pegawai->detail = $competence_pegawai_detail->get()->result();
            return $competence_pegawai;
        }
        return null;
    }

    public function get_pegawai($nik){
        return $this->db->where('pegawai.nik',$nik)
            ->select('pegawai.*,unit.namaunit,atasan.nama as nama_atasan')
            ->join('unit','pegawai.unit = unit.kunit','left')
            ->join('strukturjab','strukturjab.kojab2 = pegawai.jabatan','left')
            ->join('pegawai as atasan','atasan.jabatan = strukturjab.kojab1','left')
            ->get('pegawai')
            ->row();
    }

    public function get_atasan($kojab){
        return $this->db->where('kojab1',$kojab)
            ->select('pegawai.*')
            ->join('unit','pegawai.unit = unit.kunit','left')
            ->get('strukturjab')
            ->row();
    }

    public function update($id, $data){
        $this->db->update('competence_pegawai',$data,['id'=>$id]);
        return $this->db->affected_rows();
    }

    public function insert($data){
        $this->db->insert('competence_pegawai',$data);
        return $this->db->insert_id();
    }

    public function insert_batch($data){
        return $this->db->insert_batch('competence_pegawai_detail',$data);
    }

    public function delete_competence_pegawai_detail($id)
    {
        if(empty($id)) return null;
        $query = $this->db->from('competence_pegawai_detail');
        $query->where('competence_pegawai_id',$id);
        return $query->delete();
    }

    public function get_profile_evaluation($nik,$tahun){
        $result = [
            'status'=>false,
            'message'=>'Internal Server Error',
            'data'=> [],
        ];

        $pegawai = $this->get_pegawai($nik);

        if(empty($pegawai->id)){
            $result['message'] = 'Data Pegawai tidak ditemukan!';
            return $result;
        }

        $competence_standart = $this->standart_competence_model->search_competence($pegawai->jabatan);

        if(count($competence_standart) == 0 ){
            $result['message'] = 'Data Standart Kompetensi tidak ditemukan, mohon lakukan pengisian kompetensi dahulu!';
            return $result;
        }

        foreach ($competence_standart as $item){
            $item->real_value_one = 0;
            $item->gap_one = 0;
            $item->real_value_two = 0;
            $item->gap_two = 0;
            $item->value = (int) $item->value;
            $competence_data[] = $item;
        }

        $competence_pegawai = $this->search_profile_evaluation($nik,$tahun);
        $last_competence_pegawai = null;

        foreach ($competence_pegawai as $competence_pegawai_item){
            foreach ($competence_pegawai_item->detail as $item){
                foreach ($competence_data as $key => $competence_item){
                    if($item->competence_code == $competence_item->competence_code){
                        if($competence_pegawai_item->periode == 1){
                            $gap = $competence_standart[$key]->value - $item->value;
                            $competence_standart[$key]->real_value_one = $item->value;
                            $competence_standart[$key]->gap_one = $gap < 0 ? '+'.($gap*-1) : $gap;
                        }else if($competence_pegawai_item->periode == 2){
                            $gap = $competence_standart[$key]->value - $item->value;
                            $competence_standart[$key]->real_value_two = $item->value;
                            $competence_standart[$key]->gap_two = $gap < 0 ? '+'.($gap*-1) : $gap;
                        }
                    }
                }
            }
            unset($competence_pegawai_item->detail);
            $last_competence_pegawai = $competence_pegawai_item;
        }

        $result['data']['pegawai'] = $pegawai;
        $result['data']['competence'] = $competence_data;
        $result['data']['competence_pegawai'] = $last_competence_pegawai;
        $result['data']['tahun'] = $tahun;

        $result['status'] = true;
        $result['message'] = null;

        return $result;
    }

    public function search_profile_evaluation($nik,$tahun)
    {
        if(empty($nik)) return null;
        $competence_pegawai = $this->db->from('competence_pegawai')
            ->where('nik',$nik)
            ->where('tahun',$tahun)
            ->order_by('periode','desc')
            ->get()
            ->result();

        $result = [];

        foreach ($competence_pegawai as $data){
            $competence_pegawai_detail = $this->db->from('competence_pegawai_detail');
            $competence_pegawai_detail->where('competence_pegawai_id',$data->id);
            $data->detail = $competence_pegawai_detail->get()->result();
            $result[] = $data;
        }

        return $result;
    }

    var $column_order = array(
        'competence_pegawai.nik',
        'pegawai.nama',
        'jabatan.namajabatan',
        'unit.namaunit',
        'competence_pegawai.periode',
        'competence_pegawai.tahun',
        'competence_pegawai.created_at',
        'competence_pegawai.created_by',
        'competence_pegawai.updated_at',
        'competence_pegawai.updated_by',
    ); //set column field database for datatable orderable
    var $column_search = array(
        'competence_pegawai.nik',
        'pegawai.nama',
    ); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('competence_pegawai.updated_at' => 'desc'); // default order

    private function _get_datatables_query()
    {

        $this->db->select("competence_pegawai.*,pegawai.nama,jabatan.namajabatan,unit.namaunit");
        $this->db->from("competence_pegawai");
        $this->db->join('pegawai','pegawai.nik = competence_pegawai.nik','left');
        $this->db->join('unit','pegawai.unit = unit.kunit','left');
        $this->db->join('jabatan','pegawai.jabatan = jabatan.kojab','left');

        $queryLike = [];

        foreach ($this->column_search as $item) // loop column
        {
            if($_GET['search']) // if datatable send POST for search
            {
                $queryLike[] = $item." like '%".$_GET['search']."%'";
            }
        }

        if(count($queryLike) > 0){
            $this->db->where('('.implode(' OR ',$queryLike).')');
        }

        if($_GET['jabatan']) $this->db->where('pegawai.jabatan',$_GET['jabatan']);
        if($_GET['unit']) $this->db->where('pegawai.unit',$_GET['unit']);

        if(isset($_GET['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_GET['length'] != -1)
            $this->db->limit($_GET['length'], $_GET['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('competence_pegawai');
        return $this->db->count_all_results();
    }

}