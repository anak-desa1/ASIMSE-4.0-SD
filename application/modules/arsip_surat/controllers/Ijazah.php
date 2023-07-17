<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ijazah extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->model(['Mod_helper', 'Mod_ijazah', 'Mod_arsip']);
	}


	public function index()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Surat Ijazah';
			$data['home'] = 'Arsip Surat';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['ijazah'] = $this->Mod_ijazah->read();
			$data['disposisi'] = $this->db->get('surat_disposisi')->result_array();

			$this->load->view('layout/header-top', $data);
			$this->load->view('arsip_surat/ijazah/_css');
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_surat/ijazah/read', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('arsip_surat/ijazah/_js');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function update()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Surat Ijazah';
			$data['home'] = 'Arsip Surat';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();

			$id = $this->uri->segment(4);
			$data['detail'] = $this->Mod_ijazah->detail($id)->row_array();

			$this->load->view('layout/header-top', $data);
			$this->load->view('arsip_surat/ijazah/_css');
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_surat/ijazah/update', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('arsip_surat/ijazah/_js');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function detail()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Surat Ijazah';
			$data['home'] = 'Arsip Surat';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();

			$id = $this->uri->segment(4);
			$data['detail'] = $this->Mod_ijazah->detail($id)->row_array();

			$this->load->view('layout/header-top', $data);
			$this->load->view('arsip_surat/ijazah/_css');
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_surat/ijazah/detail', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('arsip_surat/ijazah/_js');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function ijazah_download($id)
	{
		if ($id != '') {
			$this->db->get_where('surat_ijazah', ['berkas' => $id]);
			redirect('panel/dist/upload/surat_ijazah/' . $id);
		} else {
			redirect('arsip_surat/ijazah');
		}
	}

	public function add()
	{
		if (isset($_POST['submit'])) {
			$nama_lengkap	= $this->input->post('nama_lengkap');
			$tempat_lahir  	= $this->input->post('tempat_lahir');
			$tgl_lahir 		= $this->input->post('tgl_lahir');
			$no_un 			= $this->input->post('no_un');
			$no_ijazah 		= $this->input->post('no_ijazah');
			$tahun_lulus	= $this->input->post('tahun_lulus');

			$ijazah 		= $_FILES['ijazah']['name'];
			$ijazah = time() . '-' . $ijazah;
			$config['file_name'] 		= $ijazah;
			$config['upload_path'] 		= './panel/dist/upload/surat_ijazah/';
			$config['allowed_types'] 	= 'jpeg|jpg|png|pdf|doc|docx|xls|xlsx|rar|zip|tar';
			$config['max_size']  		= 2000;
			$config['max_width']  		= 1024;
			$config['max_height']  		= 768;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('ijazah')) {
				echo "<script> alert('Maaf, File Gagal Di Upload.') </script>";
				die(redirect('arsip_surat/ijazah', 'refresh'));
			} else {
				$upload = array('upload_data' => $this->upload->data());
				echo "success";
			}

			$skhun 		= $_FILES['skhun']['name'];
			$skhun = time() . '-' . $skhun;
			$config['file_name'] 		= $skhun;
			$config['upload_path'] 		= './panel/dist/upload/surat_ijazah/';
			$config['allowed_types'] 	= 'jpeg|jpg|png|pdf|doc|docx|xls|xlsx|rar|zip|tar';
			$config['max_size']  		= 2000;
			$config['max_width']  		= 1024;
			$config['max_height']  		= 768;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('skhun')) {
				echo "<script> alert('Maaf, File Gagal Di Upload.') </script>";
				die(redirect('arsip_surat/ijazah', 'refresh'));
			} else {
				$upload = array('upload_data' => $this->upload->data());
				echo "success";
			}

			$data = array(
				'nama_lengkap' 	=> $nama_lengkap,
				'tempat_lahir' 	=> $tempat_lahir,
				'tgl_lahir' 	=> $tgl_lahir,
				'no_un' 		=> $no_un,
				'no_ijazah'	 	=> $no_ijazah,
				'tahun_lulus' 	=> $tahun_lulus,
				'berkas'		=> $ijazah,
				'skhun'			=> $skhun,
			);

			$data_arsip = array(
				'judul' => 'Ijazah - ' . $no_un,
				'nomor' => $no_ijazah,
				'tgl'	  => $tgl_lahir,
				'file_name' => $ijazah,
				'file_path' => $config['upload_path'],
				'jenis_surat' => 2,
				'uploader' => $nama_lengkap,
				'time_added' => date('Y-m-d H:i:s'),
				'is_approved' => 1
			);

			$data_arsip2 = array(
				'judul' => 'SKHUN - ' . $no_un,
				'nomor' => $no_ijazah,
				'tgl'	  => $tgl_lahir,
				'file_name' => $skhun,
				'file_path' => $config['upload_path'],
				'jenis_surat' => 2,
				'uploader' => $nama_lengkap,
				'time_added' => date('Y-m-d H:i:s'),
				'is_approved' => 1
			);

			$this->Mod_arsip->add_arsip($data_arsip);
			$this->Mod_arsip->add_arsip($data_arsip2);
			$this->Mod_ijazah->add($data);
			redirect('arsip_surat/ijazah');
		}
	}

	public function update_ijazah()
	{
		if (isset($_POST['submit'])) {
			$id 			= $this->input->post('id');
			$nama_lengkap	= $this->input->post('nama_lengkap');
			$tempat_lahir  	= $this->input->post('tempat_lahir');
			$tgl_lahir 		= $this->input->post('tgl_lahir');
			$no_un 			= $this->input->post('no_un');
			$no_ijazah 		= $this->input->post('no_ijazah');
			$tahun_lulus	= $this->input->post('tahun_lulus');
			$berkas 		= $this->input->post('berkas');
			$berkas2 		= $this->input->post('berkas2');

			$data = array(
				'id'			=> $id,
				'nama_lengkap' 	=> $nama_lengkap,
				'tempat_lahir' 	=> $tempat_lahir,
				'tgl_lahir' 	=> $tgl_lahir,
				'no_un' 		=> $no_un,
				'no_ijazah'	 	=> $no_ijazah,
				'tahun_lulus' 	=> $tahun_lulus,
				'berkas'		=> $berkas,
				'skhun'			=> $berkas2
			);
			$this->db->where('id', $id);
			$this->Mod_ijazah->update($data);
			redirect('arsip_surat/ijazah');
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$this->Mod_ijazah->delete($id, 'ijazah');
		redirect('arsip_surat/ijazah');
	}
}

/* End of file Ijazah.php */
/* Location: ./application/controllers/Ijazah.php */