<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->Model('Absen_model');
	}

	public function index()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Kehadiran Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Absen Siswa";
			$get_tahunajaran = $this->db->query("SELECT id_tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$data['absen'] = $this->Absen_model->absen($get_tahunajaran->id_tahun_ajaran);

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/absen/absen', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function absen_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Kehadiran Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Absen";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['id_absen'] = "";
			$data['keterangan'] = "";
			$data['alasan'] = "";
			$data['siswa'] = '';
			$data['tanggal_absen'] = '';

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/absen/absen_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function absen_edit($id_absen)
	{
		$cek = $this->db->query("SELECT * FROM vw_absen WHERE id_absen = '$id_absen'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Kehadiran Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Absen Siswa";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $cek->row();
			$data['id_absen'] = $get->id_absen;
			$data['keterangan'] = $get->keterangan;
			$data['alasan'] = $get->alasan;
			$data['siswa'] = $get->id_siswa . '-' . $get->nama_siswa . '-' . $get->nama_kelas;
			$data['tanggal_absen'] = $get->tanggal_absen;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/absen/absen_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function absen_save()
	{
		$get_tahunajaran = $this->db->query("SELECT id_tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$tipe = $this->input->post("tipe");
		$ex = explode("-", $this->input->post("id_siswa"));
		$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$ex[0]'")->row();
		$in['keterangan'] = $this->input->post("keterangan");
		$in['alasan'] = $this->input->post("alasan");
		$in['id_siswa'] = $ex[0];
		$in['id_kelas'] = $get_kelas->id_kelas;
		$in['id_tahun_ajaran'] = $get_tahunajaran->id_tahun_ajaran;

		if ($this->session->userdata("hak_akses") == 'guru' || $this->session->userdata("hak_akses") == 'gurubk') {
			$in['id_guru'] = $this->session->userdata("id");
		}

		$in['tanggal_absen'] = date("Y-m-d", strtotime($this->input->post('tanggal_absen')));
		if ($tipe == "add") {
			$this->db->insert("m_absen", $in);
			$last_id = $this->db->insert_id();

			if ($in['keterangan'] == 'ALPA') {
				$get_poin = $this->db->query("SELECT poin FROM mst_poin_pelanggaran WHERE id_poin_pelanggaran = 1")->row();
				$in2['id_absen'] = $last_id;
				$in2['id_poin_pelanggaran'] = 1;
				$in2['id_kelas'] = $get_kelas->id_kelas;
				$in2['tahun_ajaran'] = $get_tahunajaran->tahun_ajaran;
				$in2['poin_minus'] = $get_poin->poin;
				$in2['tanggal'] = $in['tanggal_absen'];
				$in2['id_siswa'] = $in['id_siswa'];
				$this->db->insert("pelanggaran_siswa", $in2);
			}

			$this->session->set_flashdata("success", "Tambah  Absen Siswa Berhasil");
			redirect("pelanggaran_jenis/absen");
		} elseif ($tipe = 'edit') {
			$where['id_absen'] 	= $this->input->post('id_absen');
			$this->db->update("m_absen", $in, $where);
			$this->session->set_flashdata("success", "Ubah Absen Siswa Berhasil");
			redirect("pelanggaran_jenis/absen");
		} else {
			redirect(base_url());
		}
	}

	public function absen_hapus($id)
	{
		$where['id_absen'] = $id;
		$this->db->delete("m_absen", $where);
		$this->db->delete("pelanggaran_siswa", $where);
		$this->session->set_flashdata("success", "Hapus Absen Berhasil");
		redirect("pelanggaran_jenis/absen");
	}
}
