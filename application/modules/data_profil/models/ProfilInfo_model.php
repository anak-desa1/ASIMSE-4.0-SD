<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilInfo_model extends CI_Model
{

    function get_info()
    {
        $this->db->select('*');
        $this->db->from('profil_info');
        $query = $this->db->get()->row_array();
        return $query;
    }
}
