<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Data_pendaftar_m extends CI_Model
{

    var $table = 'ppdb_daftar u';
    var $column_order = array('', 'u.no_daftar', 'u.nama', 'u.asal_sekolah'); //set order berdasarkan field yang di mau
    var $column_search = array('u.no_daftar', 'u.nama', 'u.asal_sekolah'); //set field yang bisa di search
    var $order = array('u.no_daftar' => 'desc'); // default order 

    private function _get_data()
    {
        $this->db->select('u.*');
        $this->db->from($this->table);
        // $this->db->join('pegawai_data dk', 'dk.email = u.email_pegawai', 'left');
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // cek kalo ada search data
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open group like or like
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close group like or like
            }
            $i++;
        }
        if (isset($_POST['order'])) // cek kalo click order
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function tampildata()
    {
        $this->_get_data();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }

    function count_filtered()
    {
        $this->_get_data();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function yayasan()
    {
        $sekolah = $this->db->select('a.*,b.provinsi,c.kota')
            ->from('m_yaysan a')
            ->join('m_provinsi b', 'a.pro_id = b.provinsi_id')
            ->join('m_kota c', 'a.kot_id = c.kota_id')
            ->get()->row_array();
        return $sekolah;
    }
}
