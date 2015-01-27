<?php

class mod_branch extends CI_Model {

	// list
	public function getAllBraches() {
		$this->db->select('*');
		$this->db->from(table('ilc_branches'));
		return $this->db->get();
	}

	// create
	public function create($title, $email, $website, $phone_1, $phone_2, $address, $description, $longitude, $latitude, $company) {

		$data = array(
				field('title') => $title,
				field('email') => $email,
				field('website') => $website,
				field('phone_1') => $phone_1,
				field('phone_2') => $phone_2,
				field('address') => $address,
				field('description') => $description,
				field('longitude') => $longitude,
				field('latitude') => $latitude,
				field('com_id') =>  $company	,
		);
		if ($this->db->insert(table('ilc_branches'), $data)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		return FALSE;
	}






	/**
	 * @param $memId
	 * @return mixed
	 */
// get All Howtos
	public function getAllHowtos($memId) {
		$this->db->select('*');
		$this->db->from(table('tbl_howto'));
		$this->db->where(field('mem_id'), $memId);
		$this->db->order_by(field('how_id'), 'desc');
		return $this->db->get();
	}

	/**
	 * @param $how_id
	 * @return mixed
	 */
// single howto
	public function getSingleHowto($how_id) {
		$this->db->select('*');
		$this->db->from(table('tbl_howto'));
		$this->db->where(field('how_id'), $how_id);
		return $this->db->get();
	}
	/**
	 * @param $how_id
	 * @param $mem_id
	 * @return mixed
	 */
// Edit single Howto
	public function editHowto($how_id, $mem_id) {

		$this->db->select('*');
		$this->db->from(table('tbl_howto'));
		$this->db->where(field('how_id'), $how_id);
		$this->db->where(field('mem_id'), $mem_id);
		return $this->db->get();
	}

	/**
	 * @param $how_id
	 * @param $title
	 * @param $image
	 * @param $description
	 * @param $email_show
	 * @param $approve
	 * @return bool
	 */
// Update Howto
	public function updateHowto($how_id, $title, $image, $description, $email_show, $approve) {

		$data = array(
			field('how_title') => $title,
			field('how_image') => $image,
			field('how_description') => $description,
			field('how_author_email_show') => $email_show,
			field('how_approve') => $approve,
		);
		$this->db->where(field('how_id'), $how_id);

		if ($this->db->update(table('tbl_howto'), $data)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		return FALSE;
	}

	/**
	 * @param $how_id
	 * @param $mem_id
	 * @return bool
	 */
	public function delete($how_id, $mem_id) {

		$this->db->where(field('how_id'), $how_id);
		$this->db->where(field('mem_id'), $mem_id);
		if ($this->db->delete(table('tbl_howto'))) {

			return TRUE;
		}
		return FALSE;
	}

	/**
	 * @param $mem_id
	 * @param $how_id
	 * @param $how_approve
	 * @return bool
	 */
	public function approveHowto($mem_id, $how_id, $how_approve) {
		$data = array(
			field('how_approve') => $how_approve,
		);

		$this->db->where(field('mem_id'), $mem_id);
		$this->db->where(field('how_id'), $how_id);
		if ($this->db->update(table('tbl_howto'), $data)) {

			return TRUE;
		}
		else {
			return FALSE;
		}
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
