<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

		private $page_name = 'penilaian';
		
		public function __construct()
		{
				parent::__construct();
				
				if (!$this->session->userdata('logged_in')) {
					 redirect('home');
				}

				$this->load->model('Penilaian_model');
				$this->load->model('Alternatif_model');
				$this->load->model('Kriteria_model');
		}

		public function index()
		{
				$data['page'] = $this->page_name;
				$data['alternatifs'] = $this->Alternatif_model->get_data();
				$this->load->view('pages/dashboard_view', $data);
		}

		public function create($id)
		{
			$data['page'] = $this->page_name;
			$data['mode'] = 'create';
			$data['kriteria'] = $this->Kriteria_model->get_data();
			$data['alternatif'] = $this->Alternatif_model->get_row($id);
			$this->load->view('pages/dashboard_view', $data);
		}

		public function store()
		{		
			// (id_alternatif, id_kriteria, nilai)
			$id_alternatif = $this->input->post('id_alternatif');

			foreach($this->Kriteria_model->get_data() as $kriteria){
				$data['id_alternatif'] = $id_alternatif;
				$data['id_kriteria'] = $kriteria->id;
				$data['nilai'] = $this->input->post("$kriteria->kode_kriteria");

				$this->Penilaian_model->create($data);
			}

			$this->Alternatif_model->update_column($id_alternatif, 'input_penilaian', '1');

			redirect('penilaian');
		}

		public function edit($id_alternatif)
		{
			$data['page'] = $this->page_name;
			$data['mode'] = 'edit';
			$data['kriteria'] = $this->Kriteria_model->get_data();
			$data['alternatif'] = $this->Alternatif_model->get_row($id_alternatif);

			// ubah hasil penilaian jadi array associatif by id_kriteria
			$penilaian_data = $this->Penilaian_model->get_nilai_alternatif($id_alternatif);
			$penilaian = [];
			foreach ($penilaian_data as $p) {
				$penilaian[$p->id_kriteria] = $p;
			}
			$data['penilaian'] = $penilaian;

			$this->load->view('pages/dashboard_view', $data);
		}


		public function update()
		{
			$id_alternatif = $this->input->post('id_alternatif');

			foreach ($this->Kriteria_model->get_data() as $kriteria) {
				$data['id_alternatif'] = $id_alternatif;
				$data['id_kriteria'] = $kriteria->id;
				$data['nilai'] = $this->input->post("$kriteria->kode_kriteria");

				$id_penilaian = $this->input->post('id_penilaian_'.$kriteria->kode_kriteria);

				if ($id_penilaian) {
					// Jika id_penilaian ada, lakukan update
					$this->Penilaian_model->update($id_penilaian, $data);
				} else {
					// Jika id_penilaian tidak ada, lakukan insert
					$this->Penilaian_model->create($data);
				}
			}

			redirect('penilaian');
		}


}

?>
