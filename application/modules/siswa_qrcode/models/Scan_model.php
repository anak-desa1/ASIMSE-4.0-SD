<?php
class Scan_model extends Ci_Model
{

    public function cek_id($id_siswa)
    {
        $query_str =
            $this->db->where('id_siswa', $id_siswa)
            ->get('t_kelas_siswa');
        if ($query_str->num_rows() > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }

    public function absen_masuk($data)
    {
        return $this->db->insert('ab_presensi', $data);
    }

    public function get_siswa($id_siswa, $tgl)
    {
        // $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        // $data['tasm'] = $get_tasm['tahun'];
        // $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('a.*,b.rombel nm_kelas,b.kd_sekolah, b.ta, c.nis,c.nama nm_siswa,d.nama_khd,e.nama_status')
            ->from('ab_presensi a')
            ->join('t_kelas_siswa b', 'a.id_siswa = b.id_siswa', 'left')
            ->join('m_siswa c', 'b.id_siswa = c.nis', 'left')
            ->join('ab_kehadiran d', 'a.id_khd = d.id_khd', 'left')
            ->join('ab_stts e', 'a.id_status = e.id_status', 'left')
            ->where(['a.id_siswa' => $id_siswa])
            ->where(['a.tgl' => $tgl])
            // ->group_by('k.rombel')          
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

    public function absen_pulang($id_siswa, $data)
    {
        $tgl = date('Y-m-d');
        return $this->db->where('id_siswa', $id_siswa)
            ->where('tgl', $tgl)
            ->update('ab_presensi', $data);
    }
}
