<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ahome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'home');
    }

    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Home';
        $data['home'] = 'Home';
        $data['subtitle'] = $data['title'];
        $data['sekolah'] = $this->home->sekolah();
        $data['kepsek'] = $this->db->get('profil_kepsek')->row_array();
        $data['active'] = $this->home->getActive();
        $data['sliders'] = $this->home->profil_slide();
        $data['belajara'] = $this->home->profil_belajar();
        $data['berita'] = $this->home->profil_artikel();
        $data['galery'] = $this->home->profil_galeri();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();
        $data['kepsek'] = $this->db->get('profil_kepsek')->row_array();
        $data['info'] = $this->db->get('profil_info')->row_array();
        // var_dump($data['sliders']);
        // die;
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

        $this->load->view('website/header', $data);
        $this->load->view('home_v', $data);
        $this->load->view('website/footer', $data);
        $this->benchmark->mark('code_end');
    }
}
