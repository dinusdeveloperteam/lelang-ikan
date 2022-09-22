<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemenang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_pemenang');
        $this->user_access->cek_login();
        $this->user_access->cek_akses();
    }



    // Me
    public function index()
    {
        $data['datapemenang'] = $this->M_pemenang->getData();
        $this->load->view('admin/pemenang', $data);
    }

    public function deletepemenang($id)
    {
        $this->M_pemenang->deletePemenang($id);
        // ayra $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran dengan kode ' . $id . ' berhasil dihapus!</div>');
        // Akses Controller dikembalikan ke index
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect(site_url('admin/pemenang'));
    }
}
