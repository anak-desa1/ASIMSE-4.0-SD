<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PpdbPendaftar_m extends CI_Model
{
    // tampil master_Daftar
    public function getAllKampus()
    {
        return $this->db->get_where('l_campus', ['is_active' => 1])->result_array();
    }

    public function getAllPeriode()
    {
        return $this->db->get_where('ppdb_periode', ['is_active' => 1])->result_array();
    }

    public function getAllJenis()
    {
        return $this->db->get_where('ppdb_jenis', ['status' => 1])->result_array();
    }

    public function getAsalSekolah()
    {
        return $this->db->get_where('ppdb_sekolah', ['status' => 1])->result_array();
    }

    public function getDaftar()
    {
        $get_tasm = $this->db->get_where('ppdb_periode', ['is_active' => 1])->row_array();
        $tahun = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('')
            ->from('ppdb_daftar')
            ->where(['tgl_daftar' =>  $tahun])
            ->where(['is_active' => 1])
            ->get()->result_array();
        return $bagidata;
    }

    public function getBayar()
    {
        $bagidata =
            $this->db->select('id_daftar,sum(jumlah) as total')
            ->from('ppdb_bayar')
            ->where(['verifikasi' => 1])
            ->get()->result_array();
        return $bagidata;
    }

    public function  getCetakTotalBiaya($periode)
    {
        $bagidata =
            $this->db->select('sum(jumlah) as total')
            ->from('ppdb_biaya')
            ->where(['periode' => $periode])
            ->get()->row_array();
        return $bagidata;
    }

    public function getCetakBayar($id)
    {
        $bagidata =
            $this->db->select('a.*,b.nama')
            ->from('ppdb_bayar a')
            ->join('ppdb_daftar b', 'a.id_daftar=b.id_daftar')
            ->where(['a.id_daftar' => $id])
            ->get()->result_array();
        return $bagidata;
    }

    public function getCetakTotalBayar($id)
    {
        $bagidata =
            $this->db->select('sum(jumlah) as total')
            ->from('ppdb_bayar')
            ->where(['id_daftar' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah_pendaftar()
    {
        $data = $this->db->select('max(no_daftar) as maxKode')
            ->from('ppdb_daftar')
            ->get()->row_array();
        $allPeriode =  $this->db->get_where('ppdb_periode', ['periode' => $this->input->post('periode', true), 'is_active' => 1])->row_array();

        $kodedaftar = $data['maxKode'];
        $noUrut = (int) substr($kodedaftar, 8, 3);
        $noUrut++;
        $tahun = $allPeriode['tahun'];
        $char = "PPDB" . $tahun;
        $newID = $char . sprintf("%03s", $noUrut);
        // var_dump($no_daftar);
        // die;

        $jenis = $this->input->post('jenis', true);
        $nik = $this->input->post('nik', true);
        $nama = $this->input->post('nama', true);
        $periode = $this->input->post('periode', true);
        $no_hp = $this->input->post('no_hp', true);
        $kelas = $this->input->post('kelas', true);

        $npsn_asal = $this->input->post('npsn', true);
        $asal = $this->db->get_where('ppdb_sekolah', ['npsn' => $npsn_asal])->row_array();
        $asal_sekolah = $asal['nama_sekolah'];

        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $tgl_lahir = $this->input->post('tgl_lahir', true);
        $password = $this->input->post('password');
        $password1 = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = [
            "no_daftar" => $newID,
            "jenis" => $jenis,
            "nik" => $nik,
            "nama" => $nama,
            "periode" => $periode,
            "no_hp" => $no_hp,
            "kelas" => $kelas,
            "asal_sekolah" => $asal_sekolah,
            "npsn_asal" => $npsn_asal,
            "tempat_lahir" => $tempat_lahir,
            "tgl_lahir" => $tgl_lahir,
            "password" => $password1,
            "password_x" => $password,
            "foto" => 'default-avatar.png',
            "is_active" => 1,
            "tgl_daftar" =>  date('Y'),
        ];

        $this->db->insert('ppdb_daftar', $data);
    }

    public function simpan_edit_pendaftar()
    {
        $id_daftar = htmlspecialchars($this->input->post('id_daftar', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('status', $status);
        $this->db->where('id_daftar', $id_daftar);
        $this->db->update('ppdb_daftar');
    }
    // end tampil master_Daftar

    // tampil master_Daftar_Cadangan
    public function getDaftarCadangan()
    {
        $get_tasm = $this->db->get_where('ppdb_periode', ['is_active' => 1])->row_array();
        $tahun = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('')
            ->from('ppdb_daftar')
            ->where(['tgl_daftar' =>  $tahun])
            ->where(['status' => 2])
            ->get()->result_array();
        return $bagidata;
    }
    // end tampil master_Daftar_Cadangan

    //  tampil master_Daftar_Diterima
    public function getDaftarDiterima()
    {
        $get_tasm = $this->db->get_where('ppdb_periode', ['is_active' => 1])->row_array();
        $tahun = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('')
            ->from('ppdb_daftar')
            ->where(['tgl_daftar' =>  $tahun])
            ->where(['status' => 1])
            ->get()->result_array();
        return $bagidata;
    }
    // end tampil master_Daftar_Diterima    
}
