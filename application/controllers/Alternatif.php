<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {

		private $page_name = "alternatif";

		public function __construct()
		{
				parent::__construct();
				if (!$this->session->userdata('logged_in')) {
					 redirect('home');
				}

				$this->load->model('Alternatif_model');
		}

		public function index()
		{
			$data['page'] = $this->page_name;
			$data['rows'] = $this->Alternatif_model->get_data();
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
			$this->form_validation->set_rules('alternatif', 'Alternatif', 'required');

			// Jika validasi gagal
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', 'Terdapat kesalahan input alternatif. Silakan coba lagi.');
				redirect($this->page_name.'/create');
			}else{
				$data = array(
					'alternatif' => $this->input->post('alternatif'),
				);

				if ($this->Alternatif_model->create($data)) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
					redirect($this->page_name);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambah!</div>');
					redirect($this->page_name . '/create');
				}
			}
		}

		public function edit($id)
		{
			$data['page'] = $this->page_name;
			$data['mode'] = 'edit';
			$data['row'] = $this->Alternatif_model->get_row($id);
			$this->load->view('pages/dashboard_view', $data);
		}

		public function update()
		{
			$this->form_validation->set_rules('alternatif', 'Alternatif', 'required');

			// Jika validasi gagal
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', 'Terdapat kesalahan update alternatif. Silakan coba lagi.');
				redirect($this->page_name.'/create');
			}else{

				$id_alternatif = $this->input->post('id');
				$data = array(
					'alternatif' => $this->input->post('alternatif'),
				);

				$this->Alternatif_model->update($id_alternatif, $data);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
				redirect('alternatif');
			}
		}

		public function destroy($id)
		{
				$this->Alternatif_model->delete($id);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
				redirect('alternatif');
		}
}

?>
