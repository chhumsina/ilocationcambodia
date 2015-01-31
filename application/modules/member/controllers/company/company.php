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

	public $img_name = '';
	public function update() {

		if (isset($_POST['btn_submit'])) {
			$this->do_upload();
			if(empty($this->img_name)) {
				$this->img_name = $_POST['com_logo'];
			}

			$cat_id       = $_POST['cat_id'];
			$com_id       = $_POST['com_id'];
			$com_name        = $_POST['com_name'];
			$user_name        = $_POST['user_name'];
			$email        = $_POST['email'];
			$phone_1        = $_POST['phone_1'];
			$phone_2        = $_POST['phone_2'];
			$image        = $this->img_name;
			$description        = $_POST['description'];
			$approve        = $_POST['approve'];

			$this->mod_company->update($cat_id, $com_id, $com_name, $user_name, $email, $phone_1, $phone_2, $image, $description, $approve);
			$this->session->set_userdata('ms_succss', MSG_SUCCUSS);
		}
		redirect('member/company');
	}

	// upload image
	public function do_upload() {
		$config['upload_path']	= "./uploads/logo/";
		$config['allowed_types']= 'gif|jpg|png|jpeg';
		$config['max_size']     = '2000';
		$config['max_width']  	= '2000';
		$config['max_height']  	= '2000';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("com_logo")) {

			$data	 	= array('upload_data' => $this->upload->data());

			foreach ($data as $item){
				$img_path= $item["full_path"];
				$this->img_name= $item["file_name"];
				$img_width= $item['image_width'];
				$img_hieght= $item['image_height'];
			}

			//Create image thumbnail
			$config['image_library'] = 'gd2';
			$config['source_image'] = $img_path;
			$config['create_thumb'] = false;
			$config['new_image'] = 'thumb_'.$this->img_name;
			$config['overwrite'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 35;
			$config['height'] = 35;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			//Resize original image for space saving purposes
			if ($img_width > 850 || $img_hieght > 850) {

				$config['image_library'] = 'gd2';
				$config['source_image'] = $img_path;
				$config['maintain_ratio'] = TRUE;
				$config['create_thumb'] = FALSE;
				$config['overwrite'] = TRUE;
				$config['width'] = 850;
				$config['height'] = 850;

				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->image_lib->resize();

			}
		}
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
