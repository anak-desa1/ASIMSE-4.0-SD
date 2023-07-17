<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_sikap_model extends CI_Model
{
    //tampil data
    public function get_kelas_data()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap,w.tasm')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('pegawai_data pd', 'w.id_guru = pd.nik', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.ta' =>  $tahun])
            ->where(['w.tasm' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_siswa_data()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $result = $this->db->get_where('t_nilai_sikap', ["penilaian" => 'sikap', 'is_wali' == 'Y', 'tasm' == $tasm])->row_array();
        if ($result['dimensi'] == '' || $result['selalu']  ==  0 || $result['mulai_meningkat'] == 0) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_nilai_sikap na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.ta' => $tahun])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('k.*,s.nama,s.nis')
                ->from('t_nilai_sikap k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.penilaian' => 'sikap'])
                ->where(['s.th_active' => $tahun])
                ->where(['w.tasm' => $tahun])
                ->where(['k.tasm' => $tasm])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        }
    }
    //end tampil data    
    //tampil edit
    public function get_kelas_edit($id,$tasm)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap,w.tasm')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('pegawai_data pd', 'w.id_guru = pd.nik', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.ta' =>  $tahun])
            ->where(['w.tasm' => $tahun])
            ->where(['w.id_kelas' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_siswa_edit($id,$tasm)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
                $this->db->select('s.nama,s.nis,na.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_nilai_sikap na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                // ->where(['k.ta' => $tahun])
                // ->where(['s.th_active' => $tahun])
                // ->where(['w.tasm' => $tahun])
                ->where(['na.tasm' => $tasm])
                ->where(['na.id_kelas' => $id])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
    }
    //end edit data    
    // tampil sikap
    public function tampil_sikap()
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_nilai_sikap')
            ->where(['penilaian' => 'sikap'])
            ->group_by('dimensi', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    public function tampil_sikap_edit($id,$tasm)
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_nilai_sikap')
            ->where(['penilaian' => 'sikap'])
            ->where(['tasm' => $tasm])
            ->where(['id_kelas' => $id])
            // ->group_by('dimensi', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end tampil pas
    // tambah data
    public function save_sikap()
    {
        $id_siswa = $this->input->post('id_siswa');
        $dimensi = $this->input->post('dimensi');
        $deskripsi = $this->input->post('deskripsi');       
        $p = $this->input->post();

        for ($val = 0; $val < count($id_siswa); $val++) {

            $data = [
                "id_siswa" => $id_siswa[$val],
                "tasm" => $p['tasm'],
                "id_kelas" => $p['id_kelas'],
                "is_wali" => 'Y',
                "dimensi" => $dimensi,   
                "deskripsi" => $deskripsi[$val],             
                "penilaian" => 'sikap',
            ];

            $this->db->insert('t_nilai_sikap', $data);

            // $result = $this->db->get_where('t_nilai_sikap', ['id_siswa' => $id_siswa[$val], "tasm" => $p['tasm'], 'id_kelas' => $p['id_kelas'], "penilaian" => 'sikap'])->row_array();
            // if ($result == 0) {
                
            // } else {
            //     $this->db->where('id', $result['id']);
            //     $this->db->update('t_nilai_sikap', $data);
            // }
        }
    }

    public function update_sikap()
    {
        $id_siswa = $this->input->post('id_siswa');
        $deskripsi = $this->input->post('deskripsi');       
        $p = $this->input->post();
        for ($val = 0; $val < count($id_siswa); $val++) {
            $data = [                         
                "deskripsi" => $deskripsi[$val],      
            ];
            $result = $this->db->get_where('t_nilai_sikap', ['id_siswa' => $id_siswa[$val], "tasm" => $p['tasm'], 'id_kelas' => $p['id_kelas'], "dimensi" => $p['dimensi']])->row_array();
            $this->db->where('id', $result['id']);
            $this->db->update('t_nilai_sikap', $data);
        }
    }  

    // end tambah data 

}
