<?php

class Scan extends Ci_Controller
{
	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Scan_model', 'Scan');
	}

	public function messageAlert($type, $title)
	{
		$messageAlert = "const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
		Toast.fire({
			type: '" . $type . "',
			title: '" . $title . "'
		});";
		return $messageAlert;
	}

	function index()
	{
		$this->benchmark->mark('code_start');
		$data['title'] = 'Scan QRCode';
		$data['home'] = 'QRCode Siswa';
		$data['subtitle'] = $data['title'];
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();
		$data['cek_akses'] = cek_akses_user();
		$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
		$data['sekolah'] = $this->db->get('m_sekolah')->row_array();

		$this->load->view('layout/header-top');
		$this->load->view('siswa_qrcode/scan/_css');
		$this->load->view('layout/header-bottom');
		$this->load->view('layout/header-notif');
		$this->load->view('layout/main-navigation', $data);
		if ($this->agent->is_mobile('iphone')) {
			$this->load->view('siswa_qrcode/scan/scan_mobile', $data);
		} elseif ($this->agent->is_mobile()) {
			$this->load->view('siswa_qrcode/scan/scan_mobile', $data);
		} else {
			$this->load->view('siswa_qrcode/scan/scan_desktop', $data);
		}
		$this->load->view('layout/footer-top');
		$this->load->view('siswa_qrcode/scan/_js');
		$this->load->view('layout/footer-bottom');
		$this->benchmark->mark('code_end');
	}

	function cek_id()
	{

		$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

		$result_code = $this->input->post('id_siswa');
		$tz = 'Asia/Jakarta';
		$dt = new DateTime("now", new DateTimeZone($tz));
		// $timestamp = $dt->format('Y-m-d G:i:s');
		$times = $dt->format('G:i:s');
		// var_dump($times);
		// die;
		$tgl = date('Y-m-d');
		$jam_msk = $times;
		$jam_klr = $times;
		// var_dump($jam_klr);
		// die;
		$cek_id = $this->Scan->cek_id($result_code);
		$cek_kehadiran = $this->Scan->cek_kehadiran($result_code, $tgl);

		if (!$cek_id) {
			$this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'absen gagal data QR tidak ditemukan'));
			redirect($_SERVER['HTTP_REFERER']);
		} elseif ($cek_kehadiran && $cek_kehadiran->jam_msk != '00:00:00' && $cek_kehadiran->jam_klr == '00:00:00' && $cek_kehadiran->id_status == 1) {
			$data = array(
				'jam_klr' => $jam_klr,
				'id_status' => 2,
			);
			$this->Scan->absen_pulang($result_code, $data);
			$this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'absen pulang'));
			redirect($_SERVER['HTTP_REFERER']);
		} elseif ($cek_kehadiran && $cek_kehadiran->jam_msk != '00:00:00' && $cek_kehadiran->jam_klr != '00:00:00' && $cek_kehadiran->id_status == 2) {
			$this->session->set_flashdata('messageAlert', $this->messageAlert('warning', 'sudah absen'));
			redirect($_SERVER['HTTP_REFERER']);
			return false;
		} else {
			$data = array(
				'id_siswa' => $result_code,
				'tgl' => $tgl,
				'jam_msk' => $jam_msk,
				'id_khd' => 1,
				'id_status' => 1,
			);
			$this->Scan->absen_masuk($data);
			// $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'absen masuk'));
			// redirect($_SERVER['HTTP_REFERER']);
			$this->_cekabsen($result_code, $tgl);
		}
	}

	public function _cekabsen($result_code, $tgl)
	{
		$this->benchmark->mark('code_start');
		$data['title'] = 'Cek Scan QRCode';
		$data['home'] = 'Absen Siswa';
		$data['subtitle'] = $data['title'];
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();
		$data['cek_akses'] = cek_akses_user();
		$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
		$data['sekolah'] = $this->db->get('m_sekolah')->row_array();

		// $tgl = date('Y-m-d');
		$data['siswa'] = $this->Scan->get_siswa($result_code, $tgl);
		// var_dump($data['siswa']);
		// die;
		$this->load->view('layout/header-top');
		$this->load->view('siswa_qrcode/scan/_css');
		$this->load->view('layout/header-bottom');
		$this->load->view('layout/header-notif');
		$this->load->view('layout/main-navigation', $data);
		$this->load->view('siswa_qrcode/scan/form_absen', $data);
		$this->load->view('layout/footer-top');
		$this->load->view('siswa_qrcode/scan/_js');
		$this->load->view('layout/footer-bottom');
		$this->benchmark->mark('code_end');
	}

	public function update()
	{
		cek_post();
		if (cek_akses_user()['role_id'] == 0) {
			redirect(base_url('unauthorized'));
		}
		$this->Scan->update();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data absen siswa berhasil disimpan !</div>');
		redirect('siswa_qrcode/scan');
	}
}
