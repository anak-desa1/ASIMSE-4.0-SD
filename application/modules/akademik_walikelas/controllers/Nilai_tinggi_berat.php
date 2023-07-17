<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_tinggi_berat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Nilai_tinggi_berat_model', 'nilai_tinggi_berat');
    }

    public function index()
    {

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input KD';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->nilai_tinggi_berat->get_kelas();
            $data['siswa_kelas'] = $this->nilai_tinggi_berat->get_siswa_tampil();

            $get_tasm = $this->db->query("SELECT tahun,semester FROM t_tahun WHERE aktif = 'Y'")->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['semester'] = $get_tasm['semester'];

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_tinggi_berat/nilai_tinggi_berat_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_tinggi_berat/nilai_tinggi_berat_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_tinggi_berat/nilai_tinggi_berat_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah()
    {

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input KD';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->nilai_tinggi_berat->get_kelas();
            $data['siswa_kelas'] = $this->nilai_tinggi_berat->get_siswa_add();
            // var_dump($data['siswa_kelas']);
            // die;
            $get_tasm = $this->db->query("SELECT tahun,semester FROM t_tahun WHERE aktif = 'Y'")->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['semester'] = $get_tasm['semester'];

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_tinggi_berat/nilai_tinggi_berat_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_tinggi_berat/nilai_tinggi_berat_tambah', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_tinggi_berat/nilai_tinggi_berat_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }



    public function tinggi_berat_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_tinggi_berat->tinggi_berat_simpan();
        // var_dump($this->nilai_tinggi_berat->absen_simpan());
        // die;
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Tinggi & Berat Badan ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_tinggi_berat/');
    }


    public function cetak()
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['siswa_kelas'] = $this->nilai_tinggi_berat->get_siswa_add();
        $data['kelas'] = $this->nilai_tinggi_berat->get_kelas();
        // var_dump($data['data']);
        // die;     
        $this->load->view('akademik_walikelas/nilai_tinggi_berat/nilai_tinggi_berat_cetak', $data);
        $this->benchmark->mark('code_end');
    }
}
