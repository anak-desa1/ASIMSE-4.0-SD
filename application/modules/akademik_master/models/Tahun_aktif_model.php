<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_aktif_model extends CI_Model

{
    // tampil data
    var $table = 't_tahun u';
    var $column_order = array('',  'tahun', 'nama_kepsek', 'p.nama_lengkap'); //set order berdasarkan field yang di mau
    var $column_search = array('tahun', 'nama_kepsek', 'p.nama_lengkap'); //set field yang bisa di search
    var $order = array('u.id' => 'DESC'); // default order 

    private function _get_data()
    {
        $this->db->select('u.*,p.nama_lengkap');
        $this->db->from($this->table);
        $this->db->join('pegawai_data p', 'p.nik = u.nik', 'left');
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
    // tambah data
    public function get_campus()
    {
        $this->db->select('*');
        $this->db->from('l_campus');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan_tambah()
    {
        $p = $this->input->post();

        $data['tahun'] = $p['tahun'] . $p['semester'];
        $data['nik'] = $p['nik'];
        $data['nip_kepsek'] = $p['nip_kepsek'];
        // $data['tgl_raport'] = $p['tgl_raport'];
        // $data['tgl_raport_kelas3'] = $p['tgl_raport_kelas3'];
        $data['semester'] = $p['semester'];

        $this->db->insert('t_tahun', $data);

        return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }
    //end tambah data
    //edit data
    public function get_edit($id)
    {
        $bagidata =
            $this->db->select('k.*,p.nama_lengkap')
            ->from('t_tahun k')
            ->join('pegawai_data p', 'p.nik = k.nik', 'left')
            ->where(['k.id' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function update()
    {
        $p = $this->input->post();

        $data['tahun'] = $p['tahun'] . $p['semester'];
        $data['nik'] = $p['nik'];
        $data['nip_kepsek'] = $p['nip_kepsek'];
        // $data['tgl_raport'] = $p['tgl_raport'];
        // $data['tgl_raport_kelas3'] = $p['tgl_raport_kelas3'];
        $data['semester'] = $p['semester'];

        $this->db->where('id', $p['_id']);
        $this->db->update('t_tahun', $data);
        // return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }
    //end edit data
    //aktif
    public function aktif()
    {
        $p = $this->input->post();

        $data = [
            'aktif' => $p['aktif'],
        ];

        $this->db->where('id', $p['_id']);
        $this->db->update('t_tahun', $data);
    }
    //end aktif
    //tidak aktif
    public function tidak_aktif()
    {
        $p = $this->input->post();

        $data = [
            'aktif' => $p['aktif'],
        ];

        $this->db->where('id', $p['_id']);
        $this->db->update('t_tahun', $data);
    }
    //end tidak aktif
}
