<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scqrcode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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

    public function index()
    {  
        if ($this->form_validation->run() == false) {
            $data['title'] = 'SC QRCode';
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array(); 
            
            $data['hadir'] = $this->Scan->get_Hadir(); 
			$data['sakit'] = $this->Scan->get_Sakit();
			$data['ijin'] = $this->Scan->get_Ijin();
			$data['alpha'] = $this->Scan->get_Alpha();

			// $data['total_masuk'] = $this->Scan->total_masuk();
			$data['masuk'] = $this->Scan->get_masuk();
			$data['terlambat'] = $this->Scan->get_terlambat();
			$data['pulang'] = $this->Scan->get_pulang();
			$data['pulang_cepat'] = $this->Scan->get_pulang_cepat();
			$data['tidak_absen'] = $this->Scan->get_tidak_absen();
			
			if (date('G') == 4) {
				$this->session->set_flashdata('message', '<embed src="'.base_url().'panel/assets/audio/happy-day-113985.mp3" autostart=true loop=false width="200px" height="70px"><p id="demo"> </p>');
			}         
			
            $this->load->view('layout/login_header', $data);
            $this->load->view('scqrcode/_css');
            $this->load->view('scqrcode/_view');
            $this->load->view('scqrcode/_js');
            $this->load->view('layout/login_footer');
        } else {
            // validasinya success            
        }
    }

	public function masuk()
    {  
        if ($this->form_validation->run() == false) {
            $data['title'] = 'SC QRCode';
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array(); 
			$data['siswa_masuk'] = $this->Scan->get_masuk_siswa();
			// var_dump($data['siswa_masuk']);
			// die;           
            $this->load->view('layout/login_header', $data);
            $this->load->view('scqrcode/_css');
            $this->load->view('scqrcode/_masuk');
            $this->load->view('scqrcode/_js');
            $this->load->view('layout/login_footer');
        } else {
            // validasinya success            
        }
    }

	public function pulang()
    {  
        if ($this->form_validation->run() == false) {
            $data['title'] = 'SC QRCode';
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array(); 
			$data['siswa_pulang'] = $this->Scan->get_pulang_siswa();           
            $this->load->view('layout/login_header', $data);
            $this->load->view('scqrcode/_css');
            $this->load->view('scqrcode/_pulang');
            $this->load->view('scqrcode/_js');
            $this->load->view('layout/login_footer');
        } else {
            // validasinya success            
        }
    }

    function cek_id_masuk()
	{
		//echo "cek";
		//die;
		$jam = $this->db->get_where('ab_blangko')->row_array();
		$result_code = $this->input->post('id_siswa');
		
		$tz = 'Asia/Jakarta';
		$dt = new DateTime("now", new DateTimeZone($tz));
		// $timestamp = $dt->format('Y-m-d G:i:s');
		$times = $dt->format('G:i:s');
		$tgl = date('Y-m-d');
		$jam_msk = $times;
		$jam_awal = '07:30:00';
		$cek_id = $this->Scan->cek_id($result_code);
		$cek_kehadiran = $this->Scan->cek_kehadiran($result_code, $tgl);

		// echo json_encode($cek_kehadiran);
		// die;
		if (!$cek_id) {
			$this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'absen gagal data QR tidak ditemukan'));
			// cek data awal	
		} elseif ($cek_kehadiran && $cek_kehadiran->jam_msk != '00:00:00' && $cek_kehadiran->jam_klr != '00:00:00' && $cek_kehadiran->id_status == 2) {
			$this->session->set_flashdata('messageAlert', $this->messageAlert('warning', 'sudah absen'));
			redirect($_SERVER['HTTP_REFERER']);
			return false;
			// cek data akhir	
		} else {
			if($jam_awal > $jam_msk){
				$data_masuk = array(
					'id_siswa' => $result_code,
					'tgl' => $tgl,
					'jam_msk' => $jam_msk,
					'id_khd' => 1,
					'id_status' => 1,
					'masuk' => 4,
				);
				//echo "step 1";
			}
			if($jam_awal < $jam_msk){
				$data_masuk = array(
					'id_siswa' => $result_code,
					'tgl' => $tgl,
					'jam_msk' => $jam_msk,
					'id_khd' => 1,
					'id_status' => 1,
					'masuk' => 5,
				);
				//echo "step 1";
			}
			
			$this->Scan->absen_masuk($data_masuk);
			$this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'absen masuk'));
			// input data absen
			redirect('scqrcode/masuk');
		}
		//echo "step stop";
		//die;
	}

	function cek_id_pulang()
	{
		//echo "cek";
		//die;
		$jam = $this->db->get_where('ab_blangko')->row_array();

		$result_code = $this->input->post('id_siswa');
		
		$tz = 'Asia/Jakarta';
		$dt = new DateTime("now", new DateTimeZone($tz));
		// $timestamp = $dt->format('Y-m-d G:i:s');
		$times = $dt->format('G:i:s');
		$tgl = date('Y-m-d');
		$jam_klr = $times;
		$jam_akhir = '14:30:00';
		$cek_id = $this->Scan->cek_id($result_code);
		$cek_kehadiran = $this->Scan->cek_kehadiran($result_code, $tgl);

		// echo json_encode($cek_kehadiran);
		// die;
		if (!$cek_id) {
			$this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'absen gagal data QR tidak ditemukan'));
			// cek data awal
		} elseif ($cek_kehadiran && $cek_kehadiran->jam_msk != '00:00:00' && $cek_kehadiran->jam_klr == '00:00:00' && $cek_kehadiran->id_status == 1) {
			if($jam_klr > $jam_akhir) {
				$data_pulang = array(
					'jam_klr' => $jam_klr,
					'id_status' => 2,
					'pulang' => 6,
				);
			}
			if($jam_klr < $jam_akhir) {
				$data_pulang = array(
					'jam_klr' => $jam_klr,
					'id_status' => 2,
					'pulang' => 7,
				);
			}
			$this->Scan->absen_pulang($result_code, $data_pulang);
			$this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'absen pulang'));
			// update data absen
		} elseif ($cek_kehadiran && $cek_kehadiran->jam_msk != '00:00:00' && $cek_kehadiran->jam_klr != '00:00:00' && $cek_kehadiran->id_status == 2) {
			$this->session->set_flashdata('messageAlert', $this->messageAlert('warning', 'sudah absen'));
			redirect($_SERVER['HTTP_REFERER']);
			return false;
			// cek data akhir
		} 
		//echo "step stop";
		//die;
		redirect('scqrcode/pulang');
	}

}
