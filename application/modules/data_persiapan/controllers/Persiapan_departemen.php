<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persiapan_departemen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('PersiapanDepartemen_model', 'departemen');
    }

    public function index()
    {
        $this->form_validation->set_rules('departemen', 'Departemen', 'required');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Departemen';
            $data['home'] = 'Persiapan';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['departemen'] = $this->departemen->getDepartemen();
            $this->load->view('layout/header-top');
            $this->load->view('data_persiapan/persiapan_departemen/list_css');
            $this->load->view('layout/header-bottom');
            $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_persiapan/persiapan_departemen/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('data_persiapan/persiapan_departemen/list_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $data =
                [
                    'departemen' => $this->input->post('departemen'),
                ];
            $this->db->insert('access_departemen', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Berhasil Tambah Data !</div>');
            redirect('data_persiapan/persiapan_departemen');
        }
    }

    public function delDepartemen($sek_id)
    {
        $data = ['departemen_id' => $sek_id];
        $this->db->delete('access_departemen', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Hapus Data !</div>');
        redirect('data_persiapan/persiapan_departemen');
    }

    public function editDepartemen()
    {
        $id = $this->input->post('ed_id', true);
        $departemen = $this->input->post('ed_departemen', true);
        $data = [
            'departemen' => $departemen
        ];
        $this->db->where('departemen_id', $id);
        $this->db->update('access_departemen', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Ubah Data !</div>');
        redirect('data_persiapan/persiapan_departemen');
    }
}
