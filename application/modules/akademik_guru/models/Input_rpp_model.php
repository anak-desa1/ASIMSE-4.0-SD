<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_rpp_model extends CI_Model

{
    /// index
    public function get_tampil()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_silabus a')
            ->where(['id_guru' => $this->session->userdata('nik')])
            ->where(['tasm' =>  $tahun])
            ->get()->result_array();
        return $bagidata;
    }
    // end index
     // detail
     public function get_detail($target)
     {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,ks.rombel tingkat,pd.nama_lengkap,m.nama')
            ->from('t_guru_mapel k')
            ->join('t_kelas_siswa ks', 'k.id_kelas = ks.rombel', 'left')
            ->join('m_mapel m', 'k.id_mapel = m.id', 'left')
            ->join('pegawai_data pd', 'k.id_guru = pd.nik', 'left')
            ->where(['k.id_guru' => $this->session->userdata('nik')])
            ->where(['k.th_active' =>  $tahun])
            ->where(['k.id_kelas' =>  $target])
            ->where(['ks.ta' =>  $tahun])
            // ->group_by('k.id_guru')
            ->get()->row_array();
        return $bagidata;
     }
 
     public function get_rpp($id)
     {
         $bagidata =
             $this->db->select('a.*, b.tema, b.subtema')
             ->from('t_mapel_rpp a')
             ->join('t_mapel_silabus b', 'a.id_guru = b.id_guru', 'left')
             ->where(['a.id_guru' => $this->session->userdata('nik')])
             ->where(['a.id_silabus' => $id])
              ->group_by('a.id_rpp', 'ASC')
             ->get()->result_array();
         return $bagidata;
     }
     // end detail
    // proses tambah
    public function rpp_simpan()
    {     
        $id_silabus = $this->input->post('id_silabus', true);        
        $p = $this->input->post();      
        $in = [    
            "id_silabus" =>  $id_silabus,                     
            "id_guru" => $p['id_guru'],                  
            "tingkat" => $p['tingkat'], 
            "pembelajaran" => $p['pembelajaran'],           
            "tasm" => $p['tasm'],
        ]; 
        $upload_file = $_FILES['file_rpp'];
        //var_dump($upload_image);
        //die;
        if ($upload_file) {
            $config['upload_path'] = './panel/dist/upload/file_rpp';
            $config['allowed_types'] = '*';
            $config['encrypt_name']	= FALSE;
            $config['remove_spaces']	= TRUE;
            $config['max_size']     = '0';
            $config['max_width']  	= '0';
            $config['max_height']  	= '0';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_rpp')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/file_rpp/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('file_rpp', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }       

        $this->upload->do_upload("file_rpp");
            $data = $this->upload->data();
            $in['file_rpp'] = $data['file_name'];
            $this->db->insert("t_mapel_rpp", $in);
            $this->session->set_flashdata('message', ' 
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i>Berhasil Tambah RPP ! </h5>
            </div>
            ');

    }  
    // end proses update
    public function rpp_ubah()
    {     
        $id_silabus = $this->input->post('id_silabus', true);        
        $p = $this->input->post();      
        $in = [    
            "id_silabus" =>  $id_silabus,                     
            "id_guru" => $p['id_guru'],                  
            "tingkat" => $p['tingkat'], 
            "pembelajaran" => $p['pembelajaran'],           
            "tasm" => $p['tasm'],
        ]; 
        $upload_file = $_FILES['file_rpp'];
        //var_dump($upload_image);
        //die;
        if ($upload_file) {
            $config['upload_path'] = './panel/dist/upload/file_rpp';
            $config['allowed_types'] = '*';
            $config['encrypt_name']	= FALSE;
            $config['remove_spaces']	= TRUE;
            $config['max_size']     = '0';
            $config['max_width']  	= '0';
            $config['max_height']  	= '0';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_rpp')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/file_rpp/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('file_rpp', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }       

        $where['id_rpp'] = $this->input->post('id_rpp', true);
        $this->db->update("t_mapel_rpp", $in, $where);
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Merubah Data RPP ! </h5>
        </div>
        ');

    }  
}
