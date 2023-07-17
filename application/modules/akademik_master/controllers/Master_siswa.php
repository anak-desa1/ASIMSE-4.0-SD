<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Master_siswa_model', 'master_siswa');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Master Siswa';
            $data['home'] = 'Rapor_Master';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;       
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_master/master_siswa/master_siswa_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/master_siswa/master_siswa_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/master_siswa/master_siswa_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tampildata()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $tasm = $get_tasm['tahun'];
        $ta = substr($tasm, 0, 4);

        // var_dump($ta);
        // die;

        cek_post();
        $list = $this->master_siswa->tampildata();
        $record = array();
        $no = $_POST['start'];
        foreach ($list as $data)
            if ($data['th_active'] == $ta) {
                $no++;

                // tombol action - dicek juga punya akses apa engga gengs....
                $tombol_action = (cek_akses_user()['role_id'] == 1 ? '<a href="master_siswa/detail/' . $data['siswa_id'] . '" class="btn btn-xs btn-info"><i class="fa fa-print"></i> Detail</a>' : '');

                // column buat data tables --
                $row = [
                    'no' => $no,
                    // 'nama_campus' => $data['nama_campus'],
                    // 'nama_sekolah' => $data['nama_sekolah'],
                    'kelas' => $data['tingkat'],
                    'th_active' => $data['th_active'],
                    'nis' => $data['nis'],
                    'nisn' => $data['nisn'],
                    'nama' => $data['nama'],
                    'jk' => $data['jk'],
                    'action' => $tombol_action,
                ];
                $record[] = $row;
            }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->master_siswa->count_all(),
            "recordsFiltered" => $this->master_siswa->count_filtered(),
            "data" => $record,
        );
        //output to json format
        echo json_encode($output);
    }

    public function detail($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Master Siswa';
            $data['home'] = 'Rapor_Master';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['data'] = $this->master_siswa->get_tampil($id);
            // var_dump($data['data_pegawai']);
            // die;       
            $data['p_jk']  = array("" => "Jns Kel", "L" => "Laki-laki", "P" => "Perempuan");
            $data['p_agama']  = array("" => "Agama", "Islam" => "Islam", "Katolik" => "Katolik", "Kristen" => "Kristen", "Hindu" => "Hindu", "Budha" => "Budha", "Konghucu" => "Konghucu");
            $data['p_status_anak']  = array("" => "Status Anak", "AK" => "Anak Kandung", "Anak Tiri" => "Anak Tiri");
            $data['p_diterima_kelas']  = $this->db->get('m_kelas')->result_array();
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_master/master_siswa/master_siswa_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/master_siswa/master_siswa_detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/master_siswa/master_siswa_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }
}
