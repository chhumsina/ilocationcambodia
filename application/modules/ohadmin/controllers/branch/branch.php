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

	public function delete($bra_id='') {

		$this->mod_branch->delete($bra_id);
		$this->session->set_userdata('ms_succss', MSG_SUCCUSS);
		redirect('ohadmin/branch');
	}

	public function approve($bra_id='') {
		$this->mod_branch->approve($bra_id);
		$this->session->set_userdata('ms_succss', MSG_SUCCUSS);
		redirect('ohadmin/branch');
	}

	public function pending($bra_id='') {
		$this->mod_branch->pending($bra_id);
		$this->session->set_userdata('ms_succss', MSG_SUCCUSS);
		redirect('ohadmin/branch');
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
