<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data extends CI_Controller {
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
	
    public function index(){
		$data['title'] = 'Golongan Darah';
		$data['golongan_darah'] = $this->db->get('option_blood_type')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master_data/golongan_darah', $data);
        $this->load->view('templates/footer');
    }
	
	public function jenis_kelamin(){
		$data['title'] = 'Jenis Kelamin';
		$data['jenis_kelamin'] = $this->db->get('option_gender')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master_data/jenis_kelamin', $data);
        $this->load->view('templates/footer');
	}

	public function pendidikan_terakhir(){
		$data['title'] = 'Pendidikan Terakhir';
		$data['pendidikan_terakhir'] = $this->db->get('option_last_education')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master_data/pendidikan_terakhir', $data);
        $this->load->view('templates/footer');
	}

	public function pernikahan_terakhir(){
		$data['title'] = 'Pernikahan Terakhir';
		$data['pernikahan_terakhir'] = $this->db->get('option_marital_status')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master_data/pernikahan_terakhir', $data);
        $this->load->view('templates/footer');
	}

	public function tingkat_kontrak(){
		$data['title'] = 'Tingkat Kontrak';
		$data['tingkat_kontrak'] = $this->db->get('option_staff_contract_level')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master_data/tingkat_kontrak', $data);
        $this->load->view('templates/footer');
	}

	public function posisi_kontrak(){
		$data['title'] = 'Tingkat Kontrak';
		$data['posisi_kontrak'] = $this->db->get('option_staff_contract_position')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master_data/posisi_kontrak', $data);
        $this->load->view('templates/footer');
	}

	public function status_kontrak(){
		$data['title'] = 'Status Kontrak';
		$data['status_kontrak'] = $this->db->get('option_staff_contract_status')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master_data/status_kontrak', $data);
        $this->load->view('templates/footer');
	}

	public function hubungan(){
		$data['title'] = 'Hubungan';
		$data['hubungan'] = $this->db->get('option_relationship')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');	
        $this->load->view('templates/topbar');
        $this->load->view('master_data/hubungan', $data);
        $this->load->view('templates/footer');
	}

	public function basis_lokasi(){
		$data['title'] = 'Basis Lokasi';
		$data['basis_lokasi'] = $this->db->get('office_location')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');	
        $this->load->view('templates/topbar');
        $this->load->view('master_data/basis_lokasi', $data);
        $this->load->view('templates/footer');
	}


}
