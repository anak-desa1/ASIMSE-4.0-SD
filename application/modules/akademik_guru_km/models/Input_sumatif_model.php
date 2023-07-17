<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_sumatif_model extends CI_Model

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
    public function get_tambahsumatif($id)
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
            ->where(['k.mapel_id' => $id])
            ->where(['k.th_active' =>  $tahun])
            ->where(['ks.ta' =>  $tahun])
            // ->group_by('k.id_guru')
            ->get()->row_array();
        return $bagidata;
    }

    public function cek_th($tahun)
    {
        $query_str =
            $this->db->where('tahun', $tahun)
            ->where(['aktif' => 'Y'])
            ->get('t_tahun');
        if ($query_str->num_rows() > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }

    public function cek_sumatif($tahun, $id_guru)
    {
        $query_str =
            $this->db->where('tasm', $tahun)
            ->where('id_guru', $id_guru)
            ->get('t_mapel_sumatif');
        if ($query_str->num_rows() > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }

    public function sumatif_simpan()
    {
        $no_sumatif = $this->input->post('no_sumatif', true); 
        $nama_sumatif = $this->input->post('nama_sumatif', true);
        $p = $this->input->post();      
        $data = [
            "no_sumatif" =>  $no_sumatif,           
            "nama_sumatif" => $nama_sumatif,            
            "id_guru" => $p['id_guru'],
            "id_mapel" => $p['id_mapel'],           
            "semester" => $p['semester'],
            "tingkat" => $p['tingkat'],
            "tasm" => $p['tasm'],
        ];
       

        $cek =  $this->db->get_where('t_mapel_sumatif',  ['id_guru' => $p['id_guru'], 'id_mapel' => $p['id_mapel'], 'semester' => $p['semester'], 'tingkat' => $p['tingkat'], 'tasm' => $p['tasm'], "no_sumatif" =>  $no_sumatif])->row_array();
        // var_dump($cek);
        // die;

        if ($cek['no_sumatif'] == 0) {
            $this->db->insert('t_mapel_sumatif', $data);
            $this->session->set_flashdata('message', ' 
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i>Berhasil tambah sumatif ! </h5>
            </div>
            ');
        } else {
            $this->session->set_flashdata('message', ' 
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i>sumatif yang dimasukkan sama ! </h5>
            </div>
            ');
        }

    }

    public function sumatif_ubah()
    {
        // cek user exist
        $sumatif_id = $this->input->post('sumatif_id', true);       
        $semester = $this->input->post('semester', true);
        $no_sumatif = $this->input->post('no_sumatif', true);
        $nama_sumatif = $this->input->post('nama_sumatif', true);

        $data = [          
            'semester' => $semester,
            'no_sumatif' => $no_sumatif,
            'nama_sumatif' => $nama_sumatif,
        ];

        $this->db->where('sumatif_id', $sumatif_id);
        $this->db->update('t_mapel_sumatif', $data);
        // return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }
    // end proses update
}
