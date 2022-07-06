<?php
defined('BASEPATH') or exit('No direct script access allowed');
class staff_model extends CI_Model
{
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function data_staff_login($email){
        $sql = "SELECT * FROM `user` u 
        JOIN `hris_staff_detail` hsd
        ON `u`.`staff_id` = `hsd`.`ID`
        WHERE `email` = '$email' ";
        return $this->db->query($sql);
        
    }

    function input_data_staff($nama_lengkap, $created_date){
        $sql = "INSERT INTO `hris_staff_detail` (`Full_name`, `created_date`)
        VALUES ('$nama_lengkap', '$created_date')";
        return $this->db->query($sql);
    }
    function daftar_staff(){
        $sql = "SELECT * FROM `view_hris_profiles_staff_detail_status_contract_last`
    ORDER BY
        `Full_name` ASC";
        return $this->db->query($sql);
    }
    public function ajaxsearch_staff($keyword){
        $sql = "SELECT
        `hris_staff_detail`.*, `view_hris_profiles_staff_detail_status_contract_last`.`Employee_reg_number`,
        `view_hris_profiles_staff_detail_status_contract_last`.`Position`,
         `view_hris_profiles_staff_detail_status_contract_last`.`StatusKaryawan`,
	     `view_hris_profiles_staff_detail_status_contract_last`.`LEVEL`
    FROM
        `hris_staff_detail`
    LEFT JOIN `view_hris_profiles_staff_detail_status_contract_last` ON `hris_staff_detail`.`ID` = `view_hris_profiles_staff_detail_status_contract_last`.`Staff_ID`
    WHERE  `hris_staff_detail`.`Full_name` LIKE '%$keyword%' OR `view_hris_profiles_staff_detail_status_contract_last`.`StatusKaryawan` LIKE '%$keyword%'
    ORDER BY
        `Full_name` ASC";
        return $this->db->query($sql);
    }
    public function data_asuransi_staff($id_profile){
        $sql = "SELECT `hris_staff_asuransi`.*, `hris_staff_detail`.`Photograph`,
        `hris_staff_detail`.`Full_name`,
        `hris_staff_detail`.`Office_location`,
        `hris_staff_detail`.`Email1`,
        `hris_staff_detail`.`Phone1`,
        `hris_staff_detail`.`Address`,
        `hris_staff_detail`.`Gender`,
        `option_asuransi_kategori`.`Kategori_asuransi`,
        `option_asuransi_kategori`.`Urutan`
        FROM
	`hris_staff_asuransi`
    INNER JOIN `hris_staff_detail` ON `hris_staff_asuransi`.`Staff_ID` = `hris_staff_detail`.`ID`
    INNER JOIN `option_asuransi_kategori` ON `hris_staff_asuransi`.`Kategori_asuransi` = `option_asuransi_kategori`.`ID`
        WHERE `hris_staff_detail`.`ID` = $id_profile";
        return $this->db->query($sql);
    }
    public function data_bank_staff($id_profile){
        $sql = "SELECT `hris_staff_bank`. *,
        `hris_staff_detail`.`Photograph`,
            `hris_staff_detail`.`Full_name`,
            `hris_staff_detail`.`Office_location`,
            `hris_staff_detail`.`Email1`,
            `hris_staff_detail`.`Phone1`,
            `hris_staff_detail`.`Address`
            FROM
            `hris_staff_bank`
            INNER JOIN `hris_staff_detail` ON `hris_staff_bank`.`Staff_ID` = `hris_staff_detail`.`ID` 
        WHERE `hris_staff_detail`.`ID` = $id_profile";
        return $this->db->query($sql);
    }
    public function data_keluarga($id_profile){
        $sql = "SELECT `hris_staff_family`.`ID`,
        `hris_staff_family`.`Staff_username`,
        `hris_staff_family`.`Staff_ID`,
        `hris_staff_family`.`No_KK`,
        `hris_staff_family`.`NIK`,
        `hris_staff_family`.`Name`,
        `hris_staff_family`.`Phone`,
        `hris_staff_family`.`Email`,
        `hris_staff_family`.`Birth_date`,
        `hris_staff_family`.`Dokumen`,
        `hris_staff_family`.`Created_by`,
        `hris_staff_family`.`Created_date`,
        `hris_staff_family`.`Updated_by`,
        `hris_staff_family`.`Updated_date`,
        `hris_staff_detail`.`Photograph`,
        `hris_staff_detail`.`Full_name`,
        `hris_staff_detail`.`Office_location`,
        `hris_staff_detail`.`Email1`,
        `option_blood_type`.`Blood_type`,
        `option_gender`.`Gender`,
        `option_relationship`.`Relationship`
        FROM
            `hris_staff_family`
        LEFT JOIN `hris_staff_detail` ON `hris_staff_family`.`Staff_ID` = `hris_staff_detail`.`ID`
        LEFT JOIN `option_gender` ON `hris_staff_family`.`Gender` = `option_gender`.`ID`
        LEFT JOIN `option_relationship` ON `hris_staff_family`.`Relation` = `option_relationship`.`ID`
        LEFT JOIN `option_blood_type` ON `hris_staff_family`.`Blood_type` = `option_blood_type`.`ID`

        WHERE `hris_staff_family`.`Staff_ID` = $id_profile";
        return $this->db->query($sql);
    }
    public function data_ktp($id_profile){
        $sql= "SELECT `hris_staff_ktp`. *,
        	`hris_staff_detail`.`Photograph`,
            `hris_staff_detail`.`Full_name`,
            `hris_staff_detail`.`Office_location`,
            `hris_staff_detail`.`Email1`
            FROM
            `hris_staff_detail`
            INNER JOIN `hris_staff_ktp` ON `hris_staff_ktp`.`Staff_ID` = `hris_staff_detail`.`ID`
        WHERE `hris_staff_detail`.`ID` = $id_profile";
      return $this->db->query($sql);    
}

public function data_kontrak($id_profile){
    $sql= "SELECT * FROM `view_hris_staff_contract`
    WHERE `Staff_ID` = $id_profile";
  return $this->db->query($sql);    
}
public function semua_data_kontrak(){
    $sql= "SELECT * FROM `view_hris_staff_contract`
    ORDER BY `Full_name` ASC";
  return $this->db->query($sql);    
}

public function semua_data_bank(){
    $sql= "SELECT * FROM `view_hris_data_bank`
    ORDER BY `Full_name` ASC";
  return $this->db->query($sql);    
}

public function semua_data_ktp(){
    $sql= "SELECT * FROM `view_hris_staff_ktp`
    ORDER BY `Full_name` ASC";
  return $this->db->query($sql);    
}
public function semua_data_npwp(){
    $sql= "SELECT * FROM `view_hris_staff_npwp`
    ORDER BY `Full_name` ASC";
  return $this->db->query($sql);    
}

public function semua_data_keluarga(){
    $sql= "SELECT * FROM `view_hris_data_family`
    ORDER BY `Full_name` ASC";
  return $this->db->query($sql);    
}
public function semua_data_asuransi(){
    $sql= "SELECT * FROM `view_hris_data_asuransi`
    ORDER BY `Full_name` ASC";
  return $this->db->query($sql);    
}
public function semua_data_penilaian_kerja(){
    $sql= "SELECT * FROM `view_hris_penilaian_kerja`
    ORDER BY `Full_name` ASC";
  return $this->db->query($sql);    
}
public function data_npwp($id_profile){
    $sql= "SELECT `hris_staff_npwp`.*,
        `hris_staff_detail`.`Photograph`,
    `hris_staff_detail`.`Full_name`,
    `hris_staff_detail`.`Email1`,
    `hris_staff_detail`.`Office_location`
        FROM
    `hris_staff_npwp`
    INNER JOIN `hris_staff_detail` ON `hris_staff_npwp`.`Staff_ID` = `hris_staff_detail`.`ID` 
        WHERE `Staff_ID` = $id_profile";
  return $this->db->query($sql);    
}
public function data_penilaian_kerja($id_profile){
    $sql = "SELECT*FROM `view_hasil_penilaian_kerja`
    WHERE `StaffID` = $id_profile";
    return $this->db->query($sql);
}
public function data_kontrak_terakhir($id_profile){
    $sql = "SELECT MAX(`ID`) as 'id_kontrak', `Start_date`, `Finish_date` FROM `hris_staff_contract`
    WHERE `Staff_ID` = $id_profile";
    return $this->db->query($sql);
}
function detail_staff($id_profile){
    $sql = "SELECT
    `hris_staff_detail`.*, `view_hris_profiles_staff_detail_status_contract_last`.`Employee_reg_number`,
    `view_hris_profiles_staff_detail_status_contract_last`.`Position`,
     `view_hris_profiles_staff_detail_status_contract_last`.`StatusKaryawan`,
     `view_hris_profiles_staff_detail_status_contract_last`.`LEVEL`
FROM
    `hris_staff_detail`
LEFT JOIN `view_hris_profiles_staff_detail_status_contract_last` ON `hris_staff_detail`.`ID` = `view_hris_profiles_staff_detail_status_contract_last`.`Staff_ID`
WHERE `Staff_ID` = $id_profile";
    return $this->db->query($sql);
}
}
