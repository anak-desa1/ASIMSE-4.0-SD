<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mutasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Mutasi_m', 'psb');
    }

    public function index()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric|min_length[16]|max_length[18]|is_unique[ppdb_daftar.nik]', [
            'is_unique' => 'NIK sudah digunakan !'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Data belum di isi !'
        ]);
        $this->form_validation->set_rules('no_hp', 'NO HANDPHONE', 'required', [
            'required' => 'Data belum di isi !'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'TEMPAT LAHIR', 'required', [
            'required' => 'Data belum di isi !'
        ]);
        $this->form_validation->set_rules('password', 'PASSWORD', 'required', [
            'required' => 'Data belum di isi !'
        ]);
        if ($this->form_validation->run() ==  false) {
            $data['title'] = 'Form Pendaftaran';
            $data['kampus'] = $this->psb->getAllKampus();
            $data['jenis'] = $this->psb->getAllJenis();
            $data['periode'] = $this->psb->getAllPeriode();
            $data['asal_sekolah'] = $this->psb->getAsalSekolah();

            $data['periode_aktif'] = $this->db->get_where('ppdb_periode', ['is_active' => 1])->row_array();

            $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
            $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

            $data['yayasan'] = $this->psb->yayasan();
            $data['cabang'] = $this->db->get('m_cabang')->result_array();

            $data['pengumuman'] = $this->db->get_where('ppdb_pengumuman', ['jenis' => 2])->result_array();
            
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
            $this->load->view('mutasi_v', $data);
            // js for this page only
            $this->load->view('template/_js');
            $this->load->view('mutasi_js');
            //========= end
        } else {

            $kodedaftar = $this->psb->getId();
            $allPeriode =  $this->db->get_where('ppdb_periode', ['periode' => $this->input->post('periode', true), 'is_active' => 0])->row_array();
            $noUrut = $kodedaftar['id_daftar'] + 1;
            $tahun = $allPeriode['tahun'];
            $no_daftar = 'PSB' .  $tahun . sprintf("%03s", $noUrut);
            // var_dump($no_daftar);
            // die;

            $kd_campus = $this->input->post('kd_campus', true);
            $kd_sekolah = $this->input->post('kd_sekolah', true);
            $jenis = $this->input->post('jenis', true);
            $nik = $this->input->post('nik', true);
            $nama = $this->input->post('nama', true);
            $periode = $this->input->post('periode', true);

            $asal_gereja = $this->input->post('asal_gereja', true);
            $status_siswa = $this->input->post('status_siswa', true);

            $no_hp = $this->input->post('no_hp', true);
            $kelas = $this->input->post('kelas', true);

            $asal_sekolah = $this->input->post('asal_sekolah', true);

            $tempat_lahir = $this->input->post('tempat_lahir', true);
            $tgl_lahir = $this->input->post('tgl_lahir', true);
            $password = $this->input->post('password');
            $password1 = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data = [
                "no_daftar" => $no_daftar,
                "kd_campus" => $kd_campus,
                "kd_sekolah" => $kd_sekolah,
                "jenis" => $jenis,
                "nik" => $nik,
                "nama" => $nama,
                "periode" => $periode,
                "asal_gereja" => $asal_gereja,
                "status_siswa" => $status_siswa,
                "no_hp" => $no_hp,
                "kelas" => $kelas,
                "asal_sekolah" => $asal_sekolah,
                // "npsn_asal" => $npsn_asal,
                "tempat_lahir" => $tempat_lahir,
                "tgl_lahir" => $tgl_lahir,
                "password" => $password1,
                "password_x" => $password,
                "foto" => 'default-avatar.png',
                "is_active" => 1,
            ];

            $this->db->insert('ppdb_daftar', $data);
            $this->session->set_flashdata(
                'message',
                '
            <div class="alert alert-info" role="alert">
            <div class="card-header">
                <center>
                    <h4>SELAMAT PENDAFTARAN BERHASIL</h4>
                </center>
            </div>
             <div class="card-body">
                <center>
                    <h3>Hai!, ' . $nama . '  </h3>
                    <h3>"AKUN ANDA BERHASIL DIBUAT"</h3>
                    <h5>silahkan login dengan menggunakan</h5>
                    <p> USERNAME : ' . $no_daftar . ' <b></b></p>
                    <p> PASSWORD :  ' . $password . '<b></b></p>
                    <h5>*MOHON DIINGAT JIKA PERLU SCREENSHOT</h5>
                </center>
                </div>
           </div>
           '
            );
            redirect('mutasi');
        }
    }

    function add_sekolah($kd_campus)
    {
        $query = $this->db->get_where('l_sekolah', array('kd_campus' => $kd_campus));
        $data = "<option value=''>- Select Sekolah -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->kd_sekolah . "'>" . $value->nama_sekolah . "</option>";
        }
        echo $data;
    }

    function add_kelas($kd_sekolah)
    {
        $query = $this->db->get_where('l_kelas', array('kd_sekolah' => $kd_sekolah));
        $data = "<option value=''>- Select kelas -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->kelas . "'>" . $value->kelas . "</option>";
        }
        echo $data;
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

