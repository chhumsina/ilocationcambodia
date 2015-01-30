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
        $data['title']  = "ILocationCambodia Backend";
        $data['page']   = 'ohadmin/dashboard';
        $data['action'] = 'Dashboard';
        $this->load->view('masterpage/master', $data);
    }

    public function checkSession() {
        if ($this->session->userdata('ohadmin')) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

	public function logout(){
		$this->session->set_flashdata('message', 'You have been logged out.');
		$this->session->unset_userdata('ohadmin');
		redirect('authentication/login');
	}

    public function delete($id) {
        $this->mod_ohadmin->delete($id);

        redirect('ohadmin');
    }


}
