<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersiapanCampus_model extends CI_Model
{
    public function getLCampus()
    {
        return $this->db->get('l_campus')->result_array();
    }
}
