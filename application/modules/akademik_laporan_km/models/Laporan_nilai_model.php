<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_nilai_model extends CI_Model

{
    // index
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

    public function get_tambah()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,ks.rombel tingkat,pd.nama_lengkap,m.nama')
            ->from('t_guru_mapel k')
            ->join('t_kelas_siswa ks', 'k.id_kelas = ks.rombel', 'left')
            ->join('m_mapel m', 'k.id_mapel = m.id', 'left')
            ->join('pegawai_data pd', 'k.id_guru = pd.nik', 'left')
            ->where(['k.id_guru' => $this->session->userdata('nik')])
            ->where(['k.th_active' =>  $tahun])
            ->where(['ks.ta' =>  $tahun])
            // ->group_by('k.id_guru')
            ->get()->row_array();
        return $bagidata;
    }
    
    // end index

    // proses pas
    public function detil_guru($id)
     {
         $bagidata =
             $this->db->select('gm.*,mm.nama,mm.kd_singkat,mk.rombel,pd.nama_lengkap')
             ->from('t_guru_mapel gm')            
             ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
             ->join('t_kelas_siswa mk', 'gm.id_kelas = mk.rombel', 'left')
             ->join('pegawai_data pd', 'gm.id_guru = pd.nik', 'left')
             ->where(['gm.mapel_id' => $id, 'ASC'])
             ->get()->row_array();
         return $bagidata;
     }
 
     public function get_detailsiswa($id)
     {
         $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
         $data['tasm'] = $get_tasm['tahun'];
         $ta = substr($data['tasm'], 0, 4);
 
         $bagidata =
             $this->db->select('a.*,b.nama,b.nis,c.mapel_id,c.mapel_id')
             ->from('t_kelas_siswa a')
             ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
             ->join('t_guru_mapel c', 'a.rombel = c.id_kelas', 'left')
             ->where(['c.mapel_id' => $id], 'ASC')
             ->where(['a.ta' => $ta], 'ASC')
             ->group_by('b.nama', 'ASC')
             ->get()->result_array();
         return $bagidata;
     }
 
     public function get_sumatif($id)
     {
         $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
         $data['tasm'] = $get_tasm['tahun'];
         $ta = substr($data['tasm'], 0, 4);
         $tasm = $get_tasm['tahun'];
 
         $bagidata =
             $this->db->select('k.*,mk.no_sumatif,mk.id_mapel')
             ->from('t_nilai_sumatif k')
             ->join('t_mapel_sumatif mk', 'k.id_mapel_sumatif = mk.sumatif_id', 'left')
             ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
             ->where(['gm.mapel_id' => $id], 'ASC')
             ->where(['gm.id_guru' => $this->session->userdata('nik')])
             ->where(['k.tasm' => $tasm])
             ->group_by('mk.tingkat')
             ->get()->result_array();
         return $bagidata;
     }
 
     public function get_detailnilai($id)
     {
         $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
         $data['tasm'] = $get_tasm['tahun'];
         $ta = substr($data['tasm'], 0, 4);
         $tasm = $get_tasm['tahun'];
 
         $bagidata =
             $this->db->select('k.*,s.nama,mk.tema,mk.no_sumatif,mk.nama_sumatif,mk.id_mapel,mk.tingkat,mk.sumatif_id')
             ->from('t_nilai_sumatif k')
             ->join('t_mapel_sumatif mk', 'k.id_mapel_sumatif = mk.sumatif_id', 'left')
             ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
             ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
             ->where(['gm.mapel_id' => $id], 'ASC')
             ->where(['k.tasm' => $tasm])
             ->where(['k.jenis' => 'SUMATIF'])
             ->get()->result_array();
         return $bagidata;
     }   
 
     public function get_detailnilai_pas($id)
     {
         $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
         $data['tasm'] = $get_tasm['tahun'];
         $ta = substr($data['tasm'], 0, 4);
         $tasm = $get_tasm['tahun'];
 
         $bagidata =
             $this->db->select('k.*,s.nama,mk.no_sumatif,mk.nama_sumatif,mk.id_mapel,mk.tingkat')
             ->from('t_nilai_sumatif k')
             ->join('t_mapel_sumatif mk', 'k.id_mapel_sumatif = mk.sumatif_id', 'left')
             ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
             ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
             ->where(['gm.mapel_id' => $id], 'ASC')
             ->where(['k.jenis' => 'PAS'])
             ->where(['k.tasm' => $tasm])
             ->get()->result_array();
         return $bagidata;
     }
     // end proses pengetahuan
}
