<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model  
{
    //membuat function untuk menampilkan data produk lelang
 public function getDataLelang(){
        $query=$this->db->get('lelang');
        return $query->result();  
    }    
   public function getId(){
    $this->db->select('MAX(RIGHT(lelang_id,5)) as lelang_id',FALSE); 
      $this->db->from('lelang');
      $this->db->where('lelang_id !=','NULL');
      $query=$this->db->get();
      $kode=$query->row();
      $num=substr($kode->lelang_id,1,5);
      $add=(int)$num+1;
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
      $id_lelang='LL-'.date('Y').'-'.$kodebaru;

      return $id_lelang;
   }
    //membuat function untuk insert/tambah data product
   public function tambah(){
    // $insert=$this->db->insert('lelang',$data);
      $this->db->select('MAX(RIGHT(lelang_id,5)) as lelang_id',FALSE);
      $this->db->from('lelang');
      $this->db->where('lelang_id !=','NULL');
      $query=$this->db->get();
      $kode=$query->row();
      $num=substr($kode->lelang_id,1,5);
      $add=(int)$num+1;
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
      $id_lelang='LL-'.date('Y').'-'.$kodebaru; 
     
      $data=[
        // 'lelang_id'=>$id_lelang,
        'produk'          => $this->input->post('produk'),
        'deskripsi_produk'      => $this->input->post('deskripsi_produk'),
        'image1'            => $this->image1->data("file_name"),
            'image2'            => $this->image2->data("file_name"),
            'image3'            => $this->image3->data("file_name"),
            'image4'            => $this->image4->data("file_name"),
            'harga_awal'        => $this->input->post('harga_awal'),
            'harga_minimal_diterima'  => $this->input->post('harga_minimal_diterima'),
            'incremental_value'     => $this->input->post('increment_value'),
            'tgl_mulai'         => $this->input->post('tgl_mulai'),
            'tgl_selesai'       => $this->input->post('tgl_selesai'),
            'harga_beli_sekarang'   => $this->input->post('harga_beli_sekarang'),
            'jumlah'            =>$this->input->post('jumlah'),
            'keterangan'        =>$this->input->post('keterangan'),
            'status'            =>0
      ];

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

          $produkPath=APPPATH.'../vendors/uploads/produk';

          $config1['upload_path']=$produkPath;
          $config1['allowed_types']= 'gif|jpg|png|jpeg';
          $config1['max_size']     = 5000;
          $config1['encrypt_name'] = true;
          $config1['file_name']=$id_lelang;

          $config2['upload_path']=$produkPath;
          $config2['allowed_types']= 'gif|jpg|png|jpeg';
          $config2['max_size']     = 5000;
          $config2['encrypt_name'] = true;
          $config2['file_name']=$id_lelang;

          $config3['upload_path']=$produkPath;
          $config3['allowed_types']= 'gif|jpg|png|jpeg';
          $config3['max_size']     = 5000;
          $config3['encrypt_name'] = true;
          $config3['file_name']=$id_lelang;

          $config4['upload_path']=$produkPath;
          $config4['allowed_types']= 'gif|jpg|png|jpeg';
          $config4['max_size']     = 5000;
          $config4['encrypt_name'] = true;
          $config4['file_name'] = $id_lelang;

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
                $this->upload->initialize($config4);
                if($this->upload->do_upload('images4')){
                  $dataFile4=$this->upload->data();
                  $dataFile=[
                    'image1'=>$dataFile1['file_name'],
                    'image2'=>$dataFile2['file_name'],
                    'image3'=>$dataFile3['file_name'],
                    'image4'=>$dataFile4['file_name']
                  ];
                  $this->db->insert('lelang',$dataFile + $data);
           }

         }
       }
           
     }
   }
    

   //membuat method function untuk bisa mengambil data agar diupdate
   function getDataDetail($id){
    $this->db->where('lelang_id',$id);
    $query=$this->db->get('lelang');
    return $query->row();
   }
   
   //membuat function untuk update data
   function updateDataProduk($id,$data){
    $this->db->select('MAX(RIGHT(lelang_id,5)) as lelang_id',FALSE);
      $this->db->from('lelang');
      $this->db->where('lelang_id !=','NULL');
      $query=$this->db->get();
      $kode=$query->row();
      $num=substr($kode->lelang_id,1,5);
      $add=(int)$num+1;
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
      $id_lelang='LL-'.date('Y').'-'.$kodebaru;
     $data=[
        'lelang_id'=>$id_lelang,
       'produk'         => $this->input->post('produk'),
          'deskripsi_produk'      => $this->input->post('deskripsi_produk'),
          'image1'            => $this->image1->data("file_name"),
          'image2'            => $this->image2->data("file_name"),
          'image3'            => $this->image3->data("file_name"),
          'image4'            => $this->image4->data("file_name"),
          'harga_awal'        => $this->input->post('harga_awal'),
          'harga_minimal_diterima'  => $this->input->post('harga_minimal_diterima'),
          'incremental_value'     => $this->input->post('increment_value'),
          'tgl_mulai'         => $this->input->post('tgl_mulai'),
          'tgl_selesai'       => $this->input->post('tgl_selesai'),
          'harga_beli_sekarang'   => $this->input->post('harga_beli_sekarang'),
          'jumlah'            =>$this->input->post('jumlah'),
          'keterangan'        =>$this->input->post('keterangan')

      ];
       $this->db->where('lelang_id',$id);
       $this->db->update('lelang',$data);
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

          $produkPath=APPPATH.'../vendors/uploads/produk';

          $config1['upload_path']=$produkPath;
          $config1['allowed_types']= 'gif|jpg|png|jpeg';
          $config1['max_size']     = 5000;
          $config1['encrypt_name'] = true;
          $config1['file_name']=$id_lelang;

          $config2['upload_path']=$produkPath;
          $config2['allowed_types']= 'gif|jpg|png|jpeg';
          $config2['max_size']     = 5000;
          $config2['encrypt_name'] = true;
          $config2['file_name']=$id_lelang;

          $config3['upload_path']=$produkPath;
          $config3['allowed_types']= 'gif|jpg|png|jpeg';
          $config3['max_size']     = 5000;
          $config3['encrypt_name'] = true;
          $config3['file_name']=$id_lelang;

          $config4['upload_path']=$produkPath;
          $config4['allowed_types']= 'gif|jpg|png|jpeg';
          $config4['max_size']     = 5000;
          $config4['encrypt_name'] = true;
          $config4['file_name'] = $id_lelang;

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
                $this->upload->initialize($config4);
                if($this->upload->do_upload('images4')){
                  $dataFile4=$this->upload->data(); 
                  $dataFile=[
                    'image1'=>$dataFile1['file_name'],
                    'image2'=>$dataFile2['file_name'],
                    'image3'=>$dataFile3['file_name'],
                    'image4'=>$dataFile4['file_name']
                  ];
                   $this->db->where('lelang_id',$id);
                  $this->db->update('lelang',$data + $dataFile);
                  $this->session->set_flashdata('sukses','data berhasil diupdate');
           }

         }
       }
           
     }
   
   }

   //mengubah status produk lelang
   public function konfirmasiProduk($id_lelang,$pesan){
    if($pesan==1){
      $this->db->set('status','1');
    }
    $this->db->where('lelang_id',$id_lelang);

    if($this->db->update('lelang')){
      $pesan="Data Produk berhasil dikonfirmasi";
    }else{
      $pesan="Gagal Terkonfirmasi";
    }
   }

   //membuat function untuk hapus data
   function deleteDataProduk($id){
    $this->db->where('lelang_id',$id);
    $this->db->delete('lelang');
   }
}
