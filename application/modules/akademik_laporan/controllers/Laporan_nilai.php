<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Laporan_nilai_model', 'laporan_nilai');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Laporan Nilai';
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
            $data['kelas'] = $this->laporan_nilai->get_kelas();
            // var_dump($data['kelas']);
            // die;  
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_laporan/laporan_nilai/laporan_nilai_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_laporan/laporan_nilai/laporan_nilai_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_laporan/laporan_nilai/laporan_nilai_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    function add_ajax_pendidik($id_kelas)
    {
        $query =  $this->db->select('a.*,b.nama_guru')
            ->from('t_guru_mapel a')
            ->join('m_guru b','a.id_guru = b.nip')
            ->where(['a.id_kelas' => $id_kelas])
            ->group_by('id_guru', 'ASC')
            ->get();
                   
        $data = "<option value=''>- Select Pendidik -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id_guru . "'>" . $value->nama_guru . "</option>";
        }
        echo $data;
    }

    public function tabel_nilai($id,$target)
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];
        $data['semester'] = substr($data['tasm'], -1, 1);

        $data['mapel'] =
            $this->db->select('a.*,b.nama mapel')
            ->from('t_guru_mapel a')
            ->join('m_mapel b', 'a.id_mapel = b.id', 'left')
            ->where(['a.id_kelas' => $id])
            ->where(['a.id_guru' => $target])
            ->where(['a.tasm' => $tahun])
            ->get()->result_array();
        // var_dump( $data['mapel']);
        // die;

        $this->load->view('akademik_laporan/laporan_nilai/laporan_nilai_table', $data);
    }

    public function nilai_pas($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input Nilai';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['data'] = $this->laporan_nilai->detil_guru($id);
            $data['siswa'] = $this->laporan_nilai->get_detailsiswa($id);
            $data['header'] = $this->laporan_nilai->get_detailnilai($id);
            $data['nilai'] = $this->laporan_nilai->get_detailnilai($id);
           
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 4);
            $data['tahun'] = substr($data['tasm'], 0, 4);
            $data['semester'] = substr($data['tasm'], -1, 1);
           
            $this->load->view('akademik_laporan/laporan_nilai/laporan_nilai_css');
            $this->load->view('akademik_laporan/laporan_nilai/nilai_asesmen_v', $data);
            $this->load->view('akademik_laporan/laporan_nilai/laporan_nilai_js');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

}
