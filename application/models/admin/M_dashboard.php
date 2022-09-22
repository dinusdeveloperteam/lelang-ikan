<?php

class M_dashboard extends CI_Model
{
    public function countAllPelelang()
    {
        return $this->db->get('pelelang')->num_rows();
    }

    public function countAllPeserta()
    {
        return $this->db->get('peserta')->num_rows();
    }

    public function countAllPemenang()
    {
        return $this->db->get('lelang_pemenang')->num_rows();
    }

    public function countAllPembukaanLelang()
    {
        return $this->db->get('lelang')->num_rows();
    }

    public function countAllPenawaranLelang()
    {
        return $this->db->get('lelang_bid')->num_rows();
    }

    public function countAllPanitiaLelang()
    {
        return $this->db->get('panitia')->num_rows();
    }
}
