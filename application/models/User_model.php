<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    //get code auth verification
    public function verifyEmail(){
          //generate code notification register dengan email
        //   $set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //   $code = substr(str_shuffle($set), 0, 12);
        //   return $code;
    }

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
            'status'    => 0,
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
         //generate code notification register dengan email
         $set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $code = substr(str_shuffle($set), 0, 12);

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
            'npwp' => $this->input->post('npwp'),
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
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('pelelang', 1);
    }

    // panitia log in
    public function login_panitia($username, $password)
    {
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('panitia');

        if ($result->num_rows() == 1) {
            return $result->row(0)->panitia_id;
        } else { 
            return false;
        }
    }

    // admin log in
    public function login_admin($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('admin', 1);
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

    //verification email registrasi
    public function sendEmail($to_mail){
        $from_email='6e0034e21a8b1d';
        $subject='Verify your email address';
        $to_email='narifo9736@pelung.com';
        $token['auth']=$code;
        $message ='<h1 style="text-align: center; color: #20d8ed;"><strong>Confirmation Email</strong></h1>
        <p style="text-align: center;"><strong>TripBuilderPro email confirmation<br />Thank you for your interest, we hope you find the program useful</strong></p>
        <p style="text-align: center;">&nbsp;</p>
        <p><strong><img style="display: block; margin-left: auto; margin-right: auto;" src="https://res.cloudinary.com/belum-punya/image/upload/v1487666277/datadrivensystems/tripbuilder.png" width="543" height="330" /></strong></p>
        <p>&nbsp;</p>
        <p style="text-align: center;">You are just one step away from your free trial.<br />Please click the link below to verify your email.</p>
        <p style="text-align: center;">&nbsp;</p>
        <p style="text-align: center;">
        <a style="background: orange; color: #ffffff; padding: 10px 50px; border-radius: 3px;" href="https://www.tripbuilderpro.com/apps/.$code.">confirm</a>
        </p>
        <p style="text-align: center;">&nbsp;</p>
        <p style="text-align: center; font-size: 10px;"><code>Trip Builder Pro is a registered business name of Trip Builder Pro England Limited.</code><br /><code>Registered in London as a private limited company, Company Number 4777441</code><br /><code>registered Office: Wilton Plaza, Wilton Place, London</code></p>
        <p>&nbsp;</p>';
        
         //configure email settings
         $config['protocol'] = 'smtp';
         $config['smtp_host'] = 'smtp.mailtrap.io'; //smtp host name
         $config['smtp_port'] = '2525'; //smtp port number
         $config['smtp_user'] = $from_email;
         $config['smtp_pass'] = 'bb206e0375e356'; //$from_email password
         $config['mailtype'] = 'html';
         $config['charset'] = 'iso-8859-1';
         $config['wordwrap'] = TRUE;
         $config['newline'] = "\r\n"; //use double quotes
         $this->email->initialize($config);
         
         //send mail
         $this->email->from($from_email, 'Website');
         $this->email->to($to_email);
         $this->email->subject($subject);
         $this->email->message($message);
         return $this->email->send();
    }

     //activate user account
     function verifyEmailID($key)
     {
         $data = array('auth' => $code);
         $this->db->where('email', $key);
         return $this->db->update('pelelang', $data);
     }
}
