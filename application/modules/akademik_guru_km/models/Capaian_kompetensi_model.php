<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Capaian_kompetensi_model extends CI_Model

{
     // index
     public function get_tampil()
     {
         $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
         $data['tasm'] = $get_tasm['tahun'];
         $tahun = substr($data['tasm'], 0, 4);
 
         $bagidata =
             $this->db->select('a.*,c.*')
             ->from('t_guru_mapel a')         
             ->join('m_mapel c', 'a.id_mapel = c.id', 'left')        
             ->where(['a.id_guru' => $this->session->userdata('nik')])          
             ->where(['c.tingkat' => 'sd'])
             ->where(['a.th_active' =>  $tahun])         
             ->get()->result_array();
         return $bagidata;
     }
     // end index 

    // detail asesmen
    public function detil_guru($id)
    {
        $bagidata =
            $this->db->select('gm.*,mm.nama,mm.kd_singkat,mk.rombel,pd.nama_lengkap')
            ->from('t_guru_mapel gm')            
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('t_kelas_siswa mk', 'gm.id_kelas = mk.rombel', 'left')
            ->join('pegawai_data pd', 'gm.id_guru = pd.nik', 'left')
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
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
            ->where(['k.jenis' => 'SUMATIF'])
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
            $this->db->select('k.*,s.nama,mk.no_sumatif,mk.nama_sumatif,mk.id_mapel,mk.tingkat,mk.sumatif_id')
            ->from('t_nilai_sumatif k')
            ->join('t_mapel_sumatif mk', 'k.id_mapel_sumatif = mk.sumatif_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.jenis' => 'SUMATIF'])
            ->where(['k.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }

    // end detail asesmen
}
