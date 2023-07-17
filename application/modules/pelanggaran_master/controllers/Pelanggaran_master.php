<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggaran_master extends CI_Controller
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

	public function get_poin_pelanggaran()
	{
		$id_poin_pelanggaran = $_GET['id_poin_pelanggaran'];
		$get = $this->db->query("SELECT * FROM mst_poin_pelanggaran WHERE id_poin_pelanggaran = '$id_poin_pelanggaran'")->row();
		echo $get->poin;
	}

	public function poin_pelanggaran()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Poin Pelanggaran';
			$data['home'] = 'Master Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Poin Pelanggaran";
			$data['poin_pelanggaran'] = $this->Master_model->poin_pelanggaran();

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_master/poin_pelanggaran/poin_pelanggaran', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function poin_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Poin Pelanggaran';
			$data['home'] = 'Master Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Poin Pelanggaran";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['nama_poin_pelanggaran'] = "";
			$data['poin'] = "";
			$data['id_poin_pelanggaran'] = "";

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_master/poin_pelanggaran/poin_pelanggaran_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function poin_edit($id_poin_pelanggaran)
	{
		$cek = $this->db->query("SELECT id_poin_pelanggaran FROM mst_poin_pelanggaran WHERE id_poin_pelanggaran = '$id_poin_pelanggaran'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Poin Pelanggaran';
			$data['home'] = 'Master Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Poin Pelanggaran";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $this->Master_model->poin_pelanggaran_edit($id_poin_pelanggaran);
			$d = $get->row();
			$data['nama_poin_pelanggaran'] = $d->nama_poin_pelanggaran;
			$data['poin'] = $d->poin;
			$data['id_poin_pelanggaran'] = $d->id_poin_pelanggaran;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_master/poin_pelanggaran/poin_pelanggaran_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function poin_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_poin_pelanggaran'] = $this->input->post("nama_poin_pelanggaran");
		$in['poin'] = $this->input->post("poin");
		if ($tipe == "add") {
			$cek = $this->db->query("SELECT nama_poin_pelanggaran FROM mst_poin_pelanggaran WHERE nama_poin_pelanggaran = '$in[nama_poin_pelanggaran]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Poin Pelanggaran Sudah Digunakan");
				redirect("pelanggaran_master/poin_pelanggaran_tambah/");
			} else {
				$this->db->insert("mst_poin_pelanggaran", $in);
				$this->session->set_flashdata("success", "Tambah Data Poin Pelanggaran Berhasil");
				redirect("pelanggaran_master/poin_pelanggaran/");
			}
		} elseif ($tipe = 'edit') {
			$where['id_poin_pelanggaran'] 	= $this->input->post('id_poin_pelanggaran');
			$cek = $this->db->query("SELECT nama_poin_pelanggaran FROM mst_poin_pelanggaran WHERE nama_poin_pelanggaran = '$in[nama_poin_pelanggaran]' AND id_poin_pelanggaran != '$where[id_poin_pelanggaran]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Poin Pelanggaran Sudah Digunakan");
				redirect("pelanggaran_master/poin_pelanggaran_edit/" . $this->input->post("id_poin_pelanggaran"));
			} else {
				$this->db->update("mst_poin_pelanggaran", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Poin Pelanggaran Berhasil");
				redirect("pelanggaran_master/poin_pelanggaran/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function poin_hapus($id)
	{
		$where['id_poin_pelanggaran'] = $id;
		$this->db->delete("mst_poin_pelanggaran", $where);
		$this->session->set_flashdata("success", "Hapus Poin Pelanggaran Berhasil");
		redirect("pelanggaran_master/poin_pelanggaran/");
	}

	public function poin_import()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$unggah['upload_path']   = './panel/dist/upload/pelanggran/';
			$unggah['allowed_types'] = 'xlsx';
			$unggah['file_name']     = 'poin_import';
			$unggah['overwrite']     = true;
			$unggah['max_size']      = 5120;

			$this->upload->initialize($unggah);
			if ($this->upload->do_upload('file_import')) {
				$file_excel = new unggahexcel('panel/dist/upload/pelanggran/format/poin_import.xlsx', null);

				if (count($file_excel->Sheets()) == 1) {
					$baris = 1;

					foreach ($file_excel as $kolom) {
						if ($baris >= 2) {
							$in['nama_poin_pelanggaran'] = $kolom[0];
							$in['poin'] = $kolom[1];
							$this->db->insert("mst_poin_pelanggaran", $in);
						}
						$baris++;
					}

					$this->session->set_flashdata("success", "Berhasil Import Data Poin Pelanggaran");
				} else {
					$this->session->set_flashdata("error", "Gagal Import Data");
				}
			} else {
				$this->session->set_flashdata("error", $this->upload->display_errors());
			}
			unlink('./panel/dist/upload/pelanggran/poin_import.xlsx');
			redirect("pelanggaran_master/poin_pelanggaran");
		} else {
			redirect(base_url());
		}
	}

	// sanksi
	public function sanksi_pelanggaran()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Sanksi Pelanggaran';
			$data['home'] = 'Master Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Sanksi";
			$data['sanksi'] = $this->Master_model->sanksi();

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_master/sanksi/sanksi', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function sanksi_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Sanksi Pelanggaran';
			$data['home'] = 'Master Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Sanksi";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['dari_poin'] = "";
			$data['sampai_poin'] = "";
			$data['sanksi'] = "";
			$data['id_sanksi'] = "";

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_master/sanksi/sanksi_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}


	public function sanksi_edit($id_sanksi)
	{
		$cek = $this->db->query("SELECT * FROM mst_sanksi WHERE id_sanksi = '$id_sanksi'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Sanksi Pelanggaran';
			$data['home'] = 'Master Pelanggaran';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Sanksi";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$d = $cek->row();
			$data['dari_poin'] = $d->dari_poin;
			$data['sampai_poin'] = $d->sampai_poin;
			$data['sanksi'] = $d->sanksi;
			$data['id_sanksi'] = $d->id_sanksi;

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('pelanggaran_master/sanksi/sanksi_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function sanksi_save()
	{
		$tipe = $this->input->post("tipe");
		$in['dari_poin'] = $this->input->post("dari_poin");
		$in['sampai_poin'] = $this->input->post("sampai_poin");
		$in['sanksi'] = $this->input->post("sanksi");
		if ($tipe == "add") {
			$this->db->insert("mst_sanksi", $in);
			$this->session->set_flashdata("success", "Tambah Data Sanksi Berhasil");
			redirect("pelanggaran_master/sanksi_pelanggaran/");
		} elseif ($tipe = 'edit') {
			$where['id_sanksi'] = $this->input->post('id_sanksi');
			$this->db->update("mst_sanksi", $in, $where);
			$this->session->set_flashdata("success", "Ubah Data Sanksi Berhasil");
			redirect("pelanggaran_master/sanksi_pelanggaran/");
		} else {
			redirect(base_url());
		}
	}

	public function sanksi_hapus($id)
	{
		$where['id_sanksi'] = $id;
		$this->db->delete("mst_sanksi", $where);
		$this->session->set_flashdata("success", "Hapus Sanksi Berhasil");
		redirect("pelanggaran_master/sanksi_pelanggaran/");
	}
	// end sanksi
}
