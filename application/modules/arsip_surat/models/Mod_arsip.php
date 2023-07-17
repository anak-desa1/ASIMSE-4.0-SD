<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_arsip extends CI_Model
{

	public function add_arsip($data)
	{
		$this->db->insert('surat_arsip', $data);
		return true;
	}

	public function read_arsip()
	{
		$inbox = $this->db->get('surat_arsip');
		return $inbox->result();
	}

	public function view_arsip($id)
	{
		return $this->db->get_where('surat_arsip', array('id' => $id));
	}
}

/* End of file Mod_surat.php */
/* Location: ./application/models/Mod_surat.php */