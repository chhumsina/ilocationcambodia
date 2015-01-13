<?php

class mod_location extends CI_Model {

	public function findAll() {
		$this->db->select('*');
		$this->db->from(table('ilc_branches'));
		return $this->db->get();
	}

}

?>
