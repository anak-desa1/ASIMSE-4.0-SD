<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Presensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Presensi_model', 'ion_auth');
    }

    public function output_json($data, $encode = true)
    {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function data()
    {
        $this->output_json($this->Presensi_model->get_all_q($this->uri->segment(3)), false);
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Histori Absensi';
            $data['home'] = 'Presensi Siswa';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;

            // $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            // $data['tasm'] = $get_tasm['tahun'];
            // $data['ta'] = substr($data['tasm'], 0, 4);
            // $ta = substr($data['tasm'], 0, 4);

            $data['tampil'] = $this->ion_auth->get_tampil();
            $data['siswa'] = $this->ion_auth->get_siswarombel();
            // $data['kelas'] = $this->ion_auth->get_siswarombel($ta);
            // var_dump($data['siswa']);
            // die;


            $this->load->view('layout/header-top', $data);
            $this->load->view('siswa_presensi/presensi/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('siswa_presensi/presensi/presensi_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('siswa_presensi/presensi/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function messageAlert($type, $title)
    {
        $messageAlert = "
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
        Toast.fire({
            type: '" . $type . "',
            title: '" . $title . "'
        });
        ";
        return $messageAlert;
    }

    public function tabel($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $th_active = substr($data['tasm'], 0, 4);

        $data['tgl'] = $id;
        // var_dump($data['ta']);
        // die;
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        // $data['siswa'] =
        //     $this->db->select('a.*,b.rombel nm_kelas, c.th_active, c.nis,c.nama nm_siswa,d.nama_khd,e.nama_status')
        //     ->from('ab_presensi a')
        //     ->join('t_kelas_siswa b', 'a.id_siswa = b.id_siswa', 'left')
        //     ->join('m_siswa c', 'a.id_siswa = c.nis', 'left')
        //     ->join('ab_kehadiran d', 'a.id_khd = d.id_khd', 'left')
        //     ->join('ab_stts e', 'a.id_status = e.id_status', 'left')
        //     ->where(['a.tgl' => $id])
        //     ->where(['b.rombel' => $target])
        //     ->group_by('c.nama', 'ASC')
        //     ->get()->result_array();

        $data['kehadiran'] = $this->db->get_where('ab_kehadiran')->result_array();

        $data['siswa'] =
        $this->db->select('b.nis,b.nama nm_siswa')
            ->from('t_kelas_siswa a')          
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')                      
            ->where(['a.rombel' => $target])
            ->group_by('b.nama', 'ASC')
            ->get()->result_array();

        $data['absen'] =
               $this->db->select('a.*,b.rombel nm_kelas, c.th_active, c.nis,c.nama nm_siswa,d.nama_khd,e.nama_status')
            ->from('ab_presensi a')
            ->join('t_kelas_siswa b', 'a.id_siswa = b.id_siswa', 'left')
            ->join('m_siswa c', 'a.id_siswa = c.nis', 'left')
            ->join('ab_kehadiran d', 'a.id_khd = d.id_khd', 'left')
            ->join('ab_stts e', 'a.id_status = e.id_status', 'left')
            ->where(['a.tgl' => $id])
            ->where(['b.rombel' => $target])
            ->group_by('c.nama', 'ASC')
            ->get()->result_array();


        // var_dump($data['siswa']);
        // die;
        $this->load->view('siswa_presensi/presensi/presensi_list', $data);
    }

    public function absen_perbaikan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->ion_auth->absen_perbaikan();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil input dan update presensi ! </h5>
        </div>
        ');
        redirect('siswa_presensi/presensi');
    }


    public function read($id, $target)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Histori Absensi';
        $data['home'] = 'Presensi Siswa';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        // $presensi = $this->ion_auth->get_all_query($id);
        // $data = array(
        //     'presensi_data' => $presensi,
        // );

        $this->load->view('layout/header-top');
        $this->load->view('siswa_presensi/presensi/_css');
        $this->load->view('layout/header-bottom');
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('siswa_presensi/presensi/presensi_list', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('siswa_presensi/presensi/_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }


    public function create($id)
    {
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $user = $this->user;
        $data = array(
            'button' => 'Create',
            'action' => site_url('presensi/create_action'),
            'id_absen' => set_value('id_absen'),
            'id_karyawan' => set_value('id_karyawan'),
            'tgl' => set_value('tgl'),
            'jam_msk' => set_value('jam_msk'),
            'jam_klr' => set_value('jam_klr'),
            'id_khd' => set_value('id_khd'),
            'ket' => set_value('ket'),
            'id_status' => set_value('id_status'),
            'user' => $user,
            'users'     => $this->ion_auth->user()->row(),
        );
        $this->template->load('template/template', 'presensi/presensi_form_in', $data);
        return  $id;
    }

    public function create_action()
    {
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $this->_rules();
        $refer =  $this->agent->referrer();
        if ($this->agent->is_referral()) {
            $refer =  $this->agent->referrer();
        }
        $id = $this->input->post('id');
        $result = $this->Presensi_model->search_value($_POST['id_karyawan'], $id);
        $karyawan = $this->input->post('id_karyawan');
        if ($result != FALSE) {
            $data = array(
                'id_karyawan' => $result[0]->id_karyawan,
                'tgl' => date('Y-m-d'),
                'jam_msk' => $this->input->post('jam_msk', TRUE),
                'jam_klr' => $this->input->post('jam_klr', TRUE),
                'id_khd' => 1,
                'id_status' => 1,
            );
        } else {
            $this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'Data Anggota tidak ditemukan'));
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        }
        $result_tgl = $data['tgl'];
        $result_id = $result[0]->id_karyawan;
        $cek_absen = $this->Presensi_model->cek_id($result_id, $result_tgl);
        if ($cek_absen !== FALSE  && $cek_absen->num_rows() == 1) {
            $this->session->set_flashdata('messageAlert', $this->messageAlert('warning', 'Nama Anggota Sudah diabsen'));
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        } else {
            $kar_result = $result[0]->id_karyawan;
            if ($kar_result == NULL || $karyawan == "") {
                $this->session->set_flashdata('messageAlert', $this->messageAlert('Error', 'Data tidak ditemukan'));
                redirect($_SERVER['HTTP_REFERER']);
                return false;
            } else {
                $tgl = date('Y-m-d');
                $id_krywn = $data['id_karyawan'];
                $this->Presensi_model->insert($data);
                $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menambahkan data presensi'));
                $referred_from = $this->session->userdata('referred_from');
                redirect($referred_from, 'refresh');
            }
        }
    }

    public function update($id)
    {
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $user = $this->user;
        $row = $this->Presensi_model->get_by_ids($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('presensi/update_action'),
                'id_absen' => set_value('id_absen', $row->id_absen),
                'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
                'nama_karyawan' => set_value('nama_karyawan', $row->nama_karyawan),
                'tgl' => set_value('tgl', $row->tgl),
                'jam_msk' => set_value('jam_msk', $row->jam_msk),
                'jam_klr' => set_value('jam_klr', $row->jam_klr),
                'id_khd' => set_value('id_khd', $row->id_khd),
                'gedung_id' =>  $row->gedung_id,
                'ket' => set_value('ket', $row->ket),
                'id_status' => set_value('id_status', $row->ket),
                'user' => $user, 'users'     => $this->ion_auth->user()->row(),
            );
            $this->template->load('template/template', 'presensi/presensi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('presensi'));
        }
    }

    public function update_action()
    {
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_absen', TRUE));
        } else {
            $row = $this->input->post('id_absen');
            $cek_id = $this->Presensi_model->get_by_ids($row);
            if ($cek_id->id_khd == 1) {
                $data = array(
                    'id_karyawan' => $this->input->post('id_karyawan', TRUE),
                    'tgl' => $this->input->post('tgl', TRUE),
                    'jam_msk' => $this->input->post('jam_msk', TRUE),
                    'jam_klr' => $this->input->post('jam_klr', TRUE),
                    'id_khd' => $this->input->post('id_khd', TRUE),
                    'ket' => $this->input->post('ket', TRUE),
                    'id_status' => 2,
                );
            } else {
                $data = array(
                    'id_karyawan' => $this->input->post('id_karyawan', TRUE),
                    'tgl' => $this->input->post('tgl', TRUE),
                    'jam_msk' => $this->input->post('jam_msk', TRUE),
                    'jam_klr' => $this->input->post('jam_klr', TRUE),
                    'id_khd' => $this->input->post('id_khd', TRUE),
                    'ket' => $this->input->post('ket', TRUE),
                    'id_status' => 3,
                );
            }
            $this->Presensi_model->update($this->input->post('id_absen', TRUE), $data);
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil merubah data presensi'));
            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from, 'refresh');
        }
    }

    public function delete($id)
    {
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $row = $this->Presensi_model->get_by_id($id);
        if ($row) {
            $this->Presensi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('presensi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('presensi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('id_khd', 'id khd', 'trim|required');
        $this->form_validation->set_rules('id_absen', 'id_absen', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function get_autocomplete($id)
    {
        if (isset($_GET['term'])) {
            $result = $this->Presensi_model->search_value($_GET['term'], $id);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'            => $row->nama_karyawan,
                    );
                echo json_encode($arr_result);
            }
        }
    }
}
