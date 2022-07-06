<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_staff extends CI_Controller {
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
        $data['title'] = 'Daftar Staff';
		$data['pendidikan_terakhir'] = $this->db->get('option_last_education')->result();
		$data['pernikahan_terakhir'] = $this->db->get('option_marital_status')->result();
		$data['tingkat_kontrak'] = $this->db->get('option_staff_contract_level')->result();
		$data['posisi_kontrak'] = $this->db->get('option_staff_contract_position')->result();
		$data['status_kontrak'] = $this->db->get('option_staff_contract_status')->result();
		$data['basis_lokasi'] = $this->db->get('office_location')->result();
        $data['hubungan'] = $this->db->get('option_relationship')->result();
        $data['info_staff'] = $this->staff_model->daftar_staff()->result();
		$data['golongan_darah'] = $this->db->get('option_blood_type')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('staff/daftar_staff', $data);
        $this->load->view('templates/footer');
    }
	public function search_staff(){
		//X3BLLRKEELSHZLHG
		$keyword = $this->input->post('cari');
		$output = '';
		if ($keyword) {
			$data = $this->staff_model->ajaxsearch_staff($keyword);
			if ($data->num_rows() > 0) {
				foreach ($data->result() as $row) {
					$output .= '<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
					<div class="card bg-light d-flex flex-fill">              
					<div class="ribbon-wrapper">';
					if ($row->StatusKaryawan == "Resign") {
						$output .='<div class="ribbon bg-danger">Resign</div>';
					}else if ($row->StatusKaryawan == "Indefinite") {
						$output .='<div class="ribbon bg-success">Indefinite</div>';
					}else if ($row->StatusKaryawan == "Definite") {
						$output .='<div class="ribbon bg-info">Definite</div>';
					}
					$output .='</div>
					<div class="card-header text-muted border-bottom-0">
					NIK: '.$row->Employee_reg_number.'
				   </div>
				   <div class="card-body pt-0">
					 <div class="row">
					   <div class="col-7">
						 <h2 class="lead"><b> '. $row->Full_name .'</b></h2>
						 <p class="text-muted text-sm"><b>Posisi: </b> '. $row->Position .'</p>
						 <ul class="ml-4 mb-0 fa-ul text-muted">
						   <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: '. $row->Address .'</li>
						   <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Contact : '. $row->Phone1 .'</li>
						 </ul>
					   </div>';
					
					   $output .= '<div class="col-5 text-center">';
					   if (!is_null($row->Photograph)) {
						   $output .= '<img src="'.base_url('assets/staff_foto/'.$row->Photograph).'" alt="N/A" class="img-circle img-fluid">';
					   }else{
						$output .= '<img src="'.base_url('assets/staff_foto/no_photo.png').'" alt="N/A" class="img-circle img-fluid">';
					   }
					   $output .=' </div></div></div>
					 <div class="card-footer">
					   <div class="text-right">
						 <a href="'.base_url('Daftar_staff/data_tambahan/'.$row->ID).'" class="btn btn-sm bg-teal">
						   <i class="fas fa-comments"></i> Data Tambahan
						 </a>
						 <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailprofile'.$row->ID.'Modal">
						   <i class="fas fa-user"> </i> Detail
						 </a>
					   </div>
					 </div>
				   </div>
				 </div>';
				}
			
			} else {
				$output .= '<script>alert("Data Tidak Ditemukan")</script>';
			}
		}
		echo $output;
	}
	public function data_tambahan($id_profile){
		$data['title'] = 'Data Tambahan';
		$data['kategori_penilaian'] = $this->db->get('option_kategori_penilaian_kinerja')->result();
		$data['skor_penilaian'] = $this->db->get('option_skor_penilaian_kinerja')->result();
		$data['data_asuransi'] = $this->staff_model->data_asuransi_staff($id_profile)->result();
		$data['status_kontrak'] = $this->db->get('option_staff_contract_status')->result();
		$data['data_kontrak_terakhir'] = $this->staff_model->data_kontrak_terakhir($id_profile)->result();
		$data['position'] = $this->db->get('option_staff_contract_position')->result();
		$data['level'] = $this->db->get('option_staff_contract_level')->result();
		$data['department'] = $this->db->get('department')->result();
		$data['department_sub'] = $this->db->get('department_sub')->result();
		$data['lokasi_kantor'] = $this->db->get('office_location')->result();
		$data['option_asuransi_kategori'] = $this->db->get('option_asuransi_kategori')->result();
		$data['kategori_asuransi'] = $this->db->get('option_asuransi_kategori')->result();
		$data['data_bank'] = $this->staff_model->data_bank_staff($id_profile)->result();
		$data['keluarga'] = $this->staff_model->data_keluarga($id_profile)->result();
		$data['ktp'] = $this->staff_model->data_ktp($id_profile)->result();
		$data['kontrak'] = $this->staff_model->data_kontrak($id_profile)->result();
		$data['npwp'] = $this->staff_model->data_npwp($id_profile)->result();
		$data['penilaian_kerja'] = $this->staff_model->data_penilaian_kerja($id_profile)->result();
		$data['golongan_darah'] = $this->db->get('option_blood_type')->result();
		$data['hubungan'] = $this->db->get('option_relationship')->result();
		$data['jenis_kelamin'] = $this->db->get('option_gender')->result();
		$data['info_staff'] = $this->staff_model->detail_staff($id_profile)->result();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('staff/data_tambahan', $data);
        $this->load->view('templates/footer');
	}
	public function tambah_data_asuransi(){
		//validasi data yang diinput sudah ada atau tidak
		$kategori_asuransi = $this->input->post('kategori_asuransi');
		$staff_id = $this->input->post('staff_id');
		$cek_data_asuransi = $this->db->get_where('hris_staff_asuransi' , ['Kategori_asuransi' => $kategori_asuransi, 'Staff_ID ' => $staff_id]);
		
		if ($cek_data_asuransi->num_rows() == 0) {
		//cek dokumen bpjs kesehatan
		if($kategori_asuransi == 1){
			$config['upload_path']="./assets/dokumen_asuransi/asuransi_bpjs_kesehatan";
		}else if($kategori_asuransi == 2){
			$config['upload_path']="./assets/dokumen_asuransi/asuransi_bpjs_ketenagakerjaan";
		}else if($kategori_asuransi == 3){
			$config['upload_path']="./assets/dokumen_asuransi/manulife_rs";
		}else if($kategori_asuransi == 4){
			$config['upload_path']="./assets/dokumen_asuransi/manulife_jiwa";
		}
			$config['allowed_types']='pdf|jpg|png';
			$this->load->library('upload',$config);
			$config['max_size']      = 100;
			if($this->upload->do_upload("dokumen_asuransi")){
			$dokumen = array('dokumen' => $this->upload->data());
			if($dokumen['dokumen']['file_size'] > 100){
					echo 3;die;
			}
			}else{
				echo $this->upload->display_errors();
			}
			$data = array(	
					'Staff_ID' => $staff_id,
					'Kategori_asuransi' => $this->input->post('kategori_asuransi'),
					'Reg_number' => $this->input->post('nomor_registrasi'),
					'Start_date' => $this->input->post('tanggal_mulai'),
					'Valid_to' => $this->input->post('tanggal_kadaluwarsa'),
					'Dokumen_BPJS_Kesehatan' => $dokumen['dokumen']['file_name'],
					'Created_date' => date('Y-m-d H:i:s')
				);
			
				$this->staff_model->input_data($data, 'hris_staff_asuransi');
				echo 1;
}else{
echo 2;
}
}

