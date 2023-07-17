<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_kepsek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        $this->load->library('form_validation');
        $this->load->model('ProfilKepsek_model', 'kepsek');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama_kepsek', 'Nama Kepala Sekolah', 'required');
        $this->form_validation->set_rules('kata_sambutan', 'Kata Sambutan', 'required');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Profil Kepala Sekolah';
            $data['home'] = 'Profil';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sch'] = $this->kepsek->get_profil();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_profil/profil_kepsek/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $upload_image = $_FILES['foto'];
            //var_dump($upload_image);
            //die;
            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size'] = '2048';
                $config['upload_path'] = './panel/dist/upload/logo/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $old_img = $this->input->post('old_image', true);
                    // var_dump($old_img);
                    // die;
                    if ($old_img != '') {
                        unlink(FCPATH . './panel/dist/upload/logo/' . $old_img);
                    }
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('foto', $new_img);
                } else {
                    echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                }
            }


            $nip = $this->input->post('nip');
            $cekh = $this->db->get_where('profil_kepsek', ['nip' => $nip])->row_array();

            // var_dump($cekh);
            // die;
            $data =
                [
                    'nip' => $this->input->post('nip'),
                    'nama_kepsek' => $this->input->post('nama_kepsek'),
                    'kata_sambutan' => $this->input->post('kata_sambutan'),
                ];

            if ($cekh == 0) {
                $this->db->insert('profil_kepsek', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Tambah Data !</div>');
                redirect('data_profil/profil_kepsek');
            } else {
                $this->db->where('nip', $nip);
                $this->db->update('profil_kepsek', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Ubah Data !</div>');
                redirect('data_profil/profil_kepsek');
            }
        }
    }
}
