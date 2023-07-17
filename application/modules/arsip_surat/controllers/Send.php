<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Send extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Mod_surat', 'surat');
		$this->load->model('Mod_arsip', 'arsip');
	}

	public function index()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Surat Keluar';
			$data['home'] = 'Arsip Surat';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['send'] = $this->surat->read_send();
			$data['disposisi'] = $this->db->get('surat_disposisi')->result_array();

			$this->load->view('layout/header-top', $data);
			$this->load->view('arsip_surat/send/_css');
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_surat/send/read', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('arsip_surat/send/_js');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function update()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Surat Keluar';
			$data['home'] = 'Arsip Surat';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();

			$id = $this->uri->segment(4);
			$data['views'] = $this->surat->view_keluar($id)->row_array();
			$data['disposisi'] = $this->db->get('surat_disposisi')->result_array();

			$this->load->view('layout/header-top', $data);
			$this->load->view('arsip_surat/send/_css');
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_surat/send/update', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('arsip_surat/send/_js');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function detail()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Surat Keluar';
			$data['home'] = 'Arsip Surat';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();

			$id = $this->uri->segment(4);
			$data['views'] = $this->surat->view_keluar($id)->row_array();

			$this->load->view('layout/header-top', $data);
			$this->load->view('arsip_surat/send/_css');
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('arsip_surat/send/detail', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('arsip_surat/send/_js');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	public function send_download($id)
	{
		if ($id != '') {
			$this->db->get_where('surat_keluar', ['berkas' => $id]);
			redirect('/panel/dist/upload/surat_keluar/' . $id);
		} else {
			redirect('arsip_surat/send');
		}
	}

	public function add()
	{
		if (isset($_POST['submit'])) {
			$tanggal 	= $this->input->post('tanggal');
			$nomor 		= $this->input->post('nomor');
			$pengirim	= $this->input->post('pengirim');
			$tertuju	= $this->input->post('tertuju');
			$alamat 	= $this->input->post('alamat');
			$perihal 	= $this->input->post('perihal');
			$berkas		= $_FILES['berkas']['name'];
			$disposisi 	= $this->input->post('disposisi');
			$isi 		= $this->input->post('isi_disposisi');
			$is_approved = $this->input->post('is_approved');

			$new_name = time() . '-' . $berkas;
			$config['file_name'] 		= $new_name;
			$config['upload_path'] 		= './panel/dist/upload/surat_keluar/';
			$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx|xls|xlsx|rar|zip|tar';
			$config['max_size']  		= 2000;
			$config['max_width']  		= 1024;
			$config['max_height']  		= 768;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('berkas')) {
				echo "<script> alert('Maaf, File Gagal Di Upload.') </script>";
				die(redirect('arsip_surat/send', 'refresh'));
			} else {
				$upload = array('upload_data' => $this->upload->data());
				echo "success";
			}

			$data = array(
				'tanggal' 		=> $tanggal,
				'nomor' 		=> $nomor,
				'pengirim' 		=> $pengirim,
				'perihal' 		=> $perihal,
				'tertuju'		=> $tertuju,
				'alamat' 		=> $alamat,
				'berkas' 		=> $upload["upload_data"]['file_name'],
				'disposisi' 	=> $disposisi,
				'isi_disposisi' => $isi,
				'is_approved'	=> $is_approved
			);

			$data_arsip = array(
				'judul' => $perihal,
				'nomor' => $nomor,
				'tgl'	  => $tanggal,
				'file_name' => $upload["upload_data"]['file_name'],
				'file_path' => $config['upload_path'],
				'jenis_surat' => 0,
				'uploader' => $pengirim,
				'time_added' => date('Y-m-d H:i:s'),
				'is_approved' => $is_approved
			);

			$this->arsip->add_arsip($data_arsip);
			$this->surat->add_send($data);
			redirect('arsip_surat/send');
		}
	}

	public function update_send()
	{
		if (isset($_POST['submit'])) {
			$id 		= $this->input->post('id');
			$tanggal 	= $this->input->post('tanggal');
			$nomor 		= $this->input->post('nomor');
			$pengirim	= $this->input->post('pengirim');
			$tertuju	= $this->input->post('tertuju');
			$alamat 	= $this->input->post('alamat');
			$perihal 	= $this->input->post('perihal');
			$berkas		= $this->input->post('berkas');
			$disposisi 	= $this->input->post('disposisi');
			$isi 		= $this->input->post('isi_disposisi');
			$is_approved = $this->input->post('is_approved');

			$data = array(
				'id'			=> $id,
				'tanggal' 		=> $tanggal,
				'nomor' 		=> $nomor,
				'pengirim' 		=> $pengirim,
				'perihal' 		=> $perihal,
				'tertuju'		=> $tertuju,
				'alamat' 		=> $alamat,
				'berkas' 		=> $berkas,
				'disposisi' 	=> $disposisi,
				'isi_disposisi' => $isi,
				'is_approved'	=> $is_approved
			);

			$this->db->where('id', $id);
			$this->surat->update_send($data);
			redirect('arsip_surat/send');
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$this->surat->delete_send($id, 'surat_keluar');
		redirect('arsip_surat/send');
	}
}

/* End of file Send.php */
/* Location: ./application/controllers/Send.php */