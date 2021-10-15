<?php

class User_profile extends CI_Controller
{

    public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        else{
            $this->load->model('user_model');
            $this->load->view('template/header');
            $data['users'] =$this->user_model->get_userinfo($_SESSION['username']);
            $data['profile_img'] = $this->user_model->get_icon($_SESSION['username']);
            $this->load->view('user_profile',$data);
            $this->load->view('template/footer');
        }
    }

    public function get_icon(){
        $this->load->model('user_model');
        if ($this->input->is_ajax_request()) {
            $img = $this->user_model->get_icon($data['username']);
            if (!$img == null) {
                echo json_encode($img);
            }else{
                echo  ""; // no result found
            }
        }
    }
}