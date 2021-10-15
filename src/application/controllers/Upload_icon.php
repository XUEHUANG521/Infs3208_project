<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_icon extends CI_Controller
{
    public function __construct() {
        parent:: __construct();
        $this->load->model('user_model');
        $this->load->library('upload');
        $this->load->library('image_lib');
    }

    public function index() {

//        $this->load->helper('url');
        $this->load->view('template/header');

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        } else {
            $this->load->view('user_profile', array('error' => ' '));
            $this->load->view('template/footer');
        }

    }

    public function upload_user_icon() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|mp4|mkv|gif|png|jpeg';
        $config['max_size']	= '7000';
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('userfile')) {
            $data = array('error' => $this->upload->display_errors());
            redirect('user_profile');
        } else {
            $full_path = $this->upload->data('full_path');
            $path = strrchr($full_path,"/");
            $this->user_model->upload_icon($path,$this->session->userdata('username'));
            redirect('user_profile');
        }
    }
}