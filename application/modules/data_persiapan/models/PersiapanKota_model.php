<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersiapanKota_model extends CI_Model
{
    public function getProvinsi()
    {
        $query = "SELECT `m_kota`.*, `m_provinsi`.`provinsi`
                    FROM `m_kota` JOIN `m_provinsi`
                    ON `m_kota`.`provinsi_id` = `m_provinsi`.`provinsi_id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getKota()
    {
        return $this->db->get('m_kota')->result_array();
    }
}
