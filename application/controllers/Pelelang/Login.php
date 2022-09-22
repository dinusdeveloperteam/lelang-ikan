<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
		$this->load->model('pelelang/Auth_model', 'auth');
		$this->CI = &get_instance();
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('login');
		}
	}

	public function admin()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$query = $this->auth->getUserPassAdmin($username, $password);
			if ($query->num_rows() > 0) {
				$data = $query->row();
				$this->CI->session->set_userdata('userid', $data->userid);
				$this->CI->session->set_userdata('nama', $data->nama);
				$this->CI->session->set_userdata('username', $data->username);
				$this->CI->session->set_userdata('email', $data->email);
				$this->CI->session->set_userdata('role_id', 'pelelang');
				$this->CI->session->set_userdata('logged_in', true);
				redirect('admin');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . 'Username dan Password tidak cocok atau akun belum terdaftar.' . '</div>');
				redirect('login');
			}
		}
	}
}
