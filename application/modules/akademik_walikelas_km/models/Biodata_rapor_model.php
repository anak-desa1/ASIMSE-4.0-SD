<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata_rapor_model extends CI_Model

{
    // index
    public function get_siswa()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,s.nama,w.id_guru')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->where(['k.ta' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end index

    public function get_kelas()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

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

    public function get_header($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,s.nis,s.nisn,s.nama,w.semester')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_tahun w', 'k.kd_sekolah = w.kd_sekolah', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' => $tahun])
            ->where(['w.tasm' => $tahun])
            // ->group_by('s.nama', 'ASC')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_sekolah($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,k.alamat alamat_s,d.desa,kc.kecamatan,ko.kota,p.provinsi')
            ->from('m_sekolah k')
            ->join('m_provinsi p', 'k.sekolah_provinsi_id = p.provinsi_id', 'left')
            ->join('m_kota ko', 'k.sekolah_kota_id = ko.kota_id', 'left')
            ->join('m_kecamatan kc', 'k.sekolah_kecamatan_id = kc.kecamatan_id', 'left')
            ->join('m_desa d', 'kc.kecamatan_id = d.kecamatan_id', 'left')
            // ->join('m_siswa s', 'a.id_siswa = s.nis', 'left')
            // ->where(['a.rombel' => $id, 'ASC'])
            // ->where(['a.id_siswa' => $target, 'ASC'])
            // ->where(['a.ta' => $tahun])
            // ->where(['w.tasm' => $tahun])
            // ->group_by('s.nama', 'ASC')
            ->get()->row_array();
        return $bagidata;
    }
}
