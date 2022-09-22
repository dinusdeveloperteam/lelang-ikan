<?php

class M_pelelang extends CI_Model
{
    public function getAllBukaLelang()
    {
        return $this->db->get('lelang')->result_array();
    }

    // Me
    // function TampilPembukaan()
    // {
    //     $this->db->order_by('lelang_id', 'ASC');
    //     return $this->db->from('lelang')
    //         ->join('pelelang', 'pelelang.pelelang_id=lelang.pelelang_id')
    //         ->get()
    //         ->result_array();
    // }

    // function TampilPembukaan()
    // {
    //     $this->db->select('*');
    //     $this->db->from('lelang');
    //     $this->db->join('pelelang', 'pelelang.pelelang_id = lelang.pelelang_id');
    //     $this->db->order_by('lelang.lelang_id', 'ASC');
    //     return $this->db->get()->result_array();
    // }

    public function TampilPembukaan()
    {
        $query = "SELECT l.*,p.*,l.status as status_pemeriksaan FROM `lelang` l,pelelang p where l.pelelang_id=p.pelelang_id ;";
        return $this->db->query($query)->result_array();
    }

    function TampilDetail()
    {
        $this->db->select('lelang_bid.bid_id,lelang_bid.lelang_id,lelang_bid.peserta_id,peserta.nama, lelang_bid.harga_tawar, lelang_bid.tgl_bid');
        $this->db->from('lelang_bid');
        $this->db->join('lelang', 'lelang.lelang_id=lelang_bid.lelang_id');
        $this->db->join('peserta', 'lelang_bid.peserta_id=peserta.peserta_id');
        $this->db->order_by('lelang_bid.bid_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPenawaranById($id)
    {
        return $this->db->get_where('lelang_bid', ['bid_id' => $id])->row_array();
    }

    function getp($id)
    {
        $param = array('bid_id' => $id);
        return $this->db->get_where('lelang_bid', $param);
    }

    // Tampil Detail Penawaran pada lelang id
    public function Tawarjoin($id)
    {
        $this->db->select('*');
        $this->db->from('lelang_bid');
        $this->db->join('lelang', 'lelang.lelang_id = lelang_bid.lelang_id', 'left');
        $this->db->join('peserta', 'lelang_bid.peserta_id=peserta.peserta_id');
        $this->db->where('lelang.lelang_id', $id);
        return $this->db->get()->result_array();
    }

    function edit()
    {
        $data = array(
            'status'   => $this->input->post('statusperiksa'),
            'nama_produk'     => $this->input->post('nama_produk'),
            'deskripsi_produk'   => $this->input->post('deskripsi_produk'),
            'harga_awal'     => $this->input->post('harga_awal'),
            'harga_minimal_diterima'     => $this->input->post('harga_minimal_diterima'),
            'incremental_value'     => $this->input->post('incremental_value'),
            'jumlah'     => $this->input->post('jumlah'),
            'harga_beli_sekarang'     => $this->input->post('harga_beli_sekarang'),
            'keterangan'     => $this->input->post('keterangan'),
            'tgl_mulai'     => $this->input->post('tgl_mulai'),
            'tgl_selesai'     => $this->input->post('tgl_selesai'),
        );
        $this->db->where('lelang_id', $this->input->post('id'));
        $this->db->update('lelang', $data);
    }


    function get($id)
    {
        $param = array('lelang_id' => $id);
        return $this->db->get_where('lelang', $param);
    }

    public function deleteBukaLelang($id)
    {
        $this->db->delete('lelang', ['lelang_id' => $id]);
    }

    // Me
}
