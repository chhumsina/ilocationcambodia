<?php

class mod_member extends CI_Model {

	/**
	 * @param $email
	 * @param $password
	 * @return bool
	 */
	public function login($user_name, $password){
		$this->db->select('*');
		$this->db->where(field('use_name'), $user_name);
		$this->db->where(field('use_password'), $password);
		$this->db->where(field('approve'), 1);
		$this->db->from(table('ilc_companies'));
		$data=$this->db->get();
		if($data->num_rows()>0){
			$userData=$data->row_array();
			$this->session->set_userdata('useName', $userData[field('use_name')]);
			$this->session->set_userdata('comId', $userData[field('com_id')]);
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
?>
