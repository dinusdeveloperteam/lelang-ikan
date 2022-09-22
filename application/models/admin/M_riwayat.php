<?php

class M_riwayat extends CI_Model
{
    // Use This
    // public function getAllRiwayat()
    // {
    //     $query = "SELECT lb.*,lm.*,l.produk,p.nama as nama_peserta FROM `lelang_pembayaran` lb,lelang_pemenang lm,lelang l,peserta p where lb.lelang_id=lm.lelang_id and lm.peserta_id=p.peserta_id and l.lelang_id=lb.lelang_id;";
    //     return $this->db->query($query)->result_array();
    // }
    public function getAllRiwayat()
    {
        $this->db->select('lelang_pemenang.lelang_id,peserta.nama,lelang.produk,lelang.jumlah,lelang_pembayaran.nominal_dibayarkan,lelang_pengiriman.status_transaksi');
        $this->db->from('lelang_pemenang');
        $this->db->join('lelang', 'lelang_pemenang.lelang_id=lelang.lelang_id');
        $this->db->join('lelang_pengiriman', 'lelang_pemenang.lelang_id=lelang_pengiriman.lelang_id');
        $this->db->join('peserta', 'lelang_pemenang.peserta_id=peserta.peserta_id');
        $this->db->join('lelang_pembayaran', 'lelang_pemenang.lelang_id=lelang_pembayaran.lelang_id');
        $query = $this->db->get();
        return $query->result_array();
    }
}
