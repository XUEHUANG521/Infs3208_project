<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_info extends CI_Controller {
    public function index(){
        $this->load->view('template/header');
        $this->load->view('product_info');
        $this->load->view('template/footer');
        echo "d";
    }
}