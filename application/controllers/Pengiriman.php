<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        $this->load->model('Home_model','home');

    }

    public function index(){
        
        $data['nama'] = $this->session->userdata('nama');
        $peserta_id = $this->session->userdata('peserta_id');
		$data['peserta'] = $this->home->getPesertaById($peserta_id);
        $data['kirim'] = $this->home->getPengiriman($peserta_id);
        //$data['transaksi']=$this->home->getTransaksi($peserta_id);
        //$data['subtotal'] = $this->home->getSubtotal($peserta_id);
        //$data['result'] = $this->Home_model->getAllPeserta();
        //$data['kategori'] = $this->Home_model->countAllData();
        //jika sudah login
        if ($this->session->userdata('logged_in') == 'true') {
            $this->load->view('_partials/user/head', $data);
            
        } else {
            $this->load->view('_partials/head', $data);
        }
        $this->load->view('pengiriman',$data);
    }
}