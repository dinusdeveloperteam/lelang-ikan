<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback_Model extends CI_Model{

	//mengambil data dari database
	 public function getData(){
         $query=$this->db->get('lelang_pemenang');
        return $query->result();  
    }

    //menampilkan data lelang testimoni
    public function data(){
    	$this->db->select('peserta.peserta_id,peserta.nama,lelang.produk,lelang_pemenang.testimoni_pemenang');
    	$this->db->from('lelang_pemenang');
    	$this->db->join('lelang','lelang_pemenang.lelang_id=lelang.lelang_id');
    	$this->db->join('peserta','lelang_pemenang.peserta_id=peserta.peserta_id');
    	$query=$this->db->get();
    	if($query->num_rows()>0){
    		return $query->result();
    	}else{
    		return array();
    	}
    }

  //   //memanggil id pada table peserta
  // public function getDataById($id){
  //   return $this->db->get_where('peserta',['peserta_id' => $id])->row_array();
  // }
  // //memanggil id pada table peserta
  // public function getDataProdukById($id){
  //   return $this->db->get_where('lelang',['peserta_id' => $id])->row_array();
  // }

  // //memanggil data informasi testimoni 
  // public function getAllFeedback(){
  //   return $this->db->get('lelang_pemenang')->result_array();
  // }

}