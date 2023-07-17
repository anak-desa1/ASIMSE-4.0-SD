<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KesiswaanOsis_model extends CI_Model
{
    // tampil master foto
    public function getFoto()
    {
        $bagidata =
            $this->db->select('')
            ->from('profil_osis')
            ->order_by('osis_id', 'DESC')
            ->get()->result_array();
        return $bagidata;
    }

    public function simpan_tambah()
    {

        $upload_image = $_FILES['gambar'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/profil_osis/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_osis/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('gambar', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $judul = htmlspecialchars($this->input->post('judul', true));
        $text = htmlspecialchars($this->input->post('text', true));

        $data = [
            'judul' => $judul,
            'text' => $text,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('profil_osis', $data);
    }

    public function simpan_edit()
    {
        $osis_id = htmlspecialchars($this->input->post('osis_id', true));
        $status = htmlspecialchars($this->input->post('status', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $text = htmlspecialchars($this->input->post('text', true));


        $upload_image = $_FILES['gambar'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/profil_osis/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_osis/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('gambar', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $this->db->set('status', $status);
        $this->db->set('judul', $judul);
        $this->db->set('text', $text);
        $this->db->where('osis_id', $osis_id);
        $this->db->update('profil_osis');
    }
    // end tampil master foto
}
