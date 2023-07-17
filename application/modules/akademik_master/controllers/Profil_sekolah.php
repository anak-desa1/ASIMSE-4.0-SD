<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('ProfilSekolah_model', 'sekolah');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Profil Sekolah';
            $data['home'] = 'Rapor_Master';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;         
            $data['tahun'] = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['p_semester'] = array("1" => "Ganjil", "2" => "Genap");
            $data['provinsi'] = $this->sekolah->get_all_provinsi();
            $data['lokasi'] = $this->sekolah->get_lokasi();
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_master/profil_sekolah/list_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_master/profil_sekolah/profil', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_master/profil_sekolah/list_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    function add_ajax_kab($id_prov)
    {
        $query = $this->db->get_where('m_kota', array('provinsi_id' => $id_prov));
        $data = "<option value=''>- Select Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->kota_id . "'>" . $value->kota . "</option>";
        }
        echo $data;
    }

    function add_ajax_kec($id_kab)
    {
        $query = $this->db->get_where('m_kecamatan', array('kota_id' => $id_kab));
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->kecamatan_id . "'>" . $value->kecamatan . "</option>";
        }
        echo $data;
    }

    function add_ajax_sekolah($id_cam)
    {
        $query = $this->db->get_where('l_sekolah', array('kd_campus' => $id_cam));
        $data = "<option value=''>- Select Jabatan -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->kd_sekolah . "'>" . $value->nama_sekolah . "</option>";
        }
        echo $data;
    }

    public function editSekolah()
    {
        $sekolah_id = $this->input->post('sekolah_id', true);
        $nss = $this->input->post('nss', true);
        $npsn = $this->input->post('npsn', true);
        $nama_sekolah = $this->input->post('nama_sekolah', true);
        $alamat = $this->input->post('alamat', true);
        $prov = $this->input->post('sekolah_provinsi_id', true);
        $kota = $this->input->post('sekolah_kota_id', true);
        $kec = $this->input->post('sekolah_kecamatan_id', true);
        $telp = $this->input->post('telp', True);
        $kodepos = $this->input->post('kodepos', true);
        $email = $this->input->post('email', true);
        $web = $this->input->post('web', true);
        $sebutan_kepala = $this->input->post('sebutan_kepala', true);
        // $kop_1 = $this->input->post('kop_1', true);
        // $kop_2 = $this->input->post('kop_2', true);
        $logo = $this->input->post('logo', true);

        $upload_image = $_FILES['logo'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/logo/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/logo/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('logo', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $data = [
            'nss' => $nss,
            'npsn' => $npsn,
            'nama_sekolah' => $nama_sekolah,
            'alamat' => $alamat,
            'sekolah_provinsi_id' => $prov,
            'sekolah_kota_id' => $kota,
            'sekolah_kecamatan_id' => $kec,
            'telp' => $telp,
            'kodepos' => $kodepos,
            'email' => $email,
            'web' => $web,
            'sebutan_kepala' => $sebutan_kepala,
            // 'kop_1' => $kop_1,
            // 'kop_2' => $kop_2,
        ];

        $this->db->where('sekolah_id', $sekolah_id);
        $this->db->update('m_sekolah', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Ubah Data !</div>');
        redirect('akademik_master/profil_sekolah');
    }

    public function cetakrapor()
    {
        $sekolah_id = $this->input->post('sekolah_id', true);
        $nama_sekolah = $this->input->post('nama_sekolah', true);
        $alamat = $this->input->post('alamat', true);

        $data1 = [

            'nama_sekolah' => $nama_sekolah,
            'alamat' => $alamat,

        ];

        $this->db->where('sekolah_id', $sekolah_id);
        $this->db->update('m_sekolah', $data1);

        $id = $this->input->post('id', true);
        $tgl_biodata = $this->input->post('tgl_biodata', true);
        $tgl_raport_pts = $this->input->post('tgl_raport_pts', true);
        $tgl_raport_pas = $this->input->post('tgl_raport_pas', true);
        $semester = $this->input->post('semester', true);
        $th_pelajaran = $this->input->post('th_pelajaran', true);
        $nama_kepsek = $this->input->post('nama_kepsek', true);

        $data2 = [
            'tgl_biodata' => $tgl_biodata,
            'tgl_raport_pts' => $tgl_raport_pts,
            'tgl_raport_pas' => $tgl_raport_pas,
            'semester' => $semester,
            'th_pelajaran' => $th_pelajaran,
            'nama_kepsek' => $nama_kepsek,
        ];

        $this->db->where('id', $id);
        $this->db->update('t_tahun', $data2);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Ubah Data !</div>');
        redirect('akademik_master/profil_sekolah');
    }
}
