<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Info_m extends CI_Model
{

    public function yayasan()
    {
        $sekolah = $this->db->select('a.*,b.provinsi,c.kota')
            ->from('m_yaysan a')
            ->join('m_provinsi b', 'a.pro_id = b.provinsi_id')
            ->join('m_kota c', 'a.kot_id = c.kota_id')
            ->get()->row_array();
        return $sekolah;
    }

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
}
