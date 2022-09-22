<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    //function untuk mengambil lelang id
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

    //function untuk mengambil id peserta
    public function getIdPeserta(){
        $this->db->select('MAX(RIGHT(peserta_id,5)) as peserta_id',FALSE); 
          $this->db->from('peserta');
          $this->db->where('peserta_id !=','NULL');
          $query=$this->db->get();
          $kode=$query->row();
          $num=substr($kode->peserta_id,1,5);
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
          $id_peserta='PS-'.date('Y').'-'.$kodebaru;
    
          return $id_peserta;
       }

    public function getAll()
    {

        //return $this->db->get($this->_table)->result();
        return $this->db->get('lelang')->result();
    }

    public function getPesertaById($peserta_id){
        return $this->db->get_where('peserta', ['peserta_id' => $peserta_id])->row_array();
    }

    public function getAllData($limit, $start)
    {
        //return $this->db->get($this->_table, $limit, $start)->result();
        return $this->db->get('lelang', $limit, $start)->result();
    }

    public function countAllData()
    {
        //return $this->db->get($this->_table)->num_rows();
        return $this->db->get('lelang')->num_rows();
    }

    public function getById($id)
    {

        //return $this->db->get_where($this->_table, ["lelang_id" => $id])->row();
        return $this->db->get_where('lelang', ["lelang_id" => $id])->row();
    }

    public function getLelangById($id)
    {
        return $this->db->get_where('lelang', ['lelang_id' => $id])->row_array();
    }
    //menampilkan data lelang pemenang
    public function getDataTawar($id){
        
    	$query = "SELECT peserta.nama, lelang_bid.harga_tawar FROM peserta JOIN lelang_bid ON peserta.peserta_id=lelang_bid.peserta_id  AND lelang_id='".$id."' ORDER BY lelang_bid.harga_tawar DESC";
        // $this->db->order_by('lelang_bid.harga_tawar','desc');
        return $this->db->query($query)->result_array();

    }

    //menampilkan data peserta
    public function getAllPeserta(){
        return $this->db->get('peserta')->result();
    }

    public function getUserPassPeserta($username, $password)
    {
        //cek user penjual
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        return $this->db->get();
    }

    public function register_peserta($enc_password){
   
        // User data array
        $this->db->select('MAX(RIGHT(peserta_id,5)) as peserta_id',FALSE);
        $this->db->from('peserta');
        $this->db->where('peserta_id !=','NULL');
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
        $data = array(
            'peserta_id' => 'PSY-' .date('Y').'-'.$kodebaru,
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'status'    => 0
        );
        
   
        // Insert user
        return $this->db->insert('peserta', $data);
    }

    public function getTestimoni($id)
    {
        $query = "select * from lelang,lelang_pemenang,peserta where lelang.lelang_id=lelang_pemenang.lelang_id and lelang_pemenang.peserta_id=peserta.peserta_id and lelang.lelang_id = '". $id ."'";
        return $this->db->query($query)->result_array();
    }

    public function getDeposit($id)
    {
        $query = "select peserta.nama,peserta_deposit.nominal_deposit,peserta_deposit.tgl_deposit,peserta_deposit.keterangan,peserta_deposit.status from peserta,peserta_deposit where peserta.peserta_id=peserta_deposit.peserta_id and peserta.peserta_id = '". $id ."'";
        return $this->db->query($query)->result_array();
    }

    public function getRiwayatBid($id)
    {
        $query = "select * from lelang,lelang_bid,peserta where lelang.lelang_id=lelang_bid.lelang_id and lelang_bid.peserta_id=peserta.peserta_id and peserta.peserta_id = '". $id ."' ORDER BY lelang_bid.tgl_bid DESC";
        return $this->db->query($query)->result_array();
    }

    public function getTransaksi($id)
    {
        $query = "SELECT lp.peserta_id,l.lelang_id,produk,lp.total_bayar,deskripsi_produk,image1,tgl_diumumkan from lelang l,lelang_pemenang lp,lelang_bid lb WHERE l.lelang_id=lp.lelang_id and l.lelang_id=lb.lelang_id and lb.lelang_id=lp.lelang_id and lb.peserta_id=lp.peserta_id and lb.harga_tawar=lp.total_bayar and lp.peserta_id='".$id."'";
        return $this->db->query($query)->result_array();
    }
    public function getTransaksiById($id)
    {
        $query = "SELECT lp.peserta_id,l.lelang_id,produk,lp.total_bayar,deskripsi_produk,image1,tgl_diumumkan from lelang l,lelang_pemenang lp,lelang_bid lb WHERE l.lelang_id=lp.lelang_id and l.lelang_id=lb.lelang_id and lb.lelang_id=lp.lelang_id and lb.peserta_id=lp.peserta_id and lb.harga_tawar=lp.total_bayar and lp.peserta_id='".$id."'";
        return $this->db->query($query)->row_array();
    }

    public function getSubtotal($id)
    {
        $query = "SELECT peserta_id,sum(total_bayar)as subtotal from lelang_pemenang lp where peserta_id='".$id."'";
        return $this->db->query($query)->row_array();
    }

    public function getPengiriman($id)
    {
        $query = "SELECT lp.lelang_id, lp.pelelang_id,lp.nama_pengirim,lp.no_polisi,lp.nama_kendaraan,lp.no_hp,lp.status_transaksi from lelang_pengiriman lp";
        return $this->db->query($query)->row_array();
    }

    //function insert harga tawar peserta
    public function insertTawar(){
        $data=[
            'harga_tawar'=>$this->input->post('tawar')
        ];
        $this->db->insert('lelang_bid',$data);
    }

    public function tawarLelang($id_lelang)
    {
        // $id_peserta=$this->home->getIdPeserta();
        $data=[
            'lelang_id'=>$id_lelang,
            'peserta_id'=>$this->session->userdata('peserta_id'),
            'tgl_bid'=>date('Y-m-d H:i:s'),
            'harga_tawar'=>$this->input->post('tawar')
        ];
        $this->db->insert('lelang_bid', $data);
        var_dump($this->db->last_query());
        
        redirect('barang/detail/'.$id_lelang);
    }
    //untuk mengambil id lelang
    function getDataDetail($id){
        $this->db->where('lelang_id',$id);
        $query=$this->db->get('lelang');
        return $query->row();
    }

    //untuk mengambil id peserta
    function getDataDetailPeserta($id){
        $this->db->where('peserta_id',$id);
        $query=$this->db->get('peserta');
        return $query->row();
    }

    function update($id)
    {
        $data = array(
            'nama'     => $this->input->post('nama'),
            'jeniskel'   => $this->input->post('jeniskelamin'),
            'provinsi'     => $this->input->post('provinsi'),
            'kota'   => $this->input->post('kota'),
            'kecamatan'   => $this->input->post('kecamatan'),
            'kelurahan'     => $this->input->post('kelurahan'),
            'alamat'   => $this->input->post('alamat'),
            'telp'   => $this->input->post('notelp'),
            'email'     => $this->input->post('email'),
            'nik'   => $this->input->post('nik'),
            // 'filektp'   => $this->filektp->data("file_name"),
            // 'filenpwp'   => $this->filenpwp->data('filenpwp'),
            'npwp'   => $this->input->post('npwp'),
            'deposit'     => $this->input->post('deposit'),
            'username'     => $this->input->post('username'),
            'status'   => $this->input->post('status')
        );
        $this->db->where('peserta_id', $this->input->post('peserta_id'));
        $this->db->update('peserta', $data);
    }

    
    function deposit($id)
    {
        $data = array(
            // 'nama'     => $this->input->post('nama'),
            'peserta_id' => $id,
            'nominal_deposit'     => $this->input->post('nominal_deposit'),
            'tgl_deposit'   => date('Y-m-d'),
            //'bukti_pembayaran'   => $this->bukti_pembayaran->data("file_name"),
            'keterangan'     => $this->input->post('keterangan'),
            'status'   => $this->input->post('status')
        );
        $this->db->where('peserta_id', $this->input->post('peserta_id'));
        $this->db->insert('peserta_deposit', $data);
    }
    
    function alamat_kirim($id)
    {
        $data = array(
            'alamat_kirim'     => $this->input->post('alamat_kirim'),
            'provinsi_kirim'   => $this->input->post('provinsi_kirim'),
            'kota_kirim'     => $this->input->post('kota_kirim'),
            'kecamatan_kirim'   => $this->input->post('kecamatan_kirim'),
            'kelurahan_kirim'     => $this->input->post('kelurahan_kirim')
        );
        $this->db->where('lelang_id', $id);
        $this->db->update('lelang_pemenang', $data);
    }

    function getLelangPemenang($id)
    {
        $this->db->select('*');
        $this->db->where('lelang_id', $id);
        $query=$this->db->get('lelang_pemenang');
        return $query->row_array();
    }

    function bayar($id)
    {
        $data = array(
            // 'nama'     => $this->input->post('nama'),
            'lelang_id' => $id,
            'nominal_dibayarkan'     => $this->input->post('nominal'),
            'tgl_pembayaran'   => date('Y-m-d')
            //'bukti_pembayaran'   => $this->bukti_pembayaran->data("file_name"),
        );
        $this->db->insert('lelang_pembayaran', $data);
    }
}
