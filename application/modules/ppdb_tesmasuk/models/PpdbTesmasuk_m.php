<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PpdbTesmasuk_m extends CI_Model
{
    // penugasan

    public function simpan_tambah()
    {
        $kd_campus = htmlspecialchars($this->input->post('kd_campus', true));
        $kd_sekolah = htmlspecialchars($this->input->post('kd_sekolah', true));
        $id_guru = htmlspecialchars($this->input->post('id_guru', true));
        $id_mapel = htmlspecialchars($this->input->post('id_mapel', true));
        $kelas = htmlspecialchars($this->input->post('kelas', true));

        $data = [
            'kd_campus' => $kd_campus,
            'kd_sekolah' => $kd_sekolah,
            'id_guru' => $id_guru,
            'id_mapel' => $id_mapel,
            'kelas' => $kelas,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('ppdb_kursus', $data);
    }

    public function simpan_edit()
    {
        $id_kursus = htmlspecialchars($this->input->post('id_kursus', true));
        $id_mapel = htmlspecialchars($this->input->post('id_mapel', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('id_mapel', $id_mapel);
        $this->db->set('status', $status);
        $this->db->where('id_kursus', $id_kursus);
        $this->db->update('ppdb_kursus');
    }
    // end penugasan

    // tugas
    public function simpan_edit_tugas()
    {
        $id_tugas = htmlspecialchars($this->input->post('id_tugas', true));
        $id_kursus = htmlspecialchars($this->input->post('id_kursus', true));
        $id_guru = htmlspecialchars($this->input->post('gurutugas', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $tugas = stripslashes($this->input->post('tugas', true));
        $komentar = htmlspecialchars($this->input->post('komentartugas', true));
        $cekh = $this->db->get_where('ppdb_tugas', ['id_tugas' => $id_tugas])->row_array();
        $data = [
            'id_kursus' => $id_kursus,
            'id_guru' => $id_guru,
            'judul' => $judul,
            'tugas' => $tugas,
            'komentar' => $komentar,
        ];
        // insert ke table tugas
        if ($cekh == 0) {
            $this->db->insert('ppdb_tugas', $data);
        } else {
            $this->db->where('id_tugas', $id_tugas);
            $this->db->update('ppdb_tugas', $data);
        }
    }
    // end tugas

    // kuis
    public function simpan_tambah_quiz()
    {
        $kd_campus = htmlspecialchars($this->input->post('kd_campus', true));
        $kd_sekolah = htmlspecialchars($this->input->post('kd_sekolah', true));
        $id_guru = htmlspecialchars($this->input->post('id_guru', true));
        $nama_mapel = htmlspecialchars($this->input->post('nama_mapel', true));
        $kelas = htmlspecialchars($this->input->post('kelas', true));

        $data = [
            'kd_campus' => $kd_campus,
            'kd_sekolah' => $kd_sekolah,
            'id_guru' => $id_guru,
            'nama_mapel' => $nama_mapel,
            'kelas' => $kelas,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('ppdb_materi', $data);
    }

    public function simpan_edit_quiz()
    {
        $id_materi = htmlspecialchars($this->input->post('id_materi', true));
        $nama_mapel = htmlspecialchars($this->input->post('nama_mapel', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('nama_mapel', $nama_mapel);
        $this->db->set('status', $status);
        $this->db->where('id_materi', $id_materi);
        $this->db->update('ppdb_materi');
    }

    public function createdata($selec, $data)
    {
        $this->db->insert($selec, $data);
    }
    public function deletedata($table, $where)
    {
        $this->db->delete($table, $where);
    }
    public function ambilid($table, $where)
    {
        return $this->db->get_where(
            $table,
            $where
        );
    }
    public function ubahdata($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function editdata($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    // end kuis


}
