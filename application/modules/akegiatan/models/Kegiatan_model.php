<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
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

    function profil_belajar()
    {
        $this->db->select('*');
        $this->db->from('profil_belajar');
        $this->db->where(['status' => 1]);
        $this->db->order_by('belajar_id', 'DESC');
        $this->db->limit(6);
        $hasil = $this->db->get();
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    function profil_artikel()
    {
        $this->db->select('*');
        $this->db->from('profil_artikel');
        $this->db->where(['status' => 1]);
        $this->db->order_by('id_artikel', 'DESC');
        $this->db->limit(6);
        $hasil = $this->db->get();
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    function profil_artikel_detail($id)
    {
        $data =  $this->db->select('*')
            ->from('profil_artikel')
            ->where(['id_artikel' => $id])
            ->get()->row_array();
        return $data;
    }

    function profil_galeri()
    {
        $hasil = $this->db->select('*')
            ->from('profil_galeri')
            ->where(['status' => 1])
            ->order_by('id_galeri', 'DESC')
            ->limit(6)
            ->get()->result_array();
        return $hasil;
    }

    function profil_galeri_sub($id)
    {
        $data =  $this->db->select('*')
            ->from('profil_galeri_sub')
            ->where(['id_galeri' => $id])
            ->get()->result_array();
        return $data;
    }
}
