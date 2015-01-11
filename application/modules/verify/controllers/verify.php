<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Verify extends Site_Controller {

    public function __construct() {
        $this->load->model(array('Mod_verify'));
        $this->load->helper('string');
    }

    function verifyCode($verificationCode = NULL) {
        $noRecords = $this->Mod_verify->verifyCode($verificationCode);
        if ($noRecords > 0) {
            $verify['code_verify'] = $this->Mod_verify->verifyEmail($verificationCode);
            foreach ($verify['code_verify']->result() as $cod) {
                $email = $cod->pag_email;
            }

            $config  = Array(
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
            $this->email->to($email);
            $this->email->subject('Ohhuge, Facebook Page information!');
            $this->email->message('Done');
            if ($this->email->send()) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulaion, Your Facebook Page is activate now.</div>');
                redirect(BASE_URL);
            }
            else {
                echo '<h2>Sorry there is an issue for registration, please try again!</h2>';
                die();
            }
        }
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Your Facebook Page is already activated.</div>');
            redirect(BASE_URL);
        }
    }

}
