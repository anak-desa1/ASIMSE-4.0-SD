<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persiapan_jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('PersiapanJabatan_model', 'jabatan');
    }

    public function index()
    {
        $this->form_validation->set_rules('jenis_jabatan', 'Jabatan', 'required');

        if ($this->form_validation->run() == false) {

            $this->benchmark->mark('code_start');
            $data['title'] = 'Jabatan';
            $data['home'] = 'Persiapan';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $this->load->view('layout/header-top');
            $this->load->view('data_persiapan/persiapan_jabatan/list_css');
            $this->load->view('layout/header-bottom');
            $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_persiapan/persiapan_jabatan/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('data_persiapan/persiapan_jabatan/list_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $data =
                [
                    'departemen_id' => $this->input->post('departemen_id'),
                    'jenis_jabatan' => $this->input->post('jenis_jabatan'),
                ];
            $this->db->insert('access_jabatan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Berhasil Tambah Data !</div>');
            redirect('data_persiapan/persiapan_jabatan');
        }
    }

    public function tampildata()
    {
        cek_post();
        $list = $this->jabatan->tampildata();
        // var_dump($list);
        // die;
        $record = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;

            // tombol action - dicek juga punya akses apa engga gengs....
            $tombol_action = (cek_akses_user()['role_id'] == 1 ? '<a href="persiapan_jabatan/edit/' . $data['jabatan_id'] . '" class="btn btn-icon btn-light btn-hover-primary btn-sm"><i class="fas fa-edit text-warning"></i></a>' : '') .
                (cek_akses_user()['role_id'] == 1 ? ' <a href="persiapan_jabatan/delete/' . $data['jabatan_id'] . '" class="btn btn-icon btn-light btn-hover-primary btn-sm"> <i class="fas fa-trash text-danger"></i></a>' : '');
            // column buat data tables --

            $row = [
                'no' => $no,
                'jabatan_id' => $data['jabatan_id'],
                'departemen' => $data['departemen'],
                'jenis_jabatan' => $data['jenis_jabatan'],
                'action' => $tombol_action,
            ];
            $record[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->jabatan->count_all(),
            "recordsFiltered" => $this->jabatan->count_filtered(),
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
        $data['departemen'] = $this->jabatan->dataDepartemen();
        // var_dump($data['data_tahun']);
        // die;
        $this->load->view('data_persiapan/persiapan_jabatan/form_tambah', $data);
    }

    public function delete($id)
    {
        $data = ['jabatan_id' => $id];
        $this->db->delete('access_jabatan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Hapus Data !</div>');
        redirect('data_persiapan/persiapan_jabatan');
    }

    public function edit($id)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Jabatan';
        $data['home'] = 'Persiapan';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['jabatan'] = $this->jabatan->get_jabatan($id);
        $data['departemen'] = $this->jabatan->dataDepartemen();
        // var_dump($data['data_pegawai']);
        // die;
        $this->load->view('layout/header-top');
        $this->load->view('data_persiapan/persiapan_jabatan/list_css');
        $this->load->view('layout/header-bottom');
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('data_persiapan/persiapan_jabatan/form_edit', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('data_persiapan/persiapan_jabatan/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function update()
    {
        $jabatan_id = $this->input->post('jabatan_id', true);
        $departemen_id = $this->input->post('departemen_id', true);
        $jenis_jabatan = $this->input->post('jenis_jabatan', true);

        $data =
            [
                'departemen_id' => $departemen_id,
                'jenis_jabatan' => $jenis_jabatan,
            ];

        $this->db->where("jabatan_id", $jabatan_id);
        $this->db->update('access_jabatan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Ubah Data !</div>');
        redirect('data_persiapan/persiapan_jabatan');
    }
}
