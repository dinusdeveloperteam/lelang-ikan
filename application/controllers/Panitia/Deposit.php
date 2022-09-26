<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/Panitia');
        $this->load->helper('url');
    }
    public function index()
    {

        $TampilData = $this->Panitia->deposit();
        $page = 'Verifikasi Peserta Deposit';
        $data = [
            'peserta_deposit' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];
       
        $data['user'] = $this->Panitia->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/peserta_deposit', $data);
        $this->load->view('panitia/partials/end');
    }

    //Fungsi Edit
    public function edit($id)
    {
        $data['id'] = $id;
        $this->form_validation->set_rules('status', 'Status Order', 'required');
        
        if ($this->form_validation->run() == false) {
            redirect('panitia/deposit/');
        } else {
            $this->db->set('status', $this->input->post('status', true));
            $this->db->where('deposit_id', $id);
            $this->db->update('peserta_deposit');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
            redirect('panitia/deposit/');
        }

    }
}
