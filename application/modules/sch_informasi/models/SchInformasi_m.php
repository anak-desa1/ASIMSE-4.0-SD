<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SchInformasi_m extends CI_Model
{
    // tampil master sekolah
    public function getVaksin()
    {
        $bagidata =
            $this->db->select('')
            ->from('m_vaksin')
            ->order_by('id_vaksin', 'DESC')
            ->get()->result_array();
        return $bagidata;
    }

    public function simpan_tambah()
    {

        $upload_image = $_FILES['vaksin_1'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/sertifikat_vaksin/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('vaksin_1')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/sertifikat_vaksin/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('vaksin_1', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $upload_image = $_FILES['vaksin_2'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/sertifikat_vaksin/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('vaksin_2')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/sertifikat_vaksin/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('vaksin_2', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $nik = $this->input->post('nik', true);
        $nama_siswa = htmlspecialchars($this->input->post('nama_siswa', true));
        $data = [
            'nik' => $nik,
            'nama_siswa' => $nama_siswa,
        ];
        // insert ke table user
        $this->db->insert('m_vaksin', $data);
    }

    public function simpan_edit()
    {
        $id_vaksin = htmlspecialchars($this->input->post('id_vaksin', true));
        $nik = htmlspecialchars($this->input->post('nik', true));
        $nama_siswa = htmlspecialchars($this->input->post('nama_siswa', true));

        $upload_image = $_FILES['vaksin_1'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/sertifikat_vaksin/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('vaksin_1')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/sertifikat_vaksin/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('vaksin_1', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $upload_image = $_FILES['vaksin_2'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/sertifikat_vaksin/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('vaksin_2')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/sertifikat_vaksin/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('vaksin_2', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }


        $this->db->set('nik', $nik);
        $this->db->set('nama_siswa', $nama_siswa);
        $this->db->where('id_vaksin', $id_vaksin);
        $this->db->update('m_vaksin');
    }
    // end tampil master sekolah

    // kelulusan
    public function getKelulusan()
    {
        $bagidata =
            $this->db->select('')
            ->from('m_lulus')
            ->order_by('nama_siswa', 'DESC')
            ->get()->result_array();
        return $bagidata;
    }

    public function simpan_lulus()
    {
        $nis = htmlspecialchars($this->input->post('nis', true));
        $nama_siswa = htmlspecialchars($this->input->post('nama_siswa', true));
        $th_pelajaran = htmlspecialchars($this->input->post('th_pelajaran', true));
        $keterangan = htmlspecialchars($this->input->post('keterangan', true));

        $data = [
            'nis' => $nis,
            'nama_siswa' => $nama_siswa,
            'th_pelajaran' => $th_pelajaran,
            'keterangan' => $keterangan,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('m_lulus', $data);
    }

    public function simpan_editlulus()
    {
        $lulus_id = htmlspecialchars($this->input->post('lulus_id', true));
        $nis = htmlspecialchars($this->input->post('nis', true));
        $nama_siswa = htmlspecialchars($this->input->post('nama_siswa', true));
        $th_pelajaran = htmlspecialchars($this->input->post('th_pelajaran', true));
        $keterangan = htmlspecialchars($this->input->post('keterangan', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('nis', $nis);
        $this->db->set('nama_siswa', $nama_siswa);
        $this->db->set('th_pelajaran', $th_pelajaran);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('status', $status);
        $this->db->where('lulus_id', $lulus_id);
        $this->db->update('m_lulus');
    }
    // end kelulusan

    // beasiswa
    public function getBeasiswa()
    {
        $bagidata =
            $this->db->select('')
            ->from('m_beasiswa')
            ->order_by('nama_siswa', 'DESC')
            ->get()->result_array();
        return $bagidata;
    }

    public function simpan_beasiswa()
    {
        $nis = htmlspecialchars($this->input->post('nis', true));
        $nama_siswa = htmlspecialchars($this->input->post('nama_siswa', true));
        $th_pelajaran = htmlspecialchars($this->input->post('th_pelajaran', true));
        $keterangan = htmlspecialchars($this->input->post('keterangan', true));

        $data = [
            'nis' => $nis,
            'nama_siswa' => $nama_siswa,
            'th_pelajaran' => $th_pelajaran,
            'keterangan' => $keterangan,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('m_beasiswa', $data);
    }

    public function simpan_editbeasiswa()
    {
        $beasiswa_id = htmlspecialchars($this->input->post('beasiswa_id', true));
        $nis = htmlspecialchars($this->input->post('nis', true));
        $nama_siswa = htmlspecialchars($this->input->post('nama_siswa', true));
        $th_pelajaran = htmlspecialchars($this->input->post('th_pelajaran', true));
        $keterangan = htmlspecialchars($this->input->post('keterangan', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('nis', $nis);
        $this->db->set('nama_siswa', $nama_siswa);
        $this->db->set('th_pelajaran', $th_pelajaran);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('status', $status);
        $this->db->where('beasiswa_id', $beasiswa_id);
        $this->db->update('m_beasiswa');
    }

    // edn beasiswa

}
