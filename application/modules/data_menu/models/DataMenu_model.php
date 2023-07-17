<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMenu_model extends CI_Model
{

    public function getSubMenu()
    {
        $query = "SELECT `pegawai_sub_menu`.*, `pegawai_menu`.`nama_menu`
                    FROM `pegawai_sub_menu` JOIN `pegawai_menu`
                    ON `pegawai_sub_menu`.`menu_id` = `pegawai_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }
}
