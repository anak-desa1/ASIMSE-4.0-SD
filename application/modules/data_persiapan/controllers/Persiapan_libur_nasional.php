<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persiapan_libur_nasional extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('PersiapanLiburNasional_model', 'libur_nasional');
    }

    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Libur Nasional';
        $data['home'] = 'Persiapan';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('layout/header-top');
        $this->load->view('data_persiapan/persiapan_libur_nasional/list_css');
        $this->load->view('layout/header-bottom');
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('data_persiapan/persiapan_libur_nasional/list', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('data_persiapan/persiapan_libur_nasional/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function ambilData()
    {
        $data = $this->libur_nasional->ambildata('t_libur_nasional')->result();
        echo json_encode($data);
    }

    public function tambahdata()
    {
        $tgl_libur = $this->input->post('tgl_libur');
        $keterangan = $this->input->post('keterangan');
        $tahun = $this->input->post('tahun');
        if ($tgl_libur == '') {
            $result['pesan'] = "tanggal harus di isi";
        } elseif ($keterangan == '') {
            $result['pesan'] = "keterangan harus di isi";
        } elseif ($tahun == '') {
            $result['pesan'] = "Tahun harus di isi";
        } else {
            $result['pesan'] = "";
            $data = [
                'tgl_libur' => $tgl_libur,
                'keterangan' => $keterangan,
                'tahun' => $tahun,
            ];
            $this->libur_nasional->tambahdata($data, 't_libur_nasional');
        }
        echo json_encode($result);
    }

    public function ambilid()
    {
        $no_urut = $this->input->post('no_urut');
        $where = ['no_urut' => $no_urut];
        $data = $this->libur_nasional->ambilid('t_libur_nasional', $where)->result();
        echo json_encode($data);
    }

    public function ubahdata()
    {
        $no_urut = $this->input->post('no_urut');
        $tgl_libur = $this->input->post('tgl_libur');
        $keterangan = $this->input->post('keterangan');
        $tahun = $this->input->post('tahun');
        if ($tgl_libur == '') {
            $result['pesan'] = "tanggal harus di isi";
        } elseif ($keterangan == '') {
            $result['pesan'] = "keterangan harus di isi";
        } elseif ($tahun == '') {
            $result['pesan'] = "Tahun harus di isi";
        } else {
            $result['pesan'] = "";
            $where = ['no_urut' => $no_urut];
            $data = [
                'tgl_libur' => $tgl_libur,
                'keterangan' => $keterangan,
                'tahun' => $tahun,
            ];
            $this->libur_nasional->ubahdata($where, $data, 't_libur_nasional');
        }
        echo json_encode($result);
    }
}
