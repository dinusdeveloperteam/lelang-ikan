<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelelang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Kelolapelelang_model');
        $this->user_access->cek_login();
        $this->user_access->cek_akses();
    }

    public function index()
    {
        $data['pelelang'] = $this->Kelolapelelang_model->getAllKelola();
        $this->load->view('admin/pelelang/index.php', $data);
    }

    public function deletepelelang($id)
    {
        $this->Kelolapelelang_model->deletePelelang($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pelelang dengan kode ' . $id . ' berhasil dihapus!</div>');
        // Akses Controller dikembalikan ke index
        // ayra $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran dengan kode ' . $id . ' berhasil dihapus!</div>');
        // Akses Controller dikembalikan ke index
        redirect(site_url('admin/pelelang'));
    }

    function detail()
    {
        $id     = $this->uri->segment(4);
        $data['row']   = $this->db->get_where('pelelang', array('pelelang_id' => $id))->row_array();
        $this->load->view('admin/pelelang/detail.php', $data);
    }

    function edit()
    {

        if (isset($_POST['submit'])) {
            $this->Kelolapelelang_model->edit();
            $this->session->set_flashdata('success', 'Pelelang Ikan <strong>Berhasil</strong> Diubah!');
            redirect('admin/pelelang/');
        } else {
            $id = $this->uri->segment(4);
            $data['row'] = $this->Kelolapelelang_model->get($id)->row_array();
            $this->load->view('admin/pelelang/edit.php', $data);
        }
    }
}
