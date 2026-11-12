<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_master extends CI_Model{

	public function getLokasi(){
		$query = $this->db->get('m_lokasi');
		return $query->result();
	}

	public function getStation(){
		$query = $this->db->get('m_station');
		return $query->result();
	}

	public function getPekerjaan(){
		$query = $this->db->get('m_pekerjaan');
		return $query->result();
	}

	public function getLokasibyId($id){
		$query = $this->db->get_where('m_lokasi', array('id_lokasi' => $id));
		return $query->result();
	}

	public function getStationbyId($id){
		$query = $this->db->get_where('m_station', array('id_station' => $id));
		return $query->result();
	}

	public function getPekerjaanbyId($id){
		$query = $this->db->get_where('m_pekerjaan', array('id_pekerjaan' => $id));
		return $query->result();
	}

	public function insert($type,$data){
		switch ($type) {
            case 'station':
                $sql = "insert into m_station values (?,?,?)";
				$status=$this->db->query($sql,array('',$data['desc'],$data['kode']));
                break;
            case 'pekerjaan':
                $sql = "insert into m_pekerjaan values (?,?,?)";
				$status=$this->db->query($sql,array('',$data['desc'],$data['kode']));
                break;
            case 'lokasi':
                $sql = "insert into m_lokasi values (?,?,?)";
				$status=$this->db->query($sql,array('',$data['desc'],$data['kode']));
                break;
        }
		if (!$status) { 
			return FALSE;
		} else { return TRUE; } 
	}

	public function delete_station($id){		
		$this->db->where('id_station',$id);
		$action = $this->db->delete("m_station");
		if($action) return TRUE;
		else return FALSE;
	}

	public function delete_lokasi($id){		
		$this->db->where('id_lokasi',$id);
		$action = $this->db->delete("m_lokasi");
		if($action) return TRUE;
		else return FALSE;
	}

	public function delete_pekerjaan($id){		
		$this->db->where('id_pekerjaan',$id);
		$action = $this->db->delete("m_pekerjaan");
		if($action) return TRUE;
		else return FALSE;
	}

	public function delete($type,$id){
		switch ($type) {
            case 'station':            	
                $sql = "delete from m_station where id_station = ?";
				$status=$this->db->query($sql,$id);

    //         	$this->db->where('id_station',$id);
				// $action = $this->db->delete("m_station");
				// if($action) return TRUE;
				// else return FALSE;

                break;
            case 'pekerjaan':
                $sql = "delete from m_pekerjaan where id_pekerjaan = ?";
				$status=$this->db->query($sql,$id);
                break;
            case 'lokasi':
                $sql = "delete from m_lokasi where id_lokasi = ?";
				$status=$this->db->query($sql,$id);
                break;
        }
		return $this->db->affected_rows();
	}

	public function update($type,$param){
		switch ($type) {
            case 'station':
                $sql = "update m_station set station = ?, k_station = ? where id_station = ?";
				$status=$this->db->query($sql,array($param['desc'],$param['kode'],$param['id']));
                break;
            case 'pekerjaan':
                $sql = "update m_pekerjaan set pekerjaan = ?, k_pekerjaan = ? where id_pekerjaan = ?";
				$status=$this->db->query($sql,array($param['desc'],$param['kode'],$param['id']));
                break;
            case 'lokasi':
                $sql = "update m_lokasi set lokasi = ?, k_lokasi = ? where id_lokasi = ?";
				$status=$this->db->query($sql,array($param['desc'],$param['kode'],$param['id']));
                break;
        }
		return $this->db->affected_rows();
	}


}