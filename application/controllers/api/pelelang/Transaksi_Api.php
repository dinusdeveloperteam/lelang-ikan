<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use \Firebase\JWT\ExpiredException;


class Transaksi_Api extends RestController
{
    public function __construct()
    {
        // header('Access-Control-Allow-Origin: *');
        // header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        //load model untuk memanggil table product
        $this->load->model('pelelang/Transaksi_Model');
    }

    //membuat function untuk menampilkan data produk dengan API
    public function transaksi_get()
    {
		// if($response['status'] == 200){
		//     $resp = $this->Transaksi_Model->getAll($pelelang_id);
		// json_output($response['status'],$resp);
		// }else{
		//     $this->response(array('pesan' => 'gagal', 502));
		// }

		if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);


		$id = $this->get('id');

		if (!is_null($id)) {
			$transaksi = $this->Transaksi_Model->getAll($id);
			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Here is data",
					'data' => $transaksi,
				],
				RestController::HTTP_OK
			); 
		} else {
			$transaksi = [];
			$this->response(
				[
					'status' => "error",
					'code' => RestController::HTTP_NOT_FOUND,
					'message' => "Not found",
					'data' => $transaksi,
				],
				RestController::HTTP_NOT_FOUND
			); 
		}
		
		
	}

    //membuat function untuk detail transaksi
    public function detailbyid_get()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);

			$id = $this->get('id');
			
      $data = $this->Transaksi_Model->getDetailById($id);
			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Here is data",
					'data' => $data,
				],
				RestController::HTTP_OK
			);
    }

		// menampilkan biaya admin
    public function biaya_admin_get()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);
			
      $data = $this->Transaksi_Model->getBiayaAdm();
			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Here is data",
					'data' => $data,
				],
				RestController::HTTP_OK
			);
    }
		
		// membuat method function untuk menampilkan bukti pembayaran
    public function bukti_bayar_get()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);
			
      $data = $this->Transaksi_Model->buktiBayar();
			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Here is data",
					'data' => $data,
				],
				RestController::HTTP_OK
			);
    }

		// membuat method function untuk mengambil data lelang_id dari table lelang
		public function idlelang_get()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);
			
      $data = $this->Transaksi_Model->getIdLelang();
			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Here is data",
					'data' => $data,
				],
				RestController::HTTP_OK
			);
    }

		// membuat method function untuk mengambil pelelang_id dari table pelelang
		public function idpelelang_get()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);
			
      $data = $this->Transaksi_Model->getIdPelelang();
			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Here is data",
					'data' => $data,
				],
				RestController::HTTP_OK
			);
    }

		// membuat method function untuk mengambil data lelang_pengiriman
		public function lelangpengiriman_get()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);
			
      $data = $this->Transaksi_Model->DataLelangPengiriman();
			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Here is data",
					'data' => $data,
				],
				RestController::HTTP_OK
			);
    }

		// membuat method function untuk menampilkan jumlah data transaksi pada Dashboard Pelelang
		public function jumlah_data_get()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);
			
      $data = $this->Transaksi_Model->JumlahData();
			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Here is data",
					'data' => $data,
				],
				RestController::HTTP_OK
			);
    }
		
		// membuat method function untuk edit data pengiriman dari pelelang
		public function edit_pengiriman_put()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);

			$id = $this->get('id');

			$nama = $this->put('nama');

			$this->Transaksi_Model->NamaPengirim($id, $nama);

			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Data berhasil diupdate!",
					// 'data' => $resp,
				],
				RestController::HTTP_OK
			);
    }

		// membuat method function untuk edit data nopolisi kendaraan pengirim
		public function edit_no_polisi_put()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);

			$id = $this->get('id');

			$pengirim = $this->put('pengirim');

			$this->Transaksi_Model->noPolisi($id, $pengirim);

			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Data berhasil diupdate!",
					// 'data' => $resp,
				],
				RestController::HTTP_OK
			);
    }

		// membuat method function untuk edit nama kendaraan pengirim
		public function edit_nama_kendaraan_put()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);

			$id = $this->get('id');

			$nama_kendaraan = $this->put('nama_kendaraan');

			$this->Transaksi_Model->namaKendaraan($id, $nama_kendaraan);

			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Data berhasil diupdate!",
					// 'data' => $resp,
				],
				RestController::HTTP_OK
			);
    }

		// membuat method function untuk edit no hp pengirim barang
		public function edit_no_hp_put()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);

			$id = $this->get('id');

			$telp = $this->put('telp');

			$this->Transaksi_Model->noHP($id, $telp);

			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Data berhasil diupdate!",
					// 'data' => $resp,
				],
				RestController::HTTP_OK
			);
    }

	// membuat function untuk mengubah status transaksi yang ada 
	// mengubah status produk lelang
	public function edit_status_transaksi_put()
    {
			if (!$this->_authtoken()) $this->response(array('status' => false, 'code' => '401', 'message' => 'Unauthorized', 'data' => []), RestController::HTTP_UNAUTHORIZED);

			$id = $this->get('id');

			$status_trans = (int) $this->put('status_trans');

			$this->Transaksi_Model->StatusTransaksi($id, $status_trans);

			$this->response(
				[
					'status' => "success",
					'code' => RestController::HTTP_OK,
					'message' => "Data berhasil diupdate!",
					// 'data' => $resp,
				],
				RestController::HTTP_OK
			);
    }

		private function _configToken()
		{
			$cnf['exp'] = 864000000; //detik
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
