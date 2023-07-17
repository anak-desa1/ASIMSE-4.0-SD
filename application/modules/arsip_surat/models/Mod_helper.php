<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_helper extends CI_Model
{

	public function sekolah()
	{
		$sekolah = $this->db->get('m_sekolah');
		return $sekolah->result();
	}

	public function pelajaran()
	{
		$pelajaran = $this->db->get('tb_pelajaran');
		return $pelajaran->result();
	}
}

/* End of file Mod_helper.php */
/* Location: ./application/models/Mod_helper.php */
