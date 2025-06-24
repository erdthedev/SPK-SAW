<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
		public function __construct()
		{
				parent::__construct();

				// Cek apakah pengguna sudah login
        if (!$this->session->userdata('logged_in')) {
					// Jika belum login, redirect ke halaman login
					redirect('home');
				}

				$this->load->model('Dashboard_model');
		}

		public function index()
		{
			$data['page'] = "dashboard";
			$data['total_alternatif'] = $this->Dashboard_model->get_total("alternatif");
			$data['total_kriteria'] = $this->Dashboard_model->get_total("kriteria");
			$data['belum_input_nilai'] = $this->Dashboard_model->get_total_where("alternatif", "input_penilaian = 0");

			$data['kriteria_chart'] = $this->Dashboard_model->get_kriteria_chart_data();
			$data['alternatif_chart'] = $this->Dashboard_model->get_alternatif_chart_data();
			$data['nilai_chart'] = $this->Dashboard_model->get_nilai_chart_data();
			$data['perhitungan_chart'] = $this->Dashboard_model->get_perhitungan_chart_data();
			$data['perangkingan_chart'] = $this->Dashboard_model->get_perangkingan_chart_data();

			$this->load->view('pages/dashboard_view', $data);
		}

}

?>
