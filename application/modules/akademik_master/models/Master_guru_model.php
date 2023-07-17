<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_guru_model extends CI_Model

{
    // tampil data
    var $table = 'm_guru u';
    var $column_order = array('', 'u.nama_guru' ); //set order berdasarkan field yang di mau
    var $column_search = array('u.nama_guru'); //set field yang bisa di search
    var $order = array('u.id' => 'desc'); // default order 

    private function _get_data()
    {
        $this->db->select('u.*,p.email');
        $this->db->from($this->table);
        $this->db->join('pegawai_data p', 'p.nik = u.nip', 'left');   
     
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // cek kalo ada search data
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open group like or like
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close group like or like
            }
            $i++;
        }

        // $this->db->group_start(); // open group like or like
        // $this->db->where('u.kd_sekolah', $this->session->kd_sekolah);
        // $this->db->group_end(); //close group like or like

        if (isset($_POST['order'])) // cek kalo click order
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function tampildata()
    {
        $this->_get_data();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }

    function count_filtered()
    {
        $this->_get_data();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // end tampil data 

    public function simpan_tambah()
    {
        $p = $this->input->post();
    
        $data['nip'] = $p['nip'];
        $data['tingkat'] = 'sd';
        $data['nama_guru'] = $p['nama_guru'];
        $data['jk'] = $p['jk'];
        $data['is_bk'] = $p['is_bk'];
        $data['jabatan'] = $p['jabatan'];
        $data['stat_data'] = 'A';

        $this->db->insert('m_guru', $data);

        $nik = $this->input->post('nip');
        $p = $this->input->post();
      
        $data1['bagian_shift'] = 'ON';

        $this->db->where('nik', $nik);
        $this->db->update('pegawai', $data1);

        return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }

    public function aktif()
    {
        $p1 = $this->input->post('id');
        $p1 = $this->input->post();      
        $data1['stat_data'] = 'A';
        $this->db->where('id', $p1['id']);
        $this->db->update('m_guru', $data1);

        $p2 = $this->input->post('nik');
        $p2 = $this->input->post();
      
        $data2['bagian_shift'] = 'ON';
        $this->db->where('nik', $p2['nik']);
        $this->db->update('pegawai', $data2);
    }

    public function mutasi()
    {
        $p = $this->input->post('id');
        $p = $this->input->post('nik');
        $p = $this->input->post();

        $data['stat_data'] = 'P';
      
        $data1['bagian_shift'] = 'OFF';

        $this->db->where('id', $p['id']);
        $this->db->update('m_guru', $data);

        $this->db->where('nik', $p['nik']);
        $this->db->update('pegawai', $data1);
    }

    function get_guru($id)
    {
        $this->db->select('g.*');
        $this->db->from('m_guru g');
        $this->db->where(['id' => $id]);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function simpan_ubahdata()
    {
        $id = $this->input->post('id');
        $p = $this->input->post();

        // $data['nip'] = $p['nip'];
        $data['nama_guru'] = $p['nama_guru'];
        $data['jk'] = $p['jk'];
        $data['is_bk'] = $p['is_bk'];
        $data['jabatan'] = $p['jabatan'];
        $data['stat_data'] = 'A';

        $this->db->where('id', $id);
        $this->db->update('m_guru', $data);
    }

    function __construct()
    {
        parent::__construct();
    }

    public function getShow($nik)
    {
        $this->db->where('nik', $nik);
        $hasil = $this->db->get('pegawai_data');
        return $hasil;
    }

    public function getshow_query($nik)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $result = $this->search_value($_POST['term'] = null);
        $this->db->select('a.telp,a.nik,a.nama_lengkap');
        $this->db->from('pegawai_data as a');
        $this->db->where('nama_lengkap', $_POST['id']);
        $hasil = $this->db->get();
        return $hasil;
    }

    function search_value($title)
    {
        $this->db->like('nama_lengkap', $title, 'both');
        $this->db->order_by('nama_lengkap', 'ASC');
        $this->db->limit(10);
        return $this->db->get('pegawai_data')->result();
    }
}
