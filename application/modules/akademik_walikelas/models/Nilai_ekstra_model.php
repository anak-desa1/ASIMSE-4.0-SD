<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_ekstra_model extends CI_Model

{
    // Nilai_ekstra
    // index
    public function get_kelas()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap,w.tasm')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('pegawai_data pd', 'w.id_guru = pd.nik', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.ta' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_nilai_tampil()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('a.id, a.nilai, a.desk, a.id_siswa ids, c.nama nmsiswa, d.nama nmeks')
            ->from('t_nilai_ekstra a')
            ->join('t_kelas_siswa b', 'a.id_siswa = b.id_siswa', 'left')
            ->join('m_siswa c', 'b.id_siswa = c.nis', 'left')
            ->join('m_ekstra d', 'a.id_ekstra = d.id', 'left')
            ->join('t_walikelas e', 'b.rombel = e.id_kelas', 'left')
            ->where(['e.id_guru' => $this->session->userdata('nik')])
            ->where(['a.tasm' =>  $tasm])
            ->where(['b.ta' =>  $tahun])
            // ->where(['a.id_ekstra' => $id])
            ->get()->result_array();
        return $bagidata;
    }

    public function get_nilai($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('a.id, a.nilai, a.desk, a.id_siswa ids, c.nama nmsiswa, d.nama nmeks')
            ->from('t_nilai_ekstra a')
            ->join('t_kelas_siswa b', 'a.id_siswa = b.id_siswa', 'left')
            ->join('m_siswa c', 'b.id_siswa = c.nis', 'left')
            ->join('m_ekstra d', 'a.id_ekstra = d.id', 'left')
            ->join('t_walikelas e', 'b.rombel = e.id_kelas', 'left')
            ->where(['e.id_guru' => $this->session->userdata('nik')])
            ->where(['a.id_ekstra' => $id])
            ->where(['a.tasm' =>  $tasm])
            ->where(['b.ta' =>  $tahun])
            ->get()->result_array();
        return $bagidata;
    }


    public function get_siswa($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,s.nis')
            ->from('m_siswa s')
            ->join('t_kelas_siswa k', 'k.id_siswa = s.nis', 'left')
            ->where(['k.rombel' => $id])
            ->where(['k.ta' => $tahun])
            ->get()->result_array();
        return $bagidata;
    }
    // end index

    public function simpan_data()
    {
        $p = $this->input->post();
        $data = [
            "tasm" => $p['tasm'],
            "id_ekstra" => $p['id_ekstra'],
            "id_siswa" => $p['id_siswa'],
            "nilai" => $p['nilai'],
            "desk" => $p['desk'],
        ];
        $this->db->insert('t_nilai_ekstra', $data);
    }
}
