<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Member extends Site_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model(array('mod_member','company/mod_company'));
	}
	/**
	 * Check user login
	 * 1. View form
	 * 2. Check username and password
	 */
	public function login(){
		if($this->session->userdata('member')){
			redirect('member/company');
			exit();
		}
		if (isset($_POST['btn_submit'])) {
			if(empty($_POST['mem_mem'])) {
				$user_name = $_POST['user_name'];
				$password = md5($_POST['password']);
				if($this->mod_member->login($user_name, $password)){
					redirect('member/company');
					exit();
				}
				$this->session->set_flashdata('messageError','Invalid Username and Password!');
			}
		}
		redirect(BASE_URL);
	}

	public function logout(){
		$this->session->set_flashdata('message', 'You have been logged out.');
		$this->session->unset_userdata('useName');
		$this->session->unset_userdata('comId');
		redirect(BASE_URL);
	}

	// Member Page
	public function dashboard() {
		if (!$this->session->userdata('useName')) {
			redirect(BASE_URL);
		}

		$breadcrumb = array(
				"Home" => BASE_URL,
				"Dashboard" => ""
		);

		$data['breadcrumb'] = $breadcrumb;
		$title = 'Dashboard';
		$data['title']	= $title;
		$data['page']	= 'member/view';
		$data['action']	= $title;
		$this->load->view('masterpage/master',$data);
	}

	public function index(){
		redirect('member/company');
	}

	// Register
	public function register() {
		if (isset($_POST['btn_submit'])) {
			//$cat_name        = $_POST['cat_name'];
			$user_name        = $_POST['username'];
			$email        = $_POST['email'];
			$password        = md5($_POST['password']);
			$repassword        = $_POST['password'];
			$com_name        = $_POST['com_name'];
			$activate_code        = random_string('alnum', 20);

			if($this->mod_company->create($user_name, $email, $password, $repassword, $com_name, $activate_code)) {
				$this->session->set_flashdata('message', str_replace("_", " ", ucfirst($user_name)).', You have registered successfully. Please confirm your email address: '.'<a href="'.'http://'.strstr($email, '@').'" target="_blank">'.$email.'</a>');

				$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => 465,
						'smtp_user' => '', // change it to yours
						'smtp_pass' => '', // change it to yours
						'mailtype' => 'html',
						'charset' => 'iso-8859-1',
						'wordwrap' => TRUE
				);

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('');
				$this->email->to($email);
				$this->email->subject('IlocationCambodia, Email verification!');
				$this->email->message('Please click here to activate your account <a href="' .BASE_URL.'verify/verify_email/'.$activate_code.'">'.$activate_code.'</a>');
				if($this->email->send()) {
					redirect(BASE_URL);
				}

			}

		}
		redirect(BASE_URL);
	}
}