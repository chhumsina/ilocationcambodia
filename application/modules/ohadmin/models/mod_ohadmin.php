<?php

class Mod_Ohadmin extends CI_Model {

     public function approve($id) {
        $data = array(
            field('pag_status') => 1
        );
        $this->db->where(field('pag_id'), $id);
        if ($this->db->update(table('tbl_page'), $data)) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function pending($id) {
        $data = array(
            field('pag_status') => 0
        );
        $this->db->where(field('pag_id'), $id);
        if ($this->db->update(table('tbl_page'), $data)) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function delete($id) {
        $this->db->where(field('pag_id'), $id);
        if ($this->db->delete(table('tbl_page'))) {

            return TRUE;
        }
        return FALSE;
    }

}
