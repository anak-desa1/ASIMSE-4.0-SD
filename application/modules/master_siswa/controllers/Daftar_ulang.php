<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_ulang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Daftar_ulang_model', 'daftar_ulang');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Daftar Ulang';
            $data['home'] = 'Master Data';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            // var_dump($data['data_pegawai']);
            // die;
            $this->load->view('layout/header-top');
            $this->load->view('master_siswa/daftar_ulang/daftar_ulang_css');
            $this->load->view('layout/header-bottom');
            $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('master_siswa/daftar_ulang/daftar_ulang_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('master_siswa/daftar_ulang/daftar_ulang_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }


    public function tampildata()
    {
        cek_post();
        $list = $this->daftar_ulang->tampildata();
        $record = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;

            // tombol action - dicek juga punya akses apa engga gengs....
            $tombol_action = (cek_akses_user()['role_id'] == 1 ?
                '<form action="' . base_url('master_siswa/daftar_ulang/update') . '" method="post" enctype="multipart/form-data">                    
                      <input type="hidden" name="id" value="' . $data['id'] . '">
                      <input type="hidden" name="kd_campus" value="' . $data['kd_campus'] . '">
                      <input type="hidden" name="tingkat" value="' . $data['tingkat'] . '">
            <button type="submit" class="badge badge-primary btn-edit">Proses</button>
            </form>' : '');

            // column buat data tables --
            $row = [
                'no' => $no,
                'nis' => $data['nis'],
                'nama' => $data['nama'],
                'jk' => $data['jk'],
                'tgl_lahir' => $data['tgl_lahir'],
                'action' => $tombol_action,
            ];
            $record[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->daftar_ulang->count_all(),
            "recordsFiltered" => $this->daftar_ulang->count_filtered(),
            "data" => $record,
        );
        //output to json format
        echo json_encode($output);
    }

    public function update()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->daftar_ulang->update();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Proses Daftar Ulang Berhasil !</div>');
        redirect('master_siswa/daftar_ulang');
    }
}
