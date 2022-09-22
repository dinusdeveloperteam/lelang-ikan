<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller{
	public function __construct() 
	{   
		parent::__construct(); 
		$this->load->model('SettingAccount_Model');
        $this->load->model('panitia/Panitia');
		$this->load->library('form_validation'); 
		$this->load->helper('url','form');
	}  

	//Fungsi Index
	public function index(){
		$page = 'Kelola Akun';
        $data = [
            'title' => $page,
            'breadcrumb' => $page
        ];
		$data['data']=$this->SettingAccount_Model->getData();
        $data['user'] = $this->Panitia->user_panitiaById($this->session->panitia_id);
        $data['panitia'] = $this->Panitia->user_panitia($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
		$this->load->view('panitia/kelola_akun/index',$data);
        $this->load->view('panitia/partials/end');
	}

	//Fungsi Edit Data
	public function halaman_edit($id)
	{
		$this->form_validation->set_rules('nama','nama','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msgInfo', '<div class="alert alert-danger" role="alert">
				<div class="alert-text">Anda belum mengisi apapun !</div>
			</div>');
			redirect('panitia/profile');
		} else {
			$config = array();
			if(!empty($_FILES['image1']['name'])) {
				$fileExt = pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION);
				$config['upload_path'] = './assets/uploads/panitia';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name']    = 'image1-' . date('d-m-Y') . '-' . time() . '.' . $fileExt;
	
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if(! $this->upload->do_upload('image1')){ 
					$this->session->set_flashdata('msgInfo', '<div class="alert alert-danger" role="alert">
						<div class="alert-text">Foto anda tidak bisa terupload !</div>
					</div>');
					redirect('panitia/profile');
					die;
				}
			}
			
			$data = array(
				'NIK'            => $this->input->post('nik'),
				'nama'              => $this->input->post('nama'),
				'instansi'           =>$this->input->post('instansi'),
				'jabatan'            => $this->input->post('jabatan'),
				'jeniskel'            => $this->input->post('jeniskel')
			);

			if(!empty($_FILES['image1']['name'])) {
				$data['foto'] = 'assets/uploads/panitia/' . $config['file_name'];
			}
			
			$this->session->set_flashdata('msgInfo', '<div class="alert alert-success" role="alert">
				<div class="alert-text">Sukses mengubah data !</div>
			</div>');
			$this->Panitia->updatePanitiaById($data, $id);
			redirect('panitia/profile');
     	}
	} 

	//Fungsi Edit Password
	public function halaman_edit_password($id)
	{
		$this->form_validation->set_rules('oldpassw','oldpassw','required');
		$this->form_validation->set_rules('newpassw','newpassw','required');
		$this->form_validation->set_rules('konfirmpassw','konfirmpassw','required');
		if($this->form_validation->run() == FALSE){
			redirect('panitia/profile');
		} else {
			$myData = $this->Panitia->user_panitiaById($id);
			$oldRealPassword = $myData->password;

			// Cek apakah password lama nya sama
			if($oldRealPassword == $this->input->post('oldpassw')) {
				// Cek apakah password baru dan konfirmasi sama
				if($this->input->post('newpassw') == $this->input->post('konfirmpassw')) {
					$data = array(
						'password' => $this->input->post('newpassw')
					);

					$this->Panitia->updatePanitiaById($data, $id);
					$this->session->set_flashdata('msgPassword', '<div class="alert alert-success" role="alert">
						<div class="alert-text">Password selesai diubah</div>
					</div>');
					redirect('panitia/profile');
				} else {
					$this->session->set_flashdata('msgPassword', '<div class="alert alert-danger" role="alert">
						<div class="alert-text">Konfirmasi password berbeda !</div>
					</div>');
					redirect('panitia/profile');
				}
			} else {
				$this->session->set_flashdata('msgPassword', '<div class="alert alert-danger" role="alert">
					<div class="alert-text">Password lama anda tidak sama !</div>
				</div>');
				redirect('panitia/profile');
			}
		}
	}
}