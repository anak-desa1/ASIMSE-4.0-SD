<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_catatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();

        $data['url'] = "akademik_walikelas/nilai_catatan";
        $data['idnya'] = "setmapel";
        $data['nama_form'] = "f_nilai_sso";
        $get_tasm = $this->db->query("SELECT tahun FROM t_tahun WHERE aktif = 'Y'")->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Nilai_catatan_model', 'nilai_catatan');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Catatan Walikelas';
            $data['home'] = 'Akademik Walikelas';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->nilai_catatan->get_kelas();
            $data['siswa'] = $this->nilai_catatan->get_siswa();
            $data['catatan'] = $this->nilai_catatan->get_tampil();

            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['semester'] = substr($data['tasm'], -1, 1);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_pts()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Catatan Walikelas';
            $data['home'] = 'Akademik Walikelas';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

            $data['kelas'] = $this->nilai_catatan->get_kelas();
            // $data['siswa'] = $this->nilai_catatan->get_siswa();
            // $data['catatan'] = $this->nilai_catatan->get_tampil();
            $data['siswa_kelas'] = $this->nilai_catatan->get_siswa_pts();
            // var_dump($data['kelas']);
            // die;
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['semester'] = substr($data['tasm'], -1, 1);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_tambah_pts', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_pas()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Catatan Walikelas';
            $data['home'] = 'Akademik Walikelas';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->nilai_catatan->get_kelas();
            $data['siswa_kelas'] = $this->nilai_catatan->get_siswa_pas();
            $data['p_naik'] = array("" => "Status", "Y" => "Naik Kelas", "L" => "Lulus", "N" => "Tidak Naik", "T" => "Tidak Lulus");
            $data['p_kelas'] = array("" => "Kelas", "2 (dua)" => "2", "3 (tiga)" => "3", "4 (empat)" => "4", "5 (lima)" => "5", "6 (enam)" => "6", "7 (tujuh)" => "7");

            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['semester'] = substr($data['tasm'], -1, 1);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_tambah_pas', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_pat()
    {

        $this->benchmark->mark('code_start');
        $data['title'] = 'Catatan Walikelas';
        $data['home'] = 'Akademik Walikelas';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        // var_dump($data['data_pegawai']);
        // die;  
        $data['kelas'] = $this->nilai_catatan->get_kelas();
        $data['siswa_kelas'] = $this->nilai_catatan->get_siswa_pat();
        $data['p_naik'] = array("" => "Status", "Y" => "Naik Kelas", "L" => "Lulus", "N" => "Tidak Naik", "T" => "Tidak Lulus");
        $data['p_kelas'] = array("" => "Kelas", "1 (Satu)" => "1", "2 (Dua)" => "2", "3 (Tiga)" => "3", "4 (Empat)" => "4", "5 (Lima)" => "5", "6 (Enam)" => "6", "L (Lulus)" => "Lulus");

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['semester'] = substr($data['tasm'], -1, 1);
       
        // var_dump($data['data']);
        // die;

        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_tambah_pat', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');

    }

    public function simpan_pts()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_catatan->simpan_pts();
        // var_dump($this->nilai_catatan->simpan());
        // die;
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Data ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_catatan/');
    }

    public function simpan_pas()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_catatan->simpan_pas();
        // var_dump($this->nilai_catatan->simpan());
        // die;
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Data ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_catatan/');
    }

    public function simpan_pat()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_catatan->simpan_pat();
        // var_dump($this->nilai_catatan->simpan());
        // die;
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Data ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_catatan/');
    }

    public function cetak_pts()
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kelas'] = $this->nilai_catatan->get_kelas();
        $data['siswa_kelas'] = $this->nilai_catatan->get_siswa_pts();
        // var_dump($data['data']);
        // die;     
        $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_cetak_pts', $data);
        $this->benchmark->mark('code_end');
    }

    public function cetak_pas()
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kelas'] = $this->nilai_catatan->get_kelas();
        $data['siswa_kelas'] = $this->nilai_catatan->get_siswa_pas();
        // var_dump($data['data']);
        // die;     
        $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_cetak_pas', $data);
        $this->benchmark->mark('code_end');
    }

    public function cetak_pat()
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kelas'] = $this->nilai_catatan->get_kelas();
        $data['siswa_kelas'] = $this->nilai_catatan->get_siswa_pas();
        // var_dump($data['data']);
        // die;     
        $this->load->view('akademik_walikelas/nilai_catatan/nilai_catatan_cetak_pat', $data);
        $this->benchmark->mark('code_end');
    }
}

