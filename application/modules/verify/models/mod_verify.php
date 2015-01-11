<?php

class Mod_verify extends CI_Model {

    function verifyCode($verificationCode) {
        $sql = "update tbl_page set pag_status='1' WHERE pag_activated_code=?";
        $this->db->query($sql, array($verificationCode));
        return $this->db->affected_rows();
    }

    public function verifyEmail($verificationCode) {
        $this->db->select('*');
        $this->db->where(field('pag_activated_code'), $verificationCode);
        $this->db->from(table('tbl_page'));
        return $this->db->get();
    }

}
