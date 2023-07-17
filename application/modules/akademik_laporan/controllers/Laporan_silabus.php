<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_silabus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Laporan_silabus_model', 'laporan_silabus');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Laporan Silabus';
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

            $data['kelas'] = $this->laporan_silabus->get_kelas();
            // var_dump($data['tahun']);
            // die;  
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_laporan/laporan_silabus/laporan_silabus_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_laporan/laporan_silabus/laporan_silabus_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_laporan/laporan_silabus/laporan_silabus_js');
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

    public function tabel_silabus($id, $target)
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tasm = substr($data['tasm'], 0, 4);
        $data['semester'] = substr($data['tasm'], -1, 1);
    
        $data['silabus'] =
                $this->db->select('a.*,c.nama mapel')
                ->from('t_mapel_silabus a')
                ->join('t_guru_mapel b', 'a.id_guru = b.id_guru', 'left')
                ->join('m_mapel c', 'b.id_mapel = c.id', 'left')                
                ->where(['a.tingkat' => $id])
                ->where(['a.id_guru' => $target])
                ->where(['a.tasm' => $tasm])
                             
                ->group_by('a.id_silabus', 'ASC')
                 ->get()->result_array();
        // var_dump($data['silabus']);
        // die;
        $this->load->view('akademik_laporan/laporan_silabus/laporan_silabus_css');
        $this->load->view('akademik_laporan/laporan_silabus/laporan_silabus_table', $data);
        $this->load->view('akademik_laporan/laporan_silabus/laporan_silabus_js');
    }

    public function cetak_silabus($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['silabus'] = $this->db->get_where('t_mapel_silabus', ['id_silabus' => $id])->row_array();
      
        $this->load->view('akademik_laporan/laporan_silabus/laporan_silabus_css');
        $this->load->view('akademik_laporan/laporan_silabus/laporan_silabus_detail', $data);
        $this->load->view('akademik_laporan/laporan_silabus/laporan_silabus_js_detail');
        $this->benchmark->mark('code_end');
    }
}
