<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemetaan_kd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Pemetaan_kd_model', 'pemetaan_kd');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Pemetaan KD';
            $data['home'] = 'Laporan K13';
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

            $data['pendidik'] = $this->db->get_where('m_guru', ['stat_data' => 'A','jabatan' => 'Guru'])->result_array();
            // var_dump($data['kelas']);
            // die;  
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_laporan/pemetaan_kd/pemetaan_kd_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_laporan/pemetaan_kd/pemetaan_kd_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_laporan/pemetaan_kd/pemetaan_kd_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tabel_kd($id)
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tasm = substr($data['tasm'], 0, 4);
        $data['semester'] = substr($data['tasm'], -1, 1);
    
        $data['kd'] =
                $this->db->select('a.*,b.nama mapel')
                ->from('t_guru_mapel a')
                ->join('m_mapel b', 'a.id_mapel = b.id', 'left')
                ->where(['a.id_guru' => $id])
                ->where(['a.tasm' => $tasm])
                 ->get()->result_array();
        // var_dump($data['kd']);
        // die;
        $this->load->view('akademik_laporan/pemetaan_kd/pemetaan_kd_css');
        $this->load->view('akademik_laporan/pemetaan_kd/pemetaan_kd_table', $data);
        $this->load->view('akademik_laporan/pemetaan_kd/pemetaan_kd_js');
    }

    public function tabel_detail($id,$target,$mapel)
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = $get_tasm['tahun'];
        $tasm = substr($data['tasm'], 0, 4);
        $data['semester'] = substr($data['tasm'], -1, 1);

        $data['mapel'] =
            $this->db->select('a.*,b.nama mapel')
            ->from('t_guru_mapel a')
            ->join('m_mapel b', 'a.id_mapel = b.id', 'left')
            ->where(['a.id_guru' => $id])
            ->where(['a.id_mapel' => $mapel])
            ->where(['a.tasm' => $tasm])
            ->get()->row_array();
    
        $data['kd'] =
                $this->db->select('a.*')
                ->from('t_mapel_kd a')
                ->join('t_guru_mapel b', 'a.id_mapel = b.id_mapel', 'left')
                ->where(['a.id_guru' => $id])
                ->where(['a.tingkat' => $target])
                ->where(['a.id_mapel' => $mapel])
                ->where(['a.tasm' => $tahun])
                ->group_by(['a.kd_id'])
                 ->get()->result_array();
        // var_dump($data['kd']);
        // die;
        $this->load->view('akademik_laporan/pemetaan_kd/pemetaan_kd_detail', $data);
    }
}
