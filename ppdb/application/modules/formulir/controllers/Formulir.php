<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Formulir';
        $data['user'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['pengumuman'] = $this->db->get_where('ppdb_pengumuman', ['jenis' => 2])->result_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

        $data['siswa'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();

        $data['p_jk']  = array("" => "Pilih Jenis Kelamin", "L" => "Laki-laki", "P" => "Perempuan");
        $data['p_agama']  = array("" => "Pilih Agama", "Islam" => "Islam", "Katolik" => "Katolik", "Kristen" => "Kristen", "Hindu" => "Hindu", "Budha" => "Budha", "Konghucu" => "Konghucu");

        $data['p_tinggal']  = array("" => "Pilih Tinggal", "Bersama Orang Tua" => "Bersama Orang Tua", "Bersama Wali" => "Bersama Wali", "Kost" => "Kost");
        $data['p_transportasi']  = array("" => "Pilih Transportasi", "Jalan Kaki" => "Jalan Kaki", "Angkutan Umum" => "Angkutan Umum", "Sepeda Motor" => "Sepeda Motor", "Sepeda" => "Sepeda", "Kendaraan Pribadi" => "Kendaraan Pribadi");

        $data['p_pendidikan']  = array("" => "Pilih Pendidikan", "Tidak Sekolah" => "Tidak Sekolah", "SD Sederajat" => "SD Sederajat", "SMP Sederajat" => "SMP Sederajat", "SMA Sederajat" => "SMA Sederajat", "D3" => "D3", "S1" => "S1", "S2" => "S2");
        $data['p_pekerjaan']  = array("" => "Pilih Pekerjaan", "Tidak Bekerja" => "Tidak Bekerja", "Buruh" => "Buruh", "Karyawan Swasta" => "Karyawan Swasta", "Pedagang" => "Pedagang", "Pensiunan" => "Pensiunan", "Petani" => "Petani", "Peternak" => "Peternak", "Nelayan" => "Nelayan", "PNS/TNI/POLRI" => "PNS/TNI/POLRI", "Sudah Meninggal" => "Sudah Meninggal", "Tenaga Kerja Indonesia" => "Tenaga Kerja Indonesia", "Wirausaha" => "Wirausaha", "Dokter" => "Dokter");
        $data['p_penghasilan']  = array("" => "Pilih Penghasilan", "Kurang dari 500.000" => "Kurang dari 500.000", "Rp.500.000 s/d Rp.999.000" => "Rp.500.000 s/d Rp.999.000", "Rp.1jt s/d Rp.2jt" => "Rp.1jt s/d Rp.2jt", "Rp.2jt s/d Rp.4jt" => "Rp.2jt s/d Rp.4jt", "Rp.5jt s/d Rp.20jt" => "Rp.5jt s/d Rp.20jt", "Tidak Berpenghasilan" => "Tidak Berpenghasilan");

        $daftar = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['datadiri'] = $daftar['baju'] == '' || $daftar['nisn'] == '' || $daftar['jenkel'] == '' || $daftar['agama'] == '' || $daftar['anak_ke'] == '' || $daftar['saudara'] == '' || $daftar['tinggi'] == '' || $daftar['berat'] == '' || $daftar['status_keluarga'] == '';
        $data['alamat'] = $daftar['alamat'] == '' || $daftar['rt'] == '' || $daftar['rw'] == '' || $daftar['desa'] == '' || $daftar['kecamatan'] == '' || $daftar['kota'] == '' || $daftar['provinsi'] == '' || $daftar['kode_pos'] == '' || $daftar['tinggal'] == '' || $daftar['jarak'] == '' || $daftar['waktu'] == '' || $daftar['transportasi'] == '';
        $data['ortu'] = $daftar['nik_ayah'] == '' || $daftar['nama_ayah'] == '' || $daftar['tempat_ayah'] == '' || $daftar['tgl_lahir_ayah'] == '' || $daftar['pendidikan_ayah'] == '' || $daftar['pekerjaan_ayah'] == '' || $daftar['penghasilan_ayah'] == '' || $daftar['nik_ibu'] == '' || $daftar['nama_ibu'] == '' || $daftar['tempat_ibu'] == '' || $daftar['tgl_lahir_ibu'] == '' || $daftar['pendidikan_ibu'] == '' || $daftar['pekerjaan_ibu'] == '' || $daftar['penghasilan_ibu'] == '';
        // var_dump($data['datadiri']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        // $this->load->view('css', $data);
        $this->load->view('index', $data);
        // $this->load->view('js', $data);
        $this->load->view('templates/footer');
    }


    public function simpandatadiri()
    {
        $id = $this->input->post('id_daftar');
        $p = $this->input->post();
        $data = [
            'nisn'              => $p['nisn'],
            'nik'               => $p['nik'],
            'no_kk'             => $p['nokk'],
            'nama'              => $p['nama'],
            'tempat_lahir'      => $p['tempat'],
            'tgl_lahir'         => $p['tgllahir'],
            'jenkel'            => $p['jenkel'],
            'no_hp'             => $p['nohp'],
            'asal_sekolah'      => $p['asal'],
            'anak_ke'           => $p['anakke'],
            'saudara'           => $p['saudara'],
            'tinggi'            => $p['tinggi'],
            'berat'             => $p['berat'],
            // 'linkar_kepala'     => $p['linkar_kepala'],
            'status_keluarga'   => $p['statuskeluarga'],
            'baju'              => $p['baju'],
            'agama'             => $p['agama'],
            'no_kip'            => $p['kip']
        ];

        $this->db->where('id_daftar', $id);
        $this->db->update('ppdb_daftar', $data);

        $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"> Data Diri berhasil disimpan !!! </div>');
        redirect('formulir');
    }

    public function simpanalamat()
    {
        $id = $this->input->post('id_daftar');
        $p = $this->input->post();
        $data = [
            'alamat'            => $p['alamat'],
            'rt'                => $p['rt'],
            'rw'                => $p['rw'],
            // 'dusun'             => $p['dusun'],
            'desa'              => $p['desa'],
            'kecamatan'         => $p['kecamatan'],
            'kota'              => $p['kota'],
            'provinsi'          => $p['provinsi'],
            'kode_pos'          => $p['kodepos'],
            'tinggal'           => $p['tinggal'],
            'jarak'             => $p['jarak'],
            'waktu'             => $p['waktu'],
            'transportasi'      => $p['transportasi']
        ];
        $this->db->where('id_daftar', $id);
        $this->db->update('ppdb_daftar', $data);
        $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"> Data Alamat berhasil disimpan !!! </div>');
        redirect('formulir');
    }

    public function simpanortu()
    {
        $id = $this->input->post('id_daftar');
        $p = $this->input->post();
        $data = [
            'nik_ayah'            => $p['nikayah'],
            'nama_ayah'           => $p['namaayah'],
            'tempat_ayah'         => $p['tempatayah'],
            'tgl_lahir_ayah'      => $p['tglayah'],
            'pendidikan_ayah'     => $p['pendidikan_ayah'],
            'pekerjaan_ayah'      => $p['pekerjaan_ayah'],
            'penghasilan_ayah'    => $p['penghasilan_ayah'],
            'no_hp_ayah'          => $p['nohpayah'],
            'email'               => $p['email'],
            // 'telp_rumah'          => $p['telp_rumah'],
            'nik_ibu'             => $p['nikibu'],
            'nama_ibu'            => $p['namaibu'],
            'tempat_ibu'          => $p['tempatibu'],
            'tgl_lahir_ibu'       => $p['tglibu'],
            'pendidikan_ibu'      => $p['pendidikan_ibu'],
            'pekerjaan_ibu'       => $p['pekerjaan_ibu'],
            'penghasilan_ibu'     => $p['penghasilan_ibu'],
            'no_hp_ibu'           => $p['nohpibu'],
            'nik_wali'            => $p['nikwali'],
            'nama_wali'           => $p['namawali'],
            'tempat_wali'         => $p['tempatwali'],
            'tgl_lahir_wali'      => $p['tglwali'],
            'pendidikan_wali'     => $p['pendidikan_wali'],
            'pekerjaan_wali'      => $p['pekerjaan_wali'],
            'penghasilan_wali'    => $p['penghasilan_wali'],
            'no_hp_wali'          => $p['nohpwali'],
        ];
        $this->db->where('id_daftar', $id);
        $this->db->update('ppdb_daftar', $data);
        $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"> Orang Tua berhasil disimpan !!! </div>');
        redirect('formulir');
    }

    public function mpdf_cetak()
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $data['siswa'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $daftar = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $sekolah = $this->db->get_where('m_sekolah')->row_array();
        $data['tahun'] =  $this->db->get_where('ppdb_periode', ['periode' => $this->input->post('periode', true), 'is_active' => 1])->row_array();;
        // var_dump( $data['tahun'] );
        // die;
        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | {DATE j-m-Y}</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>'  . $daftar['nama'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('formulir/data_diri_pdf', $data, TRUE);
        $mpdf->WriteHTML($html1);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | {DATE j-m-Y}</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . $daftar['nama'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html2 = $this->load->view('formulir/surat_peryantaan_pdf_1', $data, TRUE);
        $mpdf->WriteHTML($html2);       

        // $siswa  = $this->db->get_where('m_siswa', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'nis' => $target])->row_array();
        $nama_file_pdf = ($daftar['nik'] . ' _ ' . $daftar['nama']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
        // $mpdf->Output($nama_dokumen . ".pdf", 'I');
        // var_dump($data['nilai_pts']);
        // die;
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

