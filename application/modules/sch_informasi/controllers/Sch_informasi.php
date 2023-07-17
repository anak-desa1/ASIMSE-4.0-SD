<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sch_informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        $this->load->library('form_validation');
        $this->load->model('SchInformasi_m', 'sch');
    }

    // master_sekolah
    public function vaksin()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Sertifikat Vaksin';
        $data['home'] = 'Informasi';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['vaksin'] = $this->sch->getVaksin();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('sch_informasi/vaksin/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('sch_informasi/vaksin/vaksin_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('sch_informasi/vaksin/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('sch_informasi/vaksin/list_css');
        $this->load->view('sch_informasi/vaksin/vaksin_add', $data);
        $this->load->view('sch_informasi/vaksin/list_js');
    }

    function edit($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['vaksin'] = $this->db->get_where('m_vaksin', ['id_vaksin' => $id])->row_array();
        $this->load->view('sch_informasi/vaksin/list_css');
        $this->load->view('sch_informasi/vaksin/vaksin_edit', $data);
        $this->load->view('sch_informasi/vaksin/list_js');
    }

    public function simpan_tambah()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_tambah();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('sch_informasi/vaksin');
    }

    public function simpan_edit()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_edit();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('sch_informasi/vaksin');
    }

    public function deldata($id)
    {
        $data = ['id_vaksin' => $id];
        $this->db->delete('m_vaksin', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('sch_informasi/vaksin');
    }
    // end master_sekolah

    // kelulusan
    public function kelulusan()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Kelulusan';
        $data['home'] = 'Informasi';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['lulus'] = $this->sch->getKelulusan();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('sch_informasi/kelulusan/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('sch_informasi/kelulusan/kelulusan_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('sch_informasi/kelulusan/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah_lulus()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('sch_informasi/kelulusan/list_css');
        $this->load->view('sch_informasi/kelulusan/kelulusan_add', $data);
        $this->load->view('sch_informasi/kelulusan/list_js');
    }

    function edit_lulus($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['lulus'] = $this->db->get_where('m_lulus', ['lulus_id' => $id])->row_array();
        $this->load->view('sch_informasi/kelulusan/list_css');
        $this->load->view('sch_informasi/kelulusan/kelulusan_edit', $data);
        $this->load->view('sch_informasi/kelulusan/list_js');
    }

    public function simpan_lulus()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_lulus();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('sch_informasi/kelulusan');
    }

    public function simpan_editlulus()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_editlulus();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('sch_informasi/kelulusan');
    }

    public function dellulus($id)
    {
        $data = ['lulus_id' => $id];
        $this->db->delete('m_lulus', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('sch_informasi/kelulusan');
    }
    // end kelulusan

    // beasiswa
    public function beasiswa()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Beasiswa';
        $data['home'] = 'Informasi';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['beasiswa'] = $this->sch->getBeasiswa();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('sch_informasi/beasiswa/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('sch_informasi/beasiswa/beasiswa_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('sch_informasi/beasiswa/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah_beasiswa()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('sch_informasi/beasiswa/list_css');
        $this->load->view('sch_informasi/beasiswa/beasiswa_add', $data);
        $this->load->view('sch_informasi/beasiswa/list_js');
    }

    function edit_beasiswa($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['beasiswa'] = $this->db->get_where('m_beasiswa', ['beasiswa_id' => $id])->row_array();
        $this->load->view('sch_informasi/beasiswa/list_css');
        $this->load->view('sch_informasi/beasiswa/beasiswa_edit', $data);
        $this->load->view('sch_informasi/beasiswa/list_js');
    }

    public function simpan_beasiswa()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_beasiswa();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('sch_informasi/beasiswa');
    }

    public function simpan_editbeasiswa()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_editbeasiswa();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('sch_informasi/beasiswa');
    }

    public function delbeasiswa($id)
    {
        $data = ['beasiswa_id' => $id];
        $this->db->delete('m_beasiswa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('sch_informasi/beasiswa');
    }
    // end beasiswa

}
