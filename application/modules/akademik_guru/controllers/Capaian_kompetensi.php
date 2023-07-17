<?php

use Box\Spout\Common\Entity\Row;

defined('BASEPATH') or exit('No direct script access allowed');

class Capaian_kompetensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Capaian_kompetensi_model', 'capaian_kompetensi');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input Nilai';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['tahun'] = substr($data['tasm'], 0, 4);
            $data['semester'] = substr($data['tasm'], -1, 1);

            $data['tampil'] = $this->capaian_kompetensi->get_tampil();
            // var_dump($data['tampil']);
            // die;

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru/capaian_kompetensi/capaian_kompetensi_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru/capaian_kompetensi/capaian_kompetensi_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru/capaian_kompetensi/capaian_kompetensi_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function nilai_pas($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input Nilai';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['data'] = $this->capaian_kompetensi->detil_guru($id);
            $data['siswa'] = $this->capaian_kompetensi->get_detailsiswa($id);
            $data['header'] = $this->capaian_kompetensi->get_detailnilai($id);
            $data['nilai'] = $this->capaian_kompetensi->get_detailnilai($id);
           
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 4);
            $data['tahun'] = substr($data['tasm'], 0, 4);
            $data['semester'] = substr($data['tasm'], -1, 1);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru/capaian_kompetensi/capaian_kompetensi_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru/capaian_kompetensi/capaian_kompetensi_detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru/capaian_kompetensi/capaian_kompetensi_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }
}
