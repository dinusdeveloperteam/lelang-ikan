<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/Panitia');
        $this->load->helper('url');
    }

    //Fungsi Index
    public function index()
    {
        $TampilData = $this->Panitia->peserta();
        $page = 'Peserta Lelang';
        $data = [
            'peserta' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];
       
        $data['user'] = $this->Panitia->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/peserta', $data);
        $this->load->view('panitia/partials/end');
    }

    //Fungsi Edit
    public function edit($id)
    {
        $id = $this->uri->segment(4);
        $data = [
            'status' => $this->input->post('status'),'jeniskel' => $this->input->post('jeniskel')
        ];
        $this->db->set('jeniskel', $this->input->post('jeniskel', true));
        $this->db->where('peserta_id', $id);
        $this->db->update('peserta', $data);
        redirect('panitia/peserta');
    }


    //Fungsi Delete
    public function hapusPeserta($peserta_id)
    {
        $this->Panitia->hapusDataPeserta($peserta_id);
        redirect('panitia/peserta');
    }
}
