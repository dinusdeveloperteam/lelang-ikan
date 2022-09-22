<?php
defined('BASEPATH') or exit('No direct script access allowed');
  
class Transaksi_Model extends CI_Model{
	//membuat method function untuk menampilkan semua data transaksi menggunakan 3table
	public function getAll(){
		//Membuat pengkondisian untuk mengambil status
		// $belumdibayar=$this->session->userdata('BelumDibayar');
		// $dibayar=$this->session->userdata('Dibayar');
		// $ditolak=$this->session->userdata('diTolak');

		// if($belumdibayar){
		// 	$this->db->where('lelang_pemenang.status =',$belumdibayar);
		// }if($dibayar){
		// 	$this->db->where('lelang_pemenang.status =',$dibayar);
		// }if($ditolak){
		// 	$this->db->where('lelang_pemenang.status =',$ditolak);
		// } 
 
 
		$this->db->select('lelang_pemenang.lelang_id,peserta.nama,lelang_pembayaran.nominal_dibayarkan,lelang.metode_bayar,lelang_pemenang.status');
		$this->db->from('lelang_pemenang');
		$this->db->join('peserta','lelang_pemenang.peserta_id=peserta.peserta_id');
		$this->db->join('lelang_pembayaran','lelang_pemenang.lelang_id=lelang_pembayaran.lelang_id');
		$this->db->join('lelang','lelang_pemenang.lelang_id=lelang.lelang_id');
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{ 
			return array();
		}

	}

	//membuat method function untuk menampilkan detail transaksi berdasarkan id pembelian produk
	public function getDetailById($id){
		$this->db->select('lelang_pemenang.lelang_id,lelang.metode_bayar,lelang_pemenang.status,lelang_pembayaran.nominal_dibayarkan,lelang_pembayaran.ongkir,lelang_pembayaran.kurir,lelang_pembayaran.no_resi,lelang.jumlah');
		$this->db->from('lelang_pembayaran');
		$this->db->join('lelang_pemenang','lelang_pemenang.lelang_id=lelang_pembayaran.lelang_id');
		$this->db->join('lelang','lelang_pembayaran.lelang_id=lelang.lelang_id');
		$this->db->where('lelang_pembayaran.lelang_id',$id);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}

		// $query=$this->db
		// ->select('*')
		// ->from(['lelang_pembayaran','lelang_pemenang','lelang','setting'])
		// ->get();
		// return $query->result();
	}

	//memanggil field/kolom yang berada ditable
	public function getBiayaAdm(){
		// return $this->db->get_where('setting',['biaya_adm' => $adm])->row_array();
	    $this->db->select("biaya_adm");
        $this->db->from('setting');  
        $query = $this->db->get();
        return $result=$query->row();
	}

	//membuat method function untuk menampilkan bukti pembayaran
	public function buktiBayar(){
		 $this->db->select("bukti_pembayaran");
        $this->db->from('lelang_pembayaran');  
        $query = $this->db->get();
        return $result=$query->row();
	}
	//membuat method function untuk mengambil status transaksi
	// public function getStatus(){
	// 	$belumdibayar=$this->session->userdata('BelumDibayar');
	// 	$dibayar=$this->session->userdata('Dibayar');
	// 	$ditolak=$this->session->userdata('diTolak');

	// 	if($belumdibayar){
	// 		$this->db->where('lp.status =',$belumdibayar);
	// 	}if($dibayar){
	// 		$this->db->where('lp.status =',$dibayar);
	// 	}if($ditolak){
	// 		$this->db->where('lp.status =',$ditolak);
	// 	}
	// 	$this->db->select('lelang_pemenang.lelang_id,peserta.nama,lelang_pembayaran.nominal_dibayarkan,lelang.metode_bayar,lelang_pemenang.status');
	// 	$this->db->from('lelang_pemenang lp');
	// 	$this->db->join('peserta','lelang_pemenang.peserta_id=peserta.peserta_id');
	// 	$this->db->join('lelang_pembayaran','lelang_pemenang.lelang_id=lelang_pembayaran.lelang_id');
	// 	$this->db->join('lelang','lelang_pemenang.lelang_id=lelang.lelang_id');
	// 	return $this->db->get('')->result();
	// }
	
}