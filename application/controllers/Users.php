<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

		private $page_name = 'users';

		public function __construct()
		{
				parent::__construct();
				if (!$this->session->userdata('logged_in')) {
					 redirect('home');
				}
				$this->load->model('User_model');
		}

		public function index()
		{
				$data['page'] = $this->page_name;
				$data['rows'] = $this->User_model->get_data();
				$this->load->view('pages/dashboard_view', $data);
		}

		public function create()
		{
				$data['page'] = $this->page_name;
				$data['mode'] = 'create';
				$this->load->view('pages/dashboard_view', $data);
		}

		public function store()
		{
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('role', 'Role', 'in_list[admin,user]');

			if ($this->form_validation->run() == FALSE) {
					// Jika validasi gagal, tampilkan halaman registrasi lagi
					$this->session->set_flashdata('error', '<strong>Terdapat kesalahan input kriteria!</strong> Silakan coba lagi.');
					$data['register'] = true;
					$this->load->view('pages/home_view', $data);
			} else {
					// Hash password
					$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

					// Data untuk dimasukkan ke database
					$data = array(
							'username' => $this->input->post('username'),
							'nama' => $this->input->post('nama'),
							'password' => $password,
							'role' => $this->input->post('role')
					);

					// Simpan data ke database
					if ($this->User_model->insert_user($data)) {
							$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
							redirect('users');
					} else {
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambah!</div>');
							$data['register'] = true;
							redirect('users');
					}
				}
		}

		public function edit($id)
		{
				$data['page'] = $this->page_name;
				$data['mode'] = 'edit';
				$data['row'] = $this->User_model->get_row($id);
				$this->load->view('pages/dashboard_view', $data);
		}

		public function update()
		{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('nama', 'Nama', 'required');

			if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('message', '<strong>Terdapat kesalahan input user!</strong> Silakan coba lagi.');
					redirect('users');
			} else {
					$id = $this->input->post('id_user');

					// Data untuk dimasukkan ke database
					$data = array(
							'username' => $this->input->post('username'),
							'nama' => $this->input->post('nama'),
					);

					// Simpan data ke database
					if ($this->User_model->update_user($id, $data)) {
							$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diedit!</div>');
							redirect('users');
					} else {
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal diedit!</div>');
							redirect('users');
					}
				}
		}

		public function destroy($id)
		{
				$this->User_model->delete($id);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
				redirect('users');
		}

}

?>
