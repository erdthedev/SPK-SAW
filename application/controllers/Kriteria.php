<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {
		public function __construct()
		{
				parent::__construct();

				if (!$this->session->userdata('logged_in')) {
					redirect('home');
				}

				$this->load->model('Kriteria_model');
		}

		public function index()
		{
			$data['page'] = "kriteria";
			$data['rows'] = $this->Kriteria_model->get_data();
			$this->load->view('pages/dashboard_view', $data);
		}

		public function create()
		{
			$this->form_validation->set_rules('kode_kriteria', 'Kode_kriteria', 'required');
			$this->form_validation->set_rules('nama_kriteria', 'Nama_kriteria', 'required');
			$this->form_validation->set_rules('bobot', 'Bobot', 'required|is_natural_no_zero|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('jenis', 'Jenis', 'required|in_list[Benefit,Cost]');

			if ($this->form_validation->run() == FALSE) {
				// Jika validasi gagal
				$this->session->set_flashdata('error', 'Terdapat kesalahan input kriteria. Silakan coba lagi.');
				$data['page'] = "kriteria";
				$this->load->view('pages/dashboard_view', $data);
			} else {

				$data = array(
					"kode_kriteria" => $this->input->post('kode_kriteria'),
					"nama_kriteria" => $this->input->post('nama_kriteria'),
					"bobot" => $this->input->post('bobot'),
					"jenis" => $this->input->post('jenis'),
				);

				// Simpan data ke database
				if ($this->Kriteria_model->create($data)) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
					redirect('kriteria');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambah!</div>');
					$data['page'] = "kriteria";
					$this->load->view('pages/dashboard_view', $data);
				}

			}
		}

		public function edit($id_kriteria = -1)
		{
			$data['page'] = "kriteria";
			$data['mode'] = 'edit';
			$data['kriteria'] = $this->Kriteria_model->get_kriteria($id_kriteria);
			$this->load->view('pages/dashboard_view', $data);
		}

		public function update($id_kriteria = -1)
		{
			$this->form_validation->set_rules('kode_kriteria', 'Kode_kriteria', 'required');
			$this->form_validation->set_rules('nama_kriteria', 'Nama_kriteria', 'required');
			$this->form_validation->set_rules('bobot', 'Bobot', 'required|is_natural_no_zero|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('jenis', 'Jenis', 'required|in_list[Benefit,Cost]');

			if ($this->form_validation->run() == FALSE) {
				// Jika validasi gagal
				var_dump($this->form_validation->error_array());
				die;
				$this->session->set_flashdata('message', 'Terdapat kesalahan update kriteria. Silakan coba lagi.');
				$data['page'] = "kriteria";
				$this->load->view('pages/dashboard_view', $data);
			} else {
				
				$id_kriteria = $this->input->post('id_kriteria');
				$data = array(
					"kode_kriteria" => $this->input->post('kode_kriteria'),
					"nama_kriteria" => $this->input->post('nama_kriteria'),
					"bobot" => $this->input->post('bobot'),
					"jenis" => $this->input->post('jenis'),
				);

				// Simpan data ke database
				$this->Kriteria_model->update($id_kriteria, $data);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
				redirect('kriteria');


			}
		}

		public function destroy($id_kriteria)
		{
				$this->Kriteria_model->delete($id_kriteria);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
				redirect('kriteria');
		}
}

?>
