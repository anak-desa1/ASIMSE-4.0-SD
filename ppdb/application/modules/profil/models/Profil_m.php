<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Profil_m extends CI_Model
{

    public function yayasan()
    {
        $sekolah = $this->db->select('a.*,b.provinsi,c.kota,d.kecamatan')
            ->from('m_yaysan a')
            ->join('m_provinsi b', 'a.pro_id = b.provinsi_id')
            ->join('m_kota c', 'a.kot_id = c.kota_id')
            ->join('m_kecamatan d', 'a.kec_id = d.kecamatan_id', 'left')
            ->get()->row_array();
        return $sekolah;
    }

    function get_lokasi($id)
    {
        $this->db->select('s.*,p.*,k.*,c.*');
        $this->db->from('m_sekolah s');
        $this->db->join('m_provinsi p', 's.sekolah_provinsi_id = p.provinsi_id', 'left');
        $this->db->join('m_kota k', 's.sekolah_kota_id = k.kota_id', 'left');
        $this->db->join('m_kecamatan c', 's.sekolah_kecamatan_id = c.kecamatan_id', 'left');
        $this->db->where('sekolah_id', $id);
        $this->db->where('is_active_psb', 1);
        $query = $this->db->get()->result_array();
        return $query;
    }
}
