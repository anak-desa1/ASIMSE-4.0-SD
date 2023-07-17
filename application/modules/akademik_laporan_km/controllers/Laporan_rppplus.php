<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_rppplus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Laporan_rppplus_model', 'laporan_rppplus');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Laporan RPP+';
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

            $data['kelas'] = $this->laporan_rppplus->get_kelas();
            // var_dump($data['tahun']);
            // die;  
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_laporan_km/laporan_rppplus/laporan_rppplus_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_laporan_km/laporan_rppplus/laporan_rppplus_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_laporan_km/laporan_rppplus/laporan_rppplus_js');
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

    public function tabel_rppplus($id, $target)
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tasm = substr($data['tasm'], 0, 4);
        $tahun = $get_tasm['tahun'];
        $data['semester'] = substr($data['tasm'], -1, 1);
    
        $data['rppplus'] =
                $this->db->select('a.*,b.nama_sumatif,d.nama mapel')
                ->from('t_mapel_rpp_plus a')
                ->join('t_mapel_sumatif b', 'a.sumatif_id = b.sumatif_id', 'left')
                ->join('t_guru_mapel c', 'a.id_mapel = c.mapel_id', 'left')
                ->join('m_mapel d', 'c.id_mapel = d.id', 'left')                
                ->where(['a.tingkat' => $id])
                ->where(['a.id_guru' => $target])
                ->where(['a.tasm' => $tahun])
                ->group_by('a.id_rpp_plus', 'ASC')
                ->get()->result_array();
        // var_dump($data['rppplus']);
        // die;
        $this->load->view('akademik_laporan_km/laporan_rppplus/laporan_rppplus_css');
        $this->load->view('akademik_laporan_km/laporan_rppplus/laporan_rppplus_table', $data);
        $this->load->view('akademik_laporan_km/laporan_rppplus/laporan_rppplus_js');
    }

    public function cetak_rppplus($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['rppplus'] = $this->db->get_where('t_mapel_rpp_plus', ['id_rpp_plus' => $id])->row_array();
      
        $this->load->view('akademik_laporan_km/laporan_rppplus/laporan_rppplus_css');
        $this->load->view('akademik_laporan_km/laporan_rppplus/laporan_rppplus_detail', $data);
        $this->load->view('akademik_laporan_km/laporan_rppplus/laporan_rppplus_js_detail');
        $this->benchmark->mark('code_end');
    }
}
