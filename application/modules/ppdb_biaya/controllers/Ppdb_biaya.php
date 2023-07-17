<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb_biaya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        $this->load->library('form_validation');
        $this->load->model('Ppdb_biaya_m', 'psb');
    }

    // master_biaya
    public function master_biaya()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Master Biaya';
        $data['home'] = 'PPDB Biaya';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['biaya'] = $this->psb->getBiaya();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_biaya/biaya/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_biaya/biaya/biaya_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_biaya/biaya/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['periode'] = $this->psb->getAllPeriode();
        $this->load->view('ppdb_biaya/biaya/list_css');
        $this->load->view('ppdb_biaya/biaya/biaya_add', $data);
        $this->load->view('ppdb_biaya/biaya/list_js');
    }

    function edit($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['biaya'] = $this->psb->getEditBiaya($id);
        $this->load->view('ppdb_biaya/biaya/list_css');
        $this->load->view('ppdb_biaya/biaya/biaya_edit', $data);
        $this->load->view('ppdb_biaya/biaya/list_js');
    }

    public function simpan_tambah()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_tambah();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('ppdb_biaya/master_biaya');
    }

    public function simpan_edit()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->simpan_edit();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('ppdb_biaya/master_biaya');
    }

    public function deldata($id)
    {
        $data = ['id_biaya' => $id];
        $this->db->delete('ppdb_biaya', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('ppdb_biaya/master_biaya');
    }
    // end master_biaya

    // pembayaran
    public function pembayaran()
    {
        $this->form_validation->set_rules('jumlah', 'Jumlah Bayar', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->benchmark->mark('code_start');
            $data['title'] = 'Pembayaran';
            $data['home'] = 'PPDB Biaya';
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

            $this->load->view('layout/header-top', $data);
            $this->load->view('ppdb_biaya/pembayaran/list_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('ppdb_biaya/pembayaran/pembayaran_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('ppdb_biaya/pembayaran/list_js');
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
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './website/bukti_transaksi/';

                $this->load->library(
                    'upload',
                    $config
                );

                if (!$this->upload->do_upload('bukti')) {
                    echo "Gambar Gagal Upload. Gambar harus bertipe jpg|png|jpeg dan max size 2mb";
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
                    redirect('ppdb_biaya/pembayaran');
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

        $this->load->view('ppdb_biaya/pembayaran/pembayaran_data', $data);
        $this->load->view('ppdb_biaya/pembayaran/list_js');
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

        $this->load->view('ppdb_biaya/pembayaran/list_css');
        $this->load->view('ppdb_biaya/pembayaran/pembayaran_add', $data);
        $this->load->view('ppdb_biaya/pembayaran/list_js');
    }

    public function hapus_pembayaran($id)
    {
        $data = ['id_bayar' => $id];
        $this->db->delete('ppdb_bayar', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('ppdb_biaya/pembayaran');
    }

    public function bukti_pembayaran_1($id)
    {
        $data['bayar'] = $this->psb->getDetailBayar($id);
        $this->load->view('ppdb_biaya/pembayaran/list_css');
        $this->load->view('ppdb_biaya/pembayaran/pembayaran_bukti_1', $data);
        $this->load->view('ppdb_biaya/pembayaran/list_js');
    }

    public function bukti_pembayaran_2($id)
    {
        $data['bayar'] = $this->psb->getDetailBayar($id);
        $this->load->view('ppdb_biaya/pembayaran/list_css');
        $this->load->view('ppdb_biaya/pembayaran/pembayaran_bukti_2', $data);
        $this->load->view('ppdb_biaya/pembayaran/list_js');
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
                <td width="75%" style="text-align: right;  "><p>' . $data['sekolah']['web'] . ' | ' . $daftar['nik'] . ' | ' . $daftar['nama'] . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('ppdb_biaya/pembayaran/cetak_kwitansi', $data, TRUE);
        $mpdf->WriteHTML($html1);

        $nama_file_pdf = ($daftar['nik'] . ' _ ' . $daftar['nama']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
    }
    // end pembayaran

    // verifikasi_biaya
    public function verifikasi_biaya()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Verifikasi Biaya';
        $data['home'] = 'PPDB Biaya';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['belum_bayar'] = $this->psb->getPembayaranBelum();
        // $data['siswa'] = $this->psb->getCariData();
        $id_user = $this->db->get('ppdb_bayar')->row_array();
        $id = $id_user['id_user'];
        $data['user'] = $this->db->get_where('pegawai', ['nik' => $id])->row_array();
        $data['sudah_bayar'] = $this->psb->getPembayaranSudah();
        // var_dump($data['user']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('ppdb_biaya/verifikasi_biaya/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('ppdb_biaya/verifikasi_biaya/verifikasi_biaya_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('ppdb_biaya/verifikasi_biaya/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function deldata_verifikasi_biaya($id)
    {
        $data = ['id_bayar' => $id];
        $this->db->delete('ppdb_bayar', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('ppdb_biaya/verifikasi_biaya');
    }

    public function cek_verifikasi_biaya($id_biaya)
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->cek_verifikasi_biaya($id_biaya);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil verifikasi data !!!</div>');
        redirect('ppdb_biaya/verifikasi_biaya');
    }

    public function uncek_verifikasi_biaya($id_biaya)
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->psb->uncek_verifikasi_biaya($id_biaya);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil batalkan verifikasi data !!!</div>');
        redirect('ppdb_biaya/verifikasi_biaya');
    }

    public function print_kwitansi($id_bayar)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['siswa'] = $this->psb->getDataPembayaran($id_bayar);
        $data['bayar'] = $this->psb->getPembayaran($id_bayar);
        // var_dump($data['siswa']);
        // die;
        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter();
        $html1 = $this->load->view('ppdb_biaya/verifikasi_biaya/print_kwitansi', $data, TRUE);
        $mpdf->WriteHTML($html1);

        $nama_file_pdf = ('1');
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
    }
    // end verifikasi_biaya

}
