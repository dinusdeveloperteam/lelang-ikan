<?php

class M_deposit extends CI_Model
{

    // function getAllDeposit()
    // {
    //     $this->db->select('*');
    //     $this->db->from('peserta_deposit');
    //     $this->db->join('peserta', 'peserta_deposit.peserta_id=peserta.peserta_id');
    //     $this->db->order_by('peserta_deposit.deposit_id', 'DESC');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    function getAllDeposit()
    {
        $query = "SELECT pd.*,p.*,pd.status as status_deposit FROM `peserta_deposit` pd,peserta p where pd.peserta_id=p.peserta_id ;";
        return $this->db->query($query)->result_array();
    }



    function edit()
    {
        $data = array(
            'status_deposit'   => $this->input->post('status_deposit')
        );
        $this->db->where('deposit_id', $this->input->post('id'));
        $this->db->update('peserta_deposit', $data);
    }

    function get($id)
    {
        $param = array('deposit_id' => $id);
        return $this->db->get_where('peserta_deposit', $param);
    }


    public function deleteDeposit($id)
    {
        $this->db->delete('peserta_deposit', ['deposit_id' => $id]);
    }
}
