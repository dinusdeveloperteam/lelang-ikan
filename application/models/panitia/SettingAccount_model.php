<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingAccount_Model extends CI_Model
{ 
    //mengambil data dari database
    public function getData(){
         $this->db->select("*");
        $this->db->from('panitia');  
        $query = $this->db->get();
        return $result=$query->row(); 
    } 

    //untuk mendapatkan id pelelang
    public function get_id(){
         $this->db->select('MAX(RIGHT(panitia_id,5)) as panitia_id',FALSE);
     $this->db->from('panitia');
     $this->db->where('panitia_id !=','NULL');
     $query=$this->db->get();
     $kode=$query->row();
     $num=substr($kode->panitia_id,1,5);
     $add=(int)$num +1;
     if(strlen($add)==1){
      $kodebaru="0000".$add;
     }else if(strlen($add)==2){
      $kodebaru="000".$add;
     }else if(strlen($add)==3){
      $kodebaru="00".$add;
     }else if(strlen($add)==4){
      $kodebaru="0".$add;
     }else{
      $kodebaru="".$add; 
     }
      $id_panitia='PL-'.date('Y').'-'.$kodebaru;

      return $id_panitia;
    }
     public function editData($id,$data){
     $this->db->select('MAX(RIGHT(panitia_id,5)) as panitia_id',FALSE);
     $this->db->from('panitia');
     $this->db->where('panitia_id !=','NULL');
     $query=$this->db->get();
     $kode=$query->row();
     $num=substr($kode->panitia_id,1,5);
     $add=(int)$num +1;
     if(strlen($add)==1){
      $kodebaru="0000".$add;
     }else if(strlen($add)==2){
      $kodebaru="000".$add;
     }else if(strlen($add)==3){
      $kodebaru="00".$add;
     }else if(strlen($add)==4){
      $kodebaru="0".$add;
     }else{
      $kodebaru="".$add; 
     }
      $id_panitia='PL-'.date('Y').'-'.$kodebaru;

      $data=[
        'panitia_id'       =>'PL-' .date('Y').'-'.$id_panitia,
          'NIK'            => $this->input->post('NIK'),
          'nama'          => $this->input->post('nama'),
          'instansi'           =>$this->input->post('instansi'),
          'jabatan'            => $this->input->post('jabatan'),
          'jeniskel'            => $this->input->post('jeniskel'),
          'username'           => $this->input->post('username'),
          'password'          =>$this->input->post('password'),
          
      ];
       $this->db->where('panitia_id',$id);
       $this->db->update('panitia',$data);
        // $this->db->insert('lelang',$data);

          $_FILES['images1']['name']=$_FILES['images1']['name'];
          $_FILES['images1']['type'] = $_FILES['images1']['type'];
          $_FILES['images1']['tmp_name'] = $_FILES['images1']['tmp_name'];
          $_FILES['images1']['error'] = $_FILES['images1']['error'];
          $_FILES['images1']['size'] = $_FILES['images1']['size'];

          $produkPath=APPPATH.'../assets/uploads/pelelang';

          $config1['upload_path']=$produkPath;
          $config1['allowed_types']= 'gif|jpg|png|jpeg';
          $config1['max_size']     = 5000;
          $config1['encrypt_name'] = true;
          $config1['file_name']=$id_panitia;

          $config2['upload_path']=$produkPath;
          $config2['allowed_types']= 'gif|jpg|png|jpeg';
          $config2['max_size']     = 5000;
          $config2['encrypt_name'] = true;
          $config2['file_name']=$id_panitia;

          $config3['upload_path']=$produkPath;
          $config3['allowed_types']= 'gif|jpg|png|jpeg';
          $config3['max_size']     = 5000;
          $config3['encrypt_name'] = true;
          $config3['file_name']=$id_panitia;

          $config4['upload_path']=$produkPath;
          $config4['allowed_types']= 'gif|jpg|png|jpeg';
          $config4['max_size']     = 5000;
          $config4['encrypt_name'] = true;
          $config4['file_name'] = $id_panitia;

          $this->load->library('upload',$config1);
          $this->upload->initialize($config1);

          if($this->upload->do_upload('images1')){
            $dataFile1=$this->upload->data();
            $dataFile=[
              'foto'=>$dataFile1['file_name'],       
            ];
            $this->db->where('panitia_id',$id);
           $this->db->update('panitia',$data + $dataFile);
           $this->session->set_flashdata('sukses','data berhasil diupdate');
         }
     }
      function getDataDetail($id){
      $this->db->where('panitia_id',$id);
      $query=$this->db->get('panitia');
      return $query->row();
     }

     //membuat konfirmasi status verifikasi data 
     public function konfirmasiStatus($id,$pesan){
      if($pesan==1){
        $this->db->set('status','1');
        if($this->db->update('panitia')){
          $pesan='Terverikasi';
        }
      }else if($pesan==2){
        $this->db->set('status','2');
        if($this->db->update('panitia')){
          $pesan='Ditolak';
        }else if($pesan==3){
          $this->db->set('status','3');
          if($this->db->update('panitia')){
            $pesan='Dibanned';
          }
        }
      } 
     }

     //membuat verifikasi jenis usaha lelang
     public function konfirmasiJenis(){
       $query="SELECT `pelelang`.jenis as id, `data_jenis`.`jenis` FROM  `pelelang` JOIN `data_jenis` ON `pelelang`.`jenis` = `data_jenis`.`id_jenis`";
       return $this->db->query($query)->row_array();
  }
  //memanggil id pada table pelelang
  public function getPelelangById($id){
    return $this->db->get_where('pelelang',['pelelang_id' => $id])->row_array();
  }
  //memanggil data jenis usaha pelelang
  public function getAllJenis(){
    return $this->db->get('data_jenis')->result_array();
  }
 
}