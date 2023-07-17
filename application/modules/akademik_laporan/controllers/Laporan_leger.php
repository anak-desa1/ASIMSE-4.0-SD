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
        $this->load->model('Laporan_leger_model', 'laporan_leger');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Laporan Leger';
            $data['home'] = 'Laporan K13';
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

            $data['kelas'] = $this->laporan_leger->get_kelas();
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

    // public function tabel($id)
    // {
    //     $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

    //     $data['kelas'] = $this->db->select('a.*')
    //         ->from('m_kelas a')
    //         ->group_by('a.tingkat', 'ASC')
    //         ->get()->result_array();

    //     $data['rombel'] =  $this->db->select('k.*')
    //         ->from('t_kelas_siswa k')
    //         ->where(['k.ta' =>  $id])
    //         ->group_by('rombel', 'ASC')
    //         ->get()->result_array();

    //     $this->load->view('akademik_laporan/laporan_leger/laporan_leger_table', $data);
    // }

    public function leger_tabel($id)
    {
        $this->benchmark->mark('code_start');
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data'] = $this->laporan_leger->get_guru($id);
        $data['mapel'] = $this->laporan_leger->get_mapel($id);
        $data['siswa'] = $this->laporan_leger->get_detailsiswa($id);
        // $data['header'] = $this->laporan_leger->get_detailnilai_ki3($id);
        // $data['nilai_p'] = $this->laporan_leger->get_detailnilai_ki3($id);
        // $data['nilai_pts'] = $this->laporan_leger->get_detailnilai_pts_ki3($id);
        // $data['nilai_pas'] = $this->laporan_leger->get_detailnilai_pas_ki3($id);
        // $data['nilai_k'] = $this->laporan_leger->get_detailnilai_ki4($id);
        // var_dump($data['nilai_pas']);
        // die;
        // $data['mapel'] = $this->db->get_where('m_mapel', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'ASC'])->result_array();
      

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $tasm = $get_tasm['tahun'];

        $data['kelas'] = $this->laporan_leger->get_kelas();
        // $data['siswa_kelas'] = $this->leger->get_siswa_add_pas();
        $data['absen_siswa'] = $this->db->get_where('t_nilai_absensi', ["penilaian" => 'PAS', 'tasm' => $tasm])->result_array();

        // var_dump($data['data_pegawai']);
        // die;    
        $this->load->view('akademik_laporan/laporan_leger/laporan_leger_table', $data);
        $this->load->view('akademik_laporan/laporan_leger/laporan_leger_js');
        $this->benchmark->mark('code_end');
    }
}
