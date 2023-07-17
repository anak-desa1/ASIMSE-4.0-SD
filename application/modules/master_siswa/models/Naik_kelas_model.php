<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Naik_kelas_model extends CI_Model

{
    public function siswa_aktif()

    {
        return $this->db->get_where('c_data', ['email_pegawai' => $this->session->email_pegawai, 'tahun' => date('Y')])->row_array();
    }

    // tampil data
    var $table = 'm_naik_kelas u';
    var $column_order = array('', 'u.nis', 'dk.nama', 'u.tingkat'); //set order berdasarkan field yang di mau
    var $column_search = array('u.nis', 'dk.nama', 'u.tingkat'); //set field yang bisa di search
    var $order = array('u.naik_id' => 'ASC'); // default order 

    private function _get_data()
    {
        $this->db->select('u.*,dk.nama');
        $this->db->from($this->table);
        $this->db->join('m_siswa dk', 'dk.nis = u.nis', 'left');
        // $this->db->join('t_tahun t', 'dk.kd_sekolah = u.kd_sekolah', 'left');
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
        // $this->db->where(['t.aktif' => 'Y']);
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

    // pilih kelas siswa
    public function get_kelas()
    {
        $this->db->select('*');
        $this->db->from('m_kelas');
        // $this->db->where('kd_sekolah', $this->session->kd_sekolah);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_siswa_naik($id)
    {
        $bagidata =
            $this->db->select('a.*,b.nama')
            ->from('m_naik_kelas a')
            ->join('m_siswa b', 'a.nis = b.nis', 'left')
            ->where(['a.tingkat' => $id])
            ->where(['a.tingkat_active' => 1])
            ->group_by('b.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_campus()
    {
        $this->db->select('*');
        $this->db->from('l_campus');
        $query = $this->db->get();
        return $query->result();
    }

    public function getLokasi()
    {
        return $this->db->get('l_sekolah')->result_array();
    }

    public function simpan_baru()
    {
        $p = $this->input->post();
        $nis = $this->input->post('nis', true);
        for ($i = 0; $i < sizeof($nis); $i++) {
            $data = [
                "tingkat" => $p['tingkat'],
                "nis" =>  $nis[$i],
                "th_active" => $p['th_active'],
            ];
            $this->db->insert('m_naik_kelas', $data);
        }

        $p = $this->input->post();
        $nis = $this->input->post('nis', true);
        for ($i = 0; $i < sizeof($nis); $i++) {
            $data2 = [
                "tingkat" => $p['tingkat'],
                "th_active" => $p['th_active'],
                "stat_data" => 'K',
            ];
            $this->db->where('nis', $nis[$i]);
            $this->db->update('m_siswa', $data2);
        }
    }

    public function simpan_naik()
    {
        $p = $this->input->post();
        $nis = $this->input->post('nis', true);
        for ($i = 0; $i < sizeof($nis); $i++) {
            $data = [
                "tingkat" => $p['tingkat'],
                "nis" =>  $nis[$i],
                "th_active" => $p['th_active'],
                "tingkat_active" => 0,
            ];
            $this->db->where('nis', $nis[$i]);
            $this->db->update('m_naik_kelas', $data);
        }

        $p = $this->input->post();
        $nis = $this->input->post('nis', true);
        for ($i = 0; $i < sizeof($nis); $i++) {
            $data2 = [
                "tingkat" => $p['tingkat'],
                "th_active" => $p['th_active'],
                "stat_data" => 'K',
            ];
            $this->db->where('nis', $nis[$i]);
            $this->db->update('m_siswa', $data2);
        }
    }
}
