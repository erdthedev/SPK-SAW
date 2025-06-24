<?php
    
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model {

	private $table_name = "kriteria";

	public function create($data)
	{
		return $this->db->insert($this->table_name, $data);
	}

	public function get_data()
	{
		return $this->db->get($this->table_name)->result();
	}

	public function get_kriteria($id_kriteria)
	{
		return $this->db->get_where($this->table_name, ['id' => $id_kriteria])->row();
		
	}

	public function update($id_kriteria, $data = [])
	{
		$this->db->where('id', $id_kriteria);
		$this->db->update($this->table_name, $data);
	}

	public function delete($id_kriteria)
	{
			$this->db->where('id', $id_kriteria);
			$this->db->delete($this->table_name);
	}

}
