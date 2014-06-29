<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
    //load initial files
	{
		$this->login();
	}
	
	public function login()
    //Display the login form
	{
		$this->load->view('login');
	}
	
	public function login_validation()
    //Sanatise the entered data and forward user
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xxs_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|md5');

		if ($this->form_validation->run()){
			redirect('main/admin');
		}
		else
			{
				$this->load->view('login');
			}

	}
    
    public function validate_credentials(){
        //Check username and password against database
        
        $this->load->model('login');
        
        if($this->login->can_log_in())
        {
            return true;
        }
        else
            {
                $this->form_validation->set_message('validate_credentials', 'incorrect username or password');
                return false;
            }
    }
	
	public function admin(){
	    //admin page control
		$this->load->view('admin');
		
	}
}