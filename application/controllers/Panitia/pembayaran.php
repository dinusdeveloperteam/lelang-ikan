<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/Panitia');
        $this->load->helper('url');
    }
    public function index()
    {

        $TampilData = $this->Panitia->pembayaran();
        $page = 'Kelola Pembayaran';
        $data = [
            'lelang_pembayaran' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];

       
        $data['user'] = $this->Panitia->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/pembayaran', $data);
        $this->load->view('panitia/partials/end');
    }        

    //Fungsi Delete
    public function delete($lelang_id)
    {
        $this->Panitia->deletePembayaran($lelang_id);
        redirect('panitia/pembayaran');
    }


    //Fungsi Edit
    public function edit($id)
    {
        $this->form_validation->set_rules('status', 'Status Order', 'required');
        if ($this->form_validation->run() == false) {
            redirect('panitia/pembayaran/');
            return false;
        } else {
            $this->db->set('status', $this->input->post('status', true));
            $this->db->where('lelang_id', $id);
            $this->db->update('lelang_pemenang');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
            redirect('panitia/pembayaran/');
        }
    }
}