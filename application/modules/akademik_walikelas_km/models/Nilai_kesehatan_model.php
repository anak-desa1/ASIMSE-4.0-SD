<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_kesehatan_model extends CI_Model

{
    // Nilai_prestasi
    // index
    public function get_kelas()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('a.*, c.tasm, d.nama_lengkap')
            ->from('t_kelas_siswa a')
            ->join('t_walikelas c', 'a.rombel = c.id_kelas', 'left')
            ->join('pegawai_data d', 'c.id_guru = d.nik', 'left')
            ->where(['c.id_guru' => $this->session->userdata('nik')])
            ->where(['a.ta' => $tahun])
            ->where(['c.tasm' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_siswa()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('a.id_siswa, b.nama nmsiswa')
            ->from('t_kelas_siswa a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
            ->join('t_walikelas d', 'a.rombel = d.id_kelas', 'left')
            ->join('pegawai_data e', 'd.id_guru = e.nik', 'left')
            ->where(['d.id_guru' => $this->session->userdata('nik')])
            ->where(['a.ta' => $tahun])
            ->where(['d.tasm' => $tahun])
            ->get()->result_array();
        return $bagidata;
    }

    public function get_kesehatan_tampil()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('c.nama nmsiswa, a.aspek_fisik, a.keterangan')
            ->from('t_kesehatan a')
            ->join('t_kelas_siswa b', 'a.id_siswa = b.id_siswa', 'left')
            ->join('m_siswa c', 'b.id_siswa = c.nis', 'left')
            ->join('t_walikelas d', 'b.rombel = d.id_kelas', 'left')
            ->join('pegawai_data e', 'd.id_guru = e.nik', 'left')
            ->where(['d.id_guru' => $this->session->userdata('nik')])
            ->where(['b.ta' => $tahun])
            ->where(['d.tasm' => $tahun])
            ->get()->result_array();
        return $bagidata;
    }
    // end index
    // kesehatan

    public function get_siswa_kesehatan($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('a.id_siswa, b.nama nmsiswa, c.id')
            ->from('t_kelas_siswa a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
            ->join('t_kesehatan c', 'a.id_siswa = c.id_siswa', 'left')
            ->join('t_walikelas d', 'a.rombel = d.id_kelas', 'left')
            ->join('pegawai_data e', 'd.id_guru = e.nik', 'left')
            ->where(['d.id_guru' => $this->session->userdata('nik')])
            ->where(['a.id_siswa' => $id])
            ->where(['a.ta' => $tahun])
            ->where(['d.tasm' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_kesehatan($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('a.id,c.nama nmsiswa, a.aspek_fisik, a.keterangan')
            ->from('t_kesehatan a')
            ->join('t_kelas_siswa b', 'a.id_siswa = b.id_siswa', 'left')
            ->join('m_siswa c', 'b.id_siswa = c.nis', 'left')
            ->where(['a.id_siswa' => $id])
            ->where(['b.ta' => $tahun])
            ->where(['a.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }

    public function simpan_data()
    {
        $p = $this->input->post();
        $data = [
            "id_siswa" => $p['id_siswa'],
            "tasm" => $p['tasm'],
            "aspek_fisik" => $p['aspek_fisik'],
            "keterangan" => $p['keterangan'],
            "semester" => $p['semester'],
        ];
        $this->db->insert('t_kesehatan', $data);
    }
    // end prestasi

}
