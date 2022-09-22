<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Login extends CI_Model
{
    //check username untuk login admin
    public function check_user($username, $password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        return $query;
    }
}
