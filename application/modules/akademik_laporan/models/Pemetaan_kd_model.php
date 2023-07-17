<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemetaan_kd_model extends CI_Model

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

    // proses pengetahuan
    public function detil_guru_ki3($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $th_active = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('gm.*,mm.nama,mk.rombel,pd.nama_lengkap')
            ->from('t_guru_mapel gm')
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('t_kelas_siswa mk', 'gm.id_kelas = mk.rombel', 'left')
            ->join('pegawai_data pd', 'gm.id_guru = pd.nik', 'left')
            ->where(['gm.mapel_id' => $id, 'ASC'])
            ->where(['gm.th_active' => $th_active])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_detailsiswa_ki3($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('a.*,b.nama,b.nis,c.mapel_id,d.kkm,c.mapel_id')
            ->from('t_kelas_siswa a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
            ->join('t_guru_mapel c', 'a.rombel = c.id_kelas', 'left')
            ->join('t_kkm d', 'c.id_mapel = d.id_mapel', 'left')
            ->where(['c.mapel_id' => $id], 'ASC')
            ->where(['a.ta' => $ta], 'ASC')
            ->group_by('b.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_kd_ki3($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.no_kd,mk.id_mapel')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['k.tasm' => $tasm])
            ->group_by('mk.tingkat')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_detailnilai_ki3($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }

    public function get_detailnilai_pts_ki3($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.jenis' => 'PTS'])
            ->where(['k.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }

    public function get_detailnilai_pas_ki3($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.jenis' => 'PAS'])
            ->where(['k.tasm' => $tasm])
            // ->group_by('mk.tingkat')
            ->get()->result_array();
        return $bagidata;
    }
    // end proses pengetahuan

    // proses keterampilan
    public function detil_guru_ki4($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $th_active = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('gm.*,mm.nama,mk.rombel,pd.nama_lengkap')
            ->from('t_guru_mapel gm')
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('t_kelas_siswa mk', 'gm.id_kelas = mk.rombel', 'left')
            ->join('pegawai_data pd', 'gm.id_guru = pd.nik', 'left')
            ->where(['gm.mapel_id' => $id, 'ASC'])
            ->where(['gm.th_active' => $th_active])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_detailsiswa_ki4($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('a.*,b.nama,b.nis,c.mapel_id,d.kkm,c.mapel_id')
            ->from('t_kelas_siswa a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
            ->join('t_guru_mapel c', 'a.rombel = c.id_kelas', 'left')
            ->join('t_kkm d', 'c.id_mapel = d.id_mapel', 'left')
            ->where(['c.mapel_id' => $id], 'ASC')           
            ->where(['a.ta' => $ta], 'ASC')
            ->group_by('b.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_kd_ki4($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.tema,mk.no_kd,mk.id_mapel')
            ->from('t_nilai_p_ket k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left', 'ASC')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.tasm' => $tasm])
            ->group_by('mk.tingkat', 'ASC')
            ->group_by('mk.no_kd', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_detailnilai_ki4($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p_ket k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left', 'ASC')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.tasm' => $tasm])
            // ->group_by('mk.tingkat')
            ->get()->result_array();
        return $bagidata;
    }
    // end proses keterampilan
}
