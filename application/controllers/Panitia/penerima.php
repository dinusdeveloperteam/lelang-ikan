<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerima extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/Panitia');
        $this->load->helper('url');
    }
    public function index()
    {

        $TampilData = $this->Panitia->penerima();
        $page = 'Penerima';
        $data = [
            'Penerima' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];
       
        $data['user'] = $this->Panitia->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/penerima', $data);
        $this->load->view('panitia/partials/end');
    }


    //Fungsi Edit
    public function edit($id)
    {
        $this->form_validation->set_rules('konfirmasi_terimaproduk', 'Status Order', 'required');
        if ($this->form_validation->run() == false) {
            redirect('panitia/penerima/');
        } else {
            $this->db->set('konfirmasi_terimaproduk', $this->input->post('konfirmasi_terimaproduk', true));
            $this->db->where('peserta_id', $id);
            $this->db->update('lelang_pemenang');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
            var_dump($this->db->last_query());
            redirect('panitia/penerima/');
        }

    }


    //Fungsi Delete
    public function delete($peserta_id)
    {
        $this->Panitia->deletePenerima($peserta_id);
        redirect('panitia/penerima');
    }
}