<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PpdbSetting_m extends CI_Model
{
    // tampil master sekolah
    public function getSekolah()
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_sekolah')
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditSekolah($id)
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_sekolah')
            ->where(['npsn' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah()
    {
        $npsn = htmlspecialchars($this->input->post('npsn', true));
        $nama_sekolah = htmlspecialchars($this->input->post('nama', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));

        $data = [
            'npsn' => $npsn,
            'nama_sekolah' => $nama_sekolah,
            'alamat' => $alamat,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('ppdb_sekolah', $data);
    }

    public function simpan_edit()
    {
        $npsn = htmlspecialchars($this->input->post('npsn', true));
        $nama_sekolah = htmlspecialchars($this->input->post('nama', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('nama_sekolah', $nama_sekolah);
        $this->db->set('alamat', $alamat);
        $this->db->set('status', $status);
        $this->db->where('npsn', $npsn);
        $this->db->update('ppdb_sekolah');
    }
    // end tampil master sekolah

    // tampil master_jenis_daftar
    public function getJenisDaftar()
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_jenis')
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditJenisDaftar($id)
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_jenis')
            ->where(['id_jenis' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah_jenis()
    {
        $id_jenis = htmlspecialchars($this->input->post('id_jenis', true));
        $nama_jenis = htmlspecialchars($this->input->post('nama', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));

        $data = [
            'id_jenis' => $id_jenis,
            'nama_jenis' => $nama_jenis,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('ppdb_jenis', $data);
    }

    public function simpan_edit_jenis()
    {
        $id_jenis = htmlspecialchars($this->input->post('id_jenis', true));
        $nama_jenis = htmlspecialchars($this->input->post('nama', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('nama_jenis', $nama_jenis);
        $this->db->set('status', $status);
        $this->db->where('id_jenis', $id_jenis);
        $this->db->update('ppdb_jenis');
    }
    // end tampil master_jenis_daftar

    // master_kuota
    public function getKuota()
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_jurusan')
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditKuota($id)
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_jurusan')
            ->where(['id_jurusan' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah_kuota()
    {
        $id_jurusan = htmlspecialchars($this->input->post('id_jurusan', true));
        $nama_jurusan = htmlspecialchars($this->input->post('nama', true));
        $kuota = htmlspecialchars($this->input->post('kuota', true));

        $data = [
            'id_jurusan' => $id_jurusan,
            'nama_jurusan' => $nama_jurusan,
            'kuota' => $kuota,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('ppdb_jurusan', $data);
    }

    public function simpan_edit_kuota()
    {
        $id_jurusan = htmlspecialchars($this->input->post('id_jurusan', true));
        $nama_jurusan = htmlspecialchars($this->input->post('nama', true));
        $kuota = htmlspecialchars($this->input->post('kuota', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('nama_jurusan', $nama_jurusan);
        $this->db->set('kuota', $kuota);
        $this->db->set('status', $status);
        $this->db->where('id_jurusan', $id_jurusan);
        $this->db->update('ppdb_jurusan');
    }
    // end master_kuota

    // master_periode
    public function getPeriode()
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_periode')
            ->order_by('id', 'DESC')
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditPeriode($id)
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_periode')
            ->where(['id' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah_periode()
    {
        $periode = htmlspecialchars($this->input->post('periode', true));
        $tgl_mulai = htmlspecialchars($this->input->post('tgl_mulai', true));
        $tgl_selesai = htmlspecialchars($this->input->post('tgl_selesai', true));
        $tahun = htmlspecialchars($this->input->post('tahun', true));

        $data = [
            'periode' => $periode,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai,
            'tahun' => $tahun,
            'status' => 'Aktif',
            'is_active' => 1,
        ];
        // insert ke table user
        $this->db->insert('ppdb_periode', $data);
    }

    public function simpan_edit_periode()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $periode = htmlspecialchars($this->input->post('periode', true));
        $tgl_mulai = htmlspecialchars($this->input->post('tgl_mulai', true));
        $tgl_selesai = htmlspecialchars($this->input->post('tgl_selesai', true));
        $tahun = htmlspecialchars($this->input->post('tahun', true));
        $status = htmlspecialchars($this->input->post('status', true));
        $is_active = htmlspecialchars($this->input->post('is_active', true));

        $this->db->set('periode', $periode);
        $this->db->set('tgl_mulai', $tgl_mulai);
        $this->db->set('tgl_selesai', $tgl_selesai);
        $this->db->set('tahun', $tahun);
        $this->db->set('status', $status);
        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('ppdb_periode');
    }
    // end master_periode

    // master_mapel
    public function getMapel()
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_mapel')
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditMapel($id)
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_mapel')
            ->where(['id_mapel' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah_mapel()
    {
        $id_mapel = htmlspecialchars($this->input->post('id_mapel', true));
        $nama_mapel = htmlspecialchars($this->input->post('nama_mapel', true));

        $data = [
            'id_mapel' => $id_mapel,
            'nama_mapel' => $nama_mapel,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('ppdb_mapel', $data);
    }

    public function simpan_edit_mapel()
    {
        $id = htmlspecialchars($this->input->post('id_mapel', true));
        $nama_mapel = htmlspecialchars($this->input->post('nama_mapel', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('nama_mapel', $nama_mapel);
        $this->db->set('status', $status);
        $this->db->where('id_mapel', $id);
        $this->db->update('ppdb_mapel');
    }
    // end master_mapel

    // master_bank
    public function getBank()
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_bank')
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditBank($id)
    {
        $bagidata =
            $this->db->select('')
            ->from('ppdb_bank')
            ->where(['kode_bank' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah_bank()
    {
        $kode_bank = htmlspecialchars($this->input->post('kode_bank', true));
        $nama_bank = htmlspecialchars($this->input->post('nama_bank', true));

        $data = [
            'kode_bank' => $kode_bank,
            'nama_bank' => $nama_bank,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('ppdb_bank', $data);
    }

    public function simpan_edit_bank()
    {
        $id = htmlspecialchars($this->input->post('kode_bank', true));
        $nama_bank = htmlspecialchars($this->input->post('nama_bank', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('nama_bank', $nama_bank);
        $this->db->set('status', $status);
        $this->db->where('kode_bank', $id);
        $this->db->update('ppdb_bank');
    }
    // end master_mapel
}
