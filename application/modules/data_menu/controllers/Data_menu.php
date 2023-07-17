<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('DataMenu_model', 'menu');
    }

    // menu
    public function index()
    {
        $this->form_validation->set_rules('nama_menu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'require');
        $this->form_validation->set_rules('m_icon', 'Icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Menu';
            $data['home'] = 'Custom';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['menu'] = $this->db->get('pegawai_menu')->result_array();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_menu/menu', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
            $data =
                [
                    'nama_menu' => $this->input->post('nama_menu'),
                    'url' => $this->input->post('url'),
                    'm_icon' => $this->input->post('m_icon'),
                ];
            var_dump($data);
            die;
            $this->db->insert('pegawai_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New Menu Added!</div>');
            redirect('data_menu');
        }
    }

    public function create_menu()
    {
        $this->form_validation->set_rules('nama_menu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'require');
        $this->form_validation->set_rules('m_icon', 'Icon', 'required');

        $data =
            [
                'nama_menu' => $this->input->post('nama_menu'),
                'url' => $this->input->post('url'),
                'm_icon' => $this->input->post('m_icon'),
            ];
        // var_dump($data);
        // die;
        $this->db->insert('pegawai_menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New Menu Added!</div>');
        redirect('data_menu');
    }

    public function delMenu($menu_id)
    {
        $data = ['id' => $menu_id];
        $this->db->delete('pegawai_menu', $data);
        redirect('data_menu');
    }

    public function editmenu()
    {
        $id = $this->input->post('ed_id', true);
        $nama = $this->input->post('ed_nama', true);
        $url = $this->input->post('ed_url', true);
        $m_icon = $this->input->post('ed_m_icon', true);
        $data = [
            'nama_menu' => $nama,
            'url' => $url,
            'm_icon' => $m_icon,
        ];
        $this->db->where('id', $id);
        $this->db->update('pegawai_menu', $data);
        redirect('data_menu');
    }
    // end menu
}
