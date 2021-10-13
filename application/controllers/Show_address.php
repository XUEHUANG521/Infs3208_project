<?php

class Show_address extends CI_Controller
{
    public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        $data['address'] = '';//$this->user_model->get_address($_SESSION['username']);
        $data['error'] = '';
        $this->load->view('template/header');
        if($address = $this->user_model->get_address($_SESSION['username'])){
            $data['address'] = $address;
            $this->load->view('show_address',$data);
        }
        else{
            $this->session->set_flashdata('error','You haven\'added any address yet! :)');  //give no address msg
//            $this->load->view('show_address');
            redirect('show_address/add');
        }

        $this->load->view('template/footer');
    }

    public function add(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        $data['users'] =$this->user_model->get_userinfo($_SESSION['username']);
        $this->load->view('template/header');
        $this->load->view('add_address',$data);
        $this->load->view('template/footer');
    }

    public function edit(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        $id = $this->input->get('id');
        $data['id'] =$id;
        $data = $this->user_model->get_address_by_id($id);
        $this->load->view('template/header');
        $this->load->view('edit_address',$data);
        $this->load->view('template/footer');

    }
    public function update(){
        $id = $this->input->get('id');
        if($this->user_model->update_address($id)){
            $this->session->set_flashdata('message','The address has been updated!');  //give success message
//            $data['address'] = '';//$this->user_model->get_address($_SESSION['username']);
//            if($address = $this->user_model->get_address($_SESSION['username'])){
//                $this->load->view('template/header');
//                $data['address'] = $address;
//                $this->load->view('show_address',$data);
//                $this->load->view('template/footer');
//            }
            redirect('show_address');
        }
        else{
            $this->session->set_flashdata('error','The address has already existed!');
            $this->load->view('template/header');
            $this->load->view('edit_address',$id);
            $this->load->view('template/footer');
        }
    }

    public function insert_address(){
        if($this->user_model->insert_address()){ //if user_model/register return insert into db
            //这里查重应该跟上面有重复，不过我懒得改了 0.0
            $this->session->set_flashdata('message','You have added a new address successfully!');  //give success message
            redirect('show_address');
        }
        else{
            $this->session->set_flashdata('error','The address has already existed');  //give duplicate message
            redirect('show_address/add');
        }
    }

}