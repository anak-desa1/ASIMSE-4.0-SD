<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Pegawai_model', 'pegawai');
    }

    public function profil()
    {
        $this->form_validation->set_rules('nama_pegawai', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Profil';
            $data['home'] = 'My Profil';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->pegawai->sekolah();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('pegawai_profil/profile/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
            $email_pegawai = $this->input->post('email_pegawai');
            $nama_pegawai = $this->input->post('nama_pegawai');

            $upload_gambar = $_FILES['img']['name'];
            // var_dump($upload_gambar);
            // die;
            if ($upload_gambar) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './panel/assets/img/profil-user/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('img')) {

                    $old_img = $this->input->post('old_image');
                    // var_dump($old_img);
                    // die;
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'panel/assets/img/profil-user/' . $old_img);
                    }
                    $new_img =  $this->upload->data('file_name');
                    $this->db->set('img', $new_img);
                } else {
                    echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                }
            }

            $this->db->set('nama_pegawai', $nama_pegawai);
            $this->db->where('email_pegawai', $email_pegawai);
            $this->db->update('pegawai');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Ubah Data ! </div>');
            redirect('pegawai_profil/pegawai/profil');
        }
    }

    public function password()
    {
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'password too short! '
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $email_pegawai = $this->input->post('email_pegawai');

        $this->db->set("password", $password);
        $this->db->where('email_pegawai', $email_pegawai);
        $this->db->update('pegawai');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Ubah Password ! </div>');
        redirect('pegawai_profil/pegawai/profil');
    }
}
