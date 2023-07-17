<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persiapan_kota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('PersiapanKota_model', 'kota');
    }

    public function index()
    {
        $this->form_validation->set_rules('kota', 'Kota', 'required');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Kota';
            $data['home'] = 'Persiapan';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['provinsi'] = $this->db->get('m_provinsi')->result_array();
            $data['kota'] = $this->kota->getProvinsi();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_persiapan/persiapan_kota/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $data =
                [
                    'provinsi_id' => $this->input->post('provinsi_id'),
                    'kota' => $this->input->post('kota'),
                ];
            $this->db->insert('m_kota', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Ditambahkan!</div>');
            redirect('data_persiapan/persiapan_kota');
        }
    }

    public function delKota($sek_id)
    {
        $data = ['kota_id' => $sek_id];
        $this->db->delete('m_kota', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Hapus Data !</div>');
        redirect('data_persiapan/persiapan_kota');
    }

    public function editkota()
    {
        $id = $this->input->post('ed_id', true);
        $provinsi_id = $this->input->post('ed_provinsi_id', true);
        $kota = $this->input->post('ed_kota', true);
        $data = [
            'kota' => $kota,
            'provinsi_id' => $provinsi_id,
        ];
        $this->db->where('kota_id', $id);
        $this->db->update('m_kota', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Ubah Data !</div>');
        redirect('data_persiapan/persiapan_kota');
    }
}
