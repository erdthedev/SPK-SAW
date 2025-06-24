<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

		private $page_name = 'perhitungan';

		public function __construct()
		{
				parent::__construct();
				if (!$this->session->userdata('logged_in')) {
					 redirect('home');
				}

				$this->load->model('Alternatif_model');
				$this->load->model('Kriteria_model');
				$this->load->model('Perhitungan_model');
		}

		public function index()
		{
				$data['page'] = $this->page_name;

				$data['alternatif'] = $this->Alternatif_model->get_data();
				$data['perhitungan'] = $this->Perhitungan_model->get_matrix_keputusan();
				$data['kriteria'] = $this->Kriteria_model->get_data();
				$data['min_max'] = $this->Perhitungan_model->get_min_max();
				$this->load->view('pages/dashboard_view', $data);
		}

}

?>
