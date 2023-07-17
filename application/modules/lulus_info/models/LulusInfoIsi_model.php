<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LulusInfoIsi_model extends CI_Model
{
    // kelulusan
    public function getPublish()
    {
        $bagidata =
            $this->db->select('')
            ->from('m_lulus_data')           
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_lulus_data()
    {
        $upload_image = $_FILES['logo'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/logo/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/logo/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('logo', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }

        $upload_image = $_FILES['ttd_kepsek'];
        //var_dump($upload_image);
        //die;
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './panel/dist/upload/logo/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('ttd_kepsek')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/logo/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('ttd_kepsek', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }
        
        $id_data = htmlspecialchars($this->input->post('id_data', true));      
        $kata_pembuka = $this->input->post('kata_pembuka', true);
        $kata_isi = $this->input->post('kata_isi', true);
        $kata_penutup = $this->input->post('kata_penutup', true);
        $tanggal_publis = htmlspecialchars($this->input->post('tanggal_publis', true));  
        $kota = htmlspecialchars($this->input->post('kota', true));       

        $data = [
            'kata_pembuka' => $kata_pembuka,  
            'kata_isi' => $kata_isi, 
            'kata_penutup' => $kata_penutup,        
            'tanggal_publis' => $tanggal_publis, 
            'kota' => $kota,
        ];      

        $cek = $this->db->get_where('m_lulus_data')->row_array();
        if($cek == 0){
            $this->db->insert('m_lulus_data', $data);
        } else{
            $this->db->where('id_data', $id_data);
            $this->db->update('m_lulus_data', $data);
        }
    }

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
        $npsn = htmlspecialchars($this->input->post('npsn', true));
        $no_surat = htmlspecialchars($this->input->post('no_surat', true));
        $tahun_pelajaran = htmlspecialchars($this->input->post('tahun_pelajaran', true));
        $nama_siswa = htmlspecialchars($this->input->post('nama_siswa', true));
        $nis = htmlspecialchars($this->input->post('nis', true));
        $nisn = htmlspecialchars($this->input->post('nisn', true));
        $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir', true));
        $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir', true));     
        $keterangan = htmlspecialchars($this->input->post('keterangan', true));
        $alamat_siswa = htmlspecialchars($this->input->post('alamat_siswa', true));

        $data = [
            'npsn' => $npsn,
            'no_surat' => $no_surat,
            'tahun_pelajaran' => $tahun_pelajaran,
            'nama_siswa' => $nama_siswa,
            'nis' => $nis,
            'nisn' => $nisn,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,            
            'keterangan' => $keterangan,
            'alamat_siswa' => $alamat_siswa,
            'status' => 1,
        ];
        // insert ke table user
        $this->db->insert('m_lulus', $data);
    }
    
    public function simpan_editlulus()
    {
        $lulus_id = htmlspecialchars($this->input->post('lulus_id', true));
        $no_surat = htmlspecialchars($this->input->post('no_surat', true));
        $tahun_pelajaran = htmlspecialchars($this->input->post('tahun_pelajaran', true));
        $nama_siswa = htmlspecialchars($this->input->post('nama_siswa', true));
        $nis = htmlspecialchars($this->input->post('nis', true));
        $nisn = htmlspecialchars($this->input->post('nisn', true));
        $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir', true));
        $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir', true));     
        $keterangan = htmlspecialchars($this->input->post('keterangan', true));
        $alamat_siswa = htmlspecialchars($this->input->post('alamat_siswa', true));
        $status = htmlspecialchars($this->input->post('status', true));

        $this->db->set('no_surat', $no_surat);
        $this->db->set('tahun_pelajaran', $tahun_pelajaran);
        $this->db->set('nama_siswa', $nama_siswa);
        $this->db->set('nis', $nis);       
        $this->db->set('nisn', $nisn);
        $this->db->set('tempat_lahir', $tempat_lahir);
        $this->db->set('tanggal_lahir', $tanggal_lahir);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('alamat_siswa', $alamat_siswa);
        $this->db->set('status', $status);
        $this->db->where('lulus_id', $lulus_id);
        $this->db->update('m_lulus');
    }
    // end kelulusan   

}
