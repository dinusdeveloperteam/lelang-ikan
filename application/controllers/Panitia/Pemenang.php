<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pemenang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/Panitia');
        $this->load->helper('url');
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
    }
    public function index()
    {

        $TampilData = $this->Panitia->pemenang();
        $page = 'Pemenang Lelang';
        $data = [
            'PemenangLelang' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];


        $data['user'] = $this->Panitia->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/pemenang', $data);
        $this->load->view('panitia/partials/end');
    }


    //Fungsi Delete
    public function deletepemenang($id)
    {
        $this->panitia->deletepemenang($id);

        redirect('panitia/kelola_lelang/pemenang');
    }

    //Fungsi Edit
    public function edit()
    {

        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('konfirmasi_terimaproduk', 'Status Order', 'required');

        if ($this->form_validation->run() == false) {
            redirect('panitia/pemenang/');
        } else {
            $this->db->set('status', $this->input->post('status', true));
            $this->db->set('konfirmasi_terimaproduk', $this->input->post('konfirmasi_terimaproduk', true));
            $this->db->where('peserta_id');
            $this->db->update('lelang_pemenang');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
        }
        redirect('panitia/pemenang/');
    }

    // update status
    public function update($id)
    {
        $this->form_validation->set_rules('status', 'Status Order', 'required');
        if ($this->form_validation->run() == false) {
            redirect('panitia/pemenang');
        } else {
            $this->db->set('status', $this->input->post('status', true));
            $this->db->where('lelang_id', $id);
            $this->db->update('lelang_pemenang');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
            redirect('panitia/pemenang/');
        }
    }

    public function VerifyEmail()
    {
        if ($this->Panitia->sendEmail($this->input->post('email'))) {
            // successfully sent mail
            $this->session->set_flashdata('msg', '<script>alert("Success terkirim")</script>');

            redirect('panitia/pemenang');
        } else {
            // error
            $this->session->set_flashdata('msg', '<script>alert("Gagal Terkirim")</script>');

            redirect('panitia/pemenang');
        }
    }
}
