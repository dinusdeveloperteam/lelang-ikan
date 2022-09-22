<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->helper('url','form');
        $this->load->library(array('form_validation','session'));

    }
    public function index(){
        $id=$this->session->userdata('peserta_id');
        $data['peserta']= $this->Home_model->getPesertaById($id);
        $this->load->view('update',$data);

        $data['nama'] = $this->session->userdata('nama');
        //$data['result'] = $this->Home_model->getAllPeserta();
        //$data['kategori'] = $this->Home_model->countAllData();
        //jika sudah login
        if ($this->session->userdata('logged_in') == 'true') {
            $this->load->view('_partials/user/head', $data);
           
        } else {
            $this->load->view('_partials/head', $data);
        }
    }

    function edit()
    {

        if (isset($_POST['submit'])) {
            $id = $this->session->userdata('peserta_id');
            $data['peserta']= $this->Home_model->getPesertaById($id);

            $this->Home_model->update($id);
            $this->uploadnew($id,$data);
            $this->session->set_flashdata('success', 'Peserta Lelang <strong>Berhasil</strong> Diubah!');
            // var_dump($this->db->last_query());
            // die;
            redirect('profile');
        } else {
            // $id = $this->uri->segment(4);
            // $data['row'] = $this->Home_model/update->get($id)->row_array();
            // $this->load->view('Update.php', $data);
        }
    }

    private function uploadnew($id,$data)
    {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '2048';
        $config['upload_path'] = './vendors/images/peserta/';
        $config['overwrite']     = TRUE;
        // $config['file_name'] = ;
        $this->load->library('upload', $config);
        if (!empty($_FILES['filektp'])) {
            $this->upload->do_upload('filektp');
            $old_filektp = $data['peserta']['filektp'];
            //$config['upload_path'] = './vendors/images/peserta/ktp/';
            unlink(FCPATH . 'vendors/images/peserta/ktp/' . $old_filektp);
            $data1 = $this->upload->data();
            rename($data1['full_path'], $data1['file_path'] . 'KTP-' . $id . '-' . $data1['file_name']);
            $filektp = 'KTP-' . $id . '-' . $data1['file_name'];
        }
        if (!empty($_FILES['filenpwp'])) {
            $this->upload->do_upload('filenpwp');
            $old_filenpwp = $data['peserta']['filenpwp'];
            //$config['upload_path'] = './vendors/images/peserta/npwp/';
            unlink(FCPATH . 'vendors/images/peserta/npwp/' . $old_filenpwp);
            $data2 = $this->upload->data();
            rename($data2['full_path'], $data2['file_path'] . 'NPWP-' . $id . '-' . $data2['file_name']);
            $filenpwp = 'NPWP-' . $id . '-' . $data2['file_name'];
        }
        $data = [
            'filektp' => $filektp,
            'filenpwp' => $filenpwp
        ];
        $this->db->where('peserta_id', $id);
        $this->db->update('peserta', $data);
    }
}