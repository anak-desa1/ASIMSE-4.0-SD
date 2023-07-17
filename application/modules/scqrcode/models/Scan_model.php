<?php
class Scan_model extends Ci_Model
{

    public function cek_id($id_siswa)
    {
        $query_str =
            $this->db->where('nis', $id_siswa)
            ->get('m_siswa');
        if ($query_str->num_rows() > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }

    public function get_Hadir(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('count(id_siswa) as hadir')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')               
            ->where(['a.tgl' => $tgl])
            ->where(['a.id_khd' => 1])
            ->get()->row_array();
        return $bagidata;  
    }

    public function get_Sakit(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('count(id_siswa) as sakit')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')                     
            ->where(['a.tgl' => $tgl])
            ->where(['a.id_khd' => 2])
            ->get()->row_array();
        return $bagidata;  
    }

    public function get_Ijin(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('count(id_siswa) as ijin')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')                     
            ->where(['a.tgl' => $tgl])
            ->where(['a.id_khd' => 3])
            ->get()->row_array();
        return $bagidata;  
    }

    public function get_Alpha(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('count(id_siswa) as alpha')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')                     
            ->where(['a.tgl' => $tgl])
            ->where(['a.id_khd' => 4])
            ->get()->row_array();
        return $bagidata;  
    }
    
    public function get_masuk(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('count(id_siswa) as masuk')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')               
            ->where(['a.tgl' => $tgl])
            ->where(['a.id_status' => 1])
            ->get()->row_array();
        return $bagidata;  
    }

    public function get_masuk_siswa(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('b.nama,b.nis')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')               
            ->where(['a.tgl' => $tgl])
            ->where(['a.id_status' => 1])
            ->order_by('a.jam_msk', 'DESC')
            ->limit(5)
            ->get()->result_array();
        return $bagidata;  
    }

    public function get_terlambat(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('count(id_siswa) as terlambat')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')               
            ->where(['a.tgl' => $tgl])
            ->where(['a.masuk' => 5])
            ->get()->row_array();
        return $bagidata;  
    }

    public function get_pulang(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('count(id_siswa) as pulang')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')               
            ->where(['a.tgl' => $tgl])
            ->where(['a.id_status' => 2])
            ->get()->row_array();
        return $bagidata;  
    }

    public function get_pulang_siswa(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('b.nama,b.nis')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')               
            ->where(['a.tgl' => $tgl])
            ->where(['a.id_status' => 2])
            ->order_by('a.jam_klr', 'DESC')
            ->limit(5)
            ->get()->result_array();
        return $bagidata;  
    }

    public function get_pulang_cepat(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('count(id_siswa) as pulang_capat')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')                     
            ->where(['a.tgl' => $tgl])
            ->where(['a.pulang' => 7])
            ->get()->row_array();
        return $bagidata;  
    }
    public function get_tidak_absen(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('count(id_siswa) as tidak_absen')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')                     
            ->where(['a.tgl' => $tgl])
            ->where(['a.id_status' => ''])
            ->get()->row_array();
        return $bagidata;  
    }

    public function total_masuk(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('count(id_siswa) as total_masuk')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')                     
            ->where(['a.tgl' => $tgl])
            ->where(['a.id_status' => 1])
            ->get()->row_array();
        return $bagidata;  
    }

    public function total_pulang(){

        $tgl = date('Y-m-d');

          $bagidata =
            $this->db->select('count(id_siswa) as total_pulang')
            ->from('ab_presensi a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')                     
            ->where(['a.tgl' => $tgl])
            ->where(['a.id_status' => 2])
            ->get()->row_array();
        return $bagidata;  
    }

    public function update()
    {
        $p = $this->input->post();
        $data['suhu'] = $p['suhu'];
        $this->db->where('id_siswa', $p['id_siswa']);
        $this->db->update('ab_presensi', $data);
    }

    public function cek_kehadiran($id_siswa, $tgl)
    {
        $query_str =
            $this->db->where('id_siswa', $id_siswa)
            ->where('tgl', $tgl)->get('ab_presensi');
        if ($query_str->num_rows() > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }

    public function absen_masuk($data_masuk)
    {
        $id_siswa = $data_masuk['id_siswa'];
        $tgl = $data_masuk['tgl'];
        $cek = $this->db->get_where('ab_presensi', ['id_siswa' => $id_siswa,'tgl' => $tgl])->row_array();
        if($cek == 0){
            return $this->db->insert('ab_presensi', $data_masuk);
        } else {
            return false;
        }        
    }

    public function absen_pulang($id_siswa, $data_pulang)
    {
        $tgl = date('Y-m-d');
        return $this->db->where('id_siswa', $id_siswa)
            ->where('tgl', $tgl)
            ->update('ab_presensi', $data_pulang);
    }
}
