<?php 

class Pengaturan extends CI_Controller{
	public function __construct() 
	{    
		parent::__construct(); 
		$this->load->model('pelelang/SettingAccount_Model');
		$this->load->library('form_validation'); 
		$this->load->helper('url','form');
	}  
	public function index(){
		$data['dataPelelang']=$this->SettingAccount_Model->getData();

		// QUERY GET DATA
			// $data['dataPelelang'] = $this->db->query('select * from pelelang')->result_array();
		// END QUERY GET DATA
		$data['title']  = 'Pengaturan';
		// get data nama user (untuk tampil di sidebar dan navbar)
		$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();

		$this->load->view('theme_pelelang/header', $data);
		$this->load->view('pelelang/pengaturan/index',$data);
		$this->load->view('theme_pelelang/footer', $data);
	}
	public function halaman_edit($id){
		$this->form_validation->set_rules('nama','nama','required');
		$id=$this->uri->segment(4);
		$data['pelelang']=$this->SettingAccount_Model->getPelelangById($id);
		$data['jenis']=$this->SettingAccount_Model->getAllJenis();
		$data['role']=$this->SettingAccount_Model->konfirmasiJenis();

		if($this->form_validation->run() == FALSE){
			$data['title']  = 'Edit';
			$data['data']	= $this->db->query('select * from pelelang where pelelang_id = "'.$id.'"')->row();
			// get data nama user (untuk tampil di sidebar dan navbar)
			$data['user']   = $this->db->query('select * from pelelang where nama = "' . $_SESSION['nama'] . '"')->row();

			$this->load->view('theme_pelelang/header', $data);
			$this->load->view('pelelang/pengaturan/edit', $data);
			$this->load->view('theme_pelelang/footer', $data);
		}else{
			$config = array();
			$id_pelelang=$this->SettingAccount_Model->get_id();
			$config['upload_path'] = './assets/uploads/pelelang';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name']    = 'image1-' . date('d-m-Y') . '/' . time();

			$this->load->library('upload', $config, 'image1');
			$this->image1->initialize($config);
			$upload_image1 = $this->image1->do_upload('image1');

			$config['upload_path'] = './assets/uploads/pelelang';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name']    = 'image2-' . date('d-m-Y') . '/' . time();

			$this->load->library('upload', $config, 'image2');
			$this->image2->initialize($config);
			$upload_image2 = $this->image2->do_upload('image2');

			$config['upload_path'] = './assets/uploads/pelelang';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name']    = 'image3-' . date('d-m-Y') . '/' . time();

			$this->load->library('upload', $config, 'image3');
			$this->image3->initialize($config);
			$upload_image3 = $this->image3->do_upload('image3'); 

			if($upload_image1 && $upload_image2 && $upload_image3){
				$data = array(
					'pelelang_id'				=>'PL-'.date('Y').'-'.$id_pelelang,
					'nama'						=> $this->input->post('nama'),
					'username'					=> $this->input->post('username'),
					'email'						=>$this->input->post('email'),
					'alamat'				    => $this->input->post('alamat'),
              		'telp' 						=> $this->input->post('telp'),
              		'jenis' 					=> $this->input->post('jenis'),
					'provinsi'					=>$this->input->post('provinsi'),
					'kota'						=>$this->input->post('kota'),
					'kecamatan'					=>$this->input->post('kecamatan'),
					'kelurahan'					=>$this->input->post('kelurahan'),
					'filektp'    				=> $this->image1->data("file_name"),
					'filenpwp'    				=> $this->image2->data("file_name"),
					'fileSIUP'    				=> $this->image3->data("file_name"),
					'norekening'				=>$this->input->post('norekening'),
              		'bank'						=>$this->input->post('bank'),
              		'atasnama'					=>$this->input->post('atasnama'),
              		'status'    				=> 2,
              		'deskripsi'					=>$this->input->post('deskripsi')
				);	

				$id_pelelang = array('pelelang_id' => $id);
                $sql       = $this->db->query('select * from pelelang where pelelang_id="'.$id.'"')->row();
                unlink('/assets/uploads/pelelang'. $sql->logo_title);
				unlink('/assets/uploads/pelelang'. $sql->logo_website);
				
				$this->db->where($id_pelelang);
                $this->db->update('pelelang', $data);

				redirect('pelelang/pengaturan/index');
			}else{
				redirect('pelelang/pengaturan/edit'. $id);
			}
     	}
	} 

	//membuat function untuk menampilkan status
	public function konfirmasiStatus($id,$pesan){
	$data['dataPelelang']=$this->SettingAccount_Model->verifikasiAkun($id,$pesan);
		if($pesan==1 || $pesan==2 || $pesan==3){
		redirect('pelelang/product/index');
		}else{
			redirect('pelelang/dashboard');
		}
	}

	//membuat method function untuk memilih jenis usaha lelang
	// public function konfirmasiJenis(){
		
	// }




	//bagian function untuk edit data dari database
	
}