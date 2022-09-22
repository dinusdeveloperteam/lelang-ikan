<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller{
	public function __construct()
	{  
		parent::__construct();
		$this->load->model('pelelang/Riwayat_Model');
		// $this->load->library('form_validation');
		// $this->load->helper('url','form');
	}

	//mengambil data dari database
	public function index(){
		$data['title']  = 'Riwayat';
		$data['dataRiwayat']=$this->Riwayat_Model->getData();
		// $data['RiwayatLelang']=$this->Riwayat_Model->getDataLelang();
		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/riwayat',$data);
		$this->load->view('theme_pelelang/footer', $data);
	}

	//function display riwayat hasil lelang
	public function RiwayatLelang(){
		$data['title']  = 'Riwayat Hasil lelang';
		// $data['dataRiwayat']=$this->Riwayat_Model->getData();
		$data['RiwayatLelang']=$this->Riwayat_Model->getDataLelang();
		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/riwayat_lelang',$data);
		$this->load->view('theme_pelelang/footer', $data);
	}
}