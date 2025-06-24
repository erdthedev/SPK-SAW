<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
		public function __construct()
		{
				parent::__construct();

				// Cek apakah pengguna sudah login
        if ($this->session->userdata('logged_in')) {
					// Jika sudah login, redirect ke halaman dashboard
					redirect('dashboard');
				}
		}

		public function index()
		{
				$this->load->view('pages/home_view');
		}
}

?>
