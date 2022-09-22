<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use \Firebase\JWT\ExpiredException;

class Produk_api extends RestController
{
    public function __construct()
    {
        parent::__construct();
        //load model untuk memanggil table product
        $this->load->model('pelelang/Product_model');
    }

    //membuat function untuk menampilkan data produk dengan API
    public function index_get()
    {
		if (!$this->_authtoken()) {
			$this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED); 
		}

        $id = $this->get('id');
        if (is_null($id)) {
            $produk = $this->db->get('lelang')->result();
        } else {
            $this->db->where('pelelang_id', $id);
            $produk = $this->db->get('lelang')->result();
        }
		// $this->response($produk, 200);
		$this->response(
			[
				'status' => "success",
				'code' => RestController::HTTP_OK,
				'message' => "Here is data!",
				'data' => $produk,
			],
			RestController::HTTP_OK
		);
    }

    //membuat function untuk post data produk dengan API
    public function produk_post()
    {
		if (!$this->_authtoken()) {
			$this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);
		}

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
            $data = [
                'lelang_id'					=> $id_lelang,
                'image1'    				=> $this->image1->data("file_name"),
                'image2'    				=> $this->image2->data("file_name"),
                'image3'    				=> $this->image3->data("file_name"),
                'image4'    				=> $this->image4->data("file_name"),
                'produk'					=> $this->post('produk'),
                'pelelang_id'				=> $this->post('pelelang_id'),
                'deskripsi_produk'			=> $this->post('deskripsi_produk'),
                'harga_awal'				=> $this->post('harga_awal'),
                'harga_minimal_diterima'	=> $this->post('harga_minimal_diterima'),
                'incremental_value'			=> $this->post('increment_value'),
                'tgl_mulai'					=> $this->post('tgl_mulai'),
                'tgl_selesai'				=> $this->post('tgl_selesai'),
                'harga_beli_sekarang'		=> $this->post('harga_beli_sekarang'),
                'jumlah'            		=> $this->post('jumlah'),
                'keterangan'				=> $this->post('keterangan'),
                'status'					=> 0
			];	

        $insert = $this->db->insert('lelang', $data);
        if ($insert) {
				$this->response(
				[
						'status' => "success",
						'code' => RestController::HTTP_CREATED,
						'message' => "Produk berhasil ditambahkan!",
					],
				RestController::HTTP_CREATED
				);
        } else {
			$this->response(
				[
					'status' => "error",
					'code' => RestController::HTTP_BAD_REQUEST,
					'message' => "Something wrong! Please check your input data!",
				],
				RestController::HTTP_BAD_REQUEST
			); 
        }
    }
}

    //membuat function untuk edit data produk dengan API
    public function update_produk_post()
    {

			if (!$this->_authtoken()) {
				$this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);
			}

			$id = $this->get('id');

			// $this->response(
			// 			[
			// 				'status' => "success",
			// 				'code' => RestController::HTTP_CREATED,
			// 				'data' => $this->post(),
			// 			],
			// 			RestController::HTTP_CREATED
			// 		);

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

			// $this->response(
			// 	[
			// 		'status' => "success",
			// 		'code' => RestController::HTTP_OK,
			// 		'message' => $this->post(),
			// 	],
			// 	RestController::HTTP_OK
			// );
			if ($upload_image1 && $upload_image2 && $upload_image3 && $upload_image4) {
				$data = [
					'lelang_id'                     => $id,
					'produk'                        => $this->post('produk'),
					'pelelang_id'										=> $this->post('pelelang_id'),
					'deskripsi_produk'              => $this->post('deskripsi_produk'),
					'image1'                        => $this->image1->data("file_name"),
					'image2'                        => $this->image2->data("file_name"),
					'image3'                        => $this->image3->data("file_name"),
					'image4'                        => $this->image4->data("file_name"),
					'harga_awal'                    => $this->post('harga_awal'),
					'harga_minimal_diterima'        => $this->post('harga_minimal_diterima'),
					'incremental_value'             => $this->post('increment_value'),
					'tgl_mulai'                     => $this->post('tgl_mulai'),
					'tgl_selesai'                   => $this->post('tgl_selesai'),
					'harga_beli_sekarang'           => $this->post('harga_beli_sekarang'),
					'jumlah'                        => $this->post('jumlah'),
					'keterangan'                    => $this->post('keterangan'),
					'status'                        => 0
				];

				// $insert = $this->db->insert('lelang', $data);
				$this->db->where('lelang_id', $id);
				$update = $this->db->update('lelang', $data);
				if ($update) {
					$this->response(
						[
							'status' => "success",
							'code' => RestController::HTTP_CREATED,
							'message' => "Produk berhasil diupdate!",
						],
						RestController::HTTP_CREATED
					);
				} else {
					$this->response(
						[
							'status' => "error",
							'code' => RestController::HTTP_BAD_REQUEST,
							'message' => "Something wrong! Please check your input data!",
						],
						RestController::HTTP_BAD_REQUEST
					);
				}
			}
    }

    //membuat API untuk menghapus data produk
    public function produk_delete()
    {
				if (!$this->_authtoken()) {
					$this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);
				}

        $id = $this->get('id');
				// $this->response(
				// 	[
				// 		'status' => "success",
				// 		'code' => RestController::HTTP_CREATED,
				// 		'data' => $id,
				// 	],
				// 	RestController::HTTP_CREATED
				// );
        $this->db->where('lelang_id', $id);
        $delete = $this->db->delete('lelang');
        if ($delete) {
            $this->response(
							[
								'status' => "success",
								'code' => RestController::HTTP_CREATED,
								'message' => "Produk berhasil dihapus!",
							],
							RestController::HTTP_CREATED
						);
        } else {
						$this->response(
							[
								'status' => "error",
								'code' => RestController::HTTP_BAD_REQUEST,
								'message' => "Something wrong! Can not be deleted!",
							],
							RestController::HTTP_BAD_REQUEST
						);
        }
    }

	private function _configToken()
	{
		$cnf['exp'] = 864000000; // detik
		$cnf['secretkey'] = '2212336221';
		return $cnf;
	}

	private function _authtoken()
	{
		$secret_key = $this->_configToken()['secretkey'];
		$token = null;
		$authHeader = $this->input->request_headers()['Authorization'];
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		if ($token) {
			try {
				$decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
				if ($decoded) {
					return true;
				}
			} catch (\Exception $e) {
				// $result = array('pesan' => 'Kode Signature Tidak Sesuai');
				return false;
			}
		}
	}
}
