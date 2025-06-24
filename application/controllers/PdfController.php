<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class PdfController extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			if (!$this->session->userdata('logged_in')) {
				 redirect('home');
			}
			$this->load->model('Perhitungan_model');
	}

    public function generate() {
        // Load Composer autoload
        require_once APPPATH . '../vendor/autoload.php';

        // Inisialisasi Dompdf
        $pdf = new Dompdf();

        // Konten HTML

		$data['rows'] = $this->Perhitungan_model->get_hasil();
        $html = $this->load->view('export/peringkat', $data, true);

        // Muat HTML ke Dompdf
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Unduh atau tampilkan PDF
        $pdf->stream('Peringkat-SPK.pdf', ['Attachment' => false]);
    }
}


?>
