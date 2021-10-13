<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_products extends CI_Controller {

    public function index(){
        $this->load->model('product');
        $result =$this->product->get_product();
        $array = json_decode(json_encode($result), true);
        $data["array"] = $array;
        $this->load->view('template/header');
        $this->load->view('view_product',$data);
        $this->load->view('template/footer');
    }

    
}

