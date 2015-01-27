<?php

class mod_company extends CI_Model {

	// list
	public function getAllCompanies() {
		$this->db->select('*');
		$this->db->from(table('ilc_companies'));
		return $this->db->get();
	}
}
?>
