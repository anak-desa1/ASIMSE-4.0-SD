<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggaran_jenis extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->Model('Laporan_model');
        $this->load->Model('Combo_model');
    }

    // public function index()
    // {
    //     redirect(base_url());
    // }


    public function siswa($id_kelas = "")
    {

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Data Siswa';
            $data['home'] = 'Jenis Pelanggaran';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;
            $data['judul'] = "Data Siswa";
            if (!empty($id_kelas)) {
                $data['siswa'] = $this->Laporan_model->siswa($id_kelas);
            } else {
                $data['siswa'] = "";
            }
            $data['combo_kelas'] = $this->Combo_model->combo_kelas($id_kelas);

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('pelanggaran_jenis/siswa/siswa', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function proses_tampil_siswa()
    {
        $id_kelas = $this->input->post("id_kelas");
        redirect("pelanggaran_jenis/siswa/" . $id_kelas);
    }

    public function siswa_detail($nis)
    {
        $data['judul'] = "Data Siswa";
        $data['judul2'] = "Detail";
        $get = $this->Laporan_model->siswa_detail($nis);

        if ($get->num_rows() == 0) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Data Siswa';
            $data['home'] = 'Jenis Pelanggaran';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;         

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('pelanggaran_jenis/siswa/siswa', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {

            $this->benchmark->mark('code_start');
            $data['title'] = 'Data Siswa';
            $data['home'] = 'Jenis Pelanggaran';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;
            $da = $get->row();
            $data['id_kelas'] = $da->id_kelas;
            $data['nis'] = $da->nis;
            $data['nisn'] = $da->nisn;
            $data['nama_siswa'] = $da->nama_siswa;
            $data['jenis_kelamin'] = $da->jenis_kelamin;
            if (!empty($da->tanggal_lahir)) {
                $d['tanggal_lahir'] = date("d-m-Y", strtotime($da->tanggal_lahir));
            } else {
                $d['tanggal_lahir'] = '';
            }
            $data['tempat_lahir'] = $da->tempat_lahir;
            $data['alamat_jalan'] = $da->alamat_jalan;
            $data['kelurahan'] = $da->kelurahan;
            $data['kecamatan'] = $da->kecamatan;
            $data['hp'] = $da->hp;
            $data['telepon'] = $da->telepon;
            $data['email'] = $da->email;
            $data['agama'] = $da->agama;
            $data['angkatan'] = $da->angkatan;
            $data['foto'] = $da->foto;
            $data['nama_kelas'] = $da->nama_kelas;
            $data['id_siswa'] = $da->id_siswa;
            $data['aktif_siswa'] = $da->aktif_siswa;

            $data['nama_ayah'] = $da->nama_ayah;
            $data['pendidikan_ayah'] = $da->pendidikan_ayah;
            $data['pekerjaan_ayah'] = $da->pekerjaan_ayah;
            $data['no_hp_ayah'] = $da->no_hp_ayah;

            $data['nama_ibu'] = $da->nama_ibu;
            $data['pendidikan_ibu'] = $da->pendidikan_ibu;
            $data['pekerjaan_ibu'] = $da->pekerjaan_ibu;
            $data['no_hp_ibu'] = $da->no_hp_ibu;

            $data['nama_wali'] = $da->nama_wali;
            $data['pendidikan_wali'] = $da->pendidikan_wali;
            $data['pekerjaan_wali'] = $da->pekerjaan_wali;
            $data['no_hp_wali'] = $da->no_hp_wali;

            $data['nama_sekolah'] = $da->nama_sekolah;
            $data['status_sekolah'] = $da->status_sekolah;
            $data['alamat_sekolah'] = $da->alamat_sekolah;
            $data['tahun_lulus'] = $da->tahun_lulus;

            $get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
            $data['nama_sekolah'] = $get->nama_sekolah;
            $data['alamat_sekolah'] = $get->alamat;
            $data['website'] = $get->website;

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('pelanggaran_jenis/siswa/siswa', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        }
    }
}
