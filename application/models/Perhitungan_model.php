<?php
    
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan_model extends CI_Model {

	public function get_matrix_keputusan()
	{
		$query = $this->db->query('
			SELECT 
				id_alternatif, 
				alternatif.alternatif AS nama_alternatif, 
				GROUP_CONCAT(nilai ORDER BY kriteria.id ASC) AS nilai_tergabung
			FROM penilaian
			JOIN alternatif ON id_alternatif = alternatif.id
			JOIN kriteria ON penilaian.id_kriteria = kriteria.id
			GROUP BY id_alternatif
		');

		$result = [];
		foreach ($query->result() as $row) {
			// Menyimpan nilai-nilai yang terurut berdasarkan kriteria
			$result[$row->nama_alternatif] = explode(',', $row->nilai_tergabung);
		}

		return $result;
	}


	public function get_min_max()
	{
		$kriteria = $this->db->get('kriteria')->result();

		$min_max = [];

		foreach($kriteria as $row){
				$min_max[$row->kode_kriteria] = $this->min_max($row->id);
		}


		return $min_max;
	}

	private function min_max($id_kriteria)
	{
		$query = $this->db->query("SELECT max(penilaian.nilai) as max, min(penilaian.nilai) as min, kriteria.jenis
		FROM penilaian
		JOIN kriteria ON id_kriteria = kriteria.id
		WHERE id_kriteria = $id_kriteria");

		return $query->row();
	}

	public function get_total_bobot()
	{
		$query = $this->db->query("SELECT SUM(bobot) as total_bobot FROM kriteria;");
		return $query->row_array();
	}

	public function insert_hasil($data)
	{
		return $this->db->insert('hasil', $data);
	}

	public function hapus_hasil()
	{
		$query = $this->db->query("TRUNCATE TABLE hasil;");
			return $query;
	}

	public function get_hasil()
	{
		$query = $this->db->query('SELECT alternatif.alternatif as nama_alternatif, hasil.nilai FROM hasil JOIN alternatif ON hasil.id_alternatif = alternatif.id ORDER BY hasil.nilai DESC');
		return $query->result();
	}

}
