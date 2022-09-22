<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingAccount_Model extends CI_Model
{ 
    //mengambil data dari database 
    public function getData(){
         $query=$this->db->get('pelelang');
        return $query->result();  
    }

    //untuk mendapatkan id pelelang
    public function get_id(){
         $this->db->select('MAX(RIGHT(pelelang_id,5)) as pelelang_id',FALSE);
     $this->db->from('pelelang');
     $this->db->where('pelelang_id !=','NULL');
     $query=$this->db->get();
     $kode=$query->row();
     $num=substr($kode->peserta_id,1,5);
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
      $id_pelelang='PL-'.date('Y').'-'.$kodebaru;

      return $id_pelelang;
    }
     public function editData($id,$data){
     $this->db->select('MAX(RIGHT(pelelang_id,5)) as pelelang_id',FALSE);
     $this->db->from('pelelang');
     $this->db->where('pelelang_id !=','NULL');
     $query=$this->db->get();
     $kode=$query->row();
     $num=substr($kode->peserta_id,1,5);
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
      $id_pelelang='PL-'.date('Y').'-'.$kodebaru;

      $data=[
        'pelelang_id'       =>'PL-' .date('Y').'-'.$id_pelelang,
          'nama'            => $this->input->post('nama'),
          'username'          => $this->input->post('username'),
          'email'           =>$this->input->post('email'),
          'alamat'            => $this->input->post('alamat'),
          'telp'            => $this->input->post('telp'),
          'jenis'           => $this->input->post('jenis'),
          'provinsi'          =>$this->input->post('provinsi'),
          'kota'            =>$this->input->post('kota'),
          'kecamatan'         =>$this->input->post('kecamatan'),
          'kelurahan'         =>$this->input->post('kelurahan'),
          'filektp'           => $this->image1->data("file_name"),
          'filenpwp'            => $this->image2->data("file_name"),
          'fileSIUP'            => $this->image3->data("file_name"),
          'norekening'        =>$this->input->post('norekening'),
          'bank'              =>$this->input->post('bank'),
          'atasnama'          =>$this->input->post('atasnama'),
          // 'status'            => $this->input->post('status'),
          'deskripsi'         =>$this->input->post('deskripsi')
      ];
       $this->db->where('pelelang_id',$id);
       $this->db->update('pelelang',$data);
        // $this->db->insert('lelang',$data);

          $_FILES['images1']['name']=$_FILES['images1']['name'];
          $_FILES['images1']['type'] = $_FILES['images1']['type'];
          $_FILES['images1']['tmp_name'] = $_FILES['images1']['tmp_name'];
          $_FILES['images1']['error'] = $_FILES['images1']['error'];
          $_FILES['images1']['size'] = $_FILES['images1']['size'];

          $_FILES['images2']['name']=$_FILES['images2']['name'];
          $_FILES['images2']['type'] = $_FILES['images2']['type'];
          $_FILES['images2']['tmp_name'] = $_FILES['images2']['tmp_name'];
          $_FILES['images2']['error'] = $_FILES['images2']['error'];
          $_FILES['images2']['size'] = $_FILES['images2']['size'];

          $_FILES['images3']['name']=$_FILES['images3']['name'];
          $_FILES['images3']['type'] = $_FILES['images3']['type'];
          $_FILES['images3']['tmp_name'] = $_FILES['images3']['tmp_name'];
          $_FILES['images3']['error'] = $_FILES['images3']['error'];
          $_FILES['images3']['size'] = $_FILES['images3']['size'];

          $_FILES['images4']['name']=$_FILES['images4']['name'];
          $_FILES['images4']['type'] = $_FILES['images4']['type'];
          $_FILES['images4']['tmp_name'] = $_FILES['images4']['tmp_name'];
          $_FILES['images4']['error'] = $_FILES['images4']['error'];
          $_FILES['images4']['size'] = $_FILES['images4']['size'];

          $produkPath=APPPATH.'../assets/uploads/pelelang';

          $config1['upload_path']=$produkPath;
          $config1['allowed_types']= 'gif|jpg|png|jpeg';
          $config1['max_size']     = 5000;
          $config1['encrypt_name'] = true;
          $config1['file_name']=$id_pelelang;

          $config2['upload_path']=$produkPath;
          $config2['allowed_types']= 'gif|jpg|png|jpeg';
          $config2['max_size']     = 5000;
          $config2['encrypt_name'] = true;
          $config2['file_name']=$id_pelelang;

          $config3['upload_path']=$produkPath;
          $config3['allowed_types']= 'gif|jpg|png|jpeg';
          $config3['max_size']     = 5000;
          $config3['encrypt_name'] = true;
          $config3['file_name']=$id_pelelang;

          $config4['upload_path']=$produkPath;
          $config4['allowed_types']= 'gif|jpg|png|jpeg';
          $config4['max_size']     = 5000;
          $config4['encrypt_name'] = true;
          $config4['file_name'] = $id_pelelang;

          $this->load->library('upload',$config1);
          $this->upload->initialize($config1);

          if($this->upload->do_upload('images1')){
            $dataFile1=$this->upload->data();
            $this->upload->initialize($config2);
            if($this->upload->do_upload('images2')){
              $dataFile2=$this->upload->data();
              $this->upload->initialize($config3);
              if($this->upload->do_upload('images3')){
                $dataFile3=$this->upload->data();
                  $dataFile=[
                    'filektp'=>$dataFile1['file_name'],
                    'filenpwp'=>$dataFile2['file_name'],
                    'fileSIUP'=>$dataFile3['file_name']
                  ];
                   $this->db->where('pelelang_id',$id);
                  $this->db->update('pelelang',$data + $dataFile);
                  $this->session->set_flashdata('sukses','data berhasil diupdate');
               }
            }
           
         }
     }
      function getDataDetail($id){
      $this->db->where('pelelang_id',$id);
      $query=$this->db->get('pelelang');
      return $query->row();
     }

     //membuat konfirmasi status verifikasi data 
     public function konfirmasiStatus($id,$pesan){
      if($pesan==1){
        $this->db->set('status','1');
        if($this->db->update('pelelang')){
          $pesan='Terverikasi';
        }
      }else if($pesan==2){
        $this->db->set('status','2');
        if($this->db->update('pelelang')){
          $pesan='Ditolak';
        }else if($pesan==3){
          $this->db->set('status','3');
          if($this->db->update('pelelang')){
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