<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persiapan_tahun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('PersiapanTahun_model', 'tahun');
    }

    public function index()
    {
        $this->form_validation->set_rules('tahun_aktif', 'Tahun', 'required');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'tahun';
            $data['home'] = 'Persiapan';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['tahun'] = $this->tahun->getTahun();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_persiapan/persiapan_tahun/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $data =
                [
                    'tahun_aktif' => $this->input->post('tahun_aktif'),
                ];
            $this->db->insert('l_tahun', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Berhasi Tambah Data !</div>');
            redirect('data_persiapan/persiapan_tahun');
        }
    }

    public function delTahun($sek_id)
    {
        $data = ['id_tahun' => $sek_id];
        $this->db->delete('l_tahun', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Hapus Data !</div>');
        redirect('data_persiapan/persiapan_tahun');
    }

    public function editTahun()
    {
        $id = $this->input->post('ed_id', true);
        $tahun_aktif = $this->input->post('ed_tahun_aktif', true);
        $data = [

            'tahun_aktif' => $tahun_aktif,
        ];
        $this->db->where('id_tahun', $id);
        $this->db->update('l_tahun', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Ubah Data !</div>');
        redirect('data_persiapan/persiapan_tahun');
    }
}
