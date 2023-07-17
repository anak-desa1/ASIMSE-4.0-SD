<?php
defined('BASEPATH') or exit('No direct script access allowed');

class All_pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('All_pegawai_model', 'master_data');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Data Pegawai';
            $data['home'] = 'Master Data';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            // var_dump($data['data_pegawai']);
            // die;
            $this->load->view('layout/header-top');
            $this->load->view('master_pegawai/all_pegawai/all_pegawai_css');
            $this->load->view('layout/header-bottom');
            $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('master_pegawai/all_pegawai/all_pegawai', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('master_pegawai/all_pegawai/all_pegawai_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tampildata()
    {
        cek_post();
        $list = $this->master_data->tampildata();
        // var_dump($list);
        // die;
        $record = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;
            // tombol action - dicek juga punya akses apa engga gengs....
            // $tombol_action = (cek_akses_user()['role_id'] == 1 ? '<a href="" class="btn btn-icon btn-light btn-hover-primary btn-sm"></a>' : '');
            // column buat data tables --
            $row = [
                'no' => $no,
                'departemen' => $data['departemen'],
                'jenis_jabatan' => $data['jenis_jabatan'],
                'lokasi' => $data['lokasi'],
                'nik' => $data['nik'],
                'nama_lengkap' => $data['nama_lengkap'],
                'telp' => $data['telp'],
                'email_pribadi' => $data['email_pribadi'],
                'tgl_masuk' => $data['tgl_masuk'],
                // 'action' => $tombol_action,
            ];
            $record[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->master_data->count_all(),
            "recordsFiltered" => $this->master_data->count_filtered(),
            "data" => $record,
        );
        //output to json format
        echo json_encode($output);
    }
}
