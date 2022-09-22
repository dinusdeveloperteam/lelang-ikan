<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
class Product extends CI_Controller{ 
	public function __construct() 
	{   
		parent::__construct();
		$this->load->model('pelelang/Product_model'); 
		$this->load->library('form_validation');
		$this->load->helper('url','form'); 
	} 
  
	//membuat method function index untuk menampilkan data product lelang
	public function index(){
		// $queryDataLelang=$this->Product_model->getDataLelang();
		// $data=array('queryAllLelang'=>$queryDataLelang);
		// $this->load->view('pelelang/product/index',$data);

		$data['title']  = 'Data Barang Lelang';
		// $data['queryAllLelang']	= $this->Product_model->getDataLelang();

		$user   = $this->db->query('select * from pelelang where nik = "' . $_SESSION['nik'] . '"')->row();
		$data['queryAllLelang']	= $this->db->query('select * from lelang where pelelang_id = "'.$user->pelelang_id.'"')->result_array();

		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nik = "' . $_SESSION['nik'] . '"')->row();

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/product/index',$data);
		$this->load->view('theme_pelelang/footer', $data);
	} 

	//menampilkan halaman edit product lelang
	public function edit($id){

		$this->form_validation->set_rules('produk','produk','required');
		
		if($this->form_validation->run() == FALSE){
			$data['title']  = 'Edit Produk';
			$data['data']	= $this->db->query('select * from lelang where lelang_id = "'.$id.'"')->row();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from pelelang where nik = "' . $_SESSION['nik'] . '"')->row();

			$this->load->view('theme_pelelang/header', $data);
			$this->load->view('pelelang/product/edit', $data);
			$this->load->view('theme_pelelang/footer', $data);
		}else{
			$config = array();

			$config['upload_path'] = './vendors/uploads/produk';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name']    = 'image1-' . date('d-m-Y') . '/' . time();

			$this->load->library('upload', $config, 'image1');
			$this->image1->initialize($config);
			$upload_image1 = $this->image1->do_upload('image1');

			$config['upload_path'] = './vendors/uploads/produk';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name']    = 'image2-' . date('d-m-Y') . '/' . time();

			$this->load->library('upload', $config, 'image2');
			$this->image2->initialize($config);
			$upload_image2 = $this->image2->do_upload('image2');

			$config['upload_path'] = './vendors/uploads/produk';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name']    = 'image3-' . date('d-m-Y') . '/' . time();

			$this->load->library('upload', $config, 'image3');
			$this->image3->initialize($config);
			$upload_image3 = $this->image3->do_upload('image3');

			$config['upload_path'] = './vendors/uploads/produk';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name']    = 'image4-' . date('d-m-Y') . '/' . time();

			$this->load->library('upload', $config, 'image4');
			$this->image4->initialize($config);
			$upload_image4 = $this->image4->do_upload('image4'); 

			if($upload_image1 && $upload_image2 && $upload_image3 && $upload_image4){
				$data = array(
					'produk'					=> $this->input->post('produk'),
					'deskripsi_produk'			=> $this->input->post('deskripsi_produk'),
					'image1'    				=> $this->image1->data("file_name"),
					'image2'    				=> $this->image2->data("file_name"),
					'image3'    				=> $this->image3->data("file_name"),
					'image4'    				=> $this->image4->data("file_name"),
					'harga_awal'				=> $this->input->post('harga_awal'),
					'harga_minimal_diterima'	=> $this->input->post('harga_minimal_diterima'),
					'incremental_value'			=> $this->input->post('increment_value'),
					'tgl_mulai'					=> $this->input->post('tgl_mulai'),
					'tgl_selesai'				=> $this->input->post('tgl_selesai'),
					'harga_beli_sekarang'		=> $this->input->post('harga_beli_sekarang'),
					'jumlah'            		=>$this->input->post('jumlah'),
					'keterangan'				=>$this->input->post('keterangan')
				);	

				$lelang_id = array
				('lelang_id' => $id);
                $sql       = $this->db->query('select * from lelang where lelang_id="'.$id.'"')->row();
                unlink('/assets/uploads/produk'. $sql->logo_title);
				unlink('/assets/uploads/produk'. $sql->logo_website);
				
				$this->db->where($lelang_id);
                $this->db->update('lelang', $data);

				redirect('pelelang/product/index');
			}else{
				redirect('pelelang/product/edit/'. $id);
			}
     	}
			
	}
		
	

