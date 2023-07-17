<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{

    public function list_level_user()
    {
        return $this->db->get('pegawai_role')->result_array();
    }

    public function sekolah()
    {
        $sekolah = $this->db->select('a.*,b.*,c.*,d.*')
            ->from('m_sekolah a')
            ->join('m_provinsi b', 'a.sekolah_provinsi_id = b.provinsi_id')
            ->join('m_kota c', 'a.sekolah_kota_id = c.kota_id')
            ->join('m_kecamatan d', 'a.sekolah_kecamatan_id = d.kecamatan_id', 'left')
            ->get()->row_array();
        return $sekolah;
    }

    public function Registrasi()
    {
        $sekolah = $this->db->select('*,COUNT(no_daftar) as total')
            ->from('ppdb_daftar')
            ->where(['is_active' => 1])
            ->get()->result_array();
        return $sekolah;
    }

    public function getDaftarDiterima()
    {
        $bagidata =
            $this->db->select('*,COUNT(no_daftar) as total')
            ->from('ppdb_daftar')
            ->where(['status' => 1])
            ->get()->result_array();
        return $bagidata;
    }

    public function getDaftarCadangan()
    {
        $bagidata =
            $this->db->select('*,COUNT(no_daftar) as total')
            ->from('ppdb_daftar')
            ->where(['status' => 2])
            ->get()->result_array();
        return $bagidata;
    }

    public function kuota()
    {
        $sekolah = $this->db->select('SUM(kuota) as total')
            ->from('ppdb_jurusan')
            ->where(['status' => 1])
            ->get()->result_array();
        return $sekolah;
    }

    public function transakasi()
    {
        $sekolah = $this->db->select('COUNT(id_daftar) as total')
            ->from('ppdb_bayar')
            ->where(['verifikasi' => 1])
            ->get()->result_array();
        return $sekolah;
    }

    public function online()
    {
        $sekolah = $this->db->select('*,COUNT(no_daftar) as total')
            ->from('ppdb_daftar')
            ->where(['online' => 1])
            ->get()->result_array();
        return $sekolah;
    }

    public function statistik_sekolah()
    {
        $sekolah = $this->db->select('*,COUNT(no_daftar) as total')
            ->from('ppdb_daftar')
            ->group_by('asal_sekolah')
            ->where(['is_active' => 1])
            ->get()->result_array();
        return $sekolah;
    }

    public function peminat_jml()
    {
        $sekolah = $this->db->select('COUNT(a.no_daftar) as total,b.id_jurusan,b.kuota')
            ->from('ppdb_daftar a')
            ->join('ppdb_jurusan b', 'b.id_jurusan = a.kelas', 'left')
            ->group_by('a.kelas')
            ->where(['a.is_active' => 1])
            ->get()->result_array();
        return $sekolah;
    }

    public function jml_sekolah()
    {
        $sekolah = $this->db->select('SUM(status) as total')
            ->from('ppdb_sekolah')
            ->get()->result_array();
        return $sekolah;
    }
}
