<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ates_masuk extends CI_Controller
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
        $data['user'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();
        $data['tugas'] = $this->db->get_where('ppdb_kursus', ['status' => 1])->result_array();
        $data['materi'] = $this->db->get_where('ppdb_materi', ['status' => 1])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }

    public function quiz($id)
    {
        $ceknilai = $this->db->get_where('ppdb_nilai_quiz', ['id_siswa' => $this->session->userdata('no_daftar'), 'id_materi' => $id])->num_rows();
        if ($ceknilai <> 0) {
            redirect('ates_masuk/hasil_quiz/' . $id);
        }
        $data = [
            'soal' => $this->db->get_where('ppdb_soal', ['id_materi' => $id])->result_array(),
            'id_materi' => $id
        ];

        $data['title'] = 'Quiz';
        $data['user'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah', ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1, 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('quiz_v', $data);
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
        $data['sekolah'] = $this->db->get_where('m_sekolah', ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1, 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('quiz_hasil_v', $data);
        $this->load->view('templates/footer');
    }

    public function hasil_quiz($id)
    {
        $data['title'] = 'Hasil Quiz';
        $data['user'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah', ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1, 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->result_array();

        $ceknilai = $this->db->get_where('ppdb_nilai_quiz', ['id_siswa' => $this->session->userdata('no_daftar'), 'id_materi' => $id])->row_array();
        $data['salah'] = $ceknilai['salah'];
        $data['betul'] = $ceknilai['benar'];
        $data['skor'] = $ceknilai['nilai'];
        // var_dump($skor);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('quiz_hasil_v', $data);
        $this->load->view('templates/footer');
    }
}
