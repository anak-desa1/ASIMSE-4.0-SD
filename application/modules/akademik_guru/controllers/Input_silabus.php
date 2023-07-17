<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_silabus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Input_silabus_model', 'input_silabus');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input SILABUS';
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
           
            $data['tampil'] = $this->input_silabus->get_tampil();
            // var_dump($data['tampil']);
            // die;

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru/input_silabus/input_silabus_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru/input_silabus/input_silabus_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru/input_silabus/input_silabus_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah()
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
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data'] = $this->input_silabus->get_tambah(); 
        $data['kelas'] = $this->input_silabus->get_kelas(); 
        // var_dump($data['kelas']);
        // die;
        $this->load->view('akademik_guru/input_silabus/input_silabus_css');
        $this->load->view('akademik_guru/input_silabus/input_silabus_add', $data);
        $this->load->view('akademik_guru/input_silabus/input_silabus_js');
    }   
   
    public function silabus_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_silabus->silabus_simpan();
        redirect('akademik_guru/input_silabus');
    }   

    public function edit_silabus($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['tahun'] = substr($data['tasm'], 0, 4);
        $data['semester'] = substr($data['tasm'], -1, 1);
        
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data'] = $this->input_silabus->get_tambah();
        $data['silabus'] = $this->db->get_where('t_mapel_silabus', ['id_silabus' => $id])->row_array();
        
        $this->load->view('akademik_guru/input_silabus/input_silabus_css');
        $this->load->view('akademik_guru/input_silabus/input_silabus_edit', $data);
        $this->load->view('akademik_guru/input_silabus/input_silabus_js');
        $this->benchmark->mark('code_end');
    }

    public function silabus_ubah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_silabus->silabus_ubah();
        redirect('akademik_guru/input_silabus');
    }

    public function cetak_silabus($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data'] = $this->input_silabus->get_tambah();
        $data['silabus'] = $this->db->get_where('t_mapel_silabus', ['id_silabus' => $id])->row_array();
      
        $this->load->view('akademik_guru/input_silabus/input_silabus_css');
        $this->load->view('akademik_guru/input_silabus/input_silabus_cetak', $data);
        $this->load->view('akademik_guru/input_silabus/input_silabus_js');
        $this->benchmark->mark('code_end');
    }

    public function del_silabus($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['tahun'] = substr($data['tasm'], 0, 4);
        $data['semester'] = substr($data['tasm'], -1, 1);
        
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data'] = $this->input_silabus->get_tambah();
        $data['silabus'] = $this->db->get_where('t_mapel_silabus', ['id_silabus' => $id])->row_array();
        
        $this->load->view('akademik_guru/input_silabus/input_silabus_css');
        $this->load->view('akademik_guru/input_silabus/input_silabus_delete', $data);
        $this->load->view('akademik_guru/input_silabus/input_silabus_js');
        $this->benchmark->mark('code_end');
    }

    public function del()
    {
        $id = $this->input->post('id_silabus', true);
        $data = ['id_silabus' => $id];
        $this->db->delete('t_mapel_silabus', $data);
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        redirect('akademik_guru/input_silabus');
    }

}
