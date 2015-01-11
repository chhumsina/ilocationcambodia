<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ohadmin extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }

        $this->load->model(array('mod_ohadmin'));
    }

    public function index() {

        if (!$this->checkSession()) {
            redirect('authentication/login');
            exit();
        }
        $data['pages']  = $this->mod_ohadmin->findAll();
        $data['title']  = "Ohhuge Backend";
        $data['page']   = 'ohadmin/dashboard';
        $data['action'] = 'Dashboard';
        $this->load->view('masterpage/master', $data);
    }

    public function approve($id) {
        $this->mod_ohadmin->approve($id);

        redirect('ohadmin/index');
    }

    public function pending($id) {
        $this->mod_ohadmin->pending($id);

        redirect('ohadmin/index');
    }

    public function checkSession() {
        if ($this->session->userdata('ohadmin')) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function delete($id) {
        $this->mod_ohadmin->delete($id);

        redirect('ohadmin');
    }

}
