<?php

use phpDocumentor\Reflection\Types\Integer;

defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb_pendaftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        // $this->load->helper('nomor');
        $this->load->library('form_validation');
        $this->load->model('PpdbPendaftar_m', 'psb');
    }

    // data_pendaftar
    public function data_pendaftar()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Data Pendaftar';
        $data['home'] = 'PPDB Pendaftar';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sch'] = $this->db->get('m_sekolah')->result_array();
        $data['daftar'] = $this->psb->getDaftar();
        $data['bayar'] = $this->psb->getBayar();
        // var_dump($data['bayar']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_pendaftar/data_pendaftar/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_pendaftar/data_pendaftar/data_pendaftar_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_pendaftar/data_pendaftar/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah_pendaftar()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['title'] = 'Info Kademik';
        $data['home'] = 'PPDB Pendaftar';
        $data['subtitle'] = $data['title'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $data['kls'] = $this->db->get('l_kelas')->result_array();
        $data['jenis'] = $this->psb->getAllJenis();
        $data['periode'] = $this->psb->getAllPeriode();
        $data['asal_sekolah'] = $this->psb->getAsalSekolah();

        $this->load->view('ppdb_pendaftar/data_pendaftar/list_css');
        $this->load->view('ppdb_pendaftar/data_pendaftar/data_pendaftar_add', $data);
        $this->load->view('ppdb_pendaftar/data_pendaftar/list_js');
    }

    function edit_pendaftar($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['title'] = 'Info Kademik';
        $data['home'] = 'PPDB Pendaftar';
        $data['subtitle'] = $data['title'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['daftar'] = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();

        $this->load->view('ppdb_pendaftar/data_pendaftar/list_css');
        $this->load->view('ppdb_pendaftar/data_pendaftar/data_pendaftar_edit', $data);
        $this->load->view('ppdb_pendaftar/data_pendaftar/list_js');
    }

    public function simpan_tambah_pendaftar()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_tambah_pendaftar();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('ppdb_pendaftar/data_pendaftar');
    }

    public function simpan_edit_pendaftar()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_edit_pendaftar();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('ppdb_pendaftar/data_pendaftar');
    }

    public function deldata_pendaftar($id)
    {
        $data = ['id_daftar' => $id];
        $this->db->delete('ppdb_daftar', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('ppdb_pendaftar/data_pendaftar');
    }

    public function mpdf_cetak($id)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

        $data['siswa'] = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah', ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $daftar = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();
        $sekolah = $this->db->get_where('m_sekolah', ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['daftar'] = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();
        // sikap       

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | {DATE j-m-Y}</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . $daftar['nik'] . ' | ' . $daftar['nama'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('data_pendaftar/data_diri_pdf', $data, TRUE);
        $mpdf->WriteHTML($html1);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | {DATE j-m-Y}</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . $daftar['nik'] . ' | ' . $daftar['nama'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html2 = $this->load->view('data_pendaftar/surat_peryantaan_pdf_1', $data, TRUE);
        $mpdf->WriteHTML($html2);

        $nama_file_pdf = ($daftar['nik'] . ' _ ' . $daftar['nama']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
    }

    public function cetak_pembayaran($id)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $data['siswa'] = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $daftar = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();
        $sekolah = $this->db->get_where('m_sekolah')->row_array();
        // Pembayaran

        $daftar = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();
        $data['siswa'] = $daftar;
        $periode = $daftar['periode'];
        $data['biaya'] = $this->db->get_where('ppdb_biaya', ['status' => 1, 'periode' => $periode])->result_array();
        $total = $this->psb->getCetakTotalBiaya($periode);
        $data['total'] = $total['total'];
        // var_dump($data['total']);
        // die;
        $data['bayar'] = $this->psb->getCetakBayar($id);
        $data['total_bayar'] = $this->psb->getCetakTotalBayar($id);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | {DATE j-m-Y}</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . $daftar['nik'] . ' | ' . $daftar['nama'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('data_pendaftar/cetak_kwitansi', $data, TRUE);
        $mpdf->WriteHTML($html1);

        $nama_file_pdf = ($daftar['nik'] . ' _ ' . $daftar['nama']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
    }
    // end data_pendaftar

    // pendaftar_diterima
    public function pendaftar_diterima()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Pendaftar Diterima';
        $data['home'] = 'PPDB Pendaftar';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sch'] = $this->db->get('m_sekolah')->result_array();
        $data['daftar'] = $this->psb->getDaftarDiterima();
        // var_dump($id);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_pendaftar/pendaftar_diterima/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_pendaftar/pendaftar_diterima/pendaftar_diterima_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_pendaftar/pendaftar_diterima/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }
    // end pendaftar_diterima

    // pendaftar_cadangan
    public function pendaftar_cadangan()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Pendaftar Cadangan';
        $data['home'] = 'PPDB Pendaftar';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sch'] = $this->db->get('m_sekolah')->result_array();
        $data['daftar'] = $this->psb->getDaftarCadangan();
        // var_dump($id);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_pendaftar/pendaftar_cadangan/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_pendaftar/pendaftar_cadangan/pendaftar_cadangan_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_pendaftar/pendaftar_cadangan/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }
    // end pendaftar_cadangan 

    // batal
    public function batal_pendaftar($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $this->benchmark->mark('code_start');
        $data = [
            'daftar' => $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array(),
        ];
        $this->load->view('ppdb_pendaftar/pendaftar_diterima/list_css');
        $this->load->view('ppdb_pendaftar/pendaftar_diterima/pendaftar_batal', $data);
        $this->load->view('ppdb_pendaftar/pendaftar_diterima/list_js');
    }

    public function simpan_batal($id)
    {
        $id_daftar = $id;
        $this->db->set('status', 0);
        $this->db->where('id_daftar', $id_daftar);
        $this->db->update('ppdb_daftar');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil ubah data !!!</div>');
        redirect('ppdb_pendaftar/data_pendaftar');
    }
    // end batal

    public function export_excel_pendaftaran()
    {
        $data['daftar'] = $this->psb->getDaftar();
        $sekolah = $this->db->get('m_sekolah')->row_array();
        $kepsek = $this->db->get('profil_kepsek')->row_array();

        $this->load->library('excel');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Sistem Anak Desa");
        $object->getProperties()->setLastModifiedBy("Sistem Anak Desa");
        $object->getProperties()->setTitle("PPDB");

        $object->setActiveSheetIndex(0);

        $object->setActiveSheetIndex(0)->setCellValue('A1', "Nama Sekolah");
        $object->getActiveSheet()->mergeCells('A1:B1');
        $object->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('A1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $object->getActiveSheet()->setCellValue('C1', ':' . ' ' . $sekolah['nama_sekolah']);
        $object->getActiveSheet()->getStyle('C1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('C1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $object->setActiveSheetIndex(0)->setCellValue('A2', "Kepala Sekolah");
        $object->getActiveSheet()->mergeCells('A2:B2');
        $object->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $object->getActiveSheet()->setCellValue('C2', ':' . ' ' . $kepsek['nama_kepsek']);
        $object->getActiveSheet()->getStyle('C2')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('C2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('C2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $object->setActiveSheetIndex(0)->setCellValue('A5', "No");
        $object->setActiveSheetIndex(0)->setCellValue('B5', "NO Daftar");
        $object->setActiveSheetIndex(0)->setCellValue('C5', "NISN");
        $object->setActiveSheetIndex(0)->setCellValue('D5', "NIK");
        $object->setActiveSheetIndex(0)->setCellValue('E5', "NO.KK");
        $object->setActiveSheetIndex(0)->setCellValue('F5', "Nama Pendaftar");
        $object->setActiveSheetIndex(0)->setCellValue('G5', "Jenis Kelamin");
        $object->setActiveSheetIndex(0)->setCellValue('H5', "Tempat Lahir");
        $object->setActiveSheetIndex(0)->setCellValue('I5', "Tanggal Lahir");
        $object->setActiveSheetIndex(0)->setCellValue('J5', "Agama");
        $object->setActiveSheetIndex(0)->setCellValue('K5', "Jurusan");
        $object->setActiveSheetIndex(0)->setCellValue('L5', "Ibu Kandung");
        $object->setActiveSheetIndex(0)->setCellValue('M5', "Alamat");
        $object->setActiveSheetIndex(0)->setCellValue('N5', "Asal Sekolah");
        $object->setActiveSheetIndex(0)->setCellValue('O5', "No Hp");
        $object->setActiveSheetIndex(0)->setCellValue('P5', "Status");

        $baris_a = 6;
        $no = 1;
        foreach ($data['daftar'] as $s) {
            $nik = $s['nik'];
            $kk = $s['no_kk'];
            $object->getActiveSheet()->setCellValue('A' .  $baris_a, $no++);
            $object->getActiveSheet()->setCellValue('B' .  $baris_a, $s['no_daftar']);
            $object->getActiveSheet()->setCellValue('C' .  $baris_a, $s['nisn']);
            $object->getActiveSheet()->setCellValue('D' .  $baris_a, number_format($nik));
            $object->getActiveSheet()->setCellValue('E' .  $baris_a, number_format($kk));
            $object->getActiveSheet()->setCellValue('F' .  $baris_a, $s['nama']);
            $object->getActiveSheet()->setCellValue('G' .  $baris_a, $s['jenkel']);
            $object->getActiveSheet()->setCellValue('H' .  $baris_a, $s['tempat_lahir']);
            $object->getActiveSheet()->setCellValue('I' .  $baris_a, $s['tgl_lahir']);
            $object->getActiveSheet()->setCellValue('J' .  $baris_a, $s['agama']);
            $object->getActiveSheet()->setCellValue('K' .  $baris_a, $s['kelas']);
            $object->getActiveSheet()->setCellValue('L' .  $baris_a, $s['nama_ibu']);
            $object->getActiveSheet()->setCellValue('M' .  $baris_a, $s['alamat']);
            $object->getActiveSheet()->setCellValue('N' .  $baris_a, $s['asal_sekolah']);
            $object->getActiveSheet()->setCellValue('O' .  $baris_a, $s['no_hp']);
            if ($s['status'] == 1) {
                $object->getActiveSheet()->setCellValue('P' .  $baris_a, 'Diterima');
            } elseif ($s['status'] == 2) {
                $object->getActiveSheet()->setCellValue('P' .  $baris_a, 'Cadang');
            } else {
                $object->getActiveSheet()->setCellValue('P' .  $baris_a, 'Pending');
            }

            $baris_a++;
        }


        $nama = 'PPDB' . ' ' . $sekolah['nama_sekolah'];
        $filemane = $nama . '.xlsx';
        $object->getActiveSheet()->setTitle(" $nama ");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment; filename="' . $filemane . '"');
        header('Cache-Control: max-age=0');
        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function export_excel_diterima()
    {
        $daftar = $this->psb->getDaftarDiterima();
        $sekolah = $this->db->get('m_sekolah')->row_array();
        $kepsek = $this->db->get('profil_kepsek')->row_array();

        $this->load->library('excel');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Sistem Anak Desa");
        $object->getProperties()->setLastModifiedBy("Sistem Anak Desa");
        $object->getProperties()->setTitle("PPDB");

        $object->setActiveSheetIndex(0);

        $object->setActiveSheetIndex(0)->setCellValue('A1', "Nama Sekolah");
        $object->getActiveSheet()->mergeCells('A1:B1');
        $object->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('A1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $object->getActiveSheet()->setCellValue('C1', ':' . ' ' . $sekolah['nama_sekolah']);
        $object->getActiveSheet()->getStyle('C1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('C1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $object->setActiveSheetIndex(0)->setCellValue('A2', "Kepala Sekolah");
        $object->getActiveSheet()->mergeCells('A2:B2');
        $object->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $object->getActiveSheet()->setCellValue('C2', ':' . ' ' . $kepsek['nama_kepsek']);
        $object->getActiveSheet()->getStyle('C2')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('C2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('C2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $object->setActiveSheetIndex(0)->setCellValue('A5', "No");
        $object->setActiveSheetIndex(0)->setCellValue('B5', "NO Daftar");
        $object->setActiveSheetIndex(0)->setCellValue('C5', "NISN");
        $object->setActiveSheetIndex(0)->setCellValue('D5', "NIK");
        $object->setActiveSheetIndex(0)->setCellValue('E5', "NO.KK");
        $object->setActiveSheetIndex(0)->setCellValue('F5', "Nama Pendaftar");
        $object->setActiveSheetIndex(0)->setCellValue('G5', "Jenis Kelamin");
        $object->setActiveSheetIndex(0)->setCellValue('H5', "Tempat Lahir");
        $object->setActiveSheetIndex(0)->setCellValue('I5', "Tanggal Lahir");
        $object->setActiveSheetIndex(0)->setCellValue('J5', "Agama");
        $object->setActiveSheetIndex(0)->setCellValue('K5', "Jurusan");
        $object->setActiveSheetIndex(0)->setCellValue('L5', "Ibu Kandung");
        $object->setActiveSheetIndex(0)->setCellValue('M5', "Alamat");
        $object->setActiveSheetIndex(0)->setCellValue('N5', "Asal Sekolah");
        $object->setActiveSheetIndex(0)->setCellValue('O5', "No Hp");
        $object->setActiveSheetIndex(0)->setCellValue('P5', "Status");

        $baris_a = 6;
        $no = 1;
        foreach ($daftar as $s) {
            $nik = $s['nik'];
            $kk = $s['no_kk'];
            $object->getActiveSheet()->setCellValue('A' .  $baris_a, $no++);
            $object->getActiveSheet()->setCellValue('B' .  $baris_a, $s['no_daftar']);
            $object->getActiveSheet()->setCellValue('C' .  $baris_a, $s['nisn']);
            $object->getActiveSheet()->setCellValue('D' .  $baris_a, number_format($nik));
            $object->getActiveSheet()->setCellValue('E' .  $baris_a, number_format($kk));
            $object->getActiveSheet()->setCellValue('F' .  $baris_a, $s['nama']);
            $object->getActiveSheet()->setCellValue('G' .  $baris_a, $s['jenkel']);
            $object->getActiveSheet()->setCellValue('H' .  $baris_a, $s['tempat_lahir']);
            $object->getActiveSheet()->setCellValue('I' .  $baris_a, $s['tgl_lahir']);
            $object->getActiveSheet()->setCellValue('J' .  $baris_a, $s['agama']);
            $object->getActiveSheet()->setCellValue('K' .  $baris_a, $s['kelas']);
            $object->getActiveSheet()->setCellValue('L' .  $baris_a, $s['nama_ibu']);
            $object->getActiveSheet()->setCellValue('M' .  $baris_a, $s['alamat']);
            $object->getActiveSheet()->setCellValue('N' .  $baris_a, $s['asal_sekolah']);
            $object->getActiveSheet()->setCellValue('O' .  $baris_a, $s['no_hp']);
            if ($s['status'] == 1) {
                $object->getActiveSheet()->setCellValue('P' .  $baris_a, 'Diterima');
            }

            $baris_a++;
        }


        $nama = 'PPDB' . ' ' . $sekolah['nama_sekolah'];
        $filemane = $nama . '.xlsx';
        $object->getActiveSheet()->setTitle(" $nama ");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment; filename="' . $filemane . '"');
        header('Cache-Control: max-age=0');
        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
}
