<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_sumatif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Input_sumatif_model', 'input_sumatif');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input Sumatif';
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

            $data['tampil'] = $this->input_sumatif->get_tampil();
            // var_dump($data['tampil']);
            // die;

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function detail($id, $target)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input Sumatif';
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

            $data['data'] = $this->input_sumatif->get_detailsumatif($id);
            $data['sumatif'] = $this->input_sumatif->get_sumatif($id, $target);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_js');
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
        $data['tahun'] = substr($data['tasm'], 0, 4);
        $data['semester'] = substr($data['tasm'], -1, 1);
        // $semester = substr($data['tasm'], 4, 5);
        $data['data'] = $this->input_sumatif->get_tambahsumatif($id);
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        // var_dump($data['tahun']);
        // die;
        $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_css');
        $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_add', $data);
        $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_js');
    }   
   
    public function sumatif_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_sumatif->sumatif_simpan();
        // var_dump($this->input_sumatif->kd_simpan());
        // die;        
        $mapel_id = $this->input->post('mapel_id');
        $tingkat = $this->input->post('tingkat');
        redirect('akademik_guru_km/input_sumatif/detail/' . $mapel_id . '/' . $tingkat . '');
    }

    public function del($id)
    {
        $data = ['kd_id' => $id];
        $this->db->delete('t_mapel_kd', $data);

        $id_mapel = $this->input->post('id_mapel', true);
        $data1 = [
            'mapel_activate' => 0,
        ];
        $this->db->where('id_mapel', $id_mapel);
        $this->db->update('t_guru_mapel', $data1);

        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        $mapel_id = $this->input->post('mapel_id');
        $id_kelas = $this->input->post('id_kelas');
        redirect('akademik_guru_km/input_sumatif/detail/' . $mapel_id . '/' . $id_kelas . '');
    }

    public function edit_sumatif($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sumatif'] = $this->db->get_where("t_mapel_sumatif", ['sumatif_id' => $id])->row_array();

        $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_css');
        $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_edit', $data);
        $this->load->view('akademik_guru_km/input_sumatif/input_sumatif_js');
        $this->benchmark->mark('code_end');
    }

    public function sumatif_ubah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_sumatif->sumatif_ubah();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil merubah data ! </h5>
        </div>
        ');
        $mapel_id = $this->input->post('id_mapel');
        $id_kelas = $this->input->post('tingkat');
        redirect('akademik_guru_km/input_sumatif/detail/' . $mapel_id . '/' . $id_kelas . '');
    }

}
