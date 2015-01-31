<?php

/**
 * Description of group
 * It is a controller of group. It will controll all action of group management
 * @author Sina
 */
class Company extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->checkSession()) {
			redirect('authentication/login');
		}

		$this->load->model(array('company/mod_company', 'category/mod_category'));
	}

    public function index() {
        $this->page();
    }

    public function page() {

		if (!$this->checkSession()) {
			redirect('authentication/login');
			exit();
		}
		$data['companies']  = $this->mod_company->getAllCompanies();
		$data['title']  = "ILocationCambodia Backend";
		$data['page']   = 'company/list';
		$data['action'] = 'Company';
		$this->load->view('masterpage/master', $data);
    }

    public function addNew() {
		$data['categories']  = $this->mod_category->getAllCategories();
        $data['title']  = "ILocationCambodia Backend";
        $data['page']   = 'company/addNew';
        $data['action'] = 'New Company';
        $this->load->view('masterpage/master', $data);
    }

	public $img_name = '';

    public function create() {

        if (isset($_POST['btn_submit'])) {

			$cat_name        = $_POST['cat_name'];
			$user_name        = $_POST['user_name'];
			$password        = md5($_POST['password']);
			$repassword        = $_POST['password'];
			$image        = 'no-image.png';
			$com_name        = $_POST['com_name'];

            $this->mod_company->create($cat_name, $user_name, $password, $repassword, $image, $com_name);
        }
        redirect('ohadmin/company');
    }

    public function edit($com_id) {
		$data['categories']  = $this->mod_category->getAllCategories();
        $data['title']  = "";
        $data['page']   = 'company/edit';
        $data['action'] = 'Edit Company';
        $data['companies']  = $this->mod_company->edit($com_id);

        $this->load->view('masterpage/master', $data);
    }

	public function update() {

		if (isset($_POST['btn_submit'])) {

			$cat_id       = $_POST['cat_id'];
			$com_id       = $_POST['com_id'];
			$com_name        = $_POST['com_name'];
			$user_name        = $_POST['user_name'];
			$password        = $_POST['password'];
			$image        = 'no-image.png';
			$approve        = $_POST['approve'];

			$this->mod_company->update($cat_id, $com_id, $com_name, $user_name, $password, $image, $approve);
		}
		redirect('ohadmin/company');
	}

	public function delete($cat_id='') {

		$this->mod_company->delete($cat_id);

		redirect('ohadmin/company');
	}

	public function approve($cat_id='') {
		$this->mod_company->approve($cat_id);

		redirect('ohadmin/company');
	}

	public function pending($cat_id='') {
		$this->mod_company->pending($cat_id);

		redirect('ohadmin/company');
	}

    /**
     * Check user had logged in or not
     * @return boolean
     */
    public function checkSession() {
        if ($this->session->userdata('ohadmin')) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

}
