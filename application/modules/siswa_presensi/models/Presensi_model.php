<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Presensi_model extends CI_Model
{

    public $table = 'presensi';
    public $id = 'id_absen';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // index
    public function get_tampil()
    {
        $bagidata =
            $this->db->select('a.*,b.kelas')
            ->from('t_kelas_siswa a')
            ->join('l_kelas b', 'a.rombel = b.tingkat', 'left')
            ->group_by('a.rombel', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_siswarombel()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('*')
            ->from('t_kelas_siswa')            
            ->where('ta',  $ta)
            ->group_by('rombel','ASC')
            // ->group_by('k.tingkat', 'k.kd_sekolah', 'k.rombel', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end index

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_query($id)
    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,s.*')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where('k.rombel',  $id)
            ->where('k.ta',  $ta)
            // ->group_by('k.rombel')
            // ->group_by('k.tingkat', 'k.kd_sekolah', 'k.rombel', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    function get_all_q($id)
    {
        $this->datatables->select('a.id_absen,b.id_karyawan,b.nama_karyawan,a.tgl,a.jam_msk,a.jam_klr,c.id_khd,c.nama_khd,a.ket,d.nama_status,d.id_status')
            ->from('presensi as a,karyawan as b,kehadiran as c,stts as d')
            ->where('b.gedung_id', $id)
            ->where('a.id_karyawan=b.id_karyawan')
            ->where('c.id_khd=a.id_khd')
            ->where('d.id_status=a.id_status');
        return $this->datatables->generate();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->result();
    }


    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function search_value($title, $id)
    {
        $query_result =
            $this->db->where('gedung_id', $id)
            ->like('nama_karyawan', $title, 'both')
            ->order_by('nama_karyawan', 'ASC')
            ->limit(10)->get('karyawan');
        if ($query_result->num_rows() > 0) {
            return $query_result->result();
        } else {
            return false;
        }
    }

    function get_by_ids($id)
    {
        return $this->db->where($this->id, $id)
            ->join('karyawan', 'karyawan.id_karyawan =' . $this->table . '.id_karyawan', 'left')
            ->get('presensi')
            ->row();
    }

    function cek_id($id_karyawan, $tgl)
    {
        $query_str = "SELECT * FROM presensi WHERE id_karyawan= ? AND tgl= ? ";
        $result = $this->db->query($query_str, array($id_karyawan, $tgl));
        if ($result->num_rows() == 1) {
            return $result;
        } else {
            return false;
        }
    }

    public function absen_perbaikan()
    {
        $id_siswa = $this->input->post('id_siswa');
        $id_khd = $this->input->post('id_khd');        
        $p = $this->input->post();

        for ($i = 0; $i < count($id_siswa); $i++) {
            
            $data_1 = [
                "id_siswa" => $id_siswa[$i],
                'tgl' => $p['tgl'],
                "id_khd" => $id_khd[$i],
                "id_status" => 8,                
            ];

            $data_2 = [               
                "id_khd" => $id_khd[$i],                           
            ];

            $cek = $this->db->get_where('ab_presensi', ['id_siswa' => $id_siswa[$i],'tgl' => $p['tgl']])->row_array();
            // var_dump($cek);
            // die;

            if ($cek == 0) {
                $this->db->insert('ab_presensi', $data_1);                
            } else {
                $this->db->where('id_absen', $cek['id_absen']);
                $this->db->update('ab_presensi', $data_2);
            }
        }
    }
}
