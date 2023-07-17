<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cetak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Cetak_model', 'ion_auth');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Print QRCode';
            $data['home'] = 'QRCode Siswa';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;
            $data['balangko'] = $this->db->get_where('ab_blangko')->row_array();
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 0, 4);
            $ta = substr($data['tasm'], 0, 4);
            // $data['kelas'] = $this->db->get('l_kelas')->result_array();
            $data['kelas'] = $this->ion_auth->get_siswarombel();

            $this->load->view('layout/header-top', $data);
            $this->load->view('siswa_qrcode/cetak/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('siswa_qrcode/cetak/cetak_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('siswa_qrcode/cetak/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tabel($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        // var_dump($data['ta']);
        // die;
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $data['siswa'] =
            $this->db->select('a.*,a.nama nm_siswa,c.folder')
            ->from('m_siswa a')
            ->join('t_kelas_siswa b', 'a.nis = b.id_siswa', 'left')
            ->join('ab_blangko c', 'a.kd_sekolah = c.kd_sekolah', 'left')
            ->where(['b.rombel' => $id])
            ->group_by('a.nama', 'ASC')
            ->get()->result_array();

        // var_dump($data['siswa']);
        // die;

        $this->load->view('siswa_qrcode/cetak/_css');
        $this->load->view('siswa_qrcode/cetak/cetak_data', $data);
        $this->load->view('siswa_qrcode/cetak/_js');
    }

    public function print()
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $data['blangko'] = $this->db->get_where('ab_blangko')->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y',])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $id = $this->input->post('selector', true);
        $data['siswa'] = $this->ion_auth->kartu_siswa($id)->result();
        // var_dump($data['siswa']);
        // die;

        $this->load->view('siswa_qrcode/cetak/_css');
        $this->load->view('siswa_qrcode/cetak/cetak_print', $data);
        $this->load->view('siswa_qrcode/cetak/_js');
    }

    public function mpdf_qrcode()
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $data['blangko'] = $this->db->get_where('ab_blangko')->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $id = $this->input->post('selector', true);
        $data['siswa'] = $this->ion_auth->kartu_siswa($id)->result();

        // Set the new Header before you AddPage
        $mpdf->SetHeader('');
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter('');
        $html1 = $this->load->view('siswa_qrcode/cetak/cetak_print', $data, TRUE);
        $mpdf->WriteHTML($html1);


        $mpdf->Output('Cetak Kartu' . '.pdf', 'I');
        // $mpdf->Output($nama_dokumen . ".pdf", 'I');
        // var_dump($data['nilai_pts']);
        // die;
    }
}
