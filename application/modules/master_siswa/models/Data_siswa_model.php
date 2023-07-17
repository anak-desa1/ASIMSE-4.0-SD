<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_siswa_model extends CI_Model

{

    // tampil data
    var $table = 'm_siswa u';
    var $column_order = array('', 'u.nis' . 'u.nama', 'u.nisn', 'u.tgl_lahir', 'u.jk'); //set order berdasarkan field yang di mau
    var $column_search = array('u.nis', 'u.nama', 'u.nisn', 'u.tgl_lahir', 'u.jk'); //set field yang bisa di search
    var $order = array('u.siswa_id' => 'desc'); // default order 

    private function _get_data()
    {
        $this->db->select('u.*');
        $this->db->from($this->table);
        // $this->db->join('l_campus lc', 'lc.kd_campus = u.kd_campus', 'left');
        // $this->db->join('l_sekolah ls', 'ls.kd_sekolah = u.kd_sekolah', 'left');
        // $this->db->join('m_kelas lk', 'lk.tingkat = u.tingkat', 'left');
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

    public function get_kelas()
    {
        $this->db->select('*');
        $this->db->from('l_kelas');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan_tambah()
    {

        $p = $this->input->post();
        // $data['kd_campus'] = $p['kd_campus'];
        // $data['kd_sekolah'] = $p['kd_sekolah'];
        $data['nis'] = $p['nis'];
        $data['nisn'] = $p['nisn'];
        $data['nama'] = addslashes($p['nama']);
        $data['jk'] = $p['jk'];
        $data['tmp_lahir'] = $p['tmp_lahir'];
        $data['tgl_lahir'] = $p['tgl_lahir'];
        $data['agama'] = $p['agama'];
        $data['status'] = $p['status'];
        $data['anakke'] = $p['anakke'];
        $data['alamat'] = $p['alamat'];
        $data['notelp'] = $p['notelp'];
        $data['sek_asal'] = $p['sek_asal'];
        $data['sek_asal_alamat'] = $p['sek_asal_alamat'];
        $data['diterima_kelas'] = $p['tingkat'];
        $data['diterima_tgl'] = $p['diterima_tgl'];
        $data['diterima_smt'] = $p['tingkat'];
        $data['ijazah_no'] = $p['ijazah_no'];
        $data['ijazah_thn'] = $p['ijazah_thn'];
        $data['skhun_no'] = $p['skhun_no'];
        $data['skhun_no'] = $p['skhun_no'];
        $data['skhun_thn'] = $p['skhun_thn'];
        $data['ortu_ayah'] = $p['ortu_ayah'];
        $data['ortu_ibu'] = $p['ortu_ibu'];
        $data['ortu_alamat'] = $p['ortu_alamat'];
        $data['desa'] = $p['desa'];
        $data['kecamatan'] = $p['kecamatan'];
        $data['kota'] = $p['kota'];
        $data['provinsi'] = $p['provinsi'];
        $data['ortu_notelp'] = $p['ortu_notelp'];
        $data['ortu_ayah_pkj'] = $p['ortu_ayah_pkj'];
        $data['ortu_ibu_pkj'] = $p['ortu_ibu_pkj'];
        $data['wali'] = $p['wali'];
        $data['wali_alamat'] = $p['wali_alamat'];
        $data['notelp_rumah'] = $p['notelp_rumah'];
        $data['wali_pkj'] = $p['wali_pkj'];
        $data['foto'] = 'default.jpg';
        $this->db->insert('m_siswa', $data);
    }

    public function get_edit($id)
    {
        $bagidata =
            $this->db->select('k.*')
            ->from('m_siswa k')
            ->where(['k.siswa_id' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function update()
    {
        $p = $this->input->post();

        $data['nis'] = $p['nis'];
        $data['nisn'] = $p['nisn'];
        $data['nama'] = addslashes($p['nama']);
        $data['jk'] = $p['jk'];
        $data['tmp_lahir'] = $p['tmp_lahir'];
        $data['tgl_lahir'] = $p['tgl_lahir'];
        $data['agama'] = $p['agama'];
        $data['status'] = $p['status'];
        $data['anakke'] = $p['anakke'];
        $data['alamat'] = $p['alamat'];
        $data['notelp'] = $p['notelp'];
        $data['sek_asal'] = $p['sek_asal'];
        $data['sek_asal_alamat'] = $p['sek_asal_alamat'];
        $data['diterima_kelas'] = $p['diterima_kelas'];
        $data['diterima_tgl'] = $p['diterima_tgl'];
        $data['diterima_smt'] = $p['diterima_kelas'];
        $data['ijazah_no'] = $p['ijazah_no'];
        $data['ijazah_thn'] = $p['ijazah_thn'];
        $data['skhun_no'] = $p['skhun_no'];
        $data['skhun_no'] = $p['skhun_no'];
        $data['skhun_thn'] = $p['skhun_thn'];
        $data['ortu_ayah'] = $p['ortu_ayah'];
        $data['ortu_ibu'] = $p['ortu_ibu'];
        $data['ortu_alamat'] = $p['ortu_alamat'];
        $data['desa'] = $p['desa'];
        $data['kecamatan'] = $p['kecamatan'];
        $data['kota'] = $p['kota'];
        $data['provinsi'] = $p['provinsi'];
        $data['ortu_notelp'] = $p['ortu_notelp'];
        $data['ortu_ayah_pkj'] = $p['ortu_ayah_pkj'];
        $data['ortu_ibu_pkj'] = $p['ortu_ibu_pkj'];
        $data['wali'] = $p['wali'];
        $data['wali_alamat'] = $p['wali_alamat'];
        $data['notelp_rumah'] = $p['notelp_rumah'];
        $data['wali_pkj'] = $p['wali_pkj'];
        $data['foto'] = 'default.jpg';

        $this->db->where('siswa_id', $p['_id']);
        $this->db->update('m_siswa', $data);
    }
}
