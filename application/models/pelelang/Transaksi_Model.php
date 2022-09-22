<?php
defined('BASEPATH') or exit('No direct script access allowed');
  
class Transaksi_Model extends CI_Model{
	//membuat method function untuk mengambil id pengiriman barang
	public function IdPengiriman(){
		$this->db->select('MAX(RIGHT(pengiriman_id,5)) as pengiriman_id', FALSE);
        $this->db->from('lelang_pengiriman');
        $this->db->where('pengiriman_id !=', 'NULL');
        $query = $this->db->get();
        $kode = $query->row();
        $num = substr($kode->pengiriman_id, 1, 5);
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
		$pengiriman_id='PNG-' . date('Y') . '-' . $kodebaru;

		return $pengiriman_id;
	}
	//membuat method function untuk membuat bagian pengiriman barang
	public function Pemesanan(){
		// data array
        $this->db->select('MAX(RIGHT(pengiriman_id,5)) as pengiriman_id', FALSE);
        $this->db->from('lelang_pengiriman');
        $this->db->where('pengiriman_id !=', 'NULL');
        $query = $this->db->get();
        $kode = $query->row();
        $num = substr($kode->pengiriman_id, 1, 5);
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
            'pengiriman_id' => 'PNG-' . date('Y') . '-' . $kodebaru,
            'nama' => $this->input->post('pengirim'),
            'no_polisi' => $this->input->post('no_pol'),
            'nama_kendaraan' => $this->input->post('nama_kendaraan'),
            'no_hp' => $this->input->post('telp'),
			'status_transaksi'  => 0
        );


        // Insert user
        return $this->db->insert('lelang_pengiriman', $data);
	}
	//membuat method function untuk menampilkan semua data transaksi menggunakan 3table
	public function getAll($pelelang_id){
		$this->db->select('lelang_pemenang.lelang_id,peserta.nama,lelang_pembayaran.nominal_dibayarkan,lelang.metode_bayar,lelang_pemenang.status');
		$this->db->from('lelang_pemenang');
		$this->db->join('peserta','lelang_pemenang.peserta_id=peserta.peserta_id');
		$this->db->join('lelang_pembayaran','lelang_pemenang.lelang_id=lelang_pembayaran.lelang_id');
		$this->db->join('lelang','lelang_pemenang.lelang_id=lelang.lelang_id');
		$this->db->where('lelang.pelelang_id', $pelelang_id);

		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{ 
			return array();
		}
	}

	// function getAllT($id){
	// 	$this->db->select('lelang_pemenang.lelang_id,peserta.nama,lelang_pembayaran.nominal_dibayarkan,lelang.metode_bayar,lelang_pemenang.status');
	// 	$this->db->from('lelang_pemenang');
	// 	$this->db->join('peserta','lelang_pemenang.peserta_id=peserta.peserta_id');
	// 	$this->db->join('lelang_pembayaran','lelang_pemenang.lelang_id=lelang_pembayaran.lelang_id');
	// 	$this->db->join('lelang','lelang_pemenang.lelang_id=lelang.lelang_id');

	// 	$query=$this->db->get();
	// 	if($query->num_rows()>0){
	// 		return $query->result();
	// 	}else{ 
	// 		return array();
	// 	}
	// }

	//membuat method function untuk menampilkan detail transaksi berdasarkan id pembelian produk
	public function getDetailById($id){
		$this->db->select('lelang_pemenang.lelang_id,lelang.metode_bayar,lelang_pemenang.status,lelang_pembayaran.nominal_dibayarkan,lelang.jumlah');
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
	
	//membuat method function untuk mengambil data lelang_id dari table lelang
	public function getIdLelang(){
		$this->db->select('lelang_pembayaran.lelang_id');
		$this->db->from('lelang_pembayaran');
		$this->db->join('lelang_pengiriman','lelang_pembayaran.lelang_id=lelang_pengiriman.lelang_id');
		$query = $this->db->get();
        return $result=$query->row();

		// if($query->num_rows()>0){
		// 	return $query->result();
		// }else{ 
		// 	return array();
		// }

		// $this->db->select("lelang_id");
        // $this->db->from('lelang');  
        // $query = $this->db->get();
        // return $result=$query->row();
	}

	//membuat method function untuk mengambil pelelang_id dari table pelelang
	public function getIdPelelang(){
		$this->db->select('pelelang.pelelang_id,lelang_pengiriman.pelelang_id,pelelang.nama');
		$this->db->from('pelelang');
		$this->db->join('lelang_pengiriman','pelelang.pelelang_id=lelang_pengiriman.pelelang_id');
		$query = $this->db->get();
        return $result=$query->row();

	}

	//membuat method function untuk mengambil data lelang_pengiriman
	public function DataLelangPengiriman(){
		$this->db->select("*");
        $this->db->from('lelang_pengiriman');  
        $query = $this->db->get();
        return $result=$query->row();
	}

	//membuat method function untuk menampilkan jumlah data transaksi pada Dashboard Pelelang
	public function JumlahData(){
		$query = $this->db->query("SELECT *,count(lelang_id) AS transaksi FROM lelang_pembayaran");
    	return $query->result();
    }

    //membuat method function untuk edit data pengiriman dari pelelang
	public function NamaPengirim($id){
	
		$data=[
			  'nama'  => $this->input->post('pengirim')	
		  ];
		  $this->db->where('pengiriman_id',$id);
		  $this->db->update('lelang_pengiriman',$data);
		  $this->session->set_flashdata('sukses','data berhasil diupdate');
	}

	//function untuk edit data nopolisi kendaraan pengirim
	public function noPolisi($id){
	
		$data=[
			  'no_polisi'  => $this->input->post('pengirim')	
		  ];
		  $this->db->where('pengiriman_id',$id);
		  $this->db->update('lelang_pengiriman',$data);
		  $this->session->set_flashdata('sukses','data berhasil diupdate');
	}

	//function untuk edit nama kendaraan pengirim
	public function namaKendaraan($id){
	
		$data=[
			  'nama_kendaraan'  => $this->input->post('nama_kendaraan')	
		  ];
		  $this->db->where('pengiriman_id',$id);
		  $this->db->update('lelang_pengiriman',$data);
		  $this->session->set_flashdata('sukses','data berhasil diupdate');
	}


	//function untuk edit no  hp pengirim barang
	public function noHP($id){
	
		$data=[
			  'no_hp'  => $this->input->post('telp')	
		  ];
		  $this->db->where('pengiriman_id',$id);
		  $this->db->update('lelang_pengiriman',$data);
		  $this->session->set_flashdata('sukses','data berhasil diupdate');
	}
	
	//membuat function untuk mengubah status transaksi yang ada 
	//mengubah status produk lelang
	public function StatusTransaksi($id){
		$data=[
			'status_transaksi'  => $this->input->post('status_trans')	
		];
		$this->db->where('pengiriman_id',$id);
		$this->db->update('lelang_pengiriman',$data);
		$this->session->set_flashdata('sukses','data berhasil diupdate');
	
	}
	
	
}