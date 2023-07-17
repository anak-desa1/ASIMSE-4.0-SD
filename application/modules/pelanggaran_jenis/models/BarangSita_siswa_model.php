<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BarangSita_siswa_model extends CI_Model
{


	public function barangsita($tahun_ajaran)
	{
		$q = $this->db->query("SELECT * FROM barangsita_siswa  
			INNER JOIN mst_siswa ON barangsita_siswa.id_siswa = mst_siswa.id_siswa 
			INNER JOIN mst_kelas ON barangsita_siswa.id_kelas = mst_kelas.id_kelas 
			WHERE barangsita_siswa.tahun_ajaran = '$tahun_ajaran' ORDER BY id_barangsita_siswa DESC");
		return $q;
	}
}
