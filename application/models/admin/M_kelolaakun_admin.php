<?php

class M_kelolaakun_admin extends CI_Model
{
    public function getAllAdmin()
    {
        //tampilkan data Admin
        $this->db->select('*');
        $this->db->from('admin');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deleteAdmin($id)
    {
        $this->db->delete('admin', ['userid' => $id]);
    }

    function get($id)
    {
        $param = array('userid' => $id);
        return $this->db->get_where('admin', $param);
    }

    // 18-8-22
    function edit()
    {
        $data = array(
            'nama'     => $this->input->post('nama'),
            'password'     => $this->input->post('password'),
            'telp'   => $this->input->post('telp')
        );
        $this->db->where('userid', $this->input->post('id'));
        $this->db->update('admin', $data);
    }

    public function getAdminById($id)
    {
        return $this->db->get_where('admin', ['userid' => $id])->row_array();
    }
    // 18-8-22

    //mengambil data dari database
    public function getData()
    {
        $this->db->select("*");
        $this->db->from('admin');
        $query = $this->db->get();
        return $result = $query->row();
    }

    function user_admin($user_id)
    {
        return $this->db->get_where('admin', ['userid' => $user_id])->row_array();
    }

    function user_adminById($name)
    {
        return $this->db->get_where('admin', ['userid' => $name])->row();
    }

    public function updateAdminById($data, $id)
    {
        $this->db->where('userid', $id);
        return $this->db->update('admin', $data);
    }






    /* old
    public function getAllBayar()
    {
        return $this->db->get('lelang_pembayaran')->result_array();
    }
    */
}
