<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'Lm');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->berhasil_login) {
            redirect(base_url() . 'dashboard');
            return false;
        }
        $this->form_validation->set_rules('email_pegawai', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error-input">', '</div>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            $this->load->view('layout/login_header', $data);
            $this->load->view('login/login');
            $this->load->view('layout/login_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }

    public function out()
    {
        $user = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $nik = $user['nik'];       
        $is_online = 0;
        $this->db->set('is_online',$is_online );
        $this->db->where('nik', $nik);
        $this->db->update('pegawai');
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    private function _login()
    {
        $cek_login = $this->Lm->login();
        if ($cek_login == 'Berhasil Login') {
            redirect(base_url() . 'dashboard');
        } else {
            // redirect(base_url());
            $data['title'] = 'Login Page';
            $this->load->view('layout/login_header', $data);
            $this->load->view('login/login');
            $this->load->view('layout/login_footer');
        }
    }
}
