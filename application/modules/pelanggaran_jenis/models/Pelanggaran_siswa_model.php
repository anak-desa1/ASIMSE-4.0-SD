<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggaran_siswa_model extends CI_Model
{


	public function pelanggaran_siswa($tahun_ajaran)
	{
		$q = $this->db->query("SELECT * FROM mst_pelanggaran_siswa WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY id_pelanggaran_siswa DESC");
		return $q;
	}

	public function pelanggaran_siswa_edit($id)
	{
		$q = $this->db->query("SELECT * FROM mst_pelanggaran_siswa WHERE id_pelanggaran_siswa = '$id'");
		return $q;
	}

	public function pelanggaran_siswa_id($id_siswa, $tahun_ajaran)
	{
		$q = $this->db->query("SELECT * FROM mst_pelanggaran_siswa WHERE id_siswa = '$id_siswa' AND tahun_ajaran = '$tahun_ajaran' ORDER BY id_pelanggaran_siswa DESC");
		return $q;
	}
}
