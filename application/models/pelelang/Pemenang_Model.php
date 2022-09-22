 <?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pemenang_Model extends CI_Model{

	 //menampilkan data lelang pemenang
    public function getData(){
    	$this->db->select('lelang_pemenang.lelang_id,peserta.nama,lelang.produk,lelang_pemenang.tgl_diumumkan');
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

	 //menghitung jumlah pemenang lelang agar tampil di dashboard
	 public function JumlahData(){
        $this->db->where('lelang_id');

        $this->db->select('SUM(peserta_id) + SUM(tgl_diumumkan) + SUM(bukti_bayar) + + SUM(tgl_bayar) + SUM(provinsi_kirim) + SUM(kota_kirim) + SUM(kecamatan_kirim) + SUM(kelurahan_kirim) + SUM(alamat_kirim) + SUM(status) + SUM(konfirmasi_terimaproduk) + SUM(testimoni_pemenang) + SUM(panitia_id)', FALSE);
        $this->db->from('lelang_pemenang');  
        $query = $this->db->get();
        return $result=$query->row();
    }
}