public function tambah_data_bank(){
	//validasi data yang diinput sudah ada atau tidak
	$id_staff = $this->input->post('staff_id');
	$cek_data_bank = $this->db->get_where('hris_staff_bank', ['Staff_ID' => $id_staff]);
	if ($cek_data_bank->num_rows() > 0) {
		$response = [
			'message' => 'ada'
		];
	}else{
	$config['upload_path']="./assets/dokumen_bank";
	$config['allowed_types']='pdf|jpg|png';
	$this->load->library('upload',$config);

	//cek dokumen bpjs kesehatan
	if($this->upload->do_upload("dokumen_bank")){
	$data = array('dokumen_bank' => $this->upload->data());
	}else{
		echo $this->upload->display_errors();
	}
			$data = array(	
				'ID' => rand(),
				'Staff_ID' => $this->input->post('staff_id'),
				'Bank_name' => $this->input->post('bank'),
				'Acc_named' => $this->input->post('nama_pemilik'),
				'Acc_no' => $this->input->post('nomor_rekening'),
				'Dokumen' => $data['dokumen_bank']['file_name'],
				'Created_date' => date('Y-m-d H:i:s')
			);
			$this->staff_model->input_data($data, 'hris_staff_bank');
			$response = [
				'message' => 'added'
			];

		}
		echo json_encode($response);
}
	public function tambah_data_keluarga(){
	
	$config['upload_path']="./assets/dokumen_keluarga";
	$config['allowed_types']='pdf|jpg|png';
	$this->load->library('upload',$config);

	//cek dokumen
	if($this->upload->do_upload("dokumen_kk")){
	$data = array('dokumen_kk' => $this->upload->data());
	}else{
		echo $this->upload->display_errors();
	}

			$data = array(	
				'ID' => rand(),
				'Staff_ID' => $this->input->post('staff_id'),
				'No_KK' => $this->input->post('no_kk'),
				'NIK' => $this->input->post('nik'),
				'Name' => $this->input->post('nama'),
				'Phone' =>  $this->input->post('no_hp'),
				'Email' => $this->input->post('email'),
				'Gender' => $this->input->post('jenis_kelamin'),
				'Birth_date' => $this->input->post('tanggal_lahir'),
				'Blood_type' => $this->input->post('golongan_darah'),
				'Relation' => $this->input->post('hubungan'),
				'Dokumen' => $data['dokumen_kk']['file_name']
			);
			$this->staff_model->input_data($data, 'hris_staff_family');	
			echo 1;	
}


