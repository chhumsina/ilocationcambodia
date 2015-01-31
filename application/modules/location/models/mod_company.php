<?php

class mod_company extends CI_Model {

	public function findAllCompanies() {
		$this->db->select('*');
		$this->db->from(table('ilc_companies'));
		$this->db->where(field('approve'), 1);
		$this->db->where(field('utype_id'), 2);
		return $this->db->get();
	}

	public function findAllCategories() {
		$this->db->select('*');
		$this->db->from(table('ilc_categories'));
		return $this->db->get();
	}

	public function findByName($company) {
		$this->db->select('*');
		$this->db->from(table('ilc_branches'));
		$this->db->join('ilc_companies', 'ilc_branches.com_id = ilc_companies.com_id', 'left');
		$this->db->where(field('com_name'), $company);
		$this->db->where(field('bra_approve'), 1);
		return $this->db->get();
	}

}

?>
