<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	
	public function index()
    {
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
        $data['title'] = 'HRIS Login';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/auth_footer');
	}else{
		$this->_login();
	}
	}
	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->staff_model->data_staff_login($email)->row_array();
		//jika user ada
		if ($user) {
			//jika user aktif
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'gambar' => $user['Photograph'],
						'nama_lengkap' => $user['Full_name'],
						'id_staff' => $user['ID']
					];
					$this->session->set_userdata($data);
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Oops!</strong> Password Salah.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			  redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Oops!</strong> Email Belum Aktif.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			  redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Oops!</strong> Email Tidak Terdaftar.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		  redirect('auth');
		}
	}
	public function daftar_akun_pegawai(){
		$data['title'] = 'Buat Akun Pegawai';
		$data['user_role'] = $this->db->get('user_role')->result();
		$data['akun_user_inactive'] = $this->db->get_where('hris_staff_detail', ['akun' => '0'])->result();
		$data['list_akun_user'] = $this->db->get('view_hris_staff_akun')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar');
		$this->load->view('auth/registrasi', $data);
		$this->load->view('templates/footer');
	}
	public function buat_akun_pegawai(){
		if($_POST){
		$data = array(	
			'id_user' => rand(),	
			'staff_id' => $this->input->post('id_staff'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			'waktu_dibuat' => time(),
			'is_active' =>$this->input->post('is_active'),
			'role_id' => $this->input->post('role_id'),
			'dibuat_oleh' => $this->session->userdata('email')
		);
		$data2 = array(	
			'akun' => '1'
		);
		$where = [
			'ID' => $this->input->post('id_staff')
		];
		$this->staff_model->input_data($data, 'user');
		$this->staff_model->update_data($where, $data2, 'hris_staff_detail');
		echo 1;
	}else{
	echo 2;
}
}
public function logout(){
	$this->session->unset_userdata('email');
	$this->session->unset_userdata('role_id');
	$this->session->unset_userdata('gambar');
	$this->session->unset_userdata('nama_lengkap');

	$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Berhasil!</strong> Anda Berhasil Logout.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		  redirect('auth');
}
public function blocked(){
	echo 'akses diblokir';
}
}