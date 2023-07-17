<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_ijazah extends CI_Model
{

	public function add($data)
	{
		$this->db->insert('surat_ijazah', $data);
		return true;
	}

	public function update($data)
	{
		$this->db->update('surat_ijazah', $data);
	}

	public function read()
	{
		$ijazah = $this->db->order_by('id', 'DESC');
		$ijazah = $this->db->get('surat_ijazah');
		return $ijazah->result();
	}

	public function detail($id)
	{
		return $this->db->get_where('surat_ijazah', array('id' => $id));
	}

	public function delete($id)
	{
		return $this->db->delete('surat_ijazah', array('id' => $id));
	}

	public function count_ijazah()
	{
		$query = $this->db->query("SELECT * FROM surat_ijazah");
		$ijazah = $query->num_rows();
		return $ijazah;
	}
}

/* End of file Mod_ijazah.php */
/* Location: ./application/models/Mod_ijazah.php */