<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Master_guru_model', 'master_guru');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Master Guru';
            $data['home'] = 'Rapor_Master';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;       

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_master/master_guru/master_guru_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/master_guru/master_guru_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/master_guru/master_guru_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tampildata()
    {
        cek_post();
        $list = $this->master_guru->tampildata();
        $record = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;

            // tombol action - dicek juga punya akses apa engga gengs....
            $tombol_action = ($data['stat_data'] == 'P' ?
                '<form action="' . base_url('akademik_master/master_guru/aktif') . '" method="post" enctype="multipart/form-data">                    
                      <input type="hidden" name="id" value="' . $data['id'] . '">
                       <input type="hidden" name="kd_campus" value="' . $data['kd_campus'] . '">
                        <input type="hidden" name="kd_sekolah" value="' . $data['kd_sekolah'] . '">
                         <input type="hidden" name="nik" value="' . $data['nip'] . '">
                 <button type="submit" class="btn btn-xs btn-info"><i class="fa fa-user"></i> Aktifkan User</button>
                 </form>' :

                '<form action="' . base_url('akademik_master/master_guru/mutasi') . '" method="post" enctype="multipart/form-data">                    
                    <input type="hidden" name="id" value="' . $data['id'] . '">
                    <input type="hidden" name="nik" value="' . $data['nip'] . '">
                    <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-user"></i> NonAktifkan User</button>
                    </form>') .

                $tombol_action = ('<a href="' . base_url('akademik_master/master_guru/ubah_data/') . '' . $data['id'] . '" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a> ');

            // column buat data tables --
            $row = [
                'no' => $no,
                'QRCode' => '<img class="img-responsive" src="' . base_url('panel/assets/img/qrcode/') . $data['nip'] . 'code.png' . '" />',
                'nama' => '<div>' . $data['nama_guru'] . '</div><div>' . $data['email'] . '</div>',
                'jabatan' => $data['jabatan'],
                'is_active' => ($data['stat_data'] == "A" ? "Aktif" : "Keluar/Mutasi"),
                'action' => $tombol_action,
            ];
            $record[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->master_guru->count_all(),
            "recordsFiltered" => $this->master_guru->count_filtered(),
            "data" => $record,
        );
        //output to json format
        echo json_encode($output);
    }

    public function tambah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        // $data['campus'] = $this->master_guru->get_campus();
        $data['p_jk']  = array("" => "Jenis Kelamin", "L" => "Laki-laki", "P" => "Perempuan");
        $data['p_jabatan']  = array("" => "Jabatan", "Kepala Sekolah" => "Kepala Sekolah", "Kurikulum" => "Kurikulum", "Kesiswaan" => "Kesiswaan", "Guru" => "Guru", "TU" => "TU", "Tukang Kebun" => "Tukang Kebun", "Petugas Keamanan" => "Petugas Keamanan", "Tenaga Perpustakaan" => "Tenaga Perpustakaan");
        $data['p_isbk']  = array("2" => "Bukan", "1" => "Ya");
        $data['p_guru']  = $this->db->get('pegawai_data')->result_array();

        $this->load->view('akademik_master/master_guru/master_guru_css');
        $this->load->view('akademik_master/master_guru/master_guru_tambah', $data);
        $this->load->view('akademik_master/master_guru/master_guru_js');
    }

    function add_ajax_sekolah($id_cam)
    {
        $query = $this->db->get_where('l_sekolah', array('kd_campus' => $id_cam, 'kd_sekolah' => $this->session->userdata('kd_sekolah')));
        $data = "<option value=''>- Select Jabatan -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->kd_sekolah . "'>" . $value->nama_sekolah . "</option>";
        }
        echo $data;
    }

    public function data_guru($id)
    {
        $data['guru'] =
            $this->db->select('*')
            ->from('pegawai_data')
            ->where(['data_id' => $id])
            ->get()->result_array();
        $this->load->view('akademik_master/master_guru/master_guru_data', $data);
    }

    public function simpan_tambah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->master_guru->simpan_tambah();
    }

    public function aktif()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $this->master_guru->aktif();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Ubah Data ! </h5>
        </div>
        ');
        redirect('akademik_master/master_guru');
    }

    public function mutasi()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $this->master_guru->mutasi();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Ubah Data ! </h5>
        </div>
        ');
        redirect('akademik_master/master_guru');
    }

    public function ubah_data($id)
    {

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Master Guru';
            $data['home'] = 'Rapor_Master';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;       
            $data['p_guru']  = $this->master_guru->get_guru($id);
            // $data['campus'] = $this->master_guru->get_campus();
            $data['p_jk']  = array("" => "Jns Kel", "L" => "Laki-laki", "P" => "Perempuan");
            $data['p_jabatan']  = array("" => "Jabatan", "Kepala Sekolah" => "Kepala Sekolah", "Kurikulum" => "Kurikulum", "Kesiswaan" => "Kesiswaan", "Guru" => "Guru", "TU" => "TU", "Tukang Kebun" => "Tukang Kebun", "Petugas Keamanan" => "Petugas Keamanan", "Tenaga Perpustakaan" => "Tenaga Perpustakaan");
            $data['p_isbk']  = array("2" => "Bukan", "1" => "Ya");

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_master/master_guru/master_guru_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/master_guru/master_guru_edit', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/master_guru/master_guru_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function simpan_ubahdata()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $this->master_guru->simpan_ubahdata();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Ubah Data ! </h5>
        </div>
        ');
        redirect('akademik_master/master_guru');
    }

    public function showw()
    {
        $this->load->library('ciqrcode');
        $id = $this->input->post('id');
        // $this->load->model('GenBar_model');
        $car = $this->master_guru->getShow_query($id);
        if ($car->num_rows() > 0) {
            foreach ($car->result() as $row) {
                $shows = array(
                    'nik' => $row->nik,
                    'nama_lengkap' => $row->nama_lengkap,
                    'telp' => $row->telp,
                    // 'nama_shift' => $row->nama_shift,
                    // 'nama_gedung' => $row->nama_gedung
                );
                $this->load->view('akademik_master/master_guru/v_scan', $shows);
            }
        } else {
            $this->load->view('akademik_master/master_guru/v_scan_kosong');
        }
    }


    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->master_guru->search_value($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama,
                    );
                echo json_encode($arr_result);
            }
        }
    }
}
