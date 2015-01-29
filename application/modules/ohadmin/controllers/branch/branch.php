<?php

/**
 * Description of group
 * It is a controller of group. It will controll all action of group management
 * @author Sina
 */
class Branch extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->checkSession()) {
			redirect('authentication/login');
		}

		$this->load->model(array('branch/mod_branch','company/mod_company'));
	}

    public function index() {
        $this->page();
    }

    public function page() {

		if (!$this->checkSession()) {
			redirect('authentication/login');
			exit();
		}
		$data['branches']  = $this->mod_branch->getAllBraches();
		$data['title']  = "ILocationCambodia Backend";
		$data['page']   = 'branch/list';
		$data['action'] = 'Branch';
		$this->load->view('masterpage/master', $data);
    }

    public function addNew() {
		$data['companies']  = $this->mod_company->getAllCompanies();
        $data['title']  = "ILocationCambodia Backend";
        $data['page']   = 'branch/addNew';
        $data['action'] = 'New Branch';
        $this->load->view('masterpage/master', $data);
    }

	public $img_name = '';

    public function create() {

        if (isset($_POST['btn_submit'])) {

			$title        = $_POST['bra_title'];
			$email        = $_POST['bra_email'];
			$website        = $_POST['bra_website'];
			$phone_1       = $_POST['bra_phone_1'];
			$phone_2        = $_POST['bra_phone_2'];
			$address        = $_POST['bra_address'];
			$description        = $_POST['bra_description'];
			$longitude        = $_POST['bra_longitude'];
			$latitude        = $_POST['bra_latitude'];
			$company        = $_POST['bra_company'];

            $this->mod_branch->create($title, $email, $website, $phone_1, $phone_2, $address, $description, $longitude, $latitude, $company);
        }
        redirect('ohadmin/branch');
    }

    public function edit($web_id) {

        $data['title']  = "Edit Website";
        $data['page']   = 'website/edit';
        $data['action'] = 'Edit Website';
        $data['website']  = $this->mod_website->editWebsite($web_id);

        $this->load->view('masterpage/master', $data);
    }

    public function delete($mem_id='') {

        $this->mod_member->delete($mem_id);

        redirect('ohadmin/member');
    }

    public function update() {

        if (isset($_POST['btn_submit'])) {

            $web_id       = $_POST['web_id'];
            $title        = $_POST['web_title'];
            $image        = $_POST['web_image'];
            $description  = $_POST['web_description'];
            $author_name  = $_POST['web_author_name'];
            $author_email = $_POST['web_author_email'];
            $email_show   = $_POST['web_author_email_show'];
            $preview      = $_POST['web_preview'];
            $approve      = $_POST['web_approve'];

            $this->mod_website->updateWebsite($web_id, $title, $image, $description, $author_name, $author_email, $email_show, $preview, $approve);
        }
        redirect('ohadmin/website');
    }
    
    public function approve($mem_id) {
        $this->mod_member->approveMember($mem_id);
        
        redirect('ohadmin/member');
    }
    
    public function pending($mem_id) {
        $this->mod_member->pendingMember($mem_id);
        
        redirect('ohadmin/member');
    }

	public function send($web_id = ''){
			$singleWebsite['website_author'] = $this->mod_website->getSingleWebsite($web_id);
			foreach ($singleWebsite['website_author']->result_array() as $website) {
				$email = $website['web_author_email'];
				$title = $website['web_title'];
				$image = $website['web_image'];
			}
			$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'sinachhum.cist@gmail.com', // change it to yours
					'smtp_pass' => 'weG689FnyT', // change it to yours
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
			);

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('sinachhum.cist@gmail.com');
			//$this->email->attach(HOWTO_IMAGE.$image, 'inline');
			$this->email->to($email);
			$this->email->subject(BASE_URL.': '.$title);
			$message = $this->load->view('website/email', $singleWebsite, TRUE);
			$this->email->message($message);
			if($this->email->send())
			{
				echo 'Email sent.';
				}
			else
			{
				show_error($this->email->print_debugger());
			}
	}

	// upload image
	public function do_upload() {
		$config['upload_path']	= "./uploads/website/";
		$config['allowed_types']= 'gif|jpg|png|jpeg';
		$config['max_size']     = '2000';
		$config['max_width']  	= '2000';
		$config['max_height']  	= '2000';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("web_image")) {

			$data	 	= array('upload_data' => $this->upload->data());

			foreach ($data as $item){
				$img_path= $item["full_path"];
				$this->img_name= $item["file_name"];
				$img_width= $item['image_width'];
				$img_hieght= $item['image_height'];
			}
			/* PATH */
//			$source             = "./uploads/real/".$img_path ;
//			$destination_thumb	= "./uploads/thumbnail/" ;

			//Create image thumbnail
			$config['image_library'] = 'gd2';
			$config['source_image'] = $img_path;
			$config['create_thumb'] = false;
			$config['new_image'] = 'thumb_'.$this->img_name;
			$config['overwrite'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 210;
			$config['height'] = 190;

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
        if ($this->session->userdata('ohadmin')) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

}
