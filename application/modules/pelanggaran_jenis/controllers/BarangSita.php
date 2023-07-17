<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangSita extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->Model('BarangSita_siswa_model');
		$this->load->Model('Combo_model');
	}

	public function index()
	{

		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Barang Sitaan Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Barang Sita";
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$data['barangsita'] = $this->BarangSita_siswa_model->barangsita($get_tahun->tahun_ajaran);

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/barangsita/barangsita', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function barangsita_tambah()
	{

		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Barang Sitaan Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Barang Sita Siswa";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['tanggal_sita'] = "";
			$data['id_barangsita_siswa'] = '';
			$data['keterangan_sita'] = '';
			$data['siswa'] = '';

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/barangsita/barangsita_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function barangsita_edit($id_barangsita_siswa)
	{
		$cek = $this->db->query("SELECT id_barangsita_siswa FROM barangsita_siswa WHERE id_barangsita_siswa = '$id_barangsita_siswa'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Barang Sitaan Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Barang Sita";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $this->db->query("SELECT id_barangsita_siswa,barangsita_siswa.id_siswa, nama_kelas, nama_siswa, tanggal_sita, keterangan_sita FROM barangsita_siswa 
										INNER JOIN mst_siswa ON barangsita_siswa.id_siswa = mst_siswa.id_siswa 
										INNER JOIN mst_kelas ON barangsita_siswa.id_kelas = mst_kelas.id_kelas WHERE id_barangsita_siswa = '$id_barangsita_siswa'");
			$d = $get->row();
			$data['siswa'] = $d->id_siswa . '-' . $d->nama_siswa . '-' . $d->nama_kelas;
			$data['id_barangsita_siswa'] = $d->id_barangsita_siswa;
			$data['tanggal_sita'] = date("d-m-Y", strtotime($d->tanggal_sita));
			$data['keterangan_sita'] = $d->keterangan_sita;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/barangsita/barangsita_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}


	public function barangsita_save()
	{
		$tipe = $this->input->post("tipe");

		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$ex = explode("-", $this->input->post("id_siswa"));
		$in['id_siswa'] = $ex[0];
		$in['id_penginput'] = $this->session->userdata("id");
		$in['tahun_ajaran'] = $get_tahun->tahun_ajaran;
		$in['keterangan_sita'] = $this->input->post("keterangan_sita");
		$in['tanggal_sita'] = date("Y-m-d", strtotime($this->input->post('tanggal_sita')));
		if ($tipe == "add") {
			$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$in[id_siswa]'")->row();
			$in['id_kelas'] = $get_kelas->id_kelas;
			$this->db->insert("barangsita_siswa", $in);
			$this->session->set_flashdata("success", "Tambah barangsita Siswa Berhasil");
			redirect("BarangSita");
		} elseif ($tipe = 'edit') {
			$where['id_barangsita_siswa'] 	= $this->input->post('id_barangsita_siswa');
			$this->db->update("barangsita_siswa", $in, $where);
			$this->session->set_flashdata("success", "Ubah barangsita Siswa Berhasil");
			redirect("BarangSita");
		} else {
			redirect(base_url());
		}
	}

	public function barangsita_hapus($id)
	{
		$where['id_barangsita_siswa'] = $id;
		$this->db->delete("barangsita_siswa", $where);
		$this->session->set_flashdata("success", "Hapus barangsita Siswa Berhasil");
		redirect("BarangSita");
	}
}
