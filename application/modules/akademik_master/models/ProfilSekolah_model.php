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
        $this->db->select('s.*,p.*,k.*,c.*');
        $this->db->from('m_sekolah s');
        $this->db->join('m_provinsi p', 's.sekolah_provinsi_id = p.provinsi_id', 'left');
        $this->db->join('m_kota k', 's.sekolah_kota_id = k.kota_id', 'left');
        $this->db->join('m_kecamatan c', 's.sekolah_kecamatan_id = c.kecamatan_id', 'left');
        // $this->db->where('kd_sekolah', $this->session->kd_sekolah);
        $query = $this->db->get()->row_array();
        return $query;
    }
}
