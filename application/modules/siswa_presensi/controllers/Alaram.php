<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alaram extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Rekap_model', 'ion_auth');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Alaram Sekolah';
            $data['home'] = 'Presensi Siswa';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;

            // $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            // $data['tasm'] = $get_tasm['tahun'];
            // $data['ta'] = substr($data['tasm'], 0, 4);
            // $ta = substr($data['tasm'], 0, 4);

            $data['tampil'] = $this->ion_auth->get_tampil();
            // $data['siswa'] = $this->ion_auth->get_siswarombel();
            $data['kelas'] = $this->ion_auth->get_siswarombel();

            $this->load->view('layout/header-top', $data);
            $this->load->view('siswa_presensi/alaram/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('siswa_presensi/alaram/alaram_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('siswa_presensi/alaram/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_alaram()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('siswa_presensi/alaram/list_css');
        $this->load->view('siswa_presensi/alaram/alaram_add', $data);
        $this->load->view('siswa_presensi/alaram/list_js');
    }

    function edit_alaram($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['lulus'] = $this->db->get_where('m_lulus', ['lulus_id' => $id])->row_array();
        $this->load->view('siswa_presensi/alaram/list_css');
        $this->load->view('siswa_presensi/alaram/alaram_edit', $data);
        $this->load->view('siswa_presensi/alaram/list_js');
    }

    public function simpan_alaram()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_lulus();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('siswa_presensi/alaram');
    }    

    public function simpan_editalaram()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_editlulus();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('siswa_presensi/alaram');
    }

    public function delalaram($id)
    {
        $data = ['lulus_id' => $id];
        $this->db->delete('m_lulus', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('siswa_presensi/alaram');
    }
}
