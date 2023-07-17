<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_rpp_plus_model extends CI_Model

{
    // index
    public function get_tampil()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('a.*,c.*')
            ->from('t_guru_mapel a')
            ->join('m_mapel c', 'a.id_mapel = c.id', 'left')
            ->where(['a.id_guru' => $this->session->userdata('nik')])
            ->where(['c.tingkat' => 'sd'])
            ->where(['a.th_active' =>  $tahun])
            ->get()->result_array();
        return $bagidata;
    }
    // end index
     // detail
     public function get_detailsumatif($id)
     {
         $bagidata =
             $this->db->select('k.*,ks.*,pd.nama_lengkap,m.nama')
             ->from('t_guru_mapel k')
             ->join('m_kelas ks', 'k.id_kelas = ks.tingkat', 'left')
             ->join('m_mapel m', 'k.id_mapel = m.id', 'left')
             ->join('pegawai_data pd', 'k.id_guru = pd.nik', 'left')
             ->where(['k.id_guru' => $this->session->userdata('nik')])
             ->where(['k.mapel_id' => $id])
             // ->group_by('k.id_guru')
             ->get()->row_array();
         return $bagidata;
     }
 
     public function get_sumatif($id, $target)
     {
         $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
         $data['tasm'] = $get_tasm['tahun'];
         $tahun = substr($data['tasm'], 0, 4);
         $tasm = $get_tasm['tahun'];
 
         $bagidata =
             $this->db->select('k.*')
             ->from('t_mapel_sumatif k')
             ->join('t_guru_mapel gm', 'k.id_mapel = gm.mapel_id', 'left')
             ->where(['gm.id_guru' => $this->session->userdata('nik')])
             ->where(['gm.mapel_id' => $id])
             ->where(['k.tingkat' => $target])
             ->where(['k.tasm' => $tasm])
             ->group_by('k.sumatif_id', 'ASC')
             ->get()->result_array();
         return $bagidata;
     }
     // end detail
    // proses tambah
    public function get_TambahData($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('a.*,e.nama_lengkap,d.nama')
            ->from('t_mapel_sumatif a')
            ->join('t_guru_mapel b', 'a.id_guru = b.id_guru', 'left')           
            ->join('m_mapel d', 'b.id_mapel = d.id', 'left')
            ->join('pegawai_data e', 'a.id_guru = e.nik', 'left')
            ->where(['a.id_guru' => $this->session->userdata('nik')])
            ->where(['a.sumatif_id' => $id])
            ->where(['a.tasm' =>  $tasm])           
            // ->group_by('k.id_guru')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_IdSumatif($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_sumatif') 
            ->where(['id_guru' => $this->session->userdata('nik')])
            ->where(['tasm' => $tasm])          
            ->where(['sumatif_id' => $id])                       
            ->get()->row_array();
        return $bagidata;
    }
    
    public function rpp_plus_simpan()
    {     
        $sumatif_id = $this->input->post('sumatif_id', true);        
        $p = $this->input->post();      
        $in = [    
            "sumatif_id" =>  $sumatif_id,                     
            "id_guru" => $p['id_guru'],
            "id_mapel" => $p['id_mapel'],         
            "tingkat" => $p['tingkat'],            
            "tasm" => $p['tasm'],
        ]; 
        $config['upload_path'] = './panel/dist/upload/file_rpp_plus';
        $config['allowed_types'] = '*';
        $config['encrypt_name']	= FALSE;
        $config['remove_spaces']	= TRUE;
        $config['max_size']     = '0';
        $config['max_width']  	= '0';
        $config['max_height']  	= '0';
        $this->load->library('upload', $config);

        $cek =  $this->db->get_where('t_mapel_rpp_plus',  ['sumatif_id' =>  $sumatif_id,'id_guru' => $p['id_guru'], 'id_mapel' => $p['id_mapel'],'tingkat' => $p['tingkat'], 'tasm' => $p['tasm']])->row_array();
        if ($cek['sumatif_id'] == $sumatif_id) {
            $where['id_rpp_plus'] = $this->input->post('id_rpp_plus', true);
            $this->upload->do_upload('nama_rpp_plus');
            $data = $this->upload->data();
            $in['nama_rpp_plus'] = $data['file_name'];
            $this->db->update('t_mapel_rpp_plus', $in, $where);
            $this->session->set_flashdata('message', ' 
            <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i>Berhasil ubah RPP + ! </h5>
            </div>
            ');            
        } else {
            $this->upload->do_upload('nama_rpp_plus');
            $data = $this->upload->data();
            $in['nama_rpp_plus'] = $data['file_name'];
            $this->db->insert("t_mapel_rpp_plus", $in);
            $this->session->set_flashdata('message', ' 
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i>Berhasil tambah RPP + ! </h5>
            </div>
            ');
            
        }

    }  
    // end proses update
}
