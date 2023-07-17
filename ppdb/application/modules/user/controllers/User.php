<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $user = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['user'] =  $user;
        $periode = $user['periode'];
        // $status_siswa = $user['status_siswa'];

        $data['pengumuman'] = $this->db->get_where('ppdb_pengumuman', ['jenis' => 1])->result_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        // var_dump($data['sekolah']);
        // die;
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

        $data['biaya'] = $this->db->get_where('ppdb_biaya', ['status' => 1, 'periode' => $periode])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        // $this->load->view('css', $data);
        $this->load->view('index', $data);
        // $this->load->view('js', $data);
        $this->load->view('templates/footer');
    }
}


/*
Theme Name: CAHDESO
Author: ALBERTUS EKO WILASATRYAWAN
Author URI: 'https://sistemanakdesa.my.id/'
Description: A development theme, from static HTML-CSS-JavaScript-PHP to CMS
Version: 1.0
License: GNU General Public License v2 or later
License URI: 'https://sistemanakdesa.my.id/'
*/

