<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location extends Site_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model(array('mod_company'));
    }

    public function index() {
		$data['categories'] = $this->mod_company->findAllCategories();
		$data['companies'] = $this->mod_company->findAllCompanies();
        $data['title']  = 'Home page';
        $data['page']   = 'location/view';
        $data['action'] = 'Home page';
        $this->load->view('layout/layout', $data);
    }

	public function show($company='') {
		if(!empty($company)) {
			$data['companies'] = $this->mod_company->findByName($company);
			foreach ($data['companies']->result_array() as $name) {
				$data['name'] = $name['com_name'];
				$data['image'] = $name['com_logo'];
				$data['description'] = $name['description'];
			}
			if($data['companies']->num_rows()>0) {
				$data['title']  = $company;
				$data['page']   = 'location/company';
				$data['action'] = 'Company';
				$this->load->view('layout/company', $data);
			}else {
				redirect(BASE_URL);
			}
		}else{
			redirect(BASE_URL);
		}
	}

}