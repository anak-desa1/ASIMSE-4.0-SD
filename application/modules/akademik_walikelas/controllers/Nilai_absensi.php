<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Nilai_absensi_model', 'nilai_absensi');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input Absensi';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->nilai_absensi->get_kelas();
            $data['siswa'] = $this->nilai_absensi->get_siswa();
            $data['absen'] = $this->nilai_absensi->get_absen_tampil();

            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 4);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_absensi/nilai_absensi_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_absensi/nilai_absensi_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_absensi/nilai_absensi_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_pts()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input Absensi';
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
            $data['ta'] = substr($data['tasm'], 4);
            // $tahun = substr($data['tasm'], 0, 4);

            $data['kelas'] = $this->nilai_absensi->get_kelas();
            $data['siswa_kelas'] = $this->nilai_absensi->get_absen_add_pts();

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_absensi/nilai_absensi_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_absensi/nilai_absensi_tambah_pts', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_absensi/nilai_absensi_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_pas()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input Absensi';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->nilai_absensi->get_kelas();
            $data['siswa_kelas'] = $this->nilai_absensi->get_absen_add_pas();

            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 4);


            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_absensi/nilai_absensi_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_absensi/nilai_absensi_tambah_pas', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_absensi/nilai_absensi_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }


    public function absen_simpan_pts()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_absensi->absen_simpan_pts();
        // var_dump($this->nilai_absensi->absen_simpan());
        // die;
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Absensi ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_absensi/');
    }

    public function absen_simpan_pas()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_absensi->absen_simpan_pas();
        // var_dump($this->nilai_absensi->absen_simpan());
        // die;
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Absensi ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_absensi/');
    }

    public function cetak_pts()
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);

        $data['siswa_kelas'] = $this->nilai_absensi->get_siswa_add_pts();
        $data['kelas'] = $this->nilai_absensi->get_kelas();

        // var_dump($data['siswa_kelas']);
        // die;
        $this->load->view('akademik_walikelas/nilai_absensi/nilai_absensi_cetak_pts', $data);
        $this->benchmark->mark('code_end');
    }

    public function cetak_pas()
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['siswa_kelas'] = $this->nilai_absensi->get_siswa_add_pas();
        $data['kelas'] = $this->nilai_absensi->get_kelas();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);

        // var_dump($data['data']);
        // die;     
        $this->load->view('akademik_walikelas/nilai_absensi/nilai_absensi_cetak_pas', $data);
        $this->benchmark->mark('code_end');
    }
}
