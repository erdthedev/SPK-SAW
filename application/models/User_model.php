<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class User_model extends CI_Model {
    
	public function insert_user($data)
	{
		return $this->db->insert('user', $data);
	}

	public function get_data()
	{
		$query = $this->db->query('SELECT * FROM user ORDER BY `role` ASC');
		return $query->result();
	}

	public function get_row($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row();
	}

	public function update_user($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	public function check_login($username, $password) {
        // Ambil data pengguna berdasarkan username
        $this->db->where('username', $username);
        $query = $this->db->get('user');

        if ($query->num_rows() == 1) {
            $user = $query->row();

            // Verifikasi password
            if (password_verify($password, $user->password)) {
                return $user; // Login berhasil
            }
        }
        
        return false; // Login gagal
    }

	public function delete($id)
	{
			$this->db->where('id', $id);
			$this->db->delete('user');
	}
}
