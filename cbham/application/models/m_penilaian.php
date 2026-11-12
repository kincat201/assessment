<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_penilaian extends CI_Model{

	 public function protect($str)
    {
        return "'".$this->db->escape_str($str)."'";
    }

    public function protectLike($str)
    {
        return "'%".$this->db->escape_str($str)."%'";
    }

    public function protectLikeAwal($str)
    {
        return "'%".$this->db->escape_str($str)."'";
    }

    public function protectLikeAkhir($str)
    {
        return "'".$this->db->escape_str($str)."%'";
    }

	public function getPenilaianAll(){
		$param = $this->input->get();
		$sql = 'SELECT k.*, mk.*, p.nama, p.unit FROM komposisi k 
				JOIN map_komposisi mk 
				ON k.id_komposisi = mk.id_komposisi'; 

		if($param){
			if(isset($param['tahun'])) {
                if($param['tahun']!=''&&$param['tahun']!='all') {
                    $sql .= " AND k.tahun = " .$this->protect($param['tahun']) ;
                }
            }
            if(isset($param['stat'])) {
                if($param['stat']!='') {
                    $sql .= " AND k.id_station = " .$this->protect($param['stat']) ;
                }
            }
            if(isset($param['phase'])) {
                if($param['phase']!='') {
                    $sql .= " AND k.phase = " .$this->protect($param['phase']) ;
                }
            }
            if(isset($param['lokasi'])) {
                if($param['lokasi']!='') {
                    $sql .= " AND k.id_lokasi = " .$this->protect($param['lokasi']) ;
                }
            }
		} 

		$sql .= ' JOIN petugas p ON mk.nopeg = p.nopeg ORDER BY k.id_komposisi, k.phase, mk.no_shift, mk.index';
		
	    $query = $this->db->query($sql);
		return $query->result(); 
	}

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

	public function cekKomposisi($param){
		$query = "select * from komposisi where id_komposisi = ?";
		$ret = $this->db->query($query, $param);
		return $ret->result();
	}

	public function insert_komposisi($data){
		$sql = "insert into komposisi values (?,?,?,?,?,?,?,?,?,?)";
		$status=$this->db->query($sql,array('',$data['k_pekerjaan'],$data['stat'],$data['lokasi'],$data['phase'],$data['tahun'],$data['jumlah_petugas'],$data['shift'],$data['id_pekerjaan'],$data['keterangan']));
		if (!$status) { 
			return FALSE;
		} else { return TRUE; } 
	}

	public function get_data_komposisi_by_id($id){
		$sql = "select  * from komposisi where id_komposisi = ?";
        $exec = $this->db->query($sql,$id);
        $hasil =$exec->result();
        
        return $hasil;
	}

	public function add_penilaian($param){
		for ($i=1; $i <= count($param['id_komposisi']); $i++) { 
			$data = array(
			   'nilai' => $param['nilai'][$i],
			   'keterangan' => $param['keterangan'][$i],
			);
			$this->db->where('id_komposisi', $param['id_komposisi'][$i]);
			$this->db->where('nopeg', $param['nopeg'][$i]);
			$this->db->where('no_shift', $param['no_shift'][$i]);
			$this->db->where('index', $param['index'][$i]);
			$status = $this->db->update('map_komposisi', $data); 
			if (!$status) {
				$err+=1;
			}
		}
		if ($err>0) {
			return FALSE;
		} else return TRUE;
	}

	function get_map_komposisi($id_komposisi, $shift){
		$sql = 'SELECT * FROM map_komposisi m WHERE id_komposisi = ? AND no_shift = ? ORDER BY m.index ASC';
		$exec = $this->db->query($sql,array($id_komposisi,$shift));
        $hasil =$exec->result(); 
        return $hasil;
	}

	function delete_map($id_komposisi){
		$this->db->where('id_komposisi',$id_komposisi);
		$action = $this->db->delete("map_komposisi");
		if($action) return TRUE;
		else return FALSE;
	}

	function cek_petugas($nopeg){
		$sql = "SELECT * FROM petugas WHERE nopeg = ?";
		$exec = $this->db->query($sql, $nopeg);
        $hasil = $exec->result(); 
        return $hasil;
	}

	public function getDetail($param){
		$query = "select * from petugas where nopeg = ?";
		$ret = $this->db->query($query, $param);
		return $ret->result();
	}

	function get_detail_kerja($param){
		$sql = "SELECT k.*, mk.*, p.nama, p.unit FROM komposisi k 
				JOIN map_komposisi mk 
				ON k.id_komposisi = mk.id_komposisi AND k.tahun = ? AND k.id_station = ? AND k.phase = ? AND k.id_lokasi = ? 
				JOIN petugas p
				ON mk.nopeg = p.nopeg
				ORDER BY k.id_komposisi, k.phase, mk.no_shift, mk.index";
		$exec = $this->db->query($sql,array($param['tahun'], $param['stat'], $param['phase'], $param['lokasi']));
        $hasil =$exec->result(); 
        return $hasil;
	}

	function get_detail_kerja_by_id($param){
		$sql = "SELECT k.*, mk.*, p.nama, p.unit FROM komposisi k 
				JOIN map_komposisi mk 
				ON k.id_komposisi = mk.id_komposisi AND k.id_komposisi = ? 
				JOIN petugas p
				ON mk.nopeg = p.nopeg
				ORDER BY k.id_komposisi, k.phase, mk.no_shift, mk.index";
		$exec = $this->db->query($sql,$param);
        $hasil =$exec->result(); 
        return $hasil;
	}

	function getPenilaianIndividu($nopeg){
		$sql = "SELECT k.*, mk.* FROM komposisi k, map_komposisi mk 
				WHERE k.id_komposisi = mk.id_komposisi AND mk.nopeg = ?
				ORDER BY k.id_komposisi, k.phase, mk.no_shift, mk.index, k.tahun desc";
		$exec = $this->db->query($sql,$nopeg);
        $hasil =$exec->result(); 
        return $hasil;

	}
}