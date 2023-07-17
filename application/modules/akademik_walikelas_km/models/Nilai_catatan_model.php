<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_catatan_model extends CI_Model

{
    // Nilai_catatan
    // index
    public function get_kelas()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap,w.tasm')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('pegawai_data pd', 'w.id_guru = pd.nik', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.ta' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_siswa()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,s.nama,s.nis,w.id_guru')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->where(['k.ta' => $tahun])
            ->where(['w.tasm' => $tahun])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_tampil()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('a.*, b.nama, a.naik, a.catatan_wali')
            ->from('t_naik_kelas a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
            ->join('t_kelas_siswa c', 'a.id_siswa = c.id_siswa', 'left')
            ->join('t_walikelas d', 'c.rombel = d.id_kelas', 'left')
            ->where(['d.id_guru' => $this->session->userdata('nik')])
            ->where(['b.th_active' => $tahun])
            ->where(['c.ta' => $tahun])
            ->where(['d.tasm' => $tahun])
            ->where(['a.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }

    public function get_siswa_pts()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $result = $this->db->get_where('t_naik_kelas', ['tasm' => $tasm, 'penilaian' => 'PTS'])->row_array();
        if ($result == 1) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.catatan_wali,na.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_naik_kelas na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['na.penilaian' => 'PTS'])
                ->where(['k.ta' => $tahun])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->where(['na.tasm' => $tasm])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('s.nama,s.nis,w.id_guru,t.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_naik_kelas t', 'k.id_siswa = t.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.ta' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        }
    }

    public function get_siswa_pas()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $result = $this->db->get_where('t_naik_kelas', ['tasm' => $tasm, 'penilaian' => 'PAS'])->row_array();
        if ($result == 1) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.catatan_wali,na.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_naik_kelas na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['na.penilaian' => 'PAS'])
                ->where(['k.ta' => $tahun])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->where(['na.tasm' => $tasm])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('s.nama,s.nis,w.id_guru,t.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_naik_kelas t', 'k.id_siswa = t.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.ta' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        }
    }

    public function get_siswa_pat()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $result = $this->db->get_where('t_naik_kelas', ['tasm' => $tasm, 'penilaian' => 'PAT'])->row_array();
        if ($result == 1) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.catatan_wali,na.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_naik_kelas na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['na.penilaian' => 'PAT'])
                ->where(['k.ta' => $tahun])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->where(['na.tasm' => $tasm])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('s.nama,s.nis,w.id_guru,t.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_naik_kelas t', 'k.id_siswa = t.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.ta' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        }
    }

    // end index
    // simpan
    public function simpan_pts()
    {
        $p = $this->input->post();
        for ($i = 1; $i < $p['jumlah']; $i++) {
            $data = [
                "tasm" => $p['tasm'],
                "id_siswa" => $p['id_siswa_' . $i],
                "catatan_wali" => $p['catatan_' . $i] == "" ? "-" : $p['catatan_' . $i],
                "penilaian" => 'PTS',
            ];
            $result = $this->db->get_where('t_naik_kelas', ["id_siswa" => $p['id_siswa_' . $i], "tasm" => $p['tasm'], "penilaian" => 'PTS'])->row_array();
            if ($result == 0) {
                $this->db->insert('t_naik_kelas', $data);
            } else {
                $this->db->where('id', $result['id']);
                $this->db->update('t_naik_kelas', $data);
            }
        }
    }

    public function simpan_pas()
    {
        $p = $this->input->post();
        for ($i = 1; $i < $p['jumlah']; $i++) {
            $data = [
                "tasm" => $p['tasm'],
                "id_siswa" => $p['id_siswa_' . $i],
                "catatan_wali" => $p['catatan_' . $i] == "" ? "-" : $p['catatan_' . $i],
                "penilaian" => 'PAS',
            ];
            $result = $this->db->get_where('t_naik_kelas', ["id_siswa" => $p['id_siswa_' . $i], "tasm" => $p['tasm'], "penilaian" => 'PAS'])->row_array();
            if ($result == 0) {
                $this->db->insert('t_naik_kelas', $data);
            } else {
                $this->db->where('id', $result['id']);
                $this->db->update('t_naik_kelas', $data);
            }
        }
    }

    public function simpan_pat()
    {
        $p = $this->input->post();
        for ($i = 1; $i < $p['jumlah']; $i++) {
            $data = [
                "tasm" => $p['tasm'],
                "id_siswa" => $p['id_siswa_' . $i],
                "naik" => $p['naik_' . $i],
                "kelas" => $p['kelas_' . $i],
                "catatan_wali" => $p['catatan_' . $i] == "" ? "-" : $p['catatan_' . $i],
                "penilaian" => 'PAT',
            ];
            $result = $this->db->get_where('t_naik_kelas', ["id_siswa" => $p['id_siswa_' . $i], "tasm" => $p['tasm'], "penilaian" => 'PAT'])->row_array();
            if ($result == 0) {
                $this->db->insert('t_naik_kelas', $data);
            } else {
                $this->db->where('id', $result['id']);
                $this->db->update('t_naik_kelas', $data);
            }
        }
    }
    // end simpan
}
