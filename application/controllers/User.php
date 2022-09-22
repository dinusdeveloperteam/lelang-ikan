<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{ 
   function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url', 'form');
        $this->load->library(array('form_validation', 'session'));
    }

    //membuat method function untuk redirect login 
    function index()
    {
        if (!$this->session->userdata('logged_in') == TRUE) {
            $this->load->view('user/login');
        } else {
            $url = base_url('home');
            redirect($url);
        }
    }
    // Register user/peserta
    public function register_peserta()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('username', 'username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('password', 'confirm_password', 'matches[password]');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('nik', 'nik', 'required');

        if ($this->form_validation->run($this) == FALSE) {
            $this->load->view('user/register');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->User_model->register_peserta($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

            redirect('user/login_peserta');
        }
    }

    // Register user/peserta
    public function register_pelelang()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[pelelang.username]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('password', 'confirm_password', 'matches[password]');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|is_unique[pelelang.email]');
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('npwp', 'npwp', 'required');
        if ($this->form_validation->run($this) == FALSE) {
            $this->load->view('user/register_pelelang');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->User_model->register_pelelang($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', '<div class="alert alert-success text-center">Anda Berhasil Terdaftar!Sekarang sudah bisa login</div>');
             
            redirect('User');
        }
    }

    // //VERIFIKASI EMAIL REGISTRASI
    //  function verify()
    //  {
    //      if ($this->User_model->verifyEmailID())
    //      {
    //          $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
    //          redirect('user/register_pelelang');
    //      }
    //      else
    //      {
    //          $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
    //          redirect('user/register_pelelang');
    //      }
    //  }

     
    // Log in user
    public function login_peserta()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/login');
        } else {
            $username = $this->input->post('username', true);
            $password = md5($this->input->post('password', true));

            $validasi = $this->User_model->validasi_peserta($username, $password);
            if ($validasi->num_rows() > 0) {
                $data           = $validasi->row_array();
                $peserta_id     = $data['peserta_id'];
                $nama           = $data['nama'];
                $username       = $data['username'];
                $nik            = $data['nik'];
                $status         = $data['status'];

                $sessdata = array(
                    'peserta_id'    => $peserta_id,
                    'nama'          => $nama,
                    'username'      => $username,
                    'nik'           => $nik,
                    'status'        => $status,
                    'admin'         => TRUE
                );
                
                $this->session->set_userdata($sessdata);

                if ($peserta_id === $peserta_id) {
                    redirect('peserta');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                                    <div class="alert-text">Username atau Password salah</div>
                                                                </div>');
                redirect('User');
            }
        }
    }

    // Log in pelelang
    public function login_pelelang()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/login');
        } else { 
            $username = $this->input->post('username', true);
            $password = md5($this->input->post('password', true));
            $validasi = $this->User_model->login_pelelang($username, $password);

            if ($validasi->num_rows() > 0) {
                $data           = $validasi->row_array();
                $pelelang_id    = $data['pelelang_id '];
                $nama           = $data['nama'];
                $nik            = $data['nik'];
                $username       = $data['username'];
                $role           = $data['role'];

                $sessdata = array(
                    'pelelang_id '  => $pelelang_id,
                    'nama'          => $nama,
                    'nik'           => $nik,
                    'username'      => $username,
                    'role'          => $role,
                    'pelelang'      => true
                );

                $this->session->set_userdata($sessdata);
                if ($pelelang_id  === $pelelang_id) {
                    redirect('pelelang/dashboard');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="border-radius: 6px;">
                                                            <i data-feather="bell"></i>
                                                            <p>Wrong username and password !!</p>
                                                        </div>');

                redirect('User');
            }
        } 
    }
    // Log in panitia
    public function login_panitia()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/login');
        } else {
            //get username
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            //login user
            $user_id = $this->User_model->login_panitia($username, $password);

            if ($user_id) {
                //membuat session login
                $user_data = array(
                    'panitia_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );
                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('user_loggedin', 'Selamat Anda Berhasil Login');

                redirect('Panitia/dashboard');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', '<div class="alert   

           alert-danger text-center">username dan password salah!</div>');

                redirect('User/login_panitia');
            }
        } 
    }

    // Log in admin
    public function login_admin()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/login');
        } else {
            $username = $this->input->post('username', true);
            $password = md5($this->input->post('password', true));
            $validasi = $this->User_model->login_admin($username, $password);

            if ($validasi->num_rows() > 0) {
                $data           = $validasi->row_array();
                $userid         = $data['userid'];
                $nama           = $data['nama'];
                $username       = $data['username'];
                $role           = $data['role'];

                $sessdata = array(
                    'userid'        => $userid,
                    'nama'          => $nama,
                    'username'      => $username,
                    'role'          => $role,
                    'admin'         => true
                );

                $this->session->set_userdata($sessdata);
                if ($userid === $userid) {
                    redirect('pelelang/dashboard');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="border-radius: 6px;">
                                                            <i data-feather="bell"></i>
                                                            <p>Wrong username and password !!</p>
                                                        </div>');

                redirect('User');
            }
        }
    }

    // Log user out
    public function logout()
    {
        // Unset user data
        // $this->session->unset_userdata('logged_in');
        // $this->session->unset_userdata('peserta_id');
        // $this->session->unset_userdata('username');

        $this->session->sess_destroy();

        // Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');

        redirect('User');
    }

    // Check if username exists
    public function check_username_exists($username)
    {
        $this->form_validation->set_message('check_username_exists', 'Usrname Sudah diambil. Silahkan gunakan username lain');
        if ($this->User_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }

    // Check if email exists
    public function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists', 'Email Sudah diambil. Silahkan gunakan email lain');
        if ($this->User_model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }
}
