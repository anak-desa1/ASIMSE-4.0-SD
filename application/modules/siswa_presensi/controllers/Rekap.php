<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekap extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Rekap_model', 'ion_auth');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Rekap Absensi';
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
            // $data['siswa'] = $this->ion_auth->get_siswarombel();
            $data['kelas'] = $this->ion_auth->get_siswarombel();

            $this->load->view('layout/header-top', $data);
            $this->load->view('siswa_presensi/rekap/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('siswa_presensi/rekap/rekap_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('siswa_presensi/rekap/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tabel($id, $tgl, $target)
    {

        $date1 = date_create($id);
        $date2 = date_create($tgl);
        $diff = date_diff($date1, $date2);
        $realDiff = $diff->format("%R%a") + 1;
        if ($realDiff < 32) {            
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

            $siswa =
                $this->db->select('a.*,c.tingkat nm_kelas,c.th_active,c.jk, c.nis,c.nama nm_siswa,d.nama_khd,e.nama_status')
                ->from('ab_presensi a')   
                ->join('t_kelas_siswa b', 'a.id_siswa = b.id_siswa', 'left')           
                ->join('m_siswa c', 'a.id_siswa = c.nis', 'left')
                ->join('ab_kehadiran d', 'a.id_khd = d.id_khd', 'left')
                ->join('ab_stts e', 'a.id_status = e.id_status', 'left')
                ->where('a.tgl >=', $id)->where('a.tgl <=', $tgl)               
                ->where(['b.rombel' => $target])
                ->group_by('c.nama', 'ASC')
                ->get()->result_array();            

            $presensi =
                $this->db->select('a.*,c.tingkat nm_kelas,c.jk, c.nis,c.nama nm_siswa,d.nama_khd,e.nama_status')
                ->from('ab_presensi a')       
                ->join('t_kelas_siswa b', 'a.id_siswa = b.id_siswa', 'left')        
                ->join('m_siswa c', 'a.id_siswa = c.nis', 'left')
                ->join('ab_kehadiran d', 'a.id_khd = d.id_khd', 'left')
                ->join('ab_stts e', 'a.id_status = e.id_status', 'left')
                ->where('a.tgl >=', $id)->where('a.tgl <=', $tgl)
                ->where(['b.rombel' => $target])
                ->order_by('c.nama', 'ASC')
                ->get()->result_array();
            //var_dump($presensi);
            // die;

            // $ta = substr($get_tasm['tahun'], 0, 4) . "/" . (substr($get_tasm['tahun'], 0, 4) + 1);
            // $sm = substr($get_tasm['tahun'], 4, 1);

            $html = '<div class="table-responsive">' ;

            $html .= '
                <table class="table">
                    <tr>         
                        <th colspan="3">Semester </th>
                        <th colspan="3">: 0</th>
                        <th colspan="8">Tahun Pelajaran</th>
                        <th colspan="3">: 0</th>
                    </tr>
                    <tr>
                        <th colspan="40" style="text-align: center; vertical-align: middle;">Absensi</th>
                    </tr>          
                    <tr>
                        <td rowspan="2" width="2%" style="text-align: center; vertical-align: middle;">No</td>
                        <td rowspan="2" width="22%" style="text-align: center; vertical-align: middle;">Nama</td>
                        <td rowspan="2" width="4%" style="text-align: center; vertical-align: middle;">JK</td>
                        <td colspan="31" style="text-align: center; vertical-align: middle;">Tanggal Kehadiran</td>
                        <td colspan="8" width="2%" style="text-align: center; vertical-align: middle;">Keterangan</td>
                    </tr>
                    <tr style="height: 60px">';
            for ($i = 1; $i <= $realDiff; $i++) {
                $html .= '<td width="2.5%">' . $i . '</td>';
            }

            $html .= '<td width="2.5%" class="ctr">M</td><td width="2.5%" class="ctr">S</td><td width="2.5%" class="ctr">I</td><td width="2.5%" class="ctr">A</td></tr>';
            if (!empty($siswa)) {
                $no = 1;
                foreach ($siswa as $siswa) {
                    $cars = $siswa['id_khd'];
                    $m = 0;
                    $s = 0;
                    $ij = 0;
                    $al = 0;
                    $html .= '<tr><td class="ctr">' . ($no++) . '</td><td>' .  $siswa['nm_siswa'] . '</td><td class="ctr">' . $siswa['jk'] . '</td>';
                    for ($i = 1; $i <= $realDiff; $i++) {
                        $l = 1;

                        $kl = false;
                        foreach ($presensi as $pres) {
                            $timestamp = strtotime($pres['tgl']);
                            $day = date('d', $timestamp);
                            if ($day == $i  &&  $siswa['id_siswa'] == $pres['id_siswa'] &&  $pres['id_khd'] == 1) {
                                $html .= '<td class="ctr">' . 1 . '</td>';
                                $l = true;
                                $m++;
                                break;
                            }
                            if ($day == $i  &&  $siswa['id_siswa'] == $pres['id_siswa'] &&  $pres['id_khd'] == 2) {
                                $s++;
                            }
                            if ($day == $i  &&  $siswa['id_siswa'] == $pres['id_siswa'] &&  $pres['id_khd'] == 3) {
                                $ij++;
                            }
                            if ($day == $i  &&  $siswa['id_siswa'] == $pres['id_siswa'] &&  $pres['id_khd'] == 4) {
                                $al++;
                            }
                            if ($l == count($presensi) && $kl == false) {
                                $html .= '<td class="ctr">' . 0 . '</td>';
                            }
                            $l++;
                        }
                        //var_dump($day);
                    }
                    $html .= '<td>' . $m . '</td><td>' . $s . '</td><td>' . $ij . '</td><td>' . $al . '</td><td></td></tr>';
                }
            }

            $html .= '<table class="tablef" style="margin-top: 10px">
                <tr>
                <td width="15%"></td>
                <td width="25%">
                Mengetahui,<br>
                ' . '' . '<br><br><br><br>
                ' . '' . '<br>
                NIP. ' . '' . '
                </td>
                <td width="25%"></td>
                <td width="25%">
                Guru Mata Pelajaran,<br>
                <br><br><br><br>
                ' . '' . '<br>
                NIP. ' . '' . '
                </td>
                </tr>
                </table>
                </div>';

            $this->d['html'] = $html;
            $this->load->view('siswa_presensi/rekap/rekap_list', $this->d);
        } else {
            echo "Tidak Boleh Lebih dari 30 Hari";
        }
    }

    public function ajax_list()
    {
        $list = $this->rekap->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $gedung) {
            $no++;
            $row = array();
            $row[]  =  $gedung->nama_gedung;
            $row[] = $gedung->alamat;
            $row[] =
                '
        <a class="btn btn-lg btn-info btn3d" href="#" title="Rekap Absensi" onclick="absen(' . "'" . $gedung->gedung_id . "'" . ')"><i class="fa fa-check-square"></i> Absensi</a>
        <a class="btn btn-lg btn-primary btn3d" href="#" title="Laporan" onclick="laporan(' . "'" . $gedung->gedung_id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Laporan</a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->rekap->count_all(),
            "recordsFiltered" => $this->rekap->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function ajax_list_modal($id)
    {
        $id_karyawan = $this->input->get('id_karyawan');
        $start = $this->input->get('tgl');
        $end = $this->input->get('tgl');
        $id_shift = $this->input->get('id_shift');
        $data['segment'] = $id;
        $data['colspan'] = $this->rekap->jmlHadir($segment = $this->uri->segment(3), $start, $end);
        $data['gedung'] =  $this->gedung->get_by_id($segment = $this->uri->segment(3));
        $data['start'] = $this->input->get('tgl');
        $data['end'] = $this->input->get('tgl');
        $data['id_shift'] = $this->input->get('id_shift');
        $data['resultHadir'] =   $this->rekap->resultHadir2($segment, $start, $end);
        $data['data'] = $this->rekap->resultHadir2($segment, $start, $end);
        $startdate = $this->input->get('start');
        $st = date('Y-m-d', strtotime($startdate));
        $t = explode('-', $st);
        $bulan = $this->tanggal->bulan($t[1]);
        $data['periode'] = $bulan . '&nbsp' . $t[0];
        $id_khd['id_khd'] = set_value('id_khd');
        $result = array(
            $this->rekap->karyawan_bak2($id, $start, $end),
        );
        $this->load->view("rekap/modalAbsen", $data, $id_khd, $result);
    }

    public function ajax_list_laporan($id)
    {
        $user = $this->user;
        $data['user'] = $user;
        $start = $this->input->get('tgl');
        $end = $this->input->get('tgl');
        $data['segment'] = $id;
        $this->load->view("rekap/ModalLaporan", $data, $start, $end);
    }

    public function ajax_list_modal2($id)
    {

        $id_karyawan = $this->input->get('id_karyawan');
        $start = $this->input->get('tgl');
        $end = $this->input->get('tgl');
        $id_shift = $this->input->get('$id_shift');
        $data['segment'] = $id;
        $data['id_khd'] = set_value('id_khd');
        $data['colspan'] = $this->rekap->jmlHadir($segment = $this->uri->segment(3), $start, $end);
        $data['gedung'] =  $this->gedung->get_by_id($segment = $this->uri->segment(3));
        $data['start'] = $this->input->get('tgl');
        $data['end'] = $this->input->get('tgl');
        $data['id_shift'] = $this->input->get('id_shift');
        $data['resultHadir2'] = $this->rekap->karyawan_bak3($segment, $start, $end, $id_shift);
        $startdate = $this->input->get('start');
        $st = date('Y-m-d', strtotime($startdate));
        $t = explode('-', $st);
        $bulan = $this->tanggal->bulan($t[1]);
        $data['periode'] = $bulan . '&nbsp' . $t[0];
        $result = array(
            $this->rekap->karyawan_bak3($id, $start, $end, $id_shift),
        );
        $this->load->view("rekap/modalAbsen", $data, $result);
    }

    function addkhd()
    {
        $data = $this->rekap->update_khd();
    }
}
