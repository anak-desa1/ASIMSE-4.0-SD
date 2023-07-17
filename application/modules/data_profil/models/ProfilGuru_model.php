<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilGuru_model extends CI_Model
{
    // tampil master foto
    public function getFoto()
    {
        $bagidata =
            $this->db->select('')
            ->from('profil_guru')
            ->order_by('profil_id', 'DESC')
            ->get()->result_array();
        return $bagidata;
    }

    public function simpan_tambah()
    {

        $upload_image = $_FILES['gambar'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/profil_guru/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_guru/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('gambar', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $nama_guru = htmlspecialchars($this->input->post('nama_guru', true));
        $mengajar = htmlspecialchars($this->input->post('mengajar', true));
        $data = [
            'nama_guru' => $nama_guru,
            'mengajar' => $mengajar,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('profil_guru', $data);
    }

    public function simpan_edit()
    {
        $profil_id = htmlspecialchars($this->input->post('profil_id', true));
        $status = htmlspecialchars($this->input->post('status', true));
        $nama_guru = htmlspecialchars($this->input->post('nama_guru', true));
        $mengajar = htmlspecialchars($this->input->post('mengajar', true));

        $upload_image = $_FILES['gambar'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/profil_guru/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_guru/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('gambar', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $this->db->set('status', $status);
        $this->db->set('mengajar', $mengajar);
        $this->db->set('nama_guru', $nama_guru);
        $this->db->where('profil_id', $profil_id);
        $this->db->update('profil_guru');
    }
    // end tampil master foto  

}
