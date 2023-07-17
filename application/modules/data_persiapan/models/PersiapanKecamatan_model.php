<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersiapanKecamatan_model extends CI_Model
{
    public function getKecamatan()
    {
        $query = "SELECT `m_kecamatan`.*, `m_kota`.`kota`
                    FROM `m_kecamatan` JOIN `m_kota`
                    ON `m_kecamatan`.`kota_id` = `m_kota`.`kota_id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getKota()
    {
        return $this->db->get('m_kota')->result_array();
    }
}