public function tambah_data_ktp(){
	$config['upload_path']="./assets/dokumen_ktp";
	$config['allowed_types']='pdf|jpg|png';
	$this->load->library('upload',$config);

	//cek dokumen
	if($this->upload->do_upload("dokumen_ktp")){
	$data = array('dokumen_ktp' => $this->upload->data());
	}else{
		echo $this->upload->display_errors();
	}
			$data = array(	
				'ID' => rand(),
				'Staff_ID' => $this->input->post('staff_id'),
				'Reg_no' => $this->input->post('no_registrasi'),
				'Address' => $this->input->post('alamat'),
				'RT_RW' => $this->input->post('rt_rw'),
				'Kelurahan_desa' => $this->input->post('kelurahan_desa'),
				'Kecamatan' => $this->input->post('kecamatan'),
				'Valid_to' => $this->input->post('kadaluwarsa'),
				'Signed_date' => $this->input->post('tanggal_dibuat'),
				'Dokumen' => $data['dokumen_ktp']['file_name'],
				'Created_date' => date('Y-m-d H:i:s')
			);
			$this->staff_model->input_data($data, 'hris_staff_ktp');	
			echo 1;	
}


public function tambah_data_kontrak(){
	$config['upload_path']="./assets/dokumen_kontrak";
	$config['allowed_types']='pdf|jpg|png';
	$this->load->library('upload',$config);

	//cek dokumen
	if($this->upload->do_upload("dokumen_kontrak")){
	$data = array('dokumen_kontrak' => $this->upload->data());
	}else{
		echo $this->upload->display_errors();
	}
			$data = array(	
				'ID' => rand(),
				'Employee_reg_number' => $this->input->post('no_reg_pegawai'),
				'Staff_ID' => $this->input->post('staff_id'),
				'Status' => $this->input->post('status'),
				'Bidang' => $this->input->post('bidang'),
				'Sub_bidang' => $this->input->post('sub_bidang'),
				'Position' => $this->input->post('position'),
				'Level' => $this->input->post('level'),
				'Domisili' => $this->input->post('domisili'),
				'Office_base' => $this->input->post('lokasi_kantor'),
				'Start_date' => $this->input->post('mulai_kontrak'),
				'Finish_date' => $this->input->post('selesai_kontrak'),
				'Resign_date' => $this->input->post('tanggal_resign'),
				'Jatah_cuti' => 15,
				'Dokumen' => $data['dokumen_kontrak']['file_name'],
				'Created_date' => date('Y-m-d H:i:s')
			);
			$this->staff_model->input_data($data, 'hris_staff_contract');
		echo 1;	
}
public function tambah_data_npwp(){
	$config['upload_path']="./assets/dokumen_npwp";
	$config['allowed_types']='pdf|jpg|png';
	$this->load->library('upload',$config);

	//cek dokumen
	if($this->upload->do_upload("dokumen_npwp")){
	$data = array('dokumen_npwp' => $this->upload->data());
	}else{
		echo $this->upload->display_errors();
	}
			$data = array(	
				'Staff_ID' => $this->input->post('staff_id'),
				'No_NPWP' => $this->input->post('no_npwp'),
				'Tanggal_terdaftar' => $this->input->post('tanggal_terdaftar'),
				'Dokumen' => $data['dokumen_npwp']['file_name'],
				'Created_date' => date('Y-m-d H:i:s')
			);
			$this->staff_model->input_data($data, 'hris_staff_npwp');
			echo 1;		
}

