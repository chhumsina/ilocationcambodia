<?php

/**
 * Description of group
 * It is a controller of group. It will controll all action of group management
 * @author Sina
 */
class Category extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->checkSession()) {
			redirect('authentication/login');
		}

		$this->load->model(array('category/mod_category'));
	}

    public function index() {
        $this->page();
    }

    public function page() {

		if (!$this->checkSession()) {
			redirect('authentication/login');
			exit();
		}
		$data['categories']  = $this->mod_category->getAllCategories();
		$data['title']  = "ILocationCambodia Backend";
		$data['page']   = 'category/list';
		$data['action'] = 'Category';
		$this->load->view('masterpage/master', $data);
    }

    public function addNew() {
        $data['title']  = "ILocationCambodia Backend";
        $data['page']   = 'category/addNew';
        $data['action'] = 'New Category';
        $this->load->view('masterpage/master', $data);
    }

	public $img_name = '';

    public function create() {

        if (isset($_POST['btn_submit'])) {

			$name        = $_POST['cat_name'];
			$approve        = $_POST['approve'];

            $this->mod_category->create($name, $approve);
        }
        redirect('ohadmin/category');
    }

    public function edit($cat_id) {

        $data['title']  = "";
        $data['page']   = 'category/edit';
        $data['action'] = 'Edit Category';
        $data['categories']  = $this->mod_category->edit($cat_id);

        $this->load->view('masterpage/master', $data);
    }

	public function update() {

		if (isset($_POST['btn_submit'])) {

			$cat_id       = $_POST['cat_id'];
			$cat_name        = $_POST['cat_name'];
			$approve        = $_POST['approve'];

			$this->mod_category->update($cat_id, $cat_name,$approve);
		}
		redirect('ohadmin/category');
	}

    public function delete($cat_id='') {

        $this->mod_category->delete($cat_id);

        redirect('ohadmin/category');
    }

	public function approve($cat_id='') {
		$this->mod_category->approve($cat_id);

		redirect('ohadmin/category');
	}

	public function pending($cat_id='') {
		$this->mod_category->pending($cat_id);

		redirect('ohadmin/category');
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
