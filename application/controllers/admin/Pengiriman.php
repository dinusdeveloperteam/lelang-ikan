<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/M_pengiriman');
		$this->user_access->cek_login();
		$this->user_access->cek_akses();
	}

	public function index()
	{
		$data['pengiriman'] = $this->M_pengiriman->getAllPengiriman();
		$this->load->view('admin/pengiriman', $data);
	}

	public function edit($id)
	{
		// $data['order'] = $this->transaksi->getOrderById($id);
		$data['id'] = $id;
		$this->form_validation->set_rules('status_transaksi', 'Status Order', 'required');
		// $this->form_validation->set_rules('bukti', 'Bukti Transfer Penarikan', 'required');
		if ($this->form_validation->run() == false) {
			redirect('admin/pengiriman/');
		} else {
			$this->db->set('status_transaksi', $this->input->post('status_transaksi', true));
			$this->db->set('nama_pengirim', $this->input->post('nama_pengirim', true));
			$this->db->set('nama_kendaraan', $this->input->post('nama_kendaraan', true));
			$this->db->set('no_polisi', $this->input->post('no_polisi', true));
			$this->db->set('no_hp', $this->input->post('no_hp', true));
			$this->db->where('pengiriman_id', $id);
			$this->db->update('lelang_pengiriman');
			$this->session->set_flashdata('success', 'Pengiriman Lelang <strong>Berhasil</strong> Diubah!');
			redirect('admin/pengiriman/');
		}
	}

	public function deletekirimlelang($id)
	{
		$this->M_pengiriman->deletePengiriman($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pengiriman Lelang dengan kode ' . $id . ' berhasil dihapus!</div>');
		// ayra $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran dengan kode ' . $id . ' berhasil dihapus!</div>');
		// Akses Controller dikembalikan ke index
		redirect(site_url('admin/pengiriman'));
	}
}
