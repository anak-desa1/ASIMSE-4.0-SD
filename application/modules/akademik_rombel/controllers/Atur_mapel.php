<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_mapel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Atur_mapel_model', 'atur_mapel');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'SetUp Mapel';
            $data['home'] = 'Rapor Rombel';
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
            $data['ta'] = substr($data['tasm'], 0, 4);

            $data['tampil'] = $this->atur_mapel->get_tampil();
            $data['guru'] = $this->atur_mapel->get_gururombel();

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_rombel/atur_mapel/atur_mapel_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_rombel/atur_mapel/atur_mapel_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_rombel/atur_mapel/atur_mapel_js');
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
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $data['sekolah'] = $this->atur_mapel->get_sekolah($id);
        $data['kelas'] = $this->atur_mapel->get_kelas($ta);
        $data['guru'] = $this->atur_mapel->get_gurumapel($id);
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $data['p_jenis'] = array('Pilih Jenis ' => 'Pilih Jenis', 'tematik' => 'Tematik', 'non_tematik' => 'Non Tematik');
        $data['mapel'] = $this->db->get_where('m_mapel')->result_array();

        $this->load->view('akademik_rombel/atur_mapel/atur_mapel_css');
        $this->load->view('akademik_rombel/atur_mapel/atur_mapel_tambah', $data);
        $this->load->view('akademik_rombel/atur_mapel/atur_mapel_js');
    }

    public function tabel($id)
    {
        $data['mapel'] = $this->db->get_where('m_mapel', ['kd_sekolah' => $id])->result_array();
        $this->load->view('akademik_rombel/atur_mapel/atur_mapel_table', $data);
    }

    public function mapel_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->atur_mapel->mapel_simpan();
        $id_guru = $this->input->post('id_guru');
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil tambah rombel ! </h5>
        </div>
        ');
        redirect('akademik_rombel/atur_mapel/detail/' . $id_guru);
    }

    public function detail($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'SetUp Mapel';
            $data['home'] = 'Rapor Rombel';
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
            $data['ta'] = substr($data['tasm'], 0, 4);

            $data['guru_aktif'] = $this->atur_mapel->get_gurumapel($id);
            $data['mapel'] = $this->atur_mapel->get_mapel($id);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_rombel/atur_mapel/atur_mapel_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_rombel/atur_mapel/atur_mapel_detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_rombel/atur_mapel/atur_mapel_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function del($id)
    {
        $data = ['mapel_id' => $id];
        $this->db->delete('t_guru_mapel', $data);
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        $id_guru = $this->input->post('id_guru');
        redirect('akademik_rombel/atur_mapel/detail/' . $id_guru);
    }
}
