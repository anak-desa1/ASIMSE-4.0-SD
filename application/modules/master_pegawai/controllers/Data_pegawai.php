<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Data_pegawai_model', 'data_pegawai');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Data Pegawai';
            $data['home'] = 'Master Data';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            // var_dump($data['data_pegawai']);
            // die;
            $data['role'] = $this->db->get('pegawai_role')->result_array();
            $data['departemen'] = $this->data_pegawai->get_departemen();
            $data['atasan'] = $this->db->get('pegawai_data')->result_array();
            $this->load->view('layout/header-top',$data);
            $this->load->view('master_pegawai/data_pegawai/list_css');
            $this->load->view('layout/header-bottom',$data);
            // $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('master_pegawai/data_pegawai/list', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('master_pegawai/data_pegawai/list_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tampildata()
    {
        cek_post();
        $list = $this->data_pegawai->tampildata();
        // var_dump($list);
        // die;
        $record = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;

            // tombol action - dicek juga punya akses apa engga gengs....
            $tombol_action = (cek_akses_user()['role_id'] == 1 ? '<a href="data_pegawai/editdata/' . $data['data_id'] . '" class="btn btn-icon btn-light btn-hover-primary btn-sm"><i class="fas fa-edit text-warning"></i></a>' : '') .
                (cek_akses_user()['role_id'] == 1 ? ' <a href="data_pegawai/delpegawai/' . $data['data_id'] . '" class="btn btn-icon btn-light btn-hover-primary btn-sm"> <i class="fas fa-trash text-danger"></i></a>' : '');
            // column buat data tables --
            $row = [
                'nik' => $data['nik'],
                'nama_lengkap' => $data['nama_lengkap'],
                'telp' => $data['telp'],
                'email_pribadi' => $data['email_pribadi'],
                'tgl_masuk' => $data['tgl_masuk'],
                'action' => $tombol_action,
            ];
            $record[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->data_pegawai->count_all(),
            "recordsFiltered" => $this->data_pegawai->count_filtered(),
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
        $data['role'] = $this->db->get('pegawai_role')->result_array();
        $data['departemen'] = $this->data_pegawai->get_departemen();
        $data['atasan'] = $this->db->get('pegawai_data')->result_array();
        $this->load->view('master_pegawai/data_pegawai/list_css');
        $this->load->view('master_pegawai/data_pegawai/list_tambah', $data);
        $this->load->view('master_pegawai/data_pegawai/list_js');
    }

    function add_ajax_jabatan($id_jab)
    {
        $query = $this->db->get_where('access_jabatan', array('departemen_id' => $id_jab));
        $data = "<option value=''>- Select Jabatan -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->jabatan_id . "'>" . $value->jenis_jabatan . "</option>";
        }
        echo $data;
    }

    function add_ajax_tempat($id_lok)
    {
        $query = $this->db->get_where('access_lokasi', array('jabatan_id' => $id_lok));
        $data = "<option value=''>- Select Tempat -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->lokasi_id . "'>" . $value->lokasi . "</option>";
        }
        echo $data;
    }

    public function simpan_tambah()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->data_pegawai->simpan_tambah();
    }

    public function delPegawai($id)
    {
        $data = ['data_id' => $id];
        $this->db->delete('pegawai_data', $data);
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        redirect('master_pegawai/data_pegawai');
    }

    public function editData($id)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Data Pegawai';
        $data['home'] = 'Master Data';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data_pegawai'] = $this->data_pegawai->get_editData($id);
        // var_dump($data['data_pegawai']);
        // die;
        $data['role'] = $this->db->get('pegawai_role')->result_array();
        $data['departemen'] = $this->data_pegawai->get_departemen();
        $data['atasan'] = $this->db->get('pegawai_data')->result_array();
        $this->load->view('layout/header-top',$data);
        $this->load->view('master_pegawai/data_pegawai/edit_css');
        $this->load->view('layout/header-bottom',$data);
        // $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('master_pegawai/data_pegawai/list_edit', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('master_pegawai/data_pegawai/edit_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function updateData()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->data_pegawai->updateData();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Ubah Data ! </h5>
        </div>
        ');
        redirect('master_pegawai/data_pegawai');
    }

    public function create()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Data Pegawai';
        $data['home'] = 'Master Data';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        // var_dump($data['data_pegawai']);
        // die;
        $this->load->view('layout/header-top',$data);
        $this->load->view('master_pegawai/data_pegawai/list_css');
        $this->load->view('layout/header-bottom',$data);
        // $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('master_pegawai/data_pegawai/list_create', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('master_pegawai/data_pegawai/list_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function lakukan_download()
    {
        force_download('panel/dist/excel/Template_PegawaiData.xlsx', NULL);
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

                    $nik = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $email_pribadi = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $nama_lengkap = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $telp = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $tgl_lahir = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $tgl_masuk = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

                    $data[] = array(
                        "nik" => $nik,
                        "email_pribadi" => $email_pribadi,
                        "email" => $email . "@sds-sintyosephtigabinanga.sch.id",
                        "nama_lengkap" => $nama_lengkap,
                        "alamat" => $alamat,
                        "telp" => $telp,
                        "tgl_lahir" => $tgl_lahir,
                        "tgl_masuk" => $tgl_masuk,
                        "foto" => 'default.jpg',
                    );
                }
            }
            $this->db->insert_batch('pegawai_data', $data);
            $message = array(
                'message' => '<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
            );

            $this->session->set_flashdata($message);
            redirect('master_pegawai/data_pegawai');
        } else {
            $message = array(
                'message' => '<div class="alert alert-danger">Import file gagal, coba lagi</div>',
            );

            $this->session->set_flashdata($message);
            redirect('master_pegawai/data_pegawai');
        }
    }
}

/* End of file Import.php */
/* Location: ./application/controllers/Import.php */
