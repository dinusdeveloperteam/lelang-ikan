<?php

class M_penerimaan extends CI_Model
{
    // Use This
    public function getAllPenerimaan()
    {
        $query = "SELECT lp.*,l.produk,l.lelang_id as lelang_iddrlelang,p.nama as nama_peserta FROM `lelang_pemenang` lp,lelang l,peserta p where lp.lelang_id=l.lelang_id and lp.peserta_id=p.peserta_id;";
        return $this->db->query($query)->result_array();
    }

    function edit()
    {
        $data = array(
            'konfirmasi_terimaproduk'   => $this->input->post('konfirmasi_terimaproduk')
        );
        $this->db->where('lelang_id', $this->input->post('id'));
        $this->db->update('lelang_pemenang', $data);
    }
}
