<?php
class Authentication extends Admin_Controller{
    
    /**
     * Check user login
     * 1. View form
     * 2. Check username and password
     */
    public function login(){
        if($this->session->userdata('ohadmin')){
            redirect('ohadmin');
            exit();
        }
        $this->load->model('mod_authentication');
        $this->form_validation->set_rules('username','Username', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('password','Password', 'trim|required|max_length[20]');
        
        if($this->form_validation->run()== TRUE){
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            if($this->mod_authentication->login($username, $password)){
                redirect('ohadmin');
                exit();
            }
            $this->session->set_userdata('ms_error','Invalid account!');
        }
        $this->load->view('login');
    }
    
    public function logout(){
        $this->session->unset_userdata('userName');
        $this->session->unset_userdata('ohadmin');
        $this->session->unset_userdata('userId');
        redirect('ohadmin');
    }
}
