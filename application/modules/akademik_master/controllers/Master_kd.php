<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_kd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();

        // $get_tasm = $this->db->query("SELECT tahun FROM t_tahun WHERE aktif = 'Y'")->row_array();
        // $data['tasm'] = $get_tasm['tahun'];
        // $data['ta'] = substr($data['tasm'], 0, 4);

        $this->load->library('form_validation');
        $this->load->model('Master_kd_model', 'master_kd');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Master KD';
            $data['home'] = 'Rapor_Master';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;       
            $data['kelas'] = $this->master_kd->get_kelas();

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_master/master_kd/master_kd_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/master_kd/master_kd_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/master_kd/master_kd_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function input_kd($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Master KD';
            $data['home'] = 'Rapor_Master';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;       
            $data['tampil'] = $this->master_kd->get_detail($id);
            $data['kd'] = $this->master_kd->get_kd($id);
            $data['mapel'] = $this->master_kd->get_mapel();

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_master/master_kd/master_kd_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/master_kd/master_kd_input', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/master_kd/master_kd_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function detail($id, $target)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Master KD';
            $data['home'] = 'Rapor_Master';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;       
            $data['tampil'] = $this->master_kd->get_detail($id);
            $data['kd'] = $this->db->get_where("m_kd", ['id_mapel' => $target])->result_array();
            $data['mapel'] = $this->db->get_where("m_mapel", ['id' => $target])->result_array();

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_master/master_kd/master_kd_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/master_kd/master_kd_detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/master_kd/master_kd_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_p($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        // $data['p_jenis'] = array('' => '', 'P' => 'Pengetahuan', 'K' => 'Keterampilan');
        $data['p_no_kd'] = array('' => '', '3.1' => '3.1', '3.2' => '3.2', '3.3' => '3.3', '3.4' => '3.4', '3.5' => '3.5', '3.6' => '3.6', '3.7' => '3.7', '3.8' => '3.8', '3.9' => '3.9', '3.10' => '3.10', '3.11' => '3.11', '3.12' => '3.12', '3.13' => '3.13', '3.14' => '3.14', '3.15' => '3.15', '3.16' => '3.16', '3.17' => '3.17', '3.18' => '3.18', '3.19' => '3.19', '3.20' => '3.20');
        $data['tampil'] = $this->master_kd->get_detail($id);
        $data['mapel'] = $this->master_kd->get_mapel();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('akademik_master/master_kd/master_kd_css');
        $this->load->view('akademik_master/master_kd/master_kd_tambah_p', $data);
        $this->load->view('akademik_master/master_kd/master_kd_js');
    }

    public function tambah_k($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        // $data['p_jenis'] = array('' => '', 'P' => 'Pengetahuan', 'K' => 'Keterampilan');
        $data['p_no_kd'] = array('' => '', '4.1' => '4.1', '4.2' => '4.2', '4.3' => '4.3', '4.4' => '4.4', '4.5' => '4.5', '4.6' => '4.6', '4.7' => '4.7', '4.8' => '4.8', '4.9' => '4.9', '4.10' => '4.10', '4.11' => '4.11', '4.12' => '4.12', '4.13' => '4.13', '4.14' => '4.14', '4.15' => '4.15', '4.16' => '4.16', '4.17' => '4.17', '4.18' => '4.18', '4.19' => '4.19', '4.20' => '4.20');
        $data['tampil'] = $this->master_kd->get_detail($id);
        $data['mapel'] = $this->master_kd->get_mapel();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('akademik_master/master_kd/master_kd_css');
        $this->load->view('akademik_master/master_kd/master_kd_tambah_k', $data);
        $this->load->view('akademik_master/master_kd/master_kd_js');
    }

    public function edit($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $des_kd = $this->db->get_where('m_kd', ['id' => $id])->row_array();
        $mapel = $des_kd['id_mapel'];
        $data['des_kd'] = $this->db->get_where('m_kd', ['id' => $id])->row_array();
        // var_dump($data['des_kd']);
        // die;
        $data['p_jenis'] = array('' => '', 'P' => 'Pengetahuan', 'K' => 'Keterampilan');
        $data['mapel'] = $this->db->get_where("m_mapel", ['id' => $mapel])->row_array();

        $this->load->view('akademik_master/master_kd/master_kd_css');
        $this->load->view('akademik_master/master_kd/master_kd_edit', $data);
        $this->load->view('akademik_master/master_kd/master_kd_js');
        $this->benchmark->mark('code_end');
    }

    public function simpan_tambah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->master_kd->simpan_tambah();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Ubah Data ! </h5>
        </div>
        ');
        $kelas = $this->input->post('kelas');
        $id_mapel = $this->input->post('id_mapel');
        redirect('akademik_master/master_kd/detail/' . $kelas . '/' . $id_mapel);
    }

    public function del($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data = ['id' => $id];
        $this->db->delete('m_kd', $data);
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Ubah Data ! </h5>
        </div>
        ');
        $kelas = $this->input->post('kelas');
        $id_mapel = $this->input->post('id_mapel');
        redirect('akademik_master/master_kd/detail/' . $kelas . '/' . $id_mapel);
    }
}
