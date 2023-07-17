<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pegawai_model extends CI_Model

{

    public function simpan_tambah()
    {
        // cek user exist
        $cek = $this->db->get_where('pegawai_data', ['email' => $this->input->post('email')])->row_array();
        if ($cek) {
            return json_encode(['status' => 'error', 'pesan' => 'Gagal menyimpan data,Nama Panggilan sudah ada..']);
        }
        $nik = $this->input->post('nik', true);
        $email_pribadi = $this->input->post('email_pribadi', true);
        $email = $this->input->post('email', true);
        $nama_lengkap = $this->input->post('nama_lengkap', true);
        $alamat = $this->input->post('alamat', true);
        $telp = $this->input->post('telp', true);
        $tgl_lahir = $this->input->post('tgl_lahir', true);
        $tgl_masuk = $this->input->post('tgl_masuk', true);
        $departemen_id = $this->input->post('departemen_id', true);
        $jabatan_id = $this->input->post('jabatan_id', true);
        $lokasi_id = $this->input->post('lokasi_id', true);
        $atasan1 = $this->input->post('atasan1', true);
        $atasan2 = $this->input->post('atasan2', true);
        $hrd = $this->input->post('hrd');
        //insert ke table data karyawan
        $this->db->insert('pegawai_data', [
            "nik" => $nik,
            "email_pribadi" => $email_pribadi,
            "email" => $email . "@sman1-bunguranutara.sch.id",
            "nama_lengkap" => $nama_lengkap,
            "alamat" => $alamat,
            "telp" => $telp,
            "tgl_lahir" => $tgl_lahir,
            "tgl_masuk" => $tgl_masuk,
            "departemen_id" => $departemen_id,
            "jabatan_id" => $jabatan_id,
            "lokasi_id" => $lokasi_id,
            "atasan1" => $atasan1,
            "atasan2" => $atasan2,
            "hrd" => $hrd,
            "foto" => 'default.jpg',
        ]);
        return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }

    public function updateData()
    {
        $data_id = $this->input->post('data_id', true);
        $nik = $this->input->post('nik', true);
        $email_pribadi = $this->input->post('email_pribadi', true);
        $email = $this->input->post('email', true);
        $nama_lengkap = $this->input->post('nama_lengkap', true);
        $alamat = $this->input->post('alamat', true);
        $telp = $this->input->post('telp', true);
        $tgl_lahir = $this->input->post('tgl_lahir', true);
        $tgl_masuk = $this->input->post('tgl_masuk', true);
        $departemen_id = $this->input->post('departemen_id', true);
        $jabatan_id = $this->input->post('jabatan_id', true);
        $lokasi_id = $this->input->post('lokasi_id', true);
        $atasan1 = $this->input->post('atasan1', true);
        $atasan2 = $this->input->post('atasan2', true);
        $hrd = $this->input->post('hrd');

        $data = [
            "nik" => $nik,
            "email_pribadi" => $email_pribadi,
            "email" => $email,
            "nama_lengkap" => $nama_lengkap,
            "alamat" => $alamat,
            "telp" => $telp,
            "tgl_lahir" => $tgl_lahir,
            "tgl_masuk" => $tgl_masuk,
            "departemen_id" => $departemen_id,
            "jabatan_id" => $jabatan_id,
            "lokasi_id" => $lokasi_id,
            "atasan1" => $atasan1,
            "atasan2" => $atasan2,
            "hrd" => $hrd,
            "foto" => 'default.jpg',
        ];

        $this->db->where("data_id", $data_id);
        $this->db->update('pegawai_data', $data);

        return json_encode(['status' => 'success', 'pesan' => 'Berhasil Ubah Data !']);
    }

    var $table = 'pegawai_data u';
    var $column_order = array('', 'u.nik', 'nama_lengkap'); //set order berdasarkan field yang di mau
    var $column_search = array('u.nik', 'nama_lengkap'); //set field yang bisa di search
    var $order = array('u.nik' => 'desc'); // default order 

    private function _get_data()
    {
        $this->db->select('u.*');
        $this->db->from($this->table);
        // $this->db->join('pegawai_data dk', 'dk.nik = u.nik', 'left');
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

    public function get_tampil($limit, $start)
    {
        // return $this->db->get('pegawai_data', $limit, $start)->result_array();
        $this->db->order_by("nik", "desc");
        return $this->db->get('pegawai_data', $limit, $start)->result_array();
    }

    public function get_countdata()
    {
        return $this->db->get('pegawai_data')->num_rows();
    }

    public function get_departemen()
    {
        $this->db->select('*');
        $this->db->from('access_departemen');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data()
    {
        $pegawai =
            $this->db->select('k.*,d.*,l.*,r.*')
            ->from('pegawai_data k')
            ->join('access_departemen d', 'k.dep_id = d.departemen_id', 'left')
            ->join('access_lokasi l', 'k.lok_id = l.lokasi_id', 'left')
            ->join('pegawai_role r', 'k.role_id = r.id', 'left')
            ->get()->result_array();
        return $pegawai;
    }

    public function get_editData($id)
    {
        $bagidata =
            $this->db->select('k.*,r.*,d.*,l.*')
            ->from('pegawai_data k')
            ->join('access_departemen d', 'k.departemen_id = d.departemen_id', 'left')
            ->join('access_lokasi l', 'k.lokasi_id = l.lokasi_id', 'left')
            ->join('access_jabatan r', 'k.jabatan_id = r.jabatan_id', 'left')
            ->where(['k.data_id' => $id])
            ->get()->row_array();
        return $bagidata;
    }
}
