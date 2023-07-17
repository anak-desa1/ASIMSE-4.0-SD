<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_surat extends CI_Model
{

	// surat msuk
	public function read_inbox()
	{
		$inbox = $this->db->select('*')
			->from('surat_masuk')
			->order_by('id', 'DESC')
			->get()->result_array();
		return $inbox;
	}

	public function add_inbox($data)
	{
		$this->db->insert('surat_masuk', $data);
		return true;
	}

	public function update_inbox($data)
	{
		$this->db->update('surat_masuk', $data);
		return true;
	}

	public function view_masuk($id)
	{
		return $this->db->get_where('surat_masuk', array('id' => $id));
	}

	public function delete_inbox($id)
	{
		return $this->db->delete('surat_masuk', array('id' => $id));
	}
	// end surat masuk

	// surat keluar
	public function read_send()
	{
		$send = $this->db->select('*')
			->from('surat_keluar')
			->order_by('id', 'DESC')
			->get()->result_array();
		return $send;
	}

	public function add_send($data)
	{
		$this->db->insert('surat_keluar', $data);
		return true;
	}

	public function update_send($data)
	{
		$this->db->update('surat_keluar', $data);
		return true;
	}

	public function view_keluar($id)
	{
		return $this->db->get_where('surat_keluar', array('id' => $id));
	}

	public function delete_send($id)
	{
		return $this->db->delete('surat_keluar', array('id' => $id));
	}
	// end surat keluar
}

/* End of file Mod_surat.php */
/* Location: ./application/models/Mod_surat.php */