	// function data_edit(){
	// 	$id=$this->Product_model->getId();
	// 	 $data=[
 //        'lelang_id'=>$id_lelang,
 //        'produk'=>$this->input->post('name'),
 //        'deskripsi_produk'=>$this->input->post('description'),
 //        'harga_awal'=>$this->input->post('harga_awal'),
 //        'harga_minimal_diterima'=>$this->input->post('harga_min'),
 //        'incremental_value'=>$this->input->post('increment_value'),
 //        'tgl_mulai'=>$this->input->post('tanggal_mulai'),
 //        'tgl_selesai'=>$this->input->post('tanggal_berakhir'),
 //        'harga_beli_sekarang'=>$this->input->post('harga_sekarang')
 //      ];
 //      $this->M_Mahasiswa-> updateDataProduk($id,$data);
	// 	redirect(base_url(''));
	// }

	public function tambah(){
		
			$this->form_validation->set_rules('produk','produk','required');
			
			if($this->form_validation->run() == FALSE){
				$data['title']  = 'Tambah Lelang';
				// get data nama user (untuk tampil di sidebar dan navbar)
				$data['user']   = $this->db->query('select * from pelelang where nik = "' . $_SESSION['nik'] . '"')->row();

				$this->load->view('theme_pelelang/header', $data);
				$this->load->view('pelelang/product/tambah');
				$this->load->view('theme_pelelang/footer', $data);
			}else{
				$config = array();
				$config['upload_path'] = './assets/uploads/produk';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name']    = 'image1-' . date('d-m-Y') . '/' . time();

				$this->load->library('upload', $config, 'image1');
				$this->image1->initialize($config);
				$upload_image1 = $this->image1->do_upload('image1');

				$config['upload_path'] = './assets/uploads/produk';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name']    = 'image2-' . date('d-m-Y') . '/' . time();

				$this->load->library('upload', $config, 'image2');
				$this->image2->initialize($config);
				$upload_image2 = $this->image2->do_upload('image2');

				$config['upload_path'] = './assets/uploads/produk';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name']    = 'image3-' . date('d-m-Y') . '/' . time();

				$this->load->library('upload', $config, 'image3');
				$this->image3->initialize($config);
				$upload_image3 = $this->image3->do_upload('image3');

				$config['upload_path'] = './assets/uploads/produk';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name']    = 'image4-' . date('d-m-Y') . '/' . time(); 
 
				$this->load->library('upload', $config, 'image4');
				$this->image4->initialize($config);
				$upload_image4 = $this->image4->do_upload('image4');
 
				if($upload_image1 && $upload_image2 && $upload_image3 && $upload_image4){
									$id_lelang=$this->Product_model->getId();
					$data = array(
						'lelang_id'					=> $id_lelang,
						'produk'					=> $this->input->post('produk'),
						'pelelang_id'				=> $this->input->post('pelelang_id'),
						'deskripsi_produk'			=> $this->input->post('deskripsi_produk'),
						'image1'    				=> $this->image1->data("file_name"),
						'image2'    				=> $this->image2->data("file_name"),
						'image3'    				=> $this->image3->data("file_name"),
						'image4'    				=> $this->image4->data("file_name"),
						'harga_awal'				=> $this->input->post('harga_awal'),
						'harga_minimal_diterima'	=> $this->input->post('harga_minimal_diterima'),
						'incremental_value'			=> $this->input->post('increment_value'),
						'tgl_mulai'					=> $this->input->post('tgl_mulai'),
						'tgl_selesai'				=> $this->input->post('tgl_selesai'),
						'harga_beli_sekarang'		=> $this->input->post('harga_beli_sekarang'),
						'jumlah'            		=> $this->input->post('jumlah'),
						'keterangan'				=> $this->input->post('keterangan'),
						'status'					=> 0
					);	

					$this->db->insert('lelang', $data);

					redirect('pelelang/product/index');
				}else{
					redirect('pelelang/product/tambah');
				}
			}
	}

	//membuat method function untuk mengambil status konfirmasi produk
	public function konfirmasiSudahVerifikasi($id_pelelang,$pesan){
		$this->Product_model->konfirmasiProduk($id_pelelang,$pesan);
		if($pesan==1){
			redirect('pelelang/product/index');
		}else{
			redirect('pelelang/dashboard');
		}
	}
				 


	//membuat function delete
	public function deleteProduk($id){
		$this->Product_model->deleteDataProduk($id);
		redirect(base_url('pelelang/product/index'));
	}
}