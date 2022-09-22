<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelelang extends CI_Controller
{


	public function index()
	{
		$this->load->view('admin/kelolaakun/pelelang/index.php');
		$this->user_access->cek_login();
		$this->user_access->cek_akses();
	}
}
