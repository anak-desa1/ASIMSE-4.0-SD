<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        $this->load->library('form_validation');
        $this->load->model('PpdbTesmasuk_m', 'psb');
    }

    // quiz
    public function index()
    {
        $this->benchmark->mark('code_start');
        $guru = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $id = $guru['nik'];
        $data = [
            'setting' => $this->db->get_where('m_sekolah')->row_array(),
            'mapel' => $this->db->get('ppdb_mapel')->result_array(),
            'guru' => $guru,
            'kelas' => $this->db->get('l_kelas')->result_array(),
            'materi' => $this->db->get_where('ppdb_materi', ['id_guru' => $id])->result_array()
        ];

        $data['title'] = 'Quiz';
        $data['home'] = 'Tes Masuk';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sch'] = $this->db->get('m_sekolah')->result_array();
        // var_dump($id);
        // die;  
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_tesmasuk/quiz/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_tesmasuk/quiz/quiz_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_tesmasuk/quiz/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $pegawai = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $id = $pegawai['nik'];
        $this->benchmark->mark('code_start');
        $guru = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->result_array();
        $data = [
            'pegawai' => $pegawai,
            'mapel' => $this->db->get('ppdb_mapel')->result_array(),
            'guru' => $guru,
            'kelas' => $this->db->get_where('l_kelas')->result_array(),
        ];

        // var_dump($data['pegawai']);
        // die;
        $this->load->view('ppdb_tesmasuk/quiz/list_css');
        $this->load->view('ppdb_tesmasuk/quiz/quiz_add', $data);
        $this->load->view('ppdb_tesmasuk/quiz/list_js');
    }

    function edit($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $this->benchmark->mark('code_start');
        $data = [
            'materi' => $this->db->get_where('ppdb_materi', ['id_materi' => $id])->row_array(),
        ];

        $this->load->view('ppdb_tesmasuk/quiz/list_css');
        $this->load->view('ppdb_tesmasuk/quiz/quiz_edit', $data);
        $this->load->view('ppdb_tesmasuk/quiz/list_js');
    }

    function delete($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $this->benchmark->mark('code_start');
        $data = [
            'materi' => $this->db->get_where('ppdb_materi', ['id_materi' => $id])->row_array(),
        ];

        $this->load->view('ppdb_tesmasuk/quiz/list_css');
        $this->load->view('ppdb_tesmasuk/quiz/quiz_delete', $data);
        $this->load->view('ppdb_tesmasuk/quiz/list_js');
    }

    public function simpan_tambah_quiz()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_tambah_quiz();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('ppdb_tesmasuk/quiz');
    }

    public function simpan_edit_quiz()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_edit_quiz();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('ppdb_tesmasuk/quiz');
    }

    public function simpan_del($id)
    {
        $data = ['id_materi' => $id];
        $this->db->delete('ppdb_materi', $data);
        $this->db->delete('ppdb_soal', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('ppdb_tesmasuk/quiz');
    }
    // end quiz

    // soal
    public function soal($id)
    {
        $this->benchmark->mark('code_start');
        $data = [
            'soal' => $this->db->get_where('ppdb_soal', ['id_materi' => $id])->result_array(),
            'id_materi' => $id
        ];

        $data['title'] = 'Soal';
        $data['home'] = 'Soal';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        // var_dump($id);
        // die;  
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_tesmasuk/soal/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_tesmasuk/soal/soal_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_tesmasuk/soal/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }


    public function tambah_soal($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data = [
            'soal' => $this->db->get_where('ppdb_soal', ['id_materi' => $id])->result_array(),
            'id_materi' => $id
        ];

        // var_dump($data['pegawai']);
        // die;
        $this->load->view('ppdb_tesmasuk/soal/list_css');
        $this->load->view('ppdb_tesmasuk/soal/soal_add', $data);
        $this->load->view('ppdb_tesmasuk/soal/list_js');
    }

    public function delete_soal($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data = [
            'soal' => $this->db->get_where('ppdb_soal', ['id_soal' => $id])->row_array(),
            'id_soal' => $id
        ];
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('ppdb_tesmasuk/soal/list_css');
        $this->load->view('ppdb_tesmasuk/soal/soal_delete', $data);
        $this->load->view('ppdb_tesmasuk/soal/list_js');
    }


    public function add_soal()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $soal = $this->input->post('soal');
        $opsi = $this->input->post('opsi');
        $kunci = $this->input->post('kunci');
        $id_materi = $this->input->post('id_materi');
        $this->form_validation->set_rules('soal', 'soal', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            $data = [
                'soal' => form_error('soal')
            ];
            echo json_encode($data);
        } else {
            // echo json_encode('sukses');
            $data = [
                'soal' => $soal,
                'id_materi' => $id_materi
            ];
            $this->psb->createdata('ppdb_soal', $data);
            $id_soal = $this->db->insert_id();

            foreach ($opsi as  $key => $opsi) {

                $benar = (isset($kunci[$key])) ? 1 : 0;
                $data = [
                    'id_soal' => $id_soal,
                    'opsi' => $opsi,
                    'benar' => $benar

                ];
                $this->psb->createdata('ppdb_soal_opsi', $data);
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        $id_materi = $this->input->post('id_materi');
        redirect('ppdb_tesmasuk/quiz/soal/' . $id_materi . '');
    }

    public function hapus_soal($id)
    {
        $materi = $this->db->get_where('ppdb_soal', ['id_soal' => $id])->row_array();

        $where = ['id_soal' => $id];
        $this->psb->deletedata('ppdb_soal', $where);
        $this->psb->deletedata('ppdb_soal_opsi', $where);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        $id_materi = $materi['id_materi'];
        redirect('ppdb_tesmasuk/quiz/soal/' . $id_materi . '');
    }
    // end soal

    // Hasil quiz
    public function hasil($id)
    {
        $this->benchmark->mark('code_start');
        $data = [
            'nilai' => $this->db->get_where('ppdb_nilai_quiz', ['id_materi' => $id])->result_array(),
            'id_materi' => $id
        ];

        $data['title'] = 'Hasil quiz';
        $data['home'] = 'Hasil quiz';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        // var_dump($id);
        // die;  
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_tesmasuk/soal_hasil/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_tesmasuk/soal_hasil/soal_hasil_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_tesmasuk/soal_hasil/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }
    // end Hasil quiz

}
