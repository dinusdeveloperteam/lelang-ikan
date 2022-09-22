<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pemenang_model');
		$this->user_access->cek_login();
		$this->user_access->cek_akses();
	}

	public function index()
	{
		$data['datatestimoni'] = $this->Pemenang_model->getTampiltestimoni();
		$this->load->view('admin/testimoni', $data);
	}
}
