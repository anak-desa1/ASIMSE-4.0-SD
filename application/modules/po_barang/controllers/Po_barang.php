<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        $this->load->library('form_validation');
        $this->load->model('Po_barang_m', 'psb');
    }

    // surat_pesanan
    public function surat_pesanan()
    {
        $this->form_validation->set_rules('jumlah', 'Jumlah Bayar', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->benchmark->mark('code_start');
            $data['title'] = 'Surat Pesanan';
            $data['home'] = 'Pesan Barang';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['cari_siswa'] = $this->psb->getCariData();

            $id_user = $this->db->get('ppdb_bayar')->row_array();
            $nik = $id_user['id_user'];
            $data['user'] = $this->db->get_where('pegawai', ['nik' => $nik])->row_array();
            // var_dump($data['user']);
            // die;         
            $daftar = $this->db->get_where('ppdb_daftar')->row_array();
            $periode = $daftar['periode'];
            $id = $daftar['id_daftar'];
            $data['nama'] = $daftar['nama'];
            $total = $this->psb->getTotalBiaya($periode);
            $data['total'] = $total['total'];
            $data['bayar'] = $this->psb->getBayar($id);

            $this->load->view('layout/header-top');
            $this->load->view('po_barang/surat_pesanan/list_css');
            $this->load->view('layout/header-bottom');
            $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('po_barang/surat_pesanan/pembayaran_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('po_barang/surat_pesanan/list_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
            $today = date("Ymd");
            $last = $this->psb->getIdbayar();
            $lastNoTransaksi = $last['last'];
            $lastNoUrut = substr($lastNoTransaksi, 8, 4);
            $nextNoUrut = $lastNoUrut + 1;
            $nextNoTransaksi = $today . sprintf('%04s', $nextNoUrut);

            $bukti = $_FILES['bukti'];
            // var_dump($bukti);
            // die;

            if ($bukti) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './bukti_transaksi/';

                $this->load->library(
                    'upload',
                    $config
                );

                if (!$this->upload->do_upload('bukti')) {
                    echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png dan max size 2mb";
                    die();
                } else {
                    $data = [

                        'id_bayar' => $nextNoTransaksi,
                        'id_user' => $this->input->post('id_user'),
                        'id_daftar' => $this->input->post('id_daftar'),
                        'periode' => $this->input->post('periode'),
                        'keterangan' => $this->input->post('keterangan'),
                        'bank' => $this->input->post('bank'),
                        'jumlah' => $this->input->post('jumlah'),
                        'tgl_bayar' =>  $this->input->post('tgl'),
                        'bukti' => $this->upload->data('file_name'),
                    ];

                    $this->db->insert('ppdb_bayar', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil disimpan !!!</div>');
                    redirect('psb_biaya/pembayaran');
                }
            }
        }
    }

    public function data_bayar($id)
    {
        $data['siswa'] = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();

        $id_user = $this->db->get('ppdb_bayar')->row_array();
        $nik = $id_user['id_user'];
        $data['user'] = $this->db->get_where('pegawai', ['nik' => $nik])->row_array();
        $daftar = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();
        $periode = $daftar['periode'];
        $data['nama'] = $daftar['nama'];
        $data['id_daftar'] = $daftar['id_daftar'];
        $data['biaya'] = $this->db->get_where('ppdb_biaya', ['status' => 1, 'periode' => $periode])->result_array();
        $total = $this->psb->getTotalBiaya($periode);
        $data['total'] = $total['total'];
        $data['bayar'] = $this->psb->getBayar($id);
        $data['total_bayar'] = $this->psb->getTotalBayar($id);

        $this->load->view('psb_biaya/pembayaran/pembayaran_data', $data);
        $this->load->view('psb_biaya/pembayaran/list_js');
    }

    public function tambah_bayar()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['cari_siswa'] = $this->psb->getCariData();
        $data['biaya'] = $this->db->get_where('ppdb_biaya', ['status' => 1])->result_array();
        $data['periode'] = $this->db->get_where('ppdb_periode', ['is_active' => 1])->result_array();
        $data['bank'] = $this->db->get_where('ppdb_bank', ['status' => 1])->result_array();

        $this->load->view('psb_biaya/pembayaran/list_css');
        $this->load->view('psb_biaya/pembayaran/pembayaran_add', $data);
        $this->load->view('psb_biaya/pembayaran/list_js');
    }

    public function hapus_pembayaran($id)
    {
        $data = ['id_bayar' => $id];
        $this->db->delete('ppdb_bayar', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('psb_biaya/pembayaran');
    }

    public function bukti_pembayaran_1($id)
    {
        $data['bayar'] = $this->psb->getDetailBayar($id);
        $this->load->view('psb_biaya/pembayaran/list_css');
        $this->load->view('psb_biaya/pembayaran/pembayaran_bukti_1', $data);
        $this->load->view('psb_biaya/pembayaran/list_js');
    }

    public function bukti_pembayaran_2($id)
    {
        $data['bayar'] = $this->psb->getDetailBayar($id);
        $this->load->view('psb_biaya/pembayaran/list_css');
        $this->load->view('psb_biaya/pembayaran/pembayaran_bukti_2', $data);
        $this->load->view('psb_biaya/pembayaran/list_js');
    }

    public function cetak_pembayaran($id)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $data['siswa'] = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $daftar = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();
        // Pembayaran

        $daftar = $this->db->get_where('ppdb_daftar', ['id_daftar' => $id])->row_array();
        $data['siswa'] = $daftar;
        $periode = $daftar['periode'];
        $data['biaya'] = $this->db->get_where('ppdb_biaya', ['status' => 1, 'periode' => $periode])->result_array();
        $total = $this->psb->getTotalBiaya($periode);
        $data['total'] = $total['total'];
        $data['bayar'] = $this->psb->getBayar($id);
        $data['total_bayar'] = $this->psb->getTotalBayar($id);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | {DATE j-m-Y}</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . "oel.sch.id" . ' | ' . $daftar['nik'] . ' | ' . $daftar['nama'] . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('psb_biaya/pembayaran/cetak_kwitansi', $data, TRUE);
        $mpdf->WriteHTML($html1);

        $nama_file_pdf = ($daftar['nik'] . ' _ ' . $daftar['nama']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
    }
    // end surat_pesanan

    // berita_acata
    public function berita_acata()
    {
        $this->form_validation->set_rules('jumlah', 'Jumlah Bayar', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->benchmark->mark('code_start');
            $data['title'] = 'Berita Acara';
            $data['home'] = 'Pesan Barang';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['cari_siswa'] = $this->psb->getCariData();

            $id_user = $this->db->get('ppdb_bayar')->row_array();
            $nik = $id_user['id_user'];
            $data['user'] = $this->db->get_where('pegawai', ['nik' => $nik])->row_array();
            // var_dump($data['user']);
            // die;         
            $daftar = $this->db->get_where('ppdb_daftar')->row_array();
            $periode = $daftar['periode'];
            $id = $daftar['id_daftar'];
            $data['nama'] = $daftar['nama'];
            $total = $this->psb->getTotalBiaya($periode);
            $data['total'] = $total['total'];
            $data['bayar'] = $this->psb->getBayar($id);

            $this->load->view('layout/header-top');
            $this->load->view('po_barang/berita_acara/list_css');
            $this->load->view('layout/header-bottom');
            $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('po_barang/berita_acara/pembayaran_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('po_barang/berita_acara/list_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
            $today = date("Ymd");
            $last = $this->psb->getIdbayar();
            $lastNoTransaksi = $last['last'];
            $lastNoUrut = substr($lastNoTransaksi, 8, 4);
            $nextNoUrut = $lastNoUrut + 1;
            $nextNoTransaksi = $today . sprintf('%04s', $nextNoUrut);

            $bukti = $_FILES['bukti'];
            // var_dump($bukti);
            // die;

            if ($bukti) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './bukti_transaksi/';

                $this->load->library(
                    'upload',
                    $config
                );

                if (!$this->upload->do_upload('bukti')) {
                    echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png dan max size 2mb";
                    die();
                } else {
                    $data = [

                        'id_bayar' => $nextNoTransaksi,
                        'id_user' => $this->input->post('id_user'),
                        'id_daftar' => $this->input->post('id_daftar'),
                        'periode' => $this->input->post('periode'),
                        'keterangan' => $this->input->post('keterangan'),
                        'bank' => $this->input->post('bank'),
                        'jumlah' => $this->input->post('jumlah'),
                        'tgl_bayar' =>  $this->input->post('tgl'),
                        'bukti' => $this->upload->data('file_name'),
                    ];

                    $this->db->insert('ppdb_bayar', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil disimpan !!!</div>');
                    redirect('psb_biaya/pembayaran');
                }
            }
        }
    }
    // end berita_acata

}
