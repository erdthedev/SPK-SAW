<?php
    
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {

	private $table_name = "penilaian";

	public function create($data)
	{
		return $this->db->insert($this->table_name, $data);
	}

	public function get_data()
	{
		$this->db->select('penilaian.id ,alternatif.alternatif AS nama_alternatif, penilaian.nilai');
		$this->db->from('penilaian');
		$this->db->join('alternatif', 'penilaian.id_alternatif = alternatif.id');

		return $this->db->get()->result();	
	}

	public function get_data_group()
	{
		$query = $this->db->query('SELECT id_alternatif, alternatif.alternatif AS nama_alternatif, GROUP_CONCAT(nilai) AS nilai_tergabung
										FROM penilaian
										JOIN alternatif ON id_alternatif = alternatif.id
										GROUP BY id_alternatif
										');
		$result = [];
		foreach ($query->result() as $row) {
				$result[$row->nama_alternatif] = explode(',', $row->nilai_tergabung);
		}

		return $result;
	}

	public function get_nilai_alternatif($id_alternatif)
	{
		$this->db->select('penilaian.id as id_penilaian, nilai, id_kriteria');
		$this->db->from('penilaian');
		$this->db->join('kriteria', 'penilaian.id_kriteria = kriteria.id');
		$this->db->join('alternatif', 'penilaian.id_alternatif = alternatif.id');
		$this->db->where('id_alternatif', $id_alternatif);

		return $this->db->get()->result();
	}

	public function get_row($id)
	{
		return $this->db->get_where($this->table_name, ['id' => $id])->row();
		
	}

	public function update($id, $data = [])
	{
		$this->db->where('id', $id);
		$this->db->update($this->table_name, $data);
	}

	public function delete($id)
	{
			$this->db->where('id', $id);
			$this->db->delete($this->table_name);
	}


}
