<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
* Admin_login Class
* Class ini digunakan untuk fitur login, proteksi halaman dan logout
*/
class User_access
{
    // SET SUPER GLOBAL
    var $CI = NULL;
    /**
     * Class constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function cek_login()
    {
        //cek session username
        if ($this->CI->session->userdata('username') == '') {
            //set notifikasi
            $this->CI->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Anda belum login!</div>');
            //alihkan ke halaman login
            redirect(site_url('login'));
        }
    }

    public function cek_akses()
    {
        //cek session username
        if ($this->CI->session->userdata('username') == '') {
            //set notifikasi
            $this->CI->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Anda belum login!</div>');
            //alihkan ke halaman login
            redirect(site_url('account/login'));
        } else if ($this->CI->session->userdata('role_id') != 1) {
            $role_id = $this->CI->session->userdata('role_id');
            $menu = $this->CI->uri->segment(1) && $this->CI->uri->segment(2);

            $queryMenu = $this->CI->db->get_where('menu', ['menu' => $menu])->row_array();
            $menu_id = $queryMenu['menuid'];

            $userAccess = $this->CI->db->get_where('user_access_menu', [
                'roleid' => $role_id,
                'menuid' => $menu_id
            ]);

            if ($userAccess->num_rows() < 1) {
                redirect('account/blocked');
            }
        }
    }
}
