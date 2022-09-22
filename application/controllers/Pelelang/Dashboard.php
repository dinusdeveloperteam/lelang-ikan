<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
    function __construct()
    { 
        parent::__construct();
        $this->load->model('pelelang/Transaksi_Model');
        $this->load->model('pelelang/Pemenang_Model');
        if(!$this->session->userdata('pelelang') == true){
            redirect('User');
        }
    }
 
    public function index()
    { 
        $data['title']  = 'Dashboard';
        $user = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();
        $data['Transaksi']=$this->Transaksi_Model->getAll($user->pelelang_id);
        $data['total_pendapatan'] = $this->db->select("SUM(nominal_dibayarkan) as total")->get("lelang_pembayaran")->row_array()['total'];
        $data['total_transaksi'] = $this->db->get("lelang_pembayaran")->num_rows();
        $data['total_pemenang'] = $this->db->get("lelang_pemenang")->num_rows();

        // get data nama user (untuk tampil di sidebar dan navbar)
        $data['user']   = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();

        $this->load->view('theme_pelelang/header', $data);
        $this->load->view('pelelang/dashboard', $data);
        $this->load->view('theme_pelelang/footer', $data);
    }
    public function pemenang()
    {
        $data['title']  = 'Pemenang Lelang';
        // get data nama user (untuk tampil di sidebar dan navbar)
        $data['user']   = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();

        $this->load->view('theme_pelelang/header', $data);
        $this->load->view('pelelang/pemenang', $data);
        $this->load->view('theme_pelelang/footer', $data);
    }
    public function transaksi()
    {
        $data['title']  = 'Transaksi';
        // get data nama user (untuk tampil di sidebar dan navbar)
        $data['user']   = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();

        $this->load->view('theme_pelelang/header', $data);
        $this->load->view('pelelang/transaksi/selesai', $data);
        $this->load->view('theme_pelelang/footer', $data);
    }
    public function feedback(){
        $this->load->view('pelelang/feedback');
    }

}
