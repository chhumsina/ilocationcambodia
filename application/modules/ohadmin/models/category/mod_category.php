<?php

class mod_category extends CI_Model {

	// list
	public function getAllCategories() {
		$this->db->select('*');
		$this->db->from(table('ilc_categories'));
		$this->db->order_by(field('cat_id'), 'desc');
		return $this->db->get();
	}

	// count
	public function countAll(){
		$this->db->from(table('ilc_categories'));
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
	}

	// create
	public function create($name, $approve) {

		$data = array(
				field('cat_name') => $name,
				field('cat_approve') => $approve
		);
		if ($this->db->insert(table('ilc_categories'), $data)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		return FALSE;
	}

	// delete
	public function delete($cat_id) {

		$this->db->where(field('cat_id'), $cat_id);
		if ($this->db->delete(table('ilc_categories'))) {

			return TRUE;
		}
		return FALSE;
	}

	// approve
	public function approve($cat_id) {
		$data = array(
				field('cat_approve') => 0,
		);
		$this->db->where(field('cat_id'), $cat_id);
		if ($this->db->update(table('ilc_categories'), $data)) {

			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	// pending
	public function pending($cat_id) {
		$data = array(
				field('cat_approve') => 1,
		);
		$this->db->where(field('cat_id'), $cat_id);
		if ($this->db->update(table('ilc_categories'), $data)) {

			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	// Edit
	public function edit($cat_id) {

		$this->db->select('*');
		$this->db->from(table('ilc_categories'));
		$this->db->where(field('cat_id'), $cat_id);
		return $this->db->get();
	}

   // Update
	public function update($cat_id, $cat_name,$approve) {

		$data = array(
			field('cat_name') => $cat_name,
			field('cat_approve') => $approve,
		);
		$this->db->where(field('cat_id'), $cat_id);

		if ($this->db->update(table('ilc_categories'), $data)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		return FALSE;
	}


	/**
	 * @param $how_title
	 * @return mixed
	 */
	// get Single Howto
	public  function getSigleHowto($how_title) {
		$this->db->select('*');
		$this->db->from(table('tbl_howto'));
		$this->db->where(field('how_title'),$how_title);
		return $this->db->get();
	}

}
?>