public function tambah_data_penilaian_kerja(){
	$config['upload_path']="./assets/dokumen_penilaian_kerja";
	$config['allowed_types']='pdf|jpg|png';
	$this->load->library('upload',$config);

	//cek dokumen
	if($this->upload->do_upload("dokumen_penilaian_kerja")){
	$data = array('dokumen_penilaian_kerja' => $this->upload->data());
	}else{
		echo $this->upload->display_errors();
	}
			$data = array(
				'Kategori_penilaian' => $this->input->post('kategori_penilaian'),
				'StaffID' => $this->input->post('staff_id'),
				'Tanggal' => date('Y-m-d H:i:s'),
				'ID_contract' => $this->input->post('id_kontrak'),
				'Skor_penilaian_kinerja' => $this->input->post('skor_penilaian'),
				'Rekomendasi_atasan' => $this->input->post('rekomendasi_atasan'),
				'Lampiran' => $data['dokumen_penilaian_kerja']['file_name'],
			);
			$this->staff_model->input_data($data, 'hris_penilaian_kinerja');
			echo 1;		
}

 public function hapus_data_asuransi(){
		if ($this->input->post('id_asuransi')) {
			$id_asuransi = $this->input->post('id_asuransi');
			
			$where = array(
				'ID' => $id_asuransi
			);
			$this->staff_model->delete_data($where, 'hris_staff_asuransi');
			echo 1;
		}else{
			echo 2;
		}
 }

 public function hapus_data_bank(){
	if ($this->input->post('id_bank')) {
		$id_bank = $this->input->post('id_bank');
		$where = array(
			'ID' => $id_bank
		);
		$this->staff_model->delete_data($where, 'hris_staff_bank');
		echo 1;
	}else{
		echo 2;
	}
}

public function hapus_data_keluarga(){
	if ($this->input->post('id_keluarga')) {
		$id_keluarga = $this->input->post('id_keluarga');
		$where = array(
			'ID' => $id_keluarga
		);
		$this->staff_model->delete_data($where, 'hris_staff_family');
		echo 1;
	}else{
		echo 2;
	}
}

public function hapus_data_ktp(){
	if ($this->input->post('id_ktp')) {
		$id_ktp= $this->input->post('id_ktp');
		$where = array(
			'ID' => $id_ktp
		);
		$this->staff_model->delete_data($where, 'hris_staff_ktp');
		echo 1;
	}else{
		echo 2;
	}
}

public function hapus_data_kontrak(){
	if ($this->input->post('id_kontrak')) {
		$id_kontrak = $this->input->post('id_kontrak');
		$where = array(
			'ID' => $id_kontrak
		);
		$this->staff_model->delete_data($where, 'hris_staff_contract');
		echo 1;
	}else{
		echo 2;
	}
}

public function hapus_data_npwp(){
	if ($this->input->post('id_npwp')) {
		$id_npwp= $this->input->post('id_npwp');
		$where = array(
			'ID' => $id_npwp
		);
		$this->staff_model->delete_data($where, 'hris_staff_npwp');
		echo 1;
	}else{
		echo 2;
	}
}

