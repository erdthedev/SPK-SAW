<?php
    
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif_model extends CI_Model {

	private $table_name = "alternatif";

	public function create($data)
	{
		return $this->db->insert($this->table_name, $data);
	}

	public function get_data()
	{
		return $this->db->get($this->table_name)->result();
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

	public function update_column($id, $column, $value)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table_name, [$column => $value]);
	}

	public function delete($id)
	{
			$this->db->where('id', $id);
			$this->db->delete($this->table_name);
	}

}
