<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_rpp_plus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Input_rpp_plus_model', 'input_rpp_plus');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input RPP+';
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
            // $tahun = substr($data['tasm'], 0, 4);

            $data['tampil'] = $this->input_rpp_plus->get_tampil();
            // var_dump($data['tampil']);
            // die;

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function detail($id, $target)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input RPP+';
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

            $data['data'] = $this->input_rpp_plus->get_detailsumatif($id);
            $data['sumatif'] = $this->input_rpp_plus->get_sumatif($id, $target);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_rpp_plus($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['tahun'] = substr($data['tasm'], 0, 4);
        $data['semester'] = substr($data['tasm'], -1, 1);
        // $semester = substr($data['tasm'], 4, 5);
        $data['data'] = $this->input_rpp_plus->get_TambahData($id);
        $data['sumatif'] = $this->input_rpp_plus->get_IdSumatif($id);
        $data['rpp_plus'] = $this->db->get_where('t_mapel_rpp_plus', ['sumatif_id' => $id])->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        // var_dump( $data['sumatif']);
        // die;
        $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_css');
        $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_add', $data);
        $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_js');
    }   
   
    public function rpp_plus_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_rpp_plus->rpp_plus_simpan();
        // var_dump($this->input_rpp_plus->kd_simpan());
        // die;        
        $id_mapel = $this->input->post('id_mapel');
        $tingkat = $this->input->post('tingkat');
        redirect('akademik_guru_km/input_rpp_plus/detail/' . $id_mapel . '/' . $tingkat . '');
    } 
   
    public function cetak_rpp_plus($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data'] = $this->input_rpp_plus->get_TambahData($id);       
        $data['sumatif'] = $this->input_rpp_plus->get_IdSumatif($id);
        $data['rpp_plus'] = $this->db->get_where('t_mapel_rpp_plus', ['sumatif_id' => $id])->row_array();
        // var_dump($data['rpp_plus']);
        // die;
        $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_css');
        $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_cetak', $data);
        $this->load->view('akademik_guru_km/input_rpp_plus/input_rpp_plus_js');
        $this->benchmark->mark('code_end');
    }
}
