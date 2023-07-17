<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Naik_kelas extends CI_Controller

{

    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Naik_kelas_model', 'naik_kelas');
    }


    public function index()

    {

        if ($this->form_validation->run() == false) {

            $this->benchmark->mark('code_start');
            $data['title'] = 'Profile';
            $data['home'] = 'My Profile';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;
            $this->load->view('layout/header-top', $data);
            $this->load->view('master_siswa/naik_kelas/naik_kelas_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('master_siswa/naik_kelas/naik_kelas_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('master_siswa/naik_kelas/naik_kelas_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tampildata()
    {
        cek_post();
        $list = $this->naik_kelas->tampildata();
        $record = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;
            // tombol action - dicek juga punya akses apa engga gengs....
            $tombol_action = ($data['tingkat_active'] == 0 ? '
             <form action="naik_kelas/del/' . $data['naik_id'] . '" method="post" enctype="multipart/form-data">
               <input type="hidden" class="form-control" id="id" name="id" value="' . $data['naik_id'] . '">
               <input type="hidden" class="form-control" id="nis" name="nis" value="' . $data['nis'] . '">            
               <button type="submit" id="hapus" class="btn btn-danger mb-3"><i class="fa fa-trash-alt"></i> Delete</button>
            </form>' : 'Siswa sudah masuk kelas');
            // column buat data tables --
            $row = [
                'no' => $no,
                'nis' => $data['nis'],
                'nama' => $data['nama'],
                'kelas' => $data['tingkat'],
                'tahun' => $data['th_active'],
                'status' => ($data['tingkat_active'] == 1 ? "Aktif" : "Tidak Aktif"),
                'action' => $tombol_action,
            ];
            $record[] = $row;
        }

        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->naik_kelas->count_all(),
            "recordsFiltered" => $this->naik_kelas->count_filtered(),
            "data" => $record,
        );

        //output to json format
        echo json_encode($output);
    }



    public function tambah_baru()

    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['kelas'] = $this->db->get_where('l_kelas')->result_array();
        // var_dump($data['kelas']);
        // die;
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $this->load->view('master_siswa/naik_kelas/naik_kelas_css');
        $this->load->view('master_siswa/naik_kelas/naik_kelas_tambah_baru', $data);
        $this->load->view('master_siswa/naik_kelas/naik_kelas_js');
    }



    public function tambah_naik()

    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }


        $data['kelas'] = $this->db->get_where('l_kelas')->result_array();
        // var_dump($data['kelas']);
        // die;
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        $this->load->view('master_siswa/naik_kelas/naik_kelas_css');
        $this->load->view('master_siswa/naik_kelas/naik_kelas_tambah_naik', $data);
        $this->load->view('master_siswa/naik_kelas/naik_kelas_js');
    }



    // function add_ajax_sekolah($id_cam)
    // {
    //     $query = $this->db->get_where('l_sekolah', array('kd_campus' => $id_cam, 'kd_sekolah' => $this->session->userdata('kd_sekolah')));
    //     $data = "<option value=''>- Select sekolah -</option>";
    //     foreach ($query->result() as $value) {
    //         $data .= "<option value='" . $value->kd_sekolah . "'>" . $value->nama_sekolah . "</option>";
    //     }
    //     echo $data;
    // }

    // function add_ajax_kelas($id_kel)
    // {
    //     $query = $this->db->get_where('m_kelas', array('kd_sekolah' => $id_kel));
    //     $data = "<option value=''>- Select sekolah -</option>";
    //     foreach ($query->result() as $value) {
    //         $data .= "<option value='" . $value->tingkat  . "'>" . $value->tingkat . "</option>";
    //     }
    //     echo $data;
    // }


    public function tabel_baru($id)

    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['siswa'] = $this->db->get_where('m_siswa', ['tingkat' => $id, 'stat_data' => 'A'])->result_array();
        $this->load->view('master_siswa/naik_kelas/naik_kelas_table_baru', $data);
    }

    public function tabel_naik($id)
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['siswa'] = $this->naik_kelas->get_siswa_naik($id);
        $this->load->view('master_siswa/naik_kelas/naik_kelas_table_naik', $data);
    }

    public function simpan_baru()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->naik_kelas->simpan_baru();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil daftar ulang kenikan kelas ! </h5>
        </div>
        ');
        redirect('master_siswa/naik_kelas');
    }

    public function simpan_naik()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->naik_kelas->simpan_naik();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil daftar ulang kenikan kelas ! </h5>
        </div>
        ');
        redirect('master_siswa/naik_kelas');
    }

    public function del($id)
    {
        $data = ['naik_id' => $id];
        $this->db->delete('m_naik_kelas', $data);
        $nis = $this->input->post('nis', true);
        $data1 = ['stat_data' => 'A',];
        $this->db->where('nis', $nis);
        $this->db->update('m_siswa', $data1);
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        redirect('master_siswa/naik_kelas');
    }

    public function edit($id)
    {
        $this->benchmark->mark('code_start');
        $this->benchmark->mark('code_start');
        $data['title'] = 'Data Siswa';
        $data['home'] = 'Master Data';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['data'] = $this->master_siswa->get_edit($id);
        $data['p_jk']  = array("" => "Jns Kel", "L" => "Laki-laki", "P" => "Perempuan");
        $data['p_agama']  = array("" => "Agama", "Islam" => "Islam", "Katolik" => "Katolik", "Kristen" => "Kristen", "Hindu" => "Hindu", "Budha" => "Budha", "Konghucu" => "Konghucu");
        $data['p_status_anak']  = array("" => "Status Anak", "AK" => "Anak Kandung", "Anak Tiri" => "Anak Tiri");
        $data['p_diterima_kelas']  = $this->db->query("SELECT * from m_kelas")->result_array();
        // var_dump($data['data_pegawai']);
        // die;       
        $this->load->view('layout/header-top');
        $this->load->view('data_siswa/master_siswa/data_siswa_css');
        $this->load->view('layout/header-bottom');
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('data_siswa/master_siswa/data_siswa_edit', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('data_siswa/master_siswa/data_siswa_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function update()

    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->master_siswa->update();
    }

    public function create()

    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Data Siswa';
        $data['home'] = 'Master Data';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        // var_dump($data['data_pegawai']);
        // die;
        $this->load->view('layout/header-top');
        $this->load->view('data_siswa/master_siswa/data_siswa_css');
        $this->load->view('layout/header-bottom');
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('data_siswa/master_siswa/data_siswa_create', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('data_siswa/master_siswa/data_siswa_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function download()
    {
        force_download('dist/excel/Template_Siswa.xlsx', NULL);
    }

    public function excel()
    {
        if (isset($_FILES["file"]["name"])) {
            // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 4; $row <= $highestRow; $row++) {
                    $nisn = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $jk = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $tmp_lahir = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $tgl_lahir = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $agama = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $notelp = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $diterima_kelas = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $diterima_tgl = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $data[] = array(
                        "nisn" => $nisn,
                        "nama" => $nama,
                        "jk" => $jk,
                        "tmp_lahir" => $tmp_lahir,
                        "tgl_lahir" => $tgl_lahir,
                        "agama" => $agama,
                        "notelp" => $notelp,
                        "diterima_kelas" => $diterima_kelas,
                        "diterima_tgl" => $diterima_tgl,
                        "foto" => 'default.jpg',
                    );
                }
            }

            $this->db->insert_batch('m_siswa', $data);
            $message = array(
                'message' => '<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
            );

            $this->session->set_flashdata($message);
            redirect('master_data/master_siswa');
        } else {
            $message = array(
                'message' => '<div class="alert alert-danger">Import file gagal, coba lagi</div>',
            );

            $this->session->set_flashdata($message);
            redirect('master_data/master_siswa');
        }
    }
}

/* End of file Import.php */

/* Location: ./application/controllers/Import.php */
