<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_dashboard');
        $this->user_access->cek_login();
        $this->user_access->cek_akses();
    }

    public function index()
    {
        $data['totalpelelang'] = $this->M_dashboard->countAllPelelang();
        $data['totalpemenanglelang'] = $this->M_dashboard->countAllPemenang();
        $data['totalpeserta'] = $this->M_dashboard->countAllPeserta();
        $data['totalpembukaanlelang'] = $this->M_dashboard->countAllPembukaanLelang();
        $data['totalpenawaranlelang'] = $this->M_dashboard->countAllPenawaranLelang();
        $data['totalpanitialelang'] = $this->M_dashboard->countAllPanitiaLelang();
        $this->load->view('admin/dashboard', $data);
    }
}
