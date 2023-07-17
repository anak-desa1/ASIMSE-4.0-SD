<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersiapanDepartemen_model extends CI_Model
{
    public function getDepartemen()
    {
        return $this->db->get('access_departemen')->result_array();
    }
}
