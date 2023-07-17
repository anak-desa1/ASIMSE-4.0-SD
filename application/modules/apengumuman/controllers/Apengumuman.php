<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['pengumuman'] = $this->db->get_where('ppdb_pengumuman', ['jenis' => 1, 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->result_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah', ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1, 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }
}