<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	// function __construct(){
	// 	parent::__construct();
	// 	if($this->session->userdata('logged_in') !=TRUE){
 //            $url=base_url('login');
 //            redirect($url);
	// 	};
	// }
    public function index(){
		$data['title'] = 'Home';

		$this->load->view('theme_front/header', $data);
		$this->load->view('home', $data);
		$this->load->view('theme_front/footer', $data);
    }
}