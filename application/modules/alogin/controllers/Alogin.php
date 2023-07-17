<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Alogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login_m', 'login');
    }


    public function index()
    {
        if ($this->session->userdata('no_daftar')) {
            redirect('auser');
        }

        $data['title'] = 'Login';

        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['kontak'] = $this->db->get_where('ppdb_kontak', ['status' => 1])->result_array();

        $data['sekolah'] = $this->login->sekolah();

        $this->form_validation->set_rules('no_daftar', 'No Pendaftaran', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            //css for this page only
            $this->load->view('template/_css', $data);
            //======== end               
            $this->load->view('login_v', $data);
            // js for this page only
            $this->load->view('template/_js');
            //========= end
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $no_daftar  = $this->input->post('no_daftar');
        $password = $this->input->post('password');

        $user = $this->db->get_where('ppdb_daftar', ['no_daftar' => $no_daftar])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_daftar' => $user['id_daftar'],
                        'no_daftar' => $user['no_daftar'],
                        'kd_sekolah' => $user['kd_sekolah'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['is_active'] == 1) {
                        redirect('auser');
                    } else {
                        redirect('ainformasi/ppdb');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Salah Password!</div>');
                    redirect('ainformasi/ppdb');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">No Pendaftaran belum aktif!</div>');
                redirect('ainformasi/ppdb');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">No Pendaftaran belum terdaftar!</div>');
            redirect('ainformasi/ppdb');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('no_daftar');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('ainformasi/ppdb');
    }


    public function blocked()
    {
        $this->load->view('alogin/blocked');
    }
}
