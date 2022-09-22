<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/Panitia');
        $this->load->helper('url');
    }
    public function index()
    {
        $page = 'Dashboard';
        $data = [
            'title' => $page,
            'breadcrumb' => $page 
        ];
     
        $data['user'] = $this->Panitia->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/index', $data);
        $this->load->view('panitia/partials/end');
    }

}
