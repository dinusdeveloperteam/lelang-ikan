<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback extends CI_Controller{
	public function __construct() 
	{  
		parent::__construct();
		$this->load->model('pelelang/Feedback_Model');
		$this->load->library('form_validation'); 
		$this->load->helper('url','form');
	} 

	public function index(){
		$data['title']  = 'Feedback';
		$data['dataPemenang']=$this->Feedback_Model->data();
		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/feedback',$data);
		$this->load->view('theme_pelelang/footer', $data);
	} 
}