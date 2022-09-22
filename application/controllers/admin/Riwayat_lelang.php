<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_lelang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_riwayat');
        $this->user_access->cek_login();
        $this->user_access->cek_akses();
    }

    public function index()
    {
        $data['riwayat'] = $this->M_riwayat->getAllRiwayat();
        $this->load->view('admin/riwayat', $data);
    }
}
