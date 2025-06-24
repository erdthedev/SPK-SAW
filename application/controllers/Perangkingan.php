<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkingan extends CI_Controller {

		private $page_name = 'perangkingan';
		
		public function __construct()
		{
				parent::__construct();
				if (!$this->session->userdata('logged_in')) {
					 redirect('home');
				}
				$this->load->model('Perhitungan_model');
		}

		public function index()
		{
				$data['page'] = $this->page_name;
				$data['rows'] = $this->Perhitungan_model->get_hasil();
				$this->load->view('pages/dashboard_view', $data);
		}

}

?>
