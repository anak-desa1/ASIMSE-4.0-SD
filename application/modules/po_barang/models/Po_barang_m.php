<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po_barang_m extends CI_Model
{
    // tampil master biaya
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

    public function getBiaya()
    {
        $bagidata =
            $this->db->select('*')
            ->from('ppdb_biaya')
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditBiaya($id)
    {
        $bagidata =
            $this->db->select('*')
            ->from('ppdb_biaya')
            ->where(['id_biaya' => $id])
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah()
    {
        $id_biaya = htmlspecialchars($this->input->post('id_biaya', true));
        $kd_campus = htmlspecialchars($this->input->post('kd_campus', true));
        $kd_sekolah = htmlspecialchars($this->input->post('kd_sekolah', true));
        $periode = htmlspecialchars($this->input->post('periode', true));
        $nama_biaya = htmlspecialchars($this->input->post('nama', true));
        $jumlah = htmlspecialchars($this->input->post('jumlah', true));

        $data = [
            'id_biaya' => $id_biaya,
            'kd_campus' => $kd_campus,
            'kd_sekolah' => $kd_sekolah,
            'periode' => $periode,
            'nama_biaya' => $nama_biaya,
            'jumlah' => $jumlah,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('ppdb_biaya', $data);
    }

    public function simpan_edit()
    {
        $id_biaya = htmlspecialchars($this->input->post('id_biaya', true));
        $periode = htmlspecialchars($this->input->post('periode', true));
        $nama_biaya = htmlspecialchars($this->input->post('nama', true));
        $jumlah = htmlspecialchars($this->input->post('jumlah', true));

        $this->db->set('periode', $periode);
        $this->db->set('nama_biaya', $nama_biaya);
        $this->db->set('jumlah', $jumlah);
        $this->db->where('id_biaya', $id_biaya);
        $this->db->update('ppdb_biaya');
    }
    // end tampil master biaya

    //  tampil pembayaran
    public function getCariData()
    {
        $bagidata =
            $this->db->select('no_daftar,id_daftar,nama')
            ->from('ppdb_daftar')
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            // ->where(['status' => 1])
            ->get()->result_array();
        return $bagidata;
    }

    public function getTotalBiaya($periode)
    {
        $bagidata =
            $this->db->select('sum(jumlah) as total')
            ->from('ppdb_biaya')
            ->where(['status' => 1])
            ->where(['periode' => $periode])
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->get()->row_array();
        return $bagidata;
    }

    public function getBayar($id)
    {
        $bagidata =
            $this->db->select('a.*,b.id_daftar,b.nama')
            ->from('ppdb_bayar a')
            ->join('ppdb_daftar b', 'a.id_daftar = b.id_daftar')
            ->where(['b.id_daftar' => $id])
            // ->where(['b.kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->get()->result_array();
        return $bagidata;
    }

    public function getDetailBayar($id)
    {
        $bagidata =
            $this->db->select('a.*,b.nama')
            ->from('ppdb_bayar a')
            ->join('ppdb_daftar b', 'a.id_daftar = b.id_daftar')
            ->where(['a.id_bayar' => $id])
            // ->where(['b.kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->get()->row_array();
        return $bagidata;
    }

    public function getTotalBayar($id)
    {
        $bagidata =
            $this->db->select('sum(jumlah) as total')
            ->from('ppdb_bayar')
            ->where(['id_daftar' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function getIdbayar()
    {
        $bagidata =
            $this->db->select('max(id_bayar) AS last')
            ->from('ppdb_bayar')
            ->get()->row_array();
        return $bagidata;
    }

    public function hapusdata($id)
    {
        $this->db->delete('ppdb_bayar', ['id_bayar' => $id]);
    }

    // end tampil pembayaran

    // verifikasi_biaya
    public function getPembayaranBelum()
    {
        $bagidata =
            $this->db->select('*')
            ->from('ppdb_bayar a')
            ->join('ppdb_daftar b', 'a.id_daftar=b.id_daftar')
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->where(['a.verifikasi' => 0])
            ->get()->result_array();
        return $bagidata;
    }

    public function getPembayaranSudah()
    {
        $bagidata =
            $this->db->select('*')
            ->from('ppdb_bayar a')
            ->join('ppdb_daftar b', 'a.id_daftar=b.id_daftar')
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->where(['a.verifikasi' => 1])
            ->get()->result_array();
        return $bagidata;
    }

    public function cek_verifikasi_biaya($id_biaya)
    {

        $this->db->set('verifikasi', 1);
        $this->db->where('id_bayar', $id_biaya);
        $this->db->update('ppdb_bayar');
    }

    public function uncek_verifikasi_biaya($id_biaya)
    {

        $this->db->set('verifikasi', 0);
        $this->db->where('id_bayar', $id_biaya);
        $this->db->update('ppdb_bayar');
    }

    public function getDataPembayaran($id_bayar)
    {
        $bagidata =
            $this->db->select('a.*,b.nama')
            ->from('ppdb_bayar a')
            ->join('ppdb_daftar b', 'a.id_daftar=b.id_daftar')
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->where(['a.id_bayar' => $id_bayar])
            ->get()->row_array();
        return $bagidata;
    }

    public function getPembayaran($id_bayar)
    {
        $bagidata =
            $this->db->select('a.*,b.nama')
            ->from('ppdb_bayar a')
            ->join('ppdb_daftar b', 'a.id_daftar=b.id_daftar')
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->where(['a.id_bayar' => $id_bayar])
            ->get()->result_array();
        return $bagidata;
    }
    // end verifikasi_biaya
}
