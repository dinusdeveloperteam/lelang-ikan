<?php

class Kelolapeserta_model extends CI_Model
{
    public function getAllKelola()
    {
        //tampilkan data peserta
        $this->db->order_by('peserta_id', 'DESC');
        $this->db->select('*');
        $this->db->from('peserta');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getData()
    {
        //tampilkan data peserta
        $this->db->select('*');
        $this->db->from('peserta');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get($id)
    {
        $param = array('peserta_id' => $id);
        return $this->db->get_where('peserta', $param);
    }

    // 18-8-22 OLD 10.23 20- september 2022
    function edit()
    {
        $data = array(
            'nama'     => $this->input->post('nama'),
            'jeniskel'   => $this->input->post('jeniskelamin'),
            'provinsi'     => $this->input->post('provinsi'),
            'kota'   => $this->input->post('kota'),
            'kecamatan'   => $this->input->post('kecamatan'),
            'kelurahan'     => $this->input->post('kelurahan'),
            'alamat'   => $this->input->post('alamat'),
            'telp'   => $this->input->post('notelp'),
            'email'     => $this->input->post('email'),
            'nik'   => $this->input->post('nik'),
            'npwp'   => $this->input->post('npwp'),
            'deposit'     => $this->input->post('deposit'),
            // 'filektp' => $this->input->post('filektp'),
            // 'filenpwp' => $this->input->post('filenpwp'),
            'status'   => $this->input->post('status')
        );
        $this->db->where('peserta_id', $this->input->post('id'));
        $this->db->update('peserta', $data);
    }

    public function getPesertaById($id)
    {
        return $this->db->get_where('peserta', ['peserta_id' => $id])->row_array();
    }
    // 18-8-22

    public function deletePeserta($id)
    {
        $this->db->delete('peserta', ['peserta_id' => $id]);
    }

    // Tambah Peserta
    public function register_peserta($enc_password)
    {

        // User data array
        $this->db->select('MAX(RIGHT(peserta_id,5)) as peserta_id', FALSE);
        $this->db->from('peserta');
        $this->db->where('peserta_id !=', 'NULL');
        $query = $this->db->get();
        $kode = $query->row();
        $num = substr($kode->peserta_id, 1, 5);
        $add = (int)$num + 1;
        if (strlen($add) == 1) {
            $kodebaru = "0000" . $add;
        } else if (strlen($add) == 2) {
            $kodebaru = "000" . $add;
        } else if (strlen($add) == 3) {
            $kodebaru = "00" . $add;
        } else if (strlen($add) == 4) {
            $kodebaru = "0" . $add;
        } else {
            $kodebaru = "" . $add;
        }
        $data = array(
            'peserta_id' => 'PSY-' . date('Y') . '-' . $kodebaru,
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'status'    => 0
        );


        // Insert user
        return $this->db->insert('peserta', $data);
    }
}
