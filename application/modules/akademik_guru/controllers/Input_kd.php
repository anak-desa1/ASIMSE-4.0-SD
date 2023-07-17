<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_kd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Input_kd_model', 'input_kd');
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
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['tahun'] = substr($data['tasm'], 0, 4);
            $data['semester'] = substr($data['tasm'], -1, 1);
            // $tahun = substr($data['tasm'], 0, 4);

            $data['tampil'] = $this->input_kd->get_tampil();
            // var_dump($data['tampil']);
            // die;

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru/input_kd/input_kd_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru/input_kd/input_kd_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru/input_kd/input_kd_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function detail($id, $target)
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
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['tahun'] = substr($data['tasm'], 0, 4);
            $data['semester'] = substr($data['tasm'], -1, 1);

            $data['data'] = $this->input_kd->get_detailkd($id);
            $data['kd'] = $this->input_kd->get_kd($id, $target);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru/input_kd/input_kd_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru/input_kd/input_kd_detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru/input_kd/input_kd_js');
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

        $data['p_tema'] = array('' => 'pilih tema', '-' => '- (Non Tematik)', '1' => 'Satu', '2' => 'Dua', '3' => 'Tiga', '4' => 'Empat', '5' => 'Lima', '6' => 'Enam', '7' => 'Tujuh', '8' => 'Delapan', '9' => 'Sembilan');
        $data['data'] = $this->input_kd->get_tambahkd($id);
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        // var_dump($data['tahun']);
        // die;
        $this->load->view('akademik_guru/input_kd/input_kd_css');
        $this->load->view('akademik_guru/input_kd/input_kd_tambah', $data);
        $this->load->view('akademik_guru/input_kd/input_kd_js');
    }   
   
    public function kd_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_kd->kd_simpan();
        // var_dump($this->input_kd->kd_simpan());
        // die;        
        $mapel_id = $this->input->post('mapel_id');
        $tingkat = $this->input->post('tingkat');
        redirect('akademik_guru/input_kd/detail/' . $mapel_id . '/' . $tingkat . '');
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
        redirect('akademik_guru/input_kd/detail/' . $mapel_id . '/' . $id_kelas . '');
    }

    public function edit_1($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kd'] = $this->db->get_where("t_mapel_kd", ['kd_id' => $id])->row_array();

        $this->load->view('akademik_guru/input_kd/input_kd_css');
        $this->load->view('akademik_guru/input_kd/input_kd_edit_1', $data);
        $this->load->view('akademik_guru/input_kd/input_kd_js');
        $this->benchmark->mark('code_end');
    }

    public function edit_2($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kd'] = $this->db->get_where("t_mapel_kd", ['kd_id' => $id])->row_array();

        $this->load->view('akademik_guru/input_kd/input_kd_css');
        $this->load->view('akademik_guru/input_kd/input_kd_edit_2', $data);
        $this->load->view('akademik_guru/input_kd/input_kd_js');
        $this->benchmark->mark('code_end');
    }


    public function kd_ubah_1()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_kd->kd_ubah_1();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Ubah Nilai ! </h5>
        </div>
        ');
        $mapel_id = $this->input->post('id_mapel');
        $id_kelas = $this->input->post('tingkat');
        redirect('akademik_guru/input_kd/detail/' . $mapel_id . '/' . $id_kelas . '');
    }

    public function kd_ubah_2()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_kd->kd_ubah_2();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Ubah Nilai ! </h5>
        </div>
        ');
        $mapel_id = $this->input->post('id_mapel');
        $id_kelas = $this->input->post('tingkat');
        redirect('akademik_guru/input_kd/detail/' . $mapel_id . '/' . $id_kelas . '');
    }
}
