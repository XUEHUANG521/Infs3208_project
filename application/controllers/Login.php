<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->library('session'); //enable session
    }

    public function index()
    {
        $data['error']= "";
        $data['username_or_email'] = "";
        $data['password'] = "";
        //$this->load->view('template/header');

        if (!$this->session->userdata('logged_in') && get_cookie('remember'))//check if user already login
        {
            $data['username_or_email'] = get_cookie('username_or_email'); // get the username from cookie
            $data['password'] = get_cookie('password'); // get the password from cookie
        }
        $this->load->view('template/header');
        $this->load->view('login', $data);
        $this->load->view('template/footer');
    }

    public function check_login()
    {
        $data['username_or_email'] = "";
        $data['password'] = "";
        $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
        $this->load->view('template/header');
        $username_or_email = $this->input->post('username_or_email'); //getting username or email from login form
        $password = $this->input->post('password'); //getting password from login form
        $remember = $this->input->post('remember'); //getting remember checkbox from login form

        if(!$this->session->userdata('logged_in')){	//Check if user already login
            if ( $user = $this->user_model->login($username_or_email, $password) )//check username and password
            {
                $user_data = array(
                    'username' => $user[0] -> username,
                    'logged_in' => true, 	//create session variable
                    'viewed_products' => array()
                );
                if($remember) { // if remember me is activated create cookie
                    set_cookie("username_or_email", $username_or_email, '300'); //set cookie username
                    set_cookie("password", $password, '300'); //set cookie password
                    set_cookie("remember", $remember, '300'); //set cookie remember
                }
                $this->session->set_userdata($user_data); //set user status to login in session
                redirect('homepage'); // direct user home page
            }else
            {
                $this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
            }
        }else{
            {
                redirect('homepage'); //if user already logined direct user to home page
            }
            $this->load->view('template/footer');
        }
    }
    public function logout()
    {
        unset(
            $_SESSION['username_or_email'],
            $_SESSION['password'],
            $_SESSION['logged_in'],
            $_SESSION['viewed_products']
        );
        $this->session->unset_userdata('logged_in'); //delete login status
        $this->session->sess_destroy();
        redirect('homepage');
    }
}
?>
