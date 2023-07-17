<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{

    public function getSekolah()
    {
        $sekolah = $this->db->select('a.*,b.*,c.*,d.*')
            ->from('m_sekolah a')
            ->join('m_provinsi b', 'a.sekolah_provinsi_id = b.provinsi_id')
            ->join('m_kota c', 'a.sekolah_kota_id = c.kota_id')
            ->join('m_kecamatan d', 'a.sekolah_kecamatan_id = d.kecamatan_id', 'left')
            ->where(['a.is_active'=>1])
            ->get()->row_array();
        return $sekolah;
    }

    // data tabel 
    public function EarlyBird()
    {
        $sekolah = $this->db->select('*,COUNT(no_daftar) as total')
            ->from('ppdb_daftar')
            ->group_by('periode')
            ->where(['is_active' => 1])
            ->where(['periode' => 'Early Bird'])
            ->get()->result_array();
        return $sekolah;
    }

    public function Gelombang_1()
    {
        $sekolah = $this->db->select('*,COUNT(no_daftar) as total')
            ->from('ppdb_daftar')
            ->group_by('periode')
            ->where(['is_active' => 1])
            ->where(['periode' => 'Gelombang 1'])
            ->get()->result_array();
        return $sekolah;
    }

    public function Gelombang_2()
    {
        $sekolah = $this->db->select('*,COUNT(no_daftar) as total')
            ->from('ppdb_daftar')
            ->group_by('periode')
            ->where(['is_active' => 1])
            ->where(['periode' => 'Gelombang 2'])
            ->get()->result_array();
        return $sekolah;
    }

    public function kuota()
    {
        $sekolah = $this->db->select('SUM(kuota) as total')
            ->from('ppdb_jurusan')
            ->where(['status' => 1])
            // ->group_by('kuota')
            ->get()->result_array();
        return $sekolah;
    }

    public function pendaftar()
    {
        $sekolah = $this->db->select('*,COUNT(no_daftar) as total')
            ->from('ppdb_daftar')
            ->group_by('asal_sekolah')
            ->where(['is_active' => 1])
            ->get()->result_array();
        return $sekolah;
    }
    // end data tabel
}
