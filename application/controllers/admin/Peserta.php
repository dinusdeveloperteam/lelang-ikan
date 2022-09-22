<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Kelolapeserta_model');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        $this->user_access->cek_login();
        $this->user_access->cek_akses();
    }

    public function index()
    {
        $data['peserta'] = $this->Kelolapeserta_model->getAllKelola();
        $this->load->view('admin/peserta/index.php', $data);
    }

    public function deletepeserta($id)
    {
        $this->Kelolapeserta_model->deletePeserta($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Peserta dengan kode ' . $id . ' berhasil dihapus!</div>');
        // Akses Controller dikembalikan ke index
        redirect(site_url('admin/peserta'));
    }

    function detail()
    {
        $id     = $this->uri->segment(4);
        $data['row']   = $this->db->get_where('peserta', array('peserta_id' => $id))->row_array();
        $this->load->view('admin/peserta/detail.php', $data);
    }

    // NEW 20.21 19 Sep 2022
    // edit old
    function edit()
    {
        if (isset($_POST['submit'])) {
            $this->Kelolapeserta_model->edit();
            $this->session->set_flashdata('success', 'Peserta Lelang <strong>Berhasil</strong> Diubah!');
            redirect('admin/peserta/');
        } else {
            $id = $this->uri->segment(4);
            $data['row'] = $this->Kelolapeserta_model->get($id)->row_array();
            $this->load->view('admin/peserta/edit.php', $data);
        }
    }

    // OPSI 2
    // public function edit($id)
    // {
    //     $this->form_validation->set_rules('nama', 'nama', 'required');
    //     if ($this->form_validation->run() == FALSE) {
    //         $id = $this->uri->segment(4);
    //         $data['row']    = $this->db->query('select * from peserta where peserta_id = "' . $id . '"')->row_array();
    //         $this->load->view('admin/peserta/edit', $data);
    //     } else {
    //         $data = array(
    //             'nama'          => $this->input->post('nama'),
    //             'jeniskel'      => $this->input->post('jeniskelamin'),
    //             'provinsi'      => $this->input->post('provinsi'),
    //             'kota'          => $this->input->post('kota'),
    //             'kecamatan'     => $this->input->post('kecamatan'),
    //             'kelurahan'     => $this->input->post('kelurahan'),
    //             'alamat'        => $this->input->post('alamat'),
    //             'telp'          => $this->input->post('notelp'),
    //             'email'         => $this->input->post('email'),
    //             'nik'           => $this->input->post('nik'),
    //             'npwp'          => $this->input->post('npwp'),
    //             'deposit'       => $this->input->post('deposit'),
    //             'status'        => $this->input->post('status')
    //         );

    //         $peserta_id = array('peserta_id' => $id);
    //         $sql       = $this->db->query('select * from peserta where peserta_id="' . $id . '"')->row();
    //         unlink('/vendors/images/peserta' . $sql->logo_title);
    //         unlink('/vendors/images/peserta' . $sql->logo_website);

    //         $this->db->where($peserta_id);
    //         $this->db->update('peserta', $data);

    //         redirect('admin/peserta/');
    //     }

    // ME Morning 7.57 AM
    // public function edit($id)
    // {
    //     $this->form_validation->set_rules('nama', 'nama', 'required');
    //     if ($this->form_validation->run() == FALSE) {
    //         $id = $this->uri->segment(4);
    //         $data['row']    = $this->db->query('select * from peserta where peserta_id = "' . $id . '"')->row_array();
    //         $this->load->view('admin/peserta/edit', $data);
    //     } else {
    //         $config = array();

    //         $config['upload_path'] = './vendors/images/peserta';
    //         $config['allowed_types'] = 'jpg|png|jpeg';
    //         $config['file_name']    = 'filektp-' . date('d-m-Y') . '/' . time();

    //         $this->load->library('upload', $config, 'filektp');
    //         $this->filektp->initialize($config);
    //         $upload_filektp = $this->filektp->do_upload('filektp');

    //         $config['upload_path'] = './vendors/images/peserta';
    //         $config['allowed_types'] = 'jpg|png|jpeg';
    //         $config['file_name']    = 'filenpwp-' . date('d-m-Y') . '/' . time();

    //         $this->load->library('upload', $config, 'filenpwp');
    //         $this->filenpwp->initialize($config);
    //         $upload_filenpwp = $this->filenpwp->do_upload('filenpwp');

    //         if ($upload_filektp && $upload_filenpwp) {

    //             $data = array(
    //                 'nama'          => $this->input->post('nama'),
    //                 'jeniskel'      => $this->input->post('jeniskelamin'),
    //                 'provinsi'      => $this->input->post('provinsi'),
    //                 'kota'          => $this->input->post('kota'),
    //                 'kecamatan'     => $this->input->post('kecamatan'),
    //                 'kelurahan'     => $this->input->post('kelurahan'),
    //                 'alamat'        => $this->input->post('alamat'),
    //                 'telp'          => $this->input->post('notelp'),
    //                 'email'         => $this->input->post('email'),
    //                 'nik'           => $this->input->post('nik'),
    //                 'npwp'          => $this->input->post('npwp'),
    //                 'deposit'       => $this->input->post('deposit'),
    //                 'filektp'       => $this->filektp->data("file_name"),
    //                 'filenpwp'      => $this->filenpwp->data("file_name"),
    //                 'status'        => $this->input->post('status')
    //             );

    //             $peserta_id = array('peserta_id' => $id);
    //             $sql       = $this->db->query('select * from peserta where peserta_id="' . $id . '"')->row();
    //             unlink('/vendors/images/peserta' . $sql->logo_title);
    //             unlink('/vendors/images/peserta' . $sql->logo_website);

    //             $this->db->where($peserta_id);
    //             $this->db->update('peserta', $data);

    //             redirect('admin/peserta/');
    //         } else {
    //             redirect('admin/peserta/edit/' . $id);
    //         }
    //     }
    // }






    // edit new
    // public function edit()
    // {
    //     // $data['order'] = $this->transaksi->getOrderById($id);

    //     $id = $this->uri->segment(4);
    //     $data['id'] = $id;
    //     $data['row'] = $this->Kelolapeserta_model->get($id)->row_array();
    //     $this->form_validation->set_rules('status_pemeriksaan', 'Status Order', 'required');
    //     // $this->form_validation->set_rules('bukti', 'Bukti Transfer Penarikan', 'required');
    //     if ($this->form_validation->run() == false) {
    //         $id = $this->uri->segment(4);
    //         $data['row'] = $this->Kelolapeserta_model->get($id)->row_array();
    //         $this->load->view('admin/peserta/edit.php', $data);
    //     } else {
    //         $data = [
    //             'nama' => $this->input->post('nama'),
    //             'nik' => $this->input->post('nik'),
    //             'jeniskel' => $this->input->post('jeniskel'),
    //             'provinsi' => $this->input->post('provinsi'),
    //             'kota' => $this->input->post('kota'),
    //             'kecamatan' => $this->input->post('kecamatan'),
    //             'kelurahan' => $this->input->post('kelurahan'),
    //             'alamat' => $this->input->post('alamat'),
    //             'telp' => $this->input->post('telp'),
    //             'email' => $this->input->post('email'),
    //             'npwp' => $this->input->post('npwp')

    //         ];
    //         $this->db->where('peserta_id', $id);
    //         $this->db->update('peserta', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         Data Berhasil Diubah!
    //         </div>');
    //         redirect('admin/peserta/edit.php' . $id);

    //         // $this->db->set('nik', $this->input->post('nik', true));
    //         // $this->db->set('nama', $this->input->post('nama', true));
    //         // $this->db->set('jeniskel', $this->input->post('jeniskel', true));
    //         // $this->db->set('provinsi', $this->input->post('provinsi', true));
    //         // $this->db->set('kota', $this->input->post('kota', true));
    //         // $this->db->set('kecamatan', $this->input->post('kecamatan', true));
    //         // $this->db->set('kelurahan', $this->input->post('kelurahan', true));
    //         // $this->db->set('alamat', $this->input->post('alamat', true));
    //         // $this->db->set('telp', $this->input->post('telp', true));
    //         // $this->db->set('email', $this->input->post('email', true));
    //         // $this->db->set('npwp', $this->input->post('npwp', true));
    //         // $this->db->where('peserta_id', $id);
    //         // $this->db->update('peserta');
    //         // $this->session->set_flashdata('success', 'Pembukaan Lelang <strong>Berhasil</strong> Diubah!');
    //         // redirect('admin/peserta/');
    //     }
    // }

    public function tambah_peserta()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('username', 'username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]');

        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('nik', 'nik');

        if ($this->form_validation->run($this) == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Tambah Peserta, Mohon Isi dengan Benar!</div>');
            $this->load->view('admin/peserta/tambah');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->Kelolapeserta_model->register_peserta($enc_password);

            // Set message
            $this->session->set_flashdata('success', 'Peserta Lelang <strong>Berhasil</strong> Ditambah!');
            redirect('admin/peserta/');
        }
    }

    public function check_username_exists($username)
    {
        $query = $this->db->get_where('peserta', array('username' => $username));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function check_email_exists($email)
    {
        $query = $this->db->get_where('peserta', array('email' => $email));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['peserta'] = $this->Kelolapeserta_model->getData();
        $this->load->view('admin/peserta/laporanpeserta_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_peserta.pdf", array('Attachment' => 0));
    }
}
