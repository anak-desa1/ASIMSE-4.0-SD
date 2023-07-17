<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_atp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Laporan_atp_model', 'laporan_atp');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Laporan ATP';
            $data['home'] = 'Laporan KM';
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

            $data['kelas'] = $this->laporan_atp->get_kelas();
            // var_dump($data['tahun']);
            // die;  
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_laporan_km/laporan_atp/laporan_atp_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_laporan_km/laporan_atp/laporan_atp_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_laporan_km/laporan_atp/laporan_atp_js');
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

    public function tabel_atp($id, $target)
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tasm = substr($data['tasm'], 0, 4);
        $tahun = $get_tasm['tahun'];
        $data['semester'] = substr($data['tasm'], -1, 1);
    
        $data['atp'] =
                $this->db->select('a.*,d.nama mapel')
                ->from('t_mapel_atp a')
                ->join('t_mapel_sumatif b', 'a.no_sumatif = b.sumatif_id', 'left')
                ->join('t_guru_mapel c', 'a.id_mapel = c.mapel_id', 'left')
                ->join('m_mapel d', 'c.id_mapel = d.id', 'left')                
                ->where(['a.tingkat' => $id])
                ->where(['a.id_guru' => $target])
                ->where(['a.tasm' => $tahun])
                ->group_by('a.atp_id', 'ASC')
                ->get()->result_array();
        // var_dump($data['atp']);
        // die;
        $this->load->view('akademik_laporan_km/laporan_atp/laporan_atp_css');
        $this->load->view('akademik_laporan_km/laporan_atp/laporan_atp_table', $data);
        $this->load->view('akademik_laporan_km/laporan_atp/laporan_atp_js');
    }

    public function cetak_atp($id, $target)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();        
        
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tasm = substr($data['tasm'], 0, 4);
        $tahun = $get_tasm['tahun'];
        $data['semester'] = substr($data['tasm'], -1, 1);

        $data['data'] = $this->db->select('a.*,c.mapel_id,d.nama mapel,e.nama_guru')
                ->from('t_mapel_atp a')
                ->join('t_mapel_sumatif b', 'a.no_sumatif = b.sumatif_id', 'left')
                ->join('t_guru_mapel c', 'a.id_mapel = c.mapel_id', 'left')
                ->join('m_mapel d', 'c.id_mapel = d.id', 'left') 
                ->join('m_guru e', 'c.id_guru = e.nip', 'left')               
                ->where(['a.id_mapel' => $id])
                ->where(['a.id_guru' => $target])
                ->where(['a.tasm' => $tahun])
                ->group_by('a.atp_id', 'ASC')
                ->get()->row_array();

        $data['atp'] =
                $this->db->select('a.*,d.nama mapel')
                ->from('t_mapel_atp a')
                ->join('t_mapel_sumatif b', 'a.no_sumatif = b.sumatif_id', 'left')
                ->join('t_guru_mapel c', 'a.id_mapel = c.mapel_id', 'left')
                ->join('m_mapel d', 'c.id_mapel = d.id', 'left')                
                ->where(['a.id_mapel' => $id])
                ->where(['a.id_guru' => $target])
                ->where(['a.tasm' => $tahun])
                ->group_by('a.atp_id', 'ASC')
                ->get()->result_array();
        // var_dump($data['atp']);
        // die;

        $this->load->view('akademik_laporan_km/laporan_atp/laporan_atp_css');
        $this->load->view('akademik_laporan_km/laporan_atp/laporan_atp_detail', $data);
        $this->load->view('akademik_laporan_km/laporan_atp/laporan_atp_js_detail');
        $this->benchmark->mark('code_end');
    }
}
