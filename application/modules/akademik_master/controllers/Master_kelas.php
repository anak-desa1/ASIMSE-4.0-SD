<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Master_kelas_model', 'master_kelas');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Master Kelas';
            $data['home'] = 'Rapor_Master';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;       
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_master/master_kelas/master_kelas_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/master_kelas/master_kelas_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/master_kelas/master_kelas_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }


    public function tampildata()
    {
        cek_post();
        $list = $this->master_kelas->tampildata();
        $record = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;

            // tombol action - dicek juga punya akses apa engga gengs....
            $tombol_action = ('<div><a href="master_kelas/edit/' . $data['id'] . '"class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> </a></div>') .
                ('<a href="master_kelas/del/' . $data['id'] . '"class="btn btn-xs btn-danger"><i class="fa fa-trash-alt"></i> </a>');

            // column buat data tables --
            $row = [
                'no' => $no,
                // 'nama_sekolah' => $data['nama_sekolah'],
                'tingkat' => $data['tingkat'],
                'nama' => $data['nama'],
                'action' => $tombol_action,
            ];
            $record[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->master_kelas->count_all(),
            "recordsFiltered" => $this->master_kelas->count_filtered(),
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
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $this->load->view('akademik_master/master_kelas/master_kelas_css');
        $this->load->view('akademik_master/master_kelas/master_kelas_tambah', $data);
        $this->load->view('akademik_master/master_kelas/master_kelas_js');
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

    public function simpan_tambah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->master_kelas->simpan_tambah();
    }

    public function del($id)
    {
        $data = ['id' => $id];
        $this->db->delete('m_kelas', $data);
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        redirect('akademik_master/master_kelas');
    }

    public function edit($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Master Kelas';
            $data['home'] = 'Rapor_Master';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;    
            $data['data'] = $this->master_kelas->get_edit($id);
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_master/master_kelas/master_kelas_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/master_kelas/master_kelas_edit', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/master_kelas/master_kelas_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function update()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $this->master_kelas->update();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Ubah Data ! </h5>
        </div>
        ');
        redirect('akademik_master/master_kelas');
    }
}
