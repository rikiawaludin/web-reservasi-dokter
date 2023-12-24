<?php 

function cek_login(){

    $ci = get_instance();
    if(!$ci->session->userdata('email')){
        redirect('auth');
    }else{
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu ])-> row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if($userAccess ->num_rows() < 1){
            redirect('auth/blok');
        }
    }
}
function cek_login2(){

    $ci = get_instance();
    if(!$ci->session->userdata('email')){
        redirect('auth');
    }else{
        if($role_id = $ci->session->userdata('role_id') == 1){
            $menu = $ci->uri->segment(2);
    
            $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu ])-> row_array();
            $menu_id = $queryMenu['id'];
    
            $userAccess = $ci->db->get_where('user_access_menu', [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]);
    
            if($userAccess ->num_rows() < 1){
                redirect('auth/blok');
            }

        }
        
    }
}

?>