<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpus_buku  extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->Model('Perpus_model','perpus');
	}
	
	public function dashboard()
	{	
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Dashboard';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['count_pengguna_umum']=$this->db->query("SELECT * FROM perpus_angota")->num_rows();
			$data['count_pengguna_guru']=$this->db->query("SELECT * FROM m_guru WHERE stat_data = 'A'")->num_rows();
			$data['count_pengguna_siswa']=$this->db->query("SELECT * FROM m_siswa WHERE stat_data = 'K'")->num_rows();
			$data['count_buku']=$this->db->query("SELECT * FROM perpus_buku")->num_rows();
			$data['count_pinjam']=$this->db->query("SELECT * FROM perpus_pinjam WHERE status = 'Dipinjam'")->num_rows();
			$data['count_kembali']=$this->db->query("SELECT * FROM perpus_pinjam WHERE status = 'Di Kembalikan'")->num_rows();

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_buku/dashboard/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_buku/dashboard/dashboard_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_buku/dashboard/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function cari_buku()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Data Buku';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			// $data['kats'] =  $this->db->query("SELECT * FROM perpus_kategori ORDER BY id_kategori DESC")->result_array();
			$data['kats'] = $this->db->get('perpus_kategori')->result_array();

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_buku/data_buku/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_buku/data_buku/buku_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_buku/data_buku/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function tabel($target)
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
		$data['buku'] =
		$this->db->select('*')
		->from('perpus_buku')	
		->where(['nama_kategori' => $target])
		->group_by('id_buku', 'ASC')
		->get()->result_array();

		$this->load->view('perpus_buku/data_buku/_css');
        $this->load->view('perpus_buku/data_buku/buku_list', $data);
		$this->load->view('perpus_buku/data_buku/_js');
    }

	public function bukudetail()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Detail Data Buku';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			
			$count = $this->perpus->CountTableId('perpus_buku','id_buku',$this->uri->segment('3'));
			if($count > 0)
			{
				$data['buku'] = $this->perpus->get_tableid_edit('perpus_buku','id_buku',$this->uri->segment('3'));
			}else{
				echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
			}	

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_buku/data_buku/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_buku/data_buku/detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_buku/data_buku/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

}
