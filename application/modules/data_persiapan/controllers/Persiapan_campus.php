<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persiapan_campus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('PersiapanCampus_model', 'campus');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama_campus', 'Campus', 'required');
        $this->form_validation->set_rules('kd_campus', 'Kode Campus', 'required');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Campus';
            $data['home'] = 'Persiapan';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['campus'] = $this->campus->getLCampus();
            $this->load->view('layout/header-top');
            $this->load->view('data_persiapan/persiapan_campus/list_css');
            $this->load->view('layout/header-bottom');
            $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_persiapan/persiapan_campus/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('data_persiapan/persiapan_campus/list_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $data =
                [
                    'nama_campus' => $this->input->post('nama_campus'),
                    'kd_campus' => $this->input->post('kd_campus'),
                ];
            $this->db->insert('l_campus', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Berhasil Tambah Data !</div>');
            redirect('data_persiapan/persiapan_campus');
        }
    }

    public function delCampus($sek_id)
    {
        $data = ['l_campus_id' => $sek_id];
        $this->db->delete('l_campus', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Berhasil Hapus Data !</div>');
        redirect('data_persiapan/persiapan_campus');
    }

    public function editCampus()
    {
        $id = $this->input->post('ed_id', true);
        $nama_campus = $this->input->post('ed_nama_campus', true);
        $kd_campus = $this->input->post('ed_kd_campus', true);
        $data = [
            'nama_campus' => $nama_campus,
            'kd_campus' => $kd_campus,
        ];
        $this->db->where('l_campus_id', $id);
        $this->db->update('l_campus', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Ubah Data !</div>');
        redirect('data_persiapan/persiapan_campus');
    }
}
