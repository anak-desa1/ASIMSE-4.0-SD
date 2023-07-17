<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Absen_model extends CI_Model
{


	public function absen($id_tahun_ajaran)
	{
		$q = $this->db->query("SELECT * FROM mst_absen WHERE id_tahun_ajaran = '$id_tahun_ajaran' ORDER BY tanggal_absen DESC");
		return $q;
	}
}
