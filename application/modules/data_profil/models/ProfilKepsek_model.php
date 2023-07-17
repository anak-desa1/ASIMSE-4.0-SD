<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilKepsek_model extends CI_Model
{

    function get_profil()
    {
        $this->db->select('*');
        $this->db->from('profil_kepsek');
        $query = $this->db->get()->row_array();
        return $query;
    }

   
}
