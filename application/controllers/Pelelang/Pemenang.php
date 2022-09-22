<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemenang extends CI_Controller{
	public function __construct()
	{   
		parent::__construct();
		$this->load->model('pelelang/Pemenang_Model');
		// $this->load->library('form_validation');
		// $this->load->helper('url','form');
	} 

	public function index(){
		$data['title']  		= 'Pemenang Lelang';
		$data['dataPemenang']	= $this->Pemenang_Model->getData();
		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/pemenang',$data);
		$this->load->view('theme_pelelang/footer', $data);
	}
}