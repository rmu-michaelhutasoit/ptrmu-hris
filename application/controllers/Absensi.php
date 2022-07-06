<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
//staff
//hr
public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
    public function index(){
        $data['title'] = 'Absensi Harian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lokasi_kantor'] = $this->db->get('office_location')->result();
		$data['kategori_kehadiran'] = $this->db->get('daftar_hadir_kategori_kehadiran')->result();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('absensi/index', $data);
        $this->load->view('templates/footer');
    }
    public function input_kehadiran(){
        if ($_POST) {	
				$data = array(
					'Lokasi' => $this->input->post('lokasi_hadir'),
					'Nama_staff' => $this->input->post('staff_id'),
					'Tanggal' => $this->input->post('tanggal_hadir'),
					'Kehadiran' => $this->input->post('status_kehadiran'),
					'catatan' => $this->input->post('catatan'),
					'Created_date' => $this->input->post('tanggal_hadir')
				);
				$cek = $this->staff_model->input_data($data, 'daftar_hadir');
				var_dump($cek);
				$response = array(
					'message' => "success"
				);
		}else{
			$response = array(
				'message' => "salah method"
			);
		}
		echo json_encode($response);
    }
}