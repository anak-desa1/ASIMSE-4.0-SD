<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ketuntasan_model extends CI_Model

{
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
            ->get()->result_array();
        return $bagidata;
    }

    public function get_siswa($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,s.nama,w.id_guru')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')       
            ->where(['k.ta' => $ta], 'ASC')
            ->where(['k.rombel' => $id])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    // detail
    public function get_header($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,s.nis,s.nisn,s.nama')
            ->from('t_kelas_siswa k')        
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')         
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' => $ta], 'ASC')
            // ->group_by('s.nama', 'ASC')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_pasmapel($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,mm.nama,mm.kelompok,tk.kkm,gm.id_mapel')
            ->from('t_kelas_siswa k')
            ->join('t_mapel_kd ks', 'k.rombel = ks.tingkat', 'left')
            ->join('t_guru_mapel gm', 'k.rombel = gm.id_kelas', 'left')
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('t_kkm tk', 'k.id_kelas = tk.kelas', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' => $ta], 'ASC')
            ->group_by('gm.id_mapel,k.rombel')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_footer_1($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap')
            ->from('t_kelas_siswa k')      
            ->join('t_walikelas w', 'k.rombel= w.id_kelas', 'left')
            ->join('pegawai_data pd', 'pd.nik = w.id_guru', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.ta' => $ta], 'ASC')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_footer_2($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap')
            ->from('t_kelas_siswa k')
            ->join('t_tahun w', 'k.kd_sekolah = w.kd_sekolah', 'left')
            ->join('pegawai_data pd', 'pd.nik = w.nik', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.ta' => $ta], 'ASC')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_min($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select_min('c.kkm')
            ->from('m_mapel b')
            ->join('t_kkm c', 'b.id = c.id_mapel', 'left')
            // ->where(['a.rombel' => $id])
            // ->where(['a.id_siswa' => $target])           
            // ->where(['a.ta' => $ta], 'ASC')
            // ->where(['k.kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->get()->row_array();
        return $bagidata;
    }
    // end detail

    // isi nilai   
    public function get_nilai_p($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd,mk.no_kd,gm.id_mapel,mk.tema,gm.id_kelas,s.nama')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['k.tasm' => $tasm])
            // ->where(['tt.aktif' => 'Y'])
            // ->group_by('k.jenis,k.id_mapel_kd')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_nilai_pts($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd,mk.no_kd,gm.id_mapel,mk.tema,gm.id_kelas,s.nama')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['k.tasm' => $tasm])
            // ->where(['tt.aktif' => 'Y'])
            ->where(['k.jenis' => 'PTS'])
            ->group_by('k.jenis,k.id_mapel_kd')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_nilai_pas($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd,mk.no_kd,gm.id_mapel,mk.tema,gm.id_kelas,s.nama')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['k.tasm' => $tasm])
            // ->where(['tt.aktif' => 'Y'])
            ->where(['k.jenis' => 'PAS'])
            ->group_by('k.jenis,k.id_mapel_kd')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_nilai_k($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm  = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd,mk.no_kd,gm.id_mapel,mk.tema,s.nama')
            ->from('t_nilai_p_ket k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.tasm' => $tasm])
            // ->where(['tt.aktif' => 'Y'])
            ->group_by('k.jenis,k.id_mapel_kd')
            ->get()->result_array();
        return $bagidata;
    }
    // end isi nilai

    public function get_kota()
    {
        $bagidata =
            $this->db->select('s.kota')
            ->from('m_sekolah k')
            ->join('m_kota s', 'k.sekolah_kota_id = s.kota_id', 'left')
            ->get()->row_array();
        return $bagidata;
    }

}
