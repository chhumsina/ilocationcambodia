<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Verify extends Site_Controller {

    public function __construct() {
        $this->load->model(array('Mod_verifyemail'));
        $this->load->helper('string');
    }

    function verify_email($verificationText = NULL) {
        $noRecords = $this->Mod_verifyemail->verify_email_address($verificationText);
        if ($noRecords > 0) {
			$verify['email_verify'] = $this->Mod_verifyemail->verifyEmail($verificationText);
			foreach ($verify['email_verify']->result() as $company) {
				$email = $company->email;
			}

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
			$this->email->subject('IlocationCambodia, Account information!');
			$message = $this->load->view('member/email', $verify, TRUE);
			$this->email->message($message);
			if($this->email->send())
			{
				$this->session->set_flashdata('message', 'Congratulations your account has now been activated. Please <a href="#signin" data-toggle="modal" data-target=".bs-modal-sm">Login</a>.');
				redirect(BASE_URL);
			}
			else
			{
				echo '<h2>Sorry there is an issue for registration, please try again!</h2>';
				die();
			}
        }
        else {
			$this->session->set_flashdata('messageError', 'Sorry Unable to Verify Your Email!');
			redirect(BASE_URL);
        }
    }

}
