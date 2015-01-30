<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Member extends Site_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model(array('mod_member'));
	}
	/**
	 * Check user login
	 * 1. View form
	 * 2. Check username and password
	 */
	public function login(){
		if($this->session->userdata('member')){
			redirect('member/dashboard');
			exit();
		}
		if (isset($_POST['btn_submit'])) {
			if(empty($_POST['mem_mem'])) {
				$user_name = $_POST['user_name'];
				$password = md5($_POST['password']);
				if($this->mod_member->login($user_name, $password)){
					redirect('member/dashboard');
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
		$this->dashboard();
	}
}