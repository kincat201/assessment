<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Petugas extends CI_Model{

	public function getAll(){
		$query = $this->db->get('petugas');
		return $query->result();
	}

	public function getDetail($param){
		$query = "select * from petugas where nopeg = ?";
		$ret = $this->db->query($query, $param);
		return $ret->result();
	}

	public function insert_petugas($param){
		$data = array(
		   'nopeg' => $param['nopeg'],
		   'nama' => $param['nama'],
		   'unit' => $param['unit'],
		   'no_telp' => $param['telp'],
		   'hp1' => $param['hp1'],
		   'hp2' => $param['hp2'],
		   'alamat' => $param['alamat'],
		   'license' => $param['license'],
		   'license_val' => $param['license_val'],
		   'grade' => $param['golongan'],
		   'no_passport' => $param['no_pass'],
		   'passport_val' => $param['pass_val'],
		   'kemeja' => $param['kemeja'],
		   'pantalon' => $param['pantalon']
		);
		$this->db->insert('petugas', $data); 
		return $this->db->affected_rows();
	}

	public function update_petugas($param){
		$data = array(
		   'nama' => $param['nama'],
		   'unit' => $param['unit'],
		   'no_telp' => $param['telp'],
		   'hp1' => $param['hp1'],
		   'hp2' => $param['hp2'],
		   'alamat' => $param['alamat'],
		   'license' => $param['license'],
		   'license_val' => $param['license_val'],
		   'grade' => $param['golongan'],
		   'no_passport' => $param['no_pass'],
		   'passport_val' => $param['pass_val'],
		   'kemeja' => $param['kemeja'],
		   'pantalon' => $param['pantalon']
		);
		$this->db->where('nopeg', $param['nopeg']);
		$this->db->update('petugas', $data); 
		return $this->db->affected_rows();
	}

	public function deletePetugas($nopeg){
  //       $sql = "delete from petugas where nopeg = ?";
		// $status=$this->db->query($sql,$nopeg);
		// return $this->db->affected_rows();

		$this->db->where('nopeg',$nopeg);
		$action = $this->db->delete("petugas");
		if($action) return TRUE;
		else return FALSE;
	}

	public function insert_map_komposisi($data){
		// print_r($data); exit();
		if($data['cek']==NULL){
			$sql = "insert into komposisi values (?,?,?,?,?,?,?,?,?)";
			$act =$this->db->query($sql,array($data['k_pekerjaan'],$data['stat'],$data['lokasi'],$data['phase'],$data['tahun'],$data['jumlah_petugas'],$data['shift'],$data['id_pekerjaan'],$data['keterangan']));
		}

		for ($i=1; $i <= count($data['nopeg']) ; $i++) {
			for ($j=1; $j <= count($data['nopeg'][$i]); $j++) { 
				if ($data['nopeg'][$i][$j]!=NULL) {
					$sql2 = "insert into map_komposisi values (?,?,?,?)";
					$status=$this->db->query($sql2,array($data['k_pekerjaan'],$i,$data['nopeg'][$i][$j],$j));
					if (!$status) {
						$err+=1;
					}
				}
			}
		}

		if ($err>0) {
			return FALSE;
		} else return TRUE;
	}

	function get_operasional($nopeg){
		$sql = "SELECT * FROM komposisi k, map_komposisi m WHERE k.id_komposisi = m.id_komposisi AND m.nopeg = ?";
		$exec = $this->db->query($sql,$nopeg);
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
                                        'value'=> $row->nopeg.' - '.$row->nama
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

	function get_detail($param, $index){
		$sql = "SELECT mk.no_shift, mk.index, p.nama, p.nopeg, p.unit FROM map_komposisi mk  
				JOIN petugas p
				ON mk.nopeg = p.nopeg AND mk.id_komposisi = ? AND mk.index = ?
				ORDER BY mk.no_shift, mk.index";
		$exec = $this->db->query($sql,array($param,$index));
        $hasil =$exec->result(); 
        return $hasil;
	}

	function detail_komposisi($param){
		$sql = "SELECT id_komposisi, id_pekerjaan, jumlah_petugas, shift FROM komposisi k WHERE k.tahun = ? AND k.id_station = ? AND k.phase = ? AND k.id_lokasi = ? ";
		$exec = $this->db->query($sql,array($param['tahun'], $param['stat'], $param['phase'], $param['lokasi']));
        $hasil =$exec->result(); 
        return $hasil;
	}

	function max_shift($param){
		$sql = "SELECT MAX(shift) jum_shift FROM komposisi k WHERE k.tahun = ? AND k.id_station = ? AND k.phase = ? AND k.id_lokasi = ? ";
		$exec = $this->db->query($sql,array($param['tahun'], $param['stat'], $param['phase'], $param['lokasi']));
        $hasil =$exec->result(); 
        return $hasil[0];
	}


}