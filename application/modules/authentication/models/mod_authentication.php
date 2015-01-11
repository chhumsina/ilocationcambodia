<?php

class Mod_authentication extends CI_Model {
    
    /**
     * Check username and password. If exist, create three sessions. 
     * 1. ohadmin: user logged in
     * 2. userId: user's Id
     * 3. userName: user's name
     * @param string $username
     * @param string $password
     * @return bool 
     */
    public function login($username, $password){
        $this->db->select('*');
        $this->db->where(field('use_name'), $username);
        $this->db->where(field('use_password'), $password);
        $this->db->from(table('tbl_user'));
        $data=$this->db->get();
        if($data->num_rows()>0){
            $userData=$data->row_array();
            $this->session->set_userdata('ohadmin', TRUE);
            $this->session->set_userdata('userId', $userData[field('useId')]);
            $this->session->set_userdata('userName', $userData[field('useName')]);
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
