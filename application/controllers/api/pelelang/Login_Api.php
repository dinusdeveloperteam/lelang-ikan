<?php

defined('BASEPATH') or exit('No direct script access allowed');


use chriskacerguis\RestServer\RestController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use \Firebase\JWT\ExpiredException;

// require APPPATH . '../vendor/chriskacerguis/codeigniter-restserver/src/RestController.php';
// require APPPATH . '../vendor/chriskacerguis/codeigniter-restserver/src/Format.php';

class Login_Api extends RestController
{
    public function __construct()
    {
       
        parent::__construct();
        //load model untuk memanggil table user login
        $this->load->model('User_model');
    }

    //membuat function untuk registrasi
    public function registrasi_post(){
         header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    // header('Content-Type: application/json; charset=utf-8');
         $data = [
                'nik' =>  $this->post('nik'),
                'npwp' => $this->post('npwp'),
                'nama' => $this->post('nama'),
                'alamat' => $this->post('alamat'),
                'telp' => $this->post('telp'),
                'email' => $this->post('email'),
                'username' =>$this->post('username'),
                'password' => md5($this->post('password'))
    ];
		// $this->response([
		// 	'status' => true,
		// 	'message' => $data
		// ], RestController::HTTP_OK); 
    if( $this->User_model->register_pelelang($data) > 0)
    {
        $this->response([
            'status' => true,
            'message' => 'NEW USER CREATED'
        ], RestController::HTTP_CREATED); 
    }
    else{
        $this->response([
            'status' => false,
            'message' => 'FAILED TO CREATE NEW USER'
        ], RestController::HTTP_BAD_REQUEST);
    }
    
        //  $data = array(
        //         'nik' =>  $this->post('nik'),
        //         'npwp' => $this->post('npwp'),
        //         'nama' => $this->post('nama'),
        //         'alamat' => $this->post('alamat'),
        //         'telp' => $this->post('telp'),
        //         'email' => $this->post('email'),
        //         'username' =>$this->post('username'),
        //         'password' => md5($this->post('password'))
        // );
        // $insert = $this->db->insert('pelelang', $data);
        // if ($insert) {
        //      $this->response($data, 200);
        // } else {
        //     $this->response(array('pesan' => 'gagal', 502));
        // }

        
    }


    //membuat function untuk login
    public function login_post(){
         header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

    $username= $this->post('username');
    $password = $this->post('password');

    $this->db->select('username,password');
    $this->db->from('pelelang');

    $this->db->where('username', $username);
    $this->db->where('password', md5($password));
    $query = $this->db->get();
    $result = $query->row();

    if ($result != null) {
		$exp = time() + 864000000;
		$token = array(
			"iss" => 'lelangikan-restservice',
			"aud" => $this->post('email'),
			"iat" => time(),
			"nbf" => time() + 10,
			"exp" => $exp,
			"data" => [
				"username" => $this->post('username'),
			]
		);
		$jwt = JWT::encode($token, $this->_configToken()['secretkey'], 'HS256');
		
		$this->response([
			'status' => true,
			'data' => [
				'username' => $result->username,
				"token" => $jwt,
				"bearer_token" => 'Bearer '.$jwt,
				"expireAt" => $token['exp']
			],
			'message' => 'Welcome back!',
		], RestController::HTTP_OK); 
    } else {
		$this->response([
			'status' => false,
			'data' => [],
			'message' => 'BAD REQUEST. USERNAME OR PASSWORD INVALID!',
		], RestController::HTTP_BAD_REQUEST);
    }

        //  $username = $this->input->get('username');
        // $password = $this->input->get('password');

        // $result = $this->User_model->login_pelelang($username, $password);
        // $data[] = $result;
        // if ($result) {
        //     $json = array("result" => $data, "status" => 1, "msg" => "Login Successfully!");
        // } else {
        //     $json = array("result" => $data, "status" => 0, "msg" => "Login Failed!");
        // }

        // header('Content-type: application/json');
        // echo json_encode($json);



        // $request = $this->post();
        // $response = null;
        // $method = $this->_detect_method();

        // try{
        //     $username = isset($request['username']) ? $request['username'] : '';
        //     $password = isset($request['password']) ? $request['password'] : '';

        //     if($username == "" || $password == ""){
        //         $response = response_error("Username dan password harus diisi");
        //         $this->set_response($response, RestController::HTTP_BAD_REQUEST);
        //         return;
        //     }

        //     $where = array(
        //         "username"  => $username
        //     );

        //     $user_data = $this->User_model->get('pelelang', $where)->row();

        //     $response = response_error("Username atau password salah");

        //     if(isset($user_data)){
        //         $is_password_valid = verify_password($password, $user_data->password);
        //         unset($user_data->password);
        //         if($is_password_valid)
        //             $response = response_success();
        //     }

        //     if(!$response['success']){
        //         $this->set_response($response, RestController::HTTP_UNAUTHORIZED);
        //         return;
        //     }

        //     $response = response_success("Login berhasil");
        //     $this->set_response($response, RestController::HTTP_OK);

        // } catch(Exception $ex){

        //     $response = response_error($ex->getMessage());
        //     $this->set_response($response, RestController::HTTP_INTERNAL_SERVER_ERROR);
        // }
    }
	
	private function _configToken()
	{
		$cnf['exp'] = 864000000; //detik
		$cnf['secretkey'] = '2212336221';
		return $cnf;
	}
   
}
