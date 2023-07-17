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

    public function get_kd($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.no_kd_1,mk.id_mapel')
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

    public function get_detailnilai($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd_1,mk.nama_kd_1,mk.no_kd_2,mk.nama_kd_2,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.tasm' => $tasm])
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
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.jenis' => 'PAS'])
            ->where(['k.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }
    // end proses pengetahuan

    // export excel 
    public function get_exportnilai_pas($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.no_kd_1,mk.nama_kd_1,mk.no_kd_2,mk.nama_kd_2,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }

   
    // end export excel 

    // ubah nilai
    public function edit_guru($id)
    {
        $bagidata =
            $this->db->select('gm.*,mm.nama,mk.rombel,pd.nama_lengkap')
            ->from('t_guru_mapel gm')       
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('t_kelas_siswa mk', 'gm.id_kelas = mk.rombel', 'left')
            ->join('pegawai_data pd', 'gm.id_guru = pd.nik', 'left')
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['gm.mapel_id' => $id, 'ASC'])
            // ->where(['gm.id_kelas' => $target, 'ASC'])
            // ->group_by('gm.mapel_id')
            ->get()->row_array();
        return $bagidata;
    }

    public function edit_siswa($id)
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

    public function edit_nilai($id, $kd, $pen, $jenis)

    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $this->db->distinct();
        $bagidata =
            $this->db->select('s.nis,mk.kd_id')
            ->from('t_kelas_siswa k')
            ->join('t_mapel_kd mk', 'k.rombel = mk.tingkat', 'left')
            ->join('t_guru_mapel gm', 'k.rombel = gm.id_kelas', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['mk.kd_id' => $kd], 'ASC')
            ->where(['k.ta' => $ta], 'ASC')
            ->get()->result_array();
        // return $bagidata;

        foreach ($bagidata as $bd) {
            $siswa = $this->db->get_where('t_nilai_p', ['id_guru_mapel' => $id, 'id_mapel_kd' => $bd['kd_id'], 'jenis' => $jenis, 'penilaian' => $pen, 'tasm' => $tasm, 'id_siswa' => $bd['nis']])->row_array();
            //var_dump($siswa);
            //var_dump($bd['nis']);
            //break;
            if ($siswa == 0) {
                $this->db->insert('t_nilai_p', ['id_guru_mapel' => $id, 'id_mapel_kd' => $bd['kd_id'], 'jenis' => $jenis, 'penilaian' => $pen, 'tasm' => $tasm, 'id_siswa' => $bd['nis']]);
            }
        }
        //die;

        $bagidata =
            $this->db->select('k.*,s.nama,mk.kd_id,mk.no_kd_1,mk.nama_kd_1,mk.no_kd_2,mk.nama_kd_2,mk.id_mapel,gm.id_kelas,gm.mapel_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['mk.kd_id' => $kd], 'ASC')
            ->where(['k.penilaian' => $pen], 'ASC')
            ->where(['k.jenis' => $jenis], 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end ubah nilai

    // hapus nilai 
    public function hapus_nilai($id, $kd, $pen, $jenis)

    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        // $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.no_kd_1,mk.nama_kd_1,mk.no_kd_2,mk.nama_kd_2,mk.id_mapel,gm.id_kelas,gm.mapel_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['mk.kd_id' => $kd], 'ASC')
            ->where(['k.penilaian' => $pen], 'ASC')
            ->where(['k.jenis' => $jenis], 'ASC')
            ->where(['k.tasm' => $tasm], 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end hapus nilai

    // proses tambah nilai
    public function get_mapel($id)
    {
        $bagidata =
            $this->db->select('gm.*,mm.nama,mk.rombel,mg.nama_guru')
            ->from('t_guru_mapel gm')       
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('t_kelas_siswa mk', 'gm.id_kelas = mk.rombel', 'left')
            ->join('m_guru mg', 'gm.id_guru = mg.nip', 'left')
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['gm.mapel_id' => $id, 'ASC'])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_export_siswa($id)
    {
        $data =  $this->db->select('k.*,mm.nama,mm.nis')
            ->from('t_kelas_siswa k')
            ->join('m_siswa mm', 'k.id_siswa = mm.nis', 'left')
            ->where(['k.id_kelas' => $id, 'ASC'])
            ->get()->result_array();
        return $data;
    }

    public function get_tingkat($id)
    {
        $bagidata =
            $this->db->select('a.*')
            ->from('t_guru_mapel a')           
            ->where(['a.mapel_id' => $id, 'ASC'])
            ->where(['a.id_guru' => $this->session->userdata('nik')])           
            ->get()->result();
        return $bagidata;
    }
    // end proses pas  


}
