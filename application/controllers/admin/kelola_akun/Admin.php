<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_kelolaakun_admin');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        $this->user_access->cek_login();
        $this->user_access->cek_akses();
    }


    public function index()
    {
        $data['data'] = $this->M_kelolaakun_admin->getData();
        $data['user'] = $this->M_kelolaakun_admin->user_adminById($this->session->userid);
        $data['admin'] = $this->M_kelolaakun_admin->user_admin($this->session->userid);
        $this->load->view('admin/kelolaakun/admin/edit', $data);
    }


    public function admin_edit($id)
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msgInfo', '<div class="alert alert-danger" role="alert">
				<div class="alert-text">Anda belum mengisi apapun !</div>
			</div>');
            redirect('admin/kelola_akun/admin');
        } else {
            $data = array(
                'nama'              => $this->input->post('nama'),
                'telp'           => $this->input->post('telp')
            );

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				<div class="alert-text">Data Admin berhasil diubah !</div>
			</div>');
            $this->M_kelolaakun_admin->updateAdminById($data, $id);
            redirect('admin/kelola_akun/admin');
        }
    }


    public function deleteadmin($id)
    {
        $this->M_kelolaakun_admin->deleteAdmin($id);
        // ayra $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran dengan kode ' . $id . ' berhasil dihapus!</div>');
        // Akses Controller dikembalikan ke index
        redirect(site_url('admin/kelola_akun/admin'));
    }

    function detail()
    {
        $id     = $this->uri->segment(5);
        $data['row']   = $this->db->get_where('admin', array('userid' => $id))->row_array();
        $this->load->view('admin/detail.php', $data);
    }




    public function changepassword($id)
    {
        $data['admin'] = $this->db->get_where('admin', ['userid' == $id])->row_array();
        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[8]');

        if ($this->form_validation->run() == false) {
            // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Ubah Password/Kata sandi, Mohon Isi dengan Benar!</div>');
            redirect('admin/kelola_akun/admin/');
        } else {
            $current_password = md5($this->input->post('currentPassword'));
            $new_password = ($this->input->post('newPassword1'));
            $new_password2 = ($this->input->post('newPassword2'));
            if ($current_password != $data['admin']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Password lama salah!</div>');
                redirect('admin/kelola_akun/admin');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('admin/kelola_akun/admin');
                } else if ($new_password != $new_password2) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru harus sama dengan form ulangi password baru!</div>');
                    redirect('admin/kelola_akun/admin');
                } else {
                    //password ok
                    $password_hash = md5($new_password);
                    $this->db->set('password', $password_hash);
                    $this->db->where('userid', $id);
                    $this->db->update('admin');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password berhasil diganti!</div>');
                    redirect('admin/kelola_akun/admin');
                }
            }
        }
    }
}


    // public function index()
    // {
    //     $data['adminx'] = $this->M_kelolaakun_admin->getAllAdmin();
    //     $this->load->view('admin/kelolaakun/admin/index.php', $data);
    // }


    // 2 10.35
    // public function index()
    // {
    //     $id = $this->session->userdata('userid');
    //     $data['admin'] = $this->M_kelolaakun_admin->getAdminById($id);
    //     $data['nama'] = $this->db->get_where('admin', ['userid' => $id])->row_array();
    //     $data['role'] = $this->session->userdata('role');
    //     $data['title'] = 'Edit Profile';
    //     $this->form_validation->set_rules('nama', 'Nama', 'required');
    //     $this->form_validation->set_rules('telp', 'Nomor Telepon/HP', 'required');
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('admin/kelolaakun/admin/edit', $data);
    //     } else {
    //         $data = [
    //             'nama' => $this->input->post('nama'),
    //             'telp' => $this->input->post('telp'),
    //             'role' => $this->input->post('role')
    //         ];
    //         $this->db->where('userid', $id);
    //         $this->db->update('admin', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         Data Berhasil Diubah!
    //         </div>');
    //         redirect('account/editprofile');
    //     }
    // }

// function edit()
    // {
    //     $id = $this->uri->segment(5);
    //     $data['admin'] = $this->M_kelolaakun_admin->getAdminById($id);
    //     $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
    //     $this->form_validation->set_rules('telp', 'Nomor HP/Telepon', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('admin/kelolakun/admin/edit/', $data);

    //         // if (isset($_POST['submit'])) {
    //         //     $this->M_kelolaakun_admin->edit();
    //         //     $this->session->set_flashdata('success', 'Data Admin <strong>Berhasil</strong> Diubah!');
    //         //     redirect('admin/kelola_akun/admin/');
    //     } else {
    //         // $id = $this->uri->segment(5);
    //         // $data['row'] = $this->M_kelolaakun_admin->get($id)->row_array();
    //         // $this->load->view('admin/kelolaakun/admin/edit.php', $data);
    //         $data = [
    //             'nama' => $this->input->post('nama'),
    //             'telp' => $this->input->post('telp')
    //         ];
    //         $this->db->where('userid', $id);
    //         $this->db->update('admin', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         Data Berhasil Diubah!
    //         </div>');
    //         redirect('admin/kelola_akun/admin/' . $id);
    //     }
    // }
