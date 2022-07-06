<?php 

function is_logged_in(){
    $ci = get_instance();
    if(!$ci->session->userdata('email')){
        redirect('auth');
    }else{
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        
        $queryMenu = $ci->db->get_where('view_hris_user_access_validation', ['role_id' => $role_id, 'url' => $menu]);
       
        if ($queryMenu->num_rows() < 1) {
            redirect('Auth/blocked');
        }
}
    }

    function check_access($role_id, $menu_id){
        $ci = get_instance();
        $result = $ci->db->get_where('view_hris_user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id])->result_array();
        if ($result) {
            return "checked='checked'";
        }
    }
