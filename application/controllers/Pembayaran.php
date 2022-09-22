<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        $this->load->model('Home_model','home');

    }
    
    public function index(){
        
        $data['nama'] = $this->session->userdata('nama');
        $peserta_id = $this->session->userdata('peserta_id');
        $data['peserta'] = $this->home->getPesertaById($peserta_id);
        // $data['transaksi']=$this->home->getTransaksi($peserta_id);
        $data['subtotal'] = $this->home->getSubtotal($peserta_id);
        
        //$data['result'] = $this->Home_model->getAllPeserta();
        //$data['kategori'] = $this->Home_model->countAllData();
        //jika sudah login
        if ($this->session->userdata('logged_in') == 'true') {
            $this->load->view('_partials/user/head', $data);
            
        } else {
            $this->load->view('_partials/head', $data);
        }
        $this->load->view('pembayaran');
    }

    public function bayar(){
        $peserta_id = $this->session->userdata('peserta_id');
        $transaksi = $this->home->getTransaksiById($peserta_id);
        $id = $transaksi['lelang_id'];
        //$data['peserta_deposit']= $this->Home_model->getPesertaById($id);
        $this->home->bayar($id);
        $this->upload($id);
        $this->session->set_flashdata('success', 'Peserta Lelang <strong>Berhasil</strong> Diubah!');
        var_dump($this->db->last_query());
        die;
        //redirect('transaksi');
    //} else {
        // $id = $this->uri->segment(4);
        // $data['row'] = $this->Home_model/update->get($id)->row_array();
        // $this->load->view('Update.php', $data);
    //}
    }

    private function upload($id)
    {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '5000';
        $config['upload_path'] = './vendors/images/peserta/bukti_transfer_pembayaran/';
        $config['overwrite']     = TRUE;
        // $config['file_name'] = ;
        $this->load->library('upload', $config);
        if (!empty($_FILES['bukti_pembayaran'])) {
            $this->upload->do_upload('bukti_pembayaran');
        // $old_deposit = $data['peserta_deposit']['bukti_pembayaran'];
            //$config['upload_path'] = './vendors/images/peserta/ktp/';
            //unlink(FCPATH . 'vendors/images/peserta/bukti_transfer_deposit/' . $old_deposit);
            $data1 = $this->upload->data();
            rename($data1['full_path'], $data1['file_path'] . 'Pembayaran-' . $id . '-' . $data1['file_name']);
            $bukti_pembayaran = 'Pembayaran-' . $id . '-' . $data1['file_name'];
        }
        $data = [
            'bukti_pembayaran' => $bukti_pembayaran
        ];
        $this->db->where('lelang_id', $id);
        $this->db->update('lelang_pembayaran', $data);
    }

}