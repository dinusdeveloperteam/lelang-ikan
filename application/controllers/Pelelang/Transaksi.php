<?php
defined('BASEPATH') or exit('No direct script access allowed'); 
  
class Transaksi extends CI_Controller{

	//memangggil models untuk ambil data dari database
	public function __construct()
	{   
		parent::__construct(); 
		$this->load->model('pelelang/Transaksi_Model');
		 $this->load->model('panitia/Panitia');
		$this->load->helper('url','download');
		// $this->load->library('form_validation');
		// $this->load->helper('url','form');
	} 
 
	public function index(){
		$data['title']  = 'Pesanan';
		$user = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();
		$data['Transaksi']=$this->Transaksi_Model->getAll($user->pelelang_id);
		$data['suratperintah']=$this->Panitia->suratperintah();
		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();
		$data['pengiriman']=$this->Transaksi_Model->DataLelangPengiriman();
		// $data['status']=$this->Transaksi_Model->getStatus(); 
		// $this->session->userdata('BelumDibayar',$belumdibayar);
		// $this->session->userdata('Dibayar',$dibayar);
		// $this->session->userdata('diTolak',$ditolak);

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/transaksi/index',$data);
		$this->load->view('theme_pelelang/footer', $data);
	}

	public function proses(){
		// $data['title']  = 'Pesanan';
		// // get data nama user (untuk tampil di sidebar dan navbar)
		// $data['user']   = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();

		// $this->load->view('theme_pelelang/header', $data);
		
		// $this->load->view('theme_pelelang/footer', $data);
		$this->form_validation->set_rules('pengirim','pengirim','required');
			
			if($this->form_validation->run() == FALSE){
				$data['title']  = 'Proses Transaksi';
				// get data nama user (untuk tampil di sidebar dan navbar)
				$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();
				$data['lelang']=$this->Transaksi_Model->getIdLelang();
				$data['pelelang']=$this->Transaksi_Model->getIdPelelang();
				$data['pengiriman']=$this->Transaksi_Model->DataLelangPengiriman();

				// $data['edit_pengirim']=$this->Transaksi_Model->dataPengiriman($id);
				$this->load->view('theme_pelelang/header', $data);
				$this->load->view('pelelang/transaksi/proses',$data);
				$this->load->view('theme_pelelang/footer', $data);
			}else{
				
					$pengiriman_id=$this->Transaksi_Model->IdPengiriman();
					$data = array(
						'pengiriman_id'  => $pengiriman_id,
						'nama'			 => $this->input->post('pengirim'),
						'no_polisi' 	 => $this->input->post('no_pol'),
						'nama_kendaraan' => $this->input->post('nama_kendaraan'),
						'no_hp' 		 => $this->input->post('telp'),
						'status_transaksi' => 0
					);	

					$this->db->insert('lelang_pengiriman', $data);

					redirect('pelelang/transaksi/index');
				}
				
	}

	//membuat function untuk edit data pengiriman
	public function edit_namapengirim($id){
		$id = $this->uri->segment(4);
		$this->form_validation->set_rules('pengirim','pengirim','required');
		if($this->form_validation->run() == FALSE){
			$data['data']	= $this->db->query('select * from lelang_pengiriman where pengiriman_id = "'.$id.'"')->row();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();
			$data['edit_pengirim']=$this->Transaksi_Model->NamaPengirim($id);
			$this->load->view('theme_pelelang/header', $data);
			$this->load->view('pelelang/transaksi/detail', $data);
			$this->load->view('theme_pelelang/footer', $data);
		}else{
			$data =[
				'nama'  		=> $this->input->post('pengirim')
			];	
			$this->db->where('pengiriman_id' , $id);
			$this->db->update('lelang_pengiriman', $data);
			redirect($_SERVER['HTTP_REFERER']);
			redirect('pelelang/transaksi/detail',$data);
		}
	}

	//membuat function untuk edit no polisi pengiriman
	public function edit_nopol($id){
		$id = $this->uri->segment(4);
		$this->form_validation->set_rules('no_pol','no_pol','required');
		if($this->form_validation->run() == FALSE){
			$data['data']	= $this->db->query('select * from lelang_pengiriman where pengiriman_id = "'.$id.'"')->row();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();
			$data['edit_pengirim']=$this->Transaksi_Model->noPolisi($id);
			$this->load->view('theme_pelelang/header', $data);
			$this->load->view('pelelang/transaksi/detail', $data);
			$this->load->view('theme_pelelang/footer', $data);
		}else{
			$data =[
				'no_polisi'  		=> $this->input->post('no_pol')
			];	
			$this->db->where('pengiriman_id' , $id);
			$this->db->update('lelang_pengiriman', $data);
			redirect($_SERVER['HTTP_REFERER']);
			redirect('pelelang/transaksi/detail',$data);
		}
	}

