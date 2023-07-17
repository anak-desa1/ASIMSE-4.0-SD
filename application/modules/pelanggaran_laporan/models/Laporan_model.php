<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model
{


	public function pelanggaran_siswa($tgl_awal, $tgl_akhir, $tahun_ajaran, $id_kelas, $id_siswa, $id_poin_pelanggaran)
	{
		if ($id_siswa != "" && $id_siswa != "all") {
			$param = "AND id_siswa = '$id_siswa'";
		} else {
			$param =  '';
		}

		if ($tahun_ajaran != "" && $tahun_ajaran != "all") {
			$tahun_ajaran = str_replace("-", "/", $tahun_ajaran);
			$param2 = "AND tahun_ajaran = '$tahun_ajaran'";
		} else {
			$param2 =  '';
		}

		if ($id_kelas != "" && $id_kelas != "all") {
			$param3 = "AND id_kelas = '$id_kelas'";
		} else {
			$param3 =  '';
		}

		if ($id_poin_pelanggaran != "" && $id_poin_pelanggaran != "all") {
			$param4 = "AND id_poin_pelanggaran = '$id_poin_pelanggaran'";
		} else {
			$param4 =  '';
		}

		$q = $this->db->query("SELECT * FROM mst_pelanggaran_siswa WHERE tanggal >= '$tgl_awal' AND tanggal <= '$tgl_akhir' $param $param2 $param3 $param4 ORDER BY id_pelanggaran_siswa DESC");
		return $q;
	}

	public function absen($tgl_awal, $tgl_akhir, $tahun_ajaran, $id_kelas, $id_siswa, $keterangan)
	{
		if ($id_siswa != "" && $id_siswa != "all") {
			$param = "AND id_siswa = '$id_siswa'";
		} else {
			$param =  '';
		}

		if ($tahun_ajaran != "" && $tahun_ajaran != "all") {
			$tahun_ajaran = str_replace("-", "/", $tahun_ajaran);
			$param2 = "AND tahun_ajaran = '$tahun_ajaran'";
		} else {
			$param2 =  '';
		}

		if ($id_kelas != "" && $id_kelas != "all") {
			$param3 = "AND id_kelas = '$id_kelas'";
		} else {
			$param3 =  '';
		}

		if ($keterangan != "" && $keterangan != "all") {
			$param4 = "AND keterangan = '$keterangan'";
		} else {
			$param4 =  '';
		}

		$q = $this->db->query("SELECT * FROM mst_absen WHERE tanggal_absen >= '$tgl_awal' AND tanggal_absen <= '$tgl_akhir' $param $param2 $param3 $param4 ORDER BY id_tahun_ajaran DESC");
		return $q;
	}

	public function siswa($id_kelas)
	{
		$q = $this->db->query("SELECT * FROM mst_siswa  WHERE id_kelas = '$id_kelas' ORDER BY nama_siswa ASC");
		return $q;
	}

	public function siswa_detail($nis)
	{
		$q = $this->db->query("SELECT * FROM vw_siswa_dt WHERE nis = '$nis'");
		return $q;
	}
}
