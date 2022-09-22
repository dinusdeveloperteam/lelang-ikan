<?php

class M_pemenang extends CI_Model
{
    public function getAllMenang()
    {
        return $this->db->get('lelang_pemenang')->result_array();
    }

    function hapus($id)
    {
        $this->db->where('lelang_id', $id);
        $this->db->delete('lelang_pemenang');
    }

    function get($id)
    {
        $param = array('lelang_id' => $id);
        return $this->db->get_where('lelang_pemenang', $param);
    }


    //menampilkan data lelang pemenang
    public function getData()
    {
        $this->db->select('peserta.peserta_id,peserta.nik,peserta.npwp,peserta.nama,peserta.jeniskel, peserta.telp, peserta.email,lelang.produk,lelang_pemenang.tgl_diumumkan,lelang_pemenang.status,lelang_pemenang.lelang_id,lelang_pemenang.bukti_bayar,lelang_pemenang.tgl_bayar,lelang_pemenang.alamat_kirim,lelang_pemenang.kota_kirim,lelang_pemenang.kelurahan_kirim,lelang_pemenang.kecamatan_kirim,lelang_pemenang.provinsi_kirim,lelang_pemenang.testimoni_pemenang');
        $this->db->from('lelang_pemenang');
        $this->db->join('lelang', 'lelang_pemenang.lelang_id=lelang.lelang_id');
        $this->db->join('peserta', 'lelang_pemenang.peserta_id=peserta.peserta_id');
        $this->db->order_by('peserta.peserta_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }



    // function get_all_data()
    // {
    //     $this->db->select('a.nama_jabatan, b.nama_jabatan as nama_atasan');
    //     $this->db->from('jabatan a');
    //     $this->db->join('jabatan b', 'a.kode_atasan = b.kode_jabatan', 'left');
    //     $this->db->order_by('a.kode_atasan', 'asc');        
    //     return $this->db->get()->result();
    // }

    //menampilkan data Testimoni
    public function getTampiltestimoni()
    {
        $this->db->select('peserta.peserta_id,peserta.nama,lelang.produk,lelang_pemenang.testimoni_pemenang,lelang_pemenang.lelang_id');
        $this->db->from('lelang_pemenang');
        $this->db->join('lelang', 'lelang_pemenang.lelang_id=lelang.lelang_id');
        $this->db->join('peserta', 'lelang_pemenang.peserta_id=peserta.peserta_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deletePemenang($id)
    {
        $this->db->delete('lelang_pemenang', ['lelang_id' => $id]);
    }
}
