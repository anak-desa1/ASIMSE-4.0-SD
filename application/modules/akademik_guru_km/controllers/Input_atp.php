<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_atp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Input_atp_model', 'input_atp');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input ATP';
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

            $data['tampil'] = $this->input_atp->get_tampil();
            // var_dump($data['tampil']);
            // die;

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru_km/input_atp/input_atp_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru_km/input_atp/input_atp_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru_km/input_atp/input_atp_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function detail($id, $target)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input ATP';
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

            $data['data'] = $this->input_atp->get_detailatp($id);
            $data['atp'] = $this->input_atp->get_atp($id, $target);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_guru_km/input_atp/input_atp_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru_km/input_atp/input_atp_detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru_km/input_atp/input_atp_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function cetak_atp($id, $target)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input ATP';
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

            $data['data'] = $this->input_atp->get_detailatp($id);
            $data['atp'] = $this->input_atp->get_atp($id, $target);
           
            $this->load->view('akademik_guru_km/input_atp/input_atp_cetak', $data);
           
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
        $data['data'] = $this->input_atp->get_tambahatp($id);
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['p_sumatif']  = $this->input_atp->get_sumatif($id);
        // var_dump($data['p_sumatif']);
        // die;
        $this->load->view('akademik_guru_km/input_atp/input_atp_css');
        $this->load->view('akademik_guru_km/input_atp/input_atp_add', $data);
        $this->load->view('akademik_guru_km/input_atp/input_atp_js');
    }   

    public function data_sumatif($id)
    {
        $data['sumatif'] =
            $this->db->select('*')
            ->from('t_mapel_sumatif')
            ->where(['sumatif_id' => $id])
            ->get()->result_array();
        $this->load->view('akademik_guru_km/input_atp/input_atp_data', $data);
    }
   
    public function atp_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_atp->atp_simpan();
        // var_dump($this->input_atp->kd_simpan());
        // die;        
        $mapel_id = $this->input->post('mapel_id');
        $tingkat = $this->input->post('tingkat');
        redirect('akademik_guru_km/input_atp/detail/' . $mapel_id . '/' . $tingkat . '');
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
        redirect('akademik_guru_km/input_atp/detail/' . $mapel_id . '/' . $id_kelas . '');
    }

    public function edit_atp($id)
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
        $data['atp'] = $this->db->get_where('t_mapel_atp', ['atp_id' => $id])->row_array();
        
        $this->load->view('akademik_guru_km/input_atp/input_atp_css');
        $this->load->view('akademik_guru_km/input_atp/input_atp_edit', $data);
        $this->load->view('akademik_guru_km/input_atp/input_atp_js');
        $this->benchmark->mark('code_end');
    }

    public function atp_ubah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->input_atp->atp_ubah();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil merubah data ! </h5>
        </div>
        ');
        $mapel_id = $this->input->post('id_mapel');
        $id_kelas = $this->input->post('tingkat');
        redirect('akademik_guru_km/input_atp/detail/' . $mapel_id . '/' . $id_kelas . '');
    }

}
