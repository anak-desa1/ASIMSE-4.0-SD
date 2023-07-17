<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SchKegiatan_m extends CI_Model
{
    // belajar
    public function getBelajar()
    {
        $bagidata =
            $this->db->select('')
            ->from('profil_belajar')
            ->order_by('judul', 'DESC')
            ->get()->result_array();
        return $bagidata;
    }

    public function simpan_tambah()
    {
        $upload_image = $_FILES['gambar'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '3048';
            $config['upload_path'] = './panel/dist/upload/profil_belajar/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_belajar/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('gambar', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $judul = htmlspecialchars($this->input->post('judul', true));
        $text = $this->input->post('text', true);
        $link = htmlspecialchars($this->input->post('link', true));

        $data = [
            'judul' => $judul,
            'text' => $text,
            'link' => $link,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('profil_belajar', $data);
    }

    public function simpan_edit()
    {
        $belajar_id = htmlspecialchars($this->input->post('belajar_id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $text = $this->input->post('text', true);
        $link = htmlspecialchars($this->input->post('link', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $upload_image = $_FILES['gambar'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '3048';
            $config['upload_path'] = './panel/dist/upload/profil_belajar/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_belajar' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('gambar', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }


        $this->db->set('judul', $judul);
        $this->db->set('text', $text);
        $this->db->set('link', $link);
        $this->db->set('status', $status);
        $this->db->where('belajar_id', $belajar_id);
        $this->db->update('profil_belajar');
    }

    // edn belajar

    // berita
    public function getBerita()
    {
        $bagidata =
            $this->db->select('')
            ->from('profil_artikel')
            ->order_by('id_artikel', 'DESC')
            ->get()->result_array();
        return $bagidata;
    }

    public function simpan_berita()
    {

        $upload_image = $_FILES['gambar'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '3548';
            $config['upload_path'] = './panel/dist/upload/profil_berita/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_berita/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('gambar', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $judul_artikel = $this->input->post('judul_artikel', true);
        $deskripsi = $this->input->post('deskripsi', true);
        $user_update = htmlspecialchars($this->input->post('user_update', true));
        $tanggal_terbit = htmlspecialchars($this->input->post('tanggal_terbit', true));
        $data = [
            'judul_artikel' => $judul_artikel,
            'deskripsi' => $deskripsi,
            'status' => 1,
            'user_update' => $user_update,
            'tanggal_terbit' => $tanggal_terbit,
        ];
        // insert ke table user
        $this->db->insert('profil_artikel', $data);
    }

    public function simpan_editberita()
    {
        $id_artikel = htmlspecialchars($this->input->post('id_artikel', true));
        $judul_artikel = $this->input->post('judul_artikel', true);
        $deskripsi = $this->input->post('deskripsi', true);
        $user_update = htmlspecialchars($this->input->post('user_update', true));
        $tanggal_terbit = htmlspecialchars($this->input->post('tanggal_terbit', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $upload_image = $_FILES['gambar'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/profil_berita/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_berita/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('gambar', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $this->db->set('judul_artikel', $judul_artikel);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('status', $status);
        $this->db->set('user_update', $user_update);
        $this->db->set('tanggal_terbit', $tanggal_terbit);
        $this->db->where('id_artikel ', $id_artikel);
        $this->db->update('profil_artikel');
    }
    // end berita

    // galery
    public function getGalery()
    {
        $bagidata =
            $this->db->select('')
            ->from('profil_galeri')
            ->order_by('id_galeri', 'DESC')
            ->get()->result_array();
        return $bagidata;
    }

    public function simpan_galery()
    {

        $upload_image = $_FILES['gambar'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/profil_galery/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_galery/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('gambar', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $judul_galeri = $this->input->post('judul_galeri', true);
        $deskripsi = $this->input->post('deskripsi', true);
        $user_update = htmlspecialchars($this->input->post('user_update', true));

        $data = [
            'judul_galeri' => $judul_galeri,
            'deskripsi' => $deskripsi,
            'status' => 1,
            'user_update' => $user_update,
        ];
        // insert ke table user
        $this->db->insert('profil_galeri', $data);
    }

    public function simpan_editgalery()
    {
        $id_galeri = htmlspecialchars($this->input->post('id_galeri', true));
        $judul_galeri = $this->input->post('judul_galeri', true);
        $deskripsi = $this->input->post('deskripsi', true);
        $user_update = htmlspecialchars($this->input->post('user_update', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $upload_image = $_FILES['gambar'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/profil_galery/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_galery/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('gambar', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $this->db->set('judul_galeri', $judul_galeri);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('status', $status);
        $this->db->set('user_update', $user_update);
        $this->db->where('id_galeri ', $id_galeri);
        $this->db->update('profil_galeri');
    }
    // end galery

    // galery plus
    public function getGaleryPlus($id)
    {
        $bagidata =
            $this->db->select('*')
            ->from('profil_galeri')
            ->where(['id_galeri' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_galeryplus()
    {

        $upload_image = $_FILES['foto'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/profil_galery/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_galery/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('foto', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $id_galeri = $this->input->post('id_galeri', true);

        $data = [
            'id_galeri' => $id_galeri,
        ];
        // insert ke table user
        $this->db->insert('profil_galeri_sub', $data);
    }

    public function simpan_editgaleryplus()
    {
        $id_galeri_sub = htmlspecialchars($this->input->post('id_galeri_sub', true));

        $upload_image = $_FILES['foto'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/profil_galery/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/profil_galery/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('foto', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }


        $this->db->where('id_galeri_sub ', $id_galeri_sub);
        $this->db->update('profil_galeri_sub');
    }
    // end galery plus


}
