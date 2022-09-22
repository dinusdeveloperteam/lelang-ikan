<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->helper('url','form');
        $this->load->library(array('form_validation','session'));

    }
    public function index(){
        $id=$this->session->userdata('peserta_id');
        $data['peserta']= $this->Home_model->getPesertaById($id);
        $this->load->view('deposit',$data);

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

    function depo()
    {

        //if (isset($_POST['submit'])) {
            $id = $this->session->userdata('peserta_id');
            //$data['peserta_deposit']= $this->Home_model->getPesertaById($id);
            $this->Home_model->deposit($id);
            $this->upload($id);
            $this->session->set_flashdata('success', 'Peserta Lelang <strong>Berhasil</strong> Diubah!');
            // var_dump($this->db->last_query());
            // die;
            redirect('profile');
        //} else {
            // $id = $this->uri->segment(4);
            // $data['row'] = $this->Home_model/update->get($id)->row_array();
            // $this->load->view('Update.php', $data);
        //}
    }

    private function upload($id)
    {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '5000';
        $config['upload_path'] = './vendors/images/peserta/bukti_transfer_deposit/';
        $config['overwrite']     = TRUE;
        // $config['file_name'] = ;
        $this->load->library('upload', $config);
        if (!empty($_FILES['bukti_pembayaran'])) {
            $this->upload->do_upload('bukti_pembayaran');
           // $old_deposit = $data['peserta_deposit']['bukti_pembayaran'];
            //$config['upload_path'] = './vendors/images/peserta/ktp/';
            //unlink(FCPATH . 'vendors/images/peserta/bukti_transfer_deposit/' . $old_deposit);
            $data1 = $this->upload->data();
            rename($data1['full_path'], $data1['file_path'] . 'Deposit-' . $id . '-' . $data1['file_name']);
            $bukti_pembayaran = 'Deposit-' . $id . '-' . $data1['file_name'];
        }
        $data = [
            'bukti_pembayaran' => $bukti_pembayaran
        ];
        $this->db->where('peserta_id', $id);
        $this->db->update('peserta_deposit', $data);
    }
}