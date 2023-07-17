<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip_laporan extends CI_Controller
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

	public function proses_tampil_arsip()
	{
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");
		$jenis_dokumen 	= $this->input->post("jenis_dokumen");
	
		redirect("arsip_laporan/arsip/" . $tgl_awal . '/' . $tgl_akhir . '/' . $jenis_dokumen);
	}

	public function arsip($tgl_awal = "", $tgl_akhir = "",$jenis_dokumen = "")
	{

		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Laporan';
			$data['home'] = 'Arsip Laporan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Laporan Arsip";
			$data['combo_ruangan'] = $this->Combo_model->combo_ruangan();
			$data['combo_lemari'] = $this->Combo_model->combo_lemari();
			$data['combo_rak'] = $this->Combo_model->combo_rak();
			$data['combo_box'] = $this->Combo_model->combo_box();
			$data['combo_map'] = $this->Combo_model->combo_map();
			$data['combo_urut'] = $this->Combo_model->combo_urut();
			$data['combo_jenis_dokumen'] = $this->Combo_model->combo_jenis_dokumen();

			if (!empty($tgl_awal) && !empty($tgl_akhir)) {
				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;
				$tgl_awal = date("Y-m-d", strtotime($tgl_awal));
				$tgl_akhir = date("Y-m-d", strtotime($tgl_akhir));
				$data['laporan_arsip'] = $this->Laporan_model->arsip($tgl_awal, $tgl_akhir, $jenis_dokumen);
				// var_dump($data['laporan_arsip']);
				// die;
			} else {
				$data['laporan_arsip'] = "";
				$data['tgl_awal'] = date("d-m-Y");
				$data['tgl_akhir'] = date("d-m-Y");
			}

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_laporan/laporan/laporan_arsip', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}
}
