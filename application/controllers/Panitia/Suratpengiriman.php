<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratpengiriman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/Panitia');
        $this->load->helper('url');
    }
    public function index()
    {

        $TampilData = $this->Panitia->suratperintah();
        $page = 'Surat Perintah Pengiriman';
        $data = [
            'suratperintah' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];
       
        $data['user'] = $this->Panitia->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/surat', $data);
        $this->load->view('panitia/partials/end');
    }

    //Fungsi Delete
    public function delete($pengiriman_id)
    {
        $this->Panitia->deletePengiriman($pengiriman_id);
        redirect('panitia/suratpengiriman');
    }
    
    //Fungsi Edit
    public function edit($id)
    {
        $this->form_validation->set_rules('status_transaksi', 'Status Order', 'required');
        if ($this->form_validation->run() == false) {
            redirect('panitia/suratpengiriman/');
        } else {
            $this->db->set('status_transaksi', $this->input->post('status_transaksi', true));
            $this->db->where('lelang_id', $id);
            $this->db->update('lelang_pengiriman');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
            redirect('panitia/suratpengiriman/');
        }

    }

    //Fungsi Kirim Email
    public function VerifyEmail(){
        if ($this->Panitia->sendEmail($this->input->post('email')))
        {
            // successfully sent mail
            $this->session->set_flashdata('msg','<script>alert("Success terkirim")</script>');
            
            redirect('panitia/suratpengiriman'); 
           
        }
        else
        {
            // error
            $this->session->set_flashdata('msg','<script>alert("Gagal Terkirim")</script>');
            
            redirect('panitia/suratpengiriman');

            
        }
    }

    public function suratPerintah()
    {
        $this->load->library('pdf');
        // $this->load->model('Panitia/suratperintah');
        $data =  $this->Panitia->suratperintah();
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        $image="./assets/logo-lelang.png";
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(40, 40, $pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false);
        $pdf->Cell(0, 4, '', 0, 1, 'C');
        $pdf->Cell(0, 7, 'Surat Perintah Pengiriman Barang', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(0, 4, 'Kabupaten Kendal, Jawa Tengah 123, Indonesia', 0, 1, 'C');
        $pdf->Cell(0, 4, 'HP: +62 889-3319-886, EMAIL: lelangikan@gmail.com', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        // Memberikan space kebawah agar tidak terlalu rapat
         $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30,6,' ID Lelang ',0,0,'L');
        $pdf->Cell(69,6,' ID Peserta',0,0,'L');
        $pdf->Cell(69,6,'Tanggal Diumumkan',0,0,'R');
        $pdf->Cell(30,6,date('Y-m-d',mktime(date('m'),date('d'),date('Y'))),0,1,'R');
        $pdf->Cell(69,6,'Tanggal Pembayaran',0,0,'R');
        $pdf->Cell(30,6,date('Y-m-d',mktime(date('m'),date('d'),date('Y'))),0,1,'R');
        $pdf->Cell(10, 3, '', 0, 1);

        $pdf->Cell(99,6,'Bukti Pembayaran',0,0,'L');
        $pdf->Cell(99,6,'Konfirmasi Terima Produk',0,0,'L');
        $pdf->Cell(99,6,'Provinsi',0,0,'L');
        $pdf->Cell(99,6,'Kota',0,0,'L');
        $pdf->Cell(99,6,'Kecamatan',0,0,'L');
        $pdf->Cell(99,6,'Kelurahan',0,0,'L');
        $pdf->Cell(99,6,'Alamat',0,0,'L');
        $pdf->Cell(99,6,'Status Pembayaran',0,0,'L');
        $pdf->SetFont('Arial','',10);
        // $mahasiswa['mahasiswa'] =  $this->Panitia->suratperintah();
        foreach ($data as $row){
            $pdf->Cell(20,6,$row['lelang_id'],1,0);
            $pdf->Cell(85,6,$row['peserta_id'],1,0);
            $pdf->Cell(25,6,$row['tgl_diumumkan'],1,1);
            $pdf->Cell(25,6,$row['tgl_bayar'],1,1);
            $pdf->Cell(99,6,$row['bukti_bayar'],0,0,'L');
            $pdf->Cell(99,6,$row['konfirmasi_terimaproduk'],0,0,'L');
            $pdf->Cell(99,6,$row['provinsi_kirim'],0,0,'L');
            $pdf->Cell(99,6,$row['kota_kirim'],0,0,'L');
            $pdf->Cell(99,6,$row['kecamatan_kirim'],0,0,'L');
            $pdf->Cell(99,6,$row['kelurahan_kirim'],0,0,'L');
            $pdf->Cell(99,6,$row['alamat_kirim'],0,0,'L');
            $pdf->Cell(25,6,$row['tgl_diumumkan'],1,1);
            $pdf->Cell(99,6,$row['status'],0,0,'L');
        }
        $pdf->Output();
    }
}
