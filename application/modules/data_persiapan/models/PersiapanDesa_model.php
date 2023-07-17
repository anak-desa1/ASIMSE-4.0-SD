<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersiapanDesa_model extends CI_Model
{
    public function getDesa()
    {
        $query = "SELECT `m_desa`.*, `m_kecamatan`.`kecamatan`
                    FROM `m_desa` JOIN `m_kecamatan`
                    ON `m_desa`.`kecamatan_id` = `m_kecamatan`.`kecamatan_id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getKecamatan()
    {
        return $this->db->get('m_kecamatan')->result_array();
    }
}
