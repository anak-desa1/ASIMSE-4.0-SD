<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_sikap extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();

        $data['url'] = "akademik_walikelas/nilai_sikap";
        $data['idnya'] = "setmapel";
        $data['nama_form'] = "f_nilai_sso";

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Nilai_sikap_model', 'nilai_sikap');
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
            $data['kelas'] = $this->nilai_sikap->get_kelas_data();
            $data['tampil_sikap'] = $this->nilai_sikap->tampil_sikap();
            // var_dump($data['tampil_sikap']);
            // die;
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 0, 4);       

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function add_sikap()
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
            $data['ta'] = substr($data['tasm'], 0, 4);

            $data['kelas'] = $this->nilai_sikap->get_kelas_data();
            $data['siswa_kelas'] = $this->nilai_sikap->get_siswa_data();
            // var_dump($data['tasm']);
            // die;
            // $data['p_dimensi'] = array('Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia' => 'Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia', 'Mandiri' => 'Mandiri', 'Bergotong royong' => 'Bergotong royong', 'Kreatif' => 'Kreatif', 'Bernalar Kritis' => 'Bernalar Kritis', 'Berkebinekaan global' => 'Berkebinekaan global');
            $data['p_dimensi'] = array( '1' => 'Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia' ,'2' => 'Mandiri', '3' => 'Bergotong royong' ,'4' => 'Kreatif' , '5' => 'Bernalar Kritis' , '6' => 'Berkebinekaan global' );
          
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_add', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function save_sikap()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_sikap->save_sikap();
        // var_dump($this->nilai_sikap_sp->simpan_nilai());
        // die;
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Nilai Sikap ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_sikap');
    }

    public function edit_sikap($id,$tasm)
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
            $data['ta'] = substr($data['tasm'], 0, 4);

            $data['kelas'] = $this->nilai_sikap->get_kelas_edit($id,$tasm);
            $data['siswa_kelas'] = $this->nilai_sikap->get_siswa_edit($id,$tasm);
            $data['tampil_sikap'] = $this->nilai_sikap->tampil_sikap_edit($id,$tasm);
          
            // var_dump($data['tampil_sikap']);
            // die;
            // $data['p_dimensi'] = array('Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia' => '1', 'Mandiri' => '2', 'Bergotong royong' => '3', 'Kreatif' => '4', 'Bernalar Kritis' => '5', 'Berkebinekaan global' => '6');
          
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_edit', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function update_sikap()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_sikap->update_sikap();
        // var_dump($this->nilai_sikap_sp->simpan_nilai());
        // die;
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Memperbaiki Nilai Sikap ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_sikap');
    }

    public function delete_sikap($id,$tasm)
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
            $data['ta'] = substr($data['tasm'], 0, 4);

            $data['kelas'] = $this->nilai_sikap->get_kelas_edit($id,$tasm);
            $data['siswa_kelas'] = $this->nilai_sikap->get_siswa_edit($id,$tasm);
            $data['tampil_sikap'] = $this->nilai_sikap->tampil_sikap_edit($id,$tasm);
          
            // var_dump($data['tampil_sikap']);
            // die;
            // $data['p_dimensi'] = array('Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia' => '1', 'Mandiri' => '2', 'Bergotong royong' => '3', 'Kreatif' => '4', 'Bernalar Kritis' => '5', 'Berkebinekaan global' => '6');
          
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_delete', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_sikap/nilai_sikap_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function delete_sikap_data()
    {
        $id = $_POST['id'];
        $this->db->where_in('id', $id);
        $this->db->delete('t_nilai_sikap');
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_sikap');
    }  
    
}
