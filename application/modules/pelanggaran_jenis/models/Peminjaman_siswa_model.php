<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Peminjaman_siswa_model extends CI_Model
{


	public function peminjaman($tahun_ajaran)
	{
		$q = $this->db->query("SELECT * FROM peminjaman_siswa  
			INNER JOIN mst_siswa ON peminjaman_siswa.id_siswa = mst_siswa.id_siswa 
			INNER JOIN mst_kelas ON peminjaman_siswa.id_kelas = mst_kelas.id_kelas 
			WHERE peminjaman_siswa.tahun_ajaran = '$tahun_ajaran' ORDER BY id_peminjaman_siswa DESC");
		return $q;
	}
}
