<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller
{
    public function index(){
        $this->load->view('template/header');
        $this->load->view('register');
        $this->load->view('template/footer');
    }

    public function validate(){
        //ci设置表单规则规则 required:必填，trim:去掉两端空白,valid_email:判断输入email是否符合格式
        //is_unique:在users.email中是否有重复,min_length/max_length:长度限制， matches:与password是否一致
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password]');

        if($this->form_validation->run() == false){ //如果以上表单规则不满足，就重新加载register页面
            $this->load->view('template/header');
            $this->load->view('register');
            $this->load->view('template/footer');
        }else {
            if($this->user_model->register()){ //if user_model/register return insert into db
                $this->session->set_flashdata('message','You are registered!');  //give success message
                redirect('login');
            }
            else{
                $this->session->set_flashdata('error','The Username or Email has already existed');  //give duplicate message
                redirect('register');
            }
        }
    }
}