<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
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

    public function getActive()
    {
        $bagidata =
            $this->db->select('')
            ->from('profil_slide')
            ->where(['slide_id' => 1])
            // ->order_by('slide_id', 'DESC')
            ->get()->row_array();
        return $bagidata;
    }

    function profil_slide()
    {
        $this->db->select('*');
        $this->db->from('profil_slide');
        $this->db->where(['status' => 1]);
        $this->db->order_by('slide_id', 'DESC');
        $this->db->limit(5);
        $hasil = $this->db->get();
        // return $query;
        // $hasil = $this->db->get('profil_slide');
        if ($hasil->num_rows() > 1) {
            return $hasil->result();
        } else {
            return array();
        }
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
}
