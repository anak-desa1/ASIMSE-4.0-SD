<?php
ob_start();
// session_start();   
error_reporting(E_ALL & ~E_NOTICE);

defined('BASEPATH') or exit('No direct script access allowed');
// ob_start();
// session_start();

class Data_akses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Data_akses_model', 'akses');
    }

    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'User Access';
        $data['home'] = 'Access';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $this->load->view('layout/header-top', $data);
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('data_akses/akses', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('data_akses/akses_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tampildata()
    {
        cek_post();
        $list = $this->akses->tampildata();
        // var_dump($list);
        // die;
        $record = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;
            // tombol action - dicek juga punya akses apa engga gengs....
            $tombol_action = (cek_akses_user()['role_id'] == 1 ? '<a href="data_akses/active/' . $data['data_id'] . '" type="button" class="btn btn-success btn-hover-primary btn-sm">ON</a>' : '') .
                (cek_akses_user()['role_id'] == 1 ? ' <a href="data_akses/off_access/' . $data['nik'] . '" type="button" class="btn btn-danger btn-hover-primary btn-sm">OFF</a>' : '');

            // column buat data tables --
            $row = [
                'no' => $no,
                // 'departemen' => $data['departemen'],
                // 'jenis_jabatan' => $data['jenis_jabatan'],
                // 'lokasi' => $data['lokasi'],
                'email' => $data['email'],
                'nama_lengkap' => $data['nama_lengkap'],
                'is_active' => ($data['is_active'] == 1 ? "<i class='text-info'>User Aktif</i>" : "<i class='text-danger'>User Tidak Aktif</i>"),
                'role' => $data['role'],
                'action' => $tombol_action,
            ];
            $record[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->akses->count_all(),
            "recordsFiltered" => $this->akses->count_filtered(),
            "data" => $record,
        );
        //output to json format
        echo json_encode($output);
    }

    public function active($id)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Chec Access';
        $data['home'] = 'User Access';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data_pegawai'] = $this->akses->get_Data($id);
        $data['role'] = $this->akses->get_access();
        // var_dump($data['data_tahun']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('data_akses/akses_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('data_akses/active_access', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('data_akses/akses_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function active_access()
    {
        $nik = $this->input->post('nik');
        // $departemen_id = $this->input->post('departemen_id');
        // $jabatan_id = $this->input->post('jabatan_id');
        // $lokasi_id = $this->input->post('lokasi_id');
        $nama_pegawai = $this->input->post('nama_lengkap');
        $email_pegawai = $this->input->post('email');
        $role_id =  $this->input->post('id');
        $is_active = $this->input->post('is_active');
        $data = [
            'nik' => $nik,
            'nama_pegawai' =>  $nama_pegawai,
            'email_pegawai ' => $email_pegawai,
            'password' => password_hash('12345678', PASSWORD_DEFAULT),
            'role_id' => $role_id,
            'img' => 'default.jpg',
            'is_active' => $is_active,
        ];
        $this->db->insert('pegawai', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed !!!</div>');
        redirect('data_akses');
    }


    public function off_access($id)
    {
        $data = ['nik' => $id];
        $this->db->delete('pegawai', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Off !!!</div>');
        redirect('data_akses');
    }
}
