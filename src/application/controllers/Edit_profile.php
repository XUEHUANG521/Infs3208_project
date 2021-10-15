<?php

class Edit_profile extends CI_Controller
{
    public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        else{
            $this->load->view('template/header');
            $data['users'] =$this->user_model->get_userinfo($_SESSION['username']);
            $this->load->view('edit_profile',$data);
            $this->load->view('template/footer');
        }

    }

    public function update(){
        $username = $this->user_model->get_userinfo($_SESSION['username'])[0]['username'];
        if($this->user_model->update_userinfo($username)){ //if user_model/register return insert into db
            $this->session->set_flashdata('message','Your information has been updated!');  //give success message
            redirect('edit_profile');
        }
        else{
            $this->session->set_flashdata('error','The Email or the Username has already existed!');
            $this->load->view('template/header');
            $data['users'] =$this->user_model->get_userinfo($_SESSION['username']);
            $this->load->view('edit_profile',$data);
            $this->load->view('template/footer');
        }
    }
}