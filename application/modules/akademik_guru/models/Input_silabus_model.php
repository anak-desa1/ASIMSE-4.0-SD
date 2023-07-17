<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_silabus_model extends CI_Model

{
    // index
    public function get_tampil()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_silabus')
            ->where(['id_guru' => $this->session->userdata('nik')])
            ->where(['tasm' =>  $tahun])
            ->get()->result_array();
        return $bagidata;
    }
    // end index
    // proses tambah
    public function get_tambah()
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
            ->where(['ks.ta' =>  $tahun])
            // ->group_by('k.id_guru')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_kelas()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,ks.rombel tingkat')
            ->from('t_guru_mapel k')
            ->join('t_kelas_siswa ks', 'k.id_kelas = ks.rombel', 'left')           
            ->where(['k.id_guru' => $this->session->userdata('nik')])
            ->where(['k.th_active' =>  $tahun])
            ->group_by('k.id_kelas')
            ->get()->result_array();
        return $bagidata;
    }

    public function silabus_simpan()
    {
        $p = $this->input->post();      
        $in = [                        
            "id_guru" => $p['id_guru'],
            "tingkat" => $p['tingkat'],
            "tema" => $p['tema'],
            "subtema" => $p['subtema'],
            "tasm" => $p['tasm'],
        ];
        $config['upload_path'] = './panel/dist/upload/file_silabus';
        $config['allowed_types'] = '*';
        $config['encrypt_name']	= FALSE;
        $config['remove_spaces']	= TRUE;
        $config['max_size']     = '0';
        $config['max_width']  	= '0';
        $config['max_height']  	= '0';
        $this->load->library('upload', $config);

        $this->upload->do_upload("file_silabus");
        $data = $this->upload->data();
        $in['file_silabus'] = $data['file_name'];
        $this->db->insert("t_mapel_silabus", $in);
        $this->session->set_flashdata('message', ' 
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i>Berhasil tambah Silabus ! </h5>
            </div>
            '); 

    }  
    // end proses update

    public function silabus_ubah()
    {
        $p = $this->input->post();      
        $in = [                        
            "id_guru" => $p['id_guru'],
            "tingkat" => $p['tingkat'],
            "tema" => $p['tema'],
            "subtema" => $p['subtema'],
            "tasm" => $p['tasm'],
        ];

        $upload_file = $_FILES['file_silabus'];
        //var_dump($upload_image);
        //die;
        if ($upload_file) {
            $config['upload_path'] = './panel/dist/upload/file_silabus';
            $config['allowed_types'] = '*';
            $config['encrypt_name']	= FALSE;
            $config['remove_spaces']	= TRUE;
            $config['max_size']     = '0';
            $config['max_width']  	= '0';
            $config['max_height']  	= '0';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_silabus')) {

                $old_img = $this->input->post('old_image', true);
                // var_dump($old_img);
                // die;
                if ($old_img != '') {
                    unlink(FCPATH . './panel/dist/upload/file_silabus/' . $old_img);
                }
                $new_img = $this->upload->data('file_name');
                $this->db->set('file_silabus', $new_img);
            } else {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        }       

        $where['id_silabus'] = $this->input->post('id_silabus', true);
        $this->db->update("t_mapel_silabus", $in, $where);
        $this->session->set_flashdata('message', ' 
            <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i>Berhasil Ubah Silabus </h5>
            </div>
            ');
    }
}
