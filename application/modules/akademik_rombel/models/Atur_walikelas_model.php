<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_walikelas_model extends CI_Model

{
    // index

    public function get_kelas($ta)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $this->db->select('*');
        $this->db->from('t_kelas_siswa');
        $this->db->where('ta', $ta);
        $this->db->group_by('rombel', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_gururombel()
    {
        $bagidata =
            $this->db->select('k.*,s.nama_lengkap,s.foto')
            ->from('t_walikelas k')
            ->join('pegawai_data s', 'k.id_guru = s.nik', 'left')
            // ->group_by('id_kelas', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end index
    // proses tambah
    public function get_kelasrombel()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('rombel')
            ->from('t_kelas_siswa')
            ->where('ta',  $ta)
            ->group_by('rombel', 'ASC')
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

    public function simpan_walikelas()
    {
        $p = $this->input->post();

        $data = [
            "id_guru" => $p['id_guru'],
            "id_kelas" => $p['id_kelas'],
            "tasm" => $p['tasm'],
            "wali_activate" => 1,
        ];
        $this->db->insert('t_walikelas', $data);
        return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }

    public function ubah_walikelas()
    {
        $id = $this->input->post('wali_id', true);
        $p = $this->input->post();

        $data = [
            "id_guru" => $p['id_guru'],
            "id_kelas" => $p['id_kelas'],
            "tasm" => $p['tasm'],
            "wali_activate" => 1,
        ];

        $this->db->where('wali_id', $id);
        $this->db->update('t_walikelas', $data);
        return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }
    // end proses tambah
}
