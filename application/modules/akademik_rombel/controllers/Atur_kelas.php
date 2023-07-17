<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();

        $this->load->library('form_validation');
        $this->load->model('Atur_kelas_model', 'atur_kelas');
    }

    public function index()
    {

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'SetUp Kelas';
            $data['home'] = 'Rapor Rombel';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), ])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 0, 4);
            $ta = substr($data['tasm'], 0, 4);

            $data['tampil'] = $this->atur_kelas->get_tampil();
            $data['siswa'] = $this->atur_kelas->get_siswarombel($ta);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_rombel/atur_kelas/atur_kelas_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_rombel/atur_kelas/atur_kelas_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_rombel/atur_kelas/atur_kelas_js');
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

        $data['kelas'] = $this->db->get_where('m_kelas', [])->result_array();
        // var_dump($data['kelas']);
        // die;
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), ])->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        $this->load->view('akademik_rombel/atur_kelas/atur_kelas_css');
        $this->load->view('akademik_rombel/atur_kelas/atur_kelas_tambah', $data);
        $this->load->view('akademik_rombel/atur_kelas/atur_kelas_js');
    }

    function add_ajax_kelas($id_kel)
    {
        $query = $this->db->get_where('m_kelas', array('kd_sekolah' => $id_kel));
        $data = "<option value=''>- Select sekolah -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->tingkat  . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }

    public function tabel($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), ])->row_array();

        $data['siswa'] =
            $this->db->select('a.*,b.nama nm_kelas,c.nis,c.nama nm_siswa')
            ->from('m_naik_kelas a')
            ->join('m_kelas b', 'a.tingkat = b.tingkat', 'left')
            ->join('m_siswa c', 'a.nis = c.nis', 'left')
            ->where(['a.tingkat' => $id])
            ->where(['a.tingkat_active' => 0])
            ->group_by('c.nama', 'ASC')
            ->get()->result_array();

        // var_dump($data['siswa']);
        // die;
        $this->load->view('akademik_rombel/atur_kelas/atur_kelas_table', $data);
    }

    public function kelas_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->atur_kelas->kelas_simpan();

        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil tambah rombel ! </h5>
        </div>
        ');
        // $id_kelas = $this->input->post('id_kelas');
        redirect('akademik_rombel/atur_kelas');
    }

    public function aturrombel($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'SetUp Kelas';
            $data['home'] = 'Rapor Rombel';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), ])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 0, 4);

            $data['data'] = $this->atur_kelas->get_aturrombel($id);
            $data['siswa'] = $this->atur_kelas->get_siswa_at($id);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_rombel/atur_kelas/atur_kelas_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_rombel/atur_kelas/atur_kelas_aturrombel', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_rombel/atur_kelas/atur_kelas_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function del($id)
    {

        // $this->db->where('ta', $ta);
        $data = ['id' => $id];
        $this->db->delete('t_kelas_siswa', $data);

        $nis = $this->input->post('nis', true);
        $ta = $this->input->post('ta', true);
        $this->db->where('id_siswa', $nis);
        $this->db->where('tasm', $ta);
        $this->db->delete('t_nilai_p', $data);

        $nis = $this->input->post('nis', true);
        $data1 = ['tingkat_active' => 0];
        $this->db->where('nis', $nis);
        $this->db->update('m_naik_kelas', $data1);

        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        $id_kelas = $this->input->post('id_kelas');
        redirect('akademik_rombel/atur_kelas/aturrombel/' . $id_kelas);
    }

    public function rombel($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'SetUp Kelas';
            $data['home'] = 'Rapor Rombel';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), ])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 0, 4);

            $data['data'] = $this->atur_kelas->get_rombel($id);
            $data['siswa'] = $this->atur_kelas->get_siswa_r($id);
            // var_dump($data['data']);
            // die;

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_rombel/atur_kelas/atur_kelas_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_rombel/atur_kelas/atur_kelas_rombel', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_rombel/atur_kelas/atur_kelas_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }
}
