<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kesiswaan_model extends CI_Model
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

    function profil_osis()
    {
        $this->db->select('*');
        $this->db->from('profil_osis');
        $this->db->where(['status' => 1]);
        $this->db->order_by('osis_id', 'DESC');
        $this->db->limit(6);
        $hasil = $this->db->get();
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    function profil_ekstra()
    {
        $this->db->select('*');
        $this->db->from('profil_ekstra');
        $this->db->where(['status' => 1]);
        $this->db->order_by('ekstra_id', 'DESC');
        $this->db->limit(6);
        $hasil = $this->db->get();
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    function profil_prestasi()
    {
        $this->db->select('*');
        $this->db->from('profil_prestasi');
        $this->db->where(['status' => 1]);
        $this->db->order_by('prestasi_id', 'DESC');
        $this->db->limit(6);
        $hasil = $this->db->get();
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }
}
