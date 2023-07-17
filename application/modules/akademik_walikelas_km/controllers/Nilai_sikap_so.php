<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_sikap_so extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();

        $data['url'] = "akademik_walikelas/nilai_sikap_so";
        $data['idnya'] = "setmapel";
        $data['nama_form'] = "f_nilai_sso";
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Nilai_sikap_so_model', 'nilai_sikap_so');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input KD';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->nilai_sikap_so->get_kelas();
            $data['data_nilai_pts'] = $this->nilai_sikap_so->tampil_data_pts();
            $data['data_nilai_pas'] = $this->nilai_sikap_so->tampil_data_pas();

            // var_dump($data['data_nilai_pts']);
            // die;
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 0, 4);

            $q_list_kd = $this->nilai_sikap_so->q_list_kd()->result_array();
            $array_kd = array();
            foreach ($q_list_kd as $v) {
                $idx = $v['kd_id'];
                $val = $v['nama_kd'];
                $array_kd[$idx] = $val;
            }
            $data['list_kd'] = $array_kd;

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_sikap_so/nilai_sikap_so_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_sikap_so/nilai_sikap_so_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_sikap_so/nilai_sikap_so_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_pts()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input KD';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['kelas'] = $this->nilai_sikap_so->get_kelas();
            $data['siswa_kelas'] = $this->nilai_sikap_so->get_siswa_pts();
            // var_dump($data['siswa_kelas']);
            // die;
            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 0, 4);

            $data['list_kd'] = $this->nilai_sikap_so->q_list_kd()->result_array();
            $data['jmlh_kd'] = $this->nilai_sikap_so->q_list_kd()->num_rows();

            $data['p_predikat'] = array('Sangat Baik' => 'Sangat Baik', 'Baik' => 'Baik', 'Cukup' => 'Cukup', 'Kurang' => 'Kurang', 'Perlu Bimbingan' => 'Perlu Bimbingan');
            $data['dropdown_kd'] = array();
            if (!empty($data['list_kd'])) {
                foreach ($data['list_kd'] as $v) {
                    $data['dropdown_kd'][$v['kd_id']] = $v['nama_kd'];
                }
            }

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_sikap_so/nilai_sikap_so_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_sikap_so/nilai_sikap_so_tambah_pts', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_sikap_so/nilai_sikap_so_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_pas()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input KD';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['siswa_kelas'] = $this->nilai_sikap_so->get_siswa_pas();
            $data['kelas'] = $this->nilai_sikap_so->get_kelas();

            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['ta'] = substr($data['tasm'], 0, 4);

            $data['list_kd'] = $this->nilai_sikap_so->q_list_kd()->result_array();
            $data['jmlh_kd'] = $this->nilai_sikap_so->q_list_kd()->num_rows();
            // var_dump($data['siswa_kelas']);
            // die;
            $data['p_predikat'] = array('Sangat Baik' => 'Sangat Baik', 'Baik' => 'Baik', 'Cukup' => 'Cukup', 'Kurang' => 'Kurang', 'Perlu Bimbingan' => 'Perlu Bimbingan');
            $data['dropdown_kd'] = array();
            if (!empty($data['list_kd'])) {
                foreach ($data['list_kd'] as $v) {
                    $data['dropdown_kd'][$v['kd_id']] = $v['nama_kd'];
                }
            }

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_walikelas/nilai_sikap_so/nilai_sikap_so_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_walikelas/nilai_sikap_so/nilai_sikap_so_tambah_pas', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_walikelas/nilai_sikap_so/nilai_sikap_so_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }


    public function simpan_nilai_pts()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_sikap_so->simpan_nilai_pts();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Nilai Sikap ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_sikap_so/tambah_pts');
    }

    public function simpan_nilai_pas()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_sikap_so->simpan_nilai_pas();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Nilai Sikap ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_sikap_so/tambah_pas');
    }


    public function cetak_pts()
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kelas'] = $this->nilai_sikap_so->get_kelas();
        $data['data_nilai_pts'] = $this->nilai_sikap_so->tampil_data_pts();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        // var_dump($data['list_kd']);
        // die;
        $q_list_kd = $this->nilai_sikap_so->q_list_kd()->result_array();
        $array_kd = array();
        foreach ($q_list_kd as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd'] = $array_kd;
        $this->load->view('akademik_walikelas/nilai_sikap_so/nilai_sikap_so_cetak_pts', $data);
        $this->benchmark->mark('code_end');
    }

    public function cetak_pas()
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kelas'] = $this->nilai_sikap_so->get_kelas();
        $data['data_nilai_pas'] = $this->nilai_sikap_so->tampil_data_pas();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        // var_dump($data['list_kd']);
        // die;
        $q_list_kd = $this->nilai_sikap_so->q_list_kd()->result_array();
        $array_kd = array();
        foreach ($q_list_kd as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd'] = $array_kd;
        $this->load->view('akademik_walikelas/nilai_sikap_so/nilai_sikap_so_cetak_pas', $data);
        $this->benchmark->mark('code_end');
    }
}
