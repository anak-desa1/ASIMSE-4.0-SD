<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_leger extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Laporan_leger_model', 'leger');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Laporan Leger';
            $data['home'] = 'Laporan KM';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
           
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['tahun'] = substr($data['tasm'], 0, 4);
            $data['semester'] = substr($data['tasm'], -1, 1);

            $data['kelas'] = $this->leger->get_kelas();
            // $tahun = substr($data['tasm'], 0, 4);
            // var_dump($data['tahun']);
            // die;  
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_laporan/laporan_leger/laporan_leger_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_laporan/laporan_leger/laporan_leger_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_laporan/laporan_leger/laporan_leger_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }

    }

    public function leger_tabel($id)
    {
        $this->benchmark->mark('code_start');
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data'] = $this->leger->get_guru($id);
        $data['siswa'] = $this->leger->get_detailsiswa($id);
        $data['header'] = $this->leger->get_detailnilai_sumatif($id);
        $data['nilai_p'] = $this->leger->get_detailnilai_sumatif($id);      
        $data['nilai_pas'] = $this->leger->get_detailnilai_pas_sumatif($id); 
        $data['mapel'] = $this->leger->get_mapel($id);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $tasm = $get_tasm['tahun'];

        $data['kelas'] = $this->leger->get_kelas();
        $data['absen_siswa'] = $this->db->get_where('t_nilai_absensi', ["penilaian" => 'PAS', 'tasm' => $tasm])->result_array();
        // var_dump($data['absen_siswa']);
        // die;    
        $this->load->view('akademik_laporan_km/laporan_leger/laporan_leger_table', $data);
        $this->benchmark->mark('code_end');
    }

    public function detail($id)
    {
        $this->benchmark->mark('code_start');
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data'] = $this->leger->get_guru($id);
        $data['siswa'] = $this->leger->get_detailsiswa($id);
        $data['header'] = $this->leger->get_detailnilai_sumatif($id);
        $data['nilai_p'] = $this->leger->get_detailnilai_sumatif($id);      
        $data['nilai_pas'] = $this->leger->get_detailnilai_pas_sumatif($id); 
        $data['mapel'] = $this->leger->get_mapel($id);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $tasm = $get_tasm['tahun'];

        $data['kelas'] = $this->leger->get_kelas();
        $data['absen_siswa'] = $this->db->get_where('t_nilai_absensi', ["penilaian" => 'PAS', 'tasm' => $tasm])->result_array();
        // var_dump($data['absen_siswa']);
        // die;    
        $this->load->view('akademik_laporan_km/laporan_leger/laporan_leger_detail', $data);
        $this->benchmark->mark('code_end');
    }
}
