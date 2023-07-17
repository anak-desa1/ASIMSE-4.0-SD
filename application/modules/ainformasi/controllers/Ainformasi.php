<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ainformasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Informasi_model', 'home');
    }

    // ppdb
    public function ppdb()
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

            $this->benchmark->mark('code_start');
            $data['title'] = 'PPDB';
            $data['home'] = 'Informasi';
            $data['subtitle'] = $data['title'];
            $data['sekolah'] = $this->home->sekolah();
            $data['kepsek'] = $this->db->get('profil_kepsek')->row_array();

            $data['jenis'] = $this->home->getAllJenis();
            $data['periode'] = $this->home->getAllPeriode();
            $data['asal_sekolah'] = $this->home->getAsalSekolah();

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

            $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();
            $data['kelas'] = $this->db->get_where('l_kelas')->result_array();
            $data['sekolah'] = $this->home->sekolah();

            $get_tasm = $this->db->get_where('ppdb_periode', ['is_active' => 1])->row_array();
            $tahun = $get_tasm['tahun'];

            $data['periode_aktif'] = $this->db->get_where('ppdb_periode', ['is_active' => 1])->row_array();
            $data['pendaftar'] = $this->db->get_where('ppdb_daftar', ['is_active' => 1, 'tgl_daftar' => $tahun])->result_array();
            $data['pengumuman'] = $this->db->get_where('ppdb_pengumuman', ['jenis' => 2])->result_array();

            $this->load->view('website/header', $data);
            $this->load->view('ppdb_form_v', $data);
            $this->load->view('website/footer', $data);
            $this->benchmark->mark('code_end');
        } else {

            $data = $this->home->getId();
            $allPeriode =  $this->db->get_where('ppdb_periode', ['periode' => $this->input->post('periode', true), 'is_active' => 1])->row_array();
            $kodedaftar = $data['maxKode'];
            $noUrut = (int) substr($kodedaftar, 8, 3);
            $noUrut++;
            $tahun = $allPeriode['tahun'];
            $char = "PPDB" . $tahun;
            $newID = $char . sprintf("%03s", $noUrut);
            // var_dump($no_daftar);
            // die;

            $jenis = $this->input->post('jenis', true);
            $nik = $this->input->post('nik', true);
            $nama = $this->input->post('nama', true);
            $periode = $this->input->post('periode', true);
            $no_hp = $this->input->post('no_hp', true);
            $kelas = $this->input->post('kelas', true);

            $npsn_asal = $this->input->post('npsn', true);
            $asal = $this->db->get_where('ppdb_sekolah', ['npsn' => $npsn_asal])->row_array();
            $asal_sekolah = $asal['nama_sekolah'];

            $tempat_lahir = $this->input->post('tempat_lahir', true);
            $tgl_lahir = $this->input->post('tgl_lahir', true);
            $password = $this->input->post('password');
            $password1 = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data = [
                "no_daftar" => $newID,
                "jenis" => $jenis,
                "nik" => $nik,
                "nama" => $nama,
                "periode" => $periode,
                "no_hp" => $no_hp,
                "kelas" => $kelas,
                "asal_sekolah" => $asal_sekolah,
                "npsn_asal" => $npsn_asal,
                "tempat_lahir" => $tempat_lahir,
                "tgl_lahir" => $tgl_lahir,
                "password" => $password1,
                "password_x" => $password,
                "foto" => 'default-avatar.png',
                "is_active" => 1,
                "tgl_daftar" => $tahun,
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
                    <p> USERNAME : ' . $newID . ' <b></b></p>
                    <p> PASSWORD :  ' . $password . '<b></b></p>
                    <h5>*MOHON DIINGAT JIKA PERLU SCREENSHOT</h5>
                </center>
                </div>
           </div>
           '
            );
            redirect('ainformasi/ppdb');
        }
    }
    // end ppdb

    // vaksin
    public function vaksin()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Vaksin';
        $data['home'] = 'Informasi';
        $data['subtitle'] = $data['title'];
        $data['sekolah'] = $this->home->sekolah();
        $data['kepsek'] = $this->db->get('profil_kepsek')->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

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

        // var_dump($data['ekstra']);
        // die;
        $this->load->view('website/header', $data);
        $this->load->view('vaksin_v', $data);
        $this->load->view('_js');
        $this->load->view('website/footer', $data);
        $this->benchmark->mark('code_end');
    }

    public function vaksin_cari($id)
    {
        $data['vaksin'] = $this->home->get_vaksin($id);
        $this->load->view('ainformasi/vaksin_data', $data);
    }

    public function mpdf_cetak($id)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $data['vaksin'] = $this->home->get_vaksin($id);
        $vaksin = $this->home->get_vaksin($id);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | {DATE j-m-Y}</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . $vaksin['nik'] . ' | ' . $vaksin['nama_siswa'] . ' | ' . 'demo.sistemanakdesa.my.id' . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('vaksin_pdf_1', $data, TRUE);
        $mpdf->WriteHTML($html1);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
              <tr>
                  <td width="25%">{PAGENO}/{nbpg} | {DATE j-m-Y}</td>
                  <td width="0%" align="center"></td>
                  <td width="75%" style="text-align: right;  "><p>' . $vaksin['nik'] . ' | ' . $vaksin['nama_siswa'] . ' | ' . ' demo.sistemanakdesa.my.id' . ' </p></td>
              </tr>
          </table>');
        $html2 = $this->load->view('vaksin_pdf_2', $data, TRUE);
        $mpdf->WriteHTML($html2);

        $nama_file_pdf = ($vaksin['nik'] . ' _ ' . $vaksin['nama_siswa']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
    }
    //end vaksin
    // lulus
    public function lulus()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Kelulusan';
        $data['home'] = 'Informasi';
        $data['subtitle'] = $data['title'];
        $data['sekolah'] = $this->home->sekolah();
        $data['kepsek'] = $this->db->get('profil_kepsek')->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();
        $data['publish'] = $this->db->get('m_lulus_data')->row_array();

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

        // var_dump($data['prestasi']);
        // die;
        $this->load->view('website/header', $data);
        $this->load->view('lulus_v', $data);
        $this->load->view('_js');
        $this->load->view('website/footer', $data);
        $this->benchmark->mark('code_end');
    }

    public function lulus_cari($id)
    {
        $data['lulus'] = $this->home->get_lulus($id);
        $this->load->view('ainformasi/lulus_data', $data);
    }

    public function print_lulus($id)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['lulus'] = $this->db->get_where('m_lulus', ['lulus_id' => $id])->row_array();
        $data['publish'] = $this->db->get('m_lulus_data')->row_array();
       
        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();       
        // var_dump($data['siswa']);
        // die;
        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter();
        $html1 = $this->load->view('ainformasi/lulus_cetak', $data, TRUE);
        $mpdf->WriteHTML($html1);

        $data = $this->db->get_where('m_lulus', ['lulus_id' => $id])->row_array();

        $nama_file_pdf = ($data['nama_siswa']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
    }
    //end lulus
    // beasiswa
    public function beasiswa()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Beasiswa';
        $data['home'] = 'Informasi';
        $data['subtitle'] = $data['title'];
        $data['sekolah'] = $this->home->sekolah();
        $data['kepsek'] = $this->db->get('profil_kepsek')->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

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

        // var_dump($data['prestasi']);
        // die;
        $this->load->view('website/header', $data);
        $this->load->view('beasiswa_v', $data);
        $this->load->view('_js');
        $this->load->view('website/footer', $data);
        $this->benchmark->mark('code_end');
    }

    public function beasiswa_cari($id)
    {
        $data['beasiswa'] = $this->home->get_beasiswa($id);
        $this->load->view('ainformasi/beasiswa_data', $data);
    }
    //end beasiswa
}
