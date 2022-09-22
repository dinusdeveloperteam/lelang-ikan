<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/M_penerimaan');
		$this->user_access->cek_login();
		$this->user_access->cek_akses();
	}

	public function index()
	{
		$data['penerimaan'] = $this->M_penerimaan->getAllPenerimaan();
		$this->load->view('admin/penerimaan', $data);
	}

	public function edit($id)
	{
		// $data['order'] = $this->transaksi->getOrderById($id);
		$data['id'] = $id;
		$this->form_validation->set_rules('konfirmasi_terimaproduk', 'Status Order', 'required');
		// $this->form_validation->set_rules('bukti', 'Bukti Transfer Penarikan', 'required');
		if ($this->form_validation->run() == false) {
			redirect('admin/penerimaan/');
		} else {
			$this->db->set('konfirmasi_terimaproduk', $this->input->post('konfirmasi_terimaproduk', true));
			$this->db->where('lelang_id', $id);
			$this->db->update('lelang_pemenang');
			$this->session->set_flashdata('success', 'Konfirmasi Terima Produk Lelang <strong>Berhasil</strong> Diubah!');
			redirect('admin/penerimaan/');
		}
	}
}
