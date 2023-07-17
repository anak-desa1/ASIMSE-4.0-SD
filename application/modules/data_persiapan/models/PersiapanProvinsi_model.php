<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersiapanProvinsi_model extends CI_Model
{
    public function getProvinsi()
    {
        return $this->db->get('m_provinsi')->result_array();
    }
}
