<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->Model('Peminjaman_siswa_model');
		$this->load->Model('Combo_model');
	}

	public function index()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Peminjaman Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Peminjaman";
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$data['peminjaman'] = $this->Peminjaman_siswa_model->peminjaman($get_tahun->tahun_ajaran);

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/peminjaman/peminjaman', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function peminjaman_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Peminjaman Siswa';
			$data['home'] = 'Jenis Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Peminjaman Siswa";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['tanggal_pinjam'] = "";
			$data['id_peminjaman_siswa'] = '';
			$data['keterangan_pinjam'] = '';
			$data['siswa'] = '';

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/peminjaman/peminjaman_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function peminjaman_edit($id_peminjaman_siswa)
	{
		$cek = $this->db->query("SELECT id_peminjaman_siswa FROM peminjaman_siswa WHERE id_peminjaman_siswa = '$id_peminjaman_siswa'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Peminjaman Siswa';
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
			$get = $this->db->query("SELECT id_peminjaman_siswa,peminjaman_siswa.id_siswa, nama_kelas, nama_siswa, tanggal_pinjam, keterangan_pinjam FROM peminjaman_siswa 
										INNER JOIN mst_siswa ON peminjaman_siswa.id_siswa = mst_siswa.id_siswa 
										INNER JOIN mst_kelas ON peminjaman_siswa.id_kelas = mst_kelas.id_kelas WHERE id_peminjaman_siswa = '$id_peminjaman_siswa'");
			$da = $get->row();
			$data['siswa'] = $da->id_siswa . '-' . $da->nama_siswa . '-' . $da->nama_kelas;
			$data['id_peminjaman_siswa'] = $da->id_peminjaman_siswa;
			$data['tanggal_pinjam'] = date("d-m-Y", strtotime($da->tanggal_pinjam));
			$data['keterangan_pinjam'] = $da->keterangan_pinjam;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_jenis/peminjaman/peminjaman_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}


	public function peminjaman_save()
	{
		$tipe = $this->input->post("tipe");

		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$ex = explode("-", $this->input->post("id_siswa"));
		$in['id_siswa'] = $ex[0];
		$in['id_penginput'] = $this->session->userdata("id");
		$in['tahun_ajaran'] = $get_tahun->tahun_ajaran;
		$in['keterangan_pinjam'] = $this->input->post("keterangan_pinjam");
		$in['tanggal_pinjam'] = date("Y-m-d", strtotime($this->input->post('tanggal_pinjam')));
		if ($tipe == "add") {
			$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$in[id_siswa]'")->row();
			$in['id_kelas'] = $get_kelas->id_kelas;
			$this->db->insert("peminjaman_siswa", $in);
			$this->session->set_flashdata("success", "Tambah Peminjaman Siswa Berhasil");
			redirect("peminjaman");
		} elseif ($tipe = 'edit') {
			$where['id_peminjaman_siswa'] 	= $this->input->post('id_peminjaman_siswa');
			$this->db->update("peminjaman_siswa", $in, $where);
			$this->session->set_flashdata("success", "Ubah peminjaman Siswa Berhasil");
			redirect("peminjaman");
		} else {
			redirect(base_url());
		}
	}

	public function peminjaman_hapus($id)
	{
		$where['id_peminjaman_siswa'] = $id;
		$this->db->delete("peminjaman_siswa", $where);
		$this->session->set_flashdata("success", "Hapus Peminjaman Siswa Berhasil");
		redirect("peminjaman");
	}
}
