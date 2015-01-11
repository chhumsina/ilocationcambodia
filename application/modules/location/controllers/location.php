<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location extends Site_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model(array('mod_location'));
    }

    public function index() {
		$data['profiles'] = $this->mod_location->findAll();
        $data['title']  = 'Home page';
        $data['page']   = 'location/view';
        $data['action'] = 'Home page';
        $this->load->view('layout/layout', $data);
    }

}