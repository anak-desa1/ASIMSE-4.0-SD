<?php
//cek login
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email_pegawai')) {
        redirect(base_url());
    } else {
    }
}

if (!function_exists('cek_aktif_login')) {
    function cek_aktif_login()
    {
        $ci = get_instance();
        if (!$ci->session->berhasil_login) {
            redirect(base_url());
        }
    }
}
//cek akses
function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('pegawai_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
// cek menu
function main_menu()
{
    $ad = get_instance();
    $role_id = $ad->session->userdata('role_id');
    $queryMenu = "  SELECT `pegawai_menu`.*
                    FROM `pegawai_menu` JOIN `pegawai_access_menu`
                    ON `pegawai_menu`.`id` = `pegawai_access_menu`.`menu_id`
                    WHERE `pegawai_access_menu`.`role_id` = $role_id
                    ORDER BY `pegawai_access_menu`.`menu_id` ASC ";
    $main_menu = $ad->db->query($queryMenu)->result_array();
    return $main_menu;
}
// cek sub menu
function sub_menu()
{
    $ci = get_instance();
    $query = "SELECT `pegawai_sub_menu`.*, `pegawai_menu`.`nama_menu`
                    FROM `pegawai_sub_menu` JOIN `pegawai_menu`
                    ON `pegawai_sub_menu`.`menu_id` = `pegawai_menu`.`id`
        ";
    return $ci->db->query($query)->result_array();
}

function getSubMenu()
{
    $ci = get_instance();
    $query = "SELECT `pegawai_sub_menu`.*, `pegawai_menu`.`nama_menu`
                    FROM `pegawai_sub_menu` JOIN `pegawai_menu`
                    ON `pegawai_sub_menu`.`menu_id` = `pegawai_menu`.`id`
        ";
    return $ci->db->query($query)->result_array();
}

if (!function_exists('cek_akses_user')) {
    function cek_akses_user()
    {
        $ci = get_instance();
        $cek = $ci->db->select('*')
            ->from('pegawai_access_menu a')
            ->join('pegawai_sub_menu m', 'm.menu_id = a.menu_id', 'left')
            ->where(['a.role_id' => $ci->session->role_id, 'a.role_id' => '1'])
            ->get()->row_array();
        if (!$cek) {
            redirect(base_url('unauthorized'));
        } else {
            if ($cek['role_id'] != 1) {
                redirect(base_url('unauthorized'));
            } else {
                return $cek;
            }
        }
    }
}
// end menu
// csrf token
if (!function_exists('get_csrf_token')) {
    function get_csrf_token()
    {
        $ad = get_instance();
        if (!$ad->session->csrf_token) {
            $ad->session->csrf_token = hash('sha1', time());
        }
        return $ad->session->csrf_token;
    }
}

if (!function_exists('get_csrf_name')) {
    function get_csrf_name()
    {
        return "ad_x";
    }
}
// csrf
function csrf()
{
    return "<input type='hidden' name='" . get_csrf_name() . "' value='" . get_csrf_token() . "'/>";
}
// cek_csrf
if (!function_exists('cek_csrf')) {
    function cek_csrf()
    {
        $ad = get_instance();
        if ($ad->input->post('ad_x') != $ad->session->csrf_token or !$ad->input->post('ad_x') or !$ad->session->csrf_token) {
            $ad->session->unset_userdata('csrf_token');
            $ad->output->set_status_header(403);
            show_error('Directory access is forbidden.');
            return false;
        }
    }
}
// endcsrf token
// cek data cuti
if (!function_exists('cek_post')) {
    function cek_post()
    {
        if (!count($_POST))
            redirect(base_url('unauthorized'));
    }
}

if (!function_exists('cek_ajax')) {
    function cek_ajax()
    {
        $ci = get_instance();
        if (!$ci->input->is_ajax_request()) {
            redirect(base_url('unauthorized'));
        }
    }
}

if (!function_exists('hash_password')) {
    function hash_password($pw = 'hash_pwd')
    {
        $st = '';
        for ($i = 0; $i < strlen($pw); $i++) {
            $st .= hash('sha256', substr($pw, $i, 1));
        }
        return hash('sha256', $st);
    }
}

if (!function_exists('hash_id')) {
    function hash_id($id = 'hash_id')
    {
        $st = '';
        for ($i = 0; $i < strlen($id); $i++) {
            $st .= hash('sha256', substr($id, $i, 1));
        }
        return hash('md5', $st);
    }
}

if (!function_exists('convert_date_to_en')) {
    function convert_date_to_en($tgl = '09-09-1988')
    {
        if (strlen($tgl) > 10) {
            $date = explode(' ', $tgl);
            return (explode('-', $date[0])[2] . '-' . explode('-', $date[0])[1] . '-' . explode('-', $date[0])[0]) . ' ' . $date[1];
        } else {
            return explode('-', $tgl)[2] . '-' . explode('-', $tgl)[1] . '-' . explode('-', $tgl)[0];
        }
    }
}

if (!function_exists('convert_date_to_id')) {
    function convert_date_to_id($tgl = '1988-09-09')
    {
        if (strlen($tgl) > 10) {
            $date = explode(' ', $tgl);
            return (explode('-', $date[0])[2] . '-' . explode('-', $date[0])[1] . '-' . explode('-', $date[0])[0]) . ' ' . $date[1];
        } else {
            return explode('-', $tgl)[2] . '-' . explode('-', $tgl)[1] . '-' . explode('-', $tgl)[0];
        }
    }
}

if (!function_exists('selisih_hari')) {
    function selisih_hari($date_1, $date_2, $differenceFormat = '%a')
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
        $interval = date_diff($datetime1, $datetime2);
        return $interval->format($differenceFormat);
    }
}

if (!function_exists('default_konfigurasi')) {
    function default_konfigurasi()
    {
        $ci = get_instance();
        return $ci->db->get('c_konfigurasi')->row();
    }
}

if (!function_exists('get_data_karyawan')) {
    function get_data_karyawan()
    {
        $ci = get_instance();
        return $ci->db->get_where('pegawai_data', ['email' => $ci->session->email_pegawai])->row();
    }
}

if (!function_exists('list_notifikasi')) {
    function list_notifikasi()
    {
        $ci = get_instance();
        return $ci->db->select('n.*,dk.nama_lengkap,dk.foto')
            ->from('c_notif n')
            ->join('pegawai_data dk', 'dk.email = n.email_client', 'left')
            ->where(['n.email_target' => $ci->session->email_pegawai, 'read' => 'N'])
            ->get()->result_array();
    }
}

if (!function_exists('hitung_waktu')) {
    function hitung_waktu($waktu = '2020-01-01 00:00:00')
    {
        return 'a';
    }
}
// end cek data cuti
// format tanggal
if (!function_exists('format_indo')) {
    function format_indo($date)
    {
        date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

        return $result;
    }
}

if (!function_exists('format_indo_a')) {
    function format_indo_a($date)
    {
        date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        // $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        // $hari = date("w", strtotime($date));
        $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

        return $result;
    }
}
// end format tanggal