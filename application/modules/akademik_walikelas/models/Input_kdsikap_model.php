<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_kdsikap_model extends CI_Model

{
    // index
    public function get_tampil()
    {
        $bagidata =
            $this->db->select('k.*,ks.tingkat')
            ->from('t_walikelas k')
             ->join('m_kelas ks', 'k.id_kelas = ks.tingkat', 'left')
            ->where(['k.wali_activate' => 1])
            ->get()->result_array();
        return $bagidata;
    }
    // end index
    // detail
    public function get_detailkd()
    {
        $bagidata =
            $this->db->select('k.*,ks.*,pd.nama_lengkap')
            ->from('t_walikelas k')
            ->join('m_kelas ks', 'k.id_kelas = ks.tingkat', 'left')
            ->join('pegawai_data pd', 'k.id_guru = pd.nik', 'left')
            // ->where(['k.id_kelas' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_kd()
    {
        $bagidata =
            $this->db->select('k.*,s.*')
            ->from('t_mapel_kd k')
            ->join('t_walikelas gm', 'k.id_guru = gm.id_guru', 'left')
            ->join('m_kelas s', 'k.tingkat = s.tingkat', 'left')
            // ->where(['k.tingkat' => $id])
            ->get()->result_array();
        return $bagidata;
    }
    // end detail
}
