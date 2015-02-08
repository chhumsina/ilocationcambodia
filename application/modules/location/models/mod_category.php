<?php

class mod_category extends CI_Model {

	public function findByCategory($category) {
		$this->db->select('*');
		$this->db->from(table('ilc_categories'));
		$this->db->join('ilc_companies', 'ilc_categories.cat_id = ilc_companies.cat_id', 'left');
		$this->db->where(field('cat_name'), $category);
		$this->db->where(field('approve'), 1);
		return $this->db->get();
	}

}

?>
