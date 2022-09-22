<?php

class M_kelolaakun_panitia extends CI_Model
{
    public function getAllPanitia()
    {
        //tampilkan data panitia
        $this->db->select('*');
        $this->db->from('panitia');
        $query = $this->db->get();
        return $query->result_array();
    }

    

    public function deletePanitia($id)
    {
        $this->db->delete('panitia', ['panitia_id' => $id]);
    }

    function get($id){
        $param = array('panitia_id'=>$id);
        return $this->db->get_where('panitia',$param);
    }

    // 18-8-22
    function edit(){
        $data=array( 
            'nama'     => $this->input->post('nama'),
            'instansi'     => $this->input->post('instansi'),
            'nik'     => $this->input->post('nik'),
            'jabatan'   => $this->input->post('jabatan'),
            'jeniskel'   => $this->input->post('jeniskel')
            
        );
        $this->db->where('panitia_id',$this->input->post('id'));
        $this->db->update('panitia',$data);
    }

    public function getPanitiaById($id)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $id])->row_array();
    }
    // 18-8-22
}