<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Pembayaran_m', 'pembayaran');
    }

    public function index()
    {
        $this->form_validation->set_rules('jumlah', 'Jumlah Bayar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pembayaran';
            $data['user'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
            $data['pengumuman'] = $this->db->get_where('ppdb_pengumuman', ['jenis' => 2])->result_array();
            $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
            $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

            $daftar = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
            $data['siswa'] = $daftar;
            $periode = $daftar['periode'];
            // $status =  $daftar['status_siswa'];
            // $data['status'] = $daftar['status_siswa'];
            $data['biaya'] = $this->db->get_where('ppdb_biaya', ['status' => 1, 'periode' => $periode])->result_array();
            $total = $this->pembayaran->getTotalBiaya($periode);
            $data['total'] = $total['total'];
            $data['total_bayar'] = $this->pembayaran->getTotalBayar();
            $data['bank'] = $this->db->get_where('ppdb_bank', ['status' => 1])->result_array();
            $data['bayar'] = $this->pembayaran->getBayar();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('css', $data);
            $this->load->view('index', $data);
            $this->load->view('js', $data);
            $this->load->view('templates/footer');
        } else {
            $today = date("Ymd");
            $last = $this->pembayaran->getIdbayar();
            $lastNoTransaksi = $last['last'];
            $lastNoUrut = substr($lastNoTransaksi, 8, 4);
            $nextNoUrut = $lastNoUrut + 1;
            $nextNoTransaksi = $today . sprintf('%04s', $nextNoUrut);

            $bukti = $_FILES['bukti'];
            // var_dump($nextNoUrut);
            // die;

            if ($bukti) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './bukti_transaksi/';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bukti')) {
                    echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png dan max size 2mb";
                    die();
                } else {
                    $data = [
                        'id_bayar' => $nextNoTransaksi,
                        'id_daftar' => $this->input->post('id'),
                        'periode' => $this->input->post('periode'),
                        'keterangan' => $this->input->post('keterangan'),
                        'jumlah' => $this->input->post('jumlah'),
                        'bank' =>  $this->input->post('bank'),
                        'tgl_bayar' =>  $this->input->post('tgl'),
                        'bukti' => $this->upload->data('file_name'),
                    ];

                    $this->db->insert('ppdb_bayar', $data);
                    $this->session->set_flashdata('message', 'Data berhasil disimpan');
                    redirect('pembayaran');
                }
            }
        }
    }

    public function hapus($id)
    {
        $this->pembayaran->hapusdata($id);
        $this->session->set_flashdata('message', 'Pembayaran berhasil dibatalkan');
        redirect('pembayaran');
    }

    public function cetak_pembayaran()
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $data['siswa'] = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $daftar = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $sekolah = $this->db->get_where('m_sekolah')->row_array();
        // Pembayaran

        $daftar = $this->db->get_where('ppdb_daftar', ['no_daftar' => $this->session->userdata('no_daftar')])->row_array();
        $data['siswa'] = $daftar;
        $periode = $daftar['periode'];
        $status =  $daftar['status_siswa'];
        $data['status'] = $daftar['status_siswa'];
        $data['biaya'] = $this->db->get_where('ppdb_biaya', ['status' => 1, 'periode' => $periode])->result_array();
        $total = $this->pembayaran->getTotalBiaya($periode);
        $data['total'] = $total['total'];
        $data['bayar'] = $this->pembayaran->getBayar();
        $data['total_bayar'] = $this->pembayaran->getTotalBayar();

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | {DATE j-m-Y}</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . $daftar['no_daftar'] . ' | ' . $daftar['nama'] . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('pembayaran/cetak_kwitansi', $data, TRUE);
        $mpdf->WriteHTML($html1);

        $nama_file_pdf = ($daftar['nik'] . ' _ ' . $daftar['nama']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
    }

    public function detail($id)
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['bayar'] = $this->pembayaran->detail($id);

        $this->load->view('css');
        $this->load->view('detail', $data);
        $this->load->view('js');
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

