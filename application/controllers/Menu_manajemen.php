<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_manajemen extends CI_Controller {

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
public function user_menu(){
    $data['title'] = 'Menu Manajemen';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get('user_menu')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('menu/user_menu', $data);
    $this->load->view('templates/footer');
}
public function tambah_menu(){
	if ($_POST) {
		$data = [
			'menu' => $this->input->post('menu')
		];
		$this->staff_model->input_data($data, 'user_menu');
		echo 1;
	}else{
		echo 2;
	}
}
public function ubah_menu(){
	if ($_POST) {
		$data = [
			'menu' => $this->input->post('menu')
		];
		$where = [
			'id' => $this->input->post('id_menu')
		];
		// $this->staff_model->update_data($where, $data, 'user_menu');
		echo 1;
	}else{
		echo 2;
	}
}
public function hapus_menu(){
	if ($this->input->post('id_menu')) {
		$id_menu= $this->input->post('id_menu');
		$where = array(
			'id' => $id_menu
		);
		// $this->staff_model->delete_data($where, 'user_menu');
		echo 1;
	}else{
		echo 2;
	}
}

public function user_submenu(){
	$data['title'] = 'User Submenu';
    $data['user_submenu'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['user_submenu'] = $this->db->get('view_hris_user_submenu')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('menu/user_submenu', $data);
    $this->load->view('templates/footer');
	}
	public function user_role(){
		$data['title'] = 'User Role';
		$data['user_role'] = $this->db->get('user_role')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('menu/user_role', $data);
		$this->load->view('templates/footer');
	}
	public function user_access_menu($role_id){
		$data['title'] = 'User Access Menu';
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('menu/user_access_menu', $data);
		$this->load->view('templates/footer');
	}
	public function change_access(){
		$menu_id = $this->input->post('menuID');
		$role_id = $this->input->post('roleID');
		
		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		
		if($result->num_rows() < 1){
			$this->staff_model->input_data($data, 'user_access_menu');
			$response = array(
				'role_id' => $role_id,
				'message' => 'added',
			  );
		}else{
			$this->staff_model->delete_data($data, 'user_access_menu');
			$response = array(
				'role_id' => $role_id,
				'message' => 'remove',
			  );
		}
		$this->session->set_flashdata('message', '<div class="col-6 alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> Akses Berhasil Diubah.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');
	  echo json_encode($response);
	}
}