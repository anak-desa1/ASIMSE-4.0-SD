<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Home_m', 'home');
    }

    public function index()
    {
        $data['title'] = 'Home';

        $data['periode'] = $this->db->get_where('ppdb_periode', ['is_active' => 1])->row_array();
        $data['EarlyBird'] = $this->home->EarlyBird();
        $data['Gelombang_1'] = $this->home->Gelombang_1();
        $data['Gelombang_2'] = $this->home->Gelombang_2();
        $data['kuota'] = $this->home->kuota();
        // var_dump($data['kuota']);
        // die;

        $data['pendaftar'] = $this->home->pendaftar();
        $data['pengumuman'] = $this->db->get_where('ppdb_pengumuman', ['jenis' => 2])->result_array();
        $data['sekolah'] = $this->home->getSekolah();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

        // $data['yayasan'] = $this->home->yayasan();
        // $data['cabang'] = $this->db->get('m_cabang')->result_array();
        
        // statistik
		$ip    = $this->input->ip_address(); // Mendapatkan IP user
		$date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
		$waktu = time(); //
		$timeinsert = date("Y-m-d H:i:s");

		// Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
		$s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
		$ss = isset($s) ? ($s) : 0;

		// Kalau belum ada, simpan data user tersebut ke database
		if ($ss == 0) {
			$this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
		}

		// Jika sudah ada, update
		else {
			$this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
		}

		$pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
		$dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();
		$totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung
		$bataswaktu = time() - 300;
		$pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online

		$data['pengunjunghariini'] = $pengunjunghariini;
		$data['totalpengunjung'] = $totalpengunjung;
		$data['pengunjungonline'] = $pengunjungonline;
		// end statistik
		
        //css for this page only
        $this->load->view('template/_css', $data);
        //======== end      
        $this->load->view('home_css', $data);
        $this->load->view('home_v', $data);
        $this->load->view('home_js', $data);
        // js for this page only
        $this->load->view('template/_js');
        //========= end
    }
}

/*
Theme Name: CAHDESO
Author: ALBERTUS EKO WILASATRYAWAN
Author URI: 'https://sistemanakdesa.my.id/'
Description: A development theme, from static HTML-CSS-JavaScript-PHP to CMS
Version: 1.0
License: GNU General Public License v2 or later
License URI: 'https://sistemanakdesa.my.id/'
*/

