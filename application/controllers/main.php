<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index()
    //load initial files
    {
        $this -> login();
    }

    //====Pages====
    public function login()
    //Display the login form
    {
        $this -> load -> view('login');
    }

    public function users() {
        //admin page control
        if ($this -> session -> userdata('is_logged_in')) {
            $this -> load -> view('users');
        } else {
            $this -> load -> view('restricted');

        }

    }

    public function admin() {
        //admin page control
        if ($this -> session -> userdata('is_logged_in')) {
            $this -> load -> view('admin');
        } else {
            $this -> load -> view('restricted');

        }
    }

    public function restricted() {
        $this -> load -> view('restricted');
    }

    //====Logic====
    public function login_validation()
    //Sanatise the entered data and forward user
    {
        $this -> load -> library('form_validation');
        $this -> form_validation -> set_rules('email', 'Email', 'required|valid_email|trim|xxs_clean|callback_validate_credentials');
        $this -> form_validation -> set_rules('password', 'Password', 'required|trim|md5');

        if ($this -> form_validation -> run()) {
            $sessiondata = array('email' => $this -> input -> post('email'), 'is_logged_in' => 1);

            $this -> session -> set_userdata($sessiondata);
            redirect('main/admin');
        } else {
            $this -> load -> view('login');
        }

    }
    
    public function signup_validation()
    //Sanatise the entered data and forward user
    {
        $this -> load -> library('form_validation');
        $this -> form_validation -> set_rules('email', 'Email', 'required|trim|valid_email|xxs_clean|is_unique[users.email]');
        $this -> form_validation -> set_rules('cemail', 'Confirm Email', 'required|trim|xxs_clean|matches[email]');
        
        if ($this -> form_validation -> run()) {
            //===Securing the account===   
            //Generate the Unique ID
            $uniqid = uniqid();
            
            //Hash the Unique ID to get the Key
            $key = md5($uniqid);
            
            //Shuffle the Key to get the Password Entropy
            $entropy = str_shuffle($key);
            
            //Generate the Password by hashing the Entropy
            $password = md5($entropy);
            
            //===Emails===
            $this -> load -> library('email');
            $config['protocol'] = "smtp";
            $config['smtp_host'] = "ssl://smtp.googlemail.com";
            $config['smtp_port'] = "465";
            $config['smtp_user'] = "-";
            $config['smtp_pass'] = "-";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
            
            //Sending key to user
            $this -> email -> from($this->config->item('base_email'), "Admin");
            $this -> email -> to($this->input->post('email'));
            $this -> email -> subject('Activation Key');
            $message_key = "<p>You have been provided an account at ".$this->config->item('site_name')." </p>";
            $message_key .= "<p><a href='".base_url()."main/register_user/$key'>Click here to activate your account</a></p>";    
            $message_key .= "<p>Your password will be sent shortly</p>";
            $this -> email -> message($message_key);
            if ($this -> email -> send()){
                echo "key Sent";
            }  
            else {
                echo "key failed to send";
                show_error($this->email->print_debugger());
            }
                      
            //Sending password to user
            $this -> email -> from($this->config->item('base_email'), "Admin");
            $this -> email -> to($this->input->post('email'));
            $this -> email -> subject('Activation Email');
            $message_password = "<p>You have been provided an account at ".$this->config->item('site_name')." </p>";
            $message_password .= "<p>Temporary Password: $password</p>";    
            $message_password .= "<p>Your Activation Email will be sent shortly</p>";  
            
            $this -> email -> message($message_password);
            if ($this -> email -> send()){
                echo "password Sent";
            }
            else {
                echo "password failed to send";
            }  
            //===Add user to temp database===
        } else {
            echo "Failed to add user";
            $this -> load -> view('users');
        }

    }

    public function validate_credentials() {
        //Check username and password against database

        $this -> load -> model('login');

        if ($this -> login -> can_log_in()) {
            return true;
        } else {
            $this -> form_validation -> set_message('validate_credentials', 'incorrect username or password');
            return false;
        }
    }

    public function logout() {
        $this -> session -> sess_destroy();
        echo "Logout Successful";
        $this -> index(); 
    }

}
