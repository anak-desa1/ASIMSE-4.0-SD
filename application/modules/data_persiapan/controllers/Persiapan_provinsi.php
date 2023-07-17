<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persiapan_provinsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('PersiapanProvinsi_model', 'provinsi');
    }

    public function index()
    {
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Provinsi';
            $data['home'] = 'Persiapan';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['provinsi'] = $this->provinsi->getProvinsi();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_persiapan/persiapan_provinsi/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $data =
                [
                    'provinsi' => $this->input->post('provinsi'),
                ];
            $this->db->insert('m_provinsi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New Data Provinsi Added!</div>');
            redirect('data_persiapan/persiapan_provinsi');
        }
    }

    public function delProvinsi($sek_id)
    {
        $data = ['provinsi_id' => $sek_id];
        $this->db->delete('m_provinsi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Hapus Data !</div>');
        redirect('data_persiapan/persiapan_provinsi');
    }

    public function editProvinsi()
    {
        $id = $this->input->post('ed_id', true);
        $provinsi = $this->input->post('ed_provinsi', true);
        $data = [
            'provinsi' => $provinsi
        ];
        $this->db->where('provinsi_id', $id);
        $this->db->update('m_provinsi', $data);
        redirect('data_persiapan/persiapan_provinsi');
    }
}
