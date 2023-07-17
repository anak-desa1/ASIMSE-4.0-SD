<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_kkm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Atur_kkm_model', 'atur_kkm');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'SetUp Walikelas';
            $data['home'] = 'Rapor_Rombel';
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

            $data['kelas'] = $this->atur_kkm->get_kelas();
            $data['guru'] = $this->atur_kkm->get_gururombel();

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_rombel/atur_kkm/atur_kkm_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_rombel/atur_kkm/atur_kkm_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_rombel/atur_kkm/atur_kkm_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function detail($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'SetUp Walikelas';
            $data['home'] = 'Rapor_Rombel';
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

            $data['tampil'] = $this->atur_kkm->get_detail($id);
            $data['kkm'] = $this->atur_kkm->get_kkm($id);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_rombel/atur_kkm/atur_kkm_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_rombel/atur_kkm/atur_kkm_detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_rombel/atur_kkm/atur_kkm_js');
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

        $data['tampil'] = $this->atur_kkm->get_detail($id);
        $data['mapel'] = $this->db->get('m_mapel')->result_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('akademik_rombel/atur_kkm/atur_kkm_css');
        $this->load->view('akademik_rombel/atur_kkm/atur_kkm_tambah', $data);
        $this->load->view('akademik_rombel/atur_kkm/atur_kkm_js');
    }

    function add_ajax_sekolah($id_cam)
    {
        $query = $this->db->get_where('l_sekolah', array('kd_campus' => $id_cam));
        $data = "<option value=''>- Select sekolah -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->kd_sekolah . "'>" . $value->nama_sekolah . "</option>";
        }
        echo $data;
    }

    function add_ajax_guru($id_mapel)
    {
        $query = $this->db->get_where('m_mapel', array('kd_sekolah' => $id_mapel));
        $data = "<option value=''>- Select Mapel -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }

    public function simpan_kkm()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->atur_kkm->simpan_kkm();
    }

    public function del($id)
    {
        $data = ['id' => $id];
        // var_dump($data);
        // die;
        $this->db->delete('t_kkm', $data);
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        $kelas = $this->input->post('kelas');
        redirect('akademik_rombel/atur_kkm/detail/' . $kelas);
    }

    public function edit($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kkm'] = $this->db->select('tk.*,s.nama nmmapel,s.kd_singkat')
            ->from('t_kkm tk')
            ->join('m_mapel s', 'tk.id_mapel = s.id', 'left')
            ->where(['tk.id' => $id])
            ->get()->row_array();

        $this->load->view('akademik_rombel/atur_kkm/atur_kkm_css');
        $this->load->view('akademik_rombel/atur_kkm/atur_kkm_edit', $data);
        $this->load->view('akademik_rombel/atur_kkm/atur_kkm_js');
        $this->benchmark->mark('code_end');
    }


    public function ubah_kkm()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->atur_kkm->ubah_kkm();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Ubah Nilai ! </h5>
        </div>
        ');
        $kelas = $this->input->post('kelas');
        redirect('akademik_rombel/atur_kkm/detail/' . $kelas);
    }
}
