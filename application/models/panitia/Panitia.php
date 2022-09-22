<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panitia extends CI_Model
{

    // kelola pelelang
    function pelelang()
    {
        $query = $this->db->get('pelelang');
        return $query->result();
    }
    public function hapusDataPelelang($pelelang_id)
    {
        return $this->db->delete('pelelang', ['pelelang_id' => $pelelang_id]);
    }



    // kelola peserta

    function peserta()
    {
        $query = $this->db->get('peserta');
        return $query->result();
    }
    public function hapusDataPeserta($peserta_id)
    {
        return $this->db->delete('peserta', ['peserta_id' => $peserta_id]);
    }



    // kelola akun panitia


    function user_panitia($panitia_id)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $panitia_id])->row_array();
    }

    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }

    public function updatePanitiaById($data, $id)
    {
        $this->db->where('panitia_id', $id);
        return $this->db->update('panitia', $data);
    }

    // kelola pembukaan lelang

    function pembukaanLelang()
    {
        $query = $this->db->get('lelang');
        return $query->result();
    }

    public function hapusDataPembukaanLelang($lelang_id)
    {
        return $this->db->delete('lelang', ['lelang_id' => $lelang_id]);
    }



    //kelola penawaran
    function penawaran()
    {
        $query = "SELECT l.lelang_id,produk,deskripsi_produk,image1,image2,image3,image4,harga_beli_sekarang,lb.harga_tawar,l.status FROM lelang l,lelang_bid lb WHERE l.lelang_id=lb.lelang_id";
        return $this->db->query($query)->result_array();
    }

    function deletePenawaran($lelang_id)
    {
        return $this->db->query("DELETE l, lb FROM lelang JOIN lelang_bid lb ON l.lelang_id=lb.lelang_id WHERE l.lelang_id=$lelang_id");
    }

    //kelola pemenang
    function pemenang()
    {
        $query = "SELECT lb.*,p.*,l.*,lm.* FROM lelang_pemenang lm, lelang_bid lb,peserta p,lelang l WHERE lb.lelang_id=l.lelang_id and p.peserta_id=lb.peserta_id";
        return $this->db->query($query)->result();
    }

    //Kelola Pembayaran

    function pembayaran()
    {
        $query = "SELECT lb.*,lm.*,l.produk,p.nama as nama_peserta FROM lelang_pembayaran lb,lelang_pemenang lm,lelang l,peserta p where lb.lelang_id=lm.lelang_id and lm.peserta_id=p.peserta_id and l.lelang_id=lb.lelang_id";
        return $this->db->query($query)->result_array();
    }

    public function deletePembayaran($lelang_id)
    {
        return $this->db->delete('lelang_pembayaran', ['lelang_id' => $lelang_id]);
    }



    // Kelola penerima lelang

    function penerima()
    {
        $query = "SELECT lp.*,p.*,p.nama,lp.konfirmasi_terimaproduk FROM lelang_pemenang lp,peserta p WHERE lp.peserta_id=p.peserta_id";
        return $this->db->query($query)->result_array();
    }

    function deletePenerima($peserta_id)
    {
        return $this->db->query("DELETE lp, p FROM lelang_pemenang lp JOIN peserta p ON lp.peserta_id=p.peserta_id WHERE lp.peserta_id=$peserta_id");
    }



    // Kelola riwayat lelang

    function riwayat()
    {
        $query = "SELECT p.peserta_id,p.nama,l.produk,l.harga_beli_sekarang,lp.alamat_kirim,testimoni_pemenang FROM peserta p,lelang l,lelang_pemenang lp WHERE p.peserta_id=lp.peserta_id AND l.lelang_id=lp.lelang_id";
        return $this->db->query($query)->result_array();
    }



    //  Kelola Surat Perintah
    function suratperintah()
    {
        $query = "SELECT lpg.*,lp.* FROM lelang_pengiriman lpg,lelang_pemenang lp WHERE lpg.lelang_id=lp.lelang_id";
        return $this->db->query($query)->result_array();
    }

    public function deletePengiriman($lelang_id)
    {
        return $this->db->delete('lelang_pengiriman', ['pengiriman_id' => $lelang_id]);
    }


    // Fungsi Kirim Email
    function sendEmail($to_email)
    {
        $from_email = 'lelangikan222@gmail.com'; //change this to yours
        $subject = 'Surat Pengiriman';
        // $to_email=$this->input->post('email');
        $message = 'Kepada Peserta,<br /><br />Selamat anda pemenang lelang<br /><br /> Silahkan Cek Akun Pelelang Anda'  . '<br /><br /><br />Terima kasih<br />';

        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = 'lelangikan222@gmail.com';
        $config['smtp_pass'] = 'kbjidqivoreymhud'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);

        //send mail
        $this->email->from($from_email, 'Lelang Ikan');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
}
