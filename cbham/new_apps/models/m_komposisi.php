<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_komposisi extends CI_Model{

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

	public function getAll(){
		$param = $this->input->get();
		$sql = 'SELECT * from komposisi where 1=1';
		if($param){
			if(isset($param['tahun'])) {
                if($param['tahun']!=''&&$param['tahun']!='all') {
                    $sql .= " AND tahun = " .$this->protect($param['tahun']) ;
                }
            }
            if(isset($param['stat'])) {
                if($param['stat']!='') {
                    $sql .= " AND id_station = " .$this->protect($param['stat']) ;
                }
            }
            if(isset($param['phase'])) {
                if($param['phase']!='') {
                    $sql .= " AND phase = " .$this->protect($param['phase']) ;
                }
            }
            if(isset($param['lokasi'])) {
                if($param['lokasi']!='') {
                    $sql .= " AND id_lokasi = " .$this->protect($param['lokasi']) ;
                }
            }
		} 
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
		$sql = "insert into komposisi values (?,?,?,?,?,?,?,?,?)";
		$status=$this->db->query($sql,array('',$data['stat'],$data['lokasi'],$data['phase'],$data['tahun'],$data['jumlah_petugas'],$data['shift'],$data['id_pekerjaan'],$data['keterangan']));
		if (!$status) { 
			return FALSE;
		} else { return TRUE; } 
	}

	public function insert_map_komposisi($data){
		// print_r($data); exit();
		if($data['cek']==NULL){
			$sql = "insert into komposisi values (?,?,?,?,?,?,?,?,?)";
			$act =$this->db->query($sql,array('',$data['stat'],$data['lokasi'],$data['phase'],$data['tahun'],$data['jumlah_petugas'],$data['shift'],$data['id_pekerjaan'],$data['keterangan']));
			
			$id = $this->db->insert_id();
			// exit();
			for ($i=1; $i <= count($data['nopeg']) ; $i++) {
				for ($j=1; $j <= count($data['nopeg'][$i]); $j++) { 
					if ($data['nopeg'][$i][$j]!=NULL) {
						$cek = $this->cek_petugas($data['nopeg'][$i][$j]);
						if(empty($cek)){
							$insert = "insert into petugas (nopeg, nama, unit) values (?,?,?)";
							$this->db->query($insert,array($data['nopeg'][$i][$j],$data['nama'][$i][$j],$data['unit'][$i][$j]));
						}
						$sql2 = "insert into map_komposisi values (?,?,?,?,null,null)";
						$status=$this->db->query($sql2,array($id,$i,$data['nopeg'][$i][$j],$j));
						if (!$status) {
							$err+=1;
						}
					}
				}
			}
		} else {
			for ($i=1; $i <= count($data['nopeg']) ; $i++) {
				for ($j=1; $j <= count($data['nopeg'][$i]); $j++) { 
					if ($data['nopeg'][$i][$j]!=NULL) {
						$cek = $this->cek_petugas($data['nopeg'][$i][$j]);
						if(empty($cek)){
							$insert = "insert into petugas (nopeg, nama, unit) values (?,?,?)";
							$this->db->query($insert,array($data['nopeg'][$i][$j],$data['nama'][$i][$j],$data['unit'][$i][$j]));
						}
						$sql2 = "insert into map_komposisi values (?,?,?,?,null,null)";
						$status=$this->db->query($sql2,array($data['id_komposisi'],$i,$data['nopeg'][$i][$j],$j));
						if (!$status) {
							$err+=1;
						}
					}
				}
			}
		}

		if ($err>0) {
			return FALSE;
		} else return TRUE;
	}

	public function get_data_komposisi_by_id($id){
		$sql = "select  * from komposisi where id_komposisi = ?";
        $exec = $this->db->query($sql,$id);
        $hasil =$exec->result();
        
        return $hasil;
	}

	public function update_data($param){
		// print_r($param); exit();
		$statement = "UPDATE komposisi set 
           id_station=?, id_lokasi=?, phase=?, tahun=?, jumlah_petugas=?, 
           shift=?, id_pekerjaan=?, keterangan=?  
           WHERE id_komposisi=?";
        $return = $this->db->query($statement, array( 
             $param['stat'], $param['lokasi'], $param['phase'], $param['tahun'], $param['jumlah_petugas'], $param['shift'], $param['id_pekerjaan'], $param['keterangan'],$param['id_komposisi']
            ));
        return $this->db->affected_rows();
	}

	function delete($id_komposisi)
	{
		$this->db->where('id_komposisi',$id_komposisi);
		$action = $this->db->delete("komposisi");
		if($action) return TRUE;
		else return FALSE;
		// $sql = "DELETE from komposisi where id = $id";
		// $return = $this->db->query($sql);
		// return $this->db->affected_rows();
	}

	function get_map_komposisi($id_komposisi, $shift){
		$sql = 'SELECT m.*, p.nama, p.unit FROM map_komposisi m, petugas p WHERE id_komposisi = ? AND no_shift = ? AND m.nopeg = p.nopeg ORDER BY m.index ASC';
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

	function get_rekap_download(){
		$sql = "SELECT k.station, k.pekerjaan, 
				(SELECT COUNT(*) FROM komposisi kk WHERE k.id_pekerjaan = kk.id_pekerjaan AND kk.phase = 1) phase1,
				(SELECT COUNT(*) FROM komposisi kk WHERE k.id_pekerjaan = kk.id_pekerjaan AND kk.phase = 2) phase2
				FROM
				(SELECT km.*, p.pekerjaan, s.station FROM komposisi km
				LEFT JOIN m_pekerjaan p ON km.id_pekerjaan = p.id_pekerjaan
				LEFT JOIN m_station s ON km.id_station = s.id_station )k 
				GROUP BY k.id_station, k.id_pekerjaan";
		$exec = $this->db->query($sql);
        $hasil =$exec->result(); 
        return $hasil;
	}

	public function get_auto_name()
	{	
		$key = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
		
		$sql="select nopeg,nama,unit from petugas where nopeg like ? or nama like ?";
    	$result=$this->db->query($sql,array('%'.$key.'%','%'.$key.'%'))->result();
		
        if( ! empty($result) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $result as $row )
            {
                $data['message'][] = array(
                                        'id' => $row->nopeg,
                                        'nama' => $row->nama,
                                        'unit' => $row->unit,
                                        'value'=> $row->nopeg
                                     );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data);exit; //echo json string if ajax request
             
        }
        else
        {
            return false;
        }
	}

	function cek_petugas($nopeg){
		$sql = "SELECT * FROM petugas WHERE nopeg = ?";
		$exec = $this->db->query($sql, $nopeg);
        $hasil = $exec->result(); 
        return $hasil;
	}

}