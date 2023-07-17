<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_rapor_pts_model extends CI_Model

{
    // proses pengetahuan
    // index
    public function get_siswa()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,w.id_guru')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->where(['k.ta' => $tahun])
            ->where(['s.th_active' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end index

    // detail
    public function get_kota()
    {
        $bagidata =
            $this->db->select('s.kota')
            ->from('m_sekolah k')
            ->join('m_kota s', 'k.sekolah_kota_id = s.kota_id', 'left')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_header($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nis,s.nisn,s.nama')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' => $tahun])
            ->where(['s.th_active' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_ptsmapel($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mm.nama,mm.kelompok,tk.kkm,gm.id_mapel')
            ->from('t_kelas_siswa k')
            ->join('t_mapel_kd ks', 'k.rombel = ks.tingkat', 'left')
            ->join('t_guru_mapel gm', 'k.rombel = gm.id_kelas', 'left')
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('t_kkm tk', 'gm.id_mapel = tk.id_mapel', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' => $tahun])
            ->where(['ks.tasm' => $tasm])
            ->where(['gm.tasm' => $tahun])
            ->where(['tk.ta' => $tahun])
            ->group_by('gm.id_mapel,k.rombel')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_footer_1($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap')
            ->from('t_kelas_siswa k')
            // ->join('m_sekolah s', 'k.kd_sekolah = s.kd_sekolah', 'left')
            // ->join('m_kota mk', 's.sekolah_kota_id = mk.kota_id', 'left')
            ->join('t_walikelas w', 'k.rombel= w.id_kelas', 'left')
            ->join('pegawai_data pd', 'pd.nik = w.id_guru', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.ta' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_footer_2($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel= w.id_kelas', 'left')
            ->join('pegawai_data pd', 'pd.nik = w.id_kelas', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.ta' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }
    // end detail

    // isi nilai   
    // isi nilai   
    public function get_nilai_p($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.no_kd,gm.id_mapel,mk.tema,gm.id_kelas')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['k.penilaian' => 'PTS'])
            ->where(['k.tasm' =>  $tasm])
            ->where(['mk.tasm' => $tasm])
            ->where(['gm.tasm' => $tahun])
            ->group_by('k.jenis,k.id_mapel_kd')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_nilai_pts($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.no_kd,gm.id_mapel,mk.tema,gm.id_kelas')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['k.jenis' => 'PTS'])
            ->where(['k.tasm' =>  $tasm])
            ->where(['mk.tasm' => $tasm])
            ->where(['gm.tasm' => $tahun])
            // ->group_by('gm.mapel_id')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_nilai_k($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.no_kd,gm.id_mapel,mk.tema')
            ->from('t_nilai_p_ket k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.penilaian' => 'PTS'])
            ->where(['k.tasm' =>  $tasm])
            ->where(['mk.tasm' => $tasm])
            ->where(['gm.tasm' => $tahun])
            ->group_by('k.jenis,k.id_mapel_kd')
            ->get()->result_array();
        return $bagidata;
    }
    // end isi nilai

    // sikap spiritual
    public function q_list_kd_sp()
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_kd')
            ->where(['jenis' => 'SSp'])
            ->get();
        return $bagidata;
    }

    public function get_sp($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd, mk.kd_id')
            ->from('t_nilai_sikap_sp k')
            ->join('t_mapel_kd mk', 'k.selalu = mk.kd_id', 'left')
            ->where(['k.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target,  'ASC'])
            ->where(['mk.jenis' => 'SSp'])
            ->where(['k.penilaian' => 'PTS'])
            ->where(['k.tasm' =>  $tasm])
            ->group_by('k.selalu')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_sp_mm($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd')
            ->from('t_nilai_sikap_sp k')
            ->join('t_mapel_kd mk', 'k.mulai_meningkat = mk.kd_id', 'left')
            ->where(['k.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target,  'ASC'])
            ->where(['mk.jenis' => 'SSp'])
            ->where(['k.penilaian' => 'PTS'])
            ->where(['k.tasm' =>  $tasm])
            ->where(['mk.tasm' => $tasm])
            ->group_by('k.mulai_meningkat')
            ->get()->result_array();
        return $bagidata;
    }
    // end sikap spiritual

    // sikap sosial
    public function q_list_kd_so()
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_kd')
            ->where(['jenis' => 'SSo'])
            ->get();
        return $bagidata;
    }

    public function get_so($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd')
            ->from('t_nilai_sikap_so k')
            ->join('t_mapel_kd mk', 'k.selalu = mk.kd_id', 'left')
            ->where(['k.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target,  'ASC'])
            ->where(['mk.jenis' => 'SSo'])
            ->where(['k.penilaian' => 'PTS'])
            ->where(['k.tasm' =>  $tasm])
            ->where(['mk.tasm' => $tasm])
            ->group_by('k.selalu')
            ->get()->result_array();
        return $bagidata;
    }
    public function get_so_mm($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd')
            ->from('t_nilai_sikap_so k')
            ->join('t_mapel_kd mk', 'k.mulai_meningkat = mk.kd_id', 'left')
            ->where(['k.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target,  'ASC'])
            ->where(['mk.jenis' => 'SSo'])
            ->where(['k.penilaian' => 'PTS'])
            ->where(['k.tasm' =>  $tasm])
            ->where(['mk.tasm' => $tasm])
            ->group_by('k.mulai_meningkat')
            ->get()->result_array();
        return $bagidata;
    }
    // end sikap sosial

    // absensi
    public function get_absensi($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,w.id_guru,na.*,s.nis')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('t_nilai_absensi na', 'k.id_siswa = na.id_siswa', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['na.penilaian' => 'PTS'])
            ->where(['k.ta' => $tahun])
            ->where(['s.th_active' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->where(['na.tasm' => $tasm])
            ->group_by('s.nama', 'ASC')
            ->get()->row_array();
        return $bagidata;
    }
    // end absensi

    // catatan walikelas
    public function get_catatan($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,w.id_guru,na.*,s.nis')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('t_naik_kelas na', 'k.id_siswa = na.id_siswa', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['na.penilaian' => 'PTS'])
            ->where(['k.ta' => $tahun])
            ->where(['s.th_active' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->where(['na.tasm' => $tasm])
            ->group_by('s.nama', 'ASC')
            ->get()->row_array();
        return $bagidata;
    }
    // end catatan walikelas


}
