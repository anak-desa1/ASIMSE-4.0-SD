<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->Model('Tamu_model');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Data Tamu';
            $data['home'] = 'Arsip Sekolah';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;
            $data['judul'] = "Data Tamu";
            $data['tamu'] = $this->Tamu_model->tamu();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('arsip_surat/tamu/tamu', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tamu_tambah()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Data Tamu';
            $data['home'] = 'Arsip Sekolah';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;
            $data['judul'] = "Data Tamu";
            $data['judul2'] = "Tambah";
            $data['tipe'] = 'add';
            $data['nama_tamu'] = "";
            $data['asal'] = "";
            $data['alamat'] = "";
            $data['keperluan'] = "";
            $data['no_telepon'] = "";
            $data['id_tamu'] = "";

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('arsip_surat/tamu/tamu_tambah', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tamu_edit($id_tamu)
    {
        $cek = $this->db->query("SELECT id_tamu FROM mst_bukutamu WHERE id_tamu = '$id_tamu'");
        if ($cek->num_rows() > 0) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Data Tamu';
            $data['home'] = 'Arsip Sekolah';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;
            $data['judul'] = "Data Tamu";
            $data['judul2'] = "Ubah";
            $data['tipe'] = 'edit';
            $get = $this->Tamu_model->tamu_edit($id_tamu);
            $d = $get->row();
            $data['nama_tamu'] = $d->nama_tamu;
            $data['asal'] = $d->asal;
            $data['alamat'] = $d->alamat;
            $data['keperluan'] = $d->keperluan;
            $data['no_telepon'] = $d->no_telepon;
            $data['id_tamu'] = $d->id_tamu;

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('arsip_surat/tamu/tamu_tambah', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tamu_save()
    {
        $tipe = $this->input->post("tipe");
        $in['nama_tamu'] = $this->input->post("nama_tamu");
        $in['asal'] = $this->input->post("asal");
        $in['alamat'] = $this->input->post("alamat");
        $in['keperluan'] = $this->input->post("keperluan");
        $in['no_telepon'] = $this->input->post("no_telepon");

        if ($tipe == "add") {
            $this->db->insert("mst_bukutamu", $in);
            $this->session->set_flashdata("success", "Tambah Data Buku Tamu Berhasil");
            redirect("arsip_surat/tamu");
        } elseif ($tipe = 'edit') {
            $where['id_tamu']     = $this->input->post('id_tamu');
            $this->db->update("mst_bukutamu", $in, $where);
            $this->session->set_flashdata("success", "Ubah Data Buku Tamu Berhasil");
            redirect("arsip_surat/tamu");
        } else {
            redirect(base_url());
        }
    }

    public function tamu_hapus($id)
    {
        $where['id_tamu'] = $id;
        $this->db->delete("mst_bukutamu", $where);
        $this->session->set_flashdata("success", "Hapus Buku Tamu Berhasil");
        redirect("arsip_surat/tamu");
    }
}
