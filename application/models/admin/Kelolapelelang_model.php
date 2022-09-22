<?php

class Kelolapelelang_model extends CI_Model
{
    public function getAllKelola()
    {
        //tampilkan data penjual
        $this->db->select('*');
        $this->db->from('pelelang');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deletePelelang($id)
    {
        $this->db->delete('pelelang', ['pelelang_id' => $id]);
    }

    function get($id){
        $param = array('pelelang_id'=>$id);
        return $this->db->get_where('pelelang',$param);
    }

    // 18-8-22
    function edit(){
        $data=array( 
            'nama'     => $this->input->post('nama'),
            'nik'     => $this->input->post('nik'),
            'provinsi'     => $this->input->post('provinsi'),
            'kota'   => $this->input->post('kota'),
            'kecamatan'   => $this->input->post('kecamatan'),
            'kelurahan'     => $this->input->post('kelurahan'),
            'alamat'   => $this->input->post('alamat'),
            'telp'   => $this->input->post('notelp'),
            'email'     => $this->input->post('email'),
            'npwp'   => $this->input->post('npwp'),
            'bank'   => $this->input->post('bank'),
            'norekening'   => $this->input->post('norek'),
            'atasnama'     => $this->input->post('atasnama'),
            'status'   => $this->input->post('status'),
            'jenis'     => $this->input->post('jenis'),
            'deskripsi'   => $this->input->post('deskripsi')
        );
        $this->db->where('pelelang_id',$this->input->post('id'));
        $this->db->update('pelelang',$data);
    }

    public function getPelelangById($id)
    {
        return $this->db->get_where('pelelang', ['pelelang_id' => $id])->row_array();
    }
    // 18-8-22



}