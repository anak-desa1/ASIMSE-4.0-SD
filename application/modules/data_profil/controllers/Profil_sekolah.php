<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        $this->load->library('form_validation');
        $this->load->model('ProfilSekolah_model', 'sekolah');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Profil Sekolah';
            $data['home'] = 'Profil';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sch'] = $this->sekolah->get_lokasi();
            $data['provinsi'] = $this->sekolah->get_all_provinsi();
            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_profil/profil_sekolah/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function data_sekolah()
    {
        $this->form_validation->set_rules('nss', 'NSS', 'required');
        $this->form_validation->set_rules('npsn', 'NPSN', 'required');
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Telepon', 'required');
        $this->form_validation->set_rules('kodepos', 'Kode Pos', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('web', 'Website', 'required');
        $this->form_validation->set_rules('sebutan_kepala', 'Kepala Sekolah', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');

        if ($this->form_validation->run() == false) {
        } else {

            $upload_image = $_FILES['logo'];
            //var_dump($upload_image);
            //die;
            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './panel/dist/upload/logo/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo')) {

                    $old_img = $this->input->post('old_image', true);
                    // var_dump($old_img);
                    // die;
                    if ($old_img != '') {
                        unlink(FCPATH . './panel/dist/upload/logo/' . $old_img);
                    }
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('logo', $new_img);
                } else {
                    echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                }
            }

            $sekolah_id = $this->input->post('sekolah_id');
            $cekh = $this->db->get_where('m_sekolah', ['sekolah_id' => $sekolah_id])->row_array();
            $data =
                [
                    'nss' => $this->input->post('nss'),
                    'npsn' => $this->input->post('npsn'),
                    'nama_sekolah' => $this->input->post('nama_sekolah'),
                    'alamat' => $this->input->post('alamat'),
                    'sekolah_provinsi_id' => $this->input->post('sekolah_provinsi_id'),
                    'sekolah_kota_id' => $this->input->post('sekolah_kota_id'),
                    'sekolah_kecamatan_id' => $this->input->post('sekolah_kecamatan_id'),
                    'telp' => $this->input->post('telp'),
                    'kodepos' => $this->input->post('kodepos'),
                    'email' => $this->input->post('email'),
                    'web' => $this->input->post('web'),
                    'sebutan_kepala' => $this->input->post('sebutan_kepala'),
                    'nip' => $this->input->post('nip'),
                    // 'kop_1' => $this->input->post('kop_1'),
                    // 'kop_2' => $this->input->post('kop_2'),
                    // 'instagram_src' => $this->input->post('instagram_src'),
                    // 'instagram_usrc' => $this->input->post('instagram_usrc'),
                    'is_active' => 1,
                    'is_active_psb' => 1,
                ];

            if ($cekh == 0) {
                $this->db->insert('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Tambah Data !</div>');
                redirect('data_profil/profil_sekolah');
            } else {
                $this->db->where('sekolah_id', $sekolah_id);
                $this->db->update('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Ubah Data !</div>');
                redirect('data_profil/profil_sekolah');
            }
        }
    }

    public function data_sejarah()
    {
        $this->form_validation->set_rules('sejarah', 'Sejarah', 'required');

        if ($this->form_validation->run() == false) {
        } else {

            $sekolah_id = $this->input->post('sekolah_id');
            $cekh = $this->db->get_where('m_sekolah', ['sekolah_id' => $sekolah_id])->row_array();
            $data =
                [
                    'sejarah' => $this->input->post('sejarah'),
                ];

            if ($cekh == 0) {
                $this->db->insert('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Tambah Data !</div>');
                redirect('data_profil/profil_sekolah');
            } else {
                $this->db->where('sekolah_id', $sekolah_id);
                $this->db->update('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Ubah Data !</div>');
                redirect('data_profil/profil_sekolah');
            }
        }
    }

    public function data_visi_misi()
    {
        $this->form_validation->set_rules('visi_misi', 'Visi dan Misi', 'required');

        if ($this->form_validation->run() == false) {
        } else {

            $sekolah_id = $this->input->post('sekolah_id');
            $cekh = $this->db->get_where('m_sekolah', ['sekolah_id' => $sekolah_id])->row_array();
            $data =
                [
                    'visi_misi' => $this->input->post('visi_misi'),
                ];

            if ($cekh == 0) {
                $this->db->insert('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Tambah Data !</div>');
                redirect('data_profil/profil_sekolah');
            } else {
                $this->db->where('sekolah_id', $sekolah_id);
                $this->db->update('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Ubah Data !</div>');
                redirect('data_profil/profil_sekolah');
            }
        }
    }

    public function data_mars()
    {
        $this->form_validation->set_rules('mars', 'Mars Sekolah', 'required');

        if ($this->form_validation->run() == false) {
        } else {

            $sekolah_id = $this->input->post('sekolah_id');
            $cekh = $this->db->get_where('m_sekolah', ['sekolah_id' => $sekolah_id])->row_array();
            $data =
                [
                    'mars' => $this->input->post('mars'),
                ];

            if ($cekh == 0) {
                $this->db->insert('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Tambah Data !</div>');
                redirect('data_profil/profil_sekolah');
            } else {
                $this->db->where('sekolah_id', $sekolah_id);
                $this->db->update('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Ubah Data !</div>');
                redirect('data_profil/profil_sekolah');
            }
        }
    }

    public function data_kurikulum()
    {
        $this->form_validation->set_rules('kurikulum', 'Kurikulum Sekolah', 'required');

        if ($this->form_validation->run() == false) {
        } else {

            $sekolah_id = $this->input->post('sekolah_id');
            $cekh = $this->db->get_where('m_sekolah', ['sekolah_id' => $sekolah_id])->row_array();
            $data =
                [
                    'kurikulum' => $this->input->post('kurikulum'),
                ];

            if ($cekh == 0) {
                $this->db->insert('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Tambah Data !</div>');
                redirect('data_profil/profil_sekolah');
            } else {
                $this->db->where('sekolah_id', $sekolah_id);
                $this->db->update('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Ubah Data !</div>');
                redirect('data_profil/profil_sekolah');
            }
        }
    }

    public function data_akreditasi()
    {
        $this->form_validation->set_rules('npsn', 'NPSN', 'required');

        if ($this->form_validation->run() == false) {
        } else {

            $upload_image = $_FILES['akreditasi'];
            //var_dump($upload_image);
            //die;
            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './panel/dist/upload/logo/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('akreditasi')) {

                    $old_img = $this->input->post('old_image', true);
                    // var_dump($old_img);
                    // die;
                    if ($old_img != '') {
                        unlink(FCPATH . './panel/dist/upload/logo/' . $old_img);
                    }
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('akreditasi', $new_img);
                } else {
                    echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                }
            }

            $sekolah_id = $this->input->post('sekolah_id');
            $cekh = $this->db->get_where('m_sekolah', ['sekolah_id' => $sekolah_id])->row_array();

            $data =
                [
                    'npsn' => $this->input->post('npsn'),
                ];

            if ($cekh == 0) {
                $this->db->insert('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Tambah Data !</div>');
                redirect('data_profil/profil_sekolah');
            } else {
                $this->db->where('sekolah_id', $sekolah_id);
                $this->db->update('m_sekolah', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Ubah Data !</div>');
                redirect('data_profil/profil_sekolah');
            }
        }
    }

    function add_ajax_kab($id_prov)
    {
        $query = $this->db->get_where('m_kota', array('provinsi_id' => $id_prov));
        $data = "<option value=''>- Select Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->kota_id . "'>" . $value->kota . "</option>";
        }
        echo $data;
    }

    function add_ajax_kec($id_kab)
    {
        $query = $this->db->get_where('m_kecamatan', array('kota_id' => $id_kab));
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->kecamatan_id . "'>" . $value->kecamatan . "</option>";
        }
        echo $data;
    }
}
