<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Combo_model extends CI_Model {

	public function combo_pelanggaran($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_poin_pelanggaran,nama_poin_pelanggaran,poin FROM mst_poin_pelanggaran ORDER BY id_poin_pelanggaran ASC");
		$hasil .= '<option value>PILIH PELANGGARAN</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_poin_pelanggaran) {
				$hasil .= '<option value="'.$h->id_poin_pelanggaran.'" selected="selected">'.$h->nama_poin_pelanggaran.' <b> | '.$h->poin.' Poin</b></option>';
			} else {
				$hasil .= '<option value="'.$h->id_poin_pelanggaran.'">'.$h->nama_poin_pelanggaran.' <b> |  '.$h->poin.' Poin</b></option>';
			}
		}
		return $hasil;
	}

	public function combo_pelanggaran_rpt($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_poin_pelanggaran,nama_poin_pelanggaran,poin FROM mst_poin_pelanggaran ORDER BY id_poin_pelanggaran ASC");
		$hasil .= '<option value="all">[ SEMUA PELANGGARAN ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_poin_pelanggaran) {
				$hasil .= '<option value="'.$h->id_poin_pelanggaran.'" selected="selected">'.$h->nama_poin_pelanggaran.' <b> | '.$h->poin.' Poin</b></option>';
			} else {
				$hasil .= '<option value="'.$h->id_poin_pelanggaran.'">'.$h->nama_poin_pelanggaran.' <b> |  '.$h->poin.' Poin</b></option>';
			}
		}
		return $hasil;
	}

	public function combo_kelas($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_kelas,nama_kelas FROM mst_kelas WHERE aktif_kelas = 1 ORDER BY id_kelas ASC");
		$hasil .= '<option selected="selected" value>[ PILIH KELAS ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_kelas) {
				$hasil .= '<option value="'.$h->id_kelas.'" selected="selected">'.$h->nama_kelas.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_kelas.'">'.$h->nama_kelas.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_tahun_ajaran_only($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran ORDER BY id_tahun_ajaran DESC");
		$hasil .= '<option selected="selected" value>[ PILIH TAHUN AJARAN ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->tahun_ajaran) {
				$hasil .= '<option value="'.$h->tahun_ajaran.'" selected="selected">'.$h->tahun_ajaran.'</option>';
			} else {
				$hasil .= '<option value="'.$h->tahun_ajaran.'">'.$h->tahun_ajaran.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_tahun_ajaran_rpt($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran GROUP BY tahun_ajaran ORDER BY id_tahun_ajaran DESC");
		$hasil .= '<option selected="selected" value>[ PILIH TAHUN AJARAN ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->tahun_ajaran) {
				$hasil .= '<option value="'.$h->tahun_ajaran.'" selected="selected">'.$h->tahun_ajaran.'</option>';
			} else {
				$hasil .= '<option value="'.$h->tahun_ajaran.'">'.$h->tahun_ajaran.'</option>';
			}
		}
		return $hasil;
	}
	

	public function combo_kelas_report($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_kelas,nama_kelas FROM mst_kelas WHERE aktif_kelas = 1 ORDER BY id_kelas ASC");
		$hasil .= '<option selected="selected" value="all">[ SEMUA KELAS ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_kelas) {
				$hasil .= '<option value="'.$h->id_kelas.'" selected="selected">'.$h->nama_kelas.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_kelas.'">'.$h->nama_kelas.'</option>';
			}
		}
		return $hasil;
	}

}