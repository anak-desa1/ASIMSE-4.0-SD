<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model {


	public function poin_pelanggaran() {
		$q = $this->db->query("SELECT * FROM mst_poin_pelanggaran ORDER BY id_poin_pelanggaran DESC");
		return $q;
	}

	public function poin_pelanggaran_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_poin_pelanggaran WHERE id_poin_pelanggaran = '$id'");
		return $q;
	}

	public function sanksi() {
		$q = $this->db->query("SELECT * FROM mst_sanksi ORDER BY id_sanksi DESC");
		return $q;
	}
}