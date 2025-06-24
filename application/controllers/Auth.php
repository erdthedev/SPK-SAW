<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
		public function __construct()
		{
				parent::__construct();
				$this->load->model('User_model');
		}

		public function index()
		{
				$data['register'] = true;
				$this->load->view('pages/home_view', $data);
		}

		public function register(){
			// Aturan validasi form

			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('nama', 'Nama', 'required');

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
							'role' => 'user'
					);

					// Simpan data ke database
					if ($this->User_model->insert_user($data)) {
							$this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
							redirect('home');
					} else {
							$this->session->set_flashdata('error', 'Registrasi gagal. Silakan coba lagi.');
							$data['register'] = true;
							$this->load->view('pages/home_view', $data);
					}
				}
		}

		public function login() {
			// Aturan validasi form
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE) {
					// Tampilkan halaman login jika validasi gagal
					//$this->session->set_flashdata('error', 'Terdapat inputan yang salah');
					$this->load->view('pages/home_view');
			} else {
					// Ambil input dari pengguna
					$username = $this->input->post('username');
					$password = $this->input->post('password');

					// Cek kredensial pengguna di model
					$user = $this->User_model->check_login($username, $password);

					if ($user) {
							// Set data sesi jika login berhasil
							$session_data = array(
									'user_id' => $user->id,
									'username' => $user->username,
									'role' => $user->role,
									'logged_in' => TRUE
							);
							$this->session->set_userdata($session_data);

							// Redirect ke halaman dashboard
							redirect('dashboard');
					} else {
							// Set pesan error dan tampilkan kembali form login
							$this->session->set_flashdata('error', 'Username atau password salah.');
							redirect('auth/login');
					}
			}
	}

	public function logout() {
			// Hapus semua data sesi
			$this->session->sess_destroy();
			redirect('home');
	}
}

?>
