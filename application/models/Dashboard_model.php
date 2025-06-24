<?php
    
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function get_total($table_name)
    {
        return $this->db->query("SELECT COUNT(*) as total FROM $table_name")->row();
    }

    public function get_total_where($table_name, $condition)
    {
        return $this->db->query("SELECT COUNT(*) as total FROM $table_name WHERE $condition")->row();
    }

	public function get_kriteria_chart_data()
	{
		return $this->db->query("SELECT nama_kriteria AS label, bobot AS value FROM kriteria")->result();
	}
	

    public function get_alternatif_chart_data()
    {
        return $this->db->query("SELECT alternatif AS label, COUNT(*) AS value FROM alternatif GROUP BY alternatif")->result();
    }

    public function get_nilai_chart_data()
    {
        return $this->db->query("
            SELECT COUNT(*) AS total
            FROM penilaian
        ")->result();
    }

    public function get_perhitungan_chart_data()
    {
        return $this->db->query("
            SELECT alternatif AS label, nilai AS value
            FROM hasil
            JOIN alternatif ON hasil.id_alternatif = alternatif.id
            GROUP BY alternatif.id
        ")->result();
    }

    public function get_perangkingan_chart_data()
    {
        return $this->db->query("
            SELECT alternatif.alternatif AS label, nilai AS value
            FROM penilaian
            JOIN alternatif ON penilaian.id_alternatif = alternatif.id
        ")->result();
    }
}

