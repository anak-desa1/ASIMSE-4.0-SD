<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggaran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->Model('Pelanggaran_siswa_model');
		$this->load->Model('Combo_model');
	}

	public function index()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Pelanggaran Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Pelanggaran Siswa";
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$data['pelanggaran_siswa'] = $this->Pelanggaran_siswa_model->pelanggaran_siswa($get_tahun->tahun_ajaran);

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/pelanggaran/pelanggaran', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function ajax_siswa()
	{
		$query = $_POST['query'];
		$q = $this->db->query("SELECT id_siswa, nama_siswa, nama_kelas FROM mst_siswa 
									INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE nama_siswa LIKE '%$query%'");
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $data) {
				$arr[] = $data['id_siswa'] . ' - ' . $data['nama_kelas'] . ' - ' . $data['nama_siswa'];
			}
			echo json_encode($arr);
		}
	}


	public function pelanggaran_detail($id_siswa)
	{
		$cek = $this->db->query("SELECT * FROM mst_siswa INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE id_siswa = '$id_siswa'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Pelanggaran Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$d = $cek->row();
			$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$data['nama_sekolah'] = $get->nama_sekolah;
			$data['alamat_sekolah'] = $get->alamat;
			$data['website'] = $get->website;
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$data['judul'] = "Detail Pelanggaran Siswa";
			$data['nama_siswa']  = $d->nama_siswa;
			$data['nama_kelas']  = $d->nama_kelas;
			$data['foto']  = $d->foto;
			$data['alamat_jalan']  = $d->alamat_jalan;
			$data['kelurahan']  = $d->kelurahan;
			$data['kecamatan']  = $d->kecamatan;
			$data['kode_pos']  = $d->kode_pos;
			$data['hp']  = $d->hp;
			$data['no_hp_ayah']  = $d->no_hp_ayah;
			$data['no_hp_ibu']  = $d->no_hp_ibu;
			$data['tahun_ajaran'] = $get_tahun->tahun_ajaran;
			$data['pelanggaran_siswa'] = $this->Pelanggaran_siswa_model->pelanggaran_siswa_id($id_siswa, $get_tahun->tahun_ajaran);

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/pelanggaran/pelanggaran_detail', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function pelanggaran_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Pelanggaran Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Pelanggaran Siswa";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['tanggal'] = "";
			$data['id_pelanggaran_siswa'] = '';
			$data['siswa'] = '';
			$data['poin_pelanggaran'] = '';
			$data['combo_pelanggaran'] = $this->Combo_model->combo_pelanggaran();

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/pelanggaran/pelanggaran_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}


	public function pelanggaran_siswa_edit($id_pelanggaran_siswa)
	{

		$cek = $this->db->query("SELECT id_pelanggaran_siswa FROM pelanggaran_siswa WHERE id_pelanggaran_siswa = '$id_pelanggaran_siswa'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Pelanggaran Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Pelanggaran Siswa";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $this->Pelanggaran_siswa_model->pelanggaran_siswa_edit($id_pelanggaran_siswa);
			$d = $get->row();
			$data['siswa'] = $d->id_siswa . '-' . $d->nama_siswa . '-' . $d->nama_kelas;
			$data['id_pelanggaran_siswa'] = $d->id_pelanggaran_siswa;
			$data['poin_pelanggaran'] = $d->poin_minus;
			$data['tanggal'] = date("d-m-Y", strtotime($d->tanggal));
			$data['combo_pelanggaran'] = $this->Combo_model->combo_pelanggaran($d->id_poin_pelanggaran);

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/pelanggaran/pelanggaran_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function pelanggaran_save()
	{
		$tipe = $this->input->post("tipe");

		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$ex = explode("-", $this->input->post("id_siswa"));
		$in['id_poin_pelanggaran'] = $this->input->post("id_poin_pelanggaran");
		$in['id_siswa'] = $ex[0];
		$in['id_penginput'] = $this->session->userdata("id");
		$in['tahun_ajaran'] = $get_tahun->tahun_ajaran;
		$in['tanggal'] = date("Y-m-d", strtotime($this->input->post('tanggal')));
		$get_poin = $this->db->query("SELECT poin FROM mst_poin_pelanggaran WHERE id_poin_pelanggaran = '$in[id_poin_pelanggaran]'")->row();
		$in['poin_minus'] = $get_poin->poin;
		if ($tipe == "add") {
			$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$in[id_siswa]'")->row();
			$in['id_kelas'] = $get_kelas->id_kelas;
			$this->db->insert("pelanggaran_siswa", $in);
			$this->session->set_flashdata("success", "Tambah  Pelanggaran Siswa Berhasil");
			redirect("pelanggaran_jenis/pelanggaran");
		} elseif ($tipe = 'edit') {
			$where['id_pelanggaran_siswa'] 	= $this->input->post('id_pelanggaran_siswa');
			$this->db->update("pelanggaran_siswa", $in, $where);
			$this->session->set_flashdata("success", "Ubah Pelanggaran Siswa Berhasil");
			redirect("pelanggaran_jenis/pelanggaran");
		} else {
			redirect(base_url());
		}
	}

	public function pelanggaran_hapus($id)
	{
		$where['id_pelanggaran_siswa'] = $id;
		$this->db->delete("pelanggaran_siswa", $where);
		$this->session->set_flashdata("success", "Hapus Pelanggaran Siswa Berhasil");
		redirect("pelanggaran_jenis/pelanggaran");
	}
}
