<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_submenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('DataSubmenu_model', 'menu');
    }

    // sub menu
    public function index()
    {
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('judul_menu', 'Title', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('s_icon', 'Icon', 'required');
        $this->form_validation->set_rules('order_id', 'Order ID', 'required');
        $this->form_validation->set_rules('hide', 'Hide', 'required');
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Sub Menu';
            $data['home'] = 'Custom';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['sekolah'] = $this->menu->sekolah();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sub_menu'] = $this->menu->getSubMenu();
            $data['menu'] = $this->db->get('pegawai_menu')->result_array();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_submenu/submenu', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
            $data = [
                'menu_id' => $this->input->post('menu_id'),
                'judul_menu' => $this->input->post('judul_menu'),
                'url' => $this->input->post('url'),
                's_icon' => $this->input->post('s_icon'),
                'order_id' => $this->input->post('order_id'),
                'hide' => $this->input->post('hide'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('pegawai_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New Sub Menu Added!</div>');
            redirect('data_submenu');
        }
    }

    public function editsubmenu()
    {
        $id = $this->input->post('ed_id', true);
        $ed_menu = $this->input->post('ed_menu', true);
        $submenu = $this->input->post('ed_title', true);
        $ed_hide = $this->input->post('ed_hide', true);
        $ed_url = $this->input->post('ed_url', true);
        $ed_s_icon = $this->input->post('ed_s_icon', true);
        $is_active = $this->input->post('is_active', true);
        $ed_order_id = $this->input->post('ed_order_id', true);

        $data = [
            'menu_id' => $ed_menu,
            'judul_menu' => $submenu,
            'url' =>  $ed_url,
            's_icon' => $ed_s_icon,
            'is_active' => $is_active,
            'hide' => $ed_hide,
            'order_id' => $ed_order_id,
        ];
        $this->db->where('id', $id);
        $this->db->update('pegawai_sub_menu', $data);
        redirect('data_submenu');
    }

    public function delSubMenu($sub_menu_id)
    {
        $data = ['id' => $sub_menu_id];
        $this->db->delete('pegawai_sub_menu', $data);
        redirect('data_submenu');
    }
    //end submenu

}
