<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{


	public function index()
	{
		$this->load->view('admin/kelolaakun/peserta/index.php');
		$this->user_access->cek_login();
		$this->user_access->cek_akses();
	}
}
