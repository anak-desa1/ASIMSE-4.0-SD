<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persiapan_tempat_tugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('PersiapanTempatTugas_model', 'tempat');
    }

    public function index()
    {
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('kode_lokasi', 'Kode Lokasi', 'required');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Tempat Tugas';
            $data['home'] = 'Persiapan';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $this->load->view('layout/header-top');
            $this->load->view('data_persiapan/persiapan_tempat_tugas/list_css');
            $this->load->view('layout/header-bottom');
            $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_persiapan/persiapan_tempat_tugas/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('data_persiapan/persiapan_tempat_tugas/list_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $data =
                [
                    'jabatan_id' => $this->input->post('jabatan_id'),
                    'lokasi' => $this->input->post('lokasi'),
                    'kode_lokasi' => $this->input->post('kode_lokasi'),
                ];
            $this->db->insert('access_lokasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Ditambahkan!</div>');
            redirect('data_persiapan/persiapan_tempat_tugas');
        }
    }

    public function tampildata()
    {
        cek_post();
        $list = $this->tempat->tampildata();
        // var_dump($list);
        // die;
        $record = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;

            // tombol action - dicek juga punya akses apa engga gengs....
            $tombol_action = (cek_akses_user()['role_id'] == 1 ? '<a href="Persiapan_tempat_tugas/edit/' . $data['lokasi_id'] . '" class="btn btn-icon btn-light btn-hover-primary btn-sm"><i class="fas fa-edit text-warning"></i></a>' : '') .
                (cek_akses_user()['role_id'] == 1 ? ' <a href="Persiapan_tempat_tugas/delete/' . $data['lokasi_id'] . '" class="btn btn-icon btn-light btn-hover-primary btn-sm"> <i class="fas fa-trash text-danger"></i></a>' : '');
            // column buat data tables --

            $row = [
                'no' => $no,
                'lokasi_id' => $data['lokasi_id'],
                'jenis_jabatan' => $data['jenis_jabatan'],
                'lokasi' => $data['lokasi'],
                'kode_lokasi' => $data['kode_lokasi'],
                'action' => $tombol_action,
            ];
            $record[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->tempat->count_all(),
            "recordsFiltered" => $this->tempat->count_filtered(),
            "data" => $record,
        );
        //output to json format
        echo json_encode($output);
    }

    public function tambah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['jabatan'] = $this->tempat->datajabatan();
        // var_dump($data['data_tahun']);
        // die;
        $this->load->view('data_persiapan/persiapan_tempat_tugas/form_tambah', $data);
    }

    public function delete($id)
    {
        $data = ['lokasi_id' => $id];
        $this->db->delete('access_lokasi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Data !</div>');
        redirect('data_persiapan/persiapan_tempat_tugas');
    }


    public function edit($id)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Tempat Tugas';
        $data['home'] = 'Persiapan';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['lokasi'] = $this->tempat->get_lokasi($id);
        $data['jabatan'] = $this->tempat->datajabatan();
        // var_dump($data['data_pegawai']);
        // die;
        $this->load->view('layout/header-top');
        $this->load->view('data_persiapan/Persiapan_tempat_tugas/list_css');
        $this->load->view('layout/header-bottom');
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('data_persiapan/Persiapan_tempat_tugas/form_edit', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('data_persiapan/Persiapan_tempat_tugas/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function update()
    {
        $lokasi_id = $this->input->post('lokasi_id', true);
        $jabatan_id = $this->input->post('jabatan_id', true);
        $lokasi = $this->input->post('lokasi', true);
        $kode_lokasi = $this->input->post('kode_lokasi', true);
        $data = [
            'jabatan_id' => $jabatan_id,
            'lokasi' => $lokasi,
            'kode_lokasi' => $kode_lokasi,
        ];
        $this->db->where('lokasi_id', $lokasi_id);
        $this->db->update('access_lokasi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Ubah Data !</div>');
        redirect('data_persiapan/persiapan_tempat_tugas');
    }
}
