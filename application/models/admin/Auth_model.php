<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{


    public function getUserPassAdmin($username, $password)
    {
        //cek user admin
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        return $this->db->get();
    }

}