<?php

class mod_company extends CI_Model {

	// list
	public function getCompany($com_id) {
		$this->db->select('*');
		$this->db->from(table('ilc_companies'));
		$this->db->join('ilc_categories', 'ilc_companies.cat_id = ilc_categories.cat_id', 'left');
		$this->db->where(field('com_id'), $com_id);
		return $this->db->get();
	}

	// delete
	public function delete($com_id) {

		$this->db->where(field('com_id'), $com_id);
		if ($this->db->delete(table('ilc_companies'))) {

			return TRUE;
		}
		return FALSE;
	}

	// approve
	public function approve($com_id) {
		$data = array(
				field('approve') => 0,
		);
		$this->db->where(field('com_id'), $com_id);
		if ($this->db->update(table('ilc_companies'), $data)) {

			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	// pending
	public function pending($com_id) {
		$data = array(
				field('approve') => 1,
		);
		$this->db->where(field('com_id'), $com_id);
		if ($this->db->update(table('ilc_companies'), $data)) {

			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	// create
	public function create($cat_name, $user_name, $password,$repassword, $com_name) {
		$data = array(
				field('cat_id') => $cat_name,
				field('use_name') => $user_name,
				field('use_password') => $password,
				field('re_password') => $repassword,
				field('com_name') => $com_name
		);
		if ($this->db->insert(table('ilc_companies'), $data)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		return FALSE;
	}

	// Edit
	public function edit($com_id) {

		$this->db->select('*');
		$this->db->from(table('ilc_companies'));
		$this->db->where(field('com_id'), $com_id);
		return $this->db->get();
	}

	// Update
	public function update($cat_id, $com_id, $com_name, $user_name, $email, $phone_1, $phone_2, $image, $description, $publish, $approve) {

		$data = array(
				field('cat_id') => $cat_id,
				field('com_id') => $com_id,
				field('com_name') => $com_name,
				field('use_name') => $user_name,
				field('email') => $email,
				field('phone_1') => $phone_1,
				field('phone_2') => $phone_2,
				field('com_logo') => $image,
				field('description') => $description,
				field('publish') => $publish,
				field('approve') => $approve,
		);
		$this->db->where(field('com_id'), $com_id);

		if ($this->db->update(table('ilc_companies'), $data)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		return FALSE;
	}

}
?>
