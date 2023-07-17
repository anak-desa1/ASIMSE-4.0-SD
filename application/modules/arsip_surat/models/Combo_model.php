<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Combo_model extends CI_Model {

	public function combo_jabatan_admin($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_jabatan,nama_jabatan FROM mst_jabatan WHERE hak_akses = 'admin' ORDER BY id_jabatan ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_jabatan) {
				$hasil .= '<option value="'.$h->id_jabatan.'" selected="selected">'.$h->nama_jabatan.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_jabatan.'">'.$h->nama_jabatan.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_ruangan($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_ruangan,nama_ruangan FROM mst_ruangan ORDER BY id_ruangan ASC");
		foreach($q->result() as $h) {
			if($id == $h->id_ruangan) {
				$hasil .= '<option value="'.$h->id_ruangan.'" selected="selected">'.$h->nama_ruangan.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_ruangan.'">'.$h->nama_ruangan.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_rak($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_rak,nama_rak FROM mst_rak ORDER BY id_rak ASC");
		foreach($q->result() as $h) {
			if($id == $h->id_rak) {
				$hasil .= '<option value="'.$h->id_rak.'" selected="selected">'.$h->nama_rak.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_rak.'">'.$h->nama_rak.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_box($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_box,nama_box FROM mst_box ORDER BY id_box ASC");
		foreach($q->result() as $h) {
			if($id == $h->id_box) {
				$hasil .= '<option value="'.$h->id_box.'" selected="selected">'.$h->nama_box.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_box.'">'.$h->nama_box.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_map($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_map,nama_map FROM mst_map ORDER BY id_map ASC");
		foreach($q->result() as $h) {
			if($id == $h->id_map) {
				$hasil .= '<option value="'.$h->id_map.'" selected="selected">'.$h->nama_map.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_map.'">'.$h->nama_map.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_urut($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_urut,nama_urut FROM mst_urut ORDER BY id_urut ASC");
		foreach($q->result() as $h) {
			if($id == $h->id_urut) {
				$hasil .= '<option value="'.$h->id_urut.'" selected="selected">'.$h->nama_urut.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_urut.'">'.$h->nama_urut.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_jenis_dokumen($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_jenis_dokumen,nama_jenis_dokumen FROM mst_jenis_dokumen ORDER BY id_jenis_dokumen ASC");
		foreach($q->result() as $h) {
			if($id == $h->nama_jenis_dokumen) {
				$hasil .= '<option value="'.$h->nama_jenis_dokumen.'" selected="selected">'.$h->nama_jenis_dokumen.'</option>';
			} else {
				$hasil .= '<option value="'.$h->nama_jenis_dokumen.'">'.$h->nama_jenis_dokumen.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_lemari($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_lemari,nama_lemari FROM mst_lemari ORDER BY id_lemari ASC");
		foreach($q->result() as $h) {
			if($id == $h->id_lemari) {
				$hasil .= '<option value="'.$h->id_lemari.'" selected="selected">'.$h->nama_lemari.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_lemari.'">'.$h->nama_lemari.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_tahun_ajaran_only($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran GROUP BY tahun_ajaran ORDER BY id_tahun_ajaran DESC");
		$hasil .= '<option selected="selected" value>Pilih Tahun Ajaran</option>';
		foreach($q->result() as $h) {
			if($id == $h->tahun_ajaran) {
				$hasil .= '<option value="'.$h->tahun_ajaran.'" selected="selected">'.$h->tahun_ajaran.'</option>';
			} else {
				$hasil .= '<option value="'.$h->tahun_ajaran.'">'.$h->tahun_ajaran.'</option>';
			}
		}
		return $hasil;
	}
}