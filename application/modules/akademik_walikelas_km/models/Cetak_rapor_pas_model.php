<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_rapor_pas_model extends CI_Model

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
            ->where(['w.tasm' => $tahun])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_nilai_np()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.no_sumatif,gm.id_mapel,mk.tema,gm.id_kelas')
            ->from('t_nilai_sumatif k')
            ->join('t_mapel_sumatif mk', 'k.id_mapel_sumatif = mk.sumatif_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->where(['k.tasm' =>  $tasm])
            ->where(['gm.th_active' => $tahun])
            ->group_by('k.jenis,k.id_mapel_kd')
            ->get()->result_array();
        return $bagidata;
    }
    // end index

    // detail
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
            ->where(['k.ta' => $tahun])
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            // ->group_by('s.nama', 'ASC')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_kota()
    {
        $bagidata =
            $this->db->select('s.kota')
            ->from('m_sekolah k')
            ->join('m_kota s', 'k.sekolah_kota_id = s.kota_id', 'left')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_pasmapel($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mm.nama,mm.kelompok,gm.id_mapel')
            ->from('t_kelas_siswa k')
            ->join('t_guru_mapel gm', 'k.rombel = gm.id_kelas', 'left')
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')           
            ->where(['k.ta' => $tahun])
            ->where(['gm.th_active' => $tahun])
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->group_by('gm.id_mapel')
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
            $this->db->select('k.*,pd.nama_guru,pd.nip')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel= w.id_kelas', 'left')
            ->join('m_guru pd', 'pd.nip = w.id_guru', 'left')
            ->where(['k.ta' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->where(['k.rombel' => $id, 'ASC'])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_footer_2($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
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

    public function get_min($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select_min('tk.kkm')
            ->from('t_kelas_siswa k')
            ->join('t_guru_mapel gm', 'k.rombel = gm.id_kelas', 'left')
            ->join('t_kkm tk', 'gm.id_mapel = tk.id_mapel', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['k.ta' => $tahun])
            ->where(['gm.tasm' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }
    // end detail

    // isi nilai   
    public function get_nilai_sumatif($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_sumatif,mk.no_sumatif,gm.id_mapel,gm.id_kelas,s.nama')
            ->from('t_nilai_sumatif k')
            ->join('t_mapel_sumatif mk', 'k.id_mapel_sumatif = mk.sumatif_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['k.jenis' => 'SUMATIF'])
            ->where(['k.tasm' => $tasm])
            ->where(['gm.tasm' => $tahun])
            ->group_by('k.jenis,k.id_mapel_sumatif')
            ->get()->result_array();
        return $bagidata;
    } 
       
    public function get_nilai_pas($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_sumatif,mk.no_sumatif,gm.id_mapel,gm.id_kelas,s.nama')
            ->from('t_nilai_sumatif k')
            ->join('t_mapel_sumatif mk', 'k.id_mapel_sumatif = mk.sumatif_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['k.jenis' => 'PAS'])
            ->where(['k.tasm' => $tasm])
            ->where(['gm.tasm' => $tahun])
            ->group_by('k.jenis,k.id_guru_mapel')
            ->get()->result_array();
        return $bagidata;
    }    
    // end isi nilai
    // sikap    
    // public function get_sikap($id, $target)
    // {
    //     $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
    //     $data['tasm'] = $get_tasm['tahun'];
    //     $tahun = substr($data['tasm'], 0, 4);
    //     $tasm = $get_tasm['tahun'];

    //     $bagidata =
    //         $this->db->select('k.*,k.dimensi,k.deskripsi, k.id')
    //         ->from('t_nilai_sikap k')            
    //         ->where(['k.id_kelas' => $id, 'ASC'])
    //         ->where(['k.id_siswa' => $target])           
    //         ->where(['k.penilaian' => 'sikap'])
    //         ->where(['k.tasm' => $tasm])
    //         // ->group_by('k.selalu')
    //         ->get()->result_array();
    //     return $bagidata;
    // }  
    // end sikap 
    // ekstrakurikuluer
    public function get_ekskul($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,ne.*,me.nama ekskul')
            ->from('t_kelas_siswa k')
            ->join('t_nilai_ekstra ne', 'k.id_siswa = ne.id_siswa', 'left')
            ->join('m_ekstra me', 'ne.id_ekstra = me.id', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' => $tahun])
            ->where(['ne.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }
    // end ekstrakurikuluer
     // prestasi
     public function get_prestasi($id, $target)
     {
         $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
         $data['tasm'] = $get_tasm['tahun'];
         $tahun = substr($data['tasm'], 0, 4);
         $tasm = $get_tasm['tahun'];
 
         $bagidata =
             $this->db->select('k.*,ne.*')
             ->from('t_kelas_siswa k')
             ->join('t_prestasi ne', 'k.id_siswa = ne.id_siswa', 'left')
             ->where(['k.rombel' => $id, 'ASC'])
             ->where(['k.id_siswa' => $target, 'ASC'])
             ->where(['k.ta' => $tahun])
             ->where(['ne.ta' => $tasm])
             ->get()->result_array();
         return $bagidata;
     }
     // end prestasi
    // absensi
    public function get_absensi($id, $target, $th)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
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
            ->where(['na.tasm' => $th])
            ->where(['na.penilaian' => 'PAS'])
            ->where(['k.ta' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }
    // end absensi
    // catatan walikelas
    public function get_catatan($id, $target, $th)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
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
            ->where(['na.tasm' => $th])
            ->where(['na.penilaian' => 'PAT'])
            ->where(['k.ta' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->group_by('s.nama', 'ASC')
            ->get()->row_array();
        return $bagidata;
    }
    // end catatan walikelas
    // naik_kelas
    public function get_naik_kelas($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', ])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,ne.*')
            ->from('t_kelas_siswa k')
            ->join('t_naik_kelas ne', 'k.id_siswa = ne.id_siswa', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' => $tahun])
            ->where(['ne.tasm' => $tasm])
            ->get()->row_array();
        return $bagidata;
    }
    // end naik_kelas
}
