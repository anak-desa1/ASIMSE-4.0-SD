<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function login()
    {
        $email = $this->input->post('email_pegawai');
        $password = $this->input->post('password');
        $user = $this->db->get_where('pegawai', ['email_pegawai' => $email])->row_array();
        $nik = $user['nik'];
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'role_id' => $user['role_id'],
                        'kd_campus' => $user['kd_campus'],
                        'kd_sekolah' => $user['kd_sekolah'],
                        'email_pegawai' => $user['email_pegawai'],
                        'nik' => $user['nik'],
                    ];
                    $this->session->berhasil_login = true;
                    $this->session->set_userdata($data);
                    $is_online = 1;                   
                    $this->db->set('is_online',$is_online );
                    $this->db->where('nik', $nik);
                    $this->db->update('pegawai');
                    if ($user['role_id'] == 1) {
                        redirect('dashboard');
                    } else {
                        redirect('dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('login');
        }
    }

    public function _login()
    {
        $email = $this->input->post('email_pegawai', true);
        $password = $this->input->post('password', true);

        $cek = $this->db->get_where('pegawai', ['email_pegawai' => $email])->row_array();
        if ($cek) {
            if ($cek['blokir'] == '1') {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        User anda Terblokir!!, hubungi administrator..
                    </div>');
                return "Gagal Login";
                redirect(base_url());
            } else {
                $cek_password = $this->db->select('u.role_id,dk.*')->from('pegawai u')
                    ->join('pegawai_data dk', 'dk.email = u.email_pegawai', 'left')
                    ->where(['u.email_pegawai' => $cek['email_pegawai'], 'u.password' => hash_password($password)])->get()->row_array();
                if ($cek_password) {
                    // berhasil login == masuk bos ku neng kui
                    $this->session->berhasil_login = true;
                    $this->session->set_userdata([
                        'role_id' => $cek_password['role_id'],
                        'nama_lengkap' => $cek_password['nama_lengkap'],
                        'email_pegawai' => $cek_password['email_pegawai'],
                        'tgl_lahir' => $cek_password['tgl_lahir']
                    ]);

                    $this->db->where('email_pegawai', $cek['email_pegawai'])->update('pegawai', ['salah_password' => 0, 'last_login' => date('Y-m-d H:i:s')]);
                    return "Berhasil Login";
                    redirect(base_url() . 'dashboard');
                } else {
                    // salah password

                    $this->db->set('salah_password', 'salah_password + 1', false)
                        ->where('email_pegawai', $cek['email_pegawai'])->update('pegawai');
                    $sisa_kesempatan = 2 - $cek['salah_password'];

                    if ($cek['salah_password'] == 2) {
                        $this->db->where('email_pegawai', $cek['email_pegawai'])->update('pegawai', ['blokir' => '1']);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                            User anda Terblokir!!, hubungi administrator..
                        </div>');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Password salah, sisa kesempatan ' . $sisa_kesempatan . '. Silahkan coba lagi..
                    </div>');
                    }
                    return "Gagal Login";
                    redirect(base_url());
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Username atau password salah bro..
            </div>');
            return "Gagal Login";
            redirect(base_url());
        }
    }

    public function index_login()
    {
        return "tes2";
    }
}
