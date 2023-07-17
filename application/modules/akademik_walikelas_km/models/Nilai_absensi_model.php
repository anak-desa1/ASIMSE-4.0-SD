<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_absensi_model extends CI_Model


{    // proses absensi
    // index
    public function get_kelas()

    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        // $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap,w.tasm')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('pegawai_data pd', 'w.id_guru = pd.nik', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.ta' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->get()->row_array();

        return $bagidata;
    }


    public function get_siswa()

    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        // $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.ta' => $tahun])
            ->where(['s.th_active' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_absen_tampil()

    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('b.nis, b.nama, a.*')
            ->from('t_nilai_absensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
            ->join('t_kelas_siswa c', 'a.id_siswa  = c.id_siswa ', 'left')
            ->join('t_walikelas d', 'c.rombel = d.id_kelas', 'left')
            ->where(['d.id_guru' => $this->session->userdata('nik')])
            ->where(['b.th_active' => $tahun])
            ->where(['c.ta' => $tahun])
            ->where(['d.tasm' => $tahun])
            ->where(['a.tasm' => $tasm])
            ->get()->result_array();

        return $bagidata;
    }
    // end index

    // tambah

    public function get_absen_add_pts()

    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $result = $this->db->get_where('t_nilai_absensi', ["penilaian" => 'PTS', 'tasm' =>  $tasm])->row_array();
        if ($result['s'] == 0 || $result['i'] == 0 || $result['a'] == 0) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_nilai_absensi na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.ta' => $tahun])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('k.*,s.nama,s.nis')
                ->from('t_nilai_absensi k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_kelas_siswa b', 'k.id_siswa = b.id_siswa', 'left')
                ->join('t_walikelas w', 'b.rombel = w.id_kelas', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.penilaian' => 'PTS'])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->where(['k.tasm' => $tasm])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();

            return $bagidata;
        }
    }


    public function get_absen_add_pas()

    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $result = $this->db->get_where('t_nilai_absensi', ["penilaian" => 'PAS', 'tasm' =>  $tasm])->row_array();
        if ($result['s'] == 0 || $result['i'] == 0 || $result['a'] == 0) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_nilai_absensi na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.ta' => $tahun])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('k.*,s.nama,s.nis')
                ->from('t_nilai_absensi k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_kelas_siswa b', 'k.id_siswa = b.id_siswa', 'left')
                ->join('t_walikelas w', 'b.rombel = w.id_kelas', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.penilaian' => 'PAS'])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->where(['k.tasm' => $tasm])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();

            return $bagidata;
        }
    }

    // end tambah

    // simpan

    public function absen_simpan_pts()

    {

        $id_siswa = $this->input->post('id_siswa');
        $s = $this->input->post('s');
        $i = $this->input->post('i');
        $a = $this->input->post('a');
        $p = $this->input->post();

        for ($val = 0; $val < count($id_siswa); $val++) {

            $data = [
                "id_siswa" => $id_siswa[$val],
                "tasm" => $p['tasm'],
                "s" => $s[$val],
                "i" => $i[$val],
                "a" => $a[$val],
                "penilaian" => 'PTS',

            ];

            $result = $this->db->get_where('t_nilai_absensi', ['id_siswa' => $id_siswa[$val], "tasm" => $p['tasm'], "penilaian" => 'PTS',])->row_array();
            if ($result == 0) {
                $this->db->insert('t_nilai_absensi', $data);
            } else {
                $this->db->where('id', $result['id']);
                $this->db->update('t_nilai_absensi', $data);
            }
        }
    }



    public function absen_simpan_pas()

    {

        $id_siswa = $this->input->post('id_siswa');
        $s = $this->input->post('s');
        $i = $this->input->post('i');
        $a = $this->input->post('a');
        $p = $this->input->post();

        for ($val = 0; $val < count($id_siswa); $val++) {
            $data = [
                "id_siswa" => $id_siswa[$val],
                "tasm" => $p['tasm'],
                "s" => $s[$val],
                "i" => $i[$val],
                "a" => $a[$val],
                "penilaian" => 'PAS',

            ];


            $result = $this->db->get_where('t_nilai_absensi', ['id_siswa' => $id_siswa[$val], "tasm" => $p['tasm'], "penilaian" => 'PAS',])->row_array();
            if ($result == 0) {
                $this->db->insert('t_nilai_absensi', $data);
            } else {
                $this->db->where('id', $result['id']);
                $this->db->update('t_nilai_absensi', $data);
            }
        }
    }

    // end simpan

}
