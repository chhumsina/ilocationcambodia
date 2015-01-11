<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_Controller extends MX_Controller {

    function __construct() {
        parent::__construct();
		
		//$this->load->model(array('module/mod_model'));
		//$this->load->library('acl');
		/*
		if(!$this->checkSession()){
			redirect('authentication/login');
			exit();
		}
		
		if(!$this->acl->hasPermission()){
			show_error('Cannot access to this page, please contact administrator!', 403, 'No Permission');
			//echo '<span style="color:red;">No permission!</span>';
		}*/
    }
	
	public function checkSession(){
		if($this->session->userdata('ohadmin')){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
