<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataSubmenu_model extends CI_Model
{

    public function getSubMenu()
    {
        $query = "SELECT `pegawai_sub_menu`.*, `pegawai_menu`.`nama_menu`
                    FROM `pegawai_sub_menu` JOIN `pegawai_menu`
                    ON `pegawai_sub_menu`.`menu_id` = `pegawai_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

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
}
