<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersiapanLiburNasional_model extends CI_Model
{
    public function ambildata($table)
    {
        return $this->db->get($table);
    }

    public function tambahdata($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ambilid($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function ubahdata($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
