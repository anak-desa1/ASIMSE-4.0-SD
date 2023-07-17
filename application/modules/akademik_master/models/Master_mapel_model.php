<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_mapel_model extends CI_Model

{
    // tampil data
    var $table = 'm_mapel u';
    var $column_order = array('', 'u.kelompok', 'u.nama', 'u.kkm'); //set order berdasarkan field yang di mau
    var $column_search = array('u.kelompok', 'u.nama', 'u.kkm'); //set field yang bisa di search
    var $order = array('u.id' => 'ASC'); // default order 

    private function _get_data()
    {
        $this->db->select('u.*');
        $this->db->from($this->table);
        // $this->db->join('l_campus lc', 'lc.kd_campus = u.kd_campus', 'left');
        // $this->db->join('l_sekolah ls', 'ls.kd_sekolah = u.kd_sekolah', 'left');

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

        // $this->db->group_start(); // open group like or like
        // $this->db->where('u.kd_sekolah', $this->session->kd_sekolah);
        // $this->db->group_end(); //close group like or like

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

    public function get_campus()
    {
        $this->db->select('*');
        $this->db->from('l_campus');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan_tambah()
    {
        // cek user exist
        $p = $this->input->post();

        // $data['kd_campus'] = $p['kd_campus'];
        // $data['kd_sekolah'] = $p['kd_sekolah'];
        $data['tingkat'] = 'sd';
        $data['kelompok'] = $p['kelompok'];
        $data['tambahan_sub'] = $p['tambahan_sub'];
        $data['kd_singkat'] = $p['kd_singkat'];
        $data['nama'] = addslashes($p['nama']);
        // $data['kkm'] = $p['kkm'];

        $this->db->insert('m_mapel', $data);
        return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }

    public function get_edit($id)
    {
        $bagidata =
            $this->db->select('k.*')
            ->from('m_mapel k')
            ->where(['k.id' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function update()
    {
        $p = $this->input->post();

        // $data['tingkat'] = $p['tingkat'];
        $data['kelompok'] = $p['kelompok'];
        $data['tambahan_sub'] = $p['tambahan_sub'];
        $data['kd_singkat'] = $p['kd_singkat'];
        $data['nama'] = addslashes($p['nama']);
        // $data['kkm'] = $p['kkm'];

        $this->db->where('id', $p['_id']);
        $this->db->update('m_mapel', $data);
    }
}
