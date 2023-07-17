<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_mapel_model extends CI_Model

{
    // index
    public function get_tampil()
    {
        $bagidata =
            $this->db->select('*')
            ->from('m_guru')
            ->where(['jabatan' => 'Guru'])
            ->where(['stat_data' => 'A'])
            ->group_by('nama_guru', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_gururombel()
    {
        $bagidata =
            $this->db->select('k.*,s.*')
            ->from('t_guru_mapel k')
            ->join('m_guru s', 'k.id_guru = s.id', 'left')
            ->get()->result_array();
        return $bagidata;
    }
    // end index
    // detail
    public function get_gurumapel($id)
    {
        $bagidata =
            $this->db->select('k.*,pd.nik,pd.nama_lengkap')
            ->from('m_guru k')
            ->join('pegawai_data pd', 'pd.nik = k.nip', 'left')
            ->where(['k.nip' => $id])
            ->get()->row_array();

        return $bagidata;
    }

    public function get_mapel($id)
    {
        $bagidata =
            $this->db->select('gm.*,s.*,k.tingkat')
            ->from('t_guru_mapel gm')
            ->join('m_mapel s', 'gm.id_mapel = s.id', 'left')
            ->join('m_kelas k', 'gm.id_kelas = k.id', 'left')
            ->where(['gm.id_guru' => $id])
            // ->group_by('gm.id_mapel', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end detail

    public function get_sekolah($id)
    {
        $this->db->select('*');
        $this->db->from('m_guru k');
        $this->db->where(['k.nip' => $id]);
        $this->db->where(['k.jabatan' => 'Guru']);
        $query = $this->db->get();
        return $query->result();
    }

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
        return $query->result();
    }

    public function mapel_simpan()
    {
        $id_mapel = $this->input->post('id_mapel', true);
        $p = $this->input->post();

        for ($i = 0; $i < sizeof($id_mapel); $i++) {
            $data = [
                "id_guru" => $p['id_guru'],
                "id_kelas" =>  $p['id_kelas'],
                "id_mapel" => $id_mapel[$i],
                "th_active" => $p['th_active'],
                "tasm" => $p['th_active'],
                // "jenis" => $p['jenis'],
            ];
            $this->db->insert('t_guru_mapel', $data);
        }
    }
    // end proses tambah
}
