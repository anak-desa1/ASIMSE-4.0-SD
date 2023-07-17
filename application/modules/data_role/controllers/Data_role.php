<?php
ob_start();
// session_start();   
error_reporting(E_ALL & ~E_NOTICE);

defined('BASEPATH') or exit('No direct script access allowed');
// ob_start();
// session_start();

class Data_role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('DataRole_model', 'role');
    }

    // Rolle
    public function index()
    {
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Role';
            $data['home'] = 'Custom';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->role->sekolah();
            $data['role'] = $this->db->get('pegawai_role')->result_array();

            $this->load->view('layout/header-top', $data);
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('data_role/role', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
            $role = $this->input->post('role', true);
            $data = [
                'role' => $role,
            ];
            $this->db->insert('pegawai_role', $data);
            redirect('data_role');
        }
    }

    public function delrole($role_id)
    {
        $data = ['id' => $role_id];
        $this->db->delete('pegawai_role', $data);
        redirect('data_role');
    }

    public function editrole()
    {
        $id = $this->input->post('ed_id', true);
        $role = $this->input->post('ed_role', true);
        $data = [
            'role' => $role
        ];
        $this->db->where('id', $id);
        $this->db->update('pegawai_role', $data);
        redirect('data_role');
    }

    public function checkaccess()
    {
        //echo "checked='checked'";
        $role_id = $this->input->post('role_id');
        $menu_id = $this->input->post('menu_id');
        $data = ['role_id' => $role_id, 'menu_id' => $menu_id];
        $result = $this->db->get_where('pegawai_access_menu', $data);
        if ($result->num_rows() > 0) {
            echo "checked='checked'";
        }
    }

    public function roleAccess($role_id)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Akses';
        $data['home'] = 'Custom';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        // $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['role'] = $this->db->get_where('pegawai_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 0);
        $data['menu'] = $this->db->get('pegawai_menu')->result_array();

        $this->load->view('layout/header-top', $data);
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('data_role/role-access', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('pegawai_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('pegawai_access_menu', $data);
        } else {
            $this->db->delete('pegawai_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
}
