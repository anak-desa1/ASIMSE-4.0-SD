<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persiapan_desa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('PersiapanDesa_model', 'desa');
    }

    public function index()
    {
        $this->form_validation->set_rules('desa', 'Desa', 'required');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Desa';
            $data['home'] = 'Persiapan';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['desa'] = $this->desa->getDesa();
            $data['kecamatan'] = $this->desa->getKecamatan();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_persiapan/persiapan_desa/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $data =
                [
                    'kecamatan_id' => $this->input->post('kecamatan_id'),
                    'desa' => $this->input->post('desa'),
                ];
            $this->db->insert('m_desa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tambah Data !</div>');
            redirect('data_persiapan/persiapan_desa');
        }
    }

    public function delDesa($sek_id)
    {
        $data = ['id' => $sek_id];
        $this->db->delete('m_desa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Data !</div>');
        redirect('data_persiapan/persiapan_desa');
    }

    public function editDesa()
    {
        $id = $this->input->post('ed_id', true);
        $kecamatan_id = $this->input->post('ed_kecamatan_id', true);
        $desa = $this->input->post('ed_desa', true);
        $data = [
            'kecamatan_id' => $kecamatan_id,
            'desa' => $desa,
        ];
        $this->db->where('id', $id);
        $this->db->update('m_desa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Ubah Data !</div>');
        redirect('data_persiapan/persiapan_desa');
    }
}
