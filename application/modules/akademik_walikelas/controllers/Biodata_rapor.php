<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata_rapor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();

        $data['url'] = "akademik_walikelas/biodata_rapor";
        $data['idnya'] = "setmapel";
        $data['nama_form'] = "f_nilai_sso";
        $get_tasm = $this->db->query("SELECT tahun FROM t_tahun WHERE aktif = 'Y'")->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Biodata_rapor_model', 'biodata_rapor');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Biodata Rapor';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['data'] = $this->biodata_rapor->get_siswa();

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function cover($id, $target)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Biodata Rapor';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->biodata_rapor->get_kelas();
            // $data['kelas'] = $this->db->get_where('t_kelas_siswa', ['rombel' => $id])->row_array();
            $data['siswa'] = $this->db->get_where('m_siswa', ['nis' => $target])->row_array();

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_cover', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function data_sekolah($id, $target)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Biodata Rapor';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->biodata_rapor->get_kelas();
            // $data['kelas'] = $this->db->get_where('t_kelas_siswa', ['rombel' => $id])->row_array();
            $data['siswa'] = $this->db->get_where('m_siswa', ['nis' => $target])->row_array();
            $data['sekolah'] = $this->biodata_rapor->get_sekolah($id, $target);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_sekolah', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function data_siswa($id, $target)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Catak Rapor PAS';
        $data['home'] = 'Cetak';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kelas'] = $this->biodata_rapor->get_kelas();
        // $data['kelas'] = $this->db->get_where('t_kelas_siswa', ['rombel' => $id])->row_array();
        $data['siswa'] = $this->db->get_where('m_siswa', ['nis' => $target])->row_array();
        $data['sekolah'] = $this->biodata_rapor->get_sekolah($id, $target);
        $data['tahun'] = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();

        $this->load->view('layout/header-top');
        $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_css');
        $this->load->view('layout/header-bottom');
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_siswa', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function data_panduan()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Catak Rapor PAS';
        $data['home'] = 'Cetak';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kelas'] = $this->biodata_rapor->get_kelas();
        $this->load->view('layout/header-top');
        $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_css');
        $this->load->view('layout/header-bottom');
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_panduan', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function mpdf($id, $target)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        // cover
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['siswa'] = $this->db->get_where('m_siswa', ['nis' => $target])->row_array();
        // end cover
        // sekolah
        $data['sekolah'] = $this->biodata_rapor->get_sekolah($id, $target);
        $data['logo'] = $this->db->get_where('m_sekolah')->row_array();
        $data['tahun'] = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        // end sekolah

        // end pengetahuan dan keterampilan
        $siswa  = $this->db->get_where('m_siswa', ['nis' => $target])->row_array();
        $kelas = $this->db->get_where('t_kelas_siswa', ['rombel' => $id])->row_array();
        $sekolah = $this->db->get_where('m_sekolah')->row_array();
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | ASIMSE.4 </td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_pdf_1', $data, TRUE);
        $mpdf->WriteHTML($html1);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | ASIMSE.4 </td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html2 = $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_pdf_2', $data, TRUE);
        $mpdf->WriteHTML($html2);


        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | ASIMSE.4 </td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html3 = $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_pdf_3', $data, TRUE);
        $mpdf->WriteHTML($html3);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | ASIMSE.4 </td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html4 = $this->load->view('akademik_walikelas/biodata_rapor/biodata_rapor_pdf_4', $data, TRUE);
        $mpdf->WriteHTML($html4);

        $siswa  = $this->db->get_where('m_siswa', ['nis' => $target])->row_array();
        $nama_file_pdf = ($siswa['nama']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
        // $mpdf->Output($nama_dokumen . ".pdf", 'I');
        // var_dump($data['nilai_pts']);
        // die;
    }
}
