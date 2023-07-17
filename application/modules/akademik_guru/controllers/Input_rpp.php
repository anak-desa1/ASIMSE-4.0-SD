<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_rpp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Input_rpp_model', 'input_rpp');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input RPP';
            $data['home'] = 'Rapor Guru';
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
            // $tahun = substr($data['tasm'], 0, 4);
            $data['tampil'] = $this->input_rpp->get_tampil();
            // var_dump($data['tampil']);
            // die;
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru/input_rpp/input_rpp_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru/input_rpp/input_rpp_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru/input_rpp/input_rpp_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }    

    public function detail($id,$target)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input RPP';
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

            $data['data'] = $this->input_rpp->get_detail($target);
            $data['rpp'] = $this->input_rpp->get_rpp($id);
            $data['silabus'] = $this->db->get_where('t_mapel_silabus', ['id_silabus' => $id])->row_array();
            $data['silabus_data'] = $this->db->get_where('t_mapel_silabus')->result_array();
            // var_dump($data['rpp']);
            // die;

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru/input_rpp/input_rpp_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru/input_rpp/input_rpp_detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru/input_rpp/input_rpp_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_rpp($id)
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
        $data['silabus'] = $this->db->get_where('t_mapel_silabus', ['id_silabus' => $id])->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        // var_dump($data['silabus']);
        // die;
        $this->load->view('akademik_guru/input_rpp/input_rpp_css');
        $this->load->view('akademik_guru/input_rpp/input_rpp_add', $data);
        $this->load->view('akademik_guru/input_rpp/input_rpp_js');
    }   
   
    public function rpp_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_rpp->rpp_simpan();
        $id_silabus = $this->input->post('id_silabus');
        $tingkat = $this->input->post('tingkat');
        redirect('akademik_guru/input_rpp/detail/' . $id_silabus . '/' . $tingkat . '');
    }
    
    public function cetak_rpp($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $data['rpp'] = $this->db->get_where('t_mapel_rpp', ['id_rpp' => $id])->row_array();
        $rpp = $this->db->get_where('t_mapel_rpp', ['id_rpp' => $id])->row_array();
        $id = $rpp['id_silabus'];
        $data['silabus'] = $this->db->get_where('t_mapel_silabus', ['id_silabus' => $id])->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        // var_dump($data['rpp_plus']);
        // die;
        $this->load->view('akademik_guru/input_rpp/input_rpp_css');
        $this->load->view('akademik_guru/input_rpp/input_rpp_cetak', $data);
        $this->load->view('akademik_guru/input_rpp/input_rpp_js');
        $this->benchmark->mark('code_end');
    }

    public function edit_rpp($id)
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
        $data['rpp'] = $this->db->get_where('t_mapel_rpp', ['id_rpp' => $id])->row_array();
        $rpp = $this->db->get_where('t_mapel_rpp', ['id_rpp' => $id])->row_array();
        $id = $rpp['id_silabus'];
        $data['silabus'] = $this->db->get_where('t_mapel_silabus', ['id_silabus' => $id])->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        // var_dump($data['silabus']);
        // die;
        $this->load->view('akademik_guru/input_rpp/input_rpp_css');
        $this->load->view('akademik_guru/input_rpp/input_rpp_edit', $data);
        $this->load->view('akademik_guru/input_rpp/input_rpp_js');
    }   

    public function rpp_ubah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_rpp->rpp_ubah();      
        $id_silabus = $this->input->post('id_silabus');
        $tingkat = $this->input->post('tingkat');
        redirect('akademik_guru/input_rpp/detail/' . $id_silabus . '/' . $tingkat . '');
    }

    public function del_rpp($id)
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
        $data['rpp'] = $this->db->get_where('t_mapel_rpp', ['id_rpp' => $id])->row_array();
        $rpp = $this->db->get_where('t_mapel_rpp', ['id_rpp' => $id])->row_array();
        $id = $rpp['id_silabus'];
        $data['silabus'] = $this->db->get_where('t_mapel_silabus', ['id_silabus' => $id])->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        // var_dump($data['silabus']);
        // die;
        $this->load->view('akademik_guru/input_rpp/input_rpp_css');
        $this->load->view('akademik_guru/input_rpp/input_rpp_delete', $data);
        $this->load->view('akademik_guru/input_rpp/input_rpp_js');
    }

    public function del()
    {
        $id_rpp = $this->input->post('id_rpp', true); 
        $data = ['id_rpp' => $id_rpp];
        $this->db->delete('t_mapel_rpp', $data);
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        $id_silabus = $this->input->post('id_silabus');
        $tingkat = $this->input->post('tingkat');
        redirect('akademik_guru/input_rpp/detail/' . $id_silabus . '/' . $tingkat . '');
    }

}
