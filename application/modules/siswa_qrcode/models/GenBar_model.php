<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Genbar_Model extends CI_model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getShow($nis)
	{
		$this->db->where('nis', $nis);
		$hasil = $this->db->get('m_naik_kelas');
		return $hasil;
	}

	public function getshow_query($nis)
	{
		$get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
		$data['tasm'] = $get_tasm['tahun'];
		$ta = substr($data['tasm'], 0, 4);

		$result = $this->search_value($_POST['term'] = null);
		$this->db->select('nis,tingkat,nama');
		$this->db->from('m_siswa');
		// $this->db->where('th_active',  $ta);
		$this->db->where('nama', $_POST['id']);
		$hasil = $this->db->get();
		return $hasil;
	}

	function search_value($title)
	{
		$this->db->like('nama', $title, 'both');
		$this->db->order_by('nama', 'ASC');
		$this->db->limit(10);
		return $this->db->get('m_siswa')->result();
	}

	// tampil data
	var $table = 'm_siswa u';
	var $column_order = array('', 'u.nis' . 'u.nama', 'u.nisn', 'u.tgl_lahir', 'u.jk'); //set order berdasarkan field yang di mau
	var $column_search = array('u.nis', 'u.nama', 'u.nisn', 'u.tgl_lahir', 'u.jk'); //set field yang bisa di search
	var $order = array('u.siswa_id' => 'desc'); // default order 

	private function _get_data()
	{
		$this->db->select('u.*');
		$this->db->from($this->table);

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

	function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_kelas()
	{
		$this->db->select('*');
		$this->db->from('l_kelas');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_tahun()
	{
		$this->db->select('*');
		$this->db->from('l_tahun');
		$query = $this->db->get();
		return $query->result();
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
		$data['notelp'] = $p['notelp'];
		$data['diterima_kelas'] = $p['diterima_kelas'];
		$data['diterima_tgl'] = $p['diterima_tgl'];
		$data['foto'] = 'default.jpg';
		$data['is_active'] = $p['is_active'];

		$this->db->where('siswa_id', $p['_id']);
		$this->db->update('m_siswa', $data);
	}
	// end tampil data 
}
