<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersiapanKelas_model extends CI_Model
{
    public function getLKelas()
    {
        return $this->db->get('l_kelas')->result_array();
    }

    public function getKelas()
    {
        $this->db->select('k.*');
        $this->db->from('l_kelas k');
        $query = $this->db->get();
        return $query;
    }
}
