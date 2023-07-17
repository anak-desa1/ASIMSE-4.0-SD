<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilSekolah_model extends CI_Model
{

    function get_all_provinsi()
    {
        $this->db->select('*');
        $this->db->from('m_provinsi');
        $query = $this->db->get();

        return $query->result();
    }

    function get_lokasi()
    {
        $this->db->select('*');
        $this->db->from('m_sekolah');
        $this->db->join('m_provinsi', 'sekolah_provinsi_id = provinsi_id', 'left');
        $this->db->join('m_kota', 'sekolah_kota_id = kota_id', 'left');
        $this->db->join('m_kecamatan', 'sekolah_kecamatan_id = kecamatan_id', 'left');
        $query = $this->db->get()->row_array();
        return $query;
    }
}
