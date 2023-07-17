<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_sikap_so_model extends CI_Model


{
    // index

    public function get_kelas()

    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tasm = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap,w.tasm')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('pegawai_data pd', 'w.id_guru = pd.nik', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.ta' => $tasm])
            ->where(['w.tasm' => $tasm])
            ->get()->row_array();

        return $bagidata;
    }



    public function tampil_data_pts()

    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = $get_tasm['tahun'];
        $tasm = substr($data['tasm'], 0, 4);


        $bagidata =
            $this->db->select('k.*,s.nama')
            ->from('t_nilai_sikap_so k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.penilaian' => 'PTS'])
            ->where(['k.tasm' =>  $tahun])
            ->where(['w.tasm' => $tasm])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();

        return $bagidata;
    }



    public function tampil_data_pas()

    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = $get_tasm['tahun'];
        $tasm = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,s.nama')
            ->from('t_nilai_sikap_so k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.penilaian' => 'PAS'])
            ->where(['k.tasm' =>  $tahun])
            ->where(['w.tasm' => $tasm])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();

        return $bagidata;
    }

public function get_siswa_pts()

    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $result = $this->db->get_where('t_nilai_sikap_so', ["penilaian" => 'PTS', 'is_wali' == 'Y', 'tasm' == $tasm])->row_array();
        if ($result['predikat'] == '' || $result['selalu']  ==  0 || $result['mulai_meningkat'] == 0) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_nilai_sikap_so na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.ta' => $tahun])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('k.*,s.nama,s.nis')
                ->from('t_nilai_sikap_so k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.penilaian' => 'PTS'])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->where(['k.tasm' => $tasm])
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

        $result = $this->db->get_where('t_nilai_sikap_so', ["penilaian" => 'PAS', 'is_wali' == 'Y', 'tasm' == $tasm])->row_array();
        if ($result['predikat'] == '' || $result['selalu']  ==  0 || $result['mulai_meningkat'] == 0) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_nilai_sikap_so na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.ta' => $tahun])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('k.*,s.nama,s.nis')
                ->from('t_nilai_sikap_so k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.penilaian' => 'PAS'])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->where(['k.tasm' => $tasm])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        }
    }


    public function q_list_kd()

    {
        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_kd')
            ->where(['jenis' => 'SSo'])
            ->get();
        return $bagidata;
    }

    // end index

    // tambah data

    public function simpan_nilai_pts()

    {

        $p = $this->input->post();
        $error = array();
        for ($i = 1; $i < $p['jumlah']; $i++) {
            $selalu = empty($p['selalu_' . $i]) ? "" : $p['selalu_' . $i];
            $meningkat = empty($p['meningkat_' . $i]) ? "" : $p['meningkat_' . $i];
            // echo var_dump($selalu);
            // echo var_dump($meningkat);
            if (!empty($selalu)) {
                if (in_array($meningkat, $selalu)) {
                    $error[] = "Error baris " . $i . " : Isian \"meningkat\" sudah dipakai di isian \"Selalu\"";
                }
            } else {
                $error[] = "Error baris " . $i . " : masih kosong";
            }
        }
        if (empty($error)) {

            $strsql = "";

            for (
                $i = 1;
                $i < $p['jumlah'];
                $i++

            ) {

                $data = [

                    "tasm" => $p['tasm'],
                    "id_kelas" => $p['id_kelas'],
                    "id_siswa" => $p['id_siswa_' . $i],
                    "predikat" => $p['predikat_' . $i],
                    "selalu" => implode(",", $p['selalu_' . $i]),
                    "mulai_meningkat" => $p['meningkat_' . $i],
                    "is_wali" => 'Y',
                    "penilaian" => 'PTS',
                ];

                $result = $this->db->get_where('t_nilai_sikap_so', ["id_kelas" => $p['id_kelas'], "id_siswa" => $p['id_siswa_' . $i], "tasm" => $p['tasm'], "penilaian" => 'PTS'])->row_array();

                if ($result == 0) {
                    $this->db->insert('t_nilai_sikap_so', $data);
                } else {
                    $this->db->where('id', $result['id']);
                    $this->db->update('t_nilai_sikap_so', $data);
                }
            }

            $d['status'] = "ok";
            $d['data'] = "Data berhasil disimpan..";
        } else {
            $d['status'] = "gagal";
            $d['data'] = implode("<br>", $error);
        }
    }



    public function simpan_nilai_pas()

    {

        $p = $this->input->post();
        $error = array();

        for ($i = 1; $i < $p['jumlah']; $i++) {
            $selalu = empty($p['selalu_' . $i]) ? "" : $p['selalu_' . $i];
            $meningkat = empty($p['meningkat_' . $i]) ? "" : $p['meningkat_' . $i];
            // echo var_dump($selalu);
            // echo var_dump($meningkat);
            if (!empty($selalu)) {
                if (in_array($meningkat, $selalu)) {
                    $error[] = "Error baris " . $i . " : Isian \"meningkat\" sudah dipakai di isian \"Selalu\"";
                }
            } else {
                $error[] = "Error baris " . $i . " : masih kosong";
            }
        }

        if (empty($error)) {
            $strsql = "";
            for ($i = 1; $i < $p['jumlah']; $i++) {
                $data = [
                    "tasm" => $p['tasm'],
                    "id_kelas" => $p['id_kelas'],
                    "id_siswa" => $p['id_siswa_' . $i],
                    "predikat" => $p['predikat_' . $i],
                    "selalu" => implode(",", $p['selalu_' . $i]),
                    "mulai_meningkat" => $p['meningkat_' . $i],
                    "is_wali" => 'Y',
                    "penilaian" => 'PAS',

                ];

                $result = $this->db->get_where('t_nilai_sikap_so', ["id_kelas" => $p['id_kelas'], "id_siswa" => $p['id_siswa_' . $i], "tasm" => $p['tasm'], "penilaian" => 'PAS'])->row_array();
                if ($result == 0) {
                    $this->db->insert('t_nilai_sikap_so', $data);
                } else {
                    $this->db->where('id', $result['id']);
                    $this->db->update('t_nilai_sikap_so', $data);
                }
            }

            $d['status'] = "ok";
            $d['data'] = "Data berhasil disimpan..";
        } else {
            $d['status'] = "gagal";
            $d['data'] = implode("<br>", $error);
        }
    }
    // end tambah data

    // cetak

    public function cetak($id)

    {

        $bagidata =

            $this->db->select('k.*,ks.tingkat,s.nama,w.id_guru,na.*,s.nis')
            ->from('t_kelas_siswa k')
            ->join('m_kelas ks', 'k.id_kelas = ks.tingkat', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
            ->join('t_nilai_sikap_so na', 'k.id_siswa = na.id_siswa', 'left')
            ->where(['k.id_kelas' => $id])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();

        return $bagidata;
    }

    // end cetak

}
