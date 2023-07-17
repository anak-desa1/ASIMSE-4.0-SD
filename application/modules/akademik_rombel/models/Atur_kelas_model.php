<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_kelas_model extends CI_Model

{
    // index
    public function get_tampil()
    {
        $bagidata =
            $this->db->select('a.*,b.nama')
            ->from('t_kelas_siswa a')
            ->join('m_kelas b', 'a.id_kelas = b.tingkat', 'left')
            ->group_by('a.id_kelas', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_siswarombel($ta)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,s.*')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where('k.ta',  $ta)
            ->group_by('k.rombel')
            ->get()->result_array();
        return $bagidata;
    }
    // end index
    // atur rombel
    public function get_aturrombel($id)
    {
        $bagidata =
            $this->db->select('k.*')
            ->from('m_kelas k')
            ->where(['k.tingkat' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_siswa_at($id)
    {
        $bagidata =
            $this->db->select('k.*,s.nama,nk.nis')
            ->from('t_kelas_siswa k')
            ->join('m_naik_kelas nk', 'k.id_siswa = nk.nis', 'left')
            ->join('m_siswa s', 'nk.nis = s.nis', 'left')
            ->where(['k.id_kelas' => $id])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end atur rombel
    // rombel
    public function get_rombel($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*')
            ->from('t_kelas_siswa k')
            // ->join('pegawai_data pd', 'pd.nik = w.id_guru', 'left')
            ->where(['k.rombel' => $id])
            ->where('k.ta',  $ta)
            ->get()->row_array();
        return $bagidata;
    }

    public function get_siswa_r($id)
    {
        $bagidata =
            $this->db->select('k.*,s.*,nk.*')
            ->from('t_kelas_siswa k')
            ->join('m_naik_kelas nk', 'k.id_siswa = nk.nis', 'left')
            ->join('m_siswa s', 'nk.nis = s.nis', 'left')
            ->where(['k.rombel' => $id])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end rombel
    // proses tambah
    public function get_kelas()
    {
        $this->db->select('*');
        $this->db->from('m_kelas');
        // $this->db->where(['tingkat' => $id]);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tahun()
    {
        $this->db->select('*');
        $this->db->from('t_tahun');
        $this->db->where(['aktif' => 'Y']);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_sekolah()
    {
        $this->db->select('*');
        $this->db->from('l_sekolah');
        $query = $this->db->get();
        return $query->result();
    }

    public function getLokasi()
    {
        return $this->db->get('l_sekolah')->result_array();
    }

    public function kelas_simpan()
    {
        $id_siswa = $this->input->post('id_siswa', true);
        $p = $this->input->post();

        for ($i = 0; $i < sizeof($id_siswa); $i++) {
            $data = [
                "id_siswa" =>  $id_siswa[$i],
                "id_kelas" => $p['id_kelas'],
                "rombel" => $p['rombel'],
                "ta" => $p['ta'],
            ];
            $this->db->insert('t_kelas_siswa', $data);
        }

        $nis = $this->input->post('id_siswa', true);

        for ($i = 0; $i < sizeof($nis); $i++) {
            $data1 = [
                "tingkat_active" => 1,
            ];
            $this->db->where('nis', $nis[$i]);
            $this->db->update('m_naik_kelas', $data1);
        }
    }
    // end proses tambah
}
