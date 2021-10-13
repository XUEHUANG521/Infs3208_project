<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller
{
    public function index(){
        $this->load->model('user_model');
        $this->load->view('template/header');
        $this->load->view('forgot_password');
        $this->load->view('template/footer');
    }

    public function validate(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password]');
        if(!$this->form_validation->run()){
            $this->load->view('template/header');
            $this->load->view('forgot_password');
            $this->load->view('template/footer');
        }
        else{
            $email=$this->input->post('email');
            $password = $this->input->post('password');

            if($this->user_model->check_email($email)){
                $this->user_model->reset_password($email,$password);
                $this->session->set_flashdata('message','Reset successfully!');
                redirect('login');
            }
            else{
                $this->session->set_flashdata('error','Email does not exist!');
                redirect('forgot_password');
            }
        }
    }

}