public function hapus_data_penilaian_kerja(){
	if ($this->input->post('id_penilaian_kerja')) {
		$id_penilaian_kerja= $this->input->post('id_penilaian_kerja');
		$where = array(
			'ID' => $id_penilaian_kerja
		);
		// $this->staff_model->delete_data($where, 'hris_staff_npwp');
		echo 1;
	}else{
		echo 2;
	}
}

public function edit_data_asuransi(){
//validasi data yang diinput sudah ada atau tidak
$kategori_asuransi = $this->input->post('kategori_asuransi');
$staff_id = $this->input->post('staff_id');
// $cek_data_asuransi = $this->db->get_where('hris_staff_asuransi' , ['Kategori_asuransi' => $kategori_asuransi, 'Staff_ID ' => $staff_id]);

// cek dokumen bpjs kesehatan
if($kategori_asuransi == "BPJS Kesehatan"){
	$config['upload_path']="./assets/dokumen_asuransi/asuransi_bpjs_kesehatan";
}else if($kategori_asuransi == "BPJS Ketenagakerjaan"){
	$config['upload_path']="./assets/dokumen_asuransi/asuransi_bpjs_ketenagakerjaan";
}else if($kategori_asuransi == "Manulife RS"){
	$config['upload_path']="./assets/dokumen_asuransi/manulife_rs";
}else if($kategori_asuransi == "Manulife Jiwa"){
	$config['upload_path']="./assets/dokumen_asuransi/manulife_jiwa";
}
	$config['allowed_types']='pdf|jpg|png';
	$this->load->library('upload',$config);

	if($this->upload->do_upload("asuransi_dokumen")){
	$dokumen = array('dokumen_asuransi' => $this->upload->data());

	$data = array(	
		'Staff_ID' => $staff_id,
		'Reg_number' => $this->input->post('nomor_registrasi'),
		'Start_date' => $this->input->post('tanggal_mulai'),
		'Valid_to' => $this->input->post('tanggal_kadaluwarsa'),
		'Dokumen_BPJS_Kesehatan' => $dokumen['dokumen_asuransi']['file_name'],
		'Updated_date' => date('Y-m-d H:i:s')
	);

	}else{
		$data = array(	
			'Staff_ID' => $staff_id,
			'Reg_number' => $this->input->post('nomor_registrasi'),
			'Start_date' => $this->input->post('tanggal_mulai'),
			'Valid_to' => $this->input->post('tanggal_kadaluwarsa'),
			'Dokumen_BPJS_Kesehatan' => $this->input->post('dokumen_lama'),
			'Updated_date' => date('Y-m-d H:i:s')
		);
	}
		
	$where = array(
		'ID' => $this->input->post('id_asuransi')
	);
		$this->staff_model->update_data($where, $data, 'hris_staff_asuransi');
		echo 1;

}

	public function edit_data_bank(){

	$staff_id = $this->input->post('staff_id');

	$config['upload_path']="./assets/dokumen_bank";
	$config['allowed_types']='pdf|jpg|png';
	$this->load->library('upload',$config);

	if($this->upload->do_upload("bank_dokumen")){
	$dokumen = array('bank_dokumen' => $this->upload->data());
	
	$data = array(	
		'Staff_ID' => $staff_id,
		'Acc_named' => $this->input->post('nama_pemilik'),
		'Acc_no' => $this->input->post('nomor_rekening'),
		'Dokumen' => $dokumen['bank_dokumen']['file_name'],
		'Updated_date' => date('Y-m-d H:i:s')
	);
	}else{
		$data = array(	
		'Staff_ID' => $staff_id,
		'Acc_named' => $this->input->post('nama_pemilik'),
		'Acc_no' => $this->input->post('nomor_rekening'),
		'Dokumen' => $this->input->post('dokumen_lama'),
		'Updated_date' => date('Y-m-d H:i:s')
	);
}
	$where = array(
		'ID' => $this->input->post('id_bank')
	);
		$this->staff_model->update_data($where, $data, 'hris_staff_bank');
		echo 1;
	}

	public function edit_data_keluarga(){

		$staff_id = $this->input->post('staff_id');
		$id_keluarga = $this->input->post('id_keluarga');
		$config['upload_path']="./assets/dokumen_keluarga";
		$config['allowed_types']='pdf|jpg|png';
		$this->load->library('upload',$config);
	
		if($this->upload->do_upload("keluarga_dokumen")){
		$dokumen = array('keluarga_dokumen' => $this->upload->data());
		
		$data = array(	
			'NIK' => $this->input->post('nik'),
			'Name' => $this->input->post('nama'),
			'Phone' => $this->input->post('no_hp'),
			'Gender' => $this->input->post('jenis_kelamin'),
			'Birth_date' => $this->input->post('tanggal_lahir'),
			'Blood_type' => $this->input->post('golongan_darah'),
			'Relation' => $this->input->post('hubungan'),
			'Dokumen' => $dokumen['keluarga_dokumen']['file_name'],
			'Created_date' => date('Y-m-d H:i:s'),

		);
		}else{
			$data = array(	
				'NIK' => $this->input->post('nik'),
				'Name' => $this->input->post('nama'),
				'Phone' => $this->input->post('no_hp'),
				'Gender' => $this->input->post('jenis_kelamin'),
				'Birth_date' => $this->input->post('tanggal_lahir'),
				'Blood_type' => $this->input->post('golongan_darah'),
				'Relation' => $this->input->post('hubungan'),
				'Dokumen' => $this->input->post('dokumen_lama'),
				'Created_date' => date('Y-m-d H:i:s'),
		);
	}
		$where = array(
			'ID' => $this->input->post('id_keluarga')
		);
			$this->staff_model->update_data($where, $data, 'hris_staff_family');
			echo 1;
		}
	
		public function edit_data_ktp(){

			$staff_id = $this->input->post('staff_id');
			$id_ktp = $this->input->post('id_ktp');
			$config['upload_path']="./assets/dokumen_ktp";
			$config['allowed_types']='pdf|jpg|png';
			$this->load->library('upload',$config);
		
			if($this->upload->do_upload("ktp_dokumen")){
			$dokumen = array('ktp_dokumen' => $this->upload->data());
			
			$data = array(	
				'Reg_no' => $this->input->post('nik'),
				'Address' => $this->input->post('alamat'),
				'RT_RW' => $this->input->post('rt_rw'),
				'Kelurahan_desa' => $this->input->post('kelurahan'),
				'Kecamatan' => $this->input->post('kecamatan'),
				'Valid_to' => $this->input->post('masa_berakhir'),
				'Signed_date' => $this->input->post('mulai_berlaku'),
				'Dokumen' => $dokumen['ktp_dokumen']['file_name'],
				'Created_date' => date('Y-m-d H:i:s'),
	
			);
			}else{
				$data = array(	
					'Reg_no' => $this->input->post('nik'),
				'Address' => $this->input->post('alamat'),
				'RT_RW' => $this->input->post('rt_rw'),
				'Kelurahan_desa' => $this->input->post('kelurahan'),
				'Kecamatan' => $this->input->post('kecamatan'),
				'Valid_to' => $this->input->post('masa_berakhir'),
				'Signed_date' => $this->input->post('mulai_berlaku'),
				'Dokumen' => $this->input->post('dokumen_lama'),
				'Created_date' => date('Y-m-d H:i:s'),
			);
		}
			$where = array(
				'ID' => $this->input->post('id_ktp')
			);
			
				$this->staff_model->update_data($where, $data, 'hris_staff_ktp');
				echo 1;
			}
		
	public function edit_data_kontrak(){

				$id_kontrak = $this->input->post('id_kontrak');
				$config['upload_path']="./assets/dokumen_kontrak";
				$config['allowed_types']='pdf|jpg|png';
				$this->load->library('upload',$config);
			
				if($this->upload->do_upload("kontrak_dokumen")){
				$dokumen = array('kontrak_dokumen' => $this->upload->data());
				
				$data = array(	
					'Status' => $this->input->post('status'),
					'Bidang' => $this->input->post('bidang'),
					'Sub_bidang' => $this->input->post('sub_bidang'),
					'Position' => $this->input->post('posisi'),
					'Level' => $this->input->post('level'),
					'Office_location' => $this->input->post('lokasi_kantor'),
					'Start_date' => $this->input->post('mulai_bekerja'),
					'Finish_date' => $this->input->post('selesai_kontrak'),
					'Resign_date' => $this->input->post('tanggal_berhenti'),
					'Dokumen' => $dokumen['kontrak_dokumen']['file_name'],
		
				);
				}else{
					$data = array(	
						'Status' => $this->input->post('status'),
						'Bidang' => $this->input->post('bidang'),
						'Sub_bidang' => $this->input->post('sub_bidang'),
						'Position' => $this->input->post('posisi'),
						'Level' => $this->input->post('level'),
						'Office_location' => $this->input->post('lokasi_kantor'),
						'Start_date' => $this->input->post('mulai_bekerja'),
						'Finish_date' => $this->input->post('selesai_kontrak'),
						'Resign_date' => $this->input->post('tanggal_berhenti'),
						'Dokumen' => $this->input->post('dokumen_lama'),
				);
			}
				$where = array(
					'ID' => $this->input->post('id_kontrak')
				);
					$this->staff_model->update_data($where, $data, 'hris_staff_contract');
					echo 1;
				}

				public function edit_data_npwp(){
					$id_npwp = $this->input->post('id_npwp');
					$config['upload_path']="./assets/dokumen_npwp";
					$config['allowed_types']='pdf|jpg|png';
					$this->load->library('upload',$config);
					
					if($this->upload->do_upload("npwp_dokumen")){
					$dokumen = array('npwp_dokumen' => $this->upload->data());
					
					$data = array(	
						'No_NPWP' => $this->input->post('no_npwp'),
						'Tanggal_terdaftar' => $this->input->post('tanggal_terdaftar'),
						'Dokumen' => $dokumen['npwp_dokumen']['file_name']
					);
					}else{
						$data = array(	
						'No_NPWP' => $this->input->post('no_npwp'),
						'Tanggal_terdaftar' => $this->input->post('tanggal_terdaftar'),
						'Dokumen' => $this->input->post('dokumen_lama')
					);
				}
					$where = array(
						'ID' => $this->input->post('id_npwp')
					);
						$this->staff_model->update_data($where, $data, 'hris_staff_npwp');
						echo 1;
					}

					public function edit_data_penilaian_kerja(){
						$config['upload_path']="./assets/dokumen_penilaian_kerja";
						$config['allowed_types']='pdf|jpg|png';
						$this->load->library('upload',$config);
						
						if($this->upload->do_upload("penilaian_kerja_dokumen")){
						$dokumen = array('penilaian_kerja_dokumen' => $this->upload->data());
						
						$data = array(	
							'Skor_penilaian_kinerja' => $this->input->post('skor'),
							'Rekomendasi_atasan' => $this->input->post('rekomendasi_atasan'),
							'Lampiran' => $dokumen['penilaian_kerja_dokumen']['file_name']
						);
						}else{
							$data = array(	
								'Skor_penilaian_kinerja' => $this->input->post('skor'),
								'Rekomendasi_atasan' => $this->input->post('rekomendasi_atasan'),
								'Lampiran' => $this->input->post('dokumen_lama')
						);
					}
						$where = array(
							'ID' => $this->input->post('id_penilaian_kerja')
						);
							$this->staff_model->update_data($where, $data, 'hris_penilaian_kinerja');
							echo 1;
						}
		public function edit_detail_data_staff(){
							$config['upload_path']="./assets/staff_foto";
							$config['allowed_types']='jpg|png';
							$this->load->library('upload',$config);
							
							if($this->upload->do_upload("gambar_detail_staff")){
							$dokumen = array('gambar_detail_staff' => $this->upload->data());
							
							$data = array(	
								'Photograph' => $dokumen['gambar_detail_staff']['file_name'],
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
								'Status' => $this->input->post('status'),
								'Updated_date' => date('Y-m-d H:i:s'),								
							);
							}else{
								$data = array(	
									'Photograph' => $this->input->post('dokumen_lama'),
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
									'Status' => $this->input->post('status'),
									'Updated_date' => date('Y-m-d H:i:s'),	
							);
						}
							$where = array(
								'ID' => $this->input->post('id_staff')
							);
								$this->staff_model->update_data($where, $data, 'hris_staff_detail');
								echo 1;
							}
	

}