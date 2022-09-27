<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Calonpemenang extends CI_Controller
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
        $TampilData = $this->Panitia->calonpemenang();
        $page = 'Calon Pemenang Lelang';
        $data = [
            'calonpemenang' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];

        $data['user'] = $this->Panitia->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/calonpemenang', $data);
        $this->load->view('panitia/partials/end');
    }

}
