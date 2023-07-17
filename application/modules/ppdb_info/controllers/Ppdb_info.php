<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb_info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        $this->load->library('form_validation');
        $this->load->model('PpdbInfo_m', 'psb');
    }

    // Data kontak
    public function data_kontak()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Data Kontak';
        $data['home'] = 'PPDB Info';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kontak'] = $this->psb->getDataKontak();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_info/data_kontak/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_info/data_kontak/data_kontak_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_info/data_kontak/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['title'] = 'Info Kademik';
        $data['home'] = 'Akademik';
        $data['subtitle'] = $data['title'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('ppdb_info/data_kontak/list_css');
        $this->load->view('ppdb_info/data_kontak/data_kontak_add', $data);
        $this->load->view('ppdb_info/data_kontak/list_js');
    }

    function edit($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['title'] = 'Info Kademik';
        $data['home'] = 'PPDB Info';
        $data['subtitle'] = $data['title'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kontak'] = $this->psb->getEditKontak($id);
        $this->load->view('ppdb_info/data_kontak/list_css');
        $this->load->view('ppdb_info/data_kontak/data_kontak_edit', $data);
        $this->load->view('ppdb_info/data_kontak/list_js');
    }

    public function simpan_tambah()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_tambah();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('ppdb_info/data_kontak');
    }

    public function simpan_edit()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_edit();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('ppdb_info/data_kontak');
    }

    public function deldata($id)
    {
        $data = ['id_kontak' => $id];
        $this->db->delete('ppdb_kontak', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('ppdb_info/data_kontak');
    }
    // end Data kontak

    // info_pembayaran
    public function info_pembayaran()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Info Pembayaran';
        $data['home'] = 'PPDB Info';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['infobayar'] = $this->psb->getInfo();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_info/info_pembayaran/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_info/info_pembayaran/info_pembayaran_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_info/info_pembayaran/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function simpan_info_pembayaran()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_info_pembayaran();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('ppdb_info/info_pembayaran');
    }
    // end info_pembayaran

    // info_persyaratan
    public function info_persyaratan()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Info Persyaratan';
        $data['home'] = 'PPDB Info';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['syarat'] = $this->psb->getInfo();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_info/info_persyaratan/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_info/info_persyaratan/info_persyaratan_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_info/info_persyaratan/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function simpan_info_persyaratan()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_info_persyaratan();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('ppdb_info/info_persyaratan');
    }
    // end info_persyaratan

    // data_pengumuman
    public function data_pengumuman()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Data Pengumuman';
        $data['home'] = 'PPDB Info';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['pengumuman'] = $this->psb->getDataPengumuman();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_info/data_pengumuman/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_info/data_pengumuman/data_pengumuman_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_info/data_pengumuman/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah_pengumuman()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['title'] = 'Info Kademik';
        $data['home'] = 'PPDB Info';
        $data['subtitle'] = $data['title'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('ppdb_info/data_pengumuman/list_css');
        $this->load->view('ppdb_info/data_pengumuman/data_pengumuman_add', $data);
        $this->load->view('ppdb_info/data_pengumuman/list_js');
    }

    function edit_pengumuman($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['title'] = 'Info Kademik';
        $data['home'] = 'PPDB Info';
        $data['subtitle'] = $data['title'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['pengumuman'] = $this->psb->getEdit_Pengumuman($id);
        $this->load->view('ppdb_info/data_pengumuman/list_css');
        $this->load->view('ppdb_info/data_pengumuman/data_pengumuman_edit', $data);
        $this->load->view('ppdb_info/data_pengumuman/list_js');
    }

    public function simpan_tambah_pengumuman()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_tambah_pengumuman();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('ppdb_info/data_pengumuman');
    }

    public function simpan_edit_pengumuman()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_edit_pengumuman();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('ppdb_info/data_pengumuman');
    }

    public function deldata_pengumuman($id)
    {
        $data = ['id_pengumuman' => $id];
        $this->db->delete('ppdb_pengumuman', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('ppdb_info/data_pengumuman');
    }
    // end data_pengumuman
}
