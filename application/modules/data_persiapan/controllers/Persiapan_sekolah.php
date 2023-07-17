<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persiapan_sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('PersiapanSekolah_model', 'sekolah');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama_sekolah', 'Campus', 'required');
        $this->form_validation->set_rules('kd_sekolah', 'Kode Campus', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sekolah';
            $data['home'] = 'Persiapan';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->sekolah->getSekolah();
            $data['campus'] = $this->sekolah->getLCampus();
            $this->load->view('layout/header-top');
            $this->load->view('data_persiapan/persiapan_sekolah/list_css');
            $this->load->view('layout/header-bottom');
            $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_persiapan/persiapan_sekolah/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('data_persiapan/persiapan_sekolah/list_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $data =
                [
                    'kd_campus' => $this->input->post('kd_campus'),
                    'nama_sekolah' => $this->input->post('nama_sekolah'),
                    'kd_sekolah' => $this->input->post('kd_sekolah'),
                ];
            $this->db->insert('l_sekolah', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Berhasi Tambah Data !</div>');
            redirect('data_persiapan/persiapan_sekolah');
        }
    }

    public function delSekolah($sek_id)
    {
        $data = ['l_sekolah_id' => $sek_id];
        $this->db->delete('l_sekolah', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Hapus Data !</div>');
        redirect('data_persiapan/persiapan_sekolah');
    }

    public function editSekolah()
    {
        $id = $this->input->post('ed_id', true);
        $kd_campus = $this->input->post('ed_kd_campus', true);
        $nama_sekolah = $this->input->post('ed_nama_sekolah', true);
        $kd_sekolah = $this->input->post('ed_kd_sekolah', true);
        $data = [
            'kd_campus' => $kd_campus,
            'nama_sekolah' => $nama_sekolah,
            'kd_sekolah' => $kd_sekolah,
        ];
        $this->db->where('l_sekolah_id', $id);
        $this->db->update('l_sekolah', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Ubah Data !</div>');
        redirect('data_persiapan/persiapan_sekolah');
    }
}
