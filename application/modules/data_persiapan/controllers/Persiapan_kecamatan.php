<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persiapan_kecamatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('PersiapanKecamatan_model', 'kecamatan');
    }

    public function index()
    {
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Kecamatan';
            $data['home'] = 'Persiapan';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['kota'] = $this->kecamatan->getKota();
            $data['kecamatan'] = $this->kecamatan->getKecamatan();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_persiapan/persiapan_kecamatan/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $data =
                [
                    'kota_id' => $this->input->post('kota_id'),
                    'kecamatan' => $this->input->post('kecamatan'),
                ];
            $this->db->insert('m_kecamatan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tambah Data !</div>');
            redirect('data_persiapan/persiapan_kecamatan');
        }
    }

    public function delKecamatan($sek_id)
    {
        $data = ['kecamatan_id' => $sek_id];
        $this->db->delete('m_kecamatan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Hapus Data !</div>');
        redirect('data_persiapan/persiapan_kecamatan');
    }

    public function editKecamatan()
    {
        $id = $this->input->post('ed_id', true);
        $kota_id = $this->input->post('ed_kota_id', true);
        $kecamatan = $this->input->post('ed_kecamatan', true);
        $data = [
            'kota_id' => $kota_id,
            'kecamatan' => $kecamatan,
        ];
        $this->db->where('kecamatan_id', $id);
        $this->db->update('m_kecamatan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Ubah Data !</div>');
        redirect('data_persiapan/persiapan_kecamatan');
    }
}
