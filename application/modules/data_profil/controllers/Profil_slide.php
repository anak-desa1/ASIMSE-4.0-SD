<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_slide extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        $this->load->library('form_validation');
        $this->load->model('ProfilSlide_model', 'sch');
    }

    // master_foto
    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Profil Slide';
        $data['home'] = 'Profil';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['foto'] = $this->sch->getFoto();
        $data['active'] = $this->sch->getActive();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('data_profil/profil_slide/list_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['title'] = 'Profil Guru';
        $data['home'] = 'Profil Guru';
        $data['subtitle'] = $data['title'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('data_profil/profil_slide/list_css');
        $this->load->view('data_profil/profil_slide/list_add', $data);
        $this->load->view('data_profil/profil_slide/list_js');
    }

    function edit($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['galeri'] = $this->db->get_where('profil_slide', ['slide_id' => $id])->row_array();
        $this->load->view('data_profil/profil_slide/list_css');
        $this->load->view('data_profil/profil_slide/list_edit', $data);
        $this->load->view('data_profil/profil_slide/list_js');
    }

    public function simpan_tambah()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_tambah();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('data_profil/profil_slide');
    }

    public function simpan_edit()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_edit();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('data_profil/profil_slide');
    }

    public function deldata($id)
    {
        $data = ['slide_id' => $id];
        $this->db->delete('profil_slide', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('data_profil/profil_slide');
    }
    // end master_foto    

    public function slide_active()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() == false) {
        } else {

            $upload_image = $_FILES['gambar'];
            //var_dump($upload_image);
            //die;
            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './panel/dist/upload/profil_slide/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {

                    $old_img = $this->input->post('old_image', true);
                    // var_dump($old_img);
                    // die;
                    if ($old_img != '') {
                        unlink(FCPATH . './panel/dist/upload/profil_slide/' . $old_img);
                    }
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_img);
                } else {
                    echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                }
            }

            $slide_id = $this->input->post('slide_id');
            $cekh = $this->db->get_where('profil_slide', ['slide_id' => $slide_id])->row_array();

            $data =
                [
                    'judul' => $this->input->post('judul'),
                    'text' => $this->input->post('text'),
                    'status' => 1,
                ];

            if ($cekh == 0) {
                $this->db->insert('profil_slide', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Tambah Data !</div>');
                redirect('data_profil/profil_slide');
            } else {
                $this->db->where('slide_id', $slide_id);
                $this->db->update('profil_slide', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                Berhasil Ubah Data !</div>');
                redirect('data_profil/profil_slide');
            }
        }
    }
}
