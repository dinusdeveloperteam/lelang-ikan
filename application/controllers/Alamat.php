<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->helper('url','form');
        $this->load->library(array('form_validation','session'));

    }

    public function index(){
        
        $data['nama'] = $this->session->userdata('nama');
        $peserta_id = $this->session->userdata('peserta_id');
		$data['peserta'] = $this->Home_model->getPesertaById($peserta_id);
        $data['transaksi'] = $this->Home_model->getTransaksiById($peserta_id);
        //$data['result'] = $this->Home_model->getAllPeserta();
        //$data['kategori'] = $this->Home_model->countAllData();
        //jika sudah login
        if ($this->session->userdata('logged_in') == 'true') {
            $this->load->view('_partials/user/head', $data);
           
        } else {
            $this->load->view('_partials/head', $data);
        }
            $this->load->view('alamat',$data);
    }

    function edit_alamat_kirim()
    {
        //if (isset($_POST['submit'])) {
            //$id = $this->session->userdata('peserta_id');
            $id = $this->input->post('lelang_id');
            $data['lelang_pemenang']= $this->Home_model->alamat_kirim($id);

            //$this->Home_model->update($id);
            //$this->uploadnew($id,$data);
            $this->session->set_flashdata('success', 'Peserta Lelang <strong>Berhasil</strong> Diubah!');
            //var_dump($this->db->last_query());
            //die;
            redirect('transaksi');
        //} else {
            // $id = $this->uri->segment(4);
            // $data['row'] = $this->Home_model/update->get($id)->row_array();
            // $this->load->view('Update.php', $data);
        //}
    }
}