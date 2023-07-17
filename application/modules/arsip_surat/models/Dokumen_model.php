<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen_model extends CI_Model {

	public function dokumen() {
		$q = $this->db->query("SELECT * FROM mst_dokumen 
									INNER JOIN mst_jenis_dokumen ON mst_dokumen.nama_jenis_dokumen = mst_jenis_dokumen.nama_jenis_dokumen 
									INNER JOIN mst_ruangan ON mst_dokumen.id_ruangan = mst_ruangan.id_ruangan 
									INNER JOIN mst_lemari ON mst_dokumen.id_lemari = mst_lemari.id_lemari 
									INNER JOIN mst_rak ON mst_dokumen.id_rak = mst_rak.id_rak 
									INNER JOIN mst_box ON mst_dokumen.id_box = mst_box.id_box 
									INNER JOIN mst_map ON mst_dokumen.id_map = mst_map.id_map 
									INNER JOIN mst_urut ON mst_dokumen.id_urut = mst_urut.id_urut ORDER BY id_dokumen DESC");
		return $q;
	}

	public function dokumen_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_dokumen WHERE id_dokumen = '$id'");
		return $q;
	}
}