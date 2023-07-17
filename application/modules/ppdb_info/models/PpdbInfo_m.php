<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PpdbInfo_m extends CI_Model
{
    // tampil master biaya
    public function getDataKontak()
    {
        $bagidata =
            $this->db->select('*')
            ->from('ppdb_kontak')
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditKontak($id)
    {
        $bagidata =
            $this->db->select('*')
            ->from('ppdb_kontak')
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->where(['id_kontak' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah()
    {

        // $kd_campus = htmlspecialchars($this->input->post('kd_campus', true));
        // $kd_sekolah = htmlspecialchars($this->input->post('kd_sekolah', true));
        $nama_kontak = htmlspecialchars($this->input->post('nama', true));
        $no_kontak = htmlspecialchars($this->input->post('nohp', true));

        $data = [

            // 'kd_campus' => $kd_campus,
            // 'kd_sekolah' => $kd_sekolah,
            'nama_kontak' => $nama_kontak,
            'no_kontak' => $no_kontak,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('ppdb_kontak', $data);
    }

    public function simpan_edit()
    {
        $id_kontak = htmlspecialchars($this->input->post('id_kontak', true));
        $nama_kontak = htmlspecialchars($this->input->post('nama', true));
        $no_kontak = htmlspecialchars($this->input->post('nohp', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('nama_kontak', $nama_kontak);
        $this->db->set('no_kontak', $no_kontak);
        $this->db->set('status', $status);
        $this->db->where('id_kontak', $id_kontak);
        $this->db->update('ppdb_kontak');
    }
    // end tampil master biaya

    //info_pembayaran
    public function getInfo()
    {
        $bagidata =
            $this->db->select('*')
            ->from('m_sekolah')
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_info_pembayaran()
    {
        $sekolah_id = htmlspecialchars($this->input->post('sekolah_id', true));
        $infobayar = stripslashes($this->input->post('info', true));

        $this->db->set('infobayar', $infobayar);
        $this->db->where('sekolah_id', $sekolah_id);
        $this->db->update('m_sekolah');
    }
    // end info_pembayaran

    // info_persyaratan
    public function simpan_info_persyaratan()
    {
        $sekolah_id = htmlspecialchars($this->input->post('sekolah_id', true));
        $syarat = stripslashes($this->input->post('info', true));

        $this->db->set('syarat', $syarat);
        $this->db->where('sekolah_id', $sekolah_id);
        $this->db->update('m_sekolah');
    }
    // end info_persyaratan

    // data_pengumuman
    public function getDataPengumuman()
    {
        $bagidata =
            $this->db->select('*')
            ->from('ppdb_pengumuman')
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->get()->result_array();
        return $bagidata;
    }

    public function getEdit_Pengumuman($id)
    {
        $bagidata =
            $this->db->select('*')
            ->from('ppdb_pengumuman')
            // ->where(['kd_sekolah' => $this->session->userdata('kd_sekolah')])
            ->where(['id_pengumuman' => $id])
            ->get()->row_array();
        return $bagidata;
    }


    public function simpan_tambah_pengumuman()
    {

        // $kd_campus = htmlspecialchars($this->input->post('kd_campus', true));
        // $kd_sekolah = htmlspecialchars($this->input->post('kd_sekolah', true));
        $id_user = htmlspecialchars($this->input->post('id_user', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $pengumuman = $this->input->post('pengumuman', true);
        $jenis = htmlspecialchars($this->input->post('jenis', true));

        $data = [

            // 'kd_campus' => $kd_campus,
            // 'kd_sekolah' => $kd_sekolah,
            'id_user' => $id_user,
            'judul' => $judul,
            'pengumuman' => stripslashes($pengumuman),
            'jenis' => $jenis,
        ];
        // insert ke table user
        $this->db->insert('ppdb_pengumuman', $data);
    }

    public function simpan_edit_pengumuman()
    {
        $id_pengumuman = htmlspecialchars($this->input->post('id_pengumuman', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $jenis = htmlspecialchars($this->input->post('jenis', true));
        $pengumuman = stripslashes($this->input->post('pengumuman', true));

        $this->db->set('judul', $judul);
        $this->db->set('jenis', $jenis);
        $this->db->set('pengumuman', $pengumuman);
        $this->db->where('id_pengumuman', $id_pengumuman);
        $this->db->update('ppdb_pengumuman');
    }
    // end data_pengumuman
}
