<?php

class Mod_verifyemail extends CI_Model {

    function verify_email_address($verificationcode) {
        $sql = "update ilc_companies set approve='1' WHERE activate_code=?";
        $this->db->query($sql, array($verificationcode));
        return $this->db->affected_rows();
    }

	public function verifyEmail($verificationText) {
		$this->db->select('*');
		$this->db->where(field('activate_code'), $verificationText);
		$this->db->from(table('ilc_companies'));
		return $this->db->get();
	}

}
