<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_tinggi_berat_model extends CI_Model

{
    // proses absensi
    // index
    public function get_kelas()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

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

    public function get_siswa_tampil()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('a.*, b.nis, b.nama, a.tinggi, a.berat')
            ->from('t_tinggi_berat a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
            ->join('t_kelas_siswa c', 'a.id_siswa  = c.id_siswa ', 'left')
            ->join('t_walikelas d', 'c.rombel = d.id_kelas', 'left')
            ->where(['d.id_guru' => $this->session->userdata('nik')])
            ->where(['a.tasm' => $tasm])
            ->where(['c.ta' => $tahun])
            ->where(['d.tasm' => $tahun])
            ->get()->result_array();
        return $bagidata;
    }
    // end index
    // tambah
    public function get_siswa_add()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $result = $this->db->get_where('t_tinggi_berat', ['tasm' =>  $tasm])->row_array();
        if ($result == 0) {
            $bagidata =
                $this->db->select('a.*, b.nis, b.nama, d.tinggi, d.berat')
                ->from('t_kelas_siswa a')
                ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
                ->join('t_tinggi_berat d', 'a.id_siswa = d.id_siswa', 'left')
                ->join('t_walikelas e', 'a.rombel = e.id_kelas', 'left')
                ->where(['e.id_guru' => $this->session->userdata('nik')])
                ->where(['a.ta' => $tahun])
                ->where(['e.tasm' => $tahun])
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('a.*, b.nis, b.nama, d.tinggi, d.berat')
                ->from('t_kelas_siswa a')
                ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
                ->join('t_tinggi_berat d', 'a.id_siswa = d.id_siswa', 'left')
                ->join('t_walikelas e', 'a.rombel = e.id_kelas', 'left')
                ->where(['e.id_guru' => $this->session->userdata('nik')])
                // ->where(['d.tasm' => $tasm])
                ->where(['a.ta' => $tahun])
                ->where(['e.tasm' => $tahun])
                ->get()->result_array();
            return $bagidata;
        }
    }
    // end tambah
    // simpan
    public function tinggi_berat_simpan()
    {
        $id_siswa = $this->input->post('id_siswa');
        $tinggi = $this->input->post('tinggi');
        $berat = $this->input->post('berat');

        $p = $this->input->post();

        for ($val = 0; $val < count($id_siswa); $val++) {
            $data = [
                "id_siswa" => $id_siswa[$val],
                "tasm" => $p['tasm'],
                "tinggi" => $tinggi[$val],
                "berat" => $berat[$val],
                "semester" => $p['semester'],
            ];

            $result = $this->db->get_where('t_tinggi_berat', ['id_siswa' => $id_siswa[$val], "tasm" => $p['tasm']])->row_array();
            if ($result == 0) {
                $this->db->insert('t_tinggi_berat', $data);
            } else {
                $this->db->where('id', $result['id']);
                $this->db->update('t_tinggi_berat', $data);
            }
        }
    }

    // end simpan
}
