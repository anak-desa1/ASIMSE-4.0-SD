<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_model extends CI_Model
{

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
            $this->db->select('max(no_daftar) as maxKode')
            ->from('ppdb_daftar')
            ->get()->row_array();
        return $bagidata;
    }

    function get_vaksin($id)
    {
        $this->db->select('*');
        $this->db->from('m_vaksin');
        $this->db->where('nik', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    function get_lulus($id)
    {
        $this->db->select('*');
        $this->db->from('m_lulus');
        $this->db->where('nisn', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    function get_beasiswa($id)
    {
        $this->db->select('*');
        $this->db->from('m_beasiswa');
        $this->db->where('nis', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
}
