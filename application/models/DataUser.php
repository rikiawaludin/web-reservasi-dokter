<?php

class DataUser extends CI_Model
{


    function get_user()
    {
        $result = $this->db->get('user');
        return $result;

    }
}