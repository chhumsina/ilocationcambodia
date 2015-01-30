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
			redirect(BASE_URL);
		}

		$this->load->model(array('company/mod_company', 'category/mod_category'));
	}

    public function index() {
        $this->page();
    }

    public function page() {

		if (!$this->checkSession()) {
			redirect(BASE_URL);
			exit();
		}

		$com_id = $this->session->userdata('comId');
		$data['companies']  = $this->mod_company->getCompany($com_id);
		$data['categories']  = $this->mod_category->getAllCategories();
		$data['title']  = "ILocationCambodia Backend";
		$data['page']   = 'company/edit';
		$data['action'] = 'Company';
		$this->load->view('masterpage/master', $data);
    }

	public function update() {

		if (isset($_POST['btn_submit'])) {

			$cat_id       = $_POST['cat_id'];
			$com_id       = $_POST['com_id'];
			$com_name        = $_POST['com_name'];
			$user_name        = $_POST['user_name'];
			$email        = $_POST['email'];
			$phone_1        = $_POST['phone_1'];
			$phone_2        = $_POST['phone_2'];
			$description        = $_POST['description'];
			$approve        = $_POST['approve'];

			$this->mod_company->update($cat_id, $com_id, $com_name, $user_name, $email, $phone_1, $phone_2, $description, $approve);
			$this->session->set_userdata('ms_succss', MSG_SUCCUSS);
		}
		redirect('member/company');
	}

    /**
     * Check user had logged in or not
     * @return boolean
     */
    public function checkSession() {
        if ($this->session->userdata('useName')) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
}
