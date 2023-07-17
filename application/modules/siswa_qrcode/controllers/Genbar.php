<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Genbar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('GenBar_model', 'ion_auth');
	}

	public function index()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Add QRCode';
			$data['home'] = 'QRCode Siswa';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$this->load->view('layout/header-top', $data);
			$this->load->view('siswa_qrcode/ambilqr/_css');
			$this->load->view('layout/header-bottom', $data);
			$this->load->view('layout/main-navigation', $data);
			$this->load->view('siswa_qrcode/ambilqr/v_web', $data);
			$this->load->view('layout/footer-top');
			$this->load->view('siswa_qrcode/ambilqr/_js');
			$this->load->view('layout/footer-bottom');
			$this->benchmark->mark('code_end');
		} else {
		}
	}

	// data siswa
	public function tampildata()
	{
		cek_post();
		$list = $this->ion_auth->tampildata();
		// var_dump($list);
		// die;
		$record = array();
		$no = $_POST['start'];
		foreach ($list as $data) {
			$no++;

			// tombol action - dicek juga punya akses apa engga gengs....
			$tombol_action = ('<a href="genbar/edit/' . $data['siswa_id'] . '" class="btn btn-sm btn-warning btn-edit"><i class="fa fa-edit"></i></a>') .
				(' <a href="genbar/del/' . $data['siswa_id'] . '" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i></a>');

			// column buat data tables --
			$row = [
				'no' => $no,
				'foto' => '<center><img class="img-thumbnail" src="' . base_url() . 'panel/assets/img/qrcode/' . $data['nis'] . 'code.png" width=40 height=20></center>',
				'nis' => $data['nis'],
				'nisn' => $data['nisn'],
				'nama' => $data['nama'],
				'jk' => $data['jk'],
				'tgl_lahir' => $data['tgl_lahir'],
				'status' => ($data['stat_data'] == 'K' ? "Aktif" : "Tidak Aktif"),
				'action' => $tombol_action,
			];
			$record[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"recordsTotal" => $this->ion_auth->count_all(),
			"recordsFiltered" => $this->ion_auth->count_filtered(),
			"data" => $record,
		);
		//output to json format
		echo json_encode($output);
	}
	// end datata siswa

	public function showw()
	{
		$this->load->library('ciqrcode');
		$id = $this->input->post('id');
		$this->load->model('GenBar_model');
		$car = $this->GenBar_model->getShow_query($id);
		// var_dump($car);
		// die;
		if ($car->num_rows() > 0) {
			foreach ($car->result() as $row) {
				$shows = array(
					'nis' => $row->nis,
					'nama' => $row->nama,
					'tingkat' => $row->tingkat,
				);
				$this->load->view('siswa_qrcode/ambilqr/v_scan', $shows);
			}
		} else {
			$this->load->view('siswa_qrcode/ambilqr/v_scan_kosong');
		}
	}

	function get_autocomplete()
	{
		if (isset($_GET['term'])) {
			$result = $this->GenBar_model->search_value($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = array(
						'label' => $row->nama,
					);
				echo json_encode($arr_result);
			}
		}
	}

	public function create()
	{
		$this->benchmark->mark('code_start');
		$data['title'] = 'Upload Data ';
		$data['home'] = 'QRCode Siswa';
		$data['subtitle'] = $data['title'];
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();
		$data['cek_akses'] = cek_akses_user();
		$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
		$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
		$data['kelas'] = $this->ion_auth->get_kelas();
		$data['tahun'] = $this->ion_auth->get_tahun();
		// var_dump($data['pegawai']);
		// die;	
		$this->load->view('layout/header-top', $data);
		$this->load->view('siswa_qrcode/ambilqr/_css');
		$this->load->view('layout/header-bottom', $data);
		$this->load->view('layout/main-navigation', $data);
		$this->load->view('siswa_qrcode/ambilqr/v_create', $data);
		$this->load->view('layout/footer-top');
		$this->load->view('siswa_qrcode/ambilqr/_js');
		$this->load->view('layout/footer-bottom');
		$this->benchmark->mark('code_end');
	}

	public function download()
	{
		force_download('panel/dist/excel/Template_Siswa.xlsx', NULL);
	}

	public function excel()
	{
		if (isset($_FILES["file"]["name"])) {
			// upload
			$file_tmp = $_FILES['file']['tmp_name'];
			$file_name = $_FILES['file']['name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			// move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

			$object = PHPExcel_IOFactory::load($file_tmp);

			foreach ($object->getWorksheetIterator() as $worksheet) {

				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for ($row = 4; $row <= $highestRow; $row++) {

					$nis = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nisn = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$jk = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$tmp_lahir = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$tgl_lahir = $worksheet->getCellByColumnAndRow(5, $row)->getFormattedValue();
					$agama = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$notelp = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$diterima_kelas = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$diterima_tgl = $worksheet->getCellByColumnAndRow(9, $row)->getValue();

					$tingkat = $this->input->post('tingkat');
					$tahun_aktif = $this->input->post('tahun_aktif');
					$result_m_siswa = $this->db->get_where('m_siswa', ['nis' => $nis])->row_array();

					$data = [
						"nis" => $nis,
						"nisn" => $nisn,
						"nama" => $nama,
						"jk" => $jk,
						"tmp_lahir" => $tmp_lahir,
						"tgl_lahir" => $tgl_lahir,
						"agama" => $agama,
						"notelp" => $notelp,
						"diterima_kelas" => $diterima_kelas,
						"diterima_tgl" => $diterima_tgl,
						"tingkat" => $tingkat,
						"th_active" => $tahun_aktif,
						"foto" => 'default.jpg',
						"is_active" => 1,
					];

					// var_dump($data);
					// die;

					if ($result_m_siswa == 0) {
						$this->db->insert('m_siswa', $data);
						$message = array(
							'message' => '<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
						);
					} else {
						$this->db->where('nis', $result_m_siswa['nis']);
						$this->db->update('m_siswa', $data);
						$message = array(
							'message' => '<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
						);
					}
				}
			}

			$this->session->set_flashdata($message);
			redirect('siswa_qrcode/genbar');
		} else {
			$message = array(
				'message' => '<div class="alert alert-danger">Import file gagal, coba lagi</div>',
			);

			$this->session->set_flashdata($message);
			redirect('siswa_qrcode/genbar');
		}
	}

	public function del($id)
	{
		$data = ['siswa_id' => $id];
		$this->db->delete('m_siswa', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Berhasil Hapus Data !</div>');
		redirect('siswa_qrcode/genbar');
	}

	public function edit($id)
	{
		$this->benchmark->mark('code_start');
		$this->benchmark->mark('code_start');
		$data['title'] = 'Data Siswa';
		$data['home'] = 'Master Data';
		$data['subtitle'] = $data['title'];
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();
		$data['cek_akses'] = cek_akses_user();
		$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
		$data['sekolah'] = $this->db->get('m_sekolah')->row_array();

		$data['data'] = $this->ion_auth->get_edit($id);
		$data['p_jk']  = array("" => "Jns Kel", "L" => "Laki-laki", "P" => "Perempuan");
		$data['p_agama']  = array("" => "Agama", "Islam" => "Islam", "Katolik" => "Katolik", "Kristen" => "Kristen", "Hindu" => "Hindu", "Budha" => "Budha", "Konghucu" => "Konghucu");
		$data['p_status_anak']  = array("" => "Status Anak", "AK" => "Anak Kandung", "Anak Tiri" => "Anak Tiri");
		$data['p_diterima_kelas']  = $this->db->query("SELECT * from l_kelas")->result_array();
		// var_dump($data['data_pegawai']);
		// die;       
		$this->load->view('layout/header-top', $data);
		$this->load->view('siswa_qrcode/ambilqr/_css');
		$this->load->view('layout/header-bottom', $data);
		$this->load->view('layout/main-navigation', $data);
		$this->load->view('siswa_qrcode/ambilqr/v_edit', $data);
		$this->load->view('layout/footer-top');
		$this->load->view('siswa_qrcode/ambilqr/_js');
		$this->load->view('layout/footer-bottom');
		$this->benchmark->mark('code_end');
	}

	public function update()
	{
		cek_post();
		if (cek_akses_user()['role_id'] == 0) {
			redirect(base_url('unauthorized'));
		}
		$this->ion_auth->update();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Ubah Data !</div>');
		redirect('siswa_qrcode/genbar');
	}
}
