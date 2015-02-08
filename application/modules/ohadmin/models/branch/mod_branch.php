<?php

class mod_branch extends CI_Model {

	// list
	public function getAllBraches() {
		$this->db->select('*');
		$this->db->from(table('ilc_branches'));
		return $this->db->get();
	}

	// count
	public function countAll(){
		$this->db->from(table('ilc_branches'));
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
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

	// delete
	public function delete($bra_id) {

		$this->db->where(field('branch_id'), $bra_id);
		if ($this->db->delete(table('ilc_branches'))) {

			return TRUE;
		}
		return FALSE;
	}

	// approve
	public function approve($bra_id) {
		$data = array(
				field('approve') => 0,
		);
		$this->db->where(field('branch_id'), $bra_id);
		if ($this->db->update(table('ilc_branches'), $data)) {

			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	// pending
	public function pending($bra_id) {
		$data = array(
				field('approve') => 1,
		);
		$this->db->where(field('branch_id'), $bra_id);
		if ($this->db->update(table('ilc_branches'), $data)) {

			return TRUE;
		}
		else {
			return FALSE;
		}
	}
}
?>
