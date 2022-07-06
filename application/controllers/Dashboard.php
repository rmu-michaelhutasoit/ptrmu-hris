<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
    public function index(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Analitik';
		$data['pendidikan_terakhir'] = $this->db->get('option_last_education')->result();
		$data['pernikahan_terakhir'] = $this->db->get('option_marital_status')->result();
		$data['tingkat_kontrak'] = $this->db->get('option_staff_contract_level')->result();
		$data['posisi_kontrak'] = $this->db->get('option_staff_contract_position')->result();
		$data['golongan_darah'] = $this->db->get('option_blood_type')->result();
		$data['status_kontrak'] = $this->db->get('option_staff_contract_status')->result();
		$data['basis_lokasi'] = $this->db->get('office_location')->result();
        $data['hubungan'] = $this->db->get('option_relationship')->result();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

	public function tambah_staff_baru(){
			//validasi data yang diinput sudah ada atau tidak
			$nama_lengkap = $this->input->post('nama_lengkap');
			$cek_data_staff = $this->db->get_where('hris_staff_detail' , ['Full_name' => $nama_lengkap]);
			
			if ($cek_data_staff->num_rows() == 0) {
			$config['upload_path']="./assets/staff_foto";
			$config['allowed_types']='pdf|jpg|png';
			$this->load->library('upload',$config);
			//cek gambar
			if($this->upload->do_upload("gambar")){
			$data = array('upload_data' => $this->upload->data()
		);
		}else{
			echo $this->upload->display_errors();
		}

					$data1 = array(	
						'ID' => rand(),	
						'Photograph' => $data['upload_data']['file_name'],
						'Full_name' => $this->input->post('nama_lengkap'),
						'Office_location' => $this->input->post('lokasi_kantor'),
						'Email1' => $this->input->post('email'),
						'Phone1' => $this->input->post('no_hp'),
						'Address' => $this->input->post('alamat'),
						'Gender' => $this->input->post('jenis_kelamin'),
						'Last_education' => $this->input->post('pendidikan_terakhir'),
						'Birth_place' => $this->input->post('tempat_lahir'),
						'Birth_date' => $this->input->post('tanggal_lahir'),
						'Marital_status' => $this->input->post('pernikahan_terakhir'),
						'Blood_type' => $this->input->post('golongan_darah'),
						'Status' => $this->input->post('status_kontrak'),
						'IDKuotaCutiTahunan' => 1,
						'IDKuotaCutiIstirahatsakit' => 2,
						'IDKuotaCutiKhusus' => 3,
						'IDKuotaCutiPaternal' => 4,
						'IDKuotaCutiIstirahatDLL' => 5,
						'Created_date' => date('Y-m-d H:i:s')
					);
		$this->staff_model->input_data($data1, 'hris_staff_detail');
		echo 1;
	}else{
	echo 2;
	}
}
		public function daftar_kontrak_staff(){
			$data['title'] = 'Data Kontrak Staff';
			$data['list_kontrak'] = $this->staff_model->semua_data_kontrak()->result();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar');
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/daftar_kontrak_staff', $data);
			$this->load->view('templates/footer');
		}
		public function daftar_bank(){
			$data['title'] = 'Data Bank';
			$data['list_bank'] = $this->staff_model->semua_data_bank()->result();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar');
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/daftar_bank_staff', $data);
			$this->load->view('templates/footer');
		}
		public function daftar_ktp(){
			$data['title'] = 'Data KTP';
			$data['list_ktp'] = $this->staff_model->semua_data_ktp()->result();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar');
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/daftar_ktp_staff', $data);
			$this->load->view('templates/footer');
		}

		public function daftar_npwp(){
			$data['title'] = 'Data NPWP';
			$data['list_npwp'] = $this->staff_model->semua_data_npwp()->result();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar');
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/daftar_npwp_staff', $data);
			$this->load->view('templates/footer');
		}
		public function daftar_keluarga(){
			$data['title'] = 'Data NPWP';
			$data['list_keluarga'] = $this->staff_model->semua_data_keluarga()->result();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar');
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/daftar_keluarga_staff', $data);
			$this->load->view('templates/footer');
		}
		public function daftar_asuransi(){
			$data['title'] = 'Data Asuransi';
			$data['list_asuransi'] = $this->staff_model->semua_data_asuransi()->result();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar');
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/daftar_asuransi_staff', $data);
			$this->load->view('templates/footer');
		}
		public function daftar_penilaian_kerja(){
			$data['title'] = 'Data Penilaian Kerja';
			$data['list_penilaian_kerja'] = $this->staff_model->semua_data_penilaian_kerja()->result();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar');
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/daftar_penilaian_kerja', $data);
			$this->load->view('templates/footer');
		}
}