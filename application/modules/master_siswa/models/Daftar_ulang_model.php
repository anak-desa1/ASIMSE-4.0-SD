<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_ulang_model extends CI_Model

{
    // tampil data
    var $table = 'm_siswa u';
    var $column_order = array('', 'u.nis', 'u.nama'); //set order berdasarkan field yang di mau
    var $column_search = array('u.nis', 'u.nama'); //set field yang bisa di search
    var $order = array('u.id' => 'desc'); // default order 

    private function _get_data()
    {
        // $this->db->select('u.level_user,u.last_login,dk.*');
        $this->db->from($this->table);
        // $this->db->join('data_karyawan dk', 'dk.nik = u.nik', 'left');
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
    // end tampil data 

    public function update()
    {
        $p = $this->input->post();
        $data['id'] = $p['id'];
        $data['nis'] = date('Y') . $p['tingkat'] . $p['kd_campus'] . '0' . $p['id'];
        $this->db->where('id', $p['id']);
        $this->db->update('m_siswa', $data);
        // return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }
}
