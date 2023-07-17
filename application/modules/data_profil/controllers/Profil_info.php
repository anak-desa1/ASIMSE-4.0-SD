<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        $this->load->library('form_validation');
        $this->load->model('ProfilInfo_model', 'info');
    }

    public function index()
    {
        $this->form_validation->set_rules('text_info', 'Pengumuman', 'required');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Profil Info';
            $data['home'] = 'Profil';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sch'] = $this->info->get_info();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_profil/profil_info/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $id = $this->input->post('id');
            $cekh = $this->db->get_where('profil_info', ['id' => $id])->row_array();

            // var_dump($cekh);
            // die;
            $data =
                [
                    'text_info' => $this->input->post('text_info'),
                ];

            if ($cekh == 0) {
                $this->db->insert('profil_info', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Tambah Data !</div>');
                redirect('data_profil/profil_info');
            } else {
                $this->db->where('id', $id);
                $this->db->update('profil_info', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Ubah Data !</div>');
                redirect('data_profil/profil_info');
            }
        }
    }
}
