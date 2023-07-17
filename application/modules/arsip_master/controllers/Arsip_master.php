<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip_master extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->Model('Master_model');
	}

	// public function index()
	// {
	// 	redirect(base_url());
	// }

	public function jenis_dokumen()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Jenis Dokumen';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['jenis_dokumen'] = $this->Master_model->jenis_dokumen();

			$this->load->view('layout/header-top', $data);
			// $this->load->view('arsip_master/jenis_dokumen/_css');
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/jenis_dokumen/jenis_dokumen', $data);
			$this->load->view('layout/footer-top');
			// $this->load->view('arsip_master/jenis_dokumen/_js');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function jenis_dokumen_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Jenis Dokumen';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Jenis Dokumen";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['nama_jenis_dokumen'] = "";
			$data['id_jenis_dokumen'] = "";

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/jenis_dokumen/jenis_dokumen_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function jenis_dokumen_edit($id_jenis_dokumen)
	{
		$cek = $this->db->query("SELECT id_jenis_dokumen FROM mst_jenis_dokumen WHERE id_jenis_dokumen = '$id_jenis_dokumen'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Jenis Dokumen';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Jenis Dokumen";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $this->Master_model->jenis_dokumen_edit($id_jenis_dokumen);
			$d = $get->row();
			$data['nama_jenis_dokumen'] = $d->nama_jenis_dokumen;
			$data['id_jenis_dokumen'] = $d->id_jenis_dokumen;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/jenis_dokumen/jenis_dokumen_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function jenis_dokumen_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_jenis_dokumen'] = $this->input->post("nama_jenis_dokumen");

		if ($tipe == "add") {
			$cek = $this->db->query("SELECT nama_jenis_dokumen FROM mst_jenis_dokumen WHERE nama_jenis_dokumen = '$in[nama_jenis_dokumen]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Jenis Dokumen Sudah Digunakan");
				redirect("arsip_master/jenis_dokumen_tambah/");
			} else {
				$this->db->insert("mst_jenis_dokumen", $in);
				$this->session->set_flashdata("success", "Tambah Data Jenis Dokumen Berhasil");
				redirect("arsip_master/jenis_dokumen/");
			}
		} elseif ($tipe = 'edit') {
			$where['id_jenis_dokumen'] 	= $this->input->post('id_jenis_dokumen');
			$cek = $this->db->query("SELECT nama_jenis_dokumen FROM mst_jenis_dokumen WHERE nama_jenis_dokumen = '$in[nama_jenis_dokumen]' AND id_jenis_dokumen != '$where[id_jenis_dokumen]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Jenis Dokumen Sudah Digunakan");
				redirect("arsip_master/jenis_dokumen_edit/" . $this->input->post("id_jenis_dokumen"));
			} else {
				$this->db->update("mst_jenis_dokumen", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Jenis Dokumen Berhasil");
				redirect("arsip_master/jenis_dokumen/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function jenis_dokumen_delete()
	{
		$id = $this->uri->segment(3);
		$this->Master_model->jenis_dokumen_delete($id, 'mst_jenis_dokumen');
		redirect('arsip_master/jenis_dokumen');
	}

	public function ruangan()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Ruangan';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Ruangan";
			$data['ruangan'] = $this->Master_model->ruangan();

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/ruangan/ruangan', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function ruangan_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Ruangan';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Ruangan";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['nama_ruangan'] = "";
			$data['id_ruangan'] = "";

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/ruangan/ruangan_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function ruangan_edit($id_ruangan)
	{
		$cek = $this->db->query("SELECT id_ruangan FROM mst_ruangan WHERE id_ruangan = '$id_ruangan'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Ruangan';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Ruangan";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $this->Master_model->ruangan_edit($id_ruangan);
			$d = $get->row();
			$data['nama_ruangan'] = $d->nama_ruangan;
			$data['id_ruangan'] = $d->id_ruangan;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/ruangan/ruangan_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function ruangan_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_ruangan'] = $this->input->post("nama_ruangan");

		if ($tipe == "add") {
			$cek = $this->db->query("SELECT nama_ruangan FROM mst_ruangan WHERE nama_ruangan = '$in[nama_ruangan]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Ruangan Sudah Digunakan");
				redirect("arsip_master/ruangan_tambah/");
			} else {
				$this->db->insert("mst_ruangan", $in);
				$this->session->set_flashdata("success", "Tambah Data Ruangan Berhasil");
				redirect("arsip_master/ruangan/");
			}
		} elseif ($tipe = 'edit') {
			$where['id_ruangan'] 	= $this->input->post('id_ruangan');
			$cek = $this->db->query("SELECT nama_ruangan FROM mst_ruangan WHERE nama_ruangan = '$in[nama_ruangan]' AND id_ruangan != '$where[id_ruangan]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Ruangan Sudah Digunakan");
				redirect("arsip_master/ruangan_edit/" . $this->input->post("id_ruangan"));
			} else {
				$this->db->update("mst_ruangan", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Ruangan Berhasil");
				redirect("arsip_master/ruangan/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function ruangan_delete()
	{
		$id = $this->uri->segment(3);
		$this->Master_model->ruangan_delete($id, 'mst_ruangan');
		redirect('arsip_master/ruangan');
	}

	public function lemari()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Lemari';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data lemari";
			$data['lemari'] = $this->Master_model->lemari();

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/lemari/lemari', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function lemari_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Lemari';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data lemari";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['nama_lemari'] = "";
			$data['id_lemari'] = "";

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/lemari/lemari_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}


	public function lemari_edit($id_lemari)
	{
		$cek = $this->db->query("SELECT id_lemari FROM mst_lemari WHERE id_lemari = '$id_lemari'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Lemari';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data lemari";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $this->Master_model->lemari_edit($id_lemari);
			$d = $get->row();
			$data['nama_lemari'] = $d->nama_lemari;
			$data['id_lemari'] = $d->id_lemari;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/lemari/lemari_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function lemari_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_lemari'] = $this->input->post("nama_lemari");

		if ($tipe == "add") {
			$cek = $this->db->query("SELECT nama_lemari FROM mst_lemari WHERE nama_lemari = '$in[nama_lemari]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama lemari Sudah Digunakan");
				redirect("arsip_master/lemari_tambah/");
			} else {
				$this->db->insert("mst_lemari", $in);
				$this->session->set_flashdata("success", "Tambah Data lemari Berhasil");
				redirect("arsip_master/lemari/");
			}
		} elseif ($tipe = 'edit') {
			$where['id_lemari'] 	= $this->input->post('id_lemari');
			$cek = $this->db->query("SELECT nama_lemari FROM mst_lemari WHERE nama_lemari = '$in[nama_lemari]' AND id_lemari != '$where[id_lemari]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama lemari Sudah Digunakan");
				redirect("arsip_master/lemari_edit/" . $this->input->post("id_lemari"));
			} else {
				$this->db->update("mst_lemari", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data lemari Berhasil");
				redirect("arsip_master/lemari/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function lemari_delete()
	{
		$id = $this->uri->segment(3);
		$this->Master_model->lemari_delete($id, 'mst_lemari');
		redirect('arsip_master/lemari');
	}


	public function rak()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Rak';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Rak";
			$data['rak'] = $this->Master_model->rak();

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/rak/rak', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function rak_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Rak';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Rak";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['nama_rak'] = "";
			$data['id_rak'] = "";

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/rak/rak_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function rak_edit($id_rak)
	{
		$cek = $this->db->query("SELECT id_rak FROM mst_rak WHERE id_rak = '$id_rak'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Rak';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Rak";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $this->Master_model->rak_edit($id_rak);
			$d = $get->row();
			$data['nama_rak'] = $d->nama_rak;
			$data['id_rak'] = $d->id_rak;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/rak/rak_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function rak_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_rak'] = $this->input->post("nama_rak");

		if ($tipe == "add") {
			$cek = $this->db->query("SELECT nama_rak FROM mst_rak WHERE nama_rak = '$in[nama_rak]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Rak Sudah Digunakan");
				redirect("arsip_master/rak_tambah/");
			} else {
				$this->db->insert("mst_rak", $in);
				$this->session->set_flashdata("success", "Tambah Data Rak Berhasil");
				redirect("arsip_master/rak/");
			}
		} elseif ($tipe = 'edit') {
			$where['id_rak'] 	= $this->input->post('id_rak');
			$cek = $this->db->query("SELECT nama_rak FROM mst_rak WHERE nama_rak = '$in[nama_rak]' AND id_rak != '$where[id_rak]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Rak Sudah Digunakan");
				redirect("arsip_master/rak_edit/" . $this->input->post("id_rak"));
			} else {
				$this->db->update("mst_rak", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Rak Berhasil");
				redirect("arsip_master/rak/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function rak_delete()
	{
		$id = $this->uri->segment(3);
		$this->Master_model->rak_delete($id, 'mst_rak');
		redirect('arsip_master/rak');
	}

	public function box()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Box';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Box";
			$data['box'] = $this->Master_model->box();

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/box/box', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function box_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Box';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Box";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['nama_box'] = "";
			$data['id_box'] = "";

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/box/box_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function box_edit($id_box)
	{
		$cek = $this->db->query("SELECT id_box FROM mst_box WHERE id_box = '$id_box'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Box';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Box";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $this->Master_model->box_edit($id_box);
			$d = $get->row();
			$data['nama_box'] = $d->nama_box;
			$data['id_box'] = $d->id_box;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/box/box_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function box_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_box'] = $this->input->post("nama_box");

		if ($tipe == "add") {
			$cek = $this->db->query("SELECT nama_box FROM mst_box WHERE nama_box = '$in[nama_box]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Box Sudah Digunakan");
				redirect("arsip_master/box_tambah/");
			} else {
				$this->db->insert("mst_box", $in);
				$this->session->set_flashdata("success", "Tambah Data Box Berhasil");
				redirect("arsip_master/box/");
			}
		} elseif ($tipe = 'edit') {
			$where['id_box'] 	= $this->input->post('id_box');
			$cek = $this->db->query("SELECT nama_box FROM mst_box WHERE nama_box = '$in[nama_box]' AND id_box != '$where[id_box]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Box Sudah Digunakan");
				redirect("arsip_master/box_edit/" . $this->input->post("id_box"));
			} else {
				$this->db->update("mst_box", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Box Berhasil");
				redirect("arsip_master/box/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function box_delete()
	{
		$id = $this->uri->segment(3);
		$this->Master_model->box_delete($id, 'mst_box');
		redirect('arsip_master/box');
	}

	public function map()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Map';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Map";
			$data['map'] = $this->Master_model->map();

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/map/map', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function map_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Map';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Map";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['nama_map'] = "";
			$data['id_map'] = "";

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/map/map_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function map_edit($id_map)
	{
		$cek = $this->db->query("SELECT id_map FROM mst_map WHERE id_map = '$id_map'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Map';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Map";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $this->Master_model->map_edit($id_map);
			$d = $get->row();
			$data['nama_map'] = $d->nama_map;
			$data['id_map'] = $d->id_map;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/map/map_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function map_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_map'] = $this->input->post("nama_map");

		if ($tipe == "add") {
			$cek = $this->db->query("SELECT nama_map FROM mst_map WHERE nama_map = '$in[nama_map]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Map Sudah Digunakan");
				redirect("arsip_master/map_tambah/");
			} else {
				$this->db->insert("mst_map", $in);
				$this->session->set_flashdata("success", "Tambah Data mMapap Berhasil");
				redirect("arsip_master/map/");
			}
		} elseif ($tipe = 'edit') {
			$where['id_map'] 	= $this->input->post('id_map');
			$cek = $this->db->query("SELECT nama_map FROM mst_map WHERE nama_map = '$in[nama_map]' AND id_map != '$where[id_map]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Map Sudah Digunakan");
				redirect("arsip_master/map_edit/" . $this->input->post("id_map"));
			} else {
				$this->db->update("mst_map", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Map Berhasil");
				redirect("arsip_master/map/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function map_delete()
	{
		$id = $this->uri->segment(3);
		$this->Master_model->map_delete($id, 'mst_map');
		redirect('arsip_master/map');
	}

	public function urut()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Urut';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Urut";
			$data['urut'] = $this->Master_model->urut();

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/urut/urut', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function urut_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Urut';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Urut";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['nama_urut'] = "";
			$data['id_urut'] = "";

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/urut/urut_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function urut_edit($id_urut)
	{
		$cek = $this->db->query("SELECT id_urut FROM mst_urut WHERE id_urut = '$id_urut'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Urut';
			$data['home'] = 'Arsip Master';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Urut";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $this->Master_model->urut_edit($id_urut);
			$d = $get->row();
			$data['nama_urut'] = $d->nama_urut;
			$data['id_urut'] = $d->id_urut;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_master/urut/urut_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function urut_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_urut'] = $this->input->post("nama_urut");

		if ($tipe == "add") {
			$this->db->insert("mst_urut", $in);
			$this->session->set_flashdata("success", "Tambah Data Urut Berhasil");
			redirect("arsip_master/urut/");
		} elseif ($tipe = 'edit') {
			$where['id_urut'] 	= $this->input->post('id_urut');
			$this->db->update("mst_urut", $in, $where);
			$this->session->set_flashdata("success", "Ubah Data Urut Berhasil");
			redirect("arsip_master/urut/");
		} else {
			redirect(base_url());
		}
	}

	public function urut_delete()
	{
		$id = $this->uri->segment(3);
		$this->Master_model->urut_delete($id, 'mst_urut');
		redirect('arsip_master/urut');
	}
}
