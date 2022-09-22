<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penawaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/Panitia');
        $this->load->helper('url');
    }
    public function index()
    {

        $TampilData = $this->Panitia->penawaran();
        $page = 'Penawaran Lelang';
        $data = [
            'PenawaranLelang' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];
       
        $data['user'] = $this->Panitia->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/penawaran', $data);
        $this->load->view('panitia/partials/end');
    }

    //Fungsi Delete
    public function deletepenawaran($id)
    {
        $this->panitia->deletepenawaran($id);
        redirect('panitia/kelola_lelang/penawaran');
    }

    //Fungsi Edit
    public function edit($id)
    {
        
        $data['id'] = $id;
        $this->form_validation->set_rules('status', 'Status Order', 'required');
        
        if ($this->form_validation->run() == false) {
            redirect('panitia/kelola_lelang/penawaran/');
        } else {
            $this->db->set('status', $this->input->post('status', true));
            $this->db->where('lelang_id', $id);
            $this->db->update('lelang');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
            redirect('panitia/penawaran/');
        }

    }
}