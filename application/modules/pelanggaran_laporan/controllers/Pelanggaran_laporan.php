<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggaran_laporan extends CI_Controller
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
	// 	redirect(base_url());
	// }

	public function poin_siswa($tahun_ajaran = "", $id_kelas = "")
	{

		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Poin Siswa';
			$data['home'] = 'Laporan Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			if (empty($tahun_ajaran)) {
				$get_tahunajaran = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1'")->row();
				$tahun_ajaran = $get_tahunajaran->tahun_ajaran;
			} else {
				$tahun_ajaran 	= str_replace("-", "/", $tahun_ajaran);
			}
			$data['judul'] = "Laporan Poin Siswa";
			$data['combo_kelas'] = $this->Combo_model->combo_kelas_report();
			$data['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_rpt($tahun_ajaran);
			$data['tahun_ajaran'] = $tahun_ajaran;
			$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$data['nama_sekolah'] = $get->nama_sekolah;
			$data['alamat_sekolah'] = $get->alamat;
			$data['website'] = $get->website;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_laporan/laporan_poin/poin_siswa', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function proses_tampil_poin_siswa()
	{
		if (empty($this->input->post("tahun_ajaran"))) {
			$tahun_ajaran = '';
		} else {
			$tahun_ajaran 	= str_replace("/", "-", $this->input->post("tahun_ajaran"));
		}

		if (empty($this->input->post("id_kelas"))) {
			$id_kelas = 'all';
		} else {
			$id_kelas 	= $this->input->post("id_kelas");
		}

		redirect("pelanggaran_laporan/poin_siswa/" . $tahun_ajaran . '/' . $id_kelas);
	}

	public function pelanggaran_siswa($tgl_awal = "", $tgl_akhir = "", $tahun_ajaran = "", $id_kelas = "", $id_siswa = "", $id_poin_pelanggaran = "")
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Pelanggaran Siswa';
			$data['home'] = 'Laporan Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			if (empty($tahun_ajaran) || $tahun_ajaran == 'all') {
				$get_tahunajaran = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1'")->row();
				$tahun_ajaran = $get_tahunajaran->tahun_ajaran;
			} else {
				$tahun_ajaran 	= str_replace("-", "/", $tahun_ajaran);
			}
			$data['judul'] = "Laporan Pelanggaran Siswa";
			$data['combo_kelas'] = $this->Combo_model->combo_kelas_report();
			$data['combo_poin_pelanggaran'] = $this->Combo_model->combo_pelanggaran_rpt();
			$data['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
			if (!empty($tgl_awal) && !empty($tgl_akhir)) {
				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;
				$tgl_awal 	= date("Y-m-d", strtotime($tgl_awal));
				$tgl_akhir 	= date("Y-m-d", strtotime($tgl_akhir));
				$data['tahun_ajaran'] = $tahun_ajaran;
				$data['pelanggaran_siswa'] = $this->Laporan_model->pelanggaran_siswa($tgl_awal, $tgl_akhir, $tahun_ajaran, $id_kelas, $id_siswa, $id_poin_pelanggaran);
			} else {
				$data['pelanggaran_siswa'] = "";
				$data['tgl_awal'] = date("d-m-Y");
				$data['tgl_akhir'] = date("d-m-Y");
			}
			$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$data['nama_sekolah'] = $get->nama_sekolah;
			$data['alamat_sekolah'] = $get->alamat;
			$data['website'] = $get->website;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_laporan/laporan_pelanggaran/pelanggaran_siswa', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function proses_tampil_pelanggaran()
	{
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");

		if (empty($this->input->post("id_siswa"))) {
			$id_siswa = 'all';
		} else {
			$ex = explode("-", $this->input->post("id_siswa"));
			$id_siswa = $ex[0];
		}
		if (empty($this->input->post("tahun_ajaran"))) {
			$tahun_ajaran = 'all';
		} else {
			$tahun_ajaran 	= str_replace("/", "-", $this->input->post("tahun_ajaran"));
		}

		if (empty($this->input->post("id_kelas"))) {
			$id_kelas = 'all';
		} else {
			$id_kelas 	= $this->input->post("id_kelas");
		}

		if (empty($this->input->post("id_poin_pelanggaran"))) {
			$id_poin_pelanggaran = 'all';
		} else {
			$id_poin_pelanggaran 	= $this->input->post("id_poin_pelanggaran");
		}


		redirect("pelanggaran_laporan/pelanggaran_siswa/" . $tgl_awal . "/" . $tgl_akhir . "/" . $tahun_ajaran . '/' . $id_kelas . '/' . $id_siswa . '/' . $id_poin_pelanggaran);
	}

	public function absen_siswa($tgl_awal = "", $tgl_akhir = "", $tahun_ajaran = "", $id_kelas = "", $id_siswa = "", $keterangan = "")
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Kehadiran Siswa';
			$data['home'] = 'Laporan Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			if (empty($tahun_ajaran) || $tahun_ajaran == 'all') {
				$get_tahunajaran = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1'")->row();
				$tahun_ajaran = $get_tahunajaran->tahun_ajaran;
			} else {
				$tahun_ajaran 	= str_replace("-", "/", $tahun_ajaran);
			}
			$data['judul'] = "Laporan Absen Siswa";
			$data['combo_kelas'] = $this->Combo_model->combo_kelas_report();
			$data['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
			if (!empty($tgl_awal) && !empty($tgl_akhir)) {
				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;
				$data['tahun_ajaran'] = $tahun_ajaran;
				$tgl_awal 	= date("Y-m-d", strtotime($tgl_awal));
				$tgl_akhir 	= date("Y-m-d", strtotime($tgl_akhir));
				$data['absen'] = $this->Laporan_model->absen($tgl_awal, $tgl_akhir, $tahun_ajaran, $id_kelas, $id_siswa, $keterangan);
			} else {
				$data['absen'] = "";
				$data['tgl_awal'] = date("d-m-Y");
				$data['tgl_akhir'] = date("d-m-Y");
			}
			$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$data['nama_sekolah'] = $get->nama_sekolah;
			$data['alamat_sekolah'] = $get->alamat;
			$data['website'] = $get->website;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_laporan/laporan_absen/absen_siswa', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function proses_tampil_absen()
	{
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");
		if (empty($this->input->post("id_siswa"))) {
			$id_siswa = 'all';
		} else {
			$ex = explode("-", $this->input->post("id_siswa"));
			$id_siswa = $ex[0];
		}
		if (empty($this->input->post("tahun_ajaran"))) {
			$tahun_ajaran = 'all';
		} else {
			$tahun_ajaran 	= str_replace("/", "-", $this->input->post("tahun_ajaran"));
		}

		if (empty($this->input->post("id_kelas"))) {
			$id_kelas = 'all';
		} else {
			$id_kelas 	= $this->input->post("id_kelas");
		}

		if (empty($this->input->post("keterangan"))) {
			$keterangan = 'all';
		} else {
			$keterangan 	= $this->input->post("keterangan");
		}

		redirect("pelanggaran_laporan/absen_siswa/" . $tgl_awal . "/" . $tgl_akhir . "/" . $tahun_ajaran . '/' . $id_kelas . '/' . $id_siswa . '/' . $keterangan);
	}
}
