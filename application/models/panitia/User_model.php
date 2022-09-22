<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url', 'form');
        $this->load->library(array('form_validation', 'session'));
    }

    //mengambil data pelelang untuk menampilkan username didalm dashboard
    public function dataPelelang()
    {
        $this->db->select("nama");
        $this->db->from('pelelang');
        $query = $this->db->get();
        return $result = $query->row();
    }


    //membuat function untuk register peserta
    public function register_peserta($enc_password)
    {

        // User data array
        $this->db->select('MAX(RIGHT(peserta_id,5)) as peserta_id', FALSE);
        $this->db->from('peserta');
        $this->db->where('peserta_id !=', 'NULL');
        $query = $this->db->get();
        $kode = $query->row();
        $num = substr($kode->peserta_id, 1, 5);
        $add = (int)$num + 1;
        if (strlen($add) == 1) {
            $kodebaru = "0000" . $add;
        } else if (strlen($add) == 2) {
            $kodebaru = "000" . $add;
        } else if (strlen($add) == 3) {
            $kodebaru = "00" . $add;
        } else if (strlen($add) == 4) {
            $kodebaru = "0" . $add;
        } else {
            $kodebaru = "" . $add;
        }
        $data = array(
            'peserta_id' => 'PSY-' . date('Y') . '-' . $kodebaru,
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'status'    => 0
        );


        // Insert user
        return $this->db->insert('peserta', $data);
    }

    function validasi_peserta($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('peserta', 1);
        return $result;
    }


    //register pelelang
    public function register_pelelang($enc_password)
    {

        // User data array
        $this->db->select('MAX(RIGHT(pelelang_id,5)) as pelelang_id', FALSE);
        $this->db->from('pelelang');
        $this->db->where('pelelang_id !=', 'NULL');
        $query = $this->db->get();
        $kode = $query->row();
        $num = substr($kode->pelelang_id, 1, 5);
        $add = (int)$num + 1;
        if (strlen($add) == 1) {
            $kodebaru = "0000" . $add;
        } else if (strlen($add) == 2) {
            $kodebaru = "000" . $add;
        } else if (strlen($add) == 3) {
            $kodebaru = "00" . $add;
        } else if (strlen($add) == 4) {
            $kodebaru = "0" . $add;
        } else {
            $kodebaru = "" . $add;
        }
        $data = array(
            'pelelang_id' => 'PL-' . date('Y') . '-' . $kodebaru,
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'status'    => 0
        );


        // Insert user
        return $this->db->insert('pelelang', $data);
    }


    // Log user in
    public function login_peserta($username, $password)
    {
        // Validate
        // 
        $query = $this->db->get_where('peserta', array('username' => $username));
        if ($query->num_rows() > 0) {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('logged_in', TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    // pelelang log in
    public function login_pelelang($username, $password)
    {
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('pelelang');

        if ($result->num_rows() == 1) {
            return $result->row(0)->pelelang_id;
        } else {
            return false;
        }
    }

    // panitia log in
    public function login_panitia($username, $password)
    {
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('panitia', 1);

        //  $result = $this->db->get('panitia');
        //  if($result->num_rows() == 1){
        //   return $result->row(0)->panitia_id;
        //  } else {
        //   return false;
        //  }
    }

    // admin log in
    public function login_admin($username, $password)
    {
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('admin');

        if ($result->num_rows() == 1) {
            return $result->row(0)->userid;
        } else {
            return false;
        }
    }


    // Check username exists
    public function check_username_exists($username)
    {
        $query = $this->db->get_where('peserta', array('username' => $username));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    // Check email exists
    public function check_email_exists($email)
    {
        $query = $this->db->get_where('peserta', array('email' => $email));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }
}
