<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->helper('url','form');
        $this->load->library(array('form_validation','session'));
    }
    public function index(){
        $this->load->view('register');

        $data['nama'] = $this->session->userdata('nama');
        //$data['result'] = $this->Home_model->getAllPeserta();
        //$data['kategori'] = $this->Home_model->countAllData();
        //jika sudah login
        if ($this->session->userdata('logged_in') == 'true') {
            $this->load->view('_partials/user/head', $data);
           
        } else {
            $this->load->view('_partials/head', $data);
        }
    }

    public function register_peserta(){
 
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('username', 'username', 'required|callback_check_username_exists');
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('password', 'confirm_password', 'matches[password]');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('telp', 'telp', 'required');
    $this->form_validation->set_rules('email', 'email', 'required|callback_check_email_exists');
    $this->form_validation->set_rules('nik', 'nik', 'required');

        if($this->form_validation->run($this) == FALSE){
            $this->load->view('register');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->Home_model->register_peserta($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', 'Akun Anda telah terdaftar dan dapat login');

            redirect('login');
        }
    }

    public function check_username_exists($username){
        $query = $this->db->get_where('peserta', array('username' => $username));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    public function check_email_exists($email){
        $query = $this->db->get_where('peserta', array('email' => $email));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }
}