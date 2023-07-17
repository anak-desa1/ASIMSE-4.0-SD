<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_kd_model extends CI_Model

{
    // index
    public function get_kelas()
    {
        $this->db->select('a.*');
        $this->db->from('m_kelas a');
        // $this->db->join('l_sekolah b', 'a.kd_sekolah = b.kd_sekolah', 'left');
        // $this->db->where('a.kd_sekolah', $this->session->kd_sekolah);
        $this->db->group_by('a.tingkat', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    // end index
    // detail
    public function get_detail($id)
    {
        $this->db->select('mk.*');
        $this->db->from('m_kelas mk');       
        $this->db->join('m_kd m', 'mk.tingkat = m.kelas', 'left');      
        $this->db->where(['mk.tingkat' => $id]);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_kd($id)
    {
        $bagidata =
            $this->db->select('a.*,b.nama')
            ->from('m_kd a')
            ->join('m_mapel b', 'a.id_mapel = b.id', 'left')
            ->where(['a.kelas' => $id])
            ->get()->result_array();
        return $bagidata;
    }
    // end detail
    // tambah
    public function get_mapel()
    {
        $bagidata =
            $this->db->select('*')
            ->from('m_mapel')
            // ->where('kd_sekolah', $this->session->kd_sekolah)
            ->get()->result_array();
        return $bagidata;
    }
    // end tambah

    public function simpan_tambah()
    {
        // cek user exist
        $p = $this->input->post();

        // $data['kd_sekolah'] = $p['kd_sekolah'];
        $data['kelas'] = $p['kelas'];
        $data['id_mapel'] = $p['id_mapel'];
        $data['no_kd'] = $p['no_kd'];
        $data['deskripsi'] = addslashes($p['deskripsi']);
        $data['jenis'] = $p['jenis'];

        $id =   $this->input->post('id');
        $result = $this->db->get_where('m_kd', ['id' =>  $id])->row_array();
        if ($result == 0) {
            $this->db->insert('m_kd', $data);
        } else {
            $this->db->where('id', $result['id']);
            $this->db->update('m_kd', $data);
        }
        // return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }
}
