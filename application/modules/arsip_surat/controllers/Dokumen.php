<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->Model('Dokumen_model');
		$this->load->Model('Combo_model');
	}

	public function index()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Input Dokumen';
			$data['home'] = 'Arsip Sekolah';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Dokumen";
			$data['dokumen'] = $this->Dokumen_model->dokumen();

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_surat/dokumen/dokumen', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function dokumen_tambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Input Dokumen';
			$data['home'] = 'Arsip Sekolah';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$get_tahun = $this->db->query("SELECT id_tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$data['judul'] = "Data Dokumen";
			$data['judul2'] = "Tambah";
			$data['tipe'] = 'add';
			$data['nama_dokumen'] = "";
			$data['nomor_dokumen'] = "";
			$data['deskripsi'] = "";
			$data['id_dokumen'] = "";
			$data['file_dokumen'] = "";
			$data['tanggal_dokumen'] = "";
			$data['combo_ruangan'] = $this->Combo_model->combo_ruangan();
			$data['combo_lemari'] = $this->Combo_model->combo_lemari();
			$data['combo_rak'] = $this->Combo_model->combo_rak();
			$data['combo_box'] = $this->Combo_model->combo_box();
			$data['combo_map'] = $this->Combo_model->combo_map();
			$data['combo_urut'] = $this->Combo_model->combo_urut();
			$data['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($get_tahun->tahun_ajaran);
			$data['combo_jenis_dokumen'] = $this->Combo_model->combo_jenis_dokumen();

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_surat/dokumen/dokumen_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function dokumen_edit($id_dokumen)
	{
		$cek = $this->db->query("SELECT id_dokumen FROM mst_dokumen WHERE id_dokumen = '$id_dokumen'");
		if ($cek->num_rows() > 0) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Input Dokumen';
			$data['home'] = 'Arsip Sekolah';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['judul'] = "Data Dokumen";
			$data['judul2'] = "Ubah";
			$data['tipe'] = 'edit';
			$get = $this->Dokumen_model->dokumen_edit($id_dokumen);
			$d = $get->row();
			$data['nama_dokumen'] = $d->nama_dokumen;
			$data['id_dokumen'] = $d->id_dokumen;
			$data['nomor_dokumen'] = $d->nomor_dokumen;
			$data['deskripsi'] = $d->deskripsi;
			$data['file_dokumen'] = $d->file_dokumen;
			$data['tanggal_dokumen'] = $d->tanggal_dokumen;
			$data['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($d->tahun_ajaran);
			$data['combo_lemari'] = $this->Combo_model->combo_lemari($d->id_lemari);
			$data['combo_ruangan'] = $this->Combo_model->combo_ruangan($d->id_ruangan);
			$data['combo_jenis_dokumen'] = $this->Combo_model->combo_jenis_dokumen($d->nama_jenis_dokumen);
			$data['combo_rak'] = $this->Combo_model->combo_rak($d->id_rak);
			$data['combo_box'] = $this->Combo_model->combo_box($d->id_box);
			$data['combo_map'] = $this->Combo_model->combo_map($d->id_map);
			$data['combo_urut'] = $this->Combo_model->combo_urut($d->id_urut);

			$this->load->view('layout/header-top', $data);
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_surat/dokumen/dokumen_tambah', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function dokumen_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_jenis_dokumen'] = $this->input->post("nama_jenis_dokumen");		
		$in['nama_dokumen'] = $this->input->post("nama_dokumen");
		$in['nomor_dokumen'] = $this->input->post("nomor_dokumen");
		$in['deskripsi'] = $this->input->post("deskripsi");
		$in['id_ruangan'] = $this->input->post("id_ruangan");
		$in['id_rak'] = $this->input->post("id_rak");
		$in['id_box'] = $this->input->post("id_box");
		$in['id_map'] = $this->input->post("id_map");
		$in['id_urut'] = $this->input->post("id_urut");
		$in['id_lemari'] = $this->input->post("id_lemari");
		$in['tahun_ajaran'] = $this->input->post("tahun_ajaran");
		$in['tanggal_dokumen'] = date("Y-m-d", strtotime($this->input->post("tanggal_dokumen")));
		$in['tanggal'] = date("Y-m-d H:i:s");
// 		var_dump($in['nama_jenis_dokumen']);
// 		die;
		if ($in['nama_jenis_dokumen'] == 'Ijazah') {
			$config['upload_path'] = './panel/dist/upload/ijazah';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data = $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {
				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/ijazah/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Masuk') {
			$config['upload_path'] = './panel/dist/upload/surat_masuk';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_masuk/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Keluar') {
			$config['upload_path'] = './panel/dist/upload/surat_keluar';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_keluar/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Keputusan') {
			$config['upload_path'] = './panel/dist/upload/surat_keputusan';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_keputusan/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Undangan') {
			$config['upload_path'] = './panel/dist/upload/surat_undangan';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_undangan/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Permohonan') {
			$config['upload_path'] = './panel/dist/upload/surat_permohonan';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_permohonan/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Pemberitahuan') {
			$config['upload_path'] = './panel/dist/upload/surat_pemberitahuan';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_pemberitahuan/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Peminjaman') {
			$config['upload_path'] = './panel/dist/upload/surat_peminjaman';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_peminjaman/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Pernyataan') {
			$config['upload_path'] = './panel/dist/upload/surat_pernyataan';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_pernyataan/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Mandat') {
			$config['upload_path'] = './panel/dist/upload/surat_mandat';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_mandat/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Tugas') {
			$config['upload_path'] = './panel/dist/upload/surat_tugas';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_tugas/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Keterangan') {
			$config['upload_path'] = './panel/dist/upload/surat_keterangan';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_keterangan/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Rekomendasi') {
			$config['upload_path'] = './panel/dist/upload/surat_rekomendasi';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_rekomendasi/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Balasan') {
			$config['upload_path'] = './panel/dist/upload/surat_balasan';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_balasan'/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Perintah Perjalanan Dinas') {
			$config['upload_path'] = './panel/dist/upload/surat_perintah_perjalanan_dinas';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_perintah_perjalanan_dinas/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Sertifikat') {
			$config['upload_path'] = './panel/dist/upload/sertifikat';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/sertifikat/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Perjanjian Kerja') {
			$config['upload_path'] = './panel/dist/upload/perjanjian_kerja';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/perjanjian_kerja/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Pengantar') {
			$config['upload_path'] = './panel/dist/upload/surat_pengantar';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_pengantar/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Pindah') {
			$config['upload_path'] = './panel/dist/upload/surat_pindah';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_pindah/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Surat Pengesahan') {
			$config['upload_path'] = './panel/dist/upload/surat_pengesahan';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/surat_pengesahan/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		} elseif ($in['nama_jenis_dokumen'] == 'Laporan Bulanan') {
			$config['upload_path'] = './panel/dist/upload/laporan_bulanan';
			$config['allowed_types'] = '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			if ($tipe == "add") {
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->insert("mst_dokumen", $in);
						$this->session->set_flashdata("success", "Tambah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("arsip_surat/dokumen/dokumen_tambah/");
					}
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("arsip_surat/dokumen/dokumen_tambah/");
				}
			} elseif ($tipe = 'edit') {

				$where['id_dokumen'] = $this->input->post('id_dokumen');
				if (!empty($_FILES['file_dokumen']['name'])) {
					if ($this->upload->do_upload("file_dokumen")) {
						$data	 	= $this->upload->data();
						$in['file_dokumen'] = $data['file_name'];
						$this->db->update("mst_dokumen", $in, $where);
						@unlink("./panel/dist/upload/laporan_bulanan/" . $this->input->post("file_dokumen_lama"));
						$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
						redirect("arsip_surat/dokumen");
					}
				} else {
					$this->db->update("mst_dokumen", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Dokumen Berhasil");
					redirect("arsip_surat/dokumen");
				}
			} else {
				redirect(base_url());
			}
		}
	}
}
