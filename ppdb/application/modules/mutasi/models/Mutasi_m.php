<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mutasi_m extends CI_Model
{

    public function getAllKampus()
    {
        return $this->db->get_where('l_campus', ['is_active' => 1])->result_array();
    }

    public function getAllJenis()
    {
        return $this->db->get_where('ppdb_jenis', ['status' => 1])->result_array();
    }

    public function getAllPeriode()
    {
        return $this->db->get_where('ppdb_periode', ['is_active' => 1])->result_array();
    }

    public function getAsalSekolah()
    {
        return $this->db->get_where('ppdb_sekolah', ['status' => 1])->result_array();
    }

    public function getId()
    {
        $bagidata =
            $this->db->select_max('id_daftar')
            ->from('ppdb_daftar')
            ->get()->row_array();
        return $bagidata;
    }

    public function yayasan()
    {
        $sekolah = $this->db->select('a.*,b.provinsi,c.kota')
            ->from('m_yaysan a')
            ->join('m_provinsi b', 'a.pro_id = b.provinsi_id')
            ->join('m_kota c', 'a.kot_id = c.kota_id')
            ->get()->row_array();
        return $sekolah;
    }
}
