<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pembayaran_m extends CI_Model
{

    public function getTotalBiaya($periode)
    {
        $bagidata =
            $this->db->select('sum(jumlah) as total')
            ->from('ppdb_biaya')
            ->where(['status' => 1])
            ->where(['periode' => $periode])
            ->get()->row_array();
        return $bagidata;
    }

    public function getBayar()
    {
        $bagidata =
            $this->db->select('a.*,b.nama')
            ->from('ppdb_bayar a')
            ->join('ppdb_daftar b', 'a.id_daftar=b.id_daftar')
            ->where(['a.id_daftar' => $this->session->userdata('id_daftar')])
            ->get()->result_array();
        return $bagidata;
    }

    public function getTotalBayar()
    {
        $bagidata =
            $this->db->select('sum(jumlah) as total')
            ->from('ppdb_bayar')
            ->where(['id_daftar' => $this->session->userdata('id_daftar')])
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

    public function detail($id)
    {
        $bagidata =
            $this->db->select('*')
            ->from('ppdb_bayar')
            ->where(['id_bayar' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function hapusdata($id)
    {
        $this->db->delete('ppdb_bayar', ['id_bayar' => $id]);
    }
}
