<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penawaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_pelelang');
        $this->user_access->cek_login();
        $this->user_access->cek_akses();
    }

    public function index()
    {
        $data['lelang'] = $this->M_pelelang->TampilPembukaan();
        $this->load->view('admin/penawaran/index', $data);
    }

    public function edit($id)
    {
        // $data['order'] = $this->transaksi->getOrderById($id);
        $data['id'] = $id;
        $this->form_validation->set_rules('status_pemeriksaan', 'Status Order', 'required');
        // $this->form_validation->set_rules('bukti', 'Bukti Transfer Penarikan', 'required');
        if ($this->form_validation->run() == false) {
            redirect('admin/penawaran/');
        } else {
            $this->db->set('status', $this->input->post('status_pemeriksaan', true));
            $this->db->set('produk', $this->input->post('nama_produk', true));
            $this->db->set('deskripsi_produk', $this->input->post('deskripsi_produk', true));
            $this->db->set('harga_awal', $this->input->post('harga_awal', true));
            $this->db->set('harga_minimal_diterima', $this->input->post('harga_minimal_diterima', true));
            $this->db->set('jumlah', $this->input->post('jumlah', true));
            $this->db->set('incremental_value', $this->input->post('incremental_value', true));
            $this->db->set('harga_beli_sekarang', $this->input->post('harga_beli_sekarang', true));
            $this->db->set('keterangan', $this->input->post('keterangan', true));
            $this->db->set('tgl_mulai', $this->input->post('tgl_mulai', true));
            $this->db->set('tgl_selesai', $this->input->post('tgl_selesai', true));
            $this->db->where('lelang_id', $id);
            $this->db->update('lelang');
            $this->session->set_flashdata('success', 'Pembukaan Lelang <strong>Berhasil</strong> Diubah!');
            redirect('admin/penawaran/');
        }
    }



    public function detail($id)
    {
        $data['detailtawar'] = $this->M_pelelang->Tawarjoin($id);
        $this->load->view('admin/penawaran/detail.php', $data);
    }

    public function deletebukalelang($id)
    {
        $this->M_pelelang->deleteBukaLelang($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pembukaan Lelang dengan kode ' . $id . ' berhasil dihapus!</div>');
        // ayra $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran dengan kode ' . $id . ' berhasil dihapus!</div>');
        // Akses Controller dikembalikan ke index
        redirect(site_url('admin/penawaran'));
    }
}
