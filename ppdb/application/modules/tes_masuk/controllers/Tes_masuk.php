<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tes_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Tes_masuk_m', 'tes');
    }

   public function index()
    {
        $data['title'] = 'Tes Masuk';

        $user = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['user'] = $user;
        $kelas = $user['kelas'];

        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();
        $data['tugas'] = $this->db->get_where('ppdb_kursus', ['status' => 1])->result_array();
        $data['materi'] = $this->db->get_where('ppdb_materi', ['status' => 1, 'kelas' => $kelas])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tes_masuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function quiz($id)
    {
        $ceknilai = $this->db->get_where('ppdb_nilai_quiz', ['id_siswa' => $this->session->userdata('no_daftar'), 'id_materi' => $id])->num_rows();
        if ($ceknilai <> 0) {
            redirect('tes_masuk/hasil_quiz/' . $id);
        }
        $data = [
            'soal' => $this->db->get_where('ppdb_soal', ['id_materi' => $id])->result_array(),
            'id_materi' => $id
        ];

        $data['title'] = 'Quiz';
        $data['user'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tes_masuk/quiz_v', $data);
        $this->load->view('templates/footer');
    }

    public function cekquiz($id) //id materi
    {
        // $id = decrypt_url($id);
        $jawab = $this->input->post('jawab');
        $jumsoal = $this->db->get_where('ppdb_soal', ['id_materi' => $id])->num_rows();
        $betul = 0;
        $salah = 0;
        foreach ($jawab as $id_soal => $jawaban) {
            $cek = $this->db->get_where('ppdb_soal_opsi', ['id_soal' => $id_soal, 'id_opsi' => $jawaban, 'benar' => 1])->num_rows();
            if ($cek > 0) {
                $betul += 1;
            } else {
                $salah += 1;
            }
        }
        $bagi = $jumsoal / 100;
        $skor = $betul / $bagi;

        $skor = round($skor, 2);
        //simpan nilai ke database

        $ceknilai = $this->db->get_where('ppdb_nilai_quiz', ['id_siswa' => $this->session->userdata('no_daftar'), 'id_materi' => $id])->num_rows();
        if ($ceknilai == 0) {
            $datanilai = [
                'id_siswa' => $this->session->userdata('no_daftar'),
                'id_materi' => $id,
                'nilai' => $skor,
                'benar' => $betul,
                'salah' => $salah
            ];
            $this->db->insert('ppdb_nilai_quiz', $datanilai);
        }

        $data = [
            'salah' => $salah,
            'betul' => $betul,
            'skor' => $skor

        ];

        $data['title'] = 'Hasil Quiz';
        $data['user'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tes_masuk/quiz_hasil_v', $data);
        $this->load->view('templates/footer');
    }

    public function hasil_quiz($id)
    {
        $data['title'] = 'Hasil Quiz';
        $data['user'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah', ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

        $ceknilai = $this->db->get_where('ppdb_nilai_quiz', ['id_siswa' => $this->session->userdata('no_daftar'), 'id_materi' => $id])->row_array();
        $data['salah'] = $ceknilai['salah'];
        $data['betul'] = $ceknilai['benar'];
        $data['skor'] = $ceknilai['nilai'];
        // var_dump($skor);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tes_masuk/quiz_hasil_v', $data);
        $this->load->view('templates/footer');
    }

    public function lihattugas($id)
    {
        $tugas = $this->db->get_where('ppdb_tugas', ['id_kursus' => $id])->row_array();
        // var_dump($tugas);
        // die;
        $data = [
            'tugas' => $tugas,
            'jawabtugas' => $this->db->get_where('ppdb_tugas_jawab', ['id_kursus' => $id])->num_rows()
        ];

        $data['title'] = 'Tugas';
        $data['user'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tes_masuk/tugas_lihat_v', $data);
        $this->load->view('templates/footer');
    }

    public function kirim_tugas($idtugas)
    {
        $this->load->library('upload');
        $kd_campus = $this->input->post('kd_campus');
        $kd_sekolah = $this->input->post('kd_sekolah');
        $id_kursus = $this->input->post('id_kursus');
        $id = $this->session->userdata('no_daftar');
        $cek = $this->db->get_where('ppdb_tugas_jawab', ['id_siswa' => $id, 'id_tugas' => $idtugas])->num_rows();
        $config['upload_path'] = './assets/tugas'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $this->upload->initialize($config);
        if (!empty($_FILES['file']['name'])) {
            if ($this->upload->do_upload('file')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/tugas/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '90%';
                $config['width'] = 400;
                $config['height'] = 510;
                $config['new_image'] = './assets/tugas/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $gbr['file_name'];
                $data = [
                    'kd_campus' => $kd_campus,
                    'kd_sekolah' => $kd_sekolah,
                    'id_kursus' => $id_kursus,
                    'id_tugas' => $idtugas,
                    'id_siswa' => $id,
                    'file' => $gambar
                ];
                if ($cek == 0) {
                    $this->tes->createdata('ppdb_tugas_jawab', $data);
                }
            }
        }
        redirect('tes_masuk/lihattugas/' . $idtugas);
    }
}

/*
Theme Name: CAHDESO
Author: ALBERTUS EKO WILASATRYAWAN
Author URI: 'https://sistemanakdesa.my.id/'
Description: A development theme, from static HTML-CSS-JavaScript-PHP to CMS
Version: 1.0
License: GNU General Public License v2 or later
License URI: 'https://sistemanakdesa.my.id/'
*/

