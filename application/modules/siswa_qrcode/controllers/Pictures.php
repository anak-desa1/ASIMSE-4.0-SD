<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pictures extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        // $this->load->model('Pictures_model', 'ion_auth');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Pictures QRCode';
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
            $this->load->view('layout/header-top', $data);
            $this->load->view('siswa_qrcode/pictures/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('siswa_qrcode/pictures/pictures_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('siswa_qrcode/pictures/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function upload()
    {
        $id_blangko = $this->input->post('id_blangko', true);
        $folder = $this->input->post('folder', true);

        $result_blangko = $this->db->get_where('ab_blangko', ['id_blangko' => $id_blangko])->row_array();

        $upload_image = $_FILES['folder'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            // $config['allowed_types'] = 'zip|rar';
            $config['allowed_types'] = 'zip|rar';
            // $config['max_size'] = '2048';
            $config['max_size'] = '500120'; // max_size in kb (500 MB) 
            $config['upload_path'] = './panel/assets/img/foto/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('folder')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/assets/img/foto/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('folder', $new_img);

                $zipfile =  './panel/assets/img/foto/' . $new_img;
                $newfolder = './panel/assets/img/foto/';

                $zip = new ZipArchive;
                if ($zip->open($zipfile) === TRUE) {
                    $zip->extractTo($newfolder);
                    $zip->close();
                    echo 'ok';
                } else {
                    echo 'failed';
                }
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }


        $data = [
            'folder' => $folder,
        ];

        if ($result_blangko == 0) {
            $this->db->insert('ab_blangko', $data);
            $message = array(
                'message' => '<div class="alert alert-success">Input data berhasil disimpan di database</div>',
            );
            $this->session->set_flashdata($message);
            redirect('siswa_qrcode/pictures');
        } else {
            $this->db->where('id_blangko', $id_blangko);
            $this->db->update('ab_blangko', $data);
            $message = array(
                'message' => '<div class="alert alert-success">Ubah data berhasil disimpan di database</div>',
            );
            $this->session->set_flashdata($message);
            redirect('siswa_qrcode/pictures');
        }
    }
}
