<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersiapanSekolah_model extends CI_Model
{
    public function getLSekolah()
    {
        return $this->db->get('l_sekolah')->result_array();
    }

    public function getSekolah()
    {
        $query = "SELECT `l_sekolah`.*, `l_campus`.`nama_campus`
                    FROM `l_sekolah` JOIN `l_campus`
                    ON `l_sekolah`.`kd_campus` = `l_campus`.`kd_campus`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getLCampus()
    {
        return $this->db->get('l_campus')->result_array();
    }
}
