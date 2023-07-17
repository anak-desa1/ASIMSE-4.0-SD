<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tes_masuk_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createdata($selec, $data)
    {
        $this->db->insert($selec, $data);
    }
    public function deletedata($table, $where)
    {
        $this->db->delete($table, $where);
    }
    public function ambilid($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function ubahdata($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function editdata($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
}
