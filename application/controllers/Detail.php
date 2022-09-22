<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        $this->load->model('Home_model','home');

    }

    public function index(){
        // $data['start'] = $this->uri->segment(2);
        // // $data['result'] = $this->detail->getId();
        // $id = $this->uri->segment(2);
        // $data['result']=$this->home->getById($id);
        
        // // $data["result"]=$this->Home_model->getData();
        // // $data["result"]=$this->Home_model->dataLelangBid();
        
        // // $data['result']=$this->db->get_where('lelang',['lelang_id' => $id])->row_array();
        // $this->load->view('detail',$data);
        //
        //$this->home->getID();


        //$this->load->view('barang',$data);
        // $this->load->view('detail',$data);
    }

    // public function dataPeserta(){
    //     $data["data"]=$this->Home_model->getData();
    //     $this->load->view('detail',$data);
    // }
}