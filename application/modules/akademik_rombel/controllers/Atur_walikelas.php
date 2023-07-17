<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_walikelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Atur_walikelas_model', 'atur_walikelas');
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
            $ta = substr($data['tasm'], 0, 4);

            $data['kelas'] = $this->atur_walikelas->get_kelas($ta);
            $data['guru'] = $this->atur_walikelas->get_gururombel();

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_rombel/atur_walikelas/atur_walikelas_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_rombel/atur_walikelas/atur_walikelas_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_rombel/atur_walikelas/atur_walikelas_js');
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
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);
        $data['kelas'] = $this->atur_walikelas->get_kelasrombel($ta);
        $data['guru'] = $this->db->get('pegawai_data')->result_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('akademik_rombel/atur_walikelas/atur_walikelas_css');
        $this->load->view('akademik_rombel/atur_walikelas/atur_walikelas_tambah', $data);
        $this->load->view('akademik_rombel/atur_walikelas/atur_walikelas_js');
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

    function add_ajax_guru($id_gur)
    {
        $query = $this->db->get_where('pegawai', array('kd_sekolah' => $id_gur));
        $data = "<option value=''>- Select Guru -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->nik  . "'>" . $value->nama_pegawai . "</option>";
        }
        echo $data;
    }

    public function simpan_walikelas()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->atur_walikelas->simpan_walikelas();
    }

    public function del($id)
    {
        $data = ['wali_id' => $id];
        $this->db->delete('t_walikelas', $data);
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        redirect('akademik_rombel/atur_walikelas');
    }

    public function edit($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        $data['kelas'] = $this->atur_walikelas->get_kelasrombel();
        $data['campus'] = $this->atur_walikelas->get_campus();

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        // $data['walikelas'] = $this->db->get_where('t_walikelas', ['wali_id' => $id])->row_array();

        $data['walikelas'] = $this->db->select('k.*,s.nama_lengkap,s.foto')
            ->from('t_walikelas k')
            ->join('pegawai_data s', 'k.id_guru = s.nik', 'left')
            ->where(['k.wali_id' => $id])
            ->group_by('id_kelas', 'ASC')
            ->get()->row_array();

        $this->load->view('akademik_rombel/atur_walikelas/atur_walikelas_css');
        $this->load->view('akademik_rombel/atur_walikelas/atur_walikelas_edit', $data);
        $this->load->view('akademik_rombel/atur_walikelas/atur_walikelas_js');
        $this->benchmark->mark('code_end');
    }


    public function ubah_walikelas()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->atur_walikelas->ubah_walikelas();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Ubah Walikelas ! </h5>
        </div>
        ');
        redirect('akademik_rombel/atur_walikelas');
    }
}
