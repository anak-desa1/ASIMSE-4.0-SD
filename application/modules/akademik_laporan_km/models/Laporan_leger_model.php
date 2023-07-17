<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_leger_model extends CI_Model

{
    public function get_kelas()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $th_active = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('*')
            ->from('t_kelas_siswa')
            ->where(['ta' => $th_active])
            ->group_by('rombel')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_tampil($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $th_active = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,m.*')
            ->from('t_guru_mapel k')
            ->join('m_mapel m', 'k.id_mapel = m.id', 'left')
            ->where(['k.id_kelas' => $id])
            ->where(['k.th_active' => $th_active])
            // ->group_by('k.id_kelas')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_mapel($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,mm.kd_singkat,mm.nama,ks.no_sumatif,mm.kelompok,gm.id_mapel')
            ->from('t_kelas_siswa k')
            ->join('t_mapel_sumatif ks', 'k.rombel = ks.tingkat', 'left')
            ->join('t_guru_mapel gm', 'k.rombel = gm.id_kelas', 'left')
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')          
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.ta' => $ta], 'ASC')
            ->where(['gm.th_active' => $ta])
            ->group_by('gm.id_mapel,k.rombel')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_guru($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('gm.*,mk.rombel,pd.nama_lengkap')
            ->from('t_walikelas gm')
            ->join('t_kelas_siswa mk', 'gm.id_kelas = mk.rombel', 'left')
            ->join('pegawai_data pd', 'gm.id_guru = pd.nik', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['gm.tasm' => $tasm, 'ASC'])
            ->where(['mk.ta' => $tasm], 'ASC')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_detailsiswa($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('a.*,b.nama,b.nis,c.mapel_id,c.mapel_id')
            ->from('t_kelas_siswa a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
            ->join('t_guru_mapel c', 'a.rombel = c.id_kelas', 'left')         
            ->where(['a.rombel' => $id], 'ASC')
            ->where(['a.ta' => $ta], 'ASC')
            ->where(['c.th_active' => $ta])
            ->group_by('b.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    // proses pengetahuan
    public function get_detailnilai_sumatif($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,mk.no_sumatif,gm.id_mapel,gm.id_kelas,s.nama')
            ->from('t_nilai_sumatif k')
            ->join('t_mapel_sumatif mk', 'k.id_mapel_sumatif  = mk.sumatif_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.tasm' => $tasm])
            ->where(['gm.th_active' => $ta])
            ->where(['k.jenis' => 'SUMATIF'])
            ->get()->result_array();
        return $bagidata;
    }

    public function get_detailnilai_pas_sumatif($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,mk.no_sumatif,gm.id_mapel,gm.id_kelas,s.nama')
            ->from('t_nilai_sumatif k')
            ->join('t_mapel_sumatif mk', 'k.id_mapel_sumatif  = mk.sumatif_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.tasm' => $tasm])
            ->where(['gm.th_active' => $ta])
            ->where(['k.jenis' => 'PAS'])
            ->get()->result_array();
        return $bagidata;
    }
    // end proses pengetahuan
}