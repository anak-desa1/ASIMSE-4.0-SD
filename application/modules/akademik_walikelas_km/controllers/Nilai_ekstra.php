<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_ekstra extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();


        $data['idnya'] = "setmapel";
        $data['nama_form'] = "akademik_walikelas_km/nilai_ekstra";
        $get_tasm = $this->db->query("SELECT tahun FROM t_tahun WHERE aktif = 'Y'")->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        $wali = $this->db->get_where('t_walikelas', ['id_guru' => $this->session->userdata('nik')])->row_array();
        $data['id_kelas'] = $wali['id_kelas'];

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Nilai_ekstra_model', 'nilai_ekstra');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input Ektrakurikuler';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->nilai_ekstra->get_kelas();
            $data['nilai'] = $this->nilai_ekstra->get_nilai_tampil();
            $data['list_kd'] = $this->db->get_where("m_ekstra")->result_array();
            $data['url'] = "akademik_walikelas_km/nilai_ekstra";

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas_km/nilai_ekstra/nilai_ekstra_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas_km/nilai_ekstra/nilai_ekstra_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas_km/nilai_ekstra/nilai_ekstra_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function input_ekskul($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input Ektrakurikuler';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->nilai_ekstra->get_kelas();
            $data['nilai'] = $this->nilai_ekstra->get_nilai($id);
            $data['list_kd'] = $this->db->get_where("m_ekstra", ['id' => $id])->result_array();
            $data['url'] = "akademik_walikelas_km/nilai_ekstra";

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas_km/nilai_ekstra/nilai_ekstra_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas_km/nilai_ekstra/nilai_ekstra_input', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas_km/nilai_ekstra/nilai_ekstra_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['siswa'] = $this->nilai_ekstra->get_siswa($id);
        $data['ekskul'] = $this->db->get_where('m_ekstra')->result_array();
        $data['tahun'] = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['nilai'] = $this->nilai_ekstra->get_nilai($id);
        // var_dump($data['siswa']);
        // die;
        $this->load->view('akademik_walikelas_km/nilai_ekstra/nilai_ekstra_css');
        $this->load->view('akademik_walikelas_km/nilai_ekstra/nilai_ekstra_tambah', $data);
        $this->load->view('akademik_walikelas_km/nilai_ekstra/nilai_ekstra_js');
    }

    public function simpan_data()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_ekstra->simpan_data();
        // var_dump();
        // die;
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Ekstrakurikuler ! </h5>
        </div>
        ');
        $id = $this->input->post('id_ekstra');
        redirect('akademik_walikelas_km/nilai_ekstra/input_ekskul/' . $id);
    }

    public function del($id)
    {
        $data = ['id' => $id];
        $this->db->delete('t_nilai_ekstra', $data);

        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Ekstrakurikuler ! </h5>
        </div>
        ');
        redirect('akademik_walikelas_km/nilai_ekstra/');
    }

    public function cetak($id)
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kelas'] = $this->nilai_ekstra->get_kelas();
        $data['nilai'] = $this->nilai_ekstra->get_nilai($id);
        $data['list_kd'] = $this->db->get_where("m_ekstra", ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->result_array();
        // var_dump($data['data']);
        // die;       
        $this->load->view('akademik_walikelas_km/nilai_ekstra/nilai_ekstra_cetak', $data);
    }
}
