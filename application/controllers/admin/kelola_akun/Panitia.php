<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panitia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_kelolaakun_panitia');
        $this->user_access->cek_login();
        $this->user_access->cek_akses();
    }

    public function index()
    {
        $data['panitiax'] = $this->M_kelolaakun_panitia->getAllPanitia();
        $this->load->view('admin/kelolaakun/panitia/index.php', $data);
    }

    public function deletepanitia($id)
    {
        $this->M_kelolaakun_panitia->deletePanitia($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Penitia dengan kode ' . $id . ' berhasil dihapus!</div>');
        // ayra $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran dengan kode ' . $id . ' berhasil dihapus!</div>');
        // Akses Controller dikembalikan ke index
        redirect(site_url('admin/kelola_akun/panitia'));
    }

    function detail()
    {
        $id     = $this->uri->segment(5);
        $data['row']   = $this->db->get_where('panitia', array('panitia_id' => $id))->row_array();
        $this->load->view('admin/pelelang/detail.php', $data);
    }

    function edit()
    {

        if (isset($_POST['submit'])) {
            $this->M_kelolaakun_panitia->edit();
            $this->session->set_flashdata('success', 'Penitia Lelang <strong>Berhasil</strong> Diubah!');
            redirect('admin/kelola_akun/panitia');
        } else {
            $id = $this->uri->segment(5);
            $data['row'] = $this->M_kelolaakun_panitia->get($id)->row_array();
            $this->load->view('admin/kelolaakun/panitia/edit.php', $data);
        }
    }
}