	//function untuk ubah nama kendaraan pengirim barang
	public function edit_namakendaraan($id){
		$id = $this->uri->segment(4);
		$this->form_validation->set_rules('nama_kendaraan','nama_kendaraan','required');
		if($this->form_validation->run() == FALSE){
			$data['data']	= $this->db->query('select * from lelang_pengiriman where pengiriman_id = "'.$id.'"')->row();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();
			$data['edit_pengirim']=$this->Transaksi_Model->noPolisi($id);
			$this->load->view('theme_pelelang/header', $data);
			$this->load->view('pelelang/transaksi/detail', $data);
			$this->load->view('theme_pelelang/footer', $data);
		}else{
			$data =[
				'nama_kendaraan'  		=> $this->input->post('nama_kendaraan')
			];	
			$this->db->where('pengiriman_id' , $id);
			$this->db->update('lelang_pengiriman', $data);
			redirect($_SERVER['HTTP_REFERER']);
			redirect('pelelang/transaksi/detail',$data);
		}
	}

	//function untuk ubah no hp pengirim barang
 
	public function edit_nohp($id){
		$id = $this->uri->segment(4);
		$this->form_validation->set_rules('telp','telp','required');
		if($this->form_validation->run() == FALSE){
			$data['data']	= $this->db->query('select * from lelang_pengiriman where pengiriman_id = "'.$id.'"')->row();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();
			$data['edit_pengirim']=$this->Transaksi_Model->noHP($id);
			$this->load->view('theme_pelelang/header', $data);
			$this->load->view('pelelang/transaksi/detail', $data);
			$this->load->view('theme_pelelang/footer', $data);
		}else{
			$data =[
				'no_hp'  		=> $this->input->post('telp')
			];	
			$this->db->where('pengiriman_id' , $id);
			$this->db->update('lelang_pengiriman', $data);
			redirect($_SERVER['HTTP_REFERER']);
			redirect('pelelang/transaksi/detail',$data);
		}
	}
	//membuat konfirmasi status pengiriman/transaksi
	public function StatusTransaksi($id){
		$id = $this->uri->segment(4);
		$this->form_validation->set_rules('status_transaksi','status_transaksi','required');
		if($this->form_validation->run() == FALSE){
			$data['data']	= $this->db->query('select * from lelang_pengiriman where pengiriman_id = "'.$id.'"')->row();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();
			$data['detail']=$this->Transaksi_Model->getDetailById($id);
			$data['status']=$this->Transaksi_Model->StatusTransaksi($id);
			$data['adm']=$this->Transaksi_Model->getBiayaAdm();
			$data['bukti']=$this->Transaksi_Model->buktiBayar();
			$data['pengiriman']=$this->Transaksi_Model->DataLelangPengiriman();
			$this->load->view('theme_pelelang/header', $data);
			$this->load->view('pelelang/transaksi/detail', $data);
			$this->load->view('theme_pelelang/footer', $data);
		}else{
			$data =[
				'status_transaksi'  		=> $this->input->post('status_trans')
			];	
			$this->db->where('pengiriman_id' ,  $id);
			$this->db->update('lelang_pengiriman', $data);
			redirect($_SERVER['HTTP_REFERER']);
			redirect('pelelang/transaksi/detail',$data);
		}
	}



	public function detail($id){
		$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();
		$data['detail']=$this->Transaksi_Model->getDetailById($id);
		$data['status']=$this->Transaksi_Model->StatusTransaksi($id);
		$data['adm']=$this->Transaksi_Model->getBiayaAdm();
		$data['bukti']=$this->Transaksi_Model->buktiBayar();
		$data['pengiriman']=$this->Transaksi_Model->DataLelangPengiriman();
		$this->load->view('pelelang/transaksi/detail',$data);
	}

	public function dibatalkan(){
		$data['title']  = 'Dibatalkan';
		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/transaksi/dibatalkan', $data);
		$this->load->view('theme_pelelang/footer', $data);
	}

	public function dikirim(){
		$data['title']  = 'Dikirim';
		$user = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();
		$data['Transaksi']=$this->Transaksi_Model->getAll($user->pelelang_id);
		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/transaksi/dikirim',$data);
		$this->load->view('theme_pelelang/footer', $data);
	}

	public function perludicek(){
		$data['title']  = 'Perlu dicek';
		$user = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();
		$data['Transaksi']=$this->Transaksi_Model->getAll($user->pelelang_id);
		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/transaksi/perludicek',$data);
		$this->load->view('theme_pelelang/footer', $data);
	}

	public function perludikirim(){
		$data['title']  = 'Perlu dikirim';
		$user = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();
		$data['Transaksi']=$this->Transaksi_Model->getAll($user->pelelang_id);
		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/transaksi/perludikirim',$data);
		$this->load->view('theme_pelelang/footer', $data);
	}

	public function selesai(){
		$data['title']  = 'Perlu dikirim';
		$user = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();
		$data['Transaksi']=$this->Transaksi_Model->getAll($user->pelelang_id);
		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nama = "'.$_SESSION['nama'].'"')->row();

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/transaksi/selesai',$data);
		$this->load->view('theme_pelelang/footer', $data);
	}
}