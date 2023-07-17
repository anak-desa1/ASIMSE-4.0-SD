<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_aktif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Tahun_aktif_model', 'tahun_aktif');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Tahun Aktif';
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
            $this->load->view('akademik_master/tahun_aktif/tahun_aktif_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/tahun_aktif/tahun_aktif_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/tahun_aktif/tahun_aktif_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tampildata()
    {
        cek_post();
        $list = $this->tahun_aktif->tampildata();
        $record = array();
        $no = $_POST['start'];

        foreach ($list as $data) {
            $no++;
            // var_dump($data['id']);
            // die;

            // tombol action - dicek juga punya akses apa engga gengs....
            $tombol_action = ($data['aktif'] == "N" ?
                '<form action="' . base_url('akademik_master/tahun_aktif/aktif')  . '" method="post" enctype="multipart/form-data">                    
                        <input type="hidden" name="_id" id="_id" value="' . $data['id'] . '">                       
                        <input type="hidden" name="aktif" value="Y">
                 <button type="submit" class="btn btn-xs btn-info"><i class="fa fa-star"></i> Aktif</button>
                 </form>' :
                ' <form action="' . base_url('akademik_master/tahun_aktif/tidak_aktif') . '" method="post" enctype="multipart/form-data">                    
                        <input type="hidden" name="_id" id="_id" value="' . $data['id'] . '">
                        <input type="hidden" name="aktif" value="N">                      
                    <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-star"></i> Tidak Aktif</button>
                 </form>') .
                (cek_akses_user()['role_id'] == 1 ?
                    ' <form action="' . base_url('akademik_master/tahun_aktif/edit/') . $data['id'] . '" method="post" enctype="multipart/form-data">                    
                     <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button>
                    </form>' : '');

            // column buat data tables --
            $row = [
                'no' => $no,
                'tahun' => '<div>' . $data['tahun'] . '</div>',
                'semester' => '<div>' . $data['semester'] . '</div>',
                'nama_lengkap' => $data['nama_lengkap'],
                // 'tgl_raport' => $data['tgl_raport'],
                // 'tgl_raport_kelas3' => $data['tgl_raport_kelas3'],
                'aktif' => ($data['aktif'] == "Y" ? '<div class="label label-success">Aktif</div>' : '<div class="label label-danger">Tidak Aktif</div>'),
                'action' => $tombol_action,
            ];
            $record[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->tahun_aktif->count_all(),
            "recordsFiltered" => $this->tahun_aktif->count_filtered(),
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
        // $data['campus'] = $this->tahun_aktif->get_campus();
        $data['p_semester'] = array("1" => "Ganjil", "2" => "Genap");
        $data['p_tahun'] = array();
        for ($i = (date('Y') - 4); $i <= (date('Y') + 4); $i++) {
            $idx = $i;
            $data['p_tahun'][$idx] = $i;
        }
        $data['p_guru']  = $this->db->get('pegawai_data')->result_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $this->load->view('akademik_master/tahun_aktif/tahun_aktif_css');
        $this->load->view('akademik_master/tahun_aktif/tahun_aktif_tambah', $data);
        $this->load->view('akademik_master/tahun_aktif/tahun_aktif_js');
    }

    function add_ajax_sekolah($id_cam)
    {
        // var_dump($id_cam);
        // die;
        $query = $this->db->get_where('l_sekolah', array('kd_campus' => $id_cam));
        $data = "<option value=''>- Select Sekolah -</option>";
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
        echo $this->tahun_aktif->simpan_tambah();
    }

    public function aktif()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $this->tahun_aktif->aktif();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Ubah Data ! </h5>
        </div>
        ');
        redirect('akademik_master/tahun_aktif');
    }

    public function tidak_aktif()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $this->tahun_aktif->tidak_aktif();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Ubah Data ! </h5>
        </div>
        ');
        redirect('akademik_master/tahun_aktif');
    }

    public function edit($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Tahun Aktif';
            $data['home'] = 'Rapor_Master';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

            // var_dump($data['data_pegawai']);
            // die;
            // $data['campus'] = $this->tahun_aktif->get_campus();
            $data['p_semester'] = array("1" => "Satu", "2" => "Dua");
            $data['p_tahun'] = array();

            for ($i = (date('Y') - 4); $i <= (date('Y') + 4); $i++) {
                $idx = $i;
                $data['p_tahun'][$idx] = $i;
            }
            $data['p_guru']  = $this->db->get('pegawai_data')->result_array();
            $data['data'] = $this->tahun_aktif->get_edit($id);

            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_master/tahun_aktif/tahun_aktif_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/tahun_aktif/tahun_aktif_edit', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/tahun_aktif/tahun_aktif_js');
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
        echo $this->tahun_aktif->update();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Ubah Data ! </h5>
        </div>
        ');
        redirect('akademik_master/tahun_aktif');
    }
}
