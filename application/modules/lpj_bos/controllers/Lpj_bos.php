<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpj_bos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        $this->load->library('form_validation');
        $this->load->model('Lpj_bos_m', 'lpj');
    }

    // satuan
    public function satuan()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Satuan';
        $data['home'] = 'LPJ BOS';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['satuan'] = $this->lpj->getSatuan();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('satuan/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('satuan/_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('satuan/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah_satuan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('lpj_bos/satuan/list_css');
        $this->load->view('lpj_bos/satuan/_add', $data);
        $this->load->view('lpj_bos/satuan/list_js');
    }

    function edit_satuan($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['satuan'] = $this->lpj->getEditSatuan($id);
        $this->load->view('lpj_bos/satuan/list_css');
        $this->load->view('lpj_bos/satuan/_edit', $data);
        $this->load->view('lpj_bos/satuan/list_js');
    }

    public function simpan_tambah_satuan()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->lpj->simpan_tambah_satuan();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('lpj_bos/satuan');
    }

    public function simpan_edit_satuan()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->lpj->simpan_edit_satuan();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('lpj_bos/satuan');
    }

    public function deldata_satuan($id)
    {
        $data = ['satuan_id' => $id];
        $this->db->delete('lpj_satuan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('lpj_bos/satuan');
    }
    // end satuan

    // kategori
    public function kategori()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Kategori';
        $data['home'] = 'LPJ BOS';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kategori'] = $this->lpj->getKategori();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('kategori/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('kategori/_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('kategori/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah_kategori()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('lpj_bos/kategori/list_css');
        $this->load->view('lpj_bos/kategori/_add', $data);
        $this->load->view('lpj_bos/kategori/list_js');
    }

    function edit_kategori($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kategori'] = $this->lpj->getEditKategori($id);
        $this->load->view('lpj_bos/kategori/list_css');
        $this->load->view('lpj_bos/kategori/_edit', $data);
        $this->load->view('lpj_bos/kategori/list_js');
    }

    public function simpan_tambah_kategori()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->lpj->simpan_tambah_kategori();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('lpj_bos/kategori');
    }

    public function simpan_edit_kategori()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->lpj->simpan_edit_kategori();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('lpj_bos/kategori');
    }

    public function deldata_kategori($id)
    {
        $data = ['kategori_id' => $id];
        $this->db->delete('lpj_kategori', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('lpj_bos/kategori');
    }
    // end kategori

    // suplier
    public function suplier()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Suplier';
        $data['home'] = 'LPJ BOS';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['suplier'] = $this->lpj->getSuplier();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('suplier/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('suplier/_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('suplier/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah_suplier()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('lpj_bos/suplier/list_css');
        $this->load->view('lpj_bos/suplier/_add', $data);
        $this->load->view('lpj_bos/suplier/list_js');
    }

    function edit_suplier($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['suplier'] = $this->lpj->getEditSuplier($id);
        $this->load->view('lpj_bos/suplier/list_css');
        $this->load->view('lpj_bos/suplier/_edit', $data);
        $this->load->view('lpj_bos/suplier/list_js');
    }

    public function simpan_tambah_suplier()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->lpj->simpan_tambah_suplier();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('lpj_bos/suplier');
    }

    public function simpan_edit_suplier()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->lpj->simpan_edit_suplier();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('lpj_bos/suplier');
    }

    public function deldata_suplier($id)
    {
        $data = ['suplier_id ' => $id];
        $this->db->delete('lpj_suplier', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('lpj_bos/suplier');
    }
    // end suplier

    // barang
    public function barang()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Barang';
        $data['home'] = 'LPJ BOS';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['barang'] = $this->lpj->getBarang();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('barang/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('barang/_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('barang/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah_barang()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kobar'] = $this->lpj->get_kobar();
        $data['kategori'] = $this->lpj->getKategori();
        $data['satuan'] = $this->lpj->getSatuan();
        $this->load->view('lpj_bos/barang/list_css');
        $this->load->view('lpj_bos/barang/_add', $data);
        $this->load->view('lpj_bos/barang/list_js');
    }

    function edit_barang($id)
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['barang'] = $this->lpj->getEditBarang($id);
        $this->load->view('lpj_bos/barang/list_css');
        $this->load->view('lpj_bos/barang/_edit', $data);
        $this->load->view('lpj_bos/barang/list_js');
    }

    public function simpan_tambah_barang()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->lpj->simpan_tambah_barang();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('lpj_bos/barang');
    }

    public function simpan_edit_barang()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->lpj->simpan_edit_barang();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('lpj_bos/barang');
    }

    public function deldata_barang($id)
    {
        $data = ['barang_id ' => $id];
        $this->db->delete('lpj_barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('lpj_bos/barang');
    }
    // end barang

    // surat_pesanan
    public function surat_pesanan()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Surat Pesanan';
        $data['home'] = 'LPJ BOS';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['pesan'] = $this->lpj->getSuratPesanan();
        $data['sup'] = $this->lpj->getsuplier();
        $data['kop'] = $this->lpj->getKopSP();
        // var_dump($data['sup']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('surat_pesanan/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('surat_pesanan/_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('surat_pesanan/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function simpan_kop_sp()
    {
        $upload_image = $_FILES['gambar'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/logo/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/logo/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('gambar', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $id = $this->input->post('id');
        $cekh = $this->db->get_where('lpj_kop_sp', ['id' => $id])->row_array();

        $data =
            [
                'id' => $this->input->post('id'),
            ];

        if ($cekh == 0) {
            $this->db->insert('lpj_kop_sp', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Berhasil Tambah Data !</div>');
            redirect('lpj_bos/surat_pesanan');
        } else {
            $this->db->where('id', $id);
            $this->db->update('lpj_kop_sp');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Berhasil Ubah Data !</div>');
            redirect('lpj_bos/surat_pesanan');
        }
    }

    function get_barang()
    {
        $kobar = $this->input->post('kode_brg');
        $data['brg'] = $this->db->get_where('lpj_barang', ['barang_id' => $kobar]);
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('surat_pesanan/_data_beli', $data);
    }

    function add_to_cart()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $nofak = $this->input->post('nofak');
        $tgl = $this->input->post('tgl');
        $suplier = $this->input->post('suplier');
        $lampiran = $this->input->post('lampiran');
        $perihal = $this->input->post('perihal');
        $program = $this->input->post('program');
        $pesanan = $this->input->post('pesanan');
        $kegiatan = $this->input->post('kegiatan');
        $bulan = $this->input->post('bulan');
        $sub_kegiatan = $this->input->post('sub_kegiatan');
        $belanja = $this->input->post('belanja');

        $this->session->set_userdata('nofak', $nofak);
        $this->session->set_userdata('tglfak', $tgl);
        $this->session->set_userdata('suplier', $suplier);
        $this->session->set_userdata('lampiran', $lampiran);
        $this->session->set_userdata('perihal', $perihal);
        $this->session->set_userdata('program', $program);
        $this->session->set_userdata('pesanan', $pesanan);
        $this->session->set_userdata('kegiatan', $kegiatan);
        $this->session->set_userdata('bulan', $bulan);
        $this->session->set_userdata('sub_kegiatan', $sub_kegiatan);
        $this->session->set_userdata('belanja', $belanja);

        $kobar = $this->input->post('kode_brg');
        $produk = $this->lpj->get_barang($kobar);
        $i = $produk;
        $data = array(
            'id'       => $i['barang_id'],
            'name'     => $i['barang_nama'],
            'satuan'   => $i['barang_satuan'],
            'price'    => $this->input->post('harjul'),
            'qty'      => $this->input->post('jumlah')
        );
        // var_dump($data);
        // die;
        $this->cart->insert($data);
        redirect('lpj_bos/surat_pesanan');
    }

    function remove()
    {
        $row_id = $this->uri->segment(3);
        $this->cart->update(array(
            'rowid'      => $row_id,
            'qty'     => 0
        ));
        redirect('lpj_bos/surat_pesanan');
    }

    function simpan_surat_pesanan()
    {
        $nofak = $this->session->userdata('nofak');
        $tglfak = $this->session->userdata('tglfak');
        $suplier = $this->session->userdata('suplier');
        $lampiran = $this->session->userdata('lampiran');
        $perihal = $this->session->userdata('perihal');
        $program = $this->session->userdata('program');
        $pesanan =  $this->session->userdata('pesanan');
        $kegiatan = $this->session->userdata('kegiatan');
        $bulan = $this->session->userdata('bulan');
        $sub_kegiatan = $this->session->userdata('sub_kegiatan');
        $belanja = $this->session->userdata('belanja');

        if (!empty($nofak) && !empty($tglfak) && !empty($suplier)) {
            $beli_kode = $this->lpj->get_kobel();
            $order_proses = $this->lpj->simpan_surat_pesanan($nofak, $tglfak, $suplier, $beli_kode, $lampiran, $perihal, $program, $pesanan, $kegiatan, $bulan, $sub_kegiatan, $belanja);
            if ($order_proses) {
                $this->cart->destroy();
                $this->session->unset_userdata('nofak');
                $this->session->unset_userdata('tglfak');
                $this->session->unset_userdata('suplier');
                $this->session->unset_userdata('lampiran');
                $this->session->unset_userdata('perihal');
                $this->session->unset_userdata('program');
                $this->session->unset_userdata('pesanan');
                $this->session->unset_userdata('kegiatan');
                $this->session->unset_userdata('bulan');
                $this->session->unset_userdata('sub_kegiatan');
                $this->session->unset_userdata('belanja');
                echo $this->session->set_flashdata('msg', '<label class="label label-success">Pembelian Berhasil di Simpan ke Database</label>');
                redirect('lpj_bos/surat_pesanan');
            } else {
                redirect('lpj_bos/surat_pesanan');
            }
        } else {
            echo $this->session->set_flashdata('msg', '<label class="label label-danger">Pembelian Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
            redirect('lpj_bos/surat_pesanan');
        }
    }

    public function deldata_surat_pesanan($id)
    {
        $data1 = ['pesan_kode' => $id];
        $data2 = ['d_pesan_kode' => $id];
        $this->db->delete('lpj_pesan', $data1);
        $this->db->delete('lpj_pesan_detail', $data2);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('lpj_bos/surat_pesanan');
    }

    public function mpdf_cetak($nofak)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

        $data['pesan'] = $this->lpj->getCetak($nofak);
        $data['barang'] = $this->lpj->getCetakBarang($nofak);
        $data['sekolah'] = $this->lpj->sekolah();
        $kop = $this->lpj->getKopSP();
        // var_dump($data['pesan']);
        // die;

        // Set the new Header before you AddPage
        $mpdf->SetHeader('<img src="' . base_url() . 'panel/dist/upload/logo/' . $kop['gambar'] . '" style="width:677px;height:125px;">');
        $mpdf->AddPage();

        //Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter();
        $html1 = $this->load->view('surat_pesanan/cetak_surat_pesanan', $data, TRUE);
        $mpdf->WriteHTML($html1);

        $nama_file_pdf = ('SURAT PESANAN' . ' _ ' . date('dmy'));
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
    }

    // end surat_pesanan

    // berita acara
    public function berita_acara()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Berita Acara';
        $data['home'] = 'LPJ BOS';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['pesan'] = $this->lpj->getSuratPesanan();
        $data['sup'] = $this->lpj->getsuplier();
        $data['kop'] = $this->lpj->getKopSP();
        // var_dump($data['sup']);
        // die;
        $this->load->view('layout/header-top', $data);
        $this->load->view('berita_acara/list_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('berita_acara/_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('berita_acara/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    function get_barang_bc()
    {
        $kobar = $this->input->post('kode_brg');
        $data['brg'] = $this->db->get_where('lpj_barang', ['barang_id' => $kobar]);
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $this->load->view('surat_pesanan/_data_beli', $data);
    }

    function add_to_cart_bc()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $nofak = $this->input->post('nofak');
        $tgl = $this->input->post('tgl');
        $suplier = $this->input->post('suplier');
        $lampiran = $this->input->post('lampiran');
        $perihal = $this->input->post('perihal');
        $program = $this->input->post('program');
        $pesanan = $this->input->post('pesanan');
        $kegiatan = $this->input->post('kegiatan');
        $bulan = $this->input->post('bulan');
        $sub_kegiatan = $this->input->post('sub_kegiatan');
        $belanja = $this->input->post('belanja');

        $this->session->set_userdata('nofak', $nofak);
        $this->session->set_userdata('tglfak', $tgl);
        $this->session->set_userdata('suplier', $suplier);
        $this->session->set_userdata('lampiran', $lampiran);
        $this->session->set_userdata('perihal', $perihal);
        $this->session->set_userdata('program', $program);
        $this->session->set_userdata('pesanan', $pesanan);
        $this->session->set_userdata('kegiatan', $kegiatan);
        $this->session->set_userdata('bulan', $bulan);
        $this->session->set_userdata('sub_kegiatan', $sub_kegiatan);
        $this->session->set_userdata('belanja', $belanja);

        $kobar = $this->input->post('kode_brg');
        $produk = $this->lpj->get_barang($kobar);
        $i = $produk;
        $data = array(
            'id'       => $i['barang_id'],
            'name'     => $i['barang_nama'],
            'satuan'   => $i['barang_satuan'],
            'price'    => $this->input->post('harjul'),
            'qty'      => $this->input->post('jumlah')
        );
        // var_dump($data);
        // die;
        $this->cart->insert($data);
        redirect('lpj_bos/berita_acara');
    }

    function remove_bc()
    {
        $row_id = $this->uri->segment(3);
        $this->cart->update(array(
            'rowid'      => $row_id,
            'qty'     => 0
        ));
        redirect('lpj_bos/berita_acara');
    }

    function simpan_berita_acara()
    {
        $nofak = $this->session->userdata('nofak');
        $tglfak = $this->session->userdata('tglfak');
        $suplier = $this->session->userdata('suplier');
        $lampiran = $this->session->userdata('lampiran');
        $perihal = $this->session->userdata('perihal');
        $program = $this->session->userdata('program');
        $pesanan =  $this->session->userdata('pesanan');
        $kegiatan = $this->session->userdata('kegiatan');
        $bulan = $this->session->userdata('bulan');
        $sub_kegiatan = $this->session->userdata('sub_kegiatan');
        $belanja = $this->session->userdata('belanja');

        if (!empty($nofak) && !empty($tglfak) && !empty($suplier)) {
            $beli_kode = $this->lpj->get_kobel();
            $order_proses = $this->lpj->simpan_surat_pesanan($nofak, $tglfak, $suplier, $beli_kode, $lampiran, $perihal, $program, $pesanan, $kegiatan, $bulan, $sub_kegiatan, $belanja);
            if ($order_proses) {
                $this->cart->destroy();
                $this->session->unset_userdata('nofak');
                $this->session->unset_userdata('tglfak');
                $this->session->unset_userdata('suplier');
                $this->session->unset_userdata('lampiran');
                $this->session->unset_userdata('perihal');
                $this->session->unset_userdata('program');
                $this->session->unset_userdata('pesanan');
                $this->session->unset_userdata('kegiatan');
                $this->session->unset_userdata('bulan');
                $this->session->unset_userdata('sub_kegiatan');
                $this->session->unset_userdata('belanja');
                echo $this->session->set_flashdata('msg', '<label class="label label-success">Pembelian Berhasil di Simpan ke Database</label>');
                redirect('lpj_bos/berita_acara');
            } else {
                redirect('lpj_bos/berita_acara');
            }
        } else {
            echo $this->session->set_flashdata('msg', '<label class="label label-danger">Pembelian Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
            redirect('lpj_bos/berita_acara');
        }
    }

    public function deldata_berita_acara($id)
    {
        $data1 = ['pesan_kode' => $id];
        $data2 = ['d_pesan_kode' => $id];
        $this->db->delete('lpj_pesan', $data1);
        $this->db->delete('lpj_pesan_detail', $data2);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('lpj_bos/surat_pesanan');
    }

    public function mpdf_berita_acara($nofak)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

        $data['pesan'] = $this->lpj->getCetak($nofak);
        $data['barang'] = $this->lpj->getCetakBarang($nofak);
        $data['sekolah'] = $this->lpj->sekolah();
        $kop = $this->lpj->getKopSP();
        // var_dump($data['pesan']);
        // die;

        // Set the new Header before you AddPage
        $mpdf->SetHeader('<img src="' . base_url() . 'panel/dist/upload/logo/' . $kop['gambar'] . '" style="width:677px;height:125px;">');
        $mpdf->AddPage();

        //Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter();
        $html1 = $this->load->view('berita_acara/cetak_berita_acara', $data, TRUE);
        $mpdf->WriteHTML($html1);

        $nama_file_pdf = ('BERITA ACARA' . ' _ ' . date('dmy'));
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
    }

    // end surat_pesanan
}
