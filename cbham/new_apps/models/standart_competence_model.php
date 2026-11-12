<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Standart_competence_model extends CI_Model{

    public function search_competence($kojab)
    {
        if(empty($kojab)) return null;
        $query = $this->db->from('competence_std');
        $query->select('competence_std.*, competence.name, competence.description, competence_details.level_1,
            competence_details.level_2,competence_details.level_3,competence_details.level_4,competence_details.level_5');
        $query->join('competence','competence.code = competence_std.competence_code');
        $query->join('competence_details','competence.code = competence_details.code','left');
        $query->where('kojab',$kojab);
        return $query->get()->result();
    }

    public function get_competence()
    {
        $query = $this->db->from('competence');
        return $query->get()->result();
    }

    public function get_competence_section()
    {
        $query = $this->db->from('competence_section');
        $section = $query->get()->result();

        $result = [];

        foreach ($section as $item){
            $detail = $this->db->from('competence_section_detail')
                ->select('competence.*')
                ->where('section_code',$item->section_code)
                ->join('competence','competence.code = competence_section_detail.competence_code')
                ->get()->result();
            $item->detail = $detail;
            $result[] = $item;
        }

        return $result;
    }

    public function delete_competence($kojab)
    {
        if(empty($kojab)) return null;
        $query = $this->db->from('competence_std');
        $query->where('kojab',$kojab);
        return $query->delete();
    }

    public function insert_batch($data){
        return $this->db->insert_batch('competence_std',$data);
    }

}