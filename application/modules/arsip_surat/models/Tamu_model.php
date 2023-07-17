<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tamu_model extends CI_Model {

	public function tamu() {
		$q = $this->db->query("SELECT * FROM mst_bukutamu ORDER BY id_tamu DESC");
		return $q;
	}

	public function tamu_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_bukutamu WHERE id_tamu = '$id'");
		return $q;
	}
}