<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->login();
	}
	
	public function login()
	{
		$this->load->view('login');
	}
	
	public function login_validation()
	{
		
	}
}