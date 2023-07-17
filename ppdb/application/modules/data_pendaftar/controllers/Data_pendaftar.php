<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pendaftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Data_pendaftar_m', 'data_pendaftar');
    }

    public function index()
    {
        $data['title'] = 'Data Register';

        $data['pendaftar'] = $this->db->get_where('ppdb_daftar', ['is_active' => 1])->result_array();

        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

        $data['yayasan'] = $this->data_pendaftar->yayasan();
        $data['cabang'] = $this->db->get('m_cabang')->result_array();

        //css for this page only
        $this->load->view('template/_css', $data);
        //======== end  
        $this->load->view('data_pendaftar_css');
        $this->load->view('data_pendaftar_v', $data);
        $this->load->view('data_pendaftar_js');
        // js for this page only
        $this->load->view('template/_js');
        //========= end